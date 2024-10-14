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

     

     $sanitized_n = filter_var($_REQUEST['vusu'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $vv_vusu = $_REQUEST['vusu'];
     }
     $sanitized_n = filter_var($_REQUEST['vparam'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $vparam = $_REQUEST['vparam'];
     }

     
     $return_result_insert="error"; 
	try {

         
            $sentenciahonwywell = $connect->prepare(" UPDATE public.customers_userewbfas 	SET  active=:actives 	WHERE idusercus=:idusercus ");
                   

                $sentenciahonwywell->bindParam(':actives', $vparam);			
                $sentenciahonwywell->bindParam(':idusercus', $vv_vusu);      
             
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 
                                 
                   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                   
                         
                        
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
