<?php

require 'db/connect.php';
//$bankname = trim(mysql_escape_string($_POST["country_id"]));
$sql = "SELECT distinct(bankname) FROM bankinfo ORDER BY bankname";
$query = mysqli_query($con, $sql);
?>
<select name="bankname" id="drop1" class="form-control select2-container">
	<option value="">Please Select the Bank Name</option>
	<?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
	<option value="<?php echo $rs["bankname"]; ?>"><?php echo $rs["bankname"]; ?></option>
	<?php } ?>
</select>


<script src="jquery-1.9.0.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){
$("select#drop1").change(function(){

	var country_id =  $("select#drop1 option:selected").attr('value'); 
// alert(country_id);	
	$("#branchname").html( "" );
	$("#accountno").html( "" );
	if (country_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "fetch_branchname.php",
			data: "country_id="+country_id,
			cache: false,
			beforeSend: function () { 
				$('#branchname').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#branchname").html( html );
			}
		});
	} 
});
});
</script>