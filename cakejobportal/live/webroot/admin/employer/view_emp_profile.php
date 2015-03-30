<html>
<head>
<?
	require_once("../../includes/functions.php");	
	require_once("../../classes/db_class.php");	
	$objDb = new db();
	$sqlRec = "select * from job_recruiter where rec_id=" . $_GET['rec_id'];
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec=mysql_fetch_object($resultRec);
	$arrHeared = explode(",",$rsRec->rec_heared);
?>
 
</script>
<script language="javascript" type="text/javascript">
function closewin()
{
	window.close();
}
</script>
<script src="../javascript/menubar.js" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="../../styles/job.css">
</head>
<body onload="MM_preloadImages('../images/my_profile1.gif','../images/register1.gif','../images/login1.gif','../images/job_search1.gif','../images/upload_cv1.gif','../images/employers1.gif','../images/features1.gif')">
<table border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
         <td class="whitebgcolor">
		 	<!-- Page Body Start-->		
				<table border="0" cellspacing="0" cellpadding="4">
					<tr>
						<td>
							<table  align="left" cellpadding="6" cellspacing="0" border="0" >
								<form name="form1" action="" method="post" >
								<tr>
                                  <td height="50" class="jobseekerheading" ><img src="../../images/recruiters_employers.gif"></td>
								  </tr>	
								
								<tr>
									<td class="sectionheading" >Personal Information</td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>
								
								<tr>
								  <td>
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
										<? if ($rsRec->rec_hidename==0) { ?>
			
											<tr>
												<td width="25%"  >Contact name</td>
											    <td width="75%"  ><?=$rsRec->rec_name?></td>
											</tr>
											<tr>
                                              <td>Company name </td>
                                              <td><?=$rsRec->comp_name?></td>
									  </tr>
										<? } ?>
											<tr>
												<td>Company Type </td>
											    <td><? if ($rsRec->comp_type == 1) echo "Employer"; else echo "Recruiter"; ?></td>
											</tr>
										<? if ($rsRec->rec_hideaddress==0) { ?>
			
										<tr>
											<td>Address</td>
										  <td><?=$rsRec->rec_address?></td>
										</tr>
										<? } ?>
										<tr>
											<td>Postal Code</td>
										  <td><?=$rsRec->rec_postalcode?></td>
										</tr>
										<? if ($rsRec->rec_hidecity==0) { ?>
										<tr>
										  <td>City or Town </td>
										  <td><?=$rsRec->rec_city?></td>
										</tr>
										<? } ?>										
										<tr>
                                          <td>Country</td>
                                          <td><?=getFieldValue("job_country","country_name", "country_id" , $rsRec->rec_country) ?></td>
									  </tr>

										<tr>
										  <td>Province/State</td>
										  <td><?=getFieldValue("job_state","state_name", "state_id" , $rsRec->rec_state) ?> </td>
										</tr>
								</table>
								</td></tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
									<td class="sectionheading" >Contact Information</td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>
								<tr>
								  <td valign="top">
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<? if ($rsRec->rec_hidetelno==0) { ?>
											<tr>
												<td width="25%"  >Telephone number </td>
											  <td width="75%"  ><?=$rsRec->rec_phone?></td>
											</tr>
											
											<tr>
												<td>Cell phone number </td>
											  <td><?=$rsRec->rec_mobile?></td>
											</tr>
											<tr>
                                              <td>Fax number </td>
                                              <td><?=$rsRec->rec_fax?></td>
									  </tr>
											<? } ?>
											<? if ($rsRec->rec_hideemail==0) { ?>
											<tr>
											  <td>Email address </td>
											  <td><?=$rsRec->rec_email?></td>
											</tr>
											<? } ?>
											<tr>
											  <td>Web address </td>
											  <td>
												<?=$rsRec->rec_web?>
											  </td>
											</tr>
									</table>
								</td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
                                  <td height="30" class="sectionheading" >Where did you hear about NamRecruit?</td>
								  </tr>
								<tr>
                                  <td><img src="../images/line.gif" width="772"></td>
								  </tr>
								<tr>
                                  <td><table cellpadding="5" cellspacing="0" border="0" width="98%" align="center">
                                      <tr>
                                        <td   colspan="2"><input type="checkbox" name="email" value="1" <? if (in_array(1,$arrHeared)) echo ("checked"); ?> disabled>
          Email&nbsp;&nbsp;
          <input type="checkbox" name="google" value="2" <? if (in_array(2,$arrHeared)) echo ("checked"); ?> disabled>
          Google&nbsp;&nbsp;
          <input type="checkbox" name="anothersearchengine" value="3" <? if (in_array(3,$arrHeared)) echo ("checked"); ?> disabled >
          Another search engine&nbsp;&nbsp;
          <input type="checkbox" name="friend" value="4" <? if (in_array(4,$arrHeared)) echo ("checked"); ?> disabled>
          A friend&nbsp;&nbsp;
          <input type="checkbox" name="tv" value="5" <? if (in_array(5,$arrHeared)) echo ("checked"); ?> disabled>
          TV ad&nbsp;&nbsp;
          <input type="checkbox" name="newspaper" value="6" <? if (in_array(6,$arrHeared)) echo ("checked"); ?> disabled>
          Newspaper ad&nbsp;
          <input type="checkbox" name="radio" value="7" <? if (in_array(7,$arrHeared)) echo ("checked"); ?> disabled>
          Radio ad<br>
          <input type="checkbox" name="magazine" value="8" <? if (in_array(8,$arrHeared)) echo ("checked"); ?> disabled>
          Magazine ad&nbsp;&nbsp;
          <input type="checkbox" name="banner" value="9" <? if (in_array(9,$arrHeared)) echo ("checked"); ?> disabled>
          Banner/Link&nbsp;&nbsp;
          <input type="checkbox" name="other" value="10" <? if (in_array(10,$arrHeared)) echo ("checked"); ?> disabled>
          Other&nbsp;&nbsp; </td>
                                      </tr>
                                  </table></td>
								  </tr>
								<tr>
                                  <td height="60"><table cellpadding="5" cellspacing="0" border="0" width="90%" align="center">
                                      <tr>
                                        <td width="36%" align="right" ><a href="#"  onClick="closewin();"  class="imgcss"><img src="../images/close.gif" border="0"></a></td>
                                        <td width="64%"></td>
                                      </tr>
                                  </table></td>
								  </tr>
								</form>
						  </table>						
					  </td>
					</tr>
					
		   </table>  
			<!-- Page Body End-->		
         </td>
     </tr>
     <tr>
          <td height="30" class="bottom_link_bg">&nbsp;</td>
     </tr>
     <tr>
          <td height="6"></td>
     </tr>
     <tr>
          <? // include("includes/bottom.php"); ?>
     </tr>
</table>
</body>
</html>

