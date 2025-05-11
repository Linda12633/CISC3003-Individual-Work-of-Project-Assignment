<?php
// classes/signup-contr.classes.php
class SignupContr extends Signup {
    
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }
    
    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        
        $this->setUser($this->uid, $this->pwd, $this->email);
        
        $profileUserId = $this->getUserId($this->uid);
        $this->setNewUserProfile($profileUserId);
    }
    
    private function emptyInput() {
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            return false;
        } else {
            return true;
        }
    }
    
    private function invalidUid() {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            return false;
        } else {
            return true;
        }
    }
    
    private function invalidEmail() {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
    
    private function pwdMatch() {
        if ($this->pwd !== $this->pwdRepeat) {
            return false;
        } else {
            return true;
        }
    }
    
    private function uidTakenCheck() {
        if (!$this->checkUser($this->uid, $this->email)) {
            return false;
        } else {
            return true;
        }
    }
}
?>