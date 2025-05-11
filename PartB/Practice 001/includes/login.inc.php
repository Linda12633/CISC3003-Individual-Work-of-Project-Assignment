<?php

// Make sure the form was submitted using POST method
if (isset($_POST["submit"])) {
    
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Include required classes
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    
    // Create controller object and call login method
    $login = new LoginContr($username, $password);
    $login->loginUser();
    
    // Redirect to homepage after successful login
    header("location: ../index.php");
    
} else {
    // If user directly accesses this page instead of submitting form, redirect to homepage
    header("location: ../index.php");
    exit();
}
