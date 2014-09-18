<?php

namespace Zip2Vote\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Zip2Vote\VoteBundle\Form\RegisterType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
//        $params = array(
//            'eMbrKey' => 'Peca, Lauren',
//            'pbSrch' => ' Search '
//        );
//
//        foreach ($params as $k => $v) {
//            $params[$k] = $k . '=' . $v;
//        }
//        $postData = implode('&', $params);
//
//        $ch = curl_init('http://www.uschess.org/assets/msa_joomla/MbrLst.php');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
//        
//        echo curl_exec($ch);
//        exit;
        
        return array(
            'newUserForm' => $this->createCreateForm()->createView()
        );
    }
    
    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm()
    {
        $form = $this->createForm(new RegisterType(), null, array(
//            'action' => $this->generateUrl('profile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Zip2Vote'));

        return $form;
    }
}
