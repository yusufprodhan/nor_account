<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Northern IT Accounts</title>
  
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
          <span class="logo-lg"><b>Northern IT</b>Group</span>
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
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "Welcome ".$_SESSION['userid'];?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="customimage/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Northern IT Salt Industries
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
              <p>Northern IT Group</p>
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
            Northern IT Group Accounting
            <small>Software</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
             <h1 class="box-title"><span class="fa fa-th">  Truck Statement Details Report.</span></h1>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
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

</script>

	<form  name="form1" method="post" action="">
	<input type="hidden" name="hidval1">
	<input type="hidden" name="hidvouchertype" >
		
               
			
			
			  
			  <div class="table-responsive">
			  <table width="200" border="1" class="table table-bordered">
                  <tr>
                    <td align="right">Start Date</td>
                    <td><INPUT type="date" name="txtstartdate" id="txtstartdate" value="" /></td>
                  </tr>
                  <tr>
                    <td align="right">End Date</td>
                    <td><INPUT type="date" name="txtenddate" id="txtenddate" value=""> </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><button class="btn btn-info" type="submit" name="submit1" value="submit">Click for Report</button></td>
                  </tr>
               </table>
               </form>
              </div>
		  
		
			  <?php
				if(isset($_POST['submit1'])){
				//$ledger=$_POST['ledgername'];
				$showstartdate=$startdate=$startdate1=$_POST['txtstartdate'];
				$showenddate=$enddate=$enddate1=$_POST['txtenddate'];
				//$startdate1 = strtotime( $startdate1 );
				//$startdate= date( 'Y-m-d', $startdate1 );
				//$showstartdate= date( 'd-m-Y', $startdate1 );
				//$enddate1 = strtotime( $enddate1 );
				//$enddate= date( 'Y-m-d', $enddate1 );
				//$showenddate= date( 'd-m-Y', $enddate1 );
				
$select="select id,date from entries where date between '$startdate' and '$enddate'";
$result=mysqli_query($con,$select);



//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						
                        <th>SL</th>
                        <th>Tran Date</th>
						<th>Description</th>
						
						<th>Big/A</th>
						<th>Mini/B</th>
						<th>Return</th>
						<th>Total Truck</th>
                        <th>Amount</th>
                        <th>Total Amount</th>
                        
                        
						
						
					</tr>
				</thead>
				<tbody>
				<?php
				$sl=1;
				    $memamount=0.0;
					$nonmemamount=0.0;
					$totamount=0.0;
					while ($row = mysqli_fetch_row($result)){
						$id=$row[0];$dt=$row[1];
						$memamount=0.0;
					$nonmemamount=0.0;
					$totamount=0.0;
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=1 and t.truck_type='A' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bigmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=1 and t.truck_type='B' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where i.refund=1 and t.mem_type=1 and i.entry_id=$id ";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$memrefund=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=2 and t.truck_type='A' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bignonmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where  t.mem_type=2 and t.truck_type='B' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlnonmem=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where i.refund=1 and t.mem_type=2 and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$nonmemrefund=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where i.refund=0 and i.truck_id>0  and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$tottruck=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where   i.refund=0 and t.mem_type=1 and t.truck_type='A' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bigmemNR=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where   i.refund=0 and t.mem_type=1 and t.truck_type='B' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlmemNR=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where     i.refund=0 and t.mem_type=2 and t.truck_type='A' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$bignonmemNR=$rowA[0];
						$sql="select  count(i.id)    from entryitems i   inner join truck_info t on i.truck_id=t.id where     i.refund=0 and t.mem_type=2 and t.truck_type='B' and i.entry_id=$id";
						$resultA=mysqli_query($con,$sql);
						$rowA = mysqli_fetch_row($resultA);
						$smlnonmemNR=$rowA[0];
						$memamount+=$bigmemNR*100+$smlmemNR*50;
						$nonmemamount+=$bignonmemNR*100+$smlnonmemNR*100;
						$totamount=$memamount+$nonmemamount;
						
					?>				<tr>
						
                        <td><?php print $sl++;?></td>
                        <td><?php echo $dt;?></td>
						<td><?php echo 'Member';?></td>
						
						<td><?php echo $bigmem;?></td>
						
						<td><?php echo $smlmem;?></td>
						
						<td><?php echo $memrefund;?></td>
						<td rowspan="2"><?php echo $tottruck;?></td><td><?php echo $memamount;?></td>
						<td rowspan="2"><?php echo $totamount;?></td
                        
				  </tr>
                  <tr>
						
                        <td></td>
                        <td><?php echo $dt;?></td>
						<td><?php echo 'NonMember';?></td>
						
						<td><?php echo $bignonmem;?></td>
						
						<td><?php echo $smlnonmem;?></td>
						
						<td><?php echo $nonmemrefund;?></td>
						<td><?php echo $nonmemamount;?></td>
						
                        
				  </tr>
				
			<?php
			
			}
			
			
			?>
			
            </tbody>
			</table>
			</div>
	

			<?php
				//echo "<a href='index.php?page=1'>First Page</a>";
}				
				
			?>
		

            <!-- form body End-->
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
       <strong>Copyright &copy; 2014-2015 <a href="http://Northern ITbd.com">Northern IT Bangladesh</a>.</strong> All rights reserved.
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
