<?php 
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    public function usuario($nome){
        $usuario = Usuario::buscarPorNome($nome);
        require_once __DIR__ . '/../views/usuario';
    }

    public function loginPage(){
        require_once __DIR__ . '/../views/login.php';
    }

    public function logar() {
        session_start();

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $usuario = Usuario::buscarPorNome($username);

        if ($usuario && $usuario['nome'] === $username && $usuario['senha'] === $password) {
            $_SESSION['user'] = $usuario['nome'];
            header('Location: index.php?acao=index');
            exit;
        } else {
            echo "<script>alert('Usuário ou senha inválidos!'); window.location.href='views/login.php';</script>";
            exit;
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../views/login.php');
        exit;
    }
}
