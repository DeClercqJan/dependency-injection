<?php

namespace App\Form;

use App\Entity\Capitalize;
use App\Entity\Data;
use App\Entity\SpacesToDashes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class DataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ook ontdekt: verschillende namen nodig. dezelfde namen voor de verschillende add-pijltjes kunnen niet; overschrijven elkaars
            ->add('data', TextType::class)
            // 1 string property gezet (array lukte niet) die gewoon de huidige waarde bijhoudt
            ->add('transformOption', ChoiceType::class, [
                'choices' => [
                    // to do: dit stuk kan beter, is hardcoded
                    'SpacesToDashes' => 'SpacesToDashes',
                    'Capitalize' => 'Capitalize',
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
