<?php
session_start();
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'pass');

if ($nome && $email && $senha) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $sql->execute([$email]);

    if ($sql->rowCount() === 0) {

        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $sql->execute([$nome, $email, $senha]);

        $_SESSION['success'] = 'Usuario cadastrado com sucesso!';

        header("Location: login.php");
        exit;

    } else {

        $_SESSION['errorEmail'] = 'Email já está em uso!';
        header("Location: cadastrar.php");
        exit;
    }

} else {

    $_SESSION['error'] = 'Preencha os dados corretamente';
    header("Location: cadastrar.php");
    exit;
}