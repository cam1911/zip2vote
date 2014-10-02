<?php

namespace Zip2Vote\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Goutte\Client;

/**
 * RegistrationChecker Controller.
 *
 * @Route("/registrationchecker")
 */
class RegistrationCheckerController extends Controller {

    /**
     *
     * @Route("/", name="registrationchecker")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {

        // create a new cURL resource
        $ch = \curl_init();
        $client = new Client();
        $crawler = $client->request('GET', 'https://team1.sos.state.tx.us/voterws/viw/faces/SearchSelectionVoter.jsp');
        $client->getClient()->setDefaultOption('verify', 'C:\xampp\php\cacert.pem');
        $form = $crawler->selectButton('Name')->form();
        $crawler = $client->submit($form, array(
            'County' => 'Dallas',
            'Last Name' => 'Manley',
            'First Name' => 'Cameron',
            'Date of Birth' => '06241994',
            'ZIP Code' => '75080'
                )
        );
        $crawler->filter('.flash-error')->each(function ($node) {
                    print $node->text() . "\n";
                });
        return $this->client->getRequest();
    }

}