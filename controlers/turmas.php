<?php

require_once 'models/turmas.php';
require_once 'json_requests/response.php';

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
}