<?php
session_start();
$previllage=$_SESSION['usertype'];
$suid=$_SESSION['userid'];
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


		  if(isset($_GET['action'])){
		  $action=$_GET['action'];
		  if($action=='delete')
		  {
			  $del_id=$_GET['delid'];
			  $type=$_GET['type'];
			  ?>
              <div class="panel panel-success">
<div class="panel-heading">ARE YOU SURE YOU WANT TO DELETE VOUCHER WITH ID: <?PHP print $del_id;?> AND TYPE: <?PHP print $type;?> </div>
  <div class="panel-body">
    <a class="btn btn-info" href="show_entry.php">CANCEL</a>&nbsp;<a class="btn btn-success" href="show_entry.php?delid=<?php echo $del_id; ?>&action=<?php echo 'confirm'; ?>&type=<?PHP print $type;?>">CONFIRM</a>
  </div>
</div>
		    
            <?PHP
		  }
		  if($action=='confirm')
		  {
			  if (!empty($_GET['delid'])) {
						   $del_id=$_GET['delid'];
						   $type=$_GET['type'];
						   $backup_query="insert into backup_entryitems(entry_id,ledger_id,amount,dc,created_by) select entry_id,ledger_id,amount,dc,created_by from entryitems where entryitems.entry_id=$del_id and entryitems.entrytype_id=$type" ;
						   //$db->query($backup_query);
						   $up_query="update backup_entryitems set deleted_by='$suid'  where entry_id=$del_id";
						   $db->query($up_query);
						   $del_query="delete from entryitems where entry_id=$del_id and entryitems.entrytype_id=$type"; 
			               $db->query($del_query);
						    $backup_query="insert into        backup_entries(id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile,created_by) select   id,entrytype_id,number,date,dr_total,cr_total,narration,paymentmode,bank,cheque,mobile,created_by from entries where entries.id=$del_id "; 
							$db->query($backup_query);
							 $up_query="update backup_entries set deleted_by='$suid'  where id=$del_id";
						   $db->query($up_query);
						   			   $del_query="delete from entries where id=$del_id and entrytype_id=$type"; 
			               $db->query($del_query);
		  }
		 

		  
		  ?>
          <div class="panel panel-danger" >
<div class="panel-heading">Voucher Deleted</div>
  <div class="panel-body">
    
  </div>
</div>
<?PHP
		  }
		  }
if(isset($_POST['vouchertype']))
{
$hidvouchertype=$_POST['hidvouchertype'];
//print $hidvouchertype;

if($hidvouchertype==0)
{
$select = $db->query("SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id ORDER BY e.id DESC");
}
else
{
$select = $db->query("SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id and e.entrytype_id=$hidvouchertype ORDER BY e.id DESC");
}
///$sql12="SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id and e.entrytype_id=$vouchertype ORDER BY e.id DESC";
//print $vouchertype;
}
else
{
$select = $db->query("SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id ORDER BY e.id DESC");
}

?>

		
    
	<script type="text/javascript">
function fnshow()
{
document.form1.hidvouchertype.value=document.form1.vouchertype.value;
document.form1.action='show_entry.php';
document.form1.submit();
}
function fnshow2()
{
document.form1.hidvouchertype.value=document.form1.vouchertypeentry.value;
document.form1.action='addentry.php';
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
            <div class=" bg-aqua-gradient">
			<table class="table table-bordered">
            <tr>
              <td>
			<?PHP $quer_type=$db->query("SELECT id ,name from entrytypes order by id desc"); ?>
			<strong>ADD V O U C H E R ENTRIES</strong></td>
            </tr>
            <tr>
            <td>
			  <select id="voucherentry" name="vouchertypeentry" class="form-control" onChange="fnshow2();">
			    <option value=0>All</option>
                <?php while ($row_type = $quer_type->fetch_object()) {
					?>
			    
			        <option value="<?php echo $row_type->id;?>" ><?php echo $row_type->name;?></option>
	              <?php }// 
				  //<a href="addentry.php?id=<?php echo $row_type->id; ">
				  ?>
		      </select></td></tr>
			  <tr>
			    <td>
			SHOW YOUR VOUCHER
			  <select id="VOUCHERTYPE" name="vouchertype" onChange="fnshow();" class="form-control">
			  <?PHP $quer_type=$db->query("SELECT id ,name from entrytypes order by id desc"); ?>
			    <option value=0 >All</option>
                <?php while ($row_type = $quer_type->fetch_object()) {
					?>
			    
			        <option <?php if ($hidvouchertype == $row_type->id) echo 'selected'; ?> value="<?php echo $row_type->id;?>" ><?php echo $row_type->name;?></option>
	              <?php } ?>
		      </select>
			  </td></tr></table></div>
			  <?php
			if (!$select->num_rows) {
				echo '<p>', 'No records', '</p>';
			}else{
				(isset($_GET['page'])) ? $page = $_GET['page'] : $page = 1;

				$num_of_records_per_page = 10;
				$total_records = $select->num_rows;

				$start = ($page - 1) * $num_of_records_per_page;
				$total_pages = ceil($total_records / $num_of_records_per_page);

				if ($page > $total_pages) {
					$page = $total_pages;
				}
				if ($page < 1) {
					$page = 1;
				}
if(isset($_POST['vouchertype']))
{
//$hidval1=$_POST['hidval1'];
//print '*'.$vouchertype.'*';
if($hidvouchertype==0)
{

				$query = $db->query( "SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id   ORDER BY e.id DESC ");
				}
else
{
				$query = $db->query("SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id  and e.entrytype_id=$hidvouchertype ORDER BY e.id DESC ");

}
}
else
{
				$query = $db->query( "SELECT e.*,t.name as tname FROM entries e, entrytypes t where e.entrytype_id=t.id   ORDER BY e.id DESC ");

}				
//$result02=mysql_query($con,$query02);	//print '*'.$vouchertype.'*';		?>
			<div class="table-responsive">
			<table class="table table-bordered" id="chartofaccount">
				<thead>
					<tr>
						<th>Date</th>
						<th>Voucher No</th>
						
						<th>Type</th>
						<th>Tag</th>
						<th>Debit Amount</th>
						<th>Credit Amount</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
					
					while ($row = $query->fetch_object()) {
					$id=$row->id;
					$sql2="select l.name,m.dc FROM entries e, entryitems m, ledgers l where e.id=$id and e.id=m.entry_id and m.ledger_id=l.id order by e.id DESC ";
					//print $sql2;
					$result=mysqli_query($con,$sql2);
					$tag_id='';
					
					while ($row2 = mysqli_fetch_row($result)) {
					$tag_id .=$row2[0].'/'.$row2[1].' ';
					}
					?>
				<tr>
						<td><?php echo $row->date;?></td>
						<td><?php echo $row->id;?></td>
						
						<td><?php echo $row->tname;?></td>
						<td><?php '-';?></td>
						<td><?php echo $row->dr_total;?></td>
						<td><?php echo $row->cr_total;?></td>
						<td><a class="btn btn-info" onclick="centeredPopup('report_voucher.php?id=<?php echo  $row->id; ?>&type=<?php echo  $row->tname; ?>','myWindow','700','700','yes');return false" align="middle">RECEIPT</a>&nbsp;<?PHP if ($previllage==0){?><a class="btn btn-success" href="updateentry.php?id=<?php echo $row->id; ?>&type=<?php echo $row->entrytype_id; ?>">UPDATE</a>&nbsp;<a class="btn btn-danger" href="show_entry.php?delid=<?php echo $row->id; ?>&action=<?php echo 'delete'; ?>&type=<?php echo $row->entrytype_id; ?>">DELETE</a><?PHP }?></td>
				  </tr>
				
			<?php
			}
			}
			?>
			</tbody>
			</table>
			</div>
			
		
		</form>
            
            <!-- form body End-->
            </div><!-- /.box-body -->
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
