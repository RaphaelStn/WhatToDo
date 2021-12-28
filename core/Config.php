<?php
namespace Core;

class Config{

    private $settings = [];
    private static $_instance;

    public static function getInstance($file) { // Use of a singleton to always get same instance of Config class
        if(self::$_instance === null) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file) { 
        $this -> settings = require ($file);
    }
    public function get($key) { // return API keys
        if(!isset($this -> settings[$key])) {
            return null;
        }
        return $this -> settings [$key];
    }
}