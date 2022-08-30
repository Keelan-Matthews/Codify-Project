<?php
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    require_once 'backend/config.php';
    $instance = Database::getInstance();
    $api = API::instance();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if ($data->type != 'login') {
            if (!isset($data->key)) {
                echo json_encode($api->error("Authentication not granted, key not specified."));
                return;
            }
        }

        if (isset($_SESSION['key'])) {
            if ($_SESSION['key'] != $data->key) {
                echo json_encode($api->error("Invalid API key has been set."));
                return;
            }
        }

        if (!isset($data->type)) {
            echo json_encode($api->error("Type parameter has not been specified."));
            return;
        }

        $reqTypes = ["home","explore","login","rate","chat","add_event"];
        if (!in_array($data->type,$reqTypes)) {
            echo json_encode($api->error("Incorrect type parameter has been specified."));
            return;
        }

        // if (isset($data->return)) {
        //     $returnTypes = ["title", "description", "author", "rating", "image","section", "date", "url", "*"];
        //     if (empty(array_intersect($returnTypes, $data->return))) {
        //         echo json_encode($api->error("Incorrect return parameter has been specified."));
        //         return;
        //     }
        // }

        // if ($data->type == 'info' && !isset($data->return)) {
        //     echo json_encode($api->error("No return parameter has been specified."));
        //     return;
        // }

        switch ($data->type) {
            // case "info":
            //     (!isset($data->title)) ? $title = "" : $title = $data->title;
            //     (!isset($data->author)) ? $author = "" : $author = $data->author;
            //     (!isset($data->date)) ? $date = "" : $date = $data->date;
            //     (!isset($data->rating)) ? $rating = "" : $rating = $data->rating;

            //     $api->getArticles($instance, $title, $author, $date, $rating, $data->return);
            //     break;

            case "login":
                $email = stripcslashes($data->email);
                $password = stripcslashes($data->password);
                // $email = mysql_real_escape_string($instance, $email);
                // $password = mysql_real_escape_string($instance, $password);

                $api->returnKey($instance, $email, $password);
                break;

            // case "update":
            //     $key = $data->key;
            //     (!isset($data->category)) ? $category = "" : $category = $data->category;
            //     (!isset($data->tags)) ? $tags = "" : $tags = $data->tags;

            //     $api->setPreferences($instance, $key, $category, $tags);
            //     break;

            // case "chat":
            //     echo json_encode($api->error("API type chat does not exist"));
            //     break;

            // case "rate":
            //     $key = $data->key;
            //     if (!isset($data->article)) 
            //         echo json_encode($api->error("No article has been assigned"));
            //     else 
            //         $articleTitle = $data->article;
                
            //     $rating = $data->rating;

            //     $api->setRating($instance, $key, $articleTitle, $rating);
            //     break;
            
            default:
                echo json_encode($api->error("An error occured while processing request"));
        }
    }
    else {
        echo json_encode($api->error("Type not POST"));
    }

    class API {
        private static $instance = null;

        public static function instance() {
            if (!self::$instance) self::$instance = new API();
            return self::$instance;
        }

        function error($message) {
            return ["status"=> "failed", "timestamp"=>time(), "data"=>["message"=>$message]];
        }

        // function getHomeEvents($instance, $title, $author, $date, $rating, $types) {

        //     $articles = [];
        //     if ($title != "") {
        //         $query = "SELECT * FROM articles WHERE title LIKE '%$title%' LIMIT 20";
        //         $res = $instance->getConn()->query($query);

        //         $row = null;
        //         while ($row = $res->fetch_assoc()) {
        //             $articles[] = $row;
        //         }
        //     }

        //     if ($author != "") {
        //         $query = "SELECT * FROM articles WHERE author LIKE ' $author ' LIMIT 20";
        //         $res = $instance->getConn()->query($query);

        //         $row = null;
        //         while ($row = $res->fetch_assoc()) {
        //             $articles[] = $row;
        //         }
        //     }

        //     if ($date != "") {
        //         $query = "SELECT * FROM articles WHERE `date` LIKE '%$date%' OR `date` LIKE '%05/05/22%' ORDER BY 'date' LIMIT 20";
        //         $res = $instance->getConn()->query($query);

        //         $row = null;
        //         while ($row = $res->fetch_assoc()) {
        //             $articles[] = $row;
        //         }
        //     }

        //     if ($rating != "") {
        //         $query = "SELECT * FROM articles WHERE rating = '.$rating.' LIMIT 20";
        //         $res = $instance->getConn()->query($query);

        //         $row = null;
        //         while ($row = $res->fetch_assoc()) {
        //             $articles[] = $row;
        //         }
        //     }

        //     if ($title == "" && $date == "" && $author == "" && $rating == "") {
        //         $query = "SELECT * FROM articles LIMIT 20";
        //         $res = $instance->getConn()->query($query);

        //         $row = null;
        //         while ($row = $res->fetch_assoc()) {
        //             $articles[] = $row;
        //         }
        //     }

        //     $validType = ["title", "description", "author", "rating", "image","section", "date", "url", "*"];
        //     $correctType = array_intersect($types, $validType);

        //     if (empty($articles)) {
        //         $resp = ["status"=>"success", "timestamp"=>time(), "data"=>["data"=>"No articles match search query"]];
        //         echo json_encode($resp);
        //         return;
        //     }

        //     $data = [];
        //     $curr = null;
        //     $index = 0;
        //     foreach($articles as $article) {
        //         if ($index < 20) {
        //             foreach($types as $type) {
        //                 if ($type == "*") {
        //                     $curr = $article;
        //                     unset($curr["id"]);
        //                     break;
        //                 }
        //                 $curr[$type] = $article[$type];
        //             }
        //             $data[] = $curr;
        //             $index++;
        //         }
        //     }

        //     $resp =  ["status"=>"success", "timestamp"=>time(), "data"=>$data];
        //     header("HTTP/1.1 200 OK");
		//     header("Content-Type: application/json");
        //     echo json_encode($resp);
        // }

        // function returnKey($instance, $email, $password) {
        //     $query = "SELECT password FROM users WHERE email = '$email'";
        //     $result = $instance->getConn()->query($query);
        //     $pwd = mysqli_fetch_array($result)[0];

        //     if ($pwd === '') {
        //         echo json_encode(self::error("Email does not exist in the database"));
        //         return;
        //     }

        //     $verify = password_verify($password, $pwd);

        //     if (!$verify) {
        //         echo json_encode(self::error("Incorrect password"));
        //         return;
        //     }

        //     $query = "SELECT name FROM users WHERE email = '$email'";
        //     $result = $instance->getConn()->query($query);
        //     $name = mysqli_fetch_array($result)[0];

        //     $query = "SELECT surname FROM users WHERE email = '$email'";
        //     $result = $instance->getConn()->query($query);
        //     $surname = mysqli_fetch_array($result)[0];

        //     $query = "SELECT api FROM users WHERE email = '$email'";
        //     $result = $instance->getConn()->query($query);
        //     $api = mysqli_fetch_array($result)[0];

        //     $query = "SELECT category FROM users WHERE email = '$email'";
        //     $result = $instance->getConn()->query($query);
        //     $category = mysqli_fetch_array($result)[0];

        //     $query = "SELECT tag FROM users WHERE email = '$email'";
        //     $result = $instance->getConn()->query($query);
        //     $tag = mysqli_fetch_array($result)[0];

        //     $resp =  ["status"=>"success", "timestamp"=>time(), "data"=>["name"=>$name, "surname"=>$surname, "key"=>$api, "category"=>$category, "tag"=>$tag]];
        //     header("HTTP/1.1 200 OK");
		//     header("Content-Type: application/json");
        //     echo json_encode($resp);
        // }

        // function setRating($instance, $key, $article, $rating) {
        //     $query = "SELECT `id` FROM `articles` WHERE `title` = '$article'";
        //     $result = $instance->getConn()->query($query);
        //     $articleId = mysqli_fetch_array($result)[0];

        //     $query = "SELECT `id` FROM `users` WHERE `api` = '$key'";
        //     $result = $instance->getConn()->query($query);
        //     $userId = mysqli_fetch_array($result)[0];

        //     // See if exists
        //     $query = "SELECT COUNT(*) FROM `rating` WHERE `article_id` = '$articleId' AND `user_id` = $userId";
        //     $result = $instance->getConn()->query($query);
        //     $exists = mysqli_fetch_array($result)[0];

        //     if ($exists == 0) {
        //         $query = "INSERT INTO `rating` (article_id, rating, user_id) VALUES ($articleId, $rating, $userId)";
        //         $instance->getConn()->query($query);
        //     }
        //     else {
        //         $query = "UPDATE `rating` SET `rating` = '$rating' WHERE `article_id` = $articleId AND `user_id` = $userId";
        //         $instance->getConn()->query($query);
        //     }
            
        //     $query = "SELECT FORMAT(AVG(`rating`), 2) FROM `rating` WHERE `article_id` = '$articleId'";
        //     $result = $instance->getConn()->query($query);
        //     $avgRating = mysqli_fetch_array($result)[0];

        //     $query = "UPDATE `articles` SET `rating` = '$avgRating' WHERE `id` = '$articleId'";
        //     $result = $instance->getConn()->query($query);

        //     $resp =  ["status"=>"success", "timestamp"=>time(), "data"=>["articleID"=>$articleId, "rating"=>$rating, "userID"=>$userId]];
        //     header("HTTP/1.1 200 OK");
		//     header("Content-Type: application/json");
        //     echo json_encode($resp);
        // }
    }