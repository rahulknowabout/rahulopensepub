<?php
 
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
 
// check for required fields
   
       
        $SQL = "SELECT b.*  FROM `fpcity` a
                                    LEFT JOIN city b ON a.`cityid` = b.id order by a.torder ASC";
        
       
        
        $result=MySQL::query($SQL);
        // check if row inserted or not
        if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "All Front City .";
        $response["frontCity"] = $result;
        //$response["User_id"] = $insertID;
        // echoing JSON response
        echo json_encode($response);
        }
        else{
             $response["success"] = 0;
             $response["message"] = "No Front City found in the database";
 
    // echoing JSON response
        echo json_encode($response);
        }
   
?>