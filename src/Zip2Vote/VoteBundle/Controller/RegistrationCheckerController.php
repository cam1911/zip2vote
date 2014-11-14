<?php

namespace Zip2Vote\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Parser;
use Zip2Vote\VoteBundle\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;

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
    public function lookupAction(Request $request) {
        $form = static::createRegisterForm($this);
        if ($form->handleRequest($request)->isValid()) {
//            $profile = $form->getData();
            $profile = static::testProfile();

            $crawler = new \Zip2Vote\State\TexasBundle\Lib\VoterRegistrationCrawler();
            $registration = $crawler->getRegistration($profile);
            \Zip2Vote\State\TexasBundle\Bridge\ProfileAdapter::bindResult($profile, $registration);

//            var_dump($registration);
//
//            echo $nextCrawler->html();
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
//            $em->persist($registration);
            $em->flush();

            $_SESSION['registration.profile.id'] = $profile->getId();
            return $this->redirect($this->generateUrl("registration.status"));
        }
        return $this->redirect($this->generateUrl("registration.register"));
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
        $profile = static::testProfile();
        $controller->getDoctrine()->getManager()->persist($profile);
        
        $form = RegisterType::blank(
            $controller->container->get('form.factory'),
            $profile,
            array(
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
        $address->setZip($data['zipCode'])
        ->setCounty($data['county']);
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