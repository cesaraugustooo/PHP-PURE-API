<?php

require_once 'controlers/turmas.php';

switch($getHTTP){
    case 'GET':
        turmasController::getAllturmas();
        break;
    case 'POST':
        turmasController::post();
        break;
}