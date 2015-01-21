<?php

namespace Cinema\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('username')
            ->add('password')
            ->add('roles', 'choice',
                array(
                        'choices'  => array(
                                'ROLE_USER' => 'ROLE_USER',
                                'ROLE_ADMIN' => 'ROLE_ADMIN',
                                'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN'
                                ),
                        'multiple' => true
                        ))

            ->add('send', "submit",
                array('label'=>"Envoyer",
                    'attr'=>array('class' => 'btn btn-primary btn-lg pull-right')
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cinema\BoBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }
}
