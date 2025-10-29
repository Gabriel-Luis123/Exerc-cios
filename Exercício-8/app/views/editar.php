
<h2>Editar Produto</h2>


<form method="POST" action="index.php?acao=atualizar&id=<?= $produto['id'] ?>">
    Nome: <input type="text" name="nome" value="<?= $produto['nome'] ?>" required><br><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>" required><br><br>
    <button type="submit">Salvar alterações</button>
</form>


<a href="index.php?acao=index">Voltar à lista</a>
