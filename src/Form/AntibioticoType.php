<?php

namespace App\Form;

use App\Entity\Antibiotico;
use App\Entity\MedicosMAP;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AntibioticoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_antibiotico',DateTimeType::class,[
                'label' => 'Fecha de antibiotico'
            ])
            ->add('indicacion',TextareaType::class,[
                'label' => 'Indicaciones'
            ])
            ->add('pauta',TextareaType::class,[
                'label' => 'Pauta'
            ])
            ->add('medicoMap',EntityType::class,[
                'label' => 'Medico de Atencion Primaria',
                'class' => MedicosMAP::class,
                'choice_label' => 'nombre',
                'expanded' => false,
                'multiple' => false
            ])
            ->add('enviar',SubmitType::class,[
                'label' => 'Añadir Antibiotico'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Antibiotico::class,
        ]);
    }
}
