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
            $email = test_input($data->email);
            $password = test_input($data->password);

            $instance->returnUser($email, $password);
            break;

        case "add_event":
            $instance->addEvent($data->name, $data->description, $data->date, $data->location, $data->category, $data->image, $data->user_id);
            break;

        case "home":
            $instance->returnHome($data->user_id);
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
}
