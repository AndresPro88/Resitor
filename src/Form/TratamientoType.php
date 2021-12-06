<?php

namespace App\Form;

use App\Entity\Tratamiento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('tipo_medicamento',ChoiceType::class,[
                'label' => 'Tipo de Medicamento',
                'choices' => [
                    'Analgésicos' => 0,
                    'Antiácidos' => 1,
                    'Antialérgicos' => 2,
                    'Antidiarreicos' => 3,
                    'Antibióticos' => 4,
                    'Antifúngicos' => 5,
                    'Antivirales' => 6,
                    'Antiparasitarios' => 7,
                    'Antiinflamatorios' => 8,
                    'Antitusivos' => 9,
                    'Laxantes' => 10,
                    'Mucolíticos' => 11
                ]
            ])
            ->add('fecha_inicio', DateType::class,[
                'label' => 'Fecha de incio del tratamiento'
            ])
            ->add('fecha_fin', DateType::class,[
                'label' => 'Fecha de fin del tratamiento'
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
