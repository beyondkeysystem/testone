<?php  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
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
		 <form name="form1" method="post">
			
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                      <tr>
                                        <td height="30" class="heading_black" >&nbsp;Utility</td>
                                      </tr>
                                      <tr>
                                        <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                            <tr>
                                              <td>&nbsp;The utility provides different types of settings and administrations. </td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          
                          <tr>
                            <td align="center">
							<!--page body start-->
								<table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
									<tr>
									  <td>
											<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
											  <tr>
												<td align="left"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
												  <tr align="center" class="bluehead">
													<td  class="bluehead" align="left">&nbsp;&nbsp; Administrator</td>
													<!--td  class="bluehead" align="left">Recruiters</td-->
													<td class="bluehead" align="left" >Payment Plan </td>
													<!--td class="bluehead"  align="left">Options</td-->
												  </tr>              
												  <tr>
													<td width="50%" height="140" align="left" valign="top">			 	
													   <table width="200" cellpadding="4" cellspacing="0">
														<tr>
															<td class="home_skyblue_subheading" valign="top" align="left"><a href="user_edit.php" class="blue_title_small">Edit Profile </a></td>
														</tr>	
														<tr>
															<td class="home_skyblue_subheading"  valign="top" align="left"><a href="change_password.php" class="blue_title_small">Change Password</a></td>
														</tr>  				 
													  </table>				</td>
													<!--td width="25%" align="left" valign="top">
													  <table width="200" cellpadding="4" cellspacing="0">
													     <tr>
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="new_recruiter.php" class="blue_title_small">Add New Recruiter</a></td>
												        </tr>
														<tr style="display:none">
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="make_new_payment.php" class="blue_title_small">Make a New Payment</a></td>
												        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="search_invoices.php" class="blue_title_small">Invoices</a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="search_payment.php" class="blue_title_small">Payments</a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading"  valign="top" align="left"><a href="cheque_list.php" class="blue_title_small">Cheque Details </a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading"  valign="top" align="left"><a href="EFT_list.php" class="blue_title_small">EFT Details </a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading"  valign="top" align="left"><a href="change_plan.php" class="blue_title_small">Change / Renew Plan </a></td>
                                                        </tr>
                                                      </table>												    </td-->
								<td width="50%" valign="top" align="left">
								  <table width="100%" cellpadding="4" cellspacing="0" valign="top">
									<tr>
									  <td align="left"  valign="top" class="home_skyblue_subheading"><a href="plan_add.php" class="blue_title_small">Add Plan For Employer </a></td>
									</tr>  
									<tr>
									  <td class="home_skyblue_subheading"  valign="top" align="left"><a href="plan_list.php" class="blue_title_small">Edit / Delete Plan For Employer </a></td>
									</tr>
									<tr>
									  <td class="home_skyblue_subheading"  valign="top" align="left"><a href="plan_edit_rec.php?pid=5&type=rec" class="blue_title_small">Edit  Plan For Recruiter </a></td>
								    </tr>
									<!--tr>
									  <td class="blue_title_small"  valign="top" align="left"><a href="edit_vat.php" class="blue_title_small">Edit VAT</a></td>
								    </tr-->                   
								  </table>													</td>
								<!--td width="25%" valign="top" align="left">
								  <table width="200" cellpadding="4" cellspacing="0">
									<tr>
									  <td class="home_skyblue_subheading" valign="top" align="left"><a href="option_add.php?action=add" class="blue_title_small">Add / Edit / Delete Options </a></td>
									</tr>
								  </table>													</td-->
								</tr>
								<tr>
								<td valign="top" align="center">&nbsp;</td>
								<td align="center" valign="top">&nbsp;</td>
								<td valign="top" align="center">&nbsp;</td>
								<td valign="top" align="center">&nbsp;</td>
							  </tr>
							</table></td>
						  </tr>
							 
						  <!--tr>
							<td valign="top" align="left"><table width="98%" height="0"  border="0" align="center" cellpadding="4" cellspacing="0">
							  <tr bgcolor="#FFFFFF">
								<td colspan="4"  class="home_white_name" height="10"></td>
							</tr>
							  <tr align="center">
								<td  class="bluehead" align="left">&nbsp;&nbsp;Adverts</td>
								<td  class="bluehead" align="left"> Cover Letter </td>
								<td align="left"  class="bluehead">Level &amp; Grading </td>
								<td align="left"  class="bluehead">Mailing List </td>
							  </tr>
							  <tr>
								 <td width="25%" height="140" align="left" valign="top"> 		 	
								       <table width="200" cellpadding="4" cellspacing="0" valign="top">
		     <tr>
                                                               <td align="left" valign="top" class="home_skyblue_subheading"><a href="advert_add.php" class="blue_title_small">Add Adverts </a></td>
                                                             </tr>
                                                             <tr>
                                                               <td class="home_skyblue_subheading" valign="top" align="left"><a href="advert_list.php" class="blue_title_small">Edit / Delete Adverts </a></td>
                                                             </tr>
                                                              <tr>
                                                               <td align="left" valign="top" class="home_skyblue_subheading"><a href="banner_add.php" class="blue_title_small">Add Banner </a></td>
                                                             </tr>
                                                             <tr>
                                                               <td class="home_skyblue_subheading"  valign="top" align="left"><a href="banner_list.php" class="blue_title_small">Edit / Delete Banner </a></td>
                                                             </tr>
                                                           </table>													 </td>
													 <td width="25%" align="left" valign="top">
													   <table width="200" cellpadding="4" cellspacing="0">
                                                         <tr>
                                                           <td class="home_skyblue_subheading" valign="top" align="left"><a href="letter_add.php" class="blue_title_small">Add New Cover Letter </a></td>
                                                         </tr>
                                                         <tr>
                                                           <td class="home_skyblue_subheading" valign="top" align="left"><a href="letter_list.php" class="blue_title_small">Edit / Delete Cover Letters </a></td>
                                                         </tr>
                                                       </table>													  </td>
													  <td align="left" valign="top"><table width="200" cellpadding="4" cellspacing="0">
                                                        <tr>
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="gradelevel_add.php" class="blue_title_small">Add / Edit Grade &amp; Level </a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="gradelevel_list.php" class="blue_title_small" style="display:none">Edit / Delete Grade &amp; Level  </a></td>
                                                        </tr>
                                                      </table></td>
													  <td align="left" valign="top"><table width="200" cellpadding="4" cellspacing="0">
                                                        <tr>
                                                          <td class="home_skyblue_subheading" valign="top"  align="left"><a href="send_mail.php" target="_blank" class="blue_title_small">Send mail </a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading" valign="top" align="left"><a href="gradelevel_list.php" class="blue_title_small" style="display:none">Edit / Delete Grade &amp; Level </a></td>
                                                        </tr>
                                                      </table></td>
												  </tr>
												  <tr>
													<td align="center" valign="top">&nbsp;</td>
													<td align="center" valign="top">&nbsp;</td>
													<td width="25%" align="center" valign="top">&nbsp;</td>
													<td width="25%" align="center" valign="top">&nbsp;</td>
												  </tr>
												</table>											   </td>
											  </tr>
											  <tr>
											    <td valign="top" align="left"><table width="98%" height="0"  border="0" align="center" cellpadding="4" cellspacing="0">
                                                  <tr bgcolor="#FFFFFF">
                                                    <td colspan="4"  class="home_white_name" height="10"></td>
                                                  </tr>
                                                  <!--tr align="center">
                                                    <td  class="bluehead" align="left">&nbsp;&nbsp;Partners</td>
                                                    <td  class="bluehead" align="left">Video Tutorials </td>
                                                    <td align="left"  class="bluehead">Voucher Code</td>
                                                    <td align="left"  class="bluehead">Tag Line Image </td>
                                                  </tr-->
                                                  <!--tr>
                                                    <td width="25%" height="100" align="left" valign="top"><table width="200" cellpadding="4" cellspacing="0" valign="top">
                                                        <tr>
                                                          <td align="left"  valign="top" class="home_skyblue_subheading"><a href="partner_add.php" class="blue_title_small">Add Partners </a></td>
                                                        </tr>
                                                        <tr>
                                                          <td class="home_skyblue_subheading"  valign="top" align="left"><a href="partner_list.php" class="blue_title_small">Edit / Delete Partner </a></td>
                                                        </tr>
                                                        
                                                    </table></td>
                                                    <td width="25%" align="left" valign="top"><table width="200" cellpadding="4" cellspacing="0" valign="top">
                                                      <tr>
                                                        <td align="left"  valign="top" class="home_skyblue_subheading"><a href="tutorial_add.php" class="blue_title_small">Add Video Tutorial </a></td>
                                                      </tr>
                                                      <tr>
                                                        <td class="home_skyblue_subheading"  valign="top" align="left"><a href="tutorial_list.php" class="blue_title_small">Edit / Delete Video Tutorials </a></td>
                                                      </tr>
                                                    </table></td>
                                                    <td align="left" valign="top"><table width="200" cellpadding="4" cellspacing="0" valign="top">
                                                      <tr>
                                                        <td align="left"  valign="top" class="home_skyblue_subheading"><a href="code_add.php" class="blue_title_small">Add Voucher Code</a></td>
                                                      </tr>
                                                      <tr>
                                                        <td class="home_skyblue_subheading"  valign="top" align="left"><a href="code_list.php" class="blue_title_small">Edit / Delete Voucher Code</a></td>
                                                      </tr>
                                                    </table></td>
                                                    <td align="left" valign="top"><table width="200" cellpadding="4" cellspacing="0" valign="top">
                                                      
                                                      <tr>
                                                        <td class="home_skyblue_subheading"  valign="top" align="left"><a href="change_tagline.php" class="blue_title_small">Change Tag Line Image </a></td>
                                                      </tr>
                                                    </table></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="center" valign="top">&nbsp;</td>
                                                    <td align="center" valign="top">&nbsp;</td>
                                                    <td width="25%" align="center" valign="top">&nbsp;</td>
                                                    <td width="25%" align="center" valign="top">&nbsp;</td>
                                                  </tr>
                                                </table></td>
										      </tr>
											 </table>
							  		  </td>
										  </tr>
										</table>
							
													
							</td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle"><table width="50%" height="26"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" class="normal_black"></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="seller_list_paging"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                        </table>
						</td>						
					</tr-->
		   </table>  
			<!-- Page Body End-->		
		   </form>
         </td>
     </tr>    
     <tr>
	 	<td>
			<?php include("includes/bottom.php"); ?>
		</td>          
     </tr>
</table>
</body>
</html>

