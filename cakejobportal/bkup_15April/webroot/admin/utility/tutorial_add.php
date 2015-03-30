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
		 <form method="post" enctype="multipart/form-data" name="form1" action="tutorial_add_action.php" onSubmit="return validateTutorials();">
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
                                <td   >Upload tutorial for  Jobseeker / Recruiter </td>
                                <td colspan="2"   ><select name="seeker_recruiter" id="seeker_recruiter">
                                  <option value="1">Jobseeker</option>
                                  <option value="2">Recruiter</option>
                                </select>
                                </td>
                              </tr>
                              <tr>
                                <td   >&nbsp;</td>
                                <td   >Tutorial  name </td>
                                <td width="73%" colspan="2"   ><input name="vt_name" type="text" id="vt_name"  value="<? if(isset($_POST['vt_name']) && $_POST['vt_name']!="" ) echo $_POST['vt_name']; ?>">
                                    <img src="../../images/star.gif"> </td>
                              </tr>
                              <tr>
                                <td valign="top"   >&nbsp;</td>
                                <td valign="top"   >Upload tutorial </td>
                              <td height="30" colspan="2" align="left" valign="top"    ><input name="videotutorial" type="file" id="videotutorial">                              </tr>
                              
                              <tr>
                                <td width="2%" valign="top"   >&nbsp;</td>
                                <td width="25%" valign="top"   >&nbsp;</td>
                                <td height="30" colspan="2" align="left" valign="top"    ><input type="image" src="../../images/add.gif" border="0" style="cursor:pointer" >&nbsp;&nbsp;&nbsp;<a href="tutorial_list.php"><img src="../../images/cancel.gif" border="0"></a> </td>
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

