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
	
	$sqlLetters = "select * from job_cover_letters order by letter_id desc";
	$resultLetters = $objDb->ExecuteQuery($sqlLetters);
	//$rsLetter=mysql_fetch_object($resultLetters);
	$rowCount = mysql_num_rows($resultLetters);
	
	
	
	
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
 
 function deleteLetter(letter_id)
 {
 	if(confirm("Are you sure you want to delete this letter?"))
	{
		document.form1.method="post";
		document.form1.action="letter_delete.php?letter_id="+letter_id;
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
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black"> Cover Letters List</span></td>
                                <td width="27%" align="right" class="normal_text" >&nbsp;</td>
                              </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of all the namrecruit cover letters. </td>
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
							 	Cover letter updated successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="add") 
								{
							  ?>
							 	Cover letter added successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="delete") 
								{
							  ?>
							 	Cover letter deleted successfully!
							  <? } ?>
							  </td>
							</tr> 
							  
							  <tr>
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr align="left">
                                      <td class="table_head">Letter Title </td>
                                      <td class="table_head">Status</td>
                                      <td class="table_head_end">Action</td>
                                    </tr>
                                    <?
								$i = 1;
								while($rsLetter = mysql_fetch_object($resultLetters))
								{
									
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr align="left">
                                      <td width="60%" class="<?=$td_class?>"><?=$rsLetter->title ?></td>
                                      <td width="20%" class="<?=$td_class?>"><?=showStatus('letter','letter_id',$rsLetter->letter_id,'letter_status',$rsLetter->letter_status,'job_cover_letters'); ?></td>
                                      <td width="20%" class="<?=$td_class?>_end"><a href="letter_edit.php?letter_id=<?=$rsLetter->letter_id?>" class="paging_text">Edit</a> &nbsp;&nbsp;&nbsp;<a href="#" class="paging_text" onClick="return deleteLetter(<?=$rsLetter->letter_id?>)">Delete </a></td>
                                    </tr>
                                    <?
									$i++;
								}
							  ?>
                                </table></td>
                              </tr>
                            </table></td>
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
                            <td valign="middle"><table width="100%" cellpadding="2" cellspacing="0" >
                              <tr>
                                <td width="4%" rowspan="2"><img src="../../images/redcross.gif" align="absmiddle"></td>
                                <td width="96%" class="star">No Cover Letters Found.</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>                          
                          <?
					  	}
					  ?>
						<tr>
                            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  onClick="location.href='home.php';"><img src="../../images/back.gif" border="0"></a></td>
                          </tr>					  
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

