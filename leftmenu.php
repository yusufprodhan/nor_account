<?php
//session_start();
$previllage = $_SESSION['usertype'];
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="home.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
        </ul>
    </li>
    <?PHP if ($previllage < 2) { ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Account Related</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="chart_of_account.php"><i class="fa fa-circle-o"></i> Accounts</a></li>
            </ul>
            <ul class="treeview-menu">
                <li><a href="update_ledger.php"><i class="fa fa-circle-o"></i> Update Ledger</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>DPS</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="create_dps.php"><i class="fa fa-circle-o"></i> Create DPS</a></li>
                <li><a href="edit_dps.php"><i class="fa fa-circle-o"></i> Edit DPS</a></li>
                <li><a href="delete_dps.php"><i class="fa fa-circle-o"></i>Delete DPS</a></li>
            </ul>
        </li>
    <?PHP } if ($previllage < 3) { ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Account Transaction</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="create_member.php"><i class="fa fa-circle-o"></i> Create Member</a></li>
                <li><a href="edit_member.php"><i class="fa fa-circle-o"></i> Update Member</a></li>
                <li><a href="delete_member.php"><i class="fa fa-circle-o"></i> Delete Member</a></li>
                <li><a href="create_dps.php"><i class="fa fa-circle-o"></i> Create DPS</a></li>
                <li><a href="create_truck.php"><i class="fa fa-circle-o"></i> Asssign Truck</a></li>
                <li><a href="edit_truck.php"><i class="fa fa-circle-o"></i> Update Truck</a></li>
                <li><a href="delete_truck.php"><i class="fa fa-circle-o"></i> Delete Truck</a></li>
                <li><a href="addentrypaymentoftruck.php"><i class="fa fa-circle-o"></i> Add Truck Member</a></li>
                <li><a href="addentrypaymentoftrucknonmember.php"><i class="fa fa-circle-o"></i> Add Truck Non Member</a></li>
                <li><a href="show_entry.php"><i class="fa fa-circle-o"></i> Entries</a></li>
                <li><a href="sales_integration.php"><i class="fa fa-circle-o"></i> Approve</a></li>
                <li><a href="cheque_search.php"><i class="fa fa-circle-o"></i> Cheque Management</a></li>
            </ul>
        </li>
    <?PHP } ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Account Reports</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="journal_entries.php"><i class="fa fa-circle-o"></i>Journal Entries</a></li>
            <li><a href="journal_statement.php"><i class="fa fa-circle-o"></i>Ledgerwise Journal Statement</a></li>

            <li><a href="group_statement.php"><i class="fa fa-circle-o"></i>Group Statement</a></li>
            <li><a href="profit_loss_init.php"><i class="fa fa-circle-o"></i>Profit and Loss Account</a></li>
            <li><a href="trialbal.php"><i class="fa fa-circle-o"></i>Trial Balance</a></li>
            <li><a href="balance_init.php"><i class="fa fa-circle-o"></i>Balance Sheet</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Voucher Entry</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="addentry.php?vouchertypeentry=2"><i class="fa fa-circle-o"></i> Payment Voucher</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="addentry.php?vouchertypeentry=1"><i class="fa fa-circle-o"></i> Receive Voucher </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="addentry.php?vouchertypeentry=4"><i class="fa fa-circle-o"></i> Journal Voucher</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="addentry.php?vouchertypeentry=3"><i class="fa fa-circle-o"></i> Contra Voucher</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="addentrypaymentoftruck.php"><i class="fa fa-circle-o"></i> Member Truck Voucher </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="addentrypaymentoftrucknonmember.php"><i class="fa fa-circle-o"></i> Non Member Truck Voucher </a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Truck Report</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="member_truck_report.php"><i class="fa fa-circle-o"></i> Truck Member Report</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="truck_statement_details_report_memberwise.php"><i class="fa fa-circle-o"></i> Truck Statement Memberwise</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="truck_statement_details_report_daterange.php"><i class="fa fa-circle-o"></i> Truck Statement Details</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="truck_income_statement_report_daterange.php"><i class="fa fa-circle-o"></i> Truck Income Statement </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="truck__report_memberwise_daterange.php"><i class="fa fa-circle-o"></i> Truck Statement Memberwise </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="truck__report_nonmemberwise_daterange.php"><i class="fa fa-circle-o"></i> Truck Statement Non Memberwise </a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Transaction Report</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="Income_statement_details_report_daterange.php"><i class="fa fa-circle-o"></i> Income Statement Details</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="Income_statement_monthly_report_daterange.php"><i class="fa fa-circle-o"></i>Income Statement (Monthly) </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="Cash_statement_monthly_report_daterange.php"><i class="fa fa-circle-o"></i> Cash Statement  </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="Bank_statement_monthly_report_daterange.php"><i class="fa fa-circle-o"></i> Bank Statement </a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="Cash_Bank_statement_monthly_report_daterange.php"><i class="fa fa-circle-o"></i> Cash and Bank Statement</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="At a glance_monthly_report_daterange.php"><i class="fa fa-circle-o"></i> At a glance Statement</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="change_password.php"><i class="fa fa-circle-o"></i> Member List</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="DPS_report_daterange.php"><i class="fa fa-circle-o"></i> DPS Report</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="Bonus_report_daterange.php"><i class="fa fa-circle-o"></i> Bonus Report</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="Monthly_fee_report_daterange.php"><i class="fa fa-circle-o"></i> Member Monthly Fee Report</a></li>
        </ul>
        <ul class="treeview-menu">
            <li><a href="expense_statement.php"><i class="fa fa-circle-o"></i> Expense Report</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>User Utilities</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="change_password.php"><i class="fa fa-circle-o"></i> Change Password</a></li>
        </ul>
        <?PHP if ($previllage < 1) { ?>
            <ul class="treeview-menu">
                <li><a href="bank_create.php"><i class="fa fa-circle-o"></i> Create Bank</a></li>
                <li><a href="create_user.php"><i class="fa fa-circle-o"></i> Create User</a></li>
            </ul>
        <?PHP } ?>
    </li>
</ul>
</section>
<!-- /.sidebar -->
</aside>