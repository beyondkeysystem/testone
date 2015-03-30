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
		if($_GET["url"] != "employers_list.php")
			$url .= "../utility/";
			
		$url .=  $_GET["url"];
	}	
		
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$sqlJob = "select * from job_ad where rec_id=" . $_GET['rec_id'] . " order by ad_id desc";
	$resultJob = $objDb->ExecuteQuery($sqlJob);
	$rowCount = mysql_num_rows($resultJob);
	
	$sqlRec = "select * from job_recruiter where rec_id=" . $_GET['rec_id'];
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec=mysql_fetch_object($resultRec);
					
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
 <input type="hidden" name="invoice_id" value="<? if(isset($_POST['invoice_id'])) echo $_POST['invoice_id']; ?>"> 		 
			 <input type="hidden" name="pay_id" value="<? if(isset($_POST['pay_id'])) echo $_POST['pay_id']; ?>"> 		 
			 <input type="hidden" name="paid_by" value="<? if(isset($_POST['paid_by'])) echo $_POST['paid_by']; ?>"> 		 
			 <input type="hidden" name="rec_id" value="<? if(isset($_POST['rec_id'])) echo $_POST['rec_id']; ?>"> 		 
			 <input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 		 
			 
			 <input type="hidden" name="paid_date_from_date" value="<? if(isset($_POST['paid_date_from_date'])) echo $_POST['paid_date_from_date']; ?>">
			 <input type="hidden" name="paid_date_from_month" value="<? if(isset($_POST['paid_date_from_month'])) echo $_POST['paid_date_from_month']; ?>"> 		 
			 <input type="hidden" name="paid_date_from_year" value="<? if(isset($_POST['paid_date_from_year'])) echo $_POST['paid_date_from_year']; ?>"> 		  		 
			 
			 <input type="hidden" name="paid_date_to_date" value="<? if(isset($_POST['paid_date_to_date'])) echo $_POST['paid_date_to_date']; ?>">
			 <input type="hidden" name="paid_date_to_month" value="<? if(isset($_POST['paid_date_to_month'])) echo $_POST['paid_date_to_month']; ?>"> 		 
			 <input type="hidden" name="paid_date_to_year" value="<? if(isset($_POST['paid_date_to_year'])) echo $_POST['paid_date_to_year']; ?>"> 		  		 
			 		 
			<!-- fields from invoice list -->		 
		 	<input type="hidden" name="invoice_id" value="<? if(isset($_POST['invoice_id'])) echo $_POST['invoice_id']; ?>"> 		 
			 <input type="hidden" name="invoice_type" value="<? if(isset($_POST['invoice_type'])) echo $_POST['invoice_type']; ?>"> 		 			
			 <input type="hidden" name="pay_amount_from" value="<? if(isset($_POST['pay_amount_from'])) echo $_POST['pay_amount_from']; ?>"> 		 
			 <input type="hidden" name="pay_amount_to" value="<? if(isset($_POST['pay_amount_to'])) echo $_POST['pay_amount_to']; ?>"> 		 
			 <input type="hidden" name="payment_type" value="<? if(isset($_POST['payment_type'])) echo $_POST['payment_type']; ?>"> 		 
			 
			 <input type="hidden" name="invoice_date_from_date" value="<? if(isset($_POST['invoice_date_from_date'])) echo $_POST['invoice_date_from_date']; ?>">
			 <input type="hidden" name="invoice_date_from_month" value="<? if(isset($_POST['invoice_date_from_month'])) echo $_POST['invoice_date_from_month']; ?>"> 		 
			 <input type="hidden" name="invoice_date_from_year" value="<? if(isset($_POST['invoice_date_from_year'])) echo $_POST['invoice_date_from_year']; ?>"> 		  		 
			 
			 <input type="hidden" name="invoice_date_to_date" value="<? if(isset($_POST['invoice_date_to_date'])) echo $_POST['invoice_date_to_date']; ?>">
			 <input type="hidden" name="invoice_date_to_month" value="<? if(isset($_POST['invoice_date_to_month'])) echo $_POST['invoice_date_to_month']; ?>"> 		 
			 <input type="hidden" name="invoice_date_to_year" value="<? if(isset($_POST['invoice_date_to_year'])) echo $_POST['invoice_date_to_year']; ?>">			
								
			<!-- fields from employer list -->
			<input type="hidden" name="rec_uid" value="<? if(isset($_POST['rec_uid'])) echo $_POST['rec_uid']; ?>"> 	
			<input type="hidden" name="rec_name" value="<? if(isset($_POST['rec_name'])) echo $_POST['rec_name']; ?>">
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="rec_city" value="<? if(isset($_POST['rec_city'])) echo $_POST['rec_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="rec_status" value="<? if(isset($_POST['rec_status'])) echo $_POST['rec_status']; else if(isset($_GET['rec_status'])) echo $_GET['rec_status']; ?>"> 
			<input type="hidden" name="expire_status" value="<? if(isset($_POST['expire_status'])) echo $_POST['expire_status']; else if(isset($_GET['expire_status'])) echo $_GET['expire_status']; ?>"> 									 																		 
								 
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>		
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="100%" >
                              <tr>
                                <td height="30" class="headingRegister" >&nbsp;Company : <?=$rsRec->comp_name?></td>
                                <td align="right" class="normal_text" ><? include("includes/rec_select.php");?></td>
                              </tr>
                                <tr>
                                  <td width="73%" height="30" class="heading_black" >&nbsp;&nbsp;Posted Jobs </td>
                                  <td width="27%" align="right" class="heading_black" >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of  all the posted jobs by 
                                          <?=$rsRec->comp_name?>. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        <?							
							if(mysql_num_rows($resultJob) > 0)
							{
						?>
                          <tr>
                            <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
                              <tr>
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr>
                                      <td class="table_head">Ref. No </td>
                                      <td class="table_head">Job Ad Name </td>
                                      <td class="table_head">Location</td>
                                      <td class="table_head">Post Date </td>
                                      <td class="table_head">Expired</td>
                                      <td class="table_head">Status</td>
                                      <td class="table_head_end">View Details </td>
                                    </tr>
                                    <?
								$i = 1;
								while($rsJob = mysql_fetch_object($resultJob))
								{
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr>
                                      <td width="10%" class="<?=$td_class?>"><?=sprintf("%04d",$rsJob->ad_id); ?></td>
                                      <td width="12%" class="<?=$td_class?>"><?=$rsJob->position_name ?></td>
                                      <td width="16%" class="<?=$td_class?>"><?=$rsJob->town?></td>
                                      <td width="14%" class="<?=$td_class?>"><?=getDateValue($rsJob->ad_date)?></td>
                                      <td width="8%" class="<?=$td_class?>"><? if($rsJob->adTo >= date("Y-m-d")) echo "Yes"; else echo "No"; ?>&nbsp;</td>
                                      <td width="8%" class="<?=$td_class?>"><?=showStatus('job','ad_id',$rsJob->ad_id,'job_status',$rsJob->job_status,'job_ad'); ?>&nbsp;</td>
                                      <td width="10%" class="<?=$td_class?>_end"><a href="../job/job_search_details.php?id=<?=$rsJob->ad_id?>" class="paging_text">View Details </a></td>
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

