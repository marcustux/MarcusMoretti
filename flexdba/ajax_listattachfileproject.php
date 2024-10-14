<?php
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}
    
// Desactivar toda notificación de error
error_reporting(0);

	include("db_conectflexbda.php"); 
	header('Content-Type: application/json');
    
    $vidseed = $_REQUEST['idtype'];
    $vidp = $_REQUEST['idp'];
    $vidpr = $_REQUEST['idpr'];
    $openattac = $_REQUEST['openattach'];
    if ( $openattac ==1)
    {
     $openattac="plans";
    }
    else
    {
     $openattac ="ahj";
    }

    ///"idtype="+vv_se++'&idp='+vv_idp+'&idpr='+vv_idprev+'&openattach='+iddivacontrolar,	

    
        $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$vidp." and idrev = ".$vidpr ." and seedtemp = '".$vidseed ."' and typefile ='". $openattac."' and active = 'Y'";
   //     echo $sqlproject;
        $msjnotdata = 0;
        $resultado = $connect->query($sqlproject)->fetchAll();	
  
     foreach ($resultado as $row2) {
        
         $arr_idband[] = array("idnroattach" => $row2['idnroattach'],
                                    "fileattach" => str_replace( $row2['seedtemp']."_"," ",$row2['fileattach'] )
                                    );
     }



	

 echo(json_encode(["attachlist"=>$arr_idband]));

?>
