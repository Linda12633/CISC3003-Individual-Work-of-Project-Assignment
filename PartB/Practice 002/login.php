<?php
  include_once 'header.php';
?>

<section class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>Log In</h2>
            <p>Enter your username and password to log in</p>
        </div>
        
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>All fields are required!</div>
                    </div>";
            }
            else if ($_GET["error"] == "wronglogin") {
              echo "<div class='alert alert-danger'>
                      <i class='fas fa-exclamation-circle'></i>
                      <div>Incorrect login details!</div>
                    </div>";
            }
          }
        ?>
        
        <form action="inc/login.inc.php" method="post">
            <div class="form-group">
                <label for="uid">Username / Email</label>
                <input type="text" name="uid" id="uid" class="form-control" placeholder="Enter your username or email">
            </div>
            
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter your password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
            
            <div class="form-footer">
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</section>

<?php
  include_once 'footer.php';
?>