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

        $client = new Client();
        $client->getClient()->setDefaultOption('config/curl/' . \CURLOPT_SSL_VERIFYPEER, false);
        $client->getClient()->setDefaultOption('config/curl/' . \CURLOPT_SSL_VERIFYHOST, false);
        $crawler = $client->request('GET', 'https://team1.sos.state.tx.us/voterws/viw/faces/SearchSelectionVoter.jsp');
        $form = $crawler->selectButton('Next (Siga) >')->form();
        
        /*
         * To determine what fields I needed to supply, I put this here and
         *  looked at the output. Alternatively, I went to the url in Chrome and
         *  hit CTRL+SHIFT+j. I clicked the Network tab and clicked the block
         *  sign to clear the contents. I checked the radio to register and 
         *  clicked the button. I inspected the headers of the request:
         * 
         * form1:radio1:N
            form1:button1:Next (Siga) >
            com.sun.faces.VIEW:_id58050:_id58051
            form1:form1
         */
//        var_dump($form->all());
        $crawler = $client->submit($form, array(
            'form1:radio1' => 'N',
            'form1:button1' => 'Next (Siga) >',
            'form1' => 'form1',
                )
        );
        
        /**
         * I did this to verify the page I was receiving was the right one..
         */
//        var_dump($crawler->html());
        $crawler->filter('.flash-error')->each(function ($node) {
                    print $node->text() . "\n";
                });
                die('done');
    }

}