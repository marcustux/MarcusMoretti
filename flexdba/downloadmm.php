<?php 

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

  // prevent empty ordered elements
  if (count($ffs) < 1)
      return;

  //echo '<ol style="font-size:14px;list-style-type: none;">';
  echo '<ol class="todo-list ui-sortable" data-widget="todo-list">';
  foreach($ffs as $ff){
    //  echo '<li><a href="https://flexbda.com/download/'.$ff.'" target="_blank"> <i class="fas fa-file-alt" style="font-size:18px"></i> '.$ff;
    //  if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
   //   echo '</a></li>';
      ?>
      <li>                              
      <span class="handle ui-sortable-handle">
   <i class="fas fa-file-pdf" style='font-size:18px;color:red'></i>    
   </span>
   <span class="text"> <?php echo $ff; ?> </span>  &nbsp;&nbsp;
   <a href='<?php echo $rutaapdf.$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                             
 </li>
   <?php

  }
  echo '</ol>';
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
                    <a class="nav-link " id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Manuals</a>
                  </li>
              
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
                            <b>  Farenhyt </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/datasheets/Farenhyt";
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
                                <a href='<?php echo "/download/datasheets/Farenhyt/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/datasheets/Farenhyt/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 1 fin cuadro datasheets -->
                          <!-- 2 cuadro datasheets-->
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
                            
                          $dir="/var/www/flexbda/download/datasheets/Gamewell-FCI";
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
                                <a href='<?php echo "/download/datasheets/Gamewell-FCI/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/datasheets/Gamewell-FCI/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 2 fin cuadro datasheets -->
                          <!-- 3 cuadro datasheets-->
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
                            
                          $dir="/var/www/flexbda/download/datasheets/Honeywell";
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
                                <a href='<?php echo "/download/datasheets/Honeywell/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/datasheets/Honeywell/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 3 fin cuadro datasheets -->
                         <!-- 4 cuadro datasheets-->
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
                            
                          $dir="/var/www/flexbda/download/datasheets/Notifier";
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
                                <a href='<?php echo "/download/datasheets/Notifier/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/datasheets/Notifier/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 4 fin cuadro datasheets -->
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
                  <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <?php// listFolderFiles('/var/www/flexbda/download/listing_certificates'); ?>

                     <!-- 1 cuadro Listing_Certificates -->
                     <div class="card">
                          <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">
                              <i class="ion ion-clipboard mr-1"></i>
                            <b>  Farenhyt </b>
                            </h3>

                            <div class="card-tools">
                          
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <ul class="todo-list ui-sortable" data-widget="todo-list">

                            <?php
                            
                          $dir="/var/www/flexbda/download/listing_certificates/Farenhyt";
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
                                <a href='<?php echo "/download/listing_certificates/Farenhyt/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/listing_certificates/Farenhyt/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 1 fin Listing_Certificates -->
                         <!-- 2 cuadro Listing_Certificates -->
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
                            
                          $dir="/var/www/flexbda/download/listing_certificates/Gamewell-FCI";
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
                                <a href='<?php echo "/download/listing_certificates/Gamewell-FCI/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/listing_certificates/Gamewell-FCI/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 2 fin Listing_Certificates -->
                          <!-- 3 cuadro Listing_Certificates -->
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
                            
                          $dir="/var/www/flexbda/download/listing_certificates/Honeywell";
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
                                <a href='<?php echo "/download/listing_certificates/Honeywell/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/listing_certificates/Honeywell/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 3 fin Listing_Certificates -->
                          <!-- 4 cuadro Listing_Certificates -->
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
                            
                          $dir="/var/www/flexbda/download/listing_certificates/NOTIFIER";
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
                                <a href='<?php echo "/download/listing_certificates/NOTIFIER/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                   <?php } 
                                   
                                   
                              if(is_dir($dir.'/'.$ff))
                              listFolderFiles($dir.'/'.$ff, "/download/listing_certificates/NOTIFIER/".$ff."/");
                                   ?>                        
                              </li>
                                <?php
                            }

                            ?>
                                                      
                            </ul>
                          </div>
                        
                    
                        </div>
                        <!-- 4 fin Listing_Certificates -->
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">

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
                          $dir="/var/www/flexbda/download/manuals/NOTIFIER";
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
                                <a href='<?php echo "/download/manuals/NOTIFIER/".$ff; ?>' target='_blank'><i class='fas fa-eye' style='font-size:14px'></i></a>&nbsp;&nbsp;
                                            
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
                            <b>  Gamewell-FCI </b>
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
    <strong>Copyright &copy; 2020 .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>


</body>
</html>
