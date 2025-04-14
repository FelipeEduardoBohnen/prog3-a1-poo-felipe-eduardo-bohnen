<?php
require_once '../classes/Usuario.php';
require_once '../classes/Autenticador.php';

$nome = htmlspecialchars($_POST['nome']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];

$usuario = new Usuario($nome, $email, $senha);
Autenticador::registrar($usuario);

header("Location: login.php");
exit();
