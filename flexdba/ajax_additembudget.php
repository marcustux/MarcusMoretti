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

     $v_txtnomprojdb ="***";
     $v_txtlapwd2="***";
     $v_txtlapwd1="***";
     $v_txtemailtos="***";
     $v_v_txttoken="***";
     $v_txtcompname="***";

     
     
     $sanitized_n = filter_var($_REQUEST['v0'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v0 = $_REQUEST['v0'];
     }
     $sanitized_n = filter_var($_REQUEST['v1'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v1 = str_replace('andand', '&', $_REQUEST['v1']);
     }
     $sanitized_n = filter_var($_REQUEST['v2'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v2 = $_REQUEST['v2'];
     }
     $sanitized_n = filter_var($_REQUEST['v3'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v3 = $_REQUEST['v3'];
     }
     $sanitized_n = filter_var($_REQUEST['v4'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v4 = $_REQUEST['v4'];
     }
     $sanitized_n = filter_var($_REQUEST['v5'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v5 = $_REQUEST['v5'];
     }
     $sanitized_n = filter_var($_REQUEST['v6'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v6 = $_REQUEST['v6'];
     }
     $sanitized_n = filter_var($_REQUEST['v7'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v7 = $_REQUEST['v7']; /// IDPROJECT
     }
     $sanitized_n = filter_var($_REQUEST['v8'], FILTER_SANITIZE_STRING);
     if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
        $v8 = $_REQUEST['v8'];  /// id rev de lproject
     }
   
     $return_result_insert="error"; 
	try {

      $sentenciahonwywellbr = $connect->prepare("delete from flexbdahoneywell_bugdet where idproject = :idproject and  idrev=:idrev and sku = :sku ");
      $sentenciahonwywellbr->bindParam(':idproject', $v7);    
      $sentenciahonwywellbr->bindParam(':idrev', $v8);    
       $sentenciahonwywellbr->bindParam(':sku', $v0);       
       $sentenciahonwywellbr->execute();   

   
        $sentenciahonwywell = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(	idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport) 	VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,  (select max(orderreport)+1 from flexbdahoneywell_bugdet where idproject= :idproject  ) );");
               $sentenciahonwywell->bindParam(':idproject', $v7);    
               $sentenciahonwywell->bindParam(':idrev', $v8);    
                $sentenciahonwywell->bindParam(':sku', $v0);
                $sentenciahonwywell->bindParam(':description', $v1);
            
                $sentenciahonwywell->bindParam(':quantity', $v2);
                $sentenciahonwywell->bindParam(':netprice', $v3);
                $sentenciahonwywell->bindParam(':nettotal', $v4);
                $sentenciahonwywell->bindParam(':esdlaborhow', $v5);
                $sentenciahonwywell->bindParam(':esdlaborhigh', $v6);
                
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 
                                 
            
                        
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
