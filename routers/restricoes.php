<?php
require_once "../config/database.php";
require_once "../controlers/RestricaoController.php";

$conn = Database::connection(); // ✅ Usa o método estático corretamente
$controller = new RestricaoController($conn);

$method = $_SERVER["REQUEST_METHOD"];
$uri = explode("/", $_SERVER['REQUEST_URI']);
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
