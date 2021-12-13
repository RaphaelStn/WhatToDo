<?php
namespace Core\Controller;

class Controller {

    public function __construct() {
        
    }

    protected function loadModel($model_name) {
        $this -> $model_name = \App::getInstance()->getApi($model_name);
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