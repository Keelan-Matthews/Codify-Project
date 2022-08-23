<?php
    $pageTitle = "Login";
    $stylesheet = "styles/login.css";
    include 'templates/header.php';

    $emailError = "";
    $passwordError = "";

    if (isset($_GET["error"])) {

        if ($_GET["error"] == "emptyemail")  $emailError = "Email cannot be blank";
        else if ($_GET["error"] == "emailnotexist") $emailError = "Email is not registered";

        if ($_GET["error"] == "emptypassword")  $passwordError = "Password cannot be blank";

        if ($_GET["error"] == "loginfailed")  $emailError = "Email or Password is invalid";
    }
?>
<body>
    <main>
        <div class="form-container">
            <h1 class="form-header">Login</h1>
            <form action="backend/validate-login.php" method="post" class="signup-form" id="form">
                <div <?php echo ($emailError === "") ? "class='form-control'" : "class='form-control error'" ?>>
                    <label for="emailInput">Email</label>
                    <input type="email" name="email" id="emailInput" placeholder="name@example.com" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $emailError ?></small>
                </div>

                <div <?php echo ($passwordError === "") ? "class='form-control'" : "class='form-control error'" ?>>
                    <label for="passwordInput">Password</label>
                    <input type="password" name="password" id="passwordInput" placeholder="Strong password" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $passwordError ?></small>
                </div>

                <small>Not registered? <a href="signup.php">Sign up</a></small>

                <input type="submit" name="submit" value="Log In" class="submit-button" />
            </form>

            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "stmtfailed") echo "<p>Something went wrong</p>";
            }
            ?>
        </div>
    </main>
</body>

</html>