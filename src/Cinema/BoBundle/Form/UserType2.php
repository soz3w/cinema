<?php

namespace Cinema\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType2 extends AbstractType
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
            ->add('ville')
            ->add('zipcode')
            ->add('tel')
            ->add('ip')
            ->add('enabled')
            ->add('lastLogin')
            ->add('expired')
            ->add('locked')
            ->add('usernameCanonical')
            ->add('emailCanonical')
            ->add('salt')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('googleid')
            ->add('googleaccesstoken')
            ->add('flickrid')
            ->add('flickraccesstoken')
            ->add('githubid')
            ->add('githubaccesstoken')
            ->add('linkedinaccesstoken')
            ->add('linkedinid')
            ->add('roles')
            ->add('extras')
            ->add('longitude')
            ->add('latitude')
            ->add('facebookid')
            ->add('facebookaccesstoken')
            ->add('twitterid')
            ->add('twitteraccesstoken')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('deletedAt')
            ->add('lastactivity')
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
