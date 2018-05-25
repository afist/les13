<?php
namespace lib;

trait ConnectToDb
{
    protected function connectToDb($host = "localhost", $dbname = "", $user = "root", $password = "")
    {
        try {
            $connect = new \PDO( "mysql:host=$host;dbname=$brigade", $user, $password);
        } catch (PDOException $e) {
            echo $sql.$e->getMessage();
        }
        return $connect;
    }
}
