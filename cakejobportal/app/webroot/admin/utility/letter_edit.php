<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$sqlLetter = "select * from  job_cover_letters where letter_id='".$_GET["letter_id"]."'";
	$resultLetter = $objDb->ExecuteQuery($sqlLetter);
	$rsLetter=mysql_fetch_object($resultLetter);
	$rowCount = mysql_num_rows($resultLetter);
	
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

 function editLetter(letter_id)
 {
	if(validateLetter())
	{
		document.form1.method="post";
		document.form1.action="letter_edit_action.php?letter_id="+letter_id;
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
                                  <td height="30" class="heading_black" >&nbsp;Edit Cover Letter </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can edit the cover letter here. </td>
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
                            <td align="left" valign="top"><table width="800" border="0" align="left" cellpadding="6" cellspacing="0" >
                                <tr>
                                  <td valign="top"   >&nbsp;</td>
                                  <td height="30" align="left" valign="top" class="normal_text"    ><input type="text" name="title" size="70" value="<?=$rsLetter->title?>">
            (Letter Title) </td>
                                </tr>
                                <tr>
                                  <td >&nbsp;</td>
                                  <td ><textarea name="msg" cols="80" rows="15" id="msg"><?=$rsLetter->msg?></textarea>
                                      <img src="../../images/star.gif"> </td>
                                </tr>
                                <tr>
                                  <td valign="top"   >&nbsp;</td>
                                  <td height="30" align="left" valign="top"    ><img src="../../images/update_admin.gif" width="50" height="18" border="0" style="cursor:pointer" onClick="return editLetter(<?=$_GET['letter_id']?>);">&nbsp;&nbsp;&nbsp;<a href="home.php"><img src="../../images/cancel.gif" border="0"></a></td>
                                </tr>
                                <tr>
                                  <td width="2%" valign="top"   >&nbsp;</td>
                                  <td width="98%" height="30" align="left" valign="top"    ><table width="100%" cellpadding="2" cellspacing="0">
                                      <tr>
                                        <td height="25" colspan="4" class="subhead_gray_small">Use the following variables to display in cover letter. </td>
                                      </tr>
                                      <tr>
                                        <td width="20%" class="normal_black">Company Name <br>
                                        </td>
                                        <td width="32%" class="normal_black">: _company_name_<br></td>
                                        <td width="18%" class="normal_black">Date</td>
                                        <td width="30%" class="normal_black">: _date_</td>
                                      </tr>
                                      <tr>
                                        <td class="normal_black">Employer Name <br></td>
                                        <td class="normal_black">: _employer_name_<br></td>
                                        <td class="normal_black">Job Ref No </td>
                                        <td class="normal_black">: _job_ref_no_</td>
                                      </tr>
                                      <tr>
                                        <td class="normal_black">Employer Address <br></td>
                                        <td class="normal_black">: _employer_address_<br></td>
                                        <td class="normal_black">Position Name </td>
                                        <td class="normal_black">: _position_name_</td>
                                      </tr>
                                      <tr>
                                        <td class="normal_black">Employer City <br></td>
                                        <td class="normal_black">: _employer_city_<br></td>
                                        <td class="normal_black">Seeker Name </td>
                                        <td class="normal_black">: _seeker_name_</td>
                                      </tr>
                                      <tr>
                                        <td class="normal_black">Employer Postal Code <br></td>
                                        <td class="normal_black">: _employer_postal_code_<br></td>
                                        <td class="normal_black">Seeker City </td>
                                        <td class="normal_black">: _seeker_city_</td>
                                      </tr>
                                  </table></td>
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

