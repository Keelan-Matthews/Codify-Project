<?php

if (isset($_POST['submit'])) {

    require_once 'config.php';

    $name = isset($_POST["name"]) ? test_input($_POST["name"]) : null;
    $description = isset($_POST["description"]) ? test_input($_POST["description"]) : null;
    $date = isset($_POST["date"]) ? test_input($_POST["date"]) : null;
    $location = isset($_POST["location"]) ? test_input($_POST["location"]) : null;
    $category = isset($_POST["category"]) ? test_input($_POST["category"]) : null;
    $filename = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

    if ($name == null) {
        header('Location: ../dashboard.php?error=emptyname');
        exit();
    }

    if ($location == null) {
        header('Location: ../dashboard.php?error=emptylocation');
        exit();
    }

    if ($date == null) {
        header('Location: ../dashboard.php?error=emptydate');
        exit();
    }

    if ($category == null) {
        header('Location: ../dashboard.php?error=emptycategory');
        exit();
    }

    if ($description == null) {
        header('Location: ../dashboard.php?error=emptydescription');
        exit();
    }

    if ($filename == null) {
        header('Location: ../dashboard.php?error=emptyimage');
        exit();
    }

    $target_dir = "media/events/";

    $allowedFiles =  array('jpg', 'jpeg', 'png');
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($_FILES['image']['size'] < 5000000 && in_array($ext, $allowedFiles)) {
        $target_file = $target_dir . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        header('Location: ../dashboard.php?error=incorrectimage');
        exit();
    }

    $instance = Database::getInstance();
    $conn = $instance->getConnection();

    $id = $_SESSION['user_id'];

    $mysqli->query("INSERT INTO dbevents (`name`, `description`, `date`, `location`, `image`, `user_id`) VALUES ('$name', '$description', '$date', '$location', '$filename', '$id')");

} else {
    header("location: ../dashboard.php?error=notsubmitted");
    exit();
}
