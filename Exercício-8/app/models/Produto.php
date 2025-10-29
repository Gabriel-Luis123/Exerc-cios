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


    // NOVO: buscar produto por ID
    public static function buscarPorId($id) {
        $conn = Database::conectar();
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // NOVO: atualizar produto
    public static function atualizar($id, $nome, $preco) {
        $conn = Database::conectar();
        $sql = "UPDATE produtos SET nome = ?, preco = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $preco, $id]);
    }


    // NOVO: excluir produto
    public static function excluir($id) {
        $conn = Database::conectar();
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>
