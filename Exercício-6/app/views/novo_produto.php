<?php 

$titlePage = 'Novo Produto';
$page = 'Novos Produtos';

require_once __DIR__ . '/header.php';

?>
    <h1>Adicionar Novo Produto</h1>
    <form method="POST" action="index.php?acao=salvar">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Preço:</label><br>
        <input type="number" name="preco" step="0.01" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <br><a href="index.php">Voltar</a>
</body>
</html>
