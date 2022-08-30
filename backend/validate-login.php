<?php

if (isset($_POST['submit'])) {

    require_once 'config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

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
        header('Location: ../login.php?error=emailnotexist');
        exit();
    }

    $valid = $instance->getUser($email, $password);

    if ($valid === false) {
        header('Location: ../login.php?error=invalidpassword');
        exit();
    } else {
        $data = array(
            'type' => 'login',
            'email' => $email,
            'password' => $password
        );

        $json = apiCall($data);

        echo "<script>console.log('" . $json . "');</script>";

        // if (!$json['user_id']) {
        //     header('Location: ../login.php?error=loginfailed');
        //     exit();
        // }

        // $_SESSION["signed_in"] = true;
        // $_SESSION["admin"] = $json["data"]["admin"];
        // $_SESSION["user_id"] = $json["data"]["user_id"];
        // $_SESSION["username"] = $json["data"]["username"];
        // $_SESSION["email"] = $json["data"]["email"];

        // header('Location: ../dashboard.php');
        // exit();
    }
} else {
    header("location: ../login.php?error=notsubmitted");
    exit();
}
