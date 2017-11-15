<?php

$first=$_REQUEST["first"];
$last=$_REQUEST["last"];
$email=$_REQUEST["email"];
$org=$_REQUEST["org"];

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
fwrite($reg_file,"\n");
fclose($reg_file);

$file_name = 'release_files/toppic-windows-1.1.0.zip';
$download_type=$_REQUEST["downloadtype"];
echo 'result';
echo $download_type;

if ($download_type=="linux") {
	$file_name = "release_files/toppic-linux-1.1.0.zip";
}

if (headers_sent()) {
  echo 'HTTP header already sent';
} else {
  if (!is_file($file_name)) {
    header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
    echo 'File not found';
  } else if (!is_readable($file_name)) {
    header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden');
    echo 'File not readable';
  } else {
    header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Length: ".filesize($file_name));
    header("Content-Disposition: attachment; filename=\"".basename($file_name)."\"");
    readfile($file);
    exit;
  }
}

#if (file_exists($file_name)) {
#  header('Content-Description: File Transfer');
#  header('Content-Type: application/octet-stream');
#  header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
#  header('Expires: 0');
#  header('Cache-Control: must-revalidate');
#  header('Pragma: public');
#  header('Content-Length: ' . filesize($file_name));
#  readfile($file_name);
#  exit;
#}
#
?>
