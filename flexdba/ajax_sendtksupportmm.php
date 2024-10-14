<?php
// Desactivar toda notificación de error
//error_reporting(0);

	include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');
	
    session_start();

    if (!isset($_SESSION["csrf_token"]) || $_REQUEST['csrf_token'] != $_SESSION["csrf_token"]) {
      http_response_code(404);
      exit('error');
      }

     $return_result_insert="noaction";
     $regexNum = '/^[0-9]*$/';
     /* $regexNum = '/[0-9]+$/'; */
     /* $regexAlfaNumSimbB = '/[a-zA-Z-0-9\ ._#,&|\(\)\-]+$/'; */
     $regexAlfaNumSimbB = '/^[a-zA-Z0-9#()&_\-\[\]\\,\.\/\n? ]*$/';
  
   if(preg_match($regexNum, $_REQUEST['idpp']) && 
      preg_match($regexAlfaNumSimbB, $_REQUEST['detallelog'])){

      $v_idpp = $_REQUEST['idpp'];
      $v_detallelog = $_REQUEST['detallelog'];

   }else{

      http_response_code(404);
        exit('error');

   }

   /* if(preg_match($regexAlfaNumSimbB, $_REQUEST['v_detallelog'])){
      $v_detallelog = $_REQUEST['v_detallelog'];
   } */
     
     $return_result_insert="error"; 
	try {

      $v_email_customer=$_SESSION["flexbdad"];
                $return_result_insert="ok";

                require("PHPMailer-master3/class.phpmailer.php");
   require("PHPMailer-master3/class.smtp.php");
  
      $mail = new PHPMailer(true);
 //Definimos las propiedades y llamamos a los métodos 

                  $mail->isSMTP();
                  //Enable SMTP debugging
                  // 0 = off (for production use)
                  // 1 = client messages
                  // 2 = client and server messages
                  $mail->SMTPDebug = 0 ;
                  //Ask for HTML-friendly debug output
                  $mail->Debugoutput = 'html';

                     $mail->CharSet = 'UTF-8';

                  //Set the hostname of the mail server
                  $mail->Host = 'smtpout.secureserver.net';
                  $mail->Port = 587 ;

                  $mail->SMTPSecure = 'SSL';
                  $mail->SMTPAuth = true;
                  $mail->Username = "support@flexbda.com";
                  //Password to use for SMTP authentication
                  $mail->Password = "Fl3xBd4support$";
                  $mail->setFrom('support@flexbda.com', 'Support FlexBDA');
                  //Set an alternative reply-to address
                  $mail->addReplyTo('support@flexbda.com', 'Support FlexBDA');


                  $mail->addAddress(str_replace('_fiplex@', '@', $v_email_customer), $v_email_customer);
                  
                  $mail->addBCC('tareasikarus@gmail.com', 'Support');
                  /* $mail->addBCC('leandroleuci@gmail.com', 'Support'); */
                  $mail->addBCC('support@flexbda.com', 'Support');
                  $mail->addBCC('itsupport@fiplex.com', 'fede copia');
                  $mail->addBCC('nisha.sharma2@honeywell.com', 'nisha copia');
                  $mail->addBCC('michael.warfield2@honeywell.com', 'Michael copia');
                
                  $mail->IsHTML(true);  
                  
                  $mail->Subject = "Support FlexBDA: #F". str_pad(  $v_idpp , 4, "0", STR_PAD_LEFT) ;
                  
                  $mail->Body = "<p><img src='https://flexbda.com/honeywell_logomail_final.png'> </p><hr style=' border: 1px solid red;'><b>Dear users</b><br>this is a copy of the generated support ticket.<br>Issue: ".$v_detallelog."
                    
                     <br>
                     <br> Best Regards <br><hr><b>The FLEXBDA Team</b><br>
                     ";
                  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                  $mail->AltBody = "Tk Support";
                     ///
           
               $mail->Send();


      
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
