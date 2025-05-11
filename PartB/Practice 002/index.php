<?php
  include_once 'header.php';
?>

<section class="container">
    <div class="hero">
        <h1>Secure Authentication System</h1>
        <p>A robust user authentication system with secure login, registration, and session management.</p>
        
        <?php
          if (isset($_SESSION["userid"])) {
            echo "<div class='user-greeting'>
                    <h3>Welcome back, <span>".$_SESSION["username"]."</span>!</h3>
                    <p>You're successfully logged in. Manage your account or explore our services.</p>
                  </div>";
          }
          else {
            echo "<a href='signup.php' class='btn-primary'>Get Started</a>";
          }
        ?>
    </div>
</section>

<?php
  include_once 'footer.php';
?>