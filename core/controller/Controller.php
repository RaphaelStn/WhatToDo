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

    protected function loadTwig() {
        $loader = new \Twig\Loader\FilesystemLoader(ROOT . '/app/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false, ROOT. '/api/templates/tmp'
        ]);
        return $twig;
    }
}
?>