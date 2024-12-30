<?php

require_once 'models/categorias.php';
require_once 'json_requests/response.php';

class categoriasController
{
    public static function getAllcategorias(){
        $categoria = Categorias::getAll();
        sendResponse(200,$categoria);
    }
    public static function post(){
        $categoria = json_decode(file_get_contents('php://input'),true);
        $result_sql = Categorias::post($categoria);
    }
}