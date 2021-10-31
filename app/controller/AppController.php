<?php 
namespace App\Controller;
use Core\Controller\Controller;

class AppController extends Controller{
    
    protected $template = 'default';
    protected $title = 'WhatToDo';

    public function __construct() {
        $this->viewpath = ROOT . '/app/views/';
    }
    protected function loadModel($model_name) {
        $this -> $model_name = \App::getInstance()->getApi($model_name);
    }

}