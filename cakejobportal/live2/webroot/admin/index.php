<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../styles/job.css">
<link rel="stylesheet" type="text/css" href="styles/job_admin.css">
<script src="javascript/menubar.js" language="javascript"></script>
<script language="javascript">
function makeLogin(event)
{
	if(event.keyCode == 13)
	{
		document.form1.submit();
	}
}
</script>
</head>
<body>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("indextop.php"); ?></td>
     </tr>
     
     <tr>
         <td class="whitebgcolor">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="4">
					<tr>
					  <td height="40" colspan="2" align="center">&nbsp;</td>
				  </tr>
					<tr>
						<td colspan="2" align="center"><br>
						  <br>
						  <br>

						  <form name="form1" method="post" action="index_action.php">
					        <table width="50%"  border="0" cellspacing="1" cellpadding="0" class="bluebgcolor">
                              <tr>
                                <td class="whitebgcolor" align="center"><table width="100%"  border="0" cellspacing="0" cellpadding="4">
                                  <tr align="left">
                                    <td colspan="3" class="whiteheading_BG">Administrator Login </td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td width="17%">&nbsp;</td>
                                    <td width="66%">&nbsp;</td>
                                  </tr>
								  <? if(isset($_GET["id"]) && $_GET["id"] == "fail") { ?>
                                  <tr>
                                    <td width="17%">&nbsp;</td>
                                    <td colspan="2" align="left" class="error">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invalid username or password or missing country. </td>
                                  </tr>
								  <? } ?>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td class="normal_black">Username :</td>
                                    <td align="left"><input type="text" name="user_name"></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td class="normal_black">Password :</td>
                                    <td align="left"><input type="password" name="user_password" onKeyPress="return makeLogin(event);">
                                         &nbsp;&nbsp; <img src="../images/login_button.gif" width="38" height="20" align="absmiddle" style="cursor:pointer" onClick="document.form1.submit();">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp; </td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
						  </form>
						  <br>
					      <br>
					      <br>
					      <br>
					      <br>
				      <br></td>												
					</tr>
					<tr>
					  <td height="30" colspan="2" align="center">&nbsp;</td>
				  </tr>
				</table>  
			<!-- Page Body End-->		
         </td>
     </tr>
     <tr>
          <td height="45" class="bottom_link_bg">&nbsp;</td>
     </tr>
     <tr>
          <td height="6"></td>
     </tr>
     <tr>
          <? //include("bottom.php"); ?>
     </tr>
</table>
</body>
</html>

