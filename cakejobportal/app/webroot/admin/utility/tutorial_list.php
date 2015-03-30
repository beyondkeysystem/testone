<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	$rowCount=0;
	$cat="";
	$cat1="";
	$option="";
	
	$sqlTutorial = "select * from  job_vtutorials order by vt_name";
	$resultTutorial = $objDb->ExecuteQuery($sqlTutorial);
	//$rsadvert=mysql_fetch_object($resultadvert);
	$rowCount = mysql_num_rows($resultTutorial);
		
	
	
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
 
 function deleteTutorial(vtid)
 {
 	if(confirm("Are you sure you want to delete this video tutorial?"))
	{
		document.form1.method="post";
		document.form1.action="tutorial_delete.php?vtid="+vtid;
		document.form1.submit();
	} 
 }
 
 
 function addPartner()
 {
	if(validateTutorials())
	{
		document.form1.method="post";
		document.form1.action="tutorial_add_action.php";
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
		 <form method="post" enctype="multipart/form-data" name="form1" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="100%" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="100%" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;View Video Tutorials </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="7"></td>
                                        <td width="638">You can view, edit or delete video tutorials here. </td>
                                        <td width="80"></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
						   <?							
							if($rowCount > 0)
							{
							
						?>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
							<tr>
								<td class="error"  align="center">
							  <? if(isset($_GET["msg"]) && $_GET["msg"]=="edit")
							  	 {
							 ?>
							 	video tutorial updated successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="add") 
								{
							  ?>
							 	video tutorial added successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="status") 
							  {
							  ?>
							 	video tutorial status changed successfully!
                              <? } ?>							  
							  
							  </td>
							</tr> 
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellpadding="6" cellspacing="0" class="table_black_border">
                              <tr>
                                <td width="38%" class="table_head">Video Tutorial  </td>
                                <td width="25%" class="table_head">For Jobseeker / Recruiter </td>
                                <td width="15%" class="table_head">Status</td>
                                <td width="22%" class="table_head" style="border-right-style:none">Action</td>
                              </tr>
							   <?
								$i = 1;
								while($rsTutorial = mysql_fetch_object($resultTutorial))
								{
									
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                              <tr>
                                <td class="<?=$td_class?>"><?=$rsTutorial->vt_name ?></td>
                                <td class="<?=$td_class?>"><? if($rsTutorial->c_id == 1) echo "Jobseeker"; else echo "Recruiter"; ?></td>
                                <td class="<?=$td_class?>">
								<?
									if( $rsTutorial->vt_status == 1 ) {
										echo "<a href='tutorial_status.php?status=active&vtid=".$rsTutorial->vt_id."' class='link_dark_blue_bold'>Active</a>";
									} else {
										echo "<a href='tutorial_status.php?status=inactive&vtid=".$rsTutorial->vt_id."' class='link_dark_blue_bold'>Inactive</a>";
									}		 
								?>								</td>
                                <td class="<?=$td_class?>" style="border-right-style:none"><a href="#"  onClick="location.href='tutorial_edit.php?vtid=<?=$rsTutorial->vt_id ?>';"><img src="../../images/edit_partner.gif" alt="tt" width="45" height="22" border="0"></a>&nbsp;&nbsp;&nbsp;<a href="#"  onClick="return deleteTutorial('<?=$rsTutorial->vt_id ?>')"><img src="../../images/delete_partner.gif" alt="tt" width="62" height="22" border="0"></a></td>
                              </tr>
							   <?
									$i++;
								}
							  ?>
                            </table></td>
                          </tr>
						  <?
								}
							  ?>
						  
                          <tr align="center">
                            <td height="10" align="left" valign="middle"></td>
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

