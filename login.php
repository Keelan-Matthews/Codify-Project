<?php
$pageTitle = "Login";
$stylesheet = "login.css";
require 'templates/header.php';

$emailError = "";
$passwordError = "";

if (isset($_GET["error"])) {

    if ($_GET["error"] == "emptyemail")  $emailError = "Email cannot be blank";
    else if ($_GET["error"] == "emailnotexist") $emailError = "Email is not registered";

    if ($_GET["error"] == "emptypassword")  $passwordError = "Password cannot be blank";

    if ($_GET["error"] == "loginfailed")  $emailError = "Email or Password is invalid";
}
?>
<main>
    <div class="row h-100">
        <div id="illustration-col" class="col-12 col-md-6 bcg-light">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="illustration">
                    <img src="media/svg/login.svg" alt="">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img src="media/svg/logo.svg" alt="" class="my-5 py-5 w-75">
            <div class="form-container lighter-gray p-5 rounded shadow d-flex flex-column align-items-center">
                <h3 class="text-white mb-4">Sign in</h3>
                <form action="backend/validate-login.php" method="post" class="d-flex flex-column align-items-center w-100">
                    <div class='form-group w-100 position-relative pb-4'>
                        <label for="emailInput" class="form-label text-white">Email</label>
                        <input type="email" class="form-control <?php echo ($emailError === "") ? '' : 'is-invalid' ?>" name="email" id="emailInput" placeholder="name@example.com" />
                        <small><?php echo $emailError ?></small>
                    </div>

                    <div class='form-group w-100 position-relative pb-4'>
                        <label for="passwordInput" class="form-label text-white">Password</label>
                        <input type="password" class="form-control <?php echo ($passwordError === "") ? '' : 'is-invalid' ?>" name="password" id="passwordInput" placeholder="strong password" />
                        <small><?php echo $passwordError ?></small>
                    </div>

                    <small class="text-white">Not registered? <a href="register.php">Sign up</a></small>

                    <div class="w-100 mt-4">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg w-100" value="Log In" class="submit-button" />
                    </div>
                </form>

                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "stmtfailed") echo "<p>Something went wrong</p>";
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php
$scriptsheet = "login.js";
require "templates/footer.php";
?>