<?php
// classes/signup.classes.php
class Signup extends Dbh {
    
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }
    
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
    
    protected function getUserId($uid) {
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');
        
        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData[0]["users_id"];
    }
    
    protected function setNewUserProfile($id) {
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');
        
        $defaultAbout = "Hello, I'm new here!";
        $defaultTitle = "About Me";
        $defaultIntro = "I'm excited to be part of this community.";
        
        if (!$stmt->execute(array($defaultAbout, $defaultTitle, $defaultIntro, $id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }
}
?>