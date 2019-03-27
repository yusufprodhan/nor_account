<?php
session_start();
require 'db/connect.php';
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
         <div class="row">
         <div class="col-md-12">
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h1 class="box-title"><span class="fa fa-th"> DATEWISE JOURNAL STATEMENT REPORT</span></h1>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
             <!-- form body Start-->
            
             <?php
				if(isset($_POST['submit1'])){
				$journaltype=$_POST['ledgername'];
				$showstartdate=$startdate=$startdate1=$_POST['txtstartdate'];
				$showenddate=$enddate=$enddate1=$_POST['txtenddate'];
				
					$opnstk=0;
					$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, entrytypes t where e.entrytype_id=t.id and  m.dc='D' and e.id=m.entry_id and t.id='$journaltype' and e.date between '2001-01-01' and '$startdate'";
					$resultopn2=mysqli_query($con,$selectopn2);
					$rowopn2 = $resultopn2->fetch_object();
					$opnstkd=$rowopn2->amt;
					
					$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, entrytypes t where e.entrytype_id=t.id and  m.dc='C' and e.id=m.entry_id and t.id='$journaltype'  and e.date between '2001-01-01' and '$startdate'";
					$resultopn3=mysqli_query($con,$selectopn3);
					$rowopn3 = $resultopn3->fetch_object();
					$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select t.name as tname,dr_total,e.id as eid from  entries e, entrytypes t where e.entrytype_id=t.id   and t.id='$journaltype' and e.date between '$startdate' and '$enddate'";
//print $select;
$result=mysqli_query($con,$select);
?>
<?PHP $sqlledger="select l.name as ledgername from entrytypes l where l.id=$journaltype";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                         <h4 align="center"><strong>Journal Head : <?php echo $rowledger->ledgername;?>&nbsp;&nbsp;<?PHP print "[Opening Balance:".$showstartdate." is ".$opbalance." ".$optype; ?>]</strong></h4>
                       
  
			<div class="table-responsive">
			<table class="table table-bordered" id="dstjournal">
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher No</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						<th>Balance</th>
                        <th>Notes</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				    $totdeb=0.0;$totcred=0.0;
					while ($row = $result->fetch_object()) {
					$id=$row->eid;
					$select2="select e.id,DATE_FORMAT(e.date,'%Y-%m-%d') as dt,e.narration,t.name from entries e, entrytypes t where e.entrytype_id=t.id  and t.id='$journaltype' and e.id=$id  and e.date between '$startdate' and '$enddate'";
					$result2=mysqli_query($con,$select2);
					
					while ($row2 = $result2->fetch_object()) {
					?>
				<tr>
						<td><?php print $row2->dt;?></td>
						<td><?php echo $row2->id;?></td>
						<td><?php echo number_format($row->dr_total, 2, '.', ',');$totdeb+=$row->dr_total;?></td>
						<td><?php echo number_format($row->dr_total, 2, '.', ',');$totcred+=$row->dr_total;?></td>
						<td><?php print $cumbalance.'  '.$cumtype;	?></td>
						<td><?php echo $row2->narration;?></td>
                        
				  </tr>
				
			<?php
			}
			}
			
			?>
			<tr>
						<td><strong>Total</strong></td>
						<td></td>
						<td><strong><?PHP print number_format($totdeb, 2, '.', ',');?></strong></td>
						<td><strong><?PHP print number_format($totcred, 2, '.', ',') ;?></strong></td>
						<td></td>
                        <td></td>
						
				  </tr>
               
            </tbody>
			</table>
            
            <?php
				
             }				
				
	?> 
			<h4><strong><?PHP print "Closing balance Balance as on : ".$showenddate." is ".$cumbalance." ".$cumtype; ?></strong></h4>
            </div>
	
	<input class="btn btn-danger pull-right" type="submit" name="submit2" value="Report" onclick="">
			 
            <!-- form body End-->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
         </div><!-- /.col -->
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
        $("#dstjournal").DataTable();
        
      });
    </script>
  </body>
</html>
