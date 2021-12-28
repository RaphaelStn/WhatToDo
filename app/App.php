<?php
use Core\Config;
class App {
    public static $_instance;
    
    public static function load(){ 
        session_start();
        require ROOT . '/app/AutoLoader.php';
        App\Autoloader::register();
        require ROOT . '/core/AutoLoader.php';
        Core\Autoloader::register();
        // Loading twig
        require ROOT . '/vendor/autoload.php';
    }    
    public static function getInstance() { // use of a singleton for loading the same instance of App
        if(self::$_instance === null){ 
            self::$_instance = new App();
        }
        return self::$_instance;
    }
    public function getApi($name) {  // Launch API's classes with config keys in constructor
        $this -> config = Config::getInstance(ROOT . '/config/config.php'); // Return API keys
        $class_name = '\\App\\Api\\' . ucfirst($name) . 'Api'; 
        return new $class_name($this -> config -> get('key_movie'), $this -> config -> get('key_game'));
    }
}