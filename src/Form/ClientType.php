<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomSociete', TextType::class, [
        'label' => 'Nom de la société',
        'required' => false,
        'attr' => ['placeholder' => 'Ex: MyCompany', 'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm']
    ])
    ->add('activite', TextType::class, [
        'label' => 'Secteur d\'activité',
        'required' => false,
        'attr' => ['placeholder' => 'Ex: Développement Web' ,'class'=>'block w-full']
    ])
    ->add('nomContact', TextType::class, [
        'label' => 'Nom',
        'attr' => ['placeholder' => 'Dupont','class'=>'block w-full']
    ])
    ->add('prenomContact', TextType::class, [
        'label' => 'Prénom',
        'attr' => ['placeholder' => 'Jean','class'=>'block w-full']
    ])
    ->add('mailContact', EmailType::class, [
        'label' => 'Adresse email',
        'attr' => ['placeholder' => 'jean.dupont@example.com','class'=>'block w-full']
    ])
    ->add('telContact', TelType::class, [
        'label' => 'Téléphone',
        'required' => false,
        'attr' => ['placeholder' => '06 12 34 56 78','class'=>'block w-full']
    ])
    ->add('messageContact', TextareaType::class, [
        'label' => 'description du poste',
        'attr' => [
            'rows' => 5,
            'placeholder' => 'Décrivez votre besoin...','class'=>'block w-full shadow whadow-blue-500 focus:shadow-blue-900'
        ]
    ])
;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}

