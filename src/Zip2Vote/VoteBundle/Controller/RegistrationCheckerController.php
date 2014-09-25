<?php

use Goutte\Client;

class RegistrationCheckerController extends Controller {

    public function indexAction() {

        $client = new Client();
        $crawler = $client->request('GET', 'https://team1.sos.state.tx.us/voterws/viw/faces/SearchSelectionVoter.jsp');
        $client->getClient()->setDefaultOption('config/curl/' . CURLOPT_TIMEOUT, 60);
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