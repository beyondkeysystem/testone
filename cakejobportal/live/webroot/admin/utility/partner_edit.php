<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$sqladvert = "select * from  job_partner  where partner_id='".$_GET["pid"]."'";
	$resultadvert = $objDb->ExecuteQuery($sqladvert);
	$rsadvert=mysql_fetch_object($resultadvert);
	$rowCount = mysql_num_rows($resultadvert);
	
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
 
 
 
 
  function editPartner(pid)
 {
 	
	if(validatePartners())
	{
		document.form1.method="post";
		document.form1.action="partner_edit_action.php?pid="+pid;
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
		 <form name="form1" method="post"  enctype="multipart/form-data" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Edit Partner </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can edit the partner here. </td>
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
                                        <td colspan="2"   ><input name="company_name" type="text" id="company_name"  value="<? if(isset($_POST['company_name']) && $_POST['company_name']!="" ) echo $_POST['company_name']; else  echo $rsadvert->company_name;?>">
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td   >&nbsp;</td>
                                        <td   >Company description </td>
                                        <td colspan="2"   ><textarea name="company_desc" cols="30" id="company_desc"><? if(isset($_POST['company_desc']) && $_POST['company_desc']!="" ) echo $_POST['company_desc']; else  echo $rsadvert->company_desc;?></textarea>
                                        <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td >&nbsp;</td>
                                        <td  valign="top">Web address </td>
                                        <td colspan="2" ><input name="web_address" type="text" id="web_address"  value="<? if(isset($_POST['web_address']) && $_POST['web_address']!="" ) echo $_POST['web_address']; else  echo $rsadvert->web_address;?>">
                                          <span class="error">Note</span>: <span class="blue_title_small">Enter full address e.g www.example.com </span></td>
                                      </tr>
									  
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Contact Name </td>
										  <td width="48%" height="30" align="left" valign="top"    ><input name="contact_name" type="text" id="contact_name"  value="<? if(isset($_POST['contact_name']) && $_POST['contact_name']!="" ) echo $_POST['contact_name']; else  echo $rsadvert->contact_name;?>">
									      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and email address</td>
							              <td width="25%" align="left" valign="top"    ><input name="email_address" type="text" id="email_address"  value="<? if(isset($_POST['email_address']) && $_POST['email_address']!="" ) echo $_POST['email_address']; else  echo $rsadvert->email_address;?>">
                                            <img src="../../images/star.gif" alt="required"> </td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Telephone</td>
										  <td height="30" colspan="2" align="left" valign="top"    ><input name="telephone" type="text" id="telephone"  value="<? if(isset($_POST['telephone']) && $_POST['telephone']!="" ) echo $_POST['telephone']; else  echo $rsadvert->telephone;?>"></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Street address </td>
										  <td height="30" colspan="2" align="left" valign="top"    ><textarea name="street_address" cols="30" id="street_address"><? if(isset($_POST['street_address']) && $_POST['street_address']!="" ) echo $_POST['street_address']; else  echo $rsadvert->street_address;?></textarea></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Location</td>
										  <td height="30" colspan="2" align="left" valign="top"    ><input name="location" type="text" id="location"  value="<? if(isset($_POST['location']) && $_POST['location']!="" ) echo $_POST['location']; else  echo $rsadvert->location;?>"></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Description of partnership </td>
										  <td height="30" colspan="2" align="left" valign="top"    ><textarea name="desc_partnership" cols="30" id="desc_partnership"><? if(isset($_POST['desc_partnership']) && $_POST['desc_partnership']!="" ) echo $_POST['desc_partnership']; else  echo $rsadvert->desc_partnership;?></textarea></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >Upload logo </td>
										  <td height="30" colspan="2" align="left" valign="top"    ><input name="logo" type="file" id="logo"></td>
							  </tr>
										<tr>
										  <td valign="top"   >&nbsp;</td>
										  <td valign="top"   >&nbsp;</td>
										  <td height="30" colspan="2" align="left" valign="top"    ><img src="../../upload_logo/<?=$rsadvert->logo?>"  ></td>
							  </tr>
										<tr>
										  <td width="2%" valign="top"   >&nbsp;</td>
											<td width="25%" valign="top"   >&nbsp;</td>
											<td height="30" colspan="2" align="left" valign="top"    ><img src="../../images/update_admin.gif" width="50" height="18" border="0" style="cursor:pointer" onClick="return editPartner(<?=$rsadvert->partner_id?>)">&nbsp;&nbsp;&nbsp;<a href="partner_list.php"><img src="../../images/cancel.gif" border="0"></a>										  </td>
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

