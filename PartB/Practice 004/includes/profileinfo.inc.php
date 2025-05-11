<?php
// includes/profileinfo.inc.php
session_start();

if (isset($_POST["submit"])) {
    // Grabbing the data
    $about = $_POST["about"];
    $introTitle = $_POST["introtitle"];
    $introText = $_POST["introtext"];
    
    // Instantiate ProfileInfoContr class
    include "../classes/dbh.classes.php";
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";
    $profileInfo = new ProfileInfoContr($about, $introTitle, $introText);
    
    // Running error handlers and user profile update
    $profileInfo->updateProfileInfo($_SESSION["userid"]);
    
    // Going back to profile settings page
    header("location: ../profilesettings.php?error=none");
}
?>