<?php

require_once 'controlers/categorias.php';

$rota = str_replace('/PHP-PURE-API/categorias', '', $getURL);
$getHTTP = $_SERVER['REQUEST_METHOD'];

switch($getHTTP){
    case 'GET':
        if (preg_match('#(\d+)$#', $rota, $matches)) {
            $id = $matches[0];
            categoriasController::get($id);  
        }else{
            categoriasController::getAllcategorias();
            break;
        }
        break;
    case 'POST':
        categoriasController::post();
        break;
    case 'DELETE':
        if(preg_match('#(\d+)#', $rota , $array)){
            categoriasController::delete($array[0]);
            break;
        }
}

