<?php
use App\Controller\FrontendController;
use App\Controller\BackEndController;

// variable 'ROOT' for faster acces to main dir
define('ROOT', dirname(__DIR__)); 


// Init session & init autoloader / twig
require  ROOT . '/app/App.php';
App::load(); 

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
    case 'game_poster' :
        $controller = new FrontendController();
        $controller-> game_poster();
        break;
    case 'movie_poster' :
        $controller = new FrontendController();
        $controller-> movie_poster();
        break;
    case 'show_poster' :
        $controller = new FrontendController();
        $controller-> show_poster();
        break;
    case 'book_poster' :
        $controller = new FrontendController();
        $controller-> book_poster();
        break;
    case 'login' : 
        if(isset($_SESSION['auth']) && $_SESSION['auth'] = true) {
            $controller = new BackendController();
            $controller->home();
            break;
        } else {
            $controller = new FrontEndController();
            $controller->login();
            break;
        }
    case 'register' : 
        $controller = new FrontEndController();
        $controller->register();
        break;
    default : 
        $controller = new FrontendController();
        $controller->http404();
}