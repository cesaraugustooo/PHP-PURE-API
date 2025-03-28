<?php

require_once 'models/turmas.php';
require_once 'c://xampp/htdocs/PHP-PURE-API/json_requests/response.php';

class turmasController
{
    public static function getAllturmas(){
        $turmas = Turmas::getAll();
        sendResponse(200,$turmas);
    }
    public static function post(){
        $turma = json_decode(file_get_contents('php://input'),true);
        Turmas::post($turma);
    }
    public static function get($id){
        $turma = Turmas::get($id);
        sendResponse(200,$turma);
    }
    public static function delete($id){
        $turma = Turmas::delete($id);
    }
    public static function update($id){
        $json = json_decode(file_get_contents('php://input'),true);
        Turmas::update($id,$json);
    }
}
