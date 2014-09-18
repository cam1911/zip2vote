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
     * @var 
     */
    private $state;

    /**
     * 
     * @var string
     */
    private $county;

    /**
     *
     * @var string
     */
    private $zipCode;

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
        return $this;
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
        return $this;
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
        return $this;
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
     * @param city $city
     */
    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    /**
     * 
     * @return state
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
        return $this;
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
        $this->county = (string) $county;
        return $this;
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
     * @param \Zip2Vote\VoteBundle\Entity\string $zipCode
     */
    public function setZipCode(string $zipCode) {
        $this->zipCode = (string) $zipCode;
        return $this;
    }

}

?>
