<?php
require 'db/connect.php';

if (isset($_POST['delete'])) {
	
	if (isset($_POST['ledger'])) {
		$id = $_POST['ledger'];
	}
    $sql=$db->query("select id from entries   where id in (select entry_id   from entryitems where ledger_id=$id)");
	while($row = $sql->fetch_object()){$eid=$row->id;
	
	$sql="delete from entryitems where entry_id=$eid";
	$result=mysqli_query($con,$sql);
	$sql="delete from entries   where id =$eid";
	$result=mysqli_query($con,$sql);}
	$sql="delete from ledgers where id=$id";
	$result=mysqli_query($con,$sql);
	//print "agshshs";
}
?>