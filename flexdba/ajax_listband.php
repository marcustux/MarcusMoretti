<?php
// Desactivar toda notificación de error
error_reporting(0);

	include("db_conectflexbda.php"); 
	header('Content-Type: application/json');
    
    //LLidband
    if($_REQUEST['idb']=='700' || 
       $_REQUEST['idb']=='800' ||
       $_REQUEST['idb']=='UHF' || 
       $_REQUEST['idb']=='VHF' ||
       $_REQUEST['idb']=='UHF LOW' ||
       $_REQUEST['idb']=='TETRA LOW' ||
       $_REQUEST['idb']=='UHF HIGH' ||
       $_REQUEST['idb']=='UHF MID' ||
       $_REQUEST['idb']=='UNKNOW'){

        $idbusca = $_REQUEST['idb'];

        if ( $idbusca ==""){
            $sql = $connect->prepare("SELECT idband, description, fstartul, fstopul, fstartdl, fstopdl 	FROM flexbdahoneywell_idband where active = 'Y'");
        }else{
            $sql = $connect->prepare("SELECT idband, description, fstartul, fstopul, fstartdl, fstopdl 	FROM flexbdahoneywell_idband where description LIKE '%".$idbusca."%' and active = 'Y'");
        }
    }else{
        http_response_code(404);
        exit();
    }

  
    $sql->execute();
    $resultado = $sql->fetchAll();
     foreach ($resultado as $row2) {
        
         $arr_idband[] = array("idband" => $row2['idband'],
                                    "fstartul" => $row2['fstartul'],
                                    "fstopul" => $row2['fstopul'],
                                    "fstartdl" => $row2['fstartdl'],
                                    "fstopdl" => $row2['fstopdl'],
                                    "nombreband"=> $row2['description']
                                    );
     }



	

 echo(json_encode(["arr_idband"=>$arr_idband]));

?>
