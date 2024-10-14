<?php
error_reporting(E_ALL);
require ("configsendmailmm.php"); 


function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

var_dump(validateDate('2021/05/01', 'Y/m/d')); # true
var_dump(validateDate('2021/02/31', 'Y/m/d')); # false
/*
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
*/
//sss
/*

include("db_conectflexbdainit.php"); 

$sqlbuscabda="select * from  customers_userewbfas where  active = 'IM'  limit 80  ";
//$sqlbuscabda="select * from  customers_userewbfas    where     usermail='marcusmoretti@gmail.com' or usermail='agustin.corigliano@fiplex.com' ";
  
$detect_description="";
$detect_price="";
$detect_partnumberfiplex="";
$detect_partnumberhoneywel="";
$entro=0;
  $sql = $connect->prepare(  $sqlbuscabda);
  $sql->execute();
  $resultado = $sql->fetchAll();
  foreach ($resultado as $row2) {
    $entro=1;
       $detect_partnumberfiplex =  $row2['fiplexpartnro'];
       $elemail =  $row2['usermail'];
 
         // regenerar pass..

         //updatear..

       $mail->addAddress( $elemail ,  $elemail );

$mail->IsHTML(true);  

$mail->AddEmbeddedImage("honeywell_logomail.png", "my-attach", "honeywell_logomail.png");



$mail->Subject = "FLEXBDA.com -  Your account has been activated";
$mail->Body = "<img  src='cid:my-attach'> <br>Welcome to flexbda.com, which supports Honeywell ESDs/Dealers to request new estimates,
estimate transitions and design transitions supporting the most comprehensive, most advanced,
and most competitive Honeywell BDA and FIBER DAS portfolio launch to the market.<br>
<br>
Your account has been activated, you can login with the following credentials:<br>
username: ".$elemail."<br>
password: ".$row2['userpass']."<br><br>

<br><br>
NOTE: flexbda.com is currently being incorrectly blocked by Google on Chrome, FireFox browsers. Please use Microsoft Edge browser to access flexbda.com. We are working to resolve the issue with Google and hope for a resolution soon.We apologize for the inconvenience and appreciate the patience as we work through this with Google support.<br>
<br><br>

<a href='https://flexbda.com' target='_blank'>Click here to enter to the website </a>
<br><br>
Best Regards 
<hr>
<b>
The FLEXBDA Team</b>

";
//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$mail->AltBody = "Welcome to FlexBDA \r\n    ***** Best Regards The FLEXBDA Team";
///    


if(!$mail->Send())
{
   echo "NOsendmail#".$elemail."<br>";
}
else
{
 //   echo "Mail Sent";
 echo "sendmail#".$elemail."<br>";

 $sentenciaaction = $connect->prepare("update customers_userewbfas set active = 'Y' where usermail=:usermail");
$sentenciaaction->bindParam(':usermail', $elemail);
 

$sentenciaaction->execute();


}


$mail->ClearAddresses(); 




   }

   */

?>