<?php
require_once 'json_requests/response.php';
require_once 'config/database.php';


class Chat
{
    public static function gettMensagem(){
        header('Content-Type: application/json');
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM chat");
        $sql->execute();

        echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    }
    public static function postMensagem(){
        header('Content-Type: application/json');
        $json = json_decode(file_get_contents('php://input'),true);
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO chat VALUES(null,:mensagem,:tipo)");
        $sql->bindValue(':mensagem', $json['mensagem_chat']);
        $sql->bindValue(':tipo', $json['tipo_mensagem']);

        $sql->execute();

        json_success_response($sql);
    }
}