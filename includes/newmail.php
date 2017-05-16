<?php
function nuevomail($asunto,$destinatarios,$html)
{
include "./phpmailer/class.phpmailer.php";
include "./phpmailer/class.smtp.php";

//SENDER
$email_user = "jilk_no_replay@fptxurdinaga.com";
$email_password = "Provisional123456";
$from_name = "CIFP TXURDINAGA LHII (JILK)";
//DESTINATARIO
$address_to = $destinatarios;


$the_subject = $asunto;


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

///CUERPO
//$html .="<h1 style='color:#3498db;'><a href='http://www.fptxurdinaga.com' target='_blank'>Hola Mundo!</a></h1>";
//$html .= "<p>Mensaje personalizado</p>";
//$html .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";


$phpmailer->Body= $html;
//ADJUNTOS
//$phpmailer->AddAttachment('./imagenes/logoTX.png','logoTX.png');

$phpmailer->IsHTML(true);
$phpmailer->Send();

header("Location: index.php");

}
?>
