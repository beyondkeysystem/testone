<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	
	$objDb = new db();
	$cnt=-1;
	$invoice_id="";$totp="";
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$invoice_id=$_POST["invoice_id"];
	}
	else if(isset($_GET['invoice_id']) && $_GET['invoice_id']!="")
	{
		$invoice_id=$_GET["invoice_id"];
	}
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
			
			if($rsInvoice->invoice_type == 2)
				$totp = $rsInvoice->shortlist_rate_per_position * $rsInvoice->shortlisted_jobseekers;
			else if($rsInvoice->invoice_type == 1)
				$totp = $rsInvoice->rate;
			
			
			//for recruiter
			$sqlrec1 = "select * from job_recruiter where rec_id = " .$rsInvoice->rec_id;
			$resultrec1  = $objDb->ExecuteQuery($sqlrec1);					
			$rsrec1  = mysql_fetch_object($resultrec1);	
			
		}
			
	}
	
	
	//for recruiter
	/*$sqlrec1 = "select * from job_recruiter where rec_id = " .$rsInvoice->rec_id;
	$resultrec1  = $objDb->ExecuteQuery($sqlrec1);					
	$rsrec1  = mysql_fetch_object($resultrec1);	
	*/
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
<script language="javascript">

function makeShowData(event)
	{
		var flag=true;
		if (event.keyCode == 13) {
			flag=showData();
			if(flag==false) { return false; } else { return true; }
		}
	}
function showData()
{
	var flag=true;
	
	flag=checkBlank("Please enter Invoice ID.",document.form1.invoice_id);
	if(flag==false) { return false; }		
	
	flag=checkNumber("Please enter number only in Invoice ID.",document.form1.invoice_id);
	if(flag==false) { return false; } else {
		document.form1.action="make_new_payment.php?invoice_id="+document.form1.invoice_id.value;
		document.form1.method="post";
		document.form1.submit();
	}
}


function displayTable()
{
	if(document.form1.invoice_id.value!="" )
	{
		document.getElementById("invoice_detail").style.display="";
	}
	else
	{
		document.getElementById("invoice_detail").style.display="none";
	}
}

</script>
<script  language="javascript">
function validatePayment()
{
	if(document.form1.pay_by.value == "Cheque")
	{
		if(validChequePartial())
		{
			document.form1.submit();	
		}
		else
		{
			return false;
		}
	}
	else if(document.form1.pay_by.value == "EFT")
	{
		if(validEFTPartial())
		{
			document.form1.submit();	
		}
		else
		{
			return false;
		}
	}
}
</script>

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
			<input name="totpay" type="hidden" value="<?=$totp?>" >
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;<span class="medium_black">New Payment </span></td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Please enter Invoice ID to view details of the invoice and make payment.                                          <? //if($rsInvoice->rate > 0) echo "To make payment click on pay now."; else echo "To subscribe, click on subscribe now."; ?>
                                        <br>
                                        <br></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top">
								  <table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
                                            <td  height="30" colspan="2" valign="bottom">&nbsp;&nbsp;
											Invoice ID : <input name="invoice_id" type="text" id="invoice_id"  value="<?=$invoice_id?>"   onKeyPress="return makeShowData(event);"  >
                                            <a href="#" onClick="return showData();"><img src="../../images/search.gif"   border="0" align="absmiddle"></a> <a href="#" onClick="location.href='home.php'"><img src="../../images/cancel.gif" width="50" height="18" border="0" align="absmiddle"></a></td>
									      </tr>
										  <tr>
                                            <td colspan="2"><img src="../images/line.gif" width="772"></td>
									      </tr>										  
									  </table>
								  </td>
                                </tr>
								<tr>
									<td>
										<? if($cnt==0) {?>
										<table width="100%" cellpadding="2" cellspacing="0" >
											<tr>
												
											  <td width="4%" rowspan="2"><img src="../../images/redcross.gif" align="absmiddle"></td>
												<td width="96%" class="star">No Invoice Found. </td>
											</tr>
											<tr>
											  <td>&nbsp;</td>
											</tr>								
										</table>
										<? }?>
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
									  <tr align="left">
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
									  <tr align="left">
										<td width="11%" class="<?=$td_class?>"><?=sprintf("%05d",$rsInvoice->invoice_id)?></td>
										<td width="11%" class="<?=$td_class?>"><?=getDateValue($rsInvoice->invoice_date); ?></td>
										<td width="21%" class="<?=$td_class?>"><? if($rsInvoice->invoice_type==1){?><?=$rsInvoice->plan_name?><? } else if($rsInvoice->invoice_type==2) {?><?=$rsInvoice->shortlisted_jobseekers?><? }?>
									&nbsp;</td>
										<td class="<?=$td_class?>" <? if($rsInvoice->invoice_type==1){?>style="display:none;"<? } ?>><?=$rsInvoice->shortlist_rate_per_position ?></td>
										<td width="12%" class="<?=$td_class?>">N$
											<?=number_format($rsInvoice->rate,2)?></td>
										<td width="14%" class="<?=$td_class?>">N$
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
					  <tr align="center">
					    <td valign="middle"><table width="90%" cellpadding="4" cellspacing="0">
                          <tr>
                            <td width="56%" rowspan="7" align="right" valign="top"><table  width="100%" id="pay_eft"  >
                                <tr>
                                  <td> To make payment by Online Booking, please transfer funds electronically to:<br>
                                      <br>
            Account Name : NamRecruit<br>
            Account Number : 12345678<br>
            Branch : Windhoek<br>
            Bank : FNB<br>
            Branch Code : 280-172<br>
            Ref : <span class="error">
            <?=sprintf("%05d",$rsInvoice->invoice_id)?>
            </span><br>
            <br>
            <span class="subhead_gray_small">IMPORTANT: </span>Please fax payment advice to +088 614 010 <br>
            <br>
            Once your payment has cleared your account will be upgraded. </td>
                                </tr>
                              </table>
                                <table  width="100%" id="pay_cheque"    >
                                  <tr>
                                    <td> To make payment by cheque, please make the check out 'NamRecruit' and post it to :<br>
                                        <br>
            PO Box 1111<br>
            Windhoek<br>
            6000<br>
            Namibia.<br>
            <br>
            <span class="subhead_gray_small">IMPORTANT: </span>Please write your invoice number <span class="error">
            <?=sprintf("%05d",$rsInvoice->invoice_id)?>
            </span>on the back of the cheque as your reference ID.<br>
            <br>
                                    </td>
                                  </tr>
                              </table></td>
                            <td width="44%" align="right">Pay By :
                                <select name="pay_by" id="pay_by" onChange="checkPay(this.value);">
                                  <option value="EFT" <? if(isset($_GET["type"]) && $_GET["type"]==1) echo("selected"); ?>>EFT</option>
                                  <option value="Cheque" <? if(isset($_GET["type"]) && $_GET["type"]==2) echo("selected"); ?>>Cheque</option>
                                </select>
                            </td>
                          </tr>
                          <tr id="divCheque_pay" >
                            <td align="right">Pay Amount :
                                <input name="pay_amount" type="text" id="pay_amount"></td>
                          </tr>
                          <tr id="divCheque_accno" style="display:none">
                            <td align="right">Bank Account No :
                                <input name="account_number" type="text" id="account_number"></td>
                          </tr>
                          <tr id="divCheque1" style="display:none">
                            <td align="right">Cheque No :
                                <input name="cheque_number" type="text" id="cheque_number">
                            </td>
                          </tr>
                          <tr id="divCheque2" style="display:none">
                            <td align="right">Cheque Date:
                                <?=createDate('cheque');?>
                            </td>
                          </tr>
                          <tr id="divCheque3" >
                            <td align="right">Bank Name :
                                <input name="bank" type="text" id="bank" size="30">
                            </td>
                          </tr>
                          <tr id="divCheque4" >
                            <td align="right" valign="top">Branch :
                                <input name="branch" type="text" id="branch" size="30"></td>
                          </tr>
                        </table></td>
					    <td valign="middle">&nbsp;</td>
			      </tr>
				  <? } ?>
					  <tr align="center">
						<td valign="middle"><table width="95%" cellpadding="5" cellspacing="0">
                          <tr>
                            <td width="98%" align="right"><? if(($rsInvoice->rate - $paid) <= 0) { ?> <a href="home.php"><img src="../../images/back.gif" border="0"></a><? } else if(($rsInvoice->rate - $paid) >0) { ?><a href="#" onClick="return validatePayment(<?=($rsInvoice->rate - $paid)?>);"><img src="../../images/pay_now.gif" border="0"></a><? } ?></td>
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

