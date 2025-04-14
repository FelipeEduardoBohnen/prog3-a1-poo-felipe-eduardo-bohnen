<?php
require_once '../classes/Autenticador.php';
require_once '../classes/Sessao.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];

Sessao::iniciar();
$usuario = Autenticador::logar($email, $senha);

if ($usuario) {
    Sessao::set('usuario', $usuario->getNome());
    if (!empty($_POST['lembrar'])) {
        setcookie('email', $email, time() + 3600);
    }
    header("Location: dashboard.php");
    exit();
} else {
    echo "Usuário ou senha inválidos!";
}
