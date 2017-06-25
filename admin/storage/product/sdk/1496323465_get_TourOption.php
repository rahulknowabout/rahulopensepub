<?php //echo "<pre>";
//print_r($_POST);die;
 
/*
 * Following code willget all category 
 * All user details are read from HTTP GET Request
 * Made By : D
 * DATE: 17-03-2016
 */
 
require_once("../lib/config.php");
require_once("../lib/scripts/php/functions.php");
require_once("../lib/scripts/php/new_functions.php");

// array for JSON response
$response = array();
 //$_POST['cityid']=7;
// check for required fields
   if (isset($_POST['TourId']) && $_POST['TourId']!='' && isset($_POST['season_id']) && $_POST['season_id']!=''  && isset($_POST['transferoption_id']) && $_POST['transferoption_id']!='') {
       $SQL = "SELECT a. * ,tc.transferoption FROM `tour_price` a inner join tour_transferoption tp on a.tourTransOptionId = tp.id inner join transfer_category tc on tp.transfercatId = tc.id
                                WHERE a.TourId = '" . $_POST['TourId'] . "' AND a.seasonId = '" . $_POST['season_id'] . "' AND a.tourTransOptionId = '" . $_POST['transferoption_id'] . "' ";
       
	   //echo $SQL;die;
        $resultTransferOption=MySQL::query($SQL);
		//echo "<pre>";
		//print_r($result);
		//die;
        $SQL = "SELECT a. * ,tourop.* FROM `tour_add_services` a inner join tour_otheroption tourop on a.tourOtherOptionId = tourop.id 
                                WHERE a.TourId = '" . $_POST['TourId'] . "' AND a.seasonId = '" . $_POST['season_id'] . "'";
       
	   //echo $SQL;die;
        $resultaddService=MySQL::query($SQL);
       // echo "<pre>";
		//print_r($resultaddService);
		//die;
        // check if row inserted or not
		if ( (is_array($resultTransferOption) && count($resultTransferOption)>0) || (is_array($resultaddService) && count($resultaddService)>0) ) {
			$response["success"] = 1;
			$response["message"] = "TransferOption AND Additional Service Detail.";
			$response["transfer_option_detail"] = $resultTransferOption;
			$response["additional_service_details"] = $resultaddService;
			echo json_encode($response);die;
			
			}else{
				
				$response["success"] = 0;
				$response["message"] = "Not Data Available";
				echo json_encode($response);die;
				
				}
  } else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}   
?>