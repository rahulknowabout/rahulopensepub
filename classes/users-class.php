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
                
                function getAdminRoles()
		{
			$SQL = "SELECT * FROM `admin_role` ORDER BY `id` ASC";
			return MySQL::query($SQL);
		}
                #########Country Functions=======================########
                                
                function getSystemCountry()
		{
			$SQL = "SELECT * FROM `country` ORDER BY `countryname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemCountryAproved()
		{
			$SQL = "SELECT * FROM `country` where status=1 ORDER BY `countryname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemCountryById($id)
		{
			$SQL = "SELECT * FROM `country` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getSystemCountryByNmae($cityname)
		{
			$SQL = "SELECT * FROM `country` WHERE `countryname` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function deleteCountryById($id)
		{   
                        $SQL = "DELETE FROM `country` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                #########City Functions=======================########
                                
                function getSystemCity()
		{
			$SQL = "SELECT * FROM `city` ORDER BY `cityname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemCityAproved()
		{
			$SQL = "SELECT * FROM `city` where status=1 ORDER BY `cityname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemCityById($id)
		{
			$SQL = "SELECT * FROM `city` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getCityByCountryId($id)
		{
			$SQL = "SELECT * FROM `city` WHERE `countryid` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
		 function getCityByCountryIdApproved($id)
		{
			$SQL = "SELECT * FROM `city` WHERE `countryid` = '" . $id . "' AND status=1";
			return MySQL::query($SQL, true);
		}
                function getSystemCityByNmae($cityname,$countryid)
		{
			$SQL = "SELECT * FROM `city` WHERE `cityname` = '" . $cityname . "' and `countryid` = '" . $countryid . "'";
			return MySQL::query($SQL);
		}
                function deleteCityById($id)
		{   
                        $SQL = "DELETE FROM `city` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deleteCityByCountryId($id)
		{   
                        $SQL = "DELETE FROM `city` WHERE `countryid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getPopulerCity()
		{
			//$SQL = "SELECT * FROM `populercity` ORDER BY `id` ASC";
                        $SQL = "SELECT a . * , b.cityname
                                    FROM `populercity` a
                                    LEFT JOIN city b ON a.`cityid` = b.id order by a.torder ASC";
			return MySQL::query($SQL);
		}
                function deletePopulerCityById($id,$cityid)
		{   
                        $SQL = "DELETE FROM `populercity` WHERE `id` = '" . $id . "'  LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deletePCityByCityId($id,$cityid)
		{   
                        $SQL = "DELETE FROM `populercity` WHERE `cityid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getCityShowFP()
		{
			$SQL = "SELECT * FROM `city` where showLpage=1 ORDER BY `cityname` ASC";
			return MySQL::query($SQL);
		}
                function getFPCity()
		{
			//$SQL = "SELECT * FROM `populercity` ORDER BY `id` ASC";
                        $SQL = "SELECT a . * , b.cityname
                                    FROM `fpcity` a
                                    LEFT JOIN city b ON a.`cityid` = b.id order by a.torder ASC";
			return MySQL::query($SQL);
		}
                function deleteFPCityById($id,$cityid)
		{   
                        $SQL = "DELETE FROM `fpcity` WHERE `id` = '" . $id . "'  LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deleteFPCityByCityId($id,$cityid)
		{   
                        $SQL = "DELETE FROM `fpcity` WHERE `cityid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                #########Tour Category Functions=======================########
                                
                function getTourCategory()
		{
			$SQL = "SELECT * FROM `tour_category` ORDER BY `tourcatname` ASC";
			return MySQL::query($SQL);
		}
                function getTourCategoryAproved()
		{
			$SQL = "SELECT * FROM `tour_category` where status=1 ORDER BY `tourcatname` ASC";
			return MySQL::query($SQL);
		}
                function getTourCategoryByNmae($cityname)
		{
			$SQL = "SELECT * FROM `tour_category` WHERE `tourcatname` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                
                 function deleteTourCategoryById($id)
		{   
                        $SQL = "DELETE FROM `tour_category` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deleteTourCategoryByCityId($id)
		{   
                        $SQL = "DELETE FROM `tour_category` WHERE `cityid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
		 
                function getTourCategoryById($id)
		{
			$SQL = "SELECT * FROM `tour_category` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getTourCategoryByCityId($cityid)
		{
			$SQL = "SELECT * FROM `tour_category` WHERE `cityid` = '" . $cityid . "'";
			return MySQL::query($SQL);
		}
		function getTourByCityId($cityid)
		{
			$SQL = "SELECT * FROM `tour` WHERE `cityid` = '" . $cityid . "'";
			return MySQL::query($SQL);
		}
		function getTourCategoryByCityIdAproved($cityid)
		{
			$SQL = "SELECT * FROM `tour_category` WHERE `cityid` = '" . $cityid . "' AND status=1";
			return MySQL::query($SQL);
		}
                function getTourTopSellingById($cityid)
		{
			$SQL = "SELECT a . * , b.tourcatname
                                    FROM `topselling_cat` a
                                    LEFT JOIN tour_category b ON a.`tourcatId` = b.id
                                    WHERE b.`cityid` = '" . $cityid . "' order by a.torder ASC";
			//echo $SQL = "SELECT * FROM `topselling_cat` WHERE `cityid` = '" . $cityid . "'";
			return MySQL::query($SQL);
		}
                function deleteTourTopSellingById($id,$cityid)
		{   
                        $SQL = "DELETE FROM `topselling_cat` WHERE `id` = '" . $id . "' and `cityid`= '" . $cityid . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getTourRecommendedCatById($cityid)
		{
			$SQL = "SELECT a . * , b.tourcatname
                                    FROM `toprecommened_cat` a
                                    LEFT JOIN tour_category b ON a.`tourcatId` = b.id
                                    WHERE b.`cityid` = '" . $cityid . "' order by a.torder ASC";
			
			return MySQL::query($SQL);
		}
                function deleteTourRecommendedCatById($id,$cityid)
		{   
                        $SQL = "DELETE FROM `toprecommened_cat` WHERE `id` = '" . $id . "' and `cityid`= '" . $cityid . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deleteTourRecommendedByCityId($id)
		{   
                        $SQL = "DELETE FROM `toprecommened_cat` WHERE `cityid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function deleteTourTopSellingByCityId($id)
		{   
                        $SQL = "DELETE FROM `topselling_cat` WHERE `cityid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                
                #########Transfer Category Functions=======================########
                                
                function getTransferCategory()
		{
			$SQL = "SELECT * FROM `transfer_category` ORDER BY `transferoption` ASC";
			return MySQL::query($SQL);
		}
                function getTransferCategoryByNmae($cityname)
		{
			$SQL = "SELECT * FROM `transfer_category` WHERE `transfercatname` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function getTransferCategoryById($id)
		{
			$SQL = "SELECT * FROM `transfer_category` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
               function deleteTransferCategoryById($id)
		{   
                        $SQL = "DELETE FROM `transfer_category` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                
              
                #########Pages Functions=======================########
                                
                function getSystemPages()
		{
			$SQL = "SELECT * FROM `pages` ORDER BY `pagename` ASC";
			return MySQL::query($SQL);
		}
                function getSystemPages2()
		{
			$SQL = "SELECT a.id, a.pagename, b.pagetype, a.pagetypeid, a.content, a.status
                                FROM `pages` a
                                LEFT JOIN pagetype b ON a.pagetypeid = b.id
                                ORDER BY a.`pagename` ASC";
			return MySQL::query($SQL);
		}
                function getSystemPagesByNmae($cityname)
		{
			$SQL = "SELECT * FROM `pages` WHERE `pagename` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function getSystemPagesById($id)
		{
			$SQL = "SELECT * FROM `pages` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function deletePageById($id)
		{   
                        $SQL = "DELETE FROM `pages` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getPageTypeAproved()
		{
			$SQL = "SELECT * FROM `pagetype` where status=1 ORDER BY `pagetype` ASC";
			return MySQL::query($SQL);
		}
                /// here page type 4 means cancel policy
                function getPageCancelPolicyAproved()
		{
			$SQL = "SELECT * FROM `pages` where status=1 and pagetypeid =4 ORDER BY `pagename` ASC";
			return MySQL::query($SQL);
		}
                 /// here page type 5 means term and condition
                function getPageTermConditionAproved()
		{
			$SQL = "SELECT * FROM `pages` where status=1 and pagetypeid =5 ORDER BY `pagename` ASC";
			return MySQL::query($SQL);
		}
                
                
                #########Season Functions=======================########
                                
                function getSystemSeason()
		{
			$SQL = "SELECT * FROM `season` ORDER BY `season_name` ASC";
			return MySQL::query($SQL);
		}
                
                function getSeasonByNmae($cityname)
		{
			$SQL = "SELECT * FROM `season` WHERE `season_name` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function getSeasonById($userID)
		{
			$SQL = "SELECT * FROM `season` WHERE `id` = '" . $userID . "'";
			return MySQL::query($SQL, true);
		}
                 function deleteSeasonById($id)
		{   
                        $SQL = "DELETE FROM `season` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                #########Rate fo exchange Functions=======================########
                                
                function getRateOfCurrency()
		{
			$SQL = "SELECT * FROM `rateofcurrency` ORDER BY `currencyname` ASC";
			return MySQL::query($SQL);
		}
                 function getCurrencyByNmae($cityname)
		{
			$SQL = "SELECT * FROM `rateofcurrency` WHERE `currencyname` = '" . $cityname . "'";
			return MySQL::query($SQL);
		}
                function deleteCurrencyById($id)
		{   
                        $SQL = "DELETE FROM `rateofcurrency` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                #########Tour Functions=======================########
                 function getTourExcludedDate($id)
		{
			$SQL = "SELECT * FROM `tour_excludeddate` WHERE `TourId` = '" . $id . "' ORDER BY `id` ASC";
			return MySQL::query($SQL);
		}
		
		function getTourIncludedDate($id)
		{
			$SQL = "SELECT * FROM `tour_includeddate` WHERE `TourId` = '" . $id . "' ORDER BY `id` ASC";
			return MySQL::query($SQL);
		}
                function deleteTourExcludedDateByID($id)
		{   
                        $SQL = "DELETE FROM `tour_excludeddate` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
		function deleteTourIncludedDateByID($id)
		{   
                        $SQL = "DELETE FROM `tour_includeddate` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getTourOtherOption($id)
		{
			$SQL = "SELECT * FROM `tour_otheroption` WHERE `TourId` = '" . $id . "' ORDER BY `optionorder` ASC";
			return MySQL::query($SQL);
		}
		function getTourOtherOptionId($id)
		{
			$SQL = "SELECT id FROM `tour_otheroption` WHERE `TourId` = '" . $id . "' ORDER BY `optionorder` ASC";
			return MySQL::query($SQL);
		}
                function deleteTourOtherOptionInTableByID($id)
		{   
                        $SQL = "DELETE FROM `tour_otheroption` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                 function getTourByName($tourname)
		{
			$SQL = "SELECT * FROM `tour` WHERE `tourname` = '" . $tourname . "'";
			return MySQL::query($SQL);
		}
                function getTourMealIncluded ($id)
		{
			$SQL = "SELECT mealincluded  FROM `tour` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                
                function getTourBannerImageBYTourId($id)
		{
			$SQL = "SELECT * FROM `tour_bannerimage` WHERE `TourId` = '" . $id . "' ORDER BY `bannerorder` ASC";
			return MySQL::query($SQL);
		}
                function deleteTourBannerImageByID($id)
		{   
                        $SQL = "DELETE FROM `tour_bannerimage` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                 function getTourBannerImageByName($cityname,$TourId)
		{
			$SQL = "SELECT * FROM `tour_bannerimage` WHERE `bannername` = '" . $cityname . "' and `TourId` = '" . $id . "'";
			return MySQL::query($SQL);
		}
                function getTourGalleryImageByName($cityname,$TourId)
		{
			$SQL = "SELECT * FROM `tour_galleryrimage` WHERE `galleryname` = '" . $cityname . "' and `TourId` = '" . $id . "'";
			return MySQL::query($SQL);
		}
                function getTourGalleryImageBYTourId($id)
		{
			$SQL = "SELECT * FROM `tour_galleryrimage` WHERE `TourId` = '" . $id . "' ORDER BY `galleryorder` ASC";
			return MySQL::query($SQL);
		}
                 function getTourBannerMaxId($TourId)
		{
			$SQL = "SELECT *
                                FROM `tour_bannerimage`
                                WHERE `TourId` ='" . $TourId . "'
                                ORDER BY bannerorder DESC  limit 0,1";
			return MySQL::query($SQL,true);
		}
                
                function getTourBannerUpId($id,$TourId)
		{
			$SQL = "SELECT * FROM `tour_bannerimage` WHERE `bannerorder` = '" . $id . "' and `TourId` = '" . $TourId . "'";
			return MySQL::query($SQL,true);
		}
                
                function getTourBannerUpOneId($id,$TourId)
		{
	                $SQL = "SELECT * FROM `tour_bannerimage` WHERE `id`  < '" . $id . "' and `TourId` = '" . $TourId . "' ORDER BY `bannerorder` DESC limit 0,1";
			return MySQL::query($SQL,true);
		}
                
                function getTourBannerDwonOneId($id,$TourId)
		{
	               echo $SQL = "SELECT * FROM `tour_bannerimage` WHERE `id`  > '" . $id . "' and `TourId` = '" . $TourId . "' ORDER BY `bannerorder` DESC limit 0,1";
			return MySQL::query($SQL,true);
		}
                
                function deleteTourGalleryImageByID($id)
		{   
                        $SQL = "DELETE FROM `tour_galleryrimage` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getTourTransferOption($id)
		{
			$SQL = "SELECT a . * , b.transfercatname, b.transferoption
                                FROM `tour_transferoption` a
                                LEFT JOIN transfer_category b ON a.`transfercatId` = b.id
                                WHERE a.`TourId` = '" . $id . "'
                                ORDER BY a.`tforder` ASC";
			return MySQL::query($SQL);
		}
                function deleteTourTransferOptionByID($id)
		{   
                        $SQL = "DELETE FROM `tour_transferoption` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                function getTourTransferIsDefaultByID($TourId)
		{   
                        $SQL = "SELECT *  FROM `tour_transferoption` WHERE `TourId` = '" . $TourId . "' AND `isdefault`=1 LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                function getSystemTour()
		{
			$SQL = "SELECT a. * , b.countryname, c.cityname, d.tourcatname
                                FROM `tour` a
                                LEFT JOIN country b ON a.`countryid` = b.id
                                LEFT JOIN city c ON a.`cityid` = c.id
                                LEFT JOIN tour_category d ON a.`tourcatid` = d.id
                                ORDER BY a.`tourname` ASC";
			return MySQL::query($SQL);
		}
                function getSystemTourIsLive()
		{
			$SQL = "SELECT a. * , b.countryname, c.cityname, d.tourcatname
                                FROM `tour` a
                                LEFT JOIN country b ON a.`countryid` = b.id
                                LEFT JOIN city c ON a.`cityid` = c.id
                                LEFT JOIN tour_category d ON a.`tourcatid` = d.id
                                WHERE a.islive=1
                                ORDER BY a.`tourname` ASC";
			return MySQL::query($SQL);
		}
                function getTourByID($id)
		{
			$SQL = "SELECT * FROM `tour` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function deleteTourPriceBYTransferOptionID($id)
		{   
                        $SQL = "DELETE FROM `tour_price` WHERE `tourTransOptionId` = '" . $id . "'";
			            return MySQL::query($SQL,true);
		}
                function getTourPrice($seasonId,$TourId)
		{
			$SQL = "SELECT a . * , c.transfercatname, c.transferoption,b.transfercatId 
                                FROM `tour_price` a
                                LEFT JOIN tour_transferoption b ON a.`tourTransOptionId` = b.id
                                LEFT JOIN transfer_category c ON b.`transfercatId` = c.id
                                WHERE a.subTPid=0 and a.`seasonId` = '" . $seasonId . "' and a.`TourId` = '" . $TourId . "'
                                ORDER BY a.`id` ASC";
			//echo $SQL;die;				
			return MySQL::query($SQL);
		}
		function getComboDiscount($seasonId,$ComboId)
		{
			$SQL = "SELECT * FROM `tour_combo_price` WHERE  `seasonId` = '" . $seasonId . "' and `ComboId` = '" . $ComboId . "'";
			//echo $SQL;die;				
			return MySQL::query($SQL);
		}
		
		function getTourPriceTourID($TourId)
		{
			$SQL = "SELECT a . * , c.transfercatname, c.transferoption,b.transfercatId 
                                FROM `tour_price` a
                                LEFT JOIN tour_transferoption b ON a.`tourTransOptionId` = b.id
                                LEFT JOIN transfer_category c ON b.`transfercatId` = c.id
                                WHERE a.subTPid=0  and a.`TourId` = '" . $TourId . "'
                                ORDER BY a.`TourId` ASC";
			return MySQL::query($SQL);
		}
                
                function getTourPriceById($id)
		{
			$SQL = "SELECT a . id, a.subTPid, a.TourId, a.tourTransOptionId, a.seasonId,  c.transferoption
                                FROM `tour_price` a
                                LEFT JOIN tour_transferoption b ON a.`tourTransOptionId` = b.id
                                LEFT JOIN transfer_category c ON b.`transfercatId` = c.id
                                WHERE a.`id` = '" . $id . "'
                                ORDER BY a.`id` ASC";
			return MySQL::query($SQL, true);
		}
                function deleteTourPrcieSubByID($id)
		{   
                        $SQL = "DELETE FROM `tour_price` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getTourPriceSubById($id)
		{
			$SQL = "SELECT a . * , c.transfercatname, c.transferoption
                                FROM `tour_price` a
                                LEFT JOIN tour_transferoption b ON a.`tourTransOptionId` = b.id
                                LEFT JOIN transfer_category c ON b.`transfercatId` = c.id
                                WHERE a.`subTPid` = '" . $id . "'
                                ORDER BY a.`id` ASC";
			return MySQL::query($SQL);
		}
                function getTourPriceSubIdById($id)
		{
			$SQL = "SELECT a . * , c.transfercatname, c.transferoption
                                FROM `tour_price` a
                                LEFT JOIN tour_transferoption b ON a.`tourTransOptionId` = b.id
                                LEFT JOIN transfer_category c ON b.`transfercatId` = c.id
                                WHERE a.`subTPid` = '" . $id . "'
                                ORDER BY a.`id` DESC
                                LIMIT 0 , 1";
			return MySQL::query($SQL, true);
		}
                function getToursubTPidByID($id)
		{
			$SQL = "SELECT subTPid FROM `tour_price` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getTourPriceMaxPaxByID($id,$ide)
		{
			$SQL = "SELECT MAX(maxpax) as maxpax FROM `tour_price` WHERE (`subTPid` = '" . $id . "' OR `id` = '" . $id . "' ) AND id <> '" . $ide . "'";
			return MySQL::query($SQL, true);
		}
                function getTourPriceBySeasonID($id,$TourId)
		{
			$SQL = "SELECT * FROM `tour_price` WHERE `seasonId` = '" . $id . "' and `TourId` = '" . $TourId . "'";
			return MySQL::query($SQL);
		}
                function getTourAddServicesBySeasonID($id,$TourId)
		{
			$SQL = "SELECT * FROM `tour_add_services` WHERE `seasonId` = '" . $id . "'  and `TourId` = '" . $TourId . "'";
			return MySQL::query($SQL);
		}
                function deleteTourById($id)
		{   
                        $SQL = "DELETE FROM `tour` WHERE `id` = '" . $id . "' LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function deleteTourOtherOptionByTourId($id)
		{   
                        $SQL = "DELETE FROM `tour_otheroption` WHERE `TourId` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function deleteTourBannerByTourId($id)
		{   
                        $SQL = "DELETE FROM `tour_bannerimage` WHERE `TourId` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function deleteTourGalleryByTourId($id)
		{   
                        $SQL = "DELETE FROM `tour_galleryrimage` WHERE `TourId` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function deleteTourTOptionByTourId($id)
		{   
                        $SQL = "DELETE FROM `tour_transferoption` WHERE `TourId` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function deleteTourPriceByTourId($id)
		{   
                        $SQL = "DELETE FROM `tour_price` WHERE `TourId` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getTourAddServices($id,$TourId)
		{
			$SQL = "SELECT a . * , b.optionName
                                FROM `tour_add_services` a
                                LEFT JOIN `tour_otheroption` b ON a.`tourOtherOptionId` = b.id
                                WHERE a .`seasonId` = '" . $id . "' and a .`TourId` = '" . $TourId . "'
                                ORDER BY a.`id` ASC";
			return MySQL::query($SQL);
		}
                
                ###############General ###############
                
                
                function getCountryNameByID($id)
		{
			$SQL = "SELECT countryname FROM `country` where `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getCityNameByID($id)
		{
			$SQL = "SELECT cityname FROM `city` where `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getTCNameByID($id)
		{
			$SQL = "SELECT tourcatname FROM `tour_category` where `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                
                ###############General ###############
                
                
                function getLandingAppBanner()
		{
			$SQL = "SELECT * FROM `app_banner` WHERE cityid =0 ORDER BY `appborder` ASC";
			return MySQL::query($SQL);
		}
                function getCityAppBanner($id)
		{
			$SQL = "SELECT * FROM `app_banner` WHERE cityid = '" . $id . "' ORDER BY `appborder` ASC";
			return MySQL::query($SQL);
		}
                  function getAppBannerByName($tourname)
		{
			$SQL = "SELECT * FROM `app_banner` WHERE `img_name` = '" . $tourname . "'";
			return MySQL::query($SQL);
		}
                function getAppBannerById($id)
		{
			$SQL = "SELECT * FROM `app_banner` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
               function deleteAppBannerById($id)
		{   
                        $SQL = "DELETE FROM `app_banner` WHERE `id` = '" . $id . "'  LIMIT 1";
			return MySQL::query($SQL,true);
		}
                function getAppBannerTourById($id)
		{
			$SQL = "SELECT * FROM `app_banner_tour` WHERE `appbid` = '" . $id . "'";
			return MySQL::query($SQL);
		}
                function getTourNameById($id)
		{
			$SQL = "SELECT tourname FROM `tour` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                 function deleteAppBannerTourById($id)
		{   
                        $SQL = "DELETE FROM `app_banner_tour` WHERE `id` = '" . $id . "'  LIMIT 1";
			return MySQL::query($SQL,true);
		}
                
                ########################################
                #Get Coupon Management####
                function getCoupon()
		{
			$SQL = "SELECT * FROM `tour_coupon`  ORDER BY `id` ASC";
			return MySQL::query($SQL);
		}
                function getCouponCodeByName($tourname)
		{
			$SQL = "SELECT * FROM `tour_coupon` WHERE `couponcode` = '" . $tourname . "'";
			return MySQL::query($SQL);
		}
                function getCouponById($id)
		{
			$SQL = "SELECT * FROM `tour_coupon` WHERE `id` = '" . $id . "'  ORDER BY `id` ASC";
			return MySQL::query($SQL,true);
		}
                function deleteCouponTourById($id)
		{   
                        $SQL = "DELETE FROM `tour_coupon` WHERE `id` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                #
                #########################################
                #Tour like function####
               
                function getTourLike($TourId,$UserId)
		{
			$SQL = "SELECT * FROM `tour_like` WHERE `TourId` = '" . $TourId . "'  and `UserId` = '" . $UserId . "'";
			return MySQL::query($SQL,true);
		}
             #tour function 
                function getSystemTourComboAproved()
		{
			$SQL = "SELECT * FROM `tour_combo` ORDER BY `comboid` ASC";
			return MySQL::query($SQL);
		}
                function getComboByName($tourname)
		{
			$SQL = "SELECT * FROM `tour_combo` WHERE `comboname` = '" . $tourname . "'";
			return MySQL::query($SQL);
		}
                function deleteCombo1ById($id)
		{   
                        $SQL = "DELETE FROM `tour_combo` WHERE `comboid` = '" . $id . "'";
			return MySQL::query($SQL,true);
		}
                function getSystemComboById($id)
		{
			$SQL = "SELECT * FROM `tour_combo` WHERE `comboid` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
                function getSystemComboTById($id)
		{
			$SQL = "SELECT * FROM `tour_combo_t` WHERE `comboid` = '" . $id . "'";
			return MySQL::query($SQL, true);
		}
		
		
                
                #
                ###############END OF THE CLASS#######
	}
?>