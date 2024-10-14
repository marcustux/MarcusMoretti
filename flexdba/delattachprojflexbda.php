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
	
    session_start();
     $return_result_insert="noaction";

  ///v0=2&v1=1&v2=f92e80f0
     $vidpro = $_REQUEST['v0'];
  //   $vidrev = $_REQUEST['v1'];
     $vidfile = $_REQUEST['v2'];
     
	      
	
	try {

             
                    //$sentenciahonwywell = $connect->prepare("UPDATE flexbdahoneywell_attach SET  active='N' WHERE idproject=:idproject and idrev=:idrev and idnroattach=:idnroattach");
                    $sentenciahonwywell = $connect->prepare("UPDATE flexbdahoneywell_attach SET  active='N' WHERE idproject=:idproject and idnroattach=:idnroattach");
                    $sentenciahonwywell->bindParam(':idproject', $vidpro);
                    //$sentenciahonwywell->bindParam(':idrev', $vidrev);                
                $sentenciahonwywell->bindParam(':idnroattach', $vidfile);
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 

                $vuserfas = $_SESSION["flexbdab"];
                $vmenufas=array_pop(explode('/', $_SERVER['PHP_SELF']));
                $vaccionweb="Delete File FLEXBDA";
                $vdescripaudit="Inactive File FLEXBDA idfile:". $vidfile;	
                //$vtextaudit= "delete from flexbdahoneywell_attach -idp".$vidfile."-idprev:".$vidrev."-idfilerev:".$vidfile;
                $vtextaudit= "delete from flexbdahoneywell_attach -idp".$vidfile."-idfilerev:".$vidfile;
                
                $sentenciaudit = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit);");
                $sentenciaudit->bindParam(':userfas', $vuserfas);								
                $sentenciaudit->bindParam(':menuweb', $vmenufas);
                $sentenciaudit->bindParam(':actionweb', $vaccionweb);
                $sentenciaudit->bindParam(':descripaudit', $vdescripaudit);
                $sentenciaudit->bindParam(':textaudit', $vtextaudit);
                $sentenciaudit->execute();

                                     
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["ok"=>$return_result_insert,"statusText"=>$msjerr]));

?>
