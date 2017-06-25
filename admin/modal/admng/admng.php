<?php require_once("../../config.php");
      require_once("../../functions.php");
      require_once("../../new_functions.php");
//print_r($dblink);die;
function selectAdmin(){
	//echo "hello";die;
$SQL = "Select * from opens_admin where admin_table_id=1";
			   //echo $SQL; die;
      $res =  MySQL::query($SQL,true);
	  //echo "<pre>";
	 //print_r($res);
	  //die;
	  return $res;
}

function updateAdmin($postarray=array()){
	
$SQL = "update opens_admin set admin_id='".$postarray['admin_id']."',admin_password='".$postarray['admin_password']."' where admin_table_id=1";
$res =  MySQL::query($SQL,true,$dblink);
//return $res;
}
//$result =selectAdmin();
//echo "<pre>";
//print_r($result);
//die;
?>