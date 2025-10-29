<?php
require_once 'app/controllers/ProdutoController.php';
require_once 'app/controllers/UsuarioController.php';

session_start();

$controller = new ProdutoController();
$controllerUsuario = new UsuarioController();

$acao = $_GET['acao'] ?? null;
$usuario = $_GET['usuario'] ?? null;
$id = $_GET['id'] ?? null;



if (method_exists($controller, $acao)) {

    $acoesProtegidas = ['editar', 'excluir', 'novo', 'salvar', 'atualizar'];

    if (in_array($acao, $acoesProtegidas) && !isset($_SESSION['user'])) {
        echo "Permissão Negada, você não está logado!";
        exit;
    }

    if ($id !== null) {
        $controller->$acao($id);
    } else {
        $controller->$acao();
    }

}

elseif (method_exists($controllerUsuario, $usuario)) {
    $controllerUsuario->$usuario();
}

else {
    echo "Ação inválida!";
}
