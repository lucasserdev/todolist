<?php 
session_start();
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$tarefa = filter_input(INPUT_POST, 'tarefa');
$status = filter_input(INPUT_POST, 'a_fazer');


if ($id && $tarefa && $status) {

    $sql = $pdo->prepare("INSERT INTO tarefas (usuario_id, tarefa, status) VALUES (?, ?, ?)");
    $sql->execute([$id, $tarefa, $status]);

}

header("Location: index.php");
exit;