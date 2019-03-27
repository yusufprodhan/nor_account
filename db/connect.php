<?php

//collect to our database

$db_server 	= "localhost";
$db_user	= "root";
$db_pass 	= "";
$db_name	= "mnorther_hili_accounts";

$db = new mysqli($db_server, $db_user, $db_pass, $db_name);
$con=mysqli_connect("localhost","root","","mnorther_hili_accounts");

if($db->connect_errno){
	echo "Could not connect to database";
}else{
	echo"conne";
}
?>