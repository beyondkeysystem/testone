220 BulletProof FTP Server ready ...
tt="3")
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
	
?>

		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="4">
					
					
					<tr>
						<td width="782">
							<table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
								
								<tr>
									<td class="jobseekerheading" height="50" ><?php echo 'Job seeker'; ?></td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>	
								<tr>
									<td class="headingRegister" ><?php echo 'job_search'; ?></td>
								</tr>
                                                                <tr>
									<td class="sectionheading" ><?php echo "Search Result"?> </td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>
								 <tr>
                                          
								<td ><?php echo "Your search returned the following results.<br>
                                                                Click on a job to view details and/or submit a job application";?> </td>
							  </tr>
								<tr>
								  <td align="center" ><br><br>
									<table width="90%" cellpadding="6" cellspacing="0" class="table_black_border">
							  	<tr>
								<td class="table_head"><?php echo "Job ad Name";?></td>
								<td class="table_head"><?php echo 'Company';?></td>
								<td class="table_head"><?php echo 'Location';?> </td>
								<td class="table_head"><?php echo 'Vacancy Type';?> </td>
								<td class="table_head">Post Date </td>
								<td class="table_head_end"><?php echo 'Add To Bookmark';?> </td>
							  </tr>
							  <?
								
								
								
								$i = 1;
								foreach($resultSeeker as $rsSeeker)
                                                                { 
                                                                    //print_r($rsSeeker);
									$sqlComp="select comp_name from job_recruiter where rec_id='".$rsSeeker->job_ad->rec_id."'";
									//$resultComp = $objDb->ExecuteQuery($sqlComp);
									//$rsComp  = mysql_fetch_object($resultComp);
									$cntBook=0;
									if(isset($_SESSION["ses_seeker_id"]))
									{
										$sqlBook="select * from  job_bookmark_jobseeker where ad_id='".$rsSeeker->job_ad->ad_id."' and seeker_id='".$_SESSION["ses_seeker_id"]."'";
										//$resultBook = $objDb->ExecuteQuery($sqlBook);
										//$cntBook=mysql_num_rows($resultBook);
									}
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
								<tr>
									<td width="23%" class="<?=$td_class?>"><a href="job_search_details?id=<?=$rsSeeker->job_ad->ad_id?>" class="link_dark_blue">
									  <?=$rsSeeker->job_ad->position_name ?>
									</a></td>
									<td width="23%" class="<?=$td_class?>"><?=$rsComp->comp_name?>&nbsp;</td>
									<td width="18%" class="<?=$td_class?>"><?=$rsSeeker->job_ad->town?>&nbsp;</td>
									<td width="17%" class="<?=$td_class?>"><?=$rsSeeker->job_ad->vacansy?></td>
									<td width="17%" class="<?=$td_class?>"><?php echo getDateValue($rsSeeker->job_ad->ad_date,3); ?>&nbsp;</td>
									<td width="19%" align="center" class="<?=$td_class?>_end"><? if($cntBook!=0){ echo("Bookmarked"); } else {?>
									<input type="checkbox" name="chk[]" id= "chk" value="<?=$rsSeeker->job_ad->ad_id?>"><? } ?></td>
								</tr>
							  <?
									$i++;
								}
							  ?>
						  </table>
								</td></tr>
								
								
								<tr>
								  <td valign="top"><br><table width="95%" cellpadding="0" cellspacing="0" >
                                    <tr>
                                      <td align="right"><a href="#" onClick="return add_to_bookmark();"><img src="../images/bokmark_these_jobs.gif" border="0"></a></td>
                                    </tr>
                                  </table></td>
							  </tr>
					