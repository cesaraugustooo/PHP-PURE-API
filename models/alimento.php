<?php 
require_once 'config/database.php';
require_once 'json_requests/response.php';

class Alimentos
{
    public static function getAll(){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM alimentos ORDER BY data DESC");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function post($alimento){
        $db = Database::connection();
        $sql = $db->prepare("INSERT INTO alimentos VALUES (null, :nome, :data, :quantidade, :medida, :pessoas)");
        $sql->bindValue(':nome', $alimento['nome_alimento']);
        $sql->bindValue(':data', $alimento['data']);
        $sql->bindValue(':quantidade', $alimento['quantidade']);
        $sql->bindValue(':medida', $alimento['medida']);
        $sql->bindValue(':pessoas', $alimento['pessoas']);
        $sql->execute();

        json_success_response($sql);
    }

    public static function get($id){
        $db = Database::connection();
        $sql = $db->prepare("SELECT * FROM alimentos WHERE id_alimento = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id){
        $db = Database::connection();
        $sql = $db->prepare("DELETE FROM alimentos WHERE id_alimento = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo json_encode(["status" => "Alimento excluído com sucesso!"]);
        } else {
            json_error_response();
        }
    }

    public static function update($id, $alimento){
        $db = Database::connection();
        $sql = $db->prepare("UPDATE alimentos SET nome_alimento = :nome, data = :data, quantidade = :quantidade, medida = :medida, pessoas = :pessoas WHERE id_alimento = :id");
        $sql->bindValue(':nome', $alimento['nome_alimento']);
        $sql->bindValue(':data', $alimento['data']);
        $sql->bindValue(':quantidade', $alimento['quantidade']);
        $sql->bindValue(':medida', $alimento['medida']);
        $sql->bindValue(':pessoas', $alimento['pessoas']);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo json_encode(["status" => "Alimento atualizado com sucesso!"]);
        } else {
            json_error_response();
        }
    }
}
