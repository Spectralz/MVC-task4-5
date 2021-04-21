<?php


namespace controllers;


class UserController extends Controller {

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

    public function registration()
    {
        $this->data('template' , 'registration');
        $this->display('index');
    }
    public function registrationModel()
    {
        $this->model('registration');
    }

    public function authentication()
    {
        $this->model('authentication');
    }

    public function logout()
    {
        $this->model('logout');
    }

    public function registrationForm(){
        $this->display('registrationForm');
    }

    public function addToCart(){
        $this->model('addToCart');
    }

    public function removeFromCart(){
        $this->model('removeFromCart');
    }

    public function order(){
        $this->model('order');
    }

}