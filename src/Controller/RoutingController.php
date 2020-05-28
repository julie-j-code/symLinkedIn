<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class RoutingController extends AbstractController
{

    // Hierarchie de routes

    // Route exacte, erreur si route/qqchose
    /**
     * @Route("route1")
     */
    function displayRoute()
    {
        return new Response("Route exacte.");
    }

    // Route avec un paramètre spécifique
    /**
     * @Route("route1/{param<\d+>}")
     */
    function displayRouteWithDigitFragment()
    {
        return new Response("Route avec fragment numérique.");
    }

    // Autres notation :avec requirements => montrer sur la précédente

    // Route avec un paramètre spécifique
    /**
     * @Route("route1/{param}", requirements={"param"="\D"})
     */
    function displayRouteWithRegex()
    {
        return new Response("Route avec REGEX");
    }

    // Route avec n'importe quel paramètre
    /**
     * @Route("route1")
     */
    function displayRouteWithAnyFragment()
    {
        return new Response("Route avec fragment.");
    }

    // Route en fonction d'une méthode. Les différentes méthodes ont déjà été expliquées.

    /**
     * @Route("routeWithMethod", methods={"GET"})
     */
    function getMethod()
    {
        // On cherche un élément
        return new Response("GET");
    }

    /**
     * @Route("getElement", methods={"POST"})
     */
    function postMethod()
    {
        // On cherche un élément
        return new Response("POST");
    }

    // Les requirements sont cumulables



    // Récupérer des fragments :

    // Routes dynamiques : récupérer des paramètres
    // Seconde façon de faire : par rapport à précédent
    // Obtenir des paramètres passés comme fragments d'Urls (API Rest)

    /**
     * @Route("getParam/{param}", methods={"GET"})
     */
    function getParam($param)
    {
        return new Response("Paramètre : " . $param);
    }


    // Locale de l'utilisateur

    /**
     * @Route("getLocale")
     */
    function getLocale(Request $request)
    {
        $locale = $request->getLocale();
        return new Response("Locale : " . $locale);
    }

    /**
     * @Route("getLocale/{_locale}")
     */
    function getLocaleWithSpecialFormat(Request $request)
    {
        $locale = $request->getLocale();
        return new Response("Locale : " . $locale);
    }

    /**
     * @Route({
     *      "fr": "/localisee",
     *      "en": "/localised"})
     */
    function getLocaleWithUrl(Request $request)
    {
        $locale = $request->getLocale();
        return new Response("Locale : " . $locale);
    }

    // Exemple complexe :

    /**
     * @Route("user/{id<\d+>}", name="getUser", methods={"GET"})
     */
    function getUserById($id)
    {
        $userName = "eze";
        // Chercher user en base de donnée
        return new JsonResponse([
            'id' => $id,
            'name' => $userName
        ]);
    }

    /**
     * @Route("user", methods={"POST"})
     */
    function postUser()
    {
        $userName = "eze";
        // Chercher user en base de donnée
        return new JsonResponse([
            'id' => $id,
            'name' => $userName
        ]);
    }


    // Rendre dans un template 
    // Générer des urls : name
    // Attention : urls générées doivent néanmoins avoir une route associée enregistrée

    /**
     * @Route("/generateUrls")
     */
    function generateUrls()
    {
        $number = random_int(0, 20);
        var_dump($number);
        return $this->render("routing.html.twig", ['urlParam' => $number]);
    }

    /**
     * @Route("/simpleRoute", name="simpleRoute")
     */
    function simpleRouteView()
    {
        return new Response("Simple route !");
    }

    /**
     * @Route("/routeWithParam/{param}", name="routeWithParam")
     */
    function paramRouteView($param)
    {
        return new Response("Route avec paramètres : " . $param);
    }
}
