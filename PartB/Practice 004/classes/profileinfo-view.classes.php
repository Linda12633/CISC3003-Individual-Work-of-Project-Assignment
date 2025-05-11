<?php
// classes/profileinfo-view.classes.php
class ProfileInfoView extends ProfileInfo {
    
    public function fetchAboutInfo($userUid) {
        $profileInfo = $this->getProfileInfo($userUid);
        
        if ($profileInfo) {
            return $profileInfo[0];
        } else {
            return false;
        }
    }
    
    public function fetchIntroInfo($userUid) {
        $profileInfo = $this->getProfileInfo($userUid);
        
        if ($profileInfo) {
            return array(
                "introTitle" => $profileInfo[0]["profiles_introtitle"],
                "introText" => $profileInfo[0]["profiles_introtext"]
            );
        } else {
            return false;
        }
    }
}
?>