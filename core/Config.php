<?php
namespace Core;

class Config{

    private $settings = [];
    private static $_instance;

    public static function getInstance($file) { // On initialise via une unique instance static et un 'singleton'
        if(self::$_instance === null) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file) { 
        $this -> settings = require ($file);
    }
    public function get($key) { // Recupération des key de config
        if(!isset($this -> settings[$key])) {
            return null;
        }
        return $this -> settings [$key];
    }
}