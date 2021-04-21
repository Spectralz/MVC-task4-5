<?php

use classes\DataBase;

header('Location: http://mvc/cart');

DataBase::dbConnect();

$cartId = $_GET['id'];

$removeFromCart = DataBase::sqlDelete('cart' , $cartId);