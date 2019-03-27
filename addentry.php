<?php
session_start();
$_SESSION['storeDate']='';
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
		  include 'leftmenu.php';
		  require 'db/connect.php';
		  ?>   
          <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Hili Truck Malik Group Accounting
            <small>Software</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="row">
        <div class="col-md-12">
		<div class="box box-primary">
        <div class="box-body">
                <?PHP
			 
			$type=0;
			if((isset($_GET['hid']))||(isset($_GET['type'])))
			{
				if(isset($_GET['hid'])){$type=$_GET['hid'];}
				
				if (isset($_GET['type'])) {$type=$_GET['type'];}
				 $sql=$db->query("select name from entrytypes where id=$type");
				$row = $sql->fetch_object();
				$type_name=$row->name;
			    echo"<script>document.form1.hid.value='$type';</script>";?> 
                  <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type_name?></span>&nbsp;Form</h3>
                </div>
				<?PHP
                }
                            
                if (isset($_POST['vouchertypeentry'])) {
                $type=$_POST['vouchertypeentry'];
                //print $type;
                $sql=$db->query("select name from entrytypes where id=$type");
                $row = $sql->fetch_object();
                $type_name=$row->name;
                echo"<script>document.form1.hid.value='$type';</script>";?> 
                                <div class="box-header with-border">
                                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type_name?> &nbsp;Form</h3>
                                </div>
                <?PHP
                }
				else if (isset($_GET['vouchertypeentry'])) {
                $type=$_GET['vouchertypeentry'];
                //print $type;
                $sql=$db->query("select name from entrytypes where id=$type");
                $row = $sql->fetch_object();
                $type_name=$row->name;
                echo"<script>document.form1.hid.value='$type';</script>";?> 
                                <div class="box-header with-border">
                                  <h3 class="box-title"><span class="fa fa-th"> <?PHP echo $type_name?> &nbsp;Form</h3>
                                </div>
                <?PHP
                }
				?>
                
          <!--Form Submission affect-->
          <?PHP
                          if (isset($_GET['id'])){$id=$_GET['id'];}
                          if (!empty($_GET['did'])) {
						   $del_id=$_GET['did'];
					if(isset($_GET['hid'])){$type=$_GET['hid'];}
				
				if (isset($_GET['type'])) {$type=$_GET['type'];}
				
						   $del_query="delete from entryitems where id=$del_id and entrytype_id=$type"; 
			               $db->query($del_query);
	 					   ?>
      
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Warning!</strong> One Row Deleted.
                          </div>
					<?php	
		  }
						if (!empty($_GET['cid'])) {
						   $del_id=$_GET['cid'];
				   if(isset($_GET['hid'])){$type=$_GET['hid'];}
				
				if (isset($_GET['type'])) {$type=$_GET['type'];}
				
						   $del_query="delete from entryitems where id=$del_id and entrytype_id=$type"; 
			               $db->query($del_query);
	 					   ?>
      
                          <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Warning!</strong> One Row Deleted.
                         </div>
					<?php
						}	
            if (isset($_POST['debit_add'])){
		      if($_POST['debit_add']=='Add Debit'){
				  $txtnumber 		= $_POST['txtnumber'];
				  $txtdate 	= $_POST['txtdate'];
				  //$bank 		= $_POST['bank'];
					//$cheque 		= $_POST['cheque'];
					//$mobile 		= $_POST['mobile'];
					$debit_chart_id 	= $_POST['debit_chart_id'];
					$debit_amount 		= $_POST['debit_amount'];
					$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($txtnumber,$debit_chart_id,$debit_amount,'D')";
			  
			 // print $sql;
			  $result=mysqli_query($con,$sql);
								  }
										}
										
										
	if (isset($_POST['credit_add'])){	      if($_POST['credit_add']=='Add Credit'){
				  $txtnumber 		= $_POST['txtnumber'];
				  $txtdate 	= $_POST['txtdate'];
				  $bank 		= $_POST['bank'];
					$cheque 		= $_POST['cheque'];
					$mobile 		= $_POST['mobile'];
					$credit_chart_id 	= $_POST['credit_chart_id'];
					$credit_amount 		= $_POST['credit_amount'];
					$sql="insert into entryitems(entry_id,ledger_id,amount,dc)values($txtnumber,$credit_chart_id,$credit_amount,'C')";
			  
			  //print $sql;
			  $result=mysqli_query($con,$sql);
			  				  }
										}
										
										?>
                   <!--Form Submission end-->                     
              <div class="box-body"><!-- voycher box body star-->
			       <!--form setup-->
                 <form class="form-horizontal" name="form1" method="post" action ="addsave.php">
                <input type="hidden" name="hdrtotal">
                <input type="hidden" name="hcrtotal">
                <input type="hidden" name="hidsql">
                <input type="hidden" name="hid" id= "hid" value="<?PHP echo $type;?>">
                <div class="form-group">
                <div class="col-md-2"><label for="inputEmail3" >Voucher No</label></div>
                <div class="col-md-2"><input type="text" name="txtnumber" id="txtnumber"  class="form-control" tabindex="1" readonly/></div>
                <div class="col-md-1"><label for="inputEmail3" >Date</label></div>
                <div class="col-md-3"><INPUT type="date" name="txtdate" id="txtdate" class="form-control" value="<?php echo date('Y-m-d'); ?>" tabindex="2" required>
                </div>
                <div class="col-md-1"><label for="inputEmail3" >Pay Mode</label></div>
                <div class="col-md-3">
                    <select  class="form-control" name="pmode" id="pmode" tabindex="3">
				    <?php $sql123="select id,paymentname  from paymentmode";$res1 = $db->query($sql123);?>
                    <?php while($row1 = $res1->fetch_row())  {
					?>
					
                 <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                 <?php } ?>
                 </select>
                 </div>
                
                </div>
                       <?php 
					   if($type==1){
						$sql=$db->query("select ifnull(max(id),0) as maxid from entries where entrytype_id=$type ");
						$row = $sql->fetch_object();
						$entr_id=$row->maxid;
						$sql2=$db->query("select ifnull(max(id),0) as maxid from entryitems where entrytype_id=$type ");
						$row2 = $sql2->fetch_object();
						$entr_id2=$row2->maxid;
						//print $entr_id;
						if($entr_id2==$entr_id)
						{
						  $tentry=$entr_id+1;
						}
						else if($entr_id2>$entr_id)
						{
						$sqlentr="select ifnull(max(entry_id),0) as maxid from entryitems e,truck_info t where t.id=e.truck_id and (t.mem_id   like 'mem%' or t.mem_id  like 'Non%') and  entrytype_id=$type";
						$res=mysqli_query($con,$sqlentr);
						$rowentr=mysqli_fetch_row($res);
						$entr_idd2=$rowentr[0];
						
	$sqlentr="select ifnull(max(entry_id),0) as maxid from entryitems e where e.truck_id=0 and e.entrytype_id=$type";
						$res=mysqli_query($con,$sqlentr);
						$rowentr=mysqli_fetch_row($res);
						$entr_idd3=$rowentr[0];
						if($entr_idd3>$entr_id)
						{
						$tentry=$entr_idd3;
						}
						else
						{
							if($entr_idd2>$entr_id)
							{
								$tentry=$entr_idd2+1;
								//print 'KKKK';	
							}
							else
							{
							$tentry=$entr_id+1;
							}
						}
						}
						print "<script>document.form1.txtnumber.value=$tentry;</script>";
					   }
					   else
					   {
						   $sql=$db->query("select ifnull(max(id),0)+1 as maxid from entries where entrytype_id=$type");
						$row = $sql->fetch_object();
						$entr_id=$row->maxid;
						//print $entr_id;
						print "<script>document.form1.txtnumber.value=$entr_id;</script>";
					   }
						
						?>
                 <!--disable div-->  
                
                 <!--disable div end-->
              <div class="form-group" >
              <div class="col-md-2"><label for="inputEmail3" >Cheque Info</label></div>
              <div class="col-md-3"><input type="text"  placeholder="Bank Name" name="bank" class="form-control col-xs-4" tabindex="4"></div>
              <div class="col-md-3"><input type="text" class="form-control col-xs-4" placeholder="Cheque No" name="cheque" tabindex="5"></div>
              <div class="col-md-2"> <INPUT type="date" name="txtchqdate" id="txtchqdate" class="form-control col-xs-2" tabindex="6"></div>
              <div class="col-md-2"><input type="text" class="form-control" placeholder="Mobile Number" name="mobile"  tabindex="7"></div>
              </div>    
               
         </div>  <!--box body end-->
         </div><!--box primary-->
         </div> <!--box col-md-12-->
         <div class="row">
               <!--DEBIT FORM SETUP-->
              <div class="col-md-12">
               <div class="col-md-6" align="right">
              <label for="name">Select Member:</label>
              </div>
               <div class="col-md-6"  align="left">
              <select name="transelect" id="transelect" class="form-control" data-placeholder="chart_id" > 
													<?php $sql=$db->query("select tran_type,tran_name from trantype");?>
                    <?php $sl1=1; while ($row = $sql->fetch_object()) { if($sl1==1){
					?>
					
                <option value="<?php echo $row->tran_type;?>" selected><?php echo $row->tran_name;?></option>
                <?php 
					}
					else
					{
?>
<option value="<?php echo $row->tran_type;?>"><?php echo $row->tran_name;?></option>
<?PHP }
				$sl1++;} ?>
												</select>
              </div>
              </div>
              </div>     
         </row><!--voucher head row-->     
               
              
               
               
               
               
               
               
               
               
               
               
               
               <div class="row">
               <!--DEBIT FORM SETUP-->
              <div class="col-md-12">
              <div class="box box-success box-solid">
              <div class="box-header with-border"><h3 class="box-title"><?PHP if($type<>1){?>Payment To<?PHP }else{ ?>To whom receipt is taken place<?PHP } ?></h3></div><!-- /.box-header -->
              <div class="box-body">
              <div class="form-group" >
              <div class="col-md-1"><label for="inputEmail3" >Head</label></div>
              <div class="col-md-3">
              <select name="debit_chart_id" id="debit_chart_id" class="form-control" tabindex="8">
				    <?php $sql=$db->query("select id,name from ledgers");?>
                    <?php while ($row = $sql->fetch_object()) {
					if(($row->id>74)&&($row->id<95)){
						$bankaccountno=trim($row->name);
						$sql2="select id,bankname,branchname,accountname from bankinfo where             accountno='$bankaccountno'";

  $bnkinfo="";
  $resultbnk=mysqli_query($con,$sql2);
  $rowbnk=mysqli_fetch_array($resultbnk);
  
 $bankid=$rowbnk['id'];
 $bankn=$rowbnk['bankname'];
 $branchn=$rowbnk['branchname'];
 $accountname=$rowbnk['accountname'];
 $bnkinfo=$bankn.'-'.$branchn.'-'.$bankaccountno;
  
					?>
				<option value="<?php echo $row->id;?>"><?php echo $bnkinfo;?></option>
                <?PHP
					}
					else
					{
				?>	
                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                <?php } } ?></select></div>
              </div>
              <div class="form-group">
            <div class="col-md-1"><label class="control-label" for="debit_amount">Des#</label></div>
			<div class="col-md-3">
			<input type="text" name="item_desc_dr" id="item_desc_dr" placeholder="description" class="form-control" value="" tabindex="9"/>
			</div>               
            </div>
            <div class="form-group">
            <div class="col-md-1"><label class="control-label" for="debit_amount">Amount</label></div>
			<div class="col-md-3">
			<input type="text" name="debit_amount" id="debit_amount" placeholder="00.00" class="form-control" value="" tabindex="10"/>
			</div>
			</div>
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-sm-12">
             <input type="submit" name="debit_add" id="debit_add" class="btn btn-success" value="Add Debit" tabindex="11"/>
            </div>
            </div>
          
            </div><!-- /.box  body-->
            </div><!-- /.box-success box-solid-->
            </div><!-- /.col-md-6-->
            <!--DEBIT FORM CLOSE-->
            
           
            <!--Credit FORM Start-->
              <div class="col-md-12">
              <div class="box box-warning box-solid">
              <div class="box-header with-border"><h3 class="box-title"><?PHP if($type<>2){?>Receipt From<?PHP }else{ ?>From whom payment is taken place<?PHP } ?></h3></div><!-- /.box-header -->
              <div class="box-body">
              <div class="form-group" >
              <div class="col-md-1"><label for="inputEmail3" >Head</label></div>
              <div class="col-md-3">
              <select name="credit_chart_id" id="credit_chart_id" class="form-control" tabindex="12">
				    <?php $sql=$db->query("select id,name from ledgers");?>
                    <?php while ($row = $sql->fetch_object()) {
					if(($row->id>74)&&($row->id<95)){
						$bankaccountno=trim($row->name);
						$sql2="select id,bankname,branchname,accountname from bankinfo where             accountno='$bankaccountno'";

  $bnkinfo="";
  $resultbnk=mysqli_query($con,$sql2);
  $rowbnk=mysqli_fetch_array($resultbnk);
  
 $bankid=$rowbnk['id'];
 $bankn=$rowbnk['bankname'];
 $branchn=$rowbnk['branchname'];
 $accountname=$rowbnk['accountname'];
 $bnkinfo=$bankn.'-'.$branchn.'-'.$bankaccountno;
  
					?>
				<option value="<?php echo $row->id;?>"><?php echo $bnkinfo;?></option>
                <?PHP
					}
					else
					{
				?>	
                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                <?php } } ?></select></div>
              </div>
              <div class="form-group">
            <div class="col-md-1"><label class="control-label" for="debit_amount">Des#</label></div>
			<div class="col-md-3">
			<input type="text" name="item_desc_cr" id="item_desc_cr" placeholder="description" class="form-control" value="" tabindex="13"/>
			</div>               
            </div>
            <div class="form-group">
            <div class="col-md-1"><label class="control-label" for="debit_amount">Amount</label></div>
			<div class="col-md-3">
			<input type="text" name="credit_amount" id="credit_amount" placeholder="00.00" class="form-control" value="" tabindex="14"/>
			</div>
			</div>
            
             <div class="form-group">
            <div class="col-sm-offset-4 col-sm-12">
             <input type="submit" name="credit_add" id="credit_add" class="btn btn-success" value="Add Credit" tabindex="15"/>
            </div>
            </div>
             
             
              </div><!-- /.box  body-->
            </div><!-- /.box-success box-solid-->
            </div><!-- /.col-md-6-->
            <!--Credit FORM CLOSE-->
               
                <!--End Form Setup-->
               <!-- TABLE: Debit Item information -->
              <div class="col-md-6">
              <div class="box box-success">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                     	<thead>
												<tr>
													<th class="center">Debit A/C Head</th>
													<th class="center">Amount</th>
													<th class="center">Memo</th>
													<th class="center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$debit_amount = 0;
												//foreach ($details as $list) {
													//if ($list['debit']) {
														
					if($type==1){
					$sql=$db->query("select m.id,l.name,m.amount,m.itemnarat from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$tentry and m.dc='D' and  m.truck_id=0 and m.entrytype_id=$type");
					}
					else
					{
														$sql=$db->query("select m.id,l.name,m.amount,m.itemnarat from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$entr_id and m.dc='D' and  m.truck_id=0 and m.entrytype_id=$type");
					}
														while ($row = $sql->fetch_object()) {
														?>
														<tr>
															<td id="<?PHP print 'name'.$row->id?>"><?php print $row->name; ?></td>
															<td class="center" id="<?PHP print 'amount'.$row->id?>"><?php  print $row->amount;//echo $list['debit']; ?></td>
															<td class="center"><?php echo $row->itemnarat; ?></td>
															<td class="center">
																<input type="hidden" value="<?php //echo $list['id']; ?>" /><a href="addentry.php?did=<?php echo $row->id;?>&type=<?php echo $type;?>"><span class="btn btn-danger debit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span></a>
															</td>
														</tr>
														<?php
														$debit_amount += $row->amount;
													}
													
	print "<script>document.form1.hdrtotal.value=$debit_amount;</script>";													
												//}
												?>
											</tbody>
											<tfoot>
												<tr>
													<th class="left" colspan="4">&nbsp;</th>
												</tr>
												<tr>
													<th colspan="2">Total </th>
													<th colspan="2" class="right" id="debit_total"><?php echo number_format($debit_amount, 2); ?></th>
												</tr>
											</tfoot>
                      
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                 <!-- End TABLE: Debit Item information -->
                 
                 <!-- TABLE: Credit Item information -->
              <div class="col-md-6">
              <div class="box box-warning">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                     <thead>
												<tr>
													<th class="center">Credit A/C Head</th>
													<th class="center">Amount</th>
													<th class="center">Memo</th>
													<th class="center">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$credit_amount = 0;
											//	foreach ($details as $list) {
												//	if ($list['credit']) {
						if($type==1){
							$sql=$db->query("select m.id,l.name,m.amount,m.itemnarat from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$tentry and m.dc='C' and  m.truck_id=0 and m.entrytype_id=$type");
												}else{
													$sql=$db->query("select m.id,l.name,m.amount,m.itemnarat from ledgers l, entryitems m where m.ledger_id=l.id and m.entry_id=$entr_id and m.dc='C' and  m.truck_id=0 and m.entrytype_id=$type");
												}
														while ($row = $sql->fetch_object()) {
														?>
														<tr>
															<td><?php print $row->name;//echo $list['chart_name']; ?></td>
															<td class="center"><?php  print $row->amount;//echo $list['credit']; ?></td>
															<td class="center"><?php echo $row->itemnarat; ?></td>
															<td class="center">
																<input type="hidden" value="<?php //echo $list['id']; ?>" /><a href="addentry.php?cid=<?php echo $row->id;?>&type=<?php echo $type;?>"><span class="btn btn-danger credit_voucher_delete"><i class="icon-trash icon-white"></i>Delete</span></a>
															</td>
														</tr>
														<?php
														$credit_amount += $row->amount;
													}
													
			print "<script>document.form1.hcrtotal.value=$credit_amount;</script>";										
												//}
												?>
											</tbody>
											<tfoot>
												<tr>
													<th class="left" colspan="4">&nbsp;</th>
												</tr>
												<tr>
													<th colspan="2">Total </th>
													<th colspan="2" class="right" id="credit_total"><?php echo number_format($credit_amount, 2); ?></th>
												</tr>
											</tfoot>
                      
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
 <!-- Final Jouranl Naration -->
                
                <!-- TABLE: Debit Item information -->
              <div class="col-md-12">
              <div class="box box-success">
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Narration</label>
                  <div class="col-md-10">
                   <INPUT type="text" name="txtnarration" id="txtnarration" class="form-control" tabindex="16"/>
                   </div>
                   </div>
                   <hr>
                 <div class="form-group"> 
                 <div class="col-sm-offset-2 col-md-5">
                  <input type="submit" name="complete" class="btn btn-lg btn-block btn-success" id="journal_complete" value="Complete Journal Entry" tabindex="17"/>
                 </div>
                 </div>
                 <div class="form-group"> 
                 <div class="col-md-5">
                 <a class="btn btn-lg btn-block btn-warning" href="show_entry.php">BACK </a>
                 </div>
                 </div>
                 
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
 <!-- Final Journal Narattion -->
                
                
                
                </div><!-- /.12row-end-->
           
           
           
            
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
