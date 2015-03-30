<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
	require_once("../../includes/functions.php");	
	$objDb = new db();
	$sqlplan = "select * from  job_rec_payment_plans where plan_id='".$_GET["pid"]."'";
	$resultplan = $objDb->ExecuteQuery($sqlplan);
	$rsplan=mysql_fetch_object($resultplan);
	
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


<script language="javascript">
 
 
 function displayRate(id)
 {
 	if(id==1)
	{
		document.getElementById("rate_row").style.display="";
		document.getElementById("positions_row").style.display="";
		document.getElementById("unlimited_job_ads").disabled=false;
		document.getElementById("number_job").disabled=false;
		document.getElementById("number_job").value="";
	}
	else if(id==2)
	{
		document.getElementById("rate_row").style.display="none";
		document.getElementById("positions_row").style.display="none";
		document.getElementById("unlimited_job_ads").checked="";
		document.getElementById("unlimited_job_ads").disabled=true;
		document.getElementById("number_job").value="1";
		document.getElementById("number_job").disabled=true;
	}
 }
 
 function editPlan(pid)
 {
 	if (document.getElementById("plan_exists").innerHTML.length > 10)
	{
		alert("This plan name is already exists.");
		document.form1.plan_name.focus();
		return false;
	}
	if(validatePlan())
	{
		document.form1.method="post";
		document.form1.action="plan_edit_action.php?pid="+pid;
		document.form1.submit();
	}
 }
 function check_job(val)
 {
 	if(val.checked)
	{
		document.getElementById("number_job").value="";
		document.getElementById("number_job").disabled=true;
		document.getElementById("rate_position").style.display="none";
	}
	else
	{
		document.getElementById("number_job").value="";
		document.getElementById("number_job").disabled=false;
		document.getElementById("rate_position").style.display="";
	}
 }
 function check_job_load(val)
 {
 	
	if(val=="1")
	{
		document.getElementById("number_job").value="";
		document.getElementById("number_job").disabled=true;
		document.getElementById("rate_position").style.display="none";
	}
	else
	{
		//document.getElementById("number_job").value="";
		document.getElementById("number_job").disabled=false;
		document.getElementById("rate_position").style.display="";
	}
 }
 function disable_check()
 {
 	
	if(document.getElementById("number_job").value!="")
	{
		document.getElementById("unlimited_job_ads").checked=false;
		document.getElementById("unlimited_job_ads").disabled=true;
 	}
	else
	{
		//alert(document.getElementById("unlimited_job_ads").checked);
		document.getElementById("unlimited_job_ads").checked=false;
		document.getElementById("unlimited_job_ads").disabled=false;
	}
 }
 function disable_check_load()
 {
 	
	if(document.getElementById("number_job").value!="")
	{
		document.getElementById("unlimited_job_ads").checked=false;
		document.getElementById("unlimited_job_ads").disabled=true;
 	}
	else
	{
		//alert(document.getElementById("unlimited_job_ads").checked);
		//document.getElementById("unlimited_job_ads").checked=false;
		document.getElementById("unlimited_job_ads").disabled=false;
	}
 }
 
</script>
</head>
<body onLoad="check_job_load('<?=$rsplan->unlimited_job_ads?>');disable_check_load();MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 <form name="form1" method="post" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Edit Payment Plan </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can edit the payment plan here. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><table width="700" border="0" align="center" cellpadding="8" cellspacing="0" class="table_black_border">
									  <tr>
                                        <td class="td_border_bottom_right">Plan Name </td>
                                        <td class="td_border_bottom_right"><input type="text" name="plan_name" onblur="checkPlan('plan_exists');" value="<?=$rsplan->plan_name?>">
                                          <img src="../../images/star.gif"> <span class="error" id="plan_exists"></span></td>
                                      </tr>
									  <tr>
                                        <td class="td_border_right">Post unlimited number of job ads </td>
                                        <td class="td_border_right"><input type="checkbox" name="unlimited_job_ads" id="unlimited_job_ads" value="1" <? if($rsplan->unlimited_job_ads==1){ echo("checked"); }?> onClick="check_job(this);" disabled="true" > </td>
                                      </tr>
									    <tr>
									    <td class="td_border_right">Insert Number of job ads </td>
									    <td class="td_border_right">
										<input name="number_job" type="text" disabled="true" id="number_job"  size="4" onKeyUp="disable_check();" value="<?=$rsplan->number_job?>"> 
										<span class="small_black">Insert the number of job ads that can be posted per month </span></td>
						      </tr>
									  <tr>
                                        <td class="td_border_right">System shortlisting </td>
                                        <td class="td_border_right"><input type="checkbox" name="system_shortlisting" value="1" <? if($rsplan->system_shortlisting==1){ echo("checked"); }?>  ></td>
                                      </tr>
									  <tr>
                                        <td class="td_border_right">System regret function</td>
                                        <td class="td_border_right"><input type="checkbox" name="regret_function" value="1" <? if($rsplan->regret_function==1){ echo("checked"); }?>></td>
                                      </tr>
									  <tr>
                                        <td class="td_border_right">Client talent database creation </td>
                                        <td class="td_border_right"><input type="checkbox" name="client_talent" value="1" <? if($rsplan->client_talent==1){ echo("checked"); }?>></td>
                                      </tr>
									  <tr>
                                        <td class="td_border_right">Full access to immediately available jobseekers. </td>
                                        <td class="td_border_right"><input type="checkbox" name="full_access_jobseekers" value="1"  <? if($rsplan->full_access_jobseekers==1){ echo("checked"); }?>></td>
                                      </tr>
									  <tr>
                                        <td class="td_border_right">Client logo display</td>
                                        <td class="td_border_right"><input type="checkbox" name="client_logo" value="1" <? if($rsplan->client_logo==1){ echo("checked"); }?>></td>
                                      </tr>
									  <tr>
                                        <td class="td_border_bottom_right">Intercompany advertisement </td>
                                        <td class="td_border_bottom_right">
                                          <input type="checkbox" name="intercompany_ad" value="1" <? if($rsplan->intercompany_ad==1){ echo("checked"); }?>>
                                        </td>
                                      </tr>
									  <tr>
                                        <td class="td_border_bottom_right">Subscription</td>
                                        <td valign="top" class="td_border_bottom_right"><input name="subscription" onClick="displayRate(2);" type="radio" value="free"  <? if($rsplan->rate==0){ echo("checked"); }?>>
                                        Free 
                                        <input name="subscription" type="radio" value="paid" onClick="displayRate(1);"  <? if($rsplan->rate!=0){ echo("checked"); }?>>
                                        Paid</td>
                                      </tr>
									  
									  <tr id="rate_row" <? if($rsplan->rate==0){?> style="display:none" <? } ?>>
                                        <td class="td_border_bottom_right" >Rate (N$)</td>
                                        <td class="td_border_bottom_right" ><input type="text" name="rate" value="<?=$rsplan->rate?>">
                                          <img src="../../images/star.gif"></td>
                                      </tr>
									  <!--<tr id="positions_row" <?if($rsplan->rate==0){?> style="display:none" <?} ?>>
                                        <td class="td_border_bottom_right" >Positions</td>
                                        <td class="td_border_bottom_right"><input type="text" name="positions" value="<?$rsplan->positions?>">
                                        <img src="../../images/star.gif"></td>
                                      </tr>-->
									  
										<tr id="rate_position">
											<td width="46%" valign="top" class="td_border_right">Rate of additional job (N$)</td>
										  <td width="54%" align="left" valign="top"  class="td_border_right">
											  <input name="rate_per_position" type="text" id="rate_per_position"  value="<?=$rsplan->rate_per_job?>">
											  <img src="../../images/star.gif">
										  </td>
										</tr>
										<tr >
											<td width="46%" valign="top" class="td_border_right">&nbsp;</td>
											<td width="54%" align="left" valign="top"  class="td_border_right">
											 
												<a href="#" onClick="return editPlan(<?=$rsplan->plan_id?>);"><img src="../../images/update_admin.gif" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="plan_list.php"><img src="../../images/cancel.gif" border="0"></a>
										  </td>
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

