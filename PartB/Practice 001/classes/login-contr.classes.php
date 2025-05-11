<?php

// Login controller class - handles business logic and form validation
class LoginContr extends Login {
    private $username;
    private $password;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    // Login user
    public function loginUser() {
        // Validate form data
        if ($this->emptyInput() == true) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        // Try to login after validation
        $this->getUser($this->username, $this->password);
    }
    
    // Check for empty inputs
    private function emptyInput() {
        if (empty($this->username) || empty($this->password)) {
            return true;
        }
        return false;
    }
}
