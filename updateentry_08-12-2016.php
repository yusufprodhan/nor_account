<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hili Truck Mailk Group | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    
    
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="assets/backend/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/backend/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="assets/backend/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />

<link href="assets/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="assets/backend/css/style.css" rel="stylesheet" />
<link href="assets/backend/css/style-responsive.css" rel="stylesheet" />
<link href="assets/backend/css/style-default.css" rel="stylesheet" id="style_color" />
<link href="assets/backend/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

<link href="assets/plugin/uniform/themes/default/css/uniform.default.css" rel="stylesheet" type="text/css" />

<!--<link href="assets/plugin/chosen_v1.4.2/chosen.min.css" rel="stylesheet" type="text/css" />-->
<link href="assets/plugin/select2_v4.0.0/css/select2.min.css" rel="stylesheet" type="text/css" />

<link href="assets/backend/assets/datepicker/datepicker.css" rel="stylesheet">

 <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
</head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Hili Truck</b>Group</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "welcome ".$_SESSION['userid'];?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      A B M JAMIL - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <?php 
		include 'leftmenu.php'; 
		require 'db/connect.php';


		?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?PHP
			$type=0;
			if((isset($_GET['hid']))||(isset($_GET['type'])))
			{
				if(isset($_GET['hid'])){$type=$_GET['hid'];}
				
				if (isset($_GET['type'])) {$type=$_GET['type'];}
				
				
$sql=$db->query("select name from entrytypes where id=$type");
	$row = $sql->fetch_object();
	$type_name=$row->name;
echo"<script>document.form1.hid.value='$type';</script>";?> <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type_name?></span></h3>
                </div>
<?PHP
}

if (isset($_POST['vouchertypeentry'])) {
$type=$_POST['vouchertypeentry'];
//print $type;
$sql=$db->query("select name from entrytypes where id=$type");
	$row = $sql->fetch_object();
	$type_name=$row->name;
echo"<script>document.form1.hid.value='$type';</script>";?> <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type_name?></span></h3>
                </div>
<?PHP
}

?>
			
            <small>Entry Area</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- Main row -->
          <div class="row">
          <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th">Customer and Payment Information</span></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                
		<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
          <?PHP
		  if (isset($_GET['id'])){$id=$_GET['id'];}
		  if (!empty($_GET['did'])) {
						   $del_id=$_GET['did'];
						   $del_query="delete from entryitems where id=$del_id"; 
			               $db->query($del_query);
	 					   ?>
      <div class="col-md-12">
      <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Warning!</strong> One Row Deleted.
      </div>
      </div>
					<?php	
		  }
						if (!empty($_GET['cid'])) {
						   $del_id=$_GET['cid'];
						   $del_query="delete from entryitems where id=$del_id"; 
			               $db->query($del_query);
	 					   ?>
      <div class="col-md-12">
      <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Warning!</strong> One Row Deleted.
      </div>
      </div>
					<?php
						}	
           

										if (isset($_POST['debit_add'])){
		      if($_POST['debit_add']=='Add Debit'){
				  $txtnumber 		= $_POST['txtnumber'];
				  $txtdate 	= $_POST['txtdate'];
				  //$bank 		= $_POST['bank'];
					//$cheque 		= $_POST['cheque'];
					//$mobile 		= $_POST['mobile'];
					$debit_chart_id 	= $_POST['debit_chart_id'];
					$debit_amount 		= $_POST['debit_amount'];
					$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($txtnumber,$debit_chart_id,$debit_amount,'D')";
			  
			 // print $sql;
			  $result=mysqli_query($con,$sql);
								  }
										}
										
										
	if (isset($_POST['credit_add'])){	      if($_POST['credit_add']=='Add Credit'){
				  $txtnumber 		= $_POST['txtnumber'];
				  $txtdate 	= $_POST['txtdate'];
				  $bank 		= $_POST['bank'];
					$cheque 		= $_POST['cheque'];
					$mobile 		= $_POST['mobile'];
					$credit_chart_id 	= $_POST['credit_chart_id'];
					$credit_amount 		= $_POST['credit_amount'];
					$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($txtnumber,$credit_chart_id,$credit_amount,'C')";
			  
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  				  }
										}
										
										?>
        
                <form class="form-horizontal" name="form1" method="post" action ="updatesave.php">
                <input type="hidden" name="hdrtotal">
                <input type="hidden" name="hcrtotal">
                <input type="hidden" name="hidsql">
                <input type="hidden" name="hid" id= "hid" value="<?PHP echo $type;?>">
                  <div class="box-body">
                   
                        
                    <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Number</label>
                          <div class="col-sm-4">
                            <INPUT type="text" name="txtnumber" id="txtnumber" data-validation="number" data-validation-allowing="float" data-validation-error-msg="Only number" readonly/>
                          </div>
                          <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                          <div class="col-sm-4">
                            <INPUT type="date" name="txtdate" id="txtdate" value="<?PHP print $dt;?>" />
                          </div>
                    </div>
                        <?php 
		
		$sql=$db->query("select * from entries where id=$id ");
	$row = $sql->fetch_object();
	$entr_id=$row->id;$narat=$row->narration;$dt=$row->date;$bank=$row->bank;$cheque=$row->cheque;$chqdate=$row->chqdate;$mobile=$row->mobile;
	//print $entr_id;
	print "<script>document.form1.txtnumber.value=$entr_id;</script>";
	 /*print "<script>document.form1.txtdate.value=$dt;</script>";
	*/
	$sql1234="select p.id,p.paymentname  from paymentmode p,entries e where e.paymentmode=p.id and e.id=$entr_id";
	$res11 = $db->query($sql1234);
	$row11 = $res11->fetch_row();
	$pmode=$row11[0];
	?>
                       <div class="form-group" id="paymentdiv">
                          <label for="inputEmail3" class="col-sm-2 control-label">Paying By</label>
                          <div class="col-sm-4">
                        <SELECT  class="form-control" name="pmode" id="pmode">
				<?php $sql123="select id,paymentname  from paymentmode";$res1 = $db->query($sql123);?>
                    <?php while($row1 = $res1->fetch_row())  {
					if($pmode==$row1[0]){
					?>
					
                <option value="<?php echo $row1[0];?>" selected><?php echo $row1[1];?></option>
                <?php }else{ ?>
                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
				<?PHP
                } } ?>
                </SELECT>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Cheque Info</label>
                     <div class="col-sm-4">
                     <input type="text" class="form-control" placeholder="Bank Name" name="bank" value="<?PHP print $bank;?>">
                     <input type="text" class="form-control" placeholder="Cheque No" name="cheque"  value="<?PHP print $cheque;?>"><INPUT type="date" name="txtchqdate" id="txtchqdate" class="form-control"  value="<?PHP print $chqdate;?>">
                     <input type="text" class="form-control" placeholder="Mobile Number" name="mobile"  value="<?PHP print $mobile;?>">
                     </div>
                    </div>
                    
                    
                    
                    <div class="row"></div>
                    <div class="clear"></div>
          
                    
                    <div class="row-fluid">
				<div class="span12">
					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget blue">
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Entry Area</h4>
							<span class="tools">
								<a href="javascript:;" class="icon-chevron-down"></a>
							</span>
						</div>
                        
						<div class="widget-body">
							<fieldset>
								<div class="span6 pull-left">
									<div id="debit_details">
										<div class="control-group">
											<legend class="span11">Debit Voucher</legend>
											<label class="control-label" for="debit_chart_id">Select A/C Head</label>
											<div class="controls">
												<select name="debit_chart_id" id="debit_chart_id" class="span10 chzn-select" data-placeholder="chart_id">
													<?php $sql=$db->query("select id,name from ledgers");?>
                    <?php while ($row = $sql->fetch_object()) {
					?>
					
                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                <?php } ?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="debit_amount">Debit Amount</label>
											<div class="controls">
												<input type="text" name="debit_amount" id="debit_amount" placeholder="00.00" class="span10" value="" />
											</div>
										</div>
										<div class="form-actions" >
											
												<input type="submit" name="debit_add" id="debit_add" class="btn btn-success" value="Add Debit" />
											
										</div>
									</div>
								</div>

								<div class="span6 pull-right">
									<div id="credit_details">
										<div class="control-group">
											<legend class="span11">Credit Voucher</legend>
											<label class="control-label" for="credit_chart_id">Select A/C Head</label>
											<div class="controls">
												<select name="credit_chart_id" id="credit_chart_id" class="span10 chzn-select" data-placeholder="chart_id">
													<?php $sql=$db->query("select id,name from ledgers");?>
                    <?php while ($row = $sql->fetch_object()) {
					?>
					
                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                <?php } ?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="credit_amount">Credit Amount</label>
											<div class="controls">
												<input type="text" name="credit_amount" id="credit_amount" placeholder="00.00" class="span10" value="" />
											</div>
										</div>
										<div class="form-actions">
											
												<input type="submit" name="credit_add" id="credit_add" class="btn btn-success" value="Add Credit" />
											
										</div>
									</div>
								</div>

							</fieldset>

						</div>
                        
                          
						
					</div>
					<!-- END EXAMPLE TABLE widget-->
                 
                    
                     
                    
                    
				</div>
			</div>
                    <div class="clear"></div>
                  
                 </div><!-- /.box-body -->
                 
                 
                  <div class="box-footer">
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
													<th class="center">Memo</th>
													<th class="center">Action</th>
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
															<td class="center"><?php //echo $list['memo']; ?></td>
															<td class="center">
																<input type="hidden" value="<?php //echo $list['id']; ?>" /><a href="updateentry.php?did=<?php echo $row->id;?>&id=<?php echo $entr_id;?>&type=<?php echo $type;?>"><span class="btn btn-danger debit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span></a>
															</td>
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
													<th class="left" colspan="4">&nbsp;</th>
												</tr>
												<tr>
													<th colspan="2">Total </th>
													<th colspan="2" class="right" id="debit_total"><?php echo number_format($debit_amount, 2); ?></th>
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
													<th class="center">Memo</th>
													<th class="center">Action</th>
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
															<td class="center"><?php //echo $list['memo']; ?></td>
															<td class="center">
																<input type="hidden" value="<?php //echo $list['id']; ?>" /><a href="updateentry.php?cid=<?php echo $row2->id;?>&id=<?php echo $entr_id;?>&type=<?php echo $type;?>"><span class="btn btn-danger credit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span></a>
															</td>
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
													<th class="left" colspan="4">&nbsp;</th>
												</tr>
												<tr>
													<th colspan="2">Total </th>
													<th colspan="2" class="right" id="credit_total"><?php echo number_format($credit_amount, 2); ?></th>
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
                            <INPUT type="textarea" name="txtnarration" id="txtnarrat"  value="<?PHP print $narat;?>"/>
                          </div></div>
<?php print "<script>document.form1.txtnarration.value=$narat;</script>";?>       
						<div class="form-actions center">
							<input type="submit" name="complete_update"     class="btn btn-success" id="journal_complete" value="Complete Journal Entry" />&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="show_entry.php">BACK </a>
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->
                 
                    
                     
                    
                    
				</div>
			</div>
                  </div><!-- /.box-footer -->
               
                </form>
              </div><!-- /.box -->
           </div>
         
     
                    <?PHP
					
					?>
                   <!-- table col -->
            <div class="col-md-12">
               <!-- TABLE: LATEST ORDERS --><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
           
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://websmartbd.com">Websmart Bangladesh</a>.</strong> All rights reserved.
      </footer>

      
 <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
   
<script src="js/jquery.form-validator.min.js"></script>
<script>$.validate();</script>
<script>
    
		$(document).ready(function () {
		toggleFields(); //call this first so we start out with the correct visibility depending on the selected form values
		//this will call our toggleFields function every time the selection value of our underAge field changes
		$("#pmode").change(function () {
			toggleFields();
		});
	
	
	
	});
	
		//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
	function toggleFields() {
		
		if ($("#pmode").val() =="2"){
					$("#chaqueinput").show();
					$("#poddinfo").hide();
			$("#bikashinfo").hide();
					 }
		else if (($("#pmode").val() >"2")&&($("#pmode").val() <"5")){
					$("#poddinfo").show();
					$("#chaqueinput").hide();
			
			$("#bikashinfo").hide();
					 }			 
		else if ($("#pmode").val() == "5"){
					$("#bikashinfo").show();
					$("#chaqueinput").hide();
			$("#poddinfo").hide();
			
					 }
		
		else{
			$("#chaqueinput").hide();
			$("#poddinfo").hide();
			$("#bikashinfo").hide();
			}
	}
  </script> 
 <script src="jquery.datetimepicker.js"></script>
<script>
//$('#txtdate').datetimepicker();
</script>
 
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
