<?php 
namespace App\Controller;
use \Core\Controller\Controller;
use Core\Auth\DBAuth;

Class FrontendController extends Controller {

    public function __construct(){
        parent::__construct();
        // preload different API via LoadModel function defined in Core/Controller
        $this->loadModel('movies', 'api'); 
        $this->loadModel('games', 'api');
        $this->loadModel('users', 'table');
    }
    
    public function home() {
        // Fetching trending movie via function defined in the models API (ie: moviesApi here)
        $movies = $this->movies->getTrendingMovies(); 
        $shows = $this->movies->getTrendingShows();
        $games = $this->games->getTrendingGames();
        $twig = $this->loadTwig();
        // Rendering twig and sending datas to twig
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

    public function game_poster() {
        $game = $this->games->getRandomGame();
        $twig = $this->loadTwig();
        echo $twig -> render('game_poster.twig',['game' => $game]);
    }

    public function movie_poster() {
        //if id is set in GET method, display specific movie, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $movie = $this->movies->getIdMovie($id);
            $twig = $this->loadTwig();
            echo $twig -> render('movie_poster.twig',['movie' => $movie]);
        } 
        else {
            $movie = $this->movies->getRandomMovie();
            $twig = $this->loadTwig();
            echo $twig -> render('movie_poster.twig',['movie' => $movie]);
        }
    }

    public function show_poster() {
        $show = $this->movies->getRandomShow();
        $twig = $this->loadTwig();
        echo $twig -> render('show_poster.twig',['show' => $show]);
    }

    public function book_poster() {
        $twig = $this->loadTwig();
        echo $twig -> render('book_poster.twig');
    }
    
    public function http404() {
        $twig = $this->loadTwig();
        echo $twig -> render('http404.twig'); 
    }

    public function login() {
        $twig = $this->loadTwig();
        $errors = false;
        if(!empty($_POST) AND isset($_POST['connect'])){
            $auth = new DBAuth(\App::getInstance()->getdb());
            if($auth -> login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=login');
            }else {
                $errors = true;
            }
        }
        echo $twig -> render('login.twig', ['errors' => $errors]);
    }
}