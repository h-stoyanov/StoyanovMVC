<?php

namespace Core;

use PDO;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $host = 'localhost';
            $dbName = 'mvc';
            $username = 'root';
            $password = '';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbName;charset=uft8", $username, $password);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }
}