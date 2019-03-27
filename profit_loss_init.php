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

          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-th"> PROFIT AND LOSS STATEMENT REPORT</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
             <!-- form body Start-->
            
             <?php
            
//$hidvouchertype=0;
require 'db/connect.php';
function find_child_with_debit($id)
{
 require 'db/connect.php';
 $sql="select * from groups where parent_id=$id";
$amountn=0;
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);

$amountn=0;
	 while($row11 = $result11->fetch_object())
      {
	    $id_child=$row11->id;
		$baldd=0;
		$sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id_child";
		$result22=mysqli_query($con,$sql2);
		 $row22=mysqli_fetch_row($result22);	  
		$baldd=$row22[0];
		$amountn+=$baldd;
	  }
return $amountn;
}
function find_child_with_credit($id)
{
 require 'db/connect.php';
 $sql="select * from groups where parent_id=$id";
$amountn=0;
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);

$amountn=0;
	 while($row11 = $result11->fetch_object())
      {
	    $id_child=$row11->id;
		$baldd=0;
		$sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id_child";
		$result22=mysqli_query($con,$sql2);
		$row22 = mysqli_fetch_row($result22);	  
		$baldd=$row22[0];
		$amountn+=$baldd;
	  }
return $amountn;
}

function find_child_with_bal($id)
{
require 'db/connect.php';
$sql="select * from groups where parent_id=$id";
$amountn=0;
$result11=mysqli_query($con,$sql);
//$rowcount=mysqli_num_rows($result11);

$amountn=0;
	 while($row11 = $result11->fetch_object())
      {
	    $id_child=$row11->id;
		//print $id_child." ";
		$sql2="select sum(op_balance) as bal from ledgers where group_id=$id_child and op_balance_dc='D' group by group_id";
  if( $result22=mysqli_query($con,$sql2)){
   $row22 = mysqli_fetch_row($result22);
   $opnbaldd=$row22[0];}else{$opnbaldd=0;}
      $sql3="select sum(op_balance) as bal from ledgers where group_id=$id_child and op_balance_dc='C' group by group_id";
   if($result33=mysqli_query($con,$sql3)){
   $row33 =  mysqli_fetch_row($result33);
   $opnbalcc=$row33[0];}else{$opnbalcc=0;}
   $ball=$opnbaldd-$opnbalcc;
   //print $bal." ";
   $amountn+=$ball;
}
   return $amountn;

}

function find_ledger_debit_bal($lid)
{
  require 'db/connect.php';
  $sql2="select sum(e.amount) as amt from entryitems e where e.ledger_id=$lid and e.dc='D'";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
		return $bald;
}
function find_ledger_credit_bal($lid)
{
  require 'db/connect.php';
  $sql2="select sum(e.amount) as amt from entryitems e where e.ledger_id=$lid and e.dc='C' ";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
		return $bald;
}

?>


		
    
	<script type="text/javascript">
function fnshow()
{
document.form1.hidvouchertype.value=document.form1.vouchertype.value;
document.form1.action='show_entry.php';
document.form1.submit();
}
/*$(document).ready(function(){

    $("vouchertype").change(function(){

        var selectedvoucher = $(".vouchertype").val();
		document,form1,hidval1.value=selectedvoucher;
		document.form1.submit();
        //alert("You have selected the country - " + selectedCountry);

    });
 
});
*/


</script>

	<form  name="form1" method="post">
	<input type="hidden" name="hidval1">
	<input type="hidden" name="hidvouchertype" >
		
			
			<?PHP $quer_type=$db->query("SELECT id ,name from ledgers order by id asc"); ?>
			
			 
			  <input type="submit" name="submit1" value="submit" class="btn btn-block btn-danger">
		</form>
			  <?php
				if(isset($_POST['submit1'])){
				//$ledger=$_POST['ledgername'];
				//$startdate1=$_POST['txtstartdate'];
				//$enddate1=$_POST['txtenddate'];
				//$startdate1 = strtotime( $startdate1 );
				//$startdate= date( 'Y-m-d', $startdate1 );
				//$showstartdate= date( 'd-m-Y', $startdate1 );
				////$enddate1 = strtotime( $enddate1 );
				//$enddate= date( 'Y-m-d', $enddate1 );
				//$showenddate= date( 'd-m-Y', $enddate1 );
				
$id=12;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal12=($opnbal+$debit)-$credit;if($clbal12<0){$clbal12=0-$clbal12;$strcls12=$clbal12.'C';}else{$strcls12=$clbal12.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=11;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal11=($opnbal+$debit)-$credit;if($clbal11<0){$clbal11=0-$clbal11;$strcls11=$clbal11.'C';}else{$strcls11=$clbal11.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";


$id=16;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal16=($opnbal+$debit)-$credit;if($clbal16<0){$clbal16=0-$clbal16;$strcls16=$clbal16.'C';}else{$strcls16=$clbal16.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=15;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal15=($opnbal+$debit)-$credit;if($clbal15<0){$clbal15=0-$clbal15;$strcls15=$clbal15.'C';}else{$strcls15=$clbal15.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

$id=17;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal17=($opnbal+$debit)-$credit;if($clbal17<0){$clbal17=0-$clbal17;$strcls17=$clbal17.'C';}else{$strcls17=$clbal17.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=18;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal18=($opnbal+$debit)-$credit;if($clbal18<0){$clbal18=0-$clbal18;$strcls18=$clbal18.'C';}else{$strcls18=$clbal18.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';	
$totprofit=$totloss=0;
$totgrexpense=$clbal12+$clbal16+$clbal17+$clbal18;$totgrincome=$clbal11+$clbal15;
if($totgrexpense>$totgrincome){$totloss=$totgrexpense-$totgrincome;}else{$totprofit=$totgrincome-$totgrexpense;}
$totalgr=$totgrexpense+$totprofit;


$id=4;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal4=($opnbal+$debit)-$credit;if($clbal4<0){$clbal4=0-$clbal4;$strcls4=$clbal4.'C';}else{$strcls4=$clbal4.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=3;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal3=($opnbal+$debit)-$credit;if($clbal3<0){$clbal3=0-$clbal3;$strcls3=$clbal3.'C';}else{$strcls3=$clbal3.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";


$id=14;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal14=($opnbal+$debit)-$credit;if($clbal14<0){$clbal14=0-$clbal14;$strcls14=$clbal14.'C';}else{$strcls14=$clbal14.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=13;
$opnbal=find_child_with_bal($id);
$debit=find_child_with_debit($id);
$credit=find_child_with_credit($id);
$sql2="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='D' ";
   if($result2=mysqli_query($con,$sql2)){
   $row2 =  mysqli_fetch_row($result2);
   $opnbald=$row2[0];}else{$opnbald=0;}
   $sql3="select sum(op_balance) as bal from ledgers where group_id=$id and op_balance_dc='C'";
   	if($result3=mysqli_query($con,$sql3)){
   $row3 =  mysqli_fetch_row($result3);
   $opnbalc=$row3[0];}else{$opnbalc=0;}
   $bal=$opnbald-$opnbalc;
   //print $opnbald." ";
   $opnbal+=$bal; if($opnbal<0){$opnbal=0-$opnbal;$stropn=$opnbal.'C';$opnbal=0-$opnbal;}else{$stropn=$opnbal.'D';}
   $sql2="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='D' and l.group_id=$id";
		$result2=mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_row($result2);	  
		$bald=$row2[0];
   $debit+=$bald;
   $sql3="select sum(e.amount) as amt from entryitems e,ledgers l where e.ledger_id=l.id and e.dc='C' and l.group_id=$id";
		$result3=mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_row($result3);	  
		$balc=$row3[0];
   $credit+=$balc;
   
   $clbal13=($opnbal+$debit)-$credit;if($clbal13<0){$clbal13=0-$clbal13;$strcls13=$clbal13.'C';}else{$strcls13=$clbal13.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=4 order by id";
$result_led=mysqli_query($con,$sql);
$lclbal4=0;
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
  $lclbal4+=$lclbal12;
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
}
$lclbal3=0;
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=3 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
  $lclbal3+=$lclbal11;	
/// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
}


$netprofit=$netloss=0;
$totexpense=$totgrexpense+$clbal14+$lclbal4;
$totincome=$totgrincome+$clbal13+$lclbal3;
if($totexpense>$totincome){$netloss=$totexpense-$totincome;}else{$netprofit=$totincome-$totexpense;}
$total=$totexpense+$netprofit;



	?>
<br><br>

			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Gross Expenses </th><th align="right">      Dr. Amount</th>
                        <th align="left">Gross Incomes</th><th align="right">        Cr. Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					?>
					
				<tr>
						<td align="left"><?php echo "Direct Expenses";?></td>
						<td align="right"><?php echo $strcls12;?></td>
						<td align="left"><?php echo "Direct Incomes";?></td>
						<td align="right"><?php echo $strcls11;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=12 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Administrative Expenses";?></td>
						<td align="right"><?php echo $strcls17;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				  </tr>
<?PHP

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=17 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname17=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal17=$lopbal+$ldebit-$lcredit; $lclbaltype17='D'; if ($lclbal17<0){$lclbal17=0-$lclbal17;$lclbaltype17='C';}}
  elseif($lopbaltype=='C'){$lclbal17=$lopbal+$lcredit-$ldebit; $lclbaltype17='C';if ($lclbal17<0){$lclbal17=0-$lclbal17;$lclbaltype17='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname17;?></td>
						<td align="right"><?php echo $lclbal17.$lclbaltype17;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Marketing Expenses";?></td>
						<td align="right"><?php echo $strcls18;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				  </tr>
<?PHP

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=18 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname18=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal18=$lopbal+$ldebit-$lcredit; $lclbaltype18='D'; if ($lclbal18<0){$lclbal18=0-$lclbal18;$lclbaltype18='C';}}
  elseif($lopbaltype=='C'){$lclbal18=$lopbal+$lcredit-$ldebit; $lclbaltype18='C';if ($lclbal18<0){$lclbal18=0-$lclbal18;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname18;?></td>
						<td align="right"><?php echo $lclbal18.$lclbaltype18;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}





$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=11 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname11=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname11;?></td>
						<td align="right"><?php echo $lclbal11.$lclbaltype11;?></td>
						
				  </tr>
<?PHP
}
?>

<tr>
						<td align="left"><?php echo "Purchases";?></td>
						<td align="right"><?php echo $strcls16;?></td>
						<td align="left"><?php echo "Sales";?></td>
						<td align="right"><?php echo $strcls15;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=16 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=15 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal11.$lclbaltype11;?></td>
						
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Total Gross Expenses";?></td>
						<td align="right"><?php echo $totgrexpense;?></td>
						<td align="left"><?php echo "Total Gross Incomes";?></td>
						<td align="right"><?php echo $totgrincome;?></td>
				  </tr>

<?PHP

if($totloss>0){
?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Gross Loss C/F";?></td>
						<td align="right"><?php echo $totloss ;?></td>
				  </tr>
<?PHP
}
else
{
?>
<tr>
						<td align="left"><?php echo "Gross Profit C/F";?></td>
						<td align="right"><?php echo $totprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Dr".$totalgr;?></td>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Cr".$totalgr?></td>
						
				  </tr>

			</tbody>
			</table>
            
            
            <table class="table table-bordered" >
				<thead>
					<tr>
						<th>Net Expenses </th><th align="right">      Dr. Amount</th>
                        <th align="left">Net Incomes</th><th align="right">        Cr. Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					?>
					
				<tr>
						<td align="left"><?php echo "Indirect Expenses";?></td>
						<td align="right"><?php echo $strcls14;?></td>
						<td align="left"><?php echo "Indirect Incomes";?></td>
						<td align="right"><?php echo $strcls13;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=14 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=13 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						
				  </tr>
<?PHP
}

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=4 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal12=$lopbal+$ldebit-$lcredit; $lclbaltype12='D'; if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='C';}}
  elseif($lopbaltype=='C'){$lclbal12=$lopbal+$lcredit-$ldebit; $lclbaltype12='C';if ($lclbal12<0){$lclbal12=0-$lclbal12;$lclbaltype12='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "*****".$lname;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=3 order by id";
$result_led=mysqli_query($con,$sql);
while($row_led = mysqli_fetch_row($result_led))
{
  $lid=$row_led[0];$lname12=$row_led[1];
  $lopbal=$row_led[2];$lopbaltype=$row_led[3];
  $ldebit=find_ledger_debit_bal($lid);
  $lcredit=find_ledger_credit_bal($lid);
  if($lopbaltype=='D'){$lclbal11=$lopbal+$ldebit-$lcredit; $lclbaltype11='D'; if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='C';}}
  elseif($lopbaltype=='C'){$lclbal11=$lopbal+$lcredit-$ldebit; $lclbaltype11='C';if ($lclbal11<0){$lclbal11=0-$lclbal11;$lclbaltype11='D';}}
// print $lname."   ".$lopbal.$lopbaltype."   ".$ldebit."   ".$lcredit."   ".$lclbal.$lclbaltype."<br>"; 
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal11.$lclbaltype11;?></td>
						
				  </tr>
<?PHP
}
?>
<tr>
						<td align="left"><?php echo "Total Expenses";?></td>
						<td align="right"><?php echo $totexpense;?></td>
						<td align="left"><?php echo "Total Incomes";?></td>
						<td align="right"><?php echo $totincome;?></td>
				  </tr>

<?PHP

if($netloss>0){
 if($totprofit>=0){
?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Gross Profit C/F";?></td>
						<td align="right"><?php echo $totprofit ;?></td>
				  </tr>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Net Loss ";?></td>
						<td align="right"><?php echo $netloss ;?></td>
				  </tr>

<?PHP
}
else
{
?>
<tr>
						<td align="left"><?php echo "Gross Loss C/F";?></td>
						<td align="right"><?php echo $totloss ;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						<td align="left"><?php echo "Net Loss ";?></td>
						<td align="right"><?php echo $netloss ;?></td>
				  </tr>


<?PHP	
	}
}
else if($netprofit>=0)
{
if($totloss>0)
{
?>
<tr>
						<td align="left"><?php echo "Gross Loss C/F";?></td>
						<td align="right"><?php echo $totprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
                        
						
				  </tr>
<tr>
						<td align="left"><?php echo "Net Profit C/F";?></td>
						<td align="right"><?php echo $netprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>

<?PHP
}
else
{
?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
                        <td align="left"><?php echo "Gross Profit C/F";?></td>
						<td align="right"><?php echo $totprofit;?></td>
						
						
				  </tr>
<tr>
						<td align="left"><?php echo "Net Profit C/F";?></td>
						<td align="right"><?php echo $netprofit;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo ""?></td>
						
				  </tr>


<?PHP
}
}
?>
<tr>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Dr".$total;?></td>
						<td align="left"><?php echo "Total";?></td>
						<td align="right"><?php echo "Cr".$total?></td>
						
				  </tr>

			</tbody>
			</table>
            
            
            
            
            
            
            
            
            
            
			</div>
	
	<input class="btn btn-info" type="submit" name="submit2" value="Report" onclick="centeredPopup('profit_loss_init_report.php','myWindow','700','700','yes');return false" align="middle">
			<?php
				//echo "<a href='index.php?page=1'>First Page</a>";
}				
				
			?>
		

            
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
