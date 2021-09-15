<?php

namespace App\Form;

use App\Entity\MedicosMAP;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrarMapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('med_map',EntityType::class,[
                'label' => 'Medico de Atencion Primaria',
                'class' => MedicosMAP::class,
                'choice_label' => 'nombre',
                'expanded' => false,
                'multiple' => false
            ])
            ->add('borrar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
