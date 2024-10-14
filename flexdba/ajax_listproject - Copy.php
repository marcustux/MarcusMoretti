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
	$v_txtnomprojdb= $_REQUEST['v_txtnomprojdb'];
    $v_txtaddressbuild = $_REQUEST['v_txtaddressbuild'];
    if ($v_txtaddressbuild=="")
    {
        $v_txtaddressbuild=null;
    }
    $v_stateproj = $_REQUEST['v_stateproj'];

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

    $v_txtfloortype1countavg = $_REQUEST['v_txtfloortype1countavg'];
    if ($v_txtfloortype1countavg=="")
    {
        $v_txtfloortype1countavg=null;
    }

    $v_txtfloortype2count = $_REQUEST['v_txtfloortype2count'];
    if ($v_txtfloortype2count=="")
    {
        $v_txtfloortype2count=null;
    }

    $v_txtfloortype2countavg = $_REQUEST['v_txtfloortype2countavg'];
    if ($v_txtfloortype2countavg=="")
    {
        $v_txtfloortype2countavg=null;
    }

    $v_avgfloorheight = $_REQUEST['v_avgfloorheight'];
    if ($v_avgfloorheight=="")
    {
        $v_avgfloorheight=null;
    }

    $v_txtrfenvironment = $_REQUEST['v_txtrfenvironment'];
    if ($v_txtrfenvironment=="")
    {
        $v_txtrfenvironment=null;
    }


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

	$vconcero=0;
		$vvacio="";

    
    $v_idproject = 1;

    $sql = $connect->prepare("SELECT idband, description, fstartul, fstopul, fstartdl, fstopdl 	FROM idband where active = 'Y'");
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
       
	
	try {

                $idcustom=		$_SESSION["flexbdai"] ;
                $idcustomuser=		$_SESSION["flexbdaa"] ;
                $esrevision="N";

                if ( $v_stateproj <> "R")
                {
                    $sentenciahonwywell = $connect->prepare("UPDATE public.flexbdahoneywell
                    SET  datecreate=now(), active=:active, projectname=:projectname, address=:addressdat, coordinateslat=:coordinateslat, coordinateslon=:coordinateslon, floortype1count=:floortype1count, floortype1countavg=:floortype1countavg, floortype2count=:floortype2count, floortype2countavg=:floortype2countavg, avgfloorheight=:avgfloorheight, rfenvironment=:rfenvironment, coverageneeded=:coverageneeded, 
                    numberchannelsxband=:numberchannelsxband, simplexconfig=:simplexconfig, covreg_donorrssi=:covreg_donorrssi, covreg_mindlcoverage=:covreg_mindlcoverage, covreg_minulcoverage=:covreg_minulcoverage,
                     covreg_designmargin=:covreg_designmargin, covreg_indoorantrad=:covreg_indoorantrad, covreg_mobtxpower=:covreg_mobtxpower, covreg_distdonorsite=:covreg_distdonorsite, covreg_donorantgain=:covreg_donorantgain,
                      covreg_indoorantgain=:covreg_indoorantgain, covreg_donorcoaxloss=:covreg_donorcoaxloss, covreg_indoorcoaxloss=:covreg_indoorcoaxloss, bda_floordba=:bda_floordba, bda_filter=:bda_filter, dba_powerreq=:dba_powerreq,
                       bbu_req=:bbu_req, alarm_brand=:alarm_brand, alarm_install_facp=:alarm_install_facp, alarm_req_annuciator=:alarm_req_annuciator, dr_requierd=:dr_requierd, dr_ahjpackage=:dr_ahjpackage, dr_instalationtype=:dr_instalationtype,
                        dr_mat_extwall=:dr_mat_extwall, dr_mat_intwall=:dr_mat_intwall, dr_mat_glasstype=:dr_mat_glasstype, dr_mat_rooftype=:dr_mat_rooftype, dr_firecontrolroomloc=:dr_firecontrolroomloc,
                         dr_bdaeqlocation=:dr_bdaeqlocation, dr_verticalriserloc=:dr_verticalriserloc, dr_donorantloc=:dr_donorantloc, dr_special=:dr_special
                      WHERE idproject= :idmaxidproject and  idrev= :idrev ");
                    
                   
                }
                else
                {
                                //si es rev.. busco la max.
                                $query_listaproj ="select  coalesce( max(idrev),0) + 1 as sss from flexbdahoneywell where idproject =".$vvidproject;
                                $maxidrev = 0;
                                $data = $connect->query($query_listaproj)->fetchAll();	
                                    foreach ($data as $row) {			
                                        $v_idprojectr = $row['sss'];

                                    }
                                    $v_stateproj='P';
                                 //   echo "SI";
                                 $esrevision="S";
                        $sentenciahonwywell = $connect->prepare("INSERT INTO flexbdahoneywell (  idproject, idrev, idcustomers, idusercustomers, datecreate, active, projectname, address, coordinateslat, coordinateslon, floortype1count, floortype1countavg, floortype2count, floortype2countavg, avgfloorheight, rfenvironment, coverageneeded, numberchannelsxband, simplexconfig, covreg_donorrssi, covreg_mindlcoverage, covreg_minulcoverage, covreg_designmargin, covreg_indoorantrad, covreg_mobtxpower, covreg_distdonorsite, covreg_donorantgain, covreg_indoorantgain, covreg_donorcoaxloss, covreg_indoorcoaxloss, bda_floordba, bda_filter, dba_powerreq, bbu_req, alarm_brand, alarm_install_facp, alarm_req_annuciator, dr_requierd, dr_ahjpackage, dr_instalationtype, dr_mat_extwall, dr_mat_intwall, dr_mat_glasstype, dr_mat_rooftype, dr_firecontrolroomloc, dr_bdaeqlocation, dr_verticalriserloc, dr_donorantloc, dr_special, seeddraft)  VALUES
                         (:idmaxidproject, :idrev, :idcustomers, :idusercustomers, now(), :active, :projectname, :addressdat, :coordinateslat, :coordinateslon, :floortype1count, :floortype1countavg, :floortype2count, :floortype2countavg, :avgfloorheight, :rfenvironment, :coverageneeded, :numberchannelsxband, :simplexconfig, :covreg_donorrssi, :covreg_mindlcoverage, :covreg_minulcoverage, :covreg_designmargin, :covreg_indoorantrad, :covreg_mobtxpower, :covreg_distdonorsite, :covreg_donorantgain, :covreg_indoorantgain, :covreg_donorcoaxloss, :covreg_indoorcoaxloss, :bda_floordba, :bda_filter, :dba_powerreq, :bbu_req, :alarm_brand, :alarm_install_facp, :alarm_req_annuciator, :dr_requierd, :dr_ahjpackage, :dr_instalationtype, :dr_mat_extwall, :dr_mat_intwall, :dr_mat_glasstype, :dr_mat_rooftype, :dr_firecontrolroomloc, :dr_bdaeqlocation, :dr_verticalriserloc, :dr_donorantloc, :dr_special, :seeddraft); ");

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
                
                if (    $esrevision=="S")
                {
                    $sentenciahonwywell->bindParam(':seeddraft', $v_seeddraft);
                }
                
            
                if($v_txtnomprojdb  <>"")
                {
                $sentenciahonwywell->execute();   
                $return_result_insert="ok"; 
                
                    //ahora insertamos los datos de BAND Y CHANNEL
                    $porciones = explode("#", $tabla_channel_quantity);
                    $vidch=1;
                    $vtypedata="CHANNEL";

                    $sentenciachb = $connect->prepare(" delete from flexbdahoneywell_band where  idproject = :idproject and  idrev = :idrev ");
                    
                    $sentenciachb->bindParam(':idproject', $v_idmaxidproject);
                    $sentenciachb->bindParam(':idrev', $v_idprojectr);	                
                        
                    $sentenciachb->execute();


                      foreach($porciones as $elcanaluldl) {
                    //       echo "el canal:".$elcanaluldl;
                           $separa_ULDL = explode("|", $elcanaluldl);
                    //   	echo "dL".$separa_ULDL[0]."--uL".$separa_ULDL[1]."<br>";
                           if ($elcanaluldl <> "")
                           {
                            $vvtypedata="CHANNEL";
                           
                               $vnotech  = $_REQUEST['txtnotechanel']; //
                               // insetamos channel detalle PO
                               $sentenciach = $connect->prepare("INSERT INTO public.flexbdahoneywell_band(idproject, idrev, idband, nombbandtemp, ulstart, ulstop, dlstart, dlstop, typeref, ulch, dlch)
                               VALUES (:idproject,:idrev, :idband, :nombbandtemp, :ulstart, :ulstop, :dlstart, :dlstop, :typeref, :ulch, :dlch);");
                               
                               $sentenciach->bindParam(':idproject', $v_idmaxidproject);
                               $sentenciach->bindParam(':idrev', $v_idprojectr);								
                               $sentenciach->bindParam(':idband', $vconcero);
                               $sentenciach->bindParam(':nombbandtemp', $vvacio);
                               $sentenciach->bindParam(':ulstart', $vconcero);
                               $sentenciach->bindParam(':ulstop', $vconcero);
                               $sentenciach->bindParam(':dlstart',$vconcero  );
                               $sentenciach->bindParam(':dlstop', $vconcero);
                               $sentenciach->bindParam(':typeref', $vvtypedata);
                               $sentenciach->bindParam(':ulch', $separa_ULDL[0]);
                               $sentenciach->bindParam(':dlch', $separa_ULDL[1]);
                           
                               
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
                                       //	echo $key . ":  " . $value['idband'] . "-" . $value['fstartul']. "-" . $value['fstopul']. "-" . $value['fstartdl']. "-" . $value['fstopdl'] . "<br>";
                                           if ( $value['fstartdl'] == $separa_UNIT[1]  && $value['fstopdl'] == $separa_UNIT[2] && $value['fstartul'] == $separa_UNIT[3] && $value['fstopul'] == $separa_UNIT[4])
                                           {
                                               $vvidband = $value['idband'];
                                               $tempnombband =  $value['nombreband'];
                                               
                                           }
                                   }
                                   $tempnombband  =   $tempnombband ."#". $separa_UNIT[0];
                                   
                                   $sentenciachband = $connect->prepare("INSERT INTO public.flexbdahoneywell_band(idproject, idrev, idband, nombbandtemp, ulstart, ulstop, dlstart, dlstop, typeref, ulch, dlch)
                                   VALUES (:idproject, :idrev, :idband, :nombbandtemp, :ulstart, :ulstop, :dlstart, :dlstop, :typeref, :ulch, :dlch);");
                                   
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
                }
			
				
					
                        
				} 
				catch (PDOException $e) 
				{
					
				
					$msjerr= "Syntax Error MM: ".$e->getMessage();
						
					
				}
	

 echo(json_encode(["resultiu"=>$return_result_insert,"erromsj"=>$msjerr]));

?>
