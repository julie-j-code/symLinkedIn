<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController
{
    function hello()
    {
        $title = "utilisateurs";
        $users = ["Denis", "Francis", "Christophe", "Franck"];

        /*return new Response('Hello !');
        la méthode render appartient à la classe AbstractController 
        rendu accessible à HelloController qui étend la classe AbstractController */
        return $this->render(
            'hello.html.twig',
            ['title' => $title, 'array' => $users]
        );
        /*de même pour la méthode de redirection 
        return $this->redirectToRoute('/');
        throw $this->createNotFoundException();
        */
    }
}
