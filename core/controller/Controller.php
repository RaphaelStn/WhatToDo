<?php
namespace Core\Controller;

class Controller {

    public function __construct() {
        $twig = $this->loadTwig();
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

    protected function loadTwig() {
        $loader = new \Twig\Loader\FilesystemLoader(ROOT . '/app/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, ROOT. '/api/templates/tmp'
        ]);
        $twig->addGlobal('session', $_SESSION);
        $twig->addExtension(new \Squirrel\TwigPhpSyntax\PhpSyntaxExtension());
        return $twig;
    }

    //Favorite logic
    protected function loadFavorite($name) {

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
}
?>