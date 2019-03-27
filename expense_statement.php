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
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            <div class="box-header with-border">
              <h3 class="box-title"><span class="fa fa-th"> CHART OF ACOUNT</h3>
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
                  <h1 class="box-title"><span class="fa fa-th">  EXPENSE STATEMENT REPORT</span></h1>
                </div>
			
			
			  <div class="table-responsive">
			  <table width="200" border="1" class="table table-bordered">
  <tr>
    <td>Start Date</td>
    <td><INPUT type="date" name="txtstartdate" id="txtstartdate" value=""/></td>
  </tr>
  <tr>
    <td>End Date</td>
    <td><INPUT type="date" name="txtenddate" id="txtenddate" value=""/></td>
  </tr>
</table>
</div>
			  <input class="btn btn-info" type="submit" name="submit1" value="submit">
		</form>
			  <?php
				if(isset($_POST['submit1'])){
				$groupname=4;
				$showstartdate=$startdate=$startdate1=$_POST['txtstartdate'];
				$showenddate=$enddate=$enddate1=$_POST['txtenddate'];
				//$startdate1 = strtotime( $startdate1 );
				//$startdate= date( 'Y-m-d', $startdate1 );
				//$showstartdate= date( 'd-m-Y', $startdate1 );
				//$enddate1 = strtotime( $enddate1 );
				//$enddate= date( 'Y-m-d', $enddate1 );
				//$showenddate= date( 'd-m-Y', $enddate1 );
				 $quer_type=$db->query("SELECT name from groups where id=$groupname");$restype = $quer_type->fetch_object();
	$grname=$restype->name;
	?>
    <div class="box box-info">
                <div class="box-header with-border">
                     <h3><strong>ACCOUNT HEAD  : <?php echo $grname;?></strong> </h3>
                </div>
			</div>
            
      <div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher</th>
						<th>Ledger</th>
						<th>Type</th>
						<th>Tag</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>      
    <?PHP
	$groupbal=0.0;	 
	 $sqlincomeroot="select id from groups where parent_id=$groupname";  $resultincomeroot=mysqli_query($con,$sqlincomeroot);
			while($rowincomeroot = mysqli_fetch_row($resultincomeroot)){
							$incomechildlevel1=$rowincomeroot[0];
	
	$sqlincomechildlevel1="select id from groups where parent_id=$incomechildlevel1";
							//print $sqlincomechildlevel1; 
							$resultincomechildlevel1=mysqli_query($con,$sqlincomechildlevel1);
							while($rowincomechildlevel1 = mysqli_fetch_row($resultincomechildlevel1)){
							$incomechildlevel2=$rowincomechildlevel1[0];
	
	
	$selectledgers="select * from ledgers where group_id=$incomechildlevel2";
$resultledgers=mysqli_query($con,$selectledgers);
//$groupbal=0.0;
while ($rowledgers = $resultledgers->fetch_object()) {
	$ledger=$rowledgers->id;			
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C'  and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,e.date,t.name as tname  from  entries e,entryitems m, ledgers l, entrytypes t where  e.entrytype_id=t.id and m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '$startdate' and '$enddate' and m.refund=0";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                 
               
			
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->amount;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='C';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='D';
								 }
							}
						}
						else if ($dc=='C') 
						{
							if($cumtype=='C')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='D';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='C';
								 }
							}
						}
						 print $cumbalance.'  '.$cumtype;	?></td>
						
				  </tr>
				
			<?php
			
			}
			?>
			
	
   
    

<?PHP
$groupbal+=$cumbalance;
}

							}
							
							
	$selectledgers="select * from ledgers where group_id=$incomechildlevel1";
$resultledgers=mysqli_query($con,$selectledgers);
//$groupbal=0.0;
while ($rowledgers = $resultledgers->fetch_object()) {
	$ledger=$rowledgers->id;			
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C'  and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,e.date,t.name as tname  from  entries e,entryitems m, ledgers l, entrytypes t where  e.entrytype_id=t.id and m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '$startdate' and '$enddate' and m.refund=0";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                  
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->amount;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='C';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='D';
								 }
							}
						}
						else if ($dc=='C') 
						{
							if($cumtype=='C')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='D';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='C';
								 }
							}
						}
						 print $cumbalance.'  '.$cumtype;	?></td>
						
				  </tr>
				
			<?php
			
			}
			?>
			

<?PHP
$groupbal+=$cumbalance;
}						
							
							
			}
$selectledgers="select * from ledgers where group_id=$groupname";
$resultledgers=mysqli_query($con,$selectledgers);
//$groupbal=0.0;
while ($rowledgers = $resultledgers->fetch_object()) {
	$ledger=$rowledgers->id;			
$selectopn="select * from ledgers where id=$ledger";
$resultopn=mysqli_query($con,$selectopn);
$rowopn = $resultopn->fetch_object();
$opnstk=$rowopn->op_balance;
$dcopn=$rowopn->op_balance_dc;

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C'  and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '2001-01-01' and '$startdate' and m.refund=0";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname,e.date,t.name as tname  from  entries e,entryitems m, ledgers l, entrytypes t where  e.entrytype_id=t.id and m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.entrytype_id=m.entrytype_id and e.date between '$startdate' and '$enddate' and m.refund=0";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>

<?PHP $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = $resultledger->fetch_object();
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			
                  
				<?php
					while ($row = $result->fetch_object()) {
					$id=$row->entry_id;
					
					
					
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $id;?></td>
						<td><?php echo $row->lname;?></td>
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo $row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo $row->amount;}else echo '';?></td>
						<td><?php
						if ($dc=='D') 
						{
							if($cumtype=='D')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='C';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='D';
								 }
							}
						}
						else if ($dc=='C') 
						{
							if($cumtype=='C')
							{
								$cumbalance+=$row->amount;
							}
							else
							{
								$cumbalance-=$row->amount;
								if($cumbalance>0)
								 {
								  $cumtype='D';
								 }
								 else
								 {
								  $cumbalance=0-$cumbalance;$cumtype='C';
								 }
							}
						}
						 print $cumbalance.'  '.$cumtype;	?></td>
						
				  </tr>
				
			<?php
			
			}
			?>
			
    

<?PHP
$groupbal+=$cumbalance;
}		
		
			
?>


</tbody>
</table>
</div>






	<div class="panel panel-info">
<div class="panel-heading"><?PHP print "closing total amount as on ".$showenddate." is ".$groupbal; ?></div>
  <div class="panel-body">
    
  </div>
</div>
	<input class="btn btn-info" type="submit" name="submit2" value="Report" onclick="centeredPopup('expense_statement_report.php?groupid=<?php echo $groupname;?>&startdate=<?php echo $startdate;?>&enddate=<?php echo $enddate;?>&showstartdate=<?php echo $showstartdate;?>&showenddate=<?php echo $showenddate;?>','myWindow','700','700','yes');return false" align="middle">
			<?php
				//echo "<a href='index.php?page=1'>First Page</a>";
}				
				
			?>
		
</div>
            
            <!-- form body End-->
            </div><!-- /.box-body -->
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
