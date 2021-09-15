<?php

namespace App\Form;

use App\Entity\Residente;
use App\Entity\Sondas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SondasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha_cambio',DateTimeType::class,[
                'label' => 'Fecha del Cambio de sondaje'
            ])
            ->add('tipo_sonda',ChoiceType::class,[
                'label' => 'Tipo de sondaje aplicado',
                'choices' => [
                    'Ninguno' => 0,
                    'Sonda vesical' => 1,
                    'Sonda uretral' => 2,
                    'Sonda rectal' => 3,
                    'Sonda nasogástrica' => 4,
                    'Sonda intestinal' => 5,
                    'Sonda de oxigeno' => 6
                ]
            ])
            ->add('motivo',TextType::class,[
                'label'=> 'Motivo del sondaje'
            ])
            ->add('numero',NumberType::class,[
                'label' => 'Calibre'
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
            ->add('enviar',SubmitType::class,[
                'label'=>'Registrar sondaje'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sondas::class,
        ]);
    }
}
