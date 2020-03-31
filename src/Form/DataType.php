<?php

namespace App\Form;

use App\Entity\Data;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class DataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('logger')
            ->add('data', TextType::class)
            // ->add('dataTransformOptionsList',ChoiceType::class)
            ->add('dataTransformOptionsList', CollectionType::class, [
                'entry_type' => ChoiceType::class,
                'entry_options' => [
                    'choices' => [
//                        'Nashville' => 'nashville',
//                        'Paris' => 'paris',
//                        'Berlin' => 'berlin',
//                        'London' => 'london',
                        'spaties naar streepjes' => 'spaties naar streepjes',
                        'hoofdletters' => 'hoofdletters',
                    ],
                ],
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Data::class,
        ]);
    }
}
