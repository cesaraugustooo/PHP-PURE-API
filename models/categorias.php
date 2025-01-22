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
    public static function get($id){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM categorias WHERE ativo = 1 AND id_categoria = :id");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

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
    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("UPDATE categorias SET ativo = 0 WHERE id_categoria = :id");
        $sql->bindValue(':id',$id, PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "categoria desativado com sucesso!"]);       
        }else{
            json_error_response();
        }

  
    }
}
   
