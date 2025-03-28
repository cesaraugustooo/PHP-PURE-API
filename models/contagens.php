<?php

require_once 'config/database.php';
require_once 'json_requests/response.php';

class Contagem
{
    public static function getAll(){

        $db = Database::connection();
        $sql = $db->prepare("SELECT contagens.id_contagem,contagens.data_contagem,contagens.hora_contagem,contagens.qtd_contagem, contagens.turmas_id_turma, turmas.nome_turma, users368_id_user368  FROM contagens inner join turmas on turmas.id_turma = contagens.turmas_id_turma ");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }  
    public static function post($dados){
        $data = date("Y-m-d");
        $hora = date('H:i:s');
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO contagens VALUES (null,:data,:hora,:qtd,:turma,:user)");
        $sql->bindValue(':data',$data);
        $sql->bindValue(':hora',$hora);
        $sql->bindValue(':qtd',$dados['qtd_contagem']);
        $sql->bindValue(':turma',$dados['turmas_id_turma']);
        $sql->bindValue(':user',$dados['users368_id_user368']);
        $sql->execute();

        json_success_response($sql);
    }
    public static function get($id){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM contagens WHERE id_contagem = :id ");
        $sql->bindValue(':id',$id,PDO::PARAM_INT);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function update($id,$dados){
        $data = date("Y-m-d");
        $hora = date('H:i:s');
        $db = Database::connection();
        $sql = $db->prepare("UPDATE contagens SET data_contagem = :data, hora_contagem = :hora, qtd_contagem = :qtd, turmas_id_turma = :turma, users368_id_user368 = :user WHERE id_contagem = :id");
        $sql->bindValue(':data',$data);
        $sql->bindValue(':hora',$hora);
        $sql->bindValue(':qtd',$dados['qtd_contagem']);
        $sql->bindValue(':turma',$dados['turmas_id_turma']);
        $sql->bindValue(':user',$dados['users368_id_user368']);
        $sql->bindValue(':id', $id , PDO::PARAM_INT);

        $sql->execute();

        json_success_response($sql);
        
    }
}