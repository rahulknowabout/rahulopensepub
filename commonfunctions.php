<?php define("PERPAGE_LIMIT",30); 
function pagination($count, $href,$searcharray=array()) {
	//echo "hello";die;
if (is_array($searcharray) && count($searcharray)>0){
	$i =1;
	foreach($searcharray as $key => $value ) {
		$searchRequest .= "&".$key."=".$value."";
		if ($i == 1 ){
			$startSearchRequest = "".$key."=".$value."";
		}else {
			$startSearchRequest .= "&".$key."=".$value."";
		}
		$i++;
	}
	//echo $searchRequest;die;
$output = '';
if(!isset($_REQUEST["pageNumber"])) $_REQUEST["pageNumber"] = 1;
if(PERPAGE_LIMIT != 0)
$pages  = ceil($count/PERPAGE_LIMIT);
if($pages>1) {
	//$output = $output . '<li><a href="list.php?'.$startSearchRequest.'" class="">start</a></li>';
if(($_REQUEST["pageNumber"]-1)>0) {
$output = $output . '<li class="page-item"><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]-1).''.$searchRequest.'"  class="page-link">&laquo;</a></li>';
}else {
	$output = $output . '<li class="page-item"><a href="#" class="page-link">&laquo;</a></li>';
}
if(($_REQUEST["pageNumber"]-3)>0) {
$output = $output . '<li class="page-item"><a href="' . $href . 'pageNumber=1'.$searchRequest.'" class="page-link">1</a></li>';
}
/*
if(($_REQUEST["pageNumber"]-3)>1) {
$output = $output . '<li><a href="#">...</a></li>';
}*/

//Loop for provides links for 2 pages before and after current page
for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)	{
if($i<1) continue;
if($i>$pages) break;
if($_REQUEST["pageNumber"] == $i)
$output = $output . '<li id='.$i.' class="page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
else				
$output = $output . '<li class="page-item"><a href="' . $href . "pageNumber=".$i . ''.$searchRequest.'" class="page-link">'.$i.'</a></li>';
}

//if pages exists after loop's upper limit
if(($pages-($_REQUEST["pageNumber"]+2))>1) {
$output = $output . '<li class="page-item"><a href="#" class="page-link">...</a></li>';
}
if(($pages-($_REQUEST["pageNumber"]+2))>0) {
if($_REQUEST["pageNumber"] == $pages)
$output = $output . '<li id=' . ($pages) .' class="page-item">' . ($pages) .'</li>';
else				
$output = $output . '<li class="page-item"><a href="' . $href .  "pageNumber=" .($pages) .''.$searchRequest.'" class="page-link">' . ($pages) .'</a></li>';
}
if ($_REQUEST["pageNumber"] >= $pages) {
	$output = $output . '<li class="page-item"><a href="#" class="page-link">&raquo;</a></li>';
}else{
	$output = $output . '<li class="page-item"><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]+1).''.$searchRequest.'"  class="page-link">&raquo;</a></li>';
}
//$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .''.$searchRequest.'"  class="">Last</a></li>';
}

return $output;
}else {
 
$output = '';
if(!isset($_REQUEST["pageNumber"])) $_REQUEST["pageNumber"] = 1;
if(PERPAGE_LIMIT != 0)
$pages  = ceil($count/PERPAGE_LIMIT);


//if pages exists after loop's lower limit
if($pages>1) {
	//$output = $output . '<li><a href="list.php" class="">start</a></li>';
if(($_REQUEST["pageNumber"]-1)>0) {
$output = $output . '<li class="page-item"><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]-1).'"  class="page-link">&laquo;</a></li>';
}else {
	$output = $output . '<li class="page-item"><a href="#" class="page-link">&laquo;</a></li>';
}
if(($_REQUEST["pageNumber"]-3)>0) {
$output = $output . '<li class="page-item"><a href="' . $href . 'pageNumber=1" class="page-link">1</a></li>';
}
/*
if(($_REQUEST["pageNumber"]-3)>1) {
$output = $output . '<li><a href="#">...</a></li>';
}*/

//Loop for provides links for 2 pages before and after current page
for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)	{
if($i<1) continue;
if($i>$pages) break;
if($_REQUEST["pageNumber"] == $i)
$output = $output . '<li id='.$i.' class="page-item active"><a href="#" class="class="page-link"">'.$i.'</a></li>';
else				
$output = $output . '<li class="page-item" ><a href="' . $href . "pageNumber=".$i . '" class="page-link">'.$i.'</a></li>';
}

//if pages exists after loop's upper limit
if(($pages-($_REQUEST["pageNumber"]+2))>1) {
$output = $output . '<li><a href="#">...</a></li>';
}
if(($pages-($_REQUEST["pageNumber"]+2))>0) {
if($_REQUEST["pageNumber"] == $pages)
$output = $output . '<li id=' . ($pages) .' class="page-item">' . ($pages) .'</li>';
else				
$output = $output . '<li class="page-item"><a href="' . $href .  "pageNumber=" .($pages) .'" class="page-link">' . ($pages) .'</a></li>';
}
if ($_REQUEST["pageNumber"] >= $pages) {
	$output = $output . '<li class="page-item"><a href="#" class="page-link">&raquo;</a></li>';
}else{
	$output = $output . '<li class="page-item"><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]+1).'"  class="page-link">&raquo;</a></li>';
}
//$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .'"  class="">Last</a></li>';
}

return $output;
}

}

 function DeviceInfo($base_url,$api_key) {
$ch = curl_init($base_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:'.$api_key,                                                                         
    'Content-Type: application/json'                                                                               
    )                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
if(curl_errno($ch))
{
    echo 'Curl error: ' . curl_error($ch); die;
}
return $result;
}
function singleCustomerInfobyEmail($user_email){
	$SQL = "Select * from opens_user where user_email ='".$user_email."' ";
	//echo $SQL;die;
	$res =  MySQL::query($SQL,true);
	return $res;
	}

function SampleInfo($base_url,$api_key) {
$ch = curl_init($base_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
	'x-api-key:'.$api_key,                                                                         
    'Content-Type: application/json'                                                                               
    )                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
if(curl_errno($ch))
{
    echo 'Curl error: ' . curl_error($ch); die;
}
return $result;
}
function addTutorialHistory($postarray){
	$SQL = "INSERT INTO `opens_tutorial` (`tutorial_file_name`,`tutorial_file_type`,`tutorial_start_date`, `tutorial_end_date`, `user_id`)
               VALUES ( '".$postarray['tutorial_file_name']."' , '".$postarray['tutorial_file_type']."', '".$postarray['tutorial_start_date']."', '".$postarray['tutorial_end_date']."', '".$postarray['user_id']."');";
			   //echo $SQL;
    MySQL::query($SQL);
		//die;
	
	}
	
function updateTutorialHistory($postarray){
	$SQL = "update `opens_tutorial` set tutorial_start_date = '".$postarray['tutorial_start_date']."',tutorial_end_date = '".$postarray['tutorial_end_date']."'
	where tutorial_file_name='".$postarray['tutorial_file_name']."' AND tutorial_file_type='".$postarray['tutorial_file_type']."' AND user_id='".$postarray['user_id']."'";
			  // echo $SQL;
    MySQL::query($SQL);
		//die;
	
	}
	function selectTutorialHistory($postarray){
	$SQL = "select count(*) as  tutorial_history  from `opens_tutorial` where tutorial_file_name='".$postarray['tutorial_file_name']."' AND tutorial_file_type='".$postarray['tutorial_file_type']."' AND user_id='".$postarray['user_id']."' LIMIT 1";
			 //  echo $SQL; die;
   $res =  MySQL::query($SQL,true);
   return $res;
		//die;
	
	}
function selectTutorialHistoryByUserid($user_id,$limitstart,$limitend) {
if (isset($limitstart) && $limitstart!='' && $limitstart>0){}else{$limitstart=0; }
if (isset($limitend) && $limitend!='' && $limitend>0){}else{$limitend=30; }
	$SQL = "select *  from `opens_tutorial` where  user_id='".$user_id."' ORDER BY UNIX_TIMESTAMP(tutorial_start_date) DESC LIMIT ".$limitstart.",".$limitend." ";
			  //echo $SQL; die;
   $res =  MySQL::query($SQL);
   return $res;
		//die;
}
function selectCountTutorialHistoryByUserid($user_id) {
	$SQL = "select count(*) as  tutorial_history from `opens_tutorial` where  user_id='".$user_id."'";
			 //  echo $SQL; die;
	$res =  MySQL::query($SQL,true);
   return $res;
		//die;
	
	}


	
//print_r(json_decode(DeviceInfo("http://v2.opensdrm.net/epubdrmpackager/users/test.ani@gmail.com/devices","TEST40aa-eb1a-441c-8161-89f99074a02d"),true));die;
