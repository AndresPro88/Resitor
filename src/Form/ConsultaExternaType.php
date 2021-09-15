<?php

namespace App\Form;

use App\Entity\ConsultaExterna;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultaExternaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaConsulta',DateTimeType::class,[
                'label' => 'Fecha de la consulta'
            ])
            ->add('especialista')
            ->add('motivoConsulta',TextareaType::class,[
                'label' => 'Motivo de la consulta'
            ])
            ->add('valoracion',TextareaType::class,[
                'label' => 'Valoración del especialista'
            ])
            ->add('cambioTratamiento',TextareaType::class,[
                'label' => 'Cambio del tratamiento'
            ])
            ->add('proximaConsulta',DateTimeType::class,[
                'label' => 'Fecha de la proxima consulta'
            ])
            ->add('pComp',TextareaType::class,[
                'label' => 'Prubas complementarias'
            ])
            ->add('enviar',SubmitType::class,[
                'label' => 'Registrar Consulta Externa'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ConsultaExterna::class,
        ]);
    }
}
