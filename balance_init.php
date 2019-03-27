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
              <h3 class="box-title"><span class="fa fa-th"> BALANCE SHEET REPORT</h3>
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
				//$enddate1 = strtotime( $enddate1 );
				//$enddate= date( 'Y-m-d', $enddate1 );
				//$showenddate= date( 'd-m-Y', $enddate1 );
				
$id=5;
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
   
   $clbal5=($opnbal+$debit)-$credit;if($clbal5<0){$clbal5=0-$clbal5;$strcls5=$clbal5.'C';}else{$strcls5=$clbal5.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=6;
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
   
   $clbal6=($opnbal+$debit)-$credit;if($clbal6<0){$clbal6=0-$clbal6;$strcls6=$clbal6.'C';}else{$strcls6=$clbal6.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";


$id=7;
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
   
   $clbal7=($opnbal+$debit)-$credit;if($clbal7<0){$clbal7=0-$clbal7;$strcls7=$clbal7.'C';}else{$strcls7=$clbal7.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=8;
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
   
   $clbal8=($opnbal+$debit)-$credit;if($clbal8<0){$clbal8=0-$clbal8;$strcls8=$clbal8.'C';}else{$strcls8=$clbal8.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';	


$id=9;
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
   
   $clbal9=($opnbal+$debit)-$credit;if($clbal9<0){$clbal9=0-$clbal9;$strcls9=$clbal9.'C';}else{$strcls9=$clbal9.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";



$id=10;
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
   
   $clbal10=($opnbal+$debit)-$credit;if($clbal10<0){$clbal10=0-$clbal10;$strcls10=$clbal10.'C';}else{$strcls10=$clbal10.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

/*
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

$netprofit=$netloss=0;
$totexpense=$totgrexpense+$clbal14+$clbal4;
$totincome=$totgrincome+$clbal13+$clbal3;
if($totexpense>$totincome){$netloss=$totexpense-$totincome;}else{$netprofit=$totincome-$totexpense;}
$total=$totexpense+$netprofit;
*/


	?>
<br><br>

			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Assets </th><th align="right">      Dr. Amount</th>
                        <th align="left">Liabilities and Owners Equity</th><th align="right">        Cr. Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					?>
					
				<tr>
						<td align="left"><?php echo "Fixed Assests";?></td>
						<td align="right"><?php echo $strcls5;?></td>
						<td align="left"><?php echo "Capital Amount";?></td>
						<td align="right"><?php echo $strcls8;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=5 order by id";
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

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=8 order by id";
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
?>

<tr>
						<td align="left"><?php echo "Current Assets";?></td>
						<td align="right"><?php echo $strcls6;?></td>
						<td align="left"><?php echo "Current liabilities";?></td>
						<td align="right"><?php echo $strcls9;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=6 order by id";
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

$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=9 order by id";
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
						<td align="left"><?php echo "Investments";?></td>
						<td align="right"><?php echo $strcls7;?></td>
						<td align="left"><?php echo "Loan(Liabilities)";?></td>
						<td align="right"><?php echo $strcls10;?></td>
				  </tr>
				
			<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=7 order by id";
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
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=10 order by id";
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
$clbal=$clbal111=0;
$sql="select * from groups where parent_id=1 and id>16 order by id";
$result=mysqli_query($con,$sql);
while($row = $result->fetch_object())
{
$id=$row->id;
$grpname=$row->name;
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
   
   $clbal=($opnbal+$debit)-$credit;if($clbal<0){$clbal=0-$clbal;$strcls=$clbal.'C';$clbal=0-$clbal;}else{$strcls=$clbal.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

?>
<tr>
						<td align="left"><?php echo "*****".$grpname;?></td>
						<td align="right"><?php echo $strcls;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=$id order by id";
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
}
$clbalasset=0;$clbal12=0;
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=1 order by id";
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
if($lid<75 and $lid>94){ 
?>
<tr>
						<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  </tr>
<?PHP
}
$clbalasset+=$clbal12;
}

$clbal111=0;
$sql="select * from groups where parent_id=2 and id>16 order by id";
$result=mysqli_query($con,$sql);
while($row = $result->fetch_object())
{
$id=$row->id;
$grpname=$row->name;
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
   
   $clbal111=($opnbal+$debit)-$credit;if($clbal111<0){$clbal111=0-$clbal111;$strcls111=$clbal111.'C';$clbal111=0-$clbal111;}else{$strcls111=$clbal111.'D';}
  // print $grpname."   ".$stropn."   ".$debit."   ".$credit."   ".$strcls."<br>";

?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  		<td align="left"><?php echo "*****".$grpname;?></td>
						<td align="right"><?php echo $strcls111;?></td>
						</tr>
<?PHP
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=$id order by id";
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
/*
?>
<tr>
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
                        <td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						
				  </tr>
<?PHP

*/

}
}
$clballiabilities=0;
$sql="select id,name,op_balance,op_balance_dc from ledgers where      group_id=2 order by id";
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
						<td align="left"><?php echo "  ";?></td>
						<td align="right"><?php echo "   ";?></td>
				  		<td align="left"><?php echo "*****".$lname12;?></td>
						<td align="right"><?php echo $lclbal12.$lclbaltype12;?></td>
						</tr>
<?PHP
$clballiabilities+=$clbal12;
}

$netprofit=$netloss=$totbig=0;
$totasset=$clbal5+$clbal6+$clbal7+$clbal+$clbalasset;
$totliabilities=$clbal8+$clbal9+$clbal10+$clbal111+$clballiabilities;
if($totasset>=$totliabilities){$totbig=$totasset;}else{$totbig=$totliabilities;}

$opbaldiff=0;
 $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
					   $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
 $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
					   $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff+=$row2[0];
$sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4))";
			          $result2=mysqli_query($con,$sql2);
					  $row2 = $result2->fetch_row();
					  $opbaldiff-=$row2[0];

/* income stmnt */
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

if($netprofit>0){$totbig+=$netprofit;} if($netloss>0){$totbig+=$netloss;}
/* end of income stmnt */
$diffcr=$diffdr=0;
if($netprofit>=0)
{
  if($totasset>$totliabilities+$netprofit){$diffcr=$totasset-($totliabilities+$netprofit);$totliabilities+=$netprofit+$diffcr;}
  elseif($totasset<$totliabilities+$netprofit){$diffdr=($totliabilities+$netprofit)-$totasset;$totasset+=$diffdr+$netprofit;}
  
}
if($netloss>0)
{
  if(($totasset-$netloss)>$totliabilities){$diffcr=($totasset-$netloss)-($totliabilities);$totliabilities+=$diffcr-$netloss;}
  elseif(($totasset-$netloss)<$totliabilities){$diffdr=($totliabilities)-($totasset-$netloss);$totasset+=$diffdr-$netloss;}
  
}
if($diffcr>0)
{
	if($netprofit>0){
?>
<tr>
						<td align="left"><?php echo "Profit and Loss Account (Net Profit)";?></td>
						<td align="right"><?php echo $netprofit;?></td>
                        <td align="left"><?php echo "";?></td>
						<td align="right"><?php echo '';?></td>
						
				  </tr>
                  <?PHP } else if($netloss>0){?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				        <td align="left"><?php echo "Profit and Loss Account (Net Loss)";?></td>
						<td align="right"><?php echo $netloss;?></td>
						</tr>
<?php
				  }
 }
if($diffdr>0)
{
	if($netprofit>0){
?>
<tr>
						<td align="left"><?php echo "Profit and Loss Account (Net Profit)";?></td>
						<td align="right"><?php echo $netprofit;?></td>
                        <td align="left"><?php echo "";?></td>
						<td align="right"><?php echo '';?></td>
						
				  </tr>
                  <?PHP } else if($netloss>0){?>
<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
				        <td align="left"><?php echo "Profit and Loss Account (Net Loss)";?></td>
						<td align="right"><?php echo $netloss;?></td>
						</tr>
<?php
				  }

}
If($opbaldiff>0 ){ 
?>

<tr>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "";?></td>
						<td align="left"><?php echo "Difference in O/P Balance";?></td>
						<td align="right"><?php echo $opbaldiff;?></td>
			  </tr>
              <?PHP
}

	
If($opbaldiff<0 ){ 
?>

<tr>
						<td align="left"><?php echo "Difference in O/P Balance";?></td>
						<td align="right"><?php echo $opbaldiff;?></td>
						<td align="left"><?php echo "";?></td>
						<td align="right"><?php echo "" ?></td>
			  </tr>
              <?PHP
}

?>	

<tr>
						<td align="left"><?php echo "Total Assets";?></td>
						<td align="right"><?php echo $totbig+$opbaldiff+$netprofit*2-$netloss*2;?></td>
						<td align="left"><?php echo "Total Liabilities and Owner's equity";?></td>
						<td align="right"><?php echo $totbig+$opbaldiff+$netprofit*2-$netloss*2;?></td>
				  </tr>


			</tbody>
			</table>
            
            
            
            
            
            
            
            
            
            
			
	
<input class="btn btn-info" type="submit" name="submit2" value="Report" onclick="centeredPopup('balance_init_report.php','myWindow','700','700','yes');return false" align="middle">
   </div>
	
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
