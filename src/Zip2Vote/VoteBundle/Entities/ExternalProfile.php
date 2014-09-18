<?php

namespace Zip2Vote\VoteBundle\Entity;

class ExternalProfile {
    
    /**
     *
     * @var enum
     */
    private $provider;
    
    function __construct(enum $provider) {
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
    public function setProvider(enum $provider) {
        $this->provider = $provider;
    }


}
?>
