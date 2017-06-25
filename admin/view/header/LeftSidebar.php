     <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li id="clist" class="active"><a href="../customer/list.php"><span>Customer Management</span></a></li>
		<li id="tlist"><a href="../tutorial/tutorial_usage_history.php"><span>Tutorial Usage History</span></a></li>
		<li id="plist"><a href="../product/list.php"><span>Product Management</span></a></li>
        <li class="treeview" id="servicelist">
          <a href="#">
             <span>Service Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active" id="chmlist"><a href="../contract_history/list.php"><i class="fa fa-circle"></i> Contract History Management</a></li>
            <li><a href="#"><i class="fa fa-circle"></i> Manage Usage History</a></li>
          </ul>
        </li>
       <!-- <li class="active" id="nlist"><a href="../notice/notice.php"><span>Notice</span></a></li>
        <li class="active"><a href="../notice/notice.php">Notice</a></li>
            <li><a href="faq.html">FAQ</a></li>-->
        <li class="treeview" id="nlist">
          <a href="#">
             <span>Notice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" >
            <li class="active" id="nlista"><a href="../notice/list.php"><i class="fa fa-circle"></i> Notice</a></li>
            <li><a href="../faq/list.php" id="flista"><i class="fa fa-circle"></i> FAQ</a></li>
          </ul>
        </li>	
        <li id="alist"><a href="../admng/admng.php"><span>Admin</span></a></li>	
      </ul>
    </section>
    <!-- /.sidebar -->
 