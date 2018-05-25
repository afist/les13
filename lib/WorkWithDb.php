<?php
namespace lib;

class WorkWithDb
{
    public static function connectToDb($host, $dbname, $user, $password): Door
    {
        return new WoodenDoor($host, $dbname, $user, $password);
    }
}
