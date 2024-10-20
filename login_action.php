<?php

session_start();

require 'config.php';

$info = [];

$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'pass');

if ($usuario && $senha) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome = ? AND senha = ?");
    $sql->execute([$usuario, $senha]);

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch( PDO::FETCH_ASSOC );
        $_SESSION['userId'] = $info['id'];
        $_SESSION['userName'] = $info['nome'];
    }

    header("Location: index.php");
    exit;

} else {

    $_SESSION['errorLogin'] = 'Preencha seus dados corretamente!';
    header("Location: login.php");
    exit;
}