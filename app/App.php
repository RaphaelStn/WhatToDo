<?php
use Core\Config;
class App {
    public static $_instance;
    
    public static function load(){ // load les Autoloader et le sessionstart().
        session_start();
        require ROOT . '/app/AutoLoader.php';
        App\Autoloader::register();
        require ROOT . '/core/AutoLoader.php';
        Core\Autoloader::register();
    }    
    public static function getInstance() {
        if(self::$_instance === null){ 
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    public function getApi($name) { 
        $this -> config = Config::getInstance(ROOT . '/config/config.php');
        $class_name = '\\App\\Api\\' . ucfirst($name) . 'Api';
        return new $class_name($this -> config -> get('key_movie'), $this -> config -> get('key_game'));
    }
}