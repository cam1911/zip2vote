<?php

namespace Zip2Vote\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\ProfileRepository")
 */
class Profile {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var null|ValueObject\Name
     *
     * @ORM\ManyToOne(targetEntity="\Zip2Vote\VoteBundle\Entity\ValueObject\Name", cascade={"persist"})
     */
    private $name;

    /**
     * @var null|ValueObject\Address
     *
     * @ORM\ManyToOne(targetEntity="\Zip2Vote\VoteBundle\Entity\ValueObject\Address", cascade={"persist"})
     */
    private $address;

    /**
     * @var null|\DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dob;

    /**
     * @var null|Location
     *
     * @ORM\ManyToOne(targetEntity="Location", cascade={"persist"})
     */
    private $location;

    /**
     * @var null|VoterRegistration
     *
     * @ORM\OneToOne(targetEntity="VoterRegistration", cascade={"persist"})
     */
    private $voterRegistration;

    /**
     * If null, the person is considered an Independent
     * @var null|Party
     *
     * @ORM\ManyToOne(targetEntity="Party", cascade={"persist"})
     */
    private $registeredParty;

    /**
     * @var null|Party
     *
     * @ORM\ManyToOne(targetEntity="Party", cascade={"persist"})
     */
    private $preferredParty;
//
//    /**
//     * @var null|District
//     *
//     * @ORM\ManyToOne(targetEntity="District")
//     */
//    private $district;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param null|ValueObject\Name $name
     * @return Profile
     */
    public function setName(ValueObject\Name $name = null) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return null|ValueObject\Name 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param null|ValueObject\Address $address
     * @return Profile
     */
    public function setAddress(ValueObject\Address $address = null) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return null|ValueObject\Address 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set dob
     *
     * @param null|\DateTime $dob
     * @return Profile
     */
    public function setDob(\DateTime $dob = null) {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return null|\DateTime 
     */
    public function getDob() {
        return $this->dob;
    }

    /**
     * Set location
     *
     * @param null|Location $location
     * @return Profile
     */
    public function setLocation(Location $location = null) {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return null|Location 
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Set registeredParty
     *
     * @param null|Party $registeredParty
     * @return Profile
     */
    public function setRegisteredParty(Party $registeredParty = null) {
        $this->registeredParty = $registeredParty;

        return $this;
    }

    /**
     * Get registeredParty
     *
     * @return null|Party
     */
    public function getRegisteredParty() {
        return $this->registeredParty;
    }

    /**
     * Set preferredParty
     *
     * @param null|Party $preferredParty
     * @return Profile
     */
    public function setPreferredParty(Party $preferredParty = null) {
        $this->preferredParty = $preferredParty;

        return $this;
    }

    /**
     * Get preferredParty
     *
     * @return null|Party
     */
    public function getPreferredParty() {
        return $this->preferredParty;
    }

    /**
     * Set district
     *
     * @param null|District $district
     * @return Profile
     */
    public function setDistrict(District $district = null) {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return null|District
     */
    public function getDistrict() {
        return $this->district;
    }
    public function getVoterRegistration() {
        return $this->voterRegistration;
    }

    public function setVoterRegistration(VoterRegistration $voterRegistration) {
        $this->voterRegistration = $voterRegistration;
    }
}
