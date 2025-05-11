<?php
// profile.php
include_once 'header.php';
include_once 'classes/dbh.classes.php';
include_once 'classes/profileinfo.classes.php';
include_once 'classes/profileinfo-view.classes.php';

if (!isset($_SESSION['userid'])) {
    header("Location: index.php");
    exit();
}

$profileInfo = new ProfileInfoView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'User'; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <h1 class="profile-title"><?php echo isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'User'; ?></h1>
                <p class="profile-subtitle">Member Profile</p>
            </div>
            
            <div class="profile-content">
                <?php
                if (isset($_GET['user'])) {
                    $profileData = $profileInfo->fetchAboutInfo($_GET['user']);
                    if ($profileData) {
                        echo "<h3>About</h3>";
                        echo "<p>" . htmlspecialchars($profileData['profiles_about']) . "</p>";
                        
                        echo "<h3>" . htmlspecialchars($profileData['profiles_introtitle']) . "</h3>";
                        echo "<p>" . htmlspecialchars($profileData['profiles_introtext']) . "</p>";
                    } else {
                        echo "<p>No profile information available yet.</p>";
                        if ($_GET['user'] === $_SESSION['useruid']) {
                            echo '<p><a href="profilesettings.php">Add your profile information</a></p>';
                        }
                    }
                } else {
                    echo "<p>Please specify a user to view their profile.</p>";
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>