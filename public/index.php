<?php
use App\Controller\FrontendController;

define('ROOT', dirname(__DIR__)); // On définit une variable ROOT pour naviguer dans les dossiers plus facilement.
require  ROOT . '/app/App.php';
App::load(); // Load() Initialise la session et les AutoLoaders des namespaces CORE et APP.

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
$p = 'home';
}

switch ($p) {
    case 'home' : 
        $controller = new FrontendController();
        $controller->home();
        break;
    case 'movie' : 
        $controller = new FrontendController();
        $controller->movie();
        break;
    case 'show' : 
        $controller = new FrontendController();
        $controller->show();
        break;
    case 'game' : 
        $controller = new FrontendController();
        $controller->game();
        break;
    case 'book' : 
        $controller = new FrontendController();
        $controller->book();
        break;
    case 'gameRandom' :
        $controller = new FrontendController();
        $controller-> gameRandom();
        break;
    case 'movieRandom' :
        $controller = new FrontendController();
        $controller-> movieRandom();
        break;
    case 'showRandom' :
        $controller = new FrontendController();
        $controller-> showRandom();
        break;
    case 'bookRandom' :
        $controller = new FrontendController();
        $controller-> bookRandom();
        break;
}