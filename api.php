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
            $name = isset($_POST["name"]) ? $_POST["name"] : null;
            $description = isset($_POST["description"]) ? $_POST["description"] : null;
            $date = isset($_POST["date"]) ? $_POST["date"] : null;
            $location = isset($_POST["location"]) ? $_POST["location"] : null;
            $category = isset($_POST["category"]) ? $_POST["category"] : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            $user_id = isset($_POST["user_id"]) ? test_input($_POST["user_id"]) : null;
            $tag1 = isset($_POST["tag1"]) ? test_input($_POST["tag1"]) : null;
            $tag2 = isset($_POST["tag2"]) ? test_input($_POST["tag2"]) : null;
            $tag3 = isset($_POST["tag3"]) ? test_input($_POST["tag3"]) : null;
            $instance->addEvent($name, $description, $date, $location, $category, $image, $user_id, $tag1, $tag2, $tag3);
            break;

        case "edit_event":
            $name = isset($_POST["name"]) ? $_POST["name"] : null;
            $description = isset($_POST["description"]) ? $_POST["description"] : null;
            $date = isset($_POST["date"]) ? $_POST["date"] : null;
            $location = isset($_POST["location"]) ? $_POST["location"] : null;
            $category = isset($_POST["category"]) ? $_POST["category"] : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            $tag1 = isset($_POST["tag1"]) ? test_input($_POST["tag1"]) : null;
            $tag2 = isset($_POST["tag2"]) ? test_input($_POST["tag2"]) : null;
            $tag3 = isset($_POST["tag3"]) ? test_input($_POST["tag3"]) : null;
            $event_id = isset($_POST["event_id"]) ? test_input($_POST["event_id"]) : null;
            $user_id = isset($_POST["user_id"]) ? test_input($_POST["user_id"]) : null;
            $instance->editEvent($name, $description, $date, $location, $category, $image, $tag1, $tag2, $tag3, $event_id, $user_id);
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
            $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : null;
            $name = isset($_POST["name"]) ? $_POST["name"] : null;
            $description = isset($_POST["description"]) ? $_POST["description"] : null;
            $instance->addList($user_id, $name, $description);
            break;

        case "edit_profile":
            $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : null;
            $username = isset($_POST["username"]) ? $_POST["username"] : null;
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            $password = isset($_POST["password"]) ? $_POST["password"] : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            $instance->editProfile($user_id, $username, $email, $password, $image);
            break;

        case "add_review":
            $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : null;
            $event_id = isset($_POST["event_id"]) ? $_POST["event_id"] : null;
            $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            $rating = isset($_POST["rating"]) ? $_POST["rating"] : null;
            $review_date = isset($_POST["review_date"]) ? $_POST["review_date"] : null;
            $instance->addReview($user_id, $event_id, $comment, $image, $rating, $review_date);
            break;

        case "add_to_list":
            $instance->addToList($data->event_id, $data->list_id);
            break;

        case "list_events":
            $instance->returnListEvents($data->list_id);
            break;

        case "followers":
            $instance->returnFollowers($data->profile_id);
            break;

        case "all_users":
            $instance->returnAllUsers();
            break;

        case "get_messages":
            $instance->getMessages($data->user_id, $data->friend_id);
            break;

        case "get_friends":
            $instance->getFriends($data->user_id);
            break;

        case "user":
            $instance->returnUserInfo($data->user_id);
            break;

        case "send_message":
            $instance->sendMessage($data->user_id, $data->friend_id, $data->message, $data->time);
            break;

        case "delete_profile":
            $instance->deleteProfile($data->user_id);
            break;

        case "delete_event":
            $instance->deleteEvent($data->event_id);
            break;

        case "delete_review":
            $instance->deleteReview($data->review_id);
            break;

        case "attended_events":
            $instance->returnAttendedEvents($data->user_id);
            break;

        case "unread_messages":
            $instance->returnUnreadMessages($data->user_id);
            break;

        case "mark_read":
            $instance->markRead($data->user_id, $data->friend_id);
            break;

        case "categories":
            $instance->returnCategories();
            break;

        case "add_category":
            $instance->addCategory($data->category);
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
