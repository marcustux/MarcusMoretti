<?php
// Desactivar toda notificación de error
//error_reporting(0);

	include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');
	
    session_start();
     $return_result_insert="noaction";

     $vv_vusu ="***";

     /*
     {
        //consulta si devolvio el Scan Device
            formData.append("v_iduu", v_iduu);
            formData.append("v_idcc", v_idcc);
            formData.append("v_idcc1", v_idcc1);
              formData.append("v_idcc2", v_idcc2);
            
  */
  /*$v_iduu = $_REQUEST['v_iduu'];
  $v_idcc = $_REQUEST['v_idcc'];
  $v_idcc1 = $_REQUEST['v_idcc1'];
  $v_idcc2 = $_REQUEST['v_idcc2'];*/
  
  if (!isset($_SESSION["csrf_token"]) || $_REQUEST['csrf_token'] != $_SESSION["csrf_token"]) {
   http_response_code(404);
   exit('error');
   }

$regexNumeros = '/^\d+$/';
$regePassEx= '/^[^\=\'{} \"<>\(\)]+$/';
$regexlimite= '/^.{8,32}$/';
$regexPass = '/^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$/';

if( 
   preg_match($regexNumeros, $_REQUEST['iduu']) &&
   preg_match($regePassEx, $_REQUEST['ccpass']) &&
   preg_match($regexlimite, $_REQUEST['ccpass']) &&
   preg_match($regexPass, $_REQUEST['cc1pass']) &&
   preg_match($regexPass, $_REQUEST['cc2pass']))
   /* preg_match($regexNumeros, $_REQUEST['v_iduu']) &&
   preg_match($regePassEx, $_REQUEST['v_idcc']) &&
   preg_match($regexlimite, $_REQUEST['v_idcc']) &&
   preg_match($regexPass, $_REQUEST['v_idcc1']) &&
   preg_match($regexPass, $_REQUEST['v_idcc2'])) */
   {

      /* $v_iduu = $_REQUEST['v_iduu'];
      $v_idcc = $_REQUEST['v_idcc'];
      $v_idcc1 = $_REQUEST['v_idcc1'];
      $v_idcc2 = $_REQUEST['v_idcc2']; */
      $v_iduu = $_REQUEST['iduu'];
      $v_idcc = $_REQUEST['ccpass'];
      $v_idcc1 = $_REQUEST['cc1pass'];
      $v_idcc2 = $_REQUEST['cc2pass'];



   //   $sanitized_n = filter_var($_REQUEST['v_iduu'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_iduu = $_REQUEST['v_iduu'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_idcc'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_idcc = $_REQUEST['v_idcc'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_idcc1'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_idcc1 = $_REQUEST['v_idcc1'];
   //   }
   //   $sanitized_n = filter_var($_REQUEST['v_idcc2'], FILTER_SANITIZE_STRING);
   //   if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
   //      $v_idcc2 = $_REQUEST['v_idcc2'];
   //   }

     
     $return_result_insert="error"; 
	try {

         
                $sentenciahonwywell = $connect->prepare(" UPDATE public.customers_userewbfas  SET  userpass=:userpass 	WHERE idusercus=:idusercus and  userpass=:userpassviejo  ");
             //   $sentenciahonwywell = $connect->prepare(" UPDATE public.customers_userewbfas  SET  userpass=:userpass 	WHERE idusercus=:idusercus   ");

                $sentenciahonwywell->bindParam(':userpass', $v_idcc1);			
                $sentenciahonwywell->bindParam(':idusercus', $v_iduu);      
                $sentenciahonwywell->bindParam(':userpassviejo', $v_idcc);	             
                $sentenciahonwywell->execute();   
        //       echo "aaaaaaaaaaaaaa".$sentenciahonwywell->rowCount();
               if ( $sentenciahonwywell->rowCount() ==1)
               {
                $return_result_insert="ok";

                $vuserfas =		$_SESSION["flexbdab"];
				$vmenufas="FlexDBA:".array_pop(explode('/', $_SERVER['PHP_SELF']));
				$vaccionweb="ChangePass FlexDBA";
				$vdescripaudit="ChangePass#".$_SERVER['SERVER_ADDR'] ;
				$vtextaudit="ChangePass#".$v_idcc1."#".$v_idcc."#iduser:".$v_iduu;
		

				
				$sentenciach = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit);");
								$sentenciach->bindParam(':userfas', $vuserfas);								
								$sentenciach->bindParam(':menuweb', $vmenufas);
								$sentenciach->bindParam(':actionweb', $vaccionweb);
								$sentenciach->bindParam(':descripaudit', $vdescripaudit);
								$sentenciach->bindParam(':textaudit', $vtextaudit);
								$sentenciach->execute();
                                
                                

               }
         //       $return_result_insert="ok"; 
                                 
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
