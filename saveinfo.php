<?php

$first=$_REQUEST["first"];
$last=$_REQUEST["last"];
$email=$_REQUEST["email"];
$org=$_REQUEST["org"];
$math=$_REQUEST["math"];
$download_type=$_REQUEST["downloadtype"];

if($math != 100) {
  echo'Enter a correct value for the last question!';
  exit;
}

$reg_file=fopen("register_info.txt","a");
if(!$reg_file)
{
  echo'file not exist!';
  exit;
}
fwrite($reg_file,$first);
fwrite($reg_file,"\t");
fwrite($reg_file,$last);
fwrite($reg_file,"\t");
fwrite($reg_file,$email);
fwrite($reg_file,"\t");
fwrite($reg_file,$org);
fwrite($reg_file,"\t");
fwrite($reg_file,$_SERVER['REMOTE_ADDR']);
fwrite($reg_file,"\t");
fwrite($reg_file,date('Y-m-d'));
fwrite($reg_file,"\t");
fwrite($reg_file, $download_type);
fwrite($reg_file,"\n");
fclose($reg_file);

#echo 'result';
#echo $download_type;

if ($download_type=="docker") {
  header("Location: https://hub.docker.com/r/toppicsuite/toppic");
}

if ($download_type=="linux") {
  header("Location: http://github.com/toppic-suite/toppic-suite/releases/tag/v1.7.0");
}


$file_name = 'release_files/toppic-windows-1.7.0.zip';

if (file_exists($file_name)) {
  header('Content-Description: File Transfer');
  header('Content-Type: application/zip');
  header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file_name));
  readfile($file_name);
  exit();
}

?>
