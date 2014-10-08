<?php

namespace Zip2Vote\VoteBundle\Entity;
use Zip2Vote\VoteBundle\Enum;
use Zip2Vote\VoteBundle\Common;

use Doctrine\ORM\Mapping as ORM;

/**
 * PollingLocation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\PollingLocationRepository")
 */
class PollingLocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ValueObject\TimeRange
     *
     * @ORM\ManyToOne(targetEntity="ValueObject\TimeRange")
     * @ORM\Column(nullable=true)
     */
    private $timesAvailable;

    /**
     * @var Enum\ElectionType
     *
     * @ORM\Column(nullable=true, type="app_enum")
     */
    private $electionType;

    /**
     * @var string
     *
     * @ORM\Column(name="organization", type="string", length=50)
     */
    private $organization;

    /**
     * @var ValueObject\Location
     *
     * @ORM\ManyToOne(targetEntity="ValueObject\Location")
     * @ORM\Column(nullable=true)
     */
    private $location;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set timesAvailable
     *
     * @param ValueObject\TimeRange $timesAvailable
     * @return PollingLocation
     */
    public function setTimesAvailable(ValueObject\TimeRange $timesAvailable)
    {
        $this->timesAvailable = $timesAvailable;

        return $this;
    }

    /**
     * Get timesAvailable
     *
     * @return ValueObject\TimeRange
     */
    public function getTimesAvailable()
    {
        return $this->timesAvailable;
    }

    /**
     * Set electionType
     *
     * @param string|Enum\ElectionType $electionType
     * @return PollingLocation
     */
    public function setElectionType($electionType)
    {
        Common\ObjectUtils::standardize(
            $electionType, 'Zip2Vote\VoteBundle\Enum\ElectionType', 'create'
        );
        $this->electionType = $electionType;

        return $this;
    }

    /**
     * Get electionType
     *
     * @return Enum]\ElectionType
     */
    public function getElectionType()
    {
        return $this->electionType;
    }

    /**
     * Set organization
     *
     * @param string $organization
     * @return PollingLocation
     */
    public function setOrganization($organization)
    {
        $this->organization = (string)$organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return string 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set location
     *
     * @param ValueObject\Location $location
     * @return PollingLocation
     */
    public function setLocation(ValueObject\Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return ValueOject\Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}
