<?php 
namespace App\Controller;

Class FrontendController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('movies');
        $this->loadModel('games');
    }
    
    public function home() {
        $movies = $this->movies->getTrendingMovies();
        $shows = $this->movies->getTrendingShows();
        $games = $this->games->getTrendingGames();        
        $this->setTitle("Home");
        $this-> render('home', $movies, $shows, $games);
    }
}