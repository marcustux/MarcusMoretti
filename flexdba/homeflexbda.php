<?php
include('cabeceras.php');
add_header_seguridad();
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

.bg-verdehoneywell, .bg-verdehoneywell>a {
    color: #ffffff;
    background-color: #2E8B57;
}


.bg-rojopopahoneywell, .bg-rojopopahoneywell>a {
    color: #ffffff;
    background-color: #B5131F;
}

.bg-brownhoneywell, .bg-brownhoneywell>a {
    color: #ffffff;
    background-color: #A52A2A;
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
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
    

      
             
          
       


        <br>
        <div class="row">
          <div class="col-lg-3 col-6">



            <!-- small box -->
            <div class="small-box bg-azulhoneywell">
        
              <div class="inner">
              <a href="listprojects.php" class="linkblanco" >
                <h5><b>Project List</b></h5>

                <p>List of Projects in Process
                
                <?php
          
      
          ?>
                </p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              </a>
              <a href="listprojects.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->






          <div class="col-lg-3 col-6">



<!-- small box -->
<div class="small-box bg-verdehoneywell">

  <div class="inner">
  <a href="listprojects.php?searchProcessed=1&year=2024" class="linkblanco" >
    <h5><b>Project Processed List</b></h5>

    <p>List of Processed Projects
    
    <?php


?>
    </p>
  </div>
  <div class="icon">
    <i class="ion ion-briefcase"></i>
  </div>
  </a>
  <a href="listprojects.php?searchProcessed=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<!-- ./col -->





          
       
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-rojopopahoneywell">
              <div class="inner">
              <a href="download.php" class="linkblanco" >
              <h5><b>Resources</b></h5>
                <p>Manuals, Videos, Materials</p>
              </div>
              <div class="icon">
                <i class="ion ion-information-circled"></i>
              </div>
              </a>
              <a href="download.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <?php
          if ( 	$_SESSION["flexbdad"]  == "itsupport@fiplex.com" ){

          ?>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-brownhoneywell">
                <div class="inner">
                <a href="tools.php" class="linkblanco" >
                <h5><b>IT Tools</b></h5>
                  <p>Tools</p>
                </div>
                <div class="icon">
                  <i class="ion ion-information-circled"></i>
                </div>
                </a>
                <a href="tools.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          <?php
            }
          ?>

          <?php
          
          if ( 	$_SESSION["flexbdag"]  == "fiplexdev")
          {
            $canttotoal = 0;
            $cvantpend  =0;
            $sqlnotif="select 'A' as tt, count(*) as ccc  FROM  customers_userewbfas where active in('Y')   and (rsm  like '%@%' or bdabdm  like '%@%')  
            union
            select 'T' as tt, count(*) as ccc  FROM  customers_userewbfas where active not in('IM','M')  
            union 
            select 'P' as tt, count(*) as ccc  FROM  customers_userewbfas where (active in('Y') and (rsm not like '%@%' or bdabdm not like '%@%')) or   active ='M' ";
            $datanotif = $connect->query($sqlnotif)->fetchAll();	
            foreach ($datanotif as $rownt)
            {	
              if ( $rownt['tt']=="A")
              {
                $canttotoal = $rownt['ccc'];
              }
              if ( $rownt['tt']=="T")
              {
             
              }
              if ( $rownt['tt']=="P")
              {
                $cvantpend = $rownt['ccc'];
              }
        
              

            }
            $canttotoaltodos =$canttotoal +  $cvantpend ;
              ?>
               <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-azulhoneywell">
              <div class="inner">
              <a href="managerusers.php" class="linkblanco" >
              <h5><b>User Manager / Notifications </b></h5>
                <p>User information, password change.<br><small>Active users: <?php echo $canttotoal." / ". $canttotoaltodos;?> <br> Users without RSM / BDABDM Assigned: <?php echo $cvantpend;?></small></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              </a>
              <a href="managerusers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
              <?php
          }
          
          ?>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <br>
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
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous">
</script>

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4.5.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>


</body>
</html>
