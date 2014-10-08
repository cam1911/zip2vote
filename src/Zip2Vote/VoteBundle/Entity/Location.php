<?php

namespace Zip2Vote\VoteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table()
 * @ORM\Entity()
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
     * @var null|ValueObject\Address
     *
     * @ORM\ManyToOne(targetEntity="\Zip2Vote\VoteBundle\Entity\ValueObject\Address", cascade={"persist"})
     */
    private $address;
    
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(ValueObject\Address $address)
    {
        $this->address = $address;
        return $this;
    }
}
