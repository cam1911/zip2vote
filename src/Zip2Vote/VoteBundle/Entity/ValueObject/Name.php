<?php

namespace Zip2Vote\VoteBundle\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * A generic name object, persisted for convenience.
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Name {
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
    private $raw;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $first;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $middle;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $last;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $salutation;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $suffix;
    
    public function getId()
    {
        return $this->id;
    }

    public function getRaw()
    {
        return $this->raw;
    }

    public function setRaw($raw)
    {
        $this->raw = $raw;
        return $this;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function setFirst($first)
    {
        $this->first = $first;
        return $this;
    }

    public function getMiddle()
    {
        return $this->middle;
    }

    public function setMiddle($middle)
    {
        $this->middle = $middle;
        return $this;
    }

    public function getLast()
    {
        return $this->last;
    }

    public function setLast($last)
    {
        $this->last = $last;
        return $this;
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        return $this;
    }

    public function getSuffix()
    {
        return $this->suffix;
    }

    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }
}
