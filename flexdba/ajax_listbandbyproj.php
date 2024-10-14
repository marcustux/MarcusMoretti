<?php
// Desactivar toda notificación de error
error_reporting(0);

	include("db_conectflexbda.php"); 
	header('Content-Type: application/json');
    
    $regexNum = '/^[0-9]*$/';

    if(preg_match($regexNum, $_REQUEST['idp']) && ($_REQUEST['idr'] =="" || preg_match($regexNum, $_REQUEST['idr']))){
        $idp = $_REQUEST['idp'];
        $idr = $_REQUEST['idr'];

    
        if ( $idr ==""){

            $sql = $connect->prepare("SELECT * 	FROM flexbdahoneywell_band where idproject =  $idp and idrev = (select max(idrev) from flexbdahoneywell_band where idproject =  $idp ) ");
        
        }else{

            $sql = $connect->prepare("SELECT * 	FROM flexbdahoneywell_band where idproject =  $idp  and idrev =  $idr ");
        
        }
    }else{

        http_response_code(404);
        exit('error');
        
    }

  
    $sql->execute();
    $resultado = $sql->fetchAll();
     foreach ($resultado as $row2) {
      

        $porciones = explode("#",  $row2['nombbandtemp']);

         $arr_idband[] = array("idband" => $row2['idband'],
                                    "fstartul" => $row2['ulstart'],
                                    "fstopul" => $row2['ulstop'],
                                    "fstartdl" => $row2['dlstart'],
                                    "fstopdl" => $row2['dlstop'],
                                    "typeref" => $row2['typeref'],
                                    "ulch" => $row2['ulch'],
                                    "dlch" => $row2['dlch'],
                                    "nombreband"=>  $porciones[1],
                                    "simplex"=>  $row2['simpleconfig']
                                    );
     }



	

 echo(json_encode(["arr_idband"=>$arr_idband]));

?>
