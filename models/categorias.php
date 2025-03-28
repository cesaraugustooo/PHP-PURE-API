<?php

require_once 'config/database.php';
require_once 'json_requests/response.php';

class Categorias
{
    public static function getAll(){

        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM categorias");
        $sql ->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function get($id){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM categorias WHERE id_categoria = :id");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public static function post($dados){
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO categorias VALUES (null,:nome)");
        $sql->bindValue(':nome',$dados['nome_categoria']);
        $sql ->execute();
        if($sql->rowCount() > 0){
            json_success_response();
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    }
    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("DELETE FROM categorias WHERE id_categoria = :id");
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
   
