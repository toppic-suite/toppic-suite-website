<?php
 $first=$_REQUEST["first"];
 $last=$_REQUEST["last"];
 $email=$_REQUEST["email"];
 $org=$_REQUEST["org"];

 $bruce=fopen("register_info.txt","a");
 if(!$bruce)
 {
    echo'file not exist!';
    exit;
 }
 fwrite($bruce,$first);
 fwrite($bruce,"\t");
 fwrite($bruce,$last);
 fwrite($bruce,"\t");
 fwrite($bruce,$email);
 fwrite($bruce,"\t");
 fwrite($bruce,$org);
 fwrite($bruce,"\t");
 fwrite($bruce,$_SERVER['REMOTE_ADDR']);
 fwrite($bruce,"\t");
 fwrite($bruce,date('Y-m-d'));
 fwrite($bruce,"\n");
 fclose($bruce);
 header("Location: downloads.html");
?>
