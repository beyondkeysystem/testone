<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	$objDb = new db();
	$sqladvert = "select * from  job_top_sites  where site_id='".$_GET["aid"]."'";
	$resultadvert = $objDb->ExecuteQuery($sqladvert);
	$rsadvert=mysql_fetch_object($resultadvert);
	$rowCount = mysql_num_rows($resultadvert);
	
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
 
 
 
 function editAdvert(aid)
 {
 	
	if(validateAdverts())
	{
		document.form1.method="post";
		document.form1.action="advert_edit_action.php?aid="+aid;
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
                                  <td height="30" class="heading_black" >&nbsp;Edit Advert </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can edit the advert here. </td>
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
                            <td align="left" valign="top"><table width="600" border="0" align="left" cellpadding="6" cellspacing="0" >
									  <tr >
									    <td colspan="3" height="10"  ></td>
									  </tr>
									  <tr>
									    <td    >&nbsp;</td>
                                        <td    >Title</td>
                                        <td    ><input type="text" name="title" value="<?=$rsadvert->title?>" >
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td    >&nbsp;</td>
                                        <td    >URL</td>
                                        <td    >
                                          <input name="url" type="text" value="<?=$rsadvert->url?>" size="40">
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td >&nbsp;</td>
                                        <td valign="top">Description</td>
                                        <td >
                                          <textarea name="desc1" cols="30"><?=$rsadvert->desc1?></textarea>
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  
										<tr>
										  <td width="2%" valign="top"    >&nbsp;</td>
											<td width="19%" valign="top"    >&nbsp;</td>
											<td width="79%" align="left" valign="top"     >												<img src="../../images/update_admin.gif" border="0" style="cursor:pointer" onClick="return editAdvert(<?=$rsadvert->site_id?>)">&nbsp;&nbsp;&nbsp;<a href="advert_list.php"><img src="../../images/cancel.gif" border="0"></a>
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

