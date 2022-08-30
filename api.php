<?php
$json = file_get_contents('php://input');
$data = json_decode($json);

require_once 'backend/config.php';
$instance = Database::getInstance();
$api = API::instance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($data->type)) {
        echo json_encode($api->error("Type parameter has not been specified."));
        return;
    }

    $reqTypes = ["home", "explore", "login", "rate", "chat", "add_event"];
    if (!in_array($data->type, $reqTypes)) {
        echo json_encode($api->error("Incorrect type parameter has been specified."));
        return;
    }

    switch ($data->type) {
        case "login":
            $email = stripcslashes($data->email);
            $password = stripcslashes($data->password);
            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);

            $api->returnUser($instance, $email, $password);
            break;

        default:
            echo json_encode($api->error("An error occured while processing request"));
    }
} else {
    echo json_encode($api->error("Type not POST"));
}

class API
{
    private static $instance = null;

    public static function instance()
    {
        if (!self::$instance) self::$instance = new API();
        return self::$instance;
    }

    function error($message)
    {
        return ["status" => "failed", "timestamp" => time(), "data" => ["message" => $message]];
    }

    function success($data)
    {
        return ["status" => "success", "timestamp" => time(), "data" => $data];
    }

    function returnUser($instance, $email, $password)
    {
        $sql = "SELECT * FROM dbusers WHERE `email` = '$email' AND `password` = '$password'";
        $result = $instance->getConnection()->query($sql);
        $user = "";
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = $this->success([$row]);
            header("HTTP/1.1 200 OK");
        } else {
            $user = $this->error("User not found");
            header("HTTP/1.1 404 Not Found");
        }
        header("Content-Type: application/json");
        echo json_encode($user);
    }
}
