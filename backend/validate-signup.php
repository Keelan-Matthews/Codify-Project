<?php
    if(isset($_POST['submit'])) {
        //Connect to database
        require_once 'config.php';

        //get form data
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) !== false) {
            header('Location: ../register.php?error=emptyusername');
            exit();
        }

        if (invalidUsername($username) !== false) {
            header('Location: ../register.php?error=invalidusername');
            exit();
        }

        if (empty($email) !== false) {
            header('Location: ../register.php?error=emptyemail');
            exit();
        }

        if (invalidEmail($email) !== false) {
            header('Location: ../register.php?error=invalidemail');
            exit();
        }

        if (empty($password) !== false) {
            header('Location: ../register.php?error=emptypassword');
            exit();
        }

        if (invalidPassword($password) !== false) {
            header('Location: ../register.php?error=invalidpassword');
            exit();
        }

        $instance = Database::getInstance();
        $conn = $instance->getConnection();

        if (emailExists($conn, $email) !== false) {
            header('Location: ../register.php?error=emailexists');
            exit();
        }

        $instance->addUser($username, $email, $password);
        header("location: ../dashboard.php");
        exit();
    } else {
        header("location: ../register.php?error=notsubmitted");
        exit();
    }
?>