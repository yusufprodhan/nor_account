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
        <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
  </head>
  <script language="javascript">
	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings =
	'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
	}
  </script>
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
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i></a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i></a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i></a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
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
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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

          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-th"> Accounts Receivable From Sales</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
             <!-- form body Start-->
            
           <?php
require 'db/connect.php';
include 'db/connection.php';

$sql_str='';
$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;	
	$selectopn4 = "select * from sales_order";
$resultopn4 = $mysqli->query($selectopn4);
while ($rowopn4 = $resultopn4->fetch_object()) 																																																								  						{
					$salesid=$rowopn4->salesid;
					$custid=$rowopn4->customer_id;
					$sales_amount=$rowopn4->sales_amount;
					$paid_amount=$rowopn4->paid_amount;
					$salestype=$rowopn4->salestype;
					$salesdate=$rowopn4->sales_date;
					$pmode=0;
					
					$bank='';
					$chequeno='';
					$notes='';
					$sqlac="select ifnull(id,0) from entries where number = $salesid";
					$resultac=mysqli_query($con,$sqlac);
					$s_row=mysqli_fetch_row($resultac);
					if($s_row[0]>0)
					//$rowac = mysqli_fetch_row($resultac);
					{}
					
					else{
		

	
	if($sales_amount>$paid_amount)
	{
		$recv_amount=$sales_amount-$paid_amount;
		$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
		 $sql="insert into entries(id,entrytype_id,number,date,dr_total,cr_total,narration, paymentmode,bank,cheque,mobile)values($entr_id,4,$salesid,'$salesdate',$recv_amount,$recv_amount,'$custid',0,'$bank','N/A','N/A')";
	$result=mysqli_query($con,$sql);
	
   
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,25,$recv_amount,'D]')";
	}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,25,$recv_amount,'D')";
	}
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,39,$recv_amount,'C')";
	
	
			  //$sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
			  //new code
			  $sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
		 $sql="insert into entries(id,entrytype_id,number,date,dr_total,cr_total,narration, paymentmode,bank,cheque,mobile)values($entr_id,1,$salesid,'$salesdate',$paid_amount,$paid_amount,'$custid',1,'$bank','N/A','N/A')";
	$result=mysqli_query($con,$sql);
	
   
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,5,$paid_amount,'D]')";
	}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,38,$paid_amount,'D')";
	}
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,25,$paid_amount,'C')";
	
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  //end of new code
			  
	}
	
	else
	
	{
			$recv_amount=$paid_amount-$sales_amount;	 
		 $sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
		 $sql="insert into entries(id,entrytype_id,number,date,dr_total,cr_total,narration, paymentmode,bank,cheque,mobile)values($entr_id,1,$salesid,'$salesdate',$paid_amount,$paid_amount,'$custid',1,'$bank','N/A','N/A')";
	$result=mysqli_query($con,$sql);
	
   
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,5,$paid_amount,'D]')";
	}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,38,$paid_amount,'D')";
	}
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,25,$paid_amount,'C')";
	
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
			  //new code
			  
				//end of new code	
	
	
	}




}	
}
?>

		
		<div class="box box-info">
                <div class="box-header with-border">
                  
                </div>
			
			<p>Successfully confirmed the accounts receivable transaction</p>
			<form action="" method="post">
				<table class="table table-bordered">
					<tr>
						
						<td><a class="btn btn-info" href="sales_integration.php">BACK</a></td>
					</tr>
				</table>
			</form>	
	</div>
		
</div>
            
            <!-- form body End-->
            </div><!-- /.box-body -->
            <div class="box-footer">
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
       <strong>Copyright &copy; 2014-2015 <a href="http://websmartbd.com">Websmart Bangladesh</a>.</strong> All rights reserved.
      </footer>
    <!-- jQuery 2.1.4 -->
    
    <script src="jquery.datetimepicker.js"></script>
<script>
$('#txtstartdate').datetimepicker();
$('#txtenddate').datetimepicker();
</script>
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
