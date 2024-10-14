<?php
// Desactivar toda notificación de error
//error_reporting(0);

	include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');
	
    session_start();
     $return_result_insert="noaction";

     $vv_vusu ="***";

  if (!isset($_SESSION["csrf_token"]) || $_REQUEST['csrf_token'] != $_SESSION["csrf_token"]) {
   http_response_code(404);
   exit('error');
   }

   if ( 	$_SESSION["flexbdad"]  != "itsupport@fiplex.com" ){
      http_response_code(404);
      exit('error');
   }

$regexNumeros = '/^\d+$/';

if(   preg_match($regexNumeros, $_REQUEST['cc1pass'])  )
   {
      $v_idcc = $_REQUEST['cc1pass'];

     $return_result_insert="error"; 
	         try {
                $sentenciahonwywell = $connect->prepare(" UPDATE public.flexbdahoneywell
                SET active= 'P'
                WHERE idproject=:userpassviejo and active= 'Y' and idrev = ( select max(idrev) from public.flexbdahoneywell WHERE idproject=:userpassviejo );    
                ");

              
                $sentenciahonwywell->bindParam(':userpassviejo', $v_idcc);	             
                $sentenciahonwywell->execute();   

                $return_result_insert="ok";
                     
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
