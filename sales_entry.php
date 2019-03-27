<?php
session_start();
$_SESSION['storeDate']='';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hili Truck Mailk Group Accounts</title>
  
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P</b>UB</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Hili Truck Mailk Group</b>Group</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "welcome ".$_SESSION['userid'];?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="customimage/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Hili Truck Mailk Group Salt Industries
                      <small>Account Module 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-success btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="customimage/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Hili Truck Mailk Group Group</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
          <?php 
		  include 'leftmenu.php';
		  require 'db/connect.php';
		  ?>   
          <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Hili Truck Mailk Group Group Accounting
            <small>Software</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="row">
        <div class="col-md-12">
		<div class="box box-primary">
        <div class="box-body">
                <?PHP
			 
			$type=0;
			if((isset($_GET['hid']))||(isset($_GET['type'])))
			{
				if(isset($_GET['hid'])){$type=$_GET['hid'];}
				
				if (isset($_GET['type'])) {$type=$_GET['type'];}
				 $sql=$db->query("select name from entrytypes where id=$type");
				$row = $sql->fetch_object();
				//$type_name=$row->name;
			    echo"<script>document.form1.hid.value='$type';</script>";?> 
                  <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th"> Sales</span>&nbsp;Form</h3>
                </div>
				<?PHP
                }
                            
                if (isset($_POST['vouchertypeentry'])) {
                $type=$_POST['vouchertypeentry'];
                //print $type;
                $sql=$db->query("select name from entrytypes where id=$type");
                $row = $sql->fetch_object();
                $type_name=$row->name;
                echo"<script>document.form1.hid.value='$type';</script>";?> 
                                <div class="box-header with-border">
                                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type_name?> &nbsp;Form</h3>
                                </div>
                <?PHP
                }?>
                
          <!--Form Submission affect-->
          <?PHP
                          if (isset($_GET['id'])){$id=$_GET['id'];}
                          if (!empty($_GET['did'])) {
						   $del_id=$_GET['did'];
						    $sql="select ledger_id from  entryitems where id=$del_id";$result=mysqli_query($con,$sql);
						   $row=mysqli_fetch_row($result);
							$stockrow=$row[0];
							$sql="select ifnull(MAX(id),0) from stocktbl s where s.ledger_id=$stockrow";$result=mysqli_query($con,$sql);
						   $row=mysqli_fetch_row($result);
							$stockid=$row[0];
							$del_query="delete from stocktbl where id=$stockid"; 
			               $db->query($del_query);
					$result=mysqli_query($con,$sql);
						   $del_query="delete from entryitems where id=$del_id"; 
			               $db->query($del_query);
	 					   ?>
      
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Warning!</strong> One Row Deleted.
                          </div>
					<?php	
		  }
						if (!empty($_GET['cid'])) {
						   $del_id=$_GET['cid'];
						   $sql="select ledger_id from  entryitems where id=$del_id";$result=mysqli_query($con,$sql);
						   $row=mysqli_fetch_row($result);
							$stockrow=$row[0];
							$sql="select max(id) from stocktbl s where s.ledger_id=$stockrow";$result=mysqli_query($con,$sql);
						   $row=mysqli_fetch_row($result);
							$stockid=$row[0];
							$del_query="delete from stocktbl where id=$stockid"; 
			               $db->query($del_query);
					$result=mysqli_query($con,$sql);
						   $del_query="delete from entryitems where id=$del_id"; 
			               $db->query($del_query);
	 					   ?>
      
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Warning!</strong> One Row Deleted.
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
                   <!--Form Submission end-->                     
              <div class="box-body"><!-- voycher box body star-->
			       <!--form setup-->
                 <form class="form-horizontal" name="form1" method="post" action ="addsavesales.php">
                <input type="hidden" name="hdrtotal">
                <input type="hidden" name="hcrtotal">
                <input type="hidden" name="hidsql">
                <input type="hidden" name="hid" id= "hid" value="<?PHP echo $type;?>">
                <div class="form-group">
                <div class="col-md-2"><label for="inputEmail3" >Voucher No</label></div>
                <div class="col-md-2"><input type="text" name="txtnumber" id="txtnumber"  class="form-control" readonly/></div>
                <div class="col-md-1"><label for="inputEmail3" >Date</label></div>
                <div class="col-md-3"><INPUT type="date" name="txtdate" id="txtdate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-md-1"><label for="inputEmail3" >Pay Mode</label></div>
                <div class="col-md-3">
                    <select  class="form-control" name="pmode" id="pmode">
				    <?php $sql123="select id,paymentname  from paymentmode";$res1 = $db->query($sql123);?>
                    <?php while($row1 = $res1->fetch_row())  {
					?>
					
                 <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                 <?php } ?>
                 </select>
                 </div>
                
                </div>
                       <?php 
						$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
						$row = $sql->fetch_object();
						$entr_id=$row->maxid;
						//print $entr_id;
						print "<script>document.form1.txtnumber.value=$entr_id;</script>";
						
						
						?>
                 <!--disable div-->  
                
                 <!--disable div end-->
              <div class="form-group" >
              <div class="col-md-2"><label for="inputEmail3" >Cheque Info</label></div>
              <div class="col-md-3"><input type="text"  placeholder="Bank Name" name="bank" class="form-control col-xs-4"></div>
              <div class="col-md-3"><input type="text" class="form-control col-xs-4" placeholder="Cheque No" name="cheque" ></div>
              <div class="col-md-2"> <INPUT type="date" name="txtchqdate" id="txtchqdate" class="form-control col-xs-2" ></div>
              <div class="col-md-2"><input type="text" class="form-control" placeholder="Mobile Number" name="mobile"  ></div>
              </div>    
               
         </div>  <!--box body end-->
         </div><!--box primary-->
         </div> <!--box col-md-12-->    
         </row><!--voucher head row-->     
               
               
               
               
               
               <div class="row">
               <!--DEBIT FORM SETUP-->
              <div class="col-md-12">
              <div class="box box-success box-solid">
              <div class="box-header with-border"><h3 class="box-title">Sales Item</h3></div><!-- /.box-header -->
              <div class="box-body">
              <div class="form-group" >
              <div class="col-md-2"><label for="inputEmail3" >Item</label></div>
              <div class="col-md-10">
              <select name="item_chart_id" id="item_chart_id" class="form-control">
              <option value="0">Select An Item</option>
				    <?php $sql=$db->query("select l.id,l.name from ledgers l where l.group_id=28");?>
                    <?php while ($row = $sql->fetch_object()) {
					?>
                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                <?php } ?></select><div class="checkbox">
  <label><input type="checkbox" value="12" id="chkitem" name="chkitem">Add New</label>
</div></div>
              </div>
              
            <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Item Name</label></div>
			<div class="col-md-10">
			<input type="text" name="item_name" id="item_name" placeholder="00.00" class="form-control" value="" />
			</div>
			</div>
            <div class="form-group">
            <div class="col-md-2">
              <label class="control-label" for="debit_amount">Item Buy Price</label></div>
			<div class="col-md-10">
			<input type="text" name="item_buyprice" id="item_buyprice" placeholder="description" class="form-control" value="" />
			</div>               
            </div>
            <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Item Sale Price</label></div>
			<div class="col-md-10">
			<input type="text" name="item_saleprice" id="item_saleprice" placeholder="description" class="form-control" value="" />
			</div>               
            </div>
            <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Item Quantity</label></div>
			<div class="col-md-10">
			<input type="text" name="item_quantity" id="item_quantity" placeholder="description" class="form-control" value="" />
			</div>               
            </div>
            <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10">
             <input type="submit" name="debit_add" id="debit_add" class="btn btn-success" value="Add Sales" />
            </div>
            </div>
          
            </div><!-- /.box  body-->
            </div><!-- /.box-success box-solid-->
            </div><!-- /.col-md-6-->
            <!--DEBIT FORM CLOSE-->
            
            <div class="row">
            <div class="col-md-12">
              <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Customer Information</h3></div><!-- /.box-header -->
              <div class="box-body">
              
               <div class="col-md-2"><label for="inputEmail3" >Customer</label></div>
              <div class="col-md-10">
              <select name="supplier_chart_id" id="supplier_chart_id" class="form-control">
              <option value="0">Select Customer</option>
				    <?php $sql=$db->query("select l.id,l.name from ledgers l where l.group_id=26 ");?>
                    <?php while ($row = $sql->fetch_object()) {
					?>
                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                <?php } ?></select><div class="checkbox">
  <label><input type="checkbox" value="12" id="chksupplier" name="chksupplier">Add New</label>
</div>
              </div>
              <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount"> Name</label></div>
			<div class="col-md-10"><input type="text" name="sup_name" id="sup_name" placeholder="00.00" class="form-control" value="" /></div>
			</div>
            <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Address</label></div>
			<div class="col-md-10">
			<input type="text" name="sup_addr" id="sup_addr" placeholder="00.00" class="form-control" value="" />
			</div>
			</div>
             <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Mobile</label></div>
			<div class="col-md-10">
			<input type="text" name="sup_mob" id="sup_mob" placeholder="00.00" class="form-control" value="" />
			</div>
			</div>
             <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Email</label></div>
			<div class="col-md-10">
			<input type="text" name="sup_email" id="sup_email" placeholder="00.00" class="form-control" value="" />
			</div>
			</div>
              <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10">
             <input type="submit" name="supplier_add" id="supplier_add" class="btn btn-success" value="Add Customer" />
            </div>
            </div>
              
              </div>
              </div>
              </div>
            
               
                <!--End Form Setup-->
               <!-- TABLE: Debit Item information -->
              <div class="col-md-12">
              <div class="box box-success">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                     	<thead>
												<tr>
													<th class="center">Item Head</th>
													<th class="center">Price</th>
													<th class="center">Quantity</th>
													<th class="center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$debit_amount = 0;
												//foreach ($details as $list) {
													//if ($list['debit']) {
														
														$sql=$db->query("select m.id,l.id as lid,l.name,m.amount,m.itemnarat from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$entr_id and m.dc='C' ");


														while ($row = $sql->fetch_object()) {
															
$lid=$row->lid;
$sql2 = "SELECT s.sales_price,s.quantity FROM stocktbl s WHERE s.ledger_id = ".$lid." order by s.stock_date asc";
$query2 = mysqli_query($con, $sql2);

while($row2=mysqli_fetch_array($query2))
{
$bprice=$row2['sales_price'];
$quantity=$row2['quantity'];
}
														?>
														<tr>
															<td id="<?PHP print 'name'.$row->id?>"><?php print $row->name; ?></td>
															<td class="center" id="<?PHP print 'amount'.$row->id?>"><?php  print $bprice;//echo $list['debit']; ?></td>
															<td class="center"><?php echo $quantity; ?></td>
															<td class="center">
																<input type="hidden" value="<?php //echo $list['id']; ?>" /><a href="sales_entry.php?did=<?php echo $row->id;?>&type=<?php echo $type;?>"><span class="btn btn-danger debit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span></a>
															</td>
														</tr>
														<?php
														$debit_amount += $row->amount;
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
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                 <!-- End TABLE: Debit Item information -->
              
              <div class="col-md-12">
              <div class="box box-success">
                <div class="box-body">
                <div class="box-header with-border"><h3 class="box-title">Payment</h3></div>
                
                <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Cash</label></div>
			<div class="col-md-10">
			<input type="text" name="cashpay" id="cashpay" placeholder="00.00" class="form-control" value="" />
			</div>
			</div>
                <div class="form-group">
            <div class="col-md-2"><label class="control-label" for="debit_amount">Cheque</label></div>
			<div class="col-md-10">
			<input type="text" name="chequepay" id="chequepay" placeholder="00.00" class="form-control" value="" />
			</div>
			</div>
            <div class="col-md-12"> <INPUT type="date" name="txtchqdate1" id="txtchqdate1" class="form-control col-xs-2" ></div>
             <div class="form-group">
                  <label class="col-sm-2 control-label">Bank</label>   
                    <?php

require 'db/connect.php';
//$bankname = trim(mysql_escape_string($_POST["country_id"]));
$sql = "SELECT distinct(bankname) FROM bankinfo ORDER BY bankname";
$query = mysqli_query($con, $sql);
?>
<select name="bankname" id="drop1" class="form-control select2-container  col-sm-10">
	<option value="">Please Select the Bank Name</option>
	<?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
	<option value="<?php echo $rs["bankname"]; ?>"><?php echo $rs["bankname"]; ?></option>
	<?php } ?>
</select>
       </div> 
                   
                   <div class="form-group">
                      <label class="col-sm-2 control-label">Branch</label>
                    <div  id="branchname" class="col-sm-10"></div>
       </div> 

       <div class="form-group">
                      <label class="col-sm-2 control-label">Account</label>
         <?PHP $sql = "SELECT * FROM bankinfo  ORDER BY accountno";
$count = mysqli_num_rows( mysqli_query($con, $sql) );
if ($count > 0 ) {
$query = mysqli_query($con, $sql);
?>

<select name="accountno"  id="accountno"  class="form-control select2-container">
	<option value="">Please Select the Account Number</option>
	<?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
	<option value="<?php echo $rs["accountno"]; ?>"><?php echo $rs["accountno"]; ?></option>
	<?php }} ?>
</select>
         </div>
            
            
                
                </div>
                </div>
                 </div>
                 
              
                
                <!-- TABLE: Debit Item information -->
              <div class="col-md-12">
              <div class="box box-success">
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Narration</label>
                  <div class="col-md-10">
                   <INPUT type="text" name="txtnarration" id="txtnarration" class="form-control"/>
                   </div>
                   </div>
                   <hr>
                 <div class="form-group"> 
                 <div class="col-sm-offset-2 col-md-5">
                 
                  <input type="submit" name="complete" class="btn btn-lg btn-block btn-success" id="journal_complete" value="Complete Sales Entry" />
                 </div>
                 </div>
                 <div class="form-group"> 
                 <div class="col-md-5">
                 <a class="btn btn-lg btn-block btn-warning" href="show_entry.php">BACK </a>
                 </div>
                 </div>
                 
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
 <!-- Final Journal Narattion -->
                
                
                
                </div><!-- /.12row-end-->
           
           
           
           </form> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
       <strong>Copyright &copy; 2014-2015 <a href="http://Hili Truck Mailk Groupbd.com">Hili Truck Mailk Group Bangladesh</a>.</strong> All rights reserved.
      </footer>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#chartofaccount").DataTable();
        
      });
    </script>
    <script type="text/javascript">
$(document).ready(function(){
	$('#journal_complete').click(function() {
		var v1 = $("#item_chart_id").val();
		if((v1=='')||(v1==0))
		{
			//alert('Item can not be empty');
			//return false;
		}
		var v2 = $("#supplier_chart_id").val();
		if((v2=='')||(v2==0))
		{
			alert('Customer can not be empty');
			return false;
		}
	});
$('#item_chart_id').change(function() {

var v1 = $("#item_chart_id").val();
//var v2 = $("#txt2").val();
//alert(v1);    
	
$.post("fetch_salesprice.php", {country_id : v1 },
function(data)
{
	var strng=data.split("%");
	
	document.form1.item_buyprice.value=strng[0];
	document.form1.item_name.value=strng[1];
	document.form1.item_saleprice.value=strng[2];
	$('#chkitem').attr('checked', false);
	//document.form1.txt2.value=strng[1];
});
});

$('#supplier_chart_id').change(function() {

var v1 = $("#supplier_chart_id").val();
//var v2 = $("#txt2").val();
//alert(v1);    
	
$.post("fetch_customer.php", {ledger_id : v1 },
function(data)
{
	var strng=data.split("%");
	
	document.form1.sup_name.value=strng[0];
	document.form1.sup_addr.value=strng[1];
	document.form1.sup_mob.value=strng[2];
	document.form1.sup_email.value=strng[3];
	$('#chksupplier').attr('checked', false);
	//document.form1.txt2.value=strng[1];
});
});

$('#chkitem').click(function() {
        if (!$(this).is(':checked')) {
            $("#item_name").val('' );
			$("#item_quantity").val('' );
			$("#item_buyprice").val('' );
			$("#item_saleprice").val('' );
        }
		else
		{
			$("#item_name").val('name' );
			$("#item_quantity").val('quantity' );
			$("#item_buyprice").val( 'price' );
			$("#item_saleprice").val('price' );
			$("#item_chart_id").val("0");
		}
    });
	
	$('#chksupplier').click(function() {
        if (!$(this).is(':checked')) {
            $("#sup_name").val('' );
			$("#sup_addr").val('' );
			$("#sup_mob").val('' );
			$("#sup_email").val('' );
        }
		else
		{
			$("#sup_name").val('name' );
			$("#sup_addr").val('address' );
			$("#sup_mob").val( 'mobile' );
			$("#sup_email").val('email' );
			$("#supplier_chart_id").val("0");
		}
    });
	
$("select#drop1").change(function(){

	var country_id =  $("select#drop1 option:selected").attr('value'); 
// alert(country_id);	
	$("#branchname").html( "" );
	$("#accountno").html( "" );
	if (country_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "fetch_branchname.php",
			data: "country_id="+country_id,
			cache: false,
			beforeSend: function () { 
				$('#branchname').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#branchname").html( html );
			}
		});
	} 
});
});
</script>
  </body>
</html>
