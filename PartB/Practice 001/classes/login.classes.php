<?php

// Login model class - handles database interactions
class Login extends Dbh {
    
    // Check user credentials
    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ?;');
        
        if (!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        // Check if user exists
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        
        // Get user data
        $user = $stmt->fetch();
        
        // Verify password
        $checkPassword = password_verify($password, $user["password"]);
        
        if ($checkPassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        
        // Password correct, set session
        session_start();
        $_SESSION["userid"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        
        $stmt = null;
    }
}
