<?Php
//require "config.php"; // connection details
require 'db/connect.php';
error_reporting(0);// With this no error reporting will be there
//////////
/////////////////////////////////////////////////////////////////////////////
$country=$_GET['country'];// 
//$country='IND'; // To check you can use this
$state1=$_GET['state'];
$city1=$_GET['city'];
//$state1="Andhra Pradesh";
///////////// Validate the inputs ////////////
// Checking country variable ///
if((strlen($country)) > 0 and (!ctype_alpha($country))){ 
echo "Data Error";
exit;
}
// Checking state variable (with space ) ///

if ((strlen($state1)) > 0 and ctype_alpha(str_replace(' ', '', $state1)) === false) {
echo "Data Error";
exit;
}

/////////// end of input validation //////

if(strlen($country) > 0){
$q_country="SELECT * FROM bankinfo WHERE trim(bankname) = '".$country."' ORDER BY bankname";
}else{
$q_country="SELECT * FROM bankinfo  ORDER BY bankname";
}
//echo $q_country;
$sth = $db->prepare($q_country);
$sth->execute();
$state = $sth->fetchAll(PDO::FETCH_COLUMN);

$q_state="SELECT * FROM bankinfo WHERE  ";
if(strlen($country) > 0){
$q_state= $q_state . "trim(bankname) = '".$country ."' ";
}
if(strlen($state1) > 0){$q_state= $q_state . "' and branchname='".$state1."' ORDER BY accountno ";}
$sth = $db->prepare($q_state);
$sth->execute();
$city = $sth->fetchAll(PDO::FETCH_COLUMN);

$main = array('state'=>$state,'city'=>$city,'value'=>array("state1"=>"$state1","city1"=>"$city1"));
echo json_encode($main); 

////////////End of script /////////////////////////////////////////////////////////////////////////////////
?>