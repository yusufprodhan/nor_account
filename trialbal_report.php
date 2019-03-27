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
          <div class="col-sm-12">
           <p align="center"> <h3><strong>Report Name : (Trial Balance)</strong></h3></p>
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
?>
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Account name</th>
						<th>Type</th>
						<th>O/P Balance</th>
                        <th>Debit Balance</th>
						<th>Credit Balance</th>
						<th>C/L Balance</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
$baldmain=0;
$balcmain=0;				
$sql_parent="select * from groups where parent_id is null order by id";
$result_pr=mysqli_query($con,$sql_parent);
while($row_parent = $result_pr->fetch_object())
{
$pr_id=$row_parent->id;
$grpname=$row_parent->name;
$opnbal=find_child_with_bal($pr_id);
$debit=find_child_with_debit($pr_id);
$credit=find_child_with_credit($pr_id);

$sql="select * from groups where parent_id=$pr_id";
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);


	 while($row11 = $result11->fetch_object())
      {
		   $id_child=$row11->id;
		
		
	    
		$debit+=find_child_with_debit($id_child);
$credit+=find_child_with_credit($id_child);
	  
	  }

$sql2="select sum(op_balance) as bal from ledgers where group_id=$pr_id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$pr_id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$pr_id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $baldmain+=$debit;
   //if($bal>=0){$baldmain+=$bal;}
	   
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$pr_id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   $balcmain+=$credit;
   //zif($bal<0){$balcmain+=$bal;}
   $clbal=($opnbal+$debit)-$credit;if($clbal<0){$clbal=0-$clbal;$strcls=$clbal.'C';$clbal=0-$clbal;}else{$strcls=$clbal.'D';}
   //print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";?>
<tr>
<td><?php echo $grpname;?></td>
<td><?php echo "Group";?></td>
<td><?php echo $stropn;?></td>
<td><?php echo $debit;?></td>
<td><?php echo $credit;?></td>
<td><?php echo $strcls;?></td>
</tr>
<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=$pr_id order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal=$lopbal+$ldebit-$lcredit; $lclbaltype='D'; if ($lclbal<0){$lclbal=0-$lclbal;$lclbaltype='C';}}
  elseif($lopbaltype=='C'){$lclbal=$lopbal+$lcredit-$ldebit; $lclbaltype='C';if ($lclbal<0){$lclbal=0-$lclbal;$lclbaltype='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
<td><?php echo $lname;?></td>
<td><?php echo "Ledger";?></td>
<td><?php echo $lopbal.$lopbaltype;?></td>
<td><?php echo $ldebit;?></td>
<td><?php echo $lcredit;?></td>
<td><?php echo $lclbal.$lclbaltype;?></td>
</tr>

<?PHP
}
$sql="select * from groups where parent_id=$pr_id order by id";
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
<td><?php echo $grpname;?></td>
<td><?php echo "Group";?></td>
<td><?php echo $stropn;?></td>
<td><?php echo $debit;?></td>
<td><?php echo $credit;?></td>
<td><?php echo $strcls;?></td>
</tr>
<?PHP
   $sql="select id,name,op_balance,op_balance_dc from ledgers where group_id=$id order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal=$lopbal+$ldebit-$lcredit; $lclbaltype='D'; if ($lclbal<0){$lclbal=0-$lclbal;$lclbaltype='C';}}
  elseif($lopbaltype=='C'){$lclbal=$lopbal+$lcredit-$ldebit; $lclbaltype='C';if ($lclbal<0){$lclbal=0-$lclbal;$lclbaltype='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
<td><?php echo $lname;?></td>
<td><?php echo "Ledger";?></td>
<td><?php echo $lopbal.$lopbaltype;?></td>
<td><?php echo $ldebit;?></td>
<td><?php echo $lcredit;?></td>
<td><?php echo $lclbal.$lclbaltype;?></td>
</tr>

<?PHP
}

}
}
?>
<tr>
<td><?php echo "";?></td>
<td><?php echo "";?></td>
<td><?php echo "";?></td>
<td><?php echo $baldmain;?></td>
<td><?php echo $balcmain;?></td>
<td><?php echo "";?></td>
</tr>

</tbody>
			</table>
		  </div>					          </div><!-- /.col -->
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
