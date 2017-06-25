<?php
	class Users
	{	
		function construct()
		{
			//
		}
		
		function getSystemUsers()
		{
			$SQL = "SELECT * FROM `users` WHERE `user_account_disabled` = '0' ORDER BY `user_name`, `user_surname` ASC";
			return MySQL::query($SQL);
		}
		
		function getUserById($userID)
		{
			$SQL = "SELECT * FROM `users` WHERE `user_id` = '" . $userID . "'";
			return MySQL::query($SQL, true);
		}
                ///added by 20/5/2016///
                function getUserByIdForAPI($userID)
		{
			$SQL = "SELECT user_id,user_email,user_name,user_surname,user_address,user_dob,user_mobile,user_status,latitiude,longitude,user_role FROM `users` WHERE `user_id` = '" . $userID . "'";
			return MySQL::query($SQL, true);
		}
                function getUserByEmailId($emailID)
		{
			$SQL = "SELECT * FROM `users` WHERE `user_email` = '" . $emailID . "'";
			return MySQL::query($SQL, true);
		}
                 function deleteUserById($id)
		{   
                        $SQL = "DELETE FROM `users` WHERE `user_id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getUserNameById($userID)
		{
			$SQL = "SELECT user_name , user_surname  FROM `users` WHERE `user_id` = '" . $userID . "'";
			return MySQL::query($SQL, true);
		}
                
                
                #########City Functions=======================########
                
                function getSystemCity()
		{
			$SQL = "SELECT * FROM `ct_city` ORDER BY `cityname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemCityAproved()
		{
			$SQL = "SELECT * FROM `ct_city` where status=1 ORDER BY `cityname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemCityById($id)
		{
			$SQL = "SELECT * FROM `ct_city` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getSystemCityByNmae($cityname)
		{
			$SQL = "SELECT * FROM `ct_city` WHERE `cityname` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function deleteCityById($id)
		{   
                        $SQL = "DELETE FROM `ct_city` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                #########location Functions=======================########
                function getSystemlocation()
		{
			$SQL = "SELECT * FROM `ct_location`  ORDER BY id ASC";
			return MySQL::query($SQL);
		}
                function getSystemlocationById($id)
		{
			$SQL = "SELECT * FROM `ct_location` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function deletelocationById($id)
		{   
                        $SQL = "DELETE FROM `ct_location` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deletelocationByCityId($id)
		{   
                        $SQL = "DELETE FROM `ct_location` WHERE `city_id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getlocationByCityId($id)
		{
			$SQL = "SELECT * FROM `ct_location` WHERE `city_id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                
                 #########Category Functions=======================########
                
                function getCategory()
		{
			$SQL = "SELECT * FROM `category` ORDER BY `cat_name` ASC";
			return MySQL::query($SQL);
		}
                function getCategoryAproved()
		{
			$SQL = "SELECT * FROM `category` where status=1 ORDER BY `cat_name` ASC";
			return MySQL::query($SQL);
		}
                function getCategoryById($id)
		{
			$SQL = "SELECT * FROM `category` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getCategoryByNmae($cityname)
		{
			$SQL = "SELECT * FROM `category` WHERE `cat_name` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function deleteCategoryById($id)
		{   
                        $SQL = "DELETE FROM `category` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                #########SubCategory Functions=======================########
                function getSubCategory()
		{
			$SQL = "SELECT * FROM `sub_category`  ORDER BY id ASC";
			return MySQL::query($SQL);
		}
                function getSubCategoryById($id)
		{
			$SQL = "SELECT * FROM `sub_category` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function deleteSubCategoryById($id)
		{   
                        $SQL = "DELETE FROM `sub_category` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deleteSubCategoryByCatId($id)
		{   
                        $SQL = "DELETE FROM `sub_category` WHERE `cat_id` = '" . $id . "' ";
			return MySQL::query($SQL,true);
		}
                function getSubCategoryByCatId($id)
		{
			$SQL = "SELECT * FROM `sub_category` WHERE `cat_id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                
                ##########BUSINESS FUNCTIONS##########################
                
                function getSystemBusiness()
		{
			$SQL = "SELECT * FROM `ct_business` WHERE `approved` = '1' ORDER BY date_created DESC";
			return MySQL::query($SQL);
		}
                function getSystemBusinessNA()
		{
			$SQL = "SELECT * FROM `ct_business` WHERE `approved` = '0' ORDER BY date_created DESC";
			return MySQL::query($SQL);
		}
                function getSystemBusinessByNmae($cityname)
		{
			$SQL = "SELECT * FROM `ct_business` WHERE `title` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function getSystemBusinessById($id)
		{
			$SQL = "SELECT * FROM `ct_business` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function deleteSystemBusinessById($id)
		{   
                        $SQL = "DELETE FROM `ct_business` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                 ##########ADs FUNCTIONS##########################
                
                function getSystemAds()
		{
			$SQL = "SELECT * FROM `ct_ads` ORDER BY date_created DESC";
			return MySQL::query($SQL);
		}
                function getAdsByNmae($cityname)
		{
			$SQL = "SELECT * FROM `ct_ads` WHERE `ad_titile` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                 function getAdsById($id)
		{
			$SQL = "SELECT * FROM `ct_ads` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function deleteAdsById($id)
		{   
                        $SQL = "DELETE FROM `ct_ads` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                #########issue Functions=======================########
                function getSystemissues()
		{
			 $SQL="SELECT lo.area AS location, i. *
                                FROM `ct_issue` i
                                INNER JOIN ct_location lo ON i.location_id = lo.id
                                ORDER BY id ASC";
                        return MySQL::query($SQL);
		}
                
                function deleteissueById($id)
		{   
                        $SQL = "DELETE FROM `ct_issue` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
	}
?>