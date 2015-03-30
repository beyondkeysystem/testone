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
	
	$sqladvert = "select * from  job_top_sites order by title";
	$resultadvert = $objDb->ExecuteQuery($sqladvert);
	//$rsadvert=mysql_fetch_object($resultadvert);
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
 
 function deleteadvert(aid)
 {
 	if(confirm("Are you sure you want to delete this advert?"))
	{
		document.form1.method="post";
		document.form1.action="advert_delete.php?aid="+aid;
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
						  	<td>
						  	<table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black"> Advert List</span></td>
                                <td width="27%" align="right" class="normal_text" >&nbsp;</td>
                              </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of the namrecruit advertisements. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        <?							
							if($rowCount > 0)
							{
							
						?>
                          <tr>
                            <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
							  <tr>
								<td class="error"  align="center">
							  <? if(isset($_GET["msg"]) && $_GET["msg"]=="edit")
							  	 {
							 ?>
							 	Advert updated successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="add") 
								{
							  ?>
							 	Advert added successfully!
                              <? } ?>
							  </td>
							</tr> 
							  
							  <tr>
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr align="left">
                                      <td class="table_head">Advert Title </td>
                                      <td class="table_head">URL</td>
                                      <td class="table_head">Status</td>
                                      <td class="table_head_end">Action</td>
                                    </tr>
                                    <?
								$i = 1;
								while($rsadvert = mysql_fetch_object($resultadvert))
								{
									
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr align="left">
                                      <td width="25%" class="<?=$td_class?>"><?=$rsadvert->title ?></td>
                                      <td width="33%" class="<?=$td_class?>"><?=$rsadvert->url?></td>
                                      <td width="17%" class="<?=$td_class?>"><?=showStatus('advert','site_id',$rsadvert->site_id,'status',$rsadvert->status,'job_top_sites'); ?></td>
                                      <td width="25%" class="<?=$td_class?>_end"><a href="advert_edit.php?aid=<?=$rsadvert->site_id?>" class="paging_text">Edit</a> &nbsp;&nbsp;&nbsp;<a href="#" class="paging_text" onClick="return deleteadvert(<?=$rsadvert->site_id?>)">Delete </a></td>
                                    </tr>
                                    <?
									$i++;
								}
							  ?>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
						  <tr>
                            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  onClick="location.href='home.php';"><img src="../../images/back.gif" border="0"></a></td>
                          </tr>
                          <?
					  	}
						else
						{
					  ?>
                          <tr>
                            <td ></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <?
					  	}
					  ?>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
						  
						  
						  	</td>
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

