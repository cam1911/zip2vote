<?php

namespace Zip2Vote\VoteBundle\Entities;

/**
 * @deprecated since version 0.0.0 Use Zip2Vote\VoteBundle\Entity\Profile
 */
class Profile {

    /**
     * @var name
     *
     * @ORM\Column(name="name", type="name", length=50)
     */
    private $name;

    /**
     * @var address
     *
     * @ORM\Column(name="address", type="string", length=50)
     */
    private $address;

    /**
     * @var dob
     *
     * @ORM\Column(name="dob", type="Date", length=8)
     */
    private $dob;

    /**
     * @var location
     *
     * @ORM\Column(name="location", type="Location", length=50)
     */
    private $location;

    /**
     * @var registeredParty
     *
     * @ORM\Column(name="registeredParty", type="Party", length=50)
     */
    private $registeredParty;

    /**
     * @var preferredParty
     *
     * @ORM\Column(name="preferredParty", type="Party", length=50)
     */
    private $preferredParty;
    
    /**
     * @var district
     *
     * @ORM\Column(name="district", type="District", length=50)
     */
    private $district;

    function __construct($name, $address, $dob, $location, $registeredParty, $preferredParty, $district) {
        $this->name = $name;
        $this->address = $address;
        $this->dob = $dob;
        $this->location = $location;
        $this->registeredParty = $registeredParty;
        $this->preferredParty = $preferredParty;
        $this->district = $district;
    }

    /**
     * Get Name
     *
     * @return Name 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param Name $name
     * @return Name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get Address
     *
     * @return address 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set Address
     *
     * @param address $address
     * @return address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * Get DOB
     *
     * @return dob 
     */
    public function getDob() {
        return $this->dob;
    }
    
    /**
     * 
     * @param dob $dob
     * @return dob
     */
    public function setDob($dob) {
        $this->dob = $dob;
    }

    /**
     * Get Location
     *
     * @return Location
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * 
     * @param Location $location
     * @return Location
     */
    public function setLocation($location) {
        $this->location = $location;
    }
    
    /**
     * Get RegisteredParty
     *
     * @return registeredParty 
     */
    public function getRegisteredParty() {
        return $this->registeredParty;
    }

    /**
     * 
     * @param Party $registeredParty
     * @return registeredParty
     */
    public function setRegisteredParty($registeredParty) {
        $this->registeredParty = $registeredParty;
    }

    /**
     * Get PreferredParty
     *
     * @return Party
     */
    public function getPreferredParty() {
        return $this->preferredParty;
    }
    
    /**
     * 
     * @param Party $preferredParty
     * @return Party
     */
    public function setPreferredParty($preferredParty) {
        $this->preferredParty = $preferredParty;
    }

    /**
     * Get District
     *
     * @return District 
     */
    public function getDistrict() {
        return $this->district;
    }

    /**
     * 
     * @param District $district
     * @return District
     */
    public function setDistrict($district) {
        $this->district = $district;
    }

}

?>
