<?php

namespace App\Controller;
// A importer
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class RequestController extends AbstractController {

/**
 * @Route("request")
 */
function getRequestParams(Request $request) {
    // montrer comment ajouter des paramètres sur PostMan pour GET

    // var_dump($request->query);die;
    // {{url}}/request?param1=yo
    // return new Response("Les paramètres optionnels sont :" . $request->query->get("param1"));
    // Alternative : $request = Request::createFromGlobals();
    // Expliquer ce que signifie une méthode statique
    // Revient à contruire l'objet Request à partir des variables PHP globales.
    // $request = new Request($_GET);

    // Exploiter $request->query : instance de ParameterBag
    // var_dump($request->query->all());
    // var_dump($request->query->keys());
    // var_dump($request->query->has("param1")); 
    // die;

    $params = $request->query->all();
    // Si on var_dump query : l'ensemble des paramètres dans propriété "parameters" => utiliser all()
    // ne pas itérer directement dessus.
    $string = "Les paramètres sont : </br>";
    foreach($params as $key => $value) {
        $string = $string . '-' . $key . ':' . $value . '</br>';
    }
    return new Response($string);
}

/**
 * @Route("fakeRequest")
 */
function getFakeRequest() {
    // Valeur de test
    // Autrement : enregistrer collection PostMan
    $request = Request::create("request", "GET", ["param1"=> "1", "param2"=> "2"]);
    $params = $request->query;
    $string = "Les paramètres sont : </br>";
    foreach($params as $key => $value) {
        $string = $string . '-' . $key . ':' . $value . '</br>';
    }
    return new Response($string);

}


/**
 * @Route("requestWithMethod")
 */
function getRequestParamsWithMethods(Request $request) {

// Expliquer les différents types de méthodes
    /**
     * Sets the parameters for this request.
     *
     * This method also re-initializes all properties.
     *
     * @param array                $query      The GET parameters
     * @param array                $request    The POST parameters
     * @param array                $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
     * @param array                $cookies    The COOKIE parameters
     * @param array                $files      The FILES parameters
     * @param array                $server     The SERVER parameters
     * @param string|resource|null $content    The raw body data
     */

     
    // montrer comment ajouter des paramètres sur PostMan pour POST

    if ($request->isMethod('GET')) {
    return new Response("Les paramètres optionnels sont :" . $request->query->get("param1"));
    } 
    else if ($request->isMethod('POST')) {
        // var_dump($request->request);
        // L'ensemble des paramètres est contenu dan s
        // die;
        $params = $request->request->all(); 
        var_dump($params);
        die;
        
    }
    
}

}
