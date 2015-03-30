<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	
	$objDb = new db();
	$cnt=-1;
	$invoice_id="";
	
	if(isset($_GET['invoice_id']) && $_GET['invoice_id']!="")
	{ 
		$sqlInvoice = "select * from job_rec_invoices where invoice_id = " . $_GET['invoice_id'];
		$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);					
		$rsInvoice = mysql_fetch_object($resultInvoice);	
		$cnt=mysql_num_rows($resultInvoice);
		if($cnt>0)
		{
			$sqlrec = "select * from job_recruiter where rec_id = '".$rsInvoice->rec_id."'";
			$resultrec = $objDb->ExecuteQuery($sqlrec);					
			$rsrec = mysql_fetch_object($resultrec);	
			
			$paid = 0;
			$sqlTotalPay = "select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=" . $_GET['invoice_id'];
			$resultTotalPay = $objDb->ExecuteQuery($sqlTotalPay);
			if($rsTotalPay = mysql_fetch_object($resultTotalPay))
			{
				$paid = $rsTotalPay->pay_sum;
			}
		}
			
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
<script src="../javascript/admin.js"  language="javascript"></script>
<script src="../../javascript/job.js" language="javascript"></script>		
<script src="../../javascript/recruiter.js" language="javascript"></script>
<script src="../../javascript/main.js" language="javascript"></script>
<script src="../../javascript/recruiter.js" language="javascript"></script>	

</head>
<body onLoad="displayTable();if(document.form1.pay_by != null) checkPay(document.form1.pay_by.value);MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
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
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;<span class="medium_black">Payment Successful</span></td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">The payment of invoice id -<?=sprintf("%05d",$_GET["invoice_id"])?> has been done successfully &amp; detail appears below.</td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top">
								  <table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
                                            <td  height="30" colspan="2" class="medium_black" valign="bottom">Invoice ID : <?=sprintf("%05d",$_GET["invoice_id"])?><span class="comment">
                                            </span>
											</td>
									      </tr>
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
							<tr>
								<td width="759" valign="top">
									<?
									if($cnt > 0)
									{
								?>
									<table  align="left" cellpadding="0" cellspacing="0" border="0" width="100%" >
										
										<tr>
										  <td width="17%" align="right" valign="top">Company Name : </td>
										  <td width="29%" valign="top">&nbsp;<?=$rsrec->comp_name?></td>
										  <td width="43%" align="right" valign="top">Recruiter Name : </td>
											<td width="11%" valign="top">&nbsp;<?=$rsrec->rec_name?> </td>						
										</tr>
									</table>	
								<? } ?>					
							  </td>
								<td width="9" rowspan="3" valign="top"></td>
							</tr>
							<?
								if($cnt > 0)
								{
							?>
												
							<tr>
								<td align="center">
									<table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
									  <tr>
										<td class="table_head">Invoice ID </td>
										<td class="table_head">Invoice Date</td>
										<td class="table_head"><? if($rsInvoice->invoice_type==1){?>Plan Name<? } else if($rsInvoice->invoice_type==2) {?>Shortlisted Jobseeker<? }?></td>
										<td width="16%" class="table_head" <? if($rsInvoice->invoice_type==1){?>style="display:none;"<? } ?>>Rate Per Position</td>
										<td class="table_head">Amount</td>
										<td class="table_head">Paid</td>
										<td class="table_head_end">Remaining</td>
									  </tr>
									  <?
										$i = 1;
										$td_class = "table_row";
									  ?>
									  <tr>
										<td width="10%" class="<?=$td_class?>"><?=sprintf("%05d",$rsInvoice->invoice_id)?></td>
										<td width="12%" class="<?=$td_class?>"><?=getDateValue($rsInvoice->invoice_date); ?></td>
										<td width="22%" class="<?=$td_class?>"><? if($rsInvoice->invoice_type==1){?><?=$rsInvoice->plan_name?><? } else if($rsInvoice->invoice_type==2) {?><?=$rsInvoice->shortlisted_jobseekers?><? }?>
									&nbsp;</td>
										<td class="<?=$td_class?>" <? if($rsInvoice->invoice_type==1){?>style="display:none;"<? } ?>><?=$rsInvoice->shortlist_rate_per_position ?></td>
										<td width="13%" class="<?=$td_class?>">N$
											<?=number_format($rsInvoice->rate,2)?></td>
										<td width="12%" class="<?=$td_class?>">N$
											<?=number_format($paid,2)?></td>
										<td width="15%" class="<?=$td_class?>_end">N$
											<?=number_format(($rsInvoice->rate - $paid),2)?></td>
									  </tr>
									</table></td>
						  </tr>
						  <tr align="center">
							<td valign="middle" height="10"></td>
							<td valign="middle"></td>
					  </tr>
				  <?
				  	if(($rsInvoice->rate - $paid) > 0)
					{
				  ?>
				  <? } ?>
					  <tr align="center">
						<td valign="middle"><table width="95%" cellpadding="5" cellspacing="0">
                          <tr>
                            <td width="98%" align="right"> <a href="home.php"><img src="../../images/cancel.gif" border="0"></a></td>
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

