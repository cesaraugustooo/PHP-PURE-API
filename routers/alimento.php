<?php
require_once 'controlers/alimento.php';

// DEFINIR AS VARIÁVEIS
$getHTTP = $_SERVER['REQUEST_METHOD'];
$rota = $_SERVER['REQUEST_URI'];

// ROTEAMENTO
switch($getHTTP){
    case 'GET':
        if (preg_match('#(\d+)#', $rota, $array)) {
            $id = $array[0];
            AlimentosController::get($id);
        } else {
            AlimentosController::getAll();
        }
        break;
    case 'POST':
        AlimentosController::post();
        break;
    case 'DELETE':
        if (preg_match('#(\d+)#', $rota, $array)) {
            AlimentosController::delete($array[0]);
        }
        break;
    case 'PUT':
        if (preg_match('#(\d+)#', $rota, $array)) {
            AlimentosController::update($array[0]);
        }
        break;
}
