<?php

// namespace App\Form;

// use App\Entity\Candidat;
// use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// use Symfony\Component\Form\Extension\Core\Type\DateType;
// use Symfony\Component\Form\Extension\Core\Type\EmailType;
// use Symfony\Component\Form\Extension\Core\Type\TextareaType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Component\OptionsResolver\OptionsResolver;

// class CandidatType extends AbstractType
// {
//     public function buildForm(FormBuilderInterface $builder, array $options): void
//     {
//         $builder
//             ->add('nom',TextType::class,[])
//             ->add('prenom',TextType::class,[])
//             ->add('adresse',TextType::class,[])
//             ->add('pays',TextType::class,[])
//             ->add('nationalite',TextType::class,[])
//             ->add('naissance',DateType::class, [])
//             ->add('lieuNaissance',TextType::class,[])
//             ->add('mail',EmailType::class,[])
//             ->add('jobCategorie',ChoiceType::class,[
//                 'choices'=>['commercial'=>'commercial','vente au détail'=>'vente au détail','création'=>'création','technologie'=>'technologie','marketing'=>'marketing','mode et luxe'=>'mode et luxe','management et RH'=>'management et rh']
//             ])
//             ->add('experience',ChoiceType::class,[
//                 'choices'=>['de 0 a 6 mois'=>'de 0 a 6 mois','6 mois a 1 ans'=>'6 mois a 1 ans','1 a 2 ans'=>'1 a 2 ans','plus de 5 ans'=>'plus de 5 ans','plus de 10 ans'=>'plus de 10 ans']
//             ])
//             ->add('description',TextareaType::class,[])
//             ->add('genre',ChoiceType::class,[
//                 'choices'=>['choissiez une option...'=>"non renseigner",'homme'=>'homme','femme'=>'femme','transgenre'=>'transgenre']
//             ])
//         ;
//     }

//     public function configureOptions(OptionsResolver $resolver): void
//     {
//         $resolver->setDefaults([
//             'data_class' => Candidat::class,
//         ]);
//     }
// }


namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Design des inputs : bordures fines, coins arrondis modernes, focus soft indigo
        $inputStyle = 'mt-1 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200';
        
        // Design pour le champ date natif HTML5
        $dateStyle = 'mt-1 block w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200';

        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de famille',
                'attr' => ['class' => $inputStyle, 'placeholder' => 'Ex: Dupont']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => $inputStyle, 'placeholder' => 'Ex: Jean']
            ])
            ->add('genre', ChoiceType::class, [
                'label' => 'Genre',
                'choices' => [
                    'Choisissez une option...' => 'non renseigner',
                    'Homme' => 'homme',
                    'Femme' => 'femme',
                    'Transgenre' => 'transgenre'
                ],
                'attr' => ['class' => $inputStyle]
            ])
            ->add('naissance', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text', // Génère un superbe sélecteur de date natif
                'attr' => ['class' => $dateStyle]
            ])
            ->add('lieuNaissance', TextType::class, [
                'label' => 'Lieu de naissance',
                'attr' => ['class' => $inputStyle, 'placeholder' => 'Ex: Lyon']
            ])
            ->add('nationalite', TextType::class, [
                'label' => 'Nationalité',
                'attr' => ['class' => $inputStyle, 'placeholder' => 'Ex: Française']
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Adresse Email',
                'attr' => ['class' => $inputStyle, 'placeholder' => 'candidat@domaine.com']
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse résidentielle',
                'attr' => ['class' => $inputStyle, 'placeholder' => '15 Avenue des Champs-Élysées']
            ])
            ->add('pays', TextType::class, [
                'label' => 'Pays de résidence',
                'attr' => ['class' => $inputStyle, 'placeholder' => 'Ex: France']
            ])
            ->add('jobCategorie', ChoiceType::class, [
                'label' => 'Secteur d\'activité',
                'choices' => [
                    'Commercial' => 'commercial',
                    'Vente au détail' => 'vente au détail',
                    'Création' => 'création',
                    'Technologie' => 'technologie',
                    'Marketing' => 'marketing',
                    'Mode & Luxe' => 'mode et luxe',
                    'Management & RH' => 'management et rh'
                ],
                'attr' => ['class' => $inputStyle]
            ])
            ->add('experience', ChoiceType::class, [
                'label' => 'Expérience professionnelle',
                'choices' => [
                    'De 0 à 6 mois' => 'de 0 a 6 mois',
                    '6 mois à 1 an' => '6 mois a 1 ans',
                    '1 à 2 ans' => '1 a 2 ans',
                    'Plus de 5 ans' => 'plus de 5 ans',
                    'Plus de 10 ans' => 'plus de 10 ans'
                ],
                'attr' => ['class' => $inputStyle]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description / Parcours',
                'attr' => [
                    'class' => $inputStyle . ' resize-none', 
                    'rows' => 4, 
                    'placeholder' => 'Présentation synthétique du profil...'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}