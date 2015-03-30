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
		$url .=  $_GET["url"];
	}	
		
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$sqltemp = "select * from job_jobseeker where seeker_id='".$_GET["seeker_id"]."'";
	$resulttemp = $objDb->ExecuteQuery($sqltemp);
	$rstemp=mysql_fetch_object($resulttemp);
	
	$sqlhear = "select * from job_jobseekerhear where seeker_id='".$_GET["seeker_id"]."'";
	$resulthear = $objDb->ExecuteQuery($sqlhear);
	$rshear=mysql_fetch_object($resulthear);

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
 function search_seekers()
 {
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
    <td class="whitebgcolor"><form name="form1" method="post" action="seeker_list.php">
        <input type="hidden" name="seeker_uid" value="<? if(isset($_POST['seeker_uid'])) echo $_POST['seeker_uid']; ?>">
        <input type="hidden" name="seeker_name" value="<? if(isset($_POST['seeker_name'])) echo $_POST['seeker_name']; ?>">
        <input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>">
        <input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>">
        <input type="hidden" name="seeker_city" value="<? if(isset($_POST['seeker_city'])) echo $_POST['seeker_city']; ?>">
        <input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>">
        <input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>">
        <input type="hidden" name="seeker_status" value="<? if(isset($_POST['seeker_status'])) echo $_POST['seeker_status']; else if(isset($_GET['seeker_status'])) echo $_GET['seeker_status']; ?>">
        <!-- Page Body Start-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="100%" >
                      <tr>
                        <td height="30" class="headingRegister" >&nbsp;CV Name :
                          <?=$rstemp->seeker_summary?></td>
                        <td align="right" class="normal_text" ><? include("includes/seeker_select.php");?></td>
                      </tr>
                      <tr>
                        <td width="73%" height="30" class="heading_black" >&nbsp;Job Seeker Profile </td>
                        <td width="27%" align="right" class="heading_black" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                              <td width="5"></td>
                              <td width="98%">The profile details of
                                <?=$rstemp->seeker_name?>
                                <?=$rstemp->seeker_surname?>
                                (Seeker ID :
                                <?=$rstemp->seeker_uid?>
                                ).</td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="782"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" ><tr><td width="779" height="30" class="subhead_gray_small" ><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                          <tr>
                            <td width="779" height="30" class="subhead_gray_small" >Personal Information</td>
                          </tr>
                          <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td ><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                <tr>
                                  <td colspan="2" height="10" ></td>
                                </tr>
                                <? if ( $rstemp->seeker_name != "" ) { ?>
                                <tr>
                                  <td width="38%" >Title</td>
                                  <td width="62%"  ><?=$rstemp->seeker_title?></td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_surname != "" ) { ?>
                                <tr>
                                  <td >Surname</td>
                                  <td  ><?=$rstemp->seeker_surname?>                                  </td>
                                </tr>
                                <tr>
                                  <td  >Name</td>
                                  <td  ><?=$rstemp->seeker_name?></td>
                                </tr>
                                
                                <? } ?>
                                <? if ( $rstemp->seeker_maiden != "" ) { ?>
                                <tr>
                                  <td >Maiden Name</td>
                                  <td ><?=$rstemp->seeker_maiden?></td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_title != "" ) { ?>

                                <? } ?>
                                <? if ( $rstemp->seeker_gender != "" ) { ?>
                                <tr>
                                  <td   >Gender</td>
                                  <td  ><?=$rstemp->seeker_gender?></td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_dob != "" ) { ?>
                                <tr>
                                  <td  >Date of Birth</td>
                                  <td  ><?=getDateValue($rstemp->seeker_dob); ?>                                  </td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_citizenship != "" ) { ?>
                                <tr>
                                  <td >Indentity Number</td>
                                  <td ><?=$rstemp->seeker_indentity_no?></td>
                                </tr>
                                <tr>
                                  <td  >Citizenship</td>
                                  <td ><?=$rstemp->seeker_citizenship?></td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_equity != "" ) { ?>
                                <tr>
                                  <td>Equity Status</td>
                                  <td><?=$rstemp->seeker_equity?></td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_marital_status != "" ) { ?>
                                <tr>
                                  <td >Marital Status</td>
                                  <td ><?=$rstemp->seeker_marital_status?></td>
                                </tr>
                                <? } ?>
                                <? if ( $rstemp->seeker_register_type != 1 or $rstemp->seeker_register_type != 2) { ?>
									<? if ( $rstemp->seeker_address != "" ) { ?>
                                    <tr>
                                      <td >Address</td>
                                      <td ><?=$rstemp->seeker_address?></td>
                                    </tr>
                                    <? } 
								  }?>
                                <? if ( $rstemp->seeker_register_type != 1 or $rstemp->seeker_register_type != 2) { ?>
                                <? if ( $rstemp->seeker_postalcode != "" ) { ?>
                                <tr>
                                  <td  >Postal Code</td>
                                  <td  ><?=$rstemp->seeker_postalcode?></td>
                                </tr>
                                <? } 
								  }?>
                                <? if ( $rstemp->seeker_register_type != 1 or $rstemp->seeker_register_type != 2) { ?>
                                <? if ( $rstemp->seeker_state != "" ) { ?>
                                <tr>
                                  <td >Province/State</td>
                                  <td ><?=$rstemp->seeker_state ?></td>
                                </tr>
                                <? } 
								  }?>
                                <!--<? if ( $rstemp->seeker_criminal != "" ) { ?>
											<tr>
											  <td >Criminal Record</td>
										      <td ><?=$rstemp->seeker_criminal?></td>
										   </tr>
										   <? } ?>-->
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="2"><table cellpadding="0" cellspacing="0" border="0" width="100%" align="left">
                                <tr>
                                  <td colspan="2" ><table width="97%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <? if ( $rstemp->seeker_language != "" ) { ?>
                                      <tr>
                                        <td width="29%"  >Language</td>
                                        <td width="71%"  ><?=$rstemp->seeker_language ?></td>
                                      </tr>
                                      <? } ?>
                                      <tr>
                                        <td colspan="2"><table cellpadding="5" cellspacing="0" width="100%" align="left" class="table_black_border">
                                            <tr>
                                              <td width="20%" class="table_head">&nbsp;</td>
                                              <td width="20%" class="table_head">Language</td>
                                              <td width="20%" class="table_head">Speak</td>
                                              <td width="20%" class="table_head">Write</td>
                                              <td width="20%" class="table_head">Read</td>
                                            </tr>
                                            <tr>
                                              <td width="20%" class="table_row">Home language :</td>
                                              <td width="20%"  class="table_row"><?=$rstemp->seeker_language_home ?></td>
                                              <td width="20%"  class="table_row"><? switch($rstemp->seeker_language_home_speak){ case 1: echo "Not"; break; case 2: echo "Poor"; break; case 3: echo "Good"; break; case 4: echo "Excellent"; break; default : echo "Not specified"; break; }?></td>
                                              <td width="20%"  class="table_row"><?=$rstemp->seeker_language_home_write?></td>
                                              <td width="20%"  class="table_row_end"><?=$rstemp->seeker_language_home_read?></td>
                                            </tr>
                                            <tr>
                                              <td width="20%" class="table_alternate_row">Second Language :</td>
                                              <td width="20%"  class="table_alternate_row"><?=$rstemp->seeker_language_second ?></td>
                                              <td width="20%"  class="table_alternate_row"><? switch($rstemp->seeker_language_second_speak){ case 1: echo "Not"; break; case 2: echo "Poor"; break; case 3: echo "Good"; break; case 4: echo "Excellent"; break; default : echo "Not specified"; break; }?></td>
                                              <td width="20%"  class="table_alternate_row"><?=$rstemp->seeker_language_second_write?></td>
                                              <td width="20%"  class="table_alternate_row_end"><?=$rstemp->seeker_language_second_read?></td>
                                            </tr>
                                            <tr>
                                              <td width="20%" class="table_row">Third Language :</td>
                                              <td width="20%"  class="table_row"><?=$rstemp->seeker_language_third?></td>
                                              <td width="20%"  class="table_row"><? switch($rstemp->seeker_language_third_speak){ case 1: echo "Not"; break; case 2: echo "Poor"; break; case 3: echo "Good"; break; case 4: echo "Excellent"; break; default : echo "Not specified"; break; }?></td>
                                              <td width="20%"  class="table_row"><?=$rstemp->seeker_language_third_write?></td>
                                              <td width="20%"  class="table_row_end"><?=$rstemp->seeker_language_third_read?></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td colspan="2" >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td class="subhead_gray_small" height="30" >Drivers License Information</td>
                                </tr>
                                <tr>
                                  <td><img src="../images/line.gif" width="772"></td>
                                </tr>
                                <tr>
                                  <td valign="top" align="left"><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                      <? if ( $rstemp->seeker_license_code != "" ) { ?>
                                      <tr>
                                        <td width="38%" align="left">Drivers license code</td>
                                        <td width="62%" align="left"><?=$rstemp->seeker_license_code?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_license_restrictions != "" ) { ?>
                                      <tr>
                                        <td align="left">Drivers license restrictions</td>
                                        <td align="left"><?=$rstemp->seeker_license_restrictions?> </td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_license_endorsements != "" ) { ?>
                                      <tr>
                                        <td align="left">Drivers license Endorsements</td>
                                        <td align="left"><?=$rstemp->seeker_license_endorsements?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_professional_authority != "" ) { ?>
                                      <tr>
                                        <td align="left">Professional authority endorsements</td>
                                        <td align="left"><?=$rstemp->seeker_professional_authority?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_license_no != "" ) { ?>
                                      <tr>
                                        <td align="left">Drivers license no</td>
                                        <td align="left"><?=$rstemp->seeker_license_no?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_license_date != ""  and $rstemp->seeker_license_date != "--") { ?>
                                      <tr>
                                        <td align="left">License expiry date</td>
                                        <td align="left"><?=getDateValue($rstemp->seeker_license_date);?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_indentity_no != "" ) { ?>
                                     <? } ?>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td class="subhead_gray_small" height="30" >Contact Information</td>
                                </tr>
                                <tr>
                                  <td><img src="../images/line.gif" width="772"></td>
                                </tr>
                                <tr>
                                  <td valign="top"><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                      <? if ( $rstemp->seeker_postal_po_box != "" ) { ?>
                                      <tr>
                                        <td width="38%"  >P O Box number </td>
                                        <td width="62%"  ><?=$rstemp->seeker_postal_po_box?></td>
                                      </tr>
                                      <? } ?>
                                       <? if ( $rstemp->seeker_business_country!= "" ) { ?>                                     
                                      <tr>
                                        <td >Country</td>
                                        <td ><?=getFieldValue("job_country","country_name", "country_id" , $rstemp->seeker_business_country) ?>                                        </td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_postal_city!= "" ) { ?>
                                      <tr>
                                        <td >City or Town </td>
                                        <td ><?=$rstemp->seeker_postal_city?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ($rstemp->seeker_hidetelno==0) { ?>
                                      <? if ( $rstemp->seeker_phone != "" ) { ?>
                                      <tr>
                                        <td width="38%"  >Telephone Number(H)</td>
                                        <td width="62%"  ><?=$rstemp->seeker_phone?></td>
                                      </tr>
									   <? } ?>
									   <? if ( $rstemp->seeker_phone != "" ) { ?>
									  <tr>
                                        <td width="38%"  >Telephone Number(W)</td>
                                        <td width="62%"  ><?=$rstemp->seeker_phone_work?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_mobile != "" ) { ?>
                                      <tr>
                                        <td  >Cell phone number </td>
                                        <td  ><?=$rstemp->seeker_mobile?></td>
                                      </tr>
                                      <? } ?>
                                      <? } ?>
                                      <? if ($rstemp->seeker_hideemail==0) { ?>
                                      <? if ( $rstemp->seeker_email != "" ) { ?>
                                      <tr>
                                        <td >Email address </td>
                                        <td ><?=$rstemp->seeker_email?></td>
                                      </tr>
                                      <? } ?>
                                      <? } ?>
                                      <? if ( $rstemp->seeker_web != "" ) { ?>
                                      <tr>
                                        <td >Web address </td>
                                        <td ><?=$rstemp->seeker_web?></td>
                                      </tr>
                                      <? } ?>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td >&nbsp;</td>
                                </tr>
                            </table></td>
                            <td width="1" valign="top"></td>
                          </tr>
                          <tr>
                            <td class="subhead_gray_small" height="30" colspan="2">Educational Information</td>
                          </tr>
                          <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
                          <!-- Here onwards is the Education Qualifications -->
                          <? if ( ($rstemp->seeker_register_type == 1) or ($rstemp->seeker_register_type == 2) or ($rstemp->seeker_register_type == 3) or ($rstemp->seeker_register_type == 4)) { ?>
                          <tr>
                            <td colspan="2" ><table width="97%" border="0" align="center" cellpadding="3" cellspacing="0">
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                                      <tr>
                                        <td><u>Tertiary Qualifications </u></td>
                                      </tr>
                                      <tr>
                                        <td  valign="top"><!--new table-->
                                            <table width="100%" cellpadding="6" cellspacing="0" class="table_black_border">
                                              <tr>
                                                <td width="12%" align="right" class="table_head" >&nbsp;</td>
                                                <td width="12%" class="table_head" >Degree</td>
                                                <td width="13%" class="table_head"  >Field Of study </td>
                                                <td width="27%" class="table_head" >Institution</td>
                                                <td width="18%" class="table_head" >From</td>
                                                <td width="18%" class="table_head_end"  >To</td>
                                              </tr>
                                              <tr>
                                                <td width="12%" align="right" class="table_row"  >Highest</td>
                                                <td width="12%" class="table_row" ><?=$rstemp->seeker_tertiary_higherdegree?>
                                                  &nbsp; </td>
                                                <td width="13%" class="table_row" ><?=$rstemp->seeker_tertiary_higherfield?>
                                                  &nbsp;</td>
                                                <td width="27%" class="table_row" ><?=$rstemp->seeker_tertiary_higherinstitution?>
                                                  &nbsp;</td>
                                                <td width="18%" class="table_row" ><?=getDateValue($rstemp->seeker_tertiary_higherfromdate);?>
                                                  &nbsp;</td>
                                                <td width="18%" class="table_row_end"  ><?=getDateValue($rstemp->seeker_tertiary_highertodate);?>
                                                  &nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="right" class="table_alternate_row">Second highest </td>
                                                <td width="12%" class="table_alternate_row"  ><?=$rstemp->seeker_tertiary_secounddegree ?>
                                                  &nbsp; </td>
                                                <td width="13%" class="table_alternate_row" ><?=$rstemp->seeker_tertiary_secoundfield ?>
                                                  &nbsp;</td>
                                                <td width="27%" class="table_alternate_row" ><?=$rstemp->seeker_tertiary_secoundinstitution ?>
                                                  &nbsp;</td>
                                                <td width="18%" class="table_alternate_row" ><?=getDateValue($rstemp->seeker_tertiary_secoundfromdate); ?>
                                                  &nbsp;</td>
                                                <td width="18%" class="table_alternate_row_end"  ><?=getDateValue($rstemp->seeker_tertiary_secoundtodate); ?>
                                                  &nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="right" class="table_row">Third highest </td>
                                                <td width="12%" class="table_row"  ><?=$rstemp->seeker_tertiary_thirddegree ?>
                                                  &nbsp; </td>
                                                <td width="13%" class="table_row" ><?=$rstemp->seeker_tertiary_thirdfield ?>
                                                  &nbsp;</td>
                                                <td width="27%" class="table_row" ><?=$rstemp->seeker_tertiary_thirdinstitution ?>
                                                  &nbsp;</td>
                                                <td width="18%" class="table_row" ><?=getDateValue($rstemp->seeker_tertiary_thirdfromdate); ?>
                                                  &nbsp;</td>
                                                <td width="18%" class="table_row_end"  ><?=getDateValue($rstemp->seeker_tertiary_thirdtodate );?>
                                                  &nbsp;</td>
                                              </tr>
                                          </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <? } ?>
                          <? if ( ($rstemp->seeker_register_type == 1) or ($rstemp->seeker_register_type == 2) or ($rstemp->seeker_register_type == 3) or ($rstemp->seeker_register_type == 4)) { ?>
                          <tr>
                            <td  colspan="2" ><table width="97%" border="0" align="center" cellpadding="3" cellspacing="0">
                                <tr>
                                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                      <tr>
                                        <td colspan="2"><u>Secondary Qualifications</u></td>
                                      </tr>
                                      <tr>
                                        <td  valign="top" colspan="2"><table width="100%" cellpadding="6" cellspacing="0" class="table_black_border" align="center">
                                            <tr>
                                              <td width="12%" align="right" class="table_head"  >&nbsp;</td>
                                              <td width="12%" class="table_head" >Degree</td>
                                              <td width="41%" class="table_head"  >Institution</td>
                                              <td width="17%" class="table_head"  >From</td>
                                              <td width="18%" class="table_head_end" >To</td>
                                            </tr>
                                            <tr>
                                              <td width="12%" align="right" class="table_row"  >Highest</td>
                                              <td width="12%" class="table_row" ><?=$rstemp->seeker_secoundary_degree?>
                                                &nbsp; </td>
                                              <td width="41%" class="table_row" ><?=$rstemp->seeker_secoundary_institution?>
                                                &nbsp;</td>
                                              <td width="17%" class="table_row" ><?=getDateValue($rstemp->seeker_secoundary_fromdate);?>
                                                &nbsp;</td>
                                              <td width="18%" class="table_row_end"  ><?=getDateValue($rstemp->seeker_secoundary_todate);?>
                                                &nbsp;</td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2">&nbsp;</td>
                                      </tr>
                                      <? if ( $rstemp->seeker_secoundary_leadership != "" ) { ?>
                                      <tr>
                                          <td width="37%"  >Leadership </td>
                                          <td width="63%"   ><?=$rstemp->seeker_secoundary_leadership ?>
                                            &nbsp; </td>                                              
                                        </tr>
                                        <? } ?>
                                         <? if ( $rstemp->seeker_computer != "" ) { ?>
                                        <tr>
                                          <td  >Computer Proficiency</td>
                                          <td width="63%" ><?  if ($rstemp->seeker_computer !="") { $comArr = explode(",",$rstemp->seeker_computer); foreach ($comArr as $comppro) echo $comppro."<br>"; }?>
                                            &nbsp; </td>
                                        </tr>
                                        <? } ?>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <? } ?>
                          	<? if ( ($rstemp->seeker_register_type != 1) and ($rstemp->seeker_register_type != 2)) { ?>
                            <tr>
                              <td colspan="2" class="subhead_gray_small" height="30">Employment History and Experience</td>
                            </tr>
                            <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
                            <tr>
                            <td colspan="2" ><table width="97%" border="0" align="center" cellpadding="3" cellspacing="0">                                					
						  <tr>
						    <td colspan="2" valign="top"></td>
						    </tr>
						  <tr>
                          <td colspan="2" valign="top">
							<table width="100%" cellpadding="6" cellspacing="0" class="table_black_border">
							 <tr>
                                <td width="10%" align="left"  class="table_head" >Job Experience</td>
                                <td width="12%" class="table_head"  >Type of employment </td>
                                <td width="12%"  class="table_head" >Industry</td>
                                <td class="table_head" >Position</td>
                                <td width="16%" class="table_head" >Category</td>
                                <td class="table_head">From</td>
                                <td width="11%"  class="table_head" >To</td>
                                <td width="18%" class="table_head_end" >Reason for leaving</td>
                              </tr>
						
						<? 	
							$j=1;
							$limit = ($rstemp->seeker_register_type == 4) ? 12 : 6 ;
							for($i=0;$i<$limit;$i++)
							{
								$seeker_emp_type="seeker_emp".$j."_employement";
								$seeker_emp_industry="seeker_emp".$j."_industry";
								$seeker_emp_pos="seeker_emp".$j."_position";
								$seeker_emp_duties="seeker_emp".$j."_duties";
								$seeker_emp_fromdate="seeker_emp".$j."_fromdate";
								$seeker_emp_todate="seeker_emp".$j."_todate";
								$seeker_emp_name = "seeker_emp" . $j . "_employer";
								//if($rstemp->seeker_register_type==4)
								$seeker_emp_leaving ="seeker_emp".$j."_leaving";
								//$emp = "seeker_emp" . $j . "_employer";
								if($rstemp->$seeker_emp_name=="")
								{
									$emp="Name of Employer";
								}
								else
								{
									$emp=$rstemp->$seeker_emp_name;		 
								}
								//$emp="Name of Employer";
								//$emp="Employer".$j;
								if($i%2 == 1)
									$td_class = "table_alternate_row";
								else
									$td_class = "table_row";
								
						?>
								<tr> 
									<td width="10%" align="right" class="<?=$td_class?>" ><?=$emp?>&nbsp;</td>
									<td width="12%" class="<?=$td_class?>"><?=$rstemp->$seeker_emp_type ?>&nbsp;</td>
									
									<td width="12%" class="<?=$td_class?>" ><?=$rstemp->$seeker_emp_industry ?>&nbsp;									</td>
									<td width="11%" class="<?=$td_class?>" >
									<?=$rstemp->$seeker_emp_pos?>&nbsp;									</td>
									<td width="16%" class="<?=$td_class?>" >
									<?=$rstemp->$seeker_emp_duties ?>&nbsp;									</td>
									<td width="10%" class="<?=$td_class?>" ><?=getDateValue($rstemp->$seeker_emp_fromdate);?>&nbsp;</td>
									<td width="11%"  class="<?=$td_class?>"><?=getDateValue($rstemp->$seeker_emp_todate); ?>&nbsp;</td>
									<td width="18%" class="<?=$td_class?>_end" >
									<?=$rstemp->$seeker_emp_leaving?>&nbsp;									</td>
                              </tr>
							 
								
						<?	
								$j++;
							}
						?> 
						 </table>						</td>
					</tr>
                            </table></td>
                          </tr>
                          <? } ?>
						  <!-- Duration of no formal employment Type 3, 4, -->
						    <? if ( ( $rstemp->seeker_register_type == 3 )|| ($rstemp->seeker_register_type == 4 )) { ?>
                          <tr>
                            <td colspan="6" align="left"  ><u>Duration of no of formal employement while not studying</u></td>
                          </tr>
                          <tr>
                            <td colspan="2" valign="top"><table width="97%" border="0" cellspacing="0" cellpadding="5" align="center">
                                <tr>
                                  <td><table width="100%" cellpadding="6" cellspacing="0" class="table_black_border">
                                      <tr>
                                        <td width="12%" align="right" class="table_head"  >&nbsp;</td>
                                        <td width="16%" class="table_head" >From </td>
                                        <td width="18%" class="table_head" >To</td>
                                        <td width="54%" class="table_head_end" >Reason</td>
                                      </tr>
                                      <? 	
							$j=1;
							
							for($i=0;$i<3;$i++)
							{
								$seeker_period_from="seeker_period".$j."_fromdate";
								$seeker_period_to="seeker_period".$j."_todate";
								$seeker_period_reason="seeker_period".$j."_reason";
								$period="Period".$j;
								if($i%2 == 1)
									$td_class = "table_alternate_row";
								else
									$td_class = "table_row";
								
						?>
                                      <tr>
                                        <td width="12%" align="right" class="<?=$td_class?>"  ><?=$period?>
                                          &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td width="16%" class="<?=$td_class?>"  ><?=getDateValue($rstemp->$seeker_period_from); ?>
                                          &nbsp;</td>
                                        <td width="18%" class="<?=$td_class?>"   ><?=getDateValue($rstemp->$seeker_period_to); ?>
                                          &nbsp;</td>
                                        <td class="<?=$td_class?>_end"  ><?=$rstemp->$seeker_period_reason ?>
                                          &nbsp;</td>
                                      </tr>
                                      <?	
								$j++;
							}
						?>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <? } ?>  
						  <!-- Duration of no formal employment ends here-->
						  <!-- references starts Fro type 1,2,3,4 -->
						  <tr>
                                  <td class="subhead_gray_small" height="30" colspan="2"><table width="97%" border="0" cellspacing="0" cellpadding="5" align="center">
                                      <tr>
                                        <td><table width="100%" align="center" cellpadding="6" cellspacing="0" class="table_black_border">
                                            <tr>
                                              <td width="14%" height="23" align="left" valign="top" class="table_head"><u>References </u></td>
                                              <td width="6%" valign="bottom" class="table_head">Title</td>
                                              <td width="16%" valign="bottom" class="table_head">Name , Surname</td>
                                              <td width="13%" valign="bottom" class="table_head">Relationship</td>
                                              <td width="13%" valign="bottom" class="table_head">Position</td>
                                              <td width="38%" valign="bottom" class="table_head_end">Contact e-mail address / telephone number</td>
                                            </tr>
                                            <? if ( $rstemp->seeker_register_type != 1 ) { ?>
                                            <tr>
                                              <td width="14%" align="right"  class="table_row">Professional&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                              <td width="6%"  class="table_row"><?=$rstemp->seeker_professional1_title?>
                                                &nbsp;</td>
                                              <td width="16%"  class="table_row"><?=$rstemp->seeker_professional1_name?>
                                                &nbsp;</td>
                                              <td width="13%"  class="table_row"><?=$rstemp->seeker_professional1_relation?>
                                                &nbsp;</td>
                                              <td  class="table_row"><?=$rstemp->seeker_professional1_position?></td>
                                              <td  class="table_row_end"><?=$rstemp->seeker_contact1_email?></td>
                                            </tr>
                                            <tr>
                                              <td width="14%" align="right"  class="table_alternate_row">Professional&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                              <td width="6%"  class="table_alternate_row"><?=$rstemp->seeker_professional2_title?>
                                                &nbsp;</td>
                                              <td width="16%"  class="table_alternate_row"><?=$rstemp->seeker_professional2_name?>
                                                &nbsp;</td>
                                              <td width="13%"  class="table_alternate_row"><?=$rstemp->seeker_professional2_relation?>
                                                &nbsp;</td>
                                              <td  class="table_alternate_row"><?=$rstemp->seeker_professional2_position?></td>
                                              <td  class="table_alternate_row_end"><?=$rstemp->seeker_contact2_email?></td>
                                            </tr>
                                            <? } ?>
                                            <tr>
                                              <td width="14%" align="right" class="table_row">Personal&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                              <td width="6%" class="table_row"><?=$rstemp->seeker_personal1_title?>
                                                &nbsp;</td>
                                              <td width="16%"  class="table_row"><?=$rstemp->seeker_personal1_name?>
                                                &nbsp;</td>
                                              <td width="13%" class="table_row"><?=$rstemp->seeker_personal1_relation?></td>
                                              <td  class="table_row"><?=$rstemp->seeker_personal1_position?></td>
                                              <td  class="table_row_end"><?=$rstemp->seeker_personal1_contact1_email?></td>
                                            </tr>
                                            <tr>
                                              <td width="14%" align="right" class="table_alternate_row">Personal&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                              <td width="6%" class="table_alternate_row"><?=$rstemp->seeker_personal2_title?>
                                                &nbsp;</td>
                                              <td width="16%" class="table_alternate_row"><?=$rstemp->seeker_personal2_name?>
                                                &nbsp;</td>
                                              <td width="13%" class="table_alternate_row"><?=$rstemp->seeker_personal2_relation?></td>
                                              <td class="table_alternate_row"><?=$rstemp->seeker_personal2_position?></td>
                                              <td class="table_alternate_row_end"><?=$rstemp->seeker_personal2_contact2_email?></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
						  <!-- references ends here -->
                          <? if ( ($rstemp->seeker_register_type == 1) or ($rstemp->seeker_register_type == 2)) { ?>
                          <tr>
                            <td class="subhead_gray_small" height="30" colspan="2"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td width="785" height="30" class="subhead_gray_small" >Additional Information</td>
                                </tr>
                                <tr>
                                  <td><img src="../images/line.gif" width="772"></td>
                                </tr>
                                <tr>
                                  <td ><table cellpadding="5" cellspacing="0" border="0" width="96%" align="center">
								   <? if ( ($rstemp->seeker_register_type != 2) ) { ?>
                                      <tr>
                                        <td colspan="2" height="10" ></td>
                                      </tr>
										  <? if ( $rstemp->seeker_summary != "" ) { ?>
										  <tr>
											<td width="38%"  >Summary</td>
											<td width="62%"  ><?=$rstemp->seeker_summary?></td>
										  </tr>
										  <? } ?>
										  <? if ( $rstemp->seeker_education != "" ) { ?>
										  <tr>
											<td >Education</td>
											<td  ><?=$rstemp->seeker_education?></td>
										  </tr>
										  <? } 
									  } ?>
                                      <!--<? if ( $rstemp->seeker_criminal != "" ) { ?>
											<tr>
											  <td >Criminal Record</td>
										      <td ><?=$rstemp->seeker_criminal?></td>
										   </tr>
										   <? } ?>-->
                                  </table></td>
                                </tr>
                                <? } ?>
                          <? if ( ($rstemp->seeker_register_type != 1) ) { ?>
                          <tr>
                            <td ><table width="100%" border="0" cellspacing="0" cellpadding="3">
							 <tr>
							   <td  >&nbsp;</td>
							   </tr>
							    <? if ( ($rstemp->seeker_register_type == 3) || ($rstemp->seeker_register_type == 4)) { ?>
								 <tr>
                                  <td width="785" height="30" class="subhead_gray_small" >Future Employment Preferences</td>
                                </tr>
                                <tr>
                                  <td><img src="../images/line.gif" width="772"></td>
                                </tr>
								<? } ?>
                                <tr>
                                  <td><table width="96%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <tr>
                                        <td width="38%"  >Summary</td>
                                        <td width="62%"  ><?=$rstemp->seeker_summary?></td>
                                      </tr>
                                      <tr>
                                        <td width="38%" >Category</td>
                                        <td width="62%" ><?=$rstemp->seeker_category ?></tr>
                                      <tr>
                                        <td  >Skills</td>
                                        <td  ><?=$rstemp->seeker_skills?></td>
                                      </tr>
                                      <tr>
                                        <td >Education</td>
                                        <td ><?=$rstemp->seeker_education?></td>
                                      </tr>
                                      <tr>
                                        <td >Preferred  employment</td>
                                        <td ><? if ($rstemp->seeker_vacation_check==1) echo ("Vacation Work"); ?>&nbsp;&nbsp;
                                          <? if ($rstemp->seeker_job_attachment_check==1) echo ("Job attachment/practical work experience"); ?>
                                          &nbsp;&nbsp;
                                          <? if ($rstemp->seeker_hrs_check==1) echo ("After hrs employment"); ?>
                                          &nbsp;&nbsp;
                                          <? if ($rstemp->seeker_temp==1) echo ("Temp"); ?></td>
                                      </tr>
                                      <tr>
                                        <td >Experience</td>
                                        <td ><?=$rstemp->seeker_experience?>
                                          &nbsp;years</td>
                                      </tr>
                                      <? if ($rstemp->seeker_register_type != 2) {?>
                                      <tr>
                                        <td >Minimum expected salary</td>
                                        <td ><?=$rstemp-> seeker_salary ?>
                                            <?=$rstemp->seeker_duration?>
                                          &nbsp;</td>
                                      </tr> 
                                      <? } ?>                                     
                                      <tr>
                                        <td >Benefits Desired</td>
                                        <td ><? if($rstemp->seeker_benifits !="") { $benefits = explode(",",$rstemp->seeker_benifits); foreach($benefits as $b) echo $b."<br />"; }?></td>
                                      </tr>
                                       <? if ($rstemp->seeker_register_type != 2) {?>
                                      <tr>
                                        <td >Type of employment </td>
                                        <td ><?= $rstemp->seeker_preferred_employment?></td>
                                      </tr>
                                      <? } ?>
                                      <? if ($rstemp->seeker_register_type != 2) {?>
                                      <tr>
                                        <td >Position</td>
                                        <td ><? if($rstemp->seeker_work_cat !="") { $p = explode(",",$rstemp->seeker_work_cat); foreach($p as $po) echo $po."<br />"; }?></td>
                                      </tr>
                                      <? } ?>
                                      <tr>
                                        <td  >Industry</td>
                                        <td  ><?=$rstemp->seeker_work_subcat?></td>
                                      </tr>
                                      <tr>
                                        <td >Country of preferred residence</td>
                                        <td ><?=getFieldValue("job_country","country_name", "country_id" , $rstemp->seeker_country_alert) ?></td>
                                      </tr>
                                      
                                  </table></td>
                                </tr>
                            </table></td>
                            <td width="148" >
                            </tr>
                          <? } ?>                                
                                <? if ( 0 == 1 ) { ?>
                                <tr>
                                  <td class="subhead_gray_small" height="30" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                      <tr>
                                        <td><u>Strengths and development areas </u></td>
                                      </tr>
                                      <tr>
                                        <td><table cellpadding="5" cellspacing="0" border="0" width="100%" align="center">
                                            <tr>
                                              <td width="100%" height="10" ></td>
                                            </tr>
                                            <? if ( $rstemp->seeker_summary != "" ) { ?>
                                            <? } ?>
                                            <? if ( $rstemp->seeker_surname != "" ) { ?>
                                            <tr>
                                              <td ><table width="97%" align="center" cellpadding="6" cellspacing="0" class="table_black_border">
                                                  <? 	
							
													for($i=0;$i<2;$i++)
													{
														
														$seeker_development="seeker_development".$j;
														
														if($i%2 == 1)
														{
															$td_class = "table_row";
															$var="seeker_development";
															$title="Development Areas";
														}
														else
														{
															$td_class = "table_alternate_row";
															$var="seeker_strength";
															$title="Strengths";
														}
														
													?>
                                                  <tr>
                                                    <td width="16%" align="right" class="<?=$td_class?>"  ><?=$title?>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <? for($j=1;$j<=3;$j++) { $seeker_var=$var.$j;?>
                                                    <td width="20%" class="<?=$td_class?>" ><?=$rstemp->$seeker_var ?>
                                                      &nbsp;</td>
                                                    <? } ?>
                                                    <td class="<?=$td_class?>_end"  >&nbsp;</td>
                                                  </tr>
                                                  <?								
							}
						?>
                                              </table></td>
                                            </tr>
                                            <? } ?>
                                            <!--<? if ( $rstemp->seeker_criminal != "" ) { ?>
											<tr>
											  <td >Criminal Record</td>
										      <td ><?=$rstemp->seeker_criminal?></td>
										   </tr>
										   <? } ?>-->
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <? } ?>
								  
                          
                          <? if ( $rstemp->seeker_register_type == 1 ) { ?>
                          <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                          <tr>
                            <td colspan="6" align="left"  ><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="785" height="30" class="subhead_gray_small" >Bursary Information</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td ><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <tr>
                                      <td colspan="2" height="10" ></td>
                                    </tr>                                    
                                    <tr>
                                      <td width="37%"  align="left">Pass rate in all subjects at most recent examination</td>
                                      <td width="63%" align="left"  ><?=$rstemp->seeker_bursary_passrate?></td>
                                    </tr>                                   
                                    <? if ( $rstemp->seeker_register_type != 1  ) { ?>
                                    <tr>
                                      <td align="left">Education</td>
                                      <td align="left" ><?=$rstemp->seeker_education ?></td>
                                    </tr>
                                     <? } ?>
                                   
                                    <tr>
                                      <td >Current Status</td>
                                      <td align="left"  ><?=$rstemp->seeker_bursary_type ?></td>
                                    </tr>
                                    
                                     
                                    <tr>
                                      <td >Accepted by Institution to start <br>with preferred course</td>
                                      <td  align="left" ><?=$rstemp->seeker_accepted_bursary ?></td>
                                    </tr>
                                  
                                     
                                    <tr>
                                      <td >Searching for a bursary to</td>
                                      <td  align="left" ><?=$rstemp->seeker_bursary_looking ?></td>
                                    </tr>
                                  
                                    
                                    <tr>
                                      <td align="left">Field of current or intended study</td>
                                      <td align="left"  ><?=$rstemp->seeker_bursary_study ?></td>
                                    </tr>
                                    
                                    <tr>
                                      <td >Type of qualification</td>
                                      <td  align="left" ><?=$rstemp->seeker_bursary_qualification ?></td>
                                    </tr>
                                   
                                     
                                    <tr>
                                      <td >Motivation for a bursary </td>
                                      <td  align="left" ><?=$rstemp->seeker_motivation_bursary ?></td>
                                    </tr>
                                  
                                    <tr>
                                      <td align="left">Your parents&rsquo; average <br>and combined income equalto or lower<br>than N$ 7000-00 per month</td>
                                      <td  align="left" ><?=$rstemp->seeker_bursary_parentincome ?></td>
                                    </tr>
                                   
                                    <!--<? if ( $rstemp->seeker_criminal != "" ) { ?>
											<tr>
											  <td >Criminal Record</td>
										      <td ><?=$rstemp->seeker_criminal?></td>
										   </tr>
										   <? } ?>-->
                                </table></td>
                              </tr>
                              <? } ?>
                              <? if ( $rstemp->seeker_register_type == 1 ) { ?>
                              
                            </table></td>
                          </tr>
                          <tr>
                            <td colspan="6" align="left"  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="6" align="left"  ><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="785" height="30" class="subhead_gray_small" >Bursary Alert</td>
                              </tr>
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td ><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <tr>
                                      <td colspan="2" height="10" align="left"></td>
                                    </tr>
                                    <tr>
                                      <td width="37%"  align="left">Type of qualification</td>
                                      <td width="63%" align="left"  ><?=$rstemp->seeker_bursary_qualification?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Name preferred institution of<br>study</td>
                                      <td align="left" ><?=$rstemp->seeker_bursary_alert_institute ?></td>
                                    </tr>
                                  
                                    <tr>
                                      <td align="left">Field of study </td>
                                      <td align="left"  ><?=$rstemp->seeker_bursary_alert_study ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">Type of bursaries</td>
                                      <td  align="left" ><?=$rstemp->seeker_alert_full_bursary ?></td>
                                    </tr>                                   
                                </table></td>
                              </tr>
                              <? } ?>
							
                             <? //if ( $rstemp->seeker_register_type == 1 ) { ?>
                                   <? if ( ( $rstemp->seeker_register_type != 1 ) && ( $rstemp->seeker_register_type != 3 ) && ( $rstemp->seeker_register_type != 4 )){ ?>
                                <tr>
                                  <td colspan="2"  >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td width="785" height="30" class="subhead_gray_small" >Future Employment Preferences</td>
                                </tr>
                                <tr>
                                  <td><img src="../images/line.gif" width="772"></td>
                                </tr>
                                <tr>
                                <td ><table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
                                    <tr>
                                      <td colspan="2" height="10" align="left"></td>
                                    </tr>
									
									<tr>
                                    <td width="37%" >Current status </td>
                                      <td width="63%" colspan="2" >&nbsp;</td>
                                    </tr>
									<tr>
                                      <td align="left">Position</td>
                                      <td align="left" ><? if($rstemp->seeker_work_cat !="") { $pos = explode( ",",$rstemp->seeker_work_cat) ; foreach($pos as $ps) echo $ps."<br />";  } ?></td>
                                    </tr>
                                  
                                    <tr>
                                      <td align="left" >Industry</td>
                                      <td align="left" ><?=$rstemp->seeker_work_subcat ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left" >Country of preferred residence</td>
                                      <td  align="left" ><?=getFieldValue("job_country","country_name", "country_id" , $rstemp->seeker_country_alert) ?></td>
                                    </tr>
                                    <tr>
                                      <td align="left" >Town</td>
                                      <td  align="left" ><?=$rstemp->seeker_alert_city1?></td>
                                    </tr>                                   
                                </table></td>
                              </tr>
                                 <? if($rstemp->seeker_register_type != 1 and $rstemp->seeker_register_type != 2 and $rstemp->seeker_register_type != 3){ ?>
                                <tr>
                            <td colspan="2"  ><input type="checkbox" name="seeker_hideemployers" disabled="true" <? if ($rstemp->seeker_hideemployers==1) echo ("checked"); ?> >
                              Hide my CV from employers.Use it only for online application.<br></td>
                          </tr>
                          <? } 
						  }?>
                            </table></td>
                          </tr>                 
                          <tr>
                            <td colspan="2" >&nbsp;</td>
                          </tr>                        
                          <tr>
                            <td colspan="2"><table cellpadding="1" cellspacing="0" border="0" width="100%" align="center">
                                <tr>
                                  <td  colspan="2" align="left" valign="top" height="30" class="subhead_gray_small" >&nbsp;Options</td>
                                </tr>
                                <tr>
                                  <td class="whitebgcolor" colspan="2"><img src="../images/line.gif" width="772"></td>
                                </tr>
                                <tr>
                                  <td width="7%" align="right"  >&nbsp;&nbsp;</td>
                                  <td width="93%" class="normal_text"><input name="seeker_reference" type="radio" disabled="true" <? if ($rstemp->seeker_reference=="Yes") echo ("checked"); ?>>
                                    Yes
                                    <input name="seeker_reference" type="radio" disabled="true" <? if ($rstemp->seeker_reference=="No") echo ("checked"); ?>>
                                    No
                                    
                                    &nbsp;&nbsp;May we ask your references to compile a reference  for you? </td>
                                </tr>
                                <tr>
                                  <td width="7%" align="right"  >&nbsp;&nbsp;</td>
                                  <td width="93%" class="normal_text"  ><input type="checkbox" name="seeker_email_alert"   disabled="true" <? if ($rstemp->seeker_email_alert==1) echo ("checked"); ?>>
                                    Send me e-mail alerts when a job listed <br>
                                    <input type="checkbox" name="seeker_addcv" disabled="true" <? if ($rstemp->seeker_email_alert==1) echo ("checked"); ?>>
                                    Add my CV to the following search criteria :
                                    <input name="seeker_temp_emp" type="checkbox" id="seeker_temp_emp" disabled="true" <? if ($rstemp->seeker_temp_emp==1) echo ("checked"); ?>>
                                    temporary emp
                                    <input name="seeker_per_emp" type="checkbox" id="seeker_per_emp" disabled="true" <? if ($rstemp->seeker_per_emp==1) echo ("checked"); ?>>
                                    permanent emp
                                    <input type="checkbox" name="seeker_both" disabled="true" <? if ($rstemp->seeker_email_alert==1) echo ("checked"); ?>>
                                    both
                                    <input type="checkbox" name="seeker_bursary" disabled="true" <? if ($rstemp->seeker_bursary==1) echo ("checked"); ?>>
                                    bursary grands
                                    <input name="seeker_job_attach" type="checkbox" id="seeker_job_attach" disabled="true" <? if ($rstemp->seeker_job_attach==1) echo ("checked"); ?>>
                                    job attachments<br>
                                    <input name="seeker_recruitment" type="checkbox" id="seeker_recruitment" disabled="true" <? if ($rstemp->seeker_recruitment==1) echo ("checked"); ?>>
                                    Only recruitment agencies to view my CV <br>
                                    <input name="seeker_head_hunter" type="checkbox" id="seeker_head_hunter" disabled="true" <? if ($rstemp->seeker_head_hunter==1) echo ("checked"); ?>>
                                    Only head-hunters to view my CV <br>
                                    <input type="checkbox" name="seeker_all" disabled="true" <? if ($rstemp->seeker_email_alert==1) echo ("checked"); ?>>
                                    All	employers,including my current employer,if employed,may view my CV-not recomended if you are permanent employed.<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Specifically aimed at jobless individuals <br>
                                    <input type="checkbox" name="seeker_entity" disabled="true" <? if ($rstemp->seeker_entity==1) echo ("checked"); ?>>
                                    My CV is not to be viewed by any entity & I will personally apply should a job alert reach me (not recomended)<br>
                                    <br>                                  </td>
                                </tr>
                                <tr align="left">
                                  <td colspan="2"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose from the following actions when your registration is submitted:<br>
                                      <br></td>
                                </tr>
                                <tr>
                                  <td align="right"  >&nbsp;</td>
                                  <td class="normal_text" ><input type="checkbox" name="seeker_email_cv" disabled="true" <? if ($rstemp->seeker_email_cv==1) echo ("checked"); ?>>
                                    Email Me my CV<br>
                                    <input name="seeker_pdf" type="checkbox" id="seeker_pdf" disabled="true" <? if ($rstemp->seeker_pdf==1) echo ("checked"); ?>>
                                    Download my CV as a PDF
                                    <!--<br>
								     <input type="checkbox" name="seeker_coverletter"disabled="true" <? if ($rstemp->seeker_coverletter==1) echo ("checked"); ?>>
								     Genrate a cover letter for my CV -->                                  </td>
                                </tr>
                            </table></td>
                          </tr>
                        </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table  align="left" cellpadding="4" cellspacing="0" border="0" width="100%"  >
                            <tr  >
                              <td class="subhead_gray_small" bgcolor="#FFFFFF" height="30"  >&nbsp;&nbsp;Where did you hear about NamRecruit?</td>
                            </tr>
                            <tr  >
                              <td class="whitebgcolor" ><img src="../images/line.gif" width="772"></td>
                            </tr>
                            <tr>
                              <td class="whitebgcolor" ><table cellpadding="5" cellspacing="0" border="0" width="98%" align="center" >
                                  <tr>
                                    <td   colspan="2"><input type="checkbox" name="email" disabled="true" <? if ($rshear->email!="") echo ("checked"); ?>>
                                      Email&nbsp;&nbsp;
                                      <input type="checkbox" name="google" disabled="true" <? if ($rshear->google!="") echo ("checked"); ?>>
                                      Google&nbsp;&nbsp;
                                      <input type="checkbox" name="anothersearchengine" disabled="true" <? if ($rshear->anothersearchengine!="") echo ("checked"); ?>>
                                      Another Search Engine&nbsp;&nbsp;
                                      <input type="checkbox" name="friend" disabled="true" <? if ($rshear->friend!="") echo ("checked"); ?>>
                                      A Friend&nbsp;&nbsp;
                                      <input type="checkbox" name="tv" disabled="true" <? if ($rshear->tv!="") echo ("checked"); ?>>
                                      Tv ad&nbsp;&nbsp;
                                      <input type="checkbox" name="newspaper" disabled="true" <? if ($rshear->newspaper!="") echo ("checked"); ?>>
                                      Newspaper ad&nbsp;
                                      <input type="checkbox" name="radio" disabled="true" <? if ($rshear->radio!="") echo ("checked"); ?>>
                                      Radio ad<br>
                                      <input type="checkbox" name="magazine" disabled="true" <? if ($rshear->magazine!="") echo ("checked"); ?>>
                                      Magazine ad&nbsp;&nbsp;
                                      <input type="checkbox" name="banner" disabled="true" <? if ($rshear->banner!="") echo ("checked"); ?>>
                                      Banner/Link&nbsp;&nbsp;
                                      <input type="checkbox" name="other" disabled="true" <? if ($rshear->other!="") echo ("checked"); ?>>
                                      Other&nbsp;&nbsp; </td>
                                  </tr>
                                </table></td>
                            </tr>
                            <tr>
                              <td  class="whitebgcolor"><table cellpadding="5" cellspacing="0" border="0" width="90%" align="center">
                                  <tr>
                                    <? if(isset($_GET["seeker_status"]) && $_GET["seeker_status"]!="")
											{?>
                                    <td align="center" ><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>&seeker_status=<?=$_GET["seeker_status"]?>');" style="cursor:pointer"></td>
                                    <? } else {?>
                                    <td align="center" ><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>');" style="cursor:pointer"></td>
                                    <? }?>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                    </table></td>
                </tr>
                <tr align="center">
                  <td valign="middle" height="10"></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <!-- Page Body End-->
      </form></td>
  </tr>
  <tr>
    <td><? include("includes/bottom.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>
