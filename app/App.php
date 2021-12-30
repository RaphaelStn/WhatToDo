<?php
use Core\Config;
use Core\Database\MysqlDatabase;

class App {
    public static $_instance;
    private $db_instance;
    
    public static function load(){ 
        session_start();
        require ROOT . '/app/AutoLoader.php';
        App\Autoloader::register();
        require ROOT . '/core/AutoLoader.php';
        Core\Autoloader::register();
        // Loading twig
        require ROOT . '/vendor/autoload.php';
    }

     // use of a singleton for loading the same instance of App
    public static function getInstance() {
        if(self::$_instance === null){ 
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    //launch DB class 
    public function getDb() {
        $this -> config = Config::getInstance(ROOT . '/config/config.php');
        if($this -> db_instance === null){
            return $this -> db_instance = new MysqlDatabase($this -> config -> get('database'), $this -> config -> get('username'), $this -> config -> get('password'), $this -> config -> get('hostname'));

        } else {
            return $this -> db_instance;
        }
    }

     // Launch API's classes with config keys in constructor
    public function getApi($name) { 
        // fetching API keys
        $this -> config = Config::getInstance(ROOT . '/config/config.php');
        
        $class_name = '\\App\\Api\\' . ucfirst($name) . 'Api'; 
        return new $class_name($this -> config -> get('key_movie'), $this -> config -> get('key_game'));
    }

    // Launch table's classes with db_instance in constructor, see function getDb()
    public function getTable($name) { 
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table'; 
        return new $class_name($this -> getDb());
    }
}