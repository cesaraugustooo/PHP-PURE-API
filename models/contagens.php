<?php

require_once 'config/database.php';

class Contagem
{
    public static function getAll(){

        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM contagens ");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
        

    }  
}