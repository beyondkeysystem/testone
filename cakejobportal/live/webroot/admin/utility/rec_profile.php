<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	
	if(isset($_GET["rec_id"]))
		$rec_id = $_GET["rec_id"];
	else if(isset($_POST["rec_id"]))
		$rec_id = $_POST["rec_id"];	
	
	require_once("../../includes/functions.php");	
	require_once("../../classes/db_class.php");
	require_once("../../includes/thumbnail_generator.php");

	$objDb = new db();
				
	$id="";
	$rec_name = "";
	$comp_name = "";		
	$comp_type = "";
	$company_desc ="";
	$rec_address = "";				
	$rec_postalcode = "";		
	$rec_city = "";		
	$rec_state = "";
	$rec_country = "0";	
	$rec_phone = "";	
	$rec_mobile = "";
	$rec_fax = "";
	$rec_email = "";		
	$rec_web = "";	
    $comp_logo = "";	
	$rec_hidename = "";
	$rec_hideaddress = "";		
	$rec_hideemail = "";
	$rec_hidecity = "";	
	$rec_hidetelno = "";
	$getOldPassword = "";
	$rec_vat_regno="";
	
	if(isset($_POST["rec_name"]))
	{
		$rec_name = $_POST["rec_name"];
		$comp_name = $_POST["comp_name"];		
		$comp_type = $_POST["comp_type"];			
		$rec_address = $_POST["rec_address"];						
		$rec_postalcode = $_POST["rec_postalcode"];			
		$rec_city = $_POST["rec_city"];			
		//$rec_state = $_POST["rec_state"];
		//$rec_country = $_POST["rec_country"];		
		$rec_phone = $_POST["rec_phone"];			
		$rec_mobile = $_POST["rec_mobile"];			
		$rec_fax = $_POST["rec_fax"];				
		$rec_email = $_POST["rec_email"];			
		$rec_web = $_POST["rec_web"];		
		
	//uploading company logo
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
			$comp_logo = $_POST["hid_comp_logo"];	
		}		
		
		if(isset($_POST["rec_hidename"]))	
			$rec_hidename = $_POST["rec_hidename"];	
			
		if(isset($_POST["rec_hideaddress"]))						
			$rec_hideaddress = $_POST["rec_hideaddress"];	
			
		if(isset($_POST["rec_hideemail"]))					
			$rec_hideemail = $_POST["rec_hideemail"];		
			
		if(isset($_POST["rec_hidename"]))				
			$rec_hidecity = $_POST["rec_hidename"];		
			
		if(isset($_POST["rec_hidetelno"]))				
			$rec_hidetelno = $_POST["rec_hidetelno"];			
			
		$sqlRec = "select * from job_recruiter where rec_id=" . $rec_id;
		$resultRec = $objDb->ExecuteQuery($sqlRec);
		$rsRec = mysql_fetch_object($resultRec);			
		$getOldPassword = $rsRec->rec_password;
		$rec_vat_regno=$rsRec->rec_vat_regno;										
	}
	else
	{	
		$sqlRec = "select * from job_recruiter where rec_id=" . $rec_id;
		$resultRec = $objDb->ExecuteQuery($sqlRec);
		$rsRec = mysql_fetch_object($resultRec);
		
		$rec_name = $rsRec->rec_name;
		$comp_name = $rsRec->comp_name;		
		$comp_type = $rsRec->comp_type;	
		$company_desc = $rsRec->company_desc;	// Newely added			
		$rec_address = $rsRec->rec_address;						
		$rec_postalcode = $rsRec->rec_postalcode;			
		$rec_city = $rsRec->rec_city;			
		$rec_state = $rsRec->rec_state;
		$rec_country = $rsRec->rec_country;	
		
		$business_street =$rsRec->business_street;
		$business_street_num =$rsRec->business_street_num;
		$business_suburb =$rsRec->business_suburb ;
		$business_city =$rsRec->business_city ;
		$business_country =$rsRec->business_country ;
		$postal_po_box =$rsRec->postal_po_box ;
		$postal_private_bag =$rsRec->postal_private_bag ;
		$postal_post_code =$rsRec->postal_post_code ;
		$postal_city =$rsRec->postal_city ;
		$postal_country =$rsRec->postal_country ;
		$postal_region =$rsRec->postal_region ;
		$rec_vat_regno=$rsRec->rec_vat_regno;	
		$rec_phone = $rsRec->rec_phone;			
		$rec_mobile = $rsRec->rec_mobile;			
		$rec_fax = $rsRec->rec_fax;				
		$rec_email = $rsRec->rec_email;			
		$rec_web = $rsRec->rec_web;			
		$comp_logo = $rsRec->comp_logo;	
		$rec_hidename = $rsRec->rec_hidename;			
		$rec_hideaddress = $rsRec->rec_hideaddress;		
		$rec_hideemail = $rsRec->rec_hideemail;		
		$rec_hidecity = $rsRec->rec_hidename;		
		$rec_hidetelno = $rsRec->rec_hidetelno;				
		$getOldPassword = $rsRec->rec_password;				
	}		 	
	
	if(isset($_GET["post"]))
	{
		if(isset($_GET["post"])=="post")
		{
			recruiter_preview($comp_logo);
			$id=$_GET["post"];
		}
	}
	
	$sqlChkCity = "select * from job_city where city_name='" . $rec_city . "'";
	$resultChkCity = $objDb->ExecuteQuery($sqlChkCity);
	if(mysql_num_rows($resultChkCity) > 0)
		$other_city = 0;
	else
		$other_city = 1;
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
<script src="../../javascript/recruiter.js" language="javascript"></script>
<script src="../../javascript/main.js" language="javascript"></script>
<script language="javascript" type="text/javascript">
 function submitform()
 {
	if (document.getElementById("email_exists").innerHTML.length > 10)
	{
		alert("This email address already exists.");
		document.form1.rec_email.focus();
		return false;
	}
	
 	if(validateRecruiter(document.form1,1))
	{
		document.form1.method="post";
		document.form1.action="rec_profile_action.php";
		document.form1.submit();
	}	
 }
 
 function previewform()
 {
		document.form1.method="post";
		document.form1.action="rec_profile.php?post=post&rec_id=<?=$rec_id?>";
		document.form1.submit();	 
 }
function showLeftChars()
{
		document.getElementById("msg_chars").style.display = "";
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
			<form name="form1" enctype="multipart/form-data" method="post" action="rec_profile.php">
			<input type="hidden" name="getOldPassword" value="<?=$getOldPassword?>">								
			<input type="hidden" name="rec_id" value="<?=$rec_id?>">			
			<input type="hidden" name="hid_rec_id" value="<?=$rec_id?>">						

			<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Edit Employer's Profile </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can edit the employer's profile here. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <input type="hidden" name="getOldPassword" value="<?=$getOldPassword?>">
                              <input type="hidden" name="rec_id" value="<?=$rec_id?>">
                              <?
									if(isset($_GET['msg']) && $_GET['msg'] == "updated")
									{
								?>
                              <tr>
                                <td height="30" class="error">&nbsp;&nbsp;&nbsp;The profile has been updated successfully.</td>
                              </tr>
                              <?
									}
								?>
                              <tr>
                                <td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Personal Information</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td >&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <tr>
                                      <td width="140">Contact name </td>
                                      <td><input type="text" name="rec_name" id="rec_name" value="<?=$rec_name?>">
                                          <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Company name </td>
                                      <td><input type="text" name="comp_name" id="comp_name" value="<?=$comp_name?>">
                                          <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Company type</td>
                                      <td><input name="comp_type" id="comp_type" type="radio" value="1" <? if($comp_type != 2) echo "checked"; ?>>
            Employer
              <input name="comp_type" id="comp_type" type="radio" value="2" <? if($comp_type == 2) echo "checked"; ?>>
            Recruiter</td>
                                    </tr>
                                    <tr>
                                      <td valign="top">Company description </td>
                                      <td class="comment"><textarea  name="company_desc" cols="30" rows="6" onkeyup="document.getElementById('chars_left').innerHTML=(120-this.value.length); if(this.value.length>120) {document.getElementById('chars_left').innerHTML='Fewer than 0'; this.value = this.value.substring(0,120);}" ><?=$company_desc?></textarea><span id="msg_chars" style="display:none;">You have <u><span id="chars_left">120</span></u> characters left.</span></td>
                                    </tr>
                                    <tr>
                                      <td valign="top">Address</td>
                                      <td><textarea name="rec_address" cols="30" rows="6"><?=$rec_address?>
                            </textarea>
                                          <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Postal code</td>
                                      <td><input type="text" name="rec_postalcode" value="<?=$rec_postalcode?>">
                                          <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>City or town </td>
                                      <td><? if($other_city == 0) echo fill_dropdown('rec_city','job_city', 'city_name', "city_name", $rec_city,"Select","","onchange='otherreccity();'"); else echo fill_dropdown('rec_city','job_city', 'city_name', "city_name", "--- Other ---","Select","","onchange='otherreccity();'");?>
                                          <span id="span_other_city" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;Other city or town :
                                            <input name="other_rec_city" type="text" value="<?=$rec_city?>" >
                                        </span> <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><span class="medium_black">Registered business address:</span></td>
                                    </tr>
                                    <tr>
                                      <td><p>Street:</p></td>
                                      <td><input type="text" name="business_street" id="business_street" value="<?=$business_street?>"></td>
                                    </tr>
                                    <tr>
                                      <td><p>Number:</p></td>
                                      <td><input type="text" name="business_street_num" id="business_street_num" value="<?=$business_street_num?>"></td>
                                    </tr>
                                    <tr>
                                      <td>Suburb:</td>
                                      <td><input type="text" name="business_suburb" id="business_suburb" value="<?=$business_suburb?>"></td>
                                    </tr>
                                    <tr>
                                      <td>City or town </td>
                                      <td><?=fill_dropdown('business_city','job_city', 'city_name', "city_name", $business_city,"Select","","onchange='other_city();'")?>
                                        <span id="span_business_city" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;Other city or town :
                                            <input name="other_business_city" type="text" value="<? if (isset($_POST['other_business_city'])) echo stripslashes($_POST['other_business_city']); ?>" >
                                        </span><img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Country</td>
                                      <td><?=fill_dropdown('business_country','job_country', 'country_name', "country_id", $business_country, "Country","","onchange=getStates('states','" . $rec_state . "');")?>
                                      <img src="../../images/star.gif"></td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                      <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2"><span class="medium_black">Postal Address:</span></td>
                                    </tr>
                                    <tr>
                                      <td><p>P O Box number</p></td>
                                      <td><input type="text" name="postal_po_box" id="postal_po_box" value="<?=$postal_po_box?>"></td>
                                    </tr>
                                    <tr>
                                      <td><p>Private bag number</p></td>
                                      <td><input type="text" name="postal_private_bag" id="postal_private_bag" value="<?=$postal_private_bag?>"></td>
                                    </tr>
                                    <tr>
                                      <td height="39">Postal code: </td>
                                      <td><input type="text" name="postal_post_code" id="postal_post_code" value="<?=$postal_post_code?>"></td>
                                    </tr>
                                    <tr>
                                      <td>City or town </td>
                                      <td><?=fill_dropdown('postal_city','job_city', 'city_name', "city_name", $postal_city,"Select","","onchange='othercity();'")?>
                                        <span id="span_postal_city" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;Other city or town :
                                            <input name="other_postal_city" type="text" value="<? if (isset($_POST['other_postal_city'])) echo stripslashes($_POST['other_postal_city']); ?>" >
                                        </span><img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Country</td>
                                      <td><?=fill_dropdown('postal_country','job_country', 'country_name', "country_id", $postal_country, "Country","","onchange=getStates('states','" . $rec_state . "');")?>
                                      <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Region</td>
                                      <td><input type="hidden"  name="rec_state" value="<?=$rec_state?>">
                                          <? if(showByName("job_state","state_name","state_id",$postal_region)){?>
                                          <span id="states">
                                          <?=fill_dropdown('postal_region','job_state', 'state_name', "state_id", $postal_region, "Region","where country_id=" . $postal_country,"onchange=setHiddenValue(this.value);")?><span id="span_other_region" <? if (!isset($_POST['other_region']) or $postal_region!=16){?>style="display:none"<? } ?> >&nbsp;&nbsp;&nbsp;&nbsp;Please specify other region :
                                                    <input name="other_region" type="text" value="<? if (isset($_POST['other_region'])) echo stripslashes($_POST['other_region']); ?>" >
                                                    <img src="../../images/star.gif"></span><? } else{?>
                                            <?=fill_dropdown('postal_region1','job_state', 'state_name', "state_id", 16, "Region","where country_id=" . 146,"onchange=setHiddenValue(this.value);")?>
                                          </span><img src="../../images/star.gif"><span id="span_other_region" >&nbsp;&nbsp;&nbsp;&nbsp;Please specify other region :
                                            <input name="other_region" type="text" value="<? if (isset($_POST['other_region'])) echo stripslashes($_POST['other_region']); else echo($postal_region);?>" >
                                            <img src="../../images/star.gif"></span>
                                        <? }?>                                      </td>
                                    </tr>
                                    

                                    
                                    <!--
											<tr>
                                              <td>Country</td>
                                              <td><?//=fill_dropdown('rec_country','job_country', 'country_name', "country_id", $rec_country, "Country","")?>
                                                  <img src="../../images/star.gif"></td>
									  		</tr>
											<tr>
											  <td>Province/State</td>
										      <td><input name="rec_state" type="text" id="rec_state" value="<?//=$rec_state?>">										        <img src="../../images/star.gif"></td>
											</tr>
											-->
                                </table></td>
                              </tr>
                              <tr>
                                <td >&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Contact Information</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772" height="1"></td>
                              </tr>
                              <tr>
                                <td >&nbsp;</td>
                              </tr>
                              <tr>
                                <td valign="top"><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <tr>
                                      <td width="20%">Telephone number </td>
                                      <td width="80%"><input name="rec_phone" type="text" id="rec_telno" value="<?=$rec_phone?>">
                                          <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>Cell phone number </td>
                                      <td><input name="rec_mobile" type="text" id="rec_mobile" value="<?=$rec_mobile?>"></td>
                                    </tr>
                                    <tr>
                                      <td>Fax number </td>
                                      <td><input name="rec_fax" type="text" id="rec_fax" value="<?=$rec_fax?>"></td>
                                    </tr>
                                    <tr>
                                      <td>Email address </td>
                                      <td><input name="rec_email" type="text" value="<?=$rec_email ?>" size="40" onblur="checkMail('email_exists');">
                                          <img src="../../images/star.gif">&nbsp;&nbsp;<span class="error" id="email_exists"></span></td>
                                    </tr>
                                    <tr>
                                      <td>Web address </td>
                                      <td><input name="rec_web" type="text" value="<?=$rec_web?>" size="40">
                                      </td>
                                    </tr>
                                    <?
												if($comp_logo != "")
												{
											?>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td class="comment"><img src="../../images/star.gif">
                                        <input type="checkbox" name="chkLogo" <? if(isset($_POST['chkLogo'])) echo "checked"; ?>>
                                        Delete Logo</td></tr>
                                    <?
											 	}
											?>
                                    <tr>
                                      <td>Company Logo </td>
                                      <td class="comment"><input name="comp_logo" type="file" id="comp_logo" size="50" >
                                          <input name="hid_comp_logo" type="hidden" value="<?=$comp_logo?>">
&nbsp;&nbsp;Size : 180px X 80px</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" class="comment" >Use the checkboxes below to indicate information you would like to hide from jobseekers. Any information that you do NOT want to provide to potential employees should be checked. </td>
                                    </tr>
                                    <tr>
                                      <td><input name="rec_vat_regno" type="hidden" id="rec_vat_regno" value="<?=$rec_vat_regno?>" >/td>
                                      <td><input type="checkbox" name="rec_hidename" value="1" <? if ($rec_hidename == 1) echo "checked"; ?>>
            Hide contact name<br>
            <input type="checkbox" name="rec_hideaddress" value="1" <? if ($rec_hideaddress == 1) echo "checked"; ?>>
            Hide physical address<br>
            <input type="checkbox" name="rec_hideemail" value="1" <? if ($rec_hideemail == 1) echo "checked"; ?>>
            Hide email address<br>
            <input type="checkbox" name="rec_hidecity" value="1" <? if ($rec_hidecity == 1) echo "checked"; ?>>
            Hide location<br>
            <input type="checkbox" name="rec_hidetelno" value="1" <? if ($rec_hidetelno == 1) echo "checked"; ?>>
            Hide telephone number <br>
                                                                </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td >&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="30" class="medium_black" >&nbsp;&nbsp;&nbsp;Login Information</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td >&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <tr>
                                      <td   colspan="4" class="comment">Create a password for your account. Your user ID will be your email address.</td>
                                    </tr>
                                    <!--<tr>
                                      <td  >Old Password</td>
                                      <td colspan="3"  ><input name="rec_oldpassword" type="password" id="rec_oldpassword"  >
                                          <img src="../../images/star.gif"></td>
                                    </tr>-->
                                    <tr>
                                      <td width="20%"  >Password</td>
                                      <td width="24%"  ><input type="password" name="rec_password"  >
                                          <img src="../../images/star.gif"></td>
                                      <td width="15%"  >Confirm Password </td>
                                      <td width="41%"  ><input type="password" name="rec_confirmpassword" >
                                          <img src="../../images/star.gif"></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td colspan="3">&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="50" align="left"><table cellpadding="5" cellspacing="0" border="0" width="70%" align="left">
                                    <tr>
                                      <td align="right" ><a href="#" onClick="previewform();"   class="imgcss"><img src="../../images/preview.gif" width="102" height="24" border="0"></a> </td>
                                      <td><img src="../../images/update.gif" width="60" height="22" border="0" onClick="submitform();" style="cursor:pointer"> </td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center"><table cellpadding="5" cellspacing="0" border="0" width="80%" align="left">
                              <tr>
                                <td align="center" ><img src="../images/back.gif" border="0" style="cursor:pointer" onClick="history.back();">  </td>
                              </tr>
                            </table>
                            </td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
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

