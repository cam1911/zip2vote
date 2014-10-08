<?php

namespace Zip2Vote\VoteBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * ExternalProfile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\ExternalProfileRepository")
 */
class ExternalProfile {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var null|Account
     *
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="externalProfiles", cascade={"persist"})
     */
    private $account;

    /**
     *
     * @var 
     */
    private $provider;

    /**
     * Get provider
     * @return provider
     */
    public function getProvider() {
        return $this->provider;
    }

    /**
     * Set provider
     * @param $provider
     * @return ExternalProfile
     */
    public function setProvider($provider) {
        $this->provider = $provider;
    }

}
