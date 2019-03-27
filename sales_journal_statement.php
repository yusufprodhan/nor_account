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
                            <img src="customimage/Hili Trucklogo.png" class="img-circle" alt="User Image">
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
              <img src="customimage/Hili Trucklogo.png" class="img-circle" alt="User Image">
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
          
             <!-- form body Start-->
            
             <?php
$hidvouchertype=0;
require 'db/connect.php';
include 'db/connection.php';
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
		<div class="box box-info">
                <div class="box-header with-border">
                  <h5 class="box-title"><span class="fa fa-th">  JOURNAL LEDGERS STATEMENT REPORT FOR CUSTOMERS</span></h5>
                </div>
			
			<?PHP  $query1 = "Select cust_id,cname,address from sales_customer order by cust_id"; $result1 = $mysqli->query($query1);?>
			<p align="left" >
			  <select  class="form-control" id="ledgername" name="ledgername" >
			    <option value=0>Select one</option>
                <?php while ($row_type = $result1->fetch_object()) {
					 $addr=$row_type->address;
					 $cust_name=$row_type->cname;
					 $str=$cust_name.'--*Address*--'.$addr;
					?>
			    
			        <option value="<?php echo $row_type->cust_id;?>" ><?php echo $str;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
		      </select>
			  </p>
			  <div class="table-responsive">
			  <table width="200" border="1" class="table table-bordered">
  <tr>
    <td>Start Date</td>
    <td><INPUT type="date" name="txtstartdate" id="txtstartdate" /></td>
  </tr>
  <tr>
    <td>End Date</td>
    <td><INPUT type="date" name="txtenddate" id="txtenddate" /></td>
  </tr>
</table>
</div>
			  <input class="btn btn-info" type="submit" name="submit1" value="submit">
		</form>
			  <?php
				if(isset($_POST['submit1'])){
				$ledger=$_POST['ledgername'];
				$showstartdate=$startdate=$startdate1=$_POST['txtstartdate'];
				$showenddate=$enddate=$enddate1=$_POST['txtenddate'];
				//$startdate1 = strtotime( $startdate1 );
				//$startdate= date( 'Y-m-d', $startdate1 );
				//$showstartdate= date( 'd-m-Y', $startdate1 );
				//$enddate1 = strtotime( $enddate1 );
				//$enddate= date( 'Y-m-d', $enddate1 );
				//$showenddate= date( 'd-m-Y', $enddate1 );
/*				
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;
*/

$opnbal=0;
$query2 = "select * from sales_customer where cust_id='$ledger'"; $result2 = $mysqli->query($query2);$row2 = $result2->fetch_object();
$cname=$row2->cname;
//print $cname;
$selectopn2 = "select * from sales_order o where o.customer_id='$ledger' and o.sales_date between '2001-01-01' and '$startdate'";
$resultopn2 = $mysqli->query($selectopn2);
if($resultopn2 = $mysqli->query($selectopn2)){
while ($rowopn2 = $resultopn2->fetch_object()) {
$cust_id=$rowopn2->customer_id;
//print $cust_id;

$sales_amount=$rowopn2->sales_amount;
$paid_amount=$rowopn2->paid_amount;
$salestype=$rowopn2->salestype;
$bank='';
$cheque='';
$opnbal+=$sales_amount-$paid_amount;
}}
$selectopn3 = "select p.*,d.bank,d.chequeno from sales_payment p left join  sales_paymentdetail d on  p.paymentid=d.paymentid  where p.cust_id='$ledger' and p.paid_date between '2001-01-01' and '$startdate'";
$resultopn3 = $mysqli->query($selectopn3);
if($resultopn3 = $mysqli->query($selectopn3)){
while ($rowopn3 = $resultopn3->fetch_object()) {

$paid_amount=$rowopn3->paid_amount;
$paid_mod=$rowopn3->paid_mod;
$bank=$rowopn3->bank;
$chequeno=$rowopn3->chequeno;
$opnbal-=$paid_amount;
}}
 if($opnbal>0){$txtopnbal="(".$opnbal.")";}else{$txtopnbal=$opnbal;}


$cumbalance=$opnbal;

$selectopn4 = "select * from sales_order o where o.customer_id='$ledger' and o.sales_date between '$startdate' and '$enddate'";
$resultopn4 = $mysqli->query($selectopn4);

$selectopn5 = "select p.*,sales_paymentdetail.bank,sales_paymentdetail.chequeno from sales_payment p left join  sales_paymentdetail on  p.paymentid=sales_paymentdetail.paymentid  where p.cust_id='$ledger' and p.paid_date between 'startdate' and '$enddate'";
//print  $selectopn5;
$resultopn5 = $mysqli->query($selectopn5);
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
<br><br>
<br><br>
			<div class="box box-info">
                <div class="box-header with-border">
                    LEDGER HEAD     <h1> <?php echo $cname;?> </h1>
                </div>
			</div>
<div class="panel panel-danger">
<div class="panel-heading"><?PHP print "Opening Balance as on ".$showstartdate." is ".$txtopnbal; ?></div>
  
</div>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>SalesDate</th>
						<th>Payment mode</th>
						<th>Sales Amount</th>
						<th>Paid Amount</th>
						<th>Bank</th>
                        <th>cheque</th>
                        <th>Balance</th>
                        <th>Notes</th>
					</tr>
				</thead>
				<tbody>
				<?php
				//if($rowopn4 = $resultopn4->fetch_object()){
					while ($rowopn4 = $resultopn4->fetch_object()) 																																																								  						{
					$sales_amount=$rowopn4->sales_amount;
					$paid_amount=$rowopn4->paid_amount;
					$salestype=$rowopn4->salestype;
					$salesdate=$rowopn4->sales_date;
					
					$bank='';
					$chequeno='';
					$notes='';
					
					?>
				<tr>
						<td><?php echo $salesdate;?></td>
						<td><?php echo $salestype;?></td>
						<td><?php echo $sales_amount;?></td>
						<td><?php echo $paid_amount;$cumbalance+=$sales_amount-$paid_amount;if($cumbalance>0){$txtcumbalance="(".$cumbalance.")";}else{$txtcumbalance=$cumbalance;}?></td>
                        <td><?php echo $bank;?></td>
                        <td><?php echo $chequeno;?></td>
						<td><?php echo $txtcumbalance;?></td>
						<td><?php echo $notes;?></td>
						
				  </tr>
				
			<?php
			}
			//}
			
			//if($rowopn5 = $resultopn5->fetch_object()){
					while ($rowopn5 = $resultopn5->fetch_object()) 																																																								  						{
					$sales_amount=0;
					$paid_amount=$rowopn5->paid_amount;
					$paid_mod=$rowopn5->paid_mod;
					$paid_date=$rowopn5->paid_date;
					$bank=$rowopn5->bank;
					$chequeno=$rowopn5->chequeno;
					$notes=$rowopn5->paymentnote;
					$cust_id=$rowopn5->cust_id;
					$paymentid=$rowopn5->paymentid;
					$sql="SELECT paymentid,status  from sales_integration where paymentid=".$paymentid." and cust_id='".$cust_id."'";
						//print $sql;
$resultopn=mysqli_query($con,$sql);									
						 if($rowopn = $resultopn->fetch_object()){$status=$rowopn->status; if($status==3){
					?>
				<tr>
						<td><?php echo $paid_date;?></td>
						<td><?php echo $paid_mod;?></td>
						<td><?php echo $sales_amount;?></td>
						<td><?php echo $paid_amount;$cumbalance+=$sales_amount-$paid_amount;if($cumbalance>0){$txtcumbalance="(".$cumbalance.")";}else{$txtcumbalance=$cumbalance;}?></td>
                        <td><?php echo $bank;?></td>
                        <td><?php echo $chequeno;?></td>
						<td><?php echo $txtcumbalance;?></td>
                        <td><?php echo $notes;?></td>
						
						
				  </tr>
				
			<?php
			}}}
			//}
if($cumbalance>0){$txtcumbalance="(".$cumbalance.")";}else{$txtcumbalance=$cumbalance;}			
			?>
			</tbody>
			</table>
			</div>
	<div class="panel panel-info">
<div class="panel-heading"><?PHP print "closing balance Balance as on ".$showenddate." is ".$txtcumbalance; ?></div>
  
</div>
	<input class="btn btn-info" type="submit" name="submit2" value="Report" onclick="centeredPopup('sales_journal_statement_report.php?ledger=<?php echo $ledger;?>&startdate=<?php echo $startdate;?>&enddate=<?php echo $enddate;?>&showstartdate=<?php echo $showstartdate;?>&showenddate=<?php echo $showenddate;?>','myWindow','700','700','yes');return false" align="middle">
			<?php
				//echo "<a href='index.php?page=1'>First Page</a>";
}				
				
			?>
		
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
