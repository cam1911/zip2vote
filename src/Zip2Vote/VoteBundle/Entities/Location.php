<?php

namespace Zip2Vote\VoteBundle\Entity;

class Location {

    /**
     *
     * @var string
     */
    private $address1;

    /**
     *
     * @var string
     */
    private $address2;

    /**
     *
     * @var string
     */
    private $address3;

    /**
     *
     * @var string
     */
    private $city;

    /**
     * @var enum
     */
    private $state;

    /**
     * 
     * @var string
     */
    private $county;

    /**
     *
     * @var char
     */
    private $zipCode;
    
    function __construct($address1, $address2, $address3, $city, enum $state, $county, char $zipCode) {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->city = $city;
        $this->state = $state;
        $this->county = $county;
        $this->zipCode = $zipCode;
    }

    /**
     * 
     * @return address
     */
    public function getAddress1() {
        return $this->address1;
    }

    /**
     * 
     * @param address $address1
     */
    public function setAddress1($address1) {
        $this->address1 = $address1;
    }

    /**
     * 
     * @return address
     */
    public function getAddress2() {
        return $this->address2;
    }

    /**
     * 
     * @param address $address2
     */
    public function setAddress2($address2) {
        $this->address2 = $address2;
    }

    /**
     * 
     * @return address
     */
    public function getAddress3() {
        return $this->address3;
    }

    /**
     * 
     * @param address $address3
     */
    public function setAddress3($address3) {
        $this->address3 = $address3;
    }

    /**
     * 
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * 
     * @param type $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * 
     * @return enum
     */
    public function getState() {
        return $this->state;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\enum $state
     */
    public function setState(enum $state) {
        $this->state = $state;
    }

    /**
     * 
     * @return string
     */
    public function getCounty() {
        return $this->county;
    }

    /**
     * 
     * @param string $county
     */
    public function setCounty($county) {
        $this->county = $county;
    }

    /**
     * 
     * @return char
     */
    public function getZipCode() {
        return $this->zipCode;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\char $zipCode
     */
    public function setZipCode(char $zipCode) {
        $this->zipCode = $zipCode;
    }



}

?>
