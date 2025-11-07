<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Autoload do Composer
require 'usuarios.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario = $_POST['usuario'] ?? '';
   
    if (isset($usuarios[$usuario])){

        $email_destino = 'marcos.sousa12@fatec.sp.gov.br';
        $assunto = 'Mudança de senha realizada com sucesso';
        $mensagem = 'A nova senha provisoria é FATEC2025SI';

        $mail  = new PHPMailer (true);

        try{
            // CONFIGS DO SERVIDOR 
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth  = true;
            $mail -> Username ='fehribeiro2204@gmail.com';
            $mail -> Password = 'ivuq ilrn xtin wxfe';
            $mail -> SMTPSecure = PHPMailer :: ENCRYPTION_SMTPS;
            $mail -> Port = 465;

            // REMETENTE E DESTINATARIO
            $mail -> setFrom ('fehribeiro2204@gmail.com' ,'Mudança de senha');
            $mail -> addAddress ($email_destino);

            // conteudo
            $mail -> isHTML(true);
            $mail -> Subject = $assunto;
            $mail -> Body = nl2br($mensagem);

            $mail -> altBody = strip_tags ($mensagem);

            $mail -> send();
            echo "Mensagem enviada com sucesso";
        }

        catch (Exception $e){
            echo "Erro ao enviar  : {$mail->ErrorInfo}";
        }
    }  
        else {
                echo "Requisição invalida";
            }
        
    } 
;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recuperar senha</h1>

    <form action="" method="POST">
        <label for="nome">Nome de usuario</label>
        <input type="text" name="usuario">
        <button type="submit">Recuperar senha</button>
    </form>
</body>
</html>