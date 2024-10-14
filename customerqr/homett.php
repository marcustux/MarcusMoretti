<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HONEYWELL CUSTOMERS WEBFAS</title>
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
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('Background Gray-1920x1080.png');
        background-position: center;
        /* Center the image */

        /* Do not repeat the image */
        background-size: cover;
        /* Resize the background image to cover the entire container */
        display: -ms-flexbox;
        display: flex;
    }

    .btn-primary,
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:visited {
        background-color: #0053a1;
    }

    .colornaranajafiplex {

        color: #f39323;
    }


    .colornaranajafiplexdescr {
        font-size: 12px;
        color: gray;
    }

    .colorazulfiplex {

        color: #0053a1;
    }

    .colorazulfiplexyfondoamarillo {

        color: #0053a1;
        background-color: #ffe65d;
    }

    .card-header {
        background-color: transparent;
        border-bottom: 5px solid;
        border-color: #0053a1;
        padding: .75rem 1.25rem;
        position: relative;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }

    .card-header2 {
        background-color: transparent;
        padding: .75rem 1.25rem;
        position: relative;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }



    .bg-info {
        background-color: #0053a1 !important;
    }

    .bg-success,
    .bg-success>a {
        background-color: #2da943 !important;
    }

    .bg-warning,
    .bg-warning>a {
        background-color: #ed2d22 !important;
    }


    .h4,
    h4 {
        font-size: 14px;
    }

    .small-box p {
        font-size: 12px;
    }

    .small-box>.small-box-footer {
        background: rgba(0, 0, 0, .1);
        color: rgba(255, 255, 255, .8);
        display: block;
        padding: 3px 0;
        position: relative;
        text-align: center;
        text-decoration: none;
        font-size: 12px;
        z-index: 10;
    }

    img {
        vertical-align: middle;
        margin-left: -30px;
        border-style: none;
    }

    .jumbotron {
        padding: 2rem 7rem;
        margin-bottom: 2rem;
        background-color: transparent;
        border-radius: .3rem;
    }

    .card-title {
        float: left;
        font-size: 14px;
        font-weight: 400;
        margin: 0;
    }

    .bg-warning,
    .bg-warning>a {
        color: #ffffff !important;
    }

    .small-box>.inner {
        padding: 10px;
        font-weight: bolder;
    }

    .h4,
    h4 {
        font-size: 13px;
        font-weight: bolder;
    }
    </style>

    <!-- Google Font: Source Sans Pro 
https://coolors.co/palettes/popular/0053a1
ed2d22 - rojo
55aaff - celestito
85e581 - verde
f1f1e6 - gris
-->

    <link rel="shortcut icon" href="fiplexcirculo-01.ico" />
</head>

<?php

 
include("db_conect_custqr.php"); 
 
session_start();
 
 $sanitized_sn = filter_var($_REQUEST['sn'], FILTER_SANITIZE_STRING);
 $sanitized_mkey = filter_var($_REQUEST['mkey'], FILTER_SANITIZE_EMAIL);
$sn=  $sanitized_sn;

 $_band0key =""; 
 $_band1key="";
 $_maxpwrkey="";
 $_classkey="";
 $_qrcustomer="";
 $_v_idsosn="";
 $_v_skuso="";
 $_v_sku="";
 $_v_skudescrip="";
 $_v_file_pfoms="";
 $v_file_fcs="";
 $_v_file_um="";
 $_v_sn="";
 $v_validandinfo="no";
 
 //// llamamos al primer CURL. para enviar a validar datos..
 
 $rstmm = $connect->prepare("SELECT * from fnt_get_sninfo_qrcustomer_json_planb('".$sanitized_sn."','".$sanitized_mkey."');  ");
   //echo "SELECT * from fnt_get_sninfo_qrcustomer_json_planb('".$sanitized_sn."','".$sanitized_mkey."');  ";
  
   //   echo "SELECT * from fnt_get_sninfo_qrcustomer_json('".$sn."')";
					$rstmm->execute();
					$resultado = $rstmm->fetchAll();		
					
					foreach ($resultado as $rowheaders) 
					{
						 



        $jsonoutcome_data = [];
        $jsonoutcome_data[] = array("type"=>1, "category"=>19, "v_string"=> $vREQUEST_TIME);
        $jsonoutcome_data[] = array("type"=>2, "category"=>19, "v_string"=> $vREMOTE_ADDR );
        $jsonoutcome_data[] = array("type"=>3, "category"=>19, "v_string"=> $vHTTP_USER_AGENT);
        $jsonoutcome_data[] = array("type"=>4, "category"=>19, "v_string"=> $sanitized_sn);
        $jsonoutcome_data[] = array("type"=>5, "category"=>19, "v_string"=> $sanitized_mkey);
     	$reqmm = array(  "sn"=>$sanitized_sn,  "mkey"=>$sanitized_mkey  );
	//	$reqmm = array("user"=>"marcousuer", "password"=>"lapass", "sn"=>$sanitized_sn,  "mkey"=>$sanitized_mkey,"outcome_data"=>$jsonoutcome_data );
	//	echo "<hr>";
    //    echo json_encode($reqmm);  
	//	echo "<hr>aaaaaaaaaaaaaaaaaaa";
			//	$reqmm="";
 
$url = "http://localhost:9999/request_data";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // Set request method to POST
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($reqmm)); // Set JSON data as POST fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

// Set header for content type
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
  //echo 'Response: ' . $response;
		//$phpValue2 = new Data($response->result->j);
	 	$phpValue2m= json_decode($response,true );
		
		/*
		foreach ($phpValue2m['links'] as $key => $value) {
			  echo " - Key: $key\n";
			  echo "   - Filename: " . $value['filename'] . "\n";
			  echo "   - Repository: " . $value['repository'] . "\n<br>";
		}
		
		foreach ($phpValue2m['result']['j'] as $key => $value) {
			  echo " - Key: $key - $value <br>";
			 // echo "   - Filename: " . $value  . "\n"; 
		}
	*/

		$phpValue2 = $phpValue2m['result']['j'];
		$phpValue2files = $phpValue2m['links'];

//echo "aaaaaaaaaaaaaaaaaaaaaaaa.".$phpValue2['band0key']."bbbbbbb";
							$_v_sn=$phpValue2['sn'];
							$_band0key =$phpValue2['band0key'];
							$_band1key=$phpValue2['band1ey'];
							$_maxpwrkey=$phpValue2['maxpwrkey'];
							$_classkey=$phpValue2['classkey'];
							$_qrcustomer=$phpValue2['qrcustomer'];
							$_v_idsosn=$phpValue2['v_idsosn'];
							$_v_skuso=$phpValue2['v_skuso'];
							$_v_sku=$phpValue2['v_sku'];
							$_v_skudescrip=$phpValue2['v_skudescrip'];
							
					//		echo "a.....".$phpValue2files['v_file_fcs_download']['filename']."bbb";
							$_v_file_pfoms=$phpValue2files['v_file_pfoms_download']['filename'];							
							$v_file_fcs=$phpValue2files['v_file_fcs_download']['filename'];
							$_v_file_um=$phpValue2files['v_file_um_download']['filename'];
						//	$_v_file_um='LS10267-000-E_C.pdf'; 
							$v_validandinfo="yes";
							
							$_v_file_pfoms="";  
							$_v_file_pfoms="";
}

curl_close($ch);	 
            
			
			
					 
						 
						
 
						 
					
					 
					
					}
					
					if (  $v_validandinfo=="no")
					{
					//	echo "HOLAAA".$v_validandinfo ;
						?>

<body class="container">
    <br>


    <style>
    .imgmarco {
        vertical-align: middle;
        margin-left: 10px;
        border-style: none;
    }
    </style>
    <!-- /.init mobile  -->
    <div class="div">
        <br>
        <div class="container ">
            <img src="Fiplex-EndorsedBrandLogo.png" class="imgmarco" width="30%">
            <br><br><br>
            <p style='font-size:14px; text-align: right;;margin-top:-105px' class='colorazulfiplex'><b>HONEYWELL
                    CUSTOMERS<br> WEBFAS </b>
                <br>
            <p style='font-size:14px; text-align: right;color:red'>the scanned qr code does not correspond to a company.
                SN.
            </p>
            </p>
        </div>
    </div>
</body>
<?php
					 exit();

					}
 
					 				
?>
<!-- /.init   
<div class="d-none d-xl-block">solo cuando es grande</div>
<div class="d-xl-none">muestro en pequiño</div>
 -->

<body class="container">
    <br>

    <!-- /.init mobile  -->
    <div class="d-xl-none">

        <div class=" ">
            <img src="Fiplex-EndorsedBrandLogo.png" width="50%">
            <br><br>
            <p style='font-size:14px; text-align: right;;margin-top:-105px' class='colorazulfiplex'><b>HONEYWELL
                    CUSTOMERS<br> WEBFAS </b>
            <p style='font-size:12px; text-align: right'> <b>SKU: </b> <?php echo $_v_sku; ?> </p>
            </p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <br>
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4>Device</h4>

                        <p>Information</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a href="#" onclick="view_tabcel(11)" class="small-box-footer">View <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <br>
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4>Available</h4>

                        <p>Software</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-archive"></i>
                    </div>
                    <a href="#" onclick="view_tabcel(12)" class="small-box-footer">Download <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <br>
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4>Device</h4>

                        <p>Manual</p>
                    </div>

                    <div class="icon">
                        <i class="ion ion-ios-paper-outline"></i>
                    </div>
                    <a href="#" onclick="view_tabcel(13)" class="small-box-footer">Download <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <br>
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h4>Licences</h4>

                        <p>&nbsp; </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-lock-combination"></i>
                    </div>

                    <a href="#" onclick="view_tabcel(14)" class="small-box-footer"> &nbsp; </a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- /.init detalle mobile  -->

        <div class="card  " id="tabinfocel2" name="tabinfocel2">
            <div class="card-header2 ui-sortable-handle bg-info" style="cursor: move;">
                <h3 class="card-title">
                    <i class="ion ion-clipboard"></i>
                    Device Information
                </h3>
                <div class="card-tools">

                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">

                    <div class="col-sm-8 invoice-col">

                        <address>
                            <p style="font-size:12px">
                                <strong>SKU<span class="colorazulfiplex"> <?php echo $_v_sku; ?></span> </strong> ||
                                <strong>SN<span class="colorazulfiplex"> <?php echo $_v_sn ; ?></span></strong> ||
                                <strong>SO<span class="colorazulfiplex"> <?php echo $_v_skuso; ?></span><br></strong>
                                <br>
                                <span class="colornaranajafiplexdescr">
                                    <?php echo $_v_skudescrip ; ?></span>
                        </address>
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">

                        <br>

                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div><!-- /.card-body -->


        <div class="card d-none" id="tabsoftcel" name="tabsoftcel">
            <div class="card-header2 ui-sortable-handle bg-success" style="cursor: move;">
                <h3 class="card-title">
                    <i class="ion ion-android-archive"></i>
                    Software
                </h3>
                <div class="card-tools">

                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-content p-0">

                        <div class="col-sm-12 invoice-col">


                            <div class="container">
                                <div class="row  ">
                                    <div class="col   ">
                                        <div class="container">
                                            <p style="font-size:12px">
                                                <b>Fiplex Control Software (FCS)</b>
                                            </p>

                                            <p style="font-size:11px">
                                                FCS is used with our Digital Filtering family of devices.
                                                <br>
                                                Once installed in a laptop, you connect to the device via USB to view
                                                its status and/or configure it.
                                                <br><br>
												<?PHP 
												 
												if ($v_file_fcs<> "") {
													
												?>
                                                <a href="https://www.fiplex.com/poms/FiplexControlSoftware.zip"
                                                    target="_blank" class="btn btn-outline-dark btn-sm ">
                                                    <i class="ion ion-android-archive"></i> DOWNLOAD: Fiplex Control
                                                    Software</a>
													<?PHP 
													
												}
												else
												{
													echo " <br><b>Not available for this product</b>";
												}
												?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col align-items-right">
                                        <p align="center">
                                            <img src="FCS.avif" width="100%">
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row  ">
                                    <div class="col   ">
                                        <div class="container">
										<?PHP 
												
												if ($_v_file_pfoms<> "") {
													
												?>
                                            <p style="font-size:12px">
                                                <b>pFOMS</b>
                                            </p>

                                            <p style="font-size:11px">
                                                pFOMS is a Fiplex software that allows users to access Fiplex devices
                                                on-site.
                                                <br><br>
                                                When installed in a laptop that is directly connected to the device via
                                                USB, it allows the user to make any adjustments.
                                                <br><br>
                                                The screen updates within seconds to reflect the adjustments made to the
                                                Fiplex Signal Boosters on-site.
                                                <br><br>
                                                Minimum System Requirements
                                                <br><br>

                                                Processor: Intel i3 or equivalent<br>
                                                Memory: 512 MB RAM<br>
                                                Disk Space: 50 MB<br>
                                                Operating Systems: Windows Vista, 7, 8 &10.<br>
                                                <br><br>
                                                <a href="https://www.fiplex.com/poms/FiplexPomsInstaller.zip"
                                                    target="_blank" class="btn btn-outline-dark btn-sm ">
                                                    <i class="ion ion-android-archive"></i> DOWNLOAD: pFOMS</a>
                                            </p>
												<?php } ?>
                                        </div>
                                    </div>
                                    <div class="col align-items-right">
                                        <p align="center">
										<?PHP 
												
												if ($_v_file_pfoms<> "") {
													
												?>
                                            <img src="pfomsqr.PNG" width="100%">
											<?php } ?>
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>

        </div>


        <div class="card d-none " id="tabmanualcel" name="tabmanualcel">
            <div class="card-header2 ui-sortable-handle bg-warning" style="cursor: move;">
                <h3 class="card-title">
                    <i class="ion ion-ios-paper-outline"></i>
                    Manual
                </h3>
                <div class="card-tools">

                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-content p-0">

                        <div class="col-sm-8 invoice-col">

                            <address>
                                <p style="font-size:12px">
                                    <strong>SKU<span class="colorazulfiplex"> <?php echo  $_v_sku; ?></span> </strong>||
                                    <?php echo $_v_file_um; ?> <br>
                                </p>

                                <div class=" ">


                                    <a href="manuals/<?php echo $_v_file_um; ?>.pdf" target="_blank"
                                        class="btn btn-outline-dark btn-sm "> <i class="ion ion-android-archive"></i>
                                        View and Download</a>
                                </div>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                            <br>

                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>


        <div class="card d-none" id="tabreportcel" name="tabreportcel">
            <div class="card-header2 ui-sortable-handle bg-secondary" style="cursor: move;">
                <h3 class="card-title">
                    <i class="ion ion-ios-paper-outline"></i>
                    Licences
                </h3>
                <div class="card-tools">

                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-content p-0">

                        <div class="col-sm-8 invoice-col">

                            <address>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                            <br>

                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>


        <!-- /.end detalle mobile  -->

    </div>
    <!-- /.end mobile  -->
    <!-- /.init desktop  -->
    <div class="d-none d-xl-block ">
        <div class="jumbotron ">

            <div class="">


                <img src="Fiplex-EndorsedBrandLogo.png" width="25%">
                <br><br>
                <p style=' text-align: right;;margin-top:-115px' class='colorazulfiplex'><b>HONEYWELL CUSTOMERS WEBFAS
                    </b>
                <p style=' text-align: right'> <b>SKU: </b> <?php echo $_v_sku; ?> </p>
                </p>


            </div>


            <div class="row  ">
                <br>

                <?php
  if ($_REQUEST['d'] <>"20126006FU002CA8D9EA003A0C2F7F001D01E36D003AC525290010B8C965002830EA961523")
  {

  
  
  ?>
                <div class="col-lg-3 col-6">
                    <br>
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>Device</h4>

                            <p>Information</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a href="#" onclick="view_tab(1)" class="small-box-footer">View <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <br>
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>Available</h4>

                            <p>Software</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-archive"></i>
                        </div>
                        <a href="#" onclick="view_tab(2)" class="small-box-footer">Download <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <br>
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>Device</h4>

                            <p>Manual</p>
                        </div>

                        <div class="icon">
                            <i class="ion ion-ios-paper-outline"></i>
                        </div>
                        <a href="#" onclick="view_tab(3)" class="small-box-footer">Download <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <br>
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h4>Licences</h4>

                            <p>&nbsp; </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-lock-combination"></i>
                        </div>

                        <a href="#" onclick="view_tab(4)" class="small-box-footer"> &nbsp; </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


            <?php 
   
  }
  else
  {
   echo "<p style='color:red'>The information read does not correspond to any equipment provided by FIPLEX by HONEYWEEL....</p><br><br> ";
   
  }
   ?>




            <div class="card  " id="tabinfo2" name="tabinfo2">
                <div class="card-header2 ui-sortable-handle bg-info" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="ion ion-clipboard"></i>
                        Device Information
                    </h3>
                    <div class="card-tools">

                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">

                        <div class="col-sm-8 invoice-col">

                            <address>
                                <p style="font-size:12px">
                                    <strong>SKU<span class="colorazulfiplex"> <?php echo $_v_sku; ?></span> </strong> ||
                                    <strong>SN<span class="colorazulfiplex"> <?php echo $_v_sn ; ?></span></strong> ||
                                    <strong>SO<span class="colorazulfiplex">
                                            <?php echo $_v_skuso; ?></span><br></strong>
                                    <br>
                                    <span class="colornaranajafiplexdescr">
                                        <?php echo $_v_skudescrip ; ?></span>
                            </address>
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                            <br>

                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div><!-- /.card-body -->


            <div class="card d-none" id="tabsoft" name="tabsoft">
                <div class="card-header2 ui-sortable-handle bg-success" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="ion ion-android-archive"></i>
                        Software
                    </h3>
                    <div class="card-tools">

                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-content p-0">

                            <div class="col-sm-12 invoice-col">


                                <div class="container">
                                    <div class="row  ">
                                        <div class="col   ">
                                            <div class="container">
                                                <p style="font-size:12px">
                                                    <b>Fiplex Control Software (FCS)</b>
                                                </p>

                                                <p style="font-size:11px">
                                                    FCS is used with our Digital Filtering family of devices.
                                                    <br>
                                                    Once installed in a laptop, you connect to the device via USB to
                                                    view its status and/or configure it.
                                                    <br><br>
                                                   
														
														<?PHP 
												 
												if ($v_file_fcs<> "") {
													
												?>
                                                <a href="https://www.fiplex.com/poms/FiplexControlSoftware.zip"
                                                    target="_blank" class="btn btn-outline-dark btn-sm ">
                                                    <i class="ion ion-android-archive"></i> DOWNLOAD: Fiplex Control
                                                    Software</a>
													<?PHP 
													
												}
												else
												{
													echo " <br><b>Not available for this product</b>";
												}
												?>
												
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col align-items-right">

                                            <img src="FCS.avif" width="100%">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row  ">
                                        <div class="col   ">
                                            <div class="container">
												<?PHP 
												
												if ($_v_file_pfoms<> "") {
													
												?>
												
                                                <p style="font-size:12px">
                                                    <b>pFOMS</b>
                                                </p>

                                                <p style="font-size:11px">
                                                    pFOMS is a Fiplex software that allows users to access Fiplex
                                                    devices on-site.
                                                    <br><br>
                                                    When installed in a laptop that is directly connected to the device
                                                    via USB, it allows the user to make any adjustments.
                                                    <br><br>
                                                    The screen updates within seconds to reflect the adjustments made to
                                                    the Fiplex Signal Boosters on-site.
                                                    <br><br>
                                                    Minimum System Requirements
                                                    <br><br>

                                                    Processor: Intel i3 or equivalent<br>
                                                    Memory: 512 MB RAM<br>
                                                    Disk Space: 50 MB<br>
                                                    Operating Systems: Windows Vista, 7, 8 &10.<br>
                                                    <br><br>
                                                    <a href="https://www.fiplex.com/poms/FiplexPomsInstaller.zip"
                                                        target="_blank" class="btn btn-outline-dark btn-sm ">
                                                        <i class="ion ion-android-archive"></i> DOWNLOAD: pFOMS</a>
														
															<?PHP 
												
													}
												?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col align-items-right">
<?PHP 
												
												if ($_v_file_pfoms<> "") {
													
												?>
                                            <img src="pfomsqr.PNG" width="100%">
											<?PHP 
												
													}
												?>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>

            </div>


            <div class="card d-none " id="tabmanual" name="tabmanual">
                <div class="card-header2 ui-sortable-handle bg-warning" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="ion ion-ios-paper-outline"></i>
                        Manual
                    </h3>
                    <div class="card-tools">

                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-content p-0">

                            <div class="col-sm-8 invoice-col">

                                <address>
                                    <p style="font-size:12px">
                                        <strong>SKU<span class="colorazulfiplex"><?php echo $_v_sku; ?></span>
                                        </strong>|| <?php echo $_v_file_um; ?> <br>
                                    </p>

                                    <div class=" ">


                                        <a href="manuals/<?php echo $_v_file_um; ?>" target="_blank"
                                            class="btn btn-outline-dark btn-sm "> <i
                                                class="ion ion-android-archive"></i> View and Download</a>
                                    </div>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                                <br>

                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>


            <div class="card d-none" id="tabreport" name="tabreport">
                <div class="card-header2 ui-sortable-handle bg-secondary" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="ion ion-ios-paper-outline"></i>
                        Licences
                    </h3>
                    <div class="card-tools">

                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-content p-0">

                            <div class="col-sm-8 invoice-col">

                                <address>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                                <br>

                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>






        </div>
    </div>
    <!-- /.end desktop  -->

    </form>



    <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>


    <script type="text/javascript">
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



    function view_tabcel(idtab) {



     //   var elementtabinfocel = document.getElementById("tabinfocel");
        var elementtabsoftcel = document.getElementById("tabsoftcel");
        var elementtabmanualcel = document.getElementById("tabmanualcel");
        var elementtabreportcel = document.getElementById("tabreportcel");



       // elementtabinfocel.classList.add("d-none");
        elementtabsoftcel.classList.add("d-none");
        elementtabmanualcel.classList.add("d-none");
        elementtabreportcel.classList.add("d-none");



        if (idtab == 11) {
      //      elementtabinfocel.classList.remove("d-none");
        }
        if (idtab == 12) {
            elementtabsoftcel.classList.remove("d-none");
        }
        if (idtab == 13) {
            elementtabmanualcel.classList.remove("d-none");
        }
        if (idtab == 14) {
            elementtabreportcel.classList.remove("d-none");
        }

    }

    function view_tab(idtab) {

      //  var elementtabinfo = document.getElementById("tabinfo");
        var elementtabsoft = document.getElementById("tabsoft");
        var elementtabmanual = document.getElementById("tabmanual");
        var elementtabreport = document.getElementById("tabreport");



    //    elementtabinfo.classList.add("d-none");
        elementtabsoft.classList.add("d-none");
        elementtabmanual.classList.add("d-none");
        elementtabreport.classList.add("d-none");



        if (idtab == 1) {
   //         elementtabinfo.classList.remove("d-none");
        }
        if (idtab == 2) {
            elementtabsoft.classList.remove("d-none");
        }
        if (idtab == 3) {
            elementtabmanual.classList.remove("d-none");
        }
        if (idtab == 4) {
            elementtabreport.classList.remove("d-none");
        }

    }

    function validaruser() {
        if ($("#txtuser").val() != '' && $("#txtpass").val()) {
            document.forms[0].submit();
        }
    }
    </script>
</body>

</html>