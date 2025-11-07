<?php

session_start();
require 'usuarios.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario = $_POST['usuario'] ?? '';
    $usuario = $_POST['senha'] ?? '';

    if (!isset($usuarios[$usuario]) && password_verify($senha , $usuarios[$usuario])){
        $_SESSION['usuario'] = $usuario;
        header('location: home.php');
        exit;
    } else {
        $erro = 'usuario não encontrado';
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>LOGIN</h2>

    <?php if {$erro}: ?>
        <p><?= $erro?></p>
    <?php endif ;?>

    <form action="" method="post">

        <label for="user">Usuario</label><br>
        <input type="text" name="usuario" required>

        <label for="senha">Senha</label>
        <input type="text" name="senha" required >

        <button type="submit"> Entrar</button>
    </form>
</body>
</html>