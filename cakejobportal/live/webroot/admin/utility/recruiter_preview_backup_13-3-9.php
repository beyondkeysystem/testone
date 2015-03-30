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
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    
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
                                  <td height="30" class="sectionRecheading" >&nbsp;Recruiter/Employer</td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                        

                          <tr>
                            <td align="left" valign="top"><table  align="left" cellpadding="6" cellspacing="0" border="0" >
	
								<tr>
									<td class="medium_black" >Personal Information</td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>
								
								<tr>
								  <td>
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
										<? if ($rstemp->rec_hidename==0) { ?>
			
											<tr>
												<td width="25%"  >Contact name</td>
											    <td width="75%"  ><?=$rstemp->rec_name?></td>
											</tr>
											<tr>
                                              <td>Company name </td>
                                              <td><?=$rstemp->comp_name?></td>
									  </tr>
										<? } ?>
											<tr>
												<td>Company Type </td>
											    <td><? if ($rstemp->comp_type == 1) echo "Employer"; else echo "Recruiter"; ?></td>
											</tr>
										<? if ($rstemp->rec_hideaddress==0) { ?>
			
										<tr>
											<td>Address</td>
										  <td><?=$rstemp->rec_address?></td>
										</tr>
										<? } ?>
										<tr>
											<td>Postal Code</td>
										  <td><?=$rstemp->rec_postalcode?></td>
										</tr>
										<? if ($rstemp->rec_hidecity==0) { ?>
										<tr>
										  <td>City or Town </td>
										  <td><?=$rstemp->rec_city?></td>
										</tr>
										<? } ?>			
								</table>
								</td></tr>
								<tr>
                                  <td >&nbsp;</td>
								  </tr>
								<tr>
									<td class="medium_black" >Contact Information</td>
								</tr>
								<tr>
									<td><img src="../images/line.gif" width="772"></td>
								</tr>
								<tr>
								  <td valign="top">
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<? if ($rstemp->rec_hidetelno==0) { ?>
											<tr>
												<td width="25%"  >Telephone number </td>
											  <td width="75%"  ><?=$rstemp->rec_phone?></td>
											</tr>
											
											<tr>
												<td>Cell phone number </td>
											  <td><?=$rstemp->rec_mobile?></td>
											</tr>
											<tr>
                                              <td>Fax number </td>
                                              <td><?=$rstemp->rec_fax?></td>
									  </tr>
											<? } ?>
											<? if ($rstemp->rec_hideemail==0) { ?>
											<tr>
											  <td>Email address </td>
											  <td><?=$rstemp->rec_email?></td>
											</tr>
											<? } ?>
											<tr>
											  <td>Web address </td>
											  <td>
												<?=$rstemp->rec_web?>
											  </td>
											</tr>
											<?
												if($rstemp->comp_logo != "")
												{
											?>
											<tr>
											  <td valign="top">Company Logo </td>
											  <td class="comment"><img src="../../recruiter/logos/<?=$rstemp->comp_logo?>"></td>
							 		  </tr>
											<?
											 	}
											?>											
									</table>
								</td>
								</tr>
								<tr>
                                  <td height="60"><table cellpadding="5" cellspacing="0" border="0" width="90%" align="center">
                                      <tr>
                                        <td width="36%" align="right" ><a href="#"  onClick="closewin();"  class="imgcss"><img src="../images/close.gif" border="0"></a></td>
                                        <td width="64%"></td>
                                      </tr>
                                  </table></td>
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

