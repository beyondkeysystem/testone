<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
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
<script src="../../javascript/job.js" language="javascript"></script>


<script language="javascript">
 
 function editPassword()
 {
 	if(validatePassword())
	{
		document.form1.method="post";
		document.form1.action="change_password_action.php";
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
		 <form name="form1" method="post" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Change Password </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can change the administrator password here. </td>
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
									    <td colspan="3" height="10"  ></td>
									  </tr>
									  <tr>
									    <td  >&nbsp;</td>
                                        <td  >New Password </td>
                                        <td  ><input type="password" name="newp" >
                                          <img src="../../images/star.gif"></td>
                                      </tr>
									  <tr>
									    <td  >&nbsp;</td>
                                        <td  >Confirm Password </td>
                                        <td  ><input type="password" name="con_new">
                                        <img src="../../images/star.gif"> </td>
                                      </tr>
									   <tr>
									     <td width="3%" valign="top"  >&nbsp;</td>
											<td width="21%" valign="top"  >&nbsp;</td>
											<td width="76%" align="left" valign="top"   ><br>
												
												<a onClick="return editPassword();"><img src="../../images/update_admin.gif" style="cursor:pointer" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="home.php"><img src="../../images/cancel.gif" border="0"></a>
										  </td>
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

