<?php

require_once 'config/database.php';
require_once 'json_requests/response.php';


class User{


    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM users368");
        $sql->execute();
    
        return $sql->fetchAll(PDO::FETCH_ASSOC,);
    }
    public static function post($dados){

        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO users368 VALUES (null,:nome,:email,:senha)");
        $sql ->bindValue(':nome',$dados['nome_user368']);
        $sql ->bindValue(':email',$dados['senha_user368']);
        $sql ->bindValue(':senha',$dados['nivel_user368']);
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "usuario cadastrado com sucesso!"]);
        }else{
            json_error_response();
        }

    }
    public static function get($id){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM users368 WHERE id_user368 = :id");
        $sql->bindValue(':id', $id , PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("DELETE FROM users368 WHERE id_user368 = :id ");
        $sql->bindValue(':id',$id, PDO::PARAM_INT);
        
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "usuario desativado com sucesso!"]);       
        }else{
            json_error_response();
        }
  
    }
    public static function update($id,$dados){
        $db = Database::connection();
        $sql = $db->prepare("UPDATE users368 SET nome_user368 = :usuario,  senha_user368 = :senha,nivel_user368 = :nivel WHERE id_user368 = :id");
        $sql ->bindValue(':usuario',$dados['nome_user368']);
        $sql ->bindValue(':senha',$dados['senha_user368']);
        $sql ->bindValue(':nivel',$dados['nivel_user368']);
        $sql ->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "usuario atualizado com sucesso!"]);       
        }else{
            json_error_response();
        }
    }
}
