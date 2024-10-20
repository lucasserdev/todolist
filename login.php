<?php

session_start();

$success = '';
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    $_SESSION['success'] = '';
} else {
    $_SESSION['success'] = '';
    $success = $_SESSION['success'];
}

$errorLogin = '';
if (isset($_SESSION['errorLogin'])) {
    $errorLogin = $_SESSION['errorLogin'];
    $_SESSION['errorLogin'] = '';
} else {
    $_SESSION['errorLogin'] = '';
    $errorLogin = $_SESSION['errorLogin'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Pagina de login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class="bar"></div>

        <form action="login_action.php" method="post">
            <h3 style="color: red; font-size: 12px; font-weight: 300"><?php echo $errorLogin ?></h3>
            <h3 style="color: green;"><?php echo $success ?></h3>
            <label for="">Usuario:</label> <br>
            <input type="text" name="usuario" id=""> <br>

            <label for="">Senha:</label> <br>
            <input type="password" name="pass" id=""> <br>

            <input type="submit" value="Entrar"> <br>
            Ainda não tem uma conta? <a href="cadastrar.php">Cadastre-se</a>
        </form>
    </div>
</body>
</html>