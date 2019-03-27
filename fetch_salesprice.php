<?php

require 'db/connect.php';
$bankname = $_POST["country_id"];
$sql="select name from ledgers where id=".$bankname."";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
$lname=$row['name'];
$sql = "SELECT s.buy_price,s.sales_price FROM stocktbl s WHERE s.ledger_id = ".$bankname." order by s.stock_date asc";
$query = mysqli_query($con, $sql);
$bprice=$sprice=0;
while($row=mysqli_fetch_array($query))
{
$bprice=$row['buy_price'];
$sprice=$row['sales_price'];
//$lname=$row['name'];
}
print $bprice.'%'.$lname.'%'.$sprice;
?>



