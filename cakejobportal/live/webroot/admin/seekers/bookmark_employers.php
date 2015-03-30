<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}

	$urlPage = "";
	if(isset($_GET['urlPage']))
	{
		$urlPage = $_GET['urlPage'];
	}	
	
	$url = "";
	if(isset($_GET["url"]))
	{		
		$url .=  $_GET["url"];
	}	
			
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$sqlBook="select * from job_bookmark_emp where seeker_id='".$_GET["seeker_id"]."'";
	
	$sqltemp = "select * from job_jobseeker where seeker_id='".$_GET["seeker_id"]."'";
	$resulttemp = $objDb->ExecuteQuery($sqltemp);
	$rstemp=mysql_fetch_object($resulttemp);
	 
	
	$cPage ="" ;
	$cPage = ( isset($_REQUEST['cPage']) ) ? $_REQUEST['cPage'] : '1';
	$baseURL= $_SERVER['PHP_SELF'];
	
	$j = 0;
	if(isset($_REQUEST['cPage']))
	{
		$page = $_REQUEST['cPage'];
		$j=($page-1)*10 ;
	}
		
	$pagination= new gsdPagination($sqlBook,$cPage,'20',$baseURL);	
	$sqlBook = $pagination->rQuery;	
	$resultBook = $objDb->ExecuteQuery($sqlBook);	
	$rowCount = mysql_num_rows($resultBook);
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nan Recruit</title>
<link rel="stylesheet" type="text/css" href="../../styles/job.css">
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
<script src="../javascript/admin.js" language="javascript"></script>
<script language="javascript">
	function goBack(url)
	{
		if(url == "")
			history.back();
		else
		{
			document.form1.action = url;
			document.form1.submit();
		}
	}
function paging(pageno)
 {
	 document.form1.method = "post";
	 document.form1.action = "bookmark_employers.php?cPage=" + pageno;
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
		 <form name="form1" method="post">
			<input type="hidden" name="seeker_uid" value="<? if(isset($_POST['seeker_uid'])) echo $_POST['seeker_uid']; ?>"> 	
			<input type="hidden" name="seeker_name" value="<? if(isset($_POST['seeker_name'])) echo $_POST['seeker_name']; ?>">
			<input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 	
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="seeker_city" value="<? if(isset($_POST['seeker_city'])) echo $_POST['seeker_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="seeker_status" value="<? if(isset($_POST['seeker_status'])) echo $_POST['seeker_status']; else if(isset($_GET['seeker_status'])) echo $_GET['seeker_status']; ?>">		  
					 
			<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="100%" >
                              <tr>
                                <td height="30" class="headingRegister" >&nbsp;CV Name : <?=$rstemp->seeker_summary?></td>
                                <td align="right" class="normal_text" ><? include("includes/seeker_select.php");?></td>
                              </tr>
                              <tr>
                                <td height="30" class="heading_black" >&nbsp;Employer Bookmarks </td>
                                <td align="right" class="heading_black" >&nbsp;</td>
                              </tr>
                                <tr>
                                  <td width="73%" height="30" >&nbsp;&nbsp;&nbsp;&nbsp;A list of all the employer bookmarks by
                                    <?=$rstemp->seeker_name?> <?=$rstemp->seeker_surname?> (Seeker ID : <?=$rstemp->seeker_id?>).</td>
                                  <td width="27%" align="right" class="heading_black" >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="98%">
									<? if(mysql_num_rows($resultBook)==0)
										 {
									?>
									 	<table width="100%" cellpadding="2" cellspacing="0">
										<tr>
											<td height="30" colspan="2">&nbsp;</td>
										</tr>										
									  <tr>
										<td width="5%" rowspan="3"><img src="../../images/redcross.gif" align="absmiddle"></td>
										<td width="95%" class="star">No Employer Bookmarks Found. </td>
									  </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table>
									<? } ?>&nbsp;&nbsp;</td>
										
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
  							<? if($rowCount>0) { ?>                       
						  <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
						  <? }?>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
				  
                          <tr>
                            <td align="center">
							   <? if(mysql_num_rows($resultBook)>0)
								 {
								?>
							<table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                              <tr align="left">
                                <td class="table_head">Company</td>
                                <td class="table_head">Contact  </td>
                                <td class="table_head">Location </td>
                                <td class="table_head">Address</td>
                                <td width="12%" class="table_head_end">Telephone</td>
                              </tr>
                              <?
								
								$i = 1;
								
								while($rsBook = mysql_fetch_object($resultBook))
								{
									//employer
									
									$sqlEmp = "select * from job_recruiter where  rec_status=1 and rec_id='".$rsBook->rec_id."'";
									$resultEmp = $objDb->ExecuteQuery($sqlEmp);
									$rsEmp = mysql_fetch_object($resultEmp);
									
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                              <tr align="left">
                                <td width="16%" class="<?=$td_class?>"><?=$rsEmp->comp_name?></td>
                                <td width="20%" class="<?=$td_class?>"><a href="../employer/view_profile.php?rec_id=<?=$rsEmp->rec_id?>" class="link_dark_blue"><?=$rsEmp->rec_name?></a></td>
                               	<td width="9%" class="<?=$td_class?>"> <?=$rsEmp->rec_city?></td>
                                <td width="27%" class="<?=$td_class?>"><?=$rsEmp->rec_address?> </td>
                                <td  class="<?=$td_class?>_end"><?=$rsEmp->rec_phone?></td>
                              </tr>
                              <?
									$i++;
								}
							  ?>
                            </table>
							<? } ?>
							</td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle"><table width="50%" height="26"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" class="normal_black"><? if($rowCount>0) echo $pagination->buildNavigation('paging_text');?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="seller_list_paging"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center"><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>');" style="cursor:pointer"></td>
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

