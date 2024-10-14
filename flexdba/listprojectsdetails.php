<?php 

// Desactivar toda notificación de error
error_reporting(0);
// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);
include("db_conectflexbda.php"); 
 
 	session_start();
	


	
if(isset($_SESSION["timeoutflexbda"])){
  // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
//	echo "***********hola".time() - $_SESSION["timeout"];
  $sessionTTL = time() - $_SESSION["timeoutflexbda"];
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
	
	//	echo "Hola:".$_SESSION["timeout"];
		
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FLEXBDA</title>
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
    background-color: #095488;
    color: #fff;
    font-size: 1.0625em;
}
.colorrojofont
  {
    color:#B6131F;

    font-weight: bolder;
  }

  .fondogris
{
  background-color: #e9ecef;
    opacity: 1;
}

  </style>

</head>
<body onload="verificarFormQuickQuote();" class="hold-transition sidebar-mini layout-fixed">
<form action="listprojectsdetails.php" method="post" class="form-horizontal" name="frmaa" id="frmaa">
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


  //  $vidp = $_REQUEST['idtoke'];
 ///   $vidr = $_REQUEST['idr'];

?>
<input type="hidden" name="idpr" id="idpr" value="<?php echo $vidp; ?>">
<input type="hidden" name="idrv" id="idrv" value="<?php echo $vidr; ?>">
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
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects Detail </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    

 <!-- Default box -->
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

        
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
             
              <div class="row">
                <div class="col-12">
                



                    <div class="">
                <div class="row">
                 
                    <!-- inicio form add -->
                    <?php

error_reporting(0);

include("db_conectflexbda.php"); 

                    $senten_buscabanda = $connect->prepare("select * from flexbdahoneywell_band where idproject= :idproject and idrev=:idrev and typeref ='FREQBAND' ");
                    $senten_buscabanda->bindParam(':idproject', $vidp);
                    $senten_buscabanda->bindParam(':idrev', $vidr);	 	 
                    $senten_buscabanda->execute();
                    
                    $resultbandas = $senten_buscabanda->fetchAll();
                    $banda700=0;
                    $banda800=0;
                    foreach ($resultbandas as $rowBand) {
                          
    
                      //BANDAS FRECUENCIAS 700/800
                      if (strpos($rowBand['nombbandtemp'], '700') !== false) 
                      {
                      $banda700 =1;                    
                      }
                      if (strpos($rowBand['nombbandtemp'], '800') !== false) 
                      {
                        $banda800 =1;                      
                      }                    
                    }  
                    ////Search information x idproject.
     
                    $versionSQL = $connect->prepare("SELECT max(idrev) as m FROM flexbdahoneywell where idproject='$vidp'");
                    $versionSQL -> execute();
                    $resultadoV = $versionSQL->fetchAll();	

                    foreach ($resultadoV as $rowV) {
                      $maxRevision= $rowV['m'];
                    }   
                                 

                  
                    if (   $vidr  =="" && $vidr  <> "0")
                    {
                     /// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa:".$vidr;
                      $rstmm = $connect->prepare("SELECT * FROM flexbdahoneywell WHERE idproject= :idproject and idrev = (select max(idrev) from flexbdahoneywell where   idproject= :idproject  ) ");
                      $rstmm->bindParam(':idproject', $vidp);		
                    }
                    else
                    {
                      $rstmm = $connect->prepare("SELECT * FROM flexbdahoneywell WHERE idproject= :idproject and idrev =:idrev ");
                      $rstmm->bindParam(':idproject', $vidp);		
                      $rstmm->bindParam(':idrev', $vidr);		
                    }
                   
                    
              
                    $rstmm->execute();
                    $resultado = $rstmm->fetchAll();		
                    
                    foreach ($resultado as $rowheaders) 
																{
                                  
                                  $vprojectname = $rowheaders['projectname'];
                                  $vidrev = $rowheaders['idrev'];
                                  $vestado = $rowheaders['active'];
                                
                                  $projectdraft = $rowheaders['idproject'];
  $projectdraftrev = $rowheaders['idrev'];
  $psswdtkkey  = $rowheaders['seeddraft'];

      $vprojectname = $rowheaders['projectname'];
      $vaddress = $rowheaders['address'];
      $vcoordinateslat = $rowheaders['coordinateslat'];
      $vidcustomers = $rowheaders['idcustomers'];
      $vidusercustomers = $rowheaders['idusercustomers'];

      //LLC
      // $vtxtfloortype1count333 =1;
      // $vtxtfloortype2count = $rowheaders['floortype2count'];
      // if ($vtxtfloortype2count <> "")
      // {
      //   $vtxtfloortype1count333 =2;
      // }

      //LC
      $vtxtfloorscoverage = $rowheaders['floortype1count'];
      
      $vtxttotalsquarefoot = $rowheaders['floortype1countavg'] * $rowheaders['totalfloorsbuilding'];

      // $vtxtfloortype2count = $rowheaders['floortype2count'];
      // $vtxtfloortype2countavg = $rowheaders['floortype2countavg'];
      //LC
      $vtxttotalnumberofloors = $rowheaders['totalfloorsbuilding'];

      $vdatecreate = $rowheaders['datecreate'];
      $vcoordinateslon = $rowheaders['coordinateslon'];
      $vavgfloorheight = $rowheaders['avgfloorheight'];
      $vrfenvironment = $rowheaders['rfenvironment'];


 
      $vcoverageneeded = $rowheaders['coverageneeded'];
      $vnumberchannelsxband = $rowheaders['numberchannelsxband'];
      $vsimplexconfig = $rowheaders['simplexconfig'];

      $vtxtbdadloutputpowervhf = $rowheaders['bdadloutputpowervhf'];
      $vtxtbdadloutputpoweruhf = $rowheaders['bdadloutputpoweruhf'];
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
      $vdba_powerreq = $rowheaders['dba_powerreq'];

      $vvbbu_req = $rowheaders['bbu_req'];
      $valarm_brand = $rowheaders['alarm_brand'];
      $valarm_install_facp = $rowheaders['alarm_install_facp'];
      $valarm_req_annuciator = $rowheaders['alarm_req_annuciator'];
      if($valarm_req_annuciator =="YES") { $valarm_req_annuciator= "YES - With dry contacts to feed the FACP"; }

      $vdr_requierd = $rowheaders['dr_requierd'];
      $vdr_ahjpackage = $rowheaders['dr_ahjpackage'];
      $vdr_instalationtype = $rowheaders['dr_instalationtype'];
      $vdr_mat_extwall = $rowheaders['dr_mat_extwall'];
      $vdr_mat_intwall = $rowheaders['dr_mat_intwall'];

      $vinexc700 = $rowheaders['inexc700'];
      $vinexc800 = $rowheaders['inexc800'];

      $vdr_mat_glasstype = $rowheaders['dr_mat_glasstype'];
      $vdr_mat_rooftype = $rowheaders['dr_mat_rooftype'];
      $vdr_firecontrolroomloc = $rowheaders['dr_firecontrolroomloc'];
      $vdr_bdaeqlocation = $rowheaders['dr_bdaeqlocation'];
      $vdr_verticalriserloc = $rowheaders['dr_verticalriserloc'];
      $vdr_donorantloc = $rowheaders['dr_donorantloc'];
      $vdr_special = $rowheaders['dr_special'];
      $vdesigntransition = $rowheaders['designtransition'];

      $vtxtocupancyfield = $rowheaders['ocupancy'];
      $v_buildingduedate = str_replace("-","/",substr ($rowheaders['buildingduedate'],0,10));
      $v_installationduedate = str_replace("-","/",substr ($rowheaders['installationduedate'],0,10));

                                
																}
                    
                    ?>
                    <input type="hidden" name="maxidrv" id="maxidrv" value="<?php echo $maxRevision; ?>">

                    <div class="">

																	

                          <div class="form-row">
                          <div class="form-group col-md-12 ">

                          <h3 ><?php echo $vprojectname." -Rev:[".$vidrev."]"; ?> 
                          
                          <?php if (    ($maxRevision==$vidr) &&  $vestado =="P"   && 	$_SESSION["flexbdag"]  <> "RSM" && $_SESSION["flexbdag"]  <> "BDABDM" ) 
                          {
                            ?>
                          &nbsp; <a href='#' onclick='editame()'><i class='fas fa-edit' ></i></a>
                          <?php } ?>
                          </h3>
                         <p class="text-muted">
                         <?php echo "<br>".$vdr_special; ?></p>
                        
                          </div>							   
                          <div class="form-group col-md-12 modoedit d-none ">
                          
                          <label for="exampleInputEmail1">Project Name:</label>
                          <input type="text" name="txtnomproj" id="txtnomproj"  onblur="saveborrado();"  value="<?php echo $vprojectname; ?>" class="form-control" placeholder=" Project Name" required oninvalid="setCustomValidity(' Project Nam is required.')" oninput="setCustomValidity('')">


                          <input type="hidden" name="projectdraft" id="projectdraft" class="form-control" value="<?php echo $projectdraft; ?>">
                          <input type="hidden" name="projectdraftrev" id="projectdraftrev" class="form-control" value="<?php echo $projectdraftrev; ?>">




                          </div>

                          
                   
                          <div class="form-group col-md-12" id="adjunto1">
                          <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Floor Plans: (Please show donor antenna location, BDA location, and all available riser shafts in the floor plans,, survey documents) </label>
                          <div class="col-sm-10">
                              <div class="container">
                              <button name="btnaddatt1" id="btnaddatt1" type="button" class="btn btn-smk d-none  modoedit btn-xs  btn-outline-primary btn-flat" onclick="openattach(1)">click here to upload files</button>
                        
                              <div class="dropzone dz-clickable ui-sortable" id="myDrop1">
                              <b> List of attached files:</b><br>
                              <?php

                                  //$sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and idrev = ".$projectdraftrev ."  and typefile ='plans' and active = 'Y'";
                                  $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and typefile ='plans' and active = 'Y'";
                         
                                   //  echo $sqlproject;
                                  $msjnotdata = 0;
                                  $resultado = $connect->query($sqlproject)->fetchAll();	

                               
                                  foreach ($resultado as $row2) {
                                    $nombrreamostrar =  str_replace( $row2['seedtemp']."_"," ",$row2['fileattach'] );
                                    ?>
                                      <a href='https://flexbda.com/attachflexbda/<?php echo  trim($row2['fileattach']); ?>' target='_blank' >
                                    <i class='fas fa-file'></i></a>
                                    <?php echo  $nombrreamostrar ; ?>
                                    <a href='#' class="modoedit d-none"  onclick='delattach("<?php echo $row2['idnroattach']; ?>","<?php echo $nombrreamostrar; ?>")'><i class='far fa-times-circle' style='color:red'></i></a><br>
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
                              <button name="btnaddatt1" id="btnaddatt1" type="button" class="btn btn-smk d-none modoedit  btn-xs  btn-outline-primary btn-flat" onclick="openattach(2)">click here to upload files</button>
                        
                              <div class="dropzone dz-clickable ui-sortable" id="myDrop2">
                             <b> List of attached files:</b><br>
                              <?php

                                 //$sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and idrev = ".$projectdraftrev ."  and typefile ='ahj' and active = 'Y'";
                                $sqlproject = "SELECT * FROM flexbdahoneywell_attach  where idproject =".$projectdraft." and typefile ='ahj' and active = 'Y'";
                     //       echo $sqlproject;
                                  $msjnotdata = 0;
                                  $resultado = $connect->query($sqlproject)->fetchAll();	

                                  foreach ($resultado as $row3) {
                                    $nombrreamostrar =  str_replace( $row3['seedtemp']."_"," ",$row3['fileattach'] );
                                    ?>
                                      <a href='https://flexbda.com/attachflexbda/<?php echo  trim($row3['fileattach']); ?>' target='_blank' >
                                    <i class='fas fa-file'></i></a>
                                    <?php echo  $nombrreamostrar ; ?>
                                    <a href='#' class="modoedit d-none"  onclick='delattach("<?php echo $row3['idnroattach']; ?>","<?php echo $nombrreamostrar; ?>")'><i class='far fa-times-circle' style='color:red'></i></a><br>
                                    <?php
                                  }

                                  ?>

                              </div>
                             
                            </div>
                            <hr>

                          </div>
                          </div>
                          </div>

                          <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span>Bid due date:<?php //echo $v_buildingduedate; ?> </label>
                          <input type='text' class="form-control form-control-sm modoedit" disabled data-format="yyyy-MM-dd" id='datetimepicker1' value="" />
								                            
                           
                            </div>

                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span>Installation date:</label>
                          <input type='text' class="form-control form-control-sm modoedit " disabled  id='datetimepicker2'  />
								                            
                           
                            </div>
                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span> Select type of service: </label>
                          
                           
                          <select class="form-control" name="txtdesigntra" id="txtdesigntra" onblur="saveborrado();"  required="" disabled oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                                    
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
                   
                            <div class="form-group col-md-12" id="buildaddress">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Building Address:  (Street/City/State/Zip)</label>
                          <input type="text" name="txtaddressbuild" id="txtaddressbuild" disabled value="<?php echo $vaddress; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' address is required.')" oninput="setCustomValidity('')">
                            </div>
                      

                            <div class="form-group col-md-6" id="coordlat">
                               
                                   <label for="exampleInputEmail1">Building Coordinates:<br>Latitude:</label>
                                  <input type="text" name="txtcoordinateslat" id="txtcoordinateslat" disabled  value="<?php echo $vcoordinateslat; ?>" class="form-control" placeholder="Latitude" required oninvalid="setCustomValidity(' Coordinates is required.')" oninput="setCustomValidity('')">
                               
                                  </div>
                                  <div class="form-group col-md-6" id="coordlong">
                                    <br>
                                 <label for="exampleInputEmail1">Longitude:</label>
                          
                                  <input type="text" name="txtcoordinateslon" id="txtcoordinateslon" disabled onblur="saveborrado();" value="<?php echo $vcoordinateslon; ?>" class="form-control" placeholder="Longitude" required oninvalid="setCustomValidity(' Coordinates is required.')" oninput="setCustomValidity('')">
                                
                            </div>

                                           <div class="form-group col-md-12"> <span style="color:red"><b>*</b> </span> <b>Installation Type :</b> <br>
                           <select class="form-control" name="txtinstalltypedesing" id="txtinstalltypedesing" disabled required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="NEW" <?php if($vdr_instalationtype =="NEW") { echo "selected"; } ?>>NEW </option>
											  <option value="RETROFIT" <?php if($vdr_instalationtype =="RETROFIT") { echo "selected"; } ?>>RETROFIT</option>
											
										</select>	
                     </div>
                           
                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Building Type (RF Environment):  </label>
                          <select class="form-control" name="txtrfenvironment" id="txtrfenvironment" disabled required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
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
                          <select class="form-control" name="txtocupancyfield" id="txtocupancyfield" disabled required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
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
                            <!-- <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Coverage needed for which public safety agencies :</label>
                            <select multiple class="form-control selectpicker fondogris" name="txtneededcoverage" id="txtneededcoverage" onblur="saveborrado();" required="" oninvalid="setCustomValidity('Coverage needed for which public safety agencies is required.')" oninput="setCustomValidity('')">
                                <option value=""> - Select - </option>
                                <option value="Fire" <?php $pos = strpos($vcoverageneeded , "Fire");  if ($pos === false) {} else { echo "selected"; } ?> >Fire</option>
                                <option value="Police" <?php  $pos = strpos($vcoverageneeded , "Police");  if ($pos === false) {} else {  echo "selected"; } ?> >Police</option>
                                <option value="EMT" <?php  $pos = strpos($vcoverageneeded , "EMT");  if ($pos === false) {} else { echo "selected"; } ?> >EMT</option>
                                <option value="Others" <?php  $pos = strpos($vcoverageneeded , "Others");  if ($pos === false) {} else {  echo "selected"; } ?> >Others</option>
                              
                            </select>	
                          </div> -->

                            <!-- <div class="form-group col-md-12">
                          <label for="exampleInputEmail1" > <span style="color:red"><b>*</b> </span>  Number of floor types (different floor sqft)::</label>
                          
                           
                          <select class="form-control" name="txtfloortype1countselect" disabled id="txtfloortype1countselect" onchange="habilitarfloortype(this.value)" required="" oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                                <option value=""> - Select - </option>
                               
                                <option value="1"  <?php if($vtxtfloortype1count333 =="1") { echo "selected"; } ?> >1</option>
                                <option value="2"  <?php if($vtxtfloortype1count333 =="2") { echo "selected"; } ?>>2</option>
                                 
                                                        
                            </select>	
                           
                           
                           
                            </div>
                          
                           
                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1">For Floor type 1: Number of floors that required full coverage</label>
                          <input type="number"    min="1" max="200" name="txtfloortype1count" disabled onkeydown="return validNumericos(event)"  value="<?php echo $vtxtfloortype1count; ?>" id="txtfloortype1count" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12">
                            
                            <label for="exampleInputEmail1"> Floor Type 1 average area (sqft):</label>
                            <input type="text" name="txtfloortype1countavg" id="txtfloortype1countavg" disabled onkeydown="return validNumericos(event)"  value="<?php echo $vtxtfloortype1countavg; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
                          </div>
                            <div class="form-group col-md-12 <?php if  ($vtxtfloortype2count=="") { echo "d-none"; } ?>  habfloor2" >
                          <label for="exampleInputEmail1">For Floor type 2: Number of floors that required full coverage</label>
                          <input type="number"  min="1" max="200" name="txtfloortype2count" disabled id="txtfloortype2count" onkeydown="return validNumericos(event)" value="<?php echo $vtxtfloortype2count ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 <?php if  ($vtxtfloortype2countavg=="") { echo "d-none"; } ?>  habfloor2">
                            
                            <label for="exampleInputEmail1"> Floor Type 2 average area (sqft):</label>
                            <input type="number" min="1" max="200" name="txtfloortype2countavg" disabled onkeydown="return validNumericos(event)" onblur="saveborrado();" id="txtfloortype2countavg" value="<?php echo $vtxtfloortype2countavg; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                         
                          </div> -->
                          <div class="form-group col-md-12">
                                                  
                                                  <label for="txttotalsquarefoot"><span style="color:red"><b>*</b> </span> Total square footage of a building:</label>
                                                  <input 
                                                  type="number" 
                                                  min="0.01" 
                                                  name="txttotalsquarefoot" 
                                                  step="0.1" 
                                                  disabled 
                                                   id="txttotalsquarefoot" 
                                                  value="<?php echo $vtxttotalsquarefoot; ?>" class="form-control" 
                                                  placeholder="" 
                                                  required 
                                                  onblur="saveborrado();"
                                                  oninvalid="setCustomValidity(' is required.')" 
                                                  oninput="setCustomValidity('')">
                                               
                                                </div>  

                          <div class="form-group col-md-12">
                            
                            <label for="txttotalnumberofloors"><span style="color:red"><b>*</b> </span> Total number of floors of a building:</label>
                            <input 
                            type="number" 
                            min="1"
                            name="txttotalnumberofloors" 
                            disabled 
                            id="txttotalnumberofloors" 
                            value="<?php echo $vtxttotalnumberofloors; ?>" 
                            class="form-control" 
                            placeholder="" 
                            required 
                            onkeydown="return validNumericos(event)" 
                            onblur="saveborrado()"
                            oninvalid="setCustomValidity(' is required.')" 
                            oninput="setCustomValidity('')"
                            onchange="floorscoverage()"
                            
                            >
                         
                          </div> 

                          <div class="form-group col-md-12">
                            <label for="txtfloorscoverage"><span style="color:red"><b>*</b> </span> Number of floors that need coverage (based on survey):</label>
                            <input 
                            type="number" 
                            min="1" 
                            name="txtfloorscoverage" 
                            step="1"
                            onblur="saveborrado()" 
                            id="txtfloorscoverage" 
                            disabled
                            value="<?php echo $vtxtfloorscoverage ?>"
                            class="form-control" 
                            placeholder="" 
                            required 
                            oninvalid="setCustomValidity(' is required.')" 
                            oninput="setCustomValidity('')"  
                            onkeydown="return validNumericos(event)"                                                 
                            >
                          </div>

                          <div class="form-group col-md-12">
                          <label for="exampleInputEmail1">  Average floor height (ft):</label>
                          <input type="number"  min="1" max="100" name="avgfloorheight" disabled onkeydown="return validNumericos(event)" id="avgfloorheight" value="<?php echo $vavgfloorheight; ?>"    class="form-control" placeholder="" required oninvalid="setCustomValidity(' Average floor height is required.')" oninput="setCustomValidity('')">
                            </div>
                 
                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">BDA Requirements </p>
                          <hr class="borderojo">
                          </div>	
                          <div class="form-group col-md-6" id="floorlocated">
                          
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Which Floor will the BDA be located on?:</label>
                          <input type="number" name="txtflorbdalocate" id="txtflorbdalocate" disabled value="<?php echo $vbda_floordba; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('Which Floor will the BDA be located on is required.')" oninput="setCustomValidity('')">
                      
                           </div>  
                           <div class="form-group col-md-6">
										<label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Filtering Requirement:</label>
                    <select class="form-control" disabled name="txttypeclass" id="txttypeclass" required="" onclick="filterrq(this.value)" oninvalid="setCustomValidity('Class is required.')" oninput="setCustomValidity('')">
                              <option value="A" <?php if($vbda_filter =="A") { echo "selected"; } ?>>Class A Channelized </option>
                              <option value="B" <?php if($vbda_filter =="B") { echo "selected"; } ?>>Class B Band Selective</option>
                            
                          </select>	
                  </div>
                  
                  <div class="form-group col-md-6">
										<label for="exampleInputEmail1">BDA Main Input Power Requirement :</label>
									 		<select class="form-control" name="txtbdamainpwr" id="txtbdamainpwr" disabled required="" oninvalid="setCustomValidity('BDA Main is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="AC"  <?php if($vdba_powerreq =="AC") { echo "selected"; } ?>>AC Power: 110VAC </option>
											  <option value="DC"  <?php if($vdba_powerreq =="DC") { echo "selected"; } ?>>DC Power: 24/-48VDC</option>
											
										</select>	
									</div>
                         
                       

                                                   <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Project Frequency Information </p>
                          <hr class="borderojo">
                          </div>	
                          <!-- <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Coverage needed for which public safety agencies :</label>
                              <select class="form-control" name="txtneededcoverage" id="txtneededcoverage" disabled onblur="saveborrado();" required="" oninvalid="setCustomValidity('Coverage needed for which public safety agencies is required.')" oninput="setCustomValidity('')">
                                <option value=""> - Select - </option>
                                <option value="Fire" <?php if($vcoverageneeded =="Fire") { echo "selected"; } ?> >Fire</option>
                                <option value="Police" <?php if($vcoverageneeded =="Police") { echo "selected"; } ?> >Police</option>
                                <option value="EMT" <?php if($vcoverageneeded =="EMT") { echo "selected"; } ?> >EMT</option>
                                <option value="Others" <?php if($vcoverageneeded =="Others") { echo "selected"; } ?> >Others</option>
                              
                            </select>	
                          </div> -->

                          <div class="form-group col-md-6 fondogris">
                            <label for="exampleInputEmail1"> Select Required Frequency Bands for the project and Click on Add to List:</label>
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
							<td><label class=" col-form-label">Unit UL (MHz):	   Start: </label> <input type="number"  class="form-control  col-sm-6" id="txtchulstart" min="1" data-validate="false" name="txtchulstart" placeholder="000.000"> </td>
							<td><label class=" col-form-label">  &nbsp; Stop: </label>  <input type="number" class="form-control  col-sm-6" id="txtchulstop" data-validate="false" name="txtchulstop" placeholder="000.000">  </td>
						</tr>
            <tr>
							<td><label class=" col-form-label">Unit DL (MHz): Start: </label>	<input type="number" class="form-control col-sm-6" id="txtchudstart" min="1" data-validate="false" name="txtchudstart" placeholder="000.000"></td>
							<td><label class=" col-form-label">  &nbsp; Stop: </label>  <input type="number" class="form-control  col-sm-6" id="txtchudstop" data-validate="false" name="txtchudstop" placeholder="000.000"> </td>
						</tr>
            <tr>
							
							<td colspan=2>
							 <button name="btnlist_gain" id="btnlist_gain" type="button" class="btn btn-smk btn-block modoedit btn-outline-primary btn-flat d-none" onclick="add_list_gain()">Add to List</button>
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



				  
					
              <div class="form-group col-md-6 fondogris	" id="losch" name="losch">

              <br><b>Same UL/DL ch freqs (Simplex Mode) : </b>            
               <select class="form-control" onchange="habsimplexch(this.value)" name="txtsimpleconfigbych" id="txtsimpleconfigbych" >
											   <option value=""> - Select - </option>
                         <option value="YES" <?php if($vsimplexconfig =="YES") { echo "selected"; } ?> >YES</option>
											  <option value="NO" <?php if($vsimplexconfig !="YES") { echo "selected"; } ?> >NO</option>
											
										</select>	<br>

              <label class="col-sm-2 col-form-label">UL Channels (MHz):	</label>    <input type="number" min="1" class="form-control" data-validate="false" id="txtchul" onblur="copysimplexconfig()" name="txtchul" placeholder="000.000"> 
                <label class="col-sm-2 col-form-label">DL Channels (MHz):</label>  <input type="number" min="1" class="form-control" data-validate="false" id="txtchud" name="txtchud" placeholder="000.000">
                
            
            <br>		<button name="btnaddchannels" id="btnaddchannels" type="button" class="btn btn-smk btn-block btn-outline-primary btn-flat modoedit d-none" onclick="add_channels()">Add to Channel List</button>
            <br>
                <input type="hidden" class="form-control" id="templistchannel" name="templistchannel">
                <br>
                <span class="colorrojofont">&nbsp; Try to be accurate on channels quanitity because will impact on the estimate price </span>
            <br><br>
              </div>
			
              <div class="form-group col-md-6 fondogris" id="losch1" name="losch1" >
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
				

                            <div id="divbdadloutputpowervhf" class="form-group col-md-6">
                              <label for="txtbdadloutputpowervhf">BDA DL Output power - VHF</label>
                                <select class="form-control" name="txtbdadloutputpowervhf" disabled id="txtbdadloutputpowervhf" onblur="saveborrado();">
                                
                                  <option value=""> - Select - </option>
                                  <option value="24dBm" <?php if($vtxtbdadloutputpowervhf =="24dBm") { echo "selected"; } ?> >24dBm</option>
                                  <option value="30dBm" <?php if($vtxtbdadloutputpowervhf =="24dBm") { echo "selected"; } ?> >30dBm</option>
                              
                              </select>

                            </div>

                            <div id="divbdadloutputpoweruhf" class="form-group col-md-6">
                              <label for="txtbdadloutputpoweruhf">BDA DL Output power - UHF</label>
                                <select class="form-control" name="txtbdadloutputpoweruhf" disabled id="txtbdadloutputpoweruhf" onblur="saveborrado();">
                                
                                  <option value=""> - Select - </option>
                                  <option value="30dBm" <?php if($vtxtbdadloutputpoweruhf =="30dBm") { echo "selected"; } ?> >30dBm</option>
                                  <option value="37dBm" <?php if($vtxtbdadloutputpoweruhf =="37dBm") { echo "selected"; } ?> >37dBm</option>
                              
                                </select>

                          </div>

                  <br>
                  <br>
                 <div class="form-group col-md-6" id="losch2" name="losch2">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b></span>Max Number of Channels:</label>
                          <input type="number" name="numbchxband" id="numbchxband" class="form-control"   placeholder="" onblur="chequearmaxvalor(this.value, 32);"   max="32" value="<?php if ($vnumberchannelsxband =="") { echo "32"; } else {  echo $vnumberchannelsxband; }  ?>" required oninvalid="setCustomValidity('Number of Channels for each bandis required.')" oninput="setCustomValidity('')">
                            </div>
                        
                            <div class="form-group col-md-6 d-none">
                          
                          <label for="exampleInputEmail1">Do any of the channels work in a simplex configuration (same DL & UL frequency):</label>
                        	<select class="form-control" name="txtsimpleconfig" disabled id="txtsimpleconfig" required="" oninvalid="setCustomValidity('simplex configuration  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES" <?php if($vsimplexconfig =="YES") { echo "selected"; } ?> >YES </option>
											  <option value="NO" <?php if($vsimplexconfig =="NO") { echo "selected"; } ?> >NO</option>
											
										</select>	
                           </div>  


                           <!-- $vinexc700 = $rowheaders['inexc700']; -->
                        <?php
                        if($banda700==1 || $banda800==1){
                          if($banda700==1){  
                            ?>
                           <div id="divinexc700" class="form-group col-md-12">
                            
                                <hr class="borderojo">
                                                                                          
                                <fieldset>
                                <legend class="colorazultitulo">For 700/800 MHz - 1/2-2W All-in-One options</legend><br>
                          <div class="fondogris"><br>
                                <div>
                                  <input type="radio" id="inc14700" name="inexc700" value="1" <?php if($vinexc700==1){ ?>checked<?php }?> disabled/>
                                  <label style='font-family: Arial; font-size: 14px; font-weight: normal;'for="inc14700">Exclude ESMR band (DL: 862-869MHz, UL: 817-824MHz), only include Band 14 (HONBDA-7S27B-IB-10)</label>
                                </div>

                                <div>
                                  <input type="radio" id="exc14700" name="inexc700" value="2" <?php if($vinexc700==2){ ?>checked<?php } ?> disabled/>
                                  <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="exc14700">Exclude Band 14 (DL: 758-768MHz, UL 788-798MHz) and ESMR Band (DL:862-869MHz, UL: 817-824MHz) - (HONBDA-7S27B-IB-06)</label>
                                </div>

                                <div>
                                  <input type="radio" id="inc14ESMR700" name="inexc700" value="3" <?php if($vinexc700==3){ ?>checked<?php } ?> disabled/>
                                  <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="inc14ESMR700">Include Band 14 and ESMR band (HONBDA-7S27B-IB-18)</label>
                                </div>
                                <br>
                          </div>
                                <div class="d-none">
                                  <input type="radio" id="inexcaux" name="inexc700" value="0" <?php if($vinexc700==0){ ?>checked<?php } ?>/>
                                </div>
                              </fieldset>
                            </div>

                    <?php }


                          if($banda800==1){  
                          ?>

                            <div id="divinexc800" class="form-group col-md-12">
                            
                                <hr class="borderojo">                              
                                <fieldset>
                                <legend class="colorazultitulo">For 700/800 MHz - 1/2-2W All-in-One options</legend><br>
                            <div class="fondogris"><br>

                                <div>
                                  <input type="radio" id="inc14800" name="inexc800" value="1" <?php if($vinexc800==1){ ?>checked<?php } ?> disabled/>
                                  <label style='font-family: Arial; font-size: 14px; font-weight: normal;'for="inc14800">Exclude ESMR band (DL: 862-869MHz, UL: 817-824MHz), only include Band 14 (HONBDA-7S27B-IB-10)</label>
                                </div>

                                <div>
                                  <input type="radio" id="exc14800" name="inexc800" value="2" <?php if($vinexc800==2){ ?>checked<?php } ?> disabled/>
                                  <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="exc14800">Exclude Band 14 (DL: 758-768MHz, UL 788-798MHz) and ESMR Band (DL:862-869MHz, UL: 817-824MHz) - (HONBDA-7S27B-IB-06)</label>
                                </div>
                              
                                <div>
                                  <input type="radio" id="inc14ESMR800" name="inexc800" value="3" <?php if($vinexc800==3){ ?>checked<?php } ?> disabled/>
                                  <label style='font-family: Arial; font-size: 14px; font-weight: normal;' for="inc14ESMR800">Include Band 14 and ESMR band (HONBDA-7S27B-IB-18)</label>
                                </div>
                                <br>

                            </div>

                              <div class="d-none">
                                <input type="radio" id="inexcaux" name="inexc700" value="0" <?php if($vinexc800==0){ ?>checked<?php } ?>/>
                              </div>
                            </fieldset>
                            </div>
                            <?php } 
                          }?>

                  


                          <br>
                         <div class="form-group col-md-12 " id="coveragerequirements">
                          <p class="colorazultitulo">Coverage Requirements </p>
                          <hr class="borderojo">
                          </div>	
                          <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Donor RSSI:</label>
                          <input type="text " name="txtdonorrssi" id="txtdonorrssi" disabled value="<?php echo $vtxtdonorrssi; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require full antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Min DL Coverage:</label>
                          <input type="text" name="txtmindlcoverage" id="txtmindlcoverage" disabled value="<?php echo $vtxtmindlcoverage; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 50% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Min UL Coverage:</label>
                          <input type="text" name="txtminulcoverage" id="txtminulcoverage" disabled value="<?php echo $vtxtminulcoverage; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Design Margin
:</label>
                          <input type="number" name="txtdesignmargin" id="txtdesignmargin" disabled value="<?php echo $vtxtdesignmargin; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"> <span style="color:red"><b>*</b> </span> Indoor Antenna Radius:</label>
                          <input type="number" min="1"  name="txtindoorantrad" id="txtindoorantrad" disabled value="<?php echo $vtxtindoorantrad; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span>  Mobile TX Power
:</label>
                          <input type="number" name="txtmobtxpower" id="txtmobtxpower" disabled value="<?php echo $vtxtmobtxpower; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12" id="distancetodonor">
                          <label for="exampleInputEmail1"> Distance to Donor Site (miles):</label>
                          <input type="number" min="0.1"  step="0.1" name="txtdistdonorsite" id="txtdistdonorsite" disabled value="<?php echo $vtxtdistdonorsite; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Donor Antenna Gain
:</label>
                          <input type="number" name="txtdonorantgain" id="txtdonorantgain" disabled value="<?php echo $vtxtdonorantgain; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 10% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Indoor Antenna Gain:</label>
                          <input type="number" min="1"  name="txtindoorantgain" id="txtindoorantgain" disabled value="<?php echo $txtindoorantgain; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Donor Coax Cable Loss (100'):</label>
                          <input type="text" name="txtdonorcoaxloss" id="txtdonorcoaxloss" disabled value="<?php echo $vtxtdonorcoaxloss; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 50% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-12 d-none ocultocovreq">
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Indoor Coax Cable Loss (100'):</label>
                          <input type="text" name="txtindoorcoaxloss" id="txtindoorcoaxloss" disabled onblur="saveborrado();" value="<?php echo $vtxtindoorcoaxloss; ?>" class="form-control" placeholder="" required oninvalid="setCustomValidity('How many floors require 50% antenna coverage is required.')" oninput="setCustomValidity('')">
                            </div>

                          

                            
                
                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">BBU Requirements</p>
                          <hr class="borderojo">
                          </div>	
                          <div class="form-group col-md-6">
                          
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Battery Backup Requirement::</label>
                          
                          <select id="txtbbareq" name="txtbbareq" onblur="saveborrado();" disabled  class="form-control form-control-sm">
													                               
                              <option value=""> - Select - </option>
                              <!-- <option value="12"  <?php if($vvbbu_req ==12) { echo "selected"; } ?>>12 hours </option> -->
                              <!-- <option value="24"  <?php if($vvbbu_req ==24) { echo "selected"; } ?>>24 hours </option> -->
                              <option value="24"  <?php echo "selected"; ?>>Up to 24 hours </option>
                              
                          </select>
                                                       
                           </div>  

                          <br>
                         <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Alarm Requirements </p>
                          <hr class="borderojo">
                          </div>	
                          <div class="form-group col-md-6">
                          
                          <label for="exampleInputEmail1"><span style="color:red"><b>*</b> </span> Select the type of fire alarm that will be installed:</label>
                       
                          <select class="form-control" name="txtbrandfirealarm" disabled id="txtbrandfirealarm" required="" oninvalid="setCustomValidity('is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="gamewell-fci" <?php if($valarm_brand =="gamewell-fci") { echo "selected"; } ?>>Gamewell-FCI </option>
											  <!-- <option value="farenhyt" <?php if($valarm_brand =="farenhyt") { echo "selected"; } ?>>Farenhyt</option> -->
                        <option value="notifier" <?php if($valarm_brand =="notifier") { echo "selected"; } ?>>Notifier</option>
                        <option value="others" <?php if($valarm_brand =="others") { echo "selected"; } ?>>Others</option>
                        
										</select>	

                           </div>  

                           <div class="form-group col-md-6" id="theBDAequipmentbeinstalledinthem">
                         <span style="color:red"><b>*</b> </span>  <b>Will the BDA equipment be installed in the main Fire Control Room containing the FACP Interface(Y/N)?   :</b> <br>
                          <select class="form-control" name="txtbdaroomfirec" disabled id="txtbdaroomfirec" required="" oninvalid="setCustomValidity('is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES" <?php if($valarm_install_facp =="YES") { echo "selected"; } ?>>YES </option>
											  <option value="NO" <?php if($valarm_install_facp =="NO") { echo "selected"; } ?>>NO</option>
											
										</select>	
                    </div>  

                           <div class="form-group col-md-6">
                         <span style="color:red"><b>*</b> </span>  <b>Will you require a remote annunciator  :</b> <br>
                          <select class="form-control" name="txtreqremotannunci" disabled id="txtreqremotannunci" required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES - With dry contacts to feed the FACP" <?php if($valarm_req_annuciator =="YES - With dry contacts to feed the FACP") { echo "selected"; } ?>>YES - With dry contacts to feed the FACP </option>
                          <option value="YES - Without dry contacts. BBU to feed FACP" <?php if($valarm_req_annuciator =="YES - Without dry contacts. BBU to feed FACP") { echo "selected"; } ?>>YES – Without dry contacts. BBU to feed FACP </option>
											  <option value="NO" <?php if($valarm_req_annuciator =="NO") { echo "selected"; } ?>>NO</option>
											
										</select>	
                    </div>  
                          <br>
                         <div class="form-group col-md-12 " id="designrequirements">
                          <p class="colorazultitulo">Design Requirements </p>
                          <hr class="borderojo">
                          </div>	

                    
                           
                         
                          <div class="form-group col-md-6" id="Willyourequireasystemdesign">
                          <b>Will you require a system design :</b> <br>
                          <select class="form-control" name="txtreqsystdesing" disabled id="txtreqsystdesing" required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES" <?php if($vdr_requierd =="YES") { echo "selected"; } ?>>YES </option>
											  <option value="NO" <?php if($vdr_requierd =="NO") { echo "selected"; } ?>>NO</option>
											
										</select>	
                           </div>  
                           <div class="form-group col-md-6" id="DoyouneedacompleteAHJSubmittalPackage">
                          <b>Do you need a complete AHJ Submittal Package:</b> <br>
                          <select class="form-control modedesinginfo" name="txtahjpack" disabled id="txtahjpack" required="" oninvalid="setCustomValidity('  is required.')" oninput="setCustomValidity('')">
											   <option value=""> - Select - </option>
                         <option value="YES" <?php if($vdr_ahjpackage =="YES") { echo "selected"; } ?>>YES </option>
											  <option value="NO" <?php if($vdr_ahjpackage =="NO") { echo "selected"; } ?>>NO</option>
											
										</select>	
                           </div>  
                        
                     <div class="form-group col-md-6" id="materialsexterior">
                          <label for="exampleInputEmail1"> Construction Materials – Exterior Walls:</label>                          
                          <textarea name="txtnaterauakextwalls" id="txtnaterauakextwalls" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Exterior Wallst is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_mat_extwall, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        
                        </div>
                            <div class="form-group col-md-6" id="materialsinterior">
                          <label for="exampleInputEmail1"> Construction Materials – Interior Walls:</label>
                          <textarea name="txtnaterauakintwalls" id="txtnaterauakintwalls" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Interior Wallst is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_mat_intwall, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        
                        </div>
                            <div class="form-group col-md-6" id="mglasstype"> 
                          <label for="exampleInputEmail1"> Construction Materials – Glass Type:</label>
                          <textarea name="txtmaterialglasst" id="txtmaterialglasst" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Glass type  is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_mat_glasstype, ENT_QUOTES, 'UTF-8'); ?></textarea>
                            
                        </div>
                            <div class="form-group col-md-6" id="mrooftype">
                          <label for="exampleInputEmail1"> Construction Materials – Roof Type:</label>                      
                          <textarea name="txtmaterialroof" id="txtmaterialroof" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Construction Materials – Roof Type is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_mat_rooftype, ENT_QUOTES, 'UTF-8'); ?></textarea>

                        </div>
                            <div class="form-group col-md-6" id="firecontrolroomlocation">
                          <label for="exampleInputEmail1">Fire Control Room Location:</label>
                          <textarea name="txtfirecontrolroom" id="txtfirecontrolroom" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Fire Control Room Location is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_firecontrolroomloc, ENT_QUOTES, 'UTF-8'); ?></textarea>
                        
                        </div>
                            <div class="form-group col-md-6" id="bdaequipmentlocation">
                          <label for="exampleInputEmail1"> BDA Equipment Location:</label>
                          <textarea name="txtbdaequilocation" id="txtbdaequilocation" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' BDA Equipment Location is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_bdaeqlocation, ENT_QUOTES, 'UTF-8'); ?></textarea>
                  
                        </div>
                            <div class="form-group col-md-6" id="verticalriserlocation">
                          <label for="exampleInputEmail1">Vertical Riser Location:</label>
                          <textarea name="txtverticalrise" id="txtverticalrise" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Vertical Riser Location is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_verticalriserloc, ENT_QUOTES, 'UTF-8'); ?></textarea>
                            
                        </div>

                            <div class="form-group col-md-6" id="donorantenalocation">
                          <label for="exampleInputEmail1">Donor Antenna Location:</label>
                          <textarea name="txtdonorant" id="txtdonorant" disabled="true" class="form-control modedesinginfo" style="width: 100%; height: 4.5em; resize: none; overflow-y: auto;" oninvalid="setCustomValidity(' Donor Antenna Location is required.')" oninput="setCustomValidity('')" ><?php echo htmlspecialchars($vdr_donorantloc, ENT_QUOTES, 'UTF-8'); ?></textarea>
                            
                        </div>

                            <div class="form-group col-md-12">
                          <label for="exampleInputEmail1">Special Instructions:</label>
                          <div class="col-sm-12">
					          				<textarea class="form-controlm modedesinginfo" rows="3" id="txtspecialinst" name="txtspecialinst" placeholder="Special Instructions ..."><?php echo htmlspecialchars($vdr_special, ENT_QUOTES, 'UTF-8'); ?></textarea>
                          </div>
                          </div>
                         <br>
                         <br>

                          <!-- /.card-body -->
                          <div class="card-footer text-right d-none modoedit">

                          <button type="button" onclick="save_modif_registro()" class="btn btn-primary right-align">Modify Project</button>
                          
                          
                          </div>
                          <p class="text-danger" id="lbldatoserrr">


                          </p>
                          
                          </div>
                          <hr>
                          </div>
    

                    <!-- fin form -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <div class="card-body">
                              <h4>Recent Activity</h4>
                              <hr style=" border-top: 1px solid  #095488;">

                  <?php

                  $rstmm = $connect->prepare("SELECT flexbdahoneywell.idproject, flexbdahoneywell.projectname, flexbdahoneywell.idrev, flexbdahoneywell.datecreate,
                  flexbdahoneywell.dr_special, customers_userewbfas.nameuserfull, customers.namecustomers, nameactions , flexbdahoneywell_actions.datemodif FROM flexbdahoneywell 
                  INNER JOIN customers_userewbfas
                  ON customers_userewbfas.idusercus = flexbdahoneywell.idusercustomers
                  INNER JOIN customers
                  ON customers.idcustomers = flexbdahoneywell.idcustomers
                  inner join flexbdahoneywell_actions
				   ON flexbdahoneywell_actions.idproject = flexbdahoneywell.idproject and
				      flexbdahoneywell_actions.idrev = flexbdahoneywell.idrev

                  WHERE flexbdahoneywell.idproject= :idproject order by flexbdahoneywell_actions.datemodif desc   ");
                                      
                  $rstmm->bindParam(':idproject', $vidp);			
                  $rstmm->execute();
                  $resultado = $rstmm->fetchAll();		
                  
                  foreach ($resultado as $rowheaders) 
                              {
                                ?>
                                    <div class="post">
                                        <div class="user-block">
                                        <img class=" img-bordered-sm" src="img/avatarbasic1.png" alt="user image">
                                          <span class="username">
                                          <a class="username2" href="listprojectsdetails.php?idtoke=<?php echo $rowheaders['idproject']."&idr=".$rowheaders['idrev']; ?>">  <?php echo $rowheaders['nameuserfull']." - ".$rowheaders['namecustomers']; ?> </a>
                                          </span>
                                          <span class="description"><i class='fas fa-calendar-alt'></i> <?php echo substr ($rowheaders['datemodif'],0,16); ?></span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                        <b><?php echo $rowheaders['projectname']; ?> -Rev.[<?php echo $rowheaders['idrev']; ?>]</b><br>
                                        <?php echo $rowheaders['nameactions']."<br>".$rowheaders['dr_special']; ?><br>
                                        </p>
                                      
                                    
                                      </div>
                                <?php
                              }
                  ?>

                  
                  <!--  <div class="post">
                      <div class="user-block">
                        <img class=" img-bordered-sm" src="img/avatarbasic1.png" alt="user image">
                        <span class="username">
                          <a href="#">Project Manager: Jonathan </a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                 
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>
                    -->

                 

        
           

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
  </form>
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

<script src="js/adminlte.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/moment/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap-select.min.js"></script>

<script type="text/javascript">

var tabla_channel_quantity = [];
var tabla_gain_dlul= [];
var s_flexesdchandeal = String('<?php echo $_SESSION['flexesdchandeal']; ?>');
tabla_channel_quantity.length=0;
 tabla_gain_dlul.length=0;


	$( document ).ready(function() {
    var vidtoke = (new URL(location.href)).searchParams.get('idtoke');
    var vidr =   (new URL(location.href)).searchParams.get('idr');
    var s_flexesdchandeal = String('<?php echo $_SESSION['flexesdchandeal']; ?>');
    
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

    var divbdadloutputpoweruhf = $('#divbdadloutputpoweruhf').val();
    var divbdadloutputpowervhf = $('#divbdadloutputpowervhf').val();
    
    if(divbdadloutputpoweruhf!='')
    { 
      $('#divbdadloutputpoweruhf').removeClass('d-none');
    }
    if(divbdadloutputpowervhf!='')
    { 
      $('#divbdadloutputpowervhf').removeClass('d-none');
    }


    console.log('convert' + dateStr)
      $('#datetimepicker1').val(dateStr);

      $('#datetimepicker2').val(dateStr2);
    }

    
    console.log('a');
            $.ajax
            ({ 
              url: 'ajax_listbandbyproj.php',
              data: "idp="+vidtoke+'&idr='+vidr,	
              type: 'post',				
              datatype:'JSON',                
              success: function(data)
              {
              //	alert(data.resultiu);
                  console.log(data.arr_idband)
                  for(var i=0; i< data.arr_idband.length ;i++)
                  {
                      console.log(data.arr_idband[i].fstartul );
                      if(data.arr_idband[i].typeref == 'FREQBAND')
                      {
                                   tabla_gain_dlul.push({	
                                          Band: data.arr_idband[i].nombreband,		
                                          gainulstart: parseFloat(data.arr_idband[i].fstartul),
                                          gainulstop: parseFloat(data.arr_idband[i].fstopul),
                                          gainudstart: parseFloat(data.arr_idband[i].fstartdl),
                                          gainudstop: parseFloat(data.arr_idband[i].fstopdl)
                                      });


                                      if( data.arr_idband[i].nombreband == "700")
                                        {
                                     //     $('#txtreqfreqband option[value="UHF"]').remove();
                                     //     $('#txtreqfreqband option[value="VHF"]').remove();
                                        }
                                        if( data.arr_idband[i].nombreband == "800")
                                        {
                                    //      $('#txtreqfreqband option[value="UHF"]').remove();
                                    //      $('#txtreqfreqband option[value="VHF"]').remove();
                                        }
                                        if( data.arr_idband[i].nombreband == "UHF")
                                        {
                                    //      $('#txtreqfreqband option[value="700"]').remove();
                                   //       $('#txtreqfreqband option[value="800"]').remove();
                                        }
                                        if(data.arr_idband[i].nombreband == "VHF")
                                        {
                                   //       $('#txtreqfreqband option[value="700"]').remove();
                                   //       $('#txtreqfreqband option[value="800"]').remove();
                                        }


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
    
  


    function habilitomasinfo(qhacemos)
{
  console.log('qhacemos:'+qhacemos)
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
  document.getElementById('txtbbareq').disabled = true;
  if(s_flexesdchandeal!='FIPLEX_SI'){
    filter_esdchanneldealer();
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
		

    /* var banda= $("#txtreqfreqband").val();
    var quickquote = $("#txtdesigntra").val();
    
    if(s_flexesdchandeal=='FIPLEX_SI' && quickquote=='quickquote')
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
    } */



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
						   
						 				   
               if( $("#txtreqfreqband").val() == "700")
               {
              //  $('#txtreqfreqband option[value="UHF"]').remove();
             //   $('#txtreqfreqband option[value="VHF"]').remove();
               }
               if( $("#txtreqfreqband").val() == "800")
               {
           //     $('#txtreqfreqband option[value="UHF"]').remove();
            //    $('#txtreqfreqband option[value="VHF"]').remove();
               }
               if( $("#txtreqfreqband").val() == "UHF")
               {
            //    $('#txtreqfreqband option[value="700"]').remove();
           //     $('#txtreqfreqband option[value="800"]').remove();
               }
               if( $("#txtreqfreqband").val() == "VHF")
               {
           //     $('#txtreqfreqband option[value="700"]').remove();
           //     $('#txtreqfreqband option[value="800"]').remove();
               }
						   
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
				 html += '<th>Action</th>';
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
				  html += '<td>  <a href="#" class="d-none modoedit" onclick="borrar_array_uldl('+i+')"> <i class="fas fa-trash-alt"></i> Del</a> </td>';	  
				  html += '</tr>';
				 }
				 html += '</table>';
				 v_templistchannel = v_templistchannel + "#";  
				 console.log(v_templistchannel);
				 	$('#listagainuldl').html(html);
					$('#templistagainuldl').val(v_templistchannel);
				
		
	}


  function tabla_gain_udul2dagen()
	{
		var jname ="";
		var v_templistchannel_udul="";
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
				 html += '<th>Action</th>';
				 html += '</tr>';
				 for( var i = 0; i < tabla_gain_dlul.length; i++) {
				  html += '<tr>';
				  
				  if (v_templistchannel_udul != '')
				  {
            v_templistchannel_udul = v_templistchannel_udul + "#";  
				  }
				  
				  for( var j in tabla_gain_dlul[i] ) {

               ///Borrar los tipo banda
             //  txtreqfreqband
           ///  console.log('HOLA:::'+  tabla_gain_dlul[i][j] );
           if( tabla_gain_dlul[i][j] == "700")
               {
          //      $('#txtreqfreqband option[value="UHF"]').remove();
          //      $('#txtreqfreqband option[value="VHF"]').remove();

              

               }
               if(tabla_gain_dlul[i][j] == "800")
               {
           //     $('#txtreqfreqband option[value="UHF"]').remove();
           //     $('#txtreqfreqband option[value="VHF"]').remove();


               }
               if( tabla_gain_dlul[i][j] == "UHF")
               {
           //     $('#txtreqfreqband option[value="700"]').remove();
            //    $('#txtreqfreqband option[value="800"]').remove();

              

               }
               if(tabla_gain_dlul[i][j]  == "VHF")
               {
         //       $('#txtreqfreqband option[value="700"]').remove();
         //       $('#txtreqfreqband option[value="800"]').remove();

            

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
  function VerificarEsdChandeal()
  {
    if ( s_flexesdchandeal !='FIPLEX_SI')
    {
      $("#txtdesigntra").val("nestimate");
      document.getElementById('txtdesigntra').disabled = true;
    }
  }

  function verificarFormQuickQuote()
{

// acall

  VerificarEsdChandeal();
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
    $("#theBDAequipmentbeinstalledinthem").addClass("d-none");
    $("#Willyourequireasystemdesign").addClass("d-none");
    $("#DoyouneedacompleteAHJSubmittalPackage").addClass("d-none");

    document.getElementById('txtinstalltypedesing').disabled = true;

        $("#txtinstalltypedesing").val('NEW')
    
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
    $("#txtdesigntra").val("nestimate");
    document.getElementById('txtdesigntra').disabled = true;
    $("#theBDAequipmentbeinstalledinthem").removeClass("d-none");
    $("#Willyourequireasystemdesign").removeClass("d-none");
    $("#DoyouneedacompleteAHJSubmittalPackage").removeClass("d-none");
    }
  
}




  function save_modif_registro()
  {




///// vamos a validar lso datos
var regexAlfaNumSimbA = /^[a-zA-Z0-9&#()_\-\[\],\. ]*$/;

         /*Project Name*/
    if ($("#txtnomproj").val().match(regexAlfaNumSimbA)) {
        var v_txtnomproj = $('#txtnomproj').val();
        var hagosubtmit='S';
    } else {
        hagosubtmit = 'N';
        toastr["error"]("Project name is invalid - required", "");
    }
    

var v_txtaddressbuild = $('#txtaddressbuild').val();
if (v_txtaddressbuild =='') { hagosubtmit = 'N';  toastr["error"](" Building Address is required", "");}

var v_txtcoordinateslat = $('#txtcoordinateslat').val();


// if (v_txtcoordinateslat =='') { hagosubtmit = 'N';  toastr["error"](" Building Coordinates Lat is required", "");}

var v_txtcoordinateslon = $('#txtcoordinateslon').val();
// if (v_txtcoordinateslon =='') { hagosubtmit = 'N';  toastr["error"](" Building Coordinates Lon is required", "");}
//LLC
// if (v_txtfloortype1countselect =='') { hagosubtmit = 'N';  toastr["error"](" Number of floor types is required", "");}
// var v_txtfloortype1count = $('#txtfloortype1count').val();
// if (v_txtfloortype1count =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 1 Count is required ", "");}
// var v_txtfloortype1countavg = $('#txtfloortype1countavg').val();
// if (v_txtfloortype1countavg =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 1 average area (sqft) is required ", "");}

// var v_txttotalnumberofloors = document.querySelector('#txttotalnumberofloors').value

var v_txttotalnumberofloors = $('#txttotalnumberofloors').val();

if (v_txttotalnumberofloors =='') { hagosubtmit = 'N';  toastr["error"]("Total number of floors of a building is required ", "");}

var floorscoveragenumber = $('#txtfloorscoverage').val();
v_txtfloorscoverage = parseFloat(floorscoveragenumber);

var validado = validarEntero(v_txtfloorscoverage);
if (parseInt(v_txtfloorscoverage) > parseInt(v_txttotalnumberofloors) || validado==0) { hagosubtmit = 'N';  toastr["error"]("Number of floors that need coverage (based on survey) is required and must be a valid value", "");}

var v_txttotalsquarefoot = $('#txttotalsquarefoot').val();
if (v_txttotalsquarefoot =='') { hagosubtmit = 'N';  toastr["error"]("Total square foot of a building is required ", "");}

var v_txtdesigntra = $('#txtdesigntra').val();
if (v_txtdesigntra =='') { hagosubtmit = 'N';  toastr["error"]("Design Transition is required ", "");}

// var v_txtfloortype1countselect = $('#txtfloortype1countselect').val(); 
// if (v_txtfloortype1countselect==2)
// {
//   var v_txtfloortype2count = $('#txtfloortype2count').val();
//   if (v_txtfloortype2count =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 2 Count is required ", "");}
//   var v_txtfloortype2countavg = $('#txtfloortype2countavg').val();
//   if (v_txtfloortype2countavg =='') { hagosubtmit = 'N';  toastr["error"]("Floor Type 2 average area (sqft) is required ", "");}
// }

var v_avgfloorheight = $('#avgfloorheight').val();
if (v_avgfloorheight =='') { hagosubtmit = 'N';  toastr["error"]("Average floor height is required ", "");}

var v_txtrfenvironment = $('#txtrfenvironment').val();
if (v_txtrfenvironment =='') { hagosubtmit = 'N';  toastr["error"]("Building Type is required ", "");}


  ///hasta aca validamos Project Information   
  /// validamos Project Frequency Information  
  var v_txttypeclass = $('#txttypeclass').val();
  if (v_txttypeclass== 'A')
  {
   // if (  tabla_channel_quantity.length==0)  { hagosubtmit = 'N';  toastr["error"]("Frequency Bands is required    ", "");}
     
  }
  
  if (  tabla_gain_dlul.length==0)  { hagosubtmit = 'N';  toastr["error"]("Frequency Bands is required    ", "");}

  
var v_numbchxband = $('#numbchxband').val();
var validado = validarEntero(v_numbchxband);
if (validado==0) { hagosubtmit = 'N';  toastr["error"]("Number of Channels for each band  is required and must be a valid value", "");}

var v_txtsimpleconfig = $('#txtsimpleconfig').val();


var v_txtbdadloutputpowervhf = $('#txtbdadloutputpowervhf').val();
var v_txtbdadloutputpoweruhf = $('#txtbdadloutputpoweruhf').val();


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

var v_txttypeclass = $('#txttypeclass').val();
if (v_txttypeclass =='') { hagosubtmit = 'N';  toastr["error"]("Filtering Requirement is required ", "");}

var v_txtbdamainpwr = $('#txtbdamainpwr').val();
if (v_txtbdamainpwr =='') { hagosubtmit = 'N';  toastr["error"]("BDA Main Input Power Requirement is required ", "");}

var v_inexc700 = parseInt(getValueInExc700()); 
var v_inexc800 = parseInt(getValueInExc800());
console.log('700:'+ v_inexc700+typeof(v_inexc700));
console.log('800:'+ v_inexc800+typeof(v_inexc800));

var v_txtbbareq = $('#txtbbareq').val();
if (v_txtbbareq =='') { hagosubtmit = 'N';  toastr["error"]("Is a Battery Backup Unit Required for the BDA is required ", "");}


  ///hasta aca validamos BDA Requirements

    /// validamos   Alarm Requirements
    var v_txtbrandfirealarm = $('#txtbrandfirealarm').val();
if (v_txtbrandfirealarm =='') { hagosubtmit = 'N';  toastr["error"](" What is the Brand of the Fire Alarm Control Panel(FACP) Interface is required ", "");}

var v_txtbdaroomfirec = $('#txtbdaroomfirec').val();

if(v_txtdesigntra !="quickquote"){
if (v_txtbdaroomfirec =='') { hagosubtmit = 'N';  toastr["error"]("Will the BDA equipment be installed in the main Fire Control Room containing the FACP Interface is required ", "");}
}


var v_txtreqremotannunci = $('#txtreqremotannunci').val();
if (v_txtreqremotannunci =='') { hagosubtmit = 'N';  toastr["error"]("Will you require a remote annunciator is required ", "");}

    ///hasta aca validamos   Alarm Requirements
    /// validamos   Design Requirements
    var v_txtneededcoverage ='agency';
    /* var v_txtneededcoverage = $('#txtneededcoverage').val();
  if (v_txtneededcoverage =='') { hagosubtmit = 'N';  toastr["error"]("Coverage needed for which public safety agencies is required ", "");}   
    
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

  var v_txtinstalltypedesing = $('#txtinstalltypedesing').val();
  if (v_txtinstalltypedesing =='') { hagosubtmit = 'N';  toastr["error"]("Installation Type is required ", "");}   

  var v_txtnaterauakextwalls = $('#txtnaterauakextwalls').val();
  if (v_txtnaterauakextwalls =='') { hagosubtmit = 'N';  toastr["error"]("Construction Materials – Exterior Walls is required ", "");}   

  var v_txtnaterauakintwalls = $('#txtnaterauakintwalls').val();
  if (v_txtnaterauakintwalls =='') { hagosubtmit = 'N';  toastr["error"]("Construction Materials – Interior Wallsis required ", "");}   

  var v_txtmaterialglasst = $('#txtmaterialglasst').val();
  if (v_txtmaterialglasst =='') { hagosubtmit = 'N';  toastr["error"]("Construction Materials – Glass Type is required ", "");}   

  var v_txtmaterialroof = $('#txtmaterialroof').val();
  if (v_txtmaterialroof =='') { hagosubtmit = 'N';  toastr["error"]("Construction Materials – Roof Type is required ", "");}  

  var v_txtfirecontrolroom = $('#txtfirecontrolroom').val();
  if (v_txtfirecontrolroom =='') { hagosubtmit = 'N';  toastr["error"]("Fire Control Room Location is required ", "");}  

  var v_txtbdaequilocation = $('#txtbdaequilocation').val();
  if (v_txtbdaequilocation =='') { hagosubtmit = 'N';  toastr["error"]("BDA Equipment Location is required ", "");}   

  var v_txtverticalrise = $('#txtverticalrise').val();
  if (v_txtverticalrise =='') { hagosubtmit = 'N';  toastr["error"]("Vertical Riser Location is required ", "");}   

  var v_txtdonorant = $('#txtdonorant').val();
  if (v_txtdonorant =='') { hagosubtmit = 'N';  toastr["error"]("Donor Antenna Location is required ", "");}   


  

}


var v_templistchannel = $('#templistchannel').val();
var v_templistagainuldl = $('#templistagainuldl').val();
//hasta aca validamos   Design Requirements
var v_txtspecialinst = $('#txtspecialinst').val();  

var v_iiddpp = $('#projectdraft').val();
var v_iiddpprr = $('#projectdraftrev').val();
var v_stateproj = 'R';
var v_seeddraft = $("#tkkeymarco1").val();

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

            formData.append("v_txtfloortype1countselect", 1);
            

            formData.append("v_txtfloortype1count", v_txtfloorscoverage);
            formData.append("v_txtfloortype1countavg", v_txttotalsquarefoot / v_txttotalnumberofloors);
            formData.append("v_txtfloortype2count", 0);
            formData.append("v_txtfloortype2countavg", 0);
            
            //LC
            formData.append("v_txttotalnumberofloors", v_txttotalnumberofloors);
            
            formData.append("v_avgfloorheight", v_avgfloorheight);

            formData.append("v_txtrfenvironment", v_txtrfenvironment);

    

            formData.append("tabla_channel_quantity", v_templistchannel);
            formData.append("tabla_gain_dlul", v_templistagainuldl);

     //       tabla_channel_quantity
  //tabla_gain_dlul
              formData.append("v_numbchxband", v_numbchxband);

              formData.append("v_txtbdadloutputpoweruhf", v_txtbdadloutputpoweruhf);
              formData.append("v_txtbdadloutputpowervhf", v_txtbdadloutputpowervhf);

              formData.append("v_inexc700", v_inexc700);
              formData.append("v_inexc800", v_inexc800);


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
            formData.append("v_seeddraft", v_seeddraft);
             
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
                  console.log (datos.resultiu);
               /// resolve(JSON.parse(req.response));
               if (datos.resultiu=='ok')
                      {
                        tabla_channel_quantity.length=0;
                        tabla_gain_dlul.length=0;
                                              Swal.fire(
                        'Successfully modified project',
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
              console.log(data.arr_idband)
                  for(var i=0; i< data.arr_idband.length ;i++)
                {
                    console.log(data.arr_idband[i].fstartul );
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
 var vv_idprevv = $("#projectdraftrev").val();
 var vv_idprev = parseInt(vv_idprevv) +1;

//console.log(vv_idprev);



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
         console.log('CERRADO2');
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
       // var vv_idprev = $("#projectdraftrev").val();
    
	 
		//return fetch('delattachprojflexbda.php?v0='+vv_idp+'&v1='+vv_idprev+'&v2='+idfileatttodel)
    return fetch('delattachprojflexbda.php?v0='+vv_idp+'&v2='+idfileatttodel)
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

function filterrq(elva)
{

  if (elva=='A')
  {
   // $("#losch").removeClass("d-none");
 // $("#losch1").removeClass("d-none");
 $("#losch2").removeClass("d-none");
  $("#losch").addClass("d-none");
$("#losch1").addClass("d-none");
  }
  else
  {
$("#losch").addClass("d-none");
$("#losch1").addClass("d-none");
$("#numbchxband").val(32);
$("#losch2").addClass("d-none");
  }

}


function filter_esdchanneldealer()
{
  //$("#alarmre1").addClass("d-none");
 

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

  </script>
</body>
</html>
