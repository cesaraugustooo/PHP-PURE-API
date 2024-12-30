<?php

require_once 'config/database.php';
require_once 'json_requests/response.php';

class Categorias
{
    public static function getAll(){

        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM categorias WHERE ativo = 1");
        $sql ->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function post($dados){
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO categorias VALUES (null,:nome,:ativo)");
        $sql->bindValue(':nome',$dados['nome_categoria']);
        $sql->bindValue(':ativo',$dados['ativo']);
        $sql ->execute();
        if($sql->rowCount() > 0){
            json_success_response();
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    }
   
}