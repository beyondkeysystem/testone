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
	$pay_id = '';
	$selval = 'All';
	$paid_date_from = '';
	$paid_date_to = '';
	$pay_amount_from = '';
	$pay_amount_to='';
	$rec_id='';
	$comp_name='';
	
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$invoice_id = $_POST["invoice_id"];
	} 
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$pay_id = $_POST["pay_id"];
	} 
	if(isset($_POST["paid_by"]) && $_POST["paid_by"]!="")
	{
		$selval = $_POST["paid_by"];
	} 
	if(isset($_POST["pay_amount_from"]) && $_POST["pay_amount_from"]!="")
	{
		$pay_amount_from = $_POST["pay_amount_from"];
	} 
	if(isset($_POST["pay_amount_to"]) && $_POST["pay_amount_to"]!="")
	{
		$pay_amount_to = $_POST["pay_amount_to"];
	} 
	if(isset($_POST["rec_id"]) && $_POST["rec_id"]!="")
	{
		$rec_id = $_POST["rec_id"];
	} 
	if(isset($_POST["comp_name"]) && $_POST["comp_name"]!="")
	{
		$comp_name = $_POST["comp_name"];
	} 
	
	//for Date
	
	
	$paid_date_from_date=0;
	$paid_date_from_month=0;
	$paid_date_from_year=0;
	if(isset($_POST["paid_date_from_date"]))
	{
		$paid_date_from_date=$_POST["paid_date_from_date"];
	}
	if(isset($_POST["paid_date_from_month"]))
	{
		$paid_date_from_month=$_POST["paid_date_from_month"];
	}
	if(isset($_POST["paid_date_from_year"]))
	{
		$paid_date_from_year=$_POST["paid_date_from_year"];
	}
	$paid_date_from=$paid_date_from_year."-".$paid_date_from_month."-".$paid_date_from_date;
	
	$paid_date_to_date=0;
	$paid_date_to_month=0;
	$paid_date_to_year=0;
	if(isset($_POST["paid_date_to_date"]))
	{
		$paid_date_to_date=$_POST["paid_date_to_date"];
	}
	if(isset($_POST["paid_date_to_month"]))
	{
		$paid_date_to_month=$_POST["paid_date_to_month"];
	}
	if(isset($_POST["paid_date_to_year"]))
	{
		$paid_date_to_year=$_POST["paid_date_to_year"];
	}
	$paid_date_to=$paid_date_to_year."-".$paid_date_to_month."-".$paid_date_to_date;
	//end of date
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
 function search_payment()
 {
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
		 <form name="form1" method="post" action="payment_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Payment Search </td>
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
                                      <td width="95%" class="star">No Payments Found. </td>
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
                                <td width="603" class="comment"><input name="invoice_id" type="text" id="invoice_id" value="<?=$invoice_id?>"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Transaction  ID</td>
                                <td><span class="comment">
                                  <input name="pay_id" type="text" id="pay_id" value="<?=$pay_id?>">
                                </span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Paid By </td>
                                <td><span class="comment"><span class="text_gray_bold">
                                  <select name="paid_by" id="paid_by" onChange="selectPay(this.value);">
                                    <option value="All" <? if($selval=="All") echo("selected");?>>All</option>
                                    <option value="Cash" <? if($selval=="Cash") echo("selected");?> >Cash</option>
                                    <option value="Credit Card" <? if($selval=="Credit Card") echo("selected");?>>Credit Card</option>
                                    <option value="Cheque" <? if($selval=="Cheque") echo("selected");?>>Cheque</option>
                                  </select>
                                </span>
                                </span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td valign="top">Paid Date </td>
                                <td valign="top" >
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td width="225" height="20" class="normal_text">From</td>
											<td width="307" class="normal_text">To</td>
										</tr>
										<tr>
											<td><?=createDateInvoice('paid_date_from',$paid_date_from)?></td>
											<td><?=createDateInvoice('paid_date_to',$paid_date_to)?></td>
										</tr>										
									</table>
								</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td width="126">Amount</td>
                                <td ><table cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="94" height="20" class="normal_text">From</td>
                                    <td width="438" class="normal_text">To</td>
                                  </tr>
                                  <tr>
                                    <td><input name="pay_amount_from" type="text" id="pay_amount_from" value="<?=$pay_amount_from?>" size="10"></td>
                                    <td><input name="pay_amount_to" type="text" id="pay_amount_to" value="<?=$pay_amount_to?>" size="10"></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td valign="top">Employer ID </td>
                                <td valign="top"><span class="comment">
                                  <input name="rec_id" type="text" id="rec_id" value="<?=$rec_id?>">
                                </span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td valign="top">Company Name </td>
                                <td valign="top"><span class="comment">
                                  <input name="comp_name" type="text" id="comp_name" value="<?=$comp_name?>">
                                </span></td>
                              </tr>
                              <tr>
                                <td width="11">&nbsp;</td>
                                <td width="126">&nbsp;</td>
                                <td height="35" valign="middle"><a href="#" onClick="search_payment();"><img src="../../images/search.gif" width="48" height="20" border="0"></a> </td>
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

