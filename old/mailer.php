<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require 'vendor/autoload.php';

$stmt=$pdo->prepare('SELECT name,tid,email from user_info join transactions on user_info.id=transactions.uid where user_info.id=:uid');
$stmt->execute(array(':uid'=>$_SESSION['id']));
$row=$stmt->fetchAll(PDO::FETCH_ASSOC);

$info="Name:".$row[0]['name']."\n"."UniqueId:".$_SESSION['uniqueid'];

// This will output the barcode as HTML output to display in the browser
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "comedyfestival2022@gmail.com";
$mail->Password   = "comedy2022";

$mail->IsHTML(true);
$mail->AddAddress($row[0]['email'], $row[0]['name']);
$mail->SetFrom("comedyfestival2022@gmail.com", "Comedy Festival");

$mail->Subject = "Entry Pass for Comedy Festival 2022";

$bar= '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($info, $generator::TYPE_CODE_128)) . '">';
$content = "<b>Show this barcode at the event</b><br>".$bar;

$mail->MsgHTML($content);
if(!$mail->Send()) {
  $_SESSION['success']="Failed to send mail.";


} else {
  $_SESSION['success']="Check email for confirmation";

}

 ?>
