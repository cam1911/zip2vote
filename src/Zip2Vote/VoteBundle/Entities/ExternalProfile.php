<?php

namespace Zip2Vote\VoteBundle\Entity;

class ExternalProfile {

    /**
     *
     * @var 
     */
    private $provider;

    function __construct($provider) {
        $this->provider = $provider;
    }

    /**
     * 
     * @return provider
     */
    public function getProvider() {
        return $this->provider;
    }

    /**
     * 
     * @param \Zip2Vote\VoteBundle\Entity\enum $provider
     */
    public function setProvider($provider) {
        $this->provider = $provider;
    }

}

?>
