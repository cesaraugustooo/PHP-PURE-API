<?php

require_once 'models/categorias.php';
require_once 'json_requests/response.php';
require_once 'index.php';

$url = str_replace('/ApiPurePHP/categorias/','', $_SERVER['REQUEST_URI']);
$url_int = (int)$url;
class categoriasController
{
    public static function getAllcategorias(){
        $categoria = Categorias::getAll();
        sendResponse(200,$categoria);
    }
    public static function get($id){
        $categoria = Categorias::get($id);
        sendResponse(200,$categoria);

    }
    public static function post(){
        $categoria = json_decode(file_get_contents('php://input'),true);
        $result_sql = Categorias::post($categoria);
    }
}