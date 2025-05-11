<?php
// profilesettings.php
include_once 'header.php';
include_once 'classes/dbh.classes.php';
include_once 'classes/profileinfo.classes.php';
include_once 'classes/profileinfo-view.classes.php';

if (!isset($_SESSION['userid'])) {
    header("Location: index.php");
    exit();
}

$profileInfo = new ProfileInfoView();
$profileData = $profileInfo->fetchAboutInfo($_SESSION['useruid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="settings-form">
        <div class="settings-card">
            <h2>Profile Settings</h2>
            <form action="includes/profileinfo.inc.php" method="POST">
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea name="about" id="about"><?php 
                        echo $profileData ? htmlspecialchars($profileData['profiles_about']) : ''; 
                    ?></textarea>
                </div>
                <div class="form-group">
                    <label for="introtitle">Introduction Title:</label>
                    <input type="text" name="introtitle" id="introtitle" value="<?php 
                        echo $profileData ? htmlspecialchars($profileData['profiles_introtitle']) : ''; 
                    ?>">
                </div>
                <div class="form-group">
                    <label for="introtext">Introduction Text:</label>
                    <textarea name="introtext" id="introtext"><?php 
                        echo $profileData ? htmlspecialchars($profileData['profiles_introtext']) : ''; 
                    ?></textarea>
                </div>
                <button type="submit" name="submit">Update Profile</button>
            </form>
        </div>
    </main>
</body>
</html>