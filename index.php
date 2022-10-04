<?php
$pageTitle = "Welcome";
$stylesheet = "splash.css";
require 'templates/header.php';

if ($_SESSION["signed_in"] == true) {
    header("Location: ./dashboard.php");
}

?>
<main>
    <div class="row">
        <div class="col-12 order-2 order-md-1 col-md-7 d-flex align-items-center">
            <div class="hero-container">
                <class class="w-100 d-flex justify-content-center">
                    <div class="logo">
                        <img src="media/svg/logo.svg" alt="" class="pb-5 pt-5 pt-md-0 w-100 h-100">
                    </div>
                </class>
                <!-- Please note the indentation is intentional to preserve correct tab amounts -->
                <pre class="rounded shadow text-white lighter-gray p-1 p-md-3 pe-md-5" id="code-container">
                    <code class="fs-5">
    if (user<span class="text-secondary">.events</span> === 'need') {
        switch user<span class="text-secondary">.events</span>.type {
        <span class="text-secondary">case</span> 'game_jams':
            <a href="register.php" class="d-inline-block">sign_up;</a>
            break;
        <span class="text-secondary">case</span> 'hackathons':
            <a href="register.php" class="d-inline-block">sign_up;</a>
            break;
        <span class="text-secondary">case</span> 'default:
            <a href="register.php" class="d-inline-block">sign_up;</a>
        }
    }
                    </code>
                </pre>
                <div class="w-100 d-flex d-md-block justify-content-center">
                    <a href="register.php">
                        <div class="btn btn-primary btn-lg">>_run.sh</div>
                    </a>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-5 order-1 order-md-2 d-flex flex-column align-items-end justify-content-between bg-light circle-background pe-5">
            <div class="d-flex mt-4">
                <a href="login.php">
                    <div class="btn btn-secondary">Login</div>
                </a>
                <a href="register.php">
                    <div class="text-black p-1 ps-4">
                        <p>Register</p>
                    </div>
                </a>
            </div>
            <div class="illustration">
                <img src="./media/svg/splash.svg" alt="">
            </div>
        </div>
    </div>
</main>
<?php
$scriptsheet = "splash.js";
require "templates/footer.php";
?>