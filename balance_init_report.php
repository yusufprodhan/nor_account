<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hili Truck | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="../Hili Trucksales/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="../Hili Trucksales/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Hili Truck Mailk Group Industries Ltd. (Balance Sheet)
              <small class="pull-right">Date: <?php echo date("Y-m-d H:i:s");?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col"><address>
            From
          </address>
            <address>
            <strong>Hili Truck Mailk Group.</strong><br>
23,Shah Suja Road,Netaiganj,<br>
Narayanganj-1400,Bangladesh.
            </address>
          </div><!-- /.col -->
          </div>
          
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
      <?php
            
//$hidvouchertype=0;
require 'db/connect.php';
function find_child_with_debit($id)
{
 require 'db/connect.php';
 $sql="select * from groups where parent_id=$id";
$amountn=0;
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);

$amountn=0;
	 while($row11 = $result11->fetch_object())
      {
	    $id_child=$row11->id;
		$baldd=0;
		$sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id_child";
		$result22=mysqli_query($con,$sql2);
		 $row22=mysqli_fetch_row($result22);	  
		$baldd=$row22[0];
		$amountn+=$baldd;
	  }
return $amountn;
}
function find_child_with_credit($id)
{
 require 'db/connect.php';
 $sql="select * from groups where parent_id=$id";
$amountn=0;
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);

$amountn=0;
	 while($row11 = $result11->fetch_object())
      {
	    $id_child=$row11->id;
		$baldd=0;
		$sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id_child";
		$result22=mysqli_query($con,$sql2);
		$row22 = mysqli_fetch_row($result22);	  
		$baldd=$row22[0];
		$amountn+=$baldd;
	  }
return $amountn;
}

function find_child_with_bal($id)
{
require 'db/connect.php';
$sql="select * from groups where parent_id=$id";
$amountn=0;
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);

$amountn=0;
	 while($row11 = $result11->fetch_object())
      {
	    $id_child=$row11->id;
		//print $id_child." ";
		$sql2="select sum(op_balance) as bal from ledgers where group_id=$id_child and op_balance_dc='D' group by group_id";
  if( $result22=mysqli_query($con,$sql2)){
   $row22 = mysqli_fetch_row($result22);
   $opnbaldd=$row22[0];}else{$opnbaldd=0;}
      $sql3="select sum(op_balance) as bal from ledgers where group_id=$id_child and op_balance_dc='C' group by group_id";
   if($result33=mysqli_query($con,$sql3)){
   $row33 =  mysqli_fetch_row($result33);
   $opnbalcc=$row33[0];}else{$opnbalcc=0;}
   $ball=$opnbaldd-$opnbalcc;
   //print $bal." ";
   $amountn+=$ball;
}
   return $amountn;

}

function find_ledger_debit_bal($lid)
{
  require 'db/connect.php';
  $sql2="select sum(e.amount) as amt from entryitems e where e.ledger_id=$lid and e.dc='D'";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
		return $bald;
}
function find_ledger_credit_bal($lid)
{
  require 'db/connect.php';
  $sql2="select sum(e.amount) as amt from entryitems e where e.ledger_id=$lid and e.dc='C' ";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
		return $bald;
}

		
$id=5;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal5=($opnbal+$debit)-$credit;if($clbal5<0){$clbal5=0-$clbal5;$strcls5=$clbal5.'C';}else{$strcls5=$clbal5.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=6;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal6=($opnbal+$debit)-$credit;if($clbal6<0){$clbal6=0-$clbal6;$strcls6=$clbal6.'C';}else{$strcls6=$clbal6.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";


$id=7;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal7=($opnbal+$debit)-$credit;if($clbal7<0){$clbal7=0-$clbal7;$strcls7=$clbal7.'C';}else{$strcls7=$clbal7.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=8;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal8=($opnbal+$debit)-$credit;if($clbal8<0){$clbal8=0-$clbal8;$strcls8=$clbal8.'C';}else{$strcls8=$clbal8.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';	


$id=9;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal9=($opnbal+$debit)-$credit;if($clbal9<0){$clbal9=0-$clbal9;$strcls9=$clbal9.'C';}else{$strcls9=$clbal9.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=10;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal10=($opnbal+$debit)-$credit;if($clbal10<0){$clbal10=0-$clbal10;$strcls10=$clbal10.'C';}else{$strcls10=$clbal10.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

/*
$id=14;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal14=($opnbal+$debit)-$credit;if($clbal14<0){$clbal14=0-$clbal14;$strcls14=$clbal14.'C';}else{$strcls14=$clbal14.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=13;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal13=($opnbal+$debit)-$credit;if($clbal13<0){$clbal13=0-$clbal13;$strcls13=$clbal13.'C';}else{$strcls13=$clbal13.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

$netprofit=$netloss=0;
$totexpense=$totgrexpense+$clbal14+$clbal4;
$totincome=$totgrincome+$clbal13+$clbal3;
if($totexpense>$totincome){$netloss=$totexpense-$totincome;}else{$netprofit=$totincome-$totexpense;}
$total=$totexpense+$netprofit;
*/


	?>
<br><br>

			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Assets </th><th align="right">      Dr. Amount</th>
                        <th align="left">Liabilities and Owners Equity</th><th align="right">        Cr. Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					?>
					
				<tr>
						<td align="left"><?php echo "Fixed Assests";?></td>
						<td align="right"><?php echo $strcls5;?></td>
						<td align="left"><?php echo "Capital Amount";?></td>
						<td align="right"><?php echo $strcls8;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=5 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=8 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						
				  </tr>
<?PHP
}
?>

<tr>
						<td align="left"><?php echo "Current Assets";?></td>
						<td align="right"><?php echo $strcls6;?></td>
						<td align="left"><?php echo "Current liabilities";?></td>
						<td align="right"><?php echo $strcls9;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=6 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=9 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal11.$lclbaltype11;?></td>
						
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Investments";?></td>
						<td align="right"><?php echo $strcls7;?></td>
						<td align="left"><?php echo "Loan(Liabilities)";?></td>
						<td align="right"><?php echo $strcls10;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=7 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=10 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal11.$lclbaltype11;?></td>
						
				  </tr>
<?PHP
}
$clbal=$clbal111=0;
$sql="select * from groups where parent_id=1 and id>16 order by id";
$result=mysqli_query($con,$sql);
while($row = $result->fetch_object())
{
$id=$row->id;
$grpname=$row->name;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal=($opnbal+$debit)-$credit;if($clbal<0){$clbal=0-$clbal;$strcls=$clbal.'C';$clbal=0-$clbal;}else{$strcls=$clbal.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

?>
<tr>
						<td align="left"><?php echo "*****".$grpname;?></td>
						<td align="right"><?php echo $strcls;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=$id order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}
}
$clbalasset=0;$clbal12=0;
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=1 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 

?>
<tr>
						<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
$clbalasset+=$clbal12;
}

$clbal111=0;
$sql="select * from groups where parent_id=2 and id>16 order by id";
$result=mysqli_query($con,$sql);
while($row = $result->fetch_object())
{
$id=$row->id;
$grpname=$row->name;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal111=($opnbal+$debit)-$credit;if($clbal111<0){$clbal111=0-$clbal111;$strcls111=$clbal111.'C';$clbal111=0-$clbal111;}else{$strcls111=$clbal111.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  		<td align="left"><?php echo "*****".$grpname;?></td>
						<td align="right"><?php echo $strcls111;?></td>
						</tr>
<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=$id order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						
				  </tr>
<?PHP
}
}
$clballiabilities=0;
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=2 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 

?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  		<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						</tr>
<?PHP
$clballiabilities+=$clbal12;
}

$netprofit=$netloss=$totbig=0;
$totasset=$clbal5+$clbal6+$clbal7+$clbal+$clbalasset;
$totliabilities=$clbal8+$clbal9+$clbal10+$clbal111+$clballiabilities;
if($totasset>=$totliabilities){$totbig=$totasset;}else{$totbig=$totliabilities;}
$opbaldiff=0;
 $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
					   $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
 $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
					   $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
/* income stmnt */
$id=12;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal12=($opnbal+$debit)-$credit;if($clbal12<0){$clbal12=0-$clbal12;$strcls12=$clbal12.'C';}else{$strcls12=$clbal12.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=11;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal11=($opnbal+$debit)-$credit;if($clbal11<0){$clbal11=0-$clbal11;$strcls11=$clbal11.'C';}else{$strcls11=$clbal11.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";


$id=16;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal16=($opnbal+$debit)-$credit;if($clbal16<0){$clbal16=0-$clbal16;$strcls16=$clbal16.'C';}else{$strcls16=$clbal16.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=15;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal15=($opnbal+$debit)-$credit;if($clbal15<0){$clbal15=0-$clbal15;$strcls15=$clbal15.'C';}else{$strcls15=$clbal15.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";
$id=17;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal17=($opnbal+$debit)-$credit;if($clbal17<0){$clbal17=0-$clbal17;$strcls17=$clbal17.'C';}else{$strcls17=$clbal17.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=18;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal18=($opnbal+$debit)-$credit;if($clbal18<0){$clbal18=0-$clbal18;$strcls18=$clbal18.'C';}else{$strcls18=$clbal18.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';	
$totprofit=$totloss=0;
$totgrexpense=$clbal12+$clbal16+$clbal17+$clbal18;$totgrincome=$clbal11+$clbal15;
if($totgrexpense>$totgrincome){$totloss=$totgrexpense-$totgrincome;}else{$totprofit=$totgrincome-$totgrexpense;}
$totalgr=$totgrexpense+$totprofit;


$id=4;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal4=($opnbal+$debit)-$credit;if($clbal4<0){$clbal4=0-$clbal4;$strcls4=$clbal4.'C';}else{$strcls4=$clbal4.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=3;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal3=($opnbal+$debit)-$credit;if($clbal3<0){$clbal3=0-$clbal3;$strcls3=$clbal3.'C';}else{$strcls3=$clbal3.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";


$id=14;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal14=($opnbal+$debit)-$credit;if($clbal14<0){$clbal14=0-$clbal14;$strcls14=$clbal14.'C';}else{$strcls14=$clbal14.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=13;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal13=($opnbal+$debit)-$credit;if($clbal13<0){$clbal13=0-$clbal13;$strcls13=$clbal13.'C';}else{$strcls13=$clbal13.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=4 order by id";
$result_led=mysqli_query($con,$sql);
$lclbal4=0;
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
  $lclbal4+=$lclbal12;
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
}
$lclbal3=0;
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=3 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
  $lclbal3+=$lclbal11;	
/// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
}


$netprofit=$netloss=0;
$totexpense=$totgrexpense+$clbal14+$lclbal4;
$totincome=$totgrincome+$clbal13+$lclbal3;
if($totexpense>$totincome){$netloss=$totexpense-$totincome;}else{$netprofit=$totincome-$totexpense;}
$total=$totexpense+$netprofit;

if($netprofit>0){$totbig+=$netprofit;} if($netloss>0){$totbig+=$netloss;}
/* end of income stmnt */
$diffcr=$diffdr=0;
if($netprofit>=0)
{
  if($totasset>$totliabilities+$netprofit){$diffcr=$totasset-($totliabilities+$netprofit);$totliabilities+=$netprofit+$diffcr;}
  elseif($totasset<$totliabilities+$netprofit){$diffdr=($totliabilities+$netprofit)-$totasset;$totasset+=$diffdr+$netprofit;}
  
}
if($netloss>0)
{
  if(($totasset-$netloss)>$totliabilities){$diffcr=($totasset-$netloss)-($totliabilities);$totliabilities+=$diffcr-$netloss;}
  elseif(($totasset-$netloss)<$totliabilities){$diffdr=($totliabilities)-($totasset-$netloss);$totasset+=$diffdr-$netloss;}
  
}
if($diffcr>0)
{
	if($netprofit>0){
?>
<tr>
						<td align="left"><?php echo "Profit and Loss Account (Net Profit)";?></td>
						<td align="right"><?php echo $netprofit;?></td>
                        <td align="left"><?php echo "";?></td>
						<td align="right"><?php echo '';?></td>
						
				  </tr>
                  <?PHP } else if($netloss>0){?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				        <td align="left"><?php echo "Profit and Loss Account (Net Loss)";?></td>
						<td align="right"><?php echo $netloss;?></td>
						</tr>
<?php
				  }
 }
if($diffdr>0)
{
	if($netprofit>0){
?>
<tr>
						<td align="left"><?php echo "Profit and Loss Account (Net Profit)";?></td>
						<td align="right"><?php echo $netprofit;?></td>
                        <td align="left"><?php echo "";?></td>
						<td align="right"><?php echo '';?></td>
						
				  </tr>
                  <?PHP } else if($netloss>0){?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				        <td align="left"><?php echo "Profit and Loss Account (Net Loss)";?></td>
						<td align="right"><?php echo $netloss;?></td>
						</tr>
<?php
				  }

}
If($opbaldiff>0 ){ 
?>

<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
						<td align="left"><?php echo "Difference in O/P Balance";?></td>
						<td align="right"><?php echo $opbaldiff;?></td>
			  </tr>
              <?PHP
}

	
If($opbaldiff<0 ){ 
?>

<tr>
						<td align="left"><?php echo "Difference in O/P Balance";?></td>
						<td align="right"><?php echo $opbaldiff;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "" ?></td>
			  </tr>
              <?PHP
}

?>	


<tr>
						<td align="left"><?php echo "Total Assets";?></td>
						<td align="right"><?php echo $totbig+$opbaldiff+$netprofit*2-$netloss*2;?></td>
						<td align="left"><?php echo "Total Liabilities and Owner's equity";?></td>
						<td align="right"><?php echo $totbig+$opbaldiff+$netprofit*2-$netloss*2;?></td>
				  </tr>


			</tbody>
			</table>
            
            
            
            
            
            
            
            
            
            
				          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-xs-6">
            <p class="lead">&nbsp;</p>
            <div class="table-responsive"></div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../Hili Trucksales/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
