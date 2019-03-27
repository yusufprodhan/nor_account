<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Road Runner | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
              <img src="customimage/Hili Trucklogo.png" alt="logo" class="img-circle" width="55" height="55"> Hilli Truck.
              <small class="pull-right">Print Date: <?php echo date("Y-m-d H:i:s");?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Hilli Truck</strong><br>
              <br>
              </address>
          </div><!-- /.col -->
          </div>
          <?PHP
		  require 'db/connect.php';
		  $startdate=$_GET['startdate'];
		  $enddate=$_GET['enddate']; ?> 
        <div class="row">
        <div class="col-md-12">
        <div >
                <div >
                   <div class="pull-right">From: <?PHP print '      '.$startdate.'    To:  '.$enddate; ?></div><br><br>
                </div>
			</div>
            <?PHP		
       $select="select e.id,DATE(e.date) as date  from entries e, entryitems m where e.date between '$startdate' and '$enddate' and e.entrytype_id=1 and e.entrytype_id=m.entrytype_id and e.id=m.entry_id and m.truck_id>0 group by e.id";
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
<div><b>From:</b> <?PHP print $startdate; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>To:</b> <?PHP print $enddate;?></div>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						
                        <th>SL</th>
                        <th>Tran Date</th>
						<th>Description</th>
						
						<th>Deposited Voucher No</th>
						
                        <th>Amount</th>
                        
                        
                        
						
						
					</tr>
				</thead>
				<tbody>
				<?php
				$sl=1;
				    $memamount=0.0;
					$nonmemamount=0.0;
					$grandtotamount=0.0;
					while ($row = mysqli_fetch_row($result)){
						$id=$row[0];$dt=$row[1];
						$memamount=0.0;
					$nonmemamount=0.0;
					$totamount=0.0;
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=1 and t.truck_type='A' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bigmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=1 and t.truck_type='B' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where i.refund=1 and t.mem_type=1 and i.entry_id=$id and i.dc='C' ";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$memrefund=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=2 and t.truck_type='A' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bignonmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=2 and t.truck_type='B' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlnonmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where i.refund=1 and t.mem_type=2 and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$nonmemrefund=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where i.refund=0 and i.truck_id>0  and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$tottruck=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where   i.refund=0 and t.mem_type=1 and t.truck_type='A' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bigmemNR=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where   i.refund=0 and t.mem_type=1 and t.truck_type='B' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlmemNR=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where     i.refund=0 and t.mem_type=2 and t.truck_type='A' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bignonmemNR=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where     i.refund=0 and t.mem_type=2 and t.truck_type='B' and i.entry_id=$id and i.dc='C'";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlnonmemNR=$rowA[0];
						$memamount+=$bigmemNR*100+$smlmemNR*50;
						$nonmemamount+=$bignonmemNR*100+$smlnonmemNR*100;
						$totamount=$memamount+$nonmemamount;
						$grandtotamount+=$memamount+$nonmemamount;
						if($memamount>0){
					?>				<tr>
						
                        <td><?php print $sl++;?></td>
                        <td><?php echo $dt;?></td>
						<td><?php echo 'Member';?></td>
						
						<td><?php echo $id;?></td>
						
						
						<td ><?php echo $memamount;?></td
                        
				  ></tr>
                  <?PHP }if($nonmemamount>0){ ?>
                  <tr>
						
                        <td><?PHP print $sl++;?></td>
                        <td><?php echo $dt;?></td>
						<td><?php echo 'NonMember';?></td>
						
						<td><?php echo $id;?></td>
						
						
						<td><?php echo $nonmemamount;?></td>
						
                        
				  </tr>
				
			<?php
			
				  }
			}
			
			
			?>
			<tr>
						
                        <td></td>
                        <td></td>
						<td><b>Total Amount</b></td>
						
						<td></td>
						
						
						<td><b><?php echo $grandtotamount;?></b></td>
						
                        
				  </tr>
            </tbody>
			</table>
			</div>
                    
        </div>
        </div>
        
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>
    <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
