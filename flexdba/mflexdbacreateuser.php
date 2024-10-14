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
/// IF ACTIVATE

session_start();
$csrf_token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $csrf_token;




if ($_REQUEST['activate']<>'')
{
  $sanitized_n = filter_var($_REQUEST['activate'], FILTER_SANITIZE_STRING);
  if (filter_var($sanitized_n, FILTER_SANITIZE_STRING)) {
    $v_activate = $_REQUEST['activate'];

    include("db_conectflexbdainit.php"); 
    
    $query_lista = "select * from customers_userewbfas where tokengoogle  ='".$v_activate."' and active ='P' ";		
			


    ///	$query_lista = "select distinct ponumber from orders_sn  ";	
      $return_arr = array();	
      $encontre  =0;
      $data = $connect->query($query_lista)->fetchAll();	
      foreach ($data as $row) {			
      //	array_push($return_arr,  $row[0]);		
      ////	$return_arr[] = array("isfree" => "N");	
        echo "...";
        $encontre  =1;
         $query_lista = "update customers_userewbfas set active = 'Y'  where tokengoogle  ='".$v_activate."' and active ='P' ";		
          $connect->query($query_lista);
       }

       if ($encontre ==1)
       {
         ?>

<link rel="stylesheet" href="toastr.css">
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous">
</script>

        <script src="toastr.min.js"></script>
         <script type="text/javascript">

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
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

function okm()
{
  window.location = 'https://www.flexbda.com/';
}

         toastr["success"]("User Activated...!", "");
         setInterval('okm()',3000);

       

         </script>
         <?php
       }
  }
}


function post_captcha($user_response) {
  $fields_string = '';
  $fields = array(
      'secret' => '___________clave secreta______________',
      'response' => $user_response
  );
  foreach($fields as $key=>$value)
  $fields_string .= $key . '=' . $value . '&';
  $fields_string = rtrim($fields_string, '&');

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
  curl_setopt($ch, CURLOPT_POST, count($fields));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

  $result = curl_exec($ch);
  curl_close($ch);

  return json_decode($result, true);
}

// Agregarmos una variable CaptCha
$res = post_captcha($_POST['g-recaptcha-response']);
// Fin Agregarmos una variable CaptCha

// Comprobamos que el Captcha esté completo
if (!$res['success']) {
        
  $errorCap = '<div class="alert alert-danger" role="alert"><p><strong>Completa el Captcha!</div>';
  }
  // Fin de comprobación Catpcha


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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="mflexdbacreateuser.css">
  
</head>
<body >
<div class="container">
<br><br>

      <div class="row">
  
        <div class="col-12">

  

        <div class="card-body">
              
        <p class="text-left titulogrande">
           <img src="honeywell_logo_300px.png" class="img-fluid" >  
       </p>
       <hr>
             <!-- /.login-logo -->
          <p class="text-center "><b>NEW</b>&nbsp;USER</a></p>
          <hr>
  
          <form action="" id="frmcrtus" method="post" id="form-new-user" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
          <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtnameuserfull" id="txtnameuserfull" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="txtemailtos" id="txtemailtos" onblur="controlar_email()" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtlapwd1" id="txtlapwd1" placeholder="Password: at least one digit, at least one special character (#?!@$%^&*-), 8 in length"" maxlength="8">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
        </div>
        <!-- <Label>- Total 8 characters - at least one uppercase letter - at least one number (digit)</Label> -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtlapwd2" id="txtlapwd2" placeholder="Retype password" maxlength="8">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtcompname" id="txtcompname" placeholder="Company name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-building"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <select id="txtedsdealer" name="txtedsdealer" class="form-control form-control-sm" placeholder="aaa">
													<option value="">Select ESD/Dealer Channel  </option>
                                     
                                                     <option value="NOTIFIER_ESD" >NOTIFIER ESD </option>
                                                     <option value="GAMEWELL_FCI_ESD_ONLY"  >GAMEWELL-FCI ESD ONLY </option>
                                                     <option value="FARENHYT_ESD_ONLY"  >FARENHYT ESD ONLY </option>
                                                     <option value="GAMEWELL_FCI_FARENHYT_DUAL_ESD"  >GAMEWELL-FCI & FARENHYT DUAL ESD </option>
                                                     <option value="HONEYWELL_FIRE_SYSTEMS_CBSI_DEALER"  >HONEYWELL FIRE SYSTEMS CBSI DEALER</option>
                                                     <option value="HONEYWELL_BUILDING_SOLUTIONS"  >HONEYWELL BUILDING SOLUTIONS (HBS)</option>
                                                     <option value="FIPLEX_SI"  >FIPLEX SI</option>

                                                       </select>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-clipboard"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txthoneywellaccnumber" id="txthoneywellaccnumber" placeholder="Honeywell account number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-tag"></span>
            </div>
          </div>
        </div>
       <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" class="micheckbox form-control" id="agreeTerms" name="terms" value="true">
              <label for="agreeTerms">
               I agree to the terms<a href='FLEXBDA_END_USER_AGREEMENT.pdf' target='_blank'> [view]</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
          <div class="g-recaptcha" data-sitekey="6Ldrs-MZAAAAACr_AlJr_9YM_JgsTxZmSJGPko8s"></div>
      
            
          </div>

          <div class="col-12">

          <input type="hidden" class="form-control" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token;?>">

        <br><br>
            <button type="button" name="abc" id="abc" onclick='createuser()' class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
                     
          </form>

            <hr>
            
            
        </div>
       
      </div>


<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="toastr.css">
<!-- Bootstrap 4.5.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- AdminLTE App -->

  <!-- Google Font: Source Sans Pro -->
  <script src="toastr.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script> 
<!-- <script src='mflexdbacreateuser.js'></script> -->
<script type="text/javascript">
function validateEmail(email) {
    ///var emailRegformatoviejo = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var regexMail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    //var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
    return regexMail.test(email);
}

function controlar_email() {
    //console.log($("#txtemailtos").val());

    if ($("#txtemailtos").val() != '') {
        $.ajax({
            url: 'ajax_mirame.php',
            data: "ve=" + $("#txtemailtos").val(),
            type: 'post',
            datatype: 'JSON',
            async: false,
            success: function(data) {
                //console.log(data);
                //console.log(data.isfree);
                if (data.isfree == 1) {
                    toastr["error"](" E-mail already registered", "");
                    $("#txtemailtos").val('');

                }
            }
        });
    }


}



function createuser() {

    /* var v_hhhh = $("#hhhh").val();
 */
    var lettersAndSpaces = /^[a-z][a-z\s]*$/i
    var lettersNoSpaces = /^[A-Za-z]+$/;

    var regexName = /^[a-z][a-z\s]*$/i;
    var regexPass = /^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,8}$/;
    var regexCompany = /[a-zA-Z0-9-_.,& ]+$/;
    var regexESD = /[a-zA-Z_]+$/i;
    var regexHonNo = /[0-9]+$/;

    var hagosubtmit = 'S';
    var v_txtnameuserfull = $('#txtnameuserfull').val();
    if (v_txtnameuserfull == '' || !v_txtnameuserfull.toUpperCase().match(regexName)) {
        hagosubtmit = 'N';
        toastr["error"](" Valid full name is invalid - no special characters", "");
    }
    //
    var v_txtemailtos = $('#txtemailtos').val();
    if (v_txtemailtos == '') {
        hagosubtmit = 'N';
        toastr["error"](" E-mail is required", "");
    }

    if (!validateEmail(v_txtemailtos)) {
        hagosubtmit = 'N';
        toastr["error"](" Wrong e-mail format - Lowercase", "");
    }

    var v_txtlapwd1 = $('#txtlapwd1').val();
    if (v_txtlapwd1 == '' || !v_txtlapwd1.match(regexPass)) {
        hagosubtmit = 'N';
        toastr["error"](" Password invalid - At least one digit, at least one special character (#?!@$%^&*-), 8 in length", "");
    }

    //txthoneywellaccnumber
    var v_txthoneywellaccnumber = $('#txthoneywellaccnumber').val();
    if (v_txthoneywellaccnumber == '' || !v_txthoneywellaccnumber.match(regexHonNo)) {
        hagosubtmit = 'N';
        toastr["error"](" Honeywell account number is required, only numbers", "");
    }

    var v_txtcompname = $('#txtcompname').val();
    if (v_txtcompname == '' || !v_txtcompname.match(regexCompany)) {
        hagosubtmit = 'N';
        toastr["error"](" Company name is required - no special characters", "");
    }


    var v_txtedsdealer = $('#txtedsdealer').val();
    if (v_txtedsdealer == '') {
        hagosubtmit = 'N';
        toastr["error"](" ESD/Dealer Channel  is required", "");
    }

    var v_txtlapwd2 = $('#txtlapwd2').val();
    if (v_txtlapwd1 == v_txtlapwd2) {

        if ($('.micheckbox').prop('checked')) {

        } else {
            hagosubtmit = 'N';
            toastr["error"](" You must accept the terms and conditions", "");
        }

        if (grecaptcha.getResponse() == '') {
            hagosubtmit = 'N';
            toastr["error"]("It should indicate that it is not a robot", "");
        }

        var iiii =String('<?php echo $_SESSION['csrf_token']; ?>');

        if (hagosubtmit == 'S') {

            $("#abc").prop('disabled', true);


            var formData = new FormData(frmcrtus);

            /* if (!iiii || formData.get('hhhh') != iiii) {
                toastr["error"]("Error", "");
                return;
            } */

            var req = new XMLHttpRequest();

            $("#txterror").html('');
            $("#diverror").hide();

            //consulta si devolvio el Scan Device
            //formData.append("v_txtnameuserfull", v_txtnomproj);


            /* formData.append("v_txtnameuserfull", v_txtnameuserfull);
            formData.append("v_txtemailtos", v_txtemailtos);
            formData.append("v_txtlapwd1", v_txtlapwd1);
            formData.append("v_txtlapwd2", v_txtlapwd2);
            formData.append("v_txtcompname", v_txtcompname);
            formData.append("v_txthoneywellaccnumber", v_txthoneywellaccnumber);
            formData.append("v_txtedsdealer", v_txtedsdealer);
            formData.append("v_hhhh", v_hhhh);


            formData.append("v_txttoken", grecaptcha.getResponse()); */

            req.open("POST", "ajax_createuser.php");
            toastr["info"]("Sending information", "");
            req.send(formData);

            req.onload = function() {
                if (req.status == 200) {
                    //console.log(req.response)

                    var datos = JSON.parse(req.response);
                    //console.log(datos.resultiu);
                    /// resolve(JSON.parse(req.response));
                    if (datos.resultiu == 'ok') {
                        $("#form-new-user")[0].reset();
                        toastr["success"]("Registered User", "");



                        ///   window.location = 'listprojects.php';	
                    } else {
                        toastr["error"]("User not registered", "");
                    }


                } else {
                    toastr["error"]("User not registered", "");
                }
            };
        }

    } else {
        toastr["error"](" Passwords must be the same", "");
    }





}
  
</script>
</body>
</html>
