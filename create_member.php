<?php
session_start();
$previllageid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hili Truck</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    </head>
    <script language="javascript">
        var popupWindow = null;
        function centeredPopup(url, winName, w, h, scroll) {
            LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
            TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
            settings =
                    'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
            popupWindow = window.open(url, winName, settings)
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

                    <?php include 'leftmenu.php'; ?>   
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



                            <?php
                            require 'db/connect.php';

                            $error = ""; //variable to hold our form error message
                            $success = ""; //variable to hold our success message
                            $previllage = $_SESSION['userid'];
                            if (isset($_POST['create'])) {
                                $memberno = trim($_POST['memberno']);
                                $accountno = trim($_POST['accountno']);
                                $groupname = trim($_POST['groupname']);
                                $jdate = trim($_POST['jdate']);
                                $pbalance = trim($_POST['pbalance']);
                                $memstatus = trim($_POST['memstatus']);
                                $mname = trim($_POST['mname']);
                                $fname = trim($_POST['fname']);
                                $tname = trim($_POST['tname']);
                                $sname = trim($_POST['sname']);
                                $cname = trim($_POST['cname']);
                                $nid = trim($_POST['nid']);
                                $maddress = trim($_POST['maddress']);
                                $paddress = trim($_POST['paddress']);
                                $dpsgrp = trim($_POST['dpsgrp']);
                                $userid = trim($_POST['userid']);
                                $usertype = trim($_POST['usertype']);
                                $txtconfpass = trim($_POST['txtconfpass']);
                                $txtadmission = trim($_POST['txtadmission']);
                                $txtprevbal = trim($_POST['txtprevbal']);
                                //$txtconfpass 		= trim($_POST['txtconfpass']);
                                //$bal 		= trim($_POST['txtbal']);
                                //$notes 		= trim($_POST['notes']);
                                //$bio 		= trim($_POST['bio']);

                                $sql = "INSERT INTO ledgers (name, group_id,type,op_balance,op_balance_dc,reconciliation,notes) VALUES ('$accountno', 8,1,$pbalance,'C',0,'Truck Member')";
                                $result = mysqli_query($con, $sql);
                                //print $sql;
                                $sql = "insert into member_info(id,mem_no,acc_no,group_no,join_date,prbal,status,memname,fname,moname,spname,chname,nid,maddr,paddr,dps,userid,usertype,userpass,admissionfee,previousbalamt)values('','$memberno','$accountno','$groupname','$jdate',$pbalance,$memstatus,'$mname','$fname','$tname','$sname','$cname','$nid','$maddress','$paddress',$dpsgrp,'$userid',$usertype,'$txtconfpass',$txtadmission,$txtprevbal)";
                                //$result=mysqli_query($con,$sql);
                                //print $sql;
                                $result = mysqli_query($con, $sql);
                                ?>
                                <div class="alert alert-danger">
                                    <strong>Attention!</strong> User Successfully Created.
                                </div>
                                <?PHP
                            }
                            $sql = "SELECT MAX( CAST( RIGHT( acc_no, LENGTH( TRIM( acc_no ) ) -4 ) AS UNSIGNED ) ) +1 AS cnt
FROM member_info";
                            $resultcustid = mysqli_query($con, $sql);
                            $row_custid = mysqli_fetch_row($resultcustid);
                            $newmemid = $row_custid[0];
                            if ($newmemid == Null) {
                                $newmemid = 1;
                            } $nmemid = "mem-" . $newmemid;
                            ?>
                            <!-- Default box -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h1 class="box-title"><span class="fa fa-th"> Create Member</span></h1>
                                </div>
                                <div class="box-body">
                                    <form action="" method="post">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td colspan="2" align="right"><input class="btn btn-info" type="submit" name="submit2" value="Create DPS" onclick="centeredPopup('create_dps.php', 'myWindow', '700', '700', 'yes');return false" align="middle">&nbsp;&nbsp;&nbsp;<input class="btn btn-info" type="submit" name="submit4" value="Assign DPS" onclick="centeredPopup('assign_dps.php', 'myWindow', '700', '700', 'yes');return false" align="middle">&nbsp;&nbsp;&nbsp;<input class="btn btn-info" type="submit" name="submit3" value="Create Truck" onclick="centeredPopup('create_truck.php', 'myWindow', '700', '700', 'yes');return false" align="middle"></td>

                                            </tr>
                                            <tr>
                                                <td><label for="name">Member No::</label></td>
                                                <td><input type="text" id="memberno" name="memberno" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Account No::</label></td>
                                                <td><input type="text" id="accountno" name="accountno" class="form-control input-sm" value="<?PHP print $nmemid; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Group:</label></td>
                                                <td>
                                                    <select name="groupname" id="groupname" class="form-control" data-placeholder="chart_id">

                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Joining Date::</label></td>
                                                <td><input type="date" id="jdate" name="jdate" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Previous Balance:</label></td>
                                                <td><input type="text" id="pbalance" name="pbalance" class="form-control input-sm" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Status::</label></td>
                                                <td><select name="memstatus" id="memstatus" class="form-control" data-placeholder="chart_id">

                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Member Name::</label></td>
                                                <td><input type="text" id="mname" name="mname" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Father Name::</label></td>
                                                <td><input type="text" id="fname" name="fname" class="form-control input-sm"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="name">Mother Name::</label></td>
                                                <td><input type="text" id="tname" name="tname" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Spouse Name::</label></td>
                                                <td><input type="text" id="sname" name="sname" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Child Name::</label></td>
                                                <td><input type="text" id="cname" name="cname" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">National ID::</label></td>
                                                <td><input type="text" id="nid" name="nid" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Present Address/Mailing Address::</label></td>
                                                <td><input type="text" id="maddress" name="maddress" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Permanent Address::</label></td>
                                                <td><input type="text" id="paddress" name="paddress" class="form-control input-sm"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">DPS Group:</label></td>
                                                <td>
                                                    <select name="dpsgrp" id="dpsgrp" class="form-control" data-placeholder="chart_id">
                                                        <option value="0">Select DPS</option>									<?php $sql = $db->query("select id,dps_name from dps_info"); ?>
                                                        <?php while ($row = $sql->fetch_object()) {
                                                            ?>

                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->dps_name; ?></option>
<?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Admission Fees::</label></td>
                                                <td><input type="text" id="txtadmission" name="txtadmission" class="form-control input-sm" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">Paid Up  balance::</label></td>
                                                <td><input type="text" id="txtprevbal" name="txtprevbal" class="form-control input-sm" value="0" ></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">::</label></td>
                                                <td><input type="text" id="userid" name="userid" class="form-control input-sm" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><label for="name">:</label></td>
                                                <td>
                                                    <select name="usertype" id="usertype" class="form-control" data-placeholder="chart_id" >
                                                        <?php $sql = $db->query("select typeid,typename from typename"); ?>
                                                        <?php while ($row = $sql->fetch_object()) {
                                                            ?>

                                                            <option value="<?php echo $row->typeid; ?>"><?php echo $row->typename; ?></option>
<?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="name"> :</label></td>
                                                <td><input type="password" id="txtconfpass" name="txtconfpass" class="form-control input-sm" readonly></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td><button type="submit" class="btn btn-success" name="create">CREATE MEMBER</button>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="home.php">BACK </a></td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <!-- form body End-->
                            </div><!-- /.box-body -->






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
