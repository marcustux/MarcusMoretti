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

     $vv_vusu ="***";

     function generateFileName()
     {
     $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
     $name = "";
     for($i=0; $i<12; $i++)
     $name.= $chars[rand(0,strlen($chars))];
     return $name;
     }
     $v_txtlapwd2 =  generateFileName();

     
    //  if (filter_var($_REQUEST['txtuser'], FILTER_VALIDATE_EMAIL)) {
    $regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,7}$/i';
    
    if(preg_match($regexMail, $_REQUEST['txtuser'])){
       $emailok = $_REQUEST['txtuser'];

       try {        

                //// BUSCAMOS
                    $encontrado ="N";
                    $sqlnotif="select * FROM  customers_userewbfas where usermail = '".$emailok."' and active = 'Y' ";
                    $datanotif = $connect->query($sqlnotif)->fetchAll();	
                    foreach ($datanotif as $rownt)
                    {	
                    //     $mail->addCC($rownt['emailnoti'], $rownt['emailnoti']);
                    $encontrado ="Y";
                    $v_txtnomprojdb = $rownt['username'];
                    }

                //FIN BUSAMOS




                 

                        if (  $encontrado =="Y")
                        {

                            $sentenciahonwywell = $connect->prepare("UPDATE customers_userewbfas
                            SET   userpass=:userpass    WHERE usermail = :usermail and active = 'Y'");
                            $sentenciahonwywell->bindParam(':userpass', $v_txtlapwd2);   
                                $sentenciahonwywell->bindParam(':usermail', $emailok);   
                            
                                $sentenciahonwywell->execute();   
                                $return_result_insert="ok"; 
            // /enviamos email de cambio de pass

                    require ("configsendmail.php"); 

                    $mail->addAddress(str_replace('_fiplex@', '@', $emailok), $emailok);
                    $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                    $mail->IsHTML(true);  
                    $mail->Subject = "FLEXBDA::Reset password for users : ".$emailok;
                    $mail->Body = "<b>Dear ". $v_txtnomprojdb.",</b><br> we have received your request to create a new password for your FLEXDBA account. <br><br>User to enter the site: ".$emailok."<br>New Password: ".$v_txtlapwd2."<br><hr><br> Best Regards <br><b>The FLEXBDA Team</b><br>";
                    //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                    $mail->AltBody = ">Dear ". $v_txtnomprojdb.", we have received your request to create a new password for your FLEXDBA account.  \\r ******** User to enter the site: ".$emailok." -- New Password: ".$v_txtlapwd2." \r\n ***** Best Regards The FLEXBDA Team";
                    ///    
                    $mail->Send();
                    
                    }
                    else
                    {
                        $msjerr= "Syntax Error MM: ".$e->getMessage();
                                
                        $return_result_insert="error"; 
                    }
                                        
               //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
               
                     
                    
            } 
            catch (PDOException $e) 
            {
                
            
                $msjerr= "Syntax Error MM: ".$e->getMessage();
                    
                $return_result_insert="error"; 
            }

    }
    else
    {
        $msjerr= "Syntax Error MM: ".$e->getMessage();
        $return_result_insert="error"; 
    }
 

	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
