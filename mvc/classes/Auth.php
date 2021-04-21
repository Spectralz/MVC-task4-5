<?php


namespace classes;

use classes\DataBase;

class Auth
{

    public function __construct()
    {

    }
    public static function authLoginAndPassword($login, $password)
    {
        DataBase::dbConnect();
        $sql = "SELECT id , password FROM users WHERE email = '" . $login . "'";
        $result = DataBase::sqlQuery($sql, \PDO::FETCH_ASSOC);

        if (isset($result[0]['password']) && password_verify($password, $result[0]['password'])) {
            Session::update($result[0]['id']);
        } else {
            throw new Logger('Warning' ,'Пользователь не найден');
        }
    }
}