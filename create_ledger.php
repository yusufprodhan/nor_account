<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hili Truck Accounts</title>
  
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
          <span class="logo-lg"><b>Hili Truck</b>Group</span>
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
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "Welcome ".$_SESSION['userid'];?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="customimage/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Hili Truck Salt Industries
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
              <p>Hili Truck Mailk Group</p>
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
          
          <?php include 'leftmenu.php';?>   
          <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Hili Truck Mailk Group Accounting
            <small>Software</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
         <div class="col-md-12">  
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-th"> Create New Ledger</span></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            
              <?php
require 'db/connect.php';

$error 		= ""; //variable to hold our form error message
$success 	= ""; //variable to hold our success message

if(isset($_POST['create'])){
	$name 		= trim($_POST['name']);
	$parent_id 	= trim($_POST['parent_id']);
	$type 		= trim($_POST['typeid']);
	$bal 		= trim($_POST['txtbal']);
	$notes 		= trim($_POST['notes']);
	//$bio 		= trim($_POST['bio']);

	if(empty($name) && empty($parent_id)){
		$error = "You must fill all fields.";
	}else{
		if($type==0){$dc='D';}else{$dc='C';}
		$sql="INSERT INTO ledgers (name, group_id,type,op_balance,op_balance_dc,reconciliation,notes) VALUES ('$name', $parent_id,$type,$bal,'$dc',0,'$notes')";
		
		$result=mysqli_query($con,$sql);
		echo"<div class=\"alert alert-success alert-dismissible\">
			  <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
			  <strong>Success!</strong> One Row successfully inserted.
			</div>";
	}

}
?>

         <div class="well well-sm alert-info"> <strong>Note : Assets / Expenses always have Dr balance and Liabilities / Incomes always have Cr balance.......</strong></div>
		<div class="box-body"><!-- form body Start-->
			<span class="error"><?php if(isset($error)) echo $error;?></span>
			<span class="success"><?php if(isset($success)) echo $success;?></span>
			<form action="" method="post">
				<table class="table table-bordered">
					<tr>
						<td><label for="name">Name:</label></td>
						<td><input type="text" id="name" name="name" class="form-control input-sm"></td>
					</tr>
					<tr>
						<td><label for="position">Parent:</label></td>
						<td>
                        <select id="parent_id" name="parent_id"  class="form-control input-sm">
					<?php $sql=$db->query("select id,name from groups where parent_id=1");?>
						<optgroup label="Assets">
                        <option value="1"><b>Assets</b></option>
						<?php while ($row = $sql->fetch_object()) {
							$pgid=$row->id;
							$sql11=$db->query("select id,name from groups where parent_id=$pgid");
					?>
					 <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                     <?php while ($row11 = $sql11->fetch_object()) {?>
					 <option value="<?php echo $row11->id;?>"><?php echo $row11->name;?></option>
                     <?php }} 
				        echo "</optgroup>";
				     ?>
                     <?php $sql1=$db->query("select id,name from groups where parent_id=2");?>
						<optgroup label="Liabilities and Owners Equity"><option value="2"><b>Liabilities and Owners Equity</b></option>
						<?php while ($row1 = $sql1->fetch_object()) {
					$pgid=$row1->id;
							$sql22=$db->query("select id,name from groups where parent_id=$pgid");
					?>
					 <option value="<?php echo $row1->id;?>"><?php echo $row1->name;?></option>
                     <?php while ($row22 = $sql22->fetch_object()) {?>
					 <option value="<?php echo $row22->id;?>"><?php echo $row22->name;?></option>
                     <?php }} 
				        echo "</optgroup>";
				     ?>
                     <?php $sql2=$db->query("select id,name from groups where parent_id=3");?>
						<optgroup label="Incomes">
                        <option value="3"><b>Incomes</b></option>
						<?php while ($row2 = $sql2->fetch_object()) {
					$pgid=$row2->id;
							$sql33=$db->query("select id,name from groups where parent_id=$pgid");
					?>
					 <option value="<?php echo $row2->id;?>"><?php echo $row2->name;?></option>
                     <?php while ($row33 = $sql33->fetch_object()) {?>
					 <option value="<?php echo $row33->id;?>"><?php echo $row33->name;?></option>
                     <?php }} 
				        echo "</optgroup>";
				     ?>
                     <?php $sql3=$db->query("select id,name from groups where parent_id=4");?>
						<optgroup label="Expenses">
                        <option value="4"><b>Expenses</b></option>
						<?php while ($row3 = $sql3->fetch_object()) {$pgid=$row3->id;
							$sql44=$db->query("select id,name from groups where parent_id=$pgid");
					?>
					 <option value="<?php echo $row3->id;?>"><?php echo $row3->name;?></option>
                     <?php while ($row44 = $sql44->fetch_object()) {?>
					 <option value="<?php echo $row44->id;?>"><?php echo $row44->name;?></option>
                     <?php }} 
				        echo "</optgroup>";
				     ?>
            </select></td>
					</tr>
					<tr>
						<td><label for="ledgertype">Type</label></td>
						<td><select name="typeid"  class="form-control input-sm"><option value=0>Dr.</option><option value=1>Cr.</option></select></td>
					</tr>
					<tr>
						<td><label for="name">Opening Balance</label></td>
						<td><input type="text" id="txtbal" name="txtbal" value="0"  class="form-control input-sm"></td>
					</tr>
					<tr>
						<td><label for="name">Notes</label></td>
						<td><textarea name="notes" cols="50" rows="5" id="message"  class="form-control input-sm"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-success" name="create">CREATE</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="chart_of_account.php">BACK </a></td>
					</tr>
				</table>
			</form>

            
            <!-- form body End-->
            </div><!-- /.box-body -->
            <div class="box-footer"><!-- /.box-footer-->
            
           
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </div><!-- /.colm -->
         </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
       <strong>Copyright &copy; 2014-2015 <a href="http://websmartbd.com">Websmart Bangladesh</a>.</strong> All rights reserved.
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
    
  </body>
</html>
