<?
    function checkBlankJobAd($value) {
		if($value == "")
			return "_____";
		else 
			return $value ;
	}

	function checkFilter_2($HeadHunters, $seeker_head_hunter, $recruiter_id, $viewFlag = 1) {
	    if($seeker_head_hunter==1) {
		  
		   $cnt = 0;
		   $topFiveHeadHunters = array();
		   foreach($HeadHunters as $head_rec_id => $shortlist_count)  
		   {
		   		if($cnt > 4) break;
				
		   		$topFiveHeadHunters[$cnt] = $head_rec_id;
				$cnt = $cnt + 1;
		   }
		      
			 
		   if(!in_array($recruiter_id, $topFiveHeadHunters)) 
		      $viewFlag = 0;				   	
		}

		return $viewFlag;
	}
		
	function sendMail($ad_id) 
	{	
		$objDb = new db();	
	    
		 $sqlJob="select * from job_ad where ad_id='" . $ad_id . "' and (option_radio='2' or option_radio='3')  and mail_sent_comp=0 ";
		$resultJob = $objDb->ExecuteQuery($sqlJob);
		$rsJob  = mysql_fetch_object($resultJob); 
		
		$refno = $rsJob->ad_id;
		
		if(mysql_num_rows($resultJob)>0)
		{
		$sqlAddress = "SELECT * FROM job_company_addressbook 
					  WHERE rec_id = " . $rsJob->rec_id;			
		$resultAddress = $objDb->ExecuteQuery($sqlAddress);				
			
		$sqlComp = "select * from job_recruiter where rec_id='" . $rsJob->rec_id . "'";
		$resultComp = $objDb->ExecuteQuery($sqlComp);
		$rsComp  = mysql_fetch_object($resultComp);

		if(mysql_num_rows($resultAddress) > 0) 
		{	        
			while($rsAddress = mysql_fetch_object($resultAddress)) 
			{						
		
		$str = '<style type="text/css" type="text/css">
			.sectionheading
			{
				font-family: Arial, Helvetica, sans-serif;
				font-size:20px;
				font-weight:normal;
				color: #329900;
				text-decoration: none;
			}
			.table_alternate_row_noboder
			{
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				background-color:#E6E6E6;
				color: #333333;
				text-decoration:none;
			}
			.subhead_gray_small
			{
				font-family:  Arial, Helvetica, sans-serif;
				font-size:13px;
				font-weight:bold;
				color: #333333;
				text-decoration:none;
			}	
			.normal
			{
				font-family:  Arial, Helvetica, sans-serif;
				font-size: 13px;
				font-style:normal;
				color: #000000;
				text-decoration:none;
			}				
		</style>
		<table width="100%" cellpadding="6" cellspacing="0" class="normal">
					<tr>
						<td colspan="3">&nbsp;&nbsp;job advert <span class="subhead_gray_small">ref.' . sprintf("%05d",$refno) . '</span> entitled <span class="subhead_gray_small">' . $rsJob->position_name . '</span> posted by <span class="subhead_gray_small">' . $rsComp->comp_name . '</span><br><br></td>
					</tr>						
					<tr>
						<td colspan="3" class="sectionheading">&nbsp;&nbsp;Job Ad Details</td>
					</tr>					
					<tr>
						<td width="4%">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Job Reference</td>
						<td width="70%" class="normal"><b>' . str_pad($ad_id, 5, "0", STR_PAD_LEFT) . '</b></td>
					</tr>
					<tr class="table_alternate_row_noboder">
						<td bgcolor="#ffffff">&nbsp;</td>
						<td width="26%" class="subhead_gray_small" >Job Title</td>
						<td width="70%" class="normal">' . $rsJob->position_name . '</td>
					</tr>
					<tr>
						<td width="4%">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Job Category </td>
						<td width="70%" class="normal">' . $rsJob->level . '</td>
					</tr>
					<tr class="table_alternate_row_noboder">
						<td bgcolor="#ffffff">&nbsp;</td>
						<td width="26%" class="subhead_gray_small" >Job Description</td>
						<td width="70%" class="normal">' . $rsJob->job_desc . '</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff">&nbsp;</td>
						<td width="26%" class="subhead_gray_small" >Skills</td>
						<td width="70%" class="normal">' . $rsJob->job_skills . '</td>
					</tr>
					<tr class="table_alternate_row_noboder">
						<td width="4%" bgcolor="#ffffff">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Employement Type </td>
						<td width="70%" class="normal">' . $rsJob->type . '</td>
					</tr>
					
					<tr class="table_alternate_row_noboder">
						<td width="4%" bgcolor="#FFFFFF">&nbsp;</td>
						<td width="26%" class="subhead_gray_small" >Benefits </td>
						<td width="70%" class="normal">' . $rsJob->job_benefits . '</td>
					</tr>';
					$min_sec_qualification = ($rsJob->min_sec_qualification !="") ? "  or  " . $rsJob->min_sec_qualification : ''; 
			$str .= '<tr>
						<td width="4%">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Qualification </td>
						<td width="70%" class="normal">' . $min_sec_qualification . '</td>
					</tr>
					<tr class="table_alternate_row_noboder">
						<td width="4%" bgcolor="#FFFFFF">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Experience</td>
						<td width="70%" class="normal">' . $rsJob->experience . ' years experience </td>
					</tr>
					<tr >
						<td width="4%">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Job location</td>
						<td width="70%" class="normal">' . $rsJob->town . '</td>
					</tr>
					<tr class="table_alternate_row_noboder">
						<td width="4%" bgcolor="#FFFFFF">&nbsp;</td>
						<td width="26%" class="subhead_gray_small" >Post Date</td>
						<td width="70%" class="normal">' . getDateValue($rsJob->ad_date) . '</td>
					</tr>
					<tr  >
						<td width="4%">&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Equity Status</td>
						<td width="70%" class="normal">' . $rsJob->filter_equity_status . '</td>
					</tr>';
				$filter_gender = ($rsJob->filter_gender=="Either") ? "Male of Female" : $rsJob->filter_gender;
				$str .= '<tr class="table_alternate_row_noboder">
						<td width="4%" bgcolor="#FFFFFF" >&nbsp;</td>
						<td width="26%" class="subhead_gray_small">Gender</td>
						<td width="70%" class="normal">' . $filter_gender . '</td>
					</tr>';


			$str.= '<tr>
						<td colspan="3" class="sectionheading">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3" class="sectionheading">&nbsp;&nbsp;Contact Information</td>
					</tr>';					
					
			$str .= '<tr>
					  <td colspan="3" class="normal">&nbsp;&nbsp;&nbsp;To apply for this position, please contact the employer using the following:<br>
						<br>
					  </td>
					</tr>
				   
					<tr class="table_alternate_row_noboder">
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td width="26%" class="subhead_gray_small" >Company</td>
					  <td width="70%" class="normal">' . $rsComp->comp_name . '</td>
					</tr>
					<tr>
					  <td width="4%">&nbsp;</td>
					  <td width="26%" class="subhead_gray_small">Contact Person </td>
					  <td width="70%" class="normal">' . $rsComp->rec_name . '</td>
					</tr>
					<tr class="table_alternate_row_noboder">
					  <td bgcolor="#ffffff">&nbsp;</td>
					  <td width="26%" class="subhead_gray_small" >Contact email </td>
					  <td width="70%" class="normal"><span class="terms">' . $rsComp->rec_email . '</span></td>
					</tr>
					<tr>
					  <td height="32" bgcolor="#ffffff">&nbsp;</td>
					  <td width="26%" class="subhead_gray_small" >Postal address</td>
					  <td width="70%" class="normal">' . $rsComp->rec_address . '</td>
					</tr>
					<tr class="table_alternate_row_noboder">
					  <td width="4%" bgcolor="#ffffff">&nbsp;</td>
					  <td width="26%" class="subhead_gray_small">Contact Telphone </td>
					  <td width="70%" class="normal">' . $rsComp->rec_phone . '</td>
					</tr>';
				 	
				 $str .= '</table>';	

				 $from = $rsComp->rec_email;
				 $subject = "job advert ref." . sprintf("%05d",$refno) . " entitled " . $rsJob->position_name . " posted by " . $rsComp->comp_name;	
				 $headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
				 @mail(trim($rsAddress->comp_email_id), $subject, $str, $headers);	
				 $data = array();
				 $data["mail_sent_comp"] = 1;
				 $objDb->UpdateData("job_ad",$data,"ad_id",$ad_id);	
					        
		    }
		}
		}
		
	}
	
	function sendJobAlert($ad_id) 
	{	
		$objDb = new db();	

		$R1= array('/#/') ;
		$R2 = array(" : ");

		$seeker_bursary_alert_qualification="";
		$seeker_bursary_alert_institute="";
		$seeker_bursary_alert_study="";
		$seeker_alert_full_bursary="";
		
		
		
		$seeker_work_type="";
		$seeker_vacation_type="";
		$seeker_work_cat="";
		$seeker_work_subcat="";
		
		$sqlJob="select * from job_ad where ad_id='" . $ad_id . "'";
		//$sqlJob="select * from job_ad where ad_id=198";
		$resultJob = $objDb->ExecuteQuery($sqlJob);
		$rsJob  = mysql_fetch_object($resultJob); 
		
		$refno = $rsJob->ad_id;	
		$job_skills = $rsJob->job_skills;
		$job_category = $rsJob->level;		
		
		
		
		//for bursary
		$seeker_bursary_alert_qualification = $rsJob->bursary_details_offer !="" ? $rsJob->bursary_details_offer : "" ;
		$seeker_bursary_alert_institute = $rsJob->bursary_institution !="" ? $rsJob->bursary_institution : "" ;
		$seeker_bursary_alert_study = $rsJob->bursary_qualification !="" ? $rsJob->bursary_qualification : "" ;
		$seeker_alert_full_bursary = $rsJob->bursary_offer !="" ? $rsJob->bursary_offer : "" ;
			
		//end bursary
		//for job
		
		$seeker_work_type = $rsJob->seeker_work_type !="" ? $rsJob->seeker_work_type : "" ;
		$seeker_parttime_available = $rsJob->available_assume_duties !="0000-00-00" ? $rsJob->available_assume_duties : "" ;
		$seeker_vacation_type = $rsJob->seeker_vacation_type !="" ? $rsJob->seeker_vacation_type : "" ;
		$seeker_work_cat = $rsJob->seeker_work_cat !="" ? $rsJob->seeker_work_cat : "" ;
		$seeker_work_subcat = $rsJob->seeker_work_subcat !="" ? $rsJob->seeker_work_subcat : "" ;
		$seeker_parttime_alertwork = $rsJob->type_of_part_time_work !="" ? $rsJob->type_of_part_time_work : "" ;
		$ad_country = $rsJob->ad_country !="" ? $rsJob->ad_country : "" ;//for country
		$seeker_city = $rsJob->town !="" ? $rsJob->town : "" ;
		$seeker_alert_from = $rsJob->available_month_from !="0000-00-00" ? $rsJob->available_month_from : "" ;
		$seeker_alert_to = $rsJob->available_month_to !="0000-00-00" ? $rsJob->available_month_to : "" ;
		//for time
		$available_days = array(0=>"",1=>"",2=>"",3=>"",4=>"",5=>"",6=>"");
//		for($i=0 ; $i <= 6 ; $i++) {
//			$available_days[$i] = "" ;
//		}
		if($rsJob->available_days != "") {
			$available_days1 =  explode("-/!-", $rsJob->available_days);	
			foreach($available_days1 as $key=> $value) {
				$available_days2 = explode("/-/",$value);
				$available_days[$available_days2[0]] = str_replace($R1,$R2,$available_days2[1]) ;
			}
		} 
			
		$sqlSeeker1 = "SELECT * FROM job_jobseeker where seeker_status=1 ";
		$resultSeeker1 = $objDb->ExecuteQuery($sqlSeeker1);

		if(mysql_num_rows($resultSeeker1) > 0) 
		{	       
			while($rsSeeker1 = mysql_fetch_object($resultSeeker1)) 
			{			
				
				$alert_search_flag = false ;
				$alert_mail_seeker_id = $rsSeeker1->seeker_id ;
				
					$sqlSeeker = "SELECT * FROM job_jobseeker 
								  WHERE seeker_status=1 and seeker_id=". $alert_mail_seeker_id ;
					$flag = 0;			  
						if($rsJob->vacansy=='Bursary application Position' )
						{
							if($seeker_bursary_alert_qualification != "" and $rsSeeker1->seeker_bursary_alert_qualification != "") {
								$sqlSeeker .= " and (seeker_bursary_alert_qualification='" . $seeker_bursary_alert_qualification . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_bursary_alert_institute!= "" and $rsSeeker1->seeker_bursary_alert_institute != "") {
								$sqlSeeker .= " and (seeker_bursary_alert_institute='" . $seeker_bursary_alert_institute . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_bursary_alert_study!= "" and $rsSeeker1->seeker_bursary_alert_study != "") {
								$sqlSeeker .= " and (seeker_bursary_alert_study='" . $seeker_bursary_alert_study . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_alert_full_bursary!= "" and $rsSeeker1->seeker_alert_full_bursary != "") {
								$sqlSeeker .= " and (seeker_alert_full_bursary='" . $seeker_alert_full_bursary . "') " ;
								$alert_search_flag = true ;
							}
						}
					//end bursary alert
					
					//for job alert
						if($rsJob->vacansy!='Bursary application Position' )
						{
								//exit;
								if($ad_country != "" and $rsSeeker1->seeker_business_country != "") {
									$sqlSeeker .= " and (seeker_business_country='" . $ad_country . "') " ;
									$alert_search_flag = true ;
									
								}
								
								if($seeker_work_type != "" and $rsSeeker1->seeker_work_type != "") {
									$sqlSeeker .= " and (seeker_work_type='" . $seeker_work_type . "') " ;
									$alert_search_flag = true ;
									
								}
								if($seeker_vacation_type != "" and $rsSeeker1->seeker_vacation_type != "") {
									$sqlSeeker .= " and (seeker_vacation_type='" . $seeker_vacation_type . "') " ;
									$alert_search_flag = true ;
								}
								if($seeker_parttime_alertwork != "" and $rsSeeker1->seeker_parttime_alertwork != "") {
									$sqlSeeker .= " and (seeker_parttime_alertwork='" . $seeker_parttime_alertwork . "') " ;
									$alert_search_flag = true ;
								}
																
								//for time  available_days
							if($available_days[0] != "" and $rsSeeker1->seeker_mon != "") {
								$sqlSeeker .= " and (seeker_mon='" . $available_days[0] . "') " ;
								$alert_search_flag = true ;
							}
							if($available_days[1] != "" and $rsSeeker1->seeker_tue != "") {
								$sqlSeeker .= " and (seeker_tue='" . $available_days[1] . "') " ;
								$alert_search_flag = true ;
							}
							if($available_days[2] != "" and $rsSeeker1->seeker_wed != "") {
								$sqlSeeker .= " and (seeker_wed='" . $available_days[2] . "') " ;
								$alert_search_flag = true ;
							}
							if($available_days[3] != "" and $rsSeeker1->seeker_thurs != "") {
								$sqlSeeker .= " and (seeker_thurs='" . $available_days[3] . "') " ;
								$alert_search_flag = true ;
							}
							if($available_days[4] != "" and $rsSeeker1->seeker_fri != "") {
								$sqlSeeker .= " and (seeker_fri='" . $available_days[4] . "') " ;
								$alert_search_flag = true ;
							}
							if($available_days[5] != "" and $rsSeeker1->seeker_sat != "") {
								$sqlSeeker .= " and (seeker_sat='" . $available_days[5] . "') " ;
								$alert_search_flag = true ;
							}
							if($available_days[6] != "" and $rsSeeker1->seeker_sun != "") {
								$sqlSeeker .= " and (seeker_sun='" . $available_days[6] . "') " ;
								$alert_search_flag = true ;
							}

							//end time
							
							if($seeker_parttime_available != "0000-00-00" and $rsSeeker1->seeker_parttime_available != "0000-00-00" and $seeker_parttime_available!="" and $rsSeeker1->seeker_parttime_available != "" ) {
								$sqlSeeker .= " and (seeker_parttime_available='" . $seeker_parttime_available . "') " ;
								$alert_search_flag = true ;
							}
								
								
							
							if($seeker_work_cat != "" and $rsSeeker1->seeker_work_cat != "") {
								$sqlSeeker .= " and (seeker_work_cat='" . $seeker_work_cat . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_work_subcat != "" and $rsSeeker1->seeker_work_subcat != "") {
								$sqlSeeker .= " and (seeker_work_subcat='" . $seeker_work_subcat . "') " ;
								$alert_search_flag = true ;
							}
							$alert_city_flag=0;
							if($seeker_city != "" and $rsSeeker1->seeker_parttime_city != "") {
								$sqlSeeker .= " and ((seeker_parttime_city='" . $seeker_city . "') " ;
								$alert_search_flag = true ;
								$alert_city_flag=1;
								}

							
							if($seeker_city != "" and $rsSeeker1->seeker_alert_city1 != "") {
								if($alert_city_flag==0)
								{
									$sqlSeeker .= " and ((seeker_alert_city1='" . $seeker_city . "') " ;
									$alert_city_flag=1;
								}
								else if($alert_city_flag==1)
								{
									$sqlSeeker .= " or (seeker_alert_city1='" . $seeker_city . "') " ;
									
								}
								$alert_search_flag = true ;
							}
							
								if($seeker_city != "" and $rsSeeker1->seeker_alert_city2 != "") {
									if($alert_city_flag==0)
									{
										$sqlSeeker .= " and ((seeker_alert_city2='" . $seeker_city . "') " ;
										$alert_city_flag=1;
									}
									else if($alert_city_flag==1)
									{
										$sqlSeeker .= " or (seeker_alert_city2='" . $seeker_city . "') " ;
									}
									$alert_search_flag = true ;
								}
								if($seeker_city != "" and $rsSeeker1->seeker_alert_city3 != "") {
									if($alert_city_flag==0)
									{
										$sqlSeeker .= " and ((seeker_alert_city3='" . $seeker_city . "') " ;
										$alert_city_flag=1;
									}
									else if($alert_city_flag==1)
									{
										$sqlSeeker .= " or (seeker_alert_city3='" . $seeker_city . "') " ;
									}
									
									$alert_search_flag = true ;
								}
								if($alert_city_flag==1)
								{
									$sqlSeeker .= ")";
								}

							$alert_d = false ;							
							if($seeker_alert_from != "" and $seeker_alert_to != "" and  $rsSeeker1->seeker_alert_fromdate != "0000-00-00" and $rsSeeker1->seeker_alert_todate != "0000-00-00") {
								$sqlSeeker .= " and   ((seeker_alert_fromdate <='" . $seeker_alert_from . "' and seeker_alert_todate >='" . $seeker_alert_to . "') " ;
								$alert_search_flag = true ;
								$alert_d = true ;
								//$alert_fromflag=1;
							}
//							if($rsSeeker1->seeker_alert_todate != "0000-00-00") {
//								$sqlSeeker .= " and (seeker_alert_todate>='" . $seeker_alert_to . "') " ;
//								$alert_search_flag = true ;
//								//$alert_toflag=1;
//							}
							
							if($seeker_alert_from != "" and $seeker_alert_to != ""  and $rsSeeker1->seeker_alert_date1 != "0000-00-00") {
								if($alert_d==true) {
									$sqlSeeker .= " or (seeker_alert_date1 between '" . $seeker_alert_from . "' AND '".$seeker_alert_to."') " ;
								} else {
									$sqlSeeker .= " and ((seeker_alert_date1 between '" . $seeker_alert_from . "' AND '".$seeker_alert_to."') " ;
									$alert_d = true ;
								}
								$alert_search_flag = true ;
							}


							if($seeker_alert_from != "" and $seeker_alert_to != ""  and $rsSeeker1->seeker_alert_date2 != "0000-00-00") {
								if($alert_d==true) {
									$sqlSeeker .= " or (seeker_alert_date2 between '" . $seeker_alert_from . "' AND '".$seeker_alert_to."') " ;
								} else {
									$sqlSeeker .= " and ((seeker_alert_date2 between '" . $seeker_alert_from . "' AND '".$seeker_alert_to."') " ;
									$alert_d = true ;
								}
								$alert_search_flag = true ;
							}
							
							if($seeker_alert_from != "" and $seeker_alert_to != ""  and $rsSeeker1->seeker_alert_date3 != "0000-00-00") {
								if($alert_d==true) {
									$sqlSeeker .= " or (seeker_alert_date3 between '" . $seeker_alert_from . "' AND '".$seeker_alert_to."') " ;
								} else {
									$sqlSeeker .= " and ((seeker_alert_date3 between '" . $seeker_alert_from . "' AND '".$seeker_alert_to."') " ;
									$alert_d = true ;
								}
								$alert_search_flag = true ;
							}
							if($alert_d==true) {
								$sqlSeeker .= " ) ";
							}
							
							
							/*if($seeker_alert_to != "" and $rsSeeker1->seeker_alert_date1 != "0000-00-00") {
								$sqlSeeker .= " and (seeker_alert_date1<='" . $seeker_alert_to . "') " ;
								$alert_search_flag = true ;
							}
							/*if($seeker_alert_from != "" and $rsSeeker1->seeker_alert_date2 != "0000-00-00") {
								$sqlSeeker .= " and (seeker_alert_date2>='" . $seeker_alert_from . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_alert_to != "" and $rsSeeker1->seeker_alert_date2 != "0000-00-00") {
								$sqlSeeker .= " and (seeker_alert_date2<='" . $seeker_alert_to . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_alert_from != "" and $rsSeeker1->seeker_alert_date3 != "0000-00-00") {
								$sqlSeeker .= " and (seeker_alert_date3>='" . $seeker_alert_from . "') " ;
								$alert_search_flag = true ;
							}
							if($seeker_alert_to != "" and $rsSeeker1->seeker_alert_date3 != "0000-00-00") {
								$sqlSeeker .= " and (seeker_alert_date3<='" . $seeker_alert_to . "') " ;
								$alert_search_flag = true ;
							}*/

							
						}
					//end job alert
					//echo "kk";
					
					//echo $alert_search_flag ;
					if($alert_search_flag == true ) {
						$resultSeeker = $objDb->ExecuteQuery($sqlSeeker);
						//echo $sqlSeeker.";<br>";
						//$from = "deepa.budhani@alpha-analytics.com";
						$from = "NamRecruit <info@namrecruit.com>";
						$sqlComp = "select * from job_recruiter where rec_id='" . $rsJob->rec_id . "'";
						$resultComp = $objDb->ExecuteQuery($sqlComp);
						$rsComp  = mysql_fetch_object($resultComp);
						//echo mysql_num_rows($resultSeeker);

						if(mysql_num_rows($resultSeeker) > 0) 
						{	       
							//echo "hi123";
							//echo $alert_search_flag . "test" ;

							while($rsSeeker = mysql_fetch_object($resultSeeker)) 
							{			
								
								if($rsJob->vacansy=='Bursary application Position')
								{								
									
									 $msg = "<span style='font-family:verdana; font-size:12'>";
									 $msg .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18; align=right'><img src='http://www.namrecruit.com/images/nam_logo.gif'></span>";			
									 $msg .= "<br><br><span style='font-size:18; align=center'>Bursary Alert</span>";
									 $msg .= "<br><br>Dear, ". $rsSeeker->seeker_name ." " . $rsSeeker->seeker_surname . "<br><br>";
									 $msg .= "There is a new bursary posted for the bursary - " . $rsJob->bursary_name . " - with reference number " . sprintf("%05d",$ad_id) . " on NamRecruit by " . $rsComp->comp_name . ".<br><br>";		
									 $msg .= "To view further details and apply for this bursary, please click on the link below:
<br>";
									 $msg .= "<a href='http://www.namrecruit.com/jobseeker/job_search_details_bursary.php?id=" . $ad_id . "'>http://www.namrecruit.com/jobseeker/job_search_details_bursary.php?id=" . $ad_id . "</a>";
									 $msg .= "<br><br>Regards, <br>NamRecruit.";	
									 $msg .= "</span>";
									 $subject = "Bursary advert ref." . sprintf("%05d",$refno) . " entitled " . $rsJob->bursary_name . " posted on NamRecruit ";	
								}
								else if($rsJob->vacansy!='Bursary application Position')
								{
									 //echo($rsJob->vacansy); 
									 $msg = "<span style='font-family:verdana; font-size:12'>";
									 $msg .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:18; align=right'><img src='http://www.namrecruit.com/images/nam_logo.gif'></span>";			
									 $msg .= "<br><br><span style='font-size:18; align=center'>Job Alert</span>";
									 $msg .= "<br><br>Dear ". $rsSeeker->seeker_name ." " . $rsSeeker->seeker_surname . ",<br><br>";
									 $msg .= "There is a new job for a - " . $rsJob->position_name . " - with reference number " . sprintf("%05d",$ad_id) . " has been posted on NamRecruit by " . $rsComp->comp_name . ".This job matches the criteria you set in your profile.
<br><br>";		
									 $msg .= "To view further details and apply for this job, please click on the link below:<br>";
									 $msg .= "<a href='http://www.namrecruit.com/jobseeker/job_search_details.php?id=" . $ad_id . "'>http://www.namrecruit.com/jobseeker/job_search_details.php?id=" . $ad_id . "</a>";
									 $msg .= "<br><br>Regards, <br>NamRecruit.";	
									 $msg .= "</span>";
									 $subject = "New job advert." . sprintf("%05d",$refno) . " entitled " . $rsJob->position_name . " posted on NamRecruit " ;	
								 }
								// $headers = "From: $from\nCc:deepa.budhani@alpha-analytics.com";
								 $headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
								 //deepa.budhani@alpha-analytics.com
								 //@mail("deepa.budhani@alpha-analytics.com", $subject, $msg, $headers);	
								 @mail(trim($rsSeeker->seeker_email), $subject, $msg, $headers);		
									
								 $data = array();
								 $data["mail_sent"] = 1;
								 $objDb->UpdateData("job_ad",$data,"ad_id",$ad_id);
							}
						}
					}
			}
		}

					
	}
		
	function get_registration_type() {
	   $obj = new db();
	   $sql_chk = "SELECT comp_type FROM job_recruiter 
	   			   WHERE rec_id='" . $_SESSION["ses_rec_id"] . "'";
	   $res_chk =  $obj->ExecuteQuery($sql_chk);
	   $rs_chk = mysql_fetch_assoc($res_chk);
	   return $rs_chk['comp_type'];
	}
	
	function fill_dropdown($name, $table, $textField, $valueField, $selectedValue = "", $firstValue = "Select", $where="", $attributes="",$orderOption="",$id="")
	{
		if($orderOption == "") {
			$orderOption = $textField ;
		} 
		
		$objDb = new db();
		if($where!="")
		{
			$sql = "select * from " . $table . " " . $where . " order by " . $orderOption;
		}
		else
		{
			$sql = "select * from " . $table . " order by " . $orderOption;
		}
		
		$result =  $objDb->ExecuteQuery($sql);
		if($id!="")
		{
			$str = "<select name='" . $name . "' id='" . $id . "'"  ."   ". $attributes . ">";	
		}else{
			$str = "<select name='" . $name . "'" ."   ". $attributes . ">";	
		}

		if($firstValue != "no_value")
		{
			$str .= "<option value=''>" . $firstValue . "</option>";		
		}

		while($rs = mysql_fetch_object($result))
		{
			$selected = "";
			if($rs->$valueField == $selectedValue)
				$selected = "selected";
				
			$str .= "<option value='" . $rs->$valueField . "' " . $selected . ">" . $rs->$textField . "</option>";
		}
		
		$str .= "</select>";
		
		return $str;
	}
	
	function fill_dropdown_multiple($name, $table, $textField, $valueField, $selectedValue = "", $firstValue = "Select", $where="", $attributes="",$orderOption="",$id="")
	{
		//echo($selectedValue);
		//echo $selectedValue;
		if($orderOption == "") {
			$orderOption = $textField ;
		} 
		
		$objDb = new db();
		if($where!="")
		{
			$sql = "select * from " . $table . " " . $where . " order by " . $orderOption;
		}
		else
		{
			$sql = "select * from " . $table . " order by " . $orderOption;
		}
		$result =  $objDb->ExecuteQuery($sql);
		if($id!="")
		{
			$str = "<select name='" . $name . "' id='" . $id . "'" . $attributes . " size='3' multiple>";
			
		}else{
			$str = "<select name='" . $name . "'" . $attributes . " size='3' multiple>";
		}

		if($firstValue != "no_value")
		{
			$str .= "<option value=''>" . $firstValue . "</option>";		
		}
		$inc_i=0;
		//echo($selectedValue);
		while($rs = mysql_fetch_object($result))
		{
			$selected = "";
			//if($rs->$valueField == $selectedValue)
			if(strstr($selectedValue,$rs->$valueField)) {
				$selected = "selected"; }
				
				
			$str .= "<option value='" . $rs->$valueField . "' " . $selected . ">" . $rs->$textField . "</option>";
		}
		
		$str .= "</select>";
		
		return $str;
	}
	
	function getCount($sql)
	{
		$objDb = new db();
		$result = $objDb->ExecuteQuery($sql);
		//echo $sql;
		
		return mysql_num_rows($result);
	}
	function getFieldValue($table, $fieldName, $searchField, $searchValue)
	{
		
		$returnValue = "";
		$sql = "select " . $fieldName . " from " . $table . " where " . $searchField . "='" . $searchValue . "'";
		$objDb = new db();
		$result = $objDb->ExecuteQuery($sql);
		if($rs = mysql_fetch_object($result))
			$returnValue = $rs->$fieldName;
		
		return $returnValue;
	}
	
	
	
	function createDate($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=1940; $i<=date("Y") + 2; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	
	//for voucher code
	function createDateVoucher($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=date("Y"); $i<=date("Y") + 12; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	//end of voucher code
	//for bursary
	
	
	//end of bursary
	
	//for Add
	function createDateAdd($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		$yearadd = date("Y");
		for($i=date("Y")-2; $i<=$yearadd + 2; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	//end ADD
	
	//for Add
	function createDateAssumption($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		$yearadd = date("Y");
		for($i=date("Y"); $i<=$yearadd + 2; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	//end ADD
	
	//for Add
	function createDateRunningTime($name,$value="",$array="",$att="",$totime="")
	{
		//echo $att;
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		//echo $att;
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		if($totime!="")
		{
			$date1=date("Y-m-d");
		}
		else
		{
			$date1=$totime;
		}
		$dateTo=explode("-",date("Y-m-d",strtotime("$date1+21 day")));
		//print_r($dateTo);
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'"  .$att.">
				<option value=''>Date</option>";
		$j=date("d");
		for($i=date("d"); $i<=date("d")+21; $i++)
		{
			
			$selected = "";
			if($j==32) $j=1;
			if($j == $date)	$selected = "selected";
			$str .= "	<option value='" . $j . "' " . $selected . ">" . $j. "</option>";$j++;
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' ".$att.">
				<option value=''>Month</option>";
		$m=date("m");
		//echo date("m");
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($key==date("m") || $key==$dateTo[1]){
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";}
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' ".$att.">
				<option value=''>Year</option>";		
		$yearadd = date("Y");
		for($i=date("Y"); $i<=$dateTo[0]; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	
	
	
	//end ADD
	
	
	//for Invoice
	function createDateInvoice($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		$yearadd = date("Y");
		for($i=2009; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	//end ADD
	
	
	
	
	
	//for period
	function createDatePeriod($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		$str="";
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month =$arrDate[1];
			$year = $arrDate[0];
		}
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	
	
	function createDateLicence($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		//date
		$str = "<select  name='" . $name . "_date" . $array . "' id='" . $name . "_date'   >
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select  name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' onClick='neverYear()'>
				<option value=''>Year</option>";		

		for($i=2009; $i<=date("Y")+50; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
		if($year=="Never")	$selected = "selected";
		$str .= "	<option value='Never' " . $selected . ">Never</option>";
		$str .= "</select>";		
		return $str;
	}
	
	
	
	function getDateValue($value,$att="3")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		$str ="";
		$del = " ";
				
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];

			if($date > 0)
			{
				$str =$date;
				$str .=$del;
				$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
				
				while(list($key,$val) = each($arrMonth))
				{
					if($month == $key)	
					{
						if($att!="")
						{
							$str .=substr($val,0,$att);
						}
						else
						{
							$str .=$val;
						}
						//break;
					}
				}
				$str.=$del;
				$str.=$year;
			}
		}
		
		return $str;
	}
	function getDateValuePeriod($value,$att="3")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		$str ="";
		$del = " ";
				
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];

			if($year > 0)
			{
				$str .=$year;
			}
		}
		return $str;
	}
	
	
	
	
	function recruiter_preview($comp_logo)
	{
		$objDb = new db();
		$sqltemp = "truncate table job_recruiter_temp";
		$resulttemp = $objDb->ExecuteQuery($sqltemp);
			
		$array = array();		
		
		if(isset($_POST["rec_name"]))
		{
			$array["rec_name"] = $_POST["rec_name"];
			$array["comp_name"] = $_POST["comp_name"];
			$array["comp_type"] = $_POST["comp_type"];  //1 - employer and 2 - recruiter
			$array["company_desc"] =$_POST["company_desc"];
			$array["rec_address"] = $_POST["rec_address"];
			$array["rec_postalcode"] = $_POST["rec_postalcode"];
			
			if($_POST["rec_city"] == "--- Other ---")
				$array["rec_city"] = $_POST["other_rec_city"];					
			else
				$array["rec_city"] = $_POST["rec_city"];
				
			//$array["rec_state"] = $_POST["rec_state"];
			//$array["rec_country"] = $_POST["rec_country"];
			
			$array["business_street"] =$_POST["business_street"];
			$array["business_street_num"] =$_POST["business_street_num"];
			$array["business_suburb"] =$_POST["business_suburb"];
			$array["business_city"] =$_POST["business_city"];
			$array["business_country"] =$_POST["business_country"];
			$array["postal_po_box"] =$_POST["postal_po_box"];
			$array["postal_private_bag"] =$_POST["postal_private_bag"];
			$array["postal_post_code"] =$_POST["postal_post_code"];
			$array["postal_city"] =$_POST["postal_city"];
			$array["postal_country"] =$_POST["postal_country"];
			if(isset($_POST["postal_region"]) and $_POST["postal_region"]==16){
			$array["postal_region"] = $_POST["other_region"];
			}
			else if(isset($_POST["postal_region"]))
			{
			$array["postal_region"] =$_POST["postal_region"];
			}
			else{
			$array["postal_region"] =$_POST["postal_region1"];
			}
			$array["rec_phone"] = $_POST["rec_phone"];
			$array["rec_mobile"] = $_POST["rec_mobile"];
			$array["rec_fax"] = $_POST["rec_fax"];
			$array["rec_email"] = $_POST["rec_email"];
			$array["rec_web"] = $_POST["rec_web"];
			
			if(isset($_POST["chkLogo"]))
				$array["comp_logo"] = "";
			else
				$array["comp_logo"]	=  $comp_logo;
				
			

			if(isset($_POST["rec_hidename"]))
				$array["rec_hidename"] = $_POST["rec_hidename"];

			if(isset($_POST["rec_hideaddress"]))
				$array["rec_hideaddress"] = $_POST["rec_hideaddress"];

			if(isset($_POST["rec_hideemail"]))
				$array["rec_hideemail"] = $_POST["rec_hideemail"];

			if(isset($_POST["rec_hidecity"]))
				$array["rec_hidecity"] = $_POST["rec_hidecity"];

			if(isset($_POST["rec_hidetelno"]))
				$array["rec_hidetelno"] = $_POST["rec_hidetelno"];

			if(isset($_POST["rec_password"]))
				$array["rec_password"] = $_POST["rec_password"];
		
			//Where did you hear about NamRecruit?
			$heared = "";
			if(isset($_POST["email"]))
				$heared .= $_POST["email"] . ",";
	
			if(isset($_POST["google"]))
				$heared .= $_POST["google"] . ",";
	
			if(isset($_POST["anothersearchengine"]))
				$heared .= $_POST["anothersearchengine"] . ",";
	
			if(isset($_POST["friend"]))
				$heared .= $_POST["friend"] . ",";
	
			if(isset($_POST["tv"]))
				$heared .= $_POST["tv"] . ",";
	
			if(isset($_POST["radio"]))
				$heared .= $_POST["radio"] . ",";
	
			if(isset($_POST["newspaper"]))
				$heared .= $_POST["newspaper"] . ",";
	
			if(isset($_POST["magazine"]))
				$heared .= $_POST["magazine"] . ",";
	
			if(isset($_POST["banner"]))
				$heared .= $_POST["banner"] . ",";
	
			if(isset($_POST["other"]))
				$heared .= $_POST["other"] . ",";
		
			if(strlen($heared) > 0)
				$heared = substr($heared,0,strlen($heared) - 1);
		
			$array["rec_heared"] = $heared;
			
			if(isset($_POST["rec_terms"]))
				$array["rec_terms"] = $_POST["rec_terms"];
			
			$array["rec_status"] = 1;
			$array["rec_IP"] = $_SERVER['REMOTE_ADDR'];
			
			$objDb->InsertData("job_recruiter_temp",$array);
		   
			$arr_update['rec_uid'] = "JR-" . (mysql_insert_id() + 1000);   
			$objDb->UpdateData("job_recruiter_temp",$arr_update,"rec_id",mysql_insert_id());
		   
		   echo("<script language='javavscript' type='text/javascript'>window.open('recruiter_preview.php','RegistrationPreview','width=700,height=650,menubar=no,status=yes,location=yes,toolbar=no,scrollbars=yes');</script>");
	   }
	   
	}		
	
	function curPageName() {
		return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}		
		
	function showStatus($alertname, $id_head, $id, $status_head, $status, $table) 
	{ 
	 	if ($status == 1) 
			echo "<span id='status_" . $id . "'><a href='javascript:void(0)' class='paging_text' title='In-activate " . $alertname . "?' onclick=\"setStatus('" . $alertname . "','" . $id_head . "'," . $id . ",'" . $status_head . "',0,'" . $table . "');\">Active</span>"; 
		else 
			echo "<span id='status_" . $id . "'><a href='javascript:void(0)' class='paging_text' title='activate " . $alertname . "?' onclick=\"setStatus('" . $alertname . "','" . $id_head . "'," . $id . ",'" . $status_head . "',1,'" . $table . "');\">Inactive</span>"; 
	}
	
	function getMark($status)
	{
		if($status == 0)
			return '<img src="../images/wrong_mark.gif">';
		else
			return '<img src="../images/right_mark.gif">';		
	}
	
	function isAccountExpired($rec_id)
	{
		$objDb = new db();	
		$expired = 1;
		$activated_before = 0;
		
		//get last invoice details of plan purchase
		$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.rec_id=" . $rec_id . " and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
		$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
		if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
		{							
			//get first payment details for last invoice of plan purchased.
			$sqlFirstPay = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice->invoice_id . " and pay_status=1 order by pay_id";
			$resultFirstPay = $objDb->ExecuteQuery($sqlFirstPay);
			if($rsFirstPay = mysql_fetch_object($resultFirstPay))
			{										
				//check account expired or not		
				$activated_before = 1;
				$date2 = date("Y-m-d");
				$date1 = $rsFirstPay->pay_date;
				
				$difference = abs(strtotime($date2) - strtotime($date1));
				//calculate the number of days
				$days = round(((($difference/60)/60)/24), 0);
				
				if($days <= 30)
				{
					$expired = 0; 	
				}
			}
		}
		
		if($activated_before==0 || $expired==1)
			return 1;			
		else if($expired == 0)				
			return 0;
	}
	
function isShortListed($rec_id,$seeker_id)
{
	$objDb = new db();	
	$shortlisted = 0;
	$sqlShortlisted = "SELECT * FROM job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p 
					   WHERE p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id 
					   AND i.rec_id=" . $rec_id . " 
					   AND j.seeker_id=" . $seeker_id . " 
					   AND j.status=1";
					   
	$resultShortlisted = $objDb->ExecuteQuery($sqlShortlisted);
	
	if ($rsShortlisted = mysql_fetch_object($resultShortlisted))
		$shortlisted = 1;	
	
	return $shortlisted;
}	

function getHeadHunters($logos=0,$random=0)
{
	$objDb = new db();
	
	$head_hunters = array();	

	if($logos == 1)
		$sqlRec = "select * from job_recruiter where rec_status=1 and comp_logo!='' order by rand()";
	else	
		$sqlRec = "select * from job_recruiter where rec_status=1 order by rand()";
		
	$resultRec = $objDb->ExecuteQuery($sqlRec);

	while(($rsRec = mysql_fetch_object($resultRec)))
	{
		$rec_id = $rsRec->rec_id; 
		
		//get last invoice details
		$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.rec_id=" . $rec_id . " and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
		$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
		if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
		{			
			//get first payment details for last invoice of plan purchased.
			$sqlFirstPay = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice->invoice_id . " and pay_status=1 order by pay_id";
			$resultFirstPay = $objDb->ExecuteQuery($sqlFirstPay);
			if($rsFirstPay = mysql_fetch_object($resultFirstPay))
			{	
				$first_pay_date = $rsFirstPay->pay_date;
				
				//get the shortlisted jobseekers count
				$cntShortlisted = getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date . " and i.invoice_id>" . $rsLastInvoice->invoice_id . " and i.rec_id=" . $rec_id);													
				
				//check account expired or not		
				$activated_before = 1;
				$date2 = date("Y-m-d");
				$date1 = $rsFirstPay->pay_date;
				
				$difference = abs(strtotime($date2) - strtotime($date1));
				//calculate the number of days
				$days = round(((($difference/60)/60)/24), 0);
				
				if($days <= 30)
				{
					$expired = 0; 	
					$head_hunters[$rec_id] = $cntShortlisted;
				}				
		  }
	   }
	}
	
	if($random == 0)
		arsort($head_hunters);
	
	return $head_hunters;
}

/*............................Function to return the field $what from table $table*/
function showByName($table,$what,$where,$match_field){ // Newly added 16-3-2009
	$objDb = new db();
	$sql = "SELECT ".$what." FROM ".$table." WHERE ".$where." = '".$match_field."'";
	$result =  $objDb->ExecuteQuery($sql);
	$rsCnt = mysql_num_rows($result);
	if($rsCnt > 0 ){
		$rs = mysql_fetch_object($result);
		return $rs->$what;
	}
	else
	{
		return 0;
	}
}/*.................................End showByName()*/

/*........................................................Function show the the element value*/
function showElement($row,$col){
	$objDb = new db();
	mysql_select_db("test");
	$sql = "SELECT field_value 
	FROM job_grade_level 
	WHERE field_row = ".$row." 
	AND field_column=".		$col;	
	$res1= $objDb->ExecuteQuery($sql);
	$nums = mysql_num_rows($res1);
	if($nums <=0){
		return "--";
	}
	else
	{
		$rs = mysql_fetch_object($res1);
		$aa=$rs->field_value;
		
		return $aa;
	}
	
}/*...................Ends herer....*/

/*..................................................................... Function to check if the cell value exist */
function showId($row,$col)  // Newly added 16-3-2009
{
		$objDb = new db();
		mysql_select_db("test");
		$sql = "SELECT g_id 
		FROM job_grade_level 
		WHERE field_row = ".$row." 
		AND field_column=".$col; 	
		$res1= $objDb->ExecuteQuery($sql);
		$nums = mysql_num_rows($res1);
		$rs = mysql_fetch_object($res1);		
		$aa=$rs->g_id; //exit;
		if($nums > 0){
			
			return $aa;
		}
		else
		{
			return 0;
		} 
}/*...................Ends herer....*/


function checkCriteria()
{
	 	$Inc_flag=0;
		$qks_1 = explode("-/!-",$rsJob->qks_1) ;
		if(checkBlankJobAd($qks_1[2]) != "_____" && checkBlankJobAd($qks_1[0]) != "_____" && checkBlankJobAd($qks_1[4]) != "") {
			$Inc_flag=1; }
		
		$qks_2 = explode("-/!-",$rsJob->qks_2) ;
		if(checkBlankJobAd($qks_2[0]) != "_____" && checkBlankJobAd($qks_2[1]) != "_____" && checkBlankJobAd($qks_2[2]) != "_____" && checkBlankJobAd($qks_2[3]) != "_____") {
		$Inc_flag=1; }
		
		$qks_3 = explode("-/!-",$rsJob->qks_3) ;
		if(checkBlankJobAd($qks_3[0]) != "_____" && checkBlankJobAd($qks_3[1]) != "_____" && checkBlankJobAd($qks_3[2]) != "_____" ) {
		$Inc_flag=1; }
		$qks_4 = explode("-/!-",$rsJob->qks_4);
		if(checkBlankJobAd($qks_4[0]) != "_____" && checkBlankJobAd($qks_4[1]) != "_____" && checkBlankJobAd($qks_4[2]) != "_____" && checkBlankJobAd($qks_4[3]) != "_____" && checkBlankJobAd($qks_4[4]) != "_____") {
		 $Inc_flag=1; }
		
		$qks_5 = explode("-/!-",$rsJob->qks_5) ;
		if(checkBlankJobAd($qks_5[0]) != "_____" && checkBlankJobAd($qks_5[1]) != "_____" && checkBlankJobAd($qks_5[2]) != "_____" && checkBlankJobAd($qks_5[3]) != "_____") {
		$Inc_flag=1; }
		$qks_6 = explode("-/!-",$rsJob->qks_6) ;
		if(checkBlankJobAd($qks_6[0]) != "_____" && checkBlankJobAd($qks_6[1]) != "_____" && checkBlankJobAd($qks_6[2]) != "_____" ) {
		 $Inc_flag=1; }
		$qks_7 = explode("-/!-",$rsJob->qks_7) ;
		if(checkBlankJobAd($qks_7[0]) != "_____" && checkBlankJobAd($qks_7[1]) != "_____" ) {
		$Inc_flag=1; }
		$qks_8 = explode("-/!-",$rsJob->qks_8) ;
		if(checkBlankJobAd($qks_8[0]) != "_____" && checkBlankJobAd($qks_8[1]) != "_____" ) {
		$Inc_flag=1; }
		$qks_9 = explode("-/!-",$rsJob->qks_9) ;
		if(checkBlankJobAd($qks_9[0]) != "_____" && checkBlankJobAd($qks_9[1]) != "_____" ) {
		$Inc_flag=1; }
		$qks_10 = explode("-/!-",$rsJob->qks_10) ;
		if(checkBlankJobAd($qks_10[0]) != "_____" && checkBlankJobAd($qks_10[1]) != "_____" && checkBlankJobAd($qks_10[2]) != "_____" ) {
		$Inc_flag=1; }
		$qks_11 = explode("-/!-",$rsJob->qks_11) ;
		if(checkBlankJobAd($qks_11[0]) != "_____" && checkBlankJobAd($qks_11[1]) != "_____" ) {
		$Inc_flag=1; }
		return $Inc_flag;
}

function createDateCurrent($name,$value="",$array="")
{
	$arrDate = explode("-",$value);
	$date = "";
	$month = "";
	$year = "";
	
	if(sizeof($arrDate) == 3)
	{
		$date = $arrDate[2];
		$month = $arrDate[1];
		$year = $arrDate[0];
	}
	
	
	//date
	$str = "<select  name='" . $name . "_date" . $array . "' id='" . $name . "_date'   >
			<option value=''>Date</option>";

	for($i=1; $i<=31; $i++)
	{
		$selected = "";
		if($i == $date)	$selected = "selected";
		$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
	}
			
	$str .= "</select>&nbsp;";
	
	//month
	$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
	
	$str .= "<select  name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
			<option value=''>Month</option>";
	
	while(list($key,$val) = each($arrMonth))
	{
		$selected = "";
		if($month == $key)	$selected = "selected";
			$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
	}
			
	$str .= "</select>&nbsp;";		
	
	//year		
	$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' onClick='neverYear()'>
			<option value=''>Year</option>";		

	for($i=2009; $i<=date("Y")+50; $i++)
	{
		$selected = "";
		if($i == $year)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
	}
	$str .= "</select>";		
	return $str;
}

function createDateMonthYear($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValue(this," . $name . "_date".")'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDateMonthYearTo($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValueTo(this," . $name . "_date".")'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDateImmediately($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		//date
		$str = "<select  name='" . $name . "_date" . $array . "' id='" . $name . "_date'   >
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select  name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' onClick='ImmediatelyYear()'>
				<option value=''>Year</option>";		

		for($i=2009; $i<=date("Y")+50; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
		if($year=="Immediately")	$selected = "selected";
		$str .= "	<option value='Immediately' " . $selected . ">Immediately</option>";
		$str .= "</select>";		
		return $str;
	}
	
	function createDateMonthYearCurrent($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValue(this," . $name . "_date".")'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=date("Y"); $i<=date("Y")+5; $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDateMonthYearCurrentTo($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValueTo(this," . $name . "_date".")'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=date("Y"); $i<=date("Y")+5; $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
// This is newly added function for seeker's Part time work available days 

function partTimeAvailableTime( $dayTime , $option ) {
	switch($option){
	case "from" : return substr( $dayTime , 0,5);
	break;
	case "to" : return substr( $dayTime , 7);
	break;
	default : return "";
	break;
	}
}

// This is newly added function to get the date string for Current Status - vacation work
function setVacationToFromDate( $dateStr ){
	$seeker_alert_date		=	0;
	$seeker_alert_month	=	0;
	$seeker_alert_year		=0;
	$split_alert	=	explode( "-", $dateStr );
	$seeker_alert_date 	= 	$split_alert[2];
	$seeker_alert_month 	= 	$split_alert[1];
	$seeker_alert_year 	= 	$split_alert[0];
	return ( $seeker_alert_date." " . @jdmonthname( $seeker_alert_month, 0 ). " ".$seeker_alert_year ) ;
}
?>