<?  session_start();

	if(!isset($_SESSION['user_id']))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
	require_once("../../classes/pagination.php");	
	
	$curPage = curPageName();
	
	$objDb = new db();
	$rowCount=0;
	/*if(isset($_GET["type"]) && $_GET["type"]!="All")
	{
		$selval=$_GET["type"];
		$sqlPaid = "select * from  job_rec_payments where paid_by='".$_GET["type"]."' and pay_status=1";
	}	
	else
	{
		$selval="select";
		$sqlPaid = "select * from  job_rec_payments where pay_amount>0 and pay_status=1";
	}*/
	$cntcomp=1;
	$cntrec=1;
	$sqlPaid = "select * from  job_rec_payments where pay_amount>0 and  pay_status=1";
	
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$sqlPaid .= " and invoice_id='".$_POST["invoice_id"]."'";
	}	
	if(isset($_POST["pay_id"]) && $_POST["pay_id"]!="")
	{
		$sqlPaid .= " and pay_id='".$_POST["pay_id"]."'";
	}	
	
	 if(isset($_POST["paid_by"]) && $_POST["paid_by"]!="All")
	{
		$sqlPaid .= " and paid_by='".$_POST["paid_by"]."'";
	}
	if(isset($_POST['paid_date_from_date']) && $_POST['paid_date_from_date'] != '')
	{
		$paid_date_from = $_POST['paid_date_from_year'] . "-" . $_POST['paid_date_from_month'] . "-" . $_POST['paid_date_from_date'];	
		$sqlPaid .= " and 	pay_date>='".$paid_date_from."'";												
	}
	
	if(isset($_POST['paid_date_to_date']) && $_POST['paid_date_to_date'] != '')
	{
		$paid_date_to = $_POST['paid_date_to_year'] . "-" . $_POST['paid_date_to_month'] . "-" . $_POST['paid_date_to_date'];	
		$sqlPaid .= " and pay_date <='".$paid_date_to."'";													
	}	
	
	
	if(isset($_POST['pay_amount_from']) && $_POST['pay_amount_from'] != '')
	{
		
		$sqlPaid .= " and 	pay_amount>='".$_POST['pay_amount_from']."'";												
	}
	
	if(isset($_POST['pay_amount_to']) && $_POST['pay_amount_to'] != '')
	{
		
		$sqlPaid .= " and pay_amount <='".$_POST['pay_amount_to']."'";													
	}	
	if(isset($_POST["rec_id"]) && $_POST["rec_id"]!="")
	{
		$sqlrec="select * from job_recruiter r, job_rec_invoices i,job_rec_payments p where p.invoice_id=i.invoice_id and r.rec_id=i.rec_id and r.rec_uid ='".trim($_POST["rec_id"])."'";
		$resultrec = $objDb->ExecuteQuery($sqlrec);
		
		if(mysql_num_rows($resultrec)>1)
		{
			$sqlSecond="";
			$sqlPaid .= "  and ( ";
			while($rsrec = mysql_fetch_object($resultrec))
			{
				$sqlSecond .= "  invoice_id='".$rsrec->invoice_id."' or";
			}
			$sqlSecond = substr($sqlSecond,0,strlen($sqlSecond)-2) .")";
			$sqlPaid .= $sqlSecond;
		}
		else if($rsrec = mysql_fetch_object($resultrec))
		{
			$sqlPaid .= " and invoice_id='".$rsrec->invoice_id."'";
		}
		if(mysql_num_rows($resultrec)==0)
		{
			$cntrec=0;
		}
	}	
	if(isset($_POST["comp_name"]) && $_POST["comp_name"]!="")
	{
		$sqlcomp="select * from job_recruiter r, job_rec_invoices i,job_rec_payments p where p.invoice_id=i.invoice_id and r.rec_id=i.rec_id and r.comp_name like '%".trim($_POST["comp_name"])."%'";
		$resultcomp= $objDb->ExecuteQuery($sqlcomp);
		
		if(mysql_num_rows($resultcomp)>1)
		{
			$sqlSecondcomp="";
			$sqlPaid .= "  and ( ";
			while($rscomp = mysql_fetch_object($resultcomp))
			{
				$sqlSecondcomp .= "  invoice_id='".$rscomp->invoice_id."' or";
			}
			$sqlSecondcomp = substr($sqlSecondcomp,0,strlen($sqlSecondcomp)-2) .")";
			$sqlPaid .= $sqlSecondcomp;
		}
		else if($rscomp = mysql_fetch_object($resultcomp))
		{
			$sqlPaid .= " and invoice_id='".$rscomp->invoice_id."'";
		}
		if(mysql_num_rows($resultcomp)==0)
		{
			$cntcomp=0;
		}
	}	

	$sqlPaid .= " order by pay_id desc";
	
	$cPage ="" ;
	$cPage = ( isset($_REQUEST['cPage']) ) ? $_REQUEST['cPage'] : '1';
	$baseURL= $_SERVER['PHP_SELF'];
	
	$j = 0;
	if(isset($_REQUEST['cPage']))
	{
		$page = $_REQUEST['cPage'];
		$j=($page-1)*10 ;
	}
		
	$pagination= new gsdPagination($sqlPaid,$cPage,'20',$baseURL);	
	$sqlPaid = $pagination->rQuery;	
	$resultPaid = $objDb->ExecuteQuery($sqlPaid);
	$rowCount = mysql_num_rows($resultPaid);
	
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
<script src="../../javascript/job.js" language="javascript"></script>
<script language="javascript" type="text/javascript">
	function viewDetails(location)
	{
		document.form1.method="post";	
		document.form1.action = location + "&url=payment_list.php&urlPage=<?=$cPage?>";
		document.form1.submit();
	}
	function selectPay(val)
	{
		document.form1.action="payment_list.php?type="+val;
		document.form1.method="post";
		document.form1.submit();
	}
	function paging(pageno)
	 {
		 document.form1.method = "post";
		 document.form1.action = "payment_list.php?cPage=" + pageno;
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
		 <form name="form1" method="post"  >
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
						<td width="950" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                        
						  <tr>
						  	<td>
						  	<table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black"> Payment  List</span></td>
                                <td width="27%" align="right" class="text_gray_bold" >								&nbsp;&nbsp;								</td>
                              </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="7"></td>
                                        <td width="720">
										<table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="698" align="left">
									<? if($rowCount <= 0 || $cntcomp==0 || $cntrec==0 )
										{
											
									?>
									 	<script language="javascript">document.form1.action="search_payment.php?msg=not_found";document.form1.submit();</script>
									<?  
												
										} else { ?>A list of all payments with namrecruit.<? } ?>
									</td>
										
                                      </tr>
                                  </table>
										</td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        <?							
							if($rowCount > 0)
							{
							
						?>
                          <tr>
                            <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                            
							  <tr>
                                <td width="820"><img src="../images/line.gif" width="772"></td>
                              </tr>
 
							  <tr>
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr align="left">
                                      <td class="table_head">Transaction   ID </td>
                                      <td class="table_head"> Transaction Date </td>
                                      <td class="table_head">Invoice ID</td>
                                      <td width="14%" class="table_head">Employer ID</td>
                                      <td width="23%" class="table_head">Company Name </td>
                                      <td class="table_head">Amount</td>
                                      <td class="table_head_end">Paid By </td>
                                    </tr>
                                    <?
								$i = 1;
								while($rsPaid = mysql_fetch_object($resultPaid))
								{
									//for Payment
									$sqlInvoice = "select * from  job_rec_invoices where invoice_id='".$rsPaid->invoice_id."'";
									$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
									$rsInvoice = mysql_fetch_object($resultInvoice);
									//for recruiter
									$sqlRec = "select rec_id, rec_uid, rec_name,comp_name from  job_recruiter where rec_id='".$rsInvoice->rec_id."'";
									$resultRec = $objDb->ExecuteQuery($sqlRec);
									$rsRec = mysql_fetch_object($resultRec);
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr align="left">
                                      <td width="13%" class="<?=$td_class?>"><?=sprintf("%05d",$rsPaid->pay_id); ?>&nbsp;</td>
                                      <td width="15%" class="<?=$td_class?>"><?=getDateValue($rsPaid->pay_date);?>&nbsp;</td>
                                      <td width="12%" class="<?=$td_class?>"><a href="#" onClick="viewDetails('invoice_details.php?invoice_id=<?=$rsPaid->invoice_id?>');" class="paging_text" title="Click to view invoice details."><?=sprintf("%05d",$rsPaid->invoice_id)?></a>&nbsp;</td>
                                      <td  class="<?=$td_class?>"><a href="#" onClick="viewDetails('../employer/view_profile.php?rec_id=<?=$rsInvoice->rec_id?>');" class="paging_text" title="Click to view employer details.">
                                        <?=$rsRec->rec_uid?>
                                      </a>&nbsp;</td>
                                      <td  class="<?=$td_class?>"><a href="#" onClick="viewDetails('../employer/view_profile.php?rec_id=<?=$rsInvoice->rec_id?>');" class="paging_text" title="Click to view employer details."><?=$rsRec->comp_name?></a>&nbsp;</td>
                                      <td width="11%" class="<?=$td_class?>">N$ <?=number_format($rsPaid->pay_amount,2,'.','')?>&nbsp;</td>
                                      <td width="12%" class="<?=$td_class?>_end"><? if($rsPaid->paid_by=="Cheque") {?><?=$rsPaid->paid_by?> <? } else { ?><?=$rsPaid->paid_by?><? }?>&nbsp;</td>
                                    </tr>
                                    <?
									$i++;
								}
							  ?>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
						   <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
						  <tr>
                            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  onClick="location.href='search_payment.php';"><img src="../../images/back.gif" border="0"></a></td>
                          </tr>
						  <tr>
						  	<td align="left">
						  	<table width="90%" height="26"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" class="normal_black"><? if($rowCount>0) echo $pagination->buildNavigation('paging_text');?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="seller_list_paging"></td>
                              </tr>
                            </table>
							</td>
						</tr>
                          <?
					  	}
						else
						{
					  ?>
                          <tr>
                            <td ></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <?
					  	}
					  ?>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
						  
						  
						  	</td>
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

