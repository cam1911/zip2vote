<?php

namespace Zip2Vote\VoteBundle\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * A generic address object, persisted for convenience.
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Address {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $line1;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $line2;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $line3;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(nullable=true, length=2)
     */
    private $state;

    /**
     * @var string
     * @ORM\Column(nullable=true, length=9)
     */
    private $zip;

    public function getId()
    {
        return $this->id;
    }

    public function getLine1()
    {
        return $this->line1;
    }

    public function setLine1($line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    public function getLine2()
    {
        return $this->line2;
    }

    public function setLine2($line2)
    {
        $this->line2 = $line2;
        return $this;
    }

    public function getLine3()
    {
        return $this->line3;
    }

    public function setLine3($line3)
    {
        $this->line3 = $line3;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }
    
    public function standardize()
    {
        return sprintf("%s, %s, %s, %s %s",
            $this->getLine1(), $this->getLine2(), $this->getCity(),
            $this->getState(), $this->getZip()
        );
    }
    
    public function __toString()
    {
        return $this->standardize();
    }
}
