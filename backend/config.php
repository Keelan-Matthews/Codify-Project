<?php

if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["signed_in"])) {
        $_SESSION["signed_in"] = false;
    }
    if (!isset($_SESSION["admin"])) {
        $_SESSION["admin"] = "";
    }
    if (!isset($_SESSION["user_id"])) {
        $_SESSION["user_id"] = "";
    }
    if (!isset($_SESSION["username"])) {
        $_SESSION["username"] = "";
    }
    if (!isset($_SESSION["email"])) {
        $_SESSION["email"] = "";
    }
}

class Database
{
    private static $instance = null;
    private $connection;

    private $servername = "localhost";
    private $username = "u21549967";
    // private $username = "root";
    private $password = "deoqtvvm";
    // private $password = "";
    private $db = "u21549967";

    private function __construct()
    {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function addUser($username, $email, $password)
    {
        if (empty($username) !== false) {
            header('Location: register.php?error=emptyusername');
            exit();
        }

        if (invalidUsername($username) !== false) {
            header('Location: register.php?error=invalidusername');
            exit();
        }

        if (empty($email) !== false) {
            header('Location: register.php?error=emptyemail');
            exit();
        }

        if (invalidEmail($email) !== false) {
            header('Location: register.php?error=invalidemail');
            exit();
        }

        if (empty($password) !== false) {
            header('Location: register.php?error=emptypassword');
            exit();
        }

        if (invalidPassword($password) !== false) {
            header('Location: register.php?error=invalidpassword');
            exit();
        }

        $instance = Database::getInstance();
        $conn = $instance->getConnection();

        if (emailExists($conn,$email)) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode($this->error("Email already exists"));
            exit();
        }
        
        $stmt = $this->connection->prepare("INSERT INTO dbusers (`username`, `email`, `password`, `profile_photo`) VALUES (?, ?, ?, ?)");
        $default_profile = "media/profile_photos/default.png";
        $stmt->bind_param("ssss", $username, $email, $password, $default_profile);

        if ($stmt->execute()) {
            $_SESSION["signed_in"] = true;
            header('HTTP/1.1 200 OK');

            $userId = $this->getConnection()->insert_id;
            $_SESSION["user_id"] = $userId;
            echo json_encode($this->success($_SESSION["user_id"]));
        } else {
            // header('HTTP/1.1 400 Bad Request');
            echo json_encode($this->error("An error occured while adding user"));
        }
    }

    public function addEvent($name, $description, $date, $location, $category, $image, $user_id)
    {
        $filename = $image['name'];

        if ($name == null) {
            header('Location: dashboard.php?error=emptyname');
            exit();
        }

        if ($location == null) {
            header('Location: dashboard.php?error=emptylocation');
            exit();
        }

        if ($date == null) {
            header('Location: dashboard.php?error=emptydate');
            exit();
        }

        if ($category == null) {
            header('Location: dashboard.php?error=emptycategory');
            exit();
        }

        if ($description == null) {
            header('Location: dashboard.php?error=emptydescription');
            exit();
        }

        if ($filename == null) {
            header('Location: dashboard.php?error=emptyimage');
            exit();
        }

        $target_dir = "media/events/";
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $image_name =  $name . $user_id . $category;
        $image_path = strtolower($target_dir . str_replace(" ", "", $image_name) . "." . $ext);

        $allowedFiles =  array('jpg', 'jpeg', 'png');

        if ($image['size'] < 30000000 && in_array($ext, $allowedFiles)) {
            move_uploaded_file($image['tmp_name'], $image_path);
        } else {
            header('Location: dashboard.php?error=incorrectimage');
            exit();
        }
        $stmt = $this->connection->prepare("INSERT INTO dbevents (`name`, `description`, `date`, `location`, `category`, `image`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $name, $description, $date, $location, $category, $image_path, $user_id);
        
        if ($stmt->execute()) {
            header('HTTP/1.1 200 OK');
            echo json_encode($this->success("Event added successfully"));
        } else {
            echo json_encode($this->error("An error occured while adding event"));
        }
    }

    function returnUserEvents($user_id)
    {
        $sql = "SELECT DISTINCT dbevents.*, dbusers.profile_photo, dbusers.username FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id WHERE dbevents.user_id = '$user_id'";
        $result = $this->getConnection()->query($sql);
        $events = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($events));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No events found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnHome($user_id)
    {
        $sql = "SELECT DISTINCT dbevents.*, dbusers.profile_photo FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id LEFT JOIN dbfollowing ON dbfollowing.following_id = dbevents.user_id WHERE dbfollowing.user_id = '$user_id'";
        $result = $this->getConnection()->query($sql);
        $events = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($events));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No events found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnEventDetails($event_id)
    {
        // Return all event details and user details of event
        $sql = "SELECT DISTINCT dbevents.*, dbusers.username, dbusers.profile_photo FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id WHERE dbevents.event_id = '$event_id'";
        $result = $this->getConnection()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $event = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($event));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No events found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnUser($email, $password)
    {
        if (empty($email) !== false) {
            header('Location: ../login.php?error=emptyemail');
            exit();
        }

        if (empty($password) !== false) {
            header('Location: ../login.php?error=emptypassword');
            exit();
        }

        $instance = Database::getInstance();
        $conn = $instance->getConnection();

        if (emailExists($conn, $email) === false) {
            header('Location: login.php?error=emailnotexist');
            exit();
        }

        $valid = $this->getUser($email, $password);

        if ($valid === false) {
            header('Location: login.php?error=invalidpassword');
            exit();
        } else {
            $sql = "SELECT * FROM dbusers WHERE `email` = '$email' AND `password` = '$password'";
            $result = $this->getConnection()->query($sql);
            $user = "";
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user = $this->success($row);
                header("HTTP/1.1 200 OK");

                $_SESSION["signed_in"] = true;
                $_SESSION["admin"] = $user["data"]["admin"];
                $_SESSION["user_id"] = $user["data"]["user_id"];
                $_SESSION["username"] = $user["data"]["username"];
                $_SESSION["email"] = $user["data"]["email"];
            } else {
                $user = $this->error("User not found");
            }
            header("Content-Type: application/json");

            echo json_encode($user);
        }
    }

    public function getUser($email, $password)
    {
        $stmt = $this->connection->prepare("SELECT * FROM dbusers WHERE email=?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row["password"] === $password) {
                    return $row;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function error($message)
    {
        return ["status" => "failed", "timestamp" => time(), "data" => ["message" => $message]];
    }

    private function success($data)
    {
        return ["status" => "success", "timestamp" => time(), "data" => $data];
    }
}

function invalidUsername($username)
{
    $result = true;
    if (!preg_match("/^[a-z0-9]*$/", $username)) {
        $result = true;
    } else
        $result = false;

    return $result;
}

function invalidEmail($email)
{
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else
        $result = false;

    return $result;
}

function invalidPassword($password)
{
    $result = true;
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)) {
        $result = true;
    } else
        $result = false;

    return $result;
}

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM dbusers WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
