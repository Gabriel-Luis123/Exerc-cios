<?php
$titlePage = 'Editar Produtos';



include_once __DIR__ . '/header.php';

?>

<h1>Editar Produto</h1>

<form method="POST" action="index.php?acao=editarProduto&id=<?php echo htmlspecialchars($id); ?>">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required><br><br>

    <label for="preco">Preço (R$):</label><br>
    <input type="number" id="preco" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" step="0.01" required><br><br>

    <button type="submit" style="background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px;">
        Salvar Alterações
    </button>

    <a href="index.php" style="margin-left:10px; text-decoration:none; color:#333;">Cancelar</a>
</form>

<?php 


include_once __DIR__ . '/footer.php';



?>