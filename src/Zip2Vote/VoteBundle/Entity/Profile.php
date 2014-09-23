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
     * @ORM\ManyToOne(targetEntity="ValueObject\Name")
     * @ORM\Column(nullable=true)
     */
    private $name;

    /**
     * @var null|ValueObject\Address
     *
     * @ORM\ManyToOne(targetEntity="ValueObject\Address")
     * @ORM\Column(nullable=true)
     */
    private $address;

    /**
     * @var null|\DateTime
     *
     * @ORM\Column(name="dob", type="datetime", nullable=true)
     */
    private $dob;

    /**
     * @var null|ValueObject\Location
     *
     * @ORM\ManyToOne(targetEntity="ValueObject\Location")
     * @ORM\Column(nullable=true)
     */
    private $location;

    /**
     * If null, the person is considered an Independent
     * @var null|Party
     *
     * @ORM\ManyToOne(targetEntity="Party")
     * @ORM\Column(nullable=true)
     */
    private $registeredParty;

    /**
     * @var null|Party
     *
     * @ORM\ManyToOne(targetEntity="Party")
     * @ORM\Column(nullable=true)
     */
    private $preferredParty;

    /**
     * If null, the person is considered an Independent
     * @var null|ValueObject\District
     *
     * @ORM\ManyToOne(targetEntity="ValueObject\District")
     * @ORM\Column(nullable=true)
     */
    private $district;

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
     * @param null|ValueObject\Location $location
     * @return Profile
     */
    public function setLocation(ValueObject\Location $location = null) {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return null|ValueObject\Location 
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

}
