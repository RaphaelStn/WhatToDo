<?php 
namespace App\Controller;
use \Core\Controller\Controller;
use Core\Auth\DBAuth;

Class FrontendController extends Controller {

    public function __construct(){
        parent::__construct();
        // preload different API and Database Tables via LoadModel function defined in Core/Controller
        $this->loadModel('movies', 'api');
        $this->loadModel('games', 'api');
        $this->loadModel('users', 'table');
        //Twig Loader
        $this->twig = $this->loadTwig();
    }
    
    //Controller for Home page
    public function home() {
        // Fetching trending movie via function defined in the models API (ie: moviesApi here)
        $movies = $this->movies->getTrendingMovies(); 
        $shows = $this->movies->getTrendingShows();
        $games = $this->games->getTrendingGames();

        //Loading differents models for Favorite logic (add, delete, display)
        $favShows = $this->modelFavorite('shows');
        $favMovies = $this->modelFavorite('movies');
        $favGames = $this->modelFavorite('games');

        // Rendering twig and sending datas to twig
        echo $this->twig -> render('home.twig',[
            'movies' => $movies,
            'shows' => $shows,
            'games' => $games, 
            'favShows' => $favShows,
            'favMovies' => $favMovies,
            'favGames' => $favGames,
        ]);
    }
    
    //Controller for Game Poster
    public function game() {
        $favGames = $this->modelFavorite('games');
        //if id is set in GET method, display specific game, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $game = $this->games->getIdGame($id);
            //checking if ID is invalid
            if(isset($game['detail']) && $game['detail'] == "Not found.") {
                echo $this->twig -> render('http404.twig');
            } else {
                echo $this->twig -> render('game.twig',['game' => $game, 'favGames' => $favGames]);
            }
        } 
        else {
            $game = $this->games->getRandomGame();
            echo $this->twig -> render('game.twig',['game' => $game, 'favGames' => $favGames]);
        }

    }

    //Controller for Movie Poster
    public function movie() {
        $favMovies = $this->modelFavorite('movies');
        //if id is set in GET method, display specific movie, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $movie = $this->movies->getIdMovie($id);
            //checking if ID is invalid
            if(isset($movie['success']) && $movie['success'] == false) {
                echo $this->twig -> render('http404.twig');
            } else {
                echo $this->twig -> render('movie.twig',['movie' => $movie, 'favMovies' => $favMovies]);
            }
        } 
        else {
            $movie = $this->movies->getRandomMovie();
            echo $this->twig -> render('movie.twig',['movie' => $movie, 'favMovies' => $favMovies]);
        }
    }

    //Controller for Show Poster
    public function show() {
        $favShows = $this->modelFavorite('shows');
        //if id is set in GET method, display specific show, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $show = $this->movies->getIdShow($id);
            //checking if ID is invalid
            if(isset($show['success']) && $show['success']== false) {
                echo $this->twig -> render('http404.twig');
            } else {
                echo $this->twig -> render('show.twig',['show' => $show, 'favShows' => $favShows]);
            }
        } 
        else {
            $show = $this->movies->getRandomShow();
            echo $this->twig -> render('show.twig',['show' => $show, 'favShows' => $favShows]);
        }
    }

    //Controller for Login page
    public function login() {
        $errors = false;
        //When POST, check if login() returns true, if true, connects, else return $errors
        if(!empty($_POST)){
            $auth = new DBAuth(\App::getInstance()->getdb());
            if($auth -> login($_POST['username'], $_POST['password'])) {
                if($_SESSION['user_id'] == '1') {
                    header('Location: index.php?p=admin'); 
                } 
                else {
                header('Location: index.php?p=login');
                }
            }
            else {
                $errors = true;
            }
        }
        echo $this->twig -> render('login.twig', ['errors' => $errors]);
    }

    //Controller for registration page
    public function register() {
        $errors = [];
        $account_created = false;

        //Checking every errrors
        if(isset($_POST['create-account']) && empty($_POST['username'])) {
            array_push($errors, "Please fill username !");
        }
        if(isset($_POST['create-account']) && empty($_POST['password'])) {
            array_push($errors, "Please fill password !");
        } else {
            if(isset($_POST['create-account']) && strlen($_POST['password'])< 8) {
                array_push($errors, "Password is too short");
            }
            if(isset($_POST['create-account']) && !preg_match("#[0-9]+#", $_POST['password'])) {
                array_push($errors, "Password must include at least one number");
            }
            if(isset($_POST['create-account']) && !preg_match("#[a-zA-Z]+#", $_POST['password'])) {
                array_push($errors, "Password must include at least one letter");
            }
        }
        if(isset($_POST['create-account']) && empty($_POST['email'])) {
            array_push($errors, "Please fill email !");
        }
        //Checking if account exist 
        if(isset($_POST['create-account']) && !empty($_POST['username']) && !empty($_POST['password']) &&  !empty($_POST['email'])) {
            $users = $this->users->getUsers();
            foreach($users as $user) {
                //if username already in use, stop the foreach loop
                if($user['username'] == $_POST['username'] || $user['email'] == $_POST['email']) {
                    array_push($errors, "Username or Email already in use !");
                    break;
                }
            }
        }
        //If no errors, create account
        if (empty($errors) && isset($_POST['create-account'])) {
            $this->users->createAccount(['username' => htmlspecialchars($_POST['username']), 'password' => crypt(htmlspecialchars($_POST['password']), 'messier87'), 'email' => htmlspecialchars($_POST['email'])]);
            $account_created = true;
        }
        echo $this->twig -> render('register.twig', ['errors' => $errors, 'account_created' => $account_created]); 
    }

    //Controller default 404
    public function http404() {
        echo $this->twig -> render('http404.twig'); 
    }
}