<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
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

    function createUserForm(Request $request)
    {
        // instance de l'entité
        $user = new User();
        // maintenant qu'on a crée une classe UserType, on peut commenter les lignes qui suivent
        //$form = $this->createFormBuilder($user)
        //    ->add('name', TextType::class)
        //    ->add('email', EmailType::class)
        //    ->add('save', SubmitType::class)
        //    ->getForm();


        // je passe juste à createForm la référence à la classe en charge de la création de formulaire
        // et la référence à mon entité
        $form = $this->createForm(UserType::class, $user);

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
