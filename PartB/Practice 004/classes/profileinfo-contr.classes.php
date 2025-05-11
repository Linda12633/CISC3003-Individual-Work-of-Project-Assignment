<?php
// classes/profileinfo-contr.classes.php
class ProfileInfoContr extends ProfileInfo {
    
    private $about;
    private $introTitle;
    private $introText;
    
    public function __construct($about, $introTitle, $introText) {
        $this->about = $about;
        $this->introTitle = $introTitle;
        $this->introText = $introText;
    }
    
    public function defaultProfileInfo($userInfo) {
        $profileAbout = $this->defaultProfileInfo($userInfo);
        return $profileAbout;
    }
    
    public function updateProfileInfo($uid) {
        // Stmtfailed
        $this->setNewInfo($this->about, $this->introTitle, $this->introText, $uid);
    }
}
?>