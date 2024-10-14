<?php

if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

include("db_conectflexbdainit.php"); 
	header('Content-Type: application/json');


	$regexMail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	
	$encontre  =0;

	if(preg_match($regexMail, $_REQUEST['ve'])){
		$veremail =   $_REQUEST['ve'];

// 	$sanitized_b = filter_var($_REQUEST['ve'], FILTER_SANITIZE_EMAIL);
// if (filter_var($sanitized_b, FILTER_VALIDATE_EMAIL)) {
//	echo "Esta dirección de correo saneada (b) es válida.\n";
	
	
	$query_lista = "select * from customers_userewbfas where usermail ='".$veremail."' ";		
			


	///	$query_lista = "select distinct ponumber from orders_sn  ";	
		$return_arr = array();	
		$encontre  =0;
		$data = $connect->query($query_lista)->fetchAll();	
		foreach ($data as $row) {			
		//	array_push($return_arr,  $row[0]);		
		////	$return_arr[] = array("isfree" => "N");	
			$encontre  =1;
		 }
		 /////////////////////////////////////////////////////

} else {
  //  echo "Esta dirección de correo saneada (b) no es válida.\n";
}



	 


 echo(json_encode(["isfree"=>$encontre]));


?>