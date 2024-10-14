<?php
// Desactivar toda notificación de error
//error_reporting(0);

	include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');
	
    session_start();
     $return_result_insert="noaction";


     $sanitized_n = filter_var($_REQUEST['idp'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v_idp = $_REQUEST['idp'];
     }
     $sanitized_b = filter_var($_REQUEST['idpr'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_b, FILTER_SANITIZE_STRING)) {
        $v_idpr = $_REQUEST['idpr'];
     }

      // Buscamos datos para los email.s
      $v_email_customer = "";
      $v_name_customer ="";
      $v_email_pm = "";
      $v_name_pm ="";
      $v_v_txttoken ="";
      $iduuff = 	$_SESSION["flexbdaa"];
      $query_listaprojmail ="SELECT * FROM customers_userewbfas WHERE idusercus =  ".  $iduuff;

       $datamails = $connect->query($query_listaprojmail)->fetchAll();	
           foreach ($datamails as $rowmm) {			
            
               $v_email_pm = $rowmm['usermail'];
               $v_name_pm = $rowmm['nameuserfull'];
           }
           $v_idmaxidproject = $v_idp;
           $query_listaprojmailcus ="SELECT * FROM customers_userewbfas WHERE idusercus in( select idusercustomers from flexbdahoneywell where idproject = ".$v_idp.")  ";

           $datamailscus = $connect->query($query_listaprojmailcus)->fetchAll();	
               foreach ($datamailscus as $rowmmcus) {			
                
                   $v_email_customer = $rowmmcus['usermail'];
                   $v_name_customer = $rowmmcus['nameuserfull'];
                   $v_v_txttoken  = $rowmmcus['tokengoogle'];

                   $v_v_rsm  = $rowmmcus['rsm'];
                   $v_v_bdabdm  = $rowmmcus['bdabdm'];

               }

               $query_listaprojmailcpp ="SELECT * FROM flexbdahoneywell WHERE idproject = ".$v_idp."  ";

               $datamailscuspp = $connect->query($query_listaprojmailcpp)->fetchAll();	
                   foreach ($datamailscuspp as $rowmmcusp) {	                    
                  
                       $v_txtnomprojdb=$rowmmcusp['projectname'];
                   }

        
              

	try {
   //echo "hola:".$v_idpr;

               $sentenciahonwywell = $connect->prepare("UPDATE flexbdahoneywell  SET active='Y' WHERE idproject=:idproject AND idrev=:idrev");
               $sentenciahonwywell->bindParam(':idproject', $v_idp);	
               $sentenciahonwywell->bindParam(':idrev', $v_idpr);	
                 $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 


                $v_nameactions="Project processed.";

                function generateFileName()
{
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
$name = "";
for($i=0; $i<12; $i++)
$name.= $chars[rand(0,strlen($chars))];
return $name;
}
//get a random name of the file here
$fileNamepdf = generateFileName();
$fileNamepdf = "Estimate_F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."rev".$v_idpr."-".$v_txtnomprojdb."-".$v_name_customer."-approved" ;


                //Insertamos estado.
                $iduuff = 	$_SESSION["flexbdaa"];
                $sentenciaaction = $connect->prepare("INSERT INTO flexbdahoneywell_actions(idproject, idrev, nameactions, detailsactions, datemodif, iduserselect)  VALUES (:idproject, :idrev, :nameactions,:detailsactions,now(), :iduserselect)");
                $sentenciaaction->bindParam(':idproject', $vidp);
                $sentenciaaction->bindParam(':idrev', $vidr);	 
                $sentenciaaction->bindParam(':nameactions', $v_nameactions);
                $sentenciaaction->bindParam(':detailsactions', $fileNamepdf);	 
                $sentenciaaction->bindParam(':iduserselect', $iduuff);	 
                
                $sentenciaaction->execute();

            //    // GENERO PDF PARA ADJUNTAR                 
               $cc = curl_init("https://www.flexbda.com/viewprojpdf.php?activate=".$v_v_txttoken."&idp=".$v_idmaxidproject."&idcc=D&natt=".$fileNamepdf);  
            //    echo "https://www.flexbda.com/viewprojpdf.php?activate=ww&idp=".$v_idmaxidproject."&idcc=D&natt=".$fileNamepdf;
                
                $url_content =  curl_exec($cc);  

               curl_close($cc);

                   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                         ////Send email to activate account
                     require ("configsendmailmm.php"); 

                       
                       if (  $v_email_customer  <> "")
                        {
                            $mail->addAddress($v_email_customer, $v_name_customer);
                        }
                 //       echo "aaa". $v_email_customer."--". $v_email_pm."aaaaaaRSM".$v_v_rsm   ;

                        if (  $v_email_pm  <> "")
                        {
                            //creo q se duplicaaa ver...
                        //    $mail->addCC($v_email_pm, $v_name_pm);
                        }
                       
                        $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_processed' and activeemail = 'Y'  ";
                        $datanotif = $connect->query($sqlnotif)->fetchAll();	
                        foreach ($datanotif as $rownt)
                        {	
                       //     $mail->addCC($rownt['emailnoti'], $rownt['emailnoti']);
                            if (filter_var($rownt['emailnoti'], FILTER_VALIDATE_EMAIL)) {
                           //     $mail->addCC($rownt['emailnoti'], $rownt['emailnoti']);
                            }
                        }


                      
                        $v_v_rsm="-";
                       if (  $v_v_rsm  <> "")
                        {
                            if (filter_var($v_v_rsm, FILTER_VALIDATE_EMAIL)) {
                                $mail->addCC($v_v_rsm, $v_v_rsm);
                              }
                             
                           
                        }
                        
                        if (  $v_v_bdabdm  <> "")
                        {
                           // $mail->addCC($v_v_bdabdm, $v_v_bdabdm);
                            if (filter_var($v_v_bdabdm, FILTER_VALIDATE_EMAIL)) {
                                $mail->addCC($v_v_bdabdm, $v_v_bdabdm);
                              }
                        }
                    
                      //  echo "pdfattach/".$fileNamepdf.".pdf";
                    
                   ///     #F<?php  echo  str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT); 

                       $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                   //    $mail->addBCC('agustin.corigliano@fiplex.com', 'Agus copia');
                       $mail->IsHTML(true);  
                       $mail->Subject = "FLEXBDA::Processed Project:  #F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."-".$v_txtnomprojdb."-".$v_name_customer ;
                       
                     //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                       $mail->Body = "<p><img src='http://flexbda.com/honeywell_logomail_final.png'> </p><hr style=' border: 1px solid red;'><b>Dear users</b>, we want to inform you that a new revision of the project: <b> ".$v_txtnomprojdb."</b> was correctly Approved.<br><br> <br>NOTE:  Please note this is an auto-generated notification. Please do not reply to this email, this email id is not monitored. If you have any questions, please reach out to your Honeywell local sales manager.<br>Single Building projects with BDA:  Standard estimates turnaround time is 3 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.<br>
                        Projects with Fiber DAS:  Standard estimates turnaround time is 5 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.<br><br> Best Regards <br><hr><b>The FLEXBDA Team</b><br>
                        ";
                     //Definimos AltBody por si el destinatario del correo no admite email con formato html 

                       $mail->AltBody = "Dear users ,We want to inform you that the project  <b> ".$v_txtnomprojdb."</b> has already been processed and the results are available.\r\n   \r\n ***** Best Regards The FLEXBDA Team";
                          ///   
            
                        $emailAttachment ="pdfattach/".$fileNamepdf.".pdf";
                       $mail->AddAttachment($emailAttachment);
                      
                 
                     if(!$mail->Send())
                       {
                         //  echo "Mail Not Sent";
                       }
                   else
                       {
                        //  echo "Mail Sent";
                       }
                
                        
                         
                        
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
