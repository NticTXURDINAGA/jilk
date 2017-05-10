

<?php
include "./phpmailer/class.phpmailer.php";
include "./phpmailer/class.smtp.php";

//SENDER
$email_user = "guillermonnn@gmail.com";
$email_password = "xxxxxxx";
$from_name = "PUTO AMO ENVIADOR";
//DESTINATARIO
$address_to = "ntic@fptxurdinaga.com";





$the_subject = "ASUNTO DE ENVIO LANPOLTSA";


$phpmailer = new PHPMailer();
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password;
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
$phpmailer->Subject = $the_subject;

//CUERPO
$phpmailer->Body .="<h1 style='color:#3498db;'><a href='http://www.fptxurdinaga.com' target='_blank'>Hola Mundo!</a></h1>";
$phpmailer->Body .= "<p>Mensaje personalizado</p>";
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";

//ADJUNTOS
$phpmailer->AddAttachment('./imagenes/logoTX.png','logoTX.png');

$phpmailer->IsHTML(true);
$phpmailer->Send();
echo "OK";
?>
