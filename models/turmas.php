<?php

require_once 'config/database.php';

class Turmas
{
    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT turmas.id_turma,turmas.ano_turma,turmas.nome_turma,turmas.ativo,categorias.nome_categoria FROM turmas LEFT JOIN categorias ON turmas.categorias_id_categoria = categorias.id_categoria WHERE turmas.ativo = 1");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function post($turma){
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO turmas VALUES (null,:ano,:nome,:ativo,:categoria)");
        $sql->bindValue(':ano',$turma['ano_turma']);
        $sql->bindValue(':nome',$turma['nome_turma']);
        $sql->bindValue(':ativo',$turma['ativo']);
        $sql->bindValue('categoria',$turma['categorias_id_categoria']);
        $sql->execute();
    }
    public static function get($id){
        $db =Database::connection();
        $sql = $db->prepare("SELECT * FROM turmas WHERE id_turma = :id AND ativo = 1 ");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("UPDATE  turmas SET ativo = 0 WHERE id_turma = :id");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0){
            header('Content-Type: application/json');
            echo json_encode(["status" => "turma desativado com sucesso!"]);       
        }else{
            json_error_response();
        }
  

    }

}