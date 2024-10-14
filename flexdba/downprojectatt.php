<?php
//control ataques de querystring
if( $_REQUEST['mkt_tok']<> '')
{
  echo "Error...";
  exit();
}

if(!empty($_REQUEST['filemm'])){
    $fileName = basename($_REQUEST['filemm']);
    $filePath = 'attachflexbda/'.$fileName;
    echo $filePath;
    if(!empty($fileName) && file_exists($filePath)){

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
     
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}