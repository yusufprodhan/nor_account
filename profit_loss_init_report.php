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
              <i class="fa fa-globe"></i> Hili Truck Mailk Group Industries Ltd. 
              <small class="pull-right">Date: <?php echo date("Y-m-d H:i:s");?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <strong>Report Name : Profit Loss A/C</strong>
          </div><!-- /.col -->
          </div>
          
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
               <?php
$hidvouchertype=0;
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



	?>

<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Gross Expenses </th><th align="right">      Dr. Amount</th>
                        <th align="left">Gross Incomes</th><th align="right">        Cr. Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					?>
					
				<tr>
						<td align="left"><?php echo "Direct Expenses";?></td>
						<td align="right"><?php echo $strcls12;?></td>
						<td align="left"><?php echo "Direct Incomes";?></td>
						<td align="right"><?php echo $strcls11;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=12 order by id";
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
?>
<tr>
						<td align="left"><?php echo "Administrative Expenses";?></td>
						<td align="right"><?php echo $strcls17;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				  </tr>
<?PHP

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=17 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname17=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal17=$lopbal+$ldebit-$lcredit; $lclbaltype17='D'; if ($lclbal17<0){$lclbal17=0-$lclbal17;$lclbaltype17='C';}}
  elseif($lopbaltype=='C'){$lclbal17=$lopbal+$lcredit-$ldebit; $lclbaltype17='C';if ($lclbal17<0){$lclbal17=0-$lclbal17;$lclbaltype17='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname17;?></td>
						<td align="right"><?php echo $lclbal17.$lclbaltype17;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Marketing Expenses";?></td>
						<td align="right"><?php echo $strcls18;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				  </tr>
<?PHP

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=18 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname18=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal18=$lopbal+$ldebit-$lcredit; $lclbaltype18='D'; if ($lclbal18<0){$lclbal18=0-$lclbal18;$lclbaltype18='C';}}
  elseif($lopbaltype=='C'){$lclbal18=$lopbal+$lcredit-$ldebit; $lclbaltype18='C';if ($lclbal18<0){$lclbal18=0-$lclbal18;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname18;?></td>
						<td align="right"><?php echo $lclbal18.$lclbaltype18;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
                  <?PHP }
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=11 order by id";
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
						<td align="left"><?php echo "Purchases";?></td>
						<td align="right"><?php echo $strcls16;?></td>
						<td align="left"><?php echo "Sales";?></td>
						<td align="right"><?php echo $strcls15;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=16 order by id";
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

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=15 order by id";
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
						<td align="left"><?php echo "Total Gross Expenses";?></td>
						<td align="right"><?php echo $totgrexpense;?></td>
						<td align="left"><?php echo "Total Gross Incomes";?></td>
						<td align="right"><?php echo $totgrincome;?></td>
				  </tr>

<?PHP

if($totloss>0){
?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Gross Loss C/F";?></td>
						<td align="right"><?php echo $totloss ;?></td>
				  </tr>
<?PHP
}
else
{
?>
<tr>
						<td align="left"><?php echo "Gross Profit C/F";?></td>
						<td align="right"><?php echo $totprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Dr".$totalgr;?></td>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Cr".$totalgr?></td>
						
				  </tr>

			</tbody>
			</table>
            
            
            <table class="table table-bordered" >
				<thead>
					<tr>
						<th>Net Expenses </th><th align="right">      Dr. Amount</th>
                        <th align="left">Net Incomes</th><th align="right">        Cr. Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					?>
					
				<tr>
						<td align="left"><?php echo "Indirect Expenses";?></td>
						<td align="right"><?php echo $strcls14;?></td>
						<td align="left"><?php echo "Indirect Incomes";?></td>
						<td align="right"><?php echo $strcls13;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=14 order by id";
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

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=13 order by id";
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

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=4 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname=$row_led[1];
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
						<td align="left"><?php echo "Total Expenses";?></td>
						<td align="right"><?php echo $totexpense;?></td>
						<td align="left"><?php echo "Total Incomes";?></td>
						<td align="right"><?php echo $totincome;?></td>
				  </tr>

<?PHP

if($netloss>0){
 if($totprofit>=0){
?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Gross Profit C/F";?></td>
						<td align="right"><?php echo $totprofit ;?></td>
				  </tr>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Net Loss ";?></td>
						<td align="right"><?php echo $netloss ;?></td>
				  </tr>

<?PHP
}
else
{
?>
<tr>
						<td align="left"><?php echo "Gross Loss C/F";?></td>
						<td align="right"><?php echo $totloss ;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Net Loss ";?></td>
						<td align="right"><?php echo $netloss ;?></td>
				  </tr>


<?PHP	
	}
}
else if($netprofit>=0)
{
if($totloss>0)
{
?>
<tr>
						<td align="left"><?php echo "Gross Loss C/F";?></td>
						<td align="right"><?php echo $totprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
                        
						
				  </tr>
<tr>
						<td align="left"><?php echo "Net Profit C/F";?></td>
						<td align="right"><?php echo $netprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>

<?PHP
}
else
{
?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
                        <td align="left"><?php echo "Gross Profit C/F";?></td>
						<td align="right"><?php echo $totprofit;?></td>
						
						
				  </tr>
<tr>
						<td align="left"><?php echo "Net Profit C/F";?></td>
						<td align="right"><?php echo $netprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>


<?PHP
}
}
?>
<tr>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Dr".$total;?></td>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Cr".$total?></td>
						
				  </tr>

			</tbody>
			</table>
            
            
            
            
            
            
            
            
            
            
			</div>
	
	
	</div>	          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-xs-6">
            <p class="lead">&nbsp;</p>
            <div class="table-responsive">
              
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../Hili Trucksales/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
