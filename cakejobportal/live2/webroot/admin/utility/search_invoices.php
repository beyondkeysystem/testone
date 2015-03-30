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
	$payment_type='';
	$selval = 'All';
	$invoice_date_from = '';
	$invoice_date_to = '';
	$pay_amount_from = '';
	$pay_amount_to='';
	$rec_id='';
	$comp_name='';
	
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$invoice_id = $_POST["invoice_id"];
	} 
	
	if(isset($_POST["payment_type"]) && $_POST["payment_type"]!="")
	{
		$selval = $_POST["payment_type"];
	} 
	if(isset($_POST["invoice_type"]) && $_POST["invoice_type"]!="")
	{
		$invoice_type = $_POST["invoice_type"];
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
	
	
	$invoice_date_from_date=0;
	$invoice_date_from_month=0;
	$invoice_date_from_year=0;
	if(isset($_POST["invoice_date_from_date"]))
	{
		$invoice_date_from_date=$_POST["invoice_date_from_date"];
	}
	if(isset($_POST["invoice_date_from_month"]))
	{
		$invoice_date_from_month=$_POST["invoice_date_from_month"];
	}
	if(isset($_POST["invoice_date_from_year"]))
	{
		$invoice_date_from_year=$_POST["invoice_date_from_year"];
	}
	$invoice_date_from=$invoice_date_from_year."-".$invoice_date_from_month."-".$invoice_date_from_date;
	
	$invoice_date_to_date=0;
	$invoice_date_to_month=0;
	$invoice_date_to_year=0;
	if(isset($_POST["invoice_date_to_date"]))
	{
		$invoice_date_to_date=$_POST["invoice_date_to_date"];
	}
	if(isset($_POST["invoice_date_to_month"]))
	{
		$invoice_date_to_month=$_POST["invoice_date_to_month"];
	}
	if(isset($_POST["invoice_date_to_year"]))
	{
		$invoice_date_to_year=$_POST["invoice_date_to_year"];
	}
	$invoice_date_to=$invoice_date_to_year."-".$invoice_date_to_month."-".$invoice_date_to_date;
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
 function search_invoice()
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
		 <form name="form1" method="post" action="invoice_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Invoice</td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Search for the invoices with recruit young agency.</td>
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
                                      <td width="95%" class="star">No Invoice Found. </td>
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
                                <td width="603" class="comment"><input name="invoice_id" type="text" id="invoice_id" value="<?=$invoice_id?>" size="19"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Invoice Type </td>
                                <td ><select name="invoice_type" id="invoice_type">
                                    <option value="1,2" <? if($invoice_type=="1,2"){ echo("selected"); } ?> >All</option>
                                    <option value="1" <? if($invoice_type=="1"){ echo("selected"); } ?> >Plan Subscription</option>
                                    <option value="2" <? if($invoice_type=="2"){ echo("selected"); } ?> >Shortlisting</option>
                                </select></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td valign="top">Invoice Date </td>
                                <td valign="top" ><table cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="222" height="20" class="normal_text">From</td>
                                      <td width="310" class="normal_text">To</td>
                                    </tr>
                                    <tr>
                                      <td><?=createDateInvoice('invoice_date_from',$invoice_date_from)?></td>
                                      <td><?=createDateInvoice('invoice_date_to',$invoice_date_to)?></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Pay Status </td>
                                <td ><select name="payment_type">
								<option value="All" <? if($selval=="All"){ echo("selected"); } ?> >All</option>
								<option value="complete" <? if($selval=="complete"){ echo("selected"); } ?> >Complete</option>
								<option value="incomplete" <? if($selval=="incomplete"){ echo("selected"); } ?> >Incomplete</option>
                                </select></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td width="126" valign="top">Amount</td>
                                <td ><table cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="90" height="20" class="normal_text">From</td>
                                      <td width="442" class="normal_text">To</td>
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
                                <td height="35" valign="middle"> <a href="#" onClick="search_invoice();"><img src="../../images/search.gif" width="48" height="20" border="0" align="absmiddle"></a></td>
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

