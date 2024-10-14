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


 $sanitized_n = filter_var($_REQUEST['v0'], FILTER_SANITIZE_STRING);
 if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
    $vvidproy = $_REQUEST['v0'];
 }
 $sanitized_n = filter_var($_REQUEST['v1'], FILTER_SANITIZE_STRING);
 if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
    $vvidproyrev= $_REQUEST['v1'];
 }
 $sanitized_n = filter_var($_REQUEST['v2'], FILTER_SANITIZE_STRING);
 if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
    $vvidproyorden = $_REQUEST['v2'];
 }

 
 $return_result_insert="error"; 
try {

     
            $sentenciahonwywell = $connect->prepare(" delete from  flexbdahoneywell_bugdet 	WHERE idproject = :idproject and idrev = :idrev and orderreport = :orderreport ");

            $sentenciahonwywell->bindParam(':idproject', $vvidproy);			
            $sentenciahonwywell->bindParam(':idrev', $vvidproyrev);			
            $sentenciahonwywell->bindParam(':orderreport', $vvidproyorden);			
          $sentenciahonwywell->execute();   
           if ( $sentenciahonwywell->rowCount() ==1)
           {
            $return_result_insert="ok";

            $vuserfas =		$_SESSION["flexbdab"];
            $vmenufas="FlexDBA:".array_pop(explode('/', $_SERVER['PHP_SELF']));
            $vaccionweb="Delete Item PROJECT FlexDBA".$vvidproy."-idrev". $vvidproyrev;
            $vdescripaudit="ChangePass#".$_SERVER['SERVER_ADDR'] ;
            $vtextaudit="Delete Item PROJECT FlexDBA".$vvidproy."-idrev". $vvidproyrev;
    

            
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