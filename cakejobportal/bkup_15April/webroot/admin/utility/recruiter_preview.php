<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	//for variables
	require_once("../../includes/functions.php");	
	include("../../includes/thumbnail_generator.php");
	
	$objDb = new db();
	$sqltemp = "select * from job_recruiter_temp";
	$resulttemp = $objDb->ExecuteQuery($sqltemp);
	$rstemp=mysql_fetch_object($resulttemp);
	$arrHeared = explode(",",$rstemp->rec_heared);
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
 function closewin()
{
	window.close();
}
</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
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
                                  <td height="50" class="recheading" >Recruiters/Employers</td>
                                </tr>
                                <tr>
                                  <td class="sectionheading" >Personal Information</td>
                                </tr>
                                <tr>
                                  <td><img src="../images/line.gif" width="772"></td>
                                </tr>
                                <tr>
                                  <td><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                      <? if ($rstemp->rec_hidename==0) { ?>
                                      <? if($rstemp->rec_name!=""){?>
                                      <tr>
                                        <td width="24%"  >Contact name</td>
                                        <td width="76%"  ><?=$rstemp->rec_name?></td>
                                      </tr>
                                      <? } if($rstemp->comp_name!=""){?>
                                      <tr>
                                        <td>Compnay name </td>
                                        <td><?=$rstemp->comp_name?></td>
                                      </tr>
                                      <? 
											}
										} ?>
                                      <? if($rstemp->comp_type!=""){?>
                                      <tr>
                                        <td>Company Type </td>
                                        <td><? if ($rstemp->comp_type == 1) echo "Employer"; else echo "Recruiter"; ?></td>
                                      </tr>
                                      <? }if ($rstemp->rec_hideaddress==0) { ?>
                                      <? if($rstemp->company_desc!=""){?>
                                      <tr>
                                        <td>Company description</td>
                                        <td><?=$rstemp->company_desc?></td>
                                      </tr>
                                      <? } if($rstemp->rec_address!=""){?>
                                      <tr style="display:none">
                                        <td>Address</td>
                                        <td><?=$rstemp->rec_address?></td>
                                      </tr>
                                      <? } ?>
                                      <? } ?>
                                      <tr style="display:none">
                                        <td>Postal Code</td>
                                        <td><?=$rstemp->rec_postalcode?></td>
                                      </tr>
                                      <? if ($rstemp->rec_city==0) { ?>
                                      <tr style="display:none">
                                        <td>City or Town </td>
                                        <td><?=$rstemp->rec_city?></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><span class="medium_black">Registered business address:</span></td>
                                      </tr>
                                      <?  if($rstemp->business_street!=""){?>
                                      <tr>
                                        <td>Street:</td>
                                        <td><?=$rstemp->business_street?></td>
                                      </tr>
                                      <? } if($rstemp->business_street_num!="0"){?>
                                      <tr>
                                        <td>Number:</td>
                                        <td><?=$rstemp->business_street_num?></td>
                                      </tr>
                                      <? } if($rstemp->business_suburb!=""){?>
                                      <tr>
                                        <td>Suburb:</td>
                                        <td><?=$rstemp->business_suburb?></td>
                                      </tr>
                                      <? } if($rstemp->business_city!=""){?>
                                      <tr>
                                        <td>City or town </td>
                                        <td><?=$rstemp->business_city?></td>
                                      </tr>
                                      <? } if($rstemp->business_country!=""){?>
                                      <tr>
                                        <td>Country</td>
                                        <td><?=getFieldValue("job_country","country_name","country_id", $rstemp->business_country)?></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><span class="medium_black">Postal Address:</span></td>
                                      </tr>
                                      <? } if($rstemp->postal_po_box!=""){?>
                                      <tr>
                                        <td><p>P O Box number</p></td>
                                        <td><?=$rstemp->postal_po_box?></td>
                                      </tr>
                                      <? } if($rstemp->postal_private_bag!=""){?>
                                      <tr>
                                        <td><p>Private bag number</p></td>
                                        <td><?=$rstemp->postal_private_bag?></td>
                                      </tr>
                                      <? } if($rstemp->postal_post_code!=""){?>
                                      <tr>
                                        <td height="39">Postal code: </td>
                                        <td><?=$rstemp->postal_post_code?></td>
                                      </tr>
                                      <? } if($rstemp->postal_city!=""){?>
                                      <tr>
                                        <td>City or town </td>
                                        <td><?=$rstemp->postal_city?></td>
                                      </tr>
                                      <? } 
										//echo $_POST["postal_country"];
										
										if($rstemp->postal_country!=""){?>
                                      <tr>
                                        <td>Country</td>
                                        <td><?=getFieldValue("job_country","country_name","country_id", $rstemp->postal_country)?></td>
                                      </tr>
                                      <? } if($rstemp->postal_region!=""){?>
                                      <tr>
                                        <td>Region</td>
                                        <td><? if(showByName("job_state","state_name","state_id",$rstemp->postal_region)) echo (showByName("job_state","state_name","state_id",$rstemp->postal_region)); else echo($rstemp->postal_region);?></td>
                                      </tr>
                                      <? } ?>
                                      <? } ?>
                                  </table></td>
                                </tr>
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
                                  <td valign="top"><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                      <? if ($rstemp->rec_hidetelno==0) { ?>
                                      <? if($rstemp->rec_phone!=""){?>
                                      <tr>
                                        <td width="59%"  >Telephone number </td>
                                        <td width="41%"  ><?=$rstemp->rec_phone?></td>
                                      </tr>
                                      <? } if($rstemp->rec_mobile!=""){?>
                                      <tr>
                                        <td>Cell phone number </td>
                                        <td><?=$rstemp->rec_mobile?></td>
                                      </tr>
                                      <? } if($rstemp->rec_fax!=""){?>
                                      <tr>
                                        <td>Fax number </td>
                                        <td><?=$rstemp->rec_fax?></td>
                                      </tr>
                                      <? } ?>
                                      <? } ?>
                                      <? if ($rstemp->rec_hideemail==0) { ?>
                                      <? if($rstemp->rec_email!=""){?>
                                      <tr>
                                        <td>Email address </td>
                                        <td><?=$rstemp->rec_email?></td>
                                      </tr>
                                      <? }?>
                                      <? } ?>
                                      <? if($rstemp->rec_web!=""){?>
                                      <tr>
                                        <td>Web address </td>
                                        <td><?=$rstemp->rec_web?>
                                        </td>
                                      </tr>
                                      <? }?>
                                      <?
												if($rstemp->comp_logo != "")
												{
											?>
                                      <? if($rstemp->comp_logo!=""){?>
                                      <tr>
                                        <td valign="top">Company Logo </td>
                                        <td class="comment"><img src="logos/<?=$rstemp->comp_logo?>"></td>
                                      </tr>
                                      <? }?>
                                      <?
											 	}
											?>
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
						  </table></td>
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
          <? include("includes/bottom.php"); ?>
     </tr>
</table>
</body>
</html>

