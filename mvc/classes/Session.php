<?php


namespace classes;


class Session
{
    public function __construct()
    {

    }
    public static function create($usersId)
    {
        DataBase::dbConnect();
        $sql = "INSERT INTO users (session) VALUES ('".session_id()."')";
        DataBase::sqlCreate($sql);
    }

    public static function update($usersId)
    {
        DataBase::dbConnect();
        $sql = "UPDATE users SET session = '".session_id()."' WHERE id = '".$usersId."'";
        DataBase::sqlCreate($sql);
    }

    public static function delete()
    {
        DataBase::dbConnect();
        $sql = "DELETE FROM users WHERE session='".session_id()."'";
        DataBase::sqlDelete('sessions' , session_id());
        session_regenerate_id();
    }

    public static function read()
    {
        DataBase::dbConnect();
        $sql = "SELECT id FROM users WHERE session='".session_id()."'";
        return DataBase::sqlPrepare($sql);;
    }
}