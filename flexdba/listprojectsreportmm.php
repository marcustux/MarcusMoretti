<?php 

// Desactivar toda notificación de error
//error_reporting(0);
// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);
include("db_conectflexbda.php"); 
 
 	session_start();
	
   $connectaudit = new PDO('pgsql:host='.$ipserver.';port=5432;dbname='.$vdbname.';user='.$vuserdb.';password='.$vpassdb.'');
   //$connect->setAttribute(PDO::ATTRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $connectaudit->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
if(isset($_SESSION["timeoutflexbda"])){
  // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
//	echo "***********hola".time() - $_SESSION["timeout"];
  $sessionTTL = time() - $_SESSION["timeoutflexbda"];
  if($sessionTTL > $inactividad){
session_unset();
      session_destroy();
      header("Location: http://".$ipservidorapache.	$folderservidor."/index.php");
  }
if ($_SESSION["flexbdaa"] =="")
{
session_unset();
      session_destroy();
      header("Location: http://".$ipservidorapache.	$folderservidor."/index.php");
}

}
else
{
session_unset();
      session_destroy();
      header("Location: http://".$ipservidorapache.	$folderservidor."/index.php");
  
}
	
	$status = $connect->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	
	if ($status !="Connection OK; waiting to send.")
	{
	
		header("Location: http://".$ipservidorapache."/".$folderservidor."/errorconect.php");
		exit();
		
	}
	
	//	echo "Hola:".$_SESSION["timeout"];
		
	
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
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="css/sweetalert2.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="css/select2.css" rel="stylesheet" />
<link href="css/testcssselector.css" rel="stylesheet" />
  <style>
	body {
  
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
  .tree>ul>li::::before,
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

  .tablecabenegro
  {
    
    color: #fff;
    background-color: #212529;
    border-color: #383f45;

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

  .colorazultitulo2
  {
    color:#095488;
    font-size: 26px;
    font-weight: bolder;
  }
  hr.bordeazul
  {
    border: 1px solid #095488;
  }

  .fondogris
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
  color: #000000;   
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

.user-block .username {
    font-size: 16px;
    font-weight: 600;
    margin-top: -1px;
    color: #095488;
}
.user-block .comment, .user-block .description, .user-block .username {
    display: block;
    margin-left: 50px;
    color: #095488;
}


a.username:link {
  color: #095488;
}

/* visited link */
a.username:visited {
  color: #095488;
}

/* mouse over link */
a.username:hover {
  color: #095488;
}

/* selected link */
a.username:active {
  color: #095488;
}

.description
{
  color: #095488;
  font-size:12px
}
a.username2:link {
  color: #095488;
  font-size:12px
}
a {
  color: #095488;
    text-decoration: none;
    background-color: transparent;
}

.text-primary {
  color: #095488;
  
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
    background-color: #B5131F;
    color: #fff;
    font-size: 1.0625em;
}

.fondogris2
{
  background-color: #D1E9FA;
}

  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<p class="text-left titulogrande">
           <img src="honeywell_logo_300px.png" class="img-fluid" >  
       </p>

<?php
      $vidp = 0;
      $vidr = 0;
   $sanitized_n = filter_var($_REQUEST['idtoke'], FILTER_SANITIZE_NUMBER_INT);
   if (filter_var($sanitized_n, FILTER_SANITIZE_NUMBER_INT)) {
      $vidp = $_REQUEST['idtoke'];
   }
   $sanitized_n = filter_var($_REQUEST['idr'], FILTER_SANITIZE_NUMBER_INT);
   if (filter_var($sanitized_n, FILTER_SANITIZE_NUMBER_INT)) {
      $vidr = $_REQUEST['idr'];
   }
   
   $estaaprobado = $_REQUEST['st'];
   $tieneqregenerarelpresup = $_REQUEST['regenow'];
   //NAP/


?>
<input type="hidden" name="idpr" id="idpr" value="<?php echo $vidp; ?>">
<input type="hidden" name="idrv" id="idrv" value="<?php echo $vidr; ?>">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    

 <!-- Default box -->
 <div class="card">


        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
             
              <div class="row">
                <div class="col-12">
                



                    <div class="">
                <div class="row">
                 
                    <!-- inicio form add -->
                    <?php

error_reporting(0);

include("db_conectflexbda.php"); 
                    
                    ////Search information x idproject.
              
                  
                    if (   $vidr  =="")
                    {
                      $rstmm = $connect->prepare("SELECT * , flexbdahoneywell.active as activeproy  FROM flexbdahoneywell inner join customers_userewbfas
                      on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus  WHERE idproject= :idproject and idrev = (select max(idrev) from flexbdahoneywell where   idproject= :idproject  ) ");
                      $rstmm->bindParam(':idproject', $vidp);		
                    }
                    else
                    {
                      $rstmm = $connect->prepare("SELECT * , flexbdahoneywell.active as activeproy  FROM flexbdahoneywell inner join customers_userewbfas
                      on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus  WHERE idproject= :idproject and idrev =:idrev ");
                      $rstmm->bindParam(':idproject', $vidp);		
                      $rstmm->bindParam(':idrev', $vidr);		
                    }
                   
                    
              
                    $rstmm->execute();
                    $resultado = $rstmm->fetchAll();		
                    
                    foreach ($resultado as $rowheaders) 
																{
                                  
                                  $vprojectname = $rowheaders['projectname'];
                                  $vidrev = $rowheaders['idrev'];
                                
                                  $projectdraft = $rowheaders['idproject'];
  $projectdraftrev = $rowheaders['idrev'];
  $psswdtkkey  = $rowheaders['seeddraft'];
  $vactive  = $rowheaders['activeproy'];
  $activeproy  = $rowheaders['activeproy'];
  $nameuserfull = $rowheaders['nameuserfull'];
  $nameuserfullusermail = $rowheaders['usermail'];

  $namedellerchannel =  str_replace("_"," ", $rowheaders['esdchanneldealer']);

      $vprojectname = $rowheaders['projectname'];
      $vaddress = $rowheaders['address'];
      $vcoordinateslat = $rowheaders['coordinateslat'];
      $vidcustomers = $rowheaders['idcustomers'];
      $vidusercustomers = $rowheaders['idusercustomers'];

      $vtxtfloortype1count = $rowheaders['floortype1count'];
      $vtxtfloortype1countavg = $rowheaders['floortype1countavg'];

      $vtxtfloortype2count = $rowheaders['floortype2count'];
      $vtxtfloortype2countavg = $rowheaders['floortype2countavg'];
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
   //   echo "aaaaaaaaaaaaaaaaaaaaaaaaaaa"
      $vtxtdonorcoaxloss = $rowheaders['covreg_donorcoaxloss'];
      $vtxtindoorcoaxloss = $rowheaders['covreg_indoorcoaxloss'];


      
      $vbda_floordba = $rowheaders['bda_floordba'];
      $vbda_filter = $rowheaders['bda_filter'];
      $vdba_powerreq = $rowheaders['dba_powerreq'];

      $vvbbu_req = $rowheaders['bbu_req'];
      $valarm_brand = $rowheaders['alarm_brand'];
      $valarm_install_facp = $rowheaders['alarm_install_facp'];
      $valarm_req_annuciator = $rowheaders['alarm_req_annuciator'];
      $vdr_requierd = $rowheaders['dr_requierd'];
      $vdr_ahjpackage = $rowheaders['dr_ahjpackage'];
      $vdr_instalationtype = $rowheaders['dr_instalationtype'];
      $vdr_mat_extwall = $rowheaders['dr_mat_extwall'];
      $vdr_mat_intwall = $rowheaders['dr_mat_intwall'];


      $vdr_mat_glasstype = $rowheaders['dr_mat_glasstype'];
      $vdr_mat_rooftype = $rowheaders['dr_mat_rooftype'];
      $vdr_firecontrolroomloc = $rowheaders['dr_firecontrolroomloc'];
      $vdr_bdaeqlocation = $rowheaders['dr_bdaeqlocation'];
      $vdr_verticalriserloc = $rowheaders['dr_verticalriserloc'];
      $vdr_donorantloc = $rowheaders['dr_donorantloc'];
      $vdr_special = $rowheaders['dr_special'];

      $vocupancy = $rowheaders['ocupancy'];

      if (  $vdr_mat_extwall=="Infinity" or $vdr_mat_extwall=="undefined" ) {  $vdr_mat_extwall="Error.MM"; }
      if (  $vdr_mat_intwall=="Infinity" or $vdr_mat_intwall=="undefined" ) {  $vdr_mat_intwall="Error.MM"; }

      if (  $vdr_mat_glasstype=="Infinity" or $vdr_mat_glasstype=="undefined" ) {  $vdr_mat_glasstype="Error.MM"; }
      if (  $vdr_mat_rooftype=="Infinity" or $vdr_mat_rooftype=="undefined" ) {  $vdr_mat_rooftype="Error.MM"; }
      if (  $vdr_firecontrolroomloc=="Infinity" or $vdr_firecontrolroomloc=="undefined" ) {  $vdr_firecontrolroomloc="Error.MM"; }
      if (  $vdr_bdaeqlocation=="Infinity" or $vdr_bdaeqlocation=="undefined" ) {  $vdr_bdaeqlocation="Error.MM"; }
      if (  $vdr_verticalriserloc=="Infinity" or $vdr_verticalriserloc=="undefined" ) {  $vdr_verticalriserloc="Error.MM"; }
      if (  $vdr_donorantloc=="Infinity" or $vdr_donorantloc=="undefined" ) {  $vdr_donorantloc="Error.MM"; }
      if (  $vdr_special=="Infinity" or $vdr_special=="undefined" ) {  $vdr_special="Error.MM"; }



        if($$rowheaders['ocupancy'] =="Agriculture") { $vocupancy= "Agriculture"; }
        if($$rowheaders['ocupancy'] =="Airport") { $vocupancy= "Airport"; }
        if($$rowheaders['ocupancy'] =="Bank") { $vocupancy= "Bank/Finance"; } 
        if($$rowheaders['ocupancy'] =="Commercial") {  $vocupancy= " Commercial Real Estate"; } 

        if($$rowheaders['ocupancy'] =="Datacenter") { $vocupancy= " Data Centers"; } 
        if($$rowheaders['ocupancy'] =="Education") {  $vocupancy= " Education K-12"; } 
        if($$rowheaders['ocupancy'] =="Health") { $vocupancy= "Health Care"; }
        if($$rowheaders['ocupancy'] =="Hospitality") { $vocupancy= "Hospitality"; }
        if($$rowheaders['ocupancy'] =="Industrial") { $vocupancy= " Industrial/Manufacture/Utilities"; } 
        if($$rowheaders['ocupancy'] =="Infrastructure") {$vocupancy= "Infrastructure/Transportation"; }     
        if($$rowheaders['ocupancy'] =="Military") { $vocupancy= "Military/Defense"; }
        if($$rowheaders['ocupancy'] =="other") { $vocupancy= " OtherPharmaProfessional & Other Services"; }      
        if($$rowheaders['ocupancy'] =="Retail") { $vocupancy= " Retail/Grocery"; } 
                if($$rowheaders['ocupancy'] =="Warehousing") { $vocupancy= "Warehousing/Storag"; } 


        $vbuildingduedate = substr ($rowheaders['buildingduedate'],0,10);
      $vinstallationduedate = substr ($rowheaders['installationduedate'],0,10);

                                
																}
                    
                    ?>
                     

                    <div class="">

																	

                          <div class="form-row">
                          <div class="form-group col-md-12 ">

                       
                          <h3 ><?php
                            $elnroref =  str_pad(  $vidp , 4, "0", STR_PAD_LEFT);
                          echo '#F'.$elnroref." - ".$vprojectname." - Rev:[".$vidrev."]"; ?> &nbsp; </h3>
                         <b>ESD: <?php echo $nameuserfull;  ?> &nbsp;</b> - [<?php echo  $nameuserfullusermail;?>]<br>
                         <b>Dealer channel:</b> <?php echo $namedellerchannel;  ?>
                         <p class="text-muted">
                         <?php echo "<br>Special Instructions: ".$vdr_special; ?></p>
                        
                          </div>							   
                          <div class="form-group col-md-12   ">

                        
                          <p class="colorazultitulo">Projects Detail  </p>
                          <hr class="borderojo">
                          <table class="table table-striped">

  <tbody>
    <tr>
      <th scope="row">Building Address: </th>
      <td colspan=3>  <?php echo $vaddress; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Building Coordinates:<br> 
Latitude:</th>
      <td>   <?php echo $vcoordinateslat; ?></td>
      <th scope="row"> Building Coordinates:<br>  Longitude:</th>
      <td> <?php echo $vcoordinateslon; ?></td>
    </tr>



    <tr>
      <th scope="row">Ocupancy field :</th>
      <td><?php echo $vocupancy; ?></td>
      <th scope="row">Installation Type :</th>
                                  <td> <?php  
                                   if($vdr_instalationtype =="NEW") { echo "NEW "; } 
                                    if($vdr_instalationtype =="RETROFIT") { echo "RETROFIT"; }
                                  ?></td>
    </tr>


    <tr>
      <th scope="row">Bid due date:</th>
      <td><?php echo $vbuildingduedate; ?></td>
      <th scope="row"> Installation due date:</th>
      <td><?php echo $vinstallationduedate; ?></td>
    </tr>
 






    <tr>
      <th scope="row">Floor Type 1 Count:</th>
      <td><?php echo $vtxtfloortype1count; ?></td>
      <th scope="row">Floor Type 1 average area (sqft):</th>
      <td><?php echo $vtxtfloortype1countavg; ?></td>
    </tr>
    <?php if ($vtxtfloortype2count>0)
    {
      ?>
    <tr>
      <th scope="row">Floor Type 2 Count:</th>
      <td><?php echo $vtxtfloortype2count; ?></td>
      <th scope="row">Floor Type 2 average area (sqft):</th>
      <td><?php echo $vtxtfloortype2countavg; ?></td>
    </tr>
    <?php } ?>
    <tr>
      <th scope="row"> Average Floor Height (ft):</th>
      <td>  <?php echo $vavgfloorheight; ?></td>
      <th scope="row"> Building Type (RF Environment):</th>
      <td> <?php 
                            if($vrfenvironment =="Light") { echo "Light: Open Warehouse, Convention Center"; } 
                            if($vrfenvironment =="LightMedium") { echo " Medium Light: Parking Garage, Airport, Mall"; } 
                            if($vrfenvironment =="Dense") { echo "Dense: Newer Office Building, Hotel"; } 
                            if($vrfenvironment =="HighDense") { echo "High Dense: Hospital, Older Gov, Bldg, University, HS"; } 
                            if($vrfenvironment =="VeryHigh") { echo "Very High Dense: Prison"; } 
                          ?></td>
    </tr>
  
  </tbody>
</table>

                          </div>

                          
                
                       

                                                   <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Project Frequency Information </p>
                          <hr class="borderojo">
                          </div>	
                          <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Coverage Needed for Which Public Safety Agencies :</label>
                           <b> <?php  echo $vcoverageneeded ;  ?></b>
                            
                          </div>

                          <div class="form-group col-md-6 fondogris">
                          <div class="col-sm-12" id="listagainuldl" name="listagainuldl">
              <table class="table table-striped table-sm ">
                    
                    <tr class="thead-dark">
                      <th style="width: 10px">#</th>
                      <th>UL (Start - Stop) </th>
                      <th>DL (Start - Stop) </th>
                   
                   
                    </tr>
                   
                    <tbody>
                    
                  
                    </tbody>
                  </table>
              </div>
            
                          </div>

                        

                          <div class="form-group col-md-6 fondogris"> 
				  
                        
					
          <div class="form-group col-md-12">
          <div class="col-sm-12" id="listachannel" name="listachannel">
                <table class="table table-striped table-sm ">
                      
                      <tr class="thead-dark">
                        <th style="width: 10px">#</th>
                        <th>Channels List</th>
                        <th style="width: 40px">UL</th>
                        <th style="width: 40px">DL</th>
                      
                      </tr>
                      
                      <tbody>
                      
                    
                      </tbody>
                    </table>
                </div>
            </div>
				  </div>




                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Coverage Requirements </p>
                          <hr class="borderojo">
                          </div>	
                          <div class="form-group col-md-12">


                          <table class="table table-striped">

  <tbody>
    <tr>
      <th scope="row">Donor RSSI:</th>
      <td><?php echo $vtxtdonorrssi; ?> </td>
      <th scope="row">Design Margin :</th>
      <td><?php echo $vtxtdesignmargin; ?></td>
    </tr>
    <tr>
      <th scope="row">Min DL Coverage:</th>
      <td><?php echo $vtxtmindlcoverage; ?></td>
      <th scope="row">Min UL Coverage:</th>
      <td><?php echo $vtxtminulcoverage; ?></td>
    </tr>
    <tr>
      <th scope="row">Indoor Antenna Radius:</th>
      <td><?php echo $vtxtindoorantrad; ?></td>
      <th scope="row">Mobile TX Power:</th>
      <td><?php echo $vtxtmobtxpower; ?></td>
    </tr>
    <tr>
      <th scope="row">Distance to Donor Site:</th>
      <td><?php echo $vtxtdistdonorsite; ?></td>
      <th scope="row">Donor Antenna Gain:</th>
      <td><?php echo $vtxtdonorantgain; ?></td>
    </tr>
    <tr>
      <th scope="row">Donor Coax Cable Loss (100'):</th>
      <td><?php echo $vtxtdonorcoaxloss; ?></td>
      <th scope="row">Indoor Coax Cable Loss (100'):</th>
      <td><?php echo $vtxtindoorcoaxloss; ?></td>
    </tr>
   
  </tbody>
</table>


                      
                            </div>

                          

                            
                         <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">BDA Requirements </p>
                          <hr class="borderojo">

                          <table class="table table-striped">

  <tbody>
    <tr>
      <th scope="row">Which Floor will the BDA be located on?:</th>
      <td><?php echo $vbda_floordba; ?></td>
      <th scope="row">Filtering Requirement:</th>
      <td>
      <?php
         if($vbda_filter =="A") { echo "Class A Channelized "; } 
         if($vbda_filter =="B") { echo "Class B Band Selective"; }
      
      ?>
      </td>
      <th scope="row">BDA Main Input Power Requirement :</th>
      <td>
      <?php if($vdba_powerreq =="AC") { echo "AC Power: 110VAC"; } 
       if($vdba_powerreq =="DC") { echo "DC Power: 24/-48VDC"; }
      ?>
      </td>
    </tr>
   
  </tbody>
</table>


                          </div>	
                
                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">BBU Requirements</p>
                          <hr class="borderojo">

                          <table class="table table-striped">

<tbody>
  <tr>
    <td colspan=1><b>Battery Backup Requirement:</b>  <?php
        $name_BBU_select ="No BBU needed";
             if($vvbbu_req ==12) { echo " 12 hours"; $name_BBU_select ="BTTY-100050";  }
              if($vvbbu_req ==24) { echo "24 hours"; $name_BBU_select ="BTTY-100100"; }
    ?></ts>
    <td colspan=3> </td>
  
  </tr>
 
</tbody>
</table>



                          </div>	
                                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Alarm Requirements </p>
                          <hr class="borderojo">


                          <table class="table table-striped">

                              <tbody>
                                <tr>
                                  <th scope="row">Select the type of fire alarm that will be installed:</th>
                                  <td><?php 
                                  
                                   if($valarm_brand =="gamewell-fci") { echo "Gamewell-FCI"; }
                                   if($valarm_brand =="farenhyt") { echo "farenhyt"; }
                                   if($valarm_brand =="notifier") { echo "Notifier"; }
                                   if($valarm_brand =="others") { echo "Othersv"; }
                                  ?></td>
                                  <th scope="row">Will the BDA equipment be installed in the main Fire Control Room containing the FACP Interface(Y/N)?  :</th>
                                  <td>
                                  <?php
                                    if($valarm_install_facp =="YES") { echo "YES "; } 
                                    if($valarm_install_facp =="NO") { echo "NO"; }
                                  
                                  ?>
                                  </td>
                                  <th scope="row">Will you require a remote annunciator :</th>
                                  <td>
                                  <?php   if($valarm_req_annuciator =="YES") { echo "YES "; } 
                                    if($valarm_req_annuciator =="NO") { echo "NO"; } 
                                  ?>
                                  </td>
                                </tr>
                              
                              </tbody>
                              </table>

                          </div>	
                         
                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Design Requirements </p>
                          <hr class="borderojo">


                          <table class="table table-striped">
                              <tbody>
                                <tr>
                                  <th scope="row">Will you require a system design </th>
                                  <td>   <?php   if($vdr_requierd =="YES") { echo "YES "; } 
                                    if($vdr_requierd =="NO") { echo "NO"; }
                                  ?></td>
                                  <th scope="row">Do you need a complete AHJ Submittal Package:</th>
                                  <td> <?php   if($vdr_ahjpackage =="YES") { echo "YES "; } 
                                    if($vdr_ahjpackage =="NO") { echo "NO"; }
                                  ?>
                                  </td>
                                </tr>
                                <tr>
                                <th scope="row"> Donor Antenna Location:</th>
                                  <td><?php echo $vdr_donorantloc; ?></td>
                                  <th scope="row">Construction Materials – Exterior Walls:</th>
                                  <td><?php echo $vdr_mat_extwall; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Construction Materials – Interior Walls:</th>
                                  <td><?php echo $vdr_mat_intwall; ?></td>
                                  <th scope="row"> Construction Materials – Glass Type:</th>
                                  <td><?php echo $vdr_mat_glasstype; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row"> Construction Materials – Roof Type:</th>
                                  <td><?php echo $vdr_mat_rooftype; ?></td>
                                  <th scope="row">Fire Control Room Location:</th>
                                  <td><?php echo $vdr_firecontrolroomloc; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">  BDA Equipment Location:</th>
                                  <td><?php echo $vdr_bdaeqlocation; ?></td>
                                  <th scope="row">Vertical Riser Location:</th>
                                  <td><?php echo $vdr_verticalriserloc; ?></td>
                                </tr>
                              
                              

                              </tbody>
                            </table>

                          </div>	
                
                   


                         <br>
                         <br>

                          <!-- /.card-body -->
                      
                          
                          </div>
                          <hr>
                          </div>
       
                          <div class="form-group col-md-12">
                          <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Floor Plans: (Please show donor antenna location, BDA location, and all available riser shafts in the floor plans) </label>
                          <div class="col-sm-10">
                              <div class="container">
                              <button name="btnaddatt1" id="btnaddatt1" type="button" class="btn btn-smk d-none  modoedit btn-xs  btn-outline-primary btn-flat" onclick="openattach(1)">click here to upload files</button>
                        
                              <div class="dropzone dz-clickable ui-sortable" id="myDrop1">
                              
                              <b> List of attached files: </b><br>
                              <?php

                                  $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and idrev = ".$projectdraftrev ."  and typefile ='plans' and active = 'Y'";
                                   //  echo $sqlproject;
                                  $msjnotdata = 0;
                                  $resultado = $connect->query($sqlproject)->fetchAll();	

                               
                                  foreach ($resultado as $row2) {
                                    $nombrreamostrar =  str_replace( $row2['seedtemp']."_"," ",$row2['fileattach'] );
                                    ?>
                                   
                                    <a href='https://flexbda.com/attachflexbda/<?php echo  trim($row2['fileattach']); ?>' target='_blank' >
                                                                     <i class='fas fa-file'></i><?php echo  $nombrreamostrar ; ?>
                                    </a>
                                    <a href="downprojectatt.php?filemm=<?php echo  trim($row2['fileattach']); ?>"><i class='fas fa-download'></i></a>
                                    <br>
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
                     
                          

                          <div class="form-group col-md-12">
                          <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Authority Having Jurisdiction (AHJ) requirements: </label>
                          <div class="col-sm-10">
                          <div class="container">
                              <button name="btnaddatt1" id="btnaddatt1" type="button" class="btn btn-smk d-none modoedit  btn-xs  btn-outline-primary btn-flat" onclick="openattach(2)">click here to upload files</button>
                        
                              <div class="dropzone dz-clickable ui-sortable" id="myDrop2">
                             <b> List of attached files:</b><br>
                              <?php

                                  $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and idrev = ".$projectdraftrev ."  and typefile ='ahj' and active = 'Y'";
                                //       echo $sqlproject;
                                  $msjnotdata = 0;
                                  $resultado = $connect->query($sqlproject)->fetchAll();	

                                  foreach ($resultado as $row3) {
                                    $nombrreamostrar =  str_replace( $row3['seedtemp']."_"," ",$row3['fileattach'] );
                                    ?>
                                  <a href='https://flexbda.com/attachflexbda/<?php echo  trim($row3['fileattach']); ?>' target='_blank' >
                                                                     <i class='fas fa-file'></i><?php echo  $nombrreamostrar ; ?>
                                    </a>  <a href="downprojectatt.php?filemm=<?php echo  trim($row3['fileattach']); ?>"><i class='fas fa-download'></i></a>
                                    <br>
                                  
                                    <?php
                                  }

                                  ?>

                              </div>
                             
                            </div>
                            <hr>

                          </div>
                          </div>
                          </div>
                       

                    <!-- fin form -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
            <div class="card-body">
            <?php 
////////////////// NO RESULT   if (	$_SESSION["flexbdag"]  == "ing" || $_SESSION["flexbdag"]  == "fiplexdev" )
                  $muestro = "N";

                         if ( $estaaprobado == "NAP" &&		$_SESSION["flexbdag"]  == "ing" || $_SESSION["flexbdag"]  == "fiplexdev")
                         {
                          $muestro = "Y";
                         }
                         if ( $estaaprobado == "NAP" &&  $vactive == "Y" )
                         {
                          $muestro = "Y";
                         }

                        if (  $muestro == "Y")
                        {
                         ?>

                              <h4>Results</h4>
                              <hr style=" border-top: 2px solid  #095488;">

                  <?php

                  $rstmmrep = $connect->prepare("SELECT idproject, idrev, channelcount, comcovarea, vpl, downlk_bdadlinput_12wbda, downlk_maxbdapower_12wbda, downlk_dasloss_12wbda, downlk_antennaout_12wbda, downlk_pathloss_12wbda, downlk_rssimobile_12wbda, downlk_bdadlinput_2wbda, downlk_maxbdapower_2wbda, downlk_dasloss_2wbda, downlk_antennaout_2wbda, downlk_pathloss_2wbda, downlk_rssimobile_2wbda, uplk_mobile_txpwr, uplk_dasulinput, uplk_bdaulinput, uplk_bdaupout, uplk_donorulout, uplk_freespaceloss, uplk_sigdonnorsite, resul_donorantenncount, resul_lighprotec, resul_donorcoaxcable, resul_donorcoaxconnectcount, resul_directcouplersplitter, resul_dascoaxconnect, resul_dascoaxcable, resul_jumpercablecount, resul_dasantennacount, resul_bda_output12w, resul_bda_output2w ,result_bdasuggestion 
                  FROM public.flexbdahoneywell_result  WHERE idproject= :idproject and idrev = :idrev ");
                                      
                  $rstmmrep->bindParam(':idproject', $vidp);		
                  $rstmmrep->bindParam(':idrev', $vidr);		
                  $rstmmrep->execute();
                  $resultadorep = $rstmmrep->fetchAll();		


                  $v_channelcount ="";
                  $v_comcovarea ="";
                  $v_vpl ="";
                  $v_downlk_bdadlinput_12wbda ="";
                  $v_downlk_maxbdapower_12wbda ="";
                  $v_downlk_dasloss_12wbda ="";
                  $v_downlk_antennaout_12wbda =""; 
                  $v_downlk_pathloss_12wbda ="";
                  $v_downlk_rssimobile_12wbda ="";
                  $v_downlk_bdadlinput_2wbda ="";
                  $v_downlk_maxbdapower_2wbda ="";
                  $v_downlk_dasloss_2wbda ="";
                  $v_downlk_antennaout_2wbda =""; 
                  $v_downlk_pathloss_2wbda ="";
                  $v_downlk_rssimobile_2wbda ="";
                  $v_uplk_mobile_txpwr ="";
                  $v_uplk_dasulinput ="";
                  $v_uplk_bdaulinput ="";
                  $v_uplk_bdaupout ="";
                  $v_uplk_donorulout ="";
                  $v_uplk_freespaceloss =""; 
                  $v_uplk_sigdonnorsite ="";
                  $v_resul_donorantenncount=""; 
                  $v_resul_lighprotec ="";
                  $v_resul_donorcoaxcable=""; 
                  $v_resul_donorcoaxconnectcount ="";
                  $v_resul_directcouplersplitter ="";
                  $v_resul_dascoaxconnect ="";
                  $v_resul_dascoaxcable ="";
                  $v_resul_jumpercablecount=""; 
                  $v_resul_dasantennacount ="";
                  $v_resul_bda_output12w ="";
                  $v_resul_bda_output2w ="";
                  $v_result_freespaceloss ="";
                  $v_result_sigdonorsite ="";
                  
                  foreach ($resultadorep as $rowheadersrep) 
                              {
                                $v_channelcount = $rowheadersrep['channelcount'];
                                $v_comcovarea =$rowheadersrep['comcovarea'];
                                $v_vpl =$rowheadersrep['vpl'];
                                $v_downlk_bdadlinput_12wbda =$rowheadersrep['downlk_bdadlinput_12wbda'];
                                $v_downlk_maxbdapower_12wbda =$rowheadersrep['downlk_maxbdapower_12wbda'];
                                $v_downlk_dasloss_12wbda =$rowheadersrep['downlk_dasloss_12wbda'];
                                $v_downlk_antennaout_12wbda =$rowheadersrep['downlk_antennaout_12wbda'];
                                $v_downlk_pathloss_12wbda =$rowheadersrep['downlk_pathloss_12wbda'];
                                $v_downlk_rssimobile_12wbda =$rowheadersrep['downlk_rssimobile_12wbda'];
                                $v_downlk_bdadlinput_2wbda =$rowheadersrep['downlk_bdadlinput_2wbda'];
                                $v_downlk_maxbdapower_2wbda =$rowheadersrep['downlk_maxbdapower_2wbda'];
                                $v_downlk_dasloss_2wbda =$rowheadersrep['downlk_dasloss_2wbda'];
                                $v_downlk_antennaout_2wbda =$rowheadersrep['downlk_antennaout_2wbda'];
                                $v_downlk_pathloss_2wbda =$rowheadersrep['downlk_pathloss_2wbda'];
                                $v_downlk_rssimobile_2wbda =$rowheadersrep['downlk_rssimobile_2wbda'];
                                $v_uplk_mobile_txpwr =$rowheadersrep['uplk_mobile_txpwr'];
                                $v_uplk_dasulinput =$rowheadersrep['uplk_dasulinput'];
                                $v_uplk_bdaulinput =$rowheadersrep['uplk_bdaulinput'];
                                $v_uplk_bdaupout =$rowheadersrep['uplk_bdaupout'];
                                $v_uplk_donorulout =$rowheadersrep['uplk_donorulout'];
                                $v_uplk_freespaceloss =$rowheadersrep['uplk_freespaceloss'];
                                $v_uplk_sigdonnorsite =$rowheadersrep['uplk_sigdonnorsite'];
                                $v_resul_donorantenncount= $rowheadersrep['resul_donorantenncount'];  
                                $v_resul_lighprotec =$rowheadersrep['resul_lighprotec'];
                                $v_resul_donorcoaxcable=$rowheadersrep['resul_donorcoaxcable'];
                                $v_resul_donorcoaxconnectcount =$rowheadersrep['resul_donorcoaxconnectcount'];
                                $v_resul_directcouplersplitter =$rowheadersrep['resul_directcouplersplitter'];
                                $v_resul_dascoaxconnect =$rowheadersrep['resul_dascoaxconnect'];
                                $v_resul_dascoaxcable =$rowheadersrep['resul_dascoaxcable'];
                                $v_resul_jumpercablecount=$rowheadersrep['resul_jumpercablecount'];
                                $v_resul_dasantennacount =$rowheadersrep['resul_dasantennacount'];
                                $v_resul_bda_output12w =$rowheadersrep['resul_bda_output12w'];
                                $v_resul_bda_output2w =$rowheadersrep['resul_bda_output2w'];

                                $v_result_bdasuggestion =$rowheadersrep['result_bdasuggestion'];

                                if (  $v_downlk_bdadlinput_12wbda=="Infinity" or $v_downlk_bdadlinput_12wbda=="undefined"  or $v_downlk_bdadlinput_12wbda=="-Infinity" ) {  $v_downlk_bdadlinput_12wbda="Error.MM"; }
                                if (  $v_downlk_maxbdapower_12wbda=="Infinity" or $v_downlk_maxbdapower_12wbda=="undefined" or $v_downlk_maxbdapower_12wbda=="-Infinity" ) {  $v_downlk_maxbdapower_12wbda="Error.MM"; }
                                if (  $v_downlk_dasloss_12wbda=="Infinity" or $v_downlk_dasloss_12wbda=="undefined" or $v_downlk_dasloss_12wbda=="-Infinity" ) {  $v_downlk_dasloss_12wbda="Error.MM"; }
                                if (  $v_downlk_antennaout_12wbda=="Infinity" or $v_downlk_antennaout_12wbda=="undefined" or $v_downlk_antennaout_12wbda=="-Infinity" ) {  $v_downlk_antennaout_12wbda="Error.MM"; }
                                if (  $v_downlk_pathloss_12wbda=="Infinity" or $v_downlk_pathloss_12wbda=="undefined"  or $v_downlk_pathloss_12wbda=="-Infinity") {  $v_downlk_pathloss_12wbda="Error.MM"; }
                                if (  $v_downlk_rssimobile_12wbda=="Infinity" or $v_downlk_rssimobile_12wbda=="undefined" or $v_downlk_rssimobile_12wbda=="-Infinity") {  $v_downlk_rssimobile_12wbda="Error.MM"; }
                                if (  $v_downlk_bdadlinput_2wbda=="Infinity" or $v_downlk_bdadlinput_2wbda=="undefined" or $v_downlk_bdadlinput_2wbda=="-Infinity" ) {  $v_downlk_bdadlinput_2wbda="Error.MM"; }
                                if (  $v_downlk_maxbdapower_2wbda=="Infinity" or $v_downlk_maxbdapower_2wbda=="undefined" or $v_downlk_maxbdapower_2wbda=="-Infinity" ) {  $v_downlk_maxbdapower_2wbda="Error.MM"; }
                                if (  $v_downlk_dasloss_2wbda=="Infinity" or $v_downlk_dasloss_2wbda=="undefined" or $v_downlk_dasloss_2wbda=="-Infinity") {  $v_downlk_dasloss_2wbda="Error.MM"; }
                                if (  $v_downlk_antennaout_2wbda=="Infinity" or $v_downlk_antennaout_2wbda=="undefined" or $v_downlk_antennaout_2wbda=="-Infinity") {  $v_downlk_antennaout_2wbda="Error.MM"; }
                                if (  $v_downlk_pathloss_2wbda=="Infinity" or $v_downlk_pathloss_2wbda=="undefined" or $v_downlk_pathloss_2wbda=="-Infinity" ) {  $v_downlk_pathloss_2wbda="Error.MM"; }
                                
                                if (  $v_downlk_rssimobile_2wbda=="Infinity" or $v_downlk_rssimobile_2wbda=="undefined" or $v_downlk_rssimobile_2wbda=="-Infinity") {  $v_downlk_rssimobile_2wbda="Error.MM"; }
                                if (  $v_uplk_mobile_txpwr=="Infinity" or $v_uplk_mobile_txpwr=="undefined" or $v_uplk_mobile_txpwr=="-Infinity" ) {  $v_uplk_mobile_txpwr="Error.MM"; }
                                if (  $v_uplk_dasulinput=="Infinity" or $v_uplk_dasulinput=="undefined" or $v_uplk_dasulinput=="-Infinity" ) {  $v_uplk_dasulinput="Error.MM"; }
                                if (  $v_uplk_bdaulinput=="Infinity" or $v_uplk_bdaulinput=="undefined" or $v_uplk_bdaulinput=="-Infinity" ) {  $v_uplk_bdaulinput="Error.MM"; }
                                if (  $v_uplk_bdaupout=="Infinity" or $v_uplk_bdaupout=="undefined" or $v_uplk_bdaupout=="-Infinity") {  $v_uplk_bdaupout="Error.MM"; }
                                if (  $v_uplk_donorulout=="Infinity" or $v_uplk_donorulout=="undefined" or $v_uplk_donorulout=="-Infinity" ) {  $v_uplk_donorulout="Error.MM"; }
                                if (  $v_uplk_freespaceloss=="Infinity" or $v_uplk_freespaceloss=="undefined" or $v_uplk_freespaceloss=="-Infinity") {  $v_uplk_freespaceloss="Error.MM"; }

                                if (  $v_uplk_sigdonnorsite=="Infinity" or $v_uplk_sigdonnorsite=="undefined" or $v_uplk_sigdonnorsite=="-Infinity" ) {  $v_uplk_sigdonnorsite="Error.MM"; }
                                if (  $v_resul_donorantenncount=="Infinity" or $v_resul_donorantenncount=="undefined" or $v_resul_donorantenncount=="-Infinity" ) {  $v_resul_donorantenncount="Error.MM"; }
                                if (  $v_resul_lighprotec=="Infinity" or $v_resul_lighprotec=="undefined" or $v_resul_lighprotec=="-Infinity") {  $v_resul_lighprotec="Error.MM"; }
                                if (  $v_resul_donorcoaxcable=="Infinity" or $v_resul_donorcoaxcable=="undefined" or $v_resul_donorcoaxcable=="-Infinity" ) {  $v_resul_donorcoaxcable="Error.MM"; }
                                if (  $v_resul_donorcoaxconnectcount=="Infinity" or $v_resul_donorcoaxconnectcount=="undefined" or $v_resul_donorcoaxconnectcount=="-Infinity" ) {  $v_resul_donorcoaxconnectcount="Error.MM"; }
                                if (  $v_resul_directcouplersplitter=="Infinity" or $v_resul_directcouplersplitter=="undefined" or $v_resul_directcouplersplitter=="-Infinity" ) {  $v_resul_directcouplersplitter="Error.MM"; }
                                if (  $v_resul_dascoaxconnect=="Infinity" or $v_resul_dascoaxconnect=="undefined" or $v_resul_dascoaxconnect=="-Infinity" ) {  $v_resul_dascoaxconnect="Error.MM"; }

                                if (  $v_resul_dascoaxcable=="Infinity" or $v_resul_dascoaxcable=="undefined"  or $v_resul_dascoaxcable=="-Infinity") {  $v_resul_dascoaxcable="Error.MM"; }
                                if (  $v_resul_jumpercablecount=="Infinity" or $v_resul_jumpercablecount=="undefined" or $v_resul_jumpercablecount=="-Infinity" ) {  $v_resul_jumpercablecount="Error.MM"; }
                                if (  $v_resul_dasantennacount=="Infinity" or $v_resul_dasantennacount=="undefined" or $v_resul_dasantennacount=="-Infinity" ) {  $v_resul_dasantennacount="Error.MM"; }
                                if (  $v_resul_bda_output12w=="Infinity" or $v_resul_bda_output12w=="undefined" or $v_resul_bda_output12w=="-Infinity" ) {  $v_resul_bda_output12w="Error.MM"; }
                                if (  $v_resul_bda_output2w=="Infinity" or $v_resul_bda_output2w=="undefined" or $v_resul_bda_output2w=="-Infinity" ) {  $v_resul_bda_output2w="Error.MM"; }
                                


                                
                              //  $v_result_freespaceloss =$rowheadersrep['result_freespaceloss'];
                             //   $v_result_sigdonorsite =$rowheadersrep['result_sigdonorsite'];
                              }


                              if ( $_SESSION["flexbdag"]  == "ing" || $_SESSION["flexbdag"]  == "fiplexdev")
                              {
                              
                  ?>

<p class="colorazultitulo">Project estimation</p>
                          <hr class="borderojo">



<table class="table table-striped table-sm" id="tblcalculosmm" name="tblcalculosmm">
  
    <tr class="thead-dark">
      <th scope="col">Downlink</th>
      <th scope="col">1/2 W BDA</th>
      <th scope="col">2 W BDA</th>
      <th scope="col">Uplink</th>
      <th scope="col"></th>
    </tr>
  
    <tr>
      <th scope="row">BDA DL Input</th>
      <td><?php echo $v_downlk_bdadlinput_12wbda; ?></td>
      <td><?php echo $v_downlk_bdadlinput_2wbda; ?></td>
      <th>Mobile Tx Power</th>
      <td><?php echo  $v_uplk_mobile_txpwr;?></td>
    </tr>

    <tr>
      <th scope="row">Max. BDA Power/CH</th>
      <td><?php echo $v_downlk_maxbdapower_12wbda; ?></td>
      <td><?php echo $v_downlk_maxbdapower_2wbda; ?></td>
      <th>DAS UL input</th>
      <td><?php echo  $v_uplk_dasulinput;?></td>
    </tr>

    <tr>
      <th scope="row">BDA output Power/CH</th>
      <td><?php echo $v_resul_bda_output12w; ?></td>
      <td><?php echo $v_resul_bda_output2w; ?></td>
      <th>BDA UL Input</th>
      <td><?php echo  $v_uplk_bdaulinput;?></td>
    </tr>


    <tr>
      <th scope="row">DAS Loss</th>
      <td><?php echo $v_downlk_dasloss_12wbda; ?></td>
      <td><?php echo $v_downlk_dasloss_2wbda; ?></td>
      <th>BDA Uplink Output</th>
      <td><?php echo  $v_uplk_bdaupout;?></td>
    </tr>
    <tr>
      <th scope="row">Antenna Output</th>
      <td><?php echo $v_downlk_antennaout_12wbda; ?></td>
      <td><?php echo $v_downlk_antennaout_2wbda; ?></td>
      <th>Donor UL Output</th>
      <td><?php echo  $v_uplk_donorulout;?></td>
    </tr>
    <tr>
      <th scope="row">Path Loss</th>
      <td><?php echo $v_downlk_pathloss_12wbda; ?></td>
      <td><?php echo $v_downlk_pathloss_2wbda; ?></td>
      <th>Free Space Loss</th>
      <td><?php echo  $v_uplk_freespaceloss;?></td>
    </tr>
    <tr>
      <th scope="row">RSSI Mobile</th>
      <td><?php echo $v_downlk_rssimobile_12wbda; ?></td>
      <td><?php echo $v_downlk_rssimobile_2wbda; ?></td>
      <th>Signal at Donor Site</th>
      <td><?php echo  $v_uplk_sigdonnorsite;?></td>
    </tr>
   
  
</table>
<br>
<table class="table table-striped table-sm ">

 
  <tr>
      <th scope="row">Combined Coverage Area</th>
      <td><?php echo   $v_comcovarea; ?></td>
      <th scope="row">DAS Antenna Count</th>
      <td><?php echo  $v_resul_dasantennacount ; ?></td>
    </tr>

    <tr>
      <th scope="row">Donor Antenna Count </th>
      <td><?php echo   $v_resul_donorantenncount ; ?></td>
      <th scope="row">Lightning Protection </th>
      <td><?php echo  $v_resul_lighprotec ; ?></td>
    </tr>
    <tr>
      <th scope="row">Donor Coax Cable (ft)</th>
      <td><?php echo  $v_resul_donorcoaxcable ; ?></td>
      <th scope="row">Donor Coax Connector Count</th>
      <td><?php echo  $v_resul_donorcoaxconnectcount ; ?></td>
    </tr>
    <tr>
      <th scope="row">Directional Coupler/Splitter Count</th>
      <td><?php echo   $v_resul_directcouplersplitter ; ?></td>
      <th scope="row">DAS Coax Cable (ft)</th>
      <td><?php echo  $v_resul_dascoaxcable ; ?></td>
    </tr>
    <tr>
      <th scope="row">DAS Coax Connector Count</th>
      <td><?php echo  $v_resul_dascoaxconnect ; ?></td>
      <th scope="row">Jumper Cable Count</th>
      <td><?php echo  $v_resul_jumpercablecount ; ?></td>
    </tr>
  
    <tr>
      <th scope="row"></th>
      <td></td>
      <th scope="row"> </th>
      <td></td>
    </tr>
   
  
    
  
</table>
<br><br>
<?php
// BUDGET
}

$eltotal = 0;
$eltotal_hrlow =0;
$eltotal_hrhigh =0;


/// Limpiamos flexbdahoneywell_bugdet
/// Buscamos si tiene ya presupeusta armadol.. sino lo generamos.
/*
INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh);
  
*/



$sentenciaactionrefmarca = $connectaudit->prepare("SELECT alarm_brand ,  esdchanneldealer , brandbda
FROM flexbdahoneywell 
inner join customers_userewbfas
on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus 
inner join flexbda_esddealer_alarmpanel_brandbda
on flexbda_esddealer_alarmpanel_brandbda.esddealer = customers_userewbfas.esdchanneldealer and 
flexbda_esddealer_alarmpanel_brandbda.alarmpanel = flexbdahoneywell.alarm_brand
WHERE idproject= :idproject and idrev = :idrev ");
$sentenciaactionrefmarca->bindParam(':idproject', $vidp);
$sentenciaactionrefmarca->bindParam(':idrev', $vidr);	 	 
$sentenciaactionrefmarca->execute();
$nombrecampo="";
$resultmmarca = $sentenciaactionrefmarca->fetchAll();
foreach ($resultmmarca as $rowmark) {
 $nombrecampo=$rowmark['brandbda'];
}

if ($nombrecampo =="")
{
  echo "Process error.! problem selecting EDS / DeaLER, Fire Alarm Panel  ";
  exit();
}
if ($tieneqregenerarelpresup =="")
{
  $tieneqregenerarelpresup ="N";
}

if ($tieneqregenerarelpresup =="S")
{
  $sentenciaaction = $connectaudit->prepare("delete from flexbdahoneywell_bugdet where idproject= :idproject and idrev=:idrev ");
  $sentenciaaction->bindParam(':idproject', $vidp);
  $sentenciaaction->bindParam(':idrev', $vidr);	 	 
  $sentenciaaction->execute();
}

//// Controlamos si tiene BUDGET o es la 1er vez
$sentenciaactionrefmarcaw = $connectaudit->prepare("select * from flexbdahoneywell_bugdet where idproject= :idproject and idrev=:idrev ");
$sentenciaactionrefmarcaw->bindParam(':idproject', $vidp);
$sentenciaactionrefmarcaw->bindParam(':idrev', $vidr);	 	 
$sentenciaactionrefmarcaw->execute();
$tienebugdet ="N";
$resultmmarca = $sentenciaactionrefmarcaw->fetchAll();
foreach ($resultmmarca as $rowmarkmma) {
  $tienebugdet ="S";
}

if($tienebugdet =="N")
{
  $tieneqregenerarelpresup ="S";
}
//echo "aaaaaaaaaaaaaaaaaaaa tiene budget".$tienebugdet."--->".$tieneqregenerarelpresup;

?>



<p class="colorazultitulo">Budget:</p>
<hr class="borderojo">
<input type="hidden" name="abc" id="abc" value="<?php echo $nombrecampo; ?>">


<?php
//echo "HOLA REGENERO:".$tieneqregenerarelpresup;

if ($tieneqregenerarelpresup =="S")
{


///////////////////////REGENERAMOS Y BUSCAMOS DE NUEVO EL BDA POSIBLE
            /////////////////////////////////////////////////////////////////////////
            
            $maswhererssi="";
             $rssimobile27  = $v_downlk_rssimobile_12wbda;
              $rssimobile33= $v_downlk_rssimobile_2wbda;
              $v_txttypeclass = $vbda_filter ;
              $v_txtbdamainpwr=  $vdba_powerreq ;
              $v_txtmindlcoverage =  $vtxtmindlcoverage;

            if (  $rssimobile27 > $v_txtmindlcoverage)
            {
                $maswhererssi= "  AND fiplexpartnro LIKE '%27%'";
            }
            else
            {
                if (  $rssimobile33 > $v_txtmindlcoverage)
                {
                    $maswhererssi= "  AND fiplexpartnro LIKE '%33%'";
                }

            }

            $maswhereclas="";
            if( $v_txttypeclass=="A")
            {
                $maswhereclas = "  AND fiplexpartnro LIKE '%A'";
            }
            if( $v_txttypeclass=="B")
            {
                $maswhereclas = "  AND fiplexpartnro LIKE '%B'";
            }
              $maswherepwr = "";
            if ( $v_txtbdamainpwr=="AC")
            {
                $maswherepwr = "  AND fiplexpartnro LIKE '%-A-%'";
            }
            if ( $v_txtbdamainpwr=="DC")
            {
                $maswherepwr = "  AND fiplexpartnro LIKE '%-D-%'";
            }

            ///Buscamos las bandas cargadas...
            //// Controlamos si tiene BUDGET o es la 1er vez
            $channelcount700 =0;
            $channelcount800=0;
            $channelcountUHF=0;
            $channelcountVHF=0;


                $senten_buscabanddelproy = $connectaudit->prepare("select * from flexbdahoneywell_band where idproject= :idproject and idrev=:idrev and typeref ='FREQBAND' ");
                $senten_buscabanddelproy->bindParam(':idproject', $vidp);
                $senten_buscabanddelproy->bindParam(':idrev', $vidr);	 	 
                $senten_buscabanddelproy->execute();
                
                $resultlasbandas = $senten_buscabanddelproy->fetchAll();
                foreach ($resultlasbandas as $rowlasband) {
                      
                      $posicion_coincidencia700 = strpos( $rowlasband['nombbandtemp'] , "700");
                          if ($posicion_coincidencia700  !== false) 
                          { $channelcount700 =1;
                          }
                          $posicion_coincidencia800 = strpos( $rowlasband['nombbandtemp'] , "800");
                          if ($posicion_coincidencia800  !== false) 
                              {
                                $channelcount800=1;
                              }
                          $posicion_coincidenciaUHF = strpos( $rowlasband['nombbandtemp'] , "UHF");   
                          if ($posicion_coincidenciaUHF  !== false) 
                          {
                            $channelcountUHF=1;
                            /*
                            ANT-OF-4-2-001
                              BDA-FA-450470-2-1
                              DAS Antenna, Fiberglass 450-470MHz, 2.1dBi

                              ANT-OF-4-2-002
                              BDA-FA-470490-2-1
                              DAS Antenna, Fiberglass 470-490MHz, 2.1dBi
                              */
                              $uhftype="UHF_FULL";
                            if ( $rowlasband['ulstart']>=470   )
                            {
                                $uhftype="UHF_HIGH";
                            }
                             if ( $rowlasband['ulstart']<=469 and $rowlasband['ulstart'] >451  )
                            {
                             
                                $uhftype="UHF_LOW";                                                              
                            }

                          }
                          $posicion_coincidenciaVHF = strpos( $rowlasband['nombbandtemp'] , "VHF");   
                          if ($posicion_coincidenciaVHF  !== false) 
                          {
                            $channelcountVHF=1;
                          }
                }


            $maswhere700800="";
            if ( $channelcount700 > 0 )
            {
                if ( $channelcount800 > 0)
                {
                    $maswhere700800 = "  AND fiplexpartnro LIKE '%-7S%'";
                
                }
                else
                {
                    $maswhere700800 = "  AND fiplexpartnro in ('DH7S-A-733A','DH7S-D-733A',' DH7S-A-727A','DH7S-D-727A','DH7S-A-733B','DH7S-D-733B') ";
                    $maswhererssi= "  AND fiplexpartnro LIKE '%33%'";
                }
            }
            else
            {
                if ( $channelcount800 > 0)
                {
                    $maswhere700800 = "  AND fiplexpartnro in ('DH7S-A-S33A','DH7S-D-S33A',' DH7S-A-S27A','DH7S-D-S27A','DH7S-A-S33B','DH7S-D-S33B') ";
                    $maswhererssi= "  AND fiplexpartnro LIKE '%33%'";
                }
            }

            $qidgrupbandes = 0;
            if ( $channelcount700>0)
            {
                $qidgrupbandes = 11;
            }
            if ( $channelcount800>0)
            {
                $qidgrupbandes = 11;
            }
            if ( $channelcountUHF>0)
            {
                $qidgrupbandes = 13;
            }
            if ( $channelcountVHF>0)
            {
                $qidgrupbandes = 13; 
            }

        
            $maswhereidbandgroup = " and idgroupband = ".$qidgrupbandes;
            //Armamos el select para buscar.bda 
            $query_buscard ="SELECT familyname, fiplexpartnro, honeywellnro, description,  deadtime, idgroupband, idband, idproduct, idbranch, migrate, gain, idauto, gamewellfcipartnro, silentknightpartnro, notipartnumber, fiplexdatasheet
            FROM flexbda_products_budget where migrate = 'Y'". $maswhererssi.$maswherepwr.$maswhereclas.$maswhereidbandgroup.$maswhere700800  ;
            ////$maswhereclas.
          //   echo   $query_buscard;

            $BDA_POSIBLE="";
            if ( $qidgrupbandes==11)
            {
                $dataencontrados = $connect->query($query_buscard)->fetchAll(); 
                foreach ($dataencontrados as $rowmmcus) {     
                
                    $BDA_POSIBLE = $rowmmcus['fiplexpartnro'];
                
                }
            }
            if ( $qidgrupbandes==13)
            {
                $BDA_POSIBLE = "MM_UHFVHF"; 
            }
           // echo "NUEVO ". $BDA_POSIBLE;
            $v_result_bdasuggestion=$BDA_POSIBLE;

            //UPDATE BDA POSIBLE
            $sentenciadatosoutput = $connect->prepare("update  flexbdahoneywell_result set result_bdasuggestion = :result_bdasuggestion  where   idproject= :idproject and idrev = :idrev");

            $sentenciadatosoutput->bindParam(':result_bdasuggestion', $v_result_bdasuggestion);
            $sentenciadatosoutput->bindParam(':idproject', $vidp);								
         $sentenciadatosoutput->bindParam(':idrev', $vidr);
          
        $sentenciadatosoutput->execute();
    //    echo "UPDATEO OKK";
        ///////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////




?>                      
<table class="table table-striped table-sm  " id="sss">
  
    <tr class="thead-dark">
      <td scope="col"colspan=5></td>
      <td class="thead-dark" scope="col" colspan=2>ESD Labor Est (Hrs.)</td>
      
    </tr>
    </table>
    <table class="table table-striped table-sm  " id="tablebugdet">    
    <tr>
 
      <th scope="col" style="width: 20%">Part Number</th>
      <th scope="col" style="width: 20%">Description</th>
      <th scope="col" style="width: 10%">Quantity</th>
      <th scope="col">ESD NET Price</th>
      <th scope="col" style="width: 15%">NET Total</th>
      <th scope="col">Low</th>
      <th scope="col">High</th>
      
    </tr>
 
  <!--BDA Suggest -->
  <?php
 $detect_partnumberfiplex = "";
 $entro=0;
 $elmontoamostrar = 0;
 $elmontoamostrarsolito =  0;
 $orderreport =0;
  $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='".$v_result_bdasuggestion."'";
//echo $sqlbuscabda."<br>";
  $sql = $connect->prepare(  $sqlbuscabda);
    $sql->execute();
    $resultadomm = $sql->fetchAll();
    foreach ($resultadomm as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];

          $detect_partselect = $row2[$nombrecampo];

         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];
    break;
     }
   //  echo "-------------a1";
     if (  $entro ==1)
     {
    //   echo "a1";

      $quantity =1;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * 1 );
      $canthrlow = 0;
      $canthrhig = 0;
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");   $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $quantity);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $quantity);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 

  
      $sentenciaaction->execute();
   
       ?>
            <tr>
      <th scope="row"><?php echo $detect_partselect; // $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php echo "1"; ?></td>
      <td><?php echo  str_replace("$","$ ",$detect_price); ?></td>
      <td>$ <?php echo $elmontoamostrar; 
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  1);
  //   echo "atest m.".$eltotal;
      ?></td>
      <td><?php echo "1"; ?></td>
      <td><?php echo "1"; ?></td>
    </tr>
       <?php
      $eltotal_hrlow =   $eltotal_hrlow  +1;
      $eltotal_hrhigh = $eltotal_hrhigh + 1;
     }
     else
     {
      if ($v_result_bdasuggestion =="MM_UHFVHF")
      {
          ?>
           <tr>
            <th > <?php echo $v_result_bdasuggestion; ?></th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php

      } 

     }
     ?>
    

  <!--BTTY BATTERY -->
  <?php
 $detect_partnumberfiplex = "";
 $entro=0;
 $elmontoamostrar = 0;
 $elmontoamostrarsolito =  0;
 
 //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$name_BBU_select;
  $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='".$name_BBU_select."'";
//echo $sqlbuscabda."<br>";
  $sql = $connect->prepare(  $sqlbuscabda);
    $sql->execute();
    $resultadomm = $sql->fetchAll();
    foreach ($resultadomm as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];

          $detect_partselect = $row2[$nombrecampo];

          $detect_description =  $row2['des_'.$nombrecampo];
          $detect_price =  $row2['price_'.$nombrecampo];
    break;
     }
   //  echo "-------------a1";
     if (  $entro ==1)
     {
    //   echo "a1";

      $quantity =1;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * 1 );
      $canthrlow = 0;
      $canthrhig = 0;
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");   
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $quantity);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $quantity);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 

  
      $sentenciaaction->execute();
   
       ?>
            <tr>
      <th scope="row"><?php echo $detect_partselect; // $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php echo "1"; ?></td>
      <td><?php echo  str_replace("$","$ ",$detect_price); ?></td>
      <td>$ <?php echo $elmontoamostrar; 
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  1);
  //   echo "atest m.".$eltotal;
      ?></td>
      <td><?php echo "1"; ?></td>
      <td><?php echo "1"; ?></td>
    </tr>
       <?php
      $eltotal_hrlow =   $eltotal_hrlow  +1;
      $eltotal_hrhigh = $eltotal_hrhigh + 1;
     }
    
     ?>


<!--Annuncietor -->
<?php
//echo "Holaaaaaaaaaaaaaaaa".$valarm_req_annuciator;
if ($valarm_req_annuciator=="YES")
{

//echo "SI";

 $detect_partnumberfiplex = "";
 $entro=0;
 $elmontoamostrar = 0;
 $elmontoamostrarsolito =  0;
 

  $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='BTTY-ANN-004'";
//echo $sqlbuscabda."<br>";
  $sql = $connect->prepare(  $sqlbuscabda);
    $sql->execute();
    $resultadomm = $sql->fetchAll();
    foreach ($resultadomm as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];

          $detect_partselect = $row2[$nombrecampo];

          $detect_description =  $row2['des_'.$nombrecampo];
          $detect_price =  $row2['price_'.$nombrecampo];
    break;
     }
   //  echo "-------------a1";
     if (  $entro ==1)
     {
    //   echo "a1";

      $quantity =1;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * 1 );
      $canthrlow = 0;
      $canthrhig = 0;
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");   
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $quantity);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $quantity);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 

  
      $sentenciaaction->execute();
   
       ?>
            <tr>
      <th scope="row"><?php echo $detect_partselect; // $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php echo "1"; ?></td>
      <td><?php echo  str_replace("$","$ ",$detect_price); ?></td>
      <td>$ <?php echo $elmontoamostrar; 
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  1);
  //   echo "atest m.".$eltotal;
      ?></td>
      <td><?php echo "1"; ?></td>
      <td><?php echo "1"; ?></td>
    </tr>
       <?php
      $eltotal_hrlow =   $eltotal_hrlow  +1;
      $eltotal_hrhigh = $eltotal_hrhigh + 1;
     }
    

    }
     ?>


  <!--   -->
  <?php
  /*DAS Antenna
 HONEWELL: BDA-OIA-1301000-2 //FIPELX 'ANT-OI-14S-001
--700y800 ->   ANT-OF-S-2-004   -- BDA-FA-763869-2-2
---VHF --->   ANT-OI-14S-001  -- BDA-OIA-1301000-2

  */
  $sqldasantena="";
  if ($v_result_bdasuggestion =="MM_UHFVHF")
  {
    $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OI-14S-001'";
  }
  else
  {
    $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OF-S-2-004'";
  }
  
   ///////////////////////nueva seleccion de antena

   
///////////////////////////////////////////////////

//echo "<br>channelcount700=".$channelcount700."**channelcount800=".$channelcount800."**channelcountUHF=".$channelcountUHF."type::".$uhftype."**channelcountVHF=".$channelcountVHF;
//// $v_result_bdasuggestion ="700#800#VHF#UHF"
if( $channelcountUHF ==0 && $channelcountVHF ==0 )
{
  if( $channelcount700 >0 || $channelcount800>0   )
  {
    $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OF-S-2-003'";
  }
}
else
{
  if( $channelcountUHF ==0 && $channelcountVHF >0  && $channelcount700 ==0 && $channelcount800 ==0 )
    {
      $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OF-1-2-001'";
    }
    if( $channelcountUHF >0 && $channelcountVHF ==0  && $channelcount700 ==0 && $channelcount800 ==0 )
    {
      /// ANT-OI-4-2-002  --  BDA-OIA-350600-2-1
      $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OI-4-2-002'";
    }
    // vamos x UHF
    if (  $sqldasantena =="" )
    {
      $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OI-14S-001'";
    }
}
//echo $sqldasantena;

    /*


ANT-OF-4-2-001
BDA-FA-450470-2-1
DAS Antenna, Fiberglass 450-470MHz, 2.1dBi

ANT-OF-4-2-002
BDA-FA-470490-2-1
DAS Antenna, Fiberglass 470-490MHz, 2.1dBi

  }
  /// por defecto el elsee
  if( $v_result_bdasuggestion  ="UHF" "VHF" ambos )
  {
    $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-OI-14S-001'";
  }
   ////////////////////// fin nueva seleccion de antena  
*/
 //echo $sqldasantena;
 $elmontoamostrar = 0;
 $elmontoamostrarsolito =  0;
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";
  $entro=0;
    $sql = $connect->prepare(  $sqldasantena);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
         $detect_partselect = $row2[$nombrecampo];
       
         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];

    break;
     }

     if (  $entro ==1)
     {

 
     $quantity =$v_resul_dasantennacount;
    // echo "aaa111qqqq".  $quantity;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * $quantity );
      $elmontoamostrarsolito =  str_replace("$","$ ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace("$"," ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace(",",".",$elmontoamostrarsolitosinsimb); 
      $canthrlow = 0;
      $canthrhig = 0;
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolitosinsimb);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 
      $sentenciaaction->execute();
   ///   echo "aaa222".$entro;
  ?>
    <tr>
      <th scope="row"> <?php  echo $detect_partselect; // echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php echo $v_resul_dasantennacount; ?></td>
      <td><?php echo  $elmontoamostrarsolito; ?></td>
      <td>$ <?php echo   $elmontoamostrar; 
      
      $eltotal =  $eltotal +  $elmontoamostrar; 
  //   echo "atest m.".$eltotal;
      ?></td>
      <td>-<?php //echo $www; ?></td>
      <td>-<?php //echo $www; ?></td>
    </tr>
 <!--COUPLER -->
 <?php
     }
     else
     {
     echo " NOT DAS ANTENADAS ";
     }

     $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='BDA-DC6-W2'";

  //echo "<br>COUPLER". $sqldasantena;
  $entro=0;
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";

    $sql = $connect->prepare(  $sqldasantena);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
         $detect_partselect = $row2[$nombrecampo];
         
         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];


    break;
     }

//echo "HOLa COUPLER".$entro."$$$$". $detect_price;
     if (  $entro ==1)
     {
      $quantity =$v_resul_directcouplersplitter;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * $quantity );
      $elmontoamostrarsolito =  str_replace("$","$ ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace("$"," ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace(",",".",$elmontoamostrarsolitosinsimb); 
      $canthrlow = ($v_resul_directcouplersplitter* 0.083); 
      $canthrhig = ($v_resul_directcouplersplitter* 0.25);
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolitosinsimb);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 
      $sentenciaaction->execute();

 
     
  ?>
    <tr>
      <th scope="row"><?php  echo $detect_partselect; // echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php  if ($v_resul_directcouplersplitter >0)
      {   
        echo  $v_resul_directcouplersplitter ;
      }
      else
      {
        echo "error".$v_resul_directcouplersplitter ;
      }
       ?></td>
      <td><?php   if ($v_resul_directcouplersplitter >0)
      {    echo  str_replace("$","$ ",$detect_price); 
      }
      else
      {
        echo "";
      }
      ?></td>
      <td>$ <?php
      
      if ($v_resul_directcouplersplitter >0)
      {   
        
        echo (  str_replace("$","",$detect_price) * $v_resul_directcouplersplitter );
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  $v_resul_directcouplersplitter);
      }
   //   echo "<br>atest m.".$eltotal;
      ?></td>
      <td><?php  if ($v_resul_directcouplersplitter >0)
      {    echo ($v_resul_directcouplersplitter* 0.083); } ?></td>
      <td><?php  if ($v_resul_directcouplersplitter >0)
      {    echo ($v_resul_directcouplersplitter* 0.25);
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_directcouplersplitter* 0.083); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_directcouplersplitter* 0.25);
      }
   //   echo "<br>atest l.".$eltotal_hrlow;
    //  echo "<br>atest h.".$eltotal_hrhigh;
      ?></td>
    </tr>
<?php
        
     }



     $detect_partnumberfiplex = "";
     $entro=0;
     $elmontoamostrar = 0;
     $elmontoamostrarsolito =  0;
     
     //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$name_BBU_select;
    ///  $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='BDA-ICA12-JPLR-1K'";
      $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='BDA-ICA12-JPLLR-1K'";
    //echo $sqlbuscabda."<br>";
      $sql = $connect->prepare(  $sqlbuscabda);
        $sql->execute();
        $resultadomm = $sql->fetchAll();
        foreach ($resultadomm as $row2) {
          $entro=1;
             $detect_partnumberfiplex =  $row2['fiplexpartnro'];
             $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
    
              $detect_partselect = $row2[$nombrecampo];
    
             
             $detect_description =  $row2['des_'.$nombrecampo];
             $detect_price =  $row2['price_'.$nombrecampo];

        break;
         }
       //  echo "-------------a1";
         if (  $entro ==1)
         {




     $quantity = ceil($v_resul_dascoaxcable/1000);
     $elmontoamostrar =  (   $detect_price * $quantity );
     $elmontoamostrarsolito =   $detect_price; 
     $canthrlow =0;
     $canthrhig = 0;
     $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
     $sentenciaaction->bindParam(':idproject', $vidp);
     $sentenciaaction->bindParam(':idrev', $vidr);	 
     $sentenciaaction->bindParam(':sku', $detect_partselect);
     $sentenciaaction->bindParam(':description', $detect_description);	 
     $sentenciaaction->bindParam(':quantity', $quantity );	 
     $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolito);	 
     $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
     $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
     $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
     $orderreport =  $orderreport + 1 ;
     $sentenciaaction->bindParam(':orderreport', $orderreport);	 
     $sentenciaaction->execute();


?>
    <tr>
      <th scope="row"><?php echo    $detect_partselect; ?></th>
      <td scope="row"><?php echo    $detect_description; ?></td>
      <td><?php 
      echo $quantity; ?></td>
      <td><?php $price_cable = $detect_price; echo  $price_cable; ?></td>
      <td>$ <?php echo ($price_cable *   $quantity); 
      
      $eltotal =  $eltotal +  ($price_cable *   $quantity);
   //   echo "<br>atest m.".$eltotal;
      ?></td>
      <td>-<?php //echo $www; ?></td>
      <td>-<?php //echo $www; ?></td>
    </tr>

<?php
         }
//BDA-GNDKIT1
$entro=0;
$detect_description="";
$detect_price="";
$detect_partnumberfiplex="";
$detect_partnumberhoneywel="";
$sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='BDA-GNDKIT1'";
//echo $sqlbuscabda."<br>";
$sql = $connect->prepare(  $sqlbuscabda);
  $sql->execute();
  $resultadomm = $sql->fetchAll();
  foreach ($resultadomm as $row2) {
    $entro=1;
       $detect_partnumberfiplex =  $row2['fiplexpartnro'];
       $detect_partnumberhoneywel =  $row2['fiplexpartnro'];

        $detect_partselect = $row2[$nombrecampo];

      
       $detect_description =  $row2['des_'.$nombrecampo];
       $price_cable =  $row2['price_'.$nombrecampo];

  break;
   }
 //  echo "-------------a1";
   if (  $entro ==1)
   {


$v_resul_dasantennacount =round( (  $v_resul_dascoaxcable  / 500),0 );
$quantity =$v_resul_dasantennacount;
$elmontoamostrar =  ($price_cable * $quantity );


$elmontoamostrarsolito =   $price_cable ;
$canthrlow =($v_resul_dasantennacount* 1);
$canthrhig =($v_resul_dasantennacount* 1);
$sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
$sentenciaaction->bindParam(':idproject', $vidp);
$sentenciaaction->bindParam(':idrev', $vidr);	 
$sentenciaaction->bindParam(':sku', $detect_partselect);
$sentenciaaction->bindParam(':description', $detect_description);	 
$sentenciaaction->bindParam(':quantity', $quantity );	 
$sentenciaaction->bindParam(':netprice', $elmontoamostrarsolito);	 
$sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
$sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
$sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
$orderreport =  $orderreport + 1 ;
$sentenciaaction->bindParam(':orderreport', $orderreport);	 
$sentenciaaction->execute();


?>
    <tr>
      <th scope="row"><?php echo $detect_partselect; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php 
      
      echo $v_resul_donorantenncount; ?></td>
      <td><?php  echo  $price_cable; ?></td>
      <td>$ <?php echo ($price_cable *   $v_resul_donorantenncount);
      
      $eltotal =  $eltotal +  ($price_cable *   $v_resul_donorantenncount);
      ?></td>
      <td><?php echo ($v_resul_donorantenncount* 1); ?></td>
      <td><?php echo ($v_resul_donorantenncount* 1);
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_donorantenncount* 1); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_donorantenncount* 1);
    //  echo "<br>atest l.".$eltotal_hrlow;
   //   echo "<br>atest h.".$eltotal_hrhigh;
      ?></td>
    </tr>
    


    <?php
   }


  $entro=0;
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";
$sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='BDA-WPK-ATBC40_01'";
//echo $sqlbuscabda."<br>";
  $sql = $connect->prepare(  $sqlbuscabda);
    $sql->execute();
    $resultadomm = $sql->fetchAll();
    foreach ($resultadomm as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];

          $detect_partselect = $row2[$nombrecampo];

     
         $detect_description =  $row2['des_'.$nombrecampo];
         $price_cable =  $row2['price_'.$nombrecampo];

    break;
     }
   //  echo "-------------a1";
     if (  $entro ==1)
     {
//////////////////////
//Coldshrink
/*
BDA-WPK-ATBC40_01
Weatherproofing Silicone Coldshrink for EOL Assembly, 9.8"L 
*/

$quantity =$v_resul_donorantenncount;
$elmontoamostrar =  ($price_cable * $quantity );
$elmontoamostrarsolito = $price_cable; 
$canthrlow =($v_resul_donorantenncount* 1);
$canthrhig =($v_resul_donorantenncount* 1);
$sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
$sentenciaaction->bindParam(':idproject', $vidp);
$sentenciaaction->bindParam(':idrev', $vidr);	 
$sentenciaaction->bindParam(':sku', $detect_partselect);
$sentenciaaction->bindParam(':description', $detect_description);	 
$sentenciaaction->bindParam(':quantity', $quantity );	 
$sentenciaaction->bindParam(':netprice', $elmontoamostrarsolito);	 
$sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
$sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
$sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
$orderreport =  $orderreport + 1 ;
$sentenciaaction->bindParam(':orderreport', $orderreport);	 
$sentenciaaction->execute();


?>
    <tr>
      <th scope="row"><?php echo   $detect_partselect ; ?> </th>
      <td scope="row"><?php echo   $detect_description; ?> </td>
      <td><?php 
      
      echo $v_resul_donorantenncount; ?></td>
      <td><?php  echo  $price_cable; ?></td>
      <td>$ <?php echo ($price_cable *   $v_resul_donorantenncount);
      
      $eltotal =  $eltotal +  ($price_cable *   $v_resul_donorantenncount);
      ?></td>
      <td>sss<?php echo ($v_resul_donorantenncount* 1); ?></td>
      <td><?php echo ($v_resul_donorantenncount* 1);
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_donorantenncount* 1); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_donorantenncount* 1);
    //  echo "<br>atest l.".$eltotal_hrlow;
   //   echo "<br>atest h.".$eltotal_hrhigh;
      ?></td>
    </tr>
    
    
    
      <!--CONNECTOR MALE-->
 <?php
 }
   
  $sqldasantena="select distinct    flexbda_products_budget.*
	FROM public.flexbda_products_budget
	
	where  (description  LIKE '%connector%') and familyname like '%CONNECTOR%' and familyname like '%MALE%' and familyname not like '%FEMALE%'
  ";
  $entro=0;
  
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";

    $sql = $connect->prepare(  $sqldasantena);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
         $detect_partselect = $row2[$nombrecampo];
       
         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];
    break;
     }

     if (  $entro ==1)
     {
      $quantity =$v_resul_dascoaxconnect;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * $quantity );
      $elmontoamostrarsolito =  str_replace("$","$ ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace("$"," ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace(",",".",$elmontoamostrarsolitosinsimb); 
      $canthrlow = ($v_resul_dascoaxconnect* 0.083); 
      $canthrhig = ($v_resul_dascoaxconnect* 0.25);
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolitosinsimb);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 
      $sentenciaaction->execute();
  
  ?>
    <tr>
      <th scope="row"><?php  echo $detect_partselect; // echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php
      if ( $v_resul_dascoaxconnect>0)
      {
       echo $v_resul_dascoaxconnect;
       }
       else
       {
         echo "errr".$v_resul_dascoaxconnect;
       } ?></td>
      <td><?php  if ( $v_resul_dascoaxconnect>0)
      { echo  str_replace("$","$ ",$detect_price); 
      }?></td>
      <td>$ <?php 
       if ( $v_resul_dascoaxconnect>0)
       {
      echo (  str_replace("$","",$detect_price) * $v_resul_dascoaxconnect );
         $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  $v_resul_dascoaxconnect);
       }
      ?></td>
      <td><?php  if ( $v_resul_dascoaxconnect>0)
      { echo ($v_resul_dascoaxconnect* 0.083); } ?></td>
      <td><?php  if ( $v_resul_dascoaxconnect>0)
      { echo ($v_resul_dascoaxconnect* 0.25); 
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_dascoaxconnect* 0.083); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_dascoaxconnect* 0.25);
      }
      ?></td>
    </tr>
     <!--Coaxial surge protector, UL listed -->
 <?php
 
      }

/*
HONEYWELL:::BDA-P8AX09-6G-N/FF  -- FIPLEX: ANC-P8AX09-6G-N/FF
*/


  $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANC-P8AX09-6G-N/FF'";
  
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";
  $entro=0;

    $sql = $connect->prepare(  $sqlbuscabda);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
         $detect_partselect = $row2[$nombrecampo];
      
         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];

    break;
     }

     if (  $entro ==1)
     {
      $quantity =$v_resul_donorantenncount;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * $quantity );
      $elmontoamostrarsolito =  str_replace("$","$ ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace("$"," ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace(",",".",$elmontoamostrarsolitosinsimb); 
      $canthrlow = ($v_resul_donorantenncount* 0.083); 
      $canthrhig = ($v_resul_donorantenncount* 0.25);
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolitosinsimb);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 
      $sentenciaaction->execute();


  
  ?>
    <tr>
      <th scope="row"><?php  echo $detect_partselect; // echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php echo $v_resul_donorantenncount; ?></td>
      <td><?php echo  str_replace("$","$ ",$detect_price); ?></td>
      <td>$ <?php echo (  str_replace("$","",$detect_price) * $v_resul_donorantenncount ); 
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  $v_resul_donorantenncount);
      
      ?></td>
      <td><?php echo ($v_resul_donorantenncount* 0.083); ?></td>
      <td><?php echo ($v_resul_donorantenncount* 0.25);
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_donorantenncount* 0.083); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_donorantenncount* 0.25);
      ?></td>
    </tr>
  

     <!--COAXIAL JUMPER -->
 <?php
     }


     /*
     Coaxial Cable Jumper
     HONEYWELL: BDA-NM-RG58-05-NM -- FIPLEX::NM-RG58-05-NM
     HONEYWELL: BDA-NM-RG8-13-NM                  --- FIPLEX: NM-RG8-13-NM
     */

  $sqlbuscabda="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='NM-RG8-13-NM'";
  
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";
  $entro=0;
    $sql = $connect->prepare(  $sqlbuscabda);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
         $detect_partselect = $row2[$nombrecampo];
     

         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];

    break;
     }

     if (  $entro ==1)
     {
      $quantity =$v_resul_jumpercablecount;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * $quantity );
      $elmontoamostrarsolito =  str_replace("$","$ ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace("$"," ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace(",",".",$elmontoamostrarsolitosinsimb); 

      $canthrlow = ($v_resul_jumpercablecount* 0.083); 
      $canthrhig = ($v_resul_jumpercablecount* 0.25);
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolitosinsimb);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 
      $sentenciaaction->execute();


  
  ?>
    <tr>
      <th scope="row"><?php  echo $detect_partselect; // echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php 
      
      if ( $v_resul_jumpercablecount>0)
      {
      echo $v_resul_jumpercablecount; 
      }
      else
      {
echo "error".$v_resul_jumpercablecount; 

      }?></td>
      <td><?php 
      if ( $v_resul_jumpercablecount>0)
      {
      echo  str_replace("$","$ ",$detect_price); 
    }?></td>
      <td>$ <?php
      
      if ( $v_resul_jumpercablecount>0)
      {
        echo (  str_replace("$","",$detect_price) * $v_resul_jumpercablecount ); 
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  $v_resul_jumpercablecount);
      }
      
      ?></td>
      <td><?php  if ( $v_resul_jumpercablecount>0)
      { echo ($v_resul_jumpercablecount* 0.083); } ?></td>
      <td><?php  if ( $v_resul_jumpercablecount>0)
      { echo ($v_resul_jumpercablecount* 0.25); 
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_jumpercablecount* 0.083); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_jumpercablecount* 0.25);
      }
      ?></td>
    </tr>
  
    <!--Donor ANTENA -->
    <?php
     }

     /*
     HONEYWELL:: BDA-DDA450512-2-1 --- FIPLEX
     700/800 only

          ANT-Y-S-14-001
          BDA-YDA763869-14-1
          Donor Antenna, Yagi Directional 763-869MHz, 14dBi

          UHF only
          ANT-D-4-2-001
          BDA-DDA450512-2-1
          Donor Antenna, Inox Dipole, 450-512MHz 4.6dBi

          VHF only
          ANT-Y-1-11-001
          BDA-YDA150175-11-1
          Donor Antenna, Yagi Directional 150-175MHz, 7dBi


     */
    if( $channelcountUHF ==0 && $channelcountVHF ==0 )
    {
      if( $channelcount700 >0 || $channelcount800>0   )
      {
        $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-Y-S-14-001'";
      }
    }
    else
    {
      if( $channelcountUHF ==0 && $channelcountVHF >0  && $channelcount700 ==0 && $channelcount800 ==0 )
        {
           // vamos x VHF
          $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-Y-1-11-001'";
        }
        if( $channelcountUHF >0 && $channelcountVHF ==0  && $channelcount700 ==0 && $channelcount800 ==0 )
        {
         // vamos x UHF
         $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-D-4-2-001'";
        }
       
        if (  $sqldasantena =="" )
        {
          $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-D-4-2-001'";
        }
    }
   // echo "HOLA DONOR ANTENA". $sqldasantena;
    /// OLD ANT
    ///  $sqldasantena="select * from flexbda_products_budget where migrate ='Y' and fiplexpartnro ='ANT-D-4-2-001'";
  
  
  $detect_description="";
  $detect_price="";
  $detect_partnumberfiplex="";
  $detect_partnumberhoneywel="";
  $entro=0;

    $sql = $connect->prepare(  $sqldasantena);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row2) {
      $entro=1;
         $detect_partnumberfiplex =  $row2['fiplexpartnro'];
         $detect_partnumberhoneywel =  $row2['fiplexpartnro'];
         $detect_partselect = $row2[$nombrecampo];
     

         $detect_description =  $row2['des_'.$nombrecampo];
         $detect_price =  $row2['price_'.$nombrecampo];

    break;
     }

     if (  $entro ==1)
     {
      $quantity =$v_resul_donorantenncount;
      $elmontoamostrar =  (  str_replace("$","",$detect_price) * $quantity );
      $elmontoamostrarsolito =  str_replace("$","$ ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace("$"," ",$detect_price); 
      $elmontoamostrarsolitosinsimb =  str_replace(",",".",$elmontoamostrarsolitosinsimb); 

      $canthrlow = ($v_resul_donorantenncount* 5); 
      $canthrhig = ($v_resul_donorantenncount* 8);
      $sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
      $sentenciaaction->bindParam(':idproject', $vidp);
      $sentenciaaction->bindParam(':idrev', $vidr);	 
      $sentenciaaction->bindParam(':sku', $detect_partselect);
      $sentenciaaction->bindParam(':description', $detect_description);	 
      $sentenciaaction->bindParam(':quantity', $quantity );	 
      $sentenciaaction->bindParam(':netprice', $elmontoamostrarsolitosinsimb);	 
      $sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
      $sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
      $sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
      $orderreport =  $orderreport + 1 ;
      $sentenciaaction->bindParam(':orderreport', $orderreport);	 
      $sentenciaaction->execute();
  
  ?>
    <tr>
      <th scope="row"><?php  echo $detect_partselect; // echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php echo $v_resul_donorantenncount ; ?></td>
      <td><?php echo  str_replace("$","$ ",$detect_price); ?></td>
      <td>$ <?php echo (  str_replace("$","",$detect_price) *  $v_resul_donorantenncount  );
      
      $eltotal =  $eltotal +  (str_replace("$","",$detect_price) *  $v_resul_donorantenncount);
      ?></td>
      <td><?php echo ($v_resul_donorantenncount* 5); ?></td>
      <td><?php echo ($v_resul_donorantenncount* 8);
      
      $eltotal_hrlow =   $eltotal_hrlow  + ($v_resul_donorantenncount* 5); 
      $eltotal_hrhigh = $eltotal_hrhigh +  ($v_resul_donorantenncount* 8);
      ?></td>
    </tr>
<?php } ?>


<?php
////////////
/*

*/
$detect_partnumberhoneywel="BDA-SVC1-DESIGN";
$detect_description='Project Design';
$price_cable = 20;

if( $v_comcovarea <=250000)
{
  $quantity =120;
}
else
{
  if( $v_comcovarea <=501000)
  {
    $quantity =180;
  }
  else
  {
    if( $v_comcovarea <=100001)
    {
      $quantity =270;
    }
    else
    {
      if( $v_comcovarea <=2000001)
      {
        $quantity =420;
      }
      else
      {
        $quantity =600;
      }
    }
  }
}

$canthrlow =0;
$canthrhig =0;
$elmontoamostrar =  ($price_cable * $quantity );


$elmontoamostrarsolito = "20"; 

$sentenciaaction = $connect->prepare("INSERT INTO public.flexbdahoneywell_bugdet(idproject, idrev, sku, description, quantity, netprice, nettotal, esdlaborhow, esdlaborhigh, orderreport)  VALUES (:idproject, :idrev, :sku, :description, :quantity, :netprice, :nettotal, :esdlaborhow, :esdlaborhigh,:orderreport);");
$sentenciaaction->bindParam(':idproject', $vidp);
$sentenciaaction->bindParam(':idrev', $vidr);	 
$sentenciaaction->bindParam(':sku', $detect_partnumberhoneywel);
$sentenciaaction->bindParam(':description', $detect_description);	 
$sentenciaaction->bindParam(':quantity', $quantity );	 
$sentenciaaction->bindParam(':netprice', $elmontoamostrarsolito);	 
$sentenciaaction->bindParam(':nettotal', $elmontoamostrar);	 
$sentenciaaction->bindParam(':esdlaborhow', $canthrlow);	 
$sentenciaaction->bindParam(':esdlaborhigh', $canthrhig);	 
$orderreport =  $orderreport + 1 ;
$sentenciaaction->bindParam(':orderreport', $orderreport);	 
$sentenciaaction->execute();


?>
    <tr>
      <th scope="row"><?php echo $detect_partnumberhoneywel; ?></th>
      <td scope="row"><?php echo $detect_description; ?></td>
      <td><?php     echo $quantity; ?></td>
      <td><?php echo  $elmontoamostrarsolito; ?></td>
      <td>$ <?php echo $elmontoamostrar;
      
      $eltotal =  $eltotal + $elmontoamostrar;
      ?></td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td scope="row"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr class="fondogris2">
      <th colspan="4" class="text-right"><b>Total:</b></th>
  
      <td>$ <?php echo round($eltotal,2);?></td>
      <td> <?php echo round($eltotal_hrlow,2);?></td>
      <td><?php echo round($eltotal_hrhigh,2);?></td>
    </tr>


<tr class="fondogris2">
      <th colspan=7><br></th>
  
    </tr>

</table>
<?php
}
/// Close table calculos
?>  

<?php  if ($v_result_bdasuggestion =="MM_UHFVHF" &&  $activeproy <> "Y" )
{
?>
<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Attention!</h5>
                  This project contains VHF UHF bands, you must select a BDA
                </div>
<?php
}?>

<table class="table table-striped table-sm" id="makeEditable2">
   
 
</table>
<table class="table table-striped table-sm" id="makeEditable">

   <thead>
   <tr>
    <td colspan="8" >&nbsp;</td>
    </tr>
   <tr >
      <td scope="col" class="tablecabenegro" colspan=5>&nbsp;</td>
      <td scope="col" class="tablecabenegro" colspan=3>ESD Labor Est (Hrs.)</td>
      
    </tr>
     <tr>
    <th scope="col" style="width: 20%">Part Number</th>
      <th scope="col" style="width: 20%">Description</th>
      <th scope="col" style="width: 10%">Quantity</th>
      <th scope="col">ESD NET Price</th>
      <th scope="col" style="width: 15%">NET Total</th>
      <th scope="col">Low</th>
      <th scope="col">High</th>
      <th scope="col">      <?php if ($activeproy <>"Y")
                  { 
                    ?> Action   <?php } ?></th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  $rstmm = $connect->prepare("SELECT * FROM flexbdahoneywell_bugdet WHERE idproject= :idproject and idrev =:idrev order by orderreport ");
  $rstmm->bindParam(':idproject', $vidp);		
  $rstmm->bindParam(':idrev', $vidr);		
$rstmm->execute();
$resultado = $rstmm->fetchAll();		

foreach ($resultado as $rowheaders) 
            {
              $orderreport = $rowheaders['orderreport'];
              ?>
                <tr class='tablitamam<?php echo $orderreport; ?>'>
                  <td><?php echo $rowheaders['sku']; ?></td>
                  <td><?php echo $rowheaders['description']; ?></td>
                  <td><?php echo $rowheaders['quantity']; ?></td>
                  <td>$ <?php echo $rowheaders['netprice']; ?></td>
                  <td>$ <?php echo $rowheaders['nettotal']; ?></td>
                  <td><?php if ($rowheaders['esdlaborhow'] =="") { echo "0"; } else { echo $rowheaders['esdlaborhow']; }  ?></td>
                  <td><?php if ($rowheaders['esdlaborhigh'] =="") { echo "0"; } else { echo $rowheaders['esdlaborhigh'];} ?> </td>
                  <td>

                  <?php if ($activeproy <>"Y")
                  { 
                    ?>
                  <button class="btn btn-outline-primary btn-xs" data-toggle="modal" data-target="#myModal" contenteditable="false"  data-backdrop="static" data-keyboard="false">
                  Edit</button>
                  <button class="btn btn-outline-danger btn-xs" onclick="borrarme(<?php echo  $vidp.','.$vidr.','.$orderreport; ?>)" contenteditable="false">Del</button>
                  <?php } ?>
                  </td>
               </tr>
              <?php
              $vvtotalfina = $vvtotalfina + $rowheaders['nettotal']; 
              $vv_eltotal_hrlow = $vv_eltotal_hrlow +  $rowheaders['esdlaborhow']; 
              $vv_eltotal_hrhigh = $vv_eltotal_hrhigh +   $rowheaders['esdlaborhigh'];
            }
  
  ?>
        <tr class="fondogris2">
      <th colspan="4" class="text-right"><b>Total:</b></th>
  
      <td>$ <?php echo round($vvtotalfina,2);?></td>
      <td> <?php echo round($vv_eltotal_hrlow,2);?></td>
      <td><?php echo round($vv_eltotal_hrhigh,2);?></td>
      <td> </td>
    </tr>
    <tr>
    <td colspan="8" >&nbsp;</td>
    </tr>

  </tbody>
  <?php 
  if ( $activeproy <> "Y")
  {
  ?>
  <button class="btn btn-outline-primary  btn-block" data-toggle="modal" data-target="#myModal" contenteditable="false">Add Item to budget</button>
  <?php
  }
  ?>
                  
</table>
<?php 
  if ( $activeproy <> "Y")
  {
  ?>
  <button class="btn btn-outline-primary  btn-block" data-toggle="modal" data-target="#myModal" contenteditable="false">Add Item to budget</button>
  <?php
  }
  ?>
<br>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×   </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel"></h4>

            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Saveitembudget(<?php echo  $vidp.','.$vidr ?>); return false;">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php 
                         }
                         ?>

<?php 
                         if ( $estaaprobado == "NAP" && $vactive <> "Y" )
                         {

                          $v_nameactions="Project in process.";

                          $sentenciahonwywell = $connect->prepare("UPDATE flexbdahoneywell  SET active='W' WHERE idproject=:idproject AND idrev=:idrev");
                          $sentenciahonwywell->bindParam(':idproject', $vidp);	
                          $sentenciahonwywell->bindParam(':idrev', $vidr);	
                            $sentenciahonwywell->execute();   
                           $return_result_insert="ok"; 


                          //Insertamos estado.
                          $iduuff = 	$_SESSION["flexbdaa"];
                          $sentenciaaction = $connect->prepare("INSERT INTO flexbdahoneywell_actions(idproject, idrev, nameactions, detailsactions, datemodif, iduserselect)  VALUES (:idproject, :idrev, :nameactions,:detailsactions,now(), :iduserselect)");
                          $sentenciaaction->bindParam(':idproject', $vidp);
                          $sentenciaaction->bindParam(':idrev', $vidr);	 
                          $sentenciaaction->bindParam(':nameactions', $v_nameactions);
                          $sentenciaaction->bindParam(':detailsactions', $v_nameactions);	 
                          $sentenciaaction->bindParam(':iduserselect', $iduuff);	 
                          
                          $sentenciaaction->execute();

                          
                         ?>
                        <br><br>
                        
                     
                        <a name="anclame"></a>
                         <div class="form-group col-md-12">
                          <div class=" text-right">
                          <br><br>
                          <button type="button"  class="btn btn-block btn-primary right-align" onClick="approve()">Approve</button>
                          
                          
                          </div>
                          <p class="text-danger" id="lbldatoserrr">


                          </p>
                          </div>
                                <?php } ?>


                    </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

  
          <!--aaaaa /.col -->
        </div>
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="toastr.css">
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<script src="toastr.min.js"></script>
<script src="js/sweetalert2.min.js"></script>

<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="js/bootstrap-autocomplete.js"></script>

<script type="text/javascript">

var tabla_channel_quantity = [];
var tabla_gain_dlul= [];

tabla_channel_quantity.length=0;
 tabla_gain_dlul.length=0;


	$( document ).ready(function() {
    var vidtoke = (new URL(location.href)).searchParams.get('idtoke');
    var vidr =   (new URL(location.href)).searchParams.get('idr');




    
  //  console.log('a');
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


    });


function approve()
{
       var vv_idp = $("#idpr").val();
        var vv_idprev = $("#idrv").val();

        toastr["info"]("Sending information", "");		
         $.ajax
            ({ 
              url: 'ajax_approvedporjectmm.php',
              data: 'idp='+vv_idp+'&idpr='+vv_idprev+'',	
              type: 'post',				
              datatype:'JSON', 
              beforeSend:function(){
                    //show loading gif
                    toastr["info"]("Processing information, generating PDF. Sending email.", "");		
              },               
              success: function(data)
              { 
                console.log('OK');             
                //console.log(data.resultiu); 
                if (data.resultiu = "ok")
                {
                  toastr["success"]("Project Accepted", "");	
                  window.location='listprojects.php';
                }                          
              }
            });	
}

    function habilitomasinfo(qhacemos)
{
//  console.log('qhacemos:'+qhacemos)
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


function editame()
{
  $("#frmaa :input").prop("disabled", false);
  var element = $(".modoedit");
  element.removeClass('d-none');
}




function add_list_gain()
	{
		var v_txtchudstart = parseFloat($('#txtchudstart').val());
		var v_txtchudstop = parseFloat($('#txtchudstop').val());
		var v_txtchulstart = parseFloat($('#txtchulstart').val());
		var v_txtchulstop = parseFloat($('#txtchulstop').val());
		
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
						   
						 				   
						   
						//   tabla_gain_udul();
						   tabla_gain_udul2dagen();
						   
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
	 
	 function borrar_array_uldl	 (idborrarch)
	 {
		    tabla_gain_dlul.splice(idborrarch, 1); 
			
			$('body,html').stop(true,true).animate({				
				scrollTop: $("#listagainuldl").offset().top
			},1);
			
			tabla_gain_udul2dagen();
			$('body,html').stop(true,true).animate({				
				scrollTop: $("#listagainuldl").offset().top
			},1);
	 }


   function tabla_gain_udul2dagen_init()
	{
		var jname ="";
		var v_templistchannel="";
			var html = '<table class="table  table-striped table-sm ">';
				 html += '<tr class="thead-dark">';
				 var cantcabez = tabla_gain_dlul[0];
				 
				 for( var j in  cantcabez) {
					 
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
			//	 html += '<th>Action</th>';
				 html += '</tr>';
				 for( var i = 0; i < tabla_gain_dlul.length; i++) {
				  html += '<tr>';
				  
				  if (v_templistchannel != '')
				  {
					v_templistchannel = v_templistchannel + "#";  
				  }
				  
				  for( var j in tabla_gain_dlul[i] ) {
					 
					 if ( 'UNKNOW' == tabla_gain_dlul[i][j] )
					 {
						 html += '<td>' + tabla_gain_dlul[i][j]  +' </td>';	   
					 }
				     else
					 {
					   html += '<td>' + tabla_gain_dlul[i][j]  +' MHz</td>';	   
					 }	 
						
						v_templistchannel = v_templistchannel  + tabla_gain_dlul[i][j] + "|"
					
					
				  }
			//	  html += '<td>  <a href="#" class="d-none modoedit" onclick="borrar_array_uldl('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';	  
				  html += '</tr>';
				 }
				 html += '</table>';
				 v_templistchannel = v_templistchannel + "#";  
			//	 console.log(v_templistchannel);
				 	$('#listagainuldl').html(html);
					$('#templistagainuldl').val(v_templistchannel);
				
		
	}


  function tabla_gain_udul2dagen()
	{
		var jname ="";
		var v_templistchannel="";
			var html = '<table class="table  table-striped table-sm ">';
				 html += '<tr class="thead-dark">';
				 var cantcabez = tabla_gain_dlul[0];
				 
				 for( var j in  cantcabez) {
					 
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
			//	 html += '<th>Action</th>';
				 html += '</tr>';
				 for( var i = 0; i < tabla_gain_dlul.length; i++) {
				  html += '<tr>';
				  
				  if (v_templistchannel != '')
				  {
					v_templistchannel = v_templistchannel + "#";  
				  }
				  
				  for( var j in tabla_gain_dlul[i] ) {
					 
					 if ( 'UNKNOW' == tabla_gain_dlul[i][j] )
					 {
						 html += '<td>' + tabla_gain_dlul[i][j]  +' </td>';	   
					 }
				     else
					 {
					   html += '<td>' + tabla_gain_dlul[i][j]  +' MHz</td>';	   
					 }	 
						
						v_templistchannel = v_templistchannel  + tabla_gain_dlul[i][j] + "|"
					
					
				  }
				//  html += '<td>  <a href="#" onclick="borrar_array_uldl('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';	  
				  html += '</tr>';
				 }
				 html += '</table>';
				 v_templistchannel = v_templistchannel + "#";  
			//	 console.log(v_templistchannel);
				 	$('#listagainuldl').html(html);
					$('#templistagainuldl').val(v_templistchannel);
				
		
	}
	
  function add_channels()
	{
		//tabla_channel_quantity
		var v_dl_channel = parseFloat($('#txtchud').val());
		var v_ul_channel = parseFloat($('#txtchul').val());
		
		if (v_dl_channel=="" || v_ul_channel =="" || isNaN(v_dl_channel)==true || isNaN(v_ul_channel)==true )
		  {
			  ///|| v_ul_channel ==""
				 var v_loencontre_ch = 0;
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
					if ( v_loencontre_ch == 0)
					{
						  tabla_channel_quantity.push({						
						
							channelul: parseFloat(v_ul_channel)	,
              channeldl: parseFloat(v_dl_channel)				
							});
							tabla_channels();
							
							 
							$('#txtchud').val('');
							$('#txtchul').val('');
							
							 $("#txtchud").focus();
							  $("#txtchud").focus();
							  
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
				 // html += '<th>Action</th>';
				 html += '</tr>';
				 for( var i = 0; i < tabla_channel_quantity.length; i++) {
				  html += '<tr>';
				  
				  if (v_templistchannel != '')
				  {
					v_templistchannel = v_templistchannel + "#";  
				  }
				  
				  for( var j in tabla_channel_quantity[i] ) {
					 
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
			///	  html += '<td>  <a href="#" onclick="borrar_array_channel('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';	  
				  html += '</tr>';
				 }
				 html += '</table>';
				 v_templistchannel = v_templistchannel + "#";  
			//	 console.log(v_templistchannel);
				 	$('#listachannel').html(html);
					$('#templistchannel').val(v_templistchannel);
		
	}

  function tabla_channels_init()
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
		//		  html += '<th>Action</th>';
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
		//		  html += '<td>  <a href="#" onclick="borrar_array_channel('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';	  
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


  function save_modif_registro()
  {


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
//console.log(data.arr_idband)
                  for(var i=0; i< data.arr_idband.length ;i++)
                {
                //    console.log(data.arr_idband[i].fstartul );
                    $("#txtchulstart").val(  data.arr_idband[i].fstartul );
                    $("#txtchulstop").val( data.arr_idband[i].fstopul );
                    $("#txtchudstart").val( data.arr_idband[i].fstartdl );
                    $("#txtchudstop").val( data.arr_idband[i].fstopdl );
                }
               
              }
            });	
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
      //   console.log('CERRADO2');
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
							})
  }
  else
  {
	  alert('Error');
  }
})

///fin del
}

////////EDIT TABLE


function modify_budget(tipoband, tipodereseller )
{

  $('.js-example-basic-single').select2();

  $('#txtlistcius').select2({
 ajax: {
    url: "ajax_list_cuis.php",
    dataType: 'json',
    delay: 2,
    data: function (params) {
      return {
        q: tipodereseller, // search term       
        from: tipoband		//
      };
    },
    processResults: function (data) {
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data.items
      };    
    },
    cache: false
  },
  placeholder: 'Search CIU',
  minimumInputLength: 1 ,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});
}

function borrarme(vvidp, vvipr, vviorf)
{


  Swal.fire({
title:'are you sure you want to delete this item ?',						
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


    
	 
		return fetch('ajaxdelitembudget.php?v0='+vvidp+'&v1='+vvipr+'&v2='+vviorf+'')
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
          //////ocultar fila
          ///tablitamam1/2/3
          $( ".tablitamam"+ vviorf).addClass('d-none');
          /// Refrescamoss
          window.location = 'https://flexbda.com/listprojectsreport.php?idtoke='+vvidp+'&idr='+vvipr+'&st=NAP';

							})
  }
  else
  {
	  alert('Error');
  }
})



}

function Bsucarymostrar()
{
  toastr["info"]("Looking for Description and price", "");		
}

function Buscandomsj()
{
  toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

  toastr["info"]("Searching...", "");		
}
      
////////FIN EDIT TABLE
$(".btn[data-target='#myModal']").click(function() {
       var columnHeadings = $("thead th").map(function() {
                 return $(this).text();
              }).get();
       columnHeadings.pop();
       var columnValues = $(this).parent().siblings().map(function() {
                 return $(this).text();
       }).get();
  var modalBody = $('<div id="modalContent"></div>');
  var modalForm = $('<form role="form" name="modalForm" autocomplete="off" action="" onsubmit="return false"  method="post"></form>');
  $.each(columnHeadings, function(i, columnHeader) {
       var formGroup = $('<div class="form-group"></div>');
       formGroup.append('<label for="'+columnHeader+'">'+columnHeader+'</label>');
       if (columnHeader=='Part Number')
       {

        var valtempmma="";
        if (columnValues[i] == undefined) 
        {
          valtempmma="";
        }
        else
        {
          valtempmma=columnValues[i];
        }
   //    formGroup.append('<select class=" form-control basicAutoComplete" required  id="txtlistcius" name="txtlistcius"><option value=1> hola	</option> <option value=2> marco	</option> <option value=3> test	</option> </select>');
   //    formGroup.append('<select class="form-control basicAutoSelect" name="simple_select" placeholder="type to search..."  data-url="ajax_list_cuis.php" autocomplete="off"></select>'); 

  //     formGroup.append('<select class="form-control basicAutoSelect" name="simple_select" placeholder="type to search..."  data-url="ajax_list_cuis.php" autocomplete="off"></select>'); 
       formGroup.append(' <input class="form-control basicAutoComplete" name="txtdin'+i+'" id="txtdin'+i+'" type="text"  placeholder="type to search...(minimum 3 characters)" value="'+valtempmma+'"  data-url=""  onblur="Bsucarymostrar(this.value)" onkeypress="Buscandomsj()"  autocomplete="off">'); 
         ///fin cargar combo
       }
       else
       {
         var valtempmm="";
        if (columnValues[i] == undefined) 
        {
          valtempmm="";
        }
        else
        {
          valtempmm=columnValues[i];
        }
        //formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+valtempmm+'" />'); 
        formGroup.append('<input class="form-control" name="txtdin'+i+'" onblur="actualizame()" id="txtdin'+i+'" value="'+valtempmm+'" />'); 
       }
       
       modalForm.append(formGroup);
  


  });
  modalBody.append(modalForm);
  $('.modal-body').html(modalBody);

  $('.basicAutoComplete').autoComplete({
					resolverSettings: {
						url: 'ajax_list_cuis.php?mm='+$("#abc").val()
					}
				});

        $('.basicAutoComplete').on('autocomplete.select', function(evt, item) {
					console.log('value:'+item.value+'- description'+item.dd+'-price'+item.pricem);
          $("#txtdin1").val(item.dd);
          $("#txtdin3").val(item.pricem.replace('$',''));

          if ( $("#txtdin2").val() > 0)
          {
             $("#txtdin4").val(   $("#txtdin2").val() * item.pricem.replace('$',''));
          }
          else
          {}

          });
        
          


});
$('.modal-footer .btn-primary').click(function() {
   $('form[name="modalForm"]').submit();
});


function Saveitembudget(vidpp, vidpprev)
{
var vv_txtdin0 = $("#txtdin0").val();
var vv_txtdin1 = $("#txtdin1").val();
var vv_txtdin2 = $("#txtdin2").val();
var vv_txtdin3 = $("#txtdin3").val().replace('$','');  // 
var vv_txtdin4 = $("#txtdin4").val().replace('$','');  // 
var vv_txtdin5 = $("#txtdin5").val();
var vv_txtdin6 = $("#txtdin6").val();

$.ajax
			({ 
				url: 'ajax_additembudget.php',
				data: "v0="+vv_txtdin0+"&v1="+vv_txtdin1+"&v2="+vv_txtdin2+"&v3="+vv_txtdin3+"&v4="+vv_txtdin4+"&v5="+vv_txtdin5+"&v6="+vv_txtdin6+"&v7="+vidpp+"&v8="+vidpprev,	
				type: 'post',
				async:true,
                cache:false,
				success: function(data)
				{
				//	var datax = JSON.parse(data)
					console.log(data);
          if (data.resultiu = 'ok')
          {
            toastr["success"]("Modified Budget.", "");	
            window.location = 'https://flexbda.com/listprojectsreport.php?idtoke='+vidpp+'&idr='+vidpprev+'&st=NAP';

          /* Swal.fire({
							  title: 'Modified Budget!',							  
							  icon: 'success',
							  showCancelButton: false,
							  confirmButtonColor: '#3085d6',							  
							  confirmButtonText: 'OK',							  
							}).then((result) => {
							 //aca refresgg
          //////ocultar fila
          ///tablitamam1/2/3
          ///$( ".tablitamam"+ vviorf).addClass('d-none');
          /// Refrescamoss
          window.location = 'https://flexbda.com/listprojectsreport.php?idtoke='+vidpp+'&idr='+vidpprev+'&st=NAP';

							})*/


          }
          else
          {
            toastr["info"]("Error...", "");		
          }
 
		
				}
			});




}

function actualizame()
{
  if ($.isNumeric(  $("#txtdin2").val().replace('$','')  )==true)
  {
    if ($.isNumeric(  $("#txtdin3").val().replace('$','')  )==true)
    {
      $("#txtdin4").val('$ ' +  $("#txtdin2").val().replace('$','')  * $("#txtdin3").val().replace('$','') );
    }
  }

  
  if (  $("#txtdin5").val() =="")
    {
      $("#txtdin5").val(0);  
    }
    if (  $("#txtdin6").val() =="")
    {
      $("#txtdin6").val(0);  
    }

}
  
</script>


</body>
</html>
