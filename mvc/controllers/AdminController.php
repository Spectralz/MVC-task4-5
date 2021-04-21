<?php


namespace controllers;


use classes\Role;

class AdminController extends Controller {

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

    public function adminCreateProduct()
    {
        if(Role::getRole() == 1){
        $this->data('template' , 'adminCreateProduct');
        $this->display('index');
        }else{
            header('Location: /');
        }
    }

    public function admin(){
        if(Role::getRole() == 1){
            $this->data('template' , 'admin');
            $this->display('index');
        }else{
            header('Location: /');
        }
    }
}