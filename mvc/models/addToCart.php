<?php

use classes\Session;
use classes\Cart;
use classes\DataBase;

DataBase::dbConnect();

$productId = $_GET['id'];

$quantity = 1;

if(Session::read()){
    $user_id = Session::read();

    $getIdFromCart = DataBase::sqlPrepare(Cart::issetInCart($productId , $user_id[0]['id']));
    if(!empty($getIdFromCart)){
        DataBase::sqlCreate(Cart::updateCart($getIdFromCart[0]['id'] , $getIdFromCart[0]['quantity']+$quantity));
    }else{
        DataBase::sqlCreate(Cart::addToCart($productId , $user_id[0]['id'], $quantity));
    }
}
