<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     *  $Route(/user)  
     */

    // Méthode qui consiste ici à créer un formulaire 
    // directement à l'intérieur de notre controller
    // peu recommandée car le code généré n'est pas mutualisable

    function createUserForm(Request $request)
    {
        // instance de l'entité
        $user = new User();
        // méthode qui appartient à la classe AbstractController
        // à laquelle on passe une instance de notre entité
        $form = $this->createFormBuilder($user)
            // et on ajoute des champs via la méthode add
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('save', SubmitType::class)
            // et créer le formulaire grâce à la méthode getForm
            ->getForm();

        // on demande à l'objet form d'inspecter l'objet request
        $form->handleRequest($request);
        if ($form->isSubmitted() &&  $form->isValid()) {
            return new Response('Formulaire Validé !');
        }


        // on rend notre formulaire
        return $this->render('form.html.twig', [
            // vue crée via la méthode createView de createForm
            'form' => $form->createView()
        ]);
    }
}
