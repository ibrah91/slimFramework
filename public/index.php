<?php
//Autoloader

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new App();

//Création d'une route

$app->get("/", function (
    ServerRequestInterface $request, ResponseInterface $response,
    ?array $args
) {
    //On retourne une réponse

    return $response->getBody()->write('<h1>Bonjour ibrah !!! </h1>');
}
)
    ->setName("homepage");

$app->group('/projet', function () {

    $this->get("/{id:\d+}", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args

    ) {
        //On retourne une réponse

        return $response->getBody()->write('<h1>ah ah ah  !!! </h1>');

    })->setName('app_project_show');


    $this->get("/creation", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args

    ) {
        //On retourne une réponse

        return $response->getBody()->write('<h1>Cretion d\'un projet </h1>');

    })->setName('app_project_create');
});

// Création d'une page de détail des projets
// Nouvveauté : on ajoute une variable dans l'URL avec les accolades

//Création de l'application

//Crétion d'une route

//Création et renvoi de la réponse au navigateur
$app->run();
