<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthSystem - Secure User Authentication</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container header-container">
            <a href="index.php" class="logo">
                <i class="fas fa-shield-alt"></i>
                <h1>AuthSystem</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <?php
                      if (isset($_SESSION["userid"])) {
                        echo "<li><a href='profile.php'>Profile</a></li>";
                      }
                    ?>
                </ul>
            </nav>
            <div class="auth-buttons">
                <?php
                  if (isset($_SESSION["userid"])) {
                    echo "<a href='inc/logout.inc.php' class='btn-primary'>Log Out</a>";
                  }
                  else {
                    echo "<a href='login.php' class='btn-primary'>Log In</a>";
                  }
                ?>
            </div>
        </div>
    </header>
    <main></main>