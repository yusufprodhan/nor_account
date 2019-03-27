<?php
require 'db/connect.php';
$bankname = trim(mysql_escape_string($_POST["country_id"]));
$branchname = trim(mysql_escape_string($_POST["state_id"]));
 
$sql = "SELECT * FROM bankinfo WHERE trim(bankname) = '".$bankname ."' and branchname='".$branchname."' ORDER BY accountno";
$count = mysqli_num_rows( mysqli_query($con, $sql) );
if ($count > 0 ) {
$query = mysqli_query($con, $sql);
?>

<select name="accountno" name="box" class="form-control select2-container">
	<option value="">Please Select the Account Number</option>
	<?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
	<option value="<?php echo $rs["accountno"]; ?>"><?php echo $rs["accountno"]; ?></option>
	<?php } ?>
</select>
<?php 
	}

?>