<?php
// Desactivar toda notificación de error
error_reporting(0);

	include("db_conectflexbda.php"); 
	header('Content-Type: application/json');
	
    session_start();
     $return_result_insert="noaction";

  
     $vvidproject = $_REQUEST['v_idproject'];
     $v_idprojectr = $_REQUEST['v_idprojectr'];
     $v_idprojectrold = $_REQUEST['v_idprojectr'];
     $v_txtfliaprod = $_REQUEST['txtfliaprod'];


//      function validateDate($date, $format = 'Y-m-d H:i:s')
// {
//     $d = DateTime::createFromFormat($format, $date);
//     return $d && $d->format($format) == $date;
// }

     
	$v_txtnomprojdb= $_REQUEST['v_txtnomprojdb'];
    $v_txtaddressbuild = $_REQUEST['v_txtaddressbuild'];
    if ($v_txtaddressbuild=="")
    {
        $v_txtaddressbuild=null;
    }


   

    $v_stateproj = $_REQUEST['v_stateproj'];
    $v_stateproj_foremails = $_REQUEST['v_stateproj'];

    $v_txtcoordinateslat = $_REQUEST['v_txtcoordinateslat'];
    if ($v_txtcoordinateslat=="")
    {
        $v_txtcoordinateslat=null;
    }
    $v_txtcoordinateslon = $_REQUEST['v_txtcoordinateslon'];
    if ($v_txtcoordinateslon=="")
    {
        $v_txtcoordinateslon=null;
    }

  
    $v_txtfloortype1count = $_REQUEST['v_txtfloortype1count'];
    if ($v_txtfloortype1count=="")
    {
        $v_txtfloortype1count=null;
    }

    $v_txtfloortype1countavg = str_replace (',','',$_REQUEST['v_txtfloortype1countavg']);
    if ($v_txtfloortype1countavg=="")
    {
        $v_txtfloortype1countavg=null;
    }

    $v_txtfloortype1countselect = $_REQUEST['v_txtfloortype1countselect'];
    $v_txtfloortype2count=0;
    $v_txtfloortype2countavg=0;

  

    if  ($v_txtfloortype1countselect==2)
    {
        $v_txtfloortype2count = $_REQUEST['v_txtfloortype2count'];
        $v_txtfloortype2countavg = str_replace (',','',$_REQUEST['v_txtfloortype2countavg']);
    //    $v_txtfloortype2countavg = $_REQUEST['v_txtfloortype2countavg'];
    }
   
    //LC
    $v_txttotalnumberofloors = $_REQUEST['v_txttotalnumberofloors'];
    $v_txttotalnumberofloors = str_replace (',','',$_REQUEST['v_txttotalnumberofloors']);

    if ($v_txttotalnumberofloors=="")
    {
        $v_txttotalnumberofloors=null;
    }
    ///////////////////////////////////////////////////////

    $v_avgfloorheight = $_REQUEST['v_avgfloorheight'];
    $v_avgfloorheight = str_replace (',','',$_REQUEST['v_avgfloorheight']);

    if ($v_avgfloorheight=="")
    {
        $v_avgfloorheight=null;
    }

    $v_txtrfenvironment = $_REQUEST['v_txtrfenvironment'];
    if ($v_txtrfenvironment=="")
    {
        $v_txtrfenvironment=null;
    }

   $v_txtfloortype1countselect =  $_REQUEST['v_txtfloortype1countselect'];  
    $v_txtdonorrssi = $_REQUEST['v_txtdonorrssi'];
    if ($v_txtdonorrssi=="")     {         $v_txtdonorrssi=null;    }
    $v_txtmindlcoverage = $_REQUEST['v_txtmindlcoverage'];
    if ($v_txtmindlcoverage=="")     {         $v_txtmindlcoverage=null;    }
    $v_txtminulcoverage = $_REQUEST['v_txtminulcoverage'];
    if ($v_txtminulcoverage=="")     {         $v_txtminulcoverage=null;    }
    $v_txtdesignmargin = $_REQUEST['v_txtdesignmargin'];
    if ($v_txtdesignmargin=="")     {         $v_txtdesignmargin=null;    }
    $v_txtindoorantrad = $_REQUEST['v_txtindoorantrad'];
    if ($v_txtindoorantrad=="")     {         $v_txtindoorantrad=null;    }
    $v_txtmobtxpower = $_REQUEST['v_txtmobtxpower'];
    if ($v_txtmobtxpower=="")     {         $v_txtmobtxpower=null;    }
    $v_txtdistdonorsite = $_REQUEST['v_txtdistdonorsite'];
    if ($v_txtdistdonorsite=="")     {         $v_txtdistdonorsite=null;    }

    

    $v_txtdonorantgain = $_REQUEST['v_txtdonorantgain'];
    if ($v_txtdonorantgain=="")     {         $v_txtdonorantgain=null;    }
    $v_txtindoorantgain = $_REQUEST['v_txtindoorantgain'];
    if ($v_txtindoorantgain=="")     {         $v_txtindoorantgain=null;    }
    $v_txtdonorcoaxloss = $_REQUEST['v_txtdonorcoaxloss'];
    if ($v_txtdonorcoaxloss=="")     {         $v_txtdonorcoaxloss=null;    }
    $v_txtindoorcoaxloss = $_REQUEST['v_txtindoorcoaxloss'];
    if ($v_txtindoorcoaxloss=="")     {         $v_txtindoorcoaxloss=null;    }


    

    $tabla_channel_quantity = $_REQUEST['tabla_channel_quantity'];
    $tabla_gain_dlul = $_REQUEST['tabla_gain_dlul'];

    $v_numbchxband = $_REQUEST['v_numbchxband'];
    if ($v_numbchxband=="")     {         $v_numbchxband=null;    }

    $v_txtsimpleconfig = $_REQUEST['v_txtsimpleconfig'];
    if ($v_txtsimpleconfig=="")     {         $v_txtsimpleconfig=null;    }


    $v_txtflorbdalocate = $_REQUEST['v_txtflorbdalocate'];
    if ($v_txtflorbdalocate=="")
    {
        $v_txtflorbdalocate=null;
    }
    $v_txttypeclass = $_REQUEST['v_txttypeclass'];
    if ($v_txttypeclass=="")     {         $v_txttypeclass=null;    }

    $v_txtbdadloutputpowervhf = $_REQUEST['v_txtbdadloutputpowervhf'];
    $v_txtbdadloutputpoweruhf = $_REQUEST['v_txtbdadloutputpoweruhf'];


    $v_inexc700 = $_REQUEST['v_inexc700'];
    $v_inexc800 = $_REQUEST['v_inexc800'];

    
    
    /* $contenido = $v_inexc700 . "\n" . $v_inexc800;

    // Escribir el contenido en un archivo de texto
    $resultado = file_put_contents("log700800.txt", $contenido); */



    $v_txtbdamainpwr = $_REQUEST['v_txtbdamainpwr'];
    if ($v_txtbdamainpwr=="")     {         $v_txtbdamainpwr=null;    }
    $v_txtbbareq = $_REQUEST['v_txtbbareq'];
    if ($v_txtbbareq=="")     {         $v_txtbbareq=null;    }
    $v_txtbrandfirealarm = $_REQUEST['v_txtbrandfirealarm'];
    if ($v_txtbrandfirealarm=="")     {         $v_txtbrandfirealarm=null;    }
    $v_txtbdaroomfirec = $_REQUEST['v_txtbdaroomfirec'];
    if ($v_txtbdaroomfirec=="")     {         $v_txtbdaroomfirec=null;    }

    $v_txtreqremotannunci = $_REQUEST['v_txtreqremotannunci'];
    if ($v_txtreqremotannunci=="")     {         $v_txtreqremotannunci=null;    }
    $v_txtreqsystdesing = $_REQUEST['v_txtreqsystdesing'];
    if ($v_txtreqsystdesing=="")     {         $v_txtreqsystdesing=null;    }
    $v_txtahjpack = $_REQUEST['v_txtahjpack'];
    if ($v_txtahjpack=="")     {         $v_txtahjpack=null;    }
    $v_txtinstalltypedesing = $_REQUEST['v_txtinstalltypedesing'];
    if ($v_txtinstalltypedesing=="")     {         $v_txtinstalltypedesing=null;    }

    
 

    $v_txtnaterauakextwalls = $_REQUEST['v_txtnaterauakextwalls'];
    $v_txtnaterauakintwalls = $_REQUEST['v_txtnaterauakintwalls'];
    $v_txtmaterialglasst = $_REQUEST['v_txtmaterialglasst'];
    $v_txtmaterialroof = $_REQUEST['v_txtmaterialroof'];
    $v_txtfirecontrolroom = $_REQUEST['v_txtfirecontrolroom'];
    $v_txtbdaequilocation = $_REQUEST['v_txtbdaequilocation'];

    $v_txtverticalrise = $_REQUEST['v_txtverticalrise'];
    $v_txtdonorant = $_REQUEST['v_txtdonorant'];
    $v_txtspecialinst = $_REQUEST['v_txtspecialinst'];

    $v_txtneededcoverage = $_REQUEST['v_txtneededcoverage'];
    $v_seeddraft  = $_REQUEST['v_seeddraft'];

    $v_txtocupancyfield  = $_REQUEST['v_txtocupancyfield'];
    $v_datetimepicker1  = $_REQUEST['v_datetimepicker1'];
    $v_datetimepicker2  = $_REQUEST['v_datetimepicker2'];

    // if (validateDate( $v_datetimepicker1 , 'Y/m/d')==FALSE)
    // {
    //     $v_datetimepicker1 ="";
    // }
    // if (validateDate( $v_datetimepicker2 , 'Y/m/d')==FALSE)
    // {
    //     $v_datetimepicker2 ="";
    // }


     $v_txtdesigntra =   $_REQUEST['v_txtdesigntra'];
	$vconcero=0;
		$vvacio="";


   

    
    //LLidbanc
    $sql = $connect->prepare("SELECT idband, description, fstartul, fstopul, fstartdl, fstopdl 	FROM flexbdahoneywell_idband where active = 'Y'");
    $sql->execute();
    $resultado = $sql->fetchAll();
     foreach ($resultado as $row2) {
        
         $arr_idband[] = array("idband" => $row2['idband'],
                                    "fstartul" => $row2['fstartul'],
                                    "fstopul" => $row2['fstopul'],
                                    "fstartdl" => $row2['fstartdl'],
                                    "fstopdl" => $row2['fstopdl'],
                                    "nombreband"=> $row2['description']
                                    );
     }


	/// controlamos si existe un registro con los mismos datos.
    $yaexiste= "N";
    
     if ( $vvidproject =="")
     {
        $query_listaproj ="select  coalesce( max(idproject),0) + 1 as sss from flexbdahoneywell ";
	
		$data = $connect->query($query_listaproj)->fetchAll();	
			foreach ($data as $row) {			
                $v_idmaxidproject = $row['sss'];
			}
     }
     else
     {
        $v_idmaxidproject = $vvidproject ;
     }
       


          ///////AUDITORIA GENERAL ANTES DE PROCESAR DATOS
          $d= "idp:".$v_idmaxidproject."#txtfliaprod:".$txtfliaprod."#v_txtnomprojdb:".$v_txtnomprojdb."#v_txtaddressbuild:".$v_txtaddressbuild."#v_stateproj:".$v_stateproj."#v_stateproj_foremails:".$v_stateproj_foremails."#v_txtcoordinateslat:".$v_txtcoordinateslat;
          $d=$d."#v_txtcoordinateslon:".$v_txtcoordinateslon."#v_txtfloortype1count:".$v_txtfloortype1count."#v_txttotalnumberofloors".$v_txttotalnumberofloors."#v_txtfloortype1countavg:".$v_txtfloortype1countavg."#v_txtfloortype1countselect:".$v_txtfloortype1countselect;
          $d=$d."#v_txtfloortype2count:".$v_txtfloortype2count."#v_txtfloortype2countavg:".$v_txtfloortype2countavg."#v_avgfloorheight:".$v_avgfloorheight."#v_txtrfenvironment:".$v_txtrfenvironment."#v_txtfloortype1countselect:".$v_txtfloortype1countselect;
          $d=$d."#v_txtdonorrssi:".$v_txtdonorrssi."#v_txtmindlcoverage:".$v_txtmindlcoverage."#v_txtminulcoverage:".$v_txtminulcoverage."#v_txtdesignmargin:".$v_txtdesignmargin."#v_txtindoorantrad".$v_txtindoorantrad;
          $d=$d."#v_txtmobtxpower:".$v_txtmobtxpower."#v_txtdistdonorsite:".$v_txtdistdonorsite."#v_txtdonorantgain:".$v_txtdonorantgain."#v_txtindoorantgain:".$v_txtindoorantgain."#v_txtdonorcoaxloss".$v_txtdonorcoaxloss;
          $d=$d."#v_txtindoorcoaxloss:".$v_txtindoorcoaxloss."#tabla_channel_quantity:".$tabla_channel_quantity."#tabla_gain_dlul:".$tabla_gain_dlul."#v_numbchxband".$v_numbchxband."#v_txtsimpleconfig:".$v_txtsimpleconfig;
          $d=$d."#v_txtflorbdalocate:".$v_txtflorbdalocate."#v_txttypeclass:".$v_txttypeclass."#v_txtbdamainpwr:".$v_txtbdamainpwr."#v_txtbbareq:".$v_txtbbareq."#v_txtbrandfirealarm:".$v_txtbrandfirealarm."#v_txtbdaroomfirec:".$v_txtbdaroomfirec;
          $d=$d."#v_txtreqremotannunci:".$v_txtreqremotannunci."#v_txtreqsystdesing:".$v_txtreqsystdesing."#v_txtahjpack:".$v_txtahjpack."#v_txtinstalltypedesing:".$v_txtinstalltypedesing."#v_txtnaterauakextwalls:".$v_txtnaterauakextwalls;
          $d=$d."#v_txtnaterauakintwalls:".$v_txtnaterauakintwalls."#v_txtmaterialglasst:".$v_txtmaterialglasst."#v_txtmaterialroof:".$v_txtmaterialroof."#v_txtfirecontrolroom:".$v_txtfirecontrolroom."#v_txtbdaequilocation".$v_txtbdaequilocation;
          $d=$d."#v_txtverticalrise:".$v_txtverticalrise."#v_txtdonorant:".$v_txtdonorant."#v_txtspecialinst:".$v_txtspecialinst."#v_txtneededcoverage:".$v_txtneededcoverage."#v_seeddraft:".$v_seeddraft."#v_txtocupancyfield:".$v_txtocupancyfield;
          $d=$d."#v_datetimepicker1:".$v_datetimepicker1."#v_datetimepicker2:".$v_datetimepicker2."#v_txtdesigntra:".$v_txtdesigntra;
          
          $vuserfas = $_SESSION["flexbdab"];
          $vmenufas=array_pop(explode('/', $_SERVER['PHP_SELF']));
          $vaccionweb="Insert Proy FLEXBDA init";
          $vdescripaudit="Insert Proy FLEXBDA:". $v_idmaxidproject."-idrev:".$v_idprojectrold." -isrev?:".$esrevision."nro:".$v_idprojectr;	
          $vtextaudit= "DATA:".$d;	
  
          $sentenciaudit = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit);");
          $sentenciaudit->bindParam(':userfas', $vuserfas);								
          $sentenciaudit->bindParam(':menuweb', $vmenufas);
          $sentenciaudit->bindParam(':actionweb', $vaccionweb);
          $sentenciaudit->bindParam(':descripaudit', $vdescripaudit);
          $sentenciaudit->bindParam(':textaudit', $vtextaudit);
          $sentenciaudit->execute();
          ////////////////////////////////////////////////////////////////
    
     // Buscamos datos para los email.s
                   $v_email_customer = "";
                   $v_name_customer ="";
                   $v_email_pm = "";
                   $v_name_pm ="";
                   $v_v_txttoken ="";
                   $iduuff = 	$_SESSION["flexbdaa"];
                   $query_listaprojmail ="SELECT * FROM customers_userewbfas WHERE idusercus =  ".  $iduuff;
	
                    $datamails = $connect->query($query_listaprojmail)->fetchAll();	
                        foreach ($datamails as $rowmm) {			
                         if($entornoActual=='DEV' || $entornoActual=='TST'){

                            $v_email_pm = 'luchianocastro@gmail.com';
                            $v_name_pm = 'Lucho';

                         }else{

                            $v_email_pm = $rowmm['usermail'];
                            $v_name_pm = $rowmm['nameuserfull'];

                        }
}
                        $query_listaprojmailcus ="SELECT * FROM customers_userewbfas WHERE idusercus in( select idusercustomers from flexbdahoneywell where idproject = ".$vvidproject.")  ";
	
                        $datamailscus = $connect->query($query_listaprojmailcus)->fetchAll();	
                            foreach ($datamailscus as $rowmmcus) {	
                                
                                $v_v_txttoken  = $rowmmcus['tokengoogle'];

                                if($entornoActual=='DEV' || $entornoActual=='TST'){

                                    $v_email_customer = 'tareasikarus@gmail.com';
                                    $v_name_customer = 'TI';

                                }else{

                                    $v_email_customer = $rowmmcus['usermail'];
                                    $v_name_customer = $rowmmcus['nameuserfull'];

                                }
                            }


	try {

                $idcustom=		$_SESSION["flexbdai"] ;
                $idcustomuser=		$_SESSION["flexbdaa"] ;
                $esrevision="N";

                if ( $v_stateproj <> "R")
                {
                    
                    $sentenciahonwywell = $connect->prepare("UPDATE public.flexbdahoneywell
                    SET  datecreate=now(), active=:active, projectname=:projectname, address=:addressdat, coordinateslat=:coordinateslat, coordinateslon=:coordinateslon, floortype1count=:floortype1count, totalfloorsbuilding=:totalfloorsbuilding, floortype1countavg=:floortype1countavg, floortype2count=:floortype2count, floortype2countavg=:floortype2countavg, avgfloorheight=:avgfloorheight, rfenvironment=:rfenvironment, coverageneeded=:coverageneeded, 
                    numberchannelsxband=:numberchannelsxband, simplexconfig=:simplexconfig, covreg_donorrssi=:covreg_donorrssi, covreg_mindlcoverage=:covreg_mindlcoverage, covreg_minulcoverage=:covreg_minulcoverage,
                     covreg_designmargin=:covreg_designmargin, covreg_indoorantrad=:covreg_indoorantrad, covreg_mobtxpower=:covreg_mobtxpower, covreg_distdonorsite=:covreg_distdonorsite, covreg_donorantgain=:covreg_donorantgain,
                      covreg_indoorantgain=:covreg_indoorantgain, covreg_donorcoaxloss=:covreg_donorcoaxloss, covreg_indoorcoaxloss=:covreg_indoorcoaxloss, bda_floordba=:bda_floordba, bda_filter=:bda_filter, bdadloutputpowervhf=:bdadloutputpowervhf, bdadloutputpoweruhf=:bdadloutputpoweruhf, dba_powerreq=:dba_powerreq,
                       bbu_req=:bbu_req, alarm_brand=:alarm_brand, alarm_install_facp=:alarm_install_facp, alarm_req_annuciator=:alarm_req_annuciator, dr_requierd=:dr_requierd, dr_ahjpackage=:dr_ahjpackage, dr_instalationtype=:dr_instalationtype,
                        dr_mat_extwall=:dr_mat_extwall, dr_mat_intwall=:dr_mat_intwall, dr_mat_glasstype=:dr_mat_glasstype, dr_mat_rooftype=:dr_mat_rooftype, dr_firecontrolroomloc=:dr_firecontrolroomloc,
                         dr_bdaeqlocation=:dr_bdaeqlocation, dr_verticalriserloc=:dr_verticalriserloc, dr_donorantloc=:dr_donorantloc, dr_special=:dr_special, ocupancy=:ocupancy, buildingduedate=:buildingduedate, installationduedate=:installationduedate, designtransition=:designtransition, inexc700=:inexc700, inexc800=:inexc800         WHERE idproject= :idmaxidproject and  idrev= :idrev ");
                    
                   
                }
                else
                {
                             

                                $query_listaproj ="select  coalesce( max(idrev),0) + 1 as sss from flexbdahoneywell where idproject =".$vvidproject;
                                $maxidrev = 0;
                                $data = $connect->query($query_listaproj)->fetchAll();	
                                    foreach ($data as $row) {			
                                        $v_idprojectr = $row['sss'];

                                    }
                                    $v_stateproj='P';

                                       //si es rev.. busco la max.
                                $query_listaproj2 ="select  idcustomers, idusercustomers  from flexbdahoneywell where idproject =".$vvidproject;
                                $maxidrev = 0;
                                $data22 = $connect->query($query_listaproj2)->fetchAll();	
                                    foreach ($data22 as $rowaa) {			
                                        $idcustom = $rowaa['idcustomers'];
                                        $idcustomuser = $rowaa['idusercustomers'];
                                    }
                                 //   echo "SI";
                                 $esrevision="S";
                        $sentenciahonwywell = $connect->prepare("INSERT INTO flexbdahoneywell (  idproject, idrev, idcustomers, idusercustomers, datecreate, active, projectname, address, coordinateslat, coordinateslon, floortype1count, totalfloorsbuilding, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft,ocupancy, buildingduedate, installationduedate,designtransition, bdadloutputpowervhf, bdadloutputpoweruhf, inexc800, inexc700)  VALUES
                         (:idmaxidproject, :idrev, :idcustomers, :idusercustomers, now(), :active, :projectname, :addressdat, :coordinateslat, :coordinateslon, :floortype1count, :totalfloorsbuilding, :floortype1countavg, :floortype2count, :floortype2countavg, :avgfloorheight, :rfenvironment, :coverageneeded, :numberchannelsxband, :simplexconfig, :covreg_donorrssi, :covreg_mindlcoverage, :covreg_minulcoverage, :covreg_designmargin, :covreg_indoorantrad, :covreg_mobtxpower, :covreg_distdonorsite, :covreg_donorantgain, :covreg_indoorantgain, :covreg_donorcoaxloss, :covreg_indoorcoaxloss, :bda_floordba, :bda_filter, :dba_powerreq, :bbu_req, :alarm_brand, :alarm_install_facp, :alarm_req_annuciator, :dr_requierd, :dr_ahjpackage, :dr_instalationtype, :dr_mat_extwall, :dr_mat_intwall, :dr_mat_glasstype, :dr_mat_rooftype, :dr_firecontrolroomloc, :dr_bdaeqlocation, :dr_verticalriserloc, :dr_donorantloc, :dr_special, :seeddraft, :ocupancy, :buildingduedate, :installationduedate,:designtransition, :bdadloutputpowervhf, :bdadloutputpoweruhf, :inexc800, :inexc700); ");

                }
         ///   echo "a ver".$v_idprojectr;
             
                $sentenciahonwywell->bindParam(':idmaxidproject', $v_idmaxidproject);			
                $sentenciahonwywell->bindParam(':idrev', $v_idprojectr);
                if (    $esrevision=="S")
                {
                   $sentenciahonwywell->bindParam(':idcustomers', $idcustom);
                    $sentenciahonwywell->bindParam(':idusercustomers', $idcustomuser);
                }
                $sentenciahonwywell->bindParam(':active', $v_stateproj);	
                 $sentenciahonwywell->bindParam(':projectname', $v_txtnomprojdb);							
                $sentenciahonwywell->bindParam(':addressdat', $v_txtaddressbuild);
                $sentenciahonwywell->bindParam(':coordinateslat', $v_txtcoordinateslat);            
                $sentenciahonwywell->bindParam(':coordinateslon', $v_txtcoordinateslon);
                $sentenciahonwywell->bindParam(':floortype1count', $v_txtfloortype1count);
                $sentenciahonwywell->bindParam(':floortype1countavg', $v_txtfloortype1countavg);
                $sentenciahonwywell->bindParam(':floortype2count', $v_txtfloortype2count);
                $sentenciahonwywell->bindParam(':floortype2countavg', $v_txtfloortype2countavg);
                $sentenciahonwywell->bindParam(':avgfloorheight', $v_avgfloorheight);
                //LC
                $sentenciahonwywell->bindParam(':totalfloorsbuilding', $v_txttotalnumberofloors);
                
                $sentenciahonwywell->bindParam(':rfenvironment', $v_txtrfenvironment);                
                $sentenciahonwywell->bindParam(':coverageneeded', $v_txtneededcoverage);
                $sentenciahonwywell->bindParam(':numberchannelsxband', $v_numbchxband);
                $sentenciahonwywell->bindParam(':simplexconfig', $v_txtsimpleconfig);
                $sentenciahonwywell->bindParam(':covreg_donorrssi', $v_txtdonorrssi);
                $sentenciahonwywell->bindParam(':covreg_mindlcoverage', $v_txtmindlcoverage);
                $sentenciahonwywell->bindParam(':covreg_minulcoverage', $v_txtminulcoverage);
                $sentenciahonwywell->bindParam(':covreg_designmargin', $v_txtdesignmargin);
                $sentenciahonwywell->bindParam(':covreg_indoorantrad', $v_txtindoorantrad);
                $sentenciahonwywell->bindParam(':covreg_mobtxpower', $v_txtmobtxpower);
                $sentenciahonwywell->bindParam(':covreg_distdonorsite', $v_txtdistdonorsite);
                $sentenciahonwywell->bindParam(':covreg_donorantgain', $v_txtdonorantgain);
                $sentenciahonwywell->bindParam(':covreg_indoorantgain', $v_txtindoorantgain);
                $sentenciahonwywell->bindParam(':covreg_donorcoaxloss', $v_txtdonorcoaxloss);
                $sentenciahonwywell->bindParam(':covreg_indoorcoaxloss', $v_txtindoorcoaxloss);                
                $sentenciahonwywell->bindParam(':bda_floordba', $v_txtflorbdalocate);
                $sentenciahonwywell->bindParam(':bda_filter', $v_txttypeclass);
                $sentenciahonwywell->bindParam(':bdadloutputpowervhf', $v_txtbdadloutputpowervhf);
                $sentenciahonwywell->bindParam(':bdadloutputpoweruhf', $v_txtbdadloutputpoweruhf);
                

                

                $sentenciahonwywell->bindParam(':dba_powerreq', $v_txtbdamainpwr);
                $sentenciahonwywell->bindParam(':bbu_req', $v_txtbbareq);
                $sentenciahonwywell->bindParam(':alarm_brand', $v_txtbrandfirealarm);
                $sentenciahonwywell->bindParam(':alarm_install_facp', $v_txtbdaroomfirec);
                $sentenciahonwywell->bindParam(':alarm_req_annuciator', $v_txtreqremotannunci);
                $sentenciahonwywell->bindParam(':dr_requierd', $v_txtreqsystdesing);
                $sentenciahonwywell->bindParam(':dr_ahjpackage', $v_txtahjpack);
                $sentenciahonwywell->bindParam(':dr_instalationtype', $v_txtinstalltypedesing);
                $sentenciahonwywell->bindParam(':dr_mat_extwall', $v_txtnaterauakextwalls);
                $sentenciahonwywell->bindParam(':dr_mat_intwall', $v_txtnaterauakintwalls);
                $sentenciahonwywell->bindParam(':dr_mat_glasstype', $v_txtmaterialglasst);
                $sentenciahonwywell->bindParam(':dr_mat_rooftype', $v_txtmaterialroof);
                $sentenciahonwywell->bindParam(':dr_firecontrolroomloc', $v_txtfirecontrolroom);
                $sentenciahonwywell->bindParam(':dr_bdaeqlocation', $v_txtbdaequilocation);
                $sentenciahonwywell->bindParam(':dr_verticalriserloc', $v_txtverticalrise);
                $sentenciahonwywell->bindParam(':dr_donorantloc', $v_txtdonorant);
                $sentenciahonwywell->bindParam(':dr_special', $v_txtspecialinst);

                $sentenciahonwywell->bindParam(':designtransition', $v_txtdesigntra);

                $sentenciahonwywell->bindParam(':inexc800', $v_inexc800);
                $sentenciahonwywell->bindParam(':inexc700', $v_inexc700);

                

                $v_nameactions ="Project Submited: #".$v_idmaxidproject;
                if (    $esrevision=="S")
                {
                    $sentenciahonwywell->bindParam(':seeddraft', $v_seeddraft);
                    $v_nameactions ="new project revision: #".$v_idmaxidproject." - Rev:".$v_idprojectr;
                }
                $sentenciahonwywell->bindParam(':ocupancy', $v_txtocupancyfield);
                if($v_datetimepicker1=="")
                {
                    $v_datetimepicker1=NULL;
                }
                if($v_datetimepicker2=="")
                {
                    $v_datetimepicker2=NULL;
                }
                $sentenciahonwywell->bindParam(':buildingduedate', $v_datetimepicker1);
                $sentenciahonwywell->bindParam(':installationduedate', $v_datetimepicker2);
                
            
                if($v_txtnomprojdb  <>"")
                {
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 


              

                function generateFileName()
                {
                $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
                $name = "";
                for($i=0; $i<12; $i++)
                $name.= $chars[rand(0,strlen($chars))];
                return $name;
                }
                //get a random name of the file here
                $fileNamepdf = generateFileName();
                ///// “Estimate xxx – yyyProjectNameyyy – zzESDNamezz. Pdf”
                $fileNamepdf = "Estimate_F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."-".$v_txtnomprojdb."-".$v_name_customer ;
                $fileNamepdf = "Estimate_F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."-".str_replace("'","",str_replace("&","",$v_txtnomprojdb))."-".str_replace("&","",str_replace("'","",$v_name_customer));
 
                $filenamepdfnueva =preg_replace('/\s+/', '_', $fileNamepdf);
      //      echo $filenamepdfnueva;
                $fileNamepdf =  $filenamepdfnueva;
                ////Insertamos las Actiones q se realizaron
                if ( $v_stateproj <> "D")
                {
             ////   INSERT INTO public.flexbdahoneywell_actions(idproject, idrev, nameactions, detailsactions, datemodif)  VALUES (?, ?, ?, ?, now());
                        $sentenciaaction = $connect->prepare("INSERT INTO flexbdahoneywell_actions(idproject, idrev, nameactions, detailsactions, datemodif)  VALUES (:idproject, :idrev, :nameactions,:detailsactions,now())");
                        $sentenciaaction->bindParam(':idproject', $v_idmaxidproject);
                        $sentenciaaction->bindParam(':idrev', $v_idprojectr);	 
                        $sentenciaaction->bindParam(':nameactions', $v_nameactions);
                        $sentenciaaction->bindParam(':detailsactions',  $filenamepdfnueva);	 
                        $sentenciaaction->execute();
                }
                
                    //ahora insertamos los datos de BAND Y CHANNEL
                    $porciones = explode("#", $tabla_channel_quantity);
               

                    
                    $vidch=1;
                    $vtypedata="CHANNEL";

                    $sentenciachb = $connect->prepare(" delete from flexbdahoneywell_band where  idproject = :idproject and  idrev = :idrev ");
                    
                    $sentenciachb->bindParam(':idproject', $v_idmaxidproject);
                    $sentenciachb->bindParam(':idrev', $v_idprojectr);	                
                        
                    $sentenciachb->execute();

                   

                    $channelcount800 = 0;
                    $channelcount700 =0;
                    $channelcountVHF = 0;
                    $channelcountUHF=0;
                      foreach($porciones as $elcanaluldl) {
                      //    echo "el canal:".$elcanaluldl;
                           $separa_ULDL = explode("|", $elcanaluldl);
                     //  	echo "dL".$separa_ULDL[0]."--uL".$separa_ULDL[1]."-3:".$separa_ULDL[3]."--4:".$separa_ULDL[4]."<br>";
                           if ($elcanaluldl <> "")
                           {
                            $vvtypedata="CHANNEL";

                            $tempnombband = "";
                            foreach ($arr_idband as $key => $value) {
                            //    echo "Busco:".$value['nombreband'] ."tiene q estar;". $separa_ULDL[3];
                                $posicion_coincidencia = strpos( $value['nombreband'] , $separa_ULDL[3]);
                                if ($posicion_coincidencia  !== false) 
                                    {
                                      //  echo "/r/n".$value['nombreband'];
                                        $vvidband = $value['idband'];
                                        $tempnombband =  $value['nombreband'];
                                        
                                    }
                            }
                            $tempnombband  =   $tempnombband ."#". $separa_ULDL[3];

                           
                               $vnotech  = $_REQUEST['txtnotechanel']; //
                               // insetamos channel detalle PO
                               $sentenciach = $connect->prepare("INSERT INTO public.flexbdahoneywell_band(idproject, idrev, idband, nombbandtemp, ulstart, ulstop, dlstart, dlstop, typeref, ulch, dlch,simpleconfig)
                               VALUES (:idproject,:idrev, :idband, :nombbandtemp, :ulstart, :ulstop, :dlstart, :dlstop, :typeref, :ulch, :dlch,:simpleconfig);");
                               
                               $sentenciach->bindParam(':idproject', $v_idmaxidproject);
                               $sentenciach->bindParam(':idrev', $v_idprojectr);								
                               $sentenciach->bindParam(':idband', $vvidband);
                               $sentenciach->bindParam(':nombbandtemp', $tempnombband);
                               $sentenciach->bindParam(':ulstart', $vconcero);
                               $sentenciach->bindParam(':ulstop', $vconcero);
                               $sentenciach->bindParam(':dlstart',$vconcero  );
                               $sentenciach->bindParam(':dlstop', $vconcero);
                               $sentenciach->bindParam(':typeref', $vvtypedata);
                               $sentenciach->bindParam(':ulch', $separa_ULDL[0]);
                               $sentenciach->bindParam(':dlch', $separa_ULDL[1]);
                               $sentenciach->bindParam(':simpleconfig', $separa_ULDL[2]);
                               
                           
                               
                               $sentenciach->execute();
                               
                    
                               /////////////////////////////////////////////////////////////////////////////////////	
                                   
                               $vidch = $vidch + 1 ;	
                           }
                           
                       }
                    //fin inserto canales

                  
                    //inicio insert band
                    $porciones = explode("#", $tabla_gain_dlul);
                    $vidchunit=1;
                    $vtypedata="UNIT";
               

                      foreach($porciones as $elcanaluldl) {
                         //  echo "el canal:".$elcanaluldl."<br>";
                           $separa_UNIT  = explode("|", $elcanaluldl);
                       //    echo "low".$separa_UNIT[0]."--".$separa_UNIT[1]."<br>";
                           if ($elcanaluldl <> "")
                           {
                               // insetamos channel detalle PO
                               
                                   $vvidband =null;
                                   $vvtypedata="FREQBAND";
                                   $tempnombband = "";
                                   foreach ($arr_idband as $key => $value) {
                                            if ( intval($value['fstartdl']) == intval($separa_UNIT[3])  && intval($value['fstopdl']) == intval($separa_UNIT[4]) && intval($value['fstartul']) == intval($separa_UNIT[1]) && intval($value['fstopul']) == intval($separa_UNIT[2]))
                                           {
                                             ///  echo "/r/n".$value['nombreband'];
                                               $vvidband = $value['idband'];
                                               $tempnombband =  $value['nombreband'];
                                               
                                           }
                                   }

                                   
                            /// sumamos la cant de canales x band para variables de salida.
                                 $posicion_coincidencia700 = strpos( $separa_UNIT[0] , "700");
                                 if ($posicion_coincidencia700  !== false) 
                                 {
                                     $channelcount700 =  $channelcount700 + 1;
                                 }
                                 $posicion_coincidencia800 = strpos(  $separa_UNIT[0] , "800");
                                 if ($posicion_coincidencia800  !== false) 
                                 {
                                     $channelcount800 =  $channelcount800 + 1;
                                 }
                                 $posicion_coincidenciaVHF = strpos(  $separa_UNIT[0], "VHF");
                                 if ($posicion_coincidenciaVHF  !== false) 
                                 {
                                     $channelcountVHF =  $channelcountVHF + 1;
                                 }
                                 $posicion_coincidenciaUHF = strpos( $separa_UNIT[0] , "UHF");
                                 if ($posicion_coincidenciaUHF  !== false) 
                                 {
                                     $channelcountUHF =  $channelcountUHF + 1;
                                 }
 
                                 $qidgrupbandes = 0;
                                 if ( $channelcount700>0)
                                 {
                                     $qidgrupbandes = 11;
                                 }
                                 if ( $channelcount800>0)
                                 {
                                     $qidgrupbandes = 11;
                                 }
                                 if ( $channelcountUHF>0)
                                 {
                                     $qidgrupbandes = 13;
                                 }
                                 if ( $channelcountVHF>0)
                                 {
                                     $qidgrupbandes = 13; 
                                 }
 

                                   $tempnombband  =   $tempnombband ."#". $separa_UNIT[0];
                                   
                                   $sentenciachband = $connect->prepare("INSERT INTO public.flexbdahoneywell_band(idproject, idrev, idband, nombbandtemp, ulstart, ulstop, dlstart, dlstop, typeref, ulch, dlch,simpleconfig)
                                   VALUES (:idproject, :idrev, :idband, :nombbandtemp, :ulstart, :ulstop, :dlstart, :dlstop, :typeref, :ulch, :dlch, null);");
                                   
                                   $sentenciachband->bindParam(':idproject', $v_idmaxidproject);	
                                   $sentenciachband->bindParam(':idrev', $v_idprojectr);															
                                   $sentenciachband->bindParam(':idband',  $vvidband);
                                   $sentenciachband->bindParam(':nombbandtemp',  $tempnombband);
                                   $sentenciachband->bindParam(':ulstart',  $separa_UNIT[1] );
                                   $sentenciachband->bindParam(':ulstop',  $separa_UNIT[2] );
                                   $sentenciachband->bindParam(':dlstart',$separa_UNIT[3]  );
                                   $sentenciachband->bindParam(':dlstop',  $separa_UNIT[4]);
                                   $sentenciachband->bindParam(':typeref', $vvtypedata);
                                   $sentenciachband->bindParam(':ulch', $vconcero);
                                   $sentenciachband->bindParam(':dlch', $vconcero);
                               
                                   
                                   $sentenciachband->execute();
                               
                               /////////////////////////////////////////////////////////////////////////////////////
                           
                               $vidchunit = $vidchunit + 1 ;	
                           }
                           
                       }
                    //fin inicio band

                  

                    // Replicamos los Adjuntos tmb
                    if (    $esrevision=="S")
                    {
                        $sentenciachband = $connect->prepare("insert into flexbdahoneywell_attach SELECT idproject, :idrevnew, idnroattach, fileattach, seedtemp, active, typefile FROM public.flexbdahoneywell_attach where idproject= :idproject  and idrev = :idrev ");
                        
                        $sentenciachband->bindParam(':idproject', $v_idmaxidproject);	
                        $sentenciachband->bindParam(':idrev', $v_idprojectrold);		
                        $sentenciachband->bindParam(':idrevnew', $v_idprojectr);		
                     
                    }



                    $vuserfas = $_SESSION["flexbdab"];
                    $vmenufas=array_pop(explode('/', $_SERVER['PHP_SELF']));
                    $vaccionweb="Insert Proy FLEXBDA";
                    $vdescripaudit="Insert Proy FLEXBDA:". $v_idmaxidproject."-idrev:".$v_idprojectrold." -isrev?:".$esrevision."nro:".$v_idprojectr;	
                    $vtextaudit= "Insert Proy FLEXBDA:". $v_idmaxidproject."-idrev:".$v_idprojectrold." -isrev?:".$esrevision."nro:".$v_idprojectr;	
    
                    $sentenciaudit = $connect->prepare("INSERT INTO public.auditwebfas(dateaudit, userfas, menuweb, actionweb, descripaudit, textaudit)	VALUES (now(),  :userfas, :menuweb, :actionweb, :descripaudit, :textaudit);");
                    $sentenciaudit->bindParam(':userfas', $vuserfas);								
                    $sentenciaudit->bindParam(':menuweb', $vmenufas);
                    $sentenciaudit->bindParam(':actionweb', $vaccionweb);
                    $sentenciaudit->bindParam(':descripaudit', $vdescripaudit);
                    $sentenciaudit->bindParam(':textaudit', $vtextaudit);
                    $sentenciaudit->execute();


                    

                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    /// Empezamos con los OUTPUT
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                
                    $Channel_Count = $v_numbchxband;
                    $ft1count  = $v_txtfloortype1count;
                    $Floor_1_Area_Formula = $v_txtfloortype1count * $v_txtfloortype1countavg ;
                    $ft2count  =0;
                    $ft1length = sqrt($v_txtfloortype1countavg) ;
               //     echo "resul sqrt:". sqrt($v_txtfloortype1countavg)."----".$v_txtfloortype1countavg."-finb";
                    $ft1width = sqrt($v_txtfloortype1countavg) ;
                    $ft2length =0;
                    $ft2width = 0;
                    if ($v_txtfloortype1countselect ==2)
                    {
                        $ft2count  = $v_txtfloortype2count;
                        $Floor_2_Area_Formula = $v_txtfloortype2count * $v_txtfloortype2countavg ;
                        $Area_Formula =   $Floor_1_Area_Formula +   $Floor_2_Area_Formula;

                        $ft2length =sqrt($v_txtfloortype2countavg) ;
                        $ft2width = sqrt($v_txtfloortype2countavg) ;
                    }
                    else
                    {
                        $Area_Formula =   $Floor_1_Area_Formula;  
                    }
                    
                    if ($v_txtrfenvironment =="Light") { $vpl = "2.8"; }
                    if ($v_txtrfenvironment =="LightMedium") { $vpl = "3.1"; }
                    if ($v_txtrfenvironment =="Dense") { $vpl = "3.4"; }
                    if ($v_txtrfenvironment =="HighDense") { $vpl = "3.7"; }
                    if ($v_txtrfenvironment =="VeryHigh") { $vpl = "4"; }


                  
                    //=donorcoax100loss*donorcoaxlength/100
                    $floorhight = $v_avgfloorheight;

                    $donorcoax100loss=   $v_txtdonorcoaxloss;
                    $ft1area =    $Floor_1_Area_Formula;
                    $ft2area =    $Floor_2_Area_Formula; 
                  
                    if ($ft1area / $ft1count > $ft2area / $ft2count)
                    {
                        $valtempaa1 =  $ft1length + $ft1width;
                    }
                    else
                    {
                        $valtempaa1 =  $ft2length + $ft2width;
                    }
                    /*Donor Formula*/
                    //$donorcoaxlength=ROUND(($floorhight * ($ft1count + $ft2count) +  $valtempaa1) * 1.2, 0);//Formula old 21-04 FIP9
                    $donorcoaxlength = ROUND((($ft1count * $floorhight) + ( 2 * $ft1width))*1.10,0);////FIP9
                    //=============================================================================================
                   ///// Donor Coax Loss Formula  =donorcoax100loss*donorcoaxlength/100
                   
                  // echo "a 480 verrrr:".  $donorcoaxlength;
                    $donorcoaxloss=(($donorcoax100loss* $donorcoaxlength)/100);
                 //   echo "a chee:".  $donorcoaxloss;
                    //BDA_DL_Input_Formula = =donorrssi+donorantgain-donorcoaxloss
                    $BDA_DL_Input_Formula_12W = $v_txtdonorrssi + ($v_txtdonorantgain -   $donorcoaxloss) ;
                    $BDA_DL_Input_Formula_2W   = $v_txtdonorrssi + ($v_txtdonorantgain -    $donorcoaxloss) ;
                    $BDA_DL_Input_Formula  = $v_txtdonorrssi + ($v_txtdonorantgain -   $donorcoaxloss) ;

                 //   echo "HOLA".$v_txtdonorrssi."**".$v_txtdonorantgain."**". $donorcoaxloss;
                 //   echo "<br>res".($v_txtdonorantgain -  $donorcoaxloss) ;
                //    echo "<br>res1".$v_txtdonorrssi + ($v_txtdonorantgain -    $donorcoaxloss)  ;
                //    echo "<br>res2".($v_txtdonorrssi + $v_txtdonorantgain) ;

                    // BDA Max DL Power 27 Formula  =ROUND(bdamaxdlcomppwr27 - (10 *LOG10(channelcount)); 2)
                    $bdamaxdlcomppwr33 = 33;
                    $bdamaxdlcomppwr27 = 27;
                    ////////BDA_Max_DL_Power_27_Formula///////////
                    $Max_BDA_Power_CH_12W  =ROUND( ($bdamaxdlcomppwr27 - (10 * LOG10($Channel_Count))),2);
                    $Max_BDA_Power_CH_2W  =ROUND( ($bdamaxdlcomppwr33 - (10 * LOG10($Channel_Count))),2);

             
                    $dasantradius = $v_txtindoorantrad; // desde el form
                    $dascoax100loss= 2.37;

                    //Floor 1 DAS Antenna Count Formula : =IF(dasantradius<=0; 0; ROUNDUP(ft1length*ft1width/(POWER(dasantradius;2)*PI());0)*ft1count)
                    if (  $dasantradius <=0)
                    {
                        $dasant1=0;
                    }
                    else
                    {
                      ///  $dasant1= ROUND($v_txtfloortype1countavg /(pow($dasantradius,2) *  M_PI ),0,PHP_ROUND_HALF_UP) * $ft1count;
                       //// $dasant1= ROUND( ($vtxtfloortype1countavg) /(pow($dasantradius,2) *  M_PI )  * $ft1count ,0,PHP_ROUND_HALF_UP) ;
                        $dasant1= ceil( ($v_txtfloortype1countavg) /(pow($dasantradius,2) *  M_PI ) )  * $ft1count;//NUMERO DE ANTENAS DAS
                    }
                    ///////////////////////////////////////////////////////////////////////
                     //Floor 2 DAS Antenna Count Formula :=IF(dasantradius<=0; 0; ROUNDUP(ft2length*ft2width/(POWER(dasantradius;2)*PI());0)*ft2count)
                     if (  $dasantradius <=0)
                     {
                         $dasant2=0;
                     }
                     else
                     {
                       //  $dasant2= ROUND($v_txtfloortype2countavg /(pow($dasantradius,2) *  M_PI ),0,PHP_ROUND_HALF_UP) * $ft2count;
                     ///    $dasant2= ROUND($vtxtfloortype2countavg /(pow($dasantradius,2) *  M_PI ) * $ft2count ,0,PHP_ROUND_HALF_UP) ;
                         $dasant2= ceil( ($v_txtfloortype2countavg) /(pow($dasantradius,2) *  M_PI ) )  * $ft2count;
                     }
                     ///////////////////////////////////////////////////////////////////////
                     //=Das_Antenna_Count_Formula *** =dasant1+dasant2
                    $dasant = $dasant1 + $dasant2;
                    $jumperloss =0.5;
                    $jumperlossft1 = 0;
                    $jumperlossft2 = 0;
                     ////Jumper_Loss_Floor_1_Formula :: =(ROUND((ft1length-dasantradius) / (2*dasantradius) + (ft1width-dasantradius) / (2*dasantradius);0))*jumperloss
                     $jumperlossft1 = (ROUND(($ft1length-$dasantradius) / (2*$dasantradius) + ($ft1width-$dasantradius) / (2*$dasantradius),0))*$jumperloss;
                     
                    /// //////////////////////////////
                    ////Jumper_Loss_Floor_2_Formula :: =(ROUND((ft2length-dasantradius) / (2*dasantradius) + (ft2width-dasantradius) / (2*dasantradius);0))*jumperloss
                    $jumperlossft2 = (ROUND(($ft2length-$dasantradius) / (2*$dasantradius) + ($ft2width-$dasantradius) / (2*$dasantradius),0))*$jumperloss;
                    /// //////////////////////////////

                    $dasantgain =  $v_txtindoorantgain ;// desde el form
                    //=Vertical_Jumper_Loss_Formula *** =(ft2count+ft1count-1)*jumperloss
                    $verticaljumperloss  =($ft2count + $ft1count - 1) * $jumperloss;

                   
                   
                    //Das_Loss_Floor_1_Formula ::=IF(ft1count=0;0;(ft1length-dasantradius)/100*dascoax100loss+(ft1width-dasantradius)/100*dascoax100loss+ROUND(10*LOG10(dasant1/ft1count);0)+ROUND(10*LOG10(ft1count/2);0)+jumperlossft1)
                    $daslossp1  =0;
                    if ( $ft1count == 0)
                    {
                        $daslossp1  =0;
                    }
                    else
                    {
                        //(ft1length-dasantradius)/100*dascoax100loss+(ft1width-dasantradius)/100*dascoax100loss+ROUND(10*LOG10(dasant1/ft1count);0)+ROUND(10*LOG10(ft1count/2);0)+jumperlossft1)
                        $daslossp1  =((($ft1length-$dasantradius)/100) * $dascoax100loss+((($ft1width-$dasantradius)/100)*$dascoax100loss) + ROUND( (10*LOG10($dasant1/$ft1count)),0)+ ROUND( (10*LOG10($ft1count/2)),0)+$jumperlossft1);
                    }
                    //=Das Loss Floor 2 Formula ** ==IF(ft2count=0;0;(ft2length-dasantradius)/100*dascoax100loss+(ft2width-dasantradius)/100*dascoax100loss+ROUND(10*LOG10(dasant2/ft2count);0)+ROUND(10*LOG10(ft2count/2);0)+jumperlossft2)
                     $daslossp2  =0;
                     if ( $ft2count == 0)
                     {
                         $daslossp2  =0;
                     }
                     else
                     {
                         
                         $daslossp2  =((($ft2length-$dasantradius)/100) * $dascoax100loss+((($ft2width-$dasantradius)/100)*$dascoax100loss) + ROUND( (10*LOG10($dasant2/$ft1count)),0)+ ROUND( (10*LOG10($ft2count/2)),0)+$jumperlossft2);
                     }
                    /////=Das_Loss_Formula =ROUND(10*LOG10(POWER(10; daslossp1/10) + POWER(10; daslossp2/10)) + floorhight * (ft1count + ft2count) * dascoax100loss / 100 - dasantgain + verticaljumperloss + (10 *LOG10(ft1count + ft2count)) / 2; 1)
                    

                    //=Frequency_Formula ** =IF(channelcount800>0;860;775)
                    $frequency  = 0;
                    if ($channelcount800 >0)
                    {
                        $frequency  = 860;
                    }
                    else
                    {
                        $frequency  = 775;
                    }

                  //Das Loss Formula *** =ROUND(10*LOG10(POWER(10; daslossp1/10) + POWER(10; daslossp2/10)) + floorhight * (ft1count + ft2count) * dascoax100loss / 100 - dasantgain + verticaljumperloss + (10 *LOG10(ft1count + ft2count)) / 2; 1)
                    $dasloos =ROUND(10*LOG10(pow(10, $daslossp1/10) + pow(10, $daslossp2/10)) + $floorhight * ($ft1count + $ft2count) * $dascoax100loss / 100 - $dasantgain + $verticaljumperloss + (10 *LOG10($ft1count + $ft2count)) / 2, 1);
               //     echo "-8888----- 24.3->dasloss:".$dasloos."<fin";
                    $daslossparamm = $dasloos;
                    $dasloss= $dasloos;
               //     echo "nva variable".$dasloos;
                  //bdadlinput **=BDA_DL_Input_Formula **
                    $bdadlinput=$BDA_DL_Input_Formula;
             //       echo "sigomotrdno".$bdadlinput;

        
          
                   //=BDA_Max_DL_Power_27_Formula ** =ROUND(bdamaxdlcomppwr27 - (10 *LOG10(channelcount)); 2)
                    $bdamaxdlchpwr27 =ROUND($bdamaxdlcomppwr27 - (10 *LOG10($Channel_Count)), 2);

                  //=BDA_out_DL_Channel_27_Formula :: =IF(bdadlinput + 85 > bdamaxdlchpwr27; bdamaxdlchpwr27; bdadlinput)
                    $bdaoutdlch27=0;  
                    $bdadlinput_temp =  $bdadlinput+85;
                    if ( $bdadlinput_temp>  $bdamaxdlchpwr27 )
                    {
                        $bdaoutdlch27=$bdamaxdlchpwr27;  
                    }
                    else
                    {
                        $bdaoutdlch27=  $bdadlinput_temp;  
                    }

              //=BDA_out_DL_Channel_27_Formula :: =IF(bdadlinput + 85 > bdamaxdlchpwr27; bdamaxdlchpwr27; bdadlinput)
                
                    $bdamaxdlchpwr33 =ROUND($bdamaxdlcomppwr33 - (10 *LOG10($Channel_Count)), 2);
                    $bdaoutdlch33=0;  
                    $bdadlinput_temp =  $bdadlinput+85;
                    if ( $bdadlinput_temp>  $bdamaxdlchpwr33 )
                    {
                        $bdaoutdlch33=$bdamaxdlchpwr33;  
                    }
                    else
                    {
                        $bdaoutdlch33=  $bdadlinput_temp;  
                    }



                       


                  //Antenna Output :: DAS Antenna Output 27 Formula ::=bdaoutdlch27 - dasloss
                    $dasantdloutput27 = $bdaoutdlch27 - $dasloss;
                    
                    //Antenna Output :: DAS Antenna Output 33 Formula :: =bdaoutdlch33 - dasloss

                    $dasantdloutput33=$bdaoutdlch33 - $dasloss;

                  //Path Loss :: pathloss :: =Pathloss_Formula :: =ROUND(32,5 + 20 *LOG10(frequency / 1000) + vpl * 10 *LOG10(dasantradius / 3,28); 2)
                    $pathloss  =ROUND(32.5 + 20 * LOG10($frequency / 1000) + $vpl * 10 * LOG10($dasantradius / 3.28), 2);


                 //RSSI Mobile::rssimobile27::  =RSSI_Mobile_27_Formula ::=dasantdloutput27 - pathloss - designmargin
                    $designmargin=$v_txtdesignmargin;  // desde el form
                    $rssimobile27 = $dasantdloutput27 - $pathloss - $designmargin;
                    $rssimobile33 = $dasantdloutput33 - $pathloss - $designmargin;

                    // Mobile Tx Power ::mobtxpower::
                    $mobtxpower =    $v_txtmobtxpower; //desde el form
                    // DAS UL input :: dasulinput:: 
                    $dasulinput =$mobtxpower - $pathloss;
                    //BDA UL Input  
                    // BDA_UL_Input_Formula::
                    $bdaulinput =$dasulinput - $dasloss;

                    $maxcompulpower=24;
                    //Max Channel UL Power Formula
                    $maxchulpower=ROUND($maxcompulpower - (10 *LOG10($Channel_Count)),2);

                    //BDA Uplink Output :: bdauloutput **BDA_UL_Output_Formula: =IF((bdaulinput + 85) >= maxchulpower; maxchulpower; (bdaulinput + 85))
                    $bdauloutput =0; 
                    $bdaulinput_temp =  $bdaulinput + 85;
                ///    echo "a ver bdaulinput:".$bdaulinput."***+85::". $bdaulinput_temp."---maxchulpower:".$maxchulpower ;
                    if (  $bdaulinput_temp >=  $maxchulpower)
                    {
                        $bdauloutput =$maxchulpower;
                    }
                    else
                    {
                        $bdauloutput =  $bdaulinput_temp; 
                    }
                    //Donor_Antenna_Gain_Field **
                    $donorantgain = $v_txtdonorantgain ;

                    //donorcoax100loss :: 
                    $donorcoax100loss=   $v_txtdonorcoaxloss;
                    $ft1area =    $Floor_1_Area_Formula;
                    $ft2area =    $Floor_2_Area_Formula; 
                    ///=ROUND((floorhight * (ft1count + ft2count) + (IF(ft1area / ft1count > ft2area / ft2count; ft1length + ft1width; ft2length + ft2width))) * 1,2; 0)

                 
                    if ($ft1area / $ft1count > $ft2area / $ft2count)
                        {
                            $valtempaa1 =  ceil($ft1length) + ceil($ft1width);
                        }
                        else
                        {
                            $valtempaa1 =  ceil($ft2length) + ceil($ft2width);
                        }

                    
                        //Donor Formula
                    //$donorcoaxlength=ceil(($floorhight * ($ft1count + $ft2count) +  $valtempaa1) * 1.2);//Formula old 21-04 FIP9
                    $donorcoaxlength = ceil((($ft1count * $floorhight) + ( 2 * $ft1width))*1.10);////FIP9


                    //=Donor_Coax_Loss_Formula :: =donorcoax100loss*donorcoaxlength/100
                    $donorcoaxloss=$donorcoax100loss*$donorcoaxlength/100;
                    //Donor UL Output ** donoruloutput **=Donor_UL_Output_Power_Formula **
                    $donoruloutput =$bdauloutput - $donorcoaxloss + $donorantgain;
                   
                    //=Distance_to_Donor_Site_Field ::
                    $distancetodonorsite=$v_txtdistdonorsite;
                    //Free Space Loss ::Free Space Path Loss Formula ::=ROUND(20 *LOG10(frequency) + 20 *LOG10(distancetodonorsite) + 36,6; 2)
                    $freespaceloss =ROUND(20 *LOG10($frequency) + 20  *LOG10($distancetodonorsite) + 36.6, 2);

                    //FSPL_Formula ::
                    $fspl=ROUND(20 *LOG10($frequency) + 20 *LOG10($distancetodonorsite) + 36.6, 2);
                    //Signal at Donor Site:: Signal at Donor Site Formula
                    $sigatdonorsite =$donoruloutput - $fspl;

                    //Donor Antenna Count
                    $donorantcount=1;
                    //Lightning Protection
                    $lightningprotection =1;

                    //Donor Coax Connector Count
                    $donorcoaxconnector =4;
                    
                    //**************Donor Coax Cable (ft)*****************************
                    //$donorcoaxlength= ceil(($floorhight * ($ft1count + $ft2count) +  $valtempaa1) * 1.05*1000); //Formula old 21-04 FIP9
                    $donorcoaxlength = ceil((($ft1count * $floorhight) + ( 2 * $ft1width))*1.10);//FIP9

                    //Directional Coupler/Splitter Count :: Splitter_Count_Formula::// FIP6
                    $splittercount =$dasant - 1;
                    
                    $addfloorhight1 =0;
                    if ($ft1count > 1)
                    {
                        $addfloorhight1 = $floorhight * $ft1count;
                    }

                  
                    $addfloorhight2=0;
                    if ($ft2count > 1)
                    {
                        $addfloorhight2 = $floorhight * $ft2count;
                    }

                   

                    //Coax_Length_Floor_1_Formula :: =ROUND((((ft1length / (2 * dasantradius)) - 1) * 100 + (((ft1width / (2 * dasantradius)) - 1) * 100) * (ft1length / (2 * dasantradius))) * ft1count + addfloorhight1 + (2 * dasantradius * ft1count); 0)
                    $coaxlengthft1=ROUND(((($ft1length / (2 * $dasantradius)) - 1) * 100 + ((($ft1width / (2 * $dasantradius)) - 1) * 100) * ($ft1length / (2 * $dasantradius))) * $ft1count + $addfloorhight1 + (2 * $dasantradius * $ft1count), 0);
                    //Coax Length Floor 2 Formula :: =ROUND((((ft2length / (2 * dasantradius)) - 1) * 100 + (((ft2width / (2 * dasantradius)) - 1) * 100) * (ft2length / (2 * dasantradius))) * ft2count + addfloorhight1 + (2 * dasantradius * ft2count); 0)
                    $coaxlengthft2=ROUND(((($ft2length / (2 * $dasantradius)) - 1) * 100 + ((($ft2width / (2 * $dasantradius)) - 1) * 100) * ($ft2length / (2 * $dasantradius))) * $ft2count + $addfloorhight1 + (2 * $dasantradius * $ft2count), 0);
                    //DAS Coax Cable (ft):: coaxlength :: Coax_Length_Formula ::
                    $coaxlength =ROUND(($coaxlengthft1 + $coaxlengthft2) * 1.1 );

                    
                    //Jumper Cable Count :: jumpercount ::
                    $jumpercount =2 * $splittercount;
                    //DAS Antenna Count :: dasant
                    $dasantcount =$dasant;

                    //DAS Coax Connector Count :: DAS_Connector_Formula:: =3 * splittercount + dasant + 1
                    /*==================== Connectors = (numCouplers * 3) + (numDonors * 4) + numDasAntennas + numBDAs======================== */
                    //$dasconnector =3 * $splittercount + $dasant + 1; formula old 21-04
                    $dasconnector = ($splittercount * 3) + ($donorantcount * 4) + $dasantcount + 1;//FIP6

                    /// Buscamos la DB
                    /*
                    if( 1/2W RSSI es mayor al margen minimo)
                            select '%27%'
                        else if( 2W RSSI es mayor al margen minimo)
                            select '%33%'
                        else
                            nada error
                        
                        if (ClassA)
                            select '%A'
                        else
                            select '%B'
                        
                        if (Banda700&&Banda800)
                            select '%-7S%'
                        elseif(Banda700)
                            select '%-7%' and NO '%-7S%'
                        else if(Banda800)
                                select '%-S%' and NO '%-7S%'
                            
                        if(AC)
                            select '%-A-%'
                        else
                            select '%-D-%'
    */
                    $maswhererssi="";
                 
                    if (  $rssimobile27 > $v_txtmindlcoverage)
                    {
                        $maswhererssi= "  AND fiplexpartnro LIKE '%27%'";
                    }
                    else
                    {
                        if (  $rssimobile33 > $v_txtmindlcoverage)
                        {
                            $maswhererssi= "  AND fiplexpartnro LIKE '%33%'";
                        }

                    }

                    //$maswhereclas="";
                    $maswhereclas = "  AND fiplexpartnro LIKE '%B'";
                    //FIP183
                    /* if( $v_txttypeclass=="A")
                    {
                        $maswhereclas = "  AND fiplexpartnro LIKE '%A'";
                    }
                    if( $v_txttypeclass=="B")
                    {
                        $maswhereclas = "  AND fiplexpartnro LIKE '%B'";
                    } */
                      $maswherepwr = "";
                    if ( $v_txtbdamainpwr=="AC")
                    {
                        $maswherepwr = "  AND fiplexpartnro LIKE '%-A-%'";
                    }
                    if ( $v_txtbdamainpwr=="DC")
                    {
                        $maswherepwr = "  AND fiplexpartnro LIKE '%-D-%'";
                    }

                    $maswhere700800="";
                    if ( $channelcount700 > 0 )
                    {
                            if ( $channelcount800 > 0) // SI ES 700/800
                            {
                                $maswhere700800 = "  AND fiplexpartnro LIKE '%-7S%'";
                            
                            }
                            else // SI ES 700
                            {
                                //LC
                            /*  $maswhere700800 = "  AND fiplexpartnro in ('DH7S-A-733A','DH7S-D-733A',' DH7S-A-727A','DH7S-D-727A','DH7S-A-733B','DH7S-D-733B') ";
                                */
                                //$maswhere700800 = "  AND fiplexpartnro in ('HONBDA-A-733A','HONBDA-D-733A',' HONBDA-A-727A','HONBDA-D-727A','HONBDA-A-733B','HONBDA-D-733B') ";
                                $maswhere700800 = "  AND fiplexpartnro LIKE '%-7S%'";

                                //$maswhererssi= "  AND fiplexpartnro LIKE '%33%'";
                            }
                    }
                    else
                    {
                        if ( $channelcount800 > 0) // SI ES 800
                        {
                            //LC
                            /* $maswhere700800 = "  AND fiplexpartnro in ('DH7S-A-S33A','DH7S-D-S33A',' DH7S-A-S27A','DH7S-D-S27A','DH7S-A-S33B','DH7S-D-S33B') ";
                             $maswhere700800 = "  AND fiplexpartnro in ('HONBDA-A-S33A','HONBDA-D-S33A',' HONBDA-A-S27A','HONBDA-D-S27A','HONBDA-A-S33B','HONBDA-D-S33B') ";
                           */
                          $maswhere700800 = "  AND fiplexpartnro LIKE '%-7S%'";
                            //$maswhererssi= "  AND fiplexpartnro LIKE '%33%'";
                        }
                    }

               //     if ( $channelcount800)

                    $maswhereidbandgroup = " and idgroupband = ".$qidgrupbandes;
                    //Armamos el select para buscar.bda 
                    $query_buscard ="SELECT familyname, fiplexpartnro, honeywellnro, deadtime, idgroupband, idband, idproduct, idbranch, migrate, gain, idauto, gamewellfcipartnro, silentknightpartnro, notipartnumber, fiplexdatasheet
                    FROM flexbda_products_budget where migrate = 'Y'". $maswhererssi.$maswherepwr.$maswhereclas.$maswhereidbandgroup.$maswhere700800  ;
    ////$maswhereclas.
   /// echo   $query_buscard;
    
                    $BDA_POSIBLE="";
                    if ( $qidgrupbandes==11)
                    {
                        $dataencontrados = $connect->query($query_buscard)->fetchAll();	
                        foreach ($dataencontrados as $rowmmcus) {			
                         
                            $BDA_POSIBLE = $rowmmcus['fiplexpartnro'];
                         
                        }
                    }
                     if ( $qidgrupbandes==13)
                    {
                        $BDA_POSIBLE = "MM_UHFVHF"; 
                    }
                      
                                            

                        //// OJO SETEAR PARA UHF VHF
                       

              ///      echo $query_buscard ;
                  //  echo "datos:".  $BDA_POSIBLE;
                        //flexbdahoneywell_result
                        $sentenciadatosoutputdel = $connect->prepare("delete from  flexbdahoneywell_result where  idproject=:idproject ");
                        $sentenciadatosoutputdel->bindParam(':idproject', $v_idmaxidproject);								
                        
                        $sentenciadatosoutputdel->execute();


                    ///    echo "aca Paso band 22 33 audit calc2 3 4 5 6 7";
                        //exit(); 

                    // INSERTAMOSSS
                    $sentenciadatosoutput = $connect->prepare("INSERT INTO public.flexbdahoneywell_result( idproject, idrev, channelcount, comcovarea, vpl, downlk_bdadlinput_12wbda, downlk_maxbdapower_12wbda, downlk_dasloss_12wbda, downlk_antennaout_12wbda, downlk_pathloss_12wbda, downlk_rssimobile_12wbda, downlk_bdadlinput_2wbda, downlk_maxbdapower_2wbda, downlk_dasloss_2wbda, downlk_antennaout_2wbda, downlk_pathloss_2wbda, downlk_rssimobile_2wbda, uplk_mobile_txpwr, uplk_dasulinput, uplk_bdaulinput, uplk_bdaupout, uplk_donorulout, uplk_freespaceloss, uplk_sigdonnorsite, resul_donorantenncount, resul_lighprotec, resul_donorcoaxcable, resul_donorcoaxconnectcount, resul_directcouplersplitter, resul_dascoaxconnect, resul_dascoaxcable, resul_jumpercablecount, resul_dasantennacount, resul_bda_output12w , resul_bda_output2w ,result_bdasuggestion )  VALUES (:idproject, :idrev, :channelcount, :comcovarea, :vpl, :downlk_bdadlinput_12wbda, :downlk_maxbdapower_12wbda, :downlk_dasloss_12wbda, :downlk_antennaout_12wbda, :downlk_pathloss_12wbda, :downlk_rssimobile_12wbda, :downlk_bdadlinput_2wbda, :downlk_maxbdapower_2wbda, :downlk_dasloss_2wbda, :downlk_antennaout_2wbda, :downlk_pathloss_2wbda, :downlk_rssimobile_2wbda, :uplk_mobile_txpwr, :uplk_dasulinput, :uplk_bdaulinput, :uplk_bdaupout, :uplk_donorulout, :uplk_freespaceloss, :uplk_sigdonnorsite, :resul_donorantenncount, :resul_lighprotec, :resul_donorcoaxcable, :resul_donorcoaxconnectcount, :resul_directcouplersplitter, :resul_dascoaxconnect, :resul_dascoaxcable, :resul_jumpercablecount, :resul_dasantennacount,  :resul_bda_output12w , :resul_bda_output2w ,:result_bdasuggestion );");


                       $sentenciadatosoutput->bindParam(':idproject', $v_idmaxidproject);								
                    $sentenciadatosoutput->bindParam(':idrev', $v_idprojectr);
                    $sentenciadatosoutput->bindParam(':channelcount',  $Channel_Count);
                    $sentenciadatosoutput->bindParam(':comcovarea',  $Area_Formula );
                    $sentenciadatosoutput->bindParam(':vpl', $vpl);

                    $sentenciadatosoutput->bindParam(':downlk_bdadlinput_12wbda', $BDA_DL_Input_Formula_12W);
                    $sentenciadatosoutput->bindParam(':downlk_maxbdapower_12wbda', $Max_BDA_Power_CH_12W);
                    
                    $sentenciadatosoutput->bindParam(':downlk_dasloss_12wbda', $daslossparamm);
                    $sentenciadatosoutput->bindParam(':downlk_antennaout_12wbda', $dasantdloutput27);
                    $sentenciadatosoutput->bindParam(':downlk_pathloss_12wbda', $pathloss);
                    $sentenciadatosoutput->bindParam(':downlk_rssimobile_12wbda', $rssimobile27);
                    $sentenciadatosoutput->bindParam(':downlk_bdadlinput_2wbda', $BDA_DL_Input_Formula_2W);
                    $sentenciadatosoutput->bindParam(':downlk_maxbdapower_2wbda', $Max_BDA_Power_CH_2W);
                    $sentenciadatosoutput->bindParam(':downlk_dasloss_2wbda', $daslossparamm);
                    $sentenciadatosoutput->bindParam(':downlk_antennaout_2wbda', $dasantdloutput33);
                    $sentenciadatosoutput->bindParam(':downlk_pathloss_2wbda', $pathloss);
                    $sentenciadatosoutput->bindParam(':downlk_rssimobile_2wbda', $rssimobile33);

                    $sentenciadatosoutput->bindParam(':uplk_mobile_txpwr', $mobtxpower);
                    $sentenciadatosoutput->bindParam(':uplk_dasulinput', $dasulinput);
                    $sentenciadatosoutput->bindParam(':uplk_bdaulinput', $bdaulinput);

                    $sentenciadatosoutput->bindParam(':uplk_bdaupout', $bdauloutput);
                    $sentenciadatosoutput->bindParam(':uplk_donorulout', $donoruloutput);
                    $sentenciadatosoutput->bindParam(':uplk_freespaceloss', $freespaceloss);
                    $sentenciadatosoutput->bindParam(':uplk_sigdonnorsite', $sigatdonorsite);
                    $sentenciadatosoutput->bindParam(':resul_donorantenncount', $donorantcount);
                    $sentenciadatosoutput->bindParam(':resul_lighprotec', $lightningprotection);
                    $sentenciadatosoutput->bindParam(':resul_donorcoaxcable', $donorcoaxlength);
                    $sentenciadatosoutput->bindParam(':resul_donorcoaxconnectcount', $donorcoaxconnector);
                    $sentenciadatosoutput->bindParam(':resul_directcouplersplitter', $splittercount);
                    $sentenciadatosoutput->bindParam(':resul_dascoaxconnect', $dasconnector);
                    $sentenciadatosoutput->bindParam(':resul_dascoaxcable', $coaxlength);
                    $sentenciadatosoutput->bindParam(':resul_jumpercablecount', $jumpercount);
                    $sentenciadatosoutput->bindParam(':resul_dasantennacount', $dasantcount);

                    $sentenciadatosoutput->bindParam(':resul_bda_output12w', $bdaoutdlch27);
                    $sentenciadatosoutput->bindParam(':resul_bda_output2w', $bdaoutdlch33);

                    $sentenciadatosoutput->bindParam(':result_bdasuggestion', $BDA_POSIBLE);
                
                    
                    
                   $sentenciadatosoutput->execute();

                   
                   

                   if ( $v_stateproj_foremails == "P")
                   {
                       /// Mandamos los emails de Avisos
                
                    $vprject = $v_idmaxidproject; ///
                    $vaccion = 'D'; ///
                    $v_natt = $filenamepdfnueva; ///
                    $activa = $v_v_txttoken; ///
                    
                    
                    
                    require_once ('downloadprojectpdf.php');


                    ///  echo "----aca Paso band 22 33 audit calc2 3 4 5 6 7 8 9 ";

                    
                       require ("configsendmail.php"); 

                      
                       if (  $v_email_customer  <> "")
                       {
                         ///  $mail->addAddress($v_email_customer, $v_name_customer);
                           if (filter_var($v_email_customer, FILTER_VALIDATE_EMAIL)) {
                            $mail->addAddress(str_replace('_fiplex@', '@', $v_email_customer),$v_email_customer);
                         }

                       }
                       if (  $v_email_pm  <> "")
                       {
                          $mail->addCC(str_replace('_fiplex@', '@', $v_email_pm), $v_name_pm);
                       }
                       
                       if($entornoActual !='DEV' && $entornoActual!='TST')
                       
                       {
                            $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_uploaded' and activeemail = 'Y'  ";
                            $datanotif = $connect->query($sqlnotif)->fetchAll();	
                            $destinatariosMail;

                                foreach ($datanotif as $rownt)
                                {
                                    ///  $mail->addBCC($rownt['emailnoti'], $rownt['emailnoti']);
                                    if (filter_var($rownt['emailnoti'], FILTER_VALIDATE_EMAIL)) {
                                        $mail->addCC(str_replace('_fiplex@', '@', $rownt['emailnoti']), $rownt['emailnoti']);
                                        $mail->addBCC('tareasikarus@gmail.com', 'TI');
                                        $destinatariosMail = $destinatariosMail.$rownt['emailnoti'].";";
                                    }

                                }
                                
                            /* $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                            $mail->addBCC('agustin.corigliano@fiplex.com', 'Agus copia');
                            $mail->addBCC('luchianocastro@gmail.com', 'Control'); */

                        }else{

                            $mail->addBCC('tareasikarus@gmail.com', 'TI');

                        }
                       
                       //$destinatariosInternos = 'marco.moretti@fiplex.com'.'agustin.corigliano@fiplex.com';
                       $mail->IsHTML(true);
                       $emailSubject = "FLEXBDA::New Registered Project :  #F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."-".$v_txtnomprojdb."-".$v_name_customer ;
                       $mail->Subject = $emailSubject;
                       
                       $emailBody = "<p><img src='http://flexbda.com/honeywell_logomail_final.png'> </p><hr style=' border: 1px solid red;'><b>Dear users</b><br><br>We want to inform you that your project:<b> ".$v_txtnomprojdb."</b> was submitted for processing.<br><br>Attached is a copy of your project submission for reference.<br><br>NOTE:<br>  
                       <ul>
                            <li>Single Building projects with BDA: Standard estimates turnaround time is 1-2 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.</li>
                            <li>Multi-building or Large projects with Fiber DAS: Standard estimates turnaround time is 3 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.</li>
                        </ul>
                        <br>
                        
                        Best Regards <br><hr><b>The FLEXBDA Team</b><br>
                        ";
                       $mail->Body = $emailBody;

                       //Definimos AltBody por si el destinatario del correo no admite email con formato html 
                       $emailAltBody = "Dear users,\n\n We want to inform you that your project: ".$v_txtnomprojdb." was submitted for processing.\r\n Attached is a copy of your project submission for reference.\n\n NOTE: \n - Single Building projects with BDA: Standard estimates turnaround time is 1-2 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.\n - Multi-building or Large projects with Fiber DAS: Standard estimates turnaround time is 3 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.\r\n ********  \r\n ***** Best Regards The FLEXBDA Team";
                       $mail->AltBody = $emailAltBody;
  

                // MAIL to  BD
 
                            try {
                                $regmail = $connect->prepare("INSERT INTO public.flexbdahoneywell_emails( idproject, datecreate, email_type, email_from, to_customer, to_cc, to_cco, email_subject, alt_body, body , attachment, urlgeneratepdf)	VALUES (:idproject, now(), 'projectecreate P', 'estimation@flexbda.com', :to_customer, :to_cc, :to_cco, :email_subject, :alt_body, :body , :attachment, :urlgeneratepdf);");
                                $regmail->bindParam(':idproject', $v_idmaxidproject);
                                //$regmail->bindParam(':email_type', 'projectecreate');
                                //$regmail->bindParam(':email_from', "estimation@flexbda.com");
                                $regmail->bindParam(':to_customer', $v_email_customer);
                                $regmail->bindParam(':to_cc', $destinatariosMail);  
                                $regmail->bindParam(':to_cco', $destinatariosInternos);
                                $regmail->bindParam(':email_subject', $emailSubject);
                                $regmail->bindParam(':alt_body', $emailAltBody);
                                $regmail->bindParam(':attachment', $emailAttachment);
                                $regmail->bindParam(':body', $emailBody);
                                $regmail->bindParam(':urlgeneratepdf', $urlgeneratepdf);
                                $regmail->execute();
                                
                            } 
                            catch (PDOException $e) 
                            {
                            //	$msjerr= "Syntax Error MM: ".$e->getMessage();	
                            }

                            //   $regmail33 = $connect->prepare("INSERT INTO public.flexbdahoneywell_emails(	idproject, datecreate, email_type, email_from, to_customer, to_cc, to_cco, email_subject, alt_body, body, attachment)	VALUES 
                            //   (".$v_idmaxidproject.", now(), 'projectecreate222222', 'estimation@flexbda.com','$v_email_customer', '$destinatariosMail', '$destinatariosInternos', '$emailSubject', '$emailAltBody', 'emailBody','$emailAttachment');");
                            //   $regmail33->execute();

                // END MAIL to  BD
                    $emailAttachment="pdfattach/".trim($filenamepdfnueva).".pdf";
                    
                    if ( file_exists($emailAttachment) )
                    {
                        $mail->AddAttachment($emailAttachment); 
                    }

                    $mail->Send();
                    
}

                 
                 ///  echo "----aca Paso band 22 33 audit calc2 3 4 5 6 7 8 9 10";
                
                   
                   if ( $v_stateproj_foremails == "R") 
                   {

                    // GENERO PDF PARA ADJUNTAR 
                    $vprject = $v_idmaxidproject; ///
                    $vaccion = 'D'; ///
                    $v_natt = $filenamepdfnueva; ///
                    $activa = $v_v_txttoken; ///
                    
                    require_once ('downloadprojectpdf.php');

                    ///  echo "----aca Paso band 22 33 audit calc2 3 4 5 6 7 8 9 ";

                    require ("configsendmail.php"); 
                      
                       if (  $v_email_customer  <> "")
                       {
                         ///  $mail->addAddress($v_email_customer, $v_name_customer);
                           if (filter_var($v_email_customer, FILTER_VALIDATE_EMAIL)) {
                            $mail->addAddress(str_replace('_fiplex@', '@', $v_email_customer),$v_email_customer);
                         }

                       }
                       if (  $v_email_pm  <> "")
                       {
                          $mail->addCC(str_replace('_fiplex@', '@', $v_email_pm), $v_name_pm);
                       }
                        
    
                        /* $cc = curl_init("https://www.flexbda.com/viewprojpdf.php?activate=".$v_v_txttoken."&idp=".$v_idmaxidproject."&idcc=D&natt=".$filenamepdfnueva);  
                        $urlgeneratepdf = "https://www.flexbda.com/viewprojpdf.php?idp=".$v_idmaxidproject."&natt=".$filenamepdfnueva;
                        $url_content =  curl_exec($cc);  
                       curl_close($cc); */

                       /// Mandamos los emails de Avisos

                       if($entornoActual !='DEV' && $entornoActual!='TST')
                       
                       {
                            $sqlnotif="select * FROM  flexbdahoneywell_notifications where typenotif = 'project_revision' and activeemail = 'Y'  ";
                            $datanotif = $connect->query($sqlnotif)->fetchAll();	
                            $destinatariosMail;

                                foreach ($datanotif as $rownt)
                                {
                                    ///  $mail->addBCC($rownt['emailnoti'], $rownt['emailnoti']);
                                    if (filter_var($rownt['emailnoti'], FILTER_VALIDATE_EMAIL)) {
                                        $mail->addCC(str_replace('_fiplex@', '@', $rownt['emailnoti']), $rownt['emailnoti']);
                                        $destinatariosMail = $destinatariosMail.$rownt['emailnoti'].";";
                                    }

                                }
                                
                            $mail->addBCC('marco.moretti@fiplex.com', 'Marco');
                            $mail->addBCC('agustin.corigliano@fiplex.com', 'Agus copia');
                            $mail->addBCC('luchianocastro@gmail.com', 'Control');
                            

                        }else{

                            $mail->addBCC('tareasikarus@gmail.com', 'TI');

                        }
                         
                         $destinatariosInternos = 'marco.moretti@fiplex.com'.'agustin.corigliano@fiplex.com';
                         $mail->IsHTML(true);  
                         
                         $emailSubject = "FLEXBDA::New Project revision registered:  #F". str_pad(  $v_idmaxidproject , 4, "0", STR_PAD_LEFT)."-".$v_txtnomprojdb."-".$v_name_customer ;
                         $mail->Subject = $emailSubject;
                         
                         $emailBody = "<p><img src='http://flexbda.com/honeywell_logomail_final.png'> </p><hr style=' border: 1px solid red;'><b>Dear users</b><br>We want to inform you that a new revision of the project: <b> ".$v_txtnomprojdb."</b> was correctly registered.<br><br> to view it you must enter our website with your username and password or download the pdf from the following link <a href='https://www.flexbda.com/viewprojpdf.php?activate=".$v_v_txttoken."&idp=".$v_idmaxidproject."' target='_blank'> click here.</a><br><br>NOTE:  Please note this is an auto-generated notification. Please do not reply to this email, this email id is not monitored. If you have any questions, please reach out to your Honeywell local sales manager.<br>Single Building projects with BDA:  Standard estimates turnaround time is 3 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.<br>
                            Projects with Fiber DAS:  Standard estimates turnaround time is 5 business days if all the inputs required to generate the estimate are provided. Missing information can cause delays.<br>
                            <br>FLEXBDA.com is currently being incorrectly blocked by Google on Chrome, FireFox browsers. Please use Microsoft Edge browser to access flexbda.com. We are working to resolve the issue with Google and hope for a resolution soon.We apologize for the inconvenience and appreciate the patience as we work through this with Google support.
                            <br>
                            <br> Best Regards <br><hr><b>The FLEXBDA Team</b><br>
                            ";
                         $mail->Body = $emailBody;
                         //Definimos AltBody por si el destinatario del correo no admite email con formato html 

                         $emailAltBody = "Dear users, We want to inform you that a new revision of the project: ".$v_txtnomprojdb." was correctly registered.\r\n to view it you must enter our website with your username and password or download the pdf from the following link:  https://www.flexbda.com/viewprojpdf.php?activate=".$v_v_txttoken."&idp=".$v_idmaxidproject." \r\n ********  \r\n ***** Best Regards The FLEXBDA Team";
                         $mail->AltBody = $emailAltBody;
                            ///
                            

                        // MAIL to  BD
                        
                        try {
                              $emailAttachment='prueba';                  
                            $regmail = $connect->prepare("INSERT INTO public.flexbdahoneywell_emails( idproject, datecreate, email_type, email_from, to_customer, to_cc, to_cco, email_subject, alt_body, body , attachment, urlgeneratepdf)	VALUES (:idproject, now(), 'projectecreate R', 'estimation@flexbda.com', :to_customer, :to_cc, :to_cco, :email_subject, :alt_body, :body , :attachment, :urlgeneratepdf);");
                                $regmail->bindParam(':idproject', $v_idmaxidproject);
                                //$regmail->bindParam(':email_type', 'projectecreate');
                                //$regmail->bindParam(':email_from', "estimation@flexbda.com");
                                $regmail->bindParam(':to_customer', $v_email_customer);
                                $regmail->bindParam(':to_cc', $destinatariosMail);  
                                $regmail->bindParam(':to_cco', $destinatariosInternos);
                                $regmail->bindParam(':email_subject', $emailSubject);
                                $regmail->bindParam(':alt_body', $emailAltBody);
                                $regmail->bindParam(':attachment', $emailAttachment);
                                $regmail->bindParam(':body', $emailBody);
                                $regmail->bindParam(':urlgeneratepdf', $urlgeneratepdf);
                                $regmail->execute();
                                
                            } 
                            catch (PDOException $e) 
                            {
                            //	$msjerr= "Syntax Error MM: ".$e->getMessage();	
                            }

                            //   $regmail33 = $connect->prepare("INSERT INTO public.flexbdahoneywell_emails(	idproject, datecreate, email_type, email_from, to_customer, to_cc, to_cco, email_subject, alt_body, body, attachment)	VALUES 
                            //   (".$v_idmaxidproject.", now(), 'projectecreate R22222', 'estimation@flexbda.com','$v_email_customer', '$destinatariosMail', '$destinatariosInternos', '$emailSubject', '$emailAltBody', 'emailBody','$emailAttachment');");
                            //   $regmail33->execute();

                        // END MAIL to  BD
                         $emailAttachment ="pdfattach/".trim($filenamepdfnueva).".pdf";

                         if ( file_exists($emailAttachment) )
                         {
                             $mail->AddAttachment($emailAttachment);    
                         }
                         
                         $mail->Send();
                 
                   }


                }
			
				
					
                        
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
