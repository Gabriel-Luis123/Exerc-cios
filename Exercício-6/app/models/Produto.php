<?php 

require_once __DIR__ . '/../../config/database.php';

class Produto {
    public static function listar() {
        $conn = Database::conectar();
        $stmt = $conn->prepare("SELECT * FROM produtos ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function adicionar($nome, $preco) {
        $conn = Database::conectar();
        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public static function editar($nome, $preco, $id) {
        $conn = Database::conectar();
        $sql = "UPDATE produtos SET ";
        $updates = [];
        $params = [];

        if($nome !== null){
            $updates[] = "nome = :nome";
            $params[':nome'] = $nome;
        }
        if($preco != null){
            $updates[] = "preco = :preco";
            $params[':preco'] = $preco;
        }

        if(empty($updates)){
            throw new Exception("Nenhum campo para atualizar.");
        }

        $sql .= implode(', ' , $updates);

        $sql .= " WHERE id = :id";
        $params[':id'] = $id;

        $stmt = $conn->prepare($sql);
        return $stmt->execute($params);
    }

    public static function listar1produto($id){
        $conn = Database::conectar();
        $stmt = $conn->prepare('SELECT * FROM produtos WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function excluir($id){
        $conn = Database::conectar();
        $stmt = $conn->prepare('DELETE FROM produtos WHERE id = :id');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>