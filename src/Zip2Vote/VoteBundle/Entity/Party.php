<?php
namespace Zip2Vote\VoteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * District
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Party
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
     * @var null|ValueObject\Name
     *
     * @ORM\ManyToOne(targetEntity="\Zip2Vote\VoteBundle\Entity\ValueObject\Name", cascade={"persist"})
     */
    private $name;

    /**
     * Get name
     * @return ValueObject\Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @param ValueObject\Name $name
     * @return District
     */
    public function setName(ValueObject\Name $name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
}
