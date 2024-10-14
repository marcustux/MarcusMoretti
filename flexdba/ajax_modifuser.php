<?php
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

// Desactivar toda notificación de error
//error_reporting(0);

	include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');
	
    session_start();
     $return_result_insert="noaction";

     $v_txtnomprojdb ="***";
     $v_txtlapwd2="***";
     $v_txtlapwd1="***";
     $v_txtemailtos="***";
     $v_v_txttoken="***";
     $v_txtcompname="***";

     $regexNumeros = '/^\d+$/';
     $regexName = '/^[a-z][a-z\s]*$/i';
     $regexAZ = '/^[A-Z]+$/';
     $regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,7}$/';
     $regexCompany = '/[a-zA-Z0-9-_.,& ]+$/';
     $regexESD= '/[a-zA-Z_]+$/i';
     $regexEmployee = '/[a-zA-Z0-9:_.& ]+$/';
     
     if(
        preg_match($regexNumeros, $_REQUEST['v_idcc']) &&
        preg_match($regexName, $_REQUEST['v_txtnameuserfull']) &&
        preg_match($regexAZ, $_REQUEST['v_idaction']) &&
        preg_match($regexMail, $_REQUEST['v_txtemailtos']) &&
        preg_match($regexCompany, $_REQUEST['v_txtcompname']) &&
        preg_match($regexNumeros, $_REQUEST['v_txthoneywellaccnumber']) &&
        // preg_match($regexESD, $_REQUEST['v_txtedsdealer']) &&
        // preg_match($regexMail, $_REQUEST['v_rsm']) &&
        // preg_match($regexMail, $_REQUEST['v_txtbdabdm']) &&
        //preg_match($regexEmployee, $_REQUEST['v_typeemployee']) &&
        preg_match($regexName, $_REQUEST['v_txtprofile'])
       )
     {
      $v_idcc = $_REQUEST['v_idcc'];
      $v_txtnomprojdb = $_REQUEST['v_txtnameuserfull'];
      $v_idaction = $_REQUEST['v_idaction'];
      $v_txtemailtos = $_REQUEST['v_txtemailtos'];
      $v_txtcompname = $_REQUEST['v_txtcompname'];
      $v_txthoneywellaccnumber = $_REQUEST['v_txthoneywellaccnumber'];
      $v_txtedsdealer = $_REQUEST['v_txtedsdealer'];
      $v_rsm = $_REQUEST['v_rsm'];
      $v_txtbdabdm = $_REQUEST['v_txtbdabdm'];
      $v_typeemployee =$_REQUEST['v_typeemployee'];

      //CONTROLAR YA QUE EN EL PROCESO NORMAL ASIGNA SIN SANITIZAR
      $vidusuario =$_REQUEST['v_idcc'];
      $v_rsm =$_REQUEST['v_rsm'];
      $v_bdabdm =$_REQUEST['v_txtbdabdm'];
      $v_txtprofile =$_REQUEST['v_txtprofile'];
     
   //   $sanitized_n = filter_var($_REQUEST['v_idcc'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_idcc = $_REQUEST['v_idcc'];
   //   }

   function generateFileName()
   {
   $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
   $name = "";
   for($i=0; $i<12; $i++)
   $name.= $chars[rand(0,strlen($chars))];
   return $name;
   }

   //   $v_idaction = $_REQUEST['v_idaction'];
     if (  $v_idaction =="YM")
     {
         // Genero la pass para UPDATEAR
         $v_txtlapwd2 =  generateFileName();
     }
     if (  $v_idaction =="PM")
     {
         // Genero la pass para UPDATEAR
         $v_txtlapwd2 =  generateFileName();
     }

   //   $sanitized_n = filter_var($_REQUEST['v_txtnameuserfull'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtnomprojdb = $_REQUEST['v_txtnameuserfull'];
   //   }
   //   $sanitized_b = filter_var($_REQUEST['v_txtemailtos'], FILTER_SANITIZE_EMAIL);
   //   if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
   //      $v_txtemailtos = $_REQUEST['v_txtemailtos'];
   //   }
  

   //   $sanitized_n = filter_var($_REQUEST['v_txtcompname'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtcompname = $_REQUEST['v_txtcompname'];
   //   }
   

   //   $sanitized_n = filter_var($_REQUEST['v_txthoneywellaccnumber'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txthoneywellaccnumber = $_REQUEST['v_txthoneywellaccnumber'];
   //   }

   //   $sanitized_n = filter_var($_REQUEST['v_txtedsdealer'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtedsdealer = $_REQUEST['v_txtedsdealer'];
   //   }

   //   $sanitized_n = filter_var($_REQUEST['v_rsm'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_rsm = $_REQUEST['v_rsm'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_txtbdabdm'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_txtbdabdm = $_REQUEST['v_txtbdabdm'];
   //   }

   //   $v_typeemployee =$_REQUEST['v_typeemployee'];
   //   $vidusuario =$_REQUEST['v_idcc'];

   //   $v_rsm =$_REQUEST['v_rsm'];
   //   $v_bdabdm =$_REQUEST['v_txtbdabdm'];

   //   $v_txtprofile =$_REQUEST['v_txtprofile'];
   

     

     $return_result_insert="error"; 
	try {

      if (  $v_idaction =="YM")
      {
        $sentenciahonwywell = $connect->prepare("UPDATE customers_userewbfas
        SET   userpass=:userpass, active='Y',  nameuserfull=:nameuserfull, companynametemp=:companynametemp, honeeywellnroacc=:honeeywellnroacc,  esdchanneldealer=:esdchanneldealer, rsm=:rsm, bdabdm=:bdabdm , profile=:profile 
        WHERE idusercus = :idusercus ");
            $sentenciahonwywell->bindParam(':userpass', $v_txtlapwd2);     
      }
      if (  $v_idaction =="NM")
      {
         $sentenciahonwywell = $connect->prepare("UPDATE customers_userewbfas
         SET   active='Y',  nameuserfull=:nameuserfull, companynametemp=:companynametemp, honeeywellnroacc=:honeeywellnroacc, typeemployee=:typeemployee, esdchanneldealer=:esdchanneldealer, rsm=:rsm, bdabdm=:bdabdm, profile=:profile 
         WHERE idusercus = :idusercus ");
             $sentenciahonwywell->bindParam(':typeemployee', $v_typeemployee);
      }
      if (  $v_idaction =="PM")
      {
        $sentenciahonwywell = $connect->prepare("UPDATE customers_userewbfas
        SET   userpass=:userpass, active='Y',  nameuserfull=:nameuserfull, companynametemp=:companynametemp, honeeywellnroacc=:honeeywellnroacc,  esdchanneldealer=:esdchanneldealer, rsm=:rsm, bdabdm=:bdabdm , profile=:profile 
        WHERE idusercus = :idusercus ");
            $sentenciahonwywell->bindParam(':userpass', $v_txtlapwd2);     
      }

	
                $sentenciahonwywell->bindParam(':nameuserfull', $v_txtnomprojdb);    
                $sentenciahonwywell->bindParam(':companynametemp', $v_txtcompname);
                $sentenciahonwywell->bindParam(':honeeywellnroacc', $v_txthoneywellaccnumber);
            
                $sentenciahonwywell->bindParam(':esdchanneldealer', $v_txtedsdealer);
                $sentenciahonwywell->bindParam(':rsm', $v_rsm);
                $sentenciahonwywell->bindParam(':bdabdm', $v_bdabdm);
                $sentenciahonwywell->bindParam(':profile', $v_txtprofile);
                $sentenciahonwywell->bindParam(':idusercus', $vidusuario);
                
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 
                                 
                   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                         ////Send email to activate account
                         if (  $v_idaction =="YM")
                          {
         // /enviamos email de cambio de pass
     
                         require ("configsendmail.php"); 

                         $mail->addAddress(str_replace('_fiplex@', '@', $v_txtemailtos),   $v_txtnomprojdb);
                         $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                         $mail->IsHTML(true);  
                         $mail->Subject = "FLEXBDA::New password for users : ".$v_txtemailtos;
                         $mail->Body = "<b>Dear ". $v_txtnomprojdb.".</b><br> We have received your request to create a new password for your FLEXDBA account. <br><br>User to enter the site: ".$v_txtemailtos."<br>New Password: ".$v_txtlapwd2."<br><hr><br> Best Regards <br><b>The FLEXBDA Team</b><br>";
                         //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                         $mail->AltBody = ">Dear ". $v_txtnomprojdb.", we have received your request to create a new password for your FLEXDBA account.  \\r ******** User to enter the site: ".$v_txtemailtos." -- New Password: ".$v_txtlapwd2." \r\n ***** Best Regards The FLEXBDA Team";
                         ///    
                         $mail->Send();
                         
                         }
                         if (  $v_idaction =="PM")
                         {
        // /enviamos email de cambio de pass
    
                        require ("configsendmail.php"); 

                        $mail->addAddress(str_replace('_fiplex@', '@', $v_txtemailtos),   $v_txtnomprojdb);
                        $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                        $mail->IsHTML(true);  
                        $mail->Subject = "FLEXBDA:: Account activated : ".$v_txtemailtos;
                        $mail->Body = "<b>Dear ". $v_txtnomprojdb.".</b><br>Your FLEXDBA account has been activated. <br><br>User to enter the site: ".$v_txtemailtos."<br>Password: ".$v_txtlapwd2."<br><hr><br> Best Regards <br><b>The FLEXBDA Team</b><br>";
                        //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                        $mail->AltBody = ">Dear ". $v_txtnomprojdb.", your FLEXDBA account has been activated.  \\r ******** User to enter the site: ".$v_txtemailtos." -- New Password: ".$v_txtlapwd2." \r\n ***** Best Regards The FLEXBDA Team";
                        ///    
                        $mail->Send();
                        
                        }
                        
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
