<?php
require_once '../classes/Sessao.php';
Sessao::iniciar();

$nome = Sessao::get('usuario');
if (!$nome) {
    header("Location: login.php");
    exit();
}

echo "<h1>Olá, $nome!</h1>";
if (isset($_COOKIE['email'])) {
    echo "<p>Seu e-mail lembrado é: {$_COOKIE['email']}</p>";
}
echo '<a href="logout.php">Sair</a>';
