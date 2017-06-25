<?php session_start();
if(isset($_SESSION['filedownload']) && $_SESSION['filedownload'] == 1 ) {
			$_SESSION['filedownload'] = 2;
			echo 1;die;
			
}else {
	echo 0;die;
}
//echo "<pre>";print_r($_REQUEST);die;
?>