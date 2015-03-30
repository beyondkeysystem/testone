<?  session_start();

	if(!isset($_SESSION['user_id']))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
	require_once("../../classes/pagination.php");	
	$objDb = new db();
	$rowCount=0;
	
	$cntcomp=1;
	$cntrec=1;
	$sqlInvoice = "select * from  job_rec_invoices where rate>0 ";
	
	if(isset($_POST["invoice_id"]) && $_POST["invoice_id"]!="")
	{
		$sqlInvoice .= " and invoice_id='".$_POST["invoice_id"]."'";
	}	
	
	if(isset($_POST['invoice_date_from_date']) && $_POST['invoice_date_from_date'] != '')
	{
		$invoice_date_from = $_POST['invoice_date_from_year'] . "-" . $_POST['invoice_date_from_month'] . "-" . $_POST['invoice_date_from_date'];	
		$sqlInvoice .= " and 	invoice_date>='".$invoice_date_from."'";												
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
	if(isset($_POST["rec_name"]) && $_POST["rec_name"]!="")
	{
		$sqlrec="select * from job_recruiter r, job_rec_invoices i where r.rec_id=i.rec_id and r.rec_name like '%".trim($_POST["rec_name"])."%'";
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
	function selectPay(val)
	{
		document.form1.action="payment_list.php?type="+val;
		document.form1.method="post";
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
			 <input type="hidden" name="rec_name" value="<? if(isset($_POST['rec_name'])) echo $_POST['rec_name']; ?>"> 		 
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
						  	<td>
						  	<table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black">   Invoice List</span></td>
                                <td width="27%" align="right" class="text_gray_bold" >								&nbsp;&nbsp;								</td>
                              </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">
										<table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">
									<? if($rowCount <= 0 || $cntcomp==0 || $cntrec==0 )
										{
											
									?>
									 	<script language="javascript">document.form1.action="search_payment.php?msg=not_found";document.form1.submit();</script>
									<?  
												
										} else { ?>A list of all invoices with namrecruit.<? } ?>
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
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
 
							  <tr>
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr>
                                      <td class="table_head">Invoice  ID </td>
                                      <td class="table_head">Invoice Date </td>
                                      <td class="table_head">Subject</td>
                                      <td width="14%" class="table_head">Company Name </td>
                                      <td width="15%" class="table_head">Recruiter Name </td>
                                      <td class="table_head">Amount Paid </td>
                                      <td class="table_head_end">Paid By </td>
                                    </tr>
                                    <?
								$i = 1;
								while($rsInvoice = mysql_fetch_object($resultInvoice))
								{
									
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr>
                                      <td width="12%" class="<?=$td_class?>"><?=sprintf("%04d",$rsInvoice->invoice_id); ?></td>
                                      <td width="12%" class="<?=$td_class?>"><?=getDateValue($rsInvoice->invoice_date);?></td>
                                      <td width="12%" class="<?=$td_class?>"><a href="invoice_details.php?invoice_id=<?=$rsInvoice->invoice_id?>" class="paging_text"><?=sprintf("%05d",$rsInvoice->invoice_id)?></a></td>
                                      <td  class="<?=$td_class?>"><a href="../employer/view_profile.php?rec_id=<?=$rsInvoice->invoice_id?>" class="paging_text">
                                        <?=$rsRec->comp_name?>
                                      </a></td>
                                      <td  class="<?=$td_class?>"><a href="../employer/view_profile.php?rec_id=<?=$rsInvoice->rec_id?>" class="paging_text"><?=$rsInvoice->rec_name?></a></td>
                                      <td width="20%" class="<?=$td_class?>">N$ <?=number_format($rsInvoice->pay_amount,2,'.','')?></td>
                                      <td width="15%" class="<?=$td_class?>_end"><? if($rsInvoice->paid_by=="Cheque") {?><a href="cheque_detail.php?pay_id=<?=$rsInvoice->pay_id?>" class="paging_text"><?=$rsInvoice->paid_by?></a> <? } else { ?><?=$rsInvoice->paid_by?><? }?></td>
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
						  	<table width="85%" height="26"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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

