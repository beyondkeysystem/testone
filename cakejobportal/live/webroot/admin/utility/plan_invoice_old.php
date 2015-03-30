<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
	
	$objDb = new db();
	
	$objDb = new db();
	$sqlInvoice = "select * from job_rec_invoices where invoice_id = " . $_GET['invoice_id'];
	$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);					
	$rsInvoice = mysql_fetch_object($resultInvoice);
	
	if($rsInvoice->invoice_type == 2)
		$totp = $rsInvoice->shortlist_rate_per_position * $rsInvoice->shortlisted_jobseekers;
	else if($rsInvoice->invoice_type == 1)
		$totp = $rsInvoice->rate;
	
	//for recruiter
	$sqlrec1 = "select * from job_recruiter where rec_id = " .$rsInvoice->rec_id;
	$resultrec1  = $objDb->ExecuteQuery($sqlrec1);					
	$rsrec1  = mysql_fetch_object($resultrec1);	
	$sql_vat = "select * from job_vat where vat_status=1";
	$result_vat  = $objDb->ExecuteQuery($sql_vat);					
	if($rs_vat  = mysql_fetch_object($result_vat)) $vat=$rs_vat->vat; else $vat=0;
	
	
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
<script  language="javascript">
function validatePayment()
{
	document.form1.submit();	
}	
/*function validatePayment()
{
	if(document.form1.pay_by.value == "Cheque")
	{
		if(validCheque())
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
		if(validEFT())
		{
			document.form1.submit();	
		}
		else
		{
			return false;
		}
	}
}*/
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
		<form name="form1" action="make_payment.php?invoice_id=<?=$rsInvoice->invoice_id?>&plan=<?=$_GET['plan']?>" method="post" >		 
		 	<!-- Page Body Start-->	
			<input name="totpay" type="hidden" value="<?=$totp?>" >
			
			<input name="ref" value="<?=sprintf("%05d",$rsInvoice->invoice_id)?>" type="hidden" readonly>
			<input name="payable" type="hidden" id="payable" value="NamRecruit" size="30" readonly>
			<input name="post_to"  type="hidden"   value="PO Box 5868, Windhoek, Namibia" size="30" readonly>
				<? if($rsInvoice->rate == 0 && $rsInvoice->additional_rate==0) { ?><script language="javascript">document.form1.submit();</script><? } ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;<span class="headingRecRegister">Invoice</span></td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">The details of the invoice for your plan subscription appears below.
                                        <? if($rsInvoice->rate > 0) echo "To make payment click on pay now."; else echo "To subscribe, click on subscribe now."; ?>. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                        

                          <tr>
                            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
					<tr>
						<td width="772" valign="top">
							<table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
								
								<tr>
									<td valign="top">
										<table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
                                            <td width="200%" height="30" colspan="2" class="sectionRecheading">Invoice No : <?=sprintf("%05d",$rsInvoice->invoice_id)?></td>
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
							<table width="90%" cellpadding="0" cellspacing="0" >
                              <tr>
                                <td height="122"  valign="top"><table width="100%"  class="table_black_border_line" cellpadding="6" cellspacing="0">
                                    <tr>
                                      <td class="table_head_line">&nbsp;</td>
                                      <td class="table_head_end">Invoice Date</td>
                                    </tr>
                                    <?
								$i = 1;
								
								$td_class = "table_row";
							  ?>
                                    <tr>
                                      <td class="table_row_line"><?=$i?>
                                        )</td>
                                      <td valign="top" class="<?=$td_class?>_end"><?=getDateValue($rsInvoice->invoice_date); ?></td>
                                    </tr>
                                </table></td>
                                <td ><table width="100%" bgcolor="#000000" cellspacing="1" cellpadding="6">
                                  <tr>
                                    <td height="21" class="table_head_noborder">Plan Name </td>
                                    <? if($rsInvoice->additional_position >0) {?>
                                    <td class="table_head_noborder">NO</td>
                                    <? } ?>
                                    <td class="table_head_noborder">Amount</td>
                                  </tr>
                                  <tr bgcolor="#FFFFFF">
                                    <td width="33%" valign="top"  ><?=$rsInvoice->plan_name?>
&nbsp;<br>
      <br>
      <span class="normal_text">Additional positions&nbsp;</span> &nbsp;
      <? if($vat>0) {?>
      <br>
      <br>
      <span class="normal_text">Vat (
      <?=$vat?>
      %)&nbsp;</span>
      <? }?>
                                    </td>
                                    <? if($rsInvoice->additional_position >0) {?>
                                    <td width="17%" valign="bottom"  ><?=$rsInvoice->additional_position?>
                                &nbsp;<br>
                                      <? if($vat>0) {?>
                                      <br>
                                      <br>
                                      <?  }?></td>
                                    <? }?>
                                    <td width="23%" valign="top" class="normal_text"  >N$
                                        <?=number_format($rsInvoice->rate-$rsInvoice->additional_rate-$rsInvoice->vat,2)?>
                                        <br>
                                        <br>
      N$
      <?=number_format($rsInvoice->additional_rate,2)?>
      <? if($vat>0) {?>
      <br>
      <br>
      N$
      <?=number_format($rsInvoice->vat,2)?>
      <? }?></td>
                                  </tr>
                                  <tr>
                                    <td width="33%" align="right" valign="top" bgcolor="#FFFFFF" ><span class="medium_black">Total</span></td>
                                    <? if($rsInvoice->additional_position >0) {?>
                                    <td width="17%" bgcolor="#FFFFFF"  >&nbsp;</td>
                                    <? }?>
                                    <td width="23%" bgcolor="#FFFFFF" class="normal_text" >N$
                                        <?=number_format($rsInvoice->rate,2)?></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
		          </tr>
					  <tr align="center">
					    <td valign="middle" height="10"></td>
					    <td valign="middle"></td>
			      </tr>
				  <?
				  	if($rsInvoice->rate > 0)
					{
				  ?>
					  <tr align="center">
					    <td valign="middle" align="center"><table width="90%" cellpadding="4" cellspacing="0">
                          <tr>
                            <td width="79%" align="left" valign="top"><table  width="100%" id="pay_eft"  >
                                <tr>
                                  <td> To make payment by Online Booking, please transfer funds electronically to:<br>
                                      <br>
                                      Account Name : Laser Sport Namibia
                                      <br>
Account Number : 62108270430 <br>
Branch : Exclusive Banking Suite (174) <br>
Bank : First National Bank (280) <br>
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
                            <td width="21%" align="right" valign="top">Pay By :
                                <select name="pay_by" id="pay_by" onChange="checkPay(this.value);">
                                  <option value="EFT" <? if(isset($_GET["type"]) && $_GET["type"]==1) echo("selected"); ?>>EFT</option>
                                  <option value="Cheque" <? if(isset($_GET["type"]) && $_GET["type"]==2) echo("selected"); ?>>Cheque</option>
                                </select>
                            </td>
                          </tr>
                        </table></td>
					    <td valign="middle">&nbsp;</td>
			      </tr>
				  <? } ?>
					  <tr align="center">
						<td valign="middle"><table width="90%" cellpadding="5" cellspacing="0">
                          <tr>
                            <td width="98%" align="left"><? if($rsInvoice->rate == 0 && $rsInvoice->additional_rate == 0) { ?><a href="make_payment.php?invoice_id=<?=$rsInvoice->invoice_id?>&plan=<?=$_GET['plan']?>"><img src="../../images/place_order_now.gif" border="0"></a><? } else { ?><a href="#" onClick="return validatePayment();"><img src="../../images/place_order_now.gif" border="0"></a><? } ?></td>
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

