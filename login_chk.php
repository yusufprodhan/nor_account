<?php
session_start();

require 'db/connect.php';

$query = "select userid, userpass,usertype from usertable where userid = '".$_POST['userid']."' and userpass = '".$_POST['userpass']."'";

//echo $query;

$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

if ($row['userid'] == $_POST['userid'] && $row['userpass'] == $_POST['userpass'] ) 
{
	$_SESSION['userid'] =$row['userid'];
	$_SESSION['usertype'] =$row['usertype'];
	$val=1;
	//print $val;
	//header("location: home.php");
}
else
{
	$val=2;
	//print $val;
	//header("location: index.php");
}
mysqli_free_result($result);
print $val;
?>