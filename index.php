<?php

require_once 'models/users.php';
require_once 'controlers/turmas.php';
$getURL = $_SERVER['REQUEST_URI'];
$getHTTP = $_SERVER['REQUEST_METHOD'];

Database::connection();
$rota = str_replace('/RestApi', '', $getURL);
switch($rota){
    case '/users':
        require 'routers/users.php';
        break;
    case '/contagens':
        require 'routers/contagens.php';
        break;
    case '/categorias':
        require 'routers/categorias.php';
        break;
    case '/turmas':
        require 'routers/turmas.php';
        break;
}