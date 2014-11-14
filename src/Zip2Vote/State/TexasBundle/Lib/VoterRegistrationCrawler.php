<?php
namespace Zip2Vote\State\TexasBundle\Lib;
use Symfony\Component\DomCrawler\Crawler;
use Zip2Vote\VoteBundle\Entity\Profile;
use Zip2Vote\VoteBundle\Entity\ValueObject\Address;
use Goutte\Client;

class VoterRegistrationCrawler extends Crawler
{
    /**
     * Returns a standard object for the registration of $profile.
     * @param \Zip2Vote\VoteBundle\Entity\Profile $profile
     * @return \stdClass
     */
    public function getRegistration(Profile $config)
    {
        $userInput = array(
            'county' => $config->getAddress()->getCounty(),
            'lastName' => $config->getName()->getLast(),
            'firstName' => $config->getName()->getFirst(),
            'month' => $config->getDob()->format('m'),
            'day' => $config->getDob()->format('d'),
            'year' => $config->getDob()->format('Y'),
            'zipCode' => $config->getAddress()->getZip(),
        );
        // create a new cURL resource
        $ch = \curl_init();
        $client = new Client();
        $client->getClient()->setDefaultOption('config/curl/' . \CURLOPT_SSL_VERIFYPEER, false);
        $client->getClient()->setDefaultOption('config/curl/' . \CURLOPT_SSL_VERIFYHOST, false);
        $crawler = $client->request('GET', 'https://team1.sos.state.tx.us/voterws/viw/faces/SearchSelectionVoter.jsp');

        // $crawler has contents of first, landing page
        $form = $crawler->selectButton('Next (Siga) >')->form();

        // $form has the first form, with radio buttons


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
        $nextCrawler = $client->submit($form, array(
            'form1:radio1' => 'N',
            'form1:button1' => 'Next (Siga) >',
            'form1' => 'form1',
                )
        );

        // $nextCrawler represents the SECOND page, after submitting the first crawlers'
        //  $form

        /*
         * New Code
         */

        $nextForm = $nextCrawler->selectButton('Next (Siga) >')->form();

        $nextCrawler = $client->submit($nextForm, array(
            'form1:menu2' => '101',
            'form1:lastName' => $userInput['lastName'],
            'form1:firstName' => $userInput['firstName'],
            'form1:tdlMonth' => $userInput['month'],
            'form1:tdlDay' => $userInput['day'],
            'form1:tdlYear' => $userInput['year'],
            'form1:zip' => $userInput['zipCode'],
            'form1:button1' => 'Next (Siga) >',
            'form1' => 'form1',
        ));
//        echo $nextCrawler->html();exit;

        $registration = (object) array(
                    'name' => null,
                    'address' => null,
                    'validFrom' => null,
                    'effective' => null,
                    'status' => null,
                    'county' => null,
                    'precinct' => null
        );

        $xpath = '//form[@id="form1"]//td[contains(., "County")]/following-sibling::td';
        $registration->county = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Precinct")]/following-sibling::td';
        $registration->precinct = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Status")]/following-sibling::td';
        $registration->status = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Effective")]/following-sibling::td';
        $registration->effective = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Valid From")]/following-sibling::td';
        $registration->validFrom = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Address")]/following-sibling::td';
        $registration->address = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Name")]/following-sibling::td';
        $registration->name = $nextCrawler->filterXPath($xpath)->text();
        
        return $registration;
    }
    
    
}