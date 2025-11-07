<?php
session_start();
require 'usuarios.php'; // Garante que $usuarios está vindo daqui
require 'vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// $usuarios = ... (carregado do require)
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Bloco 1: A requisição é POST
    
    $usuario = $_POST['usuario'] ?? '';
    
    if (isset($usuarios[$usuario])) {
        // Bloco 2: O usuário existe
        
        $email_destino = 'marcos.sousa12@fatec.sp.gov.br';
        $assunto = 'Mudança de senha realizada com sucesso';
        $mensagem = 'Login efetuado com sucesso';

        date_default_timezone_set('America/Sao_Paulo');

        $data_hora_atual = date('d/m/Y \à\s H:i:s');

        $mensagem .= "\n\nSolicitação feita em: " . $data_hora_atual;

        $mail = new PHPMailer(true);

        try {
            // CONFIGS DO SERVIDOR 
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fehribeiro2204@gmail.com';
            
           
            $mail->Password = 'ivuq ilrn xtin wxfe';  
            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // REMETENTE E DESTINATARIO
            $mail->setFrom('fehribeiro2204@gmail.com', 'Teste Aula php');
            $mail->addAddress($email_destino);

            // Conteudo
            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = nl2br($mensagem);
            $mail->altBody = strip_tags($mensagem);

            $mail->send();
            
            
        header('location: home.php');
        exit;
    } catch (Exception $e){
        echo "ERRO AO ENVIAR : {$mail ->ErrorInfo}";
    } 
    } else {
        $erro = 'usuario não encontrado';
        echo $erro; // Mostra o erro se o usuário não existir
    }

// Bloco 1: Fecha o IF (POST) e abre o ELSE dele
} else {
    // Bloco 1 (else): A requisição NÃO é POST
    echo "Requisição invalida";
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

    <?php if (!empty($erro)): ?>
        <p><?= $erro ?></p>
    <?php endif; ?>
    <form action="" method="POST">

        <label for="user">Usuario</label><br>
        <input type="text" name="usuario" required>

        <label for="senha">Senha</label>
        <input type="text" name="senha" required >

        <button type="submit"> Entrar</button>
    </form>

    <a href="mudarsenha.php">Esqueci minha senha</a>
</body>
</html>