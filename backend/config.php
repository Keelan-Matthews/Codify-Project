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
    // private $username = "u21549967";
    private $username = "root";
    // private $password = "deoqtvvm";
    private $password = "";
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
        $stmt = $this->connection->prepare("INSERT INTO dbusers (`username`, `email`, `password`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            return $this->getConnection()->insert_id;
        } else {
            return false;
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

        if ($image['size'] < 10000000 && in_array($ext, $allowedFiles)) {
            move_uploaded_file($image['tmp_name'], $image_path);
        } else {
            header('Location: dashboard.php?error=incorrectimage');
            exit();
        }
        $stmt = $this->connection->prepare("INSERT INTO dbevents (`name`, `description`, `date`, `location`, `category`, `image`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $name, $description, $date, $location, $category, $image_path, $user_id);
        $stmt->execute();

        header('location: dashboard.php');
        exit();
    }

    function returnHome($user_id)
    {
        $sql = "SELECT e.*, u.profile_photo FROM dbevents AS e, dbusers AS u WHERE e.user_id = '$user_id'";
        $result = $this->getConnection()->query($sql);
        $events = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            header("HTTP/1.1 200 OK");
        } else {
            $events = $this->error("No events found");
            header("HTTP/1.1 404 Not Found");
        }
        header("Content-Type: application/json");
        echo json_encode($events);
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

        if (emailExists($this->connection, $email) === false) {
            header('Location: ../login.php?error=emailnotexist');
            exit();
        }

        $valid = $this->getUser($email, $password);

        if ($valid === false) {
            header('Location: ../login.php?error=invalidpassword');
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
                header("HTTP/1.1 404 Not Found");
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
    $sql = "SELECT * FROM dbusers WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../signup.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// function apiCall($data) {
//     $url = "localhost/IMY220/api.php";
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_USERPWD, "u21549967" . ":" . "deoqtvvm");

//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//     $res = curl_exec($ch);

//     if (curl_errno($ch)) {
//         die('Couldn\'t send request: ' . curl_error($ch));
//     } else {
//         $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         if ($resultStatus == 200) {
//             echo "<script>console.log('Call was successful')</script>";
//         } else {
//             echo "<script>console.log('Unsuccessful call')</script>";

//             die('Request failed: HTTP status code: ' . $resultStatus);
//         }
//     }

//     return json_decode($res,true);
// }

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
