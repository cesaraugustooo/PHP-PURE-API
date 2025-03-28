<?php

require_once 'c://xampp/htdocs/PHP-PURE-API/config/database.php';
require_once 'json_requests/response.php';

class Turmas
{
    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM turmas");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function post($turma){
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO turmas VALUES (null,:nome,:categoria)");
        $sql->bindValue(':nome',$turma['nome_turma']);
        $sql->bindValue(':categoria',$turma['categorias_id_categoria']);
        $sql->execute();

        json_success_response($sql);
    }
    public static function get($id){
        $db =Database::connection();
        $sql = $db->prepare("SELECT * FROM turmas WHERE id_turma = :id");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("DELETE FROM turmas WHERE id_turma = :id");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "turma desativado com sucesso!"]);       
        }else{
            json_error_response();
        }
  

    }
    public static function update($id,$turma){
        $db = Database::connection();
        $sql = $db->prepare("UPDATE turmas SET  nome_turma = :nome, categorias_id_categoria = :categoria  WHERE id_turma = :id");
        $sql->bindValue(':nome',$turma['nome_turma']);
        $sql->bindValue('categoria',$turma['categorias_id_categoria']);
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "Turma atualizada com sucesso!"]);       
        }else{
            json_error_response();
        }
    }

}
