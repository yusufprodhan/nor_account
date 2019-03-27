<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hili Truck | Challan</title>
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
              <img src="customimage/Hili Trucklogo.png" alt="..." class="img-rounded" width="42" height="42"> Hili Truck Mailk Group.
              <small class="pull-right">Date: <?php echo date("Y-m-d H:i:s");?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          
          
          <?php
		  include 'db/connection.php';
		  require 'db/connect.php';
		  $rowserial=1;
		  $ledger=$_GET['ledger'];
		  $startdate=$_GET['startdate'];
		  $enddate=$_GET['enddate'];
		  $showstartdate=$startdate1=$startdate;
				$showenddate=$enddate1=$enddate;
		  /*$order_id=$_GET['invoice'];
		  $mydopart=$_GET['donomymensytem'];
		  $challandate=$_GET['chdate'];
		  */
		  
		  $customer_query="Select cust_id,cname,address,contact from sales_customer where sales_customer.cust_id='$ledger'";
		  if ($result1 = $mysqli->query($customer_query)) {
		  while ($row1 = $result1->fetch_row()) {
						?>
		 
          
         
          <?php
			 }
		  }
		 ?>
         
         
         
          </div><!-- /.row -->
          <div class="row invoice-info">
          
          
       
            <h4 align="center">Customer Ledger</h4>
          
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row invoice-info">
          <div class="col-xs-12">
          <?PHP
            $opnbal=0;
$query2 = "select * from sales_customer where                   cust_id='$ledger'"; $result2 = $mysqli->query($query2);$row2 = $result2->fetch_object();
$cname=$row2->cname;
//print $cname;


$selectopn2 = "select * from sales_order o where o.customer_id='$ledger' and o.sales_date between '2001-01-01' and '$startdate'";
$resultopn2 = $mysqli->query($selectopn2);
while ($rowopn2 = $resultopn2->fetch_object()) {
$cust_id=$rowopn2->customer_id;
//print $cust_id;

$sales_amount=$rowopn2->sales_amount;
$paid_amount=$rowopn2->paid_amount;
$salestype=$rowopn2->salestype;
$bank='';
$cheque='';
$opnbal+=$sales_amount-$paid_amount;
}
$selectopn3 = "select p.*,bank,chequeno from sales_payment p left join  sales_paymentdetail on  p.paymentid=sales_paymentdetail.paymentid  where p.cust_id='$ledger' and p.paid_date between '2001-01-01' and '$startdate'";
$resultopn3 = $mysqli->query($selectopn3);
if($resultopn3 = $mysqli->query($selectopn3)){
while ($rowopn3 = $resultopn3->fetch_object()) {
$rowopn3 = $resultopn3->fetch_object();
$paid_amount=$rowopn3->paid_amount;
$paid_mod=$rowopn3->paid_mod;
$bank=$rowopn3->bank;
$chequeno=$rowopn3->chequeno;
$opnbal-=$paid_amount;
}}
 if($opnbal>0){$txtopnbal="(".$opnbal.")";}else{$txtopnbal=$opnbal;}


$cumbalance=$opnbal;

$selectopn4 = "select * from sales_order o where o.customer_id='$ledger' and o.sales_date between '$startdate' and '$enddate'";
$resultopn4 = $mysqli->query($selectopn4);

$selectopn5 = "select p.*,sales_paymentdetail.bank,sales_paymentdetail.chequeno from sales_payment p left join  sales_paymentdetail on  p.paymentid=sales_paymentdetail.paymentid  where p.cust_id='$ledger' and p.paid_date between 'startdate' and '$enddate'";
$resultopn5 = $mysqli->query($selectopn5);
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

	<div >
                <div >
                   <h4> Ledger Head :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <?php echo $cname;?> </h4><div class="pull-right">From: <?PHP print '      '.$startdate.'    To:  '.$enddate; ?></div><br><br>
                </div>
			</div>		

			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>SalesDate</th>
						<th>Payment mode</th>
						<th>Sales Amount(TK)</th>
						<th>Paid Amount(TK)</th>
						<th>Bank</th>
                        <th>cheque</th>
                        <th>Balance(TK)</th>
                        <th>Notes</th>
					</tr>
				</thead>
				<tbody>
                <tr>
                <td ><strong><?PHP print "Opening " ?></strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?PHP if($txtopnbal<>''||$txtopnbal<>0){ ?> <strong><?PHP print 'TK '.$txtopnbal;} ?></strong></td>
                <td></td>
                </tr>
				<?php
					while ($rowopn4 = $resultopn4->fetch_object()) 																																																								  						{
					$sales_amount=$rowopn4->sales_amount;
					$paid_amount=$rowopn4->paid_amount;
					$salestype=$rowopn4->salestype;
					$salesdate=$rowopn4->sales_date;
					
					$bank='';
					$chequeno='';
					$notes='';
					
					
					?>
				<tr>
						<td><?php echo $salesdate;?></td>
						<td><?php echo $salestype;?></td>
						<td><?php echo number_format($sales_amount, 2, '.', ',');?></td>
						<td><?php echo number_format($paid_amount, 2, '.', ',') ;$cumbalance+=$sales_amount-$paid_amount;if($cumbalance>0){$txtcumbalance="(".$cumbalance.")";}else{$txtcumbalance=0-$cumbalance;}?></td>
                        <td><?php echo $bank;?></td>
                        <td><?php echo $chequeno;?></td>
						<td><?php if($cumbalance>0){echo '('.number_format($cumbalance, 2, '.', ',').')';}else{echo number_format($txtcumbalance, 2, '.', ',').')';}?></td>
                        <td><?php echo $notes;?></td>
						
						
				  </tr>
				
			<?php
			}
			
			
					while ($rowopn5 = $resultopn5->fetch_object()) 																																																								  						{
					$sales_amount=0;
					$paid_amount=$rowopn5->paid_amount;
					$paid_mod=$rowopn5->paid_mod;
					$paid_date=$rowopn5->paid_date;
					$bank=$rowopn5->bank;
					$chequeno=$rowopn5->chequeno;
					$notes=$rowopn5->paymentnote;
					$cust_id=$rowopn5->cust_id;
					$paymentid=$rowopn5->paymentid;
					$sql="SELECT paymentid,status  from sales_integration where paymentid=".$paymentid." and cust_id='".$cust_id."'";
						//print $sql;
$resultopn=mysqli_query($con,$sql);									
						 if($rowopn = $resultopn->fetch_object()){$status=$rowopn->status; if($status==3){
					?>
				<tr>
						<td><?php echo $paid_date;?></td>
						<td><?php echo $paid_mod;?></td>
						<td><?php echo number_format($sales_amount, 2, '.', ',');?></td>
						<td><?php echo number_format($paid_amount, 2, '.', ',') ;$cumbalance+=$sales_amount-$paid_amount;if($cumbalance>0){$txtcumbalance="(".$cumbalance.")";}else{$txtcumbalance=$cumbalance;}?></td>
                        <td><?php echo $bank;?></td>
                        <td><?php echo $chequeno;?></td>
						<td><?php if($cumbalance>0){echo '('.number_format($cumbalance, 2, '.', ',').')';}else{echo number_format($txtcumbalance, 2, '.', ',').')';}?></td>
                         <td><?php echo $notes;?></td>
						
						
				  </tr>
				
			<?php
			}}}
if($cumbalance>0){$txtcumbalance="(".$cumbalance.")";}else{$txtcumbalance=$cumbalance;}			
			?>
            
			</tbody>
			</table>
          </div><!-- /.col -->
        </div><!-- /.row -->
</div>
        <div class="row">
              
            <div class="col-xs-12">
            
            <div>
            </div>
            <hr>
            <div class=" row invoice-info">
            <div class="col-xs-12">
            <div class="table-responsive">
              <table width="99%" class="table-responsive">
                <tr align="center">
                  <td style="width:33%">Prepared by </td>
                  <td style="width:33%">Checked by</td>
                  <td style="width:33%">Approved by</td>
                </tr>
              </table>
              </div>
              </div>
            </div>
          </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- ./wrapper -->
   <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
