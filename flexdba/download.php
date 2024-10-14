<?php 
include('cabeceras.php');
add_header_seguridad();
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}
if ($_SERVER["QUERY_STRING"] <> '')
{
  echo "Error 2...";
  exit();
}
// Desactivar toda notificación de error
error_reporting(0);
// Notificar todos los errores de PHP (ver el registro de cambios)
//error_reporting(E_ALL);
include("db_conectflexbda.php"); 
 
 	session_start();
	

//	echo "<br>".isset($_SESSION["timeout"]);
//	exit();
	
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
  <title>FLEXDBA</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">


  
</head>
<style>

body {
  background-image: url("fondositeflexbda2020.jpg");
  /*background-repeat: no-repeat, repeat;*/
  font-family: Arial;
  font-size: 13px;
}
	
  login-page, .register-page {
    -ms-flex-align: center;
    align-items: center;
    background: #f3f3f3;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    height: 100vh;
    -ms-flex-pack: center;
    justify-content: center;
}

.titulogrande
{
   
font-size: 40px;
    
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

.btn-primary:hover {
    color: #fff;
    background-color: #095488;
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

.colorazulhoneywell{
    color: #095488;
  
}

[class*=sidebar-dark-] {
    background-color: #303030;
}
.content-wrapper {
    background: #F3F3F3;
}



a.linkblanco:link {
  color:  #ffffff;
}

/* visited link */
a.linkblanco:visited {
  color:  #ffffff;
}

/* mouse over link */
a.linkblanco:hover {
  color:  #ffffff;
}

/* selected link */
a.linkblanco:active {
  color: #ffffff;
}

  </style>

<body class="hold-transition sidebar-mini layout-fixed">
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
            <h1 class="m-0 text-dark">Resources</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Resources </li>
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
<?php
function listFolderFiles($dir, $rutaapdf){
  $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    if (count($ffs) < 1) return;

    echo '<ul>';
    foreach($ffs as $ff){
        echo '<li>';
        if (is_dir($dir.'/'.$ff)) {
            echo "<i class='far fa-folder-open' style='font-size:18px'></i> <span class='text'> $ff </span>";
            listFolderFiles($dir.'/'.$ff, $rutaapdf . $ff . "/");
        } else {
            echo "<i class='fas fa-file-pdf' style='font-size:18px;color:red'></i> <span class='text'> $ff </span>  &nbsp;&nbsp;";
            echo "<a href='" . $rutaapdf . $ff . "' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>";
        }
        echo '</li>';
    }
    echo '</ul>';
}

function listFolderFilesbks($dir){
  $ffs = scandir($dir);

  unset($ffs[array_search('.', $ffs, true)]);
  unset($ffs[array_search('..', $ffs, true)]);

  // prevent empty ordered elements
  if (count($ffs) < 1)
      return;

  echo '<ol style="font-size:14px;list-style-type: none;">';
  foreach($ffs as $ff){
      echo '<li><a href="https://flexbda.com/download/'.$ff.'" target="_blank"> <i class="fas fa-file-alt" style="font-size:18px"></i> '.$ff;
      if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
      echo '</a></li>';
  }
  echo '</ol>';
}

//listFolderFiles('/var/www/flexbda/download');
//echo "<h4>&nbsp;&nbsp;<b>Coming Soon...</b></h4>";

?>
<div class="container-fluid">
<div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Datasheets</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="true">Listing_Certificates</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-manuals-tab" data-toggle="pill" href="#custom-tabs-three-manuals" role="tab" aria-controls="custom-tabs-three-manuals" aria-selected="false">Manuals</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-application-tab" data-toggle="pill" href="#custom-tabs-three-application" role="tab" aria-controls="custom-tabs-three-application" aria-selected="false">Application Notes</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-software-tab" data-toggle="pill" href="#custom-tabs-three-software" role="tab" aria-controls="custom-tabs-three-software" aria-selected="true">Software</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-BIMfiles-tab" data-toggle="pill" href="#custom-tabs-three-BIMfiles" role="tab" aria-controls="custom-tabs-three-BIMfiles" aria-selected="true">BIM files</a>
                  </li>
				  
				  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-VEXfiles-tab" data-toggle="pill" href="#custom-tabs-three-VEXfiles" role="tab" aria-controls="custom-tabs-three-iBwaveTemplates" aria-selected="true">iBwave Templates</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-AESpecs-tab" data-toggle="pill" href="#custom-tabs-three-AESpecs" role="tab" aria-controls="custom-tabs-three-AESpecs" aria-selected="true">A&E Specs</a>
                  </li>

				 
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-Video-tab" data-toggle="pill" href="#custom-tabs-three-Videos" role="tab" aria-controls="custom-tabs-three-Videos" aria-selected="true">Videos</a>
                  </li>
				  
				   <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-BDA_Installation-tab" data-toggle="pill" href="#custom-tabs-three-BDA_Installation" role="tab" aria-controls="custom-tabs-three-BDA_Installation" aria-selected="true">BDA Installation</a>
                  </li>

				  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-BBU_Calculations-tab" data-toggle="pill" href="#custom-tabs-three-BBU_Calculations" role="tab" aria-controls="custom-tabs-three-BBU_Calculations-tab" aria-selected="true">BBU Calculations</a>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-Discontinued-tab" data-toggle="pill" href="#custom-tabs-three-Discontinued" role="tab" aria-controls="custom-tabs-three-Discontinued" aria-selected="true">Discontinued Part</a>
                  </li>

<!--               
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-gates" role="tab" aria-controls="custom-tabs-three-gates" aria-selected="false">Gates</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-videos" role="tab" aria-controls="custom-tabs-three-videos" aria-selected="false">Videos</a>
                  </li> -->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/datasheets'); ?>
                         <!-- 1 cuadro datasheets-->
                         <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>Datasheets</b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/datasheets/Fiplex";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){

                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/datasheets/Fiplex/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/datasheets/Fiplex/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 1 fin cuadro datasheets -->
                          
                           <!-- 5 cuadro datasheets-->
                           <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Passive_DAS_Common </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/datasheets/Passive_DAS_Common";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){https://www.flexbda.com/listprojects.php

                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/datasheets/Passive_DAS_Common/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/datasheets/Passive_DAS_Common/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 5 fin cuadro datasheets -->

                  </div>











<!-- INICIO Application Notes -->

                  <div class="tab-pane fade " id="custom-tabs-three-application" role="tabpanel" aria-labelledby="custom-tabs-three-application-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Honeywell -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Application Notes </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/application-notes/honeywell";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-zipper" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/application-notes/honeywell/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/application-notes/honeywell/".$ff."/");
                                   ?>                        
                              </li>
                             
								
								<?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN cuadro Honeywell -->
                        
                        
                  </div>  


<!-- HASTA ACA APPLICATION NOTES -->















                  <!-- INICIO Software -->

                  <div class="tab-pane fade " id="custom-tabs-three-software" role="tabpanel" aria-labelledby="custom-tabs-three-software-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Honeywell -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Software </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/software/honeywell";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-zipper" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/software/honeywell/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/software/honeywell/".$ff."/");
                                   ?>                        
                              </li>
							  
							  <li> <a href="https://www.fiplex.com/poms/FiplexControlSoftware.zip" target="_blank">Fiplex Control Software</a> </li>
                              
                              <li> <a href="https://www.fiplex.com/poms/FiplexPomsInstaller.zip" target="_blank">pFoms Software</a> </li>
                                
								
								<?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN cuadro Honeywell -->
                        
                        
                  </div>

<!--  fin Software -->








<!-- INICIO A&E-Specs -->

<div class="tab-pane fade " id="custom-tabs-three-AESpecs" role="tabpanel" aria-labelledby="custom-tabs-three-AESpecs-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Blanco -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b> Documents  </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/AESpecs/Documents";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-zipper" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/AESpecs/Documents/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/AESpecs/Documents/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN cuadro Blanco -->
                        
						
                  </div>

<!--  fin A&E Specs -->
				  
				  



<!-- DESDE ACA VIDEOS -->




<!-- INICIO Videos -->

<div class="tab-pane fade " id="custom-tabs-three-Videos" role="tabpanel" aria-labelledby="custom-tabs-three-Videos-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Links -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Links </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Video/Link";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                             <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Video/Link/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/Video/Link/".$ff."/");
                                   ?>                        
                              </li>
                              <li> <a href="https://event.on24.com/wcc/r/3855904/DA229C5270212E2147D8234D25F5A50C" target="_blank">The Honeywell BDA Design & Commissioning Process & Best Practices</a> </li>
                              
                              <li> <a href="https://event.on24.com/wcc/r/3855893/455DB9485CAA431F7C94D43D706B8CB1" target="_blank">How to Effectively Estimate BDA Projects with flexbda.com & Price Your BDA Bids to Win</a> </li>
                              
                              <li> <a href="https://www.youtube.com/watch?v=yZaj3eyuclk&ab_channel=TrilogyRF" target="_blank">Trilogy AirCell® Plenum Connectorization Video (Automatic Prep Tool) - YouTube</a> </li>
                                                               
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN cuadro Lnks -->
                        
<!-- 4 INICIO cuadro General Videos -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  General Videos </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                           <?php
                            
                          $dir="/var/www/flexbda/download/Video/GeneralVideo";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                  
                                ?>
                              
                              <li> 
								<a href="https://share.vidyard.com/watch/XrB4nmFafgjDAcCXBindz1" target="_blank">License Upgrade Procedure – FLEX Series BDA 700-800</a> 
							  </li>
                              
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 4 FIN cuadro General Videos -->						
						
						
<!-- 5 INICIO cuadro Fiplex Videos -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Fiplex Videos </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Video/FiplexVideo";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff)
							{
                                   
                                ?>
                              
								
                             <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Video/Link/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php }
								
								
								
								
								
								
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 5 FIN cuadro Fiplex Videos -->
						
						
                  </div>
                  




<!-- HASTA ACA VIDEOS -->




 <!-- INICIO iBwaveTemplates -->

                  <div class="tab-pane fade " id="custom-tabs-three-VEXfiles" role="tabpanel" aria-labelledby="custom-tabs-three-iBwaveTemplates-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro iBwave Templates -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  iBwave Templates </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/iBwaveTemplates/iBwaveTemplates";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-pen" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/iBwaveTemplates/iBwaveTemplates/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/iBwaveTemplates/iBwaveTemplates/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN iBwave Templates -->
						
			        </div>

<!--  fin iBwave Templates -->
                        






<!-- INICIO BDA_Installation -->

                  <div class="tab-pane fade " id="custom-tabs-three-BDA_Installation" role="tabpanel" aria-labelledby="custom-tabs-three-BDA_Installation-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/BDA_Installation'); ?>

                     <!-- 1 cuadro Typical BDA Installation Details -->
					 
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Typical BDA Installation Details </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BDA_Installation/BDA";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-pen" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BDA_Installation/BDA/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BDA_Installation/BDA/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN Typical BDA Installation Details -->
						
	

                     <!-- 1 cuadro Typical Wiring DIagrams -->
					 
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Wiring Diagrams </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BDA_Installation/Wiring_Diagrams";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BDA_Installation/Wiring_Diagrams/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BDA_Installation/Wiring_Diagrams/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN Typical Wiring Diagrams -->	
						
						
			        </div>

<!--  fin BDA_Installation -->









                  <!-- INICIO BIMFILES -->

                  <div class="tab-pane fade " id="custom-tabs-three-BIMfiles" role="tabpanel" aria-labelledby="custom-tabs-three-BIMfiles-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Battery Backup Unit -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Battery Backup Unit </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BIMfiles/Battery-Backup-Unit";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-pen" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BIMfiles/Battery-Backup-Unit/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BIMfiles/Battery-Backup-Unit/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 1 FIN cuadro Battery Backup Unit -->
                        

                        <!-- 2 INICIO cuadro Battery Backup Unit -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Cabinet FCR023 </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BIMfiles/Cabinet-FCR023";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-pen" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BIMfiles/Cabinet-FCR023/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BIMfiles/Cabinet-FCR023/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 2 FIN cuadro Cabinet FCR023 -->






                        <!-- 3 INICIO cuadro Cabinet FCR026 -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Cabinet FCR026 </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BIMfiles/Cabinet-FCR026";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-pen" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BIMfiles/Cabinet-FCR026/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BIMfiles/Cabinet-FCR026/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 3 FIN cuadro Cabinet FCR026 -->







                        <!-- 3 INICIO cuadro Cabinet FCR028 -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Cabinet FCR028 </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BIMfiles/Cabinet-FCR028";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fa-solid fa-file-pen" style='font-size:18px'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BIMfiles/Cabinet-FCR028/".$ff; ?>' target='_blank'><i class="fa-solid fa-download" style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BIMfiles/Cabinet-FCR028/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 4 FIN cuadro Cabinet FCR028 -->



                        
                  </div>
                  <!--  fin BIMFILES -->





                  <!-- DESDE ACA DISCOUNTED -->




<!-- INICIO DISCOUNTED -->

<div class="tab-pane fade " id="custom-tabs-three-Discontinued" role="tabpanel" aria-labelledby="custom-tabs-three-Discontinued-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Battery Backup Unit -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Notifier </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Discontinued/Notifier";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Discontinued/Notifier/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/Discontinued/Notifier/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- FIN DISCONTINUED PART - Notifier -->
                        

                        <!-- 2 Comienza DISCONTINUED PART - Honeywell -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Honeywell </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Discontinued/Honeywell";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Discontinued/Honeywell/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/Discontinued/Honeywell/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 2 FIN DISCONTINUED PART - Honeywell -->






                        <!-- 3 INICIO cuadro Cabinet FCR026 -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Gamewell-FCI </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Discontinued/Gamewell";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Discontinued/Gamewell/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/Discontinued/Gamewell/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 3 FIN DISCONTINUED PART - Gamewell-FCI -->







                        <!-- 4 Comienza DISCONTINUED PART - Fiplex -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Fiplex </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Discontinued/Fiplex";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Discontinued/Fiplex/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/Discontinued/Fiplex/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 4 FIN DISCONTINUED PART - Fiplex -->


                        <!-- 5 Comienza DISCONTINUED PASSIVE_DAS_COMMON -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Passive_DAS_Common </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/Discontinued/Passive_DAS_Common";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                                   
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/Discontinued/Passive_DAS_Common
								/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/Discontinued/Passive_DAS_Common/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>

                        <!-- 5 FIN DISCONTINUED PASSIVE_DAS_COMMON-->



                        
                  </div>
                  <!--  fin DISCOUNTED -->
                  




                  <!-- HASTA ACA DISCOUNTED -->





                  <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Listing_Certificates -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Listing Certificates </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/listing_certificates";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){

                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/listing_certificates/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/listing_certificates/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 1 fin Listing_Certificates -->
						
						
						
                  </div>
				  
				  
				  
				  
				 <!-- 1 Inicio BBU_Calculations --> 

                  <div class="tab-pane fade " id="custom-tabs-three-BBU_Calculations" role="tabpanel" aria-labelledby="custom-tabs-three-BBU_Calculations-tab">
                  <?php // listFolderFiles('/var/www/flexbda/download/BBU_Calculations'); ?>

                     <!-- 1 cuadro Listing_Certificates -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  BBU Calculations </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/BBU_Calculations";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){

                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/BBU_Calculations/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/BBU_Calculations/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                  							
                  </div>
				        <!-- 1 fin BBU_Calculations -->

				  
				  
				  

                  <!-- Comienza Manuales -->
						  
						  
					<div class="tab-pane fade " id="custom-tabs-three-manuals" role="tabpanel" aria-labelledby="custom-tabs-three-manuals-tab">
					<?php // listFolderFiles('/var/www/flexbda/download/manuals'); ?>

                     <!-- 1 cuadro fiplex_by_honeywell -->
					 
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Fiplex by Honeywell </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/manuals/fiplex_by_honeywell";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){

                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                   <?php if (is_dir($dir.'/'.$ff)==1)
                                   {
                                     ?>
                                         <i class='far fa-folder-open' style='font-size:18px'></i> <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                     <?php
                                   }
                                   else
                                   { ?>
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>   
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/manuals/fiplex_by_honeywell/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/manuals/fiplex_by_honeywell/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 1 fin fiplex_by_honeywell -->





                                      </div>

<!-- FIN Manuals -->





<!-- PRUEBA nuevocomienza Gates -->
<div class="tab-pane fade " id="custom-tabs-three-gates" role="tabpanel" aria-labelledby="custom-tabs-three-messages-gates">
<?php echo "gates 1" ?>;
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Notifier </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">
                            <?php
                            ///var/www/flexbda/download/manuals/NOTIFIER
                          //$dir="/var/www/flexbda/download/manuals/NOTIFIER";
                          $dir = "/Users/leandroleuci/Macbook (local)/repositorio-fiplex/gates";

                          echo $dir;

                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                              
                                ?>
                                   <li>                              
                                <span class="handle ui-sortable-handle">
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>    
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/Macbook (local)/repositorio-fiplex/gates/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                            <!-- ///download/manuals/NOTIFIER/ -->
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                          <!-- /.card-body -->
                    
                        </div>
                        <!-- 2 cuadro -->
                        <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Honeywell </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            ///var/www/flexbda/download/manuals/NOTIFIER
                          $dir="/var/www/flexbda/download/manuals/Honeywell";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                              
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>    
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/manuals/Honeywell/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                                          
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                          <!-- /.card-body -->
                    
                        </div>
                        <!-- 2 fin cuadroy -->
                           <!-- 3 cuadro -->
                           <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Gamewell-FCI2 </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            ///var/www/flexbda/download/manuals/NOTIFIER
                          $dir="/var/www/flexbda/download/manuals/Gamewell-FCI";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                              
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>    
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/manuals/Gamewell-FCI/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                                          
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                          <!-- /.card-body -->
                    
                        </div>
                        <!-- 3 fin cuadroy -->
                           <!-- 4 cuadro -->
                           <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Farenhyt</b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            ///var/www/flexbda/download/manuals/NOTIFIER
                          $dir="/var/www/flexbda/download/manuals/Farenhyt";
                            $ffs = scandir($dir);

                            unset($ffs[array_search('.', $ffs, true)]);
                            unset($ffs[array_search('..', $ffs, true)]);
                          
                            // prevent empty ordered elements
                            if (count($ffs) < 1)
                                return;
                                                   
                            foreach($ffs as $ff){
                              
                                ?>
                                   <li>                              
                                   <span class="handle ui-sortable-handle">
                                <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>    
                                </span>
                                <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
                                <a href='<?php echo "/download/manuals/Farenhyt/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                                          
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                          <!-- /.card-body -->
                        <!-- 4 fin cuadroy -->
                           <!-- 5 cuadro -->
                        <!-- 5 fin cuadroy -->


                        


                  </div>

                  
        
                </div>
<!-- fin gates -->






              </div>
              <!-- /.card -->
            </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
    
        
        </div>
        <!-- /.row (main row) -->
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

<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
<!-- Bootstrap 4.5.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>


</body>
</html>
