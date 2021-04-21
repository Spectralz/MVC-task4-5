<?php

namespace controllers;

use classes\Role;

class HomeController extends Controller {

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$classLoader === null) {
            self::$classLoader = new self();
        }

        return self::$classLoader;
    }

    public function home(){
        $this->data('template' , 'main');
        $this->display('index');
    }

    public function downloadFiles(){
        $this->data('template' , 'downloadFiles');
        $this->display('index');
    }

    public function download(){
        $this->data('template' , 'download');
        $this->display('download');
    }

    public function cart(){
        $this->data('template' , 'cart');
        $this->display('index');
    }

    public function order(){
        $this->data('template' , 'order');
        $this->display('index');
    }

    public function error404(){
        $this->data('template' , '404');
        $this->display('index');
    }
}