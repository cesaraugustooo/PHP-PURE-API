<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once 'models/users.php';
require_once 'controlers/turmas.php';
require_once "config/database.php";
require_once "controlers/RestricaoController.php";

$getURL = $_SERVER['REQUEST_URI'];
$getHTTP = $_SERVER['REQUEST_METHOD'];

Database::connection();
$rota = str_replace('/PHP-PURE-API', '', $getURL);

switch (true) {
    case $rota === '/users':
        require 'routers/users.php';
        break;
    case $rota === '/chat':
        require 'routers/chat.php';
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
    case $rota === '/alimento':
        require 'routers/alimento.php';
        break;
    case preg_match('#/alimento/(\d+)#', $rota, $matches):
        require 'routers/alimento.php';
        break;
    case $rota === '/cardapios':
        require 'routers/cardapios.php';
        break;
    case preg_match('#^/cardapios/(\d+)$#', $rota, $matches):
        require 'routers/cardapios.php';
        break;

    // Agora integrando a parte de Restricoes
    case $rota === '/restricoes':
        $conn = Database::connection();

        $controller = new RestricaoController($conn);
        $method = $_SERVER["REQUEST_METHOD"];
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $status = isset($_GET['status']) ? $_GET['status'] : null;

        switch ($method) {
            case 'GET':
                if ($id) $controller->buscar($id);
                else $controller->listarTodos();
                break;
            case 'POST':
                $dados = json_decode(file_get_contents("php://input"), true);
                $controller->criar($dados);
                break;
            case 'PUT':
                parse_str(file_get_contents("php://input"), $put_vars);
                $controller->atualizarStatus($put_vars['id'], $put_vars['status']);
                break;
            case 'DELETE':
                parse_str(file_get_contents("php://input"), $del_vars);
                $controller->excluir($del_vars['id']);
                break;
            default:
                echo json_encode(["error" => "Método não suportado"]);
                break;
        }
        break;
}
