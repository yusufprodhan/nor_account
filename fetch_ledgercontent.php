<?php
require 'db/connect.php';
$ledgerid = $_POST["country_id"];
$sql="select * from ledgers where id=".$ledgerid."";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
$lname=$row['name'];
$group_id=$row['group_id'];
$type=$row['type'];
$op_balance=$row['op_balance'];
$op_balance_dc=$row['op_balance_dc'];
$reconciliation=$row['reconciliation'];
$notes=$row['notes'];

print $lname.'%'.$group_id.'%'.$type.'%'.$op_balance.'%'.$op_balance_dc.'%'.$reconciliation.'%'.$notes;
?>



