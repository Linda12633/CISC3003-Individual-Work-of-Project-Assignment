<?php
  include_once 'header.php';
?>

<section class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>Create Account</h2>
            <p>Join us today to access exclusive features</p>
        </div>
        
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>All fields are required!</div>
                    </div>";
            }
            else if ($_GET["error"] == "invaliduid") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>Username can only contain letters and numbers!</div>
                    </div>";
            }
            else if ($_GET["error"] == "invalidemail") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>Please enter a valid email address!</div>
                    </div>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>Passwords don't match!</div>
                    </div>";
            }
            else if ($_GET["error"] == "usernametaken") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>Username or email already taken!</div>
                    </div>";
            }
            else if ($_GET["error"] == "stmtfailed") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>Something went wrong, please try again!</div>
                    </div>";
            }
            else if ($_GET["error"] == "none") {
              echo "<div class='alert alert-success'>
                      <i class='fas fa-check-circle'></i>
                      <div>You have signed up successfully! <a href='login.php'>Log in now</a>.</div>
                    </div>";
            }
          }
        ?>
        
        <form action="inc/signup.inc.php" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
            </div>
            
            <div class="form-group">
                <label for="uid">Username</label>
                <input type="text" name="uid" id="uid" class="form-control" placeholder="Choose a username">
            </div>
            
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Create a password">
            </div>
            
            <div class="form-group">
                <label for="pwdrepeat">Confirm Password</label>
                <input type="password" name="pwdrepeat" id="pwdrepeat" class="form-control" placeholder="Confirm your password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
            
            <div class="form-footer">
                <p>Already have an account? <a href="login.php">Log In</a></p>
            </div>
        </form>
    </div>
</section>

<?php
  include_once 'footer.php';
?>