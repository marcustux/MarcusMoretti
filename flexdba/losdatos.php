<?php

//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

include("db_conectflexbda.php"); 
error_reporting(0);
/* Getting post data */
$nropage = $_REQUEST['page'];



$sql = $connect->prepare("select count(*) as cc from  flexbda_products_budget ");
    $sql->execute();
    $resultado = $sql->fetchAll();
	 foreach ($resultado as $row) {
		$allcount= $row['cc'];
	 }
	

		$rowid= 20;
		$nropage = $nropage -1;
		if($nropage ==0)
		{
			$rowid= 20;
			$rowperpage = $rowid * $nropage;			
		}
		if ($nropage==1)
		{
			$rowid=$allcount;
			$rowperpage=20;
		}
		if ($nropage==2)
		{
			$rowid=0;
			$rowperpage=0;
		}
				
		
	
        

	
	 $sql = $connect->prepare("SELECT * from  flexbda_products_budget order by fiplexpartnro ");
    $sql->execute();
    $resultado = $sql->fetchAll();




$employee_arr = array();
//$employee_arr[] = array("last_page" => $allcount);

$idcantrow=0;
 foreach ($resultado as $row) {
		 $fiplexpartnro =  $row['fiplexpartnro']; 
		// $idcantrow = $idcantrow +1;  
		$honeywellnro = $row['honeywellnro'];
		$description = $row['description'];
		$price = $row['price'];  
		$idproduct = $row['idproduct'];  
		$gamewellfcipartnro = $row['gamewellfcipartnro'];  
		$silentknightpartnro = $row['silentknightpartnro'];  
		$notipartnumber = $row['notipartnumber'];  
		$fiplexdatasheet = $row['fiplexdatasheet'];

		
		$employee_arr[] = array("fiplexpartnro" => $fiplexpartnro,"honeywellnro" => $honeywellnro,"description" => $description, "price" => $price ,
		"idproduct" => $idproduct, "gamewellfcipartnro" => $gamewellfcipartnro, "silentknightpartnro" => $silentknightpartnro, "notipartnumber" => $notipartnumber, "fiplexdatasheet" => $fiplexdatasheet);

	
}

/* encoding array to JSON format */
echo(json_encode(["total"=>$idcantrow, "records"=>$employee_arr,"a"=>$rowperpage]));

