<?php

require_once 'config/database.php';

class User{


    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM usuarios ");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC,);
    }
    public static function post($dados){

        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO usuarios VALUES (null,:nif,:nome,:email,:senha,:foto)");
        $sql ->bindValue(':nif',$dados['nif']);
        $sql ->bindValue(':nome',$dados['nome_usuario']);
        $sql ->bindValue(':email',$dados['email_usuario']);
        $sql ->bindValue(':senha',$dados['senha_usuario']);
        $sql ->bindValue(':foto',$dados['foto_usuario']);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return 'Usuario(a) cadastrado com sucesso';
        }else{
            throw new Exception("Error ao cadastrar o usuario(a)", 1);
            
        }



    }
}
