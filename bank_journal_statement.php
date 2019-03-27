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

          
          
             <?php
$hidvouchertype=0;
require 'db/connect.php';

?>


	
	
		<div class="box box-info"><!-- Default box -->
                <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th"> Individual Bank Journal Ledger Statement Report.</span></h3>
                </div>
       <div class="box-body"><!-- box body -->
          <form class="form-horizontal"  name="form1" method="post">
          <input type="hidden" name="hidval1">
	      <input type="hidden" name="hidvouchertype" >         
          <div id="dropdowns" class="form-group"> <!-- nexted drop down Start Start-->
                      <label class="col-sm-2 control-label">Bank</label>
                      <div class="col-sm-10">
                        <?php
		$sql = "SELECT distinct(bankname) FROM bankinfo ORDER BY bankname";
		$query = mysqli_query($con, $sql);
		?>
           
            <select name="bankname" id = "drop1" class="form-control select2-container">
              <option value="">Please Select</option>
              <?php while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC )) { ?>
              <option value="<?php echo $rs["bankname"]; ?>"><?php echo $rs["bankname"]; ?></option>
              <?php } ?>
            </select>
                     </div>
           </div>            
      
      <div class="form-group">
                      <label class="col-sm-2 control-label">Branch</label>
                    <div  id="branchname" class="col-sm-10"></div>
       </div> 

       <div class="form-group">
                      <label class="col-sm-2 control-label">Account</label>
         <div id="accountno"  class="col-sm-10"></div>
      </div> <!--Nexted drop down End-->
      
     <div class="form-group">
      <label class="col-sm-2 control-label">Start Date:</label>
	  <div   class="col-sm-10">
      <input type="date" name="txtstartdate" id="txtstartdate" value="" class="form-control"/>
      </div>
      </div>
      
      <div class="form-group">
      <label class="col-sm-2 control-label">End Date:</label>
	  <div  class="col-sm-10">
      <input type="date" name="txtenddate" id="txtenddate" value="" class="form-control"/>
      </div>
      </div>		
	  <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit1" value="submit">Submit</button>
      </div>
     </div> 
	 </form>
			   <?php
				if(isset($_POST['submit1'])){
					$bankn=$_POST['bankname'];
					$branchn=$_POST['branchname'];
				$ano=(string)ltrim(rtrim($_POST['accountno']));
				 $sqlledger="select id  from ledgers l where trim(name)like '%$ano%'";
				 //print $sqlledger;
$ledger=0;
$rledger=mysqli_query($con,$sqlledger);

$rowled = mysqli_fetch_row($rledger);
$ledger=ltrim(rtrim($rowled[0]));


				$showstartdate=$startdate=$startdate1=$_POST['txtstartdate'];
				$showenddate=$enddate=$enddate1=$_POST['txtenddate'];
				//$startdate1 = strtotime( $startdate1 );
				//$startdate= date( 'Y-m-d', $startdate1 );
				//$showstartdate= date( 'd-m-Y', $startdate1 );
				//$enddate1 = strtotime( $enddate1 );
				//$enddate= date( 'Y-m-d', $enddate1 );

$opnstk=0;
$dcopn='D';
$opnstkd=0;	
$opnstkc=0;			//$showenddate= date( 'd-m-Y', $enddate1 );
if($ledger>0){				
$selectopn="select op_balance,op_balance_dc from ledgers where id=$ledger";
//print $selectopn;
$resultopn=mysqli_query($con,$selectopn);
$rowopn = mysqli_fetch_row($resultopn);
$opnstk=$rowopn[0];
$dcopn=$rowopn[1];

$selectopn2 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='D' and e.id=m.entry_id and e.date between '2001-01-01' and '$startdate'";
$resultopn2=mysqli_query($con,$selectopn2);
$rowopn2 = $resultopn2->fetch_object();
$opnstkd=$rowopn2->amt;

$selectopn3 = "select sum(m.amount) as amt from entries e, entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and m.dc='C' and e.id=m.entry_id and e.date between '2001-01-01' and '$startdate'";
$resultopn3=mysqli_query($con,$selectopn3);
$rowopn3 = $resultopn3->fetch_object();
$opnstkc=$rowopn3->amt;


  $opbalance=$opnstk+$opnstkd-$opnstkc;
  if($opbalance>=0) {$optype='D';} else {$opbalance=0-$opbalance; $optype='C';}


$cumbalance=$opbalance;$cumtype=$optype;

$select = "select m.*,l.name as lname from  entries e,entryitems m, ledgers l where m.ledger_id=l.id and l.id=$ledger and e.id=m.entry_id and e.date between '$startdate' and '$enddate'";
//print $select;
$result=mysqli_query($con,$select);


//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
<br><br>
<?PHP $ldname=''; $sqlledger="select l.name as ledgername from ledgers l where l.id=$ledger";
$resultledger=mysqli_query($con,$sqlledger);
$rowledger = mysqli_fetch_row($resultledger);
$ldname=$rowledger[0];
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?><br><br>
			
            <div class="well well-sm"> LEDGER HEAD [<?php echo $bankn.' '.$branchn.' '.$ldname;?>]&nbsp; From: <?php echo $startdate;?>   To: <?php echo $enddate;?></div> 
            <div class="alert alert-danger">
              <?PHP print "Opening Balance as on ".$showstartdate." is ".$opbalance." ".$optype; ?>
            </div>
			<div class="table-responsive">
			<table class="table table-bordered" >
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher No</th>
						
						<th>Type</th>
						<th>Ref</th>
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
					$id=$row->entry_id;
					$select2="select e.id,DATE_FORMAT(e.date,'%Y-%m-%d') as dt,e.narration,t.name from entries e, entrytypes t where e.entrytype_id=t.id and e.id=$id  and e.date between '$startdate' and '$enddate'";
					$result2=mysqli_query($con,$select2);
					
					while ($row2 = $result2->fetch_object()) {
					?>
				<tr>
						<td><?php print $row2->dt;?></td>
						<td><?php echo $row2->id;?></td>
						
						<td><?php echo $row2->name;?></td>
						<td><?php '-';?></td>
						<td><?php $dc=$row->dc; if ($dc=='D') {echo number_format($row->amount, 2, '.', ',');$totdeb+=$row->amount;}else echo '';?></td>
						<td><?php $dc=$row->dc; if ($dc=='C') {echo number_format($row->amount, 2, '.', ',');$totcred+=$row->amount;}else echo '';?></td>
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
						<td><?php echo $row2->narration;?></td>
                        
				  </tr>
				
			<?php
			}
			}
			
			?>
			<tr>
						<td><strong>Total</strong></td>
						<td></td>
						
						<td></td>
						<td></td>
						<td><strong><?PHP print number_format($totdeb, 2, '.', ',');?></strong></td>
						<td><strong><?PHP print number_format($totcred, 2, '.', ',') ;?></strong></td>
						<td></td>
                        <td></td>
						
				  </tr>
            </tbody>
			</table>
			</div>
	
            <div class="alert alert-danger">
             <?PHP print "closing balance Balance as on ".$showenddate." is ".$cumbalance." ".$cumtype; ?>
            </div>
	<a  href="indivudal_bank_journal_statement_print.php?ledger=<?php echo $ledger;?>&startdate=<?php echo $startdate;?>&enddate=<?php echo $enddate;?>&showstartdate=<?php echo $showstartdate;?>&showenddate=<?php echo $showenddate;?> onclick="indivudal_bank_journal_statement_print.php" class="btn btn-primary" target="_blank">Print</a>
			<?php
				//echo "<a href='index.php?page=1'>First Page</a>";
}				
}				
			?>
		
            
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
$(document).ready(function(){
$("select#drop1").change(function(){

	var country_id =  $("select#drop1 option:selected").attr('value'); 
// alert(country_id);	
	$("#branchname").html( "" );
	$("#accountno").html( "" );
	if (country_id.length > 0 ) { 
		
	 $.ajax({
			type: "POST",
			url: "fetch_branchname.php",
			data: "country_id="+country_id,
			cache: false,
			beforeSend: function () { 
				$('#branchname').html('<img src="loader.gif" alt="" width="24" height="24">');
			},
			success: function(html) {    
				$("#branchname").html( html );
			}
		});
	} 
});
});
</script>
  </body>
</html>
