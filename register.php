<?php
$pageTitle = "Register";
$stylesheet = "login.css";
require 'templates/header.php';

$usernameError = "";
$emailError = "";
$passwordError = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyusername")  $usernameError = "Username cannot be blank";
    else if ($_GET["error"] == "invalidusername") $usernameError = "Username is invalid";

    if ($_GET["error"] == "emptyemail")  $emailError = "Email cannot be blank";
    else if ($_GET["error"] == "invalidemail") $emailError = "Email is invalid";
    else if ($_GET["error"] == "emailexists") $emailError = "Email already exists";

    if ($_GET["error"] == "emptypassword")  $passwordError = "Password cannot be blank";
    else if ($_GET["error"] == "invalidpassword") $passwordError = "1+ special char, 1+ number, 8+ chars";
}
?>
<main>
    <div class="row h-100">
        <div id="illustration-col" class="col-12 col-md-6 bcg-light">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="illustration">
                    <img src="media/svg/register.svg" alt="">
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img src="media/svg/logo.svg" alt="" class="my-5 py-5 w-50">
            <div class="form-container lighter-gray p-5 rounded shadow d-flex flex-column align-items-center">
                <h3 class="text-white mb-4">Register</h3>
                <form action="backend/validate-signup.php" method="post" class="d-flex flex-column align-items-center w-100">
                    <div class='form-group w-100 position-relative pb-4 input-group'>
                        <span class="input-group-text">@</span>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-end <?php echo ($usernameError === "") ? '' : 'is-invalid' ?>" name="username" id="usernameInput" placeholder="name@example.com" />
                            <label for="usernameInput" class="form-label text-white">Username</label>
                        </div>
                        <small><?php echo $usernameError ?></small>
                    </div>

                    <div class='form-group w-100 position-relative pb-4 form-floating'>
                        <input type="email" class="form-control <?php echo ($emailError === "") ? '' : 'is-invalid' ?>" name="email" id="emailInput" placeholder="name@example.com" />
                        <label for="emailInput" class="form-label text-white">Email</label>
                        <small><?php echo $emailError ?></small>
                    </div>

                    <div class='form-group w-100 position-relative pb-4 form-floating'>
                        <input type="password" class="form-control <?php echo ($passwordError === "") ? '' : 'is-invalid' ?>" name="password" id="passwordInput" placeholder="strong password" />
                        <label for="passwordInput" class="form-label text-white">Password</label>
                        <small><?php echo $passwordError ?></small>
                    </div>

                    <small class="text-white">Already a member? <a href="login.php">Login</a></small>

                    <div class="w-100 mt-4">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg w-100" value="Register" class="submit-button" />
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
require 'templates/footer.php';
?>