<?php
require 'db/connect.php';
//$bankname = trim(mysql_escape_string($_POST["country_id"]));
$sql = "SELECT * FROM ledgers ORDER BY id";
$query = mysqli_query($con, $sql);
?>
<select name="ledgname" id="drop4" class="form-control select2-container">
	<option value="">Please Select the Ledger</option>
	<?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
	<option value="<?php echo $rs["id"]; ?>"><?php echo $rs["name"]; ?></option>
	<?php } ?>
</select>


<script src="jquery-1.9.0.min.js"></script>
