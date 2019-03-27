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
	/* in case of cash choice begins here*/
	if (isset($_GET['cust_id'])) {
		$cust_id = $_GET['cust_id'];
		$paymentid = $_GET['paymentid'];
		$payamount = $_GET['payamount'];
		$paymode = $_GET['paymode'];
		$paydate = $_GET['paydate'];
		$bank = $_GET['bank'];
		$cheque = $_GET['cheque'];
		
		$pmode=0;
	if(strtolower($paymode)=='cash'){$pmode=1;}	else{$pmode=2;}
	
    
	$selectopn="update sales_integration set status=3 where       cust_id='$cust_id' and paymentid=$paymentid";
//$resultopn=mysqli_query($con,$selectopn);


$sql=$db->query("select max(id)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile,created_by)values($entr_id,1,$paymentid,'$paydate',$payamount,$payamount,'$cust_id',$pmode,'$bank','$cheque','N/A','$previllageid')";
	
	/* insert into entries table*/
	
	
	//$result=mysqli_query($con,$sql);
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	
	if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,5,$payamount,'D','$previllageid')";
	/* insert into entryitems cash in hand account */
	
	}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,38,$payamount,'D','$previllageid')";
	/* insert into entryitems cash in bank account */
	}
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  //$result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,39,$payamount,'C','$previllageid')";
	/* insert into entryitems Direct sales account */
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  //$result=mysqli_query($con,$sql);




	}/* in case of cash choice ends here*/

/* in case of bank choice begins here*/	
if(isset($_POST['add_user']))
{
  //require 'db/connect.php';
  $confopn = $_POST['confopn'];
  if($confopn==2){
  $cust_id = $_POST['cust_id'];
  $paymentid = $_POST['paymentid'];
  $payamount = $_POST['payamount'];
  $paymode = $_POST['paymode'];
  $paydate = $_POST['paydate'];
  $bank = $_POST['bank'];
  $cheque = $_POST['cheque'];
  
  $bankname = $_POST['bankname'];
  $branchname = $_POST['branchname'];
  
 
   $accountno = ltrim(rtrim($_POST['accountno']));
   
   $bankid=0;
	$sql="select id from bankinfo where                          trim(accountno)='$accountno'  ";  
/*	$sql=$db->query("select ifnull(id,0)+1 as bid from bankinfo where bankname='$bankn'  and branchname='$branchn' and                          accountno='$accountno' ");*/
	
 //print $sql;
  $result=mysqli_query($con,$sql);
  while ($row=mysqli_fetch_array($result))
 $bankid=$row['id'];
   
   $pmode=0;
	if(strtolower($paymode)=='cash'){$pmode=1;}	else{$pmode=2;}
	
    
	$selectopn="update sales_integration set status=3 where       cust_id='$cust_id' and paymentid=$paymentid";
$resultopn=mysqli_query($con,$selectopn);


$sql=$db->query("select max(id)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile,created_by)values($entr_id,3,$paymentid,'$paydate',$payamount,$payamount,'$cust_id',$pmode,'$bank','$cheque','N/A','$previllageid')";
	//print $sql;
	$result=mysqli_query($con,$sql);
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	
	//$dbid=$bankid+74;
	$sql22="select id from ledgers where                          trim(name) like '%$accountno%'  ";  
	//print $sql22;
  $result22=mysqli_query($con,$sql22);
  $row22=mysqli_fetch_array($result22);
  $dbid=$row22['id'];
  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,$dbid,$payamount,'D','$previllageid')";
	/* bank debit entry*/
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,25,$payamount,'C','$previllageid')";
	/*`accounts receivable credit entry*/
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
  
	$bankid=0;
	$sql="select id from bankinfo where                          accountno='$accountno'  ";  
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
  
}/* in case of bank choice ends here*/

else //if($confopn==1)/* in case of exchange choice ends here*/
{
  //require 'db/connect.php';
  $cust_id = $_POST['cust_id'];
  $paymentid = $_POST['paymentid'];
  $payamount = $_POST['payamount'];
  $paymode = $_POST['paymode'];
  $paydate = $_POST['paydate'];
  $bank = $_POST['bank'];
  $cheque = $_POST['cheque'];
  
  $ledgname = $_POST['ledgname'];
  
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
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile,created_by)values($entr_id,1,$paymentid,'$paydate',$payamount,$payamount,'$cust_id',$pmode,'$bank','$cheque','N/A','$previllageid')";
	//$result=mysqli_query($con,$sql);
	//$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	
	//if($pmode==1){
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,$ledgname,$payamount,'D','$previllageid')";
	/*}
	else{
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,38,$payamount,'D')";
	}*/
	
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  
	$sql="insert into entryitems(entry_id,ledger_id,amount,dc,created_by)values($entr_id,25,$payamount,'C','$previllageid')";
	
	
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
}/* in case of exchange choice ends here*/
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
            <input type="hidden" name="cheque" value="<?PHP print $_GET['cheque'];?>">
                  
                  
                  
                   <div id="dropdowns" class="form-group">
                    <label class="col-sm-2 control-label">Confirm Method:</label>
                   <div class="col-sm-10">
                   <select name="confopn"  id = "drop5" class="form-control select2-container">
                        <option selected="selected" disabled="disabled" value="">Select Confirm Option</option>
                     <option   value="1">Cash</option>
                     <option   value="2">Bank</option>
                     <option   value="3">Exchange</option>
		      </select>
                   </div>
                   </div>
                   
                   <div class="form-group">
                      <label class="col-sm-2 control-label">Bank</label>
                    <div  id="bankname" class="col-sm-10"></div>
       </div> 
                   
                   <div class="form-group">
                      <label class="col-sm-2 control-label">Branch</label>
                    <div  id="branchname" class="col-sm-10"></div>
       </div> 

       <div class="form-group">
                      <label class="col-sm-2 control-label">Account</label>
         <div id="accountno"  class="col-sm-10"></div>
         </div>
          <div class="form-group">
                      <label class="col-sm-2 control-label">Ledger</label>
         <div id="ledgname"  class="col-sm-10"></div>
      </div> <!--Nexted drop down End-->
            
			
	   </div>
        
        <div class="box-footer">
                  
                  <div class="btn-group pull-right" role="group" >
                  
                  <button type="submit" class="btn btn-info" value="Add" name="add_user">+Save</button>
                  
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
    <script type="text/javascript">
$(document).ready(function(){
$("select#drop5").change(function(){

	var optchoice_id =  $("select#drop5 option:selected").attr('value'); 
// alert(country_id);	
	$("#bankname").html( "" );
	$("#branchname").html( "" );
	$("#accountno").html( "" );
	$("#ledgname").html( "" );
	if (optchoice_id==2 ) { 
		
	 $.ajax({
			type: "POST",
			url: "fetch_bankname.php",
			data: "country_id="+optchoice_id,
			cache: false,
			beforeSend: function () { 
				$('#bankname').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#bankname").html( html );
			}
		});
	}
	else
	{
		$.ajax({
			type: "POST",
			url: "fetch_ledgername.php",
			data: "country_id="+optchoice_id,
			cache: false,
			beforeSend: function () { 
				$('#ledgname').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#ledgname").html( html );
			}
		});	
	
	
	}
});
});
</script>
  </body>
</html>
