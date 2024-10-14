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
    
	function getPlatform($user_agent) {
   $plataformas = array(
      'Windows 10' => 'Windows NT 10.0+',
      'Windows 8.1' => 'Windows NT 6.3+',
      'Windows 8' => 'Windows NT 6.2+',
      'Windows 7' => 'Windows NT 6.1+',
      'Windows Vista' => 'Windows NT 6.0+',
      'Windows XP' => 'Windows NT 5.1+',
      'Windows 2003' => 'Windows NT 5.2+',
      'Windows' => 'Windows otros',
      'iPhone' => 'iPhone',
      'iPad' => 'iPad',
      'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
      'Mac otros' => 'Macintosh',
      'Android' => 'Android',
      'BlackBerry' => 'BlackBerry',
      'Linux' => 'Linux',
   );
   foreach($plataformas as $plataforma=>$pattern){
      if (preg_match('/(?i)'.$pattern.'/', $user_agent))
         return $plataforma;
   }
   return 'Otras';
}

try{	
  include("db_conectflexbda.php"); 

 $msjlogin="";
	if (isset($_POST['txtuser'])){
		
	//	 include ('licencefiplex_mm.php');
 
	//	 //   $Encryption = new Encryption();
		
  $regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,7}$/i';
  $regePassindex='/^[^\=\'{} \"<>\(\)]+$/';
  $regexlimite='/^.{8,32}$/';
  $valido="0";

  //ASI ESTABA
  //if(!preg_match($regexMail, $_POST['txtuser']) || !preg_match($regePassindex, $_POST['txtpass']) || !preg_match($regexlimite, $_POST['txtpass'])){
  
if(preg_match($regexMail, $_POST['txtuser']) && preg_match($regePassindex, $_POST['txtpass']) && preg_match($regexlimite, $_POST['txtpass'])){
  
  


		$vtxtuser =trim(strtolower ($_POST['txtuser']));  // Valimos x el Email.
		$vtxtpass = trim($_POST['txtpass']);
			session_start();
				// Guardar datos de sesión
			$_SESSION["timeoutflexbda"] = time();
		$script_fnt= " fnt_ifuservalidencryp_flexdba('".$vtxtuser."','".$vtxtpass."')";
		
		$sql = $connect->prepare("SELECT ".$script_fnt);
		$sql->execute();
		$resultado = $sql->fetchAll();
		$valido="0";
		foreach ($resultado as $row) 
		{
        ///BDABDM 
        $msjlogin="";
        $limpioroe = str_replace("(","",$row[0]);
        $limpioroe = str_replace(")","",$row[0]);
        $datosuserfas = explode(",", $limpioroe);
        $valido="1";
     //   echo "a:".$datosuserfas[11];
     //   echo "-b:".$datosuserfas[12];
     //   exit();
      $validadorsmbdabdm ="S";
     if (!filter_var($datosuserfas[11], FILTER_VALIDATE_EMAIL)) {
      //     $mail->addCC($rownt['emailnoti'], $rownt['emailnoti']);
      $validadorsmbdabdm ="N";
       }

       if (!filter_var($datosuserfas[12], FILTER_VALIDATE_EMAIL)) {
        //     $mail->addCC($rownt['emailnoti'], $rownt['emailnoti']);
        $validadorsmbdabdm ="N";
         }


      if ($validadorsmbdabdm =="S" )
      {
       

    
          // Comiendo de la sesión
        
          session_regenerate_id();
          $semilla_seed_business= $datosuserfas[5];
          
          $_SESSION["flexbdaa"] = $datosuserfas[1];  //iduserfas
          $_SESSION["flexbdab"] = $datosuserfas[2]; //username
          $_SESSION["flexbdac"] = str_replace('"',"",$datosuserfas[4]);  //nombre
          $_SESSION["flexbdad"] = $datosuserfas[3]; //email
          $_SESSION["flexbdae"] = $datosuserfas[6]; //tel
          $_SESSION["flexbdaf"] = $datosuserfas[7]; //tel
          
          $_SESSION["flexbdah"] = str_replace('"','',$datosuserfas[9]); //namecustomers
          $_SESSION["flexbdai"] = $datosuserfas[8]; //idcustomer
          $_SESSION["flexesdchandeal"] = $datosuserfas[13]; // esdchanneldealer
          
          
          //development
          if ($datosuserfas[10] =="true"  )
          {
            $_SESSION["flexbdag"] = "develop"; //tipo de usuario	
          }
          else
          {
            $_SESSION["flexbdag"] = $datosuserfas[10] ; //tipo de usuario
            ////$_SESSION["g"] = "develop"; //tipo de usuario	
          }
          
          /////////////////////////////////////////////////////////////////////////////////////
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                 $ipauditar = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                 $ipauditar = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                 $ipauditar = $_SERVER['REMOTE_ADDR'];
            }
            $SO = getPlatform($_SERVER['HTTP_USER_AGENT']);
          //////AUDITAMOS///////////////////////////////////////////////////////////////////////////////
          $vuserfas = $datosuserfas[2]; 
          $vmenufas="FlexDBA:".array_pop(explode('/', $_SERVER['PHP_SELF']));
          $vaccionweb="loginweb FlexDBA";
          $vdescripaudit="loginweb#".$_SERVER['SERVER_ADDR'] ;
          $vtextaudit="conexion#".$ipauditar."#".$SO;
      
  
          
          $sentenciach = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit);");
                  $sentenciach->bindParam(':userfas', $vuserfas);								
                  $sentenciach->bindParam(':menuweb', $vmenufas);
                  $sentenciach->bindParam(':actionweb', $vaccionweb);
                  $sentenciach->bindParam(':descripaudit', $vdescripaudit);
                  $sentenciach->bindParam(':textaudit', $vtextaudit);
                  $sentenciach->execute();
                  
                
          /////////////////////////////////////////////////////////////////////////////////////
          /////////////////////////////////////////////////////////////////////////////////////
          if ($entornoActual == 'TST') {

            // header("Location: https://".$ipservidorapache.$folderservidor."/homeflexbda.php");
            //header("Location: https://".$ipservidorapache.$folderservidor."/testing/homeflexbda.php");
          header("Location: https://".$ipservidorapache.$folderservidor."/testing/homeflexbda.php");
            
        } else if ($entornoActual == 'DEV') {
          header("Location: http://localhost:3000/homeflexbda.php");
            
        } else {
            
          header("Location: https://".$ipservidorapache.$folderservidor."/homeflexbda.php");
        }
          
      }
      else
      {
        session_unset();
        session_destroy();
       $msjlogin="User pending activation by Flexdba";
      }
			
			
			
		}
  }
		if ($valido=="0")
		{
			session_unset();
            session_destroy();
			$msjlogin="The e-mail or password is incorrect";
		}	

		
	}
	
	}catch(PDOException $e){
    echo "ERROR Conect Server: " . $e->getMessage();
	}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="title" content="FLEXBDA">
<meta name="description" content="FlexBDA honeywell">
<meta name="keywords" content="honeywell">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="20 days">
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
  <link rel="stylesheet" href="index.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- OneTrust Cookies Consent Notice start for FLEXBDA  -->

<script type="text/javascript" src=https://cdn.cookielaw.org/consent/86bece82-88ab-46de-a2ab-2c49a5f5d0d4-test/OtAutoBlock.js ></script>

<script src=https://cdn.cookielaw.org/scripttemplates/otSDKStub.js data-document-language="true" type="text/javascript" charset="UTF-8" data-domain-script="86bece82-88ab-46de-a2ab-2c49a5f5d0d4-test" ></script>

<script type="text/javascript">

function OptanonWrapper() { }

</script>

<!-- OneTrust Cookies Consent Notice end for FLEXBDA  -->

<style>
    .footer{

position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
margin-top: 46.5%;
width: 100%;
height: 70px;
color: #000;
}
body {
/* background-image: url("fondositeflexbda2020.jpg"); */
/*background-repeat: no-repeat, repeat;*/
font-family: Arial;
font-size: 14px;
background-image: url('fondositeflexbda2020.jpg');
margin: 0;
margin-bottom: 40px;
}
</style>
</head>
<body  >
<div class="container">
<br>
      <div class="row">
    
        <div class="col-12">

        <div class="row">
    <div class="col-sm-3">
    
    </div>
    <div class="col-sm-6">
    <div class="card-body">
              
             
              <!-- /.login-logo -->
 
           <p class="text-center titulogrande">
           <br>
           <img src="honeywell_logo_300px.png" class="img-fluid" >  
       </p>
           <hr>
             <p class="login-box-msg"><b>Sign in to start your session</b  ></p>
 
          
           <form action="index.php" method="post" id="contactForm" class="needs-validation" required novalidate autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                       <div class="input-group mb-3">
                  
                         <input type="email" id="txtuser" name="txtuser" class="form-control" placeholder="E-mail" required autocomplete="off">
                         <div class="input-group-append">
                           <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                           </div>
                         </div>
                       </div>
                               <div class="input-group mb-3">
                               
                                 <input type="password" id="txtpass" name="txtpass" class="form-control" placeholder="Password" required maxlength="32"  autocomplete="off">
                                   <div class="input-group-append">
                                     <div class="input-group-text">
                                       <span class="fas fa-lock"></span>
                                     </div>
                                   </div>
                               </div>
                                       <div class="row">
                                        
                                         <!-- /.col -->
                                           <div class="col-12">
                                             <button type="submit" class="btn  btn-outline-primary btn-block"><b>Sign In</b></button>
                                           </div>
                                         <!-- /.col -->
                                       </div>
           </form>
        
             <br>
               <div class="row"><br>
            
         <div class="col-12 ">  <p align="center" class="text-danger"><b><?php echo $msjlogin;?></b></p>
         <p align="center"><button type="button" class="btn  btn-outline-primary btn-sm" onclick='recordarpas()'> I forgot my password</button>
         &nbsp;&nbsp;&nbsp;&nbsp;
         <button type="button" class="btn btn-outline-primary btn-sm" onclick='createuser()'> Register a new user</button></p>
       
         </div>
      
       </div>
       <!-- /.social-auth-links -->
    </div>
    <div class="col-sm-3">
   
    </div>
  </div>
<div class="entornoactualdiv" style="visibility: hidden" id="entornoactualdiv" value="<?php echo $entornoActual;?>">
  </div>
       
      </div>
        </div>
     
      </div>


      <footer class="footer">
        <div class="container">
          <div class="row col-12 d-flex justify-content-center">
            
                <p class="mx-4">Copyright © 2022 Honeywell International Inc.</p>
                <a  class="entornoactualdiv mx-4" href="https://www.honeywell.com/us/en/privacy-statement" target="_self">Privacy Statement</a>
                
                <div class="footer-content__bottom-link pl-md-3 ml-md-3">
                  <a class="footer--links__list-item" href="https://honeywellhub.secure.force.com/PrivacyInformationRequestForm?lang=en" target="_blank">Your Privacy Choices</a>
                  <img src="privacyoptions29x14.png"  class="brand-image"  >
                </div>
                
                <a  class="entornoactualdiv mx-4" href="https://www.honeywell.com/us/en/cookie-notice" target="_self">Cookie Notice</a>
                
          </div>
        </div>
      </footer>

  <script  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="index.js"></script>

</body>
</html>
