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
						$debit_chart_id 	= $_POST['debit_chart_id'];
					$debit_amount 		= $_POST['debit_amount'];
					$item_desc_dr 		= $_POST['item_desc_dr'];
					$hid 		= $_POST['hid'];
					$ttype=$_POST['transelect'];
					
					$sql="insert into entryitems(entry_id,entrytype_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$hid,$debit_chart_id,$debit_amount,'D','$item_desc_dr','$previllageid')";
					$result=mysqli_query($con,$sql);
					if($ttype==0)
					{
					}
					else
					{
						
						$sql="select max(id) as maxid from entryitems";
					$result=mysqli_query($con,$sql);
					$row=mysqli_fetch_row($result);
					$mid=$row[0];
					  $sql="insert into bonus_dps(entryitems_id,trantype)values($mid,$ttype)";
					  
					  $result=mysqli_query($con,$sql);
					}
					 }
					if($valc=='Add Credit'){
						$credit_chart_id 	= $_POST['credit_chart_id'];
					$credit_amount 		= $_POST['credit_amount'];
					$item_desc_cr 		= $_POST['item_desc_cr'];
					$ttype=$_POST['transelect'];
					$sql="insert into entryitems(entry_id,entrytype_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$hid,$credit_chart_id,$credit_amount,'C','$item_desc_cr','$previllageid')";
					$result=mysqli_query($con,$sql);
					if($ttype==0)
					{
					}
					else if($ttype==3)
					{
						
						$sql="select max(id) as maxid from entryitems";
					$result=mysqli_query($con,$sql);
					$row=mysqli_fetch_row($result);
					$mid=$row[0];
					  $sql="insert into bonus_dps(entryitems_id,trantype)values($mid,$ttype)";
					  
					  $result=mysqli_query($con,$sql);
					} 
					}
					
					if (isset($_POST['complete'])){
		      if($_POST['complete']=='Complete Journal Entry'){
				  $txtnumber 		= $_POST['txtnumber'];
				   $txtdate 		= $_POST['txtdate'];
				   $hid 		= $_POST['hid'];
				   if($hid==1) {$prename='CV-';}
				   if($hid==2) {$prename='DV-';}
				   if($hid==3) {$prename='RV-';}
				   if($hid==4) {$prename='JV-';}
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
					$sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,chqdate,mobile,created_by)values($txtnumber,$hid,1,'$txtdate',$hdrtotal,$hcrtotal,'$txtnarration',$pmode,'$bank','$cheque','$txtchqdate','$mobile','$previllageid')";			  
	print $sql;//exit;
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
					$hcrtotal 		= $_POST['hcrtotal'];
					$txtnarration 	= $_POST['txtnarration'];
					$sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,chqdatemobile)values($txtnumber,$hid,1,'$txtdate',$hdrtotal,$hcrtotal,'$txtnarration',$pmode,'$bank','$cheque','$txtchqdate','$mobile')";			  $sql="update entries set date=$txtdate,dr_total=$hdrtotal,cr_total=$hcrtotal,narration='$txtnarration',paymentmode=$pmode,bank='$bank',cheque='$cheque',chqdate='$txtchqdate',mobile='$mobile' where id=$txtnumber";
	//print $sql;
	//print"<br>";
	//$result=mysqli_query($con,$sql);
								  }
										}
										
					if(($vald<>'Add Debit')&&($valc<>'Add Credit')){
										$result=mysqli_query($con,$sql);
					}if (isset($_POST['complete'])){
					  header("location:show_entry.php");
					  }else{
						  header("location:addentry.php?hid=$hid      ");
					  }
			 // print $sql;
			 
			 
?>