<?php

namespace App\Controller;
// A importer
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class FormController extends AbstractController {

/**
* @Route("/userForm", methods={"GET"})
*/
    function createUserForm() {
        $user = new User();

        $user->setName('Nom');
        $user->setEmail('nom@gmail.com');

        $form = $this->createFormBuilder($user)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        return $this->render('form.html.twig', ['form' => $form->createView()]);
        
    }
    



}