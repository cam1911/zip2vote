<?php

namespace Zip2Vote\VoteBundle\Entity;

class Account {

    /**
     *
     * @var Email
     */
    private $email;

    /**
     *
     * @var string length=512
     */
    private $password;
    /**
     *
     * @var ExternalProfile
     */
    private $externalProfile;
    /**
     *
     * @var Profile
     */
    private $profile;
    
    function __construct(Email $email, string $password, ExternalProfile $externalProfile, Profile $profile) {
        $this->email = $email;
        $this->password = $password;
        $this->externalProfile = $externalProfile;
        $this->profile = $profile;
    }
    
    /**
     * 
     * @return Email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\Email $email
     */
    public function setEmail(Email $email) {
        $this->email = $email;
    }

    /**
     * 
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * 
     * @param string $password
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * 
     * @return ExternalProfile
     */
    public function getExternalProfile() {
        return $this->externalProfile;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\ExternalProfile $externalProfile
     */
    public function setExternalProfile(ExternalProfile $externalProfile) {
        $this->externalProfile = $externalProfile;
    }

    /**
     * 
     * @return Profile
     */
    public function getProfile() {
        return $this->profile;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\Profile $profile
     */
    public function setProfile(Profile $profile) {
        $this->profile = $profile;
    }




}

?>
