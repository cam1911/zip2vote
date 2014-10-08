<?php

namespace Zip2Vote\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\AccountRepository")
 */
class Account {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(nullable=false)
     */
    private $email;

    /**
     *
     * @var string
     * 
     * @ORM\Column(nullable=false)
     */
    private $password;

    /**
     * @var null|ValueObject\ExternalProfile
     *
     * @ORM\OneToMany(targetEntity="ValueObject\ExternalProfile")
     * @ORM\Column(nullable=true)
     */
    private $externalProfile;

    /**
     * @var null|ValueObject\Profile
     *
     * @ORM\OneToOne(targetEntity="ValueObject\Profile")
     * @ORM\Column(nullable=false)
     */
    private $profile;

    /**
     * Get email
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set email
     * @param string $email
     * @return Account
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get password
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set password
     * @param string $password
     * @return Account
     */
    public function setPassword($password) {
        $this->password = (string) $password;
        return $this;
    }

    /**
     * Get externalProfile
     * @return null\ValueObject\ExternalProfile
     */
    public function getExternalProfile() {
        return $this->externalProfile;
    }

    /**
     * Set externalProfile
     * @param null|ValueObject\ExternalProfile $externalProfile
     * @return Account
     */
    public function setExternalProfile(ValueObject\externalProfile $externalProfile = null) {
        $this->externalProfile = $externalProfile;
        return $this;
    }

    /**
     * Get pfofile
     * @return null|ValueObject\Profile 
     */
    public function getProfile() {
        return $this->profile;
    }

    /**
     * Set profile
     * @param null|ValueObject\Profile $profile
     * @return Account
     */
    public function setProfile(ValueObject\Profile $profile = null) {
        $this->profile = $profile;
        return $this;
    }

}
