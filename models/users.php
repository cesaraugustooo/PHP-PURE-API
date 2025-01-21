<?php

require_once 'config/database.php';

class User{


    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT usuarios.id_usuarios,usuarios.nif,
        usuarios.nome_usuario,usuarios.email_usuario,usuarios.foto_usuario FROM usuarios ");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC,);
    }
    public static function post($dados){

        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO usuarios VALUES (null,:nif,:nome,:email,:senha,:foto,:ativo)");
        $sql ->bindValue(':nif',$dados['nif']);
        $sql ->bindValue(':nome',$dados['nome_usuario']);
        $sql ->bindValue(':email',$dados['email_usuario']);
        $sql ->bindValue(':senha',$dados['senha_usuario']);
        $sql ->bindValue(':foto',$dados['foto_usuario']);
        $sql ->bindValue(':ativo',$dados['ativo']);
        $sql->execute();


    }
    public static function get($id){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM usuarios WHERE id_usuarios = :id");
        $sql->bindValue(':id', $id , PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("DELETE FROM usuarios WHERE id_usuarios = :id");
        $sql->bindValue(':id',$id, PDO::PARAM_INT);
        $sql->execute();

  
    }
}
