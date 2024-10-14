<?php
// Desactivar toda notificación de error
//error_reporting(0);
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

	include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');
	
    session_start();
    
    if (!isset($_SESSION["csrf_token"]) || $_REQUEST['csrf_token'] != $_SESSION["csrf_token"]) {
      http_response_code(404);
      exit();
      }
    

     $return_result_insert="noaction";

     $v_txtnameuserfull ="***";
     $v_txtlapwd2="***";
     $v_txtlapwd1="***";
     $v_txtemailtos="***";
     $v_v_txttoken="***";
     $v_txtcompname="***";


   //   $sanitized_n = filter_var($_REQUEST['v_txtnameuserfull'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtnameuserfull = $_REQUEST['v_txtnameuserfull'];
   //   }

   $regexName ='/^[a-z][a-z\s]*$/i';
   $regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,7}$/';
   $regexPass = '/^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$/';

   $regexCompany = '/[a-zA-Z0-9-_.,& ]+$/';
   $regexTooken ='/[a-zA-Z0-9-_]+$/';
   $regexHonNo='/[0-9]+$/';
   

   if( 
      preg_match($regexName, $_REQUEST['txtnameuserfull']) &&
      preg_match($regexMail, $_REQUEST['txtemailtos']) &&
      preg_match($regexPass, $_REQUEST['txtlapwd1']) &&
      preg_match($regexPass, $_REQUEST['txtlapwd2']) &&
      preg_match($regexCompany, $_REQUEST['txtcompname']) &&
      preg_match($regexCompany, $_REQUEST['txtedsdealer']) &&
      preg_match($regexHonNo, $_REQUEST['txthoneywellaccnumber']) 
      )
   {
      $v_txtnameuserfull = $_REQUEST['txtnameuserfull'];
      $v_txtemailtos = $_REQUEST['txtemailtos'];
      $v_txtlapwd2 = $_REQUEST['txtlapwd1'];
      $v_txtlapwd2 = $_REQUEST['txtlapwd2'];
      $v_txtcompname = $_REQUEST['txtcompname'];
      $v_v_txttoken = $_REQUEST['txttoken'];
      $v_txtedsdealer = $_REQUEST['txtedsdealer'];
      $v_txthoneywellaccnumber = $_REQUEST['txthoneywellaccnumber'];
   
   

   //   $sanitized_b = filter_var($_REQUEST['v_txtemailtos'], FILTER_SANITIZE_EMAIL);
   //   if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
   //      $v_txtemailtos = $_REQUEST['v_txtemailtos'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_txtlapwd1'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtlapwd2 = $_REQUEST['v_txtlapwd1'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_txtlapwd2'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtlapwd2 = $_REQUEST['v_txtlapwd2'];
   //   }

   //   $sanitized_n = filter_var($_REQUEST['v_txtcompname'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtcompname = $_REQUEST['v_txtcompname'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_txttoken'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_v_txttoken = $_REQUEST['v_txttoken'];
   //   }

   //   $sanitized_n = filter_var($_REQUEST['v_txthoneywellaccnumber'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txthoneywellaccnumber = $_REQUEST['v_txthoneywellaccnumber'];
   //   }

   //   $sanitized_n = filter_var($_REQUEST['v_txtedsdealer'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtedsdealer = $_REQUEST['v_txtedsdealer'];
   //   }


/*
     $v_txtlapwd2 = $_REQUEST['v_txtlapwd2'];
     $v_txtcompname = $_REQUEST['v_txtcompname'];
     $v_v_txttoken = $_REQUEST['v_txttoken'];
     $v_txtemailtos = $_REQUEST['v_txtemailtos'];
     $v_txtnomprojdb = $_REQUEST['v_txtnomprojdb'];
*/
   
     $return_result_insert="error"; 
	try {


        $sentenciahonwywell = $connect->prepare("INSERT INTO public.customers_userewbfas(idusercus, username, userpass, active, usermail, usermobile, profile, nameuserfull, tokengoogle, companynametemp,honeeywellnroacc, typeemployee, esdchanneldealer, rsm, bdabdm)	VALUES ( (select  coalesce( max(idusercus),0) + 1 as sss from customers_userewbfas ), :username, :userpass, 'P', :usermail, '', 'basic', :nameuserfull, :tokengoogle, :companynametemp, :honeeywellnroacc, '', :esdchanneldealer, '', '');");

      //  $username =  $v_txtemailtos;
        $username = strstr($v_txtemailtos, '@', true);
                $sentenciahonwywell->bindParam(':username', $username);			
                $sentenciahonwywell->bindParam(':userpass', $v_txtlapwd2);      
                
                $sentenciahonwywell->bindParam(':usermail', $v_txtemailtos);							
                $sentenciahonwywell->bindParam(':nameuserfull', $v_txtnameuserfull);             
                
                $sentenciahonwywell->bindParam(':tokengoogle', $v_v_txttoken);
                $sentenciahonwywell->bindParam(':companynametemp', $v_txtcompname);

                $sentenciahonwywell->bindParam(':honeeywellnroacc', $v_txthoneywellaccnumber);
                $sentenciahonwywell->bindParam(':esdchanneldealer', $v_txtedsdealer);
                


                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 
                                 
                   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                         ////Send email to activate account
                         require ("configsendmail.php"); 

                         $mail->addAddress(str_replace('_fiplex@', '@', $v_txtemailtos), $username);
                   //      $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                         $mail->IsHTML(true);  
                         $mail->Subject = "FLEXBDA :: Your registration has been received  : ".$v_txtemailtos;
                         $mail->Body = "<b>Welcome to FlexBDA:</b><br> Your registration has been received and it will be reviewed and approved within 2 business days. Once it is reviewed & approved you will receive an email with your password to login  <br><br>
                         <br><br><hr><br> Best Regards <br><b>The FLEXBDA Team</b><br>";
                         //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                         $mail->AltBody = "Welcome to FlexBDA \r\n Your registration has been received and it will be reviewed and approved within 2 business days. Once it is reviewed & approved you will receive an email with your password to login \r\n ***** Best Regards The FLEXBDA Team";
                         ///    
                         $mail->Send();


                         
                        $mail->ClearAddresses(); 
                        /// AVISO DE USUARIO NEVO
                        
                          $mail->addBCC('nisha.sharma2@honeywell.com', 'Nisha Sharma');
                          $mail->addBCC('michael.warfield2@honeywell.com', 'Michael Warfield');
                          $mail->addBCC('matt.dombrowski@honeywell.com', 'Matt Dombrowski');
                          $mail->addBCC('tareasikarus@gmail.com', 'Testing');
                     
                          $mail->IsHTML(true);  
                          $mail->Subject = "FLEXBDA :: New registered user : ".$v_txtemailtos;
                          $mail->Body = "<b>FlexBDA:</b><br> New registered user :".$v_txtemailtos." <br><br><hr><br> Best Regards <br><b>The FLEXBDA Team</b><br>";
                          //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                          $mail->AltBody = "FlexBDA \r\n New registered user :".$v_txtemailtos;
                          ///    
                          $mail->Send();
                         
                         
                        
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
         }
            else{
               $return_result_insert="error"; 
               
            }
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
