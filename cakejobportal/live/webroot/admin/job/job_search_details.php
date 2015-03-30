<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$id=$_GET["id"];
		//$id=8;
		
	$objDb=new db();

	$sqlSeeker="select * from job_ad where ad_id='".$id."'";
	$resultSeeker = $objDb->ExecuteQuery($sqlSeeker);
	$rsSeeker  = mysql_fetch_object($resultSeeker); 
	//echo $rsSeeker->vacansy;
	if(($rsSeeker->vacansy=="Permanent Position") || ($rsSeeker->vacansy=="Temporary Position"))
	{
		$path="job_edit_1.php?ad_id=".$rsSeeker->ad_id;
	}
	else if($rsSeeker->vacansy=="Job attachment Position") 
	{
		$path="job_edit_3.php?ad_id=".$rsSeeker->ad_id;
	}
	else if($rsSeeker->vacansy=="Part-time Job Ad")
	{
		$path="job_edit_4.php?ad_id=".$rsSeeker->ad_id;
	}
	else if(trim($rsSeeker->vacansy)=="Bursary application Position")
	{
		$path="job_edit_bursary.php?ad_id=".$rsSeeker->ad_id;
	}
	//for back button
    if(strstr($_SERVER['HTTP_REFERER'],"/"))
	{
		
		$st=explode("/",$_SERVER['HTTP_REFERER']);
		$uu=end($st);
		if(trim($uu)=="admin_home.php")
		{
			$url="../".end($st);
		}
		else
		{
			$url=end($st);
		}
	}
	else
	{
		$url=$_SERVER['HTTP_REFERER'];
		
		if(trim($url)=="admin_home.php")
		{
			$url="../".$_SERVER['HTTP_REFERER'];
		}
		else
		{
			$url=$_SERVER['HTTP_REFERER'];
		}
	}
	
	
	//end back button
	
	
	//for filter conditions
	
	$flag1=2;
	if(isset($_SESSION["ses_seeker_id"]))
	{
		$flag1 = 0;
		//$flag1=filter($id);
	}
	
	
	/////end of filter
	
	$len=4-strlen($rsSeeker->ad_id);
	$refno="";
	while($len>0)
	{
		$refno.=0;
		$len--;
	}
	$refno .=$rsSeeker->ad_id;
		
		$sqlComp="select rec_id,rec_name from job_recruiter where rec_id=".$rsSeeker->rec_id."";
		$resultComp = $objDb->ExecuteQuery($sqlComp);
		$rsComp  = mysql_fetch_object($resultComp);
		//echo $rsComp->rec_name;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../../styles/job.css">
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
<script src="../javascript/admin.js" language="javascript"></script>
<script language="javascript" type="text/javascript">
	function goBack(url)
	{
		if(url == "")
			history.back();
		else
		{
			document.form1.action = url;
			document.form1.submit();
		}
	}
</script>

<script language="javascript">
 function search_seekers()
 {
	document.form1.submit();
 }
</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 <form name="form1" method="post" action="seeker_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td width="91%" height="30" class="heading_black" >&nbsp;Job Details </td>
                                  <td width="9%"><a href="<?=$path?>&url=job_search_result.php&urlPage=<?=$_REQUEST['urlPage']?>"  class="left_link_bold">Edit Job</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                         
										<td   >You are viewing the job advert <span class="subhead_gray_small">ref.<? echo($refno); ?></span> entitled  <span class="subhead_gray_small"><? echo($rsSeeker->position_name); ?></span> posted by  <span class="subhead_gray_small"><? echo($rsComp->rec_name);?></span> </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                         
                          <tr>
                            <td align="left"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
								
								<tr>
								  <td  valign="top"><table width="100%" cellpadding="6" cellspacing="0" >
									
									<tr>
										<td width="4%">&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Job Reference</td>
										<td width="70%" ><?=$refno?></td>
									</tr>
									<tr class="table_alternate_row_noboder">
										<td bgcolor="#ffffff">&nbsp;</td>
										<td width="26%" class="subhead_gray_small" >Job Title</td>
										<td width="70%" ><?=$rsSeeker->position_name?></td>
									</tr>
									<tr>
										<td width="4%">&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Job Category </td>
										<td width="70%" ><?=$rsSeeker->level?></td>
									</tr>
									<tr class="table_alternate_row_noboder">
										<td bgcolor="#ffffff">&nbsp;</td>
										<td width="26%" class="subhead_gray_small" >Job Description</td>
										<td width="70%" ><?=$rsSeeker->job_desc?></td>
									</tr>
									<tr >
										<td bgcolor="#ffffff">&nbsp;</td>
										<td width="26%" class="subhead_gray_small" >Skills</td>
										<td width="70%" ><?=$rsSeeker->job_skills?></td>
									</tr>
									<tr class="table_alternate_row_noboder">
										<td width="4%" bgcolor="#ffffff">&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Employment Type </td>
										<td width="70%" ><?=$type?></td>
									</tr>
							 		<tr>
										<td width="4%">&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Salary Range </td>
										<td width="70%" >R<?=number_format($rsSeeker->salary_from,2)?> - R<?=number_format($rsSeeker->salary_to,2)?>&nbsp;pa</td>
									</tr>
									<tr class="table_alternate_row_noboder">
										<td width="4%"  bgcolor="#FFFFFF">&nbsp;</td>
										<td width="26%" class="subhead_gray_small" >Benefits </td>
										<td width="70%" ><?=$rsSeeker->job_benefits?></td>
									</tr>
									<tr  >
										<td width="4%"   >&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Qualification </td>
										<td width="70%" ><?=$rsSeeker->min_ter_qualification?><? if($rsSeeker->min_sec_qualification !=""){  echo("  or  ".$rsSeeker->min_sec_qualification); }  ?></td>
									</tr>
									<tr class="table_alternate_row_noboder">
										<td width="4%" bgcolor="#FFFFFF">&nbsp;</td>
										<td width="26%" class="subhead_gray_small" >Experience</td>
										<td width="70%" ><?=$rsSeeker->experience?> years experience </td>
									</tr>
									<tr >
										<td width="4%"  >&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Job location</td>
										<td width="70%" ><?=$rsSeeker->town?></td>
									</tr>
									<tr class="table_alternate_row_noboder">
										<td width="4%"  bgcolor="#FFFFFF">&nbsp;</td>
										<td width="26%" class="subhead_gray_small" >Post Date</td>
										<td width="70%" ><?=getDateValue($rsSeeker->ad_date)?></td>
									</tr>
									<tr  >
										<td width="4%"  >&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Equity Status</td>
										<td width="70%" ><?=$rsSeeker->filter_equity_status?></td>
									</tr>
									<tr class="table_alternate_row_noboder" >
										<td width="4%" bgcolor="#FFFFFF" >&nbsp;</td>
										<td width="26%" class="subhead_gray_small">Gender</td>
										<td width="70%" ><? if($rsSeeker->filter_gender=="Either") { echo("Male of Female"); } else {  echo($rsSeeker->filter_gender);} ?></td>
									</tr>
						 		 </table>
								</td></tr>
								<tr>
                                  <td >&nbsp;</td>
							  </tr>
								<br>
								<tr>
									<td class="heading_black" > <br>
								  &nbsp;&nbsp;Contact Information</td>
								</tr>
								<tr>
									<td>
										<table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
											<td width="5"></td>
											 
											<td height="30"  >Contact information of the employer. </td>
										
										  </tr>
									  </table>
									
									</td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>
								
								
								<tr>
								  <td valign="top"><table width="100%" cellpadding="6" cellspacing="0" >
								    <tr>
                                      <td colspan="3" >&nbsp; </td>
							        </tr>
									
                                    <tr class="table_alternate_row_noboder">
                                      <td bgcolor="#ffffff">&nbsp;</td>
                                      <td width="26%" class="subhead_gray_small" >Company</td>
                                      <td width="70%" ><?=$rsComp->comp_name?></td>
                                    </tr>
                                    <tr>
                                      <td width="4%">&nbsp;</td>
                                      <td width="26%" class="subhead_gray_small">Contact Person </td>
                                      <td width="70%" ><?=$rsComp->rec_name?></td>
                                    </tr>
                                    <tr class="table_alternate_row_noboder">
                                      <td bgcolor="#ffffff">&nbsp;</td>
                                      <td width="26%" class="subhead_gray_small" >Contact email </td>
                                      <td width="70%" ><span class="terms"><?=$rsComp->rec_email?></span></td>
                                    </tr>
                                    <tr >
                                      <td height="32" bgcolor="#ffffff">&nbsp;</td>
                                      <td width="26%" class="subhead_gray_small" >Postal address</td>
                                      <td width="70%" ><?=$rsComp->rec_address?></td>
                                    </tr>
                                    <tr class="table_alternate_row_noboder">
                                      <td width="4%" bgcolor="#ffffff">&nbsp;</td>
                                      <td width="26%" class="subhead_gray_small">Contact Telephone</td>
                                      <td width="70%" ><?=$rsComp->rec_phone?></td>
                                    </tr>
                                    <tr >
                                      <td width="4%"  bgcolor="#FFFFFF">&nbsp;</td>
                                      <td width="26%" class="subhead_gray_small" valign="top" >Other Question </td>
                                      <td width="70%" >
											<table cellpadding="3" cellspacing="2" border="0" width="100%">
											<? 
												$flagQues = 0;
												for($i=1;$i<=5;$i++)
											    {
											   		$que="ques".$i;
													if($rsSeeker->$que !="")
													{	
														$flagQues = 1;
													}
												}
												if($flagQues == 1)
												{
											?>											
											<? 
												}
												for($i=1;$i<=5;$i++)
											   {
											   		$que="ques".$i;
													if($rsSeeker->$que !="")
													{	
											?>
											<tr>
												<td valign="top"><?=$rsSeeker->$que?>												</td>
											  </tr>
											<?		}
											}?>
										</table>
										 
								      </td>
                                    </tr>
									
                                  </table></td>
								</tr>
								<tr>
									  <td class="sectionheading" align="center" ><br><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>');" style="cursor:pointer">&nbsp;&nbsp;</td>
								</tr>
							</table></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                        </table>
						</td>						
					</tr>
		   </table>  
			<!-- Page Body End-->		
		   </form>
         </td>
     </tr>    
     <tr>
	 	<td>
			<? include("includes/bottom.php"); ?>
		</td>          
     </tr>
</table>
</body>
</html>

