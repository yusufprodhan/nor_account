<?php

require 'db/connect.php';
$bankname = trim(mysql_escape_string($_POST["country_id"]));
$sql = "SELECT * FROM bankinfo WHERE trim(bankname) = '".$bankname."' ORDER BY bankname";
$query = mysqli_query($con, $sql);
?>
<select name="branchname" id="drop2" class="form-control select2-container">
	<option value="">Please Select the Branch Name</option>
	<?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
	<option value="<?php echo $rs["branchname"]; ?>"><?php echo $rs["branchname"]; ?></option>
	<?php } ?>
</select>


<script src="jquery-1.9.0.min.js"></script>
<script>
$(document).ready(function(){


$("select#drop2").change(function(){
	var country_id =  $("select#drop1 option:selected").attr('value'); 
	var state_id = $("select#drop2 option:selected").attr('value');
   // alert(state_id);
	if (state_id.length > 0 ) { 
	 $.ajax({
			type: "POST",
			url: "fetch_accountname.php",
			data: "state_id="+state_id+" &country_id="+country_id,
			cache: false,
			beforeSend: function () { 
				$('#accountno').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#accountno").html( html );
			}
		});
	} else {
		$("#accountno").html( "" );
	}
});

});
</script>