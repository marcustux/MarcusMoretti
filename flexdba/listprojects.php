<?php
include('cabeceras.php');
add_header_seguridad();
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}


// Desactivar toda notificación de error
error_reporting(0);
// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);
include("db_conectflexbda.php");

 	session_start();




if(isset($_SESSION["timeoutflexbda"])){
  // Calcular el tiempo de vida de la sesión (TTL = Time To Live)

  $sessionTTL = time() - $_SESSION["timeoutflexbda"];

  //echo "***********************************************************************************hola".time()."session".$_SESSION["timeoutflexbda"]."--------". $sessionTTL."--inac". $inactividad ;
  if($sessionTTL > $inactividad){
      session_unset();
      session_destroy();
      header("Location: https://".$ipservidorapache.	$folderservidor."/index.php");
  }
if ($_SESSION["flexbdaa"] =="")
{
session_unset();
      session_destroy();
      header("Location: https://".$ipservidorapache.	$folderservidor."/index.php");
}

}
else
{
session_unset();
      session_destroy();
      header("Location: https://".$ipservidorapache.	$folderservidor."/index.php");

}

	$status = $connect->getAttribute(PDO::ATTR_CONNECTION_STATUS);

	if ($status !="Connection OK; waiting to send.")
	{

		header("Location: https://".$ipservidorapache."/".$folderservidor."/errorconect.php");
		exit();

	}

  $searchProcessed = $_REQUEST['searchProcessed'];
  $year = $_REQUEST['year'];

   if($searchProcessed==1){ 
    $searchProcessed=1;
   }else{
    $searchProcessed=0;
   }
  
  $filtroProcessed =" ";

  if($searchProcessed==0){
    $filtroProcessed=" ('P','D','W') ";
    $titleProjects='List of Projects in Process';
  }else
  {
    $filtroProcessed=" ('Y') ";
    $titleProjects='List of Processed Projects';
  }

  $filterYear='';

  if($year==2024){
    $filterYear=" AND flexbdahoneywell.datecreate  >= '2024-01-01 00:00:00'::TIMESTAMP "; 
  }

  if($year==2023){
    $filterYear=" AND (flexbdahoneywell.datecreate  >= '2023-01-01 00:00:00'::TIMESTAMP AND flexbdahoneywell.datecreate  <= '2024-01-01 00:00:00'::TIMESTAMP)"; 
  }

  if($year==2022){
    $filterYear=" AND (flexbdahoneywell.datecreate  >= '2022-01-01 00:00:00'::TIMESTAMP AND flexbdahoneywell.datecreate  <= '2023-01-01 00:00:00'::TIMESTAMP) "; 
  }

  if($year==2021){
    $filterYear=" AND flexbdahoneywell.datecreate  < '2022-01-01 00:00:00'::TIMESTAMP "; 
  }
	


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FLEXBDA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="css/sweetalert2.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">


  <link rel="stylesheet" href="css/dropzone.css" type="text/css">

  <style>
	body {
  background-image: url("fondositeflexbda2020.jpg");
  /*background-repeat: no-repeat, repeat;*/
  font-family: Arial;
    font-size: 13px;
}
  .tree
  {
      margin: 6px;
      margin-left: -35px;
  }

  .tree li {
      list-style-type:none;
      margin:0;
      padding:6px 5px 0 5px;
      position:relative
  }
  .tree li::before,
  .tree li::after {
      content:'';
      left:-20px;
      position:absolute;
      right:auto
  }
  .tree li::before {
      border-left:1px solid #000;
      bottom:50px;
      height:100%;
      top:0;
      width:1px
  }
  .tree li::after {
      border-top:1px solid #000;
      height:20px;
      top:25px;
      width:25px
  }

  .tree li span {
      -moz-border-radius:5px;
      -webkit-border-radius:5px;
      border:1px solid #000;
      border-radius:1px;
      display:inline-block;
      padding:1px 5px;
      text-decoration:none;
      cursor:pointer;
  }
  .tree>ul>li::before,
  .tree>ul>li::after {
      border:0
  }
  .tree li:last-child::before {
      height:27px
  }


  textarea.form-controlm {
        display: block;
      width: 100%;
      height: calc(2.25rem + 2px);
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      box-shadow: inset 0 0 0 transparent;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      height: 238px;
      font-size: 13px;

  }

  .btn-smm {
      display: inline-block;
      font-weight: 400;
      color: #212529;
      text-align: center;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-color: transparent;
      border: 1px solid transparent;
      padding: .375rem .75rem;
       font-size: 10px;
      line-height: 1.5;
      border-radius: .25rem;

  }


.tituloproject
{
  color:#095488;
    font-size: 14px;
    font-weight: bolder;
}

  .colorrojofont
  {
    color:#B6131F;

    font-weight: bolder;
  }


  .colorazultitulo
  {
    color:#B6131F;
    font-size: 20px;
    font-weight: bolder;
  }

  hr.borderojo
  {
    border: 1px solid #B6131F;
  }

  .fondogris
  {
    background-color: #F3F3F3;

  }

  .fondogris2
  {
    background-color: #F3F3F3;

  }


  .small-box {
    border-radius: .25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}


.form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}


.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    border-radius: 0rem;
    font-size: 1rem;
    line-height: 1.5;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.infoquickquote{
  font-size: 14;
  text-align: center; 
}
.btn-primary {
    color: #fff;
    background-color: #095488;
    border-color: #095488;
    box-shadow: none;
}

.btn-outline-primary {
    color: #095488;
    border-color: #095488;
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #095488;
    border-color: #095488;
}

.btn-outline-info {
  color: #000000;
  border-color: #095488;

}

.btn-outline-info:hover {
  color: #000000;
  border-color: #095488;
    background-color:#D1E9FA;
}

.btn-outline-danger {
  color: #000000;
  border-color: #095488;

}

.btn-outline-danger:hover {
  color: #ffffff;
  border-color: #095488;
    background-color:red;
}

.btn-info:hover {
  color: #000000;
  border-color: #095488;
}

.small-box {
    border-radius: 0rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}

.bg-azulhoneywell, .bg-azulhoneywell>a {
    color: #ffffff;
    background-color: #095488;
}


.bg-rojopopahoneywell, .bg-rojopopahoneywell>a {
    color: #ffffff;
    background-color: #B5131F;
}

.btn-danger{
  color: #ffffff;
  background-color: #B5131F;

}

.table-danger, .table-danger>td, .table-danger>th {
    background-color: #B5131F;
    color: #ffffff;
}

.btn-info{
  color: #000000;
  background-color: #D1E9FA;

}

.btn-info:hover {
    color: #000000;
    background-color: #D1E9FA;
    border-color: #D1E9FA;
}

.colorazulhoneywell{
    color: #095488;

}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: #095488;
}


.card-header {
    background-color: #095488;
    border-bottom: 1px solid rgba(0,0,0,.125);
    padding: .75rem 1.25rem;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #ffffff;
}

.card-title {
    float: left;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
    color: #ffffff;
}

.fondolightgray
{
  color: #000000;
  background-color: #9C9C9C;
}

[class*=sidebar-dark-] {
    background-color: #303030;
}

.content-wrapper {
    background: #F3F3F3;
}


.btn-xs {
    padding: .125rem .25rem;
    font-size: .75rem;
    line-height: 1.5;
    border-radius: .15rem;
}

.swal2-title {
    position: relative;
    max-width: 100%;
    margin: 0 0 .4em;
    padding: 0;
    color: #095488;;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    text-transform: none;
    word-wrap: break-word;
}

.swal2-styled.swal2-confirm {
    border: 0;
    border-radius: 0.25em;
    background: initial;
    background-color: #095488;
    color: #fff;
    font-size: 1.0625em;
}

.fondogris
{
  background-color: #e9ecef;
    opacity: 1;
}

.modal-lg {
    max-width: 60%;
}

.anchoboton {
    width: 100px !important;
    height:39px !important;
}

.anchodtp {
    width: 170px !important;
}

.botonAnio {
  height: 40px;
  width: 120px;
}


  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed" onload='verificarFormQuickQuote();'>
<form action="listprojects.php" method="post" class="form-horizontal" name="frmaa" id="frmaa">
<div class="wrapper">

<?php
 include("menuhoneywell.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 colorazulhoneywell">Projects</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">









          <?php
      if ( 	$_SESSION["flexbdag"]  == "cts")
      {
             ?>
               <!-- TEST -->
      <div class="row">
        <div class="container-fluid">
           
            <<!-- div class="card">
              <div class="card-header">
                <h5 class="card-title">List of Projects</h5> -->


              </div>
              <!-- /.card-header -->
              <div class="card-body">


      <!-- desde aqui       -->
      <?php
      }
      ?>














          <?php
      if ( 	$_SESSION["flexbdag"]  == "fiplexdev" ||  $_SESSION["flexbdag"]  == "ing")
      {
             ?>
               <!-- TEST -->
        <div class="row">
        <div class="container-fluid">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">

              <table class="table table-striped table-valign-middle">
        <thead class="thead-dark">
                  <tr>
                    <th>Category</th>
                    <th>Draft Projects</th>
                    <th>Pending for PM Projects</th>
                    <th>In Process Projects</th>
                    <th>Total Projects in Queue</th>
                    <th>Projects in Queue >3 days </th>
                    <th>Processed Projects</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th>New Estimates </th>
                    <?php
                  ///  nestimate
                ///  echo "HOLA:". $_SESSION["flexbdag"];

                      $cc_designtransition_draft = 0;
                      $cc_designtransition_Pend = 0;
                      $cc_designtransition_Pend_mas3dias = 0;
                      $cc_designtransition_work = 0;
                      $cc_designtransition_proccess = 0;

                      $cc_etransition_draft =  0;
                      $cc_etransition_Pend =  0;
                      $cc_etransition_work = 0;
                      $cc_etransition_proccess =  0;
                      $cc_etransition_Pend_mas3dias = 0;

                      $cc_nestimate_draft =  0;
                      $cc_nestimate_Pend =  0;
                      $cc_nestimaten_work = 0;
                      $cc_nestimate_proccess =  0;
                      $cc_nestimate_Pend_mas3dias = 0;

                     $sqlnotif="select designtransition, active, count(*) as cc
                      from
                      (
                        select idproject, max(idrev) as maxidrev from flexbdahoneywell  group by idproject
                      ) as maxrevxproj
                      inner join flexbdahoneywell
                      on maxrevxproj.idproject	=	flexbdahoneywell.idproject and
                         maxrevxproj.maxidrev		=	flexbdahoneywell.idrev
                      where active <> 'N' and designtransition in('dtransition','etransition','nestimate')
                      group by  designtransition, active
                      order by designtransition, active
                      ";
                      $datanotif = $connect->query($sqlnotif)->fetchAll();
                      foreach ($datanotif as $rownt)
                      {
                        if ( $rownt['designtransition']=="dtransition")
                        {
                          if ( $rownt['active']=="D") {  $cc_designtransition_draft =  $rownt['cc'];  }
                          if ( $rownt['active']=="P") {    $cc_designtransition_Pend =   $rownt['cc']; }
                          if ( $rownt['active']=="W") {     $cc_designtransition_work =  $rownt['cc']; }
                          if ( $rownt['active']=="Y") {    $cc_designtransition_proccess =  $rownt['cc']; }
                        }
                        if ( $rownt['designtransition']=="etransition")
                        {
                          if ( $rownt['active']=="D") {  $cc_etransition_draft =  $rownt['cc'];  }
                          if ( $rownt['active']=="P") {    $cc_etransition_Pend =   $rownt['cc']; }
                          if ( $rownt['active']=="W") {     $cc_etransition_work =  $rownt['cc']; }
                          if ( $rownt['active']=="Y") {    $cc_etransition_proccess =  $rownt['cc']; }
                        }
                        if ( $rownt['designtransition']=="nestimate")
                        {
                          if ( $rownt['active']=="D") {  $cc_nestimate_draft =  $rownt['cc'];  }
                          if ( $rownt['active']=="P") {    $cc_nestimate_Pend =   $rownt['cc']; }
                          if ( $rownt['active']=="W") {     $cc_nestimaten_work =  $rownt['cc']; }
                          if ( $rownt['active']=="Y") {    $cc_nestimate_proccess =  $rownt['cc']; }
                        }
                      }



                    ?>
                      <td align="center"><?php echo  $cc_nestimate_draft;  ?></td>
                    <td align="center"><?php echo  $cc_nestimate_Pend ;  ?></td>
                    <td align="center"><?php echo  $cc_nestimaten_work ;  ?></td>
                    <td align="center"><?php echo  $cc_nestimaten_work + $cc_nestimate_Pend ;  ?></td>
                    <td align="center"  style="color:RED"><?php

                    $sqlnestimate="
                    select count(*) as cant
                    FROM   (SELECT  idproject, Max(idrev) AS maxidrev FROM   flexbdahoneywell GROUP  BY idproject) AS maxrevxproj
                    INNER JOIN flexbdahoneywell  ON maxrevxproj.idproject = flexbdahoneywell.idproject AND maxrevxproj.maxidrev = flexbdahoneywell.idrev
                    where designtransition = 'nestimate' and active IN ( 'W', 'P' )
                    and Date_part('day', Now() - datecreate) >= 3
                    ";


                    $pendnewest = $connect->query($sqlnestimate)->fetchAll();
                    foreach ($pendnewest as $rownt)
                    {
                      $cc_nestimate_Pend_mas3dias = $rownt['cant'];
                      if ( $cc_nestimate_Pend_mas3dias > 0 ) { echo $cc_nestimate_Pend_mas3dias; } else { echo "<span style='color:black'>0</span>"; }
                    }
                    
                    ?></td>
                    <td align="center"><?php echo  $cc_nestimate_proccess;  ?></td>
                  </tr>
                  <tr>
                    <th>Estimate Transition </th>
                    <td align="center"><?php echo  $cc_etransition_draft;  ?></td>
                    <td align="center"><?php echo  $cc_etransition_Pend ;  ?></td>
                    <td align="center"><?php echo  $cc_etransition_work ;  ?></td>
                    <td align="center"><?php echo  $cc_etransition_Pend +  $cc_etransition_work ;  ?></td>
                    <td align="center"  style="color:RED"><?php
                     $sqlnetrans="
                     select count(*) as cant
                     FROM   (SELECT  idproject, Max(idrev) AS maxidrev FROM   flexbdahoneywell GROUP  BY idproject) AS maxrevxproj
                     INNER JOIN flexbdahoneywell  ON maxrevxproj.idproject = flexbdahoneywell.idproject AND maxrevxproj.maxidrev = flexbdahoneywell.idrev
                     where designtransition = 'etransition' and active IN ( 'W', 'P' )
                     and Date_part('day', Now() - datecreate) >= 3
                     ";

                     $pendetrans = $connect->query($sqlnetrans)->fetchAll();
                     foreach ($pendetrans as $rownt)
                     {
                       $cc_etrans_Pend_mas3dias = $rownt['cant'];
                       if ( $cc_etrans_Pend_mas3dias > 0 ) { echo $cc_etrans_Pend_mas3dias; } else { echo "<span style='color:black'>0</span>"; }
                     }

                    ?></td>
                    <td align="center"><?php echo  $cc_etransition_proccess;  ?></td>
                  </tr>
                  <tr>
                    <th>Design Transition </th>
                    <td align="center"><?php echo  $cc_designtransition_draft;  ?></td>
                    <td align="center"><?php echo  $cc_designtransition_Pend;  ?></td>
                    <td align="center"><?php echo   $cc_designtransition_work ;  ?></td>
                    <td align="center"><?php echo  $cc_designtransition_Pend + $cc_designtransition_work ;  ?></td>
                    <td align="center" style="color:RED"><?php

                    $sqlndtrans="
                     select count(*) as cant
                     FROM   (SELECT  idproject, Max(idrev) AS maxidrev FROM   flexbdahoneywell GROUP  BY idproject) AS maxrevxproj
                     INNER JOIN flexbdahoneywell  ON maxrevxproj.idproject = flexbdahoneywell.idproject AND maxrevxproj.maxidrev = flexbdahoneywell.idrev
                     where designtransition = 'dtransition' and active IN ( 'W', 'P' )
                     and Date_part('day', Now() - datecreate) >= 3
                     ";

                     $penddtrans = $connect->query($sqlndtrans)->fetchAll();
                     foreach ($penddtrans as $rownt)
                     {
                       $cc_dtrans_Pend_mas3dias = $rownt['cant'];
                       if ( $cc_dtrans_Pend_mas3dias > 0 ) { echo $cc_dtrans_Pend_mas3dias; } else { echo "<span style='color:black'>0</span>"; }
                     }

                    ?></td>
                    <td align="center"><?php echo  $cc_designtransition_proccess;  ?></td>
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->


            </div>
            </div>
            <!-- /.card -->
          </div>

        <!-- TEST FIN -->
            <?php } ?>


            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><?php echo $titleProjects ?></h5>


              </div>
              <!-- /.card-header -->
              <div class="card-body">


      <!-- desde aqui       -->
<?php
 if ( 	$_SESSION["flexbdad"]  == "manny.docampo@fiplex.com" || $_SESSION["flexbdad"]  == "alieni.hernandez@fiplex.com"){
  
  

  $sqlmas3= "select esdchanneldealer as company, count(*) as quantity, substring(esdchanneldealer,0,4)
  from
  (
    select idproject, max(idrev) as maxidrev from flexbdahoneywell  group by idproject
  ) as maxrevxproj
    inner join flexbdahoneywell
    on maxrevxproj.idproject	=	flexbdahoneywell.idproject and
    maxrevxproj.maxidrev		=	flexbdahoneywell.idrev
    inner join customers_userewbfas
    on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus
    where flexbdahoneywell.active = 'P' and Date_part('day', Now() - datecreate) > 3 and designtransition in('dtransition','etransition','nestimate')
    group by  esdchanneldealer
    order by esdchanneldealer";

    $datamas3 = $connect->query($sqlmas3)->fetchAll();
    $notifiermas3=0;
    $gamefaremas3=0;
    $cbsimas3=0;
    
    $_SESSION['noti_pend3m']=0;
    $_SESSION['gw_pend3m']=0;
    $_SESSION['ho_pend3m']=0;
    $_SESSION['tot_pend3m']=0;

    if(!empty($datamas3))
    {
      foreach ($datamas3 as $mas3)
      {
        if($mas3['substring']=='NOT'){
          $notifiermas3 = $notifiermas3+ $mas3['quantity'];
          
        }
        if($mas3['substring']=='GAM' || $mas3['substring']=='FAR'){
          $gamefaremas3 = $gamefaremas3 + $mas3['quantity'];
                }
        if($mas3['substring']=='HON'){
          $cbsimas3 = $cbsimas3 + $mas3['quantity'];
               }
          }
  
    }
    else
    {
      $notifiermas3=0;
      $gamefaremas3=0;
      $cbsimas3=0;

      $_SESSION['noti_pend3m']=0;
      $_SESSION['gw_pend3m']=0;
      $_SESSION['ho_pend3m']=0;
      $_SESSION['tot_pend3m']=0;
    }

      $_SESSION['noti_pend3m'] = $notifiermas3;
      $_SESSION['gw_pend3m'] = $gamefaremas3;
      $_SESSION['ho_pend3m']= $cbsimas3;
      $_SESSION['tot_pend3m']=$notifiermas3 + $gamefaremas3 + $cbsimas3;
    
    $sqlmenos3= "select esdchanneldealer as company, count(*) as quantity, substring(esdchanneldealer,0,4)
    from
    (
      select idproject, max(idrev) as maxidrev from flexbdahoneywell  group by idproject
    ) as maxrevxproj
      inner join flexbdahoneywell
      on maxrevxproj.idproject	=	flexbdahoneywell.idproject and
      maxrevxproj.maxidrev		=	flexbdahoneywell.idrev
      inner join customers_userewbfas
      on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus
      where flexbdahoneywell.active = 'P' and Date_part('day', Now() - datecreate) <= 3 and designtransition in('dtransition','etransition','nestimate')
      group by  esdchanneldealer
      order by esdchanneldealer";
 
      $datamenos3 = $connect->query($sqlmenos3)->fetchAll();
      
      $notifiermenos3=0;
      $gamefaremenos3=0;
      $cbsimenos3=0;
      
      
      if(!empty($datamenos3))
      {
        foreach ($datamenos3 as $menos3)
        {
          if($menos3['substring']=='NOT'){

            $notifiermenos3 = $notifiermenos3 + $menos3['quantity'];
            

          }

          if($menos3['substring']=='GAM' || $menos3['substring']=='FAR'){

            $gamefaremenos3 =  $gamefaremenos3 + $menos3['quantity']; 
                       
          }
          if($menos3['substring']=='HON'){
            $cbsimenos3 = $cbsimenos3 + $menos3['quantity'];
                    }
          
        }

     }
      else
      {
          $notifiermenos3=0;
          $gamefaremenos3=0;
          $cbsimenos3=0;

          $_SESSION['noti_pend3']=0;
          $_SESSION['gw_pend3']=0;
          $_SESSION['ho_pend3']=0;
          $_SESSION['tot_pend3']=0;
      }

      $_SESSION['noti_pend3']=$notifiermenos3;
      $_SESSION['gw_pend3'] = $gamefaremenos3;
      $_SESSION['ho_pend3']= $cbsimenos3;
      $_SESSION['tot_pend3']= $notifiermenos3 + $gamefaremenos3 + $cbsimenos3;
  
?>

<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal" onclick="carga_fechas_default_dtp()">
      Report
      </a>
      <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header d-block mt-10 pt-10">
                <h1 class="text-center">Report</h1>
            </div>
      
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  
                    <div class="contenedor-dtp d-flex justify-content-center col-12">

                      <div class="d-flex justify-content-center center form-group col-md-3">
                        <h4 class="mr-2 align-bottom">From</h4>
                        <input type='text' class="form-control form-control-sm anchodtp" name="dateFrom" data-format="yyyy-MM-dd" id='datetimepickerfrom' value="" />
                      </div>

                      <div class="d-flex justify-content-center form-group col-md-3">
                        <h4 class="mr-2">to</h4>
                        <input type='text' class="form-control form-control-sm anchodtp" name="dateTo" id='datetimepickerto'  />
                      </div>

                      <div class="d-flex justify-content-start col-md-3 ml-0 pl-0">
                          <button type="button" id="btnSearch" class="btn btn-primary anchoboton text-center" onclick="search_procesados()">Search</button>
                      </div>
                      
                      <p id="respuesta"></p>
    
                    </div>
                  
                <table class="table table-hover table-striped col-sm-9 mx-auto">
                    <thead class="thead-dark">
                      <tr>
                        <th class="text-center" id="categorias">Category</th>
                        <th class="text-center">NOTIFIER</th>
                        <th class="text-center">GW-FCI/Farenhyt</th>
                        <th class="text-center">CBSI</th>
                        <th class="text-center">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Processed</td>
                        <td class="text-center" id="notifierproc"></td>
                        <td class="text-center" id="gamefare"></td>
                        <td class="text-center" id="cbsi"></td>
                        <td class="text-center" id="total3"></td>
                      </tr>
                      <tr>
                        <td>Pending 3 days or less</td>
                        <td class="text-center"><?php if($notifiermenos3=='')echo $notifiermenos3=0;else echo $notifiermenos3;?></td>
                        <td class="text-center"><?php if($gamefaremenos3=='')echo $gamefaremenos3=0;else echo $gamefaremenos3;?></td>
                        <td class="text-center"><?php if($cbsimenos3=='')echo $cbsimenos3=0;else echo $cbsimenos3;?></td>
                        <td class="text-center"><?php echo $totalmenos3=intval($notifiermenos3)+intval($gamefaremenos3)+intval($cbsimenos3);?></td>
                      </tr>
                      
                      <tr>
                        <td>Pending more than 3 days</td>
                        <td class="text-center"><?php if($notifiermas3=='')echo $notifiermas3=0;else echo $notifiermas3;?></td>
                        <td class="text-center"><?php if($gamefaremas3=='')echo $gamefaremas3=0;else echo $gamefaremas3;?></td>
                        <td class="text-center"><?php if($cbsimas3=='')echo $cbsimas3=0;else echo $cbsimas3;?></td>
                        <td class="text-center"><?php echo $totalmas3=intval($notifiermas3)+intval($gamefaremas3)+intval($cbsimas3);?></td>
                      </tr>
                    </tbody>
                  </table>
            </div><!-- modal body -->

            <div class="modal-footer">

            <div class="download mt-15">
                         <a class="btn btn-outline-primary btn-xs align-center" href="excel_processed.php">
                  <i class="fas fa-cloud-download-alt"></i>
                    Download Excel
              </a>
            </div>
                    
            </div>
        </div><!-- row -->
              </div><!-- container -->
         </div>
        </div>
      </div> <!--modal--> 
      <!-- </form> -->
<?php
     }
     //include("consulta_popup.php");
?>

<!-- hasta -->

    <!-- </div>
  </div>
</div> -->



                <div class="">
<?php
if($searchProcessed!=0){?>
                <br>
                <div mx-auto>
                  <a class="btn btn-primary botonAnio" href="listprojects.php?searchProcessed=1&year=2024" role="button">2024</a>
                  <a class="btn btn-primary botonAnio" href="listprojects.php?searchProcessed=1&year=2023" role="button">2023</a>
                  <a class="btn btn-primary botonAnio" href="listprojects.php?searchProcessed=1&year=2022" role="button">2022</a>
                  <a class="btn btn-primary botonAnio" href="listprojects.php?searchProcessed=1&year=2021" role="button">UNTIL 2022</a>
                </div><br>
<?php }?>
                <table class="table table-striped projects" name="example1" id="example1">
                <br>




              <thead class="fondolightgray" >
                  <tr>
                      <th style="width: 9%">
                          Estimate #
                      </th>
                      <th style="width: 30%">
                          Project Name
                      </th>


                      <th>
                          Company name
                      </th>
                      <th>
                          Frequencies
                      </th>
                      <th >
                      Type of service
                      </th>
                      <th >
                      Approved Date
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th class="text-right" style="width: 25%">
                      Actions
                      </th>
                  </tr>
              </thead>
              <tbody>

              <?php
// Desactivar toda notificación de error
error_reporting(0);

include("db_conectflexbda.php");

if ( 	$_SESSION["flexbdag"]  == "fiplexdev")
{
              $sqlproject = "select flexbdahoneywell.* ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm ,customers.namecustomers, max(flexbdahoneywell_actions.datemodif) as ffechaprocss
              , customers_userewbfas.usermail as usermailesd, customers_userewbfas.username as usernameesd, customers_userewbfas.rsm as rsmmm , customers_userewbfas.nameuserfull as nameuserfull, customers_userewbfas.bdabdm as bdabdmmm, companynametemp
              from flexbdahoneywell
              left join flexbdahoneywell_actions
              on flexbdahoneywell_actions.idproject =  flexbdahoneywell.idproject and
                 flexbdahoneywell_actions.idrev =  flexbdahoneywell.idrev and
               flexbdahoneywell_actions.nameactions = 'Project in process.'
              left JOIN customers
             ON customers.idcustomers = flexbdahoneywell.idcustomers
             left JOIN customers_userewbfas
ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
              inner join
              (
                select  idproject , max(idrev) as maxidrev from flexbdahoneywell group by idproject
              ) as losmaxbyprj
              on losmaxbyprj.idproject =  flexbdahoneywell.idproject and
              losmaxbyprj.maxidrev =  flexbdahoneywell.idrev
              where flexbdahoneywell.active in ".$filtroProcessed." and projectname <> ''".$filterYear."
              group by flexbdahoneywell.idproject, flexbdahoneywell.idrev, flexbdahoneywell.idcustomers, flexbdahoneywell.bdadloutputpowervhf, flexbdahoneywell.bdadloutputpoweruhf, idusercustomers, datecreate, flexbdahoneywell.active, projectname, flexbdahoneywell.address, coordinateslat, coordinateslon, totalfloorsbuilding, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft, ocupancy, buildingduedate, installationduedate, designtransition,
              datecreatemm, namecustomers, customers_userewbfas.usermail,customers_userewbfas.username , customers_userewbfas.rsm, customers_userewbfas.nameuserfull, customers_userewbfas.bdabdm, companynametemp
              order by flexbdahoneywell.active,  datecreatemm desc ";
}
else
{

  if ( 	$_SESSION["flexbdag"]  == "cts")
{
  $sqlproject = "select flexbdahoneywell.* ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm ,customers.namecustomers, max(flexbdahoneywell_actions.datemodif) as ffechaprocss
  , customers_userewbfas.usermail as usermailesd, customers_userewbfas.username as usernameesd , customers_userewbfas.rsm as rsmmm , customers_userewbfas.nameuserfull as nameuserfull, customers_userewbfas.bdabdm as bdabdmmm, companynametemp
  from flexbdahoneywell
  left join flexbdahoneywell_actions
  on flexbdahoneywell_actions.idproject =  flexbdahoneywell.idproject and
     flexbdahoneywell_actions.idrev =  flexbdahoneywell.idrev and
	 flexbdahoneywell_actions.nameactions = 'Project in process.'
  left JOIN customers
ON customers.idcustomers = flexbdahoneywell.idcustomers
left JOIN customers_userewbfas
ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
  inner join
  (
    select  idproject , max(idrev) as maxidrev from flexbdahoneywell group by idproject
  ) as losmaxbyprj
  on losmaxbyprj.idproject =  flexbdahoneywell.idproject and
  losmaxbyprj.maxidrev =  flexbdahoneywell.idrev
  where flexbdahoneywell.active in ('Y') and projectname <> ''
  group by flexbdahoneywell.idproject, flexbdahoneywell.idrev, flexbdahoneywell.idcustomers, flexbdahoneywell.bdadloutputpowervhf, flexbdahoneywell.bdadloutputpoweruhf, idusercustomers, datecreate, flexbdahoneywell.active, projectname, flexbdahoneywell.address, coordinateslat, coordinateslon, totalfloorsbuilding, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft, ocupancy, buildingduedate, installationduedate, designtransition,
  datecreatemm, namecustomers, customers_userewbfas.usermail,customers_userewbfas.username , customers_userewbfas.rsm, customers_userewbfas.nameuserfull, customers_userewbfas.bdabdm, companynametemp
  order by flexbdahoneywell.active , datecreatemm desc ";
}

if ( 	$_SESSION["flexbdag"]  == "ing")
{
  $sqlproject = "select flexbdahoneywell.* ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm ,customers.namecustomers, max(flexbdahoneywell_actions.datemodif) as ffechaprocss
  , customers_userewbfas.usermail as usermailesd, customers_userewbfas.username as usernameesd , customers_userewbfas.rsm as rsmmm , customers_userewbfas.nameuserfull as nameuserfull, customers_userewbfas.bdabdm as bdabdmmm, companynametemp
  from flexbdahoneywell
  left join flexbdahoneywell_actions
  on flexbdahoneywell_actions.idproject =  flexbdahoneywell.idproject and
     flexbdahoneywell_actions.idrev =  flexbdahoneywell.idrev and
	 flexbdahoneywell_actions.nameactions = 'Project in process.'
  left JOIN customers
ON customers.idcustomers = flexbdahoneywell.idcustomers
left JOIN customers_userewbfas
ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
  inner join
  (
    select  idproject , max(idrev) as maxidrev from flexbdahoneywell group by idproject
  ) as losmaxbyprj
  on losmaxbyprj.idproject =  flexbdahoneywell.idproject and
  losmaxbyprj.maxidrev =  flexbdahoneywell.idrev
  where flexbdahoneywell.active in ".$filtroProcessed." and projectname <> ''".$filterYear."
  group by flexbdahoneywell.idproject, flexbdahoneywell.idrev, flexbdahoneywell.idcustomers, flexbdahoneywell.bdadloutputpowervhf, flexbdahoneywell.bdadloutputpoweruhf, idusercustomers, datecreate, flexbdahoneywell.active, projectname, flexbdahoneywell.address, coordinateslat, coordinateslon, totalfloorsbuilding, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft, ocupancy, buildingduedate, installationduedate, designtransition,
  datecreatemm, namecustomers, customers_userewbfas.usermail,customers_userewbfas.username , customers_userewbfas.rsm, customers_userewbfas.nameuserfull, customers_userewbfas.bdabdm, companynametemp
  order by flexbdahoneywell.active , datecreatemm desc ";
}
if ( 	$_SESSION["flexbdag"]  == "RSM")
{
 // echo "HI RSM". $_SESSION["flexbdad"];
  $sqlproject = "select flexbdahoneywell.* ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm ,customers.namecustomers, max(flexbdahoneywell_actions.datemodif) as ffechaprocss
  , customers_userewbfas.usermail as usermailesd, customers_userewbfas.username as usernameesd , customers_userewbfas.rsm as rsmmm , customers_userewbfas.nameuserfull as nameuserfull, customers_userewbfas.bdabdm as bdabdmmm, companynametemp
  from flexbdahoneywell
  left join flexbdahoneywell_actions
  on flexbdahoneywell_actions.idproject =  flexbdahoneywell.idproject and
     flexbdahoneywell_actions.idrev =  flexbdahoneywell.idrev and
	 flexbdahoneywell_actions.nameactions = 'Project in process.'
  left JOIN customers
ON customers.idcustomers = flexbdahoneywell.idcustomers
left JOIN customers_userewbfas
ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
  inner join
  (
    select  idproject , max(idrev) as maxidrev from flexbdahoneywell group by idproject
  ) as losmaxbyprj
  on losmaxbyprj.idproject =  flexbdahoneywell.idproject and
  losmaxbyprj.maxidrev =  flexbdahoneywell.idrev
  where flexbdahoneywell.active in ".$filtroProcessed." and projectname <> ''".$filterYear."
  and flexbdahoneywell.idusercustomers in (select idusercus from customers_userewbfas where active = 'Y' and rsm = '".strtolower($_SESSION["flexbdad"])."' )
  group by flexbdahoneywell.idproject, flexbdahoneywell.idrev, flexbdahoneywell.idcustomers, flexbdahoneywell.bdadloutputpowervhf, flexbdahoneywell.bdadloutputpoweruhf, idusercustomers, datecreate, flexbdahoneywell.active, projectname, flexbdahoneywell.address, coordinateslat, coordinateslon, totalfloorsbuilding, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft, ocupancy, buildingduedate, installationduedate, designtransition,
  datecreatemm, namecustomers, customers_userewbfas.usermail,customers_userewbfas.username , customers_userewbfas.rsm, customers_userewbfas.nameuserfull, customers_userewbfas.bdabdm, companynametemp
    order by flexbdahoneywell.active, datecreatemm desc ";
}
if ( 	$_SESSION["flexbdag"]  == "BDABDM")
{
 // echo "HI BDABDM". $_SESSION["flexbdad"];
  $sqlproject = "select flexbdahoneywell.* ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm ,customers.namecustomers, max(flexbdahoneywell_actions.datemodif) as ffechaprocss
  , customers_userewbfas.usermail as usermailesd, customers_userewbfas.username as usernameesd , customers_userewbfas.rsm as rsmmm , customers_userewbfas.nameuserfull as nameuserfull, customers_userewbfas.bdabdm as bdabdmmm, companynametemp
  from flexbdahoneywell
  left join flexbdahoneywell_actions
  on flexbdahoneywell_actions.idproject =  flexbdahoneywell.idproject and
     flexbdahoneywell_actions.idrev =  flexbdahoneywell.idrev and
	 flexbdahoneywell_actions.nameactions = 'Project in process.'
  left JOIN customers
ON customers.idcustomers = flexbdahoneywell.idcustomers
left JOIN customers_userewbfas
ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
  inner join
  (
    select  idproject , max(idrev) as maxidrev from flexbdahoneywell group by idproject
  ) as losmaxbyprj
  on losmaxbyprj.idproject =  flexbdahoneywell.idproject and
  losmaxbyprj.maxidrev =  flexbdahoneywell.idrev
  where flexbdahoneywell.active in ".$filtroProcessed." and projectname <> ''".$filterYear."
  and flexbdahoneywell.idusercustomers in (select idusercus from customers_userewbfas where active = 'Y' and bdabdm = '".strtolower($_SESSION["flexbdad"])."' )
  group by flexbdahoneywell.idproject, flexbdahoneywell.idrev, flexbdahoneywell.idcustomers, flexbdahoneywell.bdadloutputpowervhf, flexbdahoneywell.bdadloutputpoweruhf, idusercustomers, datecreate, flexbdahoneywell.active, projectname, flexbdahoneywell.address, coordinateslat, coordinateslon, totalfloorsbuilding, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft, ocupancy, buildingduedate, installationduedate, designtransition,
  datecreatemm, namecustomers, customers_userewbfas.usermail,customers_userewbfas.username , customers_userewbfas.rsm, customers_userewbfas.nameuserfull, customers_userewbfas.bdabdm, companynametemp
    order by flexbdahoneywell.active, datecreatemm desc ";
}

if ( 	$_SESSION["flexbdag"]  == "basic")
{
  $sqlproject = "select flexbdahoneywell.* ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm ,customers.namecustomers, max(flexbdahoneywell_actions.datemodif) as ffechaprocss
  , customers_userewbfas.usermail as usermailesd, customers_userewbfas.username as usernameesd , customers_userewbfas.rsm as rsmmm , customers_userewbfas.nameuserfull as nameuserfull, customers_userewbfas.bdabdm as bdabdmmm, companynametemp
  from flexbdahoneywell
  left join flexbdahoneywell_actions
  on flexbdahoneywell_actions.idproject =  flexbdahoneywell.idproject and
     flexbdahoneywell_actions.idrev =  flexbdahoneywell.idrev and
	 flexbdahoneywell_actions.nameactions = 'Project in process.'
  left JOIN customers
ON customers.idcustomers = flexbdahoneywell.idcustomers
left JOIN customers_userewbfas
ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
  inner join
  (
    select  idproject , max(idrev) as maxidrev from flexbdahoneywell group by idproject
  ) as losmaxbyprj
  on losmaxbyprj.idproject =  flexbdahoneywell.idproject and
  losmaxbyprj.maxidrev =  flexbdahoneywell.idrev
  where flexbdahoneywell.active in ('Y','P','D','W') and projectname <> '' and flexbdahoneywell.idusercustomers = ".$_SESSION["flexbdaa"]."
  group by flexbdahoneywell.idproject, flexbdahoneywell.idrev, flexbdahoneywell.idcustomers, flexbdahoneywell.bdadloutputpowervhf, flexbdahoneywell.bdadloutputpoweruhf, idusercustomers, datecreate, flexbdahoneywell.active, projectname, flexbdahoneywell.address, coordinateslat, coordinateslon, totalfloorsbuilding, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft, ocupancy, buildingduedate, installationduedate, designtransition,
  datecreatemm, namecustomers, customers_userewbfas.usermail,customers_userewbfas.username , customers_userewbfas.rsm, customers_userewbfas.nameuserfull, customers_userewbfas.bdabdm, companynametemp
    order by flexbdahoneywell.active, datecreatemm desc ";
}
//echo  $sqlproject;
}
              $msjnotdata = 0;
              $data = $connect->query($sqlproject)->fetchAll();

              //obtiene todas las bandas para todos los proyectos
              $dataBand = $connect->query("
              SELECT   idproject, idrev, string_agg( bands.description , ', ' order BY bands.idband) AS bands
              FROM     (
                                      SELECT DISTINCT band.idband,
                                                      id_band.description ,
                                                      band.idproject,
                                                      band.idrev
                                      FROM            flexbdahoneywell_band band
                                      INNER JOIN      flexbdahoneywell_idband id_band
                                      ON              band.idband = id_band.idband
                                      ORDER BY        band.idband ) bands
              GROUP BY idproject, idrev
              ")->fetchAll();

              foreach ($data as $row) {
                $msjnotdata = 1;
                ?>
                   <tr>
                      <td>
                          <?php  echo  str_pad(  $row['idproject'] , 4, "0", STR_PAD_LEFT); ?>
                      </td>
                      <td>
                          <a>
                        <span class="tituloproject">  <b><?php echo $row['projectname']." - Rev [".$row['idrev']."]";?></b></span>
                          </a>
                          <br/>

                              Created        <?php echo $row['datecreatemm']."<br><b>ESD: ". $row['usernameesd']." [". $row['usermailesd']."] </b><br>  <b>RSM: ".$row['rsmmm']."<br>BDABDM: ".$row['bdabdmmm']." </b>";?> -

                      </td>

                      <td class="project_progress">
                          <div class="d-none">
                                F<?php  echo  str_pad(  $row['idproject'] , 4, "0", STR_PAD_LEFT); ?>
                          </div>
                      <?php
                              echo $row['companynametemp'];

                      ?>
                      </td>
                      <td class="project_progress">
                      <?php
                              // busco la banda para el proyecto y rev del row 
                              foreach ($dataBand as $rowBand) 
                              {
                                if( $row['idproject']  == $rowBand['idproject'] && $row['idrev']  == $rowBand['idrev'] ) { echo $rowBand['bands']; }
                              }

                      ?>
                      </td>

                      <td class="project_progress">
                      <?php
                           //   echo $row['designtransition'];

                              if( $row['designtransition']  =="etransition") { echo "Estimate Trasition "; }
                              if( $row['designtransition']  =="dtransition") { echo "Design Transition"; }
                              if( $row['designtransition']  =="nestimate") { echo "New Estimate"; }
                              if( $row['designtransition']  =="quickquote") { echo "Quick Quote"; }


                      ?>
                      </td>
                      <td class="project_progress">
                      <?php  if ( $row['active']=="Y")
                        {
                              echo substr($row['ffechaprocss'],0,16);
                        }
                      ?>
                      </td>
                      <td class="project-state">
                      <?php
                  //    echo $row['active'];
                      if ( $row['active']=="P")
                        {
                          ?>  <span class="badge badge-warning">Pending for PM </span>
                          <?php
                        }
                        if ( $row['active']=="Y")
                        {
                          ?>  <span class="badge badge-success">Processed</span>
                          <?php
                        }
                        if ( $row['active']=="D")
                        {
                          ?>  <span class="badge badge-warning">Draft</span>
                          <?php
                        }
                        if ( $row['active']=="W")
                        {
                          ?>  <span class="badge badge-info">In process</span>
                          <?php
                        }

                      ?>

                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-outline-primary btn-xs" href="createtksuppormm.php?idtoke=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>&st=NOR">
                              <i class="fas fa-question-circle">
                              </i>
                             Request Support
                          </a>&nbsp;

                      <?php
                      if ( 	 $_SESSION["flexbdag"]  == "fiplexdev222"  )
                      {
                      ?>

                      <a class="btn btn-outline-primary btn-xs" href="createtksuppormm.php?idtoke=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>&st=NOR">
                              <i class="fas fa-question-circle">
                              </i>
                             Request Support
                          </a>&nbsp;

                      <?php
                      }
                        if ( $row['active'] =="P" && 	$_SESSION["flexbdag"]  <> "ing" && $_SESSION["flexbdag"]  <> "fiplexdev"  )
                        {
                      ?>
                        <a class="btn btn-outline-primary btn-xs" href="listprojectsreport.php?idtoke=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>&st=NOR" target='_blank'>
                              <i class="fas fa-folder">
                              </i>
                              Report not aproved
                          </a>&nbsp;
                          <?php
                       }
                      if ( $row['active'] =="Y")
                        {
                          if($entornoActual=="TST"){
                            $row['nameuserfull']="TI";
                          }
                         
                          $fileNamepdf = "Estimate_F". str_pad(  $row['idproject'] , 4, "0", STR_PAD_LEFT)."rev".$row['idrev']."-".str_replace("'","",str_replace("&","",$row['projectname']))."-".str_replace("&","",str_replace("'","",$row['nameuserfull']))."-approved.csv" ;
                          $filenamepdfnueva =preg_replace('/\s+/', '_', $fileNamepdf);
                          
                          $patchcsv="./csvattach/".$filenamepdfnueva;
                          //echo $patchcsv;
                      ?>
                        <a class="btn btn-outline-primary btn-xs" href="listprojectsreport.php?idtoke=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>&st=NAP" target='_blank'>
                              <i class="fas fa-folder">
                              </i>
                              Report
                        </a>&nbsp;
                          
                          <?php
                          if($entornoActual=="TST")
                          {
                            ?>
                            <a class="btn btn-outline-primary btn-xs" href="https://www.flexbda.com/testing/viewprojpdf.php?activate=6546543213&idp=<?php echo $row['idproject']; ?>&destran=<?php echo $row['designtransition']?>&idcc=&natt=wiew" target='_blank'>
                            <i class="fas fa-folder"></i>
                            PDF  <i class='fas fa-download'></i></a>
                            </a>&nbsp;

                            <a class="btn btn-outline-primary btn-xs" href="<?php echo $patchcsv ?>">
                                                                <i class="fas fa-folder"></i>
                                CSV  <i class='fas fa-download'></i></a>
                                </a>&nbsp;
                    <?php } 
                        
                          if($entornoActual=="PRD")
                          {
                            ?>
                                <a class="btn btn-outline-primary btn-xs" href="https://www.flexbda.com/viewprojpdf.php?activate=6546543213&idp=<?php echo $row['idproject']; ?>&destran=<?php echo $row['designtransition']?>&idcc=&natt=wiew" target='_blank'>
                                <i class="fas fa-folder"></i>
                                PDF  <i class='fas fa-download'></i></a>
                                </a>&nbsp;
                                <?php 

                                //if($_SESSION['flexesdchandeal']=='FIPLEX_SI')
                                //{
                                  ?>
                                  <a class="btn btn-outline-primary btn-xs" href="<?php echo $patchcsv ?>">
                                                                <i class="fas fa-folder"></i>
                                  CSV  <i class='fas fa-download'></i></a>
                                </a>&nbsp;
                                
                                <?php   
                                //}
                        
                          }

                          if($entornoActual=="DEV")
                          {

                            ?>
                                <a class="btn btn-outline-primary btn-xs" href="viewprojpdf.php?activate=6546543213&idp=<?php echo $row['idproject']; ?>&destran=<?php echo $row['designtransition']?>&idcc=&natt=wiew" target='_blank'>
                                <i class="fas fa-folder"></i>
                                PDF  <i class='fas fa-download'></i></a>
                                </a>&nbsp;


                                <!-- <a class="btn btn-outline-primary btn-xs" href="downloadcsv.php?idpr=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>" target='_blank'> -->
                                <a class="btn btn-outline-primary btn-xs" href="<?php echo $patchcsv ?>">
                                                                <i class="fas fa-folder"></i>
                                CSV  <i class='fas fa-download'></i></a>
                                </a>&nbsp;
                        <?php 
                        
                          }
                          
                       }

                      if ( $row['active'] <>"D")
                        {
///echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$_SESSION["flexbdag"];
                          if (	$_SESSION["flexbdag"]  == "ing" || $_SESSION["flexbdag"]  == "fiplexdev" )
                          {

                            if ( $row['active'] <>"Y")
                            {
                      ?>

                          <a class="btn btn-outline-primary btn-xs" href="listprojectsreport.php?idtoke=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>&st=NAP" target='_blank'>
                              <i class="fas fa-tools">
                              </i>
                              To process
                          </a>&nbsp;

                          <?php
                            }
                          }


                          ?>

                          <a class="btn btn-outline-primary btn-xs" href="listprojectsdetails.php?idtoke=<?php echo  $row['idproject']."&idr=".$row['idrev']; ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>&nbsp;

                          <?php }
                           if (	$_SESSION["flexbdag"]  == "fiplexdev" || ( $row['active']=="D" && $_SESSION["flexbdag"]  == "basic" ) )
                           {
                            ?>

                          <a class="btn btn-outline-danger btn-xs" href="#" onclick="deleteame_proy('<?php echo $row['idproject'];  ?>','<?php echo $row['projectname'];  ?>')">
                              <i class="fas fa-trash">
                              </i>
                              Inactive
                          </a>
                           <?php } ?>
                      </td>
                  </tr>
                <?php

              }
              if (  $msjnotdata == 0)
              {
                  ?>
                  <tr>
                    <td colspan="7" class="table-danger">
                    Client without registered projects
                    </td>
                  </tr>
                  <?php
              }


              ?>



              </tbody>
          </table>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
          <!-- Small boxes (Stat box) -->
          <?php
              $dejarvisita = "";
           //   echo "aaaaaaaaaaaaaaaaaaaaaaaaaa:".$_SESSION["flexbdag"].":";

              if (	$_SESSION["flexbdag"] <> "basic" && $_SESSION["flexbdag"] <> "fiplexdev" && $_SESSION["flexbdag"] <> "RSM" && $_SESSION["flexbdag"] <> "BDABDM" )
              {
                $dejarvisita = " d-none ";
              }
              ?>

          <div class="row">
          <div class="col-md-12 <?php echo $dejarvisita; ?>">
            <div class="card ">
              <div class="card-header">

                <h5 class="card-title">Create NEW Project</h5>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

                    <!-- inicio form add -->


                    <div class="card-body">

                    <?php
$havedraft =0;
$sqlproject = "select * ,  to_char(datecreate,'YYYY/MM/DD HH24:mm') as datecreatemm
  FROM public.flexbdahoneywell    where active in ('D') and idusercustomers = ".	$_SESSION["flexbdaa"];
$msjnotdata = 0;
$data = $connect->query($sqlproject)->fetchAll();
foreach ($data as $rowheaders)
{
  $havedraft =1;
  $projectdraft = $rowheaders['idproject'];
  $projectdraftrev = $rowheaders['idrev'];
  $psswdtkkey  = $rowheaders['seeddraft'];

      $vprojectname = $rowheaders['projectname'];
      $vaddress = $rowheaders['address'];
      $vcoordinateslat = $rowheaders['coordinateslat'];
      $vidcustomers = $rowheaders['idcustomers'];
      $vidusercustomers = $rowheaders['idusercustomers'];

      // $vtxtfloortype1count = $rowheaders['floortype1count'];
      // $vtxtfloortype1countavg = $rowheaders['floortype1countavg'];
      // $vtxtfloortype1count333 =1;
      // $vtxtfloortype2count = $rowheaders['floortype2count'];
      // if ($vtxtfloortype2count <> "")
      // {
      //   $vtxtfloortype1count333 =2;
      // }
      // $vtxtfloortype2countavg = $rowheaders['floortype2countavg'];

      $vtxttotalnumberofloors = $rowheaders['totalfloorsbuilding'];
      $vtxttotalsquarefoot = $rowheaders['floortype1countavg'] * $rowheaders['totalfloorsbuilding'];
      $vtxtfloorscoverage = $rowheaders['floortype1count'];

      $vdatecreate = $rowheaders['datecreate'];
      $vcoordinateslon = $rowheaders['coordinateslon'];
      $vavgfloorheight = $rowheaders['avgfloorheight'];
      $vrfenvironment = $rowheaders['rfenvironment'];



      $vcoverageneeded = $rowheaders['coverageneeded'];
      $vnumberchannelsxband = $rowheaders['numberchannelsxband'];
      $vsimplexconfig = $rowheaders['simplexconfig'];

      $vtxtdonorrssi = $rowheaders['covreg_donorrssi'];
      $vtxtmindlcoverage = $rowheaders['covreg_mindlcoverage'];
      $vtxtminulcoverage = $rowheaders['covreg_minulcoverage'];
      $vtxtdesignmargin = $rowheaders['covreg_designmargin'];
      $vtxtindoorantrad = $rowheaders['covreg_indoorantrad'];
      $vtxtmobtxpower =  $rowheaders['covreg_mobtxpower'];
      $vtxtdistdonorsite = $rowheaders['covreg_distdonorsite'];
      $vtxtdonorantgain = $rowheaders['covreg_donorantgain'];
      $txtindoorantgain = $rowheaders['covreg_indoorantgain'];
      $vtxtdonorcoaxloss = $rowheaders['covreg_donorcoaxloss'];
      $vtxtindoorcoaxloss = $rowheaders['covreg_indoorcoaxloss'];



      $vbda_floordba = $rowheaders['bda_floordba'];
      $vbda_filter = $rowheaders['bda_filter'];

      $vtxtbdadloutputpowervhf = $rowheaders['bdadloutputpowervhf'];
      $vtxtbdadloutputpoweruhf = $rowheaders['bdadloutputpoweruhf'];

      $vdba_powerreq = $rowheaders['dba_powerreq'];

      $vvbbu_req = $rowheaders['bbu_req'];
      $valarm_brand = $rowheaders['alarm_brand'];
      $valarm_install_facp = $rowheaders['alarm_install_facp'];
      $valarm_req_annuciator = $rowheaders['alarm_req_annuciator'];
      if($valarm_req_annuciator =="YES") { 
        $valarm_req_annuciator= "YES - With dry contacts to feed the FACP"; 
      }
      $vdr_requierd = $rowheaders['dr_requierd'];
      $vdr_ahjpackage = $rowheaders['dr_ahjpackage'];
      $vdr_instalationtype = $rowheaders['dr_instalationtype'];
      $vdr_mat_extwall = $rowheaders['dr_mat_extwall'];
      if ("undefined"== $vdr_mat_extwall)
      {
        $vdr_mat_extwall="";
      }
      $vdr_mat_intwall = $rowheaders['dr_mat_intwall'];
      if ("undefined"== $vdr_mat_intwall)
      {
        $vdr_mat_intwall="";
      }

      $vdr_mat_glasstype = $rowheaders['dr_mat_glasstype'];
      if ("undefined"== $vdr_mat_glasstype)
      {
        $vdr_mat_glasstype="";
      }
      $vdr_mat_rooftype = $rowheaders['dr_mat_rooftype'];
      if ("undefined"== $vdr_mat_rooftype)
      {
        $vdr_mat_rooftype="";
      }
      $vdr_firecontrolroomloc = $rowheaders['dr_firecontrolroomloc'];
      if ("undefined"== $vdr_firecontrolroomloc)
      {
        $vdr_firecontrolroomloc="";
      }
      $vdr_bdaeqlocation = $rowheaders['dr_bdaeqlocation'];
      if ("undefined"== $vdr_bdaeqlocation)
      {
        $vdr_bdaeqlocation="";
      }
      $vdr_verticalriserloc = $rowheaders['dr_verticalriserloc'];
      if ("undefined"== $vdr_verticalriserloc)
      {
        $vdr_verticalriserloc="";
      }
      $vdr_donorantloc = $rowheaders['dr_donorantloc'];
      if ("undefined"== $vdr_donorantloc)
      {
        $vdr_donorantloc="";
      }
      $vdr_special = $rowheaders['dr_special'];

      $vdesigntransition = $rowheaders['designtransition'];

      $vtxtocupancyfield = $rowheaders['ocupancy'];
      $v_buildingduedate = str_replace("-","/",substr ($rowheaders['buildingduedate'],0,10));
      $v_installationduedate = str_replace("-","/",substr ($rowheaders['installationduedate'],0,10));


}
if($havedraft ==0)
{
  $query_listaproj ="select  coalesce( max(idproject),0) + 1 as sss from flexbdahoneywell ";

  $data = $connect->query($query_listaproj)->fetchAll();
    foreach ($data as $rowresult) {
              $v_idmaxidproject = $rowresult['sss'];
              $projectdraft = $rowresult['sss'];
              $projectdraftrev = 1;

    }
    $idcustomuser = 	$_SESSION["flexbdaa"];
    $idcustom=		$_SESSION["flexbdai"] ;
    $psswdtkkey = substr( md5(microtime()), 1, 8);

    $sentenciahonwywell = $connect->prepare("INSERT INTO public.flexbdahoneywell( idproject, idrev, idcustomers, idusercustomers, datecreate, active, projectname, address, coordinateslat, coordinateslon, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft) VALUES (:idmaxidproject, (select coalesce( max(idrev),0) +1 from flexbdahoneywell where idproject = :idmaxidproject),:idcustomers, :idusercustomers, now(), 'D', :projectname, :address, :coordinateslat, :coordinateslon, :floortype1count, :floortype1countavg, :floortype2count, :floortype2countavg, :avgfloorheight,:rfenvironment, :coverageneeded, :numberchannelsxband, :simplexconfig, :covreg_donorrssi, :covreg_mindlcoverage, :covreg_minulcoverage, :covreg_designmargin, :covreg_indoorantrad, :covreg_mobtxpower, :covreg_distdonorsite, :covreg_donorantgain, :covreg_indoorantgain, :covreg_donorcoaxloss, :covreg_indoorcoaxloss, :bda_floordba, :bda_filter, :dba_powerreq, :bbu_req, :alarm_brand, :alarm_install_facp, :alarm_req_annuciator, :dr_requierd, :dr_ahjpackage, :dr_instalationtype, :dr_mat_extwall, :dr_mat_intwall, :dr_mat_glasstype, :dr_mat_rooftype, :dr_firecontrolroomloc, :dr_bdaeqlocation, :dr_verticalriserloc, :dr_donorantloc, :dr_special, :seeddraft);");
     //  echo "aaaaaaaaaaaaaaaaaaaaaaa". $v_idmaxidproject;

    $sentenciahonwywell->bindParam(':idmaxidproject', $v_idmaxidproject);

     $sentenciahonwywell->bindParam(':projectname', $v_txtnomprojdb);
    $sentenciahonwywell->bindParam(':address', $v_txtaddressbuild);
    $sentenciahonwywell->bindParam(':coordinateslat', $v_txtcoordinateslat);
    $sentenciahonwywell->bindParam(':idcustomers', $idcustom);
    $sentenciahonwywell->bindParam(':idusercustomers', $idcustomuser);
    $sentenciahonwywell->bindParam(':coordinateslon', $v_txtcoordinateslon);

    $sentenciahonwywell->bindParam(':floortype1count', $v_txtsfcoverga);
    $sentenciahonwywell->bindParam(':floortype1countavg', $v_txtsfcoverga);
    $sentenciahonwywell->bindParam(':floortype2count', $v_txtsfcoverga);
    $sentenciahonwywell->bindParam(':floortype2countavg', $v_txtsfcoverga);
    $sentenciahonwywell->bindParam(':avgfloorheight', $v_txtsfcoverga);
    $sentenciahonwywell->bindParam(':rfenvironment', $v_txtsfcoverga);

   $sentenciahonwywell->bindParam(':coverageneeded', $v_txtneededcoverage);
    $sentenciahonwywell->bindParam(':numberchannelsxband', $v_numbchxband);
    $sentenciahonwywell->bindParam(':simplexconfig', $v_txtsimpleconfig);


    $sentenciahonwywell->bindParam(':covreg_donorrssi', $vtxtdonorrssi);
    $sentenciahonwywell->bindParam(':covreg_mindlcoverage', $vtxtmindlcoverage);
    $sentenciahonwywell->bindParam(':covreg_minulcoverage', $vtxtminulcoverage);
    $sentenciahonwywell->bindParam(':covreg_designmargin', $vtxtdesignmargin);
    $sentenciahonwywell->bindParam(':covreg_indoorantrad', $vtxtindoorantrad);
    $sentenciahonwywell->bindParam(':covreg_mobtxpower', $vtxtmobtxpower);
    $sentenciahonwywell->bindParam(':covreg_distdonorsite', $vtxtdistdonorsite);

    $sentenciahonwywell->bindParam(':covreg_donorantgain', $vtxtdonorantgain);
    $sentenciahonwywell->bindParam(':covreg_indoorantgain', $txtindoorantgain);
    $sentenciahonwywell->bindParam(':covreg_donorcoaxloss', $vtxtdonorcoaxloss);
    $sentenciahonwywell->bindParam(':covreg_indoorcoaxloss', $vtxtindoorcoaxloss);


    $sentenciahonwywell->bindParam(':bda_floordba', $v_txtflorbdalocate);

    $sentenciahonwywell->bindParam(':bda_filter', $v_txttypeclass);
    $sentenciahonwywell->bindParam(':dba_powerreq', $v_txtbdamainpwr);
    $sentenciahonwywell->bindParam(':bbu_req', $v_txtbbareq);
    $sentenciahonwywell->bindParam(':alarm_brand', $v_txtbrandfirealarm);
    $sentenciahonwywell->bindParam(':alarm_install_facp', $v_txtbdaroomfirec);
    $sentenciahonwywell->bindParam(':alarm_req_annuciator', $v_txtreqremotannunci);

    $sentenciahonwywell->bindParam(':dr_requierd', $v_txtreqsystdesing);
    $sentenciahonwywell->bindParam(':dr_ahjpackage', $v_txtahjpack);
    $sentenciahonwywell->bindParam(':dr_instalationtype', $v_txtinstalltypedesing);
    $sentenciahonwywell->bindParam(':dr_mat_extwall', $v_txtnaterauakextwalls);

    $sentenciahonwywell->bindParam(':dr_mat_intwall', $v_txtnaterauakintwalls);
    $sentenciahonwywell->bindParam(':dr_mat_glasstype', $v_txtmaterialglasst);
    $sentenciahonwywell->bindParam(':dr_mat_rooftype', $v_txtmaterialroof);
    $sentenciahonwywell->bindParam(':dr_firecontrolroomloc', $v_txtfirecontrolroom);
    $sentenciahonwywell->bindParam(':dr_bdaeqlocation', $v_txtbdaequilocation);
    $sentenciahonwywell->bindParam(':dr_verticalriserloc', $v_txtverticalrise);
    $sentenciahonwywell->bindParam(':dr_donorantloc', $v_txtdonorant);
    $sentenciahonwywell->bindParam(':dr_special', $v_txtspecialinst);
    $sentenciahonwywell->bindParam(':seeddraft',  $psswdtkkey );


    $sentenciahonwywell->execute();

}

                    ?>



                          <div class="card-body form-row">
                          <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Project Information </p>
                          <hr class="borderojo">
                          <p class="text-right colorrojofont" style="font-size: 11px;" >NOTE: For Multi Building Project, please include the details and files for all buildings<br> in the form and please note in the Special Instructions field as Multi Building Project
                          </p>
                          </div>
                          <div class="form-group col-md-12 ">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Project Name: <span style="color:red">(Project name cannot have special characters)</label>
                          <input type="text" name="txtnomproj" id="txtnomproj"  onblur="saveborrado();"  value="<?php echo $vprojectname; ?>" class="form-control" placeholder=" Project Name" required oninvalid="setCustomValidity(' Project Nam is required.')" oninput="setCustomValidity('')">


                          <input type="hidden" name="projectdraft" id="projectdraft" class="form-control" value="<?php echo $projectdraft; ?>">
                          <input type="hidden" name="projectdraftrev" id="projectdraftrev" class="form-control" value="<?php echo $projectdraftrev; ?>">
                          <input type="hidden" name="entorno" id="entorno" class="form-control" value="<?php echo $entornoActual; ?>">



                          </div>

                          <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span>Bid due date:<?php // echo $v_buildingduedate; ?> </label>
                          <input type='text' class="form-control form-control-sm" data-format="yyyy-MM-dd" id='datetimepicker1' value="" />


                            </div>

                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span>Installation date:</label>
                          <input type='text' class="form-control form-control-sm" id='datetimepicker2'  />


                            </div>

                            <div class="form-group col-md-12">
                              <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span> Select type of service: </label>


                              <select class="form-control" name="txtdesigntra" id="txtdesigntra" onblur="saveborrado();" onchange="verificarFormQuickQuote();" required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                                    
                                    <!-- <option value="" > - Select - </option>
                                    <option value="etransition" <?php if($vdesigntransition  =="etransition") { echo "selected"; } ?> >Estimate Transition </option>
                                    <option value="dtransition" <?php if($vdesigntransition  =="dtransition") { echo "selected"; } ?> >Design Transition</option> -->
                                    <option value="nestimate" <?php if($vdesigntransition  =="nestimate") { echo "selected"; } ?> >New Estimate</option>
                                    
                                    <?php if($_SESSION['flexesdchandeal']=='FIPLEX_SI')
                                    { ?>
                                    <option value="quickquote" <?php if($vdesigntransition  =="quickquote") { echo "selected";  } ?> >Quick Quote</option>
                                    <?php }?>
                              </select>
                          

                            </div>

                                <div class="infoquickquote alert alert-info col-12 d-none" id="avisoquick" role="alert">
                                <h5 class="alert-info" style="border: none"><i class="icon fas fa-exclamation-triangle" style='color:white'></i> Attention!</h5>
                                    Quick Quote option will display active parts only (fiber DAS, BDA, BTTY, and annunciator), for a complete Bill of Materials choose New Estimate option
                                </div>
                            <!-- <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="btn btn-info" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Attention!</h5>
                                This project contains VHF UHF bands, you must select a BDA
                            </div> -->




                          <div class="form-group col-md-12" id="adjunto1">
                          <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Floor Plans / Survey docs: (Please show donor antenna location, BDA location, and all available riser shafts in the floor plans , survey documents) </label>
                          <div class="col-sm-10">
                              <div class="container">
                              <button name="btnaddatt1" id="btnaddatt1" type="button" class="btn btn-smk  btn-xs  btn-outline-primary btn-flat" onclick="openattach(1)">click here to upload files</button>
                              <label for="" style="color:red;">(file name cannot have special characters)</label>
                              <div class="dropzone dz-clickable ui-sortable" id="myDrop1">
                              <b> List of attached files:</b><br>
                              <?php

                                  $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and idrev = ".$projectdraftrev ." and seedtemp = '". $psswdtkkey  ."' and typefile ='plans' and active = 'Y'";
                                   //  echo $sqlproject;
                                  $msjnotdata = 0;
                                  $resultado = $connect->query($sqlproject)->fetchAll();

                                  foreach ($resultado as $row2) {
                                    $nombrreamostrar =  str_replace( $row2['seedtemp']."_"," ",$row2['fileattach'] );
                                    ?>
                                    <i class='fas fa-file'></i><?php echo  $nombrreamostrar ; ?>
                                    <a href='#' onclick='delattach("<?php echo $row2['idnroattach']; ?>","<?php echo $nombrreamostrar; ?>")'><i class='far fa-times-circle' style='color:red'></i></a><br>
                                    <?php
                                  }


                              ?>


                              </div>

                            </div>
                            <hr>
                          </div>
                          </div>
                          </div>

                          <input type="hidden" name="tkkeymarco1" id="tkkeymarco1" value="<?php echo  $psswdtkkey; ?>">
                          <input type="hidden" name="tkkeymarco2" id="tkkeymarco2" value="<?php echo  $psswdtkkey; ?>">



                          <div class="form-group col-md-12" id="adjunto2">
                          <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Authority Having Jurisdiction (AHJ) requirements: </label>
                          <div class="col-sm-10">
                          <div class="container">
                              <button name="btnaddatt1" id="btnaddatt1" type="button" class="btn btn-smk  btn-xs  btn-outline-primary btn-flat" onclick="openattach(2)">click here to upload files</button>
                              <label for="" style="color:red;">(file name cannot have special characters)</label>
                              <div class="dropzone dz-clickable ui-sortable" id="myDrop2">
                             <b> List of attached files:</b><br>
                              <?php

                                  $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and idrev = ".$projectdraftrev ." and seedtemp = '". $psswdtkkey  ."' and typefile ='ahj' and active = 'Y'";
                                //       echo $sqlproject;
                                  $msjnotdata = 0;
                                  $resultado = $connect->query($sqlproject)->fetchAll();

                                  foreach ($resultado as $row3) {
                                    $nombrreamostrar =  str_replace( $row3['seedtemp']."_"," ",$row3['fileattach'] );
                                    ?>
                                    <i class='fas fa-file'></i><?php echo  $nombrreamostrar ; ?>
                                    <a href='#' onclick='delattach("<?php echo $row3['idnroattach']; ?>","<?php echo $nombrreamostrar; ?>")'><i class='far fa-times-circle' style='color:red'></i></a><br>
                                    <?php
                                  }


                                  ?>

                              </div>

                            </div>
                            <hr>

                          </div>
                          </div>
                          </div>


                            <div class="form-group col-md-12" id="buildaddress">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Building Address:  (Street/City/State/Zip)</label>
                          <input type="text" name="txtaddressbuild" id="txtaddressbuild" value="<?php echo $vaddress; ?>" onblur="saveborrado();"  class="form-control" placeholder="" required oninvalid="setCustomValidity(' address is required.')" oninput="setCustomValidity('')">
                            </div>


                            <div class="form-group col-md-6" id="coordlat">

                                   <label for="exampleInputEmail1">Building Coordinates:<br>Latitude:</label>
                                  <input type="text" name="txtcoordinateslat" id="txtcoordinateslat"  value="<?php echo $vcoordinateslat; ?>" class="form-control" placeholder="Latitude" required oninvalid="setCustomValidity(' Coordinates is required.')" oninput="setCustomValidity('')">

                                  </div>
                                  <div class="form-group col-md-6" id="coordlong">
                                    <br>
                                 <label for="exampleInputEmail1">Longitude:</label>

                                  <input type="text" name="txtcoordinateslon" id="txtcoordinateslon" onblur="saveborrado();" value="<?php echo $vcoordinateslon; ?>" class="form-control" placeholder="Longitude" required oninvalid="setCustomValidity(' Coordinates is required.')" oninput="setCustomValidity('')">

                            </div>


                            <div class="form-group col-md-12"> <span style="color:red"><b>*</b> </span> <b>Installation type :</b> <br>
                           <select class="form-control" name="txtinstalltypedesing" id="txtinstalltypedesing" onblur="saveborrado();" required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="NEW" <?php if($vdr_instalationtype =="NEW") { echo "selected"; } ?>>NEW </option>
											  <option value="RETROFIT" <?php if($vdr_instalationtype =="RETROFIT") { echo "selected"; } ?>>RETROFIT</option>

										</select>
                     </div>

                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span>  Building type (RF Environment): </label>
                          <select class="form-control" name="txtrfenvironment" onblur="saveborrado();" id="txtrfenvironment" required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                                <option value=""> - Select - </option>
                                <option value="Light"  <?php if($vrfenvironment =="Light") { echo "selected"; } ?> >Light: Open Warehouse, Convention Center, etc.</option>
                                <option value="LightMedium"  <?php if($vrfenvironment =="LightMedium") { echo "selected"; } ?>> Medium Light: Parking Garage, Airport, Mall, etc.</option>
                                <option value="Dense"  <?php if($vrfenvironment =="Dense") { echo "selected"; } ?>>Dense: Newer Office Building, Hotel, etc.</option>
                                <option value="HighDense"  <?php if($vrfenvironment =="HighDense") { echo "selected"; } ?>> High Dense: Hospital, Older Gov, Bldg, University, HS, etc.</option>
                                <option value="VeryHigh"  <?php if($vrfenvironment =="VeryHigh") { echo "selected"; } ?>>Very High Dense: Prison, etc.</option>


                          </select>
                            </div>
                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Ocupancy field :</label>
                          <select class="form-control" name="txtocupancyfield" onblur="saveborrado();" id="txtocupancyfield" required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                                <option value=""> - Select - </option>

                                <option value="Agriculture"  <?php if($vtxtocupancyfield =="Agriculture") { echo "selected"; } ?> >Agriculture</option>
                                <option value="Airport"  <?php if($vtxtocupancyfield =="Airport") { echo "selected"; } ?> >   Airport</option>
                                <option value="Bank"  <?php if($vtxtocupancyfield =="Bank") { echo "selected"; } ?> >   Bank/Finance</option>
                                <option value="Commercial"  <?php if($vtxtocupancyfield =="Commercial") { echo "selected"; } ?> >   Commercial Real Estate</option>
                                <option value="Datacenter"  <?php if($vtxtocupancyfield =="Datacenter") { echo "selected"; } ?> >    Data Centers</option>
                                <option value="Education"  <?php if($vtxtocupancyfield =="Education") { echo "selected"; } ?> >    Education K-12</option>
                                <option value="Health"  <?php if($vtxtocupancyfield =="Health") { echo "selected"; } ?> >    Health Care</option>
                                <option value="Hospitality"  <?php if($vtxtocupancyfield =="Hospitality") { echo "selected"; } ?> >    Hospitality</option>
                                <option value="Industrial"  <?php if($vtxtocupancyfield =="Industrial") { echo "selected"; } ?> >   Industrial/Manufacture/Utilities</option>
                                <option value="Infrastructure"  <?php if($vtxtocupancyfield =="Infrastructure") { echo "selected"; } ?> >    Infrastructure/Transportation</option>
                                <option value="Military"  <?php if($vtxtocupancyfield =="Military") { echo "selected"; } ?> >     Military/Defense</option>
                                <option value="other"  <?php if($vtxtocupancyfield =="other") { echo "selected"; } ?> >     OtherPharmaProfessional & Other Services</option>
                                <option value="Retail"  <?php if($vtxtocupancyfield =="Retail") { echo "selected"; } ?> >     Retail/Grocery</option>
                                <option value="Warehousing"  <?php if($vtxtocupancyfield =="Warehousing") { echo "selected"; } ?> >     Warehousing/Storage</option>
                                <option value="residential"  <?php if($vtxtocupancyfield =="residential") { echo "selected"; } ?> >     Residential</option>


                            </select>
                            </div>
                            <!-- <div class="form-group col-md-12 d-none">
                            <label for="exampleInputEmail1">Coverage needed for which public safety agencies :</label>
                              <select multiple class=" selectpicker form-control fondogris" name="txtneededcoverage" id="txtneededcoverage" onblur="saveborrado();" required="" oninvalid="setCustomValidity('Coverage Needed for Which Public Safety Agencies is required.')" oninput="setCustomValidity('')">
                                <option value="null"> <?php echo "selected" ?>- Select - </option>
                                <option value="Fire" <?php $pos = strpos($vcoverageneeded , "Fire");  if ($pos === false) {} else { echo "selected"; } ?> >Fire</option>
                                <option value="Police" <?php  $pos = strpos($vcoverageneeded , "Police");  if ($pos === false) {} else {  echo "selected"; } ?> >Police</option>
                                <option value="EMT" <?php  $pos = strpos($vcoverageneeded , "EMT");  if ($pos === false) {} else { echo "selected"; } ?> >EMT</option>
                                <option value="Others" <?php  $pos = strpos($vcoverageneeded , "Others");  if ($pos === false) {} else {  echo "selected"; } ?> >Others</option>

                            </select>

                            </div> -->


                            <!-- <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span> Number of floor types (different floor sqft): <i class='fas fa-info-circle' style='font-size:14px;color: #095488; ' title='You can select up to two different floor types, specifing the amount and average sqft of each floor type.'></i></label>


                          <select class="form-control" name="txtfloortype1countselect" onblur="saveborrado();" id="txtfloortype1countselect" onchange="habilitarfloortype(this.value)" required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                                <option value="" > - Select - </option>
                                <option value="1" selected >1</option>
                                <option value="2" >2</option>

                            </select>



                            </div>


                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  For Floor type 1: Number of floors that required full coverage:</label>
                          <input type="number"    min="1" max="200" name="txtfloortype1count" onkeydown="return validNumericos(event)" onblur="saveborrado();"  value="<?php echo $vtxtfloortype1count; ?>" id="txtfloortype1count" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">






                            </div>
                            <div class="form-group col-md-12">

                            <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Floor Type 1 average area (sqft):</label>
                            <input type="text" name="txtfloortype1countavg" id="txtfloortype1countavg" onkeydown="return validNumericos(event)" onblur="saveborrado();"  value="<?php echo $vtxtfloortype1countavg; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
                          </div>
                            <div class="form-group col-md-12 d-none habfloor2">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>For Floor type 2: Number of floors that required full coverage:</label>
                          <input type="number"  min="1" max="200" name="txtfloortype2count" onkeydown="return validNumericos(event)" onblur="saveborrado();" id="txtfloortype2count" value="<?php echo $vtxtfloortype2count ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none habfloor2">

                            <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Floor Type 2 average area (sqft):</label>
                            <input type="number" min="1" max="200" name="txtfloortype2countavg" onkeydown="return validNumericos(event)" onblur="saveborrado();" id="txtfloortype2countavg" value="<?php echo $vtxtfloortype2countavg; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">

                          </div> -->

                          <div class="form-group col-md-12">
                            <label for="totalsquarefoot"><span style="color:red"><b>*</b> </span> Total square footage of a building:</label>
                            <input type="number" min="0.01" name="txttotalsquarefoot" step="0.1" onblur="saveborrado();" id="txttotalsquarefoot" value="<?php echo $vtxttotalsquarefoot; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                          </div>

                          <div class="form-group col-md-12">

                            <label for="totalnumberofloors"><span style="color:red"><b>*</b> </span> Total number of floors of a building:</label>
                            <input type="number" min="1" name="txttotalnumberofloors" onkeydown="return validNumericos(event)" onblur="saveborrado();" id="txttotalnumberofloors" value="<?php echo $vtxttotalnumberofloors; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')" onchange="floorscoverage()">

                          </div>

                          <div class="form-group col-md-12">

                            <label for="floorscoverage"><span style="color:red"><b>*</b> </span> Number of floors that need coverage (based on survey):</label>
                            <input type="number" min="1" name="txtfloorscoverage" onkeydown="return validNumericos(event)" onblur="saveborrado();" id="txtfloorscoverage" value="<?php echo $vtxtfloorscoverage; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')" onkeydown="return validNumericos(event)">

                          </div>



                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Average floor height (ft):</label>
                          <input type="number"  min="1" max="100" name="avgfloorheight" onkeydown="return validNumericos(event)" onblur="saveborrado();" id="avgfloorheight" value="<?php echo $vavgfloorheight; ?>"    class="form-control" placeholder="" required oninvalid="setCustomValidity(' Average Floor Height is required.')" oninput="setCustomValidity('')">
                            </div>




                            <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">BDA Requirements </p>
                          <hr class="borderojo">
                          </div>
                          <div class="form-group col-md-6" id="floorlocated">

                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Which Floor will the BDA be located on?:</label>
                          <input type="number" name="txtflorbdalocate" onblur="saveborrado();" id="txtflorbdalocate" value="<?php echo $vbda_floordba; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('Which Floor will the BDA be located on is required.')" oninput="setCustomValidity('')">

                           </div>
                           <div class="form-group col-md-6">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Filtering Requirement:</label>
                            <select class="form-control" name="txttypeclass" id="txttypeclass" onblur="saveborrado();" onclick="filterrq(this.value)" oninput="setCustomValidity('')">
                              <!-- <option value=""> - Select - </option> -->
                              <option value="A" <?php if($vbda_filter =="A") { echo "selected"; } ?>>Class A Channelized </option>
                              <option value="B" selected="selected"<?php if($vbda_filter =="B") { echo "selected"; } ?>>Class B Band Selective</option>

                          </select>
                          </div>

                  <div class="form-group col-md-6 ">
										<label for="exampleInputEmail1">BDA Main Input Power Requirement :</label>
									 		<select class="form-control" name="txtbdamainpwr" id="txtbdamainpwr" onblur="saveborrado();" required="" oninvalid="setCustomValidity('BDA Main is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="AC" >AC Power: 110VAC </option>
											  <option value="DC"  <?php  echo "selected";  ?>>DC Power: 24/-48VDC</option>

										</select>
                    <br>
									</div>






                                                   <div class="form-group col-md-12 ">  <br>
                          <p class="colorazultitulo">Project Frequency Information </p>
                          <hr class="borderojo">
                          </div>
 
                          <div class="form-group col-md-6 fondogris">
                            <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Select Required Frequency Bands for the project and Click on Add to List :</label>
                              <select class="form-control" name="txtreqfreqband" id="txtreqfreqband"  onchange="search_data_band(this.value)" required="" oninvalid="setCustomValidity('Required Frequency Bands is required.')" oninput="setCustomValidity('')">

                              <option value=""> - Select - </option>
                                <option value="700">700MHz</option>
                                <option value="800">800MHz</option>
                                <option value="UHF">UHF</option>
                                <option value="VHF">VHF</option>

                            </select>
                            <br>
                            <table class="table ">

						<tbody>

            <tr>
							<td><label class=" col-form-label">Unit UL (MHz):	   Start: </label> <input type="number" disabled class="form-control  col-sm-6" id="txtchulstart" min="1" data-validate="false" name="txtchulstart" placeholder="000.000"> </td>
							<td><label class=" col-form-label">  &nbsp; Stop: </label>  <input type="number" disabled class="form-control  col-sm-6" id="txtchulstop" data-validate="false" name="txtchulstop" placeholder="000.000">  </td>
						</tr>
            <tr>
							<td><label class=" col-form-label">Unit DL (MHz): Start: </label>	<input type="number" disabled class="form-control col-sm-6" id="txtchudstart" min="1" data-validate="false" name="txtchudstart" placeholder="000.000"></td>
							<td><label class=" col-form-label">  &nbsp; Stop: </label>  <input type="number" disabled class="form-control  col-sm-6" id="txtchudstop" data-validate="false" name="txtchudstop" placeholder="000.000"> </td>
						</tr>
            <tr>
 
            <td colspan=2>
							 <button name="btnlist_gain" id="btnlist_gain" type="button" class="btn btn-smk btn-block btn-outline-primary btn-flat" onclick="add_list_gain()">Add to List</button>
						<input type="hidden" class="form-control" id="templistagainuldl" name="templistagainuldl">

							</td>
						</tr>

            </tbody></table>

                          </div>



                          <div class="form-group col-md-6 fondogris">

                          <div class="form-group col-md-12">


					</div>

          <div class="form-group col-md-12">
              <div class="col-sm-12" id="listagainuldl" name="listagainuldl">
              <table class="table table-striped table-sm ">
                    <thead class="thead-dark">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>UL (Start - Stop) </th>
                      <th>DL (Start - Stop) </th>

                      <th style="width: 40px">Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                  </table>
              </div>
            </div>
				  </div>


              <div class="form-group col-md-6 fondogris d-none" id="losch" name="losch" >

              <br><b>Same UL/DL ch freqs (Simplex Mode) </b>
               <select class="form-control" onchange="habsimplexch(this.value)" name="txtsimpleconfigbych" id="txtsimpleconfigbych" >
											   <!-- <option value=""> - Select - </option>-->
                         <option value="YES" <?php if($vsimplexconfig =="YES") { echo "selected"; } ?> >YES </option>
											  <option value="NO" <?php if($vsimplexconfig !="YES") { echo "selected"; } ?> >NO</option>

										</select>	<br>

              <label class="col-sm-2 col-form-label">UL Channels (MHz):	</label>    <input type="number" min="1" class="form-control" data-validate="false" id="txtchul" onblur="copysimplexconfig()" name="txtchul" placeholder="000.000">
                <label class="col-sm-2 col-form-label">DL Channels (MHz):</label>  <input type="number" min="1" class="form-control" data-validate="false" id="txtchud" name="txtchud" placeholder="000.000">


            <br>		<button name="btnaddchannels" id="btnaddchannels" type="button" class="btn btn-smk btn-block btn-outline-primary btn-flat " onclick="add_channels()">Add to Channel List</button>
            <br>
                <input type="hidden" class="form-control" id="templistchannel" name="templistchannel">
                <br>


            <span class="colorrojofont">&nbsp; Try to be accurate on channels quanitity because will impact on the estimation price </span>
            <br><br>
              </div>

              <div class="form-group col-md-6 fondogris d-none" id="losch1" name="losch1" >
              <br>
                <div class="col-sm-12" id="listachannel" name="listachannel">
                <table class="table table-striped table-sm ">
                      <thead class="thead-dark">
                      <tr >
                        <th style="width: 10px">#</th>
                        <th>Channels List</th>
                        <th style="width: 40px">UL</th>
                        <th style="width: 40px">DL</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                      </thead>
                      <tbody>


                      </tbody>
                    </table>
                </div>
              </div>


                          <div class="form-group col-md-6" id="losch2" name="losch2">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b></span>Max Number of Channels:</label>
                          <input type="number" name="numbchxband" id="numbchxband" class="form-control" onblur="saveborrado();"   placeholder="" onblur="chequearmaxvalor(this.value, 32);"   max="32" value="<?php if ($vnumberchannelsxband =="") { echo "0"; } else {  echo $vnumberchannelsxband; }  ?>" required oninvalid="setCustomValidity('Number of Channels for each bandis required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-6 d-none">

                          <label for="exampleInputEmail1">Do any of the channels work in a simplex configuration (same DL & UL frequency): BORRARRR</label>
                        	<select class="form-control" name="txtsimpleconfig" id="txtsimpleconfig" onblur="saveborrado();" required="" oninvalid="setCustomValidity('simplex configuration  is required.')" oninput="setCustomValidity('')">
											   <option value="NO"> - Select - </option>
                         <option value="YES" <?php if($vsimplexconfig =="YES") { echo "selected"; } ?> >YES </option>
											  <option value="NO" <?php if($vsimplexconfig =="NO") { echo "selected"; } ?> >NO</option>

										</select>
                           </div>




                           <div id="divinexc700" class="form-group col-md-12 d-none">
                            
                                <hr class="borderojo">                              
                                <fieldset>
                                  <legend class="colorazultitulo">For 700/800 MHz - 1/2-2W All-in-One options</legend><br>
                              <div class="fondogris"><br>
                                    <div>
                                      <input type="radio" id="inc14700" name="inexc700" value="1"/>
                                      <label style='font-family: Arial; font-size: 14px; font-weight: normal;'for="inc14700">Exclude ESMR band (DL: 862-869MHz, UL: 817-824MHz), only include Band 14 (HONBDA-7S27B-IB-10)</label>
                                    </div>

                                    <div>
                                      <input type="radio" id="exc14700" name="inexc700" value="2"/>
                                      <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="exc14700">Exclude Band 14 (DL: 758-768MHz, UL 788-798MHz) and ESMR Band (DL:862-869MHz, UL: 817-824MHz) - (HONBDA-7S27B-IB-06)</label>
                                    </div>

                                    <div>
                                      <input type="radio" id="inc14ESMR700" name="inexc700" value="3" />
                                      <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="inc14ESMR700">Include Band 14 and ESMR band (HONBDA-7S27B-IB-18)</label>
                                    </div>
                                    <br>
                              </div>
                                    <div class="d-none">
                                      <input type="radio" id="inexcaux" name="inexc700" value="0" checked/>
                                    </div>
                                  </fieldset>
                            </div>


                            <div id="divinexc800" class="form-group col-md-12 d-none">
                            
                                <hr class="borderojo">                              
                                <fieldset>
                                  <legend class="colorazultitulo">For 700/800 MHz - 1/2-2W All-in-One options</legend><br>
                                <div class="fondogris"><br>

                                    <div>
                                      <input type="radio" id="inc14800" name="inexc800" value="1"/>
                                      <label style='font-family: Arial; font-size: 14px; font-weight: normal;'for="inc14800">Exclude ESMR band (DL: 862-869MHz, UL: 817-824MHz), only include Band 14 (HONBDA-7S27B-IB-10)</label>
                                    </div>

                                    <div>
                                      <input type="radio" id="exc14800" name="inexc800" value="2"/>
                                      <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="exc14800">Exclude Band 14 (DL: 758-768MHz, UL 788-798MHz) and ESMR Band (DL:862-869MHz, UL: 817-824MHz) - (HONBDA-7S27B-IB-06)</label>
                                    </div>
                                  
                                    <div>
                                      <input type="radio" id="inc14ESMR800" name="inexc800" value="3" />
                                      <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="inc14ESMR800">Include Band 14 and ESMR band (HONBDA-7S27B-IB-18)</label>
                                    </div>
                                    <br>

                                </div>

                                  <div class="d-none">
                                    <input type="radio" id="inexcaux" name="inexc700" value="0" checked/>
                                  </div>
                                </fieldset>
                            </div>


                           <div id="divbdadloutputpowervhf" class="form-group col-md-6 d-none">
                            <label for="txtbdadloutputpowervhf">BDA DL Output power - VHF</label>
                              <select class="form-control" name="txtbdadloutputpowervhf" id="txtbdadloutputpowervhf" onblur="saveborrado();">
                                
                                <option value=""> - Select - </option>
                                <option value="24dBm" <?php if($vtxtbdadloutputpowervhf =="24dBm") { echo "selected"; } ?> >24dBm</option>
                                <option value="30dBm" <?php if($vtxtbdadloutputpowervhf =="30dBm") { echo "selected"; } ?> >30dBm</option>
                              
                              </select>

                            </div>

                            <div id="divbdadloutputpoweruhf" class="form-group col-md-6 d-none">
                            <label for="txtbdadloutputpoweruhf">BDA DL Output power - UHF</label>
                              <select class="form-control" name="txtbdadloutputpoweruhf" id="txtbdadloutputpoweruhf" onblur="saveborrado();">
                                
                                <option value=""> - Select - </option>
                                <option value="30dBm" <?php if($vtxtbdadloutputpoweruhf =="30dBm") { echo "selected"; } ?> >30dBm</option>
                                <option value="37dBm" <?php if($vtxtbdadloutputpoweruhf =="37dBm") { echo "selected"; } ?> >37dBm</option>
                              
                              </select>

                            </div>

                          <br>
                         <div class="form-group col-md-12" id="coveragerequirements">
                          <p class="colorazultitulo">Coverage Requirements </p>
                          <hr class="borderojo">
                          </div>
                          <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Donor RSSI:</label>
                          <input type="text " name="txtdonorrssi" onblur="saveborrado();" id="txtdonorrssi" value="<?php  if($vtxtdonorrssi =="") { echo "-65"; } else { echo $vtxtdonorrssi; }  ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require full antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Min DL Coverage:</label>
                          <input type="text" name="txtmindlcoverage" onblur="saveborrado();" id="txtmindlcoverage" value="<?php if($vtxtmindlcoverage =="") { echo "-95"; } else { echo $vtxtmindlcoverage; } ?> " class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 50% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Min UL Coverage:</label>
                          <input type="text" name="txtminulcoverage" onblur="saveborrado();" id="txtminulcoverage" value="<?php if($vtxtminulcoverage =="") { echo "-95"; } else { echo $vtxtminulcoverage; } ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Design Margin
:</label>
                          <input type="number" name="txtdesignmargin" onblur="saveborrado();" id="txtdesignmargin" value="<?php if($vtxtdesignmargin =="") { echo "5"; } else { echo $vtxtdesignmargin; }   ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Indoor Antenna Radius:</label>
                          <input type="number" min="1" onblur="saveborrado();"  name="txtindoorantrad" id="txtindoorantrad" value="<?php  if($vtxtindoorantrad =="") { echo "50"; } else { echo $vtxtindoorantrad; }   ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12  d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Mobile TX Power
:</label>
                          <input type="number" name="txtmobtxpower" onblur="saveborrado();" id="txtmobtxpower" value="<?php  if($vtxtmobtxpower =="") { echo "35"; } else { echo $vtxtmobtxpower; }   ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12" id="distancetodonor">
                          <label for="exampleInputEmail1"> Distance to Donor Site (miles):</label>
                          <input type="number" min="0"  step="0.1" onblur="saveborrado();" name="txtdistdonorsite" id="txtdistdonorsite" value="<?php  if($vtxtmobtxpower =="") { echo "5"; } else { echo $vtxtdistdonorsite; }  ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Donor Antenna Gain
:</label>
                          <input type="number" name="txtdonorantgain" onblur="saveborrado();" id="txtdonorantgain" value="<?php   if($vtxtdonorantgain =="") { echo "14"; } else { echo $vtxtdonorantgain; }    ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12  d-none ocultocovreq ">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Indoor Antenna Gain:</label>
                          <input type="number" min="1" onblur="saveborrado();"  name="txtindoorantgain" id="txtindoorantgain" value="<?php  if($txtindoorantgain =="") { echo "2"; } else { echo $txtindoorantgain; } ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12  d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Donor Coax Cable Loss (100'):</label>
                          <input type="text" name="txtdonorcoaxloss" onblur="saveborrado();" id="txtdonorcoaxloss" value="<?php if($vtxtdonorcoaxloss =="") { echo "2.07"; } else { echo $vtxtdonorcoaxloss; }   ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 50% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12  d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Indoor Coax Cable Loss (100'):</label>
                          <input type="text" name="txtindoorcoaxloss"  id="txtindoorcoaxloss" onblur="saveborrado();" value="<?php  if($vtxtindoorcoaxloss =="") { echo "2.37"; } else { echo $vtxtindoorcoaxloss; }   ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 50% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>





                          <br>
                          <div class="form-group col-md-12 ">
                            <p class="colorazultitulo">BBU Requirements</p>
                            <hr class="borderojo">
                          </div>

                          <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>Battery Backup Requirement:</label>

                            <select id="txtbbareq" name="txtbbareq" onblur="saveborrado();"  class="form-control form-control-sm">
                              
                              <option value=""> - Select - </option>
                              <!-- <option value="12"  <?php if($vvbbu_req ==12) { echo "selected"; } ?>>12 hours </option> -->
                              <!-- <option value="24"  <?php if($vvbbu_req ==24) { echo "selected"; } ?>>24 hours </option> -->
                              <option value="24"  <?php echo "selected"; ?>>Up to 24 hours </option>

                            </select>

                          </div>

                          <div class="form-group col-md-12 " id="alarmre1" name="alarmre1">
                            <p class="colorazultitulo">Alarm Requirements </p>
                            <hr class="borderojo">
                          </div>
                          
                          <div class="form-group col-md-6" id='brandfirealarm'>
                            <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span>Select the type of fire alarm that will be installed:</label>
                              
                            <select class="form-control" name="txtbrandfirealarm" onblur="saveborrado();" id="txtbrandfirealarm" required="" oninvalid="setCustomValidity('is required.')" oninput="setCustomValidity('')">
                                
                              <option value=""> - Select - </option>
                              <option value="gamewell-fci" <?php if($valarm_brand =="gamewell-fci") { echo "selected"; } ?>>Gamewell-FCI </option>
                              <!-- <option value="farenhyt" <?php if($valarm_brand =="farenhyt") { echo "selected"; } ?>>Farenhyt</option> -->
                              <option value="notifier" <?php if($valarm_brand =="notifier") { echo "selected"; } ?>>Notifier</option>
                              <option value="others" <?php if($valarm_brand =="others") { echo "selected"; } ?>>Others</option>

                            </select>

                          </div>

                           <div class="form-group col-md-6" id='bdaroomfirec'>
                              <span style="color:red"><b>*</b> </span>  <b>Will the BDA equipment be installed in the main Fire Control Room containing the FACP Interface(Y/N)?   :</b> <br>
                                
                                <select class="form-control" name="txtbdaroomfirec" id="txtbdaroomfirec" onblur="saveborrado();" required="" oninvalid="setCustomValidity('is required.')" oninput="setCustomValidity('')">
                                    <option value=""> - Select - </option>
                                    <option value="YES" <?php if($valarm_install_facp =="YES") { echo "selected"; } ?>>YES </option>
                                    <option value="NO" <?php if($valarm_install_facp =="NO") { echo "selected"; } ?>>NO</option>

                                </select>
                            </div>

                           <div class="form-group col-md-6">
                           <span style="color:red"><b>*</b> </span>  <b>Will you require a remote annunciator  :</b> <br>
                          <select class="form-control" name="txtreqremotannunci" id="txtreqremotannunci" onblur="saveborrado();" required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
                          <option value=""> - Select - </option>
                         <option value="YES - With dry contacts to feed the FACP" <?php if($valarm_req_annuciator =="YES - With dry contacts to feed the FACP") { echo "selected"; } ?>>YES - With dry contacts to feed the FACP </option>
                         <option value="YES - Without dry contacts. BBU to feed FACP" <?php if($valarm_req_annuciator =="YES - Without dry contacts. BBU to feed FACP") { echo "selected"; } ?>>YES - Without dry contacts. BBU to feed FACP </option>
											  <option value="NO" <?php if($valarm_req_annuciator =="NO") { echo "selected"; } ?>>NO</option>

										</select>
                    </div>
                          <br>
                         <div class="form-group col-md-12 " id="designrequirements">
                          <p class="colorazultitulo">Design Requirements </p>
                          <hr class="borderojo">
                          </div>




                          <div class="form-group col-md-6 d-none">
                          <span style="color:red"><b>*</b> </span>  <b>Will you require a system design :</b> <br>
                          <select class="form-control" name="txtreqsystdesing" id="txtreqsystdesing" onblur="saveborrado();" required="" onchange="habilitomasinfo(this.value)" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES" selected >YES </option>
											  <option value="NO" <?php if($vdr_requierd =="NO") { echo "selected"; } ?>>NO</option>

										</select>
                           </div>
                           <div class="form-group col-md-6 d-none">
                           <span style="color:red"><b>*</b> </span>  <b>Do you need a complete AHJ Submittal Package:</b> <br>
                          <select class="form-control modedesinginfo" name="txtahjpack" id="txtahjpack" onblur="saveborrado();" required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES" <?php if($vdr_ahjpackage =="YES") { echo "selected"; } ?>>YES </option>
											  <option value="NO" selected >NO</option>

										</select>
                           </div>

                     <div class="form-group col-md-6" id="materialsexterior">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Construction Materials – Exterior Walls:</label>
                               <textarea name="txtnaterauakextwalls" id="txtnaterauakextwalls" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Exterior Wallst is required.')" oninput="setCustomValidity('')" ><?php if($vdr_mat_extwall==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_mat_extwall;
                                          }?></textarea>

                        </div>

                      <div class="form-group col-md-6" id="materialsinterior">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Construction Materials – Interior Walls:</label>
                          <textarea name="txtnaterauakintwalls" id="txtnaterauakintwalls" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Interior Wallst is required.')" oninput="setCustomValidity('')" ><?php if($vdr_mat_intwalll==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_mat_intwall;
                                          }?></textarea>
                      
                        </div>

                      <div class="form-group col-md-6" id="mglasstype">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Construction Materials – Glass Type:</label>
                          <textarea name="txtmaterialglasst" id="txtmaterialglasst" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Glass type  is required.')" oninput="setCustomValidity('')" ><?php if($vdr_mat_glasstype==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_mat_glasstype;
                                          }?></textarea>
                      
                        </div>

                      <div class="form-group col-md-6" id="mrooftype">
                          <label for="exampleInputEmail1">  <span style="color:red"><b>*</b> </span> Construction Materials – Roof Type:</label>
                          <textarea name="txtmaterialroof" id="txtmaterialroof" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Roof Type is required.')" oninput="setCustomValidity('')" ><?php if($vdr_mat_rooftype==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_mat_rooftype;
                                          }?></textarea>
                      
                        </div>

                      <div class="form-group col-md-6" id="firecontrolroomlocation">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Fire Control Room Location:</label>
                          <textarea name="txtfirecontrolroom" id="txtfirecontrolroom" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Fire Control Room Location is required.')" oninput="setCustomValidity('')" ><?php if($vdr_firecontrolroomloc==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_firecontrolroomloc;
                                          }?></textarea>
                      
                        </div>

                      <div class="form-group col-md-6" id="bdaequipmentlocation">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  BDA Equipment Location:</label>
                          <textarea name="txtbdaequilocation" id="txtbdaequilocation" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' BDA Equipment Location is required.')" oninput="setCustomValidity('')" ><?php if($vdr_bdaeqlocation==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_bdaeqlocation;
                                          }?></textarea>

                        </div>

                      <div class="form-group col-md-6" id="verticalriserlocation">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Vertical Riser Location:</label>
                          <textarea name="txtverticalrise" id="txtverticalrise" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Vertical Riser Location is required.')" oninput="setCustomValidity('')" ><?php if($vdr_verticalriserloc==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_verticalriserloc;
                                          }?></textarea>

                        </div>

                      <div class="form-group col-md-6" id="donorantenalocation">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span>  Donor Antenna Location:</label>
                          <textarea name="txtdonorant" id="txtdonorant" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Donor Antenna Location is required.')" oninput="setCustomValidity('')" ><?php if($vdr_donorantloc==""){
                                          echo "Unknown";
                                        }else{
                                          echo $vdr_donorantloc;
                                          }?></textarea>

                        </div>

                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1">Special Instructions:</label>
                          <div class="col-sm-12">
					          				<textarea class="form-controlm modedesinginfo" rows="3" id="txtspecialinst" name="txtspecialinst" placeholder="Special Instructions ..."><?php echo htmlspecialchars($vdr_special, ENT_QUOTES, 'UTF-8'); ?></textarea>
                          </div>
                          </div>
                         <br>

                          <!-- /.card-body -->
                          <div class="form-group col-md-12">
                          <div class="card-footer text-right">

                          <button type="button" onclick="save_new_registro()" class="btn btn-primary right-align">Submit</button>


                          </div>
                          <p class="text-danger" id="lbldatoserrr">


                          </p>
                          </div>
                          </div>
                          <hr>
                          </div>


                    <!-- fin form -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <div class="d-flex flex-nowrap flex-column align-items-center flex-md-row align-items-start">
      <div>
        <p class="footer-content__copyright m-0">Copyright © 2022 Honeywell International Inc.</p>
      </div>
            
      <div class="footer-content__bottom-link pl-md-3 ml-md-3">
        <a class="footer--links__list-item" href="https://www.honeywell.com/us/en/privacy-statement" target="_self">Privacy Statement</a>
      </div>
          
      <div class="footer-content__bottom-link pl-md-3 ml-md-3">
          <a class="footer--links__list-item" href="https://honeywellhub.secure.force.com/PrivacyInformationRequestForm?lang=en" target="_blank">Your Privacy Choices</a>
          <img src="privacyoptions29x14.png"  class="brand-image"  >
      </div>

      <div class="footer-content__bottom-link pl-md-3 ml-md-3">
        <a class="footer--links__list-item" href="https://www.honeywell.com/us/en/cookie-notice" target="_self">Cookie Notice</a>
      </div>
	</div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</form>

<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous">
</script>
<!-- jQuery UI 1.11.4 -->
<link rel="stylesheet" href="toastr.css">
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4.5.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="toastr.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="js/eModal.min.js" type="text/javascript" />

<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/moment/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap-select.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.js"></script>
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">


var tabla_channel_quantity = [];
var tabla_gain_dlul= [];

tabla_channel_quantity.length=0;
 tabla_gain_dlul.length=0;


 $( document ).ready(function() {


    console.log('ready');

    $('#example1').DataTable( {				"order": [[ 4, "asc" ]],  "paging": true,  "pageLength": 25	} );


	$( document ).ready(function() {

    var dt = new Date();
    var time = dt.getDate() + "-" + dt.getMonth() + " -- " + dt.getHours() + dt.getMinutes()
    
// habilitar para levantar datos de prueba en el formulario    
//     if($('#entorno').val()=='DEV'){

//       $("#txtnomproj").val("test case "+time);
//       $("#txtaddressbuild").val("test case address");
//       $("#txtdesigntra").val("nestimate");
//      $("#txtinstalltypedesing").val("NEW");
//       $("#txtrfenvironment").val("Light");
//       $("#txtocupancyfield").val("Agriculture");
//       $("#txtneededcoverage").val("Fire");
//       $("#txttotalsquarefoot").val("125.5");
//       $("#txttotalnumberofloors").val("12");
//       $("#txtfloorscoverage").val("5");
//       $("#avgfloorheight").val("123.65");
//       $("#txtflorbdalocate").val("2");
//       $("#txttypeclass").val("A");
//       $("#txtbdamainpwr").val("AC");
//       $("#txtbbareq").val("12");
//       $("#txtbrandfirealarm").val("farenhyt");
//       $("#txtbdaroomfirec").val("YES");
//       $("#txtreqremotannunci").val("NO");


// }
  filterrq(this.value); 


    var vidtoke = $("#projectdraft").val();
    var vidr =  $("#projectdraftrev").val();

     $('#datetimepickerfrom').datetimepicker(  {

      maxDate: new Date(),  format: 'YYYY-MM-DD'
 });

 $('#datetimepickerto').datetimepicker(  {
   
      maxDate: new Date(), format: 'YYYY-MM-DD'
 });


    $('#datetimepicker1').datetimepicker(  {
     minDate: new Date(),  format: 'YYYY-MM-DD',
});

$('#datetimepicker2').datetimepicker(  {
     minDate: new Date(),  format: 'YYYY-MM-DD',
});


    var aaa = '<?php echo $v_buildingduedate; ?>';
    if (aaa != '')
    {
      var d = new Date(aaa);
    var d1date = d.getDate();
    var d1month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
    var d1year = d.getFullYear();
    var dateStr = d1year   + "/" + d1month + "/" + d1date;

    var aaa2 = '<?php echo $v_installationduedate; ?>';
  //  console.log(aaa);
    var d2 = new Date(aaa2);
    var d2date = d2.getDate();
    var d2month = d2.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
    var d2year = d2.getFullYear();
    var dateStr2= d2year   + "/" + d2month + "/" + d2date;


    console.log('convert' + dateStr)
      $('#datetimepicker1').val(dateStr);

      $('#datetimepicker2').val(dateStr2);
    }
  //  console.log(aaa);




    if ( vidtoke !='')
    {

      $.ajax
            ({
              url: 'ajax_listbandbyproj.php',
              data: "idp="+vidtoke+'&idr='+vidr,
              type: 'post',
              datatype:'JSON',
              success: function(data)
              {
              //	alert(data.resultiu);
               //   console.log(data.arr_idband)
                  for(var i=0; i< data.arr_idband.length ;i++)
                  {
                  //    console.log(data.arr_idband[i].fstartul );
                      if(data.arr_idband[i].typeref == 'FREQBAND')
                      {
                                   tabla_gain_dlul.push({
                                          Band: data.arr_idband[i].nombreband,
                                          gainulstart: parseFloat(data.arr_idband[i].fstartul),
                                          gainulstop: parseFloat(data.arr_idband[i].fstopul),
                                          gainudstart: parseFloat(data.arr_idband[i].fstartdl),
                                          gainudstop: parseFloat(data.arr_idband[i].fstopdl)
                                      });

                                      tabla_gain_udul2dagen();
                      }
                      else
                      {
                        tabla_channel_quantity.push({

                          channelul: parseFloat(data.arr_idband[i].ulch)	,
                          channeldl: parseFloat(data.arr_idband[i].dlch),
                          simplexconfig: data.arr_idband[i].simplex,
                          bandaname: data.arr_idband[i].nombreband

                          });
                          tabla_channels();
                      }
                  }

              }
            });
    }



    });



 });


function getValueInExc700(){

var radios700 = document.getElementsByName('inexc700');
var inexc700 = 0;

  for (var i = 0; i < radios700.length; i++) {
    if (radios700[i].checked) {
      inexc700 = radios700[i].value;
        break;
    }
  }
  return inexc700;

}

function getValueInExc800(){

var radios800 = document.getElementsByName('inexc800');
var inexc800 = 0;

  for (var i = 0; i < radios800.length; i++) {
    if (radios800[i].checked) {
      inexc800 = radios800[i].value;
        break;
    }
  }
  return inexc800;

}


function add_list_gain()
	{
		var v_txtchudstart = parseFloat($('#txtchudstart').val());
		var v_txtchudstop = parseFloat($('#txtchudstop').val());
		var v_txtchulstart = parseFloat($('#txtchulstart').val());
		var v_txtchulstop = parseFloat($('#txtchulstop').val());
    var tablag;
    var bandaUHF=0, bandaVHF=0, banda_700=0, banda_800=0;



    var banda= $("#txtreqfreqband").val();
    var quickquote = $("#txtdesigntra").val();
    


    if(quickquote=='quickquote')
    {
      
      if(banda=="VHF"){
        $("#divbdadloutputpowervhf").removeClass("d-none");
      }
      else{
        //$("#divbdadloutputpowervhf").addClass("d-none");
      }
      if(banda=="UHF"){
        $("#divbdadloutputpoweruhf").removeClass("d-none");
      }
      else{
        //$("#divbdadloutputpoweruhf").addClass("d-none");
      }
      
    }
    else{
      $("#divbdadloutputpoweruhf").addClass("d-none");
      $("#divbdadloutputpowervhf").addClass("d-none");
      
    }






		 if ($("#txtreqfreqband").val() =="" ||  v_txtchudstart=="" || v_txtchudstop=="" || v_txtchulstart=="" || v_txtchulstop=="" || isNaN(v_txtchudstart)==true  || isNaN(v_txtchudstop)==true  || isNaN(v_txtchulstart)==true  || isNaN(v_txtchulstop)==true   )
		  {
				toastr["error"]("Error,incomplete information", "");
		  }
		  else
		  {
			  // Agredo los 4 al Array.

			   var v_loencontre_ch = 0;
					 $.each(tabla_gain_dlul, function (i, value) {
						if (value.gainudstart == v_txtchudstart)
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}
						if (value.gainudstop == v_txtchudstop)
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}
						if (value.gainulstart == v_txtchulstart)
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}
						if (value.gainulstop == v_txtchulstop)
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}
            if (value.Band == $("#txtreqfreqband").val())
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}

					});
					if ( v_loencontre_ch == 0)
					{

						   tabla_gain_dlul.push({
									Band: $("#txtreqfreqband").val(),
									gainulstart: parseFloat(v_txtchulstart),
									gainulstop: parseFloat(v_txtchulstop),
                  gainudstart: parseFloat(v_txtchudstart),
									gainudstop: parseFloat(v_txtchudstop)
                });
          
                    for (var i = 0; i < tabla_gain_dlul.length; i++) 
                    {
                      tablag = tabla_gain_dlul[i];

                      if(tablag.Band =='VHF'){
                        bandaVHF=1;
                      }

                      if(tablag.Band =='UHF'){
                        bandaUHF=1;
                      }

                      if(tablag.Band =='800'){
                        banda_800=1;
                      }

                      if(tablag.Band =='700'){
                        banda_700=1;
                      }
                    }
        
                     /*  if(bandaVHF ==1){
                        console.log('la banda vhf ESTA...');
                      }else
                      console.log('la banda vhf NO ESTA...');

                      if(bandaUHF ==1){
                        console.log('la banda uhf ESTA...');
                      }else
                      console.log('la banda uhf NO ESTA...');

                      if(banda_800 ==1){
                        console.log('la banda 800 ESTA...');
                      }else
                      console.log('la banda 800 NO ESTA...');

                      if(banda_700 ==1){
                        console.log('la banda 700 ESTA...');
                      }else
                      console.log('la banda 700 NO ESTA...'); */

                    verificarBandasAdd(bandaVHF, bandaUHF, banda_700, banda_800);

                    var v_divinexc700 = document.getElementById("divinexc700");
                    var v_divinexc800 = document.getElementById("divinexc800");

                    if(banda=="700")
                    {
                      if(!v_divinexc800.classList.contains("d-none"))
                      {
                        v_divinexc800.classList.add('d-none');
                        v_divinexc700.classList.remove("d-none");
                        document.getElementById("exc14700").checked = true;
                        //console.log('aparece 700 desaparece 800');
                      }
                      else
                      {
                        v_divinexc700.classList.remove("d-none");
                        document.getElementById("exc14700").checked = true;
                        //console.log('aparece 700');
                      }
                    }

                    if(banda=="800")
                    {

                      if(!v_divinexc700.classList.contains("d-none"))
                      {
                        v_divinexc700.classList.add('d-none');
                        v_divinexc800.classList.remove("d-none");
                        document.getElementById("exc14800").checked = true;
                        //console.log('aparece 800 desaparece 700');
                      }
                      else
                      {
                        v_divinexc800.classList.remove("d-none");
                        document.getElementById("exc14800").checked = true;
                        //console.log('aparece 800');
                      }
                    }


						   ///Borrar los tipo banda
             //  txtreqfreqband
               if( $("#txtreqfreqband").val() == "700")
               {
             //   $('#txtreqfreqband option[value="UHF"]').remove();
             //   $('#txtreqfreqband option[value="VHF"]').remove();

/*                 $("#losch").addClass("d-none");
                $("#losch1").addClass("d-none"); */
                //$("#losch2").removeClass("d-none");

                numbchxband.value = "20";
               }
               if( $("#txtreqfreqband").val() == "800")
               {
             //   $('#txtreqfreqband option[value="UHF"]').remove();
             //   $('#txtreqfreqband option[value="VHF"]').remove();

                /* $("#losch").addClass("d-none");
                $("#losch1").addClass("d-none"); */
                //$("#losch2").removeClass("d-none");

                numbchxband.value = "20";
               }
               if( $("#txtreqfreqband").val() == "UHF")
               {
           //     $('#txtreqfreqband option[value="700"]').remove();
           //     $('#txtreqfreqband option[value="800"]').remove();

                $("#losch").removeClass("d-none");
                $("#losch1").removeClass("d-none");
                //$("#losch2").addClass("d-none");

                numbchxband.value = "10";
               }
               if( $("#txtreqfreqband").val() == "VHF")
               {
           //     $('#txtreqfreqband option[value="700"]').remove();
           //     $('#txtreqfreqband option[value="800"]').remove();

                $("#losch").removeClass("d-none");
                $("#losch1").removeClass("d-none");
                //$("#losch2").addClass("d-none");

                numbchxband.value = "10";
               }

						//   tabla_gain_udul();
						   tabla_gain_udul2dagen();
               saveborrado();


						   /// Limpia variables

							$('#txtchudstart').val('');
							$('#txtchudstop').val('');
							$('#txtchulstop').val('');
							$('#txtchulstart').val('');

							 $("#txtchudstart").focus();
							  $("#txtchudstart").focus();

					}
          else
          {
            toastr["error"]("Error,duplicate information", "");
          }

		  }

	}

  function borrar_array_channel(idborrarch)
	 {
		    tabla_channel_quantity.splice(idborrarch, 1);

			$('body,html').stop(true,true).animate({
				scrollTop: $("#listachannel").offset().top
			},1);

			tabla_channels();
			$('body,html').stop(true,true).animate({
				scrollTop: $("#listachannel").offset().top
			},1);
	 }
//LUCIANO
	 function borrar_array_uldl	 (idborrarch)
	 {
		    tabla_gain_dlul.splice(idborrarch, 1);
         var tablag;
         var bandaUHF=0, bandaVHF=0, banda_700=0, banda_800=0;
        
         for (var i = 0; i < tabla_gain_dlul.length; i++) 
         {

            tablag = tabla_gain_dlul[i];
            if(tablag.Band =='VHF')
            {
              bandaVHF=1;
            }

            if(tablag.Band =='UHF')
            {
              bandaUHF=1;
            }

            if(tablag.Band =='800')
            {
              banda_800=1;
            }

            if(tablag.Band =='700')
            {
              banda_700=1;
            }
        }
        
          /* if(bandaVHF ==1){
            console.log('la banda vhf ESTA...');
          }else
          console.log('la banda vhf NO ESTA...');

          if(bandaUHF ==1){
            console.log('la banda uhf ESTA...');
          }else
          console.log('la banda uhf NO ESTA...');

          if(banda_800 ==1){
            console.log('la banda 800 ESTA...');
          }else
          console.log('la banda 800 NO ESTA...');

          if(banda_700 ==1){
            console.log('la banda 700 ESTA...');
          }else
          console.log('la banda 700 NO ESTA...'); */
        

        verificarBandasRemove(bandaVHF, bandaUHF, banda_700, banda_800);

        /* if(tabla_gain_dlul[idborrarch].Band=='UHF'){
          $("#divbdadloutputpoweruhf").addClass("d-none");
          $("#divbdadloutputpoweruhf").val("");
        }

        if(tabla_gain_dlul[idborrarch].Band=='VHF'){
          $("#divbdadloutputpowervhf").addClass("d-none");
          $("#divbdadloutputpowervhf").val("");
        } */

			$('body,html').stop(true,true).animate({
				scrollTop: $("#listagainuldl").offset().top
			},1);
			tabla_channel_quantity  = []; // nueva instancia
			tabla_gain_udul2dagen();
      tabla_channels();
			$('body,html').stop(true,true).animate({
				scrollTop: $("#listagainuldl").offset().top
			},1);
	 }

   function verificarBandasRemove(bandaVHF, bandaUHF, banda_700, banda_800)
   {
    
      var v_divinexc700 = document.getElementById("divinexc700");
      var v_divinexc800 = document.getElementById("divinexc800");

          if(bandaVHF==0 && bandaUHF==0)
          {
            $('#losch').addClass("d-none");
            $('#losch1').addClass("d-none");
          }

          if(banda_700==0)
          {
            v_divinexc700.classList.add("d-none");
            
            if(banda_800==1)
            {
              v_divinexc800.classList.remove("d-none");
            }
            
          }

          if(banda_800==0)
          {
            v_divinexc800.classList.add("d-none");
            
            if(banda_700==1)
            {
              v_divinexc700.classList.remove("d-none");
            }

          }
   }

   function verificarBandasAdd(bandaVHF, bandaUHF)
   {
    
      if(bandaVHF==1 && bandaUHF==1)
      {
        $('#losch').removeClass("d-none");
        $('#losch1').removeClass("d-none");
      }

    }

  function tabla_gain_udul2dagen()
	{
		var jname ="";
		var v_templistchannel_udul="";
			var html = '<table class="table  table-striped table-sm ">';
				 html += '<tr class="thead-dark">';
				 var cantcabez = tabla_gain_dlul[0];

				 for( var j in  cantcabez) {
			//		 console.log(j);
					 jname= j
					 if (j=='gainudstart')
					 {
						 jname='DL Start';
					 }
					 if (j=='gainudstop')
					 {
						 jname='DL Stop';
					 }
					 if (j=='gainulstart')
					 {
						 jname='UL Start';
					 }
					 if (j=='gainulstop')
					 {
						 jname='UL Stop';
					 }


				  html += '<th>' + jname + '</th>';

				 }
				 html += '<th>Action</th>';
				 html += '</tr>';
				 for( var i = 0; i < tabla_gain_dlul.length; i++) {
				  html += '<tr>';

				  if (v_templistchannel_udul != '')
				  {
            v_templistchannel_udul = v_templistchannel_udul + "#";
				  }

				  for( var j in tabla_gain_dlul[i] ) {


            /////// j = band..


              ///Borrar los tipo banda
             //  txtreqfreqband
           ///  console.log('HOLA:::'+  tabla_gain_dlul[i][j] );
             if( tabla_gain_dlul[i][j] == "700")
               {
             //   $('#txtreqfreqband option[value="UHF"]').remove();
             //   $('#txtreqfreqband option[value="VHF"]').remove();



               }
               if(tabla_gain_dlul[i][j] == "800")
               {
           //     $('#txtreqfreqband option[value="UHF"]').remove();
           //     $('#txtreqfreqband option[value="VHF"]').remove();


               }
               if( tabla_gain_dlul[i][j] == "UHF")
               {
            //    $('#txtreqfreqband option[value="700"]').remove();
           //     $('#txtreqfreqband option[value="800"]').remove();



               }
               if(tabla_gain_dlul[i][j]  == "VHF")
               {
          //      $('#txtreqfreqband option[value="700"]').remove();
          //      $('#txtreqfreqband option[value="800"]').remove();



               }


					 if ( 'UNKNOW' == tabla_gain_dlul[i][j] || 'Band' == j  )
					 {
						 html += '<td>' + tabla_gain_dlul[i][j]  +' </td>';
					 }
				     else
					 {
					   html += '<td>' + tabla_gain_dlul[i][j]  +' MHz</td>';
					 }

           v_templistchannel_udul = v_templistchannel_udul  + tabla_gain_dlul[i][j] + "|"


				  }
				  html += '<td>  <a href="#" onclick="borrar_array_uldl('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';
				  html += '</tr>';
				 }
				 html += '</table>';
				 v_templistchannel_udul = v_templistchannel_udul + "#";
			//	 console.log(v_templistchannel_udul);
				 	$('#listagainuldl').html(html);
					$('#templistagainuldl').val(v_templistchannel_udul);


	}

  function copysimplexconfig()
  {
      if ($("#txtsimpleconfigbych").val()=='YES')
      {
        $('#txtchud').val( $('#txtchul').val() );
      }
  }

  function add_channels()
	{
		if ( $("#txtsimpleconfigbych").val()=="YES" || $("#txtsimpleconfigbych").val()=="NO" )
    {
    //tabla_channel_quantity
		var v_dl_channel = parseFloat($('#txtchud').val());
		var v_ul_channel = parseFloat($('#txtchul').val());

		if (v_dl_channel=="" || v_ul_channel =="" || isNaN(v_dl_channel)==true || isNaN(v_ul_channel)==true )
		  {
			  ///|| v_ul_channel ==""
				 var v_loencontre_ch = 0;
         toastr["error"]("UL / DL channel missing", "");
		  }
		  else
		  {

			 var v_loencontre_ch = 0;


					 $.each(tabla_channel_quantity, function (i, value) {
						if (value.channeldl == v_dl_channel)
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}
						if (value.channelul == v_ul_channel)
						{
							// Lo encontre actualizo datos.
							v_loencontre_ch = 1;
						}

					});
          if (tabla_gain_dlul.length==0)
          {
            v_loencontre_ch = 2;
          }
					if ( v_loencontre_ch == 0)
					{
            var validadmm ='N';
                ///////DETECTAMOS BANDA Y NOMBRE
                $.each(tabla_gain_dlul, function (inad, valueband)
                {
                //    console.log(inad + ' -abc -' + valueband.gainulstart);
                    var vvtxtchul = $("#txtchul").val();
                    var vvtxtchud = $("#txtchud").val();


                         if ( $("#txtsimpleconfigbych").val()=="YES")
                          {
                            if (
                               ( parseFloat( valueband.gainulstart ) <= parseFloat(vvtxtchul)) &&
                               ( parseFloat( valueband.gainulstop ) >= parseFloat(vvtxtchul))
                              )
                                {
                                  validadmm ='Y';
                                }
                          }
                          else
                          {
                            if (
                               ( parseFloat( valueband.gainulstart ) <= parseFloat(vvtxtchul)) &&
                               ( parseFloat( valueband.gainulstop ) >= parseFloat(vvtxtchul))  &&
                               ( parseFloat( valueband.gainudstart ) <= parseFloat(vvtxtchud))  &&
                               ( parseFloat( valueband.gainudstop ) >= parseFloat(vvtxtchud))
                              )
                                {
                                  validadmm ='Y';
                                }
                          }


                          if (validadmm =='Y')
                          {
                              tabla_channel_quantity.push({
                                  channelul: parseFloat(v_ul_channel)	,
                                  channeldl: parseFloat(v_dl_channel),
                                  simplexconfig: $("#txtsimpleconfigbych").val(),
                                  bandaname: valueband.Band
                                    });

                                  tabla_channels();

                                  $('#txtchud').val('');
                                  $('#txtchul').val('');
                                  $("#txtchud").focus();
                                  $("#txtchud").focus();
                                  return false; // breaks
                          }




                });

                if (validadmm =='N')
                          {
                            toastr["error"](" out of range", "");
                          }
                /////////FIN DETECTAMOS BANDA Y NOMBRE





					}
          else
          {
             if (v_loencontre_ch ==2)
             {
              toastr["error"]("you should add a band first", "");
             }
             if (v_loencontre_ch ==1)
             {
              toastr["error"]("Freq existing in the list", "");
             }
          }
		  }
    }
	}

  function tabla_channels()
	{
		var jname ="";
		var v_templistchannel="";
			var html = '<table class="table  table-striped table-sm ">';
				 html += '<tr class="thead-dark">';
				 var cantcabez = tabla_channel_quantity[0];

				 for( var j in  cantcabez) {

					 jname= j
					 if (j =='channeldl')
					 {
						 jname="DL Channels (MHz)";
					 }
					  if (j =='channelul')
					 {
						 jname="UL Channels (MHz)";
					 }
           if (j =='simplexconfig')
					 {
						 jname="Simplex Config";
					 }
           if (j =='bandaname')
					 {
						 jname="Band Name";
					 }


				  html += '<th>' + jname + '</th>';

				 }
				  html += '<th>Action</th>';
				 html += '</tr>';
				 for( var i = 0; i < tabla_channel_quantity.length; i++) {
				  html += '<tr>';

				  if (v_templistchannel != '')
				  {
					v_templistchannel = v_templistchannel + "#";
				  }

				  for( var j in tabla_channel_quantity[i] ) {
            ///console.log('a:'+ j);
            if (j =='simplexconfig')
            {
              html += '<td>' + tabla_channel_quantity[i][j]  +' </td>';
            }
            else
            {
                if (j =='bandaname')
              {
                html += '<td>' + tabla_channel_quantity[i][j]  +'  </td>';
              }
              else
              {
                html += '<td>' + tabla_channel_quantity[i][j]  +' MHz</td>';
              }
            }


					///	html += '<td>' + tabla_channel_quantity[i][j]  +'  MHz</td>';
						v_templistchannel = v_templistchannel  + tabla_channel_quantity[i][j] + "|"


				  }
				  html += '<td>  <a href="#" onclick="borrar_array_channel('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';
				  html += '</tr>';
				 }
				 html += '</table>';
				 v_templistchannel = v_templistchannel + "#";
			//	 console.log(v_templistchannel);
				 	$('#listachannel').html(html);
					$('#templistchannel').val(v_templistchannel);

          //Sumamos canales,
        var cant_ch_xband = 0;
        var cant700 =  tabla_channel_quantity.filter(function(value){
              return value.bandaname === '700';
          }).length;
          var cant800 =  tabla_channel_quantity.filter(function(value){
              return value.bandaname === '800';
          }).length;
          var cantUHF =  tabla_channel_quantity.filter(function(value){
              return value.bandaname === 'UHF';
          }).length;
          var cantVHF =  tabla_channel_quantity.filter(function(value){
              return value.bandaname === 'VHF';
          }).length;
          if (cant700 > cant800 )
          {
            cant_ch_xband = cant700;
          }
          else
          {
            cant_ch_xband = cant800;
          }
          if (cant_ch_xband < cantUHF )
          {
            cant_ch_xband = cantUHF;
          }
          if (cant_ch_xband < cantUHF )
          {
            cant_ch_xband = cantUHF;
          }
    ///      console.log('aaaaaaaaaaaaaaaaaa'+ cant_ch_xband );
          $("#numbchxband").val(cant_ch_xband);

	}


  function saveborrado()
  {
    ///// vamos a validar lso datos
var v_txtnomproj = $('#txtnomproj').val();
var hagosubtmit='S';

var v_txtaddressbuild = $('#txtaddressbuild').val();

var v_txtcoordinateslat = $('#txtcoordinateslat').val();

var v_txtcoordinateslon = $('#txtcoordinateslon').val();

// var v_txtfloortype1count = $('#txtfloortype1count').val();
// var v_txtfloortype1countavg = $('#txtfloortype1countavg').val();

// var v_txtfloortype2count = $('#txtfloortype2count').val();

// var v_txtfloortype2countavg = $('#txtfloortype2countavg').val();
var v_txttotalnumberofloors = $('#txttotalnumberofloors').val();
var v_txttotalsquarefoot = $('#txttotalsquarefoot').val();
var v_txtfloorscoverage = $('#txtfloorscoverage').val();


var v_avgfloorheight = $('#avgfloorheight').val();

var v_txtrfenvironment = $('#txtrfenvironment').val();



var v_numbchxband = $('#numbchxband').val();

var v_txtsimpleconfig = ''; /////   $('#txtsimpleconfig').val();

///hasta aca validamos Project Frequency Information
  /// validamos Coverage Requirements

  var v_txtdonorrssi = $('#txtdonorrssi').val();

var v_txtmindlcoverage = $('#txtmindlcoverage').val();

var v_txtminulcoverage = $('#txtminulcoverage').val();

var v_txtdesignmargin = $('#txtdesignmargin').val();


var v_txtindoorantrad = $('#txtindoorantrad').val();


var v_txtmobtxpower = $('#txtmobtxpower').val();

var v_txtdistdonorsite = $('#txtdistdonorsite').val();

var v_txtdonorantgain = $('#txtdonorantgain').val();

var v_txtindoorantgain = $('#txtindoorantgain').val();

var v_txtdonorcoaxloss = $('#txtdonorcoaxloss').val();

var v_txtindoorcoaxloss = $('#txtindoorcoaxloss').val();
 ///hasta aca validamos  Coverage Requirements


  /// validamos BDA Requirements
  var v_txtflorbdalocate = $('#txtflorbdalocate').val();

var v_txttypeclass = $('#txttypeclass').val();

var v_txtbdamainpwr = $('#txtbdamainpwr').val();


var v_txtbbareq = $('#txtbbareq').val();

var v_inexc700 = getValueInExc700();
var v_inexc800 = getValueInExc800();

var v_txtbdadloutputpowervhf = $('#txtbdadloutputpowervhf').val();
var v_txtbdadloutputpoweruhf = $('#txtbdadloutputpoweruhf').val();

  ///hasta aca validamos BDA Requirements

    /// validamos   Alarm Requirements
    var v_txtbrandfirealarm = $('#txtbrandfirealarm').val();

var v_txtbdaroomfirec = $('#txtbdaroomfirec').val();


var v_txtreqremotannunci = $('#txtreqremotannunci').val();

    ///hasta aca validamos   Alarm Requirements
    /// validamos   Design Requirements

    var v_txtneededcoverage = 'agency';//$('#txtneededcoverage').val();


var v_txtreqsystdesing = $('#txtreqsystdesing').val();

  var v_txtahjpack = $('#txtahjpack').val();

  var v_txtinstalltypedesing = $('#txtinstalltypedesing').val();

  var v_txtnaterauakextwalls = $('#txtnaterauakextwalls').val();

  var v_txtnaterauakintwalls = $('#txtnaterauakintwalls').val();

  var v_txtmaterialglasst = $('#txtmaterialglasst').val();

  var v_txtmaterialroof = $('#txtmaterialroof').val();

  var v_txtfirecontrolroom = $('#txtfirecontrolroom').val();

  var v_txtbdaequilocation = $('#txtbdaequilocation').val();

  var v_txtverticalrise = $('#txtverticalrise').val();

  var v_txtdonorant = $('#txtdonorant').val();

  var v_txtdesigntra = $('#txtdesigntra').val();



  var v_txtocupancyfield = $('#txtocupancyfield').val();
  var v_datetimepicker1 = $('#datetimepicker1').val();
  var v_datetimepicker2 = $('#datetimepicker2').val();




var v_templistchannel = $('#templistchannel').val();
var v_templistagainuldl = $('#templistagainuldl').val();
//hasta aca validamos   Design Requirements
var v_txtspecialinst = $('#txtspecialinst').val();

var v_iiddpp = $('#projectdraft').val();
var v_iiddpprr = $('#projectdraftrev').val();
var v_stateproj = 'D';

      //enviamos para crear presup
          return new Promise(function(resolve, reject) {
                var formData = new FormData();
            var req = new XMLHttpRequest();

            $("#txterror").html('');
            $("#diverror").hide();

           //consulta si devolvio el Scan Device
           formData.append("v_idproject", v_iiddpp);
           formData.append("v_idprojectr", v_iiddpprr);
            formData.append("v_txtnomprojdb", v_txtnomproj);
            formData.append("v_txtaddressbuild", v_txtaddressbuild);
            formData.append("v_txtcoordinateslat", v_txtcoordinateslat);
            formData.append("v_txtcoordinateslon", v_txtcoordinateslon);
            formData.append("v_stateproj", v_stateproj);


            // formData.append("v_txtfloortype1count", v_txtfloortype1count);
            // formData.append("v_txtfloortype1countavg", v_txtfloortype1countavg);
            // formData.append("v_txtfloortype2count", v_txtfloortype2count);
            // formData.append("v_txtfloortype2countavg", v_txtfloortype2countavg);
            formData.append("v_txttotalnumberofloors", v_txttotalnumberofloors);
            formData.append("v_txtfloortype1count", v_txtfloorscoverage);
            formData.append("v_txtfloortype1countavg", v_txttotalsquarefoot / v_txttotalnumberofloors);
            formData.append("v_txtfloortype2count", 0);
            formData.append("v_txtfloortype2countavg", 0);

            formData.append("v_avgfloorheight", v_avgfloorheight);

            formData.append("v_txtrfenvironment", v_txtrfenvironment);



            formData.append("tabla_channel_quantity", v_templistchannel);
            formData.append("tabla_gain_dlul", v_templistagainuldl);

     //       tabla_channel_quantity
  //tabla_gain_dlul
              formData.append("v_numbchxband", v_numbchxband);
            formData.append("v_txtsimpleconfig", v_txtsimpleconfig);

            formData.append("v_txtdonorrssi", v_txtdonorrssi);
            formData.append("v_txtmindlcoverage", v_txtmindlcoverage);
            formData.append("v_txtminulcoverage", v_txtminulcoverage);
            formData.append("v_txtdesignmargin", v_txtdesignmargin);
            formData.append("v_txtindoorantrad", v_txtindoorantrad);
            formData.append("v_txtmobtxpower", v_txtmobtxpower);
            formData.append("v_txtdistdonorsite", v_txtdistdonorsite);
            formData.append("v_txtdonorantgain", v_txtdonorantgain);
            formData.append("v_txtindoorantgain", v_txtindoorantgain);
            formData.append("v_txtdonorcoaxloss", v_txtdonorcoaxloss);
            formData.append("v_txtindoorcoaxloss", v_txtindoorcoaxloss);



            formData.append("v_txtflorbdalocate", v_txtflorbdalocate);
            formData.append("v_txttypeclass", v_txttypeclass);
            formData.append("v_txtbdamainpwr", v_txtbdamainpwr);
            formData.append("v_inexc700", v_inexc700);
            formData.append("v_inexc800", v_inexc800);
            formData.append("v_txtbdadloutputpowervhf", v_txtbdadloutputpowervhf);
            formData.append("v_txtbdadloutputpoweruhf", v_txtbdadloutputpoweruhf);
            formData.append("v_txtbbareq", v_txtbbareq);
            formData.append("v_txtbrandfirealarm", v_txtbrandfirealarm);
            formData.append("v_txtbdaroomfirec", v_txtbdaroomfirec);
            formData.append("v_txtreqremotannunci", v_txtreqremotannunci);
            formData.append("v_txtreqsystdesing", v_txtreqsystdesing);
            formData.append("v_txtahjpack", v_txtahjpack);
            formData.append("v_txtinstalltypedesing", v_txtinstalltypedesing);
            formData.append("v_txtnaterauakextwalls", v_txtnaterauakextwalls);
            formData.append("v_txtnaterauakintwalls", v_txtnaterauakintwalls);
            formData.append("v_txtmaterialglasst", v_txtmaterialglasst);
            formData.append("v_txtmaterialroof", v_txtmaterialroof);
            formData.append("v_txtfirecontrolroom", v_txtfirecontrolroom);
            formData.append("v_txtbdaequilocation", v_txtbdaequilocation);
            formData.append("v_txtverticalrise", v_txtverticalrise);
            formData.append("v_txtdonorant", v_txtdonorant);
            formData.append("v_txtspecialinst", v_txtspecialinst);
            formData.append("v_txtneededcoverage", v_txtneededcoverage);
            formData.append("v_txtocupancyfield", v_txtocupancyfield);
            formData.append("v_datetimepicker1", v_datetimepicker1);
            formData.append("v_datetimepicker2", v_datetimepicker2);
            formData.append("v_txtdesigntra", v_txtdesigntra);



            req.open("POST", "ajax_listproject.php");
         //   toastr["info"]("Sending information", "");
            req.send(formData);

              req.onload = function() {
                if (req.status == 200) {
                  //console.log(req.response)

                  var datos = JSON.parse(req.response);
                ///  console.log (datos.resultiu);
               /// resolve(JSON.parse(req.response));
               if (datos.resultiu=='ok')
                      {
                        toastr["success"]("Draft Save", "");
                    ///    window.location = 'listprojects.php';
                      }



                }
                else {
                reject();
                }
              };


            })
					///fin enviamos crear presup



  }

  function save_new_registro()
  {

    if(s_flexesdchandeal=='FIPLEX_SI')
      {

        document.getElementById('txtaddressbuild').value='NA';
        document.getElementById('txtflorbdalocate').value="1";
        document.getElementById('txtdistdonorsite').value="1";
  
      }

      var regexAlfaNumSimbA = /^[a-zA-Z0-9&#()_\-\[\],\. ]*$/;

         /*Project Name*/
    if ($("#txtnomproj").val().match(regexAlfaNumSimbA)) {
        var v_txtnomproj = $('#txtnomproj').val();
        var hagosubtmit='S';
    } else {
        hagosubtmit = 'N';
        toastr["error"]("Project name is invalid - required", "");
    }




///// vamos a validar lso datos

var v_txtaddressbuild = $('#txtaddressbuild').val();
if (v_txtaddressbuild =='') { hagosubtmit = 'N';  toastr["error"](" Building Address is required", "");}


var v_txtcoordinateslat = $('#txtcoordinateslat').val();
///if (v_txtcoordinateslat =='') { hagosubtmit = 'N';  toastr["error"](" Building Coordinates Lat is required", "");}

var v_txtcoordinateslon = $('#txtcoordinateslon').val();
//if (v_txtcoordinateslon =='') { hagosubtmit = 'N';  toastr["error"](" Building Coordinates Lon is required", "");}

var v_txtinstalltypedesing = $('#txtinstalltypedesing').val();

// var v_txtfloortype1countselect = $('#txtfloortype1countselect').val();
// if (v_txtfloortype1countselect =='') { hagosubtmit = 'N';  toastr["error"](" Number of floor types is required", "");}
// var v_txtfloortype1count = $('#txtfloortype1count').val();
// if (v_txtfloortype1count =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 1 Count is required ", "");}
// var v_txtfloortype1countavg = $('#txtfloortype1countavg').val();
// if (v_txtfloortype1countavg =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 1 average area (sqft) is required ", "");}

// var v_txtfloortype1countselect = $('#txtfloortype1countselect').val();
// if (v_txtfloortype1countselect==2)
// {
//   var v_txtfloortype2count = $('#txtfloortype2count').val();
//   if (v_txtfloortype2count =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 2 Count is required ", "");}
//   var v_txtfloortype2countavg = $('#txtfloortype2countavg').val();
//   if (v_txtfloortype2countavg =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 2 average area (sqft) is required ", "");}

// }

var v_txttotalnumberofloors= $('#txttotalnumberofloors').val();
if (v_txttotalnumberofloors =='') { hagosubtmit = 'N';  toastr["error"]("Total number of floors of a building is required ", "");}
var v_txttotalsquarefoot = $('#txttotalsquarefoot').val();
if (v_txttotalsquarefoot ==''|| parseFloat(v_txttotalsquarefoot) <= 0) { hagosubtmit = 'N';  toastr["error"]("Total square foot of a building is required and must be a positive value", "");}
var v_txtfloorscoverage = $('#txtfloorscoverage').val();
var validado = validarEntero(v_txtfloorscoverage);
if (parseInt(v_txtfloorscoverage) > parseInt(v_txttotalnumberofloors) || validado==0) { hagosubtmit = 'N';  toastr["error"]("Number of floors that need coverage (based on survey) is required and must be a valid value", "");}


var v_txtdesigntra = $('#txtdesigntra').val();
if (v_txtdesigntra =='') { hagosubtmit = 'N';  toastr["error"]("Design Transition is required ", "");}


var v_avgfloorheight = $('#avgfloorheight').val();
if (v_avgfloorheight =='') { hagosubtmit = 'N';  toastr["error"]("Average Floor Height is required ", "");}

var v_txtrfenvironment = $('#txtrfenvironment').val();
if (v_txtrfenvironment =='') { hagosubtmit = 'N';  toastr["error"]("Building Type is required ", "");}


  ///hasta aca validamos Project Information
  /// validamos Project Frequency Information
  var v_txttypeclass = $('#txttypeclass').val();
  if (v_txttypeclass== 'A')
  {
    //  if (  tabla_channel_quantity.length==0)  { hagosubtmit = 'N';  toastr["error"]("Frequency Bands is required    ", "");}

  }
  if (  tabla_gain_dlul.length==0)  { hagosubtmit = 'N';  toastr["error"]("Frequency Bands is required    ", "");}

/////////// INICIO Max number of channels
var v_numbchxband = $('#numbchxband').val();

//Si la tabla de bandas contiene un VHF o UHF. Calcular numero de channels desde esta tabla
for( var i = 0; i < tabla_gain_dlul.length; i++) 
  {
   for( var j in tabla_gain_dlul[i] ) 
   {
     if( tabla_gain_dlul[i][j] == "UHF" || tabla_gain_dlul[i][j]  == "VHF")
     {
       v_numbchxband = tabla_gain_dlul.length;
     }
   }
 }

//Habilitar para probar el conteo de channels en la tabla
//if (0==0) { hagosubtmit = 'N';  toastr["error"]("&&& uhf vhf chann= "+ v_numbchxband, "");}

var validado = validarEntero(v_numbchxband);
if (validado==0) { hagosubtmit = 'N';  toastr["error"]("Number of Channels for each band  is required and must be a valid value", "");}

/////////// FIN Max number of channels


var v_txtsimpleconfig = $('#txtsimpleconfig').val();

///hasta aca validamos Project Frequency Information
  /// validamos Coverage Requirements

  var v_txtdonorrssi = $('#txtdonorrssi').val();
if (v_txtdonorrssi =='') { hagosubtmit = 'N';  toastr["error"]("Donor RSSI is required ", "");}




var v_txtmindlcoverage = $('#txtmindlcoverage').val();
if (v_txtmindlcoverage =='') { hagosubtmit = 'N';  toastr["error"]("Min DL Coverage is required ", "");}

var v_txtminulcoverage = $('#txtminulcoverage').val();
if (v_txtminulcoverage =='') { hagosubtmit = 'N';  toastr["error"]("Min UL Coverage is required ", "");}

var v_txtdesignmargin = $('#txtdesignmargin').val();
if (v_txtdesignmargin =='') { hagosubtmit = 'N';  toastr["error"]("Desing Margin is required ", "");}

var v_txtindoorantrad = $('#txtindoorantrad').val();
if (v_txtindoorantrad =='') { hagosubtmit = 'N';  toastr["error"]("Indoor Antenna Radius is required ", "");}

var v_txtmobtxpower = $('#txtmobtxpower').val();
if (v_txtmobtxpower =='') { hagosubtmit = 'N';  toastr["error"]("Mobile TX Power  is required ", "");}

var v_txtdistdonorsite = $('#txtdistdonorsite').val();
if (parseFloat(v_txtdistdonorsite) <= 0) { hagosubtmit = 'N';  toastr["error"]("Distance to Donor Site must be a valid range value", "");}

var v_txtdonorantgain = $('#txtdonorantgain').val();
if (v_txtdonorantgain =='') { hagosubtmit = 'N';  toastr["error"]("Donor Antenna Gain  is required ", "");}

var v_txtindoorantgain = $('#txtindoorantgain').val();
if (v_txtindoorantgain =='') { hagosubtmit = 'N';  toastr["error"]("Indoor Antenna Gain is required ", "");}

var v_txtdonorcoaxloss = $('#txtdonorcoaxloss').val();
if (v_txtdonorcoaxloss =='') { hagosubtmit = 'N';  toastr["error"]("Donor Coax Cable Loss is required ", "");}

var v_txtindoorcoaxloss = $('#txtindoorcoaxloss').val();
if (v_txtindoorcoaxloss =='') { hagosubtmit = 'N';  toastr["error"]("Indoor Coax Cable Loss  is required ", "");}
  ///hasta aca validamos  Coverage Requirements


  /// validamos BDA Requirements
  var v_txtflorbdalocate = $('#txtflorbdalocate').val();
  var validado_v_txtflorbdalocate = validarEntero(v_txtflorbdalocate);
if (validado_v_txtflorbdalocate == 0 || parseInt(v_txtfloorscoverage) == 0 ) { hagosubtmit = 'N';  toastr["error"]("Which Floor will the BDA be located must be a valid value", "");}


var v_txtflorbdalocate = $('#txtflorbdalocate').val();

var v_txttypeclass = $('#txttypeclass').val();

var v_txtbdamainpwr = $('#txtbdamainpwr').val();

var v_inexc700 = getValueInExc700();
var v_inexc800 = getValueInExc800();

var v_txtbdadloutputpowervhf = $('#txtbdadloutputpowervhf').val();
var v_txtbdadloutputpoweruhf = $('#txtbdadloutputpoweruhf').val();
//if (v_txtbdadloutputpower =='') { hagosubtmit = 'N';  toastr["error"]("BDA DL Output power is required ", "");}


var v_txtbbareq = $('#txtbbareq').val();

var v_txtbbareq = $('#txtbbareq').val();
if (v_txtbbareq =='') { hagosubtmit = 'N';  toastr["error"]("Is a Battery Backup Unit Required for the BDA is required ", "");}


  ///hasta aca validamos BDA Requirements

    /// validamos   Alarm Requirements

    v_txtdesigntra = $("#txtdesigntra").val();
//console.log('aca esta'+v_txtdesigntra);
if(v_txtdesigntra != 'quickquote')
{
  var v_txtbrandfirealarm = $('#txtbrandfirealarm').val();
  var v_txtbdaroomfirec = $('#txtbdaroomfirec').val();
  if (v_txtbrandfirealarm =='') { hagosubtmit = 'N';  toastr["error"](" What is the Brand of the Fire Alarm Control Panel(FACP) Interface is required ", "");}
  if (v_txtbdaroomfirec =='') { hagosubtmit = 'N';  toastr["error"]("Will the BDA equipment be installed in the main Fire Control Room containing the FACP Interface is required ", "");}

}else{
  var v_txtbrandfirealarm = $('#txtbrandfirealarm').val();
  var v_txtbdaroomfirec = $('#txtbdaroomfirec').val();
}


var v_txtreqremotannunci = $('#txtreqremotannunci').val();
if (v_txtreqremotannunci =='') { hagosubtmit = 'N';  toastr["error"]("Will you require a remote annunciator is required ", "");}

    ///hasta aca validamos   Alarm Requirements
    /// validamos   Design Requirements
    v_txtneededcoverage='agency';
    /* var v_txtneededcoverage = $('#txtneededcoverage').val();
  if (v_txtneededcoverage =='') { hagosubtmit = 'N';  toastr["error"]("Coverage Needed for Which Public Safety Agencies is required ", "");}
 */


  var v_txtocupancyfield = $('#txtocupancyfield').val();
  if (v_txtocupancyfield =='') { hagosubtmit = 'N';  toastr["error"]("Ocupancy fieldis required ", "");}

//=======================================BID DUE DATE====================================================================
var fechaduedate = $('#datetimepicker1').val();

var validarfecha = validarFecha(fechaduedate);

if (validarfecha == -1)
{
  hagosubtmit = 'N';
  toastr["error"](" Building due date is required ", "");
}
else{
  var v_datetimepicker1=fechaduedate;
}
//========================================INSTALLATION DATE=============================================================================

var fechainstalacion = $('#datetimepicker2').val();

var validarfecha2 = validarFecha(fechainstalacion);

if (validarfecha2 ==-1)
{
  hagosubtmit = 'N';
  toastr["error"](" Installation date is required ", "");
}
else{
  var v_datetimepicker2=fechainstalacion;
}
//=====================================================================================================================

var v_txtreqsystdesing = $('#txtreqsystdesing').val();
if (v_txtreqsystdesing =='') { hagosubtmit = 'N';  toastr["error"]("Will you require a system design is required ", "");}
if (v_txtreqsystdesing=='YES')
{
  var v_txtahjpack = $('#txtahjpack').val();

  if (v_txtahjpack =='') { hagosubtmit = 'N';  toastr["error"]("Do you need a complete AHJ Submittal Package is required ", "");}



  var v_txtnaterauakextwalls = $('#txtnaterauakextwalls').val();
  if (v_txtnaterauakextwalls =='') {
    //hagosubtmit = 'N';  toastr["error"]("Construction Materials – Exterior Walls is required ", "");
    $('#txtnaterauakextwalls').val('Unknown');
    v_txtnaterauakextwalls ='Unknown';
    }

  var v_txtnaterauakintwalls = $('#txtnaterauakintwalls').val();
  if (v_txtnaterauakintwalls =='') {
    // hagosubtmit = 'N';  toastr["error"]("Construction Materials – Interior Wallsis required ", "");
    $('#txtnaterauakintwalls').val('Unknown');
    v_txtnaterauakintwalls ='Unknown';
    }

  var v_txtmaterialglasst = $('#txtmaterialglasst').val();
  if (v_txtmaterialglasst =='') {
    // hagosubtmit = 'N';  toastr["error"]("Construction Materials – Glass Type is required ", "");
    $('#txtmaterialglasst').val('Unknown');
    v_txtmaterialglasst ='Unknown';
    }

  var v_txtmaterialroof = $('#txtmaterialroof').val();
  if (v_txtmaterialroof =='') {
    // hagosubtmit = 'N';  toastr["error"]("Construction Materials – Roof Type is required ", "");
    $('#txtmaterialroof').val('Unknown');
    v_txtmaterialroof ='Unknown';
    }

  var v_txtfirecontrolroom = $('#txtfirecontrolroom').val();
  if (v_txtfirecontrolroom =='') {
    // hagosubtmit = 'N';  toastr["error"]("Fire Control Room Location is required ", "");
    $('#txtfirecontrolroom').val('Unknown');
    v_txtfirecontrolroom ='Unknown';
    }

  var v_txtbdaequilocation = $('#txtbdaequilocation').val();
  if (v_txtbdaequilocation =='') {
    // hagosubtmit = 'N';  toastr["error"]("BDA Equipment Location is required ", "");
    $('#txtbdaequilocation').val('Unknown');
    v_txtbdaequilocation ='Unknown';
    }

  var v_txtverticalrise = $('#txtverticalrise').val();
  if (v_txtverticalrise =='') {
    //hagosubtmit = 'N';  toastr["error"]("Vertical Riser Location is required ", "");
    $('#txtverticalrise').val('Unknown');
    v_txtverticalrise ='Unknown';
    }

  var v_txtdonorant = $('#txtdonorant').val();
  if (v_txtdonorant =='') {
     //hagosubtmit = 'N';  toastr["error"]("Donor Antenna Location is required ", "");
     $('#txtdonorant').val('Unknown');
     v_txtdonorant ='Unknown';
  }




}


var v_templistchannel = $('#templistchannel').val();
var v_templistagainuldl = $('#templistagainuldl').val();
//hasta aca validamos   Design Requirements
var v_txtspecialinst = $('#txtspecialinst').val();

var v_iiddpp = $('#projectdraft').val();
var v_iiddpprr = $('#projectdraftrev').val();
var v_stateproj = 'P';

if (hagosubtmit=='S')
{        //enviamos para crear presup
          return new Promise(function(resolve, reject) {
                var formData = new FormData();
            var req = new XMLHttpRequest();

            $("#txterror").html('');
            $("#diverror").hide();

           //consulta si devolvio el Scan Device
           formData.append("v_idproject", v_iiddpp);
           formData.append("v_idprojectr", v_iiddpprr);
            formData.append("v_txtnomprojdb", v_txtnomproj);
            formData.append("v_txtaddressbuild", v_txtaddressbuild);
            formData.append("v_txtcoordinateslat", v_txtcoordinateslat);
            formData.append("v_txtcoordinateslon", v_txtcoordinateslon);
            formData.append("v_stateproj", v_stateproj);

            // formData.append("v_txtfloortype1countselect", v_txtfloortype1countselect);


            // formData.append("v_txtfloortype1count", v_txtfloortype1count);
            // formData.append("v_txtfloortype1countavg", v_txtfloortype1countavg);
            // formData.append("v_txtfloortype2count", v_txtfloortype2count);
            // formData.append("v_txtfloortype2countavg", v_txtfloortype2countavg);

            formData.append("v_txtfloortype1countselect", 1);
            formData.append("v_txttotalnumberofloors", v_txttotalnumberofloors);
            formData.append("v_txtfloortype1count", v_txtfloorscoverage);
            formData.append("v_txtfloortype1countavg", v_txttotalsquarefoot / v_txttotalnumberofloors);
            formData.append("v_txtfloortype2count", 0);
            formData.append("v_txtfloortype2countavg", 0);
            formData.append("v_avgfloorheight", v_avgfloorheight);

            formData.append("v_txtrfenvironment", v_txtrfenvironment);



            formData.append("tabla_channel_quantity", v_templistchannel);
            formData.append("tabla_gain_dlul", v_templistagainuldl);

     //       tabla_channel_quantity
  //tabla_gain_dlul
              formData.append("v_numbchxband", v_numbchxband);
            formData.append("v_txtsimpleconfig", v_txtsimpleconfig);

            formData.append("v_txtdonorrssi", v_txtdonorrssi);
            formData.append("v_txtmindlcoverage", v_txtmindlcoverage);
            formData.append("v_txtminulcoverage", v_txtminulcoverage);
            formData.append("v_txtdesignmargin", v_txtdesignmargin);
            formData.append("v_txtindoorantrad", v_txtindoorantrad);
            formData.append("v_txtmobtxpower", v_txtmobtxpower);
            formData.append("v_txtdistdonorsite", v_txtdistdonorsite);
            formData.append("v_txtdonorantgain", v_txtdonorantgain);
            formData.append("v_txtindoorantgain", v_txtindoorantgain);
            formData.append("v_txtdonorcoaxloss", v_txtdonorcoaxloss);
            formData.append("v_txtindoorcoaxloss", v_txtindoorcoaxloss);



            formData.append("v_txtflorbdalocate", v_txtflorbdalocate);
            formData.append("v_txttypeclass", v_txttypeclass);

            formData.append("v_inexc700", v_inexc700);
            formData.append("v_inexc800", v_inexc800);
            formData.append("v_txtbdadloutputpoweruhf", v_txtbdadloutputpoweruhf);
            formData.append("v_txtbdadloutputpowervhf", v_txtbdadloutputpowervhf);

            formData.append("v_txtbdamainpwr", v_txtbdamainpwr);
            formData.append("v_txtbbareq", v_txtbbareq);
            formData.append("v_txtbrandfirealarm", v_txtbrandfirealarm);
            formData.append("v_txtbdaroomfirec", v_txtbdaroomfirec);
            formData.append("v_txtreqremotannunci", v_txtreqremotannunci);
            formData.append("v_txtreqsystdesing", v_txtreqsystdesing);
            formData.append("v_txtahjpack", v_txtahjpack);
            formData.append("v_txtinstalltypedesing", v_txtinstalltypedesing);
            formData.append("v_txtnaterauakextwalls", v_txtnaterauakextwalls);
            formData.append("v_txtnaterauakintwalls", v_txtnaterauakintwalls);
            formData.append("v_txtmaterialglasst", v_txtmaterialglasst);
            formData.append("v_txtmaterialroof", v_txtmaterialroof);
            formData.append("v_txtfirecontrolroom", v_txtfirecontrolroom);
            formData.append("v_txtbdaequilocation", v_txtbdaequilocation);
            formData.append("v_txtverticalrise", v_txtverticalrise);
            formData.append("v_txtdonorant", v_txtdonorant);
            formData.append("v_txtspecialinst", v_txtspecialinst);
            formData.append("v_txtneededcoverage", v_txtneededcoverage);


            formData.append("v_txtocupancyfield", v_txtocupancyfield);
            formData.append("v_datetimepicker1", v_datetimepicker1);
            formData.append("v_datetimepicker2", v_datetimepicker2);
            formData.append("v_txtdesigntra", v_txtdesigntra);


            req.open("POST", "ajax_listproject.php");
            toastr["info"]("Sending information", "");
            req.send(formData);

              req.onload = function() {
                if (req.status == 200) {
                  //console.log(req.response)

                  var datos = JSON.parse(req.response);
             //     console.log (datos.resultiu);
               /// resolve(JSON.parse(req.response));
               if (datos.resultiu=='ok')
                      {
                      //  toastr["success"]("Registered project", "");
                        tabla_channel_quantity.length=0;
                        tabla_gain_dlul.length=0;
                                              Swal.fire(
                        'Project successfully submitted',
                        '',
                        'success'
                      ).then((result) => {
                        window.location = 'listprojects.php';
                        })




                      }
                      else
                      {
                        toastr["error"]("Project not registered", "");
                      }


                }
                else {
                reject();
                }
              };


            })
					///fin enviamos crear presup


  }
  else
  {
    toastr["error"]("Error,incomplete information", "");
  }

  }

function openattach(iddivsearch)
{

 var seed_associed = $("#tkkeymarco"+iddivsearch).val();

 var vv_idp = $("#projectdraft").val();
 var vv_idprev = $("#projectdraftrev").val();
//console.log(seed_associed);



  eModal.iframe('attachfileproject.php?idt='+seed_associed+'&idp='+vv_idp+'&idpr='+vv_idprev+'&openattach='+iddivsearch,'Attach files to project  ');

  setTimeout('controlattach('+iddivsearch+')',1000);


}

function refrescaattach(iddivacontrolar)
{
  var vv_idp = $("#projectdraft").val();
        var vv_idprev = $("#projectdraftrev").val();
        var vv_se = $("#tkkeymarco1").val();

         $.ajax
            ({
              url: 'ajax_listattachfileproject.php',
              data: 'idtype='+vv_se+'&idp='+vv_idp+'&idpr='+vv_idprev+'&openattach='+iddivacontrolar,
              type: 'post',
              datatype:'JSON',
              success: function(data)
              {
              //	alert(data.resultiu);
       //       console.log(data.attachlist);
              $("#myDrop"+iddivacontrolar).empty();
                  for(var i=0; i< data.attachlist.length ;i++)
                {
           //         console.log(data.attachlist[i].fileattach );

                  //  myDrop1
                    $("#myDrop"+iddivacontrolar).append("<i class='fas fa-file'></i> "+data.attachlist[i].fileattach+" <a href='#' onclick='delattach('"+ data.attachlist[i].idnroattach +","+data.attachlist[i].fileattach+"')'><i class='far fa-times-circle' style='color:red'></i></a><br>" );
                }

              }
            });
}

function controlattach(iddivacontrolar)
{
  //console.log('call' + iddivacontrolar);
  $('.x').click(function () {
       //  console.log('CERRADO2');
         var vv_idp = $("#projectdraft").val();
        var vv_idprev = $("#projectdraftrev").val();
        var vv_se = $("#tkkeymarco1").val();

         $.ajax
            ({
              url: 'ajax_listattachfileproject.php',
              data: 'idtype='+vv_se+'&idp='+vv_idp+'&idpr='+vv_idprev+'&openattach='+iddivacontrolar,
              type: 'post',
              datatype:'JSON',
              success: function(data)
              {
              //	alert(data.resultiu);
           //   console.log(data.attachlist);
              $("#myDrop"+iddivacontrolar).empty();
                  for(var i=0; i< data.attachlist.length ;i++)
                {
               //     console.log(data.attachlist[i].fileattach );

                  //  myDrop1
                    $("#myDrop"+iddivacontrolar).append("<i class='fas fa-file'></i> "+data.attachlist[i].fileattach+" <a href='#' onclick='delattach('"+ data.attachlist[i].idnroattach +","+data.attachlist[i].fileattach+"')'><i class='far fa-times-circle' style='color:red'></i></a><br>" );
                }

              }
            });


    });
}

function delattach(idfileatttodel, nombrefile)
{
/// inicio del

//console.log(idfileatttodel);
//console.log(nombrefile);

Swal.fire({
title:'are you sure you want to delete '+ nombrefile +' from the project ?',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  cancelButtonText:'No',
    confirmButtonText: 'Yes',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {
	 // alert(login);
	  if (login =='')
	  {


	  }
	  else
	  {
		  allowOutsideClick: () => !Swal.isLoading()

      var vv_idp = $("#projectdraft").val();
        var vv_idprev = $("#projectdraftrev").val();


		return fetch('delattachprojflexbda.php?v0='+vv_idp+'&v1='+vv_idprev+'&v2='+idfileatttodel)
      .then(response => {

        if (!response.ok) {
          throw new Error(response.statusText)
        }
        return response.json()
      })
      .catch(error => {
        Swal.showValidationMessage(
          `Request failed: ${error}`
        )
      })
	   }

  },
 // allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
 // console.log(result);
  if (result.value.ok=="ok") {
  /*  Swal.fire({
      title: `${result.value.result}'`,
      imageUrl: result.value.avatar_url
    })*/
	Swal.fire({
							  title: 'Deleted!',
							  icon: 'success',
							  showCancelButton: false,
							  confirmButtonColor: '#3085d6',
							  confirmButtonText: 'OK',
							}).then((result) => {
							 //aca refresgg
               refrescaattach(1);
               refrescaattach(2);
               window.location = 'listprojects.php';
							})
  }
  else
  {
	  alert('Error');
  }
})

///fin del
}

function deleteame_proy(diproject, nombreproj)
{
/// inicio del

//console.log(idfileatttodel);
//console.log(nombrefile);

Swal.fire({
title:'are you sure you want to inactive the project: '+ nombreproj +' ?',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  cancelButtonText:'No',
    confirmButtonText: 'Yes',
  showLoaderOnConfirm: true,
  preConfirm: (login) => {
	 // alert(login);
	  if (login =='')
	  {


	  }
	  else
	  {
		  allowOutsideClick: () => !Swal.isLoading()




		return fetch('ajainactiveproject.php?v0='+diproject+'&v1=1&v2=2')
      .then(response => {

        if (!response.ok) {
          throw new Error(response.statusText)
        }
        return response.json()
      })
      .catch(error => {
        Swal.showValidationMessage(
          `Request failed: ${error}`
        )
      })
	   }

  },
 // allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  console.log(result);

  if (result.value=="ok") {
  /*  Swal.fire({
      title: `${result.value.result}'`,
      imageUrl: result.value.avatar_url
    })*/
	Swal.fire({
							  title: 'Deleted!',
							  icon: 'success',
							  showCancelButton: false,
							  confirmButtonColor: '#3085d6',
							  confirmButtonText: 'OK',
							}).then((result) => {
							 //aca refresgg
               refrescaattach(1);
               refrescaattach(2);
							})
  }
  else
  {
	  alert('Error');
  }
})

///fin del
}




function habilitomasinfo(qhacemos)
{
 // console.log('qhacemos:'+qhacemos)
  if (qhacemos=='YES')
  {
    var elementss = $(".modedesinginfo");
  //  elementss.removeClass('d-none');
    elementss.prop("disabled", false);
  }
  else
  {
    var elementno = $(".modedesinginfo");
    elementno.prop("disabled", true);
  }
}

function habilitarfloortype  (paramtype)
{
 // console.log(paramtype);
  if (paramtype ==1)
  {
    var elementss = $(".habfloor2");
    elementss.addClass('d-none');
  }
  else
  {
    var elementss = $(".habfloor2");
    elementss.removeClass('d-none');
  }

}

function habsimplexch(qaccion)
{
  if(qaccion=='YES')
  {
    $("#txtchud").prop("disabled", true);
    copysimplexconfig();
  }
  else
  {
    $("#txtchud").prop("disabled", false);
  }
}

function search_data_band(bandabuscado)
{
    $.ajax
            ({
              url: 'ajax_listband.php',
              data: "idb="+bandabuscado,
              type: 'post',
              datatype:'JSON',
              success: function(data)
              {
              //	alert(data.resultiu);
              console.log(data);
              console.log( data.arr_idband.length)
                  for(var i=0; i< data.arr_idband.length ;i++)
                {
                 //   console.log(data.arr_idband[i].fstartul );
                    $("#txtchulstart").val(  data.arr_idband[i].fstartul );
                    $("#txtchulstop").val( data.arr_idband[i].fstopul );
                    $("#txtchudstart").val( data.arr_idband[i].fstartdl );
                    $("#txtchudstop").val( data.arr_idband[i].fstopdl );
                }

              }
            });

  if( $('#txttypeclass').val() == 'A' )
  {
    if( $("#txtreqfreqband").val() == "UHF" || $("#txtreqfreqband").val() == "VHF")
    {
      //oculta: Max Number of Channels
      $("#losch2").addClass("d-none");  
    }
    else
    {
      //muestra: Max Number of Channels
      $("#losch2").removeClass("d-none");  
    }
  }

}
function hoy_dtpk()
{
  var hoydtp = new Date();
  dia=hoydtp.getDate()-1;
  mes=hoydtp.getMonth()+1;
  anio=hoydtp.getFullYear()

  if(mes.toString().length==1)
  {
  mes='0'+mes;
  }

  if(dia.toString().length==1)
  {
  dia='0'+dia;
  }
  hoydtp=anio+'-'+mes+'-'+dia;
//console.log(hoydtp);
  return hoydtp;
}

function desde_dtpk(){
  var desde_dtpk = new Date();
  dia=desde_dtpk.getDate()-7;
  mes=desde_dtpk.getMonth()+1;
  anio=desde_dtpk.getFullYear()

  if(mes.toString().length==1)
  {
  mes='0'+mes;
  }

  if(dia.toString().length==1)
  {
  dia='0'+dia;
  }
  desde_dtpk=anio+'-'+mes+'-'+dia;
  //console.log(desde_dtpk);
  return desde_dtpk;
}

function carga_fechas_default_dtp()
{
  var dateTod = hoy_dtpk();
  var dateFromd = desde_dtpk();
  $("#datetimepickerfrom").val(dateFromd);
  $("#datetimepickerto").val(dateTod);
  search_procesados()
  //console.log(dateFromd+' '+dateTod);
}


function search_procesados()
{

      var dateFrom = $('#datetimepickerfrom').val();
      //console.log(dateFrom);
      var dateTo = $('#datetimepickerto').val();
      $.ajax
            ({
              url: 'ajax_datesreport.php',
              data: "dateFrom="+dateFrom+"&dateTo="+dateTo,
              type: 'post',
              datatype:'JSON',
              success: function(data)
              {
              //	alert(data.resultiu);
              //console.log(data);
              //console.log( data.arr_idband.length)
                  for(var i=0; i< data.arr_idband.length ;i++)
                {
                 //   console.log(data.arr_idband[i].fstartul );
                    $("#notifierproc").text(  data.arr_idband[i].notifier );
                    $("#gamefare").text( data.arr_idband[i].gamefare );
                    $("#cbsi").text( data.arr_idband[i].cbsi );
                    $("#total3").text( data.arr_idband[i].total3 );


                }


              }
            });
}


function chequearmaxvalor( elvalor, elmaximo)
{
 // console.log(elvalor);
 // console.log(elmaximo);
  if( elvalor>elmaximo)
  {
    $("#numbchxband").val(32);
    toastr["error"]("Error,the maximum possible value is 32", "");
  }
}

function floorscoverage()
{

  var v_txtfloorscoverage = $('#txtfloorscoverage').val();
  var v_txttotalfloors = $('#txttotalnumberofloors').val();
  var vacio;
  if(v_txtfloorscoverage =="" || v_txtfloorscoverage==null || vacio=='N'){
    vacio='N';
    document.querySelector('#txtfloorscoverage').value= v_txttotalfloors;

  }
}


var validarEntero = function (campoFormulario) {

var valor = campoFormulario;
var validadorEntero=1;

if(valor<1 || isNaN(valor) || valor % 1!==0){
    return validadorEntero=0;
 }
 return validadorEntero;
}

function verificarFormQuickQuote()
{
  filter_esdchanneldealer();
  v_txtdesigntra = $("#txtdesigntra").val();
  if(v_txtdesigntra=="quickquote"){

    $("#adjunto1").addClass("d-none");
    $("#adjunto2").addClass("d-none");
    $("#buildaddress").addClass("d-none");
    $("#coordlat").addClass("d-none");
    $("#coordlong").addClass("d-none");
    $("#floorlocated").addClass("d-none");
    $("#coveragerequirements").addClass("d-none");
    $("#distancetodonor").addClass("d-none");
    $("#designrequirements").addClass("d-none");
    $("#materialsexterior").addClass("d-none");
    $("#materialsinterior").addClass("d-none");
    $("#mglasstype").addClass("d-none");
    $("#firecontrolroom").addClass("d-none");
    $("#mrooftype").addClass("d-none");
    $("#firecontrolroomlocation").addClass("d-none");
    $("#bdaequipmentlocation").addClass("d-none");
    $("#verticalriserlocation").addClass("d-none");
    $("#donorantenalocation").addClass("d-none");
    $("#adjunto2").addClass("d-none");
    document.getElementById('txtinstalltypedesing').disabled = true;
    $("#txtinstalltypedesing").val('NEW');
    $("#avisoquick").removeClass("d-none");
    $("#bdaroomfirec").addClass("d-none");
    $("#txtbrandfirealarm").val("others");
    document.getElementById('txtbrandfirealarm').disabled = true;
    //$("#brandfirealarm").addClass("d-none");
    
    
    }

    else{
    $("#adjunto1").removeClass("d-none");
    $("#adjunto2").removeClass("d-none");
    $("#buildaddress").removeClass("d-none");
    $("#coordlat").removeClass("d-none");
    $("#coordlong").removeClass("d-none");
    $("#floorlocated").removeClass("d-none");
    $("#coveragerequirements").removeClass("d-none");
    $("#distancetodonor").removeClass("d-none");
    $("#designrequirements").removeClass("d-none");
    $("#materialsexterior").removeClass("d-none");
    $("#materialsinterior").removeClass("d-none");
    $("#mglasstype").removeClass("d-none");
    $("#firecontrolroom").removeClass("d-none");
    $("#mrooftype").removeClass("d-none");
    $("#firecontrolroomlocation").removeClass("d-none");
    $("#bdaequipmentlocation").removeClass("d-none");
    $("#verticalriserlocation").removeClass("d-none");
    $("#donorantenalocation").removeClass("d-none");
    $("#adjunto2").removeClass("d-none");
    document.getElementById('txtinstalltypedesing').disabled = false;
    $("#avisoquick").addClass("d-none");
    $("#bdaroomfirec").removeClass("d-none");
    $("#brandfirealarm").removeClass("d-none");

    }
  
}


//=====================================================================================================================

function validarFecha(fecha)
{
var fechaDate=new Date(fecha);
 fechaValidada=1;
 anio = fechaDate.getFullYear();
 mes = fechaDate.getMonth()+1;
 dia = fechaDate.getDate();
if(mes.toString().length==1){
mes='0'+mes;
}
if(dia.toString().length==1){
dia='0'+dia;
}
if(fechaDate='' || anio.toString().length!=4 || mes.toString().length!=2 || dia.toString().length!=2)
{
  fechaValidada=-1;
  return fechaValidada;
}

 else{
   return fechaValidada;
 }

}
//=========================================================================================================

function validNumericos(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
         //   console.log(charCode);
            if (((charCode == 8) || (charCode == 46) || (charCode == 110)
            || (charCode >= 35 && charCode <= 40)
                || (charCode >= 48 && charCode <= 57)
                || (charCode >= 96 && charCode <= 105))) {
                return true;
            }
            else {
                return false;
            }
        }

function filterrq(elva)
{

  if (elva=='A')
  {
   // $("#losch").removeClass("d-none");
 // $("#losch1").removeClass("d-none");

 //hace visible: Max Number of Channels
 $("#losch2").removeClass("d-none");

 $("#losch").addClass("d-none");
$("#losch1").addClass("d-none");
  }
  else
  {
$("#losch").addClass("d-none");
$("#losch1").addClass("d-none");
//$("#numbchxband").val(0);

//oculta: Max Number of Channels
$("#losch2").addClass("d-none");
  }

}
var s_flexesdchandeal = String('<?php echo $_SESSION['flexesdchandeal']; ?>');
function filter_esdchanneldealer()
{
  //$("#alarmre1").addClass("d-none");
 
  document.getElementById("txtbbareq").setAttribute("disabled", "disabled");

  if ( s_flexesdchandeal =='FIPLEX_SI')
  {
    //oculta: Alarm Requirements
    $("#alarmre1").addClass("d-none");
    //$("#divdesingntra_fiplexsi").removeClass("d-none");
    
    // habilita el option (BDA Main Input Power Requirement) 
    document.getElementById("txtbdamainpwr").removeAttribute("disabled");
  }
  else
  {
    //hace visible: Alarm Requirements
    $("#alarmre1").removeClass("d-none");
    //$("#divdesingntra_fiplexsi").addClass("d-none");

    // NO habilita el option (BDA Main Input Power Requirement) 
    document.getElementById("txtbdamainpwr").setAttribute("disabled", "disabled");
    $("#txtdesigntra").val("nestimate");
    document.getElementById('txtdesigntra').disabled = true;

  }

}

  </script>
</body>
</html>


/* <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1X7RZDMQ7X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1X7RZDMQ7X');
</script> */