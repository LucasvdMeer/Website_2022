<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$pass = '';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "";
$mail->Password   = $pass;

$personname = $_POST["firstname"] . $_POST["lastname"];
$personmail = $_POST["Email"];
$message = $_POST["Message"];

$mail->IsHTML(true);
$mail->AddAddress("lucas@lucasvandermeer.nl", "Lucas van der Meer");
$mail->SetFrom("lucasvandermeer.nl@gmail.com", "Lucasvandermeer.nl");
$mail->AddReplyTo("$personmail", "$personname");
$mail->Subject = "Contact Form";
$content = "$message";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
} else {
  echo "Email sent successfully";
  header("location: .");
}
?>
