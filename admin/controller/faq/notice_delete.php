<?php  //echo "<pre>";print_r($_GET);die;
include('../../modal/faq/notice.php');
if(isset($_GET['notice_id']) && $_GET['notice_id']!= "") {
noticeDelete($_GET['notice_id']);
}
header("location: ../../view/faq/list.php"); 
?>