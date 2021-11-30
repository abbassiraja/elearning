<?php
namespace App\Form;

use App\Entity\Ecoles;
use App\Data\SearchData;
use App\Entity\NiveauScolaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    
                    'placeholder' => 'rechercher'
                ],
                
            ])

            ->add('niveauscolaire', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => NiveauScolaire::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('ecole', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Ecoles::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix min'
                ]
                ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix max'
                ]
                ]);

    }





    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'Data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix(){
        return ''; 
    }
}