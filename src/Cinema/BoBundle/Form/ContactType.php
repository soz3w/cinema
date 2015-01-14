<?php
namespace Cinema\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subject', "text",
                        array('label'=>"Sujet",
                               'attr'=>array('placeholder' => 'saisissez votre sujet',
                                             'class' => 'form-control input-sm'
                                            ),
                                'constraints' => array(
                                                        new NotBlank(array('message'=>'Renseignez le sujet')),
                                                        new Length(array('min' => 3,'minMessage'=>'Saisir 3 caracteres au minimum')),
                                                        new Length(array('max' => 20,'maxMessage'=>'Saisir 20 caracteres au maximum'))
                                                     )
                        )
                    );
        $builder->add('nom', "text",
                        array('label'=>"Nom",
                               'attr'=>array('placeholder' => 'saisissez votre nom',
                                             'class' => 'form-control input-sm'
                                             ),
                                'constraints' => array(
                                    new NotBlank(),
                                    new Length(array('min' => 3,'minMessage'=>'Saisir 3 caracteres au minimum'))
                                )
            ));
        $builder->add('url', "text",
            array('label'=>"Url",
                'attr'=>array('placeholder' => 'Tapez url',
                    'class' => 'form-control input-sm'
                )
            ));
        $builder->add('email', "email",
            array('label'=>"Email",
                'attr'=>array('placeholder' => 'saisissez votre email',
                    'class' => 'form-control input-sm'
                )
            ));
        $builder->add('message', "textarea",
            array('label'=>"Message",
                'attr'=>array('placeholder' => 'saisissez votre message',
                    'class' => 'form-control input-sm'
                )
            ));
        $builder->add('send', "submit",
            array('label'=>"Envoyer",
                'attr'=>array('class' => 'btn btn-primary btn-sm')
            ));

    }

    public function getName()
    {
        //form name
        return 'contact';
    }
}