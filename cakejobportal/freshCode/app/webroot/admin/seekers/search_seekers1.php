<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$seeker_uid = '';
	$seeker_name = '';
	$seeker_city = '';
	$reg_date_from = '';
	$reg_date_to = '';
	$seeker_status = '';
	
	if(isset($_POST['seeker_uid']))
	{
		$seeker_uid = $_POST['seeker_uid'];
		$seeker_name = $_POST['seeker_name'];
		$seeker_city = $_POST['seeker_city'];
		$reg_date_from = $_POST['reg_date_from'];
		$reg_date_to = $_POST['reg_date_to'];
		$seeker_status = $_POST['seeker_status'];
	}

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
 function search_employers()
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
         <td class="whitebgcolor">
		 <form name="form1" method="post" action="employers_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Seekers </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Search for the seekers with recruit young agency. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
						  
                          <tr>
                            <td align="left"><table width="800" cellpadding="5" cellspacing="0">
                              
                              <?
										  	  if(isset($_GET['msg']) && $_GET['msg'] == "not_found")
											  {
										  ?>
                              <tr>
                                <td colspan="3"><table width="100%" cellpadding="2" cellspacing="0">
                                    <tr>
                                      <td width="5%" rowspan="3"><img src="../../images/redcross.gif" align="absmiddle"></td>
                                      <td width="95%" class="star">No seekers Found. </td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <?
										  	  }
										  ?>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Seeker ID </td>
                                <td width="603" class="comment"><input name="seeker_uid" type="text" id="seeker_uid" value="<?=$seeker_uid?>"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Contact Name</td>
                                <td><span class="comment">
                                  <input name="seeker_name" type="text" id="seeker_name" value="<?=$seeker_name?>">
                                </span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>City</td>
                                <td><span class="comment">
                                  <input name="seeker_city" type="text" id="seeker_city" value="<?=$seeker_city?>">
                                </span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td valign="top">Registered Date </td>
                                <td valign="top" class="normal_black">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td width="255" height="20" class="normal_text">From</td>
											<td width="277" class="normal_text">To</td>
										</tr>
										<tr>
											<td><?=createDate('reg_date_from',$reg_date_from)?></td>
											<td><?=createDate('reg_date_to',$reg_date_to)?></td>
										</tr>										
									</table>
								</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td width="126">Status</td>
                                <td class="comment"><select name="seeker_status" id="seeker_status">
                                  <option value="1,0" <? if($seeker_status == "1,0") echo "selected"; ?>>Select</option>
                                  <option value="1" <? if($seeker_status == "1") echo "selected"; ?>>Active</option>
                                  <option value="0" <? if($seeker_status == "0") echo "selected"; ?>>Inactive</option>
                                </select></td>
                              </tr>
                              <tr>
                                <td width="11">&nbsp;</td>
                                <td width="126">&nbsp;</td>
                                <td height="50" valign="middle"><a href="#" onClick="search_seeker();"><img src="../../images/search.gif" width="48" height="20" border="0"></a></td>
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

