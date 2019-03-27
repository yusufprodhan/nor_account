<?php

require 'db/connect.php';
//$bankname = $_POST["ledger_id"];
$sql = "select id,truck_no from truck_info";
$query = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
    {
        //$trckno=explode('-',$row['truck_no']);
		//$dname_list[] = ltrim(rtrim($trckno[1]));
		$dname_list[] = $row['truck_no'];
    }
echo json_encode($dname_list);
?>



