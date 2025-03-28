<?php

require_once 'models/users.php';
require_once 'controlers/turmas.php';
$getURL = $_SERVER['REQUEST_URI'];
$getHTTP = $_SERVER['REQUEST_METHOD'];

Database::connection();
$rota = str_replace('/PHP-PURE-API', '', $getURL);
switch (true) {
    case $rota === '/users':
        require 'routers/users.php';
        break;
    case preg_match('#/users/(\d+)#', $rota, $array):
        require 'routers/users.php';
        break;
    case $rota === '/contagens':
        require 'routers/contagens.php';
        break;
    case preg_match('#/contagens/(\d+)#', $rota , $matches):
        require 'routers/contagens.php';
        break;
    case $rota === '/categorias':
        require 'routers/categorias.php';
        break;
    case preg_match('#^/categorias/(\d+)$#', $rota, $matches):
        require 'routers/categorias.php';
        break;
    case $rota === '/turmas':
        require 'routers/turmas.php';
        break;
    case preg_match('#/turmas/(\d+)#', $rota , $matches):
        require 'routers/turmas.php';
        break;
    
}
