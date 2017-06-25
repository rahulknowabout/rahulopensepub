<?php if(isset($_POST['daily_statistics_year']) && $_POST['daily_statistics_year']!= "" && isset($_POST['month']) && $_POST['month']!= "") {
	header('location:../../view/management/management.php?year='.$_POST['daily_statistics_year'].'&month='.$_POST['month'].'&type=statistics#statistics');
}else{
	header('location:../../view/management/management.php');
}

?>