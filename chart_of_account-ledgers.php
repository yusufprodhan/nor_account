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
              <p>Hili Truck Mailk Group Of<br> Industries</p>
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
        
          <!-- Default box -->
          <div class="box box-danger">
           
              <?php
require 'db/connect.php';

$group_id=$_GET['id'];
$sqlpar="select parent_id from groups where id=$group_id";
$respar=mysqli_query($con,$sqlpar);
$row=mysqli_fetch_row($respar);
$pid=$row[0];
?>

             <!-- form body Start-->
             <div class="well well-sm pull-left">   
            <?PHP  if($_SESSION["usertype"]<=1){if($_SESSION["usertype"]==0){?><a class="btn btn-primary" href="create.php"><i class="fa fa-edit"></i>CREATE GROUP</a><?PHP }?>
			<a class="btn btn-success" href="create_ledger.php"><i class="fa fa-edit"></i>CREATE LEDGER</a>
            <?PHP if($_SESSION["usertype"]==0){?>
            <a class="btn btn-info" href="delete_ledger.php"><i class="fa fa-edit"></i>DELETE LEDGER</a><?PHP } ?>
            </div>
			<?php
			}
			
				
				$query = $db->query("SELECT * FROM ledgers where group_id =$group_id ORDER BY id ");
			?>
                
	      		<div class="box-body">
                <table class="table table-bordered" id="chartofaccount">
				<thead>
					<tr>
						<th>Account Name</th>
						<th>Ledgers</th>
						<th>O/P Blance</th>
						<th>C/L Balance</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?PHP
				
				
					while ($row2 = $query->fetch_object()) { 
					$lname=$row2->name;
					$sqledit="select memname from member_info where acc_no='$lname'";
$resultcustid=mysqli_query($con,$sqledit);
$rowedit = mysqli_fetch_row($resultcustid);
$mname=$rowedit[0];
					?>
					<tr>
						<td><?php if($mname<>''){echo $row2->name.' :       '.$mname;}else{echo $row2->name;};?></td>
						<td><?php echo 'Ledgers';?></td>
						<td><?php echo '-';?></td>
						<td><?php echo '-';?></td>
						<td>&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="chart_of_account-sub.php?id=<?php echo $pid; ?>">Back</a></td>
					</tr>
				
			<?php 
					}
			
			?>
			</tbody>
           
			</table><a class="btn btn-success" href="chart_of_account-sub.php?id=<?php echo $pid; ?>">Back</a>
			</div>
           
            <!-- form body End-->
            </div><!-- /.box-body -->
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
    <script type="text/javascript">
      $(function () {
        $("#chartofaccount").DataTable();
        
      });
    </script>
  </body>
</html>
