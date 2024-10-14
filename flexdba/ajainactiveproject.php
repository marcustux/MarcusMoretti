<?php
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

 $vv_vusu ="***";

 /*
 {
    //consulta si devolvio el Scan Device
        formData.append("v_iduu", v_iduu);
        formData.append("v_idcc", v_idcc);
        formData.append("v_idcc1", v_idcc1);
          formData.append("v_idcc2", v_idcc2);
        
*/
/*$v_iduu = $_REQUEST['v_iduu'];
$v_idcc = $_REQUEST['v_idcc'];
$v_idcc1 = $_REQUEST['v_idcc1'];
$v_idcc2 = $_REQUEST['v_idcc2'];*/

 $sanitized_n = filter_var($_REQUEST['v0'], FILTER_SANITIZE_STRING);
 if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
    $vvidproy = $_REQUEST['v0'];
 }

 $return_result_insert="error"; 
try {

     
            $sentenciahonwywell = $connect->prepare(" UPDATE flexbdahoneywell  SET active = 'N'	WHERE idproject = :idproject ");

            $sentenciahonwywell->bindParam(':idproject', $vvidproy);			
        $sentenciahonwywell->execute();   
   //     echo "HOLA". $vvidproy."-----cant:".$sentenciahonwywell->rowCount() ;
 
           if ( $sentenciahonwywell->rowCount() >=1)
           {
            $return_result_insert="ok";

            $vuserfas =		$_SESSION["flexbdab"];
            $vmenufas="FlexDBA:".array_pop(explode('/', $_SERVER['PHP_SELF']));
            $vaccionweb="Inactive PROJECT FlexDBA".$vvidproy;
            $vdescripaudit="ChangePass#".$_SERVER['SERVER_ADDR'] ;
            $vtextaudit="Inactive project #".$vvidproy;
    

            
            $sentenciach = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit);");
                            $sentenciach->bindParam(':userfas', $vuserfas);								
                            $sentenciach->bindParam(':menuweb', $vmenufas);
                            $sentenciach->bindParam(':actionweb', $vaccionweb);
                            $sentenciach->bindParam(':descripaudit', $vdescripaudit);
                            $sentenciach->bindParam(':textaudit', $vtextaudit);
                            $sentenciach->execute();
                            
                            

           }
     //       $return_result_insert="ok"; 
                             
               //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
            } 
            catch (PDOException $e) 
            {
                
            
                $msjerr= "Syntax Error MM: ".$e->getMessage();
                    
                
            }


echo(json_encode($return_result_insert));

?>