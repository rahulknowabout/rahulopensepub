<?php

#############################SUNIL##################
        
        function checkLogin() {
    //index, new_user_sign_up, products
    $state = false;
    global $loginError;
    
    if ($_REQUEST['action'] == "logout" && isset($_SESSION[SESSION_NAME]['userID'])) 
	{
        addActivityLog("logout", "andritz-access", "0", $_SESSION[SESSION_NAME]['userID']);
        unset($_SESSION[SESSION_NAME]['user']);
        unset($_SESSION[SESSION_NAME]['user_name']);
        unset($_SESSION[SESSION_NAME]['userID']);
        header("location: home.php");
    }

    if ($_SESSION[SESSION_NAME]['userID'] != "") {
        $state = true;
    }

   

    if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
        $cleaned = clean($_REQUEST);
        $clause = " c.`is_infoserv_admin` = 1 AND co.`id` = 3497"; //Andritz
      
        #new password script
        //get potential user
        $SQL = "SELECT c.* FROM 
                `crm_contacts` c
                JOIN crm_offices o ON c.id_office = o.id
                JOIN crm_companies co ON o.id_company = co.id
                WHERE 
                    c.`email` = '" . $cleaned['email'] . "' AND 
                    c.`email` <> '' AND 
                    c.`external_access_password` <> '' AND 
                    c.`contact_status` = 1 AND 
                    " . $clause . " 
                LIMIT 1";
        
        
        $potential = MySQL::query($SQL, true);

        if ($potential) {
            $cleaned['password'] = encryptPassword($cleaned['password'], $potential['id']);
        }
        
        $SQL = "SELECT c.* FROM 
                `crm_contacts` c 
                JOIN crm_offices o ON c.id_office = o.id
                JOIN crm_companies co ON o.id_company = co.id
                WHERE 
                    c.`email` = '" . $cleaned['email'] . "' AND 
                    c.`external_access_password` = '" . $cleaned['password'] . "' AND 
                    c.`email` <> '' AND 
                    c.`external_access_password` <> '' AND 
                    c.`contact_status` = 1 AND 
                    " . $clause . "
		LIMIT 0, 1";
        
        $result = MySQL::query($SQL, true);

        if (count($result) > 0) {
            if ($result['date_reset'] < time()) { #check to see if password needs updating
                $_SESSION['POTENTIAL']['userID'] = $result['id'];
                header("location: reset-password.php");
                $state = true;
                exit();
            } else {
                $_SESSION[SESSION_NAME]['userID'] = $result['id'];
                $_SESSION[SESSION_NAME][$result['id']]['is_admin'] = $result['is_infoserv_admin'];
                $state = true;
                addActivityLog("login", "andritz-access", "0", $_SESSION[SESSION_NAME]['userID']);

                if ($usedUID !== true) {
                    $_SESSION[SESSION_NAME]['encuid'] = false;
                }
                $_SESSION[SESSION_NAME]['loginError'] = false;
              
            }
        } else {
            $_SESSION[SESSION_NAME]['loginError'] = true;
            header("location: admin.php");
        }
    }
     /*
	 * Andritz Site has now publicly available with no encuid
         * GET All Country detail for andritz new login user
         * Added By VV Dated: 2-7-2015
     */
     if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        unset($_SESSION[SESSION_NAME][$_SESSION[SESSION_NAME]['userID']]);
        $cleaned = clean($_REQUEST);
      //dump($cleaned);die;
        $potential_id=2;
        $cleaned['password'] = encryptPassword($cleaned['password'], $potential_id);
       //die;
        
       $SQL = "SELECT c.* FROM 
                `user_andritz_front_login` c 
                
                WHERE 
                    c.`username` = '" . $cleaned['username'] . "' AND 
                    c.`password` = '" . $cleaned['password'] . "' AND 
                    c.`username` <> '' AND 
                    c.`password` <> '' 	LIMIT 0, 1";
       
        $result = MySQL::query($SQL, true);

        if (count($result) > 0) {
                  if ($result['date_expiry'] < time()) { #check to see if password needs updating
                     $_SESSION['POTENTIAL']['userID'] = $result['id'];
                     header("location: reset-password.php");
                     $state = true;
                     exit();
                   } else {
                    $_SESSION[SESSION_NAME]['userID'] = $result['id'];
                    //$_SESSION[SESSION_NAME][$result['id']]['is_admin'] = $result['is_infoserv_admin'];
                    $_SESSION[SESSION_NAME]['encuid'] = true;
		    $_SESSION[SESSION_NAME]['encuidLoggedIn'] = true;
                    
                    $usedUID = true;
                    $state = true;
                    addActivityLog("login", "andritz-access", "0", $_SESSION[SESSION_NAME]['userID']);

                    $_SESSION[SESSION_NAME]['loginError'] = false;
                    header("location: home.php");
                   }
        } else {
                   $_SESSION[SESSION_NAME]['loginError'] = true;
                   header("location: index.php");
        }
    }
    /*
	 * Andritz Site has now publicly available with no encuid
         * GET All Country detail for andritz new login user
         * Added By VV Dated: 2-7-2015
     */
    if($state === false)
    {
        header("Location: index.php");
    }
    
    return $state;
}
        
       function encryptPassword($password, $dbid) {
            return md5(sha1($password . $dbid));
            } 
       
            ///for checking the arrry is single or multiple dimentionls
       function is_multi($a) {
            $rv = array_filter($a,'is_array');
            if(count($rv)>0) return true;
            return false;
        }     
            
    function generateFlag($length = 8) {
    $chars = "abcdefghijklmnopqrstuvwxyz1234567890";
    $result = "";

    for ($loop = 0; $loop < $length; $loop++) {
        $result .= $chars[mt_rand(0, strlen($chars))];
    }

    return $result;
}   
        #############################Pagination################## 
		
/*function pagination($count, $href) {
$output = '';
if(!isset($_REQUEST["pageNumber"])) $_REQUEST["pageNumber"] = 1;
if(PERPAGE_LIMIT != 0)
$pages  = ceil($count/PERPAGE_LIMIT);

//if pages exists after loop's lower limit
if($pages>1) {
if(($_REQUEST["pageNumber"]-3)>0) {
$output = $output . '<a href="' . $href . 'pageNumber=1" class="page">1</a>';
}
if(($_REQUEST["pageNumber"]-3)>1) {
$output = $output . '...';
}

//Loop for provides links for 2 pages before and after current page
for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)	{
if($i<1) continue;
if($i>$pages) break;
if($_REQUEST["pageNumber"] == $i)
$output = $output . '<span id='.$i.' class="current">'.$i.'</span>';
else				
$output = $output . '<a href="' . $href . "pageNumber=".$i . '" class="page">'.$i.'</a>';
}

//if pages exists after loop's upper limit
if(($pages-($_REQUEST["pageNumber"]+2))>1) {
$output = $output . '...';
}
if(($pages-($_REQUEST["pageNumber"]+2))>0) {
if($_REQUEST["pageNumber"] == $pages)
$output = $output . '<span id=' . ($pages) .' class="current">' . ($pages) .'</span>';
else				
$output = $output . '<a href="' . $href .  "pageNumber=" .($pages) .'" class="page">' . ($pages) .'</a>';
}

}
return $output;
}
*/

?>