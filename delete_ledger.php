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
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "Welcome ".$_SESSION['userid'];?> </span>
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
        
		<?php
		require 'db/connect.php';
		if (isset($_POST['delete'])) {
		$id = $_POST['delete'];
		$sql=$db->query("select id from entries   where id in (select entry_id   from entryitems where ledger_id=$id)");
		while($row = $sql->fetch_object()){$eid=$row->id;
		
		$sql="delete from entryitems where entry_id=$eid";
		$result=mysqli_query($con,$sql);
		$sql="delete from entries   where id =$eid";
		$result=mysqli_query($con,$sql);}
		$sql="delete from member_info  where acc_no=(select name from ledgers where id=$id)";
		$result=mysqli_query($con,$sql);
		$sql="delete from ledgers where id=$id";
		$result=mysqli_query($con,$sql);
		echo"<div class=\"col-md-12\">
           <div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <strong>Warning!!</strong> Deleted one Ledger successfully.
          </div>
          </div";
    }
		
		
		
		?>
		
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <div class="col-md-12">
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-th">  D e l e t e Ledger</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            
                    <table class="table table-bordered" id="chartofaccount">
                      <thead>
                        <tr>
                        
                          <th>LID#</th>
                          <th>Name Of the Group</th>
                          <th>Name of the Ledger </th>
                          <th>Opening</th>
                          <th>Type</th>
                          <th>Notes</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
					  
					  $query1=$db->query("select ledgers.id,groups.name as groupname,ledgers.name as ledgersname,op_balance,op_balance_dc,notes from ledgers,groups where groups.id=ledgers.group_id order by groups.id asc");
			          
                       while ($row1 = $query1->fetch_row()) {	
						
						
					?>
                        <tr>
                          
                          <td><?php echo $row1[0];?></td>
                          <td width="15%"><?php echo $row1[1];?></td>
                          <td><?php echo $row1[2];?></td>
                          <td><?php echo $row1[3];?></td>
                          <td><?php echo $row1[4];?></td>
                          <td><?php echo $row1[5];?></td>
                          <td>
                          <a  class="btn btn-info" href="journal_statement.php">View</a>
                          </td>
                          <td>
                         <form name="delete" method="post" action=""> 
                        <button type="submit" class="btn btn-danger" name="delete" value=<?php echo $row1[0];?>>Delete</button>
                         </form>
                          </td>
						</tr>
                       
                        <?php
					 }
				?>
                </tbody>
                </table>
               
            
            
            </div><!-- form body End-->
            </div><!-- /.box-body -->
            <div class="box-footer">
            <div class="well">
            A Ledger Contain the all Transation of Accounting System.Try to understant before delete the Ledger.
            </div>
            </div><!-- /.box-footer-->
         </div><!-- /.row -->
         </div><!-- /.col -->
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
