<?php if(isset($_POST['month_statistics_year']) && $_POST['month_statistics_year']!= "" ) {
	header('location:../../view/management/management_statistics_mothly.php?year='.$_POST['month_statistics_year']."&type=statistics#statistics");
}else{
	header('location:../../view/management/management_statistics_mothly.php');
}

?>