<?php 
require_once 'models/alimento.php';
require_once 'json_requests/response.php';

class AlimentosController
{
    public static function getAll(){
        $alimentos = Alimentos::getAll();
        sendResponse(200, $alimentos);
    }

    public static function post(){
        $alimento = json_decode(file_get_contents('php://input'), true);

        if (!$alimento || !isset($alimento['nome_alimento'])) {
            json_error_response("Dados inválidos para criação");
        }

        $result = Alimentos::post($alimento);
        json_success_response($result);
    }

    public static function get($id){
        $alimento = Alimentos::get($id);
        if ($alimento) {
            sendResponse(200, $alimento);
        } else {
            json_error_response("Alimento não encontrado", 404);
        }
    }

    public static function delete($id){
        $success = Alimentos::delete($id);
        if ($success) {
            json_success_response(["message" => "Alimento excluído com sucesso!"]);
        } else {
            json_error_response("Alimento não encontrado para excluir", 404);
        }
    }

    public static function update($id){
        $json = json_decode(file_get_contents('php://input'), true);

        if (!$json || !isset($json['nome_alimento'])) {
            json_error_response("Dados inválidos para atualização");
        }

        $success = Alimentos::update($id, $json);
        if ($success) {
            json_success_response(["message" => "Alimento atualizado com sucesso!"]);
        } else {
            json_error_response("Nenhuma alteração feita ou alimento não encontrado", 400);
        }
    }
}
