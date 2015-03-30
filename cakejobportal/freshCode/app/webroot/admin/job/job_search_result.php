<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	//echo $_SERVER['HTTP_REFERER'];
	if(strstr($_SERVER['HTTP_REFERER'],"/"))
	{
		$st=explode("/",$_SERVER['HTTP_REFERER']);
		$uu=end($st);
		if(trim($uu)=="admin_home.php")
		{
			$uu="../".end($st);
		}
		else
		{
			$uu=end($st);
		}
	}
	else
	{
		
		$uu=$_SERVER['HTTP_REFERER'];
		if(trim($uu)=="admin_home.php")
		{
			$uu="../".$_SERVER['HTTP_REFERER'];
		}
		else
		{
			$uu=$_SERVER['HTTP_REFERER'];
		}
	}
	//echo "<br>".$uu; 
	//echo $uu; exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<?  
	$objDb=new db();
	$dd=date("Y-m-d");
	$job_st="1,0";
	if(isset($_POST["job_status"]))
	{
		$sqlSeeker = "select * from job_ad where job_status in (" . $_POST['job_status'] . ") ";
		$job_st=$_POST["job_status"];
	}
	else if(isset($_GET["job_status"])){
		$sqlSeeker = "select * from job_ad where job_status in (" . $_GET['job_status'] . ") ";
		$job_st=$_GET["job_status"];
	}
	else
	{
		$sqlSeeker = "select * from job_ad where job_status in (1,0) ";	
		$job_st="1,0";
	}
	if(isset($_POST['expire_status']) && $_POST['expire_status'] =="1")
	{
		$sqlSeeker .=" and  adTo <'".$dd."'";
	}
	else if(isset($_POST['expire_status']) && $_POST['expire_status'] =="0")
	{
		$sqlSeeker .=" and adFrom <='".$dd."' and  adTo >='".$dd."'";
	}
	else if(isset($_GET['expire_status']) && $_GET['expire_status'] == "1")
	{
		$sqlSeeker .=" and  adTo <'".$dd."'";
	}
	else if(isset($_GET['expire_status']) && $_GET['expire_status'] == "0")
	{
		$sqlSeeker .=" and adFrom <='".$dd."' and  adTo >='".$dd."'";
	}	
	
	if(isset($_GET['city']) && $_GET['city'] != 'more places')
	{
		$sqlSeeker .= " and town='" . $_GET['city'] . "'";
	}
	//for from date	
	
	if(isset($_POST['reg_date_from_date']) && $_POST['reg_date_from_date'] !="")
	{
		$from=$_POST['reg_date_from_year']."-".$_POST['reg_date_from_month']."-".$_POST['reg_date_from_date'];
		$sqlSeeker .=" and  ad_date >='".$from."'";
	}
	if(isset($_POST['reg_date_to_date']) && $_POST['reg_date_to_date'] !="")
	{
		$to=$_POST['reg_date_to_year']."-".$_POST['reg_date_to_month']."-".$_POST['reg_date_to_date'];
		$sqlSeeker .=" and  ad_date <='".$to."'";
	}
	
	
	if(isset($_POST['seeker_ref']) && $_POST['seeker_ref'] != "")
	{
		$sqlSeeker .= " and ad_id=" . $_POST["seeker_ref"] ;
	}	
	
	if(isset($_POST['seeker_keywords']) && $_POST['seeker_keywords'] != "")
	{
		//for skills
		$skills = str_replace(","," ",$_POST['seeker_keywords']); 
		$arr_skills = explode(" ",$skills);
		$skills	= "";
		$sqlSeeker .=" and ((";
		foreach($arr_skills as $skill)
		{
			if(trim($skill) != "")
			{
				$sqlSeeker .= " job_skills like '%" . $skill . "%' or ";
			}
		}							
		
		if(strlen($sqlSeeker) > 3)		
		{
			$sqlSeeker = substr($sqlSeeker,0,strlen($sqlSeeker) - 3) . ")";
		}
		
		//for position
		$sqlSeeker .=" or (position_name like '%" . $_POST["seeker_keywords"] ."%' )";
		
		//for city
		$sqlSeeker .=" or (town like '%" . $_POST["seeker_keywords"] ."%' ) )";		
		
	}
	
	if((isset($_POST["seeker_jobcity"])) && $_POST["seeker_jobcity"]!="")
	{
		$sqlSeeker .=" and town Like '%".$_POST["seeker_jobcity"]."%'"; 
	}
	
	
	if((isset($_POST["seeker_category"])) && $_POST["seeker_category"]!="")
	{
		$sqlSeeker .="  and  level = '".$_POST["seeker_category"]."'"; 
	}
	
	if((isset($_POST["seeker_salary_from"])) && $_POST["seeker_salary_from"]!="")
	{
		$sqlSeeker .="  and ";
		if((isset($_POST["seeker_salary_to"])) && $_POST["seeker_salary_to"]!="")
		{
			$sqlSeeker .=" ( ";
		}
		$sqlSeeker .=" (salary_from <= '".$_POST["seeker_salary_from"]."' and salary_to >= '".$_POST["seeker_salary_from"]."')"; 
	}
	if((isset($_POST["seeker_salary_to"])) && $_POST["seeker_salary_to"]!="")
	{
		if((isset($_POST["seeker_salary_from"])) && $_POST["seeker_salary_from"]!="")
		{
			$sqlSeeker .=" or (salary_from <= '".$_POST["seeker_salary_to"]."' and salary_to >= '".$_POST["seeker_salary_to"]."'))"; 
		}
		else
		{
			$sqlSeeker .="  and (salary_from <= '".$_POST["seeker_salary_to"]."' and salary_to >= '".$_POST["seeker_salary_to"]."')";
		}
	}
	
	if((isset($_POST["seeker_type"]) ) && $_POST["seeker_type"]!="")
	{
		$sqlSeeker .="  and  type Like '%".$_POST["seeker_type"]."%'"; 
	}
	if((isset($_POST["seeker_salary"])) && $_POST["seeker_salary"]!="")
	{
		$sqlSeeker .="  and salary_offered Like '%".$_POST["seeker_salary"]."%'"; 
	}
	if((isset($_POST["seeker_equity"])) && $_POST["seeker_equity"]!="")
	{
		$sqlSeeker .="  and filter_equity_status Like '%".$_POST["seeker_equity"]."%'"; 
	}
	
	$sqlSeeker .=" order by ad_date desc";
	//echo($sqlSeeker);
	$resultSeeker1 = $objDb->ExecuteQuery($sqlSeeker);	
	$rowCount1 = mysql_num_rows($resultSeeker1);
	
	$cPage ="" ;
	$page45=1;
	if(isset($_REQUEST['cPage']))
	{
		$page45 = $_REQUEST['cPage'];
		if($rowCount1>0)
		{
			if($rowCount1==($page45)*10)
			{
				$page45=$_REQUEST['cPage']-1 ;
			}
			else
			{
				$page45=$_REQUEST['cPage'] ;
			}
		}
		
		
	}
	
	$cPage = ( isset($_REQUEST['cPage']) ) ? $page45 : '1';
	$baseURL= $_SERVER['PHP_SELF'];
	
	$j = 0;
	if(isset($_REQUEST['cPage']))
	{
		$page = $_REQUEST['cPage'];
		if($rowCount1>0)
		{
			if($rowCount1==($page)*10)
			{
				$j=($page-2)*10 ;
			}
			else
			{
				$j=($page-1)*10 ;
			}
		}
	}
		
	$pagination= new gsdPagination($sqlSeeker,$cPage,'20',$baseURL);	
	$sqlSeeker = $pagination->rQuery;	
	$resultSeeker = $objDb->ExecuteQuery($sqlSeeker);	
	$rowCount = mysql_num_rows($resultSeeker);
	
	
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
<script language="javascript">
function viewDetails(location)
{
	document.form1.method="post";	
	document.form1.action = location + "&url=job_search_result.php&urlPage=<?=$cPage?>";
	document.form1.submit();
}
	
function paging(pageno)
 {
	 document.form1.method = "post";
	 document.form1.action = "job_search_result.php?cPage=" + pageno;
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
		 <form name="form1" method="post">
		 
		 <input type="hidden" name="seeker_keywords" value="<? if(isset($_POST['seeker_keywords'])) echo $_POST['seeker_keywords']; ?>"> 		 
		 <input type="hidden" name="seeker_category" value="<? if(isset($_POST['seeker_category'])) echo $_POST['seeker_category']; ?>"> 		 
		 <input type="hidden" name="seeker_jobcity" value="<? if(isset($_POST['seeker_jobcity'])) echo $_POST['seeker_jobcity']; ?>"> 		 
		 <input type="hidden" name="seeker_type" value="<? if(isset($_POST['seeker_type'])) echo $_POST['seeker_type']; ?>"> 		 
		 <input type="hidden" name="seeker_salary_from" value="<? if(isset($_POST['seeker_salary_from'])) echo $_POST['seeker_salary_from']; ?>"> 		 
		 <input type="hidden" name="seeker_salary_to" value="<? if(isset($_POST['seeker_salary_to'])) echo $_POST['seeker_salary_to']; ?>"> 		 
		 <input type="hidden" name="seeker_equity" value="<? if(isset($_POST['seeker_equity'])) echo $_POST['seeker_equity']; ?>"> 		 
		 <input type="hidden" name="expire_status" value="<? if(isset($_POST['expire_status'])) echo $_POST['expire_status']; ?>"> 		 
		 <input type="hidden" name="seeker_ref" value="<? if(isset($_POST['seeker_ref'])) echo $_POST['seeker_ref']; ?>"> 		 
		 <input type="hidden" name="reg_date_from" value="<? if(isset($_POST['reg_date_from'])) echo $_POST['reg_date_from']; ?>"> 		 
		 <input type="hidden" name="reg_date_to" value="<? if(isset($_POST['reg_date_to'])) echo $_POST['reg_date_to']; ?>"> 		 		 		 		 		 		 		 
		 <input type="hidden" name="job_status" value="<?=$job_st?>"> 		 		 		 		 		 		 		 
		
		<?  
			if(mysql_num_rows($resultSeeker) <= 0)
			{
				echo ("<script language='javascript'>document.form1.action='job_search.php?msg=not_found'; document.form1.submit();</script>");  exit();
			}
		?>
			<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td width="73%" height="30" class="heading_black" >&nbsp; Job List</td>
                                  <td width="27%" align="right" class="heading_black" >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of all search jobs. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
						  <? if($rowCount>0) { ?>    
                          <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
						  <? } ?>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
				  
                          <tr>
                            <td align="center">
							   <? if(mysql_num_rows($resultSeeker)>0)
								  	 {
									?>
							   <table width="90%" cellpadding="6" cellspacing="0" class="table_black_border">
                                 <tr align="left">
                                   <td class="table_head">Job reference no. </td>
                                   <td class="table_head">Job ad Name</td>
                                   <td class="table_head">Company</td>
                                   <td class="table_head">Location </td>
                                   <td class="table_head">Post Date </td>
                                   <td class="table_head">Expired</td>
                                   <td class="table_head_end">Status</td>
                                 </tr>
                                 <?
								
								
								
								$i = 1;
								while($rsSeeker = mysql_fetch_object($resultSeeker))
								{
									$sqlComp="select comp_name from job_recruiter where rec_id='".$rsSeeker->rec_id."'";
									$resultComp = $objDb->ExecuteQuery($sqlComp);
									$rsComp  = mysql_fetch_object($resultComp);
									$ex="";
									if($rsSeeker->adTo>=$dd)
									{
										$ex="No";
									}
									else
									{
										$ex="Yes";
									}
									
									$len=4-strlen($rsSeeker->ad_id);
									$refno="";
									while($len>0)
									{
										$refno.=0;
										$len--;
									}
									$refno .=$rsSeeker->ad_id;
									
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                 <tr align="left">
                                   <td width="13%" class="<?=$td_class?>"><?=$refno?></td>
                                   <td width="21%" class="<?=$td_class?>"><a href="#" onClick="viewDetails('job_search_details.php?id=<?=$rsSeeker->ad_id?>');" class="paging_text" title="Click to view job details.">
                                     <?
									 if(trim($rsSeeker->vacansy)=="Bursary application Position")
									{
										echo $rsSeeker->bursary_name; 
									} else {
										echo $rsSeeker->position_name; 
									 
									}
									?>
                                   </a>&nbsp;</td>
                                   <td width="21%" class="<?=$td_class?>"><?=$rsComp->comp_name?>
                               &nbsp;</td>
                                   <td width="15%" class="<?=$td_class?>"><?=$rsSeeker->town?>
                               &nbsp;</td>
                                   <td width="11%" class="<?=$td_class?>"><?=getDateValue($rsSeeker->ad_date,3);?>
                               &nbsp;</td>
                                   <td width="9%" class="<?=$td_class?>"><?=$ex?></td>
                                   <td width="10%" class="<?=$td_class?>_end">
                                     <?=showStatus('job','ad_id',$rsSeeker->ad_id,'job_status',$rsSeeker->job_status,'job_ad'); ?>
                                   </td>
                                 </tr>
                                 <?
									$i++;
								}
							  ?>
                              </table>
						      <? } ?>
							</td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle"><table width="50%" height="26"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" class="normal_black"><? if($rowCount>0) echo $pagination->buildNavigation('paging_text');?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="seller_list_paging"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center"><? if($rowCount>0) { ?><img src="../../images/back.gif" border="0"   onClick="location.href='<?=trim($uu)?>'" style="cursor:pointer"><? } ?></td>
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

