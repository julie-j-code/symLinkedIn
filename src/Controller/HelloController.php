<?php

namespace App\Controller;
// Montrer que sans namespace, Symfony engendre une erreur. Expliquer pk. 

use Symfony\Component\HttpFoundation\Response;
// Bien préciser d'importer (montrer l'erreur)
// Préciser que le format d'annotation doit être respecté (exemple avec des quotes)
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController
{
    /**
     * @Route("/hello")
     */
    function hello()
    {
        return new Response(
            '<html><body>
            Hello ! </br>
            Il est actuellement : ' . date('H:i:s') .
                '</body></html>'
        );
    }

    // Attribue le header Content-Type à application/json 
    // encode les données en JSON 

    /**
     * @Route("/api/hello")
     */
    function helloJSON()
    {
        // Encode un tableau associatif en JSON
        // date est une fonction
        return new JsonResponse(
            [
                'message' => 'hello',
                'time' => date('H:i:s')
            ]
        );
    }
}
