<?php

namespace App\Form;

use App\Entity\Accidente;
use App\Entity\Residente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccidenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_accidente',DateTimeType::class,[
                'label'=>'Fecha y hora del accidente'
            ])
            ->add('consecuencias',TextareaType::class,[
                'label' => 'Consecuencias del Accidente'
            ])
            ->add('actuacion_due',TextareaType::class,[
                'label'=>'Actuacion DUE'
            ])
            ->add('residente',EntityType::class,[
                'label' => 'Residente',
                'class' => Residente::class,
                'choice_label' => function(Residente $residente){
                return $residente->getNombre() .' ' . $residente->getPrimerApellido().' '.$residente->getSegundoApellido();
                },
                'expanded' => false,
                'multiple' => false
            ])
            ->add('Guardar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Accidente::class,
        ]);
    }
}
