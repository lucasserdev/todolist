<?php
session_start();
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if ($id) {

    $sql = $pdo->prepare("SELECT * FROM tarefas WHERE id = ?");
    $sql->execute([$id]);

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch( PDO::FETCH_ASSOC );
    }
}

?>

<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?= $info['id'] ?>">
    <label for="">
        Tarefa: <br>
        <input type="text" name="tarefa" id="" value="<?= $info['tarefa']?>"> 
    </label> <br> <br>

    <input type="submit" value="Salvar">
</form>