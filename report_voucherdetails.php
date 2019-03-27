<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hili Truck | Invoice</title>
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
              <img src="customimage/Hili Trucklogo.png" alt="logo" class="img-circle" width="55" height="55"> Hili Truck Mailk Group.
              <small class="pull-right">Print Date: <?php echo date("Y-m-d H:i:s");?></small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Hili Truck Mailk Group.</strong><br>
              23,Shah Suja Road,Netaiganj,<br>
              Narayanganj-1400,Bangladesh.<br>
              </address>
          </div><!-- /.col -->
          
           <?php 
		 
		require 'db/connect.php';


		$type=0;
			if((isset($_GET['hid']))||(isset($_GET['type'])))
			{
				if(isset($_GET['hid'])){$type=$_GET['hid'];}
				
				if (isset($_GET['type'])) {$type=$_GET['type'];}
				
				
//$sql=$db->query("select name from entrytypes where id=$type");
	//$row = $sql->fetch_object();
	//$type_name=$row->name;
?> <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type;?></span></h3>
                </div>
<?PHP
}
if (isset($_GET['id'])){$id=$_GET['id'];}
$sql=$db->query("select * from entries where id=$id ");
	$row = $sql->fetch_object();
	$entr_id=$row->id;$narat=$row->narration;$dt=$row->date;$bank=$row->bank;$cheque=$row->cheque;$mobile=$row->mobile;
?>          
         
         
         <div class="col-sm-4 invoice-col">
         <img alt="testing" src="barcode.php?text=<?php print $entr_id;;?>"/>
          </div><!-- /.col -->
         
          </div><!-- /.row -->
          <div class="row invoice-info">
          <div class="col-sm-12 invoice-col">
            <b>Invoice No: <?php print $entr_id;?></b>
          </div><!-- /.col -->
          </div>
          <div class="row invoice-info">
          <div class="col-sm-12 invoice-col">
            <b>Invoice Date: <?php print $dt;?></b>
          </div><!-- /.col -->
          </div>
          <div class="row invoice-info">
           <?php if($bank<>""){?>
          <div class="col-sm-12 invoice-col">
            <b>Bank: <?php echo $bank;?></b>
          </div><!-- /.col -->
          </div>
          <div class="row invoice-info">
          <?PHP } if($mobile<>""){?>
          <div class="col-sm-12 invoice-col">
            <b>Mobile: <?php echo $mobile;?></b>
          </div><!-- /.col -->
          </div>
          <div class="row invoice-info">
		  <?PHP } if($cheque<>""){?>
           <div class="col-sm-12 invoice-col">
            <b>Cheque: <?php echo $cheque;?></b>
          </div><!-- /.col -->
          <?PHP } ?>
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <div class="row-fluid">
				<div class="span12">
					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget blue">
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Voucher List</h4>
							<span class="tools">
								<a href="javascript:;" class="icon-chevron-down"></a>
							</span>
						</div>
                        
						<div class="widget-body">
							<fieldset>
							  <div class="span6 pull-left">
									<div id="debit_details">
										<table class="table table-bordered table-striped responsive">
											<thead>
												<tr>
													<th class="center">Debit A/C Head</th>
													<th class="center">Amount</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
												$debit_amount = 0;
												//foreach ($details as $list) {
													//if ($list['debit']) {
														
														$sql=$db->query("select m.id,l.name,m.amount from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$entr_id and m.dc='D'");
														if($sql<>NULL){
														while ($row = $sql->fetch_object()) {
														?>
														<tr>
															<td ><?php print $row->name; ?></td>
															<td class="center" ><?php  print $row->amount;//echo $list['debit']; ?></td>
															
														</tr>
														<?php
														$debit_amount += $row->amount;
													}
														}
	print "<script>document.form1.hdrtotal.value=$debit_amount;</script>";													
												//}
												?>
											</tbody>
											<tfoot>
												<tr>
													<th class="left" colspan="2">&nbsp;</th>
												</tr>
												<tr>
													<th colspan="1">Total </th>
													<th colspan="1" class="right" id="debit_total"><?php echo number_format($debit_amount, 2); ?></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

								<div class="span6 pull-right">
									<div id="credit_details">
										<table class="table table-bordered table-striped responsive">
											<thead>
												<tr>
													<th class="center">Credit A/C Head</th>
													<th class="center">Amount</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
												$credit_amount = 0;
											//	foreach ($details as $list) {
												//	if ($list['credit']) {
													
													$sql2=$db->query("select m.id,l.name,m.amount from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$entr_id and m.dc='C'");
						if($sql2<>NULL){							
														while ($row2 = $sql2->fetch_object()) {
														?>
														<tr>
															<td><?php print $row2->name;//echo $list['chart_name']; ?></td>
															<td class="center"><?php  print $row2->amount;//echo $list['credit']; ?></td>
															
														</tr>
														<?php
														$credit_amount += $row2->amount;
													}
						}
			print "<script>document.form1.hcrtotal.value=$credit_amount;</script>";										
												//}
												?>
											</tbody>
											<tfoot>
												<tr>
													<th class="left" colspan="2">&nbsp;</th>
												</tr>
												<tr>
													<th colspan="1">Total </th>
													<th colspan="1" class="right" id="credit_total"><?php echo number_format($credit_amount, 2); ?></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

							</fieldset>

						</div>
                        
                   <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Narration</label>
                          <div class="col-sm-4">
                            <?PHP print $narat;?>
                          </div></div>

					</div>
					<!-- END EXAMPLE TABLE widget-->
                 
                    
                     
                    
                    
				</div>
			</div>
          </div><!-- /.col -->
        </div><!-- /.row -->

        
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