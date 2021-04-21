<?php
require_once ('/var/www/mvc/classes/DataBase.php');

use \classes\DataBase;

$name = $_POST['name'];
DataBase::dbConnect();
$sql = "INSERT INTO category (name) VALUES ('".$name."')";
$newCategory = DataBase::sqlCreate($sql);
if ($newCategory){
    echo 'Категория добавлена';
}else{
    echo 'Категория не добавлена';
}