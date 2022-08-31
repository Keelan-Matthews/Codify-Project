<?php

if (isset($_POST['submit'])) {

    require_once 'config.php';

    $name = isset($_POST["name"]) ? test_input($_POST["name"]) : null;
    $description = isset($_POST["description"]) ? test_input($_POST["description"]) : null;
    $date = isset($_POST["date"]) ? test_input($_POST["date"]) : null;
    $location = isset($_POST["location"]) ? test_input($_POST["location"]) : null;
    $category = isset($_POST["category"]) ? test_input($_POST["category"]) : null;
    $filename = isset($_FILES['image']) ? $_FILES['image']['name'] : null;

    echo "<script>console.log('name','$filename');</script>";
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
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $image_name =  $name . $_SESSION['user_id'] . $category;
    $image_path = strtolower($target_dir . str_replace(" ","",$image_name) . "." . $ext);

    $allowedFiles =  array('jpg', 'jpeg', 'png');

    if ($_FILES['image']['size'] < 5000000 && in_array($ext, $allowedFiles)) {
        move_uploaded_file($_FILES['image']['tmp_name'], "../" . $image_path);
    } else {
        header('Location: ../dashboard.php?error=incorrectimage');
        exit();
    }

    $data = array(
        'type' => 'add_event',
        'name' => $name,
        'description' => $description,
        'date' => $date,
        'location' => $location,
        'category' => $category,
        'image' => $image_path,
        'user_id' => $_SESSION['user_id']
    );

    $json = apiCall($data);
    
    if ($json) 
    {
        header('Location: ../dashboard.php');
        exit();
    }
    else 
    {
        header('Location: ../dashboard.php?error=failed');
        exit();
    }
    
} else {
    header("location: ../dashboard.php?error=notsubmitted");
    exit();
}
