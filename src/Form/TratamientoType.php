<?php

namespace App\Form;

use App\Entity\Tratamiento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TratamientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicamento',TextType::class,[
                'label' => 'Medicamento'
            ])
            ->add('horario',ChoiceType::class,[
                'label' => 'Horarios',
                'choices' => [
                    'Desayuno' => 0,
                    'Comida' => 1,
                    'Cena' => 2,
                    'Recena' => 3
                ],
                'mapped' => false,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('observaciones',TextareaType::class,[
                'label' => 'Observaciones'
            ])
            ->add('actual',ChoiceType::class,[
                'choices' => [
                    'No' => false,
                    'Si' => true
                ]
            ])
            ->add('enviar',SubmitType::class,[
                'label' => 'Guardar Tratamiento'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tratamiento::class,
        ]);
    }
}
