<?php 
namespace App\Controller;

Class FrontendController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('movies');

    }
    
    public function home() {
        $movies = $this->movies->getTrendingMovies();
        $shows = $this->movies->getTrendingShows();
        $this->setTitle("Home");
        $this-> render('home', $movies, $shows);
    }
}