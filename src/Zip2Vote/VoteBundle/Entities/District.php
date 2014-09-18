<?php

namespace Zip2Vote\VoteBundle\Entity;

class District {

    /**
     *
     * @var string
     */
    private $stateRepresentative;
    
    /**
     *
     * @var string
     */
    private $name;
    
    /**
     *
     * @var string
     */
    private $mapCoordinates;

    
    function __construct($stateRepresentative, district $name, $mapCoordinates) {
        $this->stateRepresentative = $stateRepresentative;
        $this->name = $name;
        $this->mapCoordinates = $mapCoordinates;
    }
    
    /**
     * 
     * @return string
     */
    public function getStateRepresentative() {
        return $this->stateRepresentative;
    }

    /**
     * 
     * @param type $stateRepresentative
     */
    public function setStateRepresentative($stateRepresentative) {
        $this->stateRepresentative = $stateRepresentative;
    }

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\district $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 
     * @return string
     */
    public function getMapCoordinates() {
        return $this->mapCoordinates;
    }

    /**
     * 
     * @param type $mapCoordinates
     */
    public function setMapCoordinates($mapCoordinates) {
        $this->mapCoordinates = $mapCoordinates;
    }



}

?>
