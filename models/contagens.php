<?php

require_once 'config/database.php';

class Contagem
{
    public static function getAll(){

        $db = Database::connection();
        $sql = $db->prepare("SELECT contagens.id_contagen,contagens.data_contagem,contagens.hora_contagem,usuarios.id_usuarios,usuarios.nif,
        usuarios.nome_usuario,usuarios.email_usuario,usuarios.foto_usuario,turmas.id_turma,turmas.ano_turma
        ,turmas.nome_turma
         FROM contagens LEFT JOIN usuarios ON contagens.usuarios_id_usuarios = usuarios.id_usuarios LEFT JOIN turmas ON contagens.turmas_id_turma = turmas.id_turma  ");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }  
    public static function post($dados){

        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO contagens VALUES (null,:data_contagem,:hora,:qtd,:user,:turma)");
        $sql->bindValue(':data_contagem',$dados['data_contagem']);
        $sql->bindValue(':hora',$dados['hora_contagem']);
        $sql->bindValue(':qtd',$dados['qtd_contagem']);
        $sql->bindValue(':user',$dados['usuarios_id_usuarios']);
        $sql->bindValue(':turma',$dados['turmas_id_turma']);
        $sql->execute();

    }
}