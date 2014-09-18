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
     * @var string
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
    public function setEmail($email) {
        $this->email = $email;
        return $this;
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
    public function setPassword($password) {
        $this->password = (string) $password;
        return $this;
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
    public function setExternalProfile($externalProfile) {
        $this->externalProfile = $externalProfile;
        return $this;
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
    public function setProfile($profile) {
        $this->profile = $profile;
        return $this;
    }

}

?>
