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

if(isset($_POST['supplier_add']))
{
$valc=$_POST['supplier_add'];

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
					
					if($vald=='Add Sales'){
						
						$item_chart_id 	= $_POST['item_chart_id'];
						$item_name 	= $_POST['item_name'];
					$item_buyprice 		= $_POST['item_buyprice'];
					$item_saleprice 	= $_POST['item_saleprice'];
					$item_quantity		= $_POST['item_quantity'];
					$chkitem=$_POST['chkitem'];
					$dt=date('Y-m-d  h:i:sa');
					/*$sql="insert into entryitems(entry_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$debit_chart_id,$debit_amount,'D','$item_desc_dr','$previllageid')";*/
				if($chkitem=="12")
				{	
				$sql="INSERT INTO Ledgers (name, group_id,type,op_balance,op_balance_dc,reconciliation,notes,created_by) VALUES ('$item_name', 28,0,0,'D',0,'Sales Item','$previllageid')";
		$result=mysqli_query($con,$sql);
		$sql="select max(id) from ledgers";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_row($result);
				$item_chart_id=$row[0];
				
				$sql="insert into stocktbl(ledger_id,stockbal,buy_price,sales_price,stock_date,quantity)values($item_chart_id,$item_quantity,$item_buyprice,$item_saleprice,'$dt',$item_quantity)";	
				$result=mysqli_query($con,$sql);
				}
				else
				{
					$sql="select stockbal from stocktbl WHERE ledger_id = ".$item_chart_id."       and stock_date =(select max(stock_date) from stocktbl)";
					$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_row($result);
				$item_stock_bal=$row[0]+$item_quantity;
					$sql="insert into stocktbl(ledger_id,stockbal,buy_price,sales_price,stock_date,quantity)values($item_chart_id,$item_stock_bal,$item_buyprice,$item_saleprice,'$dt',$item_quantity)";	
				$result=mysqli_query($con,$sql);
				
				}
				$sql="insert into stockbal(ledger_id,stockbal)values($item_chart_id,$item_stock_bal)";
				//$result=mysqli_query($con,$sql);
				
				$sql="insert into entryitems(entry_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$item_chart_id,$item_saleprice*$item_quantity,'C','Sales Item','$previllageid')";
					 }
					 
					 
					if($valc=='Add Customer'){
						$supplier_chart_id 	= $_POST['supplier_chart_id'];
					$sup_name 		= $_POST['sup_name'];
					$sup_addr 		= $_POST['sup_addr'];
					$sup_mobile 		= $_POST['sup_mob'];
					$sup_email 		= $_POST['sup_email'];
					$chksupplier=$_POST['chksupplier'];
					/*$sql="insert into entryitems(entry_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$credit_chart_id,$credit_amount,'C','$item_desc_cr','$previllageid')";*/
					if($chksupplier=="12")
				{
				$sql="INSERT INTO Ledgers (name, group_id,type,op_balance,op_balance_dc,reconciliation,notes,created_by) VALUES ('$sup_name', 26,0,0,'D',0,'Supplier Name','$previllageid')";
				
		$result=mysqli_query($con,$sql);
		$sql="select max(id) from ledgers";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_row($result);
				$supplier_chart_id=$row[0];
		$sql="INSERT INTO customers (ledger_id,supplier_name,supplier_address,supplier_mobile,supplier_email) VALUES ( $supplier_chart_id,'$sup_name','$sup_addr','$sup_mobile','$sup_email')";
		$result=mysqli_query($con,$sql);
				}
					}
					
					if (isset($_POST['complete'])){
		      if($_POST['complete']=='Complete Sales Entry'){
				  $txtnumber 		= $_POST['txtnumber'];
				   $txtdate 		= $_POST['txtdate'];
				   $txtchqdate1 		= $_POST['txtchqdate1'];
				    $cashpay		= $_POST['cashpay'];
					 $chequepay 		= $_POST['chequepay'];
					 //$accountno 		= $_POST['accountno'];
					 //$branchname = $_POST['branchname'];
					 $accountno = ltrim(rtrim($_POST['accountno']));					 $supplier_chart_id 	= $_POST['supplier_chart_id'];
					 
				   $hid 		= $_POST['hid'];
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
					if($cashpay>0){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,5,$cashpay,'D','Sales Item','$previllageid')";
	$result=mysqli_query($con,$sql);
	}
	if($chequepay>0){
		$sql22="select id from ledgers where                          trim(name)='$accountno'  ";  
		
  $result22=mysqli_query($con,$sql22);
  $row22=mysqli_fetch_array($result22);
  $dbid=$row22['id'];
  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$dbid,$chequepay,'D','Sales Item','$previllageid')";
	
	$result=mysqli_query($con,$sql);
	}
	$rest=$hdrtotal-$cashpay-$chequepay;
	if($rest>0){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,itemnarat,created_by)values($txtnumber,$supplier_chart_id,$rest,'D','Sales Item','$previllageid')";
	
	$result=mysqli_query($con,$sql);	
	}
	
	
	
					$sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,chqdate,mobile,created_by)values($txtnumber,4,1,'$txtdate',$hdrtotal,$hdrtotal,'$txtnarration',$pmode,'$bank','$cheque','$txtchqdate1','$mobile','$previllageid')";			  
	
	//print"<br>";
	$result=mysqli_query($con,$sql);
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
										
					
										$result=mysqli_query($con,$sql);
					  if (isset($_POST['complete'])){
					  header("location:sales_entry.php");
					  }else{
						  header("location:sales_entry.php?hid=$hid      ");
					  }
			 // print $sql;
			 
			 
?>