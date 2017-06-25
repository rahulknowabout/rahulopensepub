<?php define("PERPAGE_LIMIT",30);
/*function pagination($count, $href,$searcharray=array()) {
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
	$output = $output . '<li><a href="list.php?'.$startSearchRequest.'" class="">start</a></li>';
if(($_REQUEST["pageNumber"]-1)>0) {
$output = $output . '<li><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]-1).''.$searchRequest.'"  class="">&laquo;</a></li>';
}else {
	$output = $output . '<li><a href="#" class="">&laquo;</a></li>';
}
if(($_REQUEST["pageNumber"]-3)>0) {
$output = $output . '<li><a href="' . $href . 'pageNumber=1'.$searchRequest.'" class="">1</a></li>';
}
/*
if(($_REQUEST["pageNumber"]-3)>1) {
$output = $output . '<li><a href="#">...</a></li>';
}*/

//Loop for provides links for 2 pages before and after current page
/*for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)	{
if($i<1) continue;
if($i>$pages) break;
if($_REQUEST["pageNumber"] == $i)
$output = $output . '<li id='.$i.'><a href="#" class="active">'.$i.'</a></li>';
else				
$output = $output . '<li><a href="' . $href . "pageNumber=".$i . ''.$searchRequest.'" class="">'.$i.'</a></li>';
}

//if pages exists after loop's upper limit
if(($pages-($_REQUEST["pageNumber"]+2))>1) {
$output = $output . '<li><a href="#">...</a></li>';
}
if(($pages-($_REQUEST["pageNumber"]+2))>0) {
if($_REQUEST["pageNumber"] == $pages)
$output = $output . '<li id=' . ($pages) .' class="">' . ($pages) .'</li>';
else				
$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .''.$searchRequest.'" class="">' . ($pages) .'</a></li>';
}
if ($_REQUEST["pageNumber"] >= $pages) {
	$output = $output . '<li><a href="#" class="">&raquo;</a></li>';
}else{
	$output = $output . '<li><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]+1).''.$searchRequest.'"  class="">&raquo;</a></li>';
}
$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .''.$searchRequest.'"  class="">Last</a></li>';
}

return $output;
}else {
 
$output = '';
if(!isset($_REQUEST["pageNumber"])) $_REQUEST["pageNumber"] = 1;
if(PERPAGE_LIMIT != 0)
$pages  = ceil($count/PERPAGE_LIMIT);


//if pages exists after loop's lower limit
if($pages>1) {
	$output = $output . '<li><a href="list.php" class="">start</a></li>';
if(($_REQUEST["pageNumber"]-1)>0) {
$output = $output . '<li><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]-1).'"  class="">&laquo;</a></li>';
}else {
	$output = $output . '<li><a href="#" class="">&laquo;</a></li>';
}
if(($_REQUEST["pageNumber"]-3)>0) {
$output = $output . '<li><a href="' . $href . 'pageNumber=1" class="">1</a></li>';
}
/*
if(($_REQUEST["pageNumber"]-3)>1) {
$output = $output . '<li><a href="#">...</a></li>';
}*/

//Loop for provides links for 2 pages before and after current page
/*for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)	{
if($i<1) continue;
if($i>$pages) break;
if($_REQUEST["pageNumber"] == $i)
$output = $output . '<li id='.$i.'><a href="#" class="active">'.$i.'</a></li>';
else				
$output = $output . '<li><a href="' . $href . "pageNumber=".$i . '" class="">'.$i.'</a></li>';
}

//if pages exists after loop's upper limit
if(($pages-($_REQUEST["pageNumber"]+2))>1) {
$output = $output . '<li><a href="#">...</a></li>';
}
if(($pages-($_REQUEST["pageNumber"]+2))>0) {
if($_REQUEST["pageNumber"] == $pages)
$output = $output . '<li id=' . ($pages) .' class="">' . ($pages) .'</li>';
else				
$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .'" class="">' . ($pages) .'</a></li>';
}
if ($_REQUEST["pageNumber"] >= $pages) {
	$output = $output . '<li><a href="#" class="">&raquo;</a></li>';
}else{
	$output = $output . '<li><a href="'.$href."pageNumber=" .($_REQUEST["pageNumber"]+1).'"  class="">&raquo;</a></li>';
}
$output = $output . '<li><a href="' . $href .  "pageNumber=" .($pages) .'"  class="">Last</a></li>';
}

return $output;
}

}*/
function pagination($count, $href,$searcharray=array()) {
	//echo "hello";die;
if (is_array($searcharray) && count($searcharray)>0){
	$i =1;
	foreach($searcharray as $key => $value ) {
		if (isset($searchRequest)) {
		$searchRequest .= "&".$key."=".$value."";
		}else {
			$searchRequest = "&".$key."=".$value."";
		}
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

?>