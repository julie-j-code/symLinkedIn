<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;


class ResponseController {
/**
* @Route("/response")
*/
function CustomResponse() {
    // 1. arguments du contrôleur

    // Les codes de statut de réponse HTTP indiquent si une requête HTTP a été exécutée avec succès ou non. 
    // Les réponses sont regroupées en cinq classes : les réponses informatives, les réponses de succès, les redirections, 
    // les erreurs du client et les erreurs du serveur.
    // status codes : montrer la liste des codes, et variables + text messages associés dans l'objet Response

    // HTTP headers allow the client and the server to pass additional information with the request or the response. 
    // An HTTP header consists of its case-insensitive name followed by a colon ':', then by its value (without line breaks). 
    // Leading white space before the value is ignored.
    
    // paramètres par défaut : 200, headers transmis par ResponseHeaderBag (les lister puis montrer comment 
    // y accéder : cache-control, date)

    $response = new Response('Un objet Response.', 500, ['content-type' => 'json', 'test-header'=> 'test value']);
    // erreur, headers : montrer résultat sur navigateur / postman

    // On peut ensuite manipuler le contenu.
    $response->setContent('Contenu modifié.');


    // Un cookie HTTP (cookie web, cookie de navigateur) : petit ensemble de données qu'un serveur envoie au navigateur 
    // web de l'utilisateur. Le navigateur peut alors le stocker localement, puis le renvoyer à la prochaine requête vers
    // le même serveur. Typiquement, cette méthode est utilisée par le serveur pour déterminer si deux requêtes proviennent 
    // du même navigateur — pour exemple pour garder un utilisateur connecté. Les cookies permettent de conserver de 
    // l'information en passant par le procotole HTTP qui est lui "sans état".
    // 3 raisons principales :
    // Gestion des sessions : Logins, panier d'achat, score d'un jeu, ou tout autre chose dont le serveur doit se souvenir.
    // Personnalisation : Préférences utilisateur, thèmes, et autres paramètres.
    // Suivi : Enregistrement et analyze du comportement utilisateur.

    // Bien faire attention à bien importer le bon package Cookie
    $response->headers->setcookie(new Cookie('basket', '[nutella, strawberry]', time() + 30 * 60));

    // Différencier cookies (info temporaire à renvoyer au serveur) et local storage (info à stocker côté client)
    return $response;
}

}