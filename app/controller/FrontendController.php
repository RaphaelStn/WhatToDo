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
        $this->loadModel('shows', 'table');
        $this->twig = $this->loadTwig();
    }
    
    public function home() {
        // Fetching trending movie via function defined in the models API (ie: moviesApi here)
        $movies = $this->movies->getTrendingMovies(); 
        $shows = $this->movies->getTrendingShows();
        $games = $this->games->getTrendingGames();

        ///// Favorite logic
        //adding to favorite a show
        if(isset($_POST['favorite']) && $_POST['favorite'] == 'checked') {
            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) {
                $this->shows->add($_SESSION['user_id'] ,$_POST['show_id']);
            } else {
                echo 'please conenct';
            }
        }
        //deleting from favorite a show
        if(isset($_POST['favorite']) && $_POST['favorite'] == 'unchecked'){
            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) {
                $this->shows->delete($_SESSION['user_id'] ,$_POST['show_id']);
            } else {
                echo 'please conenct';
            }
        }
        //Display the favorites
        if(isset($_SESSION['user_id'])) {
            $favShows = $this->shows->getFav($_SESSION['user_id']);
        }
        else {
            $favShows = [];
        }
        var_dump($favShows);
        // Rendering twig and sending datas to twig
        echo $this->twig -> render('home.twig',['movies' => $movies,'shows' => $shows, 'games' => $games, 'favShows' => $favShows]);
    }

    public function movie() {
        $movies = $this->movies->getTrendingMovies();
        echo $this->twig -> render('movie.twig',['movies' => $movies]);
    }

    public function show() {
        $shows = $this->movies->getTrendingShows();
        echo $this->twig -> render('show.twig',['shows' => $shows]);
    }

    public function game() {
        $games = $this->games->getTrendingGames();
        echo $this->twig -> render('game.twig',['games' => $games]);
    }

    public function book() {
        echo $this->twig -> render('book.twig');
    }

    public function game_poster() {
        //if id is set in GET method, display specific game, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $game = $this->games->getIdGame($id);
            //checking if ID is invalid
            if(isset($game['detail']) && $game['detail'] == "Not found.") {
                echo $this->twig -> render('http404.twig');
            } else {
                echo $this->twig -> render('game_poster.twig',['game' => $game]);
            }
        } 
        else {
            $game = $this->games->getRandomGame();
            echo $this->twig -> render('game_poster.twig',['game' => $game]);
        }

    }
    public function movie_poster() {
        //if id is set in GET method, display specific movie, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $movie = $this->movies->getIdMovie($id);
            //checking if ID is invalid
            if(isset($movie['success']) && $movie['success']== false) {
                echo $this->twig -> render('http404.twig');
            } else {
                echo $this->twig -> render('movie_poster.twig',['movie' => $movie]);
            }
        } 
        else {
            $movie = $this->movies->getRandomMovie();
            echo $this->twig -> render('movie_poster.twig',['movie' => $movie]);
        }
    }

    public function show_poster() {
        //if id is set in GET method, display specific show, else display random
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $show = $this->movies->getIdShow($id);
            //checking if ID is invalid
            if(isset($show['success']) && $show['success']== false) {
                echo $this->twig -> render('http404.twig');
            } else {
                echo $this->twig -> render('show_poster.twig',['show' => $show]);
            }
        } 
        else {
            $show = $this->movies->getRandomMovie();
            echo $this->twig -> render('show_poster.twig',['show' => $show]);
        }
    }
    public function book_poster() {
        echo $this->twig -> render('book_poster.twig');
    }
    
    
    public function login() {
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(\App::getInstance()->getdb());
            if($auth -> login($_POST['username'], $_POST['password'])) {
                header('Location: index.php?p=login');
            }else {
                $errors = true;
            }
        }
        echo $this->twig -> render('login.twig', ['errors' => $errors]);
    }

    
    public function register() {
        $errors = [];
        $account_created = false;
        $account_exist = false;
        if(isset($_POST['create-account']) && !empty($_POST['username']) && !empty($_POST['password']) &&  !empty($_POST['email'])) {
            //Username verification to prevent multiple account with same name account 
            $users = $this->users->getUsers();
            foreach($users as $user) {
                //if username or email already in use, stop the foreach loop
                if($user->username == $_POST['username']) {
                    $account_exist = true;
                    break;
                }
            }
            if ($account_exist == false) {
                $this->users->createAccount(['username' => htmlspecialchars($_POST['username']), 'password' => crypt(htmlspecialchars($_POST['password']), 'messier87'), 'email' => htmlspecialchars($_POST['email'])]);
                $account_created = true;
            } 
            //Error checks in the array $errors
            else if ($account_exist == true) {
                array_push($errors, "Username or Email already in use !");
            }
        }
        if(isset($_POST['create-account']) && empty($_POST['username'])) {
            array_push($errors, "Please fill username !");
        }
        if(isset($_POST['create-account']) && empty($_POST['password'])) {
            array_push($errors, "Please fill password !");
        }
        if(isset($_POST['create-account']) && empty($_POST['email'])) {
            array_push($errors, "Please fill email !");
        }
        echo $this->twig -> render('register.twig', ['errors' => $errors, 'account_created' => $account_created]); 
    }

    public function http404() {
        echo $this->twig -> render('http404.twig'); 
    }
}