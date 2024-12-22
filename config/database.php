<?php

class Database
{

    public static $connection;

    public static function connection()
    {
        self::$connection = new PDO('mysql:host=localhost;dbname=sistemadecontagens', 'root' , '');

        return self::$connection;
    }
}
