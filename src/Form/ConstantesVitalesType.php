<?php

namespace App\Form;

use App\Entity\ConstantesVitales;
use App\Entity\Residente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConstantesVitalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('glucemia')
            ->add('tension_arterial_sistolica')
            ->add('tension_arterial_diastolica')
            ->add('frecuencia_cardiaca')
            ->add('frecuencia_respiratoria')
            ->add('saturacion_oxigeno')
            ->add('temperatura_corporal')
            ->add('peso')
            ->add('enviar',SubmitType::class,[
                'label' => 'Registrar Constantes'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ConstantesVitales::class,
        ]);
    }
}
