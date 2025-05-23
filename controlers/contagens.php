<?php

require_once 'json_requests/response.php';
require_once 'models/contagens.php';

class contagensController 
{
    public static function getAllContagens(){
        $contagem = Contagem::getAll();
        sendResponse(200,$contagem);
    }
    public static function post(){
        $contagem = json_decode(file_get_contents('php://input'),true);
        return Contagem::post($contagem);
    }
    public static function get($id){
        $contagem = Contagem::get($id);
        sendResponse(200,$contagem);
    }
    public static function update($id){
        $json = json_decode(file_get_contents('php://input'),true);
        Contagem::update($id,$json);
    }
}
