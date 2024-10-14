<?php
// Desactivar toda notificación de error
error_reporting(0);

include("db_conectflexbda.php");
header('Content-Type: application/json');

$dateFrom=$_POST['dateFrom'];
$dateTo=$_POST['dateTo'];

        $sql = $connect->prepare("select esdchanneldealer as company, count(*) as quantity, substring(esdchanneldealer,0,4)
        from
        (
          select idproject, max(idrev) as maxidrev from flexbdahoneywell  group by idproject
        ) as maxrevxproj
          inner join flexbdahoneywell
          on maxrevxproj.idproject	=	flexbdahoneywell.idproject and
          maxrevxproj.maxidrev		=	flexbdahoneywell.idrev
          inner join customers_userewbfas
          on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus
          where flexbdahoneywell.active = 'Y' and designtransition in('dtransition','etransition','nestimate') and datecreate BETWEEN '".$dateFrom."' AND '".$dateTo."'
          group by  esdchanneldealer
          order by esdchanneldealer");


    $sql->execute();
    $resultado = $sql->fetchAll();

    $notifier=0;
    $gamefare=0;
    $cbsi=0;
    $total3=0;

    session_start();
    $_SESSION['noti_proc'] = 0;
     $_SESSION['gw_proc'] = 0;
     $_SESSION['ho_proc'] = 0;
     $_SESSION['tot_proc'] = 0;

     foreach ($resultado as $row2) {
      


if ( $row2['substring']=="FAR" || $row2['substring']=="GAM") {
    
    $gamefare =  $gamefare + $row2['quantity'];  
}

if ( $row2['substring']=="HON") {
    
    $cbsi =  $cbsi + $row2['quantity'];  
}

if ( $row2['substring']=="NOT") {
    
    $notifier =  $notifier + $row2['quantity'];  
}

$total3= $total3 + $row2['quantity'];


                    
     }
     $_SESSION['noti_proc'] = $notifier;
     $_SESSION['gw_proc'] = $gamefare;
     $_SESSION['ho_proc'] = $cbsi;
     $_SESSION['tot_proc'] = $total3;

     $arr_idband[] = array(
             "notifier" => $notifier,
     "gamefare" => $gamefare,
     "cbsi" => $cbsi,
     "total3" => $total3
     
     );

     
 echo(json_encode(["arr_idband"=>$arr_idband]));

?>
