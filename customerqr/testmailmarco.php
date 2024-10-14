<?php
error_reporting(E_ALL);

require ("configsendmailmm.php"); 



$mail->addAddress("itsupport@fiplex.com", "FEDE");
$mail->addBCC('marco.moretti@fiplex.com', 'Marco');
$mail->addBCC('agustin.corigliano@fiplex.com', 'Agus');
$mail->IsHTML(true);  
$mail->Subject = "FLEXBDA::TEST SMTP MARCO";
$mail->Body = "<b>Welcome to FlexBDA:</b><br> FLEXBDA::TEST SMTP MARCOr<br>";
//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$mail->AltBody = "Welcome to FlexBDA \r\n To activate the user: ".$v_txtemailtos."  copy and paste the following link in your browser: https://webfas.fiplex.com/siteflexbda/flexdbacreateuser.php?activate=".$v_v_txttoken." \\r ******** User to enter the site: ".$v_txtemailtos." -- Password: ".$v_txtlapwd2." \r\n ***** Best Regards The FLEXBDA Team";
///    
$mail->Send();

echo "aaaa";
 
?>