<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TwigController extends AbstractController
{
    public $variableToDisplay = "Hello";

    /**
     * @Route("twig")
     */
    function displayRoute()
    {
        $array = ["macarons", "flan", "forêt noire", "opéra"];
        return $this->render("twigContr.html.twig", ['toDisplay' => $this->variableToDisplay, 'array' => $array]);
    }
}
