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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs"><?PHP print "welcome " . $_SESSION['userid']; ?> </span>
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
                        Sales
                        <small>Payment Information Area</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                    <?php include 'db/connection.php';
                    require 'db/connect.php';
                    ?>
                    <div class="row">
                        <!-- table col -->
                        <div class="col-md-12" align="right">
                            <?PHP ?>
                            <a href="sales_receivable.php" onclick="centeredPopup(this.href, 'myWindow', '700', '500', 'yes');return false" class="btn btn-danger">Accounts receivable</a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- table col -->
                        <div class="col-md-12">
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Sales Information List</h3>

                                </div><!-- /.box-header -->
                                <div class="box" >
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL#</th>
                                                    <th>Cust Id</th>
                                                    <th>Customer</th>
                                                    <th>Paid Amount</th>
                                                    <th>Pay Mode</th>
                                                    <th>Pay date</th>
                                                    <th>Bank</th>
                                                    <th>Cheque</th>
                                                    <th>Confirm</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $serial = 1;
                                                $query1 = "Select sales_customer.cust_id,cname,sales_payment.paid_amount,paid_mod,paid_date,bank,chequeno,sales_payment.paymentid from sales_customer,sales_payment left join  sales_paymentdetail on  sales_payment.paymentid=sales_paymentdetail.paymentid where sales_customer.cust_id=sales_payment.cust_id";
                                                var_dump($query1);

                                                if ($result1 = $mysqli->query($query1)) {

                                                    /* fetch object array */
                                                    while ($row1 = $result1->fetch_row()) {
                                                        $sql = "SELECT paymentid,status  from sales_integration where paymentid=" . $row1[7] . "";
                                                        //print $sql;
                                                        $resultopn = mysqli_query($con, $sql);
                                                        if ($rowopn = $resultopn->fetch_object()) {
                                                            $status = $rowopn->status;
                                                        } else {
                                                            $pid = $row1[7];
                                                            $selectopn = "insert into sales_integration(cust_id,paymentid,status)values('" . $row1[0] . "',$pid,1)";
                                                            $status = 1;
                                                            $resultopn = mysqli_query($con, $selectopn);
                                                        }
                                                        if ($status == 1) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $serial++; ?></td>
                                                                <td><?php echo $row1[0]; ?></td>
                                                                <td><?php echo $row1[1]; ?></td>
                                                                <td><?php echo $row1[2]; ?></td>
                                                                <td><?php echo $row1[3]; ?></td>
                                                                <td><?php echo $row1[4]; ?></td>
                                                                <td><?php echo $row1[5]; ?></td>
                                                                <td><?php echo $row1[6]; ?></td>
                                                                <td><a href="sales_confirm.php?cust_id=<?php echo $row1[0]; ?>&paymentid=<?php echo $row1[7]; ?>&payamount=<?php echo $row1[2]; ?>&paymode=<?php echo $row1[3]; ?>&paydate=<?php echo $row1[4]; ?>&bank=<?php echo $row1[5]; ?>&cheque=<?php echo $row1[6]; ?>" onclick="centeredPopup(this.href, 'myWindow', '700', '500', 'yes');return false" class="btn btn-warning">Confirm</a></td>



                                                            </tr>
                                                            <?php
                                                        }
                                                    }
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
