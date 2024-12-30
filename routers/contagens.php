<?php

require_once 'controlers/contagens.php';

switch($getHTTP){
    case 'GET':
        contagensController::getAllContagens();
        break;
    case 'POST':
        contagensController::post();
        break;
}