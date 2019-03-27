<?PHP
session_start();
require 'db/connect.php';
$previllageid=$_SESSION['userid'];
if(isset($_POST['debit_add']))
{
$vald=$_POST['debit_add'];
}
else
{
$vald="";
}

if(isset($_POST['credit_add']))
{
$valc=$_POST['credit_add'];
}
else
{
$valc="";
}
 
 $txtnumber 		= $_POST['txtnumber'];
				  $txtdate 	= $_POST['txtdate'];
				   $hid 		= $_POST['hid'];
				  //$bank 		= $_POST['bank'];
					//$cheque 		= $_POST['cheque'];
					//$txtchqdate 		= $_POST['txtchqdate'];
					$mobile 		= $_POST['mobile'];
					
					if($vald=='Add Debit'){
						$truck_no 	= rtrim(ltrim($_POST['truck_no']));
					//$debit_amount 		= $_POST['debit_amount'];
					//$item_desc_dr 		= $_POST['item_desc_dr'];
					$sql="select * from truck_info where trim(truck_no) = '$truck_no'";
				$result=mysqli_query($con,$sql);
				//print $sql;
				
				$row=mysqli_fetch_array($result);
				$truck_id=$row['id'];
				
				$truck_no=$row['truck_no'];
				$truck_type=$row['truck_type'];
				if($truck_type=='A'){$amt=100;}else{$amt=50;}
				$sql="select id from ledgers where ((name like '%Member%'))";
					$result=mysqli_query($con,$sql);
					$row=mysqli_fetch_row($result);
					$member=$row[0];
					$sql="insert into entryitems(entry_id,entrytype_id,ledger_id,amount,dc,itemnarat,truck_id,created_by)values($txtnumber,$hid,$member,$amt,'C','$truck_no',$truck_id,'$previllageid')";
					$result=mysqli_query($con,$sql);
					
					//$credit_amount 		= $_POST['credit_amount'];
					//$item_desc_cr 		= $_POST['item_desc_cr'];
					$sql="select id from ledgers where ((name like '%hand%')or(name like '%Hand%'))";
					$result=mysqli_query($con,$sql);
					$row=mysqli_fetch_row($result);
					$cash=$row[0];
					$sql="insert into entryitems(entry_id,entrytype_id,ledger_id,amount,dc,itemnarat,truck_id,created_by)values($txtnumber,$hid,$cash,$amt,'D','$truck_no',$truck_id,'$previllageid')";
					//$result=mysqli_query($con,$sql);
					 
					}
					
					if (isset($_POST['complete'])){
		      if($_POST['complete']=='Complete Journal Entry'){
				  $txtnumber 		= $_POST['txtnumber'];
				   $txtdate 		= $_POST['txtdate'];
				   $hid 		= $_POST['hid'];
				   //$txtdate = strtotime( $txtdate );
					//$txtdate= date( 'Y-m-d', $txtdate );
					$pmode 	= $_POST['pmode'];
				  $bank 		= $_POST['bank'];
					$cheque 		= $_POST['cheque'];
					$txtchqdate 		= $_POST['txtchqdate'];
					$mobile 		= $_POST['mobile'];
					$hdrtotal 	= $_POST['hdrtotal'];
					$hcrtotal 		= $_POST['hcrtotal'];
					$txtnarration 	= $_POST['txtnarration'];
					$sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,chqdate,mobile,created_by)values($txtnumber,$hid,1,'$txtdate',$hdrtotal,$hdrtotal,'$txtnarration',$pmode,'$bank','$cheque','$txtchqdate','$mobile','$previllageid')";			  
	//print $sql;
	//exit;
	//print"<br>";
	//$result=mysqli_query($con,$sql);
								  }
										}
										
					if (isset($_POST['complete_update'])){
		      if($_POST['complete_update']=='Complete Journal Entry'){
				  $txtnumber 		= $_POST['txtnumber'];
				   $txtdate 		= $_POST['txtdate'];
				   //$txtdate = strtotime( $txtdate );
					//$txtdate= date( 'Y-m-d', $txtdate );
					$pmode 	= $_POST['pmode'];
				  $bank 		= $_POST['bank'];
					$cheque 		= $_POST['cheque'];
					$txtchqdate 		= $_POST['txtchqdate'];
					$mobile 		= $_POST['mobile'];
					$hdrtotal 	= $_POST['hdrtotal'];
					//$hcrtotal 		= $_POST['hcrtotal'];
					$txtnarration 	= $_POST['txtnarration'];
					$sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,chqdatemobile)values($txtnumber,$hid,1,'$txtdate',$hdrtotal,$hdrtotal,'$txtnarration',$pmode,'$bank','$cheque','$txtchqdate','$mobile')";			  $sql="update entries set date=$txtdate,dr_total=$hdrtotal,cr_total=$hcrtotal,narration='$txtnarration',paymentmode=$pmode,bank='$bank',cheque='$cheque',chqdate='$txtchqdate',mobile='$mobile' where id=$txtnumber";
	//print $sql;
	//print"<br>";
	//$result=mysqli_query($con,$sql);
								  }
										}
										
					
										$result=mysqli_query($con,$sql);
					  if (isset($_POST['complete'])){
					  header("location:show_entry.php");
					  }else{
						  header("location:addentrypaymentoftruck.php?hid=$hid      ");
					  }
			 // print $sql;
			 
			 
?>