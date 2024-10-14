<?PHP
  namespace Chirp;

  // Original PHP code by Chirp Internet: www.chirpinternet.eu
  // Please acknowledge use of this code by including this header.

  session_start();
$noti_proc = $_SESSION['noti_proc'];
$noti_pend3 = $_SESSION['noti_pend3'];
$noti_pend3m = $_SESSION['noti_pend3m'];

$gw_proc = $_SESSION['gw_proc'];
$gw_pend3 = $_SESSION['gw_pend3'];
$gw_pend3m = $_SESSION['gw_pend3m'];

$ho_proc = $_SESSION['ho_proc'];
$ho_pend3 = $_SESSION['ho_pend3'];
$ho_pend3m = $_SESSION['ho_pend3m'];

$tot_proc = $_SESSION['tot_proc'];
$tot_pend3 = $_SESSION['tot_pend3'];
$tot_pend3m = $_SESSION['tot_pend3m'];


  $data = array(
    array("" => "Processed", "NOTIFIER" => $noti_proc, "GW-FCI/Farenhyt" => $gw_proc, "CBSI" => $ho_proc, "Total" => $tot_proc),
    array("" => "Pending 3 days or less","NOTIFIER" => $noti_pend3, "GW-FCI/Farenhyt" => $gw_pend3, "CBSI" => $ho_pend3, "Total" => $tot_pend3),
    array("" => "Pending more than 3 days","NOTIFIER" => $noti_pend3m, "GW-FCI/Farenhyt" => $gw_pend3m, "CBSI" => $ho_pend3m, "Total" => $tot_pend3m)
  );

  

  function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  // file name for download
  $filename = "flexbda_processed_xls_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  foreach($data as $row) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\n";
  }

  exit;
?>
// <?PHP
//   namespace Chirp;

//   // Original PHP code by Chirp Internet: www.chirpinternet.eu
//   // Please acknowledge use of this code by including this header.



// //On page 2
// session_start();
// $noti_proc = $_SESSION['noti_proc'];
// $noti_pend3 = $_SESSION['noti_pend3'];
// $noti_pend3m = $_SESSION['noti_pend3m'];

// $gw_proc = $_SESSION['gw_proc'];
// $gw_pend3 = $_SESSION['gw_pend3'];
// $gw_pend3m = $_SESSION['gw_pend3m'];

// $ho_proc = $_SESSION['ho_proc'];
// $ho_pend3 = $_SESSION['ho_pend3'];
// $ho_pend3m = $_SESSION['ho_pend3m'];

// $tot_proc = $_SESSION['tot_proc'];
// $tot_pend3 = $_SESSION['tot_pend3'];
// $tot_pend3m = $_SESSION['tot_pend3m'];


//   $data = array(
//     array("" => "Processed", "NOTIFIER" => $noti_proc, "GW-FCI/Farenhyt" => $gw_proc, "CBSI" => $ho_proc, "Total" => $tot_proc),
//     array("" => "Pending 3 days or less","NOTIFIER" => $noti_pend3, "GW-FCI/Farenhyt" => $gw_pend3, "CBSI" => $ho_pend3, "Total" => $tot_pend3),
//     array("" => "Pending more than 3 days","NOTIFIER" => $noti_pend3m, "GW-FCI/Farenhyt" => $gw_pend3m, "CBSI" => $ho_pend3m, "Total" => $tot_pend3m)
//   );

//   function cleanData(&$str)
//   {
//     if($str == 't') $str = 'TRUE';
//     if($str == 'f') $str = 'FALSE';
//     if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
//       $str = "'$str";
//     }
//     if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
//   }

//   // filename for download
//   $filename = "flexbda_processed_" . date('Ymd') . ".csv";

//   header("Content-Disposition: attachment; filename=\"$filename\"");
//   header("Content-Type: text/csv");

//   $out = fopen("php://output", 'w');

//   $flag = false;
//   foreach($data as $row) {
//     if(!$flag) {
//       // display field/column names as first row
//       fputcsv($out, array_keys($row), ',', '"');
//       $flag = true;
//     }
//     array_walk($row, __NAMESPACE__ . '\cleanData');
//     fputcsv($out, array_values($row), ',', '"');
//   }

//   fclose($out);
//   exit;
// ?>