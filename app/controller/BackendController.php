<?php 
namespace App\Controller;
use App\Controller\FrontendController;

class BackendController extends FrontendController {
    
    public function __construct() {
        parent::__construct();
    }

    //Controller for Home page BACKEND
    public function home() {
        //Btn Disconnect to kill session
        if(isset($_POST['disconnect'])) {
            unset($_SESSION['auth']);
            unset($_SESSION['user_id']);
            header('location:index.php');
        }
        //Get Username of the account
        $user = $this->users->getUser($_SESSION['user_id']);
        $username = $user[0]['username'];

        //Get different Favorites
        $favShows = $this->getDataFavorites('shows');
        $favMovies = $this->getDataFavorites('movies');
        $favGames = $this->getDataFavorites('games');

        //Twig render
        echo $this->twig -> render('backend/home.twig',['username' => $username, 'favShows' => $favShows, 'favMovies' => $favMovies, 'favGames' => $favGames]);
    }

    //Controller for Admin Page
    public function admin() {
        //Fetch posts for weekly recommandations 
        $posts = $this->posts->getPosts('homepage');

        if(isset($_POST['save'])) {
            $this->posts->save('homepage', $_POST['content']);
            header('location:index.php?p=admin');
        }
        //Admin account verification
        if(isset($_SESSION['auth'])) {
            $user = $this->users->getUser($_SESSION['user_id']);
        
            if (isset($user) && $username = $user[0]['isAdmin'] == '1') {
                echo $this->twig -> render('backend/admin.twig',['posts' => $posts]);
            } else {
                echo $this->twig -> render('http404.twig');
            }
        }
        else {
            echo $this->twig -> render('http404.twig');
        }
    }
}