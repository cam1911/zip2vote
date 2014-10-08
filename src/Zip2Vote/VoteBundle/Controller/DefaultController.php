<?php

namespace Zip2Vote\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Zip2Vote\VoteBundle\Form\RegisterType;
use Zip2Vote\VoteBundle\Form\ProfileByZipCodeType;

class DefaultController extends Controller {

    /**
     * @Route("/")
     * @Template()
     * 
     */
    public function indexAction() {
        return array(
            'newUserForm' => $this->createCreateForm()->createView()
        );
    }

    /**
     * @Route("/register")
     * @Template()
     * 
     */
    public function registerAction() {
        // Add a template for this; excise the one bootstrap slides to.
        return array(
            'registerForm' => $this->createRegisterForm()->createView()
        );
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm() {
        $form = ProfileByZipCodeType::blank(
            $this->container->get('form.factory'), array(
                'action' => $this->generateUrl('profile_create'),
                'method' => 'POST',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Zip2Vote &raquo;'));

        return $form;
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createRegisterForm() {
        // Create this RegisterType::blank()
        $form = RegisterType::blank(
            $this->container->get('form.factory'), array(
                'action' => $this->generateUrl('profile_create'),
                'method' => 'POST',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Zip2Vote &raquo;'));

        return $form;
    }
}
