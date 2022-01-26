<?php
$serverName = "LAPTOP-O7F4B0NM"; //LAPTOP-O7F4B0NM , DESKTOP-R0ETL6G , PLUEMMER\SQLEXPRESS
$serverName2 = "DESKTOP-R0ETL6G";
$user = "pluem";
$pass = "1234";


$connectionInfo = array( "Database"=>"Project5", "UID"=>$user, "PWD"=>$pass , "characterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName2, $connectionInfo);


if( $conn ) {
     // echo "GOOD!!"; 
}else{
     echo "BAD!!"; 
     die( print_r( sqlsrv_errors(), true)); //test
     }


?>




