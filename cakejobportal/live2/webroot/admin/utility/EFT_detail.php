<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	
	$urlPage = "";
	if(isset($_GET['urlPage']))
	{
		$urlPage = $_GET['urlPage'];
	}
	
	$url = "";
	if(isset($_GET["url"]))
	{
		$url = $_GET["url"];
	}
	
	$objDb = new db();
	$sqlPay = "select * from job_rec_payments where pay_id = " . $_GET['pay_id'];
	$resultPay = $objDb->ExecuteQuery($sqlPay);					
	$rsPay = mysql_fetch_object($resultPay);	
		
	if($rsPay->pay_status==0)
	{
		$chkstatus="Pending";
	}
	else if($rsPay->pay_status==1)
	{
		$chkstatus="Received";
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
		 <form name="form1" method="post" >
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
			 		 
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
					<tr>
						<td width="772" valign="top">
							<table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
								
								<tr>
									<td height="30" class="heading_black" >&nbsp;EFT Details </td>
								</tr>	
								<tr>
									<td valign="top">
										<table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td width="98%">The details of the cheque appears below. </td>
                                          </tr>
										  <tr>
                                            <td height="30" colspan="2" class="sectionRecheading">
											Account No :<? echo($rsPay->account_number);?></td>
									      </tr>
										  <tr>
                                            <td colspan="2"><img src="../images/line.gif" width="772"></td>
									      </tr>										  
									  </table>
								  </td>						
								</tr>
							</table>						
					  </td>
						<td width="218" rowspan="3" valign="top"></td>
					</tr>
					<?
						if(mysql_num_rows($resultPay) > 0)
						{
					?>
					<tr>
						<td>&nbsp;</td>
					</tr>					
					<tr>
						<td align="center">
							<table width="90%" cellpadding="6" cellspacing="0" class="table_black_border">
							  <tr>
							    <td class="table_head">#</td>
								<td align="left" class="table_head">Ref</td>
								<td align="left" class="table_head">Bank Name </td>
								<td align="left" class="table_head">Branch Name</td>
								<td align="left" class="table_head">Amount</td>
								<td align="left" class="table_head_end">EFT Status </td>
								
							  </tr>
							  <?
								$i = 1;
								
								$td_class = "table_row";
							  ?>
								<tr>
								  <td width="4%" class="<?=$td_class?>"><?=$i?>)</td>
									<td width="15%" align="left" class="<?=$td_class?>"><?=$rsPay->ref?></td>
									<td width="21%" align="left" class="<?=$td_class?>"><?=$rsPay->bank?>&nbsp;</td>
									<td width="13%" align="left" class="<?=$td_class?>"><?=$rsPay->branch?></td>
									<td width="10%" align="left" class="<?=$td_class?>">N$
                                    <?=number_format($rsPay->pay_amount,2)?></td>
									<td width="21%" align="left" class="<?=$td_class?>_end"><?=$chkstatus?></td>
									
								</tr>
						  </table>
					  </td>
		          </tr>
					  <tr align="center">
						<td valign="middle"><table width="90%" cellpadding="5" cellspacing="0">
                          <tr>
                            <td width="98%" align="left"><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>');" style="cursor:pointer"></td>
                          </tr>
                        </table>
						</td>
					    <td valign="middle">&nbsp;</td>
					  </tr>
					  <?
					  	}
					  ?>
					  <tr>
						<td colspan="2">&nbsp;</td>
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

