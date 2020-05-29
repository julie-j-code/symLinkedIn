<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     *  $Route(/user)  
     */

    // Méthode qui consiste ici à créer un formulaire 
    // directement à l'intérieur de notre controller
    // peu recommandée car le code généré n'est pas mutualisable

    function createUserForm()
    {
        // instance de l'entité
        $user = new User();
        // méthode qui appartient à la classe AbstractController
        // à laquelle on passe une instance de notre entité
        $form = $this->createFormBuilder($user)
            // et on ajoute des champs via la méthode add
            ->add('name')
            ->add('email')
            // et créer le formulaire grâce à la méthode getForm
            ->getForm();

        // on rend notre formulaire
        return $this->render('form.html.twig', [
            // vue crée via la méthode createView de createForm
            'form' => $form->createView()
        ]);
    }
}
