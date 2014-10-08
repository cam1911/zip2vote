<?php

namespace Zip2Vote\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\ProfileRepository")
 */
class VoterRegistration {

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
     * @ORM\OneToOne(targetEntity="Profile", cascade={"persist"})
     */
    private $profile;

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
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $effective;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $validFrom;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $precinct;

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
    
    public function getProfile() {
        return $this->profile;
    }

    public function setProfile(ValueObject\Name $profile) {
        $this->profile = $profile;
        return $this;
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
    public function getEffective()
    {
        return $this->effective;
    }

    public function setEffective(\DateTime $effective)
    {
        $this->effective = $effective;
        return $this;
    }

    public function getValidFrom()
    {
        return $this->validFrom;
    }

    public function setValidFrom(\DateTime $validFrom)
    {
        $this->validFrom = $validFrom;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getPrecinct()
    {
        return $this->precinct;
    }

    public function setPrecinct($precinct)
    {
        $this->precinct = $precinct;
        return $this;
    }
}
