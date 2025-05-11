<?php
// classes/profileinfo.classes.php
class ProfileInfo extends Dbh {
    
    protected function defaultProfileInfo($userUid) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ?;');
        
        if (!$stmt->execute(array($userUid))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
        
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: profile.php?error=usernotfound");
            exit();
        }
        
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }
    
    protected function getProfileInfo($userUid) {
        $stmt = $this->connect()->prepare('SELECT * FROM profiles 
            INNER JOIN users ON profiles.users_id = users.users_id 
            WHERE users.users_uid = ?;');
        
        if (!$stmt->execute(array($userUid))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
        
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: profile.php");
            exit();
        }
        
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }
    
    protected function setNewInfo($about, $introTitle, $introText, $uid) {
        $stmt = $this->connect()->prepare('UPDATE profiles 
            SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? 
            WHERE users_id = ?;');
        
        if (!$stmt->execute(array($about, $introTitle, $introText, $uid))) {
            $stmt = null;
            header("location: profilesettings.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }
}
?>