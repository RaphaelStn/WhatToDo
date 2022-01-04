<?php
use App\Controller\FrontendController;
use App\Controller\BackendController;

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
    case 'stream_poster' :
        $controller = new FrontendController();
        $controller-> stream_poster();
        break;
    case 'login' : 
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
            $controller = new BackendController();
            $controller->home();
            break;
        } else {
            $controller = new FrontendController();
            $controller->login();
            break;
        }
    case 'register' : 
        $controller = new FrontendController();
        $controller->register();
        break;
    case 'admin' : 
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == true && $_SESSION['user_id'] == '1') {
            $controller = new BackendController();
            $controller->admin();
        } else {
            $controller = new FrontendController();
            $controller->http404();
        }
        break;
    default : 
        $controller = new FrontendController();
        $controller->http404();
}