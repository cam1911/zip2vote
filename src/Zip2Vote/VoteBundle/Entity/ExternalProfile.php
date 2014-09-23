<?php

namespace Zip2Vote\VoteBundle\Entity;

/**
 * ExternalProfile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Zip2Vote\VoteBundle\Entity\ExternalProfileRepository")
 */
class ExternalProfile {

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

?>
