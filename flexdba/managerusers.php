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
	
  //	echo "Hola:".$_SESSION["timeout"];
  if ( 	$_SESSION["flexbdag"]  <> "fiplexdev")
          {
            echo "Error MAM";
            exit();
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
  <link rel="stylesheet" href="managerusers.css">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
            <h1 class="m-0 colorazulhoneywell">User Manager / Notifications </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Manager / Notifications  </li>
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
            $regexNumeros = '/^\d+$/';
             
          if( $_REQUEST['m']=="e" && preg_match($regexNumeros, $_REQUEST['idu']))
          {

            ?>
              <div class="card">
              <div class="card-header">
              <h5 class="card-title"> Modify user data</h5>
             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

              <?php

                 $vparam = $_REQUEST['idu'];
                 include("db_conectflexbda.php"); 
                  $sqlproject = "SELECT * FROM customers_userewbfas where  idusercus = ". $vparam ;
                  $msjnotdata = 0;
                  $faltandatos="";
                  $data = $connect->query($sqlproject)->fetchAll();	
                  foreach ($data as $row) {
                    $v_idusercus =$row['idusercus'];
                    $v_username=$row['usermail'];
                    $v_userpass=$row['userpass'];
                    $v_active=$row['active'];
                    $v_usermail=$row['usermail'];
                    $v_usermobile=$row['usermobile'];
                    $v_profile=$row['profile'];
                    $v_txtprofile=$row['profile'];
                    $v_nameuserfull=$row['nameuserfull'];
                    $v_tokengoogle=$row['tokengoogle'];
                    $v_companynametemp=$row['companynametemp'];
                    $v_honeeywellnroacc=$row['honeeywellnroacc'];
                    $v_typeemployee=$row['typeemployee'];
                    $v_esdchanneldealer=$row['esdchanneldealer'];
                    $v_rsm =$row['rsm'];
                    $v_bdabdm =$row['bdabdm'];

                   
                    
                }
                if (  $v_rsm=="")
                {
                  $v_rsm="MM";
                }
                if (  $v_bdabdm=="")
                {
                  $v_bdabdm="MM";
                }
  // }
  // else{
  //   echo 'Error';
  // }
           //   echo "<sasasasa<".$v_nameuserfull;
              ?>
          
             <form action="" method="post" class="form-horizontal">


                <div class="input-group mb-3">
                <label class="col-sm-2 col-form-label"> Full name: </label>
                <input type="text" class="form-control" name="txtnameuserfull" id="txtnameuserfull" placeholder="Full name" value="<?php echo   $v_nameuserfull; ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                </div>
                <div class="input-group mb-3">
                
                <label class="col-sm-2 col-form-label"> E-mail:</label>
                <input type="email" class="form-control" disabled name="txtemailtos" id="txtemailtos" value="<?php echo   $v_usermail; ?>" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                </div>
             
                <div class="input-group mb-3">
                
                <label class="col-sm-2 col-form-label"> Company name:</label>
                <input type="text" class="form-control" name="txtcompname" id="txtcompname" value="<?php echo  $v_companynametemp; ?>"  placeholder="Company name">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-building"></span>
                  </div>
                </div>
         
                </div>
                <div class="input-group mb-3">
                
                <label class="col-sm-2 col-form-label">ESD/Dealer Channel :</label>
                <!-- <select id="txtedsdealer" name="txtedsdealer" class="form-control form-control-sm" onchange="load_data_rsm_bdabdm(this.value)"> 
                  Cambio Lucho 01/10/2024-->
                <select id="txtedsdealer" name="txtedsdealer" class="form-control form-control-sm">
                                <option value=""> -select -  </option>
                                          
                                                          <option value="NOTIFIER_ESD" <?php if (  $v_esdchanneldealer =="NOTIFIER_ESD" ) { echo "selected ";}?>> NOTIFIER ESD </option>
                                                          <option value="GAMEWELL_FCI_ESD_ONLY" <?php if (  $v_esdchanneldealer =="GAMEWELL_FCI_ESD_ONLY" ) { echo "selected ";}?> >GAMEWELL-FCI ESD ONLY </option>
                                                          <option value="FARENHYT_ESD_ONLY" <?php if (  $v_esdchanneldealer =="FARENHYT_ESD_ONLY" ) { echo "selected ";}?>  >FARENHYT ESD ONLY </option>
                                                          <option value="GAMEWELL_FCI_FARENHYT_DUAL_ESD"  <?php if (  $v_esdchanneldealer =="GAMEWELL_FCI_FARENHYT_DUAL_ESD" ) { echo "selected ";}?> >GAMEWELL-FCI & FARENHYT DUAL ESD </option>
                                                          <option value="HONEYWELL_FIRE_SYSTEMS_CBSI_DEALER"  <?php if (  $v_esdchanneldealer =="HONEYWELL_FIRE_SYSTEMS_CBSI_DEALER" ) { echo "selected ";}?> >HONEYWELL FIRE SYSTEMS CBSI DEALER</option>
                                                          <option value="HONEYWELL_BUILDING_SOLUTIONS" <?php if (  $v_esdchanneldealer =="HONEYWELL_BUILDING_SOLUTIONS" ) { echo "selected ";}?> >HONEYWELL BUILDING SOLUTIONS (HBS)</option>
                                                          <option value="FIPLEX_SI" <?php if (  $v_esdchanneldealer =="FIPLEX_SI" ) { echo "selected ";}?> >FIPLEX SI</option>

                                                            </select>

                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-clipboard"></span>
                  </div>
                </div>
                </div>

                <div class="input-group mb-3">
              
                <label class="col-sm-2 col-form-label">  Honeywell account number:</label>
                <input type="text" class="form-control" name="txthoneywellaccnumber" id="txthoneywellaccnumber" value="<?php echo  $v_honeeywellnroacc; ?>"  placeholder="Honeywell account number">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-tag"></span>
                  </div>
                </div>
                </div>

                <div class="input-group mb-3">
              
              <label class="col-sm-2 col-form-label"> RSM:</label>
               <select id="txtrsm" name="txtrsm" class="form-control form-control-sm" placeholder="">
                                <option value=""> - select -  </option>
                                          
                                       <?php
                                       
                                          $sqlbuscapm = "SELECT * FROM customers_userewbfas where active in('Y','M') and profile = 'RSM' order by nameuserfull";
                                        echo  $sqlbuscapm;
                                          $msjnotdata = 0;
                                          $faltandatos="";
                                          $datapm = $connect->query($sqlbuscapm)->fetchAll();	
                                          foreach ($datapm as $rowpm) {		
                                            ?>
                                            <option value="<?php echo $rowpm['usermail']; ?>" <?php if(  strtoupper ($rowpm['usermail']) == strtoupper ($v_rsm) ) { echo "selected"; }?>> <?php echo strtoupper ($rowpm['nameuserfull']); ?> </option>
                                            <?php
                                          }
                                       ?>
                                                            </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-tag"></span>
                  </div>
                </div>
                </div>

                <div class="input-group mb-3">
               
               <label class="col-sm-2 col-form-label"> BDA BDM:</label>
               <select id="txtbdabdm" name="txtbdabdm" class="form-control form-control-sm" placeholder="">
                                <option value=""> - select -  </option>
                                          
                                <?php



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
echo "aaaaaaaaaaaaaaaaaaa".$v_esdchanneldealer;

                                        if ($v_esdchanneldealer =="HONEYWELL_BUILDING_SOLUTIONS")
                                        {
                                        $v_esdchanneldealer_bdabmd="NOTIFIER";
                                        }
                                        else
                                        {
                                          $v_esdchanneldealer_bdabmd=$v_esdchanneldealer;
                                        }

                                          $sqlbuscapm = "SELECT * FROM customers_userewbfas where active in('Y','M') and profile = 'BDABDM'   order by nameuserfull ";
                                          $msjnotdata = 0;
                                          $faltandatos="";
                                          $datapm = $connect->query($sqlbuscapm)->fetchAll();	
                                          foreach ($datapm as $rowpm) {		
                                            ?>
                                            <option value="<?php echo $rowpm['usermail']; ?>" <?php if(  strtoupper ($rowpm['usermail']) == strtoupper ($v_bdabdm)) { echo "selected"; }?>><?php echo strtoupper ($rowpm['nameuserfull']) ; ?> </option>
                                            <?php
                                          }
                                       ?>
                                                            </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-tag"></span>
                  </div>
                </div>
                </div>

                <div class="input-group mb-3">
               
               <label class="col-sm-2 col-form-label"> Type Employee:</label>
               <select id="txttypeemployee" name="txttypeemployee" class="form-control form-control-sm" placeholder="">
                                <option value="-"> - select -  </option>
                                <option value="FIPLEX" <?php
                                $encontreempresa= "N";
                                if(  "FIPLEX"==$v_typeemployee) { echo "selected";  $encontreempresa= "S"; }?>>FIPLEX</option>
                                <option value="HONEYWELL" <?php if(  "HONEYWELL" ==$v_typeemployee) { echo "selected"; $encontreempresa= "S"; }?>>HONEYWELL</option>
                                <option value="-" > Not employed </option>
                                <?php
                                  if ($encontreempresa== "N")
                                  {
                                    ?>   <option value="<?php echo strtoupper($v_typeemployee); ?>" selected >Other Company: <?php echo strtoupper($v_typeemployee); ?> </option>
                                    <?php
                                  }
                                ?>
                                          
                        
                                                            </select>
            
                </div>

                <div class="input-group mb-3">
               
               <label class="col-sm-2 col-form-label"> Type Profile:</label>
               <select id="txtprofile" name="txtprofile" class="form-control form-control-sm" placeholder="">
                                <option value="-"> - select -  </option>
                                <option value="basic" <?php if(  "basic"==$v_txtprofile) { echo "selected"; }?>>ESD</option>
                                <option value="ing" <?php if(  "ing" ==$v_txtprofile) { echo "selected"; }?>>Project Manager</option>
                                <option value="RSM" <?php if(  "RSM" ==$v_txtprofile) { echo "selected"; }?>>RSM</option>
                                <option value="BDABDM" <?php if(  "BDABDM" ==$v_txtprofile) { echo "selected"; }?>>BDABDM</option>
                                <option value="cts" <?php if(  "cts" ==$v_txtprofile) { echo "selected"; }?>>CTS</option>
                                <?php
          
                                  if ( 	$_SESSION["flexbdag"]  == "fiplexdev" &&  "fiplexdev" ==$v_txtprofile)
                                  {
                                      ?>
                                <option value="fiplexdev" <?php if(  "fiplexdev" ==$v_txtprofile) { echo "selected"; }?>>Administrator</option>
                                <?php
                                  }
                                     ?>
                        
                                                            </select>
            
                </div>

                <!-- /.col -->
                <div class="col-12 float-right ">
                
                  <button type="button" name="abc2" id="abc2" onclick='modifyuser("<?php echo   $v_idusercus; ?>","NM")' class="btn btn-outline-primary btn-block float-right">Save Changes</button>
                  
                </div>
                <div class="col-12 float-right ">
                
                <br>
                
              </div>


              
              <?php if  ($v_active =="P")
              {
                ?><br>
                 <div class="col-12 float-right ">
                
                <button type="button" name="abc3" id="abc3" onclick='modifyuser("<?php echo   $v_idusercus; ?>","PM")' class="btn btn-outline-primary btn-block float-right">Save and send notice of activated account</button>
                
              </div>

                <?php

              }
              else
              {
                ?>
                  <div class="col-12 float-right ">
                
                <button type="button" name="abc3" id="abc3" onclick='modifyuser("<?php echo   $v_idusercus; ?>","YM")' class="btn btn-outline-primary btn-block float-right">Save, create new password and send it to e-mail</button>
                
              </div>
                <?php
              } ?>
                <!-- /.col -->
                </div>
                          
                </form>
                </div>
                </div>
                </div>
            <?php
          }
            ?>


            <div class="card">
              <div class="card-header">
                <h5 class="card-title">List of Users</h5>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <table class="table table-striped projects" name="example1" id="example1">
              <thead  class="table table-dark">
                  <tr>
                   
                      <th >
                          Full name
                      </th>
                      <th>
                          User E-mail
                      </th>
                      <th>
                          Company name
                      </th>
                         <th>
                          User Profile
                      </th>
                      <th>
                        Honeywell N°
                      </th>
                      <th>
                        RSM
                      </th>
                      <th>
                        BDA BDM
                      </th>
                      <th>
                        Dealer Channel
                      </th>
                    
                      <th class="text-center">
                       User status
                      </th>
                      <th class="text-right">
                      Actions
                      </th>
                  </tr>
              </thead>
              <tbody>

              <?php
// Desactivar toda notificación de error
error_reporting(0);

include("db_conectflexbda.php"); 
              $sqlproject = "SELECT * FROM customers_userewbfas order by companynametemp , active, nameuserfull ";
              $msjnotdata = 0;
              $faltandatos="";
              $data = $connect->query($sqlproject)->fetchAll();	
              foreach ($data as $row) {		
                $msjnotdata = 1;
                $faltandatos="";
                if ( $row['profile'] =="basic")
                {
                  if ( $row['honeeywellnroacc'] =="")
                  {
                   $faltandatos=" text-danger ";
                  }
                  if ( $row['rsm'] =="")
                  {
                   $faltandatos=" text-danger ";
                  }
                  if ( $row['bdabdm'] =="")
                  {
                   $faltandatos=" text-danger ";
                  }
                  if ( $row['esdchanneldealer'] =="")
                  {
                   $faltandatos=" text-danger ";
                  }
                }
                  
                ?>
                   <tr class="<?php echo  $faltandatos; ?>">
                    
                      <td>
                          <a>
                          <?php echo $row['nameuserfull'];   if ($row['typeemployee'] !=NULL) { echo "<br> <small>Employee:".$row['typeemployee']."</small>";}?>
                          </a>                      
                      </td>
                      <td>
                          <a>
                          <?php echo $row['usermail'];?>
                          </a>
                      
                      </td>
                      <td>
                          <a>
                          <?php echo strtoupper ( $row['companynametemp']);?>
                          </a>
                      
                      </td>
                      <td>
                          <a>
                          <?php
                          
                          if ( $row['profile'] =="basic")
                          {
                              echo "ESD";
                          }
                          if ( $row['profile'] =="ing")
                          {
                              echo "Project Manager";
                          }
                          if ( $row['profile'] =="RSM")
                          {
                              echo "RSM";
                          }
                          if ( $row['profile'] =="BDABDM")
                          {
                              echo "BDABDM";
                          }
                        //  echo $row['profile'];?>
                          </a>
                      
                      </td>
                      <td>
                          <a>
                          <?php echo $row['honeeywellnroacc'];?>
                          </a>
                      
                      </td>
                      <td>
                          <a>
                          <?php echo  str_replace("@HONEYWELL.COM", "",  strtoupper ($row['rsm']));?>
                          </a>
                      
                      </td>
                      <td>
                          <a>
                          <?php echo  str_replace("@HONEYWELL.COM", "", strtoupper ( $row['bdabdm'])); ?>
                          </a>
                      
                      </td>
                      <td>
                          <a>
                          <?php 
                            if ($row['esdchanneldealer']=="NOTIFIER_ESD") { echo "NOTIFIER ESD";}
                            if ($row['esdchanneldealer']=="GAMEWELL_FCI_ESD_ONLY") { echo "GAMEWELL-FCI ESD ONLY";}
                            if ($row['esdchanneldealer']=="FARENHYT_ESD_ONLY") { echo "FARENHYT ESD ONLY ";}
                            if ($row['esdchanneldealer']=="GAMEWELL_FCI_FARENHYT_DUAL_ESD") { echo "GAMEWELL-FCI & FARENHYT DUAL ESD ";}
                            if ($row['esdchanneldealer']=="HONEYWELL_FIRE_SYSTEMS_CBSI_DEALER") { echo "HONEYWELL FIRE SYSTEMS CBSI DEALER";}
                            if ($row['esdchanneldealer']=="HONEYWELL_BUILDING_SOLUTIONS") { echo "HONEYWELL BUILDING SOLUTIONS (HBS)";}
                          
                          
                          
                          ?>
                          </a>
                      
                      </td>
                   
                    
                      <td class="project-state">
                      <?php if ( $row['active']=="N")
                        {
                          ?>  <span class="badge badge-danger">Inactive </span>
                          <?php
                        }
                        if ( $row['active']=="Y" && $row['rsm']<> '')
                        {
                          ?>  <span class="badge badge-success">Active</span>
                          <?php
                        }
                        if ( $row['active']=="P" || ($row['active']=="Y" && $row['rsm']== ''))
                        {
                          ?>  <span class="badge badge-warning">Pending</span>
                          <?php
                        }
                        if ( $row['active']=="IM")
                        {
                          ?>  <span class="badge badge-warning">Imported</span>
                          <?php
                        }
                        if ( $row['active']=="M")
                        {
                          ?>  <span class="badge badge-warning">Imported Honeywell </span>
                          <?php
                        }
                      ?>  
                          
                      </td>
                      <td class="project-actions text-right">
                           
                          <a class="btn btn-outline-info btn-xs"  href="managerusers.php?m=e&idu=<?php echo $row['idusercus'];  ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <?php if ( $row['active']=="N")
                        {
                          ?>   &nbsp;
                          <a class="btn btn-outline-info btn-xs" href="#" onclick="activeuser(<?php  echo $row['idusercus'];  ?>)">
                          <i class="fas fa-check-circle">
                                              </i>
                              Activate
                          </a>
                          <?php
                        }
                        if ( $row['active']=="Y")
                        {
                          ?>  &nbsp;
                          <a class="btn btn-outline-danger btn-xs" href="#" onclick="Inactiveuser(<?php  echo $row['idusercus'];  ?>)">
                              <i class="fas fas fa-ban">
                              </i>
                              Inactive
                          </a>
                          <?php
                        }
                        if ( $row['active']=="P")
                        {
                          ?> 
                          <?php
                        }
                       
                      ?>  
                         
                       
                      </td>
                  </tr>
                <?php	
              
                      } 
           
              
              ?>
                 
           
            
              </tbody>
          </table>
          <br>
          <p class="text-danger">(*) the account is not complete, information is missing to function correctly</p>
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
          <div class="row">
          <div class="col-md-12">


          <?php if( $_REQUEST['m']=="")
          {

            ?>
           
            <div class="card ">
              <div class="card-header">
                <h5 class="card-title">Email notifications</h5>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                 
                    <!-- inicio form add -->
                     

                    <div class="card-body">

																	

                          <div class="card-body form-row">
                          <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Notify for each project uploaded </p>
                          (*) - The system will automatically send notifications to the user who uploaded the project .
                          <hr class="borderojo">
                          </div>							   
                          <div class="form-group col-md-6 ">
                          <label for="exampleInputEmail1"> E-mail :</label>
                          <input type="text" name="txtemailproup" id="txtemailproup"   class="form-control" placeholder="e-mail" required oninvalid="setCustomValidity(' is required.')" oninput="setCustomValidity('')">
                        <br>
                          <p align="right"><a class="btn btn-outline-primary btn-xs" href="#" onclick="Addemail('txtemailproup','project_uploaded')">
                              <i class="fas fa-envelope-open">
                              </i>
                              Add E-mail
                          </a></p>
                          </div>
                          <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">   Registered email list </label><br>
                                  <table class="table table-sm" name="listusersm" id="listusersm">
                                    <thead>
                                      <tr>
                                        
                                        <th scope="col">E-mails</th>
                                        <th scope="col">Actions</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_uploaded' order by activeemail desc  ";
                                    $datanotif = $connect->query($sqlnotif)->fetchAll();	
                                    foreach ($datanotif as $rownt) {	
                                      ?>
                                       <tr>
                                        
                                        <td><?php
                                        if ($rownt['activeemail']=="N") {echo "<del>"; }
                                        echo  $rownt['emailnoti']; 
                                        if ($rownt['activeemail']=="N") {echo "</del>"; } ?></td>
                                        <td>
                                        <?php if  ($rownt['activeemail']=="Y") {  ?>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="inacitvemail('<?php echo $rownt['emailnoti']; ?>','project_uploaded')">
                                            <i class="fas fa-ban">
                                            </i>
                                            Inactive
                                           
                                        </a>
                                        <?php }
                                        else
                                        {
                                          ?>
                                          <a class="btn btn-outline-info btn-xs" href="#" onclick="activatemeail('<?php echo $rownt['emailnoti']; ?>','project_uploaded')">
                                          <i class="fas fa-check-circle">
                                              </i>
                                              Activate
                                             
                                          </a>
                                          <?php

                                        } ?>
                                        </td>
                                        
                                      </tr>
                                      <?php
                                    }	
                                    ?>
                                     
                                     
                                     
                                    </tbody>
                                  </table>
                          </div>


                       
                          </div>
                          <!-- nuevo div -->
                          <div class="card-body form-row">
                          <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Notify for each project processed </p>
                        
                          (*) - The system will automatically send notifications to the user who uploaded the project and the project administrator who managed it.
                          <hr class="borderojo">
                          </div>							   
                          <div class="form-group col-md-6 ">
                          <label for="exampleInputEmail1"> E-mail :</label>
                          <input type="text" name="txtprojproced" id="txtprojproced"   class="form-control" placeholder="e-mail" required oninvalid="setCustomValidity(' Project Nam is required.')" oninput="setCustomValidity('')">
                        <br>
                          <p align="right"><a class="btn btn-outline-primary btn-xs" href="#" onclick="Addemail('txtprojproced','project_processed')">
                              <i class="fas fa-envelope-open">
                              </i>
                              Add E-mail
                          </a></p>
                          </div>
                          <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">   Registered email list </label><br>
                                  <table class="table table-sm">
                                    <thead>
                                      <tr>
                                        
                                        <th scope="col">E-mails</th>
                                        <th scope="col">Actions</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_processed'  order by activeemail desc";
                                    $datanotif = $connect->query($sqlnotif)->fetchAll();	
                                    foreach ($datanotif as $rownt) {	
                                      ?>
                                       <tr>
                                        
                                        <td><?php
                                        if ($rownt['activeemail']=="N") {echo "<del>"; }
                                        echo  $rownt['emailnoti']; 
                                        if ($rownt['activeemail']=="N") {echo "</del>"; } ?></td>
                                        <td>
                                        <?php if  ($rownt['activeemail']=="Y") {  ?>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="inacitvemail('<?php echo $rownt['emailnoti']; ?>','project_processed')">
                                            <i class="fas fa-ban">
                                            </i>
                                            Inactive
                                           
                                        </a>
                                        <?php }
                                        else
                                        {
                                          ?>
                                          <a class="btn btn-outline-info btn-xs" href="#" onclick="activatemeail('<?php echo $rownt['emailnoti']; ?>','project_processed')">
                                              <i class="fas fa-check-circle">
                                              </i>
                                              Activate
                                             
                                          </a>
                                          <?php

                                        } ?>
                                        </td>
                                        
                                      </tr>
                                      <?php
                                    }	
                                    ?>
                                     
                                     
                                    </tbody>
                                  </table>
                          </div>


                       
                          </div>
                          <!-- nuevo div >
                            <!-- nuevo div -->
                            <div class="card-body form-row">
                          <div class="form-group col-md-12 ">
                          <p class="colorazultitulo">Notify for each new project revision</p>
                          (*) - The system will automatically send notifications to the user who uploaded the project and the project administrator who managed it.
                          <hr class="borderojo">
                          </div>							   
                          <div class="form-group col-md-6 ">
                          <label for="exampleInputEmail1"> E-mail :</label>
                          <input type="text" name="txtprojrev" id="txtprojrev"   class="form-control" placeholder="e-mail" required oninvalid="setCustomValidity(' Project Nam is required.')" oninput="setCustomValidity('')">
                        <br>
                          <p align="right"><a class="btn btn-outline-primary btn-xs" href="#" onclick="Addemail('txtprojrev','project_revision')">
                              <i class="fas fa-envelope-open">
                              </i>
                              Add E-mail
                          </a></p>
                          </div>
                          <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">   Registered email list </label><br>
                                  <table class="table table-sm">
                                    <thead>
                                      <tr>
                                   
                                        <th scope="col">E-mails</th>
                                        <th scope="col">Actions</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_revision' order by activeemail desc ";
                                    $datanotif = $connect->query($sqlnotif)->fetchAll();	
                                    foreach ($datanotif as $rownt){	
                                      ?>
                                       <tr>
                                        
                                        <td><?php
                                        if ($rownt['activeemail']=="N") {echo "<del>"; }
                                        echo  $rownt['emailnoti']; 
                                        if ($rownt['activeemail']=="N") {echo "</del>"; } ?></td>
                                        <td>
                                        <?php if  ($rownt['activeemail']=="Y") {  ?>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="inacitvemail('<?php echo $rownt['emailnoti']; ?>','project_revision')">
                                            <i class="fas fa-ban">
                                            </i>
                                            Inactive
                                           
                                        </a>
                                        <?php }
                                        else
                                        {
                                          ?>
                                          <a class="btn btn-outline-info btn-xs" href="#" onclick="activatemeail('<?php echo $rownt['emailnoti']; ?>','project_revision')">
                                              <i class="fas fa-check-circle">
                                              </i>
                                              Activate
                                             
                                          </a>
                                          <?php

                                        } ?>
                                        </td>
                                        
                                      </tr>
                                      <?php
                                    }	
                                    ?>
                                     
                                    </tbody>
                                  </table>
                          </div>


                       
                          </div>
                          <!-- nuevo div >

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
            <?php
          }?>
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

<script src="plugins/datatables/jquery.dataTables.js"></script>
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="managerusers.js"></script>

</body>
</html>
