<?php

class Database
{

    public static $connection;

    public static function connection()
    {
        #Mude os dados referente ao se banco de dados#
        self::$connection = new PDO('mysql:host=localhost;dbname=sistemadecontagens', 'root' , '');

        return self::$connection;
    }
}
