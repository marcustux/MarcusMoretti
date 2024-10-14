<?php

$idcliselect= $_REQUEST['idcliselect'];
$idcliempreselect= $_REQUEST['idcliempreselect'];	
$txtupwdmodif= $_REQUEST['v_txtupwd'];
$txtnameusermodif= $_REQUEST['txtnameusermodif'];
$txtcategorymodif= $_REQUEST['txtcategorymodif'];
$txtemailmodif= $_REQUEST['txtemailmodif'];
$vtxtusernamehideen = $_REQUEST['vtxtusernamehideen']; 
$qaccionhacer= $_REQUEST['qaccem'];



// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
error_reporting(E_ALL); 
  require("PHPMailer-master3/class.phpmailer.php");
   require("PHPMailer-master3/class.smtp.php");
  
      $mail = new PHPMailer(true);
 //Definimos las propiedades y llamamos a los mÃ©todos 

$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2 ;  
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

   $mail->CharSet = 'UTF-8';

//Set the hostname of the mail server
$mail->Host = 'smtpout.secureserver.net';
$mail->Port = 587 ;

$mail->SMTPSecure = 'SSL';
$mail->SMTPAuth = true;
$mail->Username = "estimation@flexbda.com";
//Password to use for SMTP authentication
$mail->Password = "Fl3x8DaF1pleX$";


$mail->setFrom('estimation@flexbda.com', 'Estimation FlexBDA');
//Set an alternative reply-to address
$mail->addReplyTo('estimation@flexbda.com', 'Estimation FlexBDA');



$txtemailmodif="marcusmoretti@gmail.com";

$mail->addAddress($txtemailmodif,  $txtemailmodif);
$mail->addBCC('marco.moretti@fiplex.com', 'marco ');
 

$mail->Subject = "WEBFAS::Password Changed";
$mail->Body = " The password for your WEBFAS account on http://webfas.honeywell.com has successfully been changed.<br><br>your user: ".$vtxtusernamehideen ."<br>your new password is: ".$txtupwdmodif."<br><br>If you did not initiate this change, please contact your administrator immediately. ";
//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$mail->AltBody = " The password for your WEBFAS account on http://webfas.honeywell.com has successfully been changed. If you did not initiate this change, please contact your administrator immediately. ";

 

$mail->Send();


?>