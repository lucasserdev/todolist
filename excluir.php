<?php
session_start();
require 'config.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $sql = $pdo->prepare("DELETE FROM tarefas WHERE id = ?");
    $sql->execute([$id]);

    header("Location: index.php");
    exit;
}