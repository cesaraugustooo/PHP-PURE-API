<?php
require_once "models/Restricao.php";

class RestricaoController {
    private $db;
    private $restricao;

    public function __construct($conn) {
        $this->restricao = new Restricao($conn);
    }

    public function listarTodos() {
        $stmt = $this->restricao->getAll();
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    }

    public function buscar($id) {
        $stmt = $this->restricao->getById($id);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    }

    public function criar($dados) {
        $this->restricao->nome = $dados["nome"];
        $this->restricao->idade = $dados["idade"];
        $this->restricao->descricao = $dados["descricao"];
        $this->restricao->foto = $dados["foto"];
        $this->restricao->turma_id = $dados["turma_id"];

        if ($this->restricao->create()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }

    public function atualizarStatus($id, $status) {
        if ($this->restricao->updateStatus($id, $status)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }

    public function excluir($id) {
        if ($this->restricao->delete($id)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }
}