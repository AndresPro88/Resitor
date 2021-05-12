<?php

namespace App\Form;

use App\Entity\MedicosMAP;
use App\Entity\Podologo;
use App\Entity\Residente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditarResidenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,[
                'label' => 'Nombre del Residente',
                'help' => 'Inserte solo el Nombre de Usuario'
            ])
            ->add('primer_apellido', TextType::class,[
                'label' => 'Primer Apellido'
            ])
            ->add('segundo_apellido',TextType::class,[
                'label' => 'Segundo Apellido'
            ])
            ->add('dni',TextType::class,[
                'label' => 'DNI/NIF',
                'attr' => [
                    'class' => 'dni',
                ],
                'label_attr' => [
                    'class' => 'dni_label',
                ]
            ])
            ->add('num_ss',TextType::class,[
                'label' => 'Número de la Seguridad Social'
            ])
            ->add('fecha_nac', BirthdayType::class,[
                'label' => 'Fecha de Nacimiento'
            ])
            ->add('fecha_ingreso',DateType::class,[
                'label' => 'Fecha de Ingreso',
                'format' => 'dd MM yyyy',
                'years' => range(date('Y')-15, date('Y') + 1)])
            ->add('med_map',EntityType::class,[
                'label' => 'Medico de Atencion Primaria',
                'class' => MedicosMAP::class,
                'choice_label' => 'nombre',
                'expanded' => false,
                'multiple' => false
            ])
            ->add('podologia',EntityType::class,[
                'label' => 'Podologo Asociado',
                'class' => Podologo::class,
                'choice_label' => 'nombre',
                'expanded' => false,
                'multiple' => false
            ])
            ->add('num_habitacion',NumberType::class,[
                'label' => 'Numero de Habitación'
            ])
            ->add('num_lav',NumberType::class , [
                'label' => 'Numero de Lavandería'
            ])
            ->add('alergias',TextareaType::class,[
                'label'=>'Alergias Conocidas'
            ])
            ->add('oxigeno',ChoiceType::class,[
                'choices' => [
                    'Ninguno' => 0,
                    'Botella' => 1,
                ],
            ])
            ->add('anticoagulante',ChoiceType::class,[
                'choices' => [
                    'Ninguno' => 0,
                    'Oral' => 1,
                    'Via intravenosa' => 2,
                    'Subcutaneo' => 3,
                ],
            ])
            ->add('hipertension',ChoiceType::class,[
                'choices' => [
                    'Ninguno' => 0,
                    'Tipo Primario' => 1,
                    'Tipo Secundario' => 2,
                ],
            ])
            ->add('diabetes',ChoiceType::class,[
                'choices' => [
                    'Ninguno' => 0,
                    'Tipo 1' => 1,
                    'Tipo 2' => 2,
                ],
            ])
            ->add('demencia',ChoiceType::class,[
                'label' => 'Demencia detectada',
                'choices' => [
                    'Ninguno' => 0,
                    'Enfermedad de Alzheimer' => 1,
                    'Demencia vascular' =>2,
                    'Demencia con cuerpos de Lewy' =>3,
                    'Demencia frontotemporal' =>4,
                    'Demencia mixta' =>5,
                ],
            ])
            ->add('nivel_dependencia', ChoiceType::class,[
                'label' => 'Nivel de Dependencia',
                'choices' => [
                    'Ninguno' => 0,
                    'Grado I' => 1,
                    'Grado II, Nivel 1' =>2,
                    'Grado II, Nivel 2' =>3,
                    'Grado III, Nivel 1' =>4,
                    'Grado III, Nivel 2' =>5,
                ],
            ])
            ->add('enviar', SubmitType::class,[
                'label' => 'Registrar Residente'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Residente::class,
        ]);
    }
}
