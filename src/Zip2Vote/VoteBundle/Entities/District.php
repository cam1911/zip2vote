<?php
namespace Zip2Vote\VoteBundle\Entity;

class District 
{
    /**
     * @var string
     */
    private $stateRepresentative;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $mapCoordinates;

    /**
     * @return string
     */
    public function getStateRepresentative()
    {
        return $this->stateRepresentative;
    }

    /**
     * @param string $stateRepresentative
     * @return \Zip2Vote\VoteBundle\Entity\District
     */
    public function setStateRepresentative($stateRepresentative)
    {
        $this->stateRepresentative = (string)$stateRepresentative;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \Zip2Vote\VoteBundle\Entity\District
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    
    /**
     * @return string
     */
    public function getMapCoordinates()
    {
        return $this->mapCoordinates;
    }

    /**
     * @param string $mapCoordinates
     * @return \Zip2Vote\VoteBundle\Entity\District
     */
    public function setMapCoordinates($mapCoordinates)
    {
        $this->mapCoordinates = (string)$mapCoordinates;
        return $this;
    }
}
