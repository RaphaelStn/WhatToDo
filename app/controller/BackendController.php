<?php 
namespace App\Controller;
use App\Controller\FrontendController;

class BackendController extends FrontendController {
    
    public function __construct() {
        parent::__construct();
    }

    public function home() {
        if(isset($_POST['disconnect'])) {
            unset($_SESSION['auth']);
            unset($_SESSION['username']);
            header('location:index.php');
        }

        $username = $_SESSION['username'];
        echo $this->twig -> render('backend/home.twig',['username' => $username]);
    }
}