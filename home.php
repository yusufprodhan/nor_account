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

                    <?php
                    require 'db/connect.php';
                    include 'leftmenu.php';
                    ?>   
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
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-th-large"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Assets</span>
                                            <?php
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='D' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
											print_r($result2);
                                            $row2 = $result2->fetch_row();
                                            $assets = $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets += $row2[0];
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='C' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=1)or(l.group_id=g.id and g.parent_id=1))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $assets_display = number_format($assets, 2, '.', ',');
                                            /* echo"<span class=\"info-box-number\"><h5>$assets_display</h5></span>";
                                             */
                                            ?>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-bars"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">TOTAL Liabilities and Owners Equity</span>
                                            <?php
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='C' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets = $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='D' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=2)or(l.group_id=g.id and g.parent_id=2))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets += $row2[0];
                                            $assets_display = number_format($assets, 2, '.', ',');
                                            /*   echo"<span class=\"info-box-number\"><h5>$assets_display</h5></span>";
                                             */
                                            ?>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix visible-sm-block"></div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-th-list"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Incomes</span>
                                            <?php
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='D' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets = $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='C' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=3)or(l.group_id=g.id and g.parent_id=3))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets += $row2[0];
                                            $assets = 0 - $assets;
                                            $assets_display = number_format($assets, 2, '.', ',');
                                            /*     echo"<span class=\"info-box-number\"><h5>$assets_display</h5></span>";
                                             */
                                            ?>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-tasks"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Expenses</span>
                                            <?php
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='D' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets = $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='D' and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets += $row2[0];
                                            $sql2 = "SELECT sum(t.amount) from entryitems t,ledgers l, groups g where t.dc='C' and t.ledger_id=l.id and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4)) and t.refund=0";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $sql2 = "SELECT sum(l.op_balance) from ledgers l, groups g where l.op_balance_dc='C' and ((l.group_id=g.id and g.id=4)or(l.group_id=g.id and g.parent_id=4))";
                                            $result2 = mysqli_query($con, $sql2);
                                            $row2 = $result2->fetch_row();
                                            $assets -= $row2[0];
                                            $assets_display = number_format($assets, 2, '.', ',');
                                            /*     echo"<span class=\"info-box-number\"><h5>$assets_display</h5></span>";
                                             */
                                            ?>

                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- MAP & BOX PANE -->






                                    <!-- TABLE: LATEST ORDERS -->
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Latest Transactions</h3>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                        <tr>
                                                            <th>Type of Voucher</th>

                                                            <th>Number of Vouchers</th>
                                                            <th>Transaction Amount </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query = "select ifnull(count(id),0)as cnt,sum(dr_total)as drmoney,sum(cr_total)as crmoney from entries where entrytype_id=1";
                                                        $result = mysqli_query($con, $query);

                                                        /* fetch object array */
                                                        $row = $result->fetch_row();
                                                        $receipt = $row[0];
                                                        $totdebit = $row[1];
                                                        $totcredit = $row[2];
                                                        $dif = $totdebit - $totcredit;
                                                        if ($dif < 0) {
                                                            $dif = (0 - $dif);
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?php echo 'RECEIPT'; ?></td>
                                                            <td><?php echo $receipt; ?></td>
                                                            <td><?php echo number_format($totdebit, 2, '.', ','); ?></td>
                                                        </tr>
                                                        <?php
                                                        $query = "select ifnull(count(id),0)as cnt,sum(dr_total)as drmoney,sum(cr_total)as crmoney  from entries where entrytype_id=2";
                                                        $result = mysqli_query($con, $query);

                                                        /* fetch object array */
                                                        $row = $result->fetch_row();
                                                        $payment = $row[0];
                                                        $totdebit = $row[1];
                                                        $totcredit = $row[2];
                                                        $dif = $totdebit - $totcredit;
                                                        if ($dif < 0) {
                                                            $dif = (0 - $dif);
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?php echo 'PAYMENT'; ?></td>
                                                            <td><?php echo $payment; ?></td>
                                                            <td><?php echo number_format($totdebit, 2, '.', ','); ?></td>
                                                        </tr>

                                                        <?PHP
                                                        $query = "select ifnull(count(id),0)as cnt,sum(dr_total)as drmoney,sum(cr_total)as crmoney  from entries where entrytype_id=3";
                                                        $result = mysqli_query($con, $query);

                                                        /* fetch object array */
                                                        $row = $result->fetch_row();
                                                        $contra = $row[0];
                                                        $totdebit = $row[1];
                                                        $totcredit = $row[2];
                                                        $dif = $totdebit - $totcredit;
                                                        if ($dif < 0) {
                                                            $dif = (0 - $dif);
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?php echo 'CONTRA'; ?></td>
                                                            <td><?php echo $contra; ?></td>
                                                            <td><?php echo number_format($totdebit, 2, '.', ','); ?></td>
                                                        </tr>
                                                        <?PHP
                                                        $query = "select ifnull(count(id),0)as cnt,sum(dr_total)as drmoney,sum(cr_total)as crmoney  from entries where entrytype_id=4";
                                                        $result = mysqli_query($con, $query);

                                                        /* fetch object array */
                                                        $row = $result->fetch_row();
                                                        $journal = $row[0];
                                                        $totdebit = $row[1];
                                                        $totcredit = $row[2];
                                                        $dif = $totdebit - $totcredit;
                                                        if ($dif < 0) {
                                                            $dif = (0 - $dif);
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?php echo 'JOURNAL'; ?></td>
                                                            <td><?php echo $journal; ?></td>
                                                            <td><?php echo number_format($totdebit, 2, '.', ','); ?></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                        </div><!-- /.box-body -->

                                    </div><!-- /.box -->
                                </div><!-- /.col -->
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
