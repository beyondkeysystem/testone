<?
	require_once("classes/db_class.php");
	$objDb = new db();
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
?>
<script language="JavaScript" type="text/JavaScript">
	function checkLogin(event)
	{
		if (event.keyCode == 13) {
			document.frmLogin.submit();
		}
		return;
	}
</script>
<tr>
	<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		   <tr>
				<td width="240" rowspan="2" class="whitebgcolor"><a href='index.php'><img src="images/logo.gif" alt="logo" height="121" border="0" /></a></td>
				<td width="600" height="38" colspan="4" valign="top" class="whitebgcolor"><img src="images/top_text.gif" alt="Try these sites for incredible deals..."></td>
				<td width="20" rowspan="2" class="whitebgcolor">&nbsp;</td>
				<td width="2" rowspan="2" class="whitebgcolor" background="images/line2.gif"></td>
				<td width="10" rowspan="2" class="whitebgcolor">&nbsp;</td>
				<td width="170" rowspan="2" valign="top" class="whitebgcolor">
				<form name="frmLogin" method="post" action="jobseeker/seeker_login_action.php">
					<table width="100%">
						<tr>
							<td colspan="2"><a href="contact.php" class="text_light_gray_bold">Contact</a> &nbsp; <img src="images/sepration.gif"> &nbsp; <a href="help.php" class="text_light_gray_bold">Help</a> &nbsp; <img src="images/sepration.gif"> &nbsp; <a href="about.php" class="text_light_gray_bold">About</a></td>
						</tr>	
						<tr>
						  <td colspan="2" class="text_gray_light" height="1" background="images/line2.gif"></td>
					  </tr>
						<tr>
                          <td width="61" class="text_gray_light">Username</td>
                          <td class="text_gray_light"><input name="txtUser" type="text" size="13" style="border-style:solid"></td>
					  </tr>
						<tr>
                          <td class="text_gray_light">Password</td>
                          <td class="text_gray_light"><input name="txtPassword" type="password" id="txtPassword" style="border-style:solid" size="13" onKeyPress="checkLogin(event);"></td>
					  </tr>		
						<tr>
						  <td  colspan="2"><a href="jobseeker/forgot_details.php" class="link_gray_small">Forgot your details?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onClick="document.frmLogin.submit();"><img src="images/login_button.gif" border="0" align="absmiddle"></a></td>
			          </tr>					  			  			
					</table>
				  </form>
				</td>
				<td width="5" rowspan="2" class="top_right"></td>
		   </tr>
		   <tr>
		  
			 <td valign="top" class="whitebgcolor">
				<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td valign="top" class="whitebgcolor" align="center">
								<img border="0" src="images/banner-ad.jpg">
						 	</td>	
						</tr>
					</table>
			 </td>	
		     
		   </tr>
		</table>
	</td>
</tr>
     <tr>
          <td>
		  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td background="images/lnk_right_bg.gif"><img src="images/link_left.gif" alt="left" width="8" height="42" border="0" /><a href="jobseeker/seeker_registration.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/register1.gif',1)"><img src="images/register.gif" alt="Registe" name="Image4" width="86" height="42" border="0" id="Image4" /></a><a href="jobseeker/faq.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/faq1.gif',0)"><img src="images/faq.gif" alt="FAQs" name="Image5" width="68" height="42" border="0" id="Image5" /></a><a href="jobseeker/seeker_login.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/login1.gif',1)"><img src="images/login.gif" alt="Login" name="Image6" width="66" height="42" border="0" id="Image6" /></a><a href="jobseeker/job_search.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/job_search1.gif',1)"><img src="images/job_search.gif" alt="Job Search" name="Image7" width="104" height="42" border="0" id="Image7" /></a><a href="jobseeker/seeker_emp.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/employers1.gif',1)"><img src="images/employers.gif" alt="Employers" name="Image9" width="100" height="42" border="0" id="Image9" /></a><a href="jobseeker/features.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image12','','images/features1.gif',1)"><img src="images/features.gif" alt="Features" name="Image12" width="91" height="42" border="0"></a></td>
                      <td width="272" background="images/lnk_right_bg.gif"><div align="right"></div></td>
                      <td width="19" background="images/lnk_right_bg.gif"><img src="images/lnk_right1.gif" width="19" height="42"></td>
                    </tr>
                  </table>
		</td>
	</tr>
