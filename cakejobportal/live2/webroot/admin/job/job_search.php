<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$seeker_keywords = "";	
	$seeker_category = "";	
	$seeker_jobcity = "";	
	$seeker_type = "";	
	$seeker_salary_from = "";	
	$seeker_salary_to = "";	
	$seeker_equity = "";		
	$job_status = "";					
	$expire_status = "";	
	$seeker_ref="";
	$reg_date_from = '';
	$reg_date_to = '';
			
	if(isset($_POST['seeker_keywords']))
	{
		$seeker_keywords = $_POST['seeker_keywords'];
		$seeker_category = $_POST['seeker_category'];
		$seeker_jobcity = $_POST['seeker_jobcity'];
		$seeker_type = $_POST['seeker_type'];
		$seeker_salary_from = $_POST['seeker_salary_from'];
		$seeker_salary_to = $_POST['seeker_salary_to'];
		$seeker_equity = $_POST['seeker_equity'];
		$job_status = $_POST['job_status'];				
		$expire_status = $_POST['expire_status'];	
		$seeker_ref=$_POST['seeker_ref'];	
		$reg_date_from=$_POST['reg_date_from'];
		$reg_date_to=$_POST['reg_date_to'];										
	}
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
<script src="../../javascript/job.js" language="javascript"></script>
<script language="javascript" type="text/javascript">
 function submitform()
 {
 	
		if(document.form1.seeker_salary_from.value !="")
		{
			flag = checkNumber("Please enter numbers only in salary range.",document.form1.seeker_salary_from);
			if(flag == false) return false;
		}
		
		if(document.form1.seeker_salary_to.value !="")
		{
			flag = checkNumber("Please enter numbers only in salary range.",document.form1.seeker_salary_to);
			if(flag == false) return false;
		}
		if(document.form1.seeker_salary_from.value !="" &&  document.form1.seeker_salary_to.value !="")
		{
				if(document.form1.seeker_salary_from.value > document.form1.seeker_salary_to.value )
				{
					alert("please enter salary to range greater than salary from range.");
					document.form1.seeker_salary_to.focus();
					return false;
				}
		}	
		if(validateJob())
		{	
			document.form1.method="post";
			document.form1.action="job_search_result.php";
			document.form1.submit();
			return true;
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
		 <form name="form1" method="post" action="seeker_list.php" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Job Search </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can search the job here.</td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
						  
                          <tr>
                            <td align="left"><table width="800" cellpadding="5" cellspacing="0">
                              
                              <?
								  if(isset($_GET['msg']) && $_GET['msg'] == "not_found")
								  {
							  ?>
                              <tr>
                                <td colspan="3"><table width="100%" cellpadding="2" cellspacing="0">
                                    <tr>
                                      <td width="5%" rowspan="3"><img src="../../images/redcross.gif" align="absmiddle"></td>
                                      <td width="95%" class="star">No Jobs Found. </td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
						 		 <?
								}
							?>
                              <tr>
                                <td width="15" >&nbsp;</td>
                                <td width="763"   colspan="2"><table cellpadding="5" cellspacing="0" border="0" width="95%" align="left">
										 <tr>
											  <td  >Reference number </td>
											  <td colspan="2"  ><input type="text" name="seeker_ref" id="seeker_ref" value="<?=$seeker_ref?>" ></td>
										  </tr>
											<tr>
												<td width="24%"  >Keywords</td>
										        <td colspan="2"  ><input type="text" name="seeker_keywords" id="seeker_keywords" value="<?=$seeker_keywords?>" ></td>
											</tr>
											<tr>
											  <td >Category</td>
										      <td colspan="2"  ><?=fill_dropdown("seeker_category",'job_options','option_name', "option_name",$seeker_category,"All","where category_id=14");?></td>
											</tr>
											<tr>
											  <td >Location</td>
										      <td colspan="2"  ><?=fill_dropdown("seeker_jobcity","job_city","city_name","city_name",$seeker_jobcity,"select"); ?></td>
											</tr>
											<!--<tr>
											  <td >Type</td>
										      <td colspan="2" ><input type="radio" name="seeker_type" value="F"  id="seeker_type" <? //if($seeker_type == "F" || $seeker_type == "") echo "checked"; ?>>
													Full Time
													<input type="radio" name="seeker_type"  id="seeker_type" value="P" <? //if($seeker_type == "P") echo "checked"; ?>>
													  Part Time
													<input type="radio" name="seeker_type"  id="seeker_type" value="C" <? //if($seeker_type == "C") echo "checked"; ?>>
													  Contract
													<input type="radio" name="seeker_type" id="seeker_type" value="T" <? //if($seeker_type == "T") echo "checked"; ?>>
													  Temp </td>
												</tr>-->
												<tr>
												  <td   >&nbsp;</td>
												  <td width="23%"  >From</td>
									              <td width="53%"  >To</td>
									  </tr>
												<tr>
												<td   >Salary Desired </td>
											    <td  ><input name="seeker_salary_from" type="text" id="seeker_salary_from" value="<?=$seeker_salary_from?>" > </td>
											    <td  ><input name="seeker_salary_to" type="text" id="seeker_salary_to" value="<?=$seeker_salary_to?>" >
											    &nbsp;&nbsp;<span class="comment">per year</span> </td>
											</tr>
											<tr>
												<td>Registered Date</td>
												
												<td valign="top" class="normal_black" colspan="2">
													<table cellpadding="0" cellspacing="0">
														<tr>
															<td width="255" height="20" class="normal_text">From</td>
															<td width="277" class="normal_text">To</td>
														</tr>
														<tr>
															<td><?=createDate('reg_date_from',$reg_date_from)?></td>
															<td><?=createDate('reg_date_to',$reg_date_to)?></td>
														</tr>										
													</table>
												</td>
                   						    </tr>
											<tr>
												<td>Equity Status</td>
										      	<td colspan="2"><?=fill_dropdown("seeker_equity","job_options","option_name","option_name",$seeker_equity,"Select","where category_id=9"); ?> 
											</td>
											</tr>
											<tr>
											  <td  >Expired</td>
											  <td colspan="2"  ><span class="comment">
											    <select name="expire_status" id="expire_status">
                                                  <option value="select" <? if($expire_status == "") echo "selected"; ?>>Select</option>
                                                  <option value="1" <? if($expire_status == "1") echo "selected"; ?>>Yes</option>
                                                  <option value="0" <? if($expire_status == "0") echo "selected"; ?>>No</option>
                                                </select>
											  </span></td>
								  </tr>
											<tr>
											  <td  >Job Status</td>
											  <td colspan="2"  >
											    <select name="job_status" id="job_status">
                                                  <option value="1,0" <? if($job_status == "1,0") echo "selected"; ?>>Select</option>
                                                  <option value="1" <? if($job_status == "1") echo "selected"; ?>>Active</option>
                                                  <option value="0" <? if($job_status == "0") echo "selected"; ?>>Inactive</option>
                                                </select>
											 </td>
								  </tr>
											<tr>
												<td  >&nbsp;</td>
										      <td colspan="2"  ><a href="#" onClick="submitform();"><img src="../../images/search.gif" width="48" height="20" border="0"></a> </td>
											</tr>
									</table></td>
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

