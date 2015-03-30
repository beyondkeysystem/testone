<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	$invoice_id = '';
	$pay_amount = '';
	$selval = '';
	
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
<script src="../../javascript/recruiter.js"></script>
<script src="../../javascript/main.js"></script>

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
		 <form name="form1" method="post" action="payment_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;New Payment </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Search for the payments with namrecruit.</td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
						  
                          <tr>
                            <td align="left"><table width="800" cellpadding="5" cellspacing="0">
                            <?
								  if(isset($_GET['msg']) && $_GET['msg'] == "not_found")
								  {
							?>
                              <tr>
                                <td colspan="3"><table width="100%" cellpadding="2" cellspacing="0">
                                    <tr>
                                      <td width="5%" rowspan="3"><img src="../../images/redcross.gif" align="absmiddle"></td>
                                      <td width="95%" class="star">No Payments Found.</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <?
										  	  }
										  ?>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Invoice ID </td>
                                <td width="603" class="comment"><input name="invoice_id" type="text" id="invoice_id" value="<?=$invoice_id?>">
                                <img src="../../images/star.gif"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Amount</td>
                                <td><span class="comment">
                                  <input name="pay_amount" type="text" id="pay_amount" value="<?=$pay_amount?>">
                                  <img src="../../images/star.gif"> </span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Paid By </td>
                                <td><span class="comment"><span class="text_gray_bold">
                                  <select name="pay_by" id="paid_by" onChange="checkPay(this.value);">
                                    <option value="" <? if($selval=="select") echo("selected");?>>Select</option>
                                    <option value="Cash" <? if($selval=="Cash") echo("selected");?> >Cash</option>
                                    <option value="Credit Card" <? if($selval=="Credit Card") echo("selected");?>>Credit Card</option>
                                    <option value="Cheque" <? if($selval=="Cheque") echo("selected");?>>Cheque</option>
                                  </select>
                                  <img src="../../images/star.gif"> </span>
                                </span></td>
                              </tr>
                              <tr id="divCheque1" style="display:none">
                                 <td>&nbsp;</td>
                                 <td valign="top">Cheque No  :</td>
							    <td height="39" valign="top"> <input name="cheque_number" type="text" id="cheque_number">
							     <span class="comment"><span class="text_gray_bold"><img src="../../images/star.gif"></span></span></td>
                              </tr>
                              <tr id="divCheque2" style="display:none">
                                <td>&nbsp;</td>
                                <td valign="top">Cheque Date:</td>
                                <td height="39" valign="top"><?=createDate('cheque');?>
                                <span class="comment"><span class="text_gray_bold"><img src="../../images/star.gif"></span></span></td>
                              </tr> 
							  <tr id="divCheque3" style="display:none">
                                <td>&nbsp;</td>
                                <td valign="top">Bank Name :</td>
                                <td height="39" valign="top"><input name="bank" type="text" id="bank" size="30">
                                <span class="comment"><span class="text_gray_bold"><img src="../../images/star.gif"></span></span></td>
                              </tr>
							  <tr id="divCheque4" style="display:none">
                                <td>&nbsp;</td>
                                <td valign="top">Branch Name :</td>
                                <td height="39" valign="top"><input name="branch" type="text" id="branch" size="30">
                                <span class="comment"><span class="text_gray_bold"><img src="../../images/star.gif"></span></span></td>
                              </tr>
							  <tr>
                                <td width="11">&nbsp;</td>
                                <td width="126">&nbsp;</td>
                                <td height="50" valign="middle"><a href="#" onClick="return validatePayment();"><img src="../../images/add.gif" width="48" height="20" border="0"></a></td>
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

