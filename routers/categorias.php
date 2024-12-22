<?php

require_once 'controlers/categorias.php';

switch($getHTTP){
    case 'GET':
        categoriasController::getAllcategorias();
        break;
    case 'POST':
        categoriasController::post();
        break;
}