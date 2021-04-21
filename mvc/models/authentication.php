<?php

use classes\Auth;

$eMail = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

try {
    Auth::authLoginAndPassword($eMail , $password );
    header('Location: http://mvc/');
}catch (\classes\Logger $exception){
    header('Location: http://mvc/?warning='.$exception->getMessage().'');
}
