<?php

require_once 'app/controllers/ProdutoController.php';

$controller = new ProdutoController();

$acao = $_GET['acao'] ?? 'index';

if(method_exists($controller, $acao)){
    $controller->$acao();
} else {
    echo "Ação inválida!";
}

?>