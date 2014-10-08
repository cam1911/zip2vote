<?php
namespace Zip2Vote\State\TexasBundle\Bridge;
use Zip2Vote\VoteBundle\Entity;

class ProfileAdapter
{
    public static function bindResult(Entity\Profile $profile, \stdClass $result)
    {
        $registration = new Entity\VoterRegistration();
        $registration->setProfile($profile)
            ->setPrecinct($result->precinct)
        ;
        $profile->getAddress()->setRaw($result->address);
        $profile->setVoterRegistration($registration);
        return $this;
    }
}