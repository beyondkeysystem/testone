<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	$cnt=-1;
	$cntPlan=-1;
	if(isset($_POST["rec_uid"]))
	{
		$rec_uid=$_POST["rec_uid"];
	}
	if(isset($_POST["rec_email"]))
	{
		$rec_email=$_POST["rec_email"];
	}
	$objDb = new db();
	$arrFunctions = array(
		"Post unlimited number of job ads",
		"System shortlisting",
		"System regret function",
		"Client talent database creation",
		"Full access to immediately available jobseekers.",
		"Client logo display",
		"Intercompany advertisement",														
	);
	
	$arrFunctionField = array(
		"unlimited_job_ads",
		"system_shortlisting",
		"regret_function",
		"client_talent",
		"full_access_jobseekers",
		"client_logo",
		"intercompany_ad",														
	);	
	
		//if($activated_before == 1)
			//$sqlPlan = "select * from job_rec_payment_plans where plan_status=1 and rate>0 order by plan_id";
		//else
		$sqlPlan = "select * from job_rec_payment_plans where plan_status=1 order by plan_id";
		$resultPlan = $objDb->ExecuteQuery($sqlPlan);
		for($i=1; $i<=mysql_num_rows($resultPlan); $i++)	
		{
			$rsPlan = "rsPlan" . $i;
			$$rsPlan = mysql_fetch_object($resultPlan);
		}	
		function getMarkAdmin($status)
		{
			if($status == 0)
				return '<img src="../../images/wrong_mark.gif">';
			else
				return '<img src="../../images/right_mark.gif">';		
		}
		
		//for recruiter
		if(isset($_GET["uid"]) || isset($_GET["remail"]))
		{
			$sqlRec = "select * from job_recruiter where  ";
			if(isset($_GET["uid"]) && $_GET["uid"]!="" )
			{
				$sqlRec .=" rec_uid='".$_GET["uid"]."'";
			}
			else if(isset($_GET["remail"]) && $_GET["remail"]!="" )
			{
				$sqlRec .=" rec_email='".$_GET["remail"]."'";
			}
		
		$resultRec  = $objDb->ExecuteQuery($sqlRec);
		
		$rsRec=="";
		$cnt=mysql_num_rows($resultRec);
		
		if($cnt>0)
		{
			$rsRec=mysql_fetch_object($resultRec);
			$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.rec_id='" . $rsRec->rec_id . "' and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
			$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
			$cntPlan=mysql_num_rows($resultLastInvoice);
			if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
			{
				$plan_name = $rsLastInvoice->plan_name;
				
				//get first payment details for last invoice of plan purchased.
				$sqlFirstPay = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice->invoice_id . " and pay_status=1 order by pay_id";
				$resultFirstPay = $objDb->ExecuteQuery($sqlFirstPay);
				if($rsFirstPay = mysql_fetch_object($resultFirstPay))
				{	
					$first_pay_date = $rsFirstPay->pay_date;
					
					$days = ((30 * 24) * 60) * 60;
					$expire_date = date("Y-m-d", strtotime($rsFirstPay->pay_date) + $days);
				}				
			}
		}
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
<script src="../javascript/admin.js"  language="javascript"></script>
<script src="../../javascript/job.js" language="javascript"></script>		
<script src="../../javascript/recruiter.js" language="javascript"></script>
<script src="../../javascript/main.js" language="javascript"></script>
<script src="../../javascript/recruiter.js" language="javascript"></script>	
<script language="javascript">

function makeShowData(event)
	{
		var flag=true;
		if (event.keyCode == 13) {
			flag=showData();
			if(flag==false) { return false; } else { return true; }
		}
	}
function showData()
{
	rec_uid=document.form1.rec_uid.value;
	rec_email=document.form1.rec_email.value;
	if(rec_uid=="" && rec_email=="")
	{
		alert("Please enter recruiter id or recruiter email address.");
		document.form1.rec_uid.focus();
		return false;
	}
	else
	{
		if(rec_uid!=""){ rid="uid="+rec_uid; }else if(rec_email!="") { rid="remail="+rec_email; }
		document.form1.method="post";
		document.form1.action="change_plan.php?"+rid;
		document.form1.submit()
	}
}
function verifyChange(varRecId,varPlanId)
{
	if(confirm("If you change your plan now, this will expire your current plan. Do you want to continue?"))
	{			
		document.form1.action = "sign_up_now.php?rec_id=" + varRecId + "&plan=" + varPlanId;
		document.form1.submit();		
		return true;
	}
	else
	{
		return false;
	}
}
function countTot(no,id,rate,amt)
{
	vv="tot_"+id;
	document.getElementById(vv).innerHTML=" N$ "+(amt+(no.value*rate));
}
function submitform(recid,pid)
{
	document.form1.action="sign_up_now.php?rec_id="+recid+"&plan="+pid;
	document.form1.method="post";
	document.form1.submit();
}
function selectname()
{
	
	var len = document.form1.elements.length;	
	var total=0;
	for(var j = 0; j <=len-1; j++) 
	{
		p=document.form1.elements[j].name.split("_");
		if(p[0]=="add")
		{
			document.form1.elements[j].value=0;
		}
		
	}
	
}
</script>		

</head>
<body onLoad="selectname();displayTable();if(document.form1.pay_by != null) checkPay(document.form1.pay_by.value);MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		<form name="form1" action="make_new_payment_action.php?invoice_id=<?=$rsInvoice->invoice_id?>" method="post" >		 
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;<span class="medium_black">Change / Renew Plan</span></td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Please enter recruiter id or email-id to change / renew the plan of the recruiter.
                                        <? //if($rsInvoice->rate > 0) echo "To make payment click on pay now."; else echo "To subscribe, click on subscribe now."; ?>
                                        <br>
                                        <br></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top">
								  <table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
										    <td width="5" valign="bottom" ></td>
                                            <td width="99%" height="30" valign="bottom">Recruiter ID : <input name="rec_uid" type="text" id="rec_uid"  value="<?=$rec_uid?>"   onKeyUp="return makeShowData(event);"  >
                                            &nbsp;&nbsp;<span class="subhead_gray_small">OR</span>&nbsp;&nbsp;
											Email Id : <input name="rec_email" type="text" id="rec_email"  value="<?=$rec_email?>"  onKeyUp="return makeShowData(event);"  >&nbsp;
                                            <a href="#" onClick="return showData();"><img src="../../images/search.gif"   border="0" align="absmiddle"></a>	<a href="#" onClick="location.href='home.php'"><img src="../../images/cancel.gif" width="50" height="18" border="0" align="absmiddle"></a> </td>
                                          </tr>
										  <tr>
										    <td colspan="2"><img src="../images/line.gif" width="772"></td>
                                          </tr>										  
									  </table>
								  </td>
                                </tr>
								<tr>
								  <td><? if($cnt==0) {?>
										<table width="100%" cellpadding="2" cellspacing="0" >
											<tr>
												
											  <td width="4%" rowspan="2"><img src="../../images/redcross.gif" align="absmiddle"></td>
												<td width="96%" class="star">No Recruiter Found.</td>
											</tr>
											<tr>
											  <td>&nbsp;</td>
											</tr>								
										</table>
										<? }?></td>
							  </tr>
								<tr>
								  <td>
										<? 
											 if($cnt>0) {
											
											if(isAccountExpired($rsRec->rec_id)==0) {?>
												<table width="100%" cellpadding="3" cellspacing="0">
													<tr>
													  <td width="7" height="56">&nbsp;</td>
													  <td width="765">
													  <br>
													  The current plan for this recruiter is <span class="subhead_gray_small"><u><?=$plan_name?></u></span> and expiry date of this plan is <span class="subhead_gray_small"><u><?=getDateValue($expire_date)?></u></span>. <br>
													  <br>
													  If you change / renew plan now, this will expire current plan. <br>
													  <br></td>		
													</tr>
											  </table>
									            <? 
											}
											else if($cntPlan>0)
											{ ?>
												<table width="100%" cellpadding="3" cellspacing="0">
													<tr>
													  <td width="16">&nbsp;</td>
													  <td width="754">
													  <br>
													  The previous plan  of this recruiter was <span class="subhead_gray_small"><u><?=$plan_name?></u></span> and expiry date of this plan was <span class="subhead_gray_small"><u><?=getDateValue($expire_date)?></u></span>. <br>
													  <br> 
													  </td>		
													</tr>
											  </table>
										<?	} else if($cntPlan==0)
											{ ?>
												<table width="100%" cellpadding="3" cellspacing="0">
													<tr>
													  <td width="16">&nbsp;</td>
													  <td width="754">
													  <br>
													  This recruiter has never subscribed any of the plan.<br>
													  <br>
													  please sign up one of plan.<br>
													  <br>
													  </td>		
													</tr>
											  </table>
										<?	}
											
										}
									?>
								</td>
								</tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" id="payment_plan" >
						<?
							if($cnt>0) {
							if(mysql_num_rows($resultPlan) > 0)
							{
						?>						
                          <tr>
                            <td height="30" colspan="2" class="sectionRecheading" >&nbsp;Payment Plans </td>
                          </tr>
                          <tr>
                            <td colspan="2"><img src="../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td width="3%" >&nbsp;</td>
                            <td width="97%" height="25" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="left">
							<table width="900" border="0" align="left" cellpadding="8" cellspacing="0" class="table_black_border">
                                <tr>
                                  <td width="40%" class="td_border_bottom_right"><span class="heading_black">Options:</span></td>
                                  <?
											for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
											{
												$rsPlan = "rsPlan" . $i;
										?>
                                  <td width="30%" class="td_border_bottom_right"><span class="sectionRecheading">
                                    <?=$$rsPlan->plan_name?>
                                  </span></td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
										?>
                                  <td width="30%" class="td_border_bottom"><span class="sectionRecheading">
                                    <?=$$rsPlan->plan_name?>
                                  </span></td>
                                </tr>
                                <?		  for($f=0; $f<sizeof($arrFunctions)-1; $f++)
										  {
								?>
                                <tr>
                                  <td class="td_border_right"><?=$arrFunctions[$f]?>
                                  </td>
                                  <?
											for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
											{
												$rsPlan = "rsPlan" . $i;
										?>
                                  <td class="td_border_right"><?=getMarkAdmin($$rsPlan->$arrFunctionField[$f])?></td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
										?>
                                  <td><?=getMarkAdmin($$rsPlan->$arrFunctionField[$f])?></td>
                                </tr>
                                <?
									  	}
									  ?>
                                <tr>
                                  <td class="td_border_bottom_right"><?=$arrFunctions[$f]?>
                                  </td>
                                  <?
											for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
											{
												$rsPlan = "rsPlan" . $i;
										?>
                                  <td class="td_border_bottom_right"><?=getMarkAdmin($$rsPlan->$arrFunctionField[$f])?></td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
										?>
                                  <td class="td_border_bottom"><?=getMarkAdmin($$rsPlan->$arrFunctionField[$f])?></td>
                                </tr>
                                <tr>
                                  <td class="td_border_bottom_right">Subscription</td>
                                  <?
											for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
											{
												$rsPlan = "rsPlan" . $i;
										?>
                                  <td valign="top" class="td_border_bottom_right"><span class="normal_text">
                                  <?
															if($$rsPlan->rate == 0)													
															{
																echo "Free for limited period - Registration required.";
															}
															else
															{
																echo "N$ " . number_format($$rsPlan->rate,2,"-","") . " per month for " . $$rsPlan->positions . " positions";
															}
														?>
                                  </span> </td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
										?>
                                  <td valign="top" class="td_border_bottom"><span class="normal_text">
                                  <?
													if($$rsPlan->rate == 0)													
													{
														echo "Free for limited period - Registration required.";
													}
													else
													{
														echo "N$ " . number_format($$rsPlan->rate,2,"-","") . " per month for " . $$rsPlan->positions . " positions";
													}
												?>
                                  </span> </td>
                                </tr>
								<tr>
                                  <td valign="top" class="td_border_right">Additional positions </td>
                                  <?
												for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
												{
													$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top"  class="td_border_right"><span class="normal_text">
                                    <?
															if($$rsPlan->rate == 0)													
															{
																//echo "N$ " . number_format($$rsPlan->rate_per_position,2,'-','') . " per position for full functionality.";
																echo "&nbsp;";
															}												  
															else
															{
																echo "N$ " . number_format($$rsPlan->rate_per_position,2,'-','') . " per additional position above " . $$rsPlan->positions . " positions per month.";
																
															}
												  ?>
                                  </span>
                                   
                                    <center>
                                  </center></td>
                                  <?
												}
												
												$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top" ><span class="normal_text">
                                    <?
															if($$rsPlan->rate == 0)													
															{
																//echo "N$ " . number_format($$rsPlan->rate_per_position,2,'-','') . " per position for full functionality.";
																echo "&nbsp;";
															}												  
															else
															{
																echo "N$ " . number_format($$rsPlan->rate_per_position,2,'-','') . " per additional position above " . $$rsPlan->positions . " positions per month.";
																
															}
												  ?>
                                  </span>
                                    <center>
                                  </center></td>
                                </tr>
								 <tr>
                                  <td align="left" valign="top" class="td_border_bottom_right">&nbsp;<span class="blue_big_style">Select additional positions</span></td>
                                  <?
												for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
												{
													$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top"  class="td_border_bottom_right"><span class="normal_text">
                                    <? if($$rsPlan->rate>0)
									{?>
Add <SPAN style="FONT-SIZE: 10pt; COLOR: #000000; FONT-FAMILY: Verdana"><FONT class=normaltext>Position</FONT></SPAN> :
<select name="add_<?=$$rsPlan->plan_id?>" onChange="countTot(this,<?=$$rsPlan->plan_id?>,<?=$$rsPlan->rate_per_position?>,<?=$$rsPlan->rate?>)" >
  <? for($j=0;$j<=10;$j++) {?>
  <option value="<?=$j?>">
  <?=$j?>
  </option>
  <? }?>
</select>
<? } else { echo "&nbsp;&nbsp;&nbsp;"; }?>
</span>
                                    <center>
                                   </center></td>
                                  <?
												}
												
												$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top" class="td_border_bottom"><span class="normal_text">
                                   <span class="td_border_bottom_right">
                                   <? if($$rsPlan->rate>0)
									{?>
Add <SPAN style="FONT-SIZE: 10pt; COLOR: #000000; FONT-FAMILY: Verdana"><FONT class=normaltext>Position</FONT></SPAN> :
<select name="add_<?=$$rsPlan->plan_id?>" onChange="countTot(this,<?=$$rsPlan->plan_id?>,<?=$$rsPlan->rate_per_position?>,<?=$$rsPlan->rate?>)" >
  <? for($j=0;$j<=10;$j++) {?>
  <option value="<?=$j?>">
  <?=$j?>
  </option>
  <? }?>
</select>
<? } else { echo "&nbsp;&nbsp;&nbsp;"; }?>
                                   </span></span>
                                    <center>
                                   </center></td>
                                </tr>
								 <tr>
                                  <td align="right" valign="top" class="td_border_bottom_right"><span class="blue_big_style">Total :</span></td>
                                  <?
										for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
										{
											$rsPlan = "rsPlan" . $i;
									?>
                                  <td align="left" valign="top"  class="td_border_bottom_right"><span class="normal_text">
								  	<div id="tot_<?=$$rsPlan->plan_id?>" align="center" class="blue_big_style"><?=$$rsPlan->rate?></div>
								  	
                                    </span><br>
                                 
                                    <center>
                                    </center></td>
                                  <?
												}
												
												$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top" class="td_border_bottom"><span class="normal_text">
                                    <div id="tot_<?=$$rsPlan->plan_id?>" align="center" class="blue_big_style"><?=$$rsPlan->rate?></div>
									</span>	<br>
                                    
                                    <center>
                                    </center></td>
                                </tr>
								
                                <tr>
                                  <td valign="top" class="td_border_right">&nbsp;</td>
                                  <?
												for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
												{
													$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top"  class="td_border_right"><span class="normal_text">
									</span>												<center>
												  <? if($$rsPlan->plan_name==$plan_name) {?><img src="../../images/renew_acc.gif" border="0" style="cursor:pointer" onClick="return verifyChange(<?=$rsRec->rec_id?>,<?=$$rsPlan->plan_id?>);" ><br/> 
									<? } else if($$rsPlan->rate<$current_rate) {?> <img src="../../images/downgrade-button.gif" border="0" style="cursor:pointer"  onClick="return verifyChange(<?=$rsRec->rec_id?>,<?=$$rsPlan->plan_id?>);"> 
									<? } else {?> <img src="../../images/upgrade-button.gif" border="0" style="cursor:pointer"  onClick="return verifyChange(<?=$rsRec->rec_id?>,<?=$$rsPlan->plan_id?>);"> <? }?>
                                    
								  </center></td>
											  <?
												}
												
												$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top"><span class="normal_text">
                                    </span>                                    <center>
                                      <? if($$rsPlan->plan_name==$plan_name) {?><img src="../../images/renew_acc.gif" border="0" style="cursor:pointer" onClick="return verifyChange(<?=$rsRec->rec_id?>,<?=$$rsPlan->plan_id?>);" ><br/> 
									<? } else if($$rsPlan->rate<$current_rate) {?> <img src="../../images/downgrade-button.gif" border="0" style="cursor:pointer"  onClick="return verifyChange(<?=$rsRec->rec_id?>,<?=$$rsPlan->plan_id?>);"> 
									<? } else {?> <img src="../../images/upgrade-button.gif" border="0" style="cursor:pointer"  onClick="return verifyChange(<?=$rsRec->rec_id?>,<?=$$rsPlan->plan_id?>);"> <? }?>
                                    
                                  </center></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td class="sectionRecheading" >&nbsp;</td>
                            <td class="sectionRecheading" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
						  <?
						  	  }
							 }
						  ?>
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

