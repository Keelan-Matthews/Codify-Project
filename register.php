<?php
$pageTitle = "Register";
$stylesheet = "login.css";
require 'templates/header.php';

$nameError = "";
$surnameError = "";
$emailError = "";
$passwordError = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyname")  $nameError = "Name cannot be blank";
    else if ($_GET["error"] == "invalidname") $nameError = "Name is invalid";

    if ($_GET["error"] == "emptysurname")  $surnameError = "Surname cannot be blank";
    else if ($_GET["error"] == "invalidsurname") $surnameError = "Surname is invalid";

    if ($_GET["error"] == "emptyemail")  $emailError = "Email cannot be blank";
    else if ($_GET["error"] == "invalidemail") $emailError = "Email is invalid";
    else if ($_GET["error"] == "emailexists") $emailError = "Email already exists";

    if ($_GET["error"] == "emptypassword")  $passwordError = "Password cannot be blank";
    else if ($_GET["error"] == "invalidpassword") $passwordError = "Password is invalid";
}
?>
<main>
    <div class="row h-100">
        <div class="col-12 col-md-6 bcg-light d-flex align-items-center justify-content-center" id="illustration-col">
            <div class="illustration">
                <img src="media/svg/register.svg" alt="">
            </div>
        </div>
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img src="media/svg/logo.svg" alt="" class="my-5 py-5 w-75">
            <div class="form-container lighter-gray p-5 rounded shadow d-flex flex-column align-items-center">
                <h3 class="text-white mb-4">Register</h3>
                <form action="backend/validate-login.php" method="post" class="d-flex flex-column align-items-center w-100">
                    <div <?php echo ($emailError === "") ? "class='form-group w-100'" : "class='form-group w-100 error'" ?>>
                        <label for="emailInput" class="form-label text-white">Email</label>
                        <input type="email" class="form-control" name="email" id="emailInput" placeholder="name@example.com" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="invalid-feedback"><?php echo $emailError ?></div>
                    </div>

                    <div <?php echo ($passwordError === "") ? "class='form-group w-100 my-3'" : "class='form-group w-100 my-3 error'" ?>>
                        <label for="passwordInput" class="form-label text-white">Password</label>
                        <input type="password" class="form-control" name="password" id="passwordInput" placeholder="strong password" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="invalid-feedback"><?php echo $passwordError ?></div>
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
$scriptsheet = "register.js";
require 'templates/footer.php';
?>