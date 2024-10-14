<?php

// Desactivar toda notificación de error
error_reporting(0);
// Notificar todos los errores de PHP (ver el registro de cambios)

 include("db_conect_custqr.php"); 
 error_reporting(E_ALL);
 	session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FIPLEX | WEBFAS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('Background-1920x1080.png');


    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:visited {
        background-color: #0053a1;
    }

    .login-page,
    .register-page {
        -ms-flex-align: center;
        align-items: center;
        background-image: url('Background-1920x1080.png');
        background-position: center;
        /* Center the image */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        background-size: cover;
        /* Resize the background image to cover the entire container */
        display: -ms-flexbox;
        display: flex;
        height: 100vh;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .bg-body-tertiary {
        background-color: #ffffff;
    }

    .rounded {
        border-radius: 1.25rem !important;
    }

    .viewport {
        position: relative;
        width: 100%;
        height: 100%;
    }

    #result {
        margin-top: 20px;
    }
    </style>

    <!-- Google Font: Source Sans Pro -->

    <link rel="shortcut icon" href="fiplexcirculo-01.ico" />
</head>

<body class="hold-transition login-page">

    <div class="login-box" id="divlogin" name="divlogin">


        <main class="container">
            <div class="bg-body-tertiary p-4 rounded">

                <div class="container-fluid" id="qr-reader">
                    <p style='font-size:16px;text-align:center'>
                        <img src="Fiplex-EndorsedBrandLogo.png" width="90%">
                        <br>
                        <br>
                        <b>Scan the QR code <br>located in you device.</b>

                        <br>
                        <br>
                       <input class="form-control form-control-sm" type="text" id="txtqrmm1" name="txtqrmm1" placeholder="QR">
					   
                        <br>
                    </p>
                    <p style='font-size:12px;text-align:center'>
					If you don't have a QR code reader <a href="index.php" >click here</a></p>




                </div>
        </main>

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

        <link href="toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <script src="toastr/toastr.min.js"></script>
        <script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js">
        </script>
        <script src="html5-qrcode.min.js"></script>
        <script type="text/javascript">
        /*
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
         
        }
        form.classList.add('was-validated');
        validaruser();
    
      }, false);
    });
  }, false);

*/
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-center",
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

        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }
 
        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    ///   console.log(`Scan result = ${decodedText}`, decodedResult);

                    // resultContainer.innerHTML += '<div>[${countResults}] - ${decodedText}</div>';

                    // Optional: To close the QR code scannign after the result is found
                    html5QrcodeScanner.clear();
                }
            }

            // Optional callback for error, can be ignored.
            function onScanError(qrCodeError) {
                // This callback would be called in case of qr code scan error or setup error.
                // You can avoid this callback completely, as it can be very verbose in nature.
            }


        });  

function habilitameqrmanual()
{
}

const txtQrmm1 = document.getElementById('txtqrmm1');

txtQrmm1.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    const value = txtQrmm1.value; // Get the value (text content) of the text box
    if (value.substring(0,35) == "https://www.flexbda.com/customersqr") {
		//console.log("The string is present in the input field:" + value.substring(0,35));
		     window.location.href = value; 
    } else {
      console.log("The string is not present in the input field" + value.substring(0,35));
    }
  } 
}); 

        function readqrmm() {

            docReady(function() {
                var resultContainer = document.getElementById('qr-reader-results');
                var lastResult, countResults = 0;

                var html5QrcodeScanner = new Html5QrcodeScanner(
                    "qr-reader", {
                        fps: 10,
                        qrbox: 250
                    });

                function onScanSuccess(decodedText, decodedResult) {
                    ///alert(decodedText);
                    if (decodedText !== lastResult) {

                        //divlogin
                        var divlogin = document.getElementById("divlogin");
                        divlogin.classList.add("d-none");

                        ++countResults;
                        lastResult = decodedText;
                        console.log('Scan result = ${decodedText}', decodedResult);
                      //  window.location.href = decodedText;
					   window.location.href = 'https://www.flexbda.com/customersqr/home.php';
                        ///   resultContainer.innerHTML += `<div>[${countResults}] - ${decodedText}</div>`;

                        // Optional: To close the QR code scannign after the result is found
                        html5QrcodeScanner.clear();
                    }
                }

                // Optional callback for error, can be ignored.
                function onScanError(qrCodeError) {
                    // This callback would be called in case of qr code scan error or setup error.
                    // You can avoid this callback completely, as it can be very verbose in nature.
                }

                html5QrcodeScanner.render(onScanSuccess, onScanError);
            });
        }
        </script>
		
		<?php
	/////////////////////////////////////////////////////////////////////////////////////
				//////AUDITAMOS///////////////////////////////////////////////////////////////////////////////
				$vuserfas = $_SESSION["b"];

				$vmenufas=array_pop(explode('/', $_SERVER['PHP_SELF']));
				$vaccionweb="visitweb";
					$vdescripaudit="visitweb#".$_COOKIE['PHPSESSID'];
				$vtextaudit="".$_SERVER['HTTP_TRUE_CLIENT_IP']."-".$_SERVER['HTTP_SEC_CH_UA_PLATFORM']."-".$_SERVER['HTTP_USER_AGENT']."-".$_SERVER['REQUEST_TIME'];
				
				$sentenciach = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit,idauditweb)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit, (select max(idauditweb)+1 from auditwebfas));");
								$sentenciach->bindParam(':userfas', $vuserfas);								
								$sentenciach->bindParam(':menuweb', $vmenufas);
								$sentenciach->bindParam(':actionweb', $vaccionweb);
								$sentenciach->bindParam(':descripaudit', $vdescripaudit);
								$sentenciach->bindParam(':textaudit', $vtextaudit);
								$sentenciach->execute();
								
						
				/////////////////////////////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////////////////////////////
			//	$reqmm = array("animal"=>"perro", "animal"=>"gato", "animal"=>"elefante");
			//	echo json_encode($reqmm);
			//	$reqmm="";
?>



<input type="hidden"  name="idreqmm" id="idreqmm" value="<?php echo $reqmm;?>">
</body>

</html>
