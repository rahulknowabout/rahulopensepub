<?php include_once("../../config.php");
include_once("../../functions.php");
include_once("../../new_functions.php");//print_r(get_included_files());
function singleCustomerbyEmailHeader($user_email){
	$SQL = "Select * from opens_user where user_email ='".$user_email."'";
	$res =  MySQL::query($SQL,true);
	return $res;
}
if(isset($_COOKIE['member_login']) && $_COOKIE['member_login']!= "" && isset($_COOKIE['member_password']) && $_COOKIE['member_password']!= "" ) {
	$user_info = singleCustomerbyEmailHeader($_COOKIE['member_login']);
	
	
} else if(isset($_SESSION['member_login']) && $_SESSION['member_login']!= "" && isset($_SESSION['member_password']) && $_SESSION['member_password']!= "") {
	$user_info = singleCustomerbyEmailHeader($_SESSION['member_login']);
	
}if(isset($user_info) && is_array($user_info) && count($user_info)>0){
	if ($user_info['user_level'] == 2 || $user_info['user_level'] == 3 ) {
		$download = 1;
	}else{
		$download = 0;
	}
}else{
	$download = 0;
}
?>
 <!-- style="color:#333!important" -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="../../index.php"><img src="../../images/logo.png" alt="" title="" /> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav pull-right">
                <li><a href="../product/product.php">Product</a></li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tutorials <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../tutorial/tutorials.php">Tutorials</a></li>
                        <li><a href="../tutorial/tutorial_history.php">History</a></li>
                    </ul>
                </li>
                <li><?php if ($download == 1 ) { ?><a href="../download/download.php">Downloads</a><?php }else { ?><a href="#">Downloads</a><?php } ?></li>
                <li><?php if ($download == 1 ) { ?><a href="../management/management.php">Management</a><?php }else { ?><a href="#">Management</a><?php } ?></li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notice
 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../notice/notice.php">Notice</a></li>
                        <li><a href="../faq/faq.php">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
