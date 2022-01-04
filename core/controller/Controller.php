<?php
namespace Core\Controller;

class Controller {

    public function __construct() {
    }

    // loading api faster with model name in constructor, to load the good API class file
    protected function loadModel($model_name, $type) {
        if($type == 'api') {
            $this -> $model_name = \App::getInstance()->getApi($model_name); 
        }
        else if($type == 'table') {
            $this -> $model_name = \App::getInstance()->getTable($model_name); 
        }
    }

    // loading Twig for all controllers
    protected function loadTwig() {
        $loader = new \Twig\Loader\FilesystemLoader(ROOT . '/app/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, ROOT. '/api/templates/tmp'
        ]);
        $twig->addGlobal('session', $_SESSION);
        $twig->addExtension(new \Squirrel\TwigPhpSyntax\PhpSyntaxExtension());
        return $twig;
    }

    //Favorite logic model
    protected function modelFavorite($name) {
        //adding an id to the Table
        if(isset($_POST['favorite']) && $_POST['favorite'] == 'checked' && !empty($_POST[$name])) {
            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) {
                return \App::getInstance()->getTable('favorites')->add($_SESSION['user_id'] , $_POST[$name], $name);
            } else {
                echo "<script>alert(\"Please connect\")</script>";
            }
        }

        //deleting 
        if(isset($_POST['favorite']) && $_POST['favorite'] == 'unchecked' && !empty($_POST[$name])) {
            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null) {
                return \App::getInstance()->getTable('favorites')->delete($_SESSION['user_id'] ,$_POST[$name], $name);
            } else {
                echo 'please conenct';
            }
        }

        //Fetch favorites and return the data
        if(isset($_SESSION['user_id'])) {
            return $fav_name= \App::getInstance()->getTable('favorites')->getFav($_SESSION['user_id'], $name);
        }
        else {
            return $fav_name = [];
        }
    }

    //Get data from favorites ID for display in backend
    protected function getDataFavorites($name) {
        $favs = $this->modelFavorite($name);
        $favorites = [];
        foreach($favs as $fav) {
            if($name == 'shows') {
                $result = $this->movies->getIdShow($fav['ids']);
            } else if($name == 'games') {
                $result = $this->games->getIdGame($fav['ids']);
            } else if($name == 'movies') {
                $result = $this->movies->getIdMovie($fav['ids']);
            }
            $favorites[] = $result;
        }
        return $favs = $favorites;
    }
}
?>