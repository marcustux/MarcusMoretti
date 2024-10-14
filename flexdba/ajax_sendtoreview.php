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
             
              

        	try {
   //echo "hola:".$v_idpr;

                        $sentenciahonwywell = $connect->prepare("UPDATE flexbdahoneywell  SET active='P' WHERE idproject=:idproject AND idrev=:idrev");
                        $sentenciahonwywell->bindParam(':idproject', $v_idp);	
                        $sentenciahonwywell->bindParam(':idrev', $v_idpr);	
                        $sentenciahonwywell->execute();   
                        $return_result_insert="ok"; 
                      
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
