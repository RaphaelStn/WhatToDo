<?php 
namespace App\Controller;
use App\Controller\FrontendController;

class BackendController extends FrontendController {
    
    public function __construct() {
        parent::__construct();
        $this->loadModel('users', 'table');
    }

    public function home() {
        if(isset($_POST['disconnect'])) {
            unset($_SESSION['auth']);
            unset($_SESSION['user_id']);
            header('location:index.php');
        }
        $user = $this->users->getUser($_SESSION['user_id']);
        $username = $user[0]->username;

        $favShows = $this->loadFavorite('shows');
        $favorites = [];
        foreach($favShows as $favShow) {
            $result = $this->movies->getIdShow($favShow['ids']);
            $favorites[] = $result;
        }
        $favShows = $favorites;

        $favMovies = $this->loadFavorite('movies');
        $favorites = [];
        foreach($favMovies as $favMovie) {
            $result = $this->movies->getIdMovie($favMovie['ids']);
            $favorites[] = $result;
        }
        $favMovies = $favorites;

        $favGames = $this->loadFavorite('games');
        $favorites = [];
        foreach($favGames as $favGame) {
            $result = $this->games->getIdGame($favGame['ids']);
            $favorites[] = $result;
        }
        $favGames = $favorites;


        echo $this->twig -> render('backend/home.twig',['username' => $username, 'favShows' => $favShows, 'favMovies' => $favMovies, 'favGames' => $favGames]);
    }
}