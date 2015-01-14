<?php
namespace Cinema\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Email;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recipient', "choice",
            array('label'=>"Destinataire",
                'choices'=>['Administrateur','Commercial','Technicien'],
                'attr'=>array('class' => 'form-control')
            ));
        $builder->add('subject', "text",
                        array('label'=>"Sujet",
                               'attr'=>array('placeholder' => 'saisissez votre sujet',
                                             'class' => 'form-control input-sm'
                                            ),
                                'constraints' => array(
                                                        new NotBlank(array('message'=>'Renseignez le sujet')),
                                                        new Length(array('min' => 3,'minMessage'=>'Saisir 3 caracteres au minimum')),
                                                        new Length(array('max' => 100,'maxMessage'=>'Saisir 100 caracteres au maximum'))

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
                                    new Length(array('min' => 3,'minMessage'=>'Saisir 3 caracteres au minimum')),
                                    new Length(array('max' => 60,'maxMessage'=>'Saisir 60 caracteres au maximum')),
                                    new Regex(array('pattern'=>'/[A-Za-z]/'))
                                )
            ));
        $builder->add('url', "text",
                        array('label'=>"Url",
                                'attr'=>array('placeholder' => 'Tapez url',
                                                'class' => 'form-control input-sm'),
                            'constraints' => array(
                                new NotBlank(array('message'=>'Renseignez une url')),
                                new Url(array('message'=>'Renseignez une url valide'))
                            )
            ));
        $builder->add('email', "email",
                        array('label'=>"Email",
                                'attr'=>array('placeholder' => 'saisissez votre email',
                                         'class' => 'form-control input-sm'
                                        ),
                                'constraints' => array(
                                          new NotBlank(array('message'=>'Renseignez un email')),
                                         new Email(array('message'=>'Renseignez un email valide'))
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