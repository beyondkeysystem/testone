<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	require_once("../../classes/pagination.php");
	
	$objDb = new db();
	$cnt=-1;
	$invoice_id="";
	$cntcomp=1;
	$cntrec=1;
	
	$sqlInvoice = "select * from job_rec_invoices invoice where ((rate>0 and invoice.invoice_type=1) or (shortlisted_jobseekers * shortlist_rate_per_position>0 and invoice.invoice_type=2)) and (select count(*) from job_rec_payments where invoice_id=invoice.invoice_id and pay_status=1)>0 and invoice_type in(" . $_POST["invoice_type"] . ")";
	
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$sqlInvoice .= " and invoice_id='".$_POST["invoice_id"]."'";
	}
	if(isset($_POST['invoice_date_from_date']) && $_POST['invoice_date_from_date'] != '')
	{
		$invoice_date_from = $_POST['invoice_date_from_year'] . "-" . $_POST['invoice_date_from_month'] . "-" . $_POST['invoice_date_from_date'];	
		$sqlInvoice .= " and 	invoice_date >='".$invoice_date_from."'";												
	}
	if(isset($_POST['invoice_date_to_date']) && $_POST['invoice_date_to_date'] != '')
	{
		$invoice_date_to = $_POST['invoice_date_to_year'] . "-" . $_POST['invoice_date_to_month'] . "-" . $_POST['invoice_date_to_date'];	
		$sqlInvoice .= " and invoice_date<='".$invoice_date_to."'";													
	}	
	if(isset($_POST['pay_amount_from']) && $_POST['pay_amount_from'] != '')
	{
		$sqlInvoice .= " and 	rate>='".$_POST['pay_amount_from']."'";												
	}
	
	if(isset($_POST['pay_amount_to']) && $_POST['pay_amount_to'] != '')
	{
		
		$sqlInvoice .= " and rate<='".$_POST['pay_amount_to']."'";													
	}
	if(isset($_POST["rec_id"]) && $_POST["rec_id"]!="")
	{
		$sqlrec="select * from job_recruiter r, job_rec_invoices i where r.rec_id=i.rec_id and r.rec_uid ='".trim($_POST["rec_id"])."'";
		$resultrec = $objDb->ExecuteQuery($sqlrec);
		
		if(mysql_num_rows($resultrec)>1)
		{
			$sqlSecond="";
			$sqlInvoice .= "  and ( ";
			while($rsrec = mysql_fetch_object($resultrec))
			{
				$sqlSecond .= "  invoice_id='".$rsrec->invoice_id."' or";
			}
			$sqlSecond = substr($sqlSecond,0,strlen($sqlSecond)-2) .")";
			$sqlInvoice .= $sqlSecond;
		}
		else if($rsrec = mysql_fetch_object($resultrec))
		{
			$sqlInvoice .= " and invoice_id='".$rsrec->invoice_id."'";
		}
		if(mysql_num_rows($resultrec)==0)
		{
			$cntrec=0;
		}
	}	
	if(isset($_POST["comp_name"]) && $_POST["comp_name"]!="")
	{
		$sqlcomp="select * from job_recruiter r, job_rec_invoices i where  r.rec_id=i.rec_id and r.comp_name like '%".trim($_POST["comp_name"])."%'";
		$resultcomp= $objDb->ExecuteQuery($sqlcomp);
		
		if(mysql_num_rows($resultcomp)>1)
		{
			$sqlSecondcomp="";
			$sqlInvoice .= "  and ( ";
			while($rscomp = mysql_fetch_object($resultcomp))
			{
				$sqlSecondcomp .= "  invoice_id='".$rscomp->invoice_id."' or";
			}
			$sqlSecondcomp = substr($sqlSecondcomp,0,strlen($sqlSecondcomp)-2) .")";
			$sqlInvoice .= $sqlSecondcomp;
		}
		else if($rscomp = mysql_fetch_object($resultcomp))
		{
			$sqlInvoice .= " and invoice_id='".$rscomp->invoice_id."'";
		}
		if(mysql_num_rows($resultcomp)==0)
		{
			$cntcomp=0;
		}
	}	
	if(isset($_POST["payment_type"]) && $_POST["payment_type"]!="All")
	{
		 if($_POST["payment_type"]=="complete")
		 {
		 	$sqlInvoice .= " and rate=(select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=invoice.invoice_id)";
		 }
		 else  if($_POST["payment_type"]=="incomplete")
		 {
		 	$sqlInvoice .= " and rate>(select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=invoice.invoice_id)";
		 } 
	
	}
	
	$sqlInvoice .= " order by invoice.invoice_id desc";
	
	$cPage ="" ;
	$cPage = ( isset($_REQUEST['cPage']) ) ? $_REQUEST['cPage'] : '1';
	$baseURL= $_SERVER['PHP_SELF'];
	
	$j = 0;
	if(isset($_REQUEST['cPage']))
	{
		$page = $_REQUEST['cPage'];
		$j=($page-1)*10 ;
	}
		
	$pagination= new gsdPagination($sqlInvoice,$cPage,'20',$baseURL);	
	$sqlInvoice = $pagination->rQuery;	
	$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
	$rowCount = mysql_num_rows($resultInvoice);	
	$cnt=mysql_num_rows($resultInvoice);
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
<script src="../javascript/admin.js"  language="javascript"></script>
<script src="../../javascript/job.js" language="javascript"></script>		
<script src="../../javascript/recruiter.js" language="javascript"></script>
<script src="../../javascript/main.js" language="javascript"></script>
<script src="../../javascript/recruiter.js" language="javascript"></script>	
<script type="text/javascript" language="javascript">
	function viewDetails(location)
	{
		document.form1.method="post";	
		document.form1.action = location + "&url=invoice_list.php&urlPage=<?=$cPage?>";
		document.form1.submit();
	}
	
function paging(pageno)
	 {
		 document.form1.method = "post";
		 document.form1.action = "invoice_list.php?cPage=" + pageno;
		 document.form1.submit();
	 }
</script>	
</head>
<body onLoad="if(document.form1.pay_by != null) checkPay(document.form1.pay_by.value);MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		<form name="form1" action="make_new_payment_action.php?invoice_id=<?=$rsInvoice->invoice_id?>" method="post" >		 
		 	<input type="hidden" name="invoice_id" value="<? if(isset($_POST['invoice_id'])) echo $_POST['invoice_id']; ?>"> 		 
			 <input type="hidden" name="invoice_type" value="<? if(isset($_POST['invoice_type'])) echo $_POST['invoice_type']; ?>"> 		 			
			 <input type="hidden" name="pay_amount_from" value="<? if(isset($_POST['pay_amount_from'])) echo $_POST['pay_amount_from']; ?>"> 		 
			 <input type="hidden" name="pay_amount_to" value="<? if(isset($_POST['pay_amount_to'])) echo $_POST['pay_amount_to']; ?>"> 		 
			 <input type="hidden" name="payment_type" value="<? if(isset($_POST['payment_type'])) echo $_POST['payment_type']; ?>"> 		 
			 <input type="hidden" name="rec_id" value="<? if(isset($_POST['rec_id'])) echo $_POST['rec_id']; ?>"> 		 
			 <input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 		 
			 
			 <input type="hidden" name="invoice_date_from_date" value="<? if(isset($_POST['invoice_date_from_date'])) echo $_POST['invoice_date_from_date']; ?>">
			 <input type="hidden" name="invoice_date_from_month" value="<? if(isset($_POST['invoice_date_from_month'])) echo $_POST['invoice_date_from_month']; ?>"> 		 
			 <input type="hidden" name="invoice_date_from_year" value="<? if(isset($_POST['invoice_date_from_year'])) echo $_POST['invoice_date_from_year']; ?>"> 		  		 
			 
			 <input type="hidden" name="invoice_date_to_date" value="<? if(isset($_POST['invoice_date_to_date'])) echo $_POST['invoice_date_to_date']; ?>">
			 <input type="hidden" name="invoice_date_to_month" value="<? if(isset($_POST['invoice_date_to_month'])) echo $_POST['invoice_date_to_month']; ?>"> 		 
			 <input type="hidden" name="invoice_date_to_year" value="<? if(isset($_POST['invoice_date_to_year'])) echo $_POST['invoice_date_to_year']; ?>">
			
			
			<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="950" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Invoice List </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">
										<? if($rowCount <= 0 || $cntcomp==0 || $cntrec==0 )
										{ ?>
										<script language="javascript">document.form1.action="search_invoices.php?msg=not_found";document.form1.submit();</script>
										<? } else {?> The detail of the invoices appears below.										 <? }?>
									  </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top">
								  <table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
                                            <td colspan="2"><img src="../images/line.gif" width="772"></td>
									      </tr>										  
								    </table>
								  </td>
                                </tr>
								
										
									
                            </table></td>
                          </tr>
                        

                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4" id="invoice_detail"    >
							
							<?
								 if($rowCount > 0 && $cntcomp!=0 && $cntrec!=0 )
								{
							?>
							<tr>
								<td align="center">
									<table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
									  <tr align="left">
										<td class="table_head">Invoice ID </td>
										<td class="table_head">Employer  ID</td>
										<td class="table_head">Invoice Date</td>
										<td class="table_head">Subject</td>
										<td class="table_head">Amount</td>
										<td class="table_head_end">Pay Status </td>
									  </tr>
									  <?
									  	$i = 1;
									  	while($rsInvoice = mysql_fetch_object($resultInvoice))	
										{
											if($cnt>0)
											{
												if($rsInvoice->invoice_type == 1)
													$invoice_amount = $rsInvoice->rate;
												else
													$invoice_amount = $rsInvoice->shortlist_rate_per_position * $rsInvoice->shortlisted_jobseekers;
													
												$sqlrec = "select * from job_recruiter where rec_id = '".$rsInvoice->rec_id."'";
												$resultrec = $objDb->ExecuteQuery($sqlrec);					
												$rsrec = mysql_fetch_object($resultrec);	
												
												$paid = 0;
												$sqlTotalPay = "select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id='" .$rsInvoice->invoice_id."'";
												$resultTotalPay = $objDb->ExecuteQuery($sqlTotalPay);
												if($rsTotalPay = mysql_fetch_object($resultTotalPay))
												{
													$paid = $rsTotalPay->pay_sum;
												}
											}
												
												if($i%2 == 1)
												$td_class = "table_row";
												else
												$td_class = "table_alternate_row";
									  ?>
									  <tr align="left">
										<td width="10%" class="<?=$td_class?>"><?=sprintf("%05d",$rsInvoice->invoice_id)?></td>
										<td width="13%" class="<?=$td_class?>"><a href="#" onClick="viewDetails('../employer/view_profile.php?rec_id=<?=$rsrec->rec_id?>');" title="Click to view employer details." class="paging_text"><?=$rsrec->rec_uid?></a></td>
										<td width="11%" class="<?=$td_class?>"><?=getDateValue($rsInvoice->invoice_date); ?></td>
										<td width="21%" class="<?=$td_class?>">
										<? if($rsInvoice->invoice_type==1){?>
											Subscribed to plan - <?=$rsInvoice->plan_name?>
										<? } else if($rsInvoice->invoice_type==2) { 
											echo("Shortlisted jobseekers : ");?><?=$rsInvoice->shortlisted_jobseekers?><? echo("<br>(Rate per Position : N$ ".$rsInvoice->shortlist_rate_per_position .")"); }?>
									&nbsp;</td>
										<td width="11%" class="<?=$td_class?>">N$
											<?=number_format($invoice_amount,2)?></td>
										<td width="14%" class="<?=$td_class?>_end"><? if(($invoice_amount - $paid)>0){?><a href="make_new_payment.php?invoice_id=<?=$rsInvoice->invoice_id?>" class="paging_text" title="Make New Payment">Make New Payment</a><? }else { echo("<span class='black_text'>Complete</span>"); } ?></td>
									  </tr>
									  <? $i++; } ?>
								  </table></td>
						  </tr>
						  
						    <tr align="center">
						      <td valign="middle" height="10"></td>
						      <td valign="middle"></td>
						      </tr>
						    <tr align="center">
							<td valign="middle" height="10"><table width="95%" cellpadding="5" cellspacing="0">
                              <tr>
                                <td width="98%" height="30" align="left"><a href="search_invoices.php"><img src="../../images/back.gif" border="0"></a></td>
                              </tr>
                            </table></td>
							<td valign="middle"></td>
					  </tr>
				  <?
				  	if($rowCount > 0)
					{
				  ?>
					  <tr align="center">
					    <td valign="middle"><table width="100%" height="26"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" class="normal_black"><? if($rowCount>0) echo $pagination->buildNavigation('paging_text');?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="seller_list_paging"></td>
                              </tr>
                            </table></td>
					    <td valign="middle">&nbsp;</td>
			      </tr>
				  <? } ?>
					  <tr align="center">
						<td valign="middle">&nbsp;</td>
					    <td valign="middle">&nbsp;</td>
					  </tr>
					  <?
					  	}
					  ?>
					  <tr>
						<td colspan="2">&nbsp;</td>
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
	 	<td height="173">
			<? include("includes/bottom.php"); ?>
	   </td>          
     </tr>
</table>
</body>
</html>

