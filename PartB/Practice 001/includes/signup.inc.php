<?php

// Make sure the form was submitted using POST method
if (isset($_POST["submit"])) {
    
    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordrepeat"];
    
    // Include required classes
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    
    // Create controller object and call signup method
    $signup = new SignupContr($username, $email, $password, $passwordRepeat);
    $signup->signupUser();
    
    // Redirect to homepage with success message after successful signup
    header("location: ../index.php?error=none");
    
} else {
    // If user directly accesses this page instead of submitting form, redirect to homepage
    header("location: ../index.php");
    exit();
}
