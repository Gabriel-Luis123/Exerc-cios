<?php

$titlePage = 'Produtos';
$page = 'produtos';

include_once __DIR__ . '/header.php';

?>
<h1>Catálogo de Produtos</h1>

<a href="index.php?acao=novo">Adicionar Novo Produto</a><br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço (R$)</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($produtos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
            <td>
                <a href="index.php?acao=edita&id=<?= $p['id'] ?>"
                    style="background-color: #4CAF50; color: white; padding: 4px 8px; text-decoration: none; border-radius: 4px;">
                    Editar
                </a>

                <a href="index.php?acao=excluirProduto&id=<?= $p['id'] ?>"
                    onclick="return confirm('Tem certeza que deseja excluir o produto <?= htmlspecialchars($p['nome']) ?>?');"
                    style="background-color: #f44336; color: white; padding: 4px 8px; text-decoration: none; border-radius: 4px;">
                    Excluir
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>

</html>