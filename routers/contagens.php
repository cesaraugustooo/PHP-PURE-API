<?php

require_once 'controlers/contagens.php';

switch($getHTTP){
    case 'GET':
        if(preg_match('#(\d+)#', $rota , $matches)){
            $id = $matches[0];
            contagensController::get($id);
        }else{
            contagensController::getAllContagens();
            break;
        }
    case 'POST':
        contagensController::post();
        break;
}