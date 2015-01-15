<?php
namespace Cinema\BoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Email;

class MoviesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('typeFilm', "text",
                        array('label'=>"Type de film",
                               'label_attr' => array('class' => ''),
                               'attr'=>array('placeholder' => 'saisissez le type de film',
                                             'class' => 'form-control'
                                            ),
                                'constraints' => array(
                                                        new NotBlank(array('message'=>'Renseignez le type')),
                                                        new Length(array('min' => 3,'minMessage'=>'Saisir 3 caracteres au minimum')),
                                                        new Length(array('max' => 100,'maxMessage'=>'Saisir 100 caracteres au maximum'))

                                                     )
                        )
                    );
        $builder->add('title', null,
                        array('label'=>"Title",
                              'label_attr' => array('class' => ''),
                               'attr'=>array('placeholder' => 'saisissez le titre du film',
                                             'class' => 'form-control input-sm'
                                             ),
                                'constraints' => array(
                                    new NotBlank(),
                                    new Length(array('min' => 3,'minMessage'=>'Saisir 3 caracteres au minimum')),
                                    new Length(array('max' => 60,'maxMessage'=>'Saisir 60 caracteres au maximum')),
                                    new Regex(array('pattern'=>'/[A-Za-z]/'))
                                )
            ));
        $builder->add('synopsis', "text",
                        array('label'=>"Synopsis",
                              'label_attr' => array('class' => ''),
                                'attr'=>array('placeholder' => 'Tapez url',
                                                'class' => 'form-control input-sm'),
                            'constraints' => array(
                                new NotBlank(array('message'=>'Renseignez le synopsis'))
                            )
            ));
        $builder->add('description', 'textarea',
                        array('label'=>"Description",
                                'label_attr' => array('class' => ''),
                                'attr'=>array('placeholder' => 'saisissez la description',
                                         'class' => 'form-control input-sm'
                                        ),
                                'constraints' => array(
                                    new NotBlank(array('message'=>'Renseignez la description'))
                                    )
                                )
                        );
        $builder->add('image', null,
                        array('label'=>"Image",
                              'label_attr' => array('class' => ''),
                              'attr'=>array('placeholder' => 'entrez url image',
                                            'class' => 'form-control input-sm'
                                            )
            ));

        $builder->add('send', "submit",
                       array('label'=>"",
                             'attr'=>array('class' => 'btn btn-primary btn-sm')
            ));

    }

    public function getName()
    {
        //form name
        return 'Movies';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cinema\BoBundle\Entity\Movies',
        ));
    }
}