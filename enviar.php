<?php

// Trocar os valores abaixo

$emailenvio = 'sanguinettecode@gmail.com';
$assunto = 'Formulário Site André Trindade';
$url = 'www.google.com';

// Mude até aqui apenas

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$body = "Mensagem enviada a partir do site <br> Nome do Contato : <strong>".$nome."</strong><br>".$mensagem ."<br>CONTATOS: <br>Email: ".$email."<br>Telefone:".$telefone;

if ($_POST['leaveblank'] != '') {

  echo "Não foi possível enviar o e-mail. Tente novamente ou entre em contato com " . $emailenvio;

} else if (isset($_POST['email'])) {

require ('./PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
 $mail->IsSMTP();
 $mail->CharSet = 'UTF-8';
 $mail->Host = "smtp.gmail.com"; // Servidor SMTP
 $mail->SMTPSecure = "tls"; // conexão segura com TLS
 $mail->Port = 587; 
 $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
 $mail->Username = "sanguinettecode@gmail.com"; // SMTP username
 $mail->Password = "Galileu123"; // SMTP password
 $mail->From = $email; // From
 $mail->FromName = $nome ; // Nome de quem envia o email
 $mail->AddAddress($emailenvio, $nome); // Email e nome de quem receberá //Responder
 $mail->WordWrap = 50; // Definir quebra de linha
 $mail->IsHTML = true ; // Enviar como HTML
 $mail->Subject = "Email enviado do site Andre Trindade" ; // Assunto
 $mail->Body = $body; //Corpo da mensagem caso seja HTML
 $mail->AltBody = "$mensagem" ;

if(!$mail->send()) {
  echo "Não foi possível enviar o e-mail. Tente novamente ou entre em contato com " . $emailenvio;
} else {
  echo "E-mail enviado com sucesso!";
}

}

?>