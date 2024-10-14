<?php 
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
                    <th>N° of Projects in Draft</th>
                    <th>N° of Projects In Process / Pending for PM</th>
                    <th>N° of Projects In Process / Pending for PM <br> Greater than 3 days from submission date </th>
                    <th>N° of projects Processed </th>
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
                      union 
                      select designtransition, 'X',  date_part('day' ,  now()-maxfechass) as cc
from (
select designtransition, active, max(flexbdahoneywell_actions.datemodif) as maxfechass
from 
(
	select idproject, max(idrev) as maxidrev from flexbdahoneywell  group by idproject
) as maxrevxproj
inner join flexbdahoneywell
on maxrevxproj.idproject	=	flexbdahoneywell.idproject and
   maxrevxproj.maxidrev		=	flexbdahoneywell.idrev
inner join flexbdahoneywell_actions
on flexbdahoneywell_actions.idproject	=	flexbdahoneywell.idproject and
   flexbdahoneywell_actions.idrev		=	flexbdahoneywell.idrev
where active in ('W','P') and designtransition in('dtransition','etransition','nestimate')
group by  designtransition, active

) dd

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
                          if ( $rownt['active']=="X") {    $cc_designtransition_Pend_mas3dias =  $rownt['cc']; }
                        }
                        if ( $rownt['designtransition']=="etransition")
                        {
                          if ( $rownt['active']=="D") {  $cc_etransition_draft =  $rownt['cc'];  }
                          if ( $rownt['active']=="P") {    $cc_etransition_Pend =   $rownt['cc']; }
                          if ( $rownt['active']=="W") {     $cc_etransition_work =  $rownt['cc']; }
                          if ( $rownt['active']=="Y") {    $cc_etransition_proccess =  $rownt['cc']; }
                          if ( $rownt['active']=="X") {    $cc_etransition_Pend_mas3dias =  $rownt['cc']; }
                        }
                        if ( $rownt['designtransition']=="nestimate")
                        {
                          if ( $rownt['active']=="D") {  $cc_nestimate_draft =  $rownt['cc'];  }
                          if ( $rownt['active']=="P") {    $cc_nestimate_Pend =   $rownt['cc']; }
                          if ( $rownt['active']=="W") {     $cc_nestimaten_work =  $rownt['cc']; }
                          if ( $rownt['active']=="Y") {    $cc_nestimate_proccess =  $rownt['cc']; }
                          if ( $rownt['active']=="X") {    $cc_nestimate_Pend_mas3dias =  $rownt['cc']; }
                        }
                      }
                      
                    
                    
                    ?>
                      <td align="center"><?php echo  $cc_nestimate_draft;  ?></td>
                    <td align="center"><?php echo  $cc_nestimate_Pend + $cc_nestimaten_work ;  ?></td>
                    <td align="center"><?php if ( $cc_nestimate_Pend_mas3dias >0 ) { echo $cc_nestimate_Pend_mas3dias; } else { echo "<span style='color:black'>0</span>"; } ?></td>
                    <td align="center"><?php echo  $cc_nestimate_proccess;  ?></td>                     
                  </tr>
                  <tr>
                    <th>Estimate Transition </th>
                    <td align="center"><?php echo  $cc_etransition_draft;  ?></td>
                    <td align="center"><?php echo  $cc_etransition_Pend + $cc_etransition_work ;  ?></td>
                    <td align="center"><?php if ( $cc_etransition_Pend_mas3dias >0 ) { echo $cc_etransition_Pend_mas3dias; } else { echo "<span style='color:black'>0</span>"; }  ?></td>
                    <td align="center"><?php echo  $cc_etransition_proccess;  ?></td>                    
                  </tr>
                  <tr>
                    <th>Design Transition </th>
                    <td align="center"><?php echo  $cc_designtransition_draft;  ?></td>
                    <td align="center"><?php echo  $cc_designtransition_Pend + $cc_designtransition_work ;  ?></td>
                    <td align="center" style="color:RED"><?php if ( $cc_designtransition_Pend_mas3dias >0 ) { echo $cc_designtransition_Pend_mas3dias; } else { echo "<span style='color:black'>0</span>"; }  ?></td>
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
        
       


        <br>
        <div class="row">
          <div class="col-lg-3 col-6">



            <!-- small box -->
            <div class="small-box bg-azulhoneywell">
        
              <div class="inner">
              <a href="listprojects.php" class="linkblanco" >
                <h5><b>Projects</b></h5>

                <p>List of uploaded projects
                
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 .</strong>
    All rights reserved. -- <a href='FLEXBDA_END_USER_AGREEMENT.pdf' target='_blank'>End User Agreement</a>
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
