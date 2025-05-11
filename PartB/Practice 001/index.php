<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="navbar-title">Authentication System</a>
    <div class="navbar-nav">
        <?php
            if (isset($_SESSION["userid"])) {
        ?>
            <a href="#">Hello, <?php echo $_SESSION["username"]; ?></a>
            <a href="includes/logout.inc.php">Logout</a>
        <?php
            } else {
        ?>
            <a href="#login">Login</a>
            <a href="#signup">Register</a>
        <?php
            }
        ?>
    </div>
</nav>

<div class="container">
    <?php
        if (isset($_SESSION["userid"])) {
    ?>
        <div class="welcome-container">
            <h1>Welcome back, <?php echo $_SESSION["username"]; ?>!</h1>
            <p>You are successfully logged into the system.</p>
        </div>
    <?php
        } else {
    ?>
        <div class="welcome-container">
            <h1>Welcome to the Authentication System</h1>
            <p>Please login or register a new account to continue.</p>
        </div>

        <div class="auth-forms">
            <!-- Login Form -->
            <div class="form-container" id="login">
                <h2>Login</h2>
                
                <?php
                    // Display login error messages
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class='error'>Please fill in all fields!</p>";
                        }
                        else if ($_GET["error"] == "usernotfound") {
                            echo "<p class='error'>User not found!</p>";
                        }
                        else if ($_GET["error"] == "wrongpassword") {
                            echo "<p class='error'>Incorrect password!</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed") {
                            echo "<p class='error'>System error, please try again later!</p>";
                        }
                    }
                ?>
                
                <form action="includes/login.inc.php" method="post">
                    <div class="form-group">
                        <label for="username">Username/Email</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username or email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                    </div>
                    <button type="submit" name="submit" class="btn">Login</button>
                </form>
            </div>
            
            <!-- Registration Form -->
            <div class="form-container" id="signup">
                <h2>Register</h2>
                
                <?php
                    // Display registration error/success messages
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class='error'>Please fill in all fields!</p>";
                        }
                        else if ($_GET["error"] == "invalidusername") {
                            echo "<p class='error'>Username can only contain letters and numbers!</p>";
                        }
                        else if ($_GET["error"] == "invalidemail") {
                            echo "<p class='error'>Please enter a valid email address!</p>";
                        }
                        else if ($_GET["error"] == "passwordmismatch") {
                            echo "<p class='error'>Passwords don't match!</p>";
                        }
                        else if ($_GET["error"] == "usernameoremailtaken") {
                            echo "<p class='error'>Username or email already in use!</p>";
                        }
                        else if ($_GET["error"] == "stmtfailed") {
                            echo "<p class='error'>System error, please try again later!</p>";
                        }
                        else if ($_GET["error"] == "none") {
                            echo "<p class='success'>Registration successful! Please login.</p>";
                        }
                    }
                ?>
                
                <form action="includes/signup.inc.php" method="post">
                    <div class="form-group">
                        <label for="signup-username">Username</label>
                        <input type="text" name="username" id="signup-username" class="form-control" placeholder="Create a username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input type="password" name="password" id="signup-password" class="form-control" placeholder="Create a password">
                    </div>
                    <div class="form-group">
                        <label for="passwordrepeat">Confirm Password</label>
                        <input type="password" name="passwordrepeat" id="passwordrepeat" class="form-control" placeholder="Repeat your password">
                    </div>
                    <button type="submit" name="submit" class="btn">Register</button>
                </form>
            </div>
        </div>
    <?php
        }
    ?>
</div>

<footer>
    <p>&copy; 2025 Authentication System | All Rights Reserved</p>
</footer>

</body>
</html>
