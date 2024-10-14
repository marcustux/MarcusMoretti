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

   $csrf_token = md5(uniqid(rand(), true));
   $_SESSION['csrf_token'] = $csrf_token;
 

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

  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/changepassuser.css">

  
</head>


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
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password </li>
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

        <div class="col-8">
        
        <div class="card card-primary">
            
              <!-- /.card-header -->
              <!-- form start -->
              <form id='frmchgpass' role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Current Password</label>
                    <input type="password" class="form-control" id="ccpass" name="ccpass" placeholder="Current Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="cc1pass"  name="cc1pass" placeholder="New Password - At least one digit, at least one special character (#?!@$%^&*-), 8 in length">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Verify Password</label>
                    <input type="password" class="form-control" id="cc2pass" name="cc2pass" placeholder="Verify Password">
                  </div>
                  <input type="hidden" class="form-control" id="iduu" name="iduu" value="<?php echo 	$_SESSION["flexbdaa"];?>">
                </div>
                <!-- /.card-body -->
                <input type="hidden" class="form-control" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token;?>">
                <div class="card-footer">
                  <button type="button" onclick="changepass()" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
       
            </div>
   
          
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
  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<link rel="stylesheet" href="toastr.css">
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4.5.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- <script src="changepassuser.js"></script> -->
<script type="text/javascript">

function VerificarPass(pass1, pass2){
  verPass =0;
  if(pass1 == pass2){
    verPass= 1;
  }
  return verPass;
}


function changepass() {
    var hagosubtmit = 'S';
    var regePassEx = '^[^\=\'{} \"<>\(\)]+$';
    //var regexlimite= '^.{8,32}$';
    var regexPass = '^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$';

    

    if (!$("#ccpass").val().match(regePassEx) || $("#ccpass").val().length < 8 || $("#ccpass").val().length > 32) {
        hagosubtmit = 'N';
        toastr["error"](" Current Password is wrong", "");
    }

    if (!$("#cc1pass").val().match(regexPass) || !$("#cc2pass").val().match(regexPass)) {
        hagosubtmit = 'N';
        toastr["error"]("Password invalid - At least one digit, at least one special character (#?!@$%^&*-), 8 in length", "");
    }

/*     var v_idcc = $("#ccpass").val();
    var v_idcc1 = $("#cc1pass").val();
    var v_idcc2 = $("#cc2pass").val();
    var v_iduu = $("#iduu").val();
    var v_hhhh = $("#hhhh").val(); */


    ;
    //   var v_idcc = $("#ccpass").val();
    //   var v_idcc1 =$("#cc1pass").val();
    //   var v_idcc2 = $("#cc2pass").val();

    //   var v_iduu = $("#iduu").val();

    // var hagosubtmit ='S';
    // if (v_idcc =='') { hagosubtmit = 'N';  toastr["error"](" Current Password is required", "");}
    // if (v_idcc1 =='') { hagosubtmit = 'N';  toastr["error"]("New Password is required", "");}
    // if (v_idcc2 =='') { hagosubtmit = 'N';  toastr["error"]("Verify Password is required", "");}
    verPass=VerificarPass($('#cc1pass').val(),$('#cc2pass').val());
 
    var iiii =String('<?php echo $_SESSION['csrf_token']; ?>');
/* console.log($_SESSION['csrf_token'] +'   ');
console.log(iiii); */
/* var iiii = 'caca'; */

    if (hagosubtmit == 'S') {
        if (verPass==1) {
          
          const form =document.querySelector('#frmchgpass');
          //var token = document.forms[formId].getElementsByTagName("frmchgpass");
          
            return new Promise(function(resolve, reject) {
                    var formData = new FormData(form);
                    if (!iiii || formData.get('csrf_token') != iiii) {
                       /* toastr["error"]("Error", ""); */
                      /* reject(); */

                      window.location = 'error.php';
                    }
                    
                    var req = new XMLHttpRequest();


                    //consulta si devolvio el Scan Device
                   /*  formData.append("v_iduu", v_iduu);
                    formData.append("v_idcc", v_idcc);
                    formData.append("v_idcc1", v_idcc1);
                    formData.append("v_idcc2", v_idcc2);
                    formData.append("v_hhhh", v_hhhh); */



                    req.open("POST", "ajax_changepassuser.php");
                    toastr["info"]("Sending information", "");
                    req.send(formData);

                    req.onload = function() {
                        if (req.status == 200) {
                            //console.log(req.response)

                            var datos = JSON.parse(req.response);
                            //console.log(datos.resultiu);
                            /// resolve(JSON.parse(req.response));
                            if (datos.resultiu == 'ok') {
                                toastr["success"]("Password changed", "");

                                window.location = 'homeflexbda.php';
                            } else {
                                toastr["error"]("Error, password not changed", "");
                            }


                        } else {
                            reject();
                        }
                    };


                })
                ///fin enviamos crear presup

        } else {
            toastr["error"]("passwords are not the same", "");
        }
    } else {
        toastr["error"]("Error,incomplete information", "");
    }

}
</script>
</body>
</html>
