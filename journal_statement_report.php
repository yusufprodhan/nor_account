<!DOCTYPE html>
<html>
  <head>
     <meta charset="UTF-8">
    <title>Hili Truck | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"><img src="images/Hili Trucklogo.png" alt="..." class="img-rounded" width="42" height="42"></i> Hili Truck Mailk Group
              <small class="pull-right">Date: <?php echo date("Y-m-d H:i:s");?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        
        <!-- info row -->
        
          
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            
               <?php
$hidvouchertype=0;
require 'db/connect.php';
$ledger=$_GET['ledger'];
$startdate=$_GET['startdate'];
$enddate=$_GET['enddate'];
$showstartdate=$_GET['showstartdate'];
$showenddate=$_GET['showenddate'];
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id  and e.entrytype_id=m.entrytype_id  and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C' and e.id=m.entry_id  and e.entrytype_id=m.entrytype_id  and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,sum(m.amount)as samt from  entries e,entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and m.refund=0  and e.date between '$startdate' and '$enddate' group by e.date";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			<div >
                <div>
                         <h3>Ledger Head <?php echo ' '.$rowledger->ledgername;?> </h3><div class="pull-right">From: <?PHP print '      '.$startdate.'    To:  '.$enddate; ?></div><br>
                </div>
			</div>


			<div class="table-responsive">
			<table width="100%" class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher no</th>
						
						<th>Type</th>
						<th>Ref</th>
						<th>Debit(TK)</th>
						<th>Credit (TK)</th>
						<th>Balance</th>
						<th>Notes</th>
					</tr>
				</thead>
				<tbody>
                <tr>
                <td ><strong><?PHP print "Opening " ?></strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong><?PHP if($optype=='D'){print 'TK '.number_format($opbalance, 2, '.', ',');}; ?></strong></td>
                <td><strong><?PHP if($optype=='C'){print 'TK '.number_format($opbalance, 2, '.', ',');}; ?></strong></td>
                <td></td>
                <td></td>
                </tr>
				<?php
				$totdeb=0.0;$totcred=0.0;
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					$vtype=$row->entrytype_id;
					$select2="select e.id,DATE_FORMAT(e.date,'%Y-%m-%d')AS dt,e.narration,t.name from entries e, entrytypes t where e.entrytype_id=t.id and   e.entrytype_id=$vtype  and e.id=$id  and e.date between '$startdate' and '$enddate'";
					$result2=mysqli_query($con,$select2);
					
					while ($row2 = $result2->fetch_object()) {
					?>
				<tr>
						<td><?php $dt2=$row2->dt; print $dt2;?></td>
						<td><?php echo $row2->id;?></td>
						
						<td><?php echo $row2->name;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo number_format($row->samt, 2, '.', ',');$totdeb+=$row->samt;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo number_format($row->samt, 2, '.', ',');$totcred+=$row->samt;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->samt;
							}
							else
							{
								$cumbalance-=$row->samt;
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
								$cumbalance+=$row->samt;
							}
							else
							{
								$cumbalance-=$row->samt;
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
						 print number_format($cumbalance, 2, '.', ',').'  '.$cumtype;	?></td>
						<td><?php echo $row->itemnarat;?></td>
				  </tr>
				
			<?php
			}
			}
			?>
            <tr>
						<td><strong>Total</strong></td>
						<td></td>
						
						<td></td>
						<td></td>
						<td><strong><?PHP print number_format($totdeb, 2, '.', ',');?></strong></td>
						<td><strong><?PHP print number_format($totcred, 2, '.', ',') ;?></strong></td>
						<td></td>
                        <td></td>
						
				  </tr>
                
                <tr>
                <td ><strong><?PHP print "closing " ?></strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong><?PHP if($cumtype=='D'){print 'TK '.number_format($cumbalance, 2, '.', ',');}; ?></strong></td>
                <td><strong><?PHP if($cumtype=='C'){print 'TK '.number_format($cumbalance, 2, '.', ',');}; ?></strong></td>
                <td></td>
                <td></td>
                </tr>
			</tbody>
			</table>
			</div>
	


		  
          
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../Hili Trucksales/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
