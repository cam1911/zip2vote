<?php

namespace Zip2Vote\VoteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\LocationRepository")
 */
class Location {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string
     * @ORM\Column(nullable=false)
     */
    private $address1;

    /**
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $address2;

    /**
     *
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $address3;

    /**
     *
     * @var string
     * @ORM\Column(nullable=false)
     */
    private $city;

    /**
     * @var 
     * @ORM\Column(nullable=false)
     */
    private $state;

    /**
     * 
     * @var string
     * @ORM\Column(nullable=false)
     */
    private $county;

    /**
     *
     * @var string
     * @ORM\Column(nullable=false)
     */
    private $zipCode;

    /**
     * Get address1
     * @return address
     */
    public function getAddress1() {
        return $this->address1;
    }

    /**
     * Set Address1
     * @param address $address1
     * @return Location
     */
    public function setAddress1($address1) {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * Get address2
     * @return address
     */
    public function getAddress2() {
        return $this->address2;
    }

    /**
     * Set address2
     * @param address $address2
     * @return Location
     */
    public function setAddress2($address2) {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * Get address3
     * @return address
     */
    public function getAddress3() {
        return $this->address3;
    }

    /**
     * Set address3
     * @param address $address3
     * @return Location
     */
    public function setAddress3($address3) {
        $this->address3 = $address3;
        return $this;
    }

    /**
     * Get city
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set City
     * @param city $city
     * @return Location
     */
    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    /**
     * Get state
     * @return state
     */
    public function getState() {
        return $this->state;
    }

    /**
     * Set state
     * @param $state
     * @return Location
     */
    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    /**
     * Get county
     * @return string
     */
    public function getCounty() {
        return $this->county;
    }

    /**
     * Set county
     * @param string $county
     * @return Location
     */
    public function setCounty($county) {
        $this->county = (string) $county;
        return $this;
    }

    /**
     * Get zipCode
     * @return string
     */
    public function getZipCode() {
        return $this->zipCode;
    }

    /**
     * Set zipCode
     * @param string $zipCode
     * @return Location
     */
    public function setZipCode(string $zipCode) {
        $this->zipCode = (string) $zipCode;
        return $this;
    }

}
