<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
	
	
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
 
 
 
 function addPartner()
 {
 	
	if(validatePartners())
	{
		document.form1.method="post";
		document.form1.action="partner_add_action.php";
		document.form1.submit();
	}
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
		 <form method="post" enctype="multipart/form-data" name="form1" action="partner_add_action.php" onSubmit="return validatePartners();">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Add Partner </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can add partner here. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><table width="700" border="0" align="left" cellpadding="6" cellspacing="0" >
									   <tr >
									    <td colspan="4" height="10"  ></td>
									  </tr>
									  <tr>
									    <td   >&nbsp;</td>
                                        <td   >Company name </td>
                                        <td colspan="2"   ><input name="company_name" type="text" id="company_name"  >
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td   >&nbsp;</td>
                                        <td   >Company description </td>
                                        <td colspan="2"   ><textarea name="company_desc" cols="30" id="company_desc"></textarea>
                                        <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td >&nbsp;</td>
                                        <td  valign="top">Web address </td>
                                        <td colspan="2" ><input name="web_address" type="text" id="web_address"  >
                                        &nbsp;&nbsp;<span class="error">Note</span>: <span class="blue_title_small">Enter full address e.g www.example.com </span></td>
                                      </tr>
									  
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Contact Name </td>
										  <td width="48%" height="30" align="left" valign="top"    ><input name="contact_name" type="text" id="contact_name"  >
									      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and email address</td>
							              <td width="25%" align="left" valign="top"    ><input name="email_address" type="text" id="email_address"  >
                                            <img src="../../images/star.gif" alt="required"> </td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Telephone</td>
										  <td height="30" colspan="2" align="left" valign="top"    ><input name="telephone" type="text" id="telephone"  ></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Street address </td>
										  <td height="30" colspan="2" align="left" valign="top"    ><textarea name="street_address" cols="30" id="street_address"></textarea></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Location</td>
										  <td height="30" colspan="2" align="left" valign="top"    ><input name="location" type="text" id="location"  ></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Description of partnership </td>
										  <td height="30" colspan="2" align="left" valign="top"    ><textarea name="desc_partnership" cols="30" id="desc_partnership"></textarea></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Upload logo </td>
										  <td height="30" colspan="2" align="left" valign="top"    ><input name="logo" type="file" id="logo"></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >&nbsp;</td>
										  <td height="30" colspan="2" align="left" valign="top"    >&nbsp;</td>
							  </tr>
										<tr>
										  <td width="2%" valign="top"   >&nbsp;</td>
											<td width="25%" valign="top"   >&nbsp;</td>
											<td height="30" colspan="2" align="left" valign="top"    ><input name="submit" type="submit" class="top_blue" value="Add Partner" /> 
											&nbsp;&nbsp;&nbsp;<a href="home.php"></a>										  </td>
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

