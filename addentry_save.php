<?php
session_start(); // Use session variable on this page. This function must put on the top of page.
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hili Truck Mailk Group Accounts</title>
	<link rel="stylesheet" href="styles.css">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Hili Truck Mailk Group Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?PHP print "welcome ".$_SESSION['userid'];?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="chart_of_account.php"><i class="fa fa-fw fa-dashboard"></i> Accounts</a>
                    </li>
                    <li class="active">
                        <a href="show_entry.php"><i class="fa fa-fw fa-dashboard"></i> Entries</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Reports <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="journal_entries.php">Journal Entries</a>
                            </li>
                            <li>
                                <a href="journal_statement.php">Journal Statement</a>
                            </li>
                            <li>
                                <a href="profit_loss_init.php">Profit and Loss Account</a>
                            </li>
                            <li>
                                <a href="trialbal.php">Trial Balance</a>
                            </li>
                             <li>
                                <a href="balance_init.php"> Balance Sheet</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

     <?PHP            require 'db/connect.php';
$sql_str="";
$txtnumber 		= $_POST['txtnumber'];
$bank 		= $_POST['bank'];
$cheque 		= $_POST['cheque'];
$mobile 		= $_POST['mobile'];
	//txtnumber,txtdate,tableID,txttotdr,txttotcr,txtnaration
	$hid 	= $_POST['hid'];
	//print $hid;
	//$hrowcnt 	= $_POST['hrowcnt'];
	//print $hrowcnt;
	////for( $i=0; $i<$hrowcnt; $i++) {
	//////$hledger[ 	= $_POST['hrowcnt'];
	//}
	//$hledger[0] 	= $_POST['hledger[0]'];
	//print $hledger[0];
	$txtdate 	= $_POST['txtdate'];
	//$txtdate1=$_POST['txtdate1'];
    $txtdate = strtotime( $txtdate );
	$txtdate= date( 'Y-m-d', $txtdate );
	//$dataTable 	= $_POST['dataTable'];
	$txttotdr 	= $_POST['txttotdr'];
	$txttotcr 	= $_POST['txttotcr'];
	$pmode 	= $_POST['pmode'];
	$txtnaration 	= $_POST['txtnaration'];
	$sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
    $sql="insert into        entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile)values($entr_id,$hid,$txtnumber,'$txtdate',$txttotdr,$txttotcr,'$txtnaration',$pmode,'$bank','$cheque','$mobile')";			  
	//print $sql;
	//print"<br>";
	$result=mysqli_query($con,$sql);
	$sql_str.=$sql." ";
	$sql=$db->query("select max(id) as maxid from entries ");
	$row = $sql->fetch_object();
	$entr_id=$row->maxid;
	$rowcnt=0;
	$ledgerid=0;
	$dctype='';
	$amount=0;
	$voutype 	= $_POST['voutype'];
	$ledger 	= $_POST['ledger'];
	//$dataTable 	= $_POST['dataTable'];
	$txtdr 	= $_POST['txtdr'];
	$txtcr 	= $_POST['txtcr'];
				//var totcr=0.0;
			
			foreach($ledger as $a => $b)
			{
                  // echo "$voutype[$a]  -  $ledger[$a]  -  $txtdr[$a]  -  $txtcr[$a] <br />";
		  	  //totcr=totcr+Number(table.rows[i].cells[4].childNodes[0].value);
			  /* echo"$dctype=<script>print document.form1.tableID.rows[$i].cells[1].childNodes[0].value</script>";
			  echo"$ledgerid=<script>print document.form1.tableID.rows[$i].cells[2].childNodes[0].value</script>";*/
			  if ($voutype[$a]=='D')
			  {
				$amount=$txtdr[$a];	  
			  }
			  else
			  {
			  	$amount=$txtcr[$a];
			  }
			  
			  $sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($entr_id,$ledger[$a],$amount,'$voutype[$a]')";
			  $sql_str.=$sql." ";
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			}
print "Data successfully Inserted";
?>

<div align="right">  <a  class="btn btn-info" href="show_entry.php" >BACK</a></div>
   </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
<script src="jquery.datetimepicker.js"></script>
<script>
$('#txtstartdate').datetimepicker();

</script>
</html>
