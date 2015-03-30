<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	
	$objDb = new db();
	//invoice detail
	$sqlInvoice = "select * from job_rec_invoices where invoice_id = " . $_GET['invoice_id'];
	$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);					
	$rsInvoice = mysql_fetch_object($resultInvoice);
	
	//Payment detail
	$sqlPaid = "select * from job_rec_payments where invoice_id = " . $_GET['invoice_id'];
	$resultPaid = $objDb->ExecuteQuery($sqlPaid);					
	$rsPaid = mysql_fetch_object($resultPaid);
	
	//ototl amt
	$amtpaid=$rsPaid->pay_amount;
	if($rsInvoice->invoice_type==1)
	{
		$totamt=$rsInvoice->rate;
	}
	else if($rsInvoice->invoice_type==2)
	{
		$totamt=($rsInvoice->shortlist_rate_per_position)*($rsInvoice->shortlisted_jobseekers);
	}
	if($amtpaid<$totamt)
	{
		$amtrem=$totamt-$amtpaid;
	}
	else
	{
		$amtrem=0;
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
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Invoice Detail </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Invoice detail of  invoice number :
                                          <span class="blue_title_small"><?=$_GET["invoice_id"]?></span>
                                        . </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><table width="600" border="0" align="left" cellpadding="6" cellspacing="0" >
									   <tr >
									    <td colspan="3" height="10"  ></td>
									  </tr>
									  <tr>
									    <td   >&nbsp;</td>
                                        <td   >Invoice Date </td>
                                        <td   ><span class="<?=$td_class?>">
                                          <?=getDateValue($rsInvoice->invoice_date); ?>
                                        </span></td>
                                      </tr>
									  <tr>
									    <td>&nbsp;</td>
                                        <td valign="top"><? if($rsInvoice->invoice_type==1){ echo("Plan Name");}else if($rsInvoice->invoice_type==2){ echo("No. of shortlisted jobseekers"); }?></td>
                                        <td><span class="<?=$td_class?>">
										 <? if($rsInvoice->invoice_type==1){ echo($rsInvoice->plan_name);}else if($rsInvoice->invoice_type==2){ echo($rsInvoice->shortlisted_jobseekers); }?>
                                         
                                        </span> </td>
                                      </tr>
									  <tr>
									    <td >&nbsp;</td>
									    <td  valign="top">Amount Paid </td>
									    <td ><?=$totamt?></td>
						      </tr>
									  <tr>
									    <td >&nbsp;</td>
                                        <td  valign="top">Amount Remaining</td>
                                        <td ><?=$amtrem?></td>
                                      </tr>
									  
										<tr>
										  <td width="2%" valign="top"   >&nbsp;</td>
											<td width="27%" valign="top"   >&nbsp;</td>
											<td width="71%" height="30" align="left" valign="top"><a href="#" onClick="history.back();"><img src="../../images/back.gif" border="0" style="cursor:pointer" ></a>&nbsp;&nbsp;&nbsp;
										  </td>
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

