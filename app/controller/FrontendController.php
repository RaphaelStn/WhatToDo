<?php 
namespace App\Controller;
use \Core\Controller\Controller;

Class FrontendController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->loadModel('movies');
        $this->loadModel('games');
    }
    
    public function home() {
        $movies = $this->movies->getTrendingMovies();
        $shows = $this->movies->getTrendingShows();
        $games = $this->games->getTrendingGames();
        $twig = $this->loadTwig();
        echo $twig -> render('home.twig',['movies' => $movies,'shows' => $shows, 'games' => $games]);
    }
}