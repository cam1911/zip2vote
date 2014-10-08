<?php
namespace Zip2Vote\State\TexasBundle\Bridge;
use Zip2Vote\VoteBundle\Entity\Profile;

class ProfileAdapter
{
    public function bindResult(Profile $profile, \stdClass $result)
    {
        $vr = new \Zip2Vote\VoteBundle\Entity\VoterRegistration();
    }
}