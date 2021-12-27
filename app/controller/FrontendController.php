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
    public function movie() {
        $movies = $this->movies->getTrendingMovies();
        $twig = $this->loadTwig();
        echo $twig -> render('movie.twig',['movies' => $movies]);
    }
    public function show() {
        $shows = $this->movies->getTrendingShows();
        $twig = $this->loadTwig();
        echo $twig -> render('show.twig',['shows' => $shows]);
    }
    public function game() {
        $games = $this->games->getTrendingGames();
        $twig = $this->loadTwig();
        echo $twig -> render('game.twig',['games' => $games]);
    }
    public function book() {
        $twig = $this->loadTwig();
        echo $twig -> render('book.twig');
    }
    public function gameRandom() {
        $game = $this->games->GetRandomGame();
        $twig = $this->loadTwig();
        echo $twig -> render('randomGame.twig',['game' => $game]);
    }
    public function movieRandom() {
        $movie = $this->movies->GetRandomMovie();
        $twig = $this->loadTwig();
        echo $twig -> render('randomMovie.twig',['movie' => $movie]);
    }
    public function showRandom() {
        $show = $this->movies->GetRandomShow();
        $twig = $this->loadTwig();
        echo $twig -> render('randomShow.twig',['show' => $show]);
    }
    public function bookRandom() {
        $twig = $this->loadTwig();
        echo $twig -> render('randomBook.twig');
    }
}