<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	
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
	
	
	$plan_type="";
	if($_SESSION["status"]=="1")
	{ 
		$plan_type="emp";
	}
	else{
		$plan_type="rec";
	}

		$sqlPlan = "select * from job_rec_payment_plans where plan_status=1 and type='".$plan_type."'  order by plan_id";
	$resultPlan = $objDb->ExecuteQuery($sqlPlan);
	
	for($i=1; $i<=mysql_num_rows($resultPlan); $i++)	
	{
		$rsPlan = "rsPlan" . $i;
		$$rsPlan = mysql_fetch_object($resultPlan);
	}
						
	function getMark($status)
	{
		if($status == 0)
			return '<img src="../../images/wrong_mark.gif">';
		else
			return '<img src="../../images/right_mark.gif">';		
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
<body onLoad="selectname();MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Registration Successful! </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Select  the payment plan for added recruiter here. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                        

                          <tr>
                            <td align="left" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                        
						<?
							if(mysql_num_rows($resultPlan) > 0)
							{
						?>						
                          <tr>
                            <td height="30" colspan="2" class="sectionRecheading" >Payment Plans </td>
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
							<form name="form1" action="" method="post"  enctype="multipart/form-data">
							<table width="900" border="0" align="left" cellpadding="8" cellspacing="0" class="table_black_border">
                                <tr>
                                  <td width="28%" class="td_border_bottom_right"><span class="heading_black">Options:</span></td>
                                  <?
											for($i=1; $i<mysql_num_rows($resultPlan); $i++) 
											{
												$rsPlan = "rsPlan" . $i;
										?>
                                  <td width="18%" class="td_border_bottom_right"><span class="sectionRecheading">
                                    <?=$$rsPlan->plan_name?>
                                  </span></td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
										?>
                                  <td width="18%" class="td_border_bottom"><span class="sectionRecheading">
                                    <?=$$rsPlan->plan_name?>
                                  </span></td>
                                </tr>
                                <?
									  	  for($f=0; $f<sizeof($arrFunctions)-1; $f++)
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
                                  <td class="td_border_right"><?=getMark($$rsPlan->$arrFunctionField[$f])?></td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
										?>
                                  <td><?=getMark($$rsPlan->$arrFunctionField[$f])?></td>
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
                                  <td class="td_border_bottom_right"><?=getMark($$rsPlan->$arrFunctionField[$f])?></td>
                                  <?
											}
											
											$rsPlan = "rsPlan" . $i;
								 ?>
                                  <td class="td_border_bottom"><?=getMark($$rsPlan->$arrFunctionField[$f])?></td>
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
                                    <span class="td_border_right">
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
                                    </span>                                  </span>
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
									</span><br>
                                    
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
                                    </span>									<center>
                                      <img src="../../images/sign_up_now.gif" width="102" height="24" border="0" onClick="submitform(<?=$_GET['rec_id']?>,<?=$$rsPlan->plan_id?>);" style="cursor:pointer ">
                                  </center></td>
                                  <?
												}
												
												$rsPlan = "rsPlan" . $i;
											?>
                                  <td align="left" valign="top"><span class="normal_text">
                                    </span>                                    <center>
                                      <img src="../../images/sign_up_now.gif" width="102" height="24" border="0" onClick="submitform(<?=$_GET['rec_id']?>,<?=$$rsPlan->plan_id?>);"  style="cursor:pointer ">
                                  </center></td>
                                </tr>
                            </table></form></td>
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

