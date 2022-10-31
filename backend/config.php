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

        if (emailExists($conn, $email)) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode($this->error("Email already exists"));
            exit();
        }

        $stmt = $this->connection->prepare("INSERT INTO dbusers (`username`, `email`, `password`, `profile_photo`) VALUES (?, ?, ?, ?)");
        $default_profile = "media/profile_photos/default.png";
        $stmt->bind_param("ssss", $username, $email, $password, $default_profile);

        // Follow user 11 on register
        $stmt2 = $this->connection->prepare("INSERT INTO dbfollowing (`user_id`, `following_id`) VALUES (?, ?)");
        $gmtk_id = 11;
        $stmt2->bind_param("ii", $_SESSION["user_id"], $gmtk_id);
        $stmt2->execute();

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

    public function addEvent($name, $description, $date, $location, $category, $image, $user_id, $tag1, $tag2, $tag3)
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

        if ($filename == "") {
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
        $stmt = $this->connection->prepare("INSERT INTO dbevents (`name`, `description`, `date`, `location`, `category`, `image`, `user_id`, `tag1`, `tag2`, `tag3`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssisss", $name, $description, $date, $location, $category, $image_path, $user_id, $tag1, $tag2, $tag3);

        if ($stmt->execute()) {
            header('HTTP/1.1 200 OK');
            echo json_encode($this->success("Event added successfully"));
        } else {
            echo json_encode($this->error("An error occured while adding event"));
        }
    }

    function editEvent($name, $description, $date, $location, $category, $image, $tag1, $tag2, $tag3, $event_id, $user_id)
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

        if ($tag1 == "") {
            $tag1 = null;
        }

        if ($tag2 == "") {
            $tag2 = null;
        }

        if ($tag3 == "") {
            $tag3 = null;
        }

        if ($filename == "") {
            $sql = "UPDATE dbevents SET `name` = '$name', `description` = '$description', `date` = '$date', `location` = '$location', `category` = '$category', `tag1` = '$tag1', `tag2` = '$tag2', `tag3` = '$tag3' WHERE `event_id` = '$event_id'";
            $result = $this->connection->query($sql);

            if ($result) {
                header('HTTP/1.1 200 OK');
                echo json_encode($this->success("Event edited successfully"));
            } else {
                echo json_encode($this->error("An error occured while editing event"));
            }
        } else {
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

            $sql = "UPDATE dbevents SET name = '$name', description = '$description', date = '$date', location = '$location', category = '$category', image = '$image_path', tag1 = '$tag1', tag2 = '$tag2', tag3 = '$tag3' WHERE event_id = '$event_id'";
            $result = $this->connection->query($sql);
            if ($result) {
                header('HTTP/1.1 200 OK');
                echo json_encode($this->success("Event edited successfully"));
            } else {
                echo json_encode($this->error("An error occured while editing event"));
            }
        }
    }

    function returnUserEvents($user_id, $profile_id)
    {
        $sql = "SELECT * FROM dbevents WHERE user_id = $profile_id";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $sql = "SELECT DISTINCT dbevents.*, dbusers.profile_photo, dbusers.username, dbusers.verified FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id WHERE dbevents.user_id = '$profile_id' ORDER BY dbevents.date DESC";
            $result = $this->getConnection()->query($sql);
        } else {
            $sql = "SELECT username, profile_photo, verified FROM dbusers WHERE user_id = '$profile_id'";
            $result = $this->getConnection()->query($sql);
        }

        $sql2 = "SELECT COUNT(*) AS followers FROM dbfollowing WHERE following_id = '$profile_id'";
        $result2 = $this->getConnection()->query($sql2);
        $row2 = $result2->fetch_assoc();
        $followers = $row2['followers'];

        $sql3 = "SELECT following_id FROM dbfollowing WHERE user_id = '$user_id' AND following_id = '$profile_id'";
        $result3 = $this->getConnection()->query($sql3);
        $following = $result3->num_rows > 0;

        // see if user is following me
        $sql4 = "SELECT user_id FROM dbfollowing WHERE user_id = '$profile_id' AND following_id = '$user_id'";
        $result4 = $this->getConnection()->query($sql4);
        $followed = $result4->num_rows > 0;


        $events = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
                $events[0]['followers'] = $followers;
                $events[0]['following'] = $following;
                $events[0]['mutual'] = ($followed && $following);
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

    function editProfile($user_id, $username, $email, $password, $image)
    {
        $result = true;
        if ($username) {
            $sql = "UPDATE dbusers SET username = '$username' WHERE user_id = '$user_id'";
            $result = $this->connection->query($sql);
        }

        if ($email) {
            $sql = "UPDATE dbusers SET email = '$email' WHERE user_id = '$user_id'";
            $result = $this->connection->query($sql);
        }

        if ($password) {
            $sql = "UPDATE dbusers SET password = '$password' WHERE user_id = '$user_id'";
            $result = $this->connection->query($sql);
        }

        if ($image) {
            $filename = $image['name'];
            $target_dir = "media/profile_photos/";
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $image_name =  $user_id;
            $image_path = strtolower($target_dir . str_replace(" ", "", $image_name) . "." . $ext);

            $allowedFiles =  array('jpg', 'jpeg', 'png');

            if ($image['size'] < 30000000 && in_array($ext, $allowedFiles)) {
                move_uploaded_file($image['tmp_name'], $image_path);
            } else {
                header('Location: dashboard.php?error=incorrectimage');
                exit();
            }

            $sql = "UPDATE dbusers SET profile_photo = '$image_path' WHERE user_id = '$user_id'";
            $result = $this->connection->query($sql);
        }

        if ($result) {
            header('HTTP/1.1 200 OK');
            echo json_encode($this->success("Profile edited successfully"));
        } else {
            echo json_encode($this->error("An error occured while editing profile"));
        }
    }

    function returnUserLists($profile_id)
    {
        $sql = "SELECT * FROM dblists WHERE user_id = $profile_id";
        $result = $this->connection->query($sql);

        $lists = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lists[] = $row;
            }

            // append event images in each list
            foreach ($lists as $key => $list) {
                $list_id = $list['list_id'];
                $sql2 = "SELECT dbevents.image FROM dbevents LEFT JOIN dblistitems ON dblistitems.event_id = dbevents.event_id WHERE dblistitems.list_id = $list_id";
                $result2 = $this->connection->query($sql2);
                $images = array();
                while ($row = $result2->fetch_assoc()) {
                    $images[] = $row['image'];
                }
                $lists[$key]['images'] = $images;
            }

            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($lists));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No lists found"));
            header("HTTP/1.1 200 OK");
        }
    }

    function returnAttendedEvents($user_id)
    {
        $sql = "SELECT event_id FROM dbattendees WHERE user_id = $user_id";
        $result = $this->connection->query($sql);

        $events = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }

            // append event details to each event
            foreach ($events as $key => $event) {
                $event_id = $event['event_id'];
                $sql2 = "SELECT * FROM dbevents WHERE event_id = $event_id";
                $result2 = $this->connection->query($sql2);
                $row = $result2->fetch_assoc();
                $events[$key] = $row;
            }

            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($events));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No events found"));
            header("HTTP/1.1 200 OK");
        }

    }

    function returnListEvents($list_id)
    {
        $sql = "SELECT DISTINCT dbevents.*, dblists.title, dblists.description FROM dbevents LEFT JOIN dblistitems ON dblistitems.event_id = dbevents.event_id LEFT JOIN dblists ON dblists.list_id = dblistitems.list_id WHERE dblistitems.list_id = $list_id";
        $result = $this->connection->query($sql);

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
        $sql = "SELECT DISTINCT dbevents.*, dbusers.profile_photo, dbusers.verified FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id LEFT JOIN dbfollowing ON dbfollowing.following_id = dbevents.user_id WHERE dbfollowing.user_id = '$user_id' ORDER BY dbevents.date DESC";
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

    function returnEventDetails($event_id, $user_id)
    {
        // Return all event details and user details of event
        $sql = "SELECT DISTINCT dbevents.*, dbusers.username, dbusers.profile_photo FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id WHERE dbevents.event_id = '$event_id'";
        $result = $this->getConnection()->query($sql);

        $sql2 = "SELECT * FROM dblists WHERE user_id = '$user_id'";
        $result2 = $this->getConnection()->query($sql2);

        $lists = array();
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $lists[] = $row;
            }
        } else {
            $lists = null;
        }

        $sql3 = "SELECT dbreviews.*, dbusers.username, dbusers.profile_photo FROM dbreviews LEFT JOIN dbusers ON dbusers.user_id = dbreviews.user_id WHERE dbreviews.event_id = '$event_id' ORDER BY dbreviews.review_date DESC";
        $result3 = $this->getConnection()->query($sql3);

        $sql4 = "SELECT * FROM dbreviews WHERE user_id = '$user_id' AND event_id = '$event_id'";
        $result4 = $this->getConnection()->query($sql4);

        $attended = false;
        if ($result4->num_rows > 0) {
            $attended = true;
        }

        $reviews = array();
        if ($result3->num_rows > 0) {
            while ($row = $result3->fetch_assoc()) {
                $reviews[] = $row;
            }
        } else {
            $reviews = null;
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $event = $row;
                $event['attended'] = $attended;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success(array($event, array($lists), array($reviews))));
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

    function returnHomeUsers($user_id)
    {
        $sql = "SELECT DISTINCT dbusers.* FROM dbusers LEFT JOIN dbfollowing ON dbfollowing.following_id = dbusers.user_id WHERE dbfollowing.user_id = '$user_id'";
        $result = $this->getConnection()->query($sql);
        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($users));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No users found"));
            header("HTTP/1.1 404 Not Found");
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

    function returnExplore()
    {
        $sql = "SELECT DISTINCT dbevents.*, dbusers.username, dbusers.profile_photo, dbusers.verified FROM dbevents LEFT JOIN dbusers ON dbusers.user_id = dbevents.user_id ORDER BY dbevents.date DESC";
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

    function follow($user_id, $following_id)
    {
        $sql = "INSERT INTO dbfollowing (user_id, following_id) VALUES ('$user_id', '$following_id')";
        $result = $this->getConnection()->query($sql);
        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Followed user"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while following user"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function unfollow($user_id, $following_id)
    {
        $sql = "DELETE FROM dbfollowing WHERE user_id = '$user_id' AND following_id = '$following_id'";
        $result = $this->getConnection()->query($sql);
        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Unfollowed user"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while unfollowing user"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function addReview($user_id, $event_id, $comment, $image, $rating, $review_date)
    {
        $filename = $image['name'];
        $target_dir = "media/events/";
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $image_name =  $user_id . $event_id . $rating;
        $image_path = strtolower($target_dir . str_replace(" ", "", $image_name) . "." . $ext);

        $allowedFiles =  array('jpg', 'jpeg', 'png');

        if ($image['size'] < 30000000 && in_array($ext, $allowedFiles)) {
            move_uploaded_file($image['tmp_name'], $image_path);
        } else {
            header('Location: dashboard.php?error=incorrectimage');
            exit();
        }

        $sql = "INSERT INTO dbreviews (user_id, event_id, comment, image, rating, review_date) VALUES ('$user_id', '$event_id', '$comment', '$image_path', '$rating', '$review_date')";
        $this->getConnection()->query($sql);

        $sql = "INSERT INTO dbattendees (user_id, event_id) VALUES ('$user_id', '$event_id')";
        $result = $this->getConnection()->query($sql);

        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Added review"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while adding review"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnAllUsers()
    {
        $sql = "SELECT * FROM dbusers";
        $result = $this->getConnection()->query($sql);
        $users = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($users));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No users found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function addList($user_id, $name, $description)
    {
        $sql = "INSERT INTO dblists (title, description, count, user_id) VALUES ('$name', '$description', 0, '$user_id')";
        $result = $this->getConnection()->query($sql);
        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Added list"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while adding list"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function getMessages($user_id, $friend_id)
    {
        $sql = "SELECT * FROM dbmessages WHERE (user_id = '$user_id' AND friend_id = '$friend_id') OR (user_id = '$friend_id' AND friend_id = '$user_id') ORDER BY time ASC";
        $result = $this->getConnection()->query($sql);
        $messages = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($messages));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No messages found"));
        }
    }

    function getFriends($user_id)
    {
        $sql = "SELECT dbusers.username, dbusers.profile_photo, dbusers.user_id FROM dbusers LEFT JOIN dbfollowing ON dbfollowing.user_id = dbusers.user_id WHERE dbfollowing.following_id = '$user_id' AND dbfollowing.user_id IN (SELECT dbfollowing.following_id FROM dbfollowing WHERE dbfollowing.user_id = '$user_id')";
        $result = $this->getConnection()->query($sql);
        $friends = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $friends[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($friends));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No friends found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnFollowers($profile_id)
    {
        $sql = "SELECT dbusers.username, dbusers.profile_photo, dbusers.user_id FROM dbusers LEFT JOIN dbfollowing ON dbfollowing.user_id = dbusers.user_id WHERE dbfollowing.following_id = '$profile_id'";
        $result = $this->getConnection()->query($sql);
        $followers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $followers[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($followers));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No followers found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function addToList($event_id, $list_id)
    {
        $sql = "INSERT INTO dblistitems (list_id, event_id) VALUES ('$list_id', '$event_id')";
        $result = $this->getConnection()->query($sql);

        $sql2 = "UPDATE dblists SET count = count + 1 WHERE list_id = '$list_id'";
        $result2 = $this->getConnection()->query($sql2);

        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Added event to list"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while adding event to list"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnUserInfo($user_id)
    {
        $sql = "SELECT * FROM dbusers WHERE user_id = '$user_id'";
        $result = $this->getConnection()->query($sql);
        $user = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($user));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No user found"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function sendMessage($user_id, $friend_id, $message, $time)
    {
        $sql = "INSERT INTO dbmessages (message, user_id, friend_id, time) VALUES ('$message', '$user_id', '$friend_id', '$time')";
        $result = $this->getConnection()->query($sql);
        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Message sent"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while sending message"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function deleteProfile($user_id)
    {
        $sql3 = "SELECT profile_photo FROM dbusers WHERE user_id = '$user_id'";
        $result3 = $this->getConnection()->query($sql3);
        $row = $result3->fetch_assoc();
        $profile_photo = $row['profile_photo'];
        unlink($profile_photo);

        $sql = "DELETE FROM dbfollowing WHERE user_id = '$user_id' OR following_id = '$user_id'";
        $this->getConnection()->query($sql);

        $sql2 = "DELETE FROM dbusers WHERE user_id = '$user_id'";
        $result2 = $this->getConnection()->query($sql2);

        if ($result2) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Profile deleted"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while deleting profile"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function deleteEvent($event_id)
    {
        $sql2 = "DELETE FROM dblistitems WHERE event_id = '$event_id'";
        $this->getConnection()->query($sql2);
        
        $sql = "DELETE FROM dbevents WHERE event_id = '$event_id'";
        $result = $this->getConnection()->query($sql);

        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Event deleted"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while deleting event"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function deleteReview($review_id)
    {
        $sql = "SELECT user_id, event_id FROM dbreviews WHERE review_id = '$review_id'";
        $result = $this->getConnection()->query($sql);
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $event_id = $row['event_id'];

        $sql2 = "DELETE FROM dbattendees WHERE user_id = '$user_id' AND event_id = '$event_id'";
        $this->getConnection()->query($sql2);

        $sql3 = "SELECT image FROM dbreviews WHERE review_id = '$review_id'";
        $result3 = $this->getConnection()->query($sql3);
        $row = $result3->fetch_assoc();
        $image = $row['image'];
        unlink($image);

        $sql4 = "DELETE FROM dbreviews WHERE review_id = '$review_id'";
        $result = $this->getConnection()->query($sql4);

        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Review deleted"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while deleting review"));
            header("HTTP/1.1 404 Not Found");
        }
    }

    function returnUnreadMessages($user_id)
    {
        $sql = "SELECT * FROM dbmessages WHERE friend_id = '$user_id' AND read_status IS NULL";
        $result = $this->getConnection()->query($sql);
        $messages = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($messages));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No unread messages found"));
        }
    }

    function markRead($user_id, $friend_id)
    {
        $sql = "UPDATE dbmessages SET read_status = '1' WHERE user_id = '$friend_id' AND friend_id = '$user_id'";
        $result = $this->getConnection()->query($sql);
        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Messages marked as read"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while marking messages as read"));
        }
    }

    function returnCategories()
    {
        $sql = "SELECT * FROM dbcategories";
        $result = $this->getConnection()->query($sql);
        $categories = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success($categories));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("No categories found"));
        }
    }

    function addCategory($category_name)
    {
        $sql = "INSERT INTO dbcategories (category) VALUES ('$category_name')";
        $result = $this->getConnection()->query($sql);
        if ($result) {
            header("Content-Type: application/json");
            header("HTTP/1.1 200 OK");
            echo json_encode($this->success("Category added"));
        } else {
            header("Content-Type: application/json");
            echo json_encode($this->error("An error occured while adding category"));
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
    if (!preg_match("/^[a-zA-Z0-9._]*$/", $username)) {
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
