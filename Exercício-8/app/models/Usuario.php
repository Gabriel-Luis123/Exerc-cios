<?php
require_once __DIR__ . '/../../config/database.php';

class Usuario {
    public static function buscarPorNome($nome){
        $conn = Database::conectar();
        $stmt = $conn->prepare('SELECT * FROM usuario WHERE nome = :nome');
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>