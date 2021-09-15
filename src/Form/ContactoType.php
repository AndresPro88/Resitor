<?php

namespace App\Form;

use App\Entity\Contacto;
use App\Entity\Residente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,[
                'label' => 'Nombre del contacto'
            ])
            ->add('telefono',TextType::class,[
                'label' => 'Teléfono de contacto'
            ])
            ->add('email',EmailType::class,[
                'label' => 'Dirección Email'
            ])
            ->add('relacion',ChoiceType::class,[
                'label' => 'Tipo Relación',
                'choices' => [
                    'Familiar de 1º Grado' => 0,
                    'Familiar de 2º Grado' => 1,
                    'Tutor' => 2,
                    'Pariente Lejano' => 3,
                    'Amistad' => 4
                ],
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
            ->add('urgencia',ChoiceType::class,[
                'label' => 'Contacto de urgencia',
                'choices' => [
                    'Si' => true,
                    'No' => false
                ]
            ])
            ->add('enviar',SubmitType::class,[
                'label' => 'Registrar Contacto'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
