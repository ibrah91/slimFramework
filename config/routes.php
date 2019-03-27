<?php

// Creation d'une route
use App\Controller\AboutController;
use App\Controller\ContactController;
use App\Controller\ProjectController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$route = $app->get("/", function (ServerRequestInterface $request, ResponseInterface $response, ?array $args) {
    // On retourne une reponse
    //return $response->getBody()->write('<h1>Bonjour</h1>');

    return $this->view->render($response, 'home.twig');
});
$route->setName('homepage');

//Groupe des routes du projet
$app->group('/projet', function () {

    // Création d'une page de détail des projets
    // Nouveauté : on ajoute une variable dans l'URL avec les accolades

    $this->get("/{id:\d+}", ProjectController::class . ':show')->setName('app_project_show');
    // Page de création
    $this->get("/creation", ProjectController::class . ':create')->setName('app_project_create');
    //Page de contact
    $this ->get ("/contact",ProjectController::class.':contact')->setName('app_project_contact');
});

// Page de contact

$app->get('/contact', ContactController::class . ':contact')->setName('app_contact');

// Page à propos

$app->get('/a-propos', AboutController::class . ':about')->setName('app_about');
?>