<?php
session_start();
require 'config.php';

if (isset($_SESSION['userId']) && isset($_SESSION['userName'])) {
    $id = $_SESSION['userId'];
    $nome = $_SESSION['userName'];

} else {

    $_SESSION['errorLogin'] = 'Preencha seus dados corretamente!';
    header("Location: login.php");
    exit;
}

$sql = $pdo->prepare("SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY status");
$sql->execute([$id]);

$lista = [];

if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll( PDO::FETCH_ASSOC );
}

$aFazer = [];
$fazendo = [];
$feito = [];

foreach ($lista as $tarefa) {
    switch ($tarefa['status']) {
        case 'a_fazer':
            $aFazer[] = $tarefa;
            break;
        case 'fazendo':
            $fazendo[] = $tarefa;
            break;
        case 'feito':
            $feito[] = $tarefa;
            break;
    }
}

echo $id;


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/221e7506b3.js" crossorigin="anonymous"></script>
    <script src="js/script.js" defer></script>
    <title>To do list</title>
</head>
<body>
    <h1>Olá <?= $nome ?></h1>
    <a style="color: white;" href="sair.php">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
    </a>
     <div class="container">
        <div class="todo">
            <h3>A fazer</h3>

            <?php foreach($aFazer as $tarefa): ?>
                <p>
                    <span><?= $tarefa['tarefa'] ?></span>
                    <span id="icons">
                        [ <a href="editar.php?id=<?= $tarefa['id'] ?>"><i class="fa-solid fa-pen"></i></a> ]
                        [ <a href="excluir.php?id=<?= $tarefa['id'] ?>" onclick="confirm('Deseja mesmo excluir?')"><i class="fa-solid fa-trash"></i> </a>] 
                    </span>
                </p>
            <?php endforeach; ?>
    
            <h4>
                <i class="fa-solid fa-plus"></i> 
                Adicionar uma tarefa
            </h4>

            <form style="display: none;" action="adicionar_tarefa.php" method="post">
                <input type="hidden" name="a_fazer" value="<?= 'a_fazer' ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <textarea name="tarefa" id=""></textarea> <br>
                <div class="btn_ac">
                    <input type="submit" value="Adicionar Tarefa">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </form>

        </div>
        <div class="todo">
            <h3>Fazendo</h3>

            <?php foreach($fazendo as $tarefa): ?>
                <p>
                    <span><?= $tarefa['tarefa'] ?></span>
                    <span id="icons">
                        [ <a href="editar.php?id=<?= $tarefa['id'] ?>"><i class="fa-solid fa-pen"></i></a> ]
                        [ <a href="excluir.php?id=<?= $tarefa['id'] ?>" onclick="confirm('Deseja mesmo excluir?')"><i class="fa-solid fa-trash"></i> </a>] 
                    </span>
                </p>
            <?php endforeach; ?>

            <h4>
                <i class="fa-solid fa-plus"></i> 
                Adicionar uma tarefa
            </h4>

            <form style="display: none;" action="adicionar_tarefa.php" method="post">
                <input type="hidden" name="a_fazer" value="<?= 'fazendo' ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <textarea name="tarefa" id=""></textarea> <br>
                <div class="btn_ac">
                    <input type="submit" value="Adicionar Tarefa">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </form>
        </div>
        <div  class="todo">
            <h3>Feito</h3>

            <?php foreach($feito as $tarefa): ?>
                <p>
                    <span><?= $tarefa['tarefa'] ?></span>
                    <span id="icons">
                        [ <a href="editar.php?id=<?= $tarefa['id'] ?>"><i class="fa-solid fa-pen"></i></a> ]
                        [ <a href="excluir.php?id=<?= $tarefa['id'] ?>" onclick="confirm('Deseja mesmo excluir?')"><i class="fa-solid fa-trash"></i> </a>] 
                    </span>
                </p>
            <?php endforeach; ?>

            <h4>
                <i class="fa-solid fa-plus"></i> 
                Adicionar uma tarefa
            </h4>

            <form style="display: none;" action="adicionar_tarefa.php" method="post">
                <input type="hidden" name="a_fazer" value="<?= 'feito' ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <textarea name="tarefa" id=""></textarea> <br>
                <div class="btn_ac">
                    <input type="submit" value="Adicionar Tarefa">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </form>
        </div>
     </div>
</body>
</html>