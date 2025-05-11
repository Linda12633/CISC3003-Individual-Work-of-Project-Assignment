<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User System - Login/Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main class="auth-container">
        <?php
        if (isset($_SESSION['userid'])) {
            header("Location: profile.php?user=" . $_SESSION['useruid']);
            exit();
        }
        ?>
        
        <div class="form-container">
            <!-- Login Form -->
            <div id="loginForm" class="auth-form active">
                <h2>Login</h2>
                <form action="includes/login.inc.php" method="POST">
                    <div class="form-group">
                        <label for="uid">Username/Email:</label>
                        <input type="text" name="uid" id="uid" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="pwd" id="pwd" required>
                    </div>
                    <button type="submit" name="submit">Login</button>
                </form>
                <div class="switch-form">
                    Don't have an account? <a href="#" id="showSignup">Sign Up</a>
                </div>
            </div>
            
            <!-- Signup Form -->
            <div id="signupForm" class="auth-form">
                <h2>Sign Up</h2>
                <form action="includes/signup.inc.php" method="POST">
                    <div class="form-group">
                        <label for="uid">Username:</label>
                        <input type="text" name="uid" id="uid" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="pwd" id="pwd" required>
                    </div>
                    <div class="form-group">
                        <label for="pwdrepeat">Confirm Password:</label>
                        <input type="password" name="pwdrepeat" id="pwdrepeat" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
                <div class="switch-form">
                    Already have an account? <a href="#" id="showLogin">Login</a>
                </div>
            </div>
        </div>
    </main>
    
    <script src="js/script.js"></script>
</body>
</html>