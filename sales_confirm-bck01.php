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

            
           <?php
include 'db/connect.php';
include 'db/connection.php';
$sql_str='';
	
	if (isset($_GET['cust_id'])) {
		$cust_id = $_GET['cust_id'];
		$paymentid = $_GET['paymentid'];
		$payamount = $_GET['payamount'];
		$paymode = $_GET['paymode'];
		$paydate = $_GET['paydate'];
		$bank = $_GET['bank'];
		$branch = $_GET['branch'];
		
		$pmode=0;
	if(strtolower($paymode)=='cash'){$pmode=1;}	else{$pmode=2;}
	
    
	$selectopn="update sales_integration set status=3 where       cust_id='$cust_id' and paymentid=$paymentid";
//$resultopn=mysqli_query($con,$selectopn);


$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile)values($entr_id,1,$paymentid,'$paydate',$payamount,$payamount,'$cust_id',$pmode,'$bank','N/A','N/A')";
	//$result=mysqli_query($con,$sql);
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	
	if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,5,$payamount,'D]')";
	}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,38,$payamount,'D')";
	}
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  //$result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,39,$payamount,'C')";
	
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  //$result=mysqli_query($con,$sql);




	}
if(isset($_POST['add_user']))
{
  //require 'db/connect.php';
  $cust_id = $_POST['cust_id'];
  $paymentid = $_POST['paymentid'];
  $payamount = $_POST['payamount'];
  $paymode = $_POST['paymode'];
  $paydate = $_POST['paydate'];
  $bank = $_POST['bank'];
  $branch = $_POST['branch'];
  
  $bankn = $_POST['bankn'];
  $branchn = $_POST['branchn'];
   $accountno = $_POST['accountno'];
   $accountname = $_POST['accountname'];
   
   
   $pmode=0;
	if(strtolower($paymode)=='cash'){$pmode=1;}	else{$pmode=2;}
	
    
	$selectopn="update sales_integration set status=3 where       cust_id='$cust_id' and paymentid=$paymentid";
$resultopn=mysqli_query($con,$selectopn);


$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile)values($entr_id,1,$paymentid,'$paydate',$payamount,$payamount,'$cust_id',$pmode,'$bank','N/A','N/A')";
	//$result=mysqli_query($con,$sql);
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	
	
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,38,$payamount,'D')";
	
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,25,$payamount,'C')";
	
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
  
	$bankid=0;
	$sql="select id from bankinfo where bankname='$bankn'  and branchname='$branchn' and                          accountno='$accountno' and accountname='$accountname' ";  
/*	$sql=$db->query("select ifnull(id,0)+1 as bid from bankinfo where bankname='$bankn'  and branchname='$branchn' and                          accountno='$accountno' ");*/
	
 //print $sql;
  $result=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($result))
 $bankid=$row['id'];
  //print '****   '.$bankid.'  ****';
  //print $paymentid.' ** '.$cust_id;
  $trandate=date('Y-m-d');
  if(($bankid==0)||($bankid==''))
  {
  }
  else
  {
	  $payid=0;
	  $sqlpay="select id from bankbal where paymentid=$paymentid";
	  $resultpay=mysqli_query($con,$sqlpay);
  while ($rowpay=mysqli_fetch_array($resultpay))
 $payid=$row['id'];
  if($payid==0)
  {
  $sql="insert into bankbal(bankid,amount,trandate,paymentid)values($bankid,$payamount,'$trandate',$paymentid)";
  //print $sql;
  $result=mysqli_query($con,$sql);
  }
  }
  
}

if(isset($_POST['add_user_cash']))
{
  //require 'db/connect.php';
  $cust_id = $_POST['cust_id'];
  $paymentid = $_POST['paymentid'];
  $payamount = $_POST['payamount'];
  $paymode = $_POST['paymode'];
  $paydate = $_POST['paydate'];
  $bank = $_POST['bank'];
  $branch = $_POST['branch'];
  
  //$bankn = $_POST['bankn'];
  //$branchn = $_POST['branchn'];
   //$accountno = $_POST['accountno'];
   //$accountname = $_POST['accountname'];
   
   
   $pmode=0;
	if(strtolower($paymode)=='cash'){$pmode=1;}	else{$pmode=2;}
	
    
	$selectopn="update sales_integration set status=3 where       cust_id='$cust_id' and paymentid=$paymentid";
$resultopn=mysqli_query($con,$selectopn);


$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile)values($entr_id,1,$paymentid,'$paydate',$payamount,$payamount,'$cust_id',$pmode,'$bank','N/A','N/A')";
	//$result=mysqli_query($con,$sql);
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	
	//if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,5,$payamount,'D]')";
	/*}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,38,$payamount,'D')";
	}*/
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,25,$payamount,'C')";
	
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
  
	/*$bankid=0;
	$sql="select id from bankinfo where bankname='$bankn'  and branchname='$branchn' and                          accountno='$accountno' and accountname='$accountname' ";  
	
	
 //print $sql;
  $result=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($result))
 $bankid=$row['id'];
  //print '****   '.$bankid.'  ****';
  //print $paymentid.' ** '.$cust_id;
  $trandate=date('Y-m-d');
  if(($bankid==0)||($bankid==''))
  {
  }
  else
  {
	  $payid=0;
	  $sqlpay="select id from bankbal where paymentid=$paymentid";
	  $resultpay=mysqli_query($con,$sqlpay);
  while ($rowpay=mysqli_fetch_array($resultpay))
 $payid=$row['id'];
  if($payid==0)
  {
  $sql="insert into bankbal(bankid,amount,trandate,paymentid)values($bankid,$payamount,'$trandate',$paymentid)";
  print $sql;
  $result=mysqli_query($con,$sql);
  }
  }*/
  
}
?>

		
		<div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Sales payment Confirmation Entry</h3>

                </div><!-- /.box-header -->
                <div class="box" >
                  <div class="box-body">
			
			
			<form action="" method="post" class="form-horizontal">
            <input type="hidden" name="cust_id" value="<?PHP print $_GET['cust_id'];?>">
            <input type="hidden" name="paymentid" value="<?PHP print $_GET['paymentid'];?>">
            <input type="hidden" name="payamount" value="<?PHP print $_GET['payamount'];?>">
            <input type="hidden" name="paymode" value="<?PHP print $_GET['paymode'];?>">
            <input type="hidden" name="paydate" value="<?PHP print $_GET['paydate'];?>">
            <input type="hidden" name="bank" value="<?PHP print $_GET['bank'];?>">
            <input type="hidden" name="branch" value="<?PHP print $_GET['branch'];?>">
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Bank Name:</label>
                   <div class="col-sm-10">
                       <select name="bankn" id="bankn" class="form-control select2-container">
                        <option selected="selected" disabled="disabled" value="">Select Bank Name</option>
                        <?PHP
				   $sql="select distinct(bankname) from bankinfo";
				   $result=mysqli_query($con,$sql);
				   while ($row_type = mysqli_fetch_row($result)) {
					 $brnch=$row_type[0];
				   ?> 
                   <option value="<?php echo $brnch;?>" ><?php echo $brnch;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
                        </select>
                        </div>
                   </div>
                   
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Branch Name:</label>
                   <div class="col-sm-10">
                   <select name="branchn" id="branchn" class="form-control select2-container">
                        <option selected="selected" disabled="disabled" value="">Select Branch Name</option>
                      <?PHP
				   $sql="select distinct(branchname) from bankinfo";
				   $result=mysqli_query($con,$sql);
				   while ($row_type = mysqli_fetch_row($result)) {
					 $brnch=$row_type[0];
				   ?> 
                   <option value="<?php echo $brnch;?>" ><?php echo $brnch;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
		      </select> 
                   </div>
                   </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Account Name:</label>
                   <div class="col-sm-10">
                   <select name="accountname" id="accountname" class="form-control select2-container">
                        <option selected="selected" disabled="disabled" value="">Select Account Name</option>
                      <?PHP
				   $sql="select distinct(accountname) from bankinfo";
				   $result=mysqli_query($con,$sql);
				   while ($row_type = mysqli_fetch_row($result)) {
					 $brnch=$row_type[0];
				   ?> 
                   <option value="<?php echo $brnch;?>" ><?php echo $brnch;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
		      </select>
                   </div>
                   </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Account Number:</label>
                   <div class="col-sm-10">
                   <select name="accountno" id="accountno" class="form-control select2-container">
                        <option selected="selected" disabled="disabled" value="">Select Account Number</option>
                      <?PHP
				   $sql="select accountno from bankinfo";
				   $result=mysqli_query($con,$sql);
				   while ($row_type = mysqli_fetch_row($result)) {
					 $brnch=$row_type[0];
				   ?> 
                   <option value="<?php echo $brnch;?>" ><?php echo $brnch;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
		      </select>
                   </div>
                   </div>
            
			
	   </div>
        
        <div class="box-footer">
                  
                  <div class="btn-group pull-right" role="group" >
                  <button type="reset" class="btn btn-danger" ><a href="sales_integration.php">-Back</a></button>
                  <button type="submit" class="btn btn-info" value="Add" name="add_user">+Bank</button>
                  <button type="submit" class="btn btn-default" value="Add" name="add_user_cash">+Cash</button>
                  <button type="submit" class="btn btn-danger" value="Dishonor" name="dishonor">Dishonor</button>
                  </form>	
                    </div>
         </div><!-- /.box-footer -->
        </div>
        </div>
        </div>
        
            

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
