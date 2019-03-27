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
            
            <div class="box-body">
             <!-- form body Start-->
            
              <?php
$hidvouchertype=0;
require 'db/connect.php';

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
    <input type="hidden" name="hidledger" >
    
		     
                <div class="box-header with-border">
                  <h1 class="box-title"><span class="fa fa-th">  JOURNAL LEDGERS ENTRIES REPORT </span></h1>
                </div>
			
			<?PHP $quer_type=$db->query("SELECT id ,name from ledgers order by id asc"); ?>
			
			  <select  class="form-control" id="ledgername" name="ledgername" >
			    <option value=0>Select Ledgers</option>
                <?php while ($row_type = $quer_type->fetch_object()) {
					?>
			    
			        <option value="<?php echo $row_type->id;?>" ><?php echo $row_type->name;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
		      </select>
			  <br>
			  <input type="submit" class="btn-info" name="submit1" value="submit">
		</form>
			  <?php
				if(isset($_POST['submit1'])){
				$ledger=$_POST['ledgername'];

$select = "select m.*,l.name as lname,sum(m.amount)as samt from  entries e,entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id   group by e.date";
//print $select;
$result=mysqli_query($con,$select);
$sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?><br><br>
			<div class="box box-info">
                <div class="box-header with-border">
                    LEDGER HEAD     <h1> <?php echo $rowledger->ledgername;?> </h1>
                </div>
			</div>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Number</th>
						<th>Ledger</th>
						<th>Type</th>
						<th>Tag</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					$vtype=$row->entrytype_id;
					$select2="select e.id,DATE_FORMAT(e.date,'%Y-%m-%d')AS dt,e.number,e.narration,t.name from entries e, entrytypes t where e.entrytype_id=t.id and   e.entrytype_id=$vtype  and e.id=$id ";
					$result2=mysqli_query($con,$select2);
					while ($row2 = $result2->fetch_object()) {
					?>
				<tr>
						<td><?php echo $row2->dt;?></td>
						<td><?php echo $row2->number;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row2->name;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->samt;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->samt;}else echo '';?></td>
						
				  </tr>
				
			<?php
			}
			}
			?>
			</tbody>
			</table>
			</div>
			<?php
				//echo "<a href='index.php?page=1'>First Page</a>";
}				
				
			?>
		
</div>
            
            <!-- form body End-->
            <!-- /.box-body -->
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
