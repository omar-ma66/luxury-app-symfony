<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('active')
          ->add('notes', TextareaType::class, [
    'attr' => [
        'class' => 'w-full h-48 p-2.5 block rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-800 border resize-y',
        'placeholder' => 'Tapez vos notes ici...'
    ]
])
            ->add('intitule')
            ->add('type',ChoiceType::class,[
                'choices'=>["temps partiel"=>"Temps partiels","temps plein"=>"Temps plein",'temporaire'=>'temporaire','freelance'=>'freelance','saisonnier'=>'saisonnier']
            ])
            ->add('categorie',ChoiceType::class,[
                'choices'=>['Commercial'=>'commercial','vente au détail'=>'vente au détail','création'=>'création','technologie'=>'technologie','marketing'=>'marketing','mode et luxe'=>'mode et luxe','management et RH'=>'management et RH']
            ])
            ->add('creation', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
