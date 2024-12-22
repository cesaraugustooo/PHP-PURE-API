<?php

require_once 'config/database.php';

class Turmas
{
    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM turmas WHERE ativo = 1");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}