<?php
require_once __DIR__ . '/../models/Produto.php';


class ProdutoController
{
    public function index()
    {
        $produtos = Produto::listar();
        require __DIR__ . '/../views/produtos.php';
    }


    public function novo()
    {
        require __DIR__ . '/../views/novo_produto.php';
    }

    public function login()
    {
        require __DIR__ . '/../views/login.php';
    }


    public function salvar()
    {
        $nome = $_POST['nome'] ?? '';
        $preco = $_POST['preco'] ?? '';

        if ($nome && $preco) {
            Produto::adicionar($nome, $preco);
            header('Location: index.php?acao=index');
        } else {
            echo "Preencha todos os campos!";
        }
    }


    // NOVO: editar produto
    public function editar($id)
    {
        if(!isset($_SESSION['user'])){
            header('Location: index.php?acao=index');
            exit;
        }
        $produto = Produto::buscarPorId($id);
        require __DIR__ . '/../views/editar.php';
    }


    public function atualizar($id)
    {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        Produto::atualizar($id, $nome, $preco);
        #require __DIR__ . '/../views/mensagem.php';
        header('Location: index.php?acao=index');
    }


    // NOVO: excluir produto
    public function excluir($id)
    {

        if (!isset($_SESSION['user'])) {
            header('Location: index.php?acao=index');
            exit;
        }
        Produto::excluir($id);
        #require __DIR__ . '/../views/mensagem.php';
        header('Location: index.php?acao=index');
    }
}
