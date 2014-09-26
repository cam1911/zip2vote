<?php

namespace Zip2Vote\VoteBundle\Controller;

require_once 'C:\dev\goutte.phar';
use Symfony\Component\HttpFoundation\Request;
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

        $client = new Client();
        $crawler = $client->request('GET', 'https://team1.sos.state.tx.us/voterws/viw/faces/SearchSelectionVoter.jsp');
        $client->getClient()->setDefaultOption('config/curl/' . \CURLOPT_TIMEOUT, 60);
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
    }

}