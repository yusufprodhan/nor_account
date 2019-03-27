<?php
session_start();
$previllageid=$_SESSION['userid'];
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
	$userid 		= trim($_POST['userid']);
	$usertype 	= trim($_POST['usertype']);
	$txtconfpass 		= trim($_POST['txtconfpass']);
	//$bal 		= trim($_POST['txtbal']);
	//$notes 		= trim($_POST['notes']);
	//$bio 		= trim($_POST['bio']);

	$sql="select userid from usertable where userid='$userid'";
	$result=mysqli_query($con,$sql);
	$row_led = mysqli_fetch_row($result);
	$pass=$row_led[0];
	if(($pass<>""))
	{
		?>
       <div class="alert alert-danger">
       <strong>Attention!</strong> User Already Exist.
       </div>
        <?PHP
	}
	else{
		$dt=date('Y-m-d');
	$sql="insert into usertable(id,userid,userpass,usertype,created_by,created_date)values('','$userid','$txtconfpass',$usertype,'$previllageid','$dt')";
			//$result=mysqli_query($con,$sql);
			
		 //print $sql;
		$result=mysqli_query($con,$sql);
		?>
       <div class="alert alert-danger">
       <strong>Attention!</strong> User Successfully Created.
       </div>
        <?PHP
	}
	
}
?>
 <!-- Default box -->
		<div class="box box-primary">
                <div class="box-header with-border">
                  <h1 class="box-title"><span class="fa fa-th"> Create Software System User</span></h1>
                </div>
		<div class="box-body">
			<form action="" method="post">
				<table class="table table-bordered">
					<tr>
						<td><label for="name">User ID::</label></td>
						<td><input type="text" id="userid" name="userid" class="form-control input-sm"></td>
					</tr>
                    <tr>
						<td><label for="name">User Type:</label></td>
						<td>
												<select name="usertype" id="usertype" class="form-control" data-placeholder="chart_id">
													<?php $sql=$db->query("select typeid,typename from typename");?>
                    <?php while ($row = $sql->fetch_object()) {
					?>
					
                <option value="<?php echo $row->typeid;?>"><?php echo $row->typename;?></option>
                <?php } ?>
												</select>
											</td>
					</tr>
                    <tr>
						<td><label for="name"> Password:</label></td>
						<td><input type="password" id="txtconfpass" name="txtconfpass" class="form-control input-sm"></td>
					</tr>
					
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-success" name="create">CREATE USER</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="home.php">BACK </a></td>
					</tr>
				</table>
			</form>
           </div>
           <!-- form body End-->
            </div><!-- /.box-body -->
            
            
            
            <div class="box-footer">
                <div class="panel panel-primary">
                <div class="panel-heading">Software User Information.</div>
                  <div class="panel-body">
                    <table class="table table-striped" id="chartofaccount">
                      <thead>
                        <tr class="success">
                          <th>SL#</th>
                          <th>User Id</th>
                          <th>Type</th>
                          <th>Function</th>
                          <th>Created By</th>
                          <th>Create Date</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
					  $serial = 1;
					  $usertype=0;
					  $query1=$db->query("select usertable.userid,usertable.usertype,typename.typename,usertable.created_by,usertable.created_date from usertable,typename where typename.typeid=usertable.usertype");
			          
                       while ($row1 = $query1->fetch_row()) {	
						
						$usertype=$row1[1]; 
					?>
                        <tr>
                          <td><?php echo $serial++;?></td>
                          <td><?php echo $row1[0];?></td>
                          <td><?php echo $row1[2];?></td>
                          <?php 
						  if($usertype==1){
                         echo"<td> All privillage without [entries,Ledger,Group] Edit and Delete.</td>";
						  }
						 else if($usertype==0){
                         echo"<td> All privillage</td>";
						  }
						  
					    else if($usertype==2){
                         echo"<td> All privillage without [Ledger,Group] Edit and Delete.</td>";
						  }
					   else if($usertype==3){
                         echo"<td> Only Data Entry and View</td>";
						  }
						  
						   else{
                         echo"<td> No Privillage.</td>";
						  } 
						?>
                        <td><?php echo $row1[3];?></td>
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
