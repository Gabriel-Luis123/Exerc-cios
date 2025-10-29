<?php

require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {
    public function index() {
        $produtos = Produto::listar();
        require __DIR__ . '/../views/produtos.php';
    }
    public function novo () {
        require __DIR__ . '/../views/novo_produto.php';
    }

    public function salvar (){
        $nome = $_POST['nome'] ?? '';
        $preco = $_POST['preco'] ?? '';

        if($nome && $preco){
            Produto::adicionar($nome, $preco);
            header('Location: index.php');
        } else {
            echo "Preencha todos os campos!";
        }
    }

    public function edita () {
        $id = $_GET['id'] ?? '';
        if($id == ''){
            echo "Produto não encontrado";
            $erro = 1;
        } else {
            $produto = Produto::listar1produto($id);
        }
        require __DIR__ . '/../views/editar_produto.php';
    }

    public function editarProduto(){
        $nome = $_POST['nome'] ?? '';
        $preco = $_POST['preco'] ?? '';
        $id = $_GET['id'] ?? '';

        Produto::editar($nome, $preco, $id);
        header('Location: index.php');
    }

    public function excluirProduto (){
        $id = $_GET['id'] ?? '';

        Produto::excluir($id);
        header('Location: index.php');
    }
}

?>