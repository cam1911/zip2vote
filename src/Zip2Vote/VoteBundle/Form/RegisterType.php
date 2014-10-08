<?php

namespace Zip2Vote\VoteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormFactory;
use Zip2Vote\VoteBundle\Entity;

class RegisterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('dob')
            ->add('location')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zip2Vote\VoteBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zip2vote_votebundle_register';
    }
    
    public static function blank(FormFactory $factory, $profile, $options = array())
    {
        $type = new static();
        $form = $factory->create($type, $profile, $options);
        return $form;
    }
}
