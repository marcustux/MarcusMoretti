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

     $vv_vemail ="***";
     $v_txtlapwd2="***";
     
     $regexMail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
     $regexNotif = '/^[a-zA-Z_]+$/';
     $regexAZ = '/^[a-zA-Z]+$/';

   if(preg_match($regexMail, $_REQUEST['vemail']) && 
      preg_match($regexNotif, $_REQUEST['vref']) && 
      preg_match($regexAZ, $_REQUEST['acc']))
      {
      $vv_vemail = $_REQUEST['vemail'];
      $vv_vref = $_REQUEST['vref'];
      $vvacc = $_REQUEST['acc'];
   



   //   $sanitized_n = filter_var($_REQUEST['vemail'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $vv_vemail = $_REQUEST['vemail'];
   //   }
   //   $sanitized_b = filter_var($_REQUEST['vref'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_b, FILTER_SANITIZE_STRING)) {
   //      $vv_vref = $_REQUEST['vref'];
   //   }
     //$vvacc = $_REQUEST['acc'];
     $return_result_insert="error"; 
	try {

         if ($vvacc =="I")
         {
            $sentenciahonwywell = $connect->prepare("INSERT into flexbdahoneywell_notifications (idnotifications, typenotif, emailnoti, activeemail)	VALUES ((select max(idnotifications) + 1 from  flexbdahoneywell_notifications), :typeinteger, :emailnoti, 'Y');");
         }
         if ($vvacc =="U")
         {
            $sentenciahonwywell = $connect->prepare("update flexbdahoneywell_notifications set activeemail='N' where  emailnoti = :emailnoti and  typenotif= :typeinteger ");
         }
         if ($vvacc =="A")
         {
            $sentenciahonwywell = $connect->prepare("update flexbdahoneywell_notifications set activeemail='Y' where  emailnoti = :emailnoti and  typenotif= :typeinteger ");
         }

            

                $sentenciahonwywell->bindParam(':typeinteger', $vv_vref);			
                $sentenciahonwywell->bindParam(':emailnoti', $vv_vemail);      
             
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 
                                 
                   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                   
                         
                        
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
