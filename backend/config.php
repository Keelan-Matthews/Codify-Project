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
    private $username = "root";
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
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
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

function apiCall($data) {
    $url = "localhost/IMY-220-Project/api.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "u21549967" . ":" . "");

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($ch);

    if (curl_errno($ch)) {
        die('Couldn\'t send request: ' . curl_error($ch));
    } else {
        $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($resultStatus == 200) {
            echo "<script>console.log('Call was successful')</script>";
        } else {
            echo "<script>console.log('Unsuccessful call')</script>";
    
            die('Request failed: HTTP status code: ' . $resultStatus);
        }
    }
    
    return json_decode($res,true);
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}