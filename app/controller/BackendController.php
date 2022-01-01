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

        if(isset($_SESSION['user_id'])) {
            $favShows = $this->shows->getFav($_SESSION['user_id']);
        }
        else {
            $favShows = [];
        }
        echo $this->twig -> render('backend/home.twig',['username' => $username, 'favShows' => $favShows]);
    }
}