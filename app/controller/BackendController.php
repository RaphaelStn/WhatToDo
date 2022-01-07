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
        echo $this->twig -> render('backend/admin.twig');
    }
}