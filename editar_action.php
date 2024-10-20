<?php 
session_start();
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$tarefa = filter_input(INPUT_POST, 'tarefa');

if ($id && $tarefa) {

    $sql = $pdo->prepare("SELECT * FROM tarefas WHERE id = ?");
    $sql->execute([$id]);

    if ($sql->rowCount() > 0) {

        $sql = $pdo->prepare("UPDATE tarefas SET tarefa = ? WHERE id = ?");
        $sql->execute([$tarefa, $id]);

        header ("Location: index.php");
        exit;
    }

}