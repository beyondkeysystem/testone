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
		$url =  $_GET["url"];
	}	
		
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	
	$objDb = new db();
	$sqlInvoice = "select * from job_rec_invoices where invoice_id = " . $_GET['invoice_id'];
	$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);					
	$rsInvoice = mysql_fetch_object($resultInvoice);	
	$pp=0;
	$nameplan="";
	if($rsInvoice->invoice_type==2)
	{
		$pp=$rsInvoice->shortlist_rate_per_position*$rsInvoice->shortlisted_jobseekers;
		$nameplan="Shortlisted Jobseekers";
	}
	else
	{
		$pp=$rsInvoice->rate;
		$nameplan=$rsInvoice->plan_name;
	}
	
	$paid = 0;
	$sqlTotalPay = "select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=" . $_GET['invoice_id'];
	$resultTotalPay = $objDb->ExecuteQuery($sqlTotalPay);
	if($rsTotalPay = mysql_fetch_object($resultTotalPay))
	{
		$paid = $rsTotalPay->pay_sum;
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
									<td height="30" class="heading_black" >&nbsp;Invoice Details </td>
								</tr>	
								<tr>
									<td valign="top">
										<table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
                                            <td width="1%">&nbsp;</td>
                                            <td width="99%">The details of the invoice appears below. <br>
                                            <br></td>
                                          </tr>
										  <tr>
                                            <td height="30" colspan="2" class="sectionRecheading">
											Invoice No : <?=sprintf("%05d",$rsInvoice->invoice_id)?></td>
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
						if(mysql_num_rows($resultInvoice) > 0)
						{
					?>
					<tr>
						<td>&nbsp;</td>
					</tr>					
					<tr>
						<td align="center">
							<table width="90%" cellpadding="6" cellspacing="0" class="table_black_border">
							  <tr>
							    <td class="table_head">&nbsp;</td>
								<td class="table_head">Invoice Date</td>
								<td class="table_head">Plan Name </td>
								<td class="table_head_end">Amount</td>
							  </tr>
							  <?
								$i = 1;
								
								$td_class = "table_row";
							  ?>
								<tr>
								  <td width="4%" class="<?=$td_class?>"><?=$i?>)</td>
									<td width="19%" class="<?=$td_class?>"><?=getDateValue($rsInvoice->invoice_date); ?></td>
									<td width="32%" class="<?=$td_class?>"><?=$nameplan?>&nbsp;</td>
									<td width="15%" class="<?=$td_class?>_end">N$ <?=number_format($pp,2)?></td>
								</tr>
						  </table>
					  </td>
		          </tr>
					  <tr align="center">
						<td valign="middle"><table width="90%" cellpadding="5" cellspacing="0">
                          <tr>
                            <td width="98%" align="center"><img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$url?>?cPage=<?=$urlPage?>');" style="cursor:pointer"></td>
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

