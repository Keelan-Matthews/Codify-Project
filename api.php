<?php
$json = file_get_contents('php://input');
$data = json_decode($json);

require_once 'backend/config.php';
$instance = Database::getInstance();
$api = API::instance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $type = isset($_POST["type"]) 
        ? $_POST["type"] : 
        (isset($data->type) ? $data->type : null); 

    if (!isset($type)) {
        echo json_encode($api->error("Type parameter has not been specified."));
        return;
    }

    switch ($type) {
        case "login":
            $email = test_input($data->email);
            $password = test_input($data->password);

            $instance->returnUser($email, $password);
            break;

        case "register":
            $email = test_input($data->email);
            $password = test_input($data->password);
            $username = test_input($data->username);

            $instance->addUser($username,$email, $password);
            break;

        case "add_event":
            $name = isset($_POST["name"]) ? test_input($_POST["name"]) : null;
            $description = isset($_POST["description"]) ? test_input($_POST["description"]) : null;
            $date = isset($_POST["date"]) ? test_input($_POST["date"]) : null;
            $location = isset($_POST["location"]) ? test_input($_POST["location"]) : null;
            $category = isset($_POST["category"]) ? test_input($_POST["category"]) : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            $user_id = isset($_POST["user_id"]) ? test_input($_POST["user_id"]) : null;
            $tag1 = isset($_POST["tag1"]) ? test_input($_POST["tag1"]) : null;
            $tag2 = isset($_POST["tag2"]) ? test_input($_POST["tag2"]) : null;
            $tag3 = isset($_POST["tag3"]) ? test_input($_POST["tag3"]) : null;
            $instance->addEvent($name, $description, $date, $location, $category, $image, $user_id, $tag1, $tag2, $tag3);
            break;

        case "home":
            $instance->returnHome($data->user_id);
            break;

        case "home_users":
            $instance->returnHomeUsers($data->user_id);
            break;

        case "user-events":
            $instance->returnUserEvents($data->user_id, $data->profile_id);
            break;

        case "user_lists":
            $instance->returnUserLists($data->profile_id);
            break;

        case "event-details":
            $instance->returnEventDetails($data->event_id, $data->user_id);
            break;

        case "follow":
            $instance->follow($data->user_id, $data->profile_id);
            break;

        case "unfollow":
            $instance->unfollow($data->user_id, $data->profile_id);
            break;

        case "explore":
            $instance->returnExplore();
            break;

        case "add_list":
            $user_id = isset($_POST["user_id"]) ? test_input($_POST["user_id"]) : null;
            $name = isset($_POST["name"]) ? test_input($_POST["name"]) : null;
            $description = isset($_POST["description"]) ? test_input($_POST["description"]) : null;
            $instance->addList($user_id, $name, $description);
            break;

        case "add_to_list":
            $instance->addToList($data->event_id, $data->list_id);
            break;

        case "list_events":
            $instance->returnListEvents($data->list_id);
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
