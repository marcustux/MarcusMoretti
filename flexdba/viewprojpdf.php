<?php
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

include("db_conectflexbdainit.php"); 

session_start();
                    
                    ////Search information x idproject.
                    $vprject = $_REQUEST['idp']; ///
                    $vaccion = $_REQUEST['idcc']; ///
                    $v_natt = $_REQUEST['natt']; ///
                    $activa = $_REQUEST['activate']; ///
                    $designtrans = $_REQUEST['destran']; ///
                  
                  //  echo $vprject;
                 //   exit();
                 
              /*
                       $rstmm = $connect->prepare("SELECT flexbdahoneywell.*, esdchanneldealer, brandbda FROM flexbdahoneywell inner join customers_userewbfas
                      on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus 
                      inner join flexbda_esddealer_alarmpanel_brandbda
on flexbda_esddealer_alarmpanel_brandbda.esddealer = customers_userewbfas.esdchanneldealer and 
flexbda_esddealer_alarmpanel_brandbda.alarmpanel = flexbdahoneywell.alarm_brand
 WHERE idproject= :idproject and idrev = (select max(idrev) from flexbdahoneywell where   idproject= :idproject  )  and tokengoogle = :tokengoogle");
              */
                   
                      $rstmm = $connect->prepare("SELECT flexbdahoneywell.*, esdchanneldealer, brandbda, nameuserfull, usermail, flexbdahoneywell.active as activeproj FROM flexbdahoneywell inner join customers_userewbfas
                      on flexbdahoneywell.idusercustomers = customers_userewbfas.idusercus 
                      inner join flexbda_esddealer_alarmpanel_brandbda
on flexbda_esddealer_alarmpanel_brandbda.esddealer = customers_userewbfas.esdchanneldealer and 
flexbda_esddealer_alarmpanel_brandbda.alarmpanel = flexbdahoneywell.alarm_brand
 WHERE idproject= :idproject and idrev = (select max(idrev) from flexbdahoneywell where   idproject= :idproject  )  ");
                      $rstmm->bindParam(':idproject', $vprject);	
                 //     $rstmm->bindParam(':tokengoogle', $activa);		
               
                    
              
                    $rstmm->execute();
                    $resultado = $rstmm->fetchAll();		
                    
                    foreach ($resultado as $rowheaders) 
																{
                                  
                                  $vprojectname = $rowheaders['projectname'];
                                  $vidrev = $rowheaders['idrev'];
                                
                                  $projectdraft = $rowheaders['idproject'];
                                    $projectdraftrev = $rowheaders['idrev'];
                                    $psswdtkkey  = $rowheaders['seeddraft'];

                                    $nameuserfull = $rowheaders['nameuserfull'];
                                    
                                    $nameuserfullusermail = $rowheaders['usermail'];

                                    $vactive  = $rowheaders['active'];
                                    $vactiveproy  = $rowheaders['activeproj'];
                                    $v_name_marca_brandbda = $rowheaders['brandbda'];

                                    $esdchanneldealer = $rowheaders['esdchanneldealer'];
                                    $namedellerchannel =  str_replace("_"," ", $rowheaders['esdchanneldealer']);
                                 
                                    $GLOBALS["a"]=$esdchanneldealer;

                                        $vprojectname = $rowheaders['projectname'];
                                        $vaddress = $rowheaders['address'];
                                        $vcoordinateslat = $rowheaders['coordinateslat'];
                                        $vidcustomers = $rowheaders['idcustomers'];
                                        $vidusercustomers = $rowheaders['idusercustomers'];

                                        $vtxtfloortype1count = $rowheaders['floortype1count'];
                                        $vtxtfloortype1countavg = $rowheaders['floortype1countavg'];

                                        $vtxtfloortype2count = $rowheaders['floortype2count'];
                                        $vtxtfloortype2countavg = $rowheaders['floortype2countavg'];
                                        $vdatecreate = $rowheaders['datecreate'];
                                        $vcoordinateslon = $rowheaders['coordinateslon'];
                                        $vavgfloorheight = $rowheaders['avgfloorheight'];
                                        $vrfenvironment = $rowheaders['rfenvironment'];


                                    
                                        $vcoverageneeded = $rowheaders['coverageneeded'];
                                        $vnumberchannelsxband = $rowheaders['numberchannelsxband'];
                                        $vsimplexconfig = $rowheaders['simplexconfig'];

                                        $vtxtdonorrssi = $rowheaders['covreg_donorrssi'];
                                        $vtxtmindlcoverage = $rowheaders['covreg_mindlcoverage'];
                                        $vtxtminulcoverage = $rowheaders['covreg_minulcoverage'];
                                        $vtxtdesignmargin = $rowheaders['covreg_designmargin'];
                                        $vtxtindoorantrad = $rowheaders['covreg_indoorantrad'];
                                        $vtxtmobtxpower =  $rowheaders['covreg_mobtxpower'];
                                        $vtxtdistdonorsite = $rowheaders['covreg_distdonorsite'];
                                        $vtxtdonorantgain = $rowheaders['covreg_donorantgain'];
                                        $txtindoorantgain = $rowheaders['covreg_indoorantgain'];
                                    //     echo "aaaaaaaaaaaaaaaaaaaaaaaaaaa".$vprojectname;
                                    //     exit();
                                        $vtxtdonorcoaxloss = $rowheaders['covreg_donorcoaxloss'];
                                        $vtxtindoorcoaxloss = $rowheaders['covreg_indoorcoaxloss'];


                                        
                                        $vbda_floordba = $rowheaders['bda_floordba'];
                                        $vbda_filter = $rowheaders['bda_filter'];
                                        $vdba_powerreq = $rowheaders['dba_powerreq'];

                                        $vvbbu_req = $rowheaders['bbu_req'];
                                        $valarm_brand = $rowheaders['alarm_brand'];
                                        $valarm_install_facp = $rowheaders['alarm_install_facp'];
                                        $valarm_req_annuciator = $rowheaders['alarm_req_annuciator'];
                                        if($valarm_req_annuciator =="YES") 
                                        { 
                                            $valarm_req_annuciator= "YES - With dry contacts to feed the FACP"; 
                                        }
                                        
                                        $vdr_requierd = $rowheaders['dr_requierd'];
                                        $vdr_ahjpackage = $rowheaders['dr_ahjpackage'];
                                        $vdr_instalationtype = $rowheaders['dr_instalationtype'];
                                        $vdr_mat_extwall = $rowheaders['dr_mat_extwall'];
                                        $vdr_mat_intwall = $rowheaders['dr_mat_intwall'];


                                        $vdr_mat_glasstype = $rowheaders['dr_mat_glasstype'];
                                        $vdr_mat_rooftype = $rowheaders['dr_mat_rooftype'];
                                        $vdr_firecontrolroomloc = $rowheaders['dr_firecontrolroomloc'];
                                        $vdr_bdaeqlocation = $rowheaders['dr_bdaeqlocation'];
                                        $vdr_verticalriserloc = $rowheaders['dr_verticalriserloc'];
                                        $vdr_donorantloc = $rowheaders['dr_donorantloc'];
                                        $vdr_special = $rowheaders['dr_special'];

                                        $vocupancy = $rowheaders['ocupancy'];


                                            if($rowheaders['ocupancy'] =="Agriculture") { $vocupancy= "Agriculture"; }
                                            if($rowheaders['ocupancy'] =="Airport") { $vocupancy= "Airport"; }
                                            if($rowheaders['ocupancy'] =="Bank") { $vocupancy= "Bank/Finance"; } 
                                            if($rowheaders['ocupancy'] =="Commercial") {  $vocupancy= " Commercial Real Estate"; } 

                                            if($rowheaders['ocupancy'] =="Datacenter") { $vocupancy= " Data Centers"; } 
                                            if($rowheaders['ocupancy'] =="Education") {  $vocupancy= " Education K-12"; } 
                                            if($rowheaders['ocupancy'] =="Health") { $vocupancy= "Health Care"; }
                                            if($rowheaders['ocupancy'] =="Hospitality") { $vocupancy= "Hospitality"; }
                                            if($rowheaders['ocupancy'] =="Industrial") { $vocupancy= " Industrial/Manufacture/Utilities"; } 
                                            if($rowheaders['ocupancy'] =="Infrastructure") {$vocupancy= "Infrastructure/Transportation"; }     
                                            if($rowheaders['ocupancy'] =="Military") { $vocupancy= "Military/Defense"; }
                                            if($rowheaders['ocupancy'] =="other") { $vocupancy= " OtherPharmaProfessional & Other Services"; }      
                                            if($rowheaders['ocupancy'] =="Retail") { $vocupancy= " Retail/Grocery"; } 
                                            if($rowheaders['ocupancy'] =="residential") { $vocupancy= "Residential"; } 
                                                    


                                            $vbuildingduedate = substr ($rowheaders['buildingduedate'],0,10);
                                        $vinstallationduedate = substr ($rowheaders['installationduedate'],0,10);

                                
																}
                 
                                                                if (  $vprojectname=="")
                                                                {
                                                                    echo $vprojectname." aca va";
                                                                    echo "bad access token...";
                                                                    exit();
                                                                }

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        $esdchanneldealer = $GLOBALS["a"];
        // Logo
        if ( $esdchanneldealer=="NOTIFIER_ESD")
        {
            $image_file = 'notifierlogo.jpg';
            $this->Image($image_file, 5, 5, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
        if ( $esdchanneldealer=="GAMEWELL_FCI_ESD_ONLY")
        {
            $image_file = 'gwfci2.jpg';
            $this->Image($image_file, 5, 5, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
        if ( $esdchanneldealer=="FARENHYT_ESD_ONLY")
        {
            $image_file = 'farent.jpg';
            $this->Image($image_file, 5, 5, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
        if ( $esdchanneldealer=="GAMEWELL_FCI_FARENHYT_DUAL_ESD")
        {
            $image_file = 'gwfci.jpg';
            $this->Image($image_file, 5, 5, 50, 15, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
        if ( $esdchanneldealer=="HONEYWELL_FIRE_SYSTEMS_CBSI_DEALER")
        {
            $image_file = 'honeywell_logo_300px.png';
            $this->Image($image_file, 5, 5, 50, 15, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
        if ( $esdchanneldealer=="HONEYWELL_BUILDING_SOLUTIONS")
        {
            $image_file = 'honeywell_logo_300px.png';
            $this->Image($image_file, 5, 5, 50, 15, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        }
      
        
      //  $html ="<hr style='border: 1px solid #aabbcc' width='100%'><br>hola:". $GLOBALS["a"];
       // $this->SetY(20);
      // $this->writeHTML($html, true, false, true, false, '');
        // Set font
   //     $this->SetFont('helvetica', 'B', 15);
        // Title
    //    $this->SetY(25);
    //    $this->Cell(160,55,   $vprject."--".$vprojectname." - Rev.[". $vidrev."]", 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('By FlexBDA Teams');
$pdf->SetTitle('FLEXBDA.COM REPORT PROJECT');
$pdf->SetSubject('FlexBDA');
$pdf->SetKeywords('FlexBDA, BDA, ');

// remove default header/footer
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 8);

// add a page
$pdf->AddPage();
////// TODO EL PRESUPUESTO

if($_SESSION['flexesdchandeal'] == 'FIPLEX_SI')
{
    $logo_SI='<p class="text-left titulogrande">
    <img src="Fiplex-EndorsedBrandLogo.png" width="100" height="50" class="img-fluid" >  
    </p>';

    $ESD_SI = 'SI';
    $Price_SI = 'Net Price';
    $Total_SI = 'Net Total';
    $HsLabor_SI = 'Labor Est (Hrs.)';
}
else
{  
    $logo_SI= '';
    $ESD_SI = 'ESD';
    $Price_SI = 'Net Price';
    $Total_SI = 'Net Total';
    $HsLabor_SI = 'ESD Labor Est (Hrs.)';
}

if ( $vactiveproy=="Y")
{
    
   // F'. str_pad(  $vprject , 4, "0", STR_PAD_LEFT).
   $elnroref =  str_pad(  $vprject , 4, "0", STR_PAD_LEFT);

$html=$logo_SI.'<br>Date: '.substr($vdatecreate,0,16).'<h3><span color="#095488">Estimate: #F'.$elnroref.'<br>Project Name:'.$vprojectname.' - Rev:['.$vidrev.']</h3><br><b>'.$ESD_SI.':'.$nameuserfull.' &nbsp;</b></span> - ['.$nameuserfullusermail.'] <br><b>DEALER CHANNEL: </b>'.$namedellerchannel.'
<hr ><h4><span color="#B5131F">BUDGET:</h4> 
</span>
<br><table border="0" cellspacing="1" cellpadding="1" >
<tr>

<td colspan="7" align="right" ><span color="#095488" ><b>'.$HsLabor_SI.'</b></span></td>


</tr>
<tr>
<td ><span color="#095488">Part Number</span></td>
<td style="width:150px" ><span color="#095488" >Description</span></td>
<td ><span color="#095488">Quantity</span></td>
<td ><span color="#095488">'.$Price_SI.'</span></td>
<td ><span color="#095488">'.$Total_SI.'</span></td>
<td ><span color="#095488">Low </span></td>
<td ><span color="#095488">High </span></td>

</tr>';
$html = $html.'<tr><td colspan="7"><hr></td></tr>';

$sql2 = $connect->prepare("SELECT distinct flexbdahoneywell_bugdet.*, fiplexpartnro, honeywellnro, flexbdahoneywell_bugdet.description,  deadtime, gamewellfcipartnro,
silentknightpartnro, notipartnumber, fiplexdatasheet esdchanneldealer FROM flexbdahoneywell_bugdet left join flexbda_products_budget
on flexbdahoneywell_bugdet.sku = flexbda_products_budget.fiplexpartnro where flexbdahoneywell_bugdet.idproject =  :idproject and flexbdahoneywell_bugdet.idrev = (select max(idrev) from flexbdahoneywell where idproject =  :idproject ) order by  netprice desc ");

$sql2->bindParam(':idproject', $vprject);	
 $sql2->execute();
 $resultado2 = $sql2->fetchAll();
  foreach ($resultado2 as $row2ba) {

    $eltot = $eltot + $row2ba['nettotal'];
    $eltotlow = $eltotlow + $row2ba['esdlaborhow']; 
    $eltothi = $eltothi + $row2ba['esdlaborhigh'];
    
    $sku_show ="";
    if ( is_null( $row2ba[ $v_name_marca_brandbda] )==1)
    {
        $sku_show ="".$row2ba['sku'];
    }
    else
    {
        $sku_show =$row2ba[ $v_name_marca_brandbda];
    }

        $html = $html.'<tr><td>'.$sku_show.'</td> <td>'.$row2ba['description'].'</td> <td align="center">'.$row2ba['quantity'].'</td> <td "center">$ '.round($row2ba['netprice'],2).'</td> <td "center">$ '.round($row2ba['nettotal'],2).'</td><td "center">'.$row2ba['esdlaborhow'].'</td> <td "center">'.$row2ba['esdlaborhigh'].'</td></tr>';
        $html = $html.'<tr><td colspan="7"><hr></td></tr>';

  }

  $html = $html.'<tr><td colspan="3"> </td><td colspan="2"><b>Total: $ '.round($eltot,2).' </b></td> <td colspan="1"><b>'.round($eltotlow,2).'</b> </td> <td colspan="1"><b> '.round($eltothi,2).'</b> </td></tr>';
  $html = $html.'<tr><td colspan="7"></td></tr>';
$html=$html.'
</table>';



  // Print text using writeHTMLCell()
  $pdf->SetY(20);
  $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
  

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

////// TODO EL DETALLE DEL PROY
$pdf->AddPage();
}
# Contenido HTML del documento que queremos generar en PDF.
$html="";


$elnroref =  str_pad(  $vprject , 4, "0", STR_PAD_LEFT);


if($designtrans!='quickquote')
{
    



    $html='<br>Date: '.substr($vdatecreate,0,16).'<h3><span color="#095488">Estimate: #F'.$elnroref.'<br>Project Name:'.$vprojectname.' - Rev:['.$vidrev.']</h3><br><h4>'.$ESD_SI.':'.$nameuserfull.' &nbsp;</h4> </span> - ['.$nameuserfullusermail.']  <br><b>DEALER CHANNEL: </b>'.$namedellerchannel.' <br><br>Special Instructions: '. $vdr_special.'
    <br> 
   <hr ><br><br><h4><span color="#B5131F">Projects Detail:</h4> 
   </span>
   <br><table border="0" cellspacing="5" cellpadding="3" >
   <tr>
       <td ><span color="#095488">Building Address: </span> </td>
       <td>'.$vaddress.'</td>
   </tr>
   <tr>
       <td colspan="2"><br><span color="#095488"><b>Building Coordinates</b> </span></td>
       
   </tr>
   <tr>
       <td ><span color="#095488">Latitude:  </span>'.$vcoordinateslat.'</td>
       <td ><span color="#095488">Longitude: </span> '.$vcoordinateslon.'</td>
       
   </tr>
   <tr>
   <td  colspan="2"><span color="#095488">Ocupancy field:  </span>'.$vocupancy.'</td>
   </tr>
   <tr>
       <td ><span color="#095488">Bid due date:  </span>'.$vbuildingduedate.'</td>
       <td ><span color="#095488">Installation due date: </span> '.$vinstallationduedate.'</td>
       
   </tr>
   
   <tr>
       <td ><span color="#095488">Floor Type 1 Count:</span>'.$vtxtfloortype1count.'</td>
       <td ><span color="#095488">Floor Type 1 average area (sqft): </span> '.$vtxtfloortype1countavg.'</td>
       
   </tr>';
    if ($vtxtfloortype2count>0)
   {
       $html = $html.'<tr>
       <td ><span color="#095488">Floor Type 2 Count:</span>'.$vtxtfloortype2count.'</td>
       <td ><span color="#095488">Floor Type 2 average area (sqft): </span> '.$vtxtfloortype2countavg.'</td>
       
   </tr>';
   }
   
   if($vrfenvironment =="Light") { $vrfenvironmentmm= "Light: Open Warehouse, Convention Center"; } 
   if($vrfenvironment =="LightMedium") { $vrfenvironmentmm= " Medium Light: Parking Garage, Airport, Mall"; } 
   if($vrfenvironment =="Dense") { $vrfenvironmentmm= "Dense: Newer Office Building, Hotel"; } 
   if($vrfenvironment =="HighDense") { $vrfenvironmentmm= "High Dense: Hospital, Older Gov, Bldg, University, HS"; } 
   if($vrfenvironment =="VeryHigh") { $vrfenvironmentmm= "Very High Dense: Prison"; } 
   
   
   $html = $html.'
   <tr>
       <td ><span color="#095488">Average Floor Height (ft):  </span>'.$vavgfloorheight.'</td>
       <td ></td>
       
   </tr>
   <tr>
       
       <td colspan="2" ><span color="#095488">Installation Type : </span> '.$vdr_instalationtype.'</td>
       
   </tr>
   <tr>
       
       <td colspan="2" ><span color="#095488">Building Type (RF Environment): </span> '.$vrfenvironmentmm.'</td>
       
   </tr>
   
   </table>
   
     <br> 
     <hr ><br><br><br> <h4><span color="#B5131F">Coverage Requirements:</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Donor RSSI:</span> '.$vtxtdonorrssi.'</td>
     <td > <span color="#095488">Design Margin:</span> '.$vtxtdesignmargin.'</td>
       
     </tr>
     <tr>
     <td ><span color="#095488">Min DL Coverage: </span>'.$vtxtmindlcoverage.' </td>
     <td > <span color="#095488">Min UL Coverage: </span>'.$vtxtminulcoverage.'</td>
       
     </tr>
     <tr>
     <td ><span color="#095488">Indoor Antenna Radius: </span>'.$vtxtindoorantrad.' </td>
     <td > <span color="#095488">Mobile TX Power: </span>'.$vtxtmobtxpower.'</td>
       
     </tr>
     <tr>
     <td ><span color="#095488">Distance to Donor Site:</span>'.$vtxtdistdonorsite.' </td>
     <td > <span color="#095488"> Donor Antenna Gain: </span>'.$vtxtdonorantgain.'</td>
       
     </tr>
     <tr>
     <td ><span color="#095488">Donor Coax Cable Loss (100):</span>'.$vtxtdonorcoaxloss.' </td>
     <td > <span color="#095488"> 	Indoor Coax Cable Loss (100): </span>'.$vtxtindoorcoaxloss.'</td>
       
     </tr>
     </table>
     <br> 
     <hr ><br><br><br> <h4><span color="#B5131F">BDA Requirements:</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Which Floor will the BDA be located on?:</span> '.$vbda_floordba.'</td>
     </tr><tr>
     <td ><span color="#095488">Filtering Requirement:</span> '.$typeclassreporshow.'</td>
     </tr><tr>
     <td ><span color="#095488">BDA Main Input Power Requirement:</span> '.$typepowershow.'</td>
       
     </tr>
     </table>
     <br> 
     <hr ><br><br><br> <h4><span color="#B5131F">BBU Requirements:</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Battery Backup Requirement: </span> '.$vvbbu_req.' hours</td>
     </tr>
     </tr>
     </table>
     <br> <br> <br>  <br> <br>  <br> 
     <h4><span color="#B5131F">Alarm Requirements :</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Select the type of fire alarm that will be installed:</span> '.ucfirst($valarm_brand).'</td>
     </tr><tr>
     <td ><span color="#095488">Will the BDA equipment be installed in the main Fire Control Room containing the FACP Interface(Y/N)?:</span> '.$valarm_install_facp.'</td>
     </tr><tr>
     <td ><span color="#095488">Will you require a remote annunciator:</span> '.$valarm_req_annuciator.'</td>
       
     </tr>
     </table>
     <br> 
   
     <br> 
     <hr ><br><br><br> <h4><span color="#B5131F">Design Requirements  :</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Will you require a system design:</span> '.$vdr_requierd.'</td>
     <td > <span color="#095488">Do you need a complete AHJ Submittal Package:</span> '.$vdr_ahjpackage.'</td>
     </tr>
     <tr>
     <td ><span color="#095488">Donor Antenna Location:</span> '.$vdr_donorantloc.'</td>
     <td > <span color="#095488">Construction Materials – Exterior Walls:</span> '.$vdr_mat_extwall.'</td>
     </tr>
     <tr>
     <td ><span color="#095488">Construction Materials – Interior Walls:</span> '.$vdr_mat_intwall.'</td>
     <td > <span color="#095488">Construction Materials – Glass Type:</span> '.$vdr_mat_glasstype.'</td>
     </tr>
     <tr>
     <td ><span color="#095488">Construction Materials – Roof Type:</span> '.$vdr_mat_rooftype.'</td>
     <td > <span color="#095488">Fire Control Room Location:</span> '.$vdr_firecontrolroomloc.'</td>
     </tr>
     <tr>
     <td ><span color="#095488">BDA Equipment Location:</span> '.$vdr_bdaeqlocation.'</td>
     <td > <span color="#095488">Vertical Riser Location:</span> '.$vdr_verticalriserloc.'</td>
     </tr>
   
   </table>
   
   <br> 
   <hr ><br><br><br> <h4><span color="#B5131F">Project Frequency Information:</h4> 
   </span>
   <br><table border="0" cellspacing="5" cellpadding="3" >
   
     <tr>
     <td colspan="2" >
     <b>Frequencies:</b><br><br>
            <table border="0" width="100%">
            <tr>
            <th><span color="#095488"> Band  <hr></span></th>
            <th><span color="#095488">UL (Start - Stop)  <hr></span></th>
            <th><span color="#095488">DL (Start - Stop) <hr> </span></th>
           </tr>
   ';
       //Buscamos las BANDAS   
           
       $sql2 = $connect->prepare("SELECT * FROM flexbdahoneywell_band where idproject =  :idproject and idrev = (select max(idrev) from flexbdahoneywell where idproject =  :idproject ) ");
   
      $sql2->bindParam(':idproject', $vprject);	
       $sql2->execute();
       $resultado2 = $sql2->fetchAll();
        foreach ($resultado2 as $row2a) {
   
           $porciones = explode("#",  $row2a['nombbandtemp']);
         
           if ( $row2a['typeref'] == "FREQBAND")
           {
   
              $html = $html.'<tr><td>'.$porciones[1].'<hr></td> <td>'.$row2a['ulstart']." MHz - ".$row2a['ulstop'].' MHz<hr></td> <td>'.$row2a['dlstart']." MHz - ".$row2a['dlstop'].' MHz<hr></td>   </tr>';
           }
         
   
        }
   
   $html = $html.'
            </table>
     </td>
       
     </tr>
     <tr>
     <td colspan="2" >
     <b>Channels:</b><br><br>
            <table border="0" width="100%">
            <tr>
            <th><span color="#095488">Band Name <hr> </span></th>
            <th><span color="#095488">UL Channels (MHz) <hr></span></th>
            <th><span color="#095488">DL Channels (MHz) <hr></span></th>
        
            <th><span color="#095488">Simplex Config  <hr></span></th>
            </tr>
   ';
       //Buscamos las BANDAS   
           
       $sql2 = $connect->prepare("SELECT * FROM flexbdahoneywell_band where idproject =  :idproject and idrev = (select max(idrev) from flexbdahoneywell where idproject =  :idproject ) ");
   
      $sql2->bindParam(':idproject', $vprject);	
       $sql2->execute();
       $resultado2 = $sql2->fetchAll();
        foreach ($resultado2 as $row2a) {
   
           $porciones = explode("#",  $row2a['nombbandtemp']);
         
           if ( $row2a['typeref'] == "CHANNEL")
           {
   
              $html = $html.'<tr><td>'.$porciones[1].'<hr></td> <td>'.$row2a['ulch'].' MHz<hr></td> <td>'.$row2a['dlch'].' MHz<hr></td> <td>'.$row2a['simpleconfig'].' &nbsp;<hr></td>  </tr>';
           }
         
   
        }
   
        if($vbda_filter =="A") { $typeclassreporshow= "Class A Channelized "; } 
        if($vbda_filter =="B") { $typeclassreporshow="Class B Band Selective"; } 
   
       if($vdba_powerreq =="AC") { $typepowershow = "AC Power: 110VAC"; } 
        if($vdba_powerreq =="DC") { $typepowershow ="DC Power: 24/-48VDC"; } 
        
   
   $html = $html.'
            </table>
     </td>
       
     </tr>
   
     </table>
     
    
   ';
     
     // Print text using writeHTMLCell()
     $pdf->SetY(20);
     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   /// Nueva HOJA
   // add a page
   //$pdf->AddPage();
   $pdf->AddPage();
   
   if( $_SESSION['flexesdchandeal']=='FIPLEX_SI')
   { 


    $html='<br><b> Disclaimers:</b><hr><br><br>
    <br><br><br>
 
 
    <ul>
    
     <li>Estimate is based on the inputs provided by the ESD / Dealer on flexbda.com. Inputs required include are not limited to:<br>
           <ul>
               <li>All Required Frequencies and BDA/Fiber DAS Type<br> </li>  
               <li>Accurate Floorplans<br> </li>  
               <li>AHJ specifications<br> </li>  
            </ul>
      </li>  
      
      <br>
    </li>  <li>Estimate is created using the frequency details submitted by the ESD / Dealer or from radioreference.com. Radioreference.com does not always provide up to date and reliable data. Please verify the specific frequency requirements for this project with the Authority Having Jurisdiction (AHJ). Changes in frequencies or additional frequencies could change the estimate. If VHF or UHF frequency bands are required, the complete channel list is needed to provide an accurate estimate. Honeywell will not be liable if incorrect frequency details are provided or if estimate was created using frequency information from radioreference.com
      </li> <br>
    <li>The Estimate BOM is a preliminary budget estimate, based on the submitted square footage, type of building construction, given project and design requirements! Any additional, specific coverage requirements (e.g., inside Elevators or Stairwells) are not considered and may need additional equipment, which will also change the link budget!
    </li> <br>
    <li>This Estimate BOM assumes insufficient signal coverage throughout most of the building. Frequency and other requirements should be confirmed with the AHJ prior to estimate request submission.
    </li><br>
    <li>The Estimate BOM quantities and cable lengths are subject to change upon completion of iBwave system design and/or initial survey.
    </li> <br>
    <li>The Estimate BOM’s part numbers and quantities are not intended for purchasing purposes. Please wait to receive your final BOM after iBwave design.
    </li><br>
    <li>Honeywell shall have no liability for the accuracy of the project information provided by ESD/Dealer for iBwave design provided by Honeywell and Honeywell cannot be held liable for any design issues arising from inaccurate project information from ESD/ Dealer.
    </li>
    </ul> <br><br><br>
    <b> - Items not included in BOM: </b>
    <br>
    <ul>
    <li>Estimated Labor Hours do not include cable, fiber, conduit, grounding or any other electrical/fire work. For Fiber DAS systems, Estimate BOM does not include fiber and connectors or labor involved.
    </li><br>
    <li>This Estimate BOM does not include any material such as fiber (for Fiber DAS systems), conduit, electrical grounding cables, antenna mast, junction boxes, or any other materials required to complete the electrical/fire scope of work.
    </li> <br>
    <li>Honeywell is not responsible for the installation of any device or equipment listed above.
    </li> <br>
    <li>Honeywell is not responsible for the installation of any cable, conduit, grounding or any other electrical/fire scope required for final acceptance of the system.
    </li> <br>
    <li>The Estimate BOM does not include miscellaneous devices required to complete the commissioning of the system, e.g., attenuators, L-shape adapters, load terminations, etc. The ESD / Dealer is responsible to maintain a safety stock of miscellaneous devices.
    </li><br>
    <li>Honeywell is not responsible for submitting, pulling and/or closing any construction permit(s) in the above referenced project.</li>
    <br>
    <li>Honeywell is not responsible for testing, optimizing, or coordinating acceptance inspection(s) with the AHJ.</li>
    </ul>
    <br><br>
    <br>
    <b> Responsibilities:</b>
    <br>
    <ul>
    <li><b> ESD / Dealer Technicians</b></li>
    <ul>
      <li> Conduct site surveys</li>
      <li>Identify optimal BDA / Fiber DAS, battery backup, annunciator, antenna, fiber (if applicable) and cable locations</li>
      <li>Create AHJ submittal package to meet jurisdiction requirements based on iBwave design from Honeywell, Apply and obtain BDA permit from the fire department</li>
      <li>Install antennas, connectors, power dividers, BDA / Fiber DAS Master & Remotes, BDA / Fiber DAS battery backup, connect FACP supervisory connections to the BDA / Battery Backup.</li>
      <li>Provide and install cable for the annunciator</li>
      <li>Program inputs for annunciator operation of the BDA/Fiber DAS to display supervisory alarms</li>
      <li>Test and optimize the system</li>
      <li>Coordinate acceptance testing / inspection with fire department to obtain a compliance certificate / CO (Certificate of Occupancy)</li>
      </ul>
    <li><b> Work Provided by others</b></li>
    <ul>
    <li>Install ½” coaxial cable from the roof to the lowest level of the building and any horizontal runs. Install and Test Fiber for Fiber DAS systems only.  </li>
      <li>Install 10’ mast on the roof for the donor antenna</li>
      <li>Mount the BDA / Fiber DAS Master & Remote and battery backup enclosures in pre-identified space</li>
      <li>Connect power (emergency circuit) to the BDA / Fiber DAS Master & Remote and the battery backup</li>
      <li>Installation as per applicable electrical and fire codes</li>
      <li>Coordinate equipment locations and fire survivability requirements with the electrical engineer and architect.</li>
    </ul>
    <li> <b> Honeywell </b></li>
    <ul>
      <li>Provide iBwave design service and product equipment</li>
      <li>Provide product documentation </li>
    </ul>
    </ul>
      <br><br>';
}
    else{
        $html='<br><b> Disclaimers:</b><hr><br><br>
        <br><br><br>
     
     
        <ul>
        
        <li>Net Price is shown on the estimate and you will need to determine your net price.<br>
             <ul>
                 <li>700/800 MHz, 0.5W to 2W ERCES offering (BDA, BBU, Passives including Cable, PCTEL, training tools) are available through Honeywell Fire key wholesale distributors, you can contact them to determine your net price for these parts.</li>
                 <li>Customers requiring portions of the ERCES portfolio not available through distribution (5W BDAs, Fiber DAS, VHF/UHF) for specific projects can work with their Regional Sales Manager to get approval to purchase these parts directly from Fiplex.</li>
                 <li>For parts purchased directly from Honeywell / Fiplex including design,  the discount from the list remains the same at 25% regardless</li>
             </ul>
        </li>
     
        <br>
     
        <li>Estimate is based on the inputs provided by the ESD / Dealer on flexbda.com. Inputs required include are not limited to:<br>
               <ul>
                   <li>All Required Frequencies and BDA/Fiber DAS Type<br> </li>  
                   <li>Accurate Floorplans<br> </li>  
                   <li>AHJ specifications<br> </li>  
                </ul>
          </li>  
          
          <br>
        </li>  <li>Estimate is created using the frequency details submitted by the ESD / Dealer or from radioreference.com. Radioreference.com does not always provide up to date and reliable data. Please verify the specific frequency requirements for this project with the Authority Having Jurisdiction (AHJ). Changes in frequencies or additional frequencies could change the estimate. If VHF or UHF frequency bands are required, the complete channel list is needed to provide an accurate estimate. Honeywell will not be liable if incorrect frequency details are provided or if estimate was created using frequency information from radioreference.com
          </li> <br>
        <li>The Estimate BOM is a preliminary budget estimate, based on the submitted square footage, type of building construction, given project and design requirements! Any additional, specific coverage requirements (e.g., inside Elevators or Stairwells) are not considered and may need additional equipment, which will also change the link budget!
        </li> <br>
        <li>This Estimate BOM assumes insufficient signal coverage throughout most of the building. Frequency and other requirements should be confirmed with the AHJ prior to estimate request submission.
        </li><br>
        <li>The Estimate BOM quantities and cable lengths are subject to change upon completion of iBwave system design and/or initial survey.
        </li> <br>
        <li>The Estimate BOM’s part numbers and quantities are not intended for purchasing purposes. Please wait to receive your final BOM after iBwave design.
        </li><br>
        <li>Honeywell shall have no liability for the accuracy of the project information provided by ESD/Dealer for iBwave design provided by Honeywell and Honeywell cannot be held liable for any design issues arising from inaccurate project information from ESD/ Dealer.
        </li>
        </ul> <br><br><br>
        <b> - Items not included in BOM: </b>
        <br>
        <ul>
        <li>Estimated Labor Hours do not include cable, fiber, conduit, grounding or any other electrical/fire work. For Fiber DAS systems, Estimate BOM does not include fiber and connectors or labor involved.
        </li><br>
        <li>This Estimate BOM does not include any material such as fiber (for Fiber DAS systems), conduit, electrical grounding cables, antenna mast, junction boxes, or any other materials required to complete the electrical/fire scope of work.
        </li> <br>
        <li>Honeywell is not responsible for the installation of any device or equipment listed above.
        </li> <br>
        <li>Honeywell is not responsible for the installation of any cable, conduit, grounding or any other electrical/fire scope required for final acceptance of the system.
        </li> <br>
        <li>The Estimate BOM does not include miscellaneous devices required to complete the commissioning of the system, e.g., attenuators, L-shape adapters, load terminations, etc. The ESD / Dealer is responsible to maintain a safety stock of miscellaneous devices.
        </li><br>
        <li>Honeywell is not responsible for submitting, pulling and/or closing any construction permit(s) in the above referenced project.</li>
        <br>
        <li>Honeywell is not responsible for testing, optimizing, or coordinating acceptance inspection(s) with the AHJ.</li>
        </ul>
     <br><br>
     <br>
     <b> Responsibilities:</b>
     <br>
     <ul>
     <li><b> ESD / Dealer Technicians</b></li>
     <ul>
          <li> Conduct site surveys</li>
          <li>Identify optimal BDA / Fiber DAS, battery backup, annunciator, antenna, fiber (if applicable) and cable locations</li>
          <li>Create AHJ submittal package to meet jurisdiction requirements based on iBwave design from Honeywell, Apply and obtain BDA permit from the fire department</li>
          <li>Install antennas, connectors, power dividers, BDA / Fiber DAS Master & Remotes, BDA / Fiber DAS battery backup, connect FACP supervisory connections to the BDA / Battery Backup.</li>
          <li>Provide and install cable for the annunciator</li>
          <li>Program inputs for annunciator operation of the BDA/Fiber DAS to display supervisory alarms</li>
          <li>Test and optimize the system</li>
          <li>Coordinate acceptance testing / inspection with fire department to obtain a compliance certificate / CO (Certificate of Occupancy)</li>
          </ul>
     <li><b> Work Provided by others</b></li>
     <ul>
          <li>Install ½” coaxial cable from the roof to the lowest level of the building and any horizontal runs. Install and Test Fiber for Fiber DAS systems only.  </li>
          <li>Install 10’ mast on the roof for the donor antenna</li>
          <li>Mount the BDA / Fiber DAS Master & Remote and battery backup enclosures in pre-identified space</li>
          <li>Connect power (emergency circuit) to the BDA / Fiber DAS Master & Remote and the battery backup</li>
          <li>Installation as per applicable electrical and fire codes</li>
          <li>Coordinate equipment locations and fire survivability requirements with the electrical engineer and architect.</li>
     </ul>
     <li> <b> Honeywell </b></li>
     <ul>
          <li>Provide iBwave design service and product equipment</li>
          <li>Provide product documentation </li>
     </ul>
     </ul>
          <br><br>
     ';
    }




} 
else
{



    $html='<br>Date: '.substr($vdatecreate,0,16).'<h3><span color="#095488">Estimate: #F'.$elnroref.'<br>Project Name:'.$vprojectname.' - Rev:['.$vidrev.']</h3><br><h4>'.$ESD_SI.':'.$nameuserfull.' &nbsp;</h4> </span> - ['.$nameuserfullusermail.']  <br><b>DEALER CHANNEL: </b>'.$namedellerchannel.' <br><br>Special Instructions: '. $vdr_special.'
    <br> 
   <hr ><br><br><h4><span color="#B5131F">Projects Detail:</h4> 
   </span>
   <br><table border="0" cellspacing="5" cellpadding="3" >
   <tr>
       <td ><span color="#095488">Building Address: </span> </td>
       <td>'.$vaddress.'</td>
   </tr>
   <tr>
       <td colspan="2"><br><span color="#095488"><b>Building Coordinates</b> </span></td>
       
   </tr>
   <tr>
       <td ><span color="#095488">Latitude:  </span>'.$vcoordinateslat.'</td>
       <td ><span color="#095488">Longitude: </span> '.$vcoordinateslon.'</td>
       
   </tr>
   <tr>
   <td  colspan="2"><span color="#095488">Ocupancy field:  </span>'.$vocupancy.'</td>
   </tr>
   <tr>
       <td ><span color="#095488">Bid due date:  </span>'.$vbuildingduedate.'</td>
       <td ><span color="#095488">Installation due date: </span> '.$vinstallationduedate.'</td>
       
   </tr>
   
   <tr>
       <td ><span color="#095488">Floor Type 1 Count:</span>'.$vtxtfloortype1count.'</td>
       <td ><span color="#095488">Floor Type 1 average area (sqft): </span> '.$vtxtfloortype1countavg.'</td>
       
   </tr>';
    if ($vtxtfloortype2count>0)
   {
       $html = $html.'<tr>
       <td ><span color="#095488">Floor Type 2 Count:</span>'.$vtxtfloortype2count.'</td>
       <td ><span color="#095488">Floor Type 2 average area (sqft): </span> '.$vtxtfloortype2countavg.'</td>
       
   </tr>';
   }
   
   if($vrfenvironment =="Light") { $vrfenvironmentmm= "Light: Open Warehouse, Convention Center"; } 
   if($vrfenvironment =="LightMedium") { $vrfenvironmentmm= " Medium Light: Parking Garage, Airport, Mall"; } 
   if($vrfenvironment =="Dense") { $vrfenvironmentmm= "Dense: Newer Office Building, Hotel"; } 
   if($vrfenvironment =="HighDense") { $vrfenvironmentmm= "High Dense: Hospital, Older Gov, Bldg, University, HS"; } 
   if($vrfenvironment =="VeryHigh") { $vrfenvironmentmm= "Very High Dense: Prison"; } 
   
   
   $html = $html.'
   <tr>
       <td ><span color="#095488">Average Floor Height (ft):  </span>'.$vavgfloorheight.'</td>
       <td ></td>
       
   </tr>
   <tr>
       
       <td colspan="2" ><span color="#095488">Installation Type : </span> '.$vdr_instalationtype.'</td>
       
   </tr>
   <tr>
       
       <td colspan="2" ><span color="#095488">Building Type (RF Environment): </span> '.$vrfenvironmentmm.'</td>
       
   </tr>
   
   </table>
   
     <br> 
     <hr ><br><br><br> <h4><span color="#B5131F">BBU Requirements:</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Battery Backup Requirement: </span> '.$vvbbu_req.' hours</td>
     </tr>
     </tr>
     </table>
     <br> <br> <br>  <br> <br>  <br> 
     <h4><span color="#B5131F">Alarm Requirements :</h4> 
     </span>
     <br><table border="0" cellspacing="5" cellpadding="3" >
     <tr>
     <td ><span color="#095488">Will you require a remote annunciator:</span> '.$valarm_req_annuciator.'</td>
       
     </tr>
     </table>
     <br> 
   
   <br> 
   <hr ><br><br><br> <h4><span color="#B5131F">Project Frequency Information:</h4> 
   </span>
   <br><table border="0" cellspacing="5" cellpadding="3" >
   
     <tr>
     <td colspan="2" >
     <b>Frequencies:</b><br><br>
            <table border="0" width="100%">
            <tr>
            <th><span color="#095488"> Band  <hr></span></th>
            <th><span color="#095488">UL (Start - Stop)  <hr></span></th>
            <th><span color="#095488">DL (Start - Stop) <hr> </span></th>
           </tr>
   ';
       //Buscamos las BANDAS   
           
       $sql2 = $connect->prepare("SELECT * FROM flexbdahoneywell_band where idproject =  :idproject and idrev = (select max(idrev) from flexbdahoneywell where idproject =  :idproject ) ");
   
      $sql2->bindParam(':idproject', $vprject);	
       $sql2->execute();
       $resultado2 = $sql2->fetchAll();
        foreach ($resultado2 as $row2a) {
   
           $porciones = explode("#",  $row2a['nombbandtemp']);
         
           if ( $row2a['typeref'] == "FREQBAND")
           {
   
              $html = $html.'<tr><td>'.$porciones[1].'<hr></td> <td>'.$row2a['ulstart']." MHz - ".$row2a['ulstop'].' MHz<hr></td> <td>'.$row2a['dlstart']." MHz - ".$row2a['dlstop'].' MHz<hr></td>   </tr>';
           }
         
   
        }
   
   $html = $html.'
            </table>
     </td>
       
     </tr>
     <tr>
     <td colspan="2" >
     <b>Channels:</b><br><br>
            <table border="0" width="100%">
            <tr>
            <th><span color="#095488">Band Name <hr> </span></th>
            <th><span color="#095488">UL Channels (MHz) <hr></span></th>
            <th><span color="#095488">DL Channels (MHz) <hr></span></th>
        
            <th><span color="#095488">Simplex Config  <hr></span></th>
            </tr>
   ';
       //Buscamos las BANDAS   
           
       $sql2 = $connect->prepare("SELECT * FROM flexbdahoneywell_band where idproject =  :idproject and idrev = (select max(idrev) from flexbdahoneywell where idproject =  :idproject ) ");
   
      $sql2->bindParam(':idproject', $vprject);	
       $sql2->execute();
       $resultado2 = $sql2->fetchAll();
        foreach ($resultado2 as $row2a) {
   
           $porciones = explode("#",  $row2a['nombbandtemp']);
         
           if ( $row2a['typeref'] == "CHANNEL")
           {
   
              $html = $html.'<tr><td>'.$porciones[1].'<hr></td> <td>'.$row2a['ulch'].' MHz<hr></td> <td>'.$row2a['dlch'].' MHz<hr></td> <td>'.$row2a['simpleconfig'].' &nbsp;<hr></td>  </tr>';
           }
         
   
        }
   
        if($vbda_filter =="A") { $typeclassreporshow= "Class A Channelized "; } 
        if($vbda_filter =="B") { $typeclassreporshow="Class B Band Selective"; } 
   
       if($vdba_powerreq =="AC") { $typepowershow = "AC Power: 110VAC"; } 
        if($vdba_powerreq =="DC") { $typepowershow ="DC Power: 24/-48VDC"; } 
        
   
   $html = $html.'
            </table>
     </td>
       
     </tr>
   
     </table>
     
    
   ';
     
     // Print text using writeHTMLCell()
     $pdf->SetY(20);
     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
   /// Nueva HOJA
   // add a page
   //$pdf->AddPage();
   $pdf->AddPage();
   
   $html='<br><b> Disclaimers:</b><hr><br><br>
   <br><br><br>

   <ul>
      <li>Quick Quote is based on the inputs provided by the SI on <a href="https://www.flexbda.com">FLEXBDA</a>. Inputs required include but not limited to:<br>
              <ul>
                  <li>All Required Frequencies for VHF and/or UHF<br> </li>  
                  <li>BDA type<br> </li>  
                  <li>BBU requirements<br> </li>  
              </ul>
      </li>  
      
      <br>
      </li>  <li>Quick Quote BOM is a preliminary budget estimate, based on the submitted square footage, type of building construction, given project and design requirements! Any additional, specific coverage requirements (e.g., inside Elevators or Stairwells) are not considered and may need additional equipment not provided under Quick Quote option.
      </li> <br>
      <li>Quick Quote BOM assumes insufficient signal coverage throughout most of the building.
      </li> <br>
      <li>Quick Quote BOM will contain active equipment parts only, such as, fiber DAS, BDA, BTTY, and annunciator.
      </li><br>
   </ul>
   <br>
   <p>Your purchase of the products and services listed in this quote is governed solely by the Terms and Conditions of sale (available at https://www.fiplex.com/download/Fiplex-TandC-of-Sales-02182022.pdf), together with the terms of any signed agreement you may have with Fiplex or its affiliated entities. Any conflicting, additional, and/or different terms or conditions on your Order or any other instrument you provide are deemed to be material alterations and are rejected and will not be binding upon Fiplex or its affiliated entities.</p>
     <br><br>';


}

      $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

function generateFileName()
{
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
$name = "";
for($i=0; $i<12; $i++)
$name.= $chars[rand(0,strlen($chars))];
return $name;
}
//get a random name of the file here
$fileName = generateFileName();

        // Logo
   

//Close and output PDF document

if ($vaccion=="")
{
 // echo "HOLA".$vaccion."-".$fileName;
 ob_end_clean() ;
 ob_end_clean();
    $pdf->Output('/var/www/flexbda/pdfattach/'.$fileName.'.pdf', 'I');
    
}
else
{
    $fileName=$v_natt;
     ob_end_clean() ;
    ob_end_clean();
    $pdf->Output('/var/www/flexbda/pdfattach/'.$fileName.'.pdf', 'F');
}




//============================================================+
// END OF FILE
//============================================================+