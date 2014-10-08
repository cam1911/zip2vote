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
     * @var string
     * @ORM\Column(nullable=false)
     */
    private $name;

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @param string $name
     * @return District
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
}
