<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	//for variables
	require_once("../../includes/functions.php");	
	include("../../includes/thumbnail_generator.php");
	
	
	$id="";
	$rec_state = "";
	$rec_country = "0";
	$rec_city = "Windhoek";
	
	if(isset($_POST["rec_city"]))
	{
		$rec_city = $_POST["rec_city"];
	}
		
	if(isset($_POST["rec_state"]))
	{
		$rec_state = $_POST["rec_state"];
	}
	
	if(isset($_POST["rec_country"]))
	{
		$rec_country = $_POST["rec_country"];
	}	
	
	//uploading company logo
	  $comp_logo = "";
	  $target_path ="";
	  $target_path = "../../recruiter/logos/";
	  $base_name = "";
			
		if(isset($_FILES["comp_logo"]) && $_FILES["comp_logo"]["name"] != "")
		{
			$base_name = basename($_FILES["comp_logo"]["name"]);
			$base_name_arr = explode(".",$base_name);
			$base_ext = end($base_name_arr);
			
			$base_name = $_POST['comp_name'] . "_" . $_POST['rec_phone'] . "." . $base_ext;
			
			$target_path = $target_path . $base_name; 
			if(move_uploaded_file($_FILES["comp_logo"]["tmp_name"], $target_path))
			{
				$imgInfo = getimagesize($target_path);
				if($imgInfo[0] > 180 || $imgInfo[1] > 80)
				{
					createthumb($target_path,$target_path,180,80);
				}			
				$comp_logo = $base_name;
			}
		}	
		else if(isset($_POST["hid_comp_logo"]) && $_POST["hid_comp_logo"] != "")
		{		
			if(isset($_POST['chkLogo']))
			{
				unlink("../../recruiter/logos/" . $_POST["hid_comp_logo"]);
			}
			else
			{				
				$comp_logo = $_POST["hid_comp_logo"];	
			}
		} 	

	
	if(isset($_GET["post"]))
	{
		if(isset($_GET["post"])=="post")
		{
			recruiter_preview($comp_logo);
			$id=$_GET["post"];
		}
	}

	if($rec_country == "0")
		$rec_country = 146;
						
	
	
	
	
	
	
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
 function submitform()
 {
	if (document.getElementById("email_exists").innerHTML.length > 10)
	{
		alert("This email address already exists.");
		document.form1.rec_email.focus();
		return false;
	}
	
 	if(validateRecruiter(document.form1))
	{
		document.form1.method="post";
		document.form1.action="new_recruiter_action.php";
		document.form1.submit();
	}	
 }
 
 function previewform()
 {
		document.form1.method="post";
		document.form1.action="new_recruiter.php?post=post";
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
		<form name="form1" action="" method="post"  enctype="multipart/form-data">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Add Recruiter</td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can add the recruiter here. </td>
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
								<tr>
									<td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Personal Information</td>
								</tr>
								<tr>
									<td><img src="../../images/line.gif" width="772"></td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								
								<tr>
								  <td>
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<tr>
												<td>Contact name </td>
										        <td><input type="text" name="rec_name" id="rec_name" value="<? if (isset($_POST['rec_name'])) echo stripslashes($_POST['rec_name']); ?>">
											    <img src="../../images/star.gif"></td>
											</tr>
											<tr>
                                              <td>Company name </td>
                                              <td><input type="text" name="comp_name" id="comp_name" value="<? if (isset($_POST['comp_name'])) echo stripslashes($_POST['comp_name']); ?>">
                                                  <img src="../../images/star.gif"></td>
									  		</tr>
											<tr>
												<td>Company type</td>
											    <td><input name="comp_type" id="comp_type" type="radio" value="1" checked>
												Employer
												  <input name="comp_type" id="comp_type" type="radio" value="2">
											  Recruiter</td>
											</tr>
											<tr>
												<td valign="top">Address</td>
										      <td><textarea name="rec_address" cols="30" rows="6"><? if (isset($_POST['rec_address'])) echo stripslashes($_POST['rec_address']); ?></textarea>
											    <img src="../../images/star.gif"></td>
											</tr>
											<tr>
												<td>Postal code</td>
										      <td><input name="rec_postalcode" type="text" value="<? if (isset($_POST['rec_postalcode'])) echo stripslashes($_POST['rec_postalcode']); ?>" maxlength="15">
											    <img src="../../images/star.gif"></td>
											</tr>
											<tr>
											  <td width="140">City or town </td>
										      <td><?=fill_dropdown('rec_city','job_city', 'city_name', "city_name", $rec_city,"Select","","onchange='other_city();'")?>
                                                <span id="span_other_city" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;Other city or town : <input name="other_rec_city" type="text" value="<? if (isset($_POST['other_rec_city'])) echo stripslashes($_POST['other_rec_city']); ?>" ></span>											    
                                                <img src="../../images/star.gif"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
									<td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Contact Information</td>
								</tr>
								<tr>
									<td><img src="../../images/line.gif" width="772"></td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
								  <td valign="top">
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<tr>
												<td width="20%"  >Telephone number </td>
										        <td width="80%"  ><input name="rec_phone" type="text" id="rec_telno" value="<? if (isset($_POST['rec_phone'])) echo stripslashes($_POST['rec_phone']); ?>" maxlength="15">
											    <img src="../../images/star.gif"></td>
											</tr>
											<tr>
												<td>Cell phone number </td>
										      <td><input name="rec_mobile" type="text" id="rec_mobile" value="<? if (isset($_POST['rec_mobile'])) echo stripslashes($_POST['rec_mobile']); ?>" maxlength="15"></td>
											</tr>
											<tr>
                                              <td>Fax number </td>
                                              <td><input name="rec_fax" type="text" id="rec_fax" value="<? if (isset($_POST['rec_fax'])) echo stripslashes($_POST['rec_fax']); ?>" maxlength="15"></td>
									  </tr>
											<tr>
											  <td>Email address </td>
										      <td><input name="rec_email" type="text" value="<? if (isset($_POST['rec_email'])) echo stripslashes($_POST['rec_email']); ?>" size="40" onblur="checkMail('email_exists');">
											    <img src="../../images/star.gif">&nbsp;&nbsp;<span class="error" id="email_exists"></span></td>
											</tr>
											<tr>
											  <td>Web address </td>
										      <td>
										        <input name="rec_web" type="text" value="<? if (isset($_POST['rec_web'])) echo stripslashes($_POST['rec_web']); ?>" size="40">
										      </td>
											</tr>
											<?
												if($comp_logo != "")
												{
											?>
											<tr>
											  <td>&nbsp;</td>
											  <td class="comment"><img src="../../recruiter/logos/<?=$comp_logo?>"> <input type="checkbox" name="chkLogo">Delete Logo</td>
							 		  </tr>
											<?
											 	}
											?>
											<tr>
                                              <td>Company Logo </td>
                                              <td class="comment"><input name="comp_logo" type="file" id="comp_logo" size="50" > <input name="hid_comp_logo" type="hidden" value="<?=$comp_logo?>">
                                              &nbsp;&nbsp;Size : 180px X 80px</td>
									  </tr>
											<tr>
											  <td colspan="2" class="comment" >Use the checkboxes below to indicate information you would like to hide from jobseekers. Any information that you do NOT want to provide to potential employees should be checked. </td>
										    </tr>
											<tr>
											  <td>&nbsp;</td>
										      <td><input type="checkbox" name="rec_hidename" value="1" <? if (isset($_POST['rec_hidename']) ) echo ("checked"); ?>>
										      Hide contact name<br>
												<input type="checkbox" name="rec_hideaddress" value="1" <? if (isset($_POST['rec_hideaddress']) ) echo ("checked"); ?>>												Hide physical address<br>
												<input type="checkbox" name="rec_hideemail" value="1" <? if (isset($_POST['rec_hideemail']) ) echo ("checked"); ?>>
												Hide email address<br>
												<input type="checkbox" name="rec_hidecity" value="1" <? if (isset($_POST['rec_hidecity']) ) echo ("checked"); ?>>												Hide  location<br>
												<input type="checkbox" name="rec_hidetelno" value="1" <? if (isset($_POST['rec_hidetelno']) ) echo ("checked"); ?>>												
												Hide telephone number  <br>
												
											</tr>
											
									</table>
								</td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
									<td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Login Information</td>
								</tr>
								<tr>
									<td><img src="../../images/line.gif" width="772"></td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								
								<tr>
								  <td>
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<tr>
												<td   colspan="2" class="comment">Create a password for your account. Your user ID will be your email address.</td>
										     
											</tr>
											<tr>
												<td width="20%"  >Password</td>
										      <td width="80%"  ><input type="password" name="rec_password"  >
										      <img src="../../images/star.gif"></td>
											</tr>
											<tr>
											  <td>Confirm Password</td>
										      <td><input type="password" name="rec_confirmpassword" >
											    <img src="../../images/star.gif"></td>
											</tr>
											
									</table>
								</td></tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
									
									
								<tr>
									<td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Where did you hear about NamRecruit?</td>
								</tr>
								<tr>
									<td><img src="../../images/line.gif" width="772"></td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								
								<tr>
								  <td>
									<table cellpadding="5" cellspacing="0" border="0" width="98%" align="center">
											<tr>
												<td   colspan="2">
												<input type="checkbox" name="email" value="1" <? if (isset($_POST['email']) ) echo ("checked"); ?>>
												Email&nbsp;&nbsp;
												<input type="checkbox" name="google" value="2" <? if (isset($_POST['google']) ) echo ("checked"); ?>>
												Google&nbsp;&nbsp;
												<input type="checkbox" name="anothersearchengine" value="3" <? if (isset($_POST['anothersearchengine']) ) echo ("checked"); ?>>
												Another search engine&nbsp;&nbsp;
												<input type="checkbox" name="friend" value="4" <? if (isset($_POST['friend']) ) echo ("checked"); ?>>
												A friend&nbsp;&nbsp;
												<input type="checkbox" name="tv" value="5" <? if (isset($_POST['tv']) ) echo ("checked"); ?>>
												TV ad&nbsp;&nbsp;
												<input type="checkbox" name="newspaper" value="6" <? if (isset($_POST['newspaper']) ) echo ("checked"); ?>>
												Newspaper ad&nbsp;
												<input type="checkbox" name="radio" value="7" <? if (isset($_POST['radio']) ) echo ("checked"); ?>>
												Radio ad<br>
												<input type="checkbox" name="magazine" value="8" <? if (isset($_POST['magazine']) ) echo ("checked"); ?>>
												Magazine ad&nbsp;&nbsp;
												<input type="checkbox" name="banner" value="9" <? if (isset($_POST['banner']) ) echo ("checked"); ?>>
												Banner/Link&nbsp;&nbsp;
												<input type="checkbox" name="other" value="10" <? if (isset($_POST['other']) ) echo ("checked"); ?>>
												Other&nbsp;&nbsp;
												</td>
										     
											</tr>
											
											
									</table>
								</td></tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
									<td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Terms and Conditions </td>
								</tr>
								<tr>
									<td><img src="../../images/line.gif" width="772"></td>
								</tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								
								<tr>
								  <td>
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<tr>
											  <td   colspan="2">
												<input name="rec_terms" type="checkbox" id="terms" value="1" <? if (isset($_POST['rec_terms']) ) echo ("checked"); ?>>
												I confirm that I have read and agree with the <a href="../terms.php" class="terms">Term & Conditions</a> of the NamRecruit website. </td>
										     
											</tr>
											
											
									</table>
								</td></tr>
									<tr>
								  <td height="50">
									<table cellpadding="5" cellspacing="0" border="0" width="90%" align="center">
											<tr>
											  <td align="right" >
													<a href="#" onClick="previewform();"   class="imgcss"><img border="0" src="../../images/preview.gif"></a>
										      </td>
										      	<td>
											  		<img border="0" src="../../images/submit_registration.gif" onClick="submitform();" style="cursor:pointer">
													
												</td>
											</tr>
											
											
									</table>
								</td></tr>
								
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

