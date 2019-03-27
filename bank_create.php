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
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "welcome ".$_SESSION['userid'];?> </span>
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

         
            
              <?php
require 'db/connect.php';

$error 		= ""; //variable to hold our form error message
$success 	= ""; //variable to hold our success message
$previllage=$_SESSION['userid'];
if(isset($_POST['create'])){
	$bankname 		= trim($_POST['bankname']);
	$branchname 	= trim($_POST['branchname']);
	$accountno 	= trim($_POST['accountno']);
	$accountname 	= trim($_POST['accountname']);
	$accountbal 	= trim($_POST['accountbal']);
	

	$sql="select accountno from bankinfo where branchname='$branchname'";
	$result=mysqli_query($con,$sql);
	$row_led = mysqli_fetch_row($result);
	$acc=$row_led[0];
	if(($acc<>""))
	{
		?>
       <div class="alert alert-danger">
       <strong>Attention!</strong> Account Already Exist.
       </div>
        <?PHP
	}
	else{
	$sql="insert into bankinfo values('','$bankname','$branchname','$accountno','$accountname')";
	$result=mysqli_query($con,$sql);
	$sql="INSERT INTO Ledgers (name, group_id,type,op_balance,op_balance_dc,reconciliation,notes) VALUES ('$accountno', 1,0,$accountbal,'D',0,'Bank Account')";
		 //print $sql;
		$result=mysqli_query($con,$sql);
		?>
       <div class="alert alert-danger">
       <strong>Attention!</strong> Bank info Successfully Created.
       </div>
        <?PHP
	}
	
}
?>
 <!-- Default box -->
		<div class="box box-primary">
                <div class="box-header with-border">
                  <h1 class="box-title"><span class="fa fa-th"> Create Software Bank Information.</span></h1>
                </div>
		<div class="box-body">
			<form action="" method="post">
				<table class="table table-bordered">
					<tr>
						<td><label for="name">Bank Name::</label></td>
						<td><input type="text" id="userid" name="bankname" class="form-control input-sm"></td>
					</tr>
                    <tr>
						<td><label for="name">Branch Name:</label></td>
						<td>
				         <input type="text" id="userid" name="branchname" class="form-control input-sm">
						</td>
					</tr>
                    <tr>
						<td><label for="name">Account No:</label></td>
						<td><input type="text" id="userid" name="accountno" class="form-control input-sm"></td>
					</tr>
                    <tr>
						<td><label for="name">Account Name:</label></td>
						<td><input type="text" id="userid" name="accountname" class="form-control input-sm"></td>
					</tr>
					<tr>
						<td><label for="name">Account Balance:</label></td>
						<td><input type="text" id="acbal" name="accountbal" class="form-control input-sm"></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-success" name="create">CREATE BANK</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="home.php">BACK HOME</a></td>
					</tr>
				</table>
			</form>
           </div>
           <!-- form body End-->
            </div><!-- /.box-body -->
            
            
            
            <div class="box-footer">
                <div class="panel panel-primary">
                <div class="panel-heading">Bank  Information.</div>
                  <div class="panel-body">
                    <table class="table table-striped" id="chartofaccount">
                      <thead>
                        <tr class="success">
                        
                          <th>Account No</th>
                          <th>Bank Name</th>
                          <th>Branch Name</th>
                          <th>Account Name</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
					  
					  $query1=$db->query("select * from bankinfo");
			          
                       while ($row1 = $query1->fetch_row()) {	
						
						
					?>
                        <tr>
                          
                          <td><?php echo $row1[3];?></td>
                          <td><?php echo $row1[1];?></td>
                          <td><?php echo $row1[2];?></td>
                          <td><?php echo $row1[4];?></td>
                          
						</tr>
                       
                        <?php
					 }
				?>
                </tbody>
                </table>
                </div>
                </div><!-- /.box-end-->
              </div><!-- /.box-footer-->
         
          
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
