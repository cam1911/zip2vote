<?php

namespace Zip2Vote\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Goutte\Client;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Parser;

/**
 * RegistrationChecker Controller.
 *
 * @Route("/voter-check")
 */
class RegistrationCheckerController extends Controller {

    /**
     *
     * @Route("/lookup", name="checker.lookup")
     * @Method("POST")
     * @Template()
     */
    public function lookupAction() {

        $config = static::testProfile();
        $userInput = array(
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

        $registration = (object) array(
                    'name' => null,
                    'address' => null,
                    'validForm' => null,
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
        $registration->validForm = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Address")]/following-sibling::td';
        $registration->address = $nextCrawler->filterXPath($xpath)->text();

        $xpath = '//form[@id="form1"]//td[contains(., "Name")]/following-sibling::td';
        $registration->name = $nextCrawler->filterXPath($xpath)->text();

        var_dump($registration);

        echo $nextCrawler->html();


        /**
         * I did this to verify the page I was receiving was the right one..
         */
//        var_dump($crawler->html());
        $crawler->filter('.flash-error')->each(function ($node) {
                    print $node->text() . "\n";
                });
        die('done');
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public static function createRegisterForm(Controller $controller) {
        // Create this RegisterType::blank()
        $form = RegisterType::blank(
            $controller->container->get('form.factory'), array(
                'action' => $controller->generateUrl('checker.lookup'),
                'method' => 'POST',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Check Voter Registration'));

        return $form;
    }
    
    public static function testProfile()
    {
        $locator = new FileLocator();
        $yaml = new Parser();
        
        $data = $yaml->parse(file_get_contents($locator->locate(
            __DIR__ . '/../Resources/config/test-profile.yml'
        )), false, true);
        
        $address = new \Zip2Vote\VoteBundle\Entity\ValueObject\Address();
        $address->setZip($data['zipCode']);
        $dob = new \DateTime(
            $data['dob']['month'].'/'.$data['dob']['day'].'/'.$data['dob']['year']
        );
        
        $name = new \Zip2Vote\VoteBundle\Entity\ValueObject\Name();
        $name->setFirst($data['firstName'])
            ->setLast($data['lastName'])
        ;
        
        $profile = new \Zip2Vote\VoteBundle\Entity\Profile();
        $profile->setAddress($address)
            ->setDob($dob)
            ->setName($name)
        ;
        return $profile;
    }
}