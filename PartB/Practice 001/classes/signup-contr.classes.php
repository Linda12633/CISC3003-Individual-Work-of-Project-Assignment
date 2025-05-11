<?php

// Signup controller class - handles business logic and form validation
class SignupContr extends Signup {
    private $username;
    private $email;
    private $password;
    private $passwordRepeat;
    
    public function __construct($username, $email, $password, $passwordRepeat) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }
    
    // Register a new user
    public function signupUser() {
        // Validate form data
        if ($this->emptyInput() == true) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUsername() == true) {
            header("location: ../index.php?error=invalidusername");
            exit();
        }
        if ($this->invalidEmail() == true) {
            header("location: ../index.php?error=invalidemail");
            exit();
        }
        if ($this->passwordMatch() == false) {
            header("location: ../index.php?error=passwordmismatch");
            exit();
        }
        if ($this->usernameTaken() == false) {
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
        }
        
        // Create user after passing all validations
        $this->setUser($this->username, $this->email, $this->password);
    }
    
    // Check for empty inputs
    private function emptyInput() {
        if (empty($this->username) || empty($this->email) || 
            empty($this->password) || empty($this->passwordRepeat)) {
            return true;
        }
        return false;
    }
    
    // Validate username format
    private function invalidUsername() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            return true;
        }
        return false;
    }
    
    // Validate email format
    private function invalidEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    // Check if passwords match
    private function passwordMatch() {
        if ($this->password !== $this->passwordRepeat) {
            return false;
        }
        return true;
    }
    
    // Check if username or email is already taken
    private function usernameTaken() {
        return $this->checkUser($this->username, $this->email);
    }
}
