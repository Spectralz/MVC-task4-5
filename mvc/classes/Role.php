<?php


namespace classes;


class Role
{
    public static function getRole()
    {
        DataBase::dbConnect();
        if (Session::read()){
            $sql = "SELECT role FROM users  WHERE session = '".session_id()."'";
            $role = DataBase::sqlPrepare($sql);
            return $role[0]['role'];
        }else{
            return $role = 3;
        }

    }

}