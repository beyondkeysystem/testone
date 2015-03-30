<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	
	$urlPage = "";
	if(isset($_GET['urlPage']))
	{
		$urlPage = $_GET['urlPage'];
	}	
	
	$url = "";
	if(isset($_GET["url"]))
	{
		if($_GET["url"] != "employers_list.php")
			$url .= "../utility/";
			
		$url .=  $_GET["url"];
	}	
	
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$sqlRec = "select * from job_recruiter where rec_id=" . $_GET['rec_id'];
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec=mysql_fetch_object($resultRec);
	$arrHeared = explode(",",$rsRec->rec_heared);
					
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
<script language="javascript">
	function goBack(url)
	{
		if(url == "")
			history.back();
		else
		{
			document.form1.action = url;
			document.form1.submit();
		}
	}
</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 <form name="form1" method="post">
			 <input type="hidden" name="invoice_id" value="<? if(isset($_POST['invoice_id'])) echo $_POST['invoice_id']; ?>"> 		 
			 <input type="hidden" name="pay_id" value="<? if(isset($_POST['pay_id'])) echo $_POST['pay_id']; ?>"> 		 
			 <input type="hidden" name="paid_by" value="<? if(isset($_POST['paid_by'])) echo $_POST['paid_by']; ?>"> 		 
			 <input type="hidden" name="rec_id" value="<? if(isset($_POST['rec_id'])) echo $_POST['rec_id']; ?>"> 		 
			 <input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 		 
			 
			 <input type="hidden" name="paid_date_from_date" value="<? if(isset($_POST['paid_date_from_date'])) echo $_POST['paid_date_from_date']; ?>">
			 <input type="hidden" name="paid_date_from_month" value="<? if(isset($_POST['paid_date_from_month'])) echo $_POST['paid_date_from_month']; ?>"> 		 
			 <input type="hidden" name="paid_date_from_year" value="<? if(isset($_POST['paid_date_from_year'])) echo $_POST['paid_date_from_year']; ?>"> 		  		 
			 
			 <input type="hidden" name="paid_date_to_date" value="<? if(isset($_POST['paid_date_to_date'])) echo $_POST['paid_date_to_date']; ?>">
			 <input type="hidden" name="paid_date_to_month" value="<? if(isset($_POST['paid_date_to_month'])) echo $_POST['paid_date_to_month']; ?>"> 		 
			 <input type="hidden" name="paid_date_to_year" value="<? if(isset($_POST['paid_date_to_year'])) echo $_POST['paid_date_to_year']; ?>"> 		  		 
			 		 
			<!-- fields from invoice list -->		 
		 	<input type="hidden" name="invoice_id" value="<? if(isset($_POST['invoice_id'])) echo $_POST['invoice_id']; ?>"> 		 
			 <input type="hidden" name="invoice_type" value="<? if(isset($_POST['invoice_type'])) echo $_POST['invoice_type']; ?>"> 		 			
			 <input type="hidden" name="pay_amount_from" value="<? if(isset($_POST['pay_amount_from'])) echo $_POST['pay_amount_from']; ?>"> 		 
			 <input type="hidden" name="pay_amount_to" value="<? if(isset($_POST['pay_amount_to'])) echo $_POST['pay_amount_to']; ?>"> 		 
			 <input type="hidden" name="payment_type" value="<? if(isset($_POST['payment_type'])) echo $_POST['payment_type']; ?>"> 		 
			 
			 <input type="hidden" name="invoice_date_from_date" value="<? if(isset($_POST['invoice_date_from_date'])) echo $_POST['invoice_date_from_date']; ?>">
			 <input type="hidden" name="invoice_date_from_month" value="<? if(isset($_POST['invoice_date_from_month'])) echo $_POST['invoice_date_from_month']; ?>"> 		 
			 <input type="hidden" name="invoice_date_from_year" value="<? if(isset($_POST['invoice_date_from_year'])) echo $_POST['invoice_date_from_year']; ?>"> 		  		 
			 
			 <input type="hidden" name="invoice_date_to_date" value="<? if(isset($_POST['invoice_date_to_date'])) echo $_POST['invoice_date_to_date']; ?>">
			 <input type="hidden" name="invoice_date_to_month" value="<? if(isset($_POST['invoice_date_to_month'])) echo $_POST['invoice_date_to_month']; ?>"> 		 
			 <input type="hidden" name="invoice_date_to_year" value="<? if(isset($_POST['invoice_date_to_year'])) echo $_POST['invoice_date_to_year']; ?>">			
								
			<!-- fields from employer list -->
			<input type="hidden" name="rec_uid" value="<? if(isset($_POST['rec_uid'])) echo $_POST['rec_uid']; ?>"> 	
			<input type="hidden" name="rec_name" value="<? if(isset($_POST['rec_name'])) echo $_POST['rec_name']; ?>">
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="rec_city" value="<? if(isset($_POST['rec_city'])) echo $_POST['rec_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="rec_status" value="<? if(isset($_POST['rec_status'])) echo $_POST['rec_status']; else if(isset($_GET['rec_status'])) echo $_GET['rec_status']; ?>"> 									 
			<input type="hidden" name="expire_status" value="<? if(isset($_POST['expire_status'])) echo $_POST['expire_status']; else if(isset($_GET['expire_status'])) echo $_GET['expire_status']; ?>"> 									 						
						 
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>		
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="100%" >
                              <tr>
                                <td height="30" class="headingRegister" >&nbsp;Company : <?=$rsRec->comp_name?></td>
                                <td align="right" class="normal_text" ><? include("includes/rec_select.php");?></td>
                              </tr>
                                <tr>
                                  <td width="70%" height="30" class="heading_black" >&nbsp;&nbsp;Recruiter/Employer Profile </td>
                                  <td width="30%" align="right" class="heading_black" >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">The profile details of recruiter/employer.</td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        <?							
							if(mysql_num_rows($resultRec) > 0)
							{
						?>
                          <tr>
                            <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                              <tr>
                                <td class="subhead_gray_small" >Personal Information</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <? if ($rsRec->rec_hidename==0) { ?>
                                    <tr>
                                      <td width="25%"  >Contact name</td>
                                      <td width="75%" align="left"  ><?=$rsRec->rec_name?></td>
                                    </tr>
                                    <tr>
                                      <td>Compnay name </td>
                                      <td align="left"><?=$rsRec->comp_name?></td>
                                    </tr>
                                    <? } ?>
                                    <tr>
                                      <td>Company Type </td>
                                      <td align="left"><? if ($rsRec->comp_type == 1) echo "Employer"; else echo "Recruiter"; ?></td>
                                    </tr>
                                    <? if ($rsRec->rec_hideaddress==0) { ?>
                                    <tr>
                                      <td>Address</td>
                                      <td align="left"><?=$rsRec->rec_address?></td>
                                    </tr>
                                    <? } ?>
                                    <tr>
                                      <td>Postal Code</td>
                                      <td align="left"><?=$rsRec->rec_postalcode?></td>
                                    </tr>
                                    <? if ($rsRec->rec_hidecity==0) { ?>
                                    <tr>
                                      <td>City or Town </td>
                                      <td align="left"><?=$rsRec->rec_city?></td>
                                    </tr>
                                    <? } ?>
                                    <tr>
                                      <td>Country</td>
                                      <td align="left"><?=getFieldValue("job_country","country_name", "country_id" , $rsRec->rec_country) ?></td>
                                    </tr>
                                    <tr>
                                      <td>Province/State</td>
                                      <td align="left"><?=getFieldValue("job_state","state_name", "state_id" , $rsRec->rec_state) ?>
                                      </td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="10"></td>
                              </tr>
                              <tr>
                                <td class="subhead_gray_small" >Contact Information</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td valign="top"><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
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
                                      <td><?=$rsRec->rec_web?>
                                      </td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="10"></td>
                              </tr>
                              <tr>
                                <td height="30" class="subhead_gray_small" >Where did you hear about NamRecruit?</td>
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
									<? if(isset($_GET["rec_status"]) && $_GET["rec_status"]!="")
									{?> 
                                      <td align="center" ><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>&rec_status=<?=$_GET["rec_status"]?>');" style="cursor:pointer"></td>
									  <? } else {?>
									   <td align="center" ><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>');" style="cursor:pointer"></td><? }?>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <?
					  	}
						else
						{
					  ?>
                          <tr>
                            <td ></td>
                          </tr>
                          <?
					  	}
					  ?>
                          <tr>
                            <td>&nbsp;</td>
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

