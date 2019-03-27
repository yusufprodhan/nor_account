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
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <?php include 'leftmenu.php'; ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h1>
            Hili Truck Mailk Group Accounting
            <small>Software</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- Main row -->
         <?php  include 'db/connection.php';  
         require 'db/connect.php';
		 $chq=$_POST['txtchq'];
		 ?>
         
            
          <div class="row">
            <!-- table col -->
            <div class="col-md-12">
               <!-- TABLE: LATEST ORDERS -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Cheque Information List</h3>

                </div><!-- /.box-header -->
                <div class="box" >
                  <div class="box-body">
                  
                    <table id="example1" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>SL#</th>
                          <th>Voucher</th>
                          <th>Cheque</th>
                          <th>Bank</th>
                          <th>Amount</th>
                          <th>Chqdate</th>
                          <th>PayMode</th>
                          <th>Paydate</th>
                          <th>Deposited Bank</th>
                          <th>Branch</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
                      $serial = 1;
					  $sql = "select e.*,t.*,p.paymentname,l.name,b.*  from entries e,entryitems t,paymentmode p, ledgers l, bankinfo b  where e.id=t.entry_id and e.paymentmode=p.id and t.ledger_id=l.id and trim(l.name)=trim(b.accountno) and t.ledger_id between 75 and 94 and e.cheque='$chq' and e.id not in(select id from dishonor_entries)";
				
			          
						//print $sql;
$resultopn=mysqli_query($con,$sql);									
						
						 while ($row1 = $resultopn->fetch_array()){
					?>
                        <tr>
                          <td><?php echo $serial++;?></td>
                          <td><?php echo $row1['entry_id'];?></td>
                          <td><?php echo $row1['cheque'];?></td>
                          <td><?php echo $row1['bank'];?></td>
                          <td><?php echo $row1['dr_total'];?></td>
                          <td><?php echo $row1['chqdate'];?></td>
                          
                          <td><?php echo $row1['paymentname'];?></td>
                          <td><?php echo $row1['date'];?></td>
                          <td><?php echo $row1['bankname'];?></td>
                          <td><?php echo $row1['branchname'];?></td>
                          <td><a href="cheque_confirm.php?entry_id=<?php echo $row1['entry_id'];?>" onclick="centeredPopup(this.href,'myWindow','700','500','yes');return false" class="btn btn-warning">Dishonour</a></td>
                         
                       
                          
                        </tr>
                        <?php
						 
						
					
					 }
					 
				?>
                       
                      </tbody>
                    </table>
                                      
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              
              
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://websmartbd.com">Websmart Bangladesh</a>.</strong> All rights reserved.
      </footer>

    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="dist/js/demo.js" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
   
  </body>
</html>
