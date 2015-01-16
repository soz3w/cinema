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
        $builder->add('ref', "text",
                        array('label'=>"Synopsis",
                              'label_attr' => array('class' => ''),
                                'attr'=>array('placeholder' => 'Tapez la ref',
                                                'class' => 'form-control input-sm'),
                            'constraints' => array(
                                new NotBlank(array('message'=>'Renseignez la ref'))
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
        $builder->add('price', null,
                        array('label'=>"Prix",
                              'label_attr' => array('class' => ''),
                              'attr'=>array('placeholder' => 'entrez le prix',
                                            'class' => 'form-control input-sm'
                                            )
            ));

        $builder->add('shopMode', null,
            array('label'=>"Shop mode",
                'label_attr' => array('class' => ''),
                'attr'=>array('placeholder' => 'entrez le shop mode',
                    'class' => 'form-control input-sm'
                )
            ));

        $builder->add('shopTypeDvd', null,
            array('label'=>"Shop type dvd",
                'label_attr' => array('class' => ''),
                'attr'=>array('placeholder' => 'entrez le shop type dvd',
                    'class' => 'form-control input-sm'
                )
            ));
        $builder->add('taxe', null,
            array('label'=>"Taxe",
                'label_attr' => array('class' => ''),
                'attr'=>array('placeholder' => 'entrez la taxe',
                    'class' => 'form-control input-sm'
                )
            ));

        $builder->add('Actors', 'collection', array('type' => new ActorsType(),
                                                    'allow_add'=>true,
                                                    'allow_delete' =>true)
        );

        $builder->add('categories', new CategoriesType());


        $builder->add('tags', 'entity', array('class'  => 'CinemaBoBundle:Tags',
                                               'property' => 'word',
                                               'multiple' => true,
                                                'attr'=>array("class"=>"selectpicker"))
        );
        $builder->add('send', "submit",
                       array('label'=>"Envoyer",
                             'attr'=>array('class' => 'btn btn-primary btn-lg pull-right')
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