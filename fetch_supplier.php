<?php

require 'db/connect.php';
$bankname = $_POST["ledger_id"];
$sql = "select * from suppliers where ledger_id=".$bankname."";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
print $row['supplier_name'].'%'.$row['supplier_address'].'%'.$row['supplier_mobile'].'%'.$row['supplier_email'];
?>



