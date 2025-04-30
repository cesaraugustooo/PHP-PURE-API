<?php
require_once '../json_requests/response.php';
require_once '../config/database.php';


class Chat
{
    public static function gettMensagem(){
        header('Content-Type: application/json');
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM chat");
        $sql->execute();

        echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    }
}