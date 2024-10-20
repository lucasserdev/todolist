<?php 
session_start();
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    $_SESSION['error'] = '';
} else {
    $_SESSION['error'] = '';
    $error = $_SESSION['error'];
}

$errorEmail = '';
if (isset($_SESSION['errorEmail'])) {
    $errorEmail = $_SESSION['errorEmail'];
    $_SESSION['errorEmail'] = '';
} else {
    $_SESSION['errorEmail'] = '';
    $errorEmail = $_SESSION['errorEmail'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <div class="container">
        <h2><?php echo $error ?></h2>
        <h2><?php echo $errorEmail ?></h2>
        <h1>Cadastro Usuário</h1>
        <div class="bar"></div>

        <form action="cadastrar_action.php" method="post">
            <label for="">Usuario:</label> <br>
            <input type="text" name="nome" id=""> <br>

            <label for="">Email:</label> <br>
            <input type="email" name="email" id=""> <br>

            <label for="">Senha:</label> <br>
            <input type="password" name="pass" id=""> <br>

            <label for="">Confirme sua senha:</label>
            <input type="password" name="" id=""> <br>

            <input type="submit" value="Cadastrar"> <br>
            <a href="login.php">Já possuo uma conta</a>
        </form>
    </div>
</body>
</html>