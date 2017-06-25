<?php
require_once("../../config.php");
require_once("../../functions.php");
require_once("../../new_functions.php");

/* Fetch Tutorial History    */
function selectTutorialHistory($limitstart,$limitend) {
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
	if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	$SQL = "select ot.*,ou.user_name,ou.user_email,ou.user_level from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id   ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC LIMIT ".$limitstart.",".$limitend." ";
			  //echo $SQL; die;
   $res =  MySQL::query($SQL);
   return $res;
		//die;
}
/* Count Tutorial History    */
function selectCountTutorialHistory() {
	$SQL = "select count(*) as  tutorial_history from `opens_tutorial`";
			 //  echo $SQL; die;
	$res =  MySQL::query($SQL,true);
   return $res;
		//die;
	
}
function todayTutorial() {
$SQL = "SELECT count(*) as today_tutorial FROM opens_tutorial  WHERE STR_TO_DATE(tutorial_start_date,'%Y-%m-%d')  > DATE_SUB(NOW(),INTERVAL 1 DAY)";  
$result = MySQL::query($SQL,true);
return $result;
	
}
function todayTutorialUser() {
$SQL = "SELECT count(DISTINCT user_id) as today_tutorial FROM opens_tutorial  WHERE STR_TO_DATE(tutorial_start_date,'%Y-%m-%d')  > DATE_SUB(NOW(),INTERVAL 1 DAY)";  
$result = MySQL::query($SQL,true);
return $result;
	
}

/**  Serach Contract History **/
function contractHistorySearch($contract_start_date,$contract_end_date,$search_category,$serach_name,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
			if ($search_category == 'userid') {
					if ($serach_name != "" ){
				$SQL = "Select ot.*,ou.user_name,ou.user_email,ou.user_level from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."' AND ot.user_id like '%".$serach_name."%'  ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";
					}else {
						$SQL = "Select ot.*,ou.user_name,ou.user_email,ou.user_level from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."'  ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";

					}
			}else {
				if ($serach_name != "" ){
			$SQL = "Select ot.*,ou.user_name,ou.user_email,ou.user_level from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."' AND ou.user_email like '%".$serach_name."%'  ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";
				}else {
					$SQL = "Select ot.*,ou.user_name,ou.user_email,ou.user_level from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."' ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";
				}
			}
			//echo $SQL;die;
			
		$res =  MySQL::query($SQL);
		return $res;

}
function contractHistorySearchCount($contract_start_date,$contract_end_date,$search_category,$serach_name,$limitstart,$limitend){
	if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	
			if ($search_category == 'userid') {
					if ($serach_name != "" ){
				$SQL = "Select count(*) as  tutorial_history from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."' AND ot.user_id like '%".$serach_name."%'  ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";
					}else {
						$SQL = "Select count(*) as  tutorial_history from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."'  ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";

					}
			}else {
				if ($serach_name != "" ){
			$SQL = "Select count(*) as  tutorial_history from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."' AND ou.user_email like '%".$serach_name."%'  ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";
				}else {
					$SQL = "Select count(*) as  tutorial_history from `opens_tutorial` as ot INNER JOIN opens_user as ou on ot.user_id = ou.api_user_id where STR_TO_DATE(ot.tutorial_start_date, '%Y-%m-%d') >= '".$contract_start_date."' AND STR_TO_DATE(ot.tutorial_end_date, '%Y-%m-%d') <= '".$contract_end_date."' ORDER BY UNIX_TIMESTAMP(ot.tutorial_start_date) DESC Limit ".$limitstart.",".$limitend." ;";
				}
			}
		
		$res =  MySQL::query($SQL,true);
		return $res;

}
?>