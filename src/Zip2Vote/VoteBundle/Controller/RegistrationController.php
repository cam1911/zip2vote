<?php

namespace Zip2Vote\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Zip2Vote\VoteBundle\Form\RegisterType;
use Zip2Vote\VoteBundle\Form\ProfileByZipCodeType;
use Symfony\Component\HttpFoundation\Request;

/**
 * 
 * @Route("/good-citizen")
 */
class RegistrationController extends Controller {

    /**
     * @Route("/start-by-zip", name="registration.process-zip")
     * @Template()
     * 
     */
    public function processZipCodeAction(Request $request) {
        $form = static::createCreateForm($this);
        if ($form->handleRequest($request)->isValid()) {
            $profile = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush();

            $_SESSION['registration.profile.id'] = $profile->getId();
            return $this->redirect($this->generateUrl("registration.register"));
        }
        return $this->redirect($this->generateUrl("home"));
    }
    
    /**
     * @Route("/register", name="registration.status")
     * @Template()
     * 
     */
    public function statusAction()
    {
        die('hey,. you are either registered or you arent. awesome Cameron design page to be inserted here');
    }

    /**
     * @Route("/register", name="registration.register")
     * @Template()
     * 
     */
    public function registerAction() {
        // Add a template for this; excise the one bootstrap slides to.
        return array(
            'registerForm' => RegistrationCheckerController::createRegisterForm($this)->createView()
        );
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public static function createCreateForm(Controller $controller) {
        $profile = \Zip2Vote\VoteBundle\Controller\RegistrationCheckerController::testProfile();
        $controller->getDoctrine()->getManager()->persist($profile);
        $form = ProfileByZipCodeType::blank(
            $controller->container->get('form.factory'),
            $profile,
            array(
                'action' => $controller->generateUrl('registration.process-zip'),
                'method' => 'POST',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Zip2Vote &raquo;'));

        return $form;
    }
}
