<?php 
//require_once('ats-mg0915/Include/db_connect.inc.php'); 
// $start_tt=microtime(); 
$conn1 = OCILogon("NPI_RD_SW","rd_sw123.","(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 10.146.67.167)(PORT = 1526))(CONNECT_DATA =(SERVICE_NAME = ipadf2)(INSTANCE_NAME = ipadf22)))"); 
var_dump($conn1);
if ($conn1) { 
	echo 1;
	die;
}