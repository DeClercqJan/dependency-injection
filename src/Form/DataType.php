<?php

namespace App\Form;

use App\Entity\Data;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
//            ->add('dataTransformOptionsList', CollectionType::class, [
//                'entry_type' => ChoiceType::class,
//                'entry_options' => [
//                    'choices' => [
////                        'Nashville' => 'nashville',
////                        'Paris' => 'paris',
////                        'Berlin' => 'berlin',
////                        'London' => 'london',
//                        'spaties naar streepjes' => 'spaties naar streepjes',
//                        'hoofdletters' => 'hoofdletters',
//                    ],
//                ],
//            ])
//            ->add('transformOption', CollectionType::class, [
//                'entry_type' => ChoiceType::class,
//                ['choices' => [
//                    'spaties naar streepjes' => 'spaties naar streepjes',
//                    'hoofdletters' => 'hoofdletters',
//                ]
//                ]])
            ->add('transformOption', ChoiceType::class, [
                'choices' => [
                    'spaties naar streepjes' => 'spaties naar streepjes',
                    'hoofdletters' => 'hoofdletters',
                ],
            ])
            // this works in the sense that it display this field (not any others) correctly, but nothing else. also, the previous field disappears
//            ->add('data', ChoiceType::class,
//                ['choices' => [
//                    'spaties naar streepjes' => 'spaties naar streepjes',
//                    'hoofdletters' => 'hoofdletters',
//                ]
//                ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Data::class,
        ]);
    }
}
