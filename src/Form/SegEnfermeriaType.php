<?php

namespace App\Form;

use App\Entity\SegEnfermeria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SegEnfermeriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('actividad', TextareaType::class, [
                'label' => 'Actividad Realizada'
            ])
            ->add('valoracion', TextareaType::class,[
                'label' => 'Valoración Enfermería'
            ])
            ->add('tratamiento',TextareaType::class,[
                'label' => 'Tratamiento'
            ])
            ->add('enviar',SubmitType::class,[
                'label' => 'Registrar Seguimiento',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SegEnfermeria::class,
        ]);
    }
}
