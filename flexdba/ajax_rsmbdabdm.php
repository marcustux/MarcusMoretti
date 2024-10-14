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
    //$regexMail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regexMail_blacklist='/^[^\=\'{} \"<>\(\)]+$/';


if(preg_match($regexMail_blacklist, $_REQUEST['dealer']))
    {
    $v_esdchanneldealer = $_REQUEST['dealer'];



     if ($v_esdchanneldealer =="FARENHYT_ESD_ONLY")
     {
      $v_esdchanneldealer="GAMEWELL_FCI_FARENHYT_DUAL_ESD";
     }
     if ($v_esdchanneldealer =="GAMEWELL_FCI_ESD_ONLY")
     {
      $v_esdchanneldealer="GAMEWELL_FCI_FARENHYT_DUAL_ESD";
     }
      
        $sqlbuscapm = "SELECT * FROM customers_userewbfas where active in('Y','M') and profile = 'RSM' AND  esdchanneldealer='".$v_esdchanneldealer."' order by nameuserfull  ";
   //   echo  $sqlbuscapm;
        $msjnotdata = 0;
        $faltandatos="";
        $datapm = $connect->query($sqlbuscapm)->fetchAll();	
        foreach ($datapm as $row2) {	
            
            $arr_rsm[] = array("idusercus" => $row2['idusercus'],
            "nameuserfull" => $row2['nameuserfull']
      
            );      
        }

        if ($v_esdchanneldealer =="FARENHYT_ESD_ONLY")
        {
         $v_esdchanneldealer="GAMEWELL_FCI_FARENHYT_DUAL_ESD";
        }
        if ($v_esdchanneldealer =="HONEYWELL_BUILDING_SOLUTIONS")
        {
         $v_esdchanneldealer="NOTIFIER_ESD";
        }
        if ($v_esdchanneldealer =="GAMEWELL_FCI_ESD_ONLY")
        {
         $v_esdchanneldealer="GAMEWELL_FCI_FARENHYT_DUAL_ESD";
        }


        $sqlbuscapm = "SELECT * FROM customers_userewbfas where active in('Y','M') and profile = 'BDABDM'  order by nameuserfull  ";
        //   echo  $sqlbuscapm;
             $msjnotdata = 0;
             $faltandatos="";
             $datapm = $connect->query($sqlbuscapm)->fetchAll();	
             foreach ($datapm as $rowpm) {	
                 
                 $arr_BDABDM[] = array("idusercus" => $row2['idusercus'],
                 "nameuserfull" => $rowpm['nameuserfull']
           
                 );      
             }
            }
            else{
                $arr_rsm='Error RSM/BDA';
            }

	

 echo(json_encode(["arr_rsm"=>$arr_rsm, "arr_bdabdm"=>$arr_BDABDM]));

?>
