<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

require './vendor/autoload.php';


$stmt=$pdo->prepare('SELECT user_info.name,transactions.tid,user_info.email from user_info inner join transactions on user_info.id=transactions.uid where user_info.id=:uid;');
$stmt->execute(array(':uid'=>$_SESSION['id']));
$row=$stmt->fetchAll(PDO::FETCH_ASSOC);

$info="Name:".$row[0]['name']."\n"."UniqueId:".$_SESSION['uniqueid'];

// This will output the barcode as HTML output to display in the browser
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "comedyfestival2020@gmail.com";
$mail->Password   = "comedy2020";

$mail->IsHTML(true);
$mail->AddAddress($row[0]['email'], $row[0]['name']);
$mail->SetFrom("comedyfestival2022@gmail.com", "Comedy Festival");

$mail->Subject = "Entry Pass for Comedy Festival 2022";




$content = "<b>Show <a href='localhost/comedy/barcode.php?name=".urlencode($row[0]['name'])."&uid=".urlencode($_SESSION['uniqueid'])."'>this</a> barcode at the event</b><br>";

$mail->MsgHTML($content);
if(!$mail->Send()) {
  $_SESSION['success']="Failed to send mail.";


} else {
  $_SESSION['success']="Check email for confirmation";

}
