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
	
	$sqladvert = "select * from  job_partner order by company_name";
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
 
  function deletePartner(pid)
 {
 	if(confirm("Are you sure you want to delete this partner?"))
	{
		document.form1.method="post";
		document.form1.action="partner_delete.php?pid="+pid;
		document.form1.submit();
	} 
	
 }
 
 
 function addPartner()
 {
 	
	if(validatePartners())
	{
		document.form1.method="post";
		document.form1.action="partner_add_action.php";
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
                                  <td height="30" class="heading_black" >&nbsp;View Partners </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="7"></td>
                                        <td width="638">You can view, edit or delete partner here. </td>
                                        <td width="80"><a href="#"  onClick="location.href='partner_add.php';"><img src="../../images/add_new_partner.gif" alt="tt" width="121" height="22" border="0"></a></td>
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
							 	Partner updated successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="add") 
								{
							  ?>
							 	Partner added successfully!
                              <? } ?>
							  </td>
							</tr> 
                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellpadding="6" cellspacing="0" class="table_black_border">
                              <tr>
                                <td width="5%" class="table_head">Logo</td>
                                <td width="15%" class="table_head">Company name </td>
                                <td width="13%" class="table_head">Description</td>
                                <td width="11%" class="table_head">Website<br>
                                (click to visit)</td>
                                <td width="12%" class="table_head">Contact Name<br>
                                (click to e-mail)</td>
                                <td width="10%" class="table_head">Telephone<br>
                                number</td>
                                <td width="9%" class="table_head">Street<br>
                                Address</td>
                                <td width="8%" class="table_head">Location</td>
                                <td width="12%" class="table_head">Description of<br>
                                partnership</td>
                                <td width="5%" class="table_head" style="border-right-style:none">&nbsp;</td>
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
                              <tr>
                                <td class="<?=$td_class?>"><img src="../../upload_logo/<?=$rsadvert->logo ?>"  width="70" alt="<?=$rsadvert->logo ?>"></td>
                                <td class="<?=$td_class?>"><?=$rsadvert->company_name ?></td>
                                <td class="<?=$td_class?>"><?=$rsadvert->company_desc ?></td>
                                <td class="<?=$td_class?>"><a href="http://<?=$rsadvert->web_address ?>" target="_blank" class="link_dark_blue"><?=$rsadvert->web_address ?></a></td>
                                <td class="<?=$td_class?>"><a href="mailto:<?=$rsadvert->email_address ?>" class="link_dark_blue"><?=$rsadvert->contact_name ?></a></td>
                                <td class="<?=$td_class?>"><?=$rsadvert->telephone ?></td>
                                <td class="<?=$td_class?>"><?=$rsadvert->street_address ?></td>
                                <td class="<?=$td_class?>"><?=$rsadvert->location ?></td>
                                <td class="<?=$td_class?>"><?=$rsadvert->desc_partnership ?></td>
                                <td class="<?=$td_class?>" style="border-right-style:none"><a href="#"  onClick="location.href='partner_edit.php?pid=<?=$rsadvert->partner_id ?>';"><img src="../../images/edit_partner.gif" alt="tt" width="45" height="22" border="0"></a><br>
                                  <br /> 
                                <a href="#"  onClick="return deletePartner(<?=$rsadvert->partner_id ?>)"><img src="../../images/delete_partner.gif" alt="tt" width="62" height="22" border="0"></a></td>
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
                            <td height="10" align="left" valign="middle"><a href="#"  onClick="location.href='partner_add.php';"><img src="../../images/add_new_partner.gif" alt="tt" width="121" height="22" border="0"></a></td>
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

