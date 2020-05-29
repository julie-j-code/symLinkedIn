<?php

namespace App\Form;

// Les classes dans Form auront la responsabilité de créer des formulaires au lieu de les créer dans mes contrôleurs
// UserType aura donc la responsabilité de créer le formulaire user

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('date', DateType::class)
            ->add('save', SubmitType::class);
    }

    // Va devoir implémenter des méthodes disponibles dans AbstractType
    // Classe qui a une valeur d'interface (contraignante)
    // UserType devra donc implémenter des méthodes conformément à ce qui est défini dans AbtractType
    // Surcharger les méthodes qui sont vides de l'interface
    // Exemple buidForm devra ajouter un argument $builder
}
