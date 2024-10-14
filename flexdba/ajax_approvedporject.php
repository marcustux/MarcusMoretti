<?php
// Desactivar toda notificación de error
//error_reporting(0);
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}


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
      $iduuff = $_SESSION["flexbdaa"];
      $query_listaprojmail ="SELECT * FROM customers_userewbfas WHERE idusercus =  ".  $iduuff;

       $datamails = $connect->query($query_listaprojmail)->fetchAll();	
           foreach ($datamails as $rowmm) {			
            
            if($entornoActual=='DEV' || $entornoActual=='TST'){

                $v_email_pm = 'luchianocastro@gmail.com';
                $v_name_pm = 'Lucho';

             }else{

                $v_email_pm = $rowmm['usermail'];
                $v_name_pm = $rowmm['nameuserfull'];

            }
            
           }
           $v_idmaxidproject = $v_idp;
           $query_listaprojmailcus ="SELECT * FROM customers_userewbfas WHERE idusercus in( select idusercustomers from flexbdahoneywell where idproject = ".$v_idp.")  ";

           $datamailscus = $connect->query($query_listaprojmailcus)->fetchAll();	
               foreach ($datamailscus as $rowmmcus) {			
                
                $v_v_txttoken  = $rowmmcus['tokengoogle'];

                if($entornoActual=='DEV' || $entornoActual=='TST'){

                    $v_email_customer = 'tareasikarus@gmail.com';
                    $v_name_customer = 'TI';

                }else{

                    $v_email_customer = $rowmmcus['usermail'];
                    $v_name_customer = $rowmmcus['nameuserfull'];
                    $v_v_rsm  = $rowmmcus['rsm'];
                    $v_v_bdabdm  = $rowmmcus['bdabdm'];

                }

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
for($i=0; $i<2; $i++)
$name.= $chars[rand(0,strlen($chars))];
return $name;
}
//get a random name of the file here
$fileNamepdf = generateFileName();
$fileNamepdf = "Estimate_F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."rev".$v_idpr."-".str_replace("'","",str_replace("&","",$v_txtnomprojdb))."-".str_replace("&","",str_replace("'","",$v_name_customer))."-approved" ;
$filenamepdfnueva =preg_replace('/\s+/', '_', $fileNamepdf);
//      echo $filenamepdfnueva;
      $fileNamepdf =  $filenamepdfnueva;

                //Insertamos estado.
                $iduuff = $_SESSION["flexbdaa"];
                $sentenciaaction = $connect->prepare("INSERT INTO flexbdahoneywell_actions(idproject, idrev, nameactions, detailsactions, datemodif, iduserselect)  VALUES (:idproject, :idrev, :nameactions,:detailsactions,now(), :iduserselect)");
                $sentenciaaction->bindParam(':idproject', $vidp);
                $sentenciaaction->bindParam(':idrev', $vidr);	 
                $sentenciaaction->bindParam(':nameactions', $v_nameactions);
                $sentenciaaction->bindParam(':detailsactions', $filenamepdfnueva);	 
                $sentenciaaction->bindParam(':iduserselect', $iduuff);	 
                
                $sentenciaaction->execute();

            //    // GENERO PDF PARA ADJUNTAR     
                $vprject = $v_idmaxidproject; ///
                $vaccion = 'D'; ///
                $v_natt = $filenamepdfnueva; ///
                $activa = $v_v_txttoken; ///
                
                require ('downloadprojectpdf.php');
            
            ////$filenamepdf = str_replace(" ","_",$fileNamepdf);     
         
            //    $cc = curl_init("https://www.flexbda.com/viewprojpdf.php?activate=".$v_v_txttoken."&idp=".$v_idmaxidproject."&idcc=D&natt=".$filenamepdfnueva);  
            //  //   echo "https://www.flexbda.com/viewprojpdf.php?activate=ww&idp=".$v_idmaxidproject."&idcc=D&natt=".$filenamepdfnueva;
                
            //     $url_content =  curl_exec($cc);  

            //    curl_close($cc);

                   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                    // INICIO CSV
                //if($_SESSION['flexesdchandeal'] == 'FIPLEX_SI')
                //{
                    $csv_end = "  
                    ";  
                    $csv_sep = ";";  
                    $csv="";  

                    //$csv_file = $fileNamepdf."_".generateFileName().".csv";
                    $csv_file = $fileNamepdf.".csv";

                    $query_listacsv ="SELECT idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport FROM flexbdahoneywell_bugdet WHERE idproject= ".$v_idmaxidproject." and idrev =".$v_idpr." order by netprice DESC"; 

                    $data_listacsv = $connect->query($query_listacsv)->fetchAll();	

                    $num_rowcsv = 2;

                    // set column separator ;
                    $csv.="sep = ;".$csv_end;  

                    // titulos
                    $csv.="".$csv_sep."sku".$csv_sep."description".$csv_sep."quantity".$csv_sep."Net Price".$csv_sep."Net Total".$csv_end;  

                    foreach ($data_listacsv as $rowcsv) {	          

                        //$formula_discount = List Total
                        $formula_discount = "=sum(I".$num_rowcsv.":J".$num_rowcsv.")";
                        /* $formula_discount = "=((D".$num_rowcsv."*E".$num_rowcsv.")-(D".$num_rowcsv."*E".$num_rowcsv."*(F".$num_rowcsv."/100)))"; */
                        $formula_discount = "=(D".$num_rowcsv."*E".$num_rowcsv.")";
                        $csv.="".$csv_sep.$rowcsv['sku'].$csv_sep.$rowcsv['description'].$csv_sep.$rowcsv['quantity'].$csv_sep.$rowcsv['netprice'].$csv_sep.$formula_discount.$csv_end; 

                        $num_rowcsv++;
                    }

                    // Totales
                    $num_rowcsv = $num_rowcsv - 1;
                    $csv.="".$csv_sep."".$csv_sep."".$csv_sep."".$csv_sep."Total:".$csv_sep."=SUM(F2:F".$num_rowcsv.")".$csv_end;  

                    //  // //Generamos el csv de todos los datos  
                    if (!$handle = fopen("csvattach/".$csv_file, "w")) {  
                        echo "Cannot open file";  
                        exit;  
                    }  
                    if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                        echo "Cannot write to file";  
                        exit;  
                    }  
                    fclose($handle); 
                //}
                    // fin CSV


                         ////Send email to activate account
                     require ("configsendmail.php"); 

                       
                       if (  $v_email_customer  <> "")
                        {
                            $mail->addAddress(str_replace('_fiplex@', '@', $v_email_customer), $v_name_customer);
                        }
                    //   echo "aaa:". $v_email_customer."#--#". $v_email_pm."#aaaaaaRSM;".$v_v_rsm   ;

                        if (  $v_email_pm  <> "")
                        {
                            //creo q se duplicaaa ver...
                           // $mail->addCC($v_email_pm, $v_name_pm);
                            if (filter_var($v_email_pm, FILTER_VALIDATE_EMAIL)) {
                                $mail->addCC(str_replace('_fiplex@', '@', $v_email_pm), $v_email_pm);
                            }

                        }
                        
                        if($entornoActual !='DEV' && $entornoActual!='TST')
                       
                       {
                        $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_processed' and activeemail = 'Y'  ";
                        $datanotif = $connect->query($sqlnotif)->fetchAll();	
                        
                        foreach ($datanotif as $rownt)
                        {	
                       //     $mail->addCC($rownt['emailnoti'], $rownt['emailnoti']);
                            if (filter_var($rownt['emailnoti'], FILTER_VALIDATE_EMAIL)) {
                                $mail->addCC(str_replace('_fiplex@', '@', $rownt['emailnoti']), $rownt['emailnoti']);
                            }
                        }
                                ///$v_v_rsm="-";
                            if (  $v_v_rsm  <> "")
                            {
                                if (filter_var($v_v_rsm, FILTER_VALIDATE_EMAIL)) {
                                    $mail->addCC(str_replace('_fiplex@', '@', $v_v_rsm), $v_v_rsm);
                                    }

                            }
                            
                            if (  $v_v_bdabdm  <> "")
                            {
                                // $mail->addCC($v_v_bdabdm, $v_v_bdabdm);
                                if (filter_var($v_v_bdabdm, FILTER_VALIDATE_EMAIL)) {
                                    $mail->addCC(str_replace('_fiplex@', '@', $v_v_bdabdm), $v_v_bdabdm);
                                    }
                            }      
                            /* $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                            $mail->addBCC('agustin.corigliano@fiplex.com', 'Agus copia');
                            $mail->addBCC('luchianocastro@gmail.com', 'Control'); */
                            
                        }else{

                            $mail->addBCC('tareasikarus@gmail.com', 'TI');

                        }
                       
                        
                       $mail->IsHTML(true);  
                       $mail->Subject = "FLEXBDA::Processed Project:  #F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."-".$v_txtnomprojdb."-".$v_name_customer ;
                       
                       if($_SESSION['flexesdchandeal'] == 'FIPLEX_SI')
                        {
                            $bullets_Honeywell = "";
                        }
                        else
                        {    
                            $bullets_Honeywell = "
                            <ul> 
                            <li>700/800 MHz, 0.5W to 2W ERCES offering (BDA, BBU, Passives including Cable, PCTEL, training tools) are available through Honeywell Fire key wholesale distributors, you can contact them to determine your net price for these parts.</li>
                            <li>Customers requiring portions of the ERCES portfolio not available through distribution (5W BDAs, Fiber DAS, VHF/UHF) for specific projects can work with their Regional Sales Manager to get approval to purchase these parts directly from Fiplex.</li>
                            <li>For parts purchased directly from Honeywell / Fiplex including design, the discount from the list remains the same at 25% regardless</li>
                            </ul>";
                        }

                     //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                       $mail->Body = "<p><img src='http://flexbda.com/honeywell_logomail_final.png'> </p><hr style=' border: 1px solid red;'><b>Dear users,</b><br><br>We want to inform you that  your project: <b> ".$v_txtnomprojdb."</b> was processed and attached is copy of your project estimate. The processed estimate is also available on flexbda.<br><br> <br>NOTE: Net Price is shown on the estimate and you will need to determine your net price. ".$bullets_Honeywell." If you have any questions, please reach out to your Honeywell local sales manager.<br>
                                                
                        <br> Best Regards <br><hr><b>The FLEXBDA Team</b><br>";
                     //Definimos AltBody por si el destinatario del correo no admite email con formato html 

                       $mail->AltBody = "Dear users, We want to inform you that  your project: <b> ".$v_txtnomprojdb."</b> was processed and attached is copy of your project estimate. The processed estimate is also available on flexbda.\r\n NOTE: Net Price is shown on the estimate and you will need to determine your net price. ".$bullets_Honeywell." If you have any questions, please reach out to your Honeywell local sales manager.  \r\n ***** Best Regards The FLEXBDA Team";
                          ///   
            
                        $emailAttachment ="pdfattach/".trim($filenamepdfnueva).".pdf";
                     //   echo   $emailAttachment ;
                      $mail->AddAttachment($emailAttachment);

                      //if($_SESSION['flexesdchandeal'] == 'FIPLEX_SI')
                      //{
                        $emailAttachment_csv ="csvattach/".trim($csv_file);
                        $mail->AddAttachment($emailAttachment_csv);
                      //}
                 
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
