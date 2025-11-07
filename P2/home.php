<?php
    session_start();

    if (!isset($_SESSION['usuario'])){
        header ('location : login.php');
        exit;
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
    <h2> BEM VINDO !</h2>
    <p>Você esta em uma area restrita em uma ambiente protegido</p>

    <a href="logout.php"> Vazar</a>
</body>
</html>