<?php session_start(); ?>
<!-- header.php -->
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">UserSystem</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <?php
            if (isset($_SESSION['userid'])) {
                echo '<li><a href="profile.php?user=' . $_SESSION['useruid'] . '">Profile</a></li>';
                echo '<li><a href="profilesettings.php">Settings</a></li>';
                echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                echo '<li class="user-info">Welcome, ' . $_SESSION['useruid'] . '</li>';
            }
            ?>
        </ul>
    </nav>
</header>