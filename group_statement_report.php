<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hili Truck | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="../paccount/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="../paccount/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

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
          <div class="col-sm-4 invoice-col"><address>
            From
          </address>
            <address>
            <strong>Hili Truck Mailk Group.</strong><br>
            </address>
          </div><!-- /.col -->
          </div>
          
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
               <?php
$hidvouchertype=0;
require 'db/connect.php';
//$ledger=$_GET['ledger'];
$groupid=$_GET['groupid'];
$startdate=$_GET['startdate'];
$enddate=$_GET['enddate'];
$showstartdate=$_GET['showstartdate'];
$showenddate=$_GET['showenddate'];
$groupbal=0.0;	 
	 $sqlincomeroot="select id from groups where parent_id=$groupid";   $resultincomeroot=mysqli_query($con,$sqlincomeroot);
			while($rowincomeroot = mysqli_fetch_row($resultincomeroot)){
							$incomechildlevel1=$rowincomeroot[0];
	
	$sqlincomechildlevel1="select id from groups where parent_id=$incomechildlevel1";
							//print $sqlincomechildlevel1; 
							$resultincomechildlevel1=mysqli_query($con,$sqlincomechildlevel1);
							while($rowincomechildlevel1 = mysqli_fetch_row($resultincomechildlevel1)){
							$incomechildlevel2=$rowincomechildlevel1[0];
	
	
	$selectledgers="select * from ledgers where group_id=$incomechildlevel2";
$resultledgers=mysqli_query($con,$selectledgers);
//$groupbal=0.0;
while ($rowledgers = $resultledgers->fetch_object()) {
	$ledger=$rowledgers->id;			
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C'  and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,e.date,t.name as tname  from  entries e,entryitems m, ledgers l, entrytypes t where  e.entrytype_id=t.id and m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '$startdate' and '$enddate' and m.refund=0";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                   <h4> Ledger Head : <?php echo $rowledger->ledgername;?> </h4>
                <hr>
               <?PHP print "Opening Balance as on ".$showstartdate." is ".$opbalance." ".$optype; ?>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher</th>
						<th>Ledger</th>
						<th>Type</th>
						<th>Tag</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->amount;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='C';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='D';
								 }
							}
						}
						else if ($dc=='C') 
						{
							if($cumtype=='C')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='D';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='C';
								 }
							}
						}
						 print $cumbalance.'  '.$cumtype;	?></td>
						
				  </tr>
				
			<?php
			
			}
			?>
			</tbody>
			</table>
			</div>
	
    <p class="pull-right"><?PHP print "closing balance Balance as on ".$showenddate." is ".$cumbalance." ".$cumtype; ?></p><hr>
    

<?PHP
$groupbal+=$cumbalance;
}

							}
							
							
	$selectledgers="select * from ledgers where group_id=$incomechildlevel1";
$resultledgers=mysqli_query($con,$selectledgers);
//$groupbal=0.0;
while ($rowledgers = $resultledgers->fetch_object()) {
	$ledger=$rowledgers->id;			
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C'  and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,e.date,t.name as tname  from  entries e,entryitems m, ledgers l, entrytypes t where  e.entrytype_id=t.id and m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '$startdate' and '$enddate' and m.refund=0";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                   <h4> Ledger Head : <?php echo $rowledger->ledgername;?> </h4>
                <hr>
               <?PHP print "Opening Balance as on ".$showstartdate." is ".$opbalance." ".$optype; ?>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher</th>
						<th>Ledger</th>
						<th>Type</th>
						<th>Tag</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->amount;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='C';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='D';
								 }
							}
						}
						else if ($dc=='C') 
						{
							if($cumtype=='C')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='D';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='C';
								 }
							}
						}
						 print $cumbalance.'  '.$cumtype;	?></td>
						
				  </tr>
				
			<?php
			
			}
			?>
			</tbody>
			</table>
			</div>
	
    <p class="pull-right"><?PHP print "closing balance Balance as on ".$showenddate." is ".$cumbalance." ".$cumtype; ?></p><hr>
    

<?PHP
$groupbal+=$cumbalance;
}						
							
							
			}
$selectledgers="select * from ledgers where group_id=$groupid";
$resultledgers=mysqli_query($con,$selectledgers);
//$groupbal=0.0;
while ($rowledgers = $resultledgers->fetch_object()) {
	$ledger=$rowledgers->id;			
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C'  and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,e.date,t.name as tname  from  entries e,entryitems m, ledgers l, entrytypes t where  e.entrytype_id=t.id and m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '$startdate' and '$enddate' and m.refund=0";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                   <h4> Ledger Head : <?php echo $rowledger->ledgername;?> </h4>
                <hr>
               <?PHP print "Opening Balance as on ".$showstartdate." is ".$opbalance." ".$optype; ?>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher</th>
						<th>Ledger</th>
						<th>Type</th>
						<th>Tag</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					
					
					
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->amount;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='C';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='D';
								 }
							}
						}
						else if ($dc=='C') 
						{
							if($cumtype=='C')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='D';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='C';
								 }
							}
						}
						 print $cumbalance.'  '.$cumtype;	?></td>
						
				  </tr>
				
			<?php
			
			}
			?>
			</tbody>
			</table>
			</div>
	
    <p class="pull-right"><?PHP print "closing balance Balance as on ".$showenddate." is ".$cumbalance." ".$cumtype; ?></p><hr>
    

<?PHP
$groupbal+=$cumbalance;
}
?>
	<div class="panel panel-info">
<div class="panel-heading"><?PHP print "closing total amount as on ".$showenddate." is ".$groupbal; ?></div>
  <div class="panel-body">
    
  </div>
</div>

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
