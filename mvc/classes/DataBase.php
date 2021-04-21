<?php

namespace classes;

require_once ('/var/www/mvc/configs/DataBaseConsts.php');

use configs\DataBaseConsts;
use PDO;

class DataBase
{
    static $db_host = DataBaseConsts::HOST;
    static $db_user = DataBaseConsts::USER;
    static $db_password = DataBaseConsts::PASSWORD;
    static $db_used = DataBaseConsts::DATABASE;
    static $pdo;

    public function __construct()
    {
    }

    public static function dbConnect()
    {
        $link = "mysql:host=".self::$db_host.";dbname=".self::$db_used."";

        self::$pdo = new \PDO($link, self::$db_user, self::$db_password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $set_utf8 = self::$pdo->query('SET NAMES UTF8');
    }

    public static function sqlPrepare($sql)
    {
        $query = DataBase::$pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function sqlQuery($sql ,$pdoFetchStyle)
    {
        $query = DataBase::$pdo->query($sql);
        $query->execute();
        $result = $query->fetchAll($pdoFetchStyle);
        return $result;
    }

    public static function sqlDelete($table , $id)
    {
        $sql = "DELETE FROM ".$table." WHERE id ='".$id."'";
        $query = DataBase::$pdo->query($sql);
        $query->execute();
    }

    public static function sqlCreate($sql)
    {
        $query = DataBase::$pdo->prepare($sql);
        return $query->execute();
    }

    public static function getColumnsAndTypesFromTable($table)
    {
        $sqlResult = self::sqlQuery('SHOW FIELDS FROM '. $table, PDO::FETCH_ASSOC);
        $columnsAndTypes = [];
        for ($i = 0; $i<count($sqlResult); $i++){
            $columnsAndTypes[$sqlResult[$i]['Field']] = substr($sqlResult[$i]['Type'] , 0, 3);
        }
        return $columnsAndTypes;
    }

    public static function prepareInsertSQL($data ,$table)
    {
        $params = $values = $column = array();

        foreach ($data as $c=>$p)
        {
            $column[] = $c;
            $values[] = "?";
            $params[] = $p;
        }

        $sql=" INSERT INTO `".$table."` (".implode(",",$column).") VALUES (".implode(',',$values).")";

        $query = DataBase::$pdo->prepare($sql);
        $query->execute($params);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}