<?php

//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

include("db_conectflexbda.php"); 
header('Content-Type: application/json');
	$palabra_a_buscar = $_REQUEST['q'];
	$marcaamostrar = $_REQUEST['mm'];
	$vfrom = $_REQUEST['from'];
	//$query_lista = list_all_cuis($palabra_a_buscar);
    $return_arr = array();
 	
	if ($vfrom =="UHFVHF")
	{
		$query_lista= "select ".$marcaamostrar." as modelciu, * from flexbda_products_budget where ".$marcaamostrar." like '%".strtoupper($palabra_a_buscar)."%' order by ".	$marcaamostrar;	
	}
	else
	{
		$query_lista= "select ".$marcaamostrar." as modelciu, * from flexbda_products_budget  where ".$marcaamostrar." like '%".strtoupper($palabra_a_buscar)."%'  order by ".	$marcaamostrar;	
	//	$query_lista= "select fiplexpartnro as modelciu, * from flexbda_products_budget limit 50";	
	}	
	
	
	
	$data = $connect->query($query_lista)->fetchAll();	
//	echo "[";
	foreach ($data as $row) {			
	//	array_push($return_arr,  $row[0]);		
		$return_arr[] = array("value" => $row['idproduct'], "text" => $row['modelciu'], "dd" => $row['des_'.$marcaamostrar], "pricem" => $row['price_'.$marcaamostrar], "hslow" => $row['hslow_'.$marcaamostrar], "hshigh" => $row['hshigh_'.$marcaamostrar]);
	//	$return_arr[] =  $row['modelciu'];	
	//	echo '"'.$row['modelciu'].'",';	
	 }
//	 echo "]";
	 /////////////////////////////////////////////////////
	 


/// echo(json_encode(["gi"=>$return_arr,"gifw"=>$return_arr_fw, "gisn"=>$return_arr_sn , "gilog"=>$return_arr_runinfo, "giciu"=>$return_arr_cius]));
 echo(json_encode($return_arr));


?>