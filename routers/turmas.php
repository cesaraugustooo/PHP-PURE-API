<?php

require_once 'controlers/turmas.php';

switch($getHTTP){
    case 'GET':
        if (preg_match('#(\d+)#', $rota , $array)){
            $id = $array[0];
            turmasController::get($id);
        }else{
            turmasController::getAllturmas();
        }
        break;
    case 'POST':
        turmasController::post();
        break;
    case 'DELETE':
        if(preg_match('#(\d+)#',$rota, $array)){
            turmasController::delete($array[0]);
        }
        break;
    case 'PUT':
        if(preg_match('#(\d+)#', $rota, $array)){
            turmasController::update($array[1]);
        }
}
