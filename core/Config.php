<?php
namespace Core;

class Config{

    private $settings = [];
    private static $_instance;

    // Use of a singleton to always get same instance of Config class
    public static function getInstance($file) {
        if(self::$_instance === null) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file) { 
        $this -> settings = require ($file);
    }

    // return API and Table keys
    public function get($key) {
        if(!isset($this -> settings[$key])) {
            return null;
        }
        return $this -> settings [$key];
    }
}