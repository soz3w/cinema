<?php
namespace Cinema\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Email;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('_username', "text",
                        array('label'=>"Nom utilisateur",
                               'label_attr' => array('class' => ''),
                               'attr'=>array('placeholder' => 'saisissez votre nom utilisateur',
                                             'class' => '',
                                             'value'=>  "{{ last_username }}",
                                            ),
                                'constraints' => array(
                                                        new NotBlank(array('message'=>'Renseignez le nom utilisateur')),

                                                     )
                        )
                    );
        $builder->add('_password', "password",
                        array('label'=>"Mot de passe",
                              'label_attr' => array('class' => ''),
                               'attr'=>array('placeholder' => 'saisissez votre mot de passe',
                                             'class' => ''
                                             ),
                                'constraints' => array(
                                    new NotBlank(),

                                )
            ));

        $builder->add('send', "submit",
                       array('label'=>"login",
                             'attr'=>array('class' => 'btn btn-primary btn-sm')
            ));

    }

    public function getName()
    {
        //form name
        return '';
    }
}