<?php

// Signup model class - handles database interactions
class Signup extends Dbh {
    
    // Check if user already exists
    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');
        
        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if ($stmt->rowCount() > 0) {
            return false;
        }
        return true;
    }
    
    // Add new user to database
    protected function setUser($username, $email, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?);');
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        if (!$stmt->execute(array($username, $email, $hashedPassword))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }
}
