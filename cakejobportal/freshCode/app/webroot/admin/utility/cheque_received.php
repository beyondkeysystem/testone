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
	$sqlPaid = "select * from  job_rec_payments where paid_by='Cheque' and pay_status=2  order by pay_id desc";
	
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
		document.form1.action = location + "&url=cheque_received.php&urlPage=<?=$cPage?>";
		document.form1.submit();
	}
	
	function chequeDetails(pay_id)
	{
		document.form1.method="post";	
		document.form1.action = "cheque_detail.php?pay_id=" + pay_id + "&url=cheque_received.php&urlPage=<?=$cPage?>";
		document.form1.submit();
	}
	
	function paging(pageno)
	 {
		 document.form1.method = "post";
		 document.form1.action = "cheque_received.php?cPage=" + pageno;
		 document.form1.submit();
	 }
 
	function submitform()
	{
		var len = document.form1.elements.length;	
		var total=0;
		for(var j = 0; j <=len-1; j++) 
		{
			if(document.form1.elements[j].type == "checkbox")
			{		
				if(document.form1.elements[j].checked==true)
				{
						total++;
				}
				
			}
		}
		if(total==0)
		{
			alert("Please select atleast one cheque which you want to update.");
			return false;
		}
		else
		{
			if(confirm("Are you sure you want to update selected cheque?"))
			{
				document.form1.action="cheque_action.php?link=rec";
				document.form1.method="post";
				document.form1.submit();
			}
		}
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
		 <form name="form1" method="post" >
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
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black">  Received Cheque  List</span></td>
                                <td width="27%" align="right" class="text_gray_bold" >                                  &nbsp;&nbsp;								</td>
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
											A list of all Received cheques.
									</td>
										
                                      </tr>
                                  </table>
										</td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        
                          <tr>
                            <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                            
							  <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
							  <tr>
							  	<td align="center">
								 <table width="95%"  cellpadding="0" cellspacing="0">
									<tr align="left"><td width="15%" ><a href="cheque_list.php" class="blue_title_small">New Cheques</a> </td>
									<td width="19%" ><a href="cheque_received.php" class="blue_title_small">Received Cheques </a></td>
									<td width="14%"  ><a href="cheque_paid.php" class="blue_title_small">Paid Cheques</a></td>
									<td width="52%" ><a href="cheque_bounce.php" class="blue_title_small">Bounce/Not Received</a> </td>
								</table>
								</td>
							  </tr>
							  <?							
								if($rowCount > 0)
								{
								
							?>
 
							  <tr>
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                 
                                  <tr>
                                    <td class="table_head" align="center">#</td>
                                    <td align="left" class="table_head">Cheque No. </td>
                                    <td align="left" class="table_head">Received  Date </td>
                                    <td align="left" class="table_head">Transaction  ID </td>
                                    <td align="left" class="table_head">Invoice ID</td>
                                    <td width="18%" align="left" class="table_head">Recruiter Name </td>
                                    <td align="left" class="table_head">Amount</td>
                                    <td align="left" class="table_head_end">Cheque Status </td>
                                  </tr>
                                  <?
								$i = 1;
								while($rsPaid = mysql_fetch_object($resultPaid))
								{
									$selval=$rsPaid->pay_status;
									
									//for Payment
									$sqlInvoice = "select * from  job_rec_invoices where invoice_id='".$rsPaid->invoice_id."'";
									$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
									$rsInvoice = mysql_fetch_object($resultInvoice);
									//for recruiter
									$sqlRec = "select rec_name,rec_email from  job_recruiter where rec_id='".$rsInvoice->rec_id."'";
									$resultRec = $objDb->ExecuteQuery($sqlRec);
									$rsRec = mysql_fetch_object($resultRec);
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                  <tr>
                                    <td width="4%" class="<?=$td_class?>"><input type="checkbox" name="chk[]" id= "chk" value="<?=$rsPaid->pay_id?>"></td>
                                    <td width="12%" align="left" class="<?=$td_class?>"><a href="#" onClick="chequeDetails(<?=$rsPaid->pay_id?>);"  class="blue_title_small" title="Click to view cheque details."><?=$rsPaid->cheque_number?></a></td>
                                    <td width="13%" align="left" class="<?=$td_class?>"><?=getDateValue($rsPaid->received_date)?></td>
                                    <td width="14%" align="left" class="<?=$td_class?>"><?=sprintf("%05d",$rsPaid->pay_id) ?></td> 
                                    <td width="12%" align="left" class="<?=$td_class?>"><a href="#" onClick="viewDetails('invoice_details.php?invoice_id=<?=$rsPaid->invoice_id?>');" class="paging_text" title="Click to view invoice details.">
                                      <?=sprintf("%05d",$rsPaid->invoice_id)?>
                                    </a></td>
                                    <td align="left"  class="<?=$td_class?>"><a href="#" onClick="viewDetails('../employer/view_profile.php?rec_id=<?=$rsInvoice->rec_id?>');" class="paging_text" title="Click to view employer details.">
                                      <?=$rsRec->rec_name?>
                                    </a></td>
                                    <td width="12%" align="left" class="<?=$td_class?>">N$
                                        <?=number_format($rsPaid->pay_amount,2,'.','')?></td>
                                    <td width="15%" align="left" class="<?=$td_class?>_end"><span class="text_gray_bold">
                                      <select name="st_<?=$rsPaid->pay_id?>"   >
                                        <option value="">Select</option>
                                        <option value="1" >Paid</option>
                                        <option value="3" >Bounce</option>
                                       
                                      </select>
                                    </span>
                                      
                                    </td>
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
                            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="submitform();"  ><img src="../../images/update_admin.gif" border="0" align="absmiddle"></a> <a href="#" onClick="location.href='home.php';"  ><img src="../../images/back.gif" border="0" align="absmiddle"></a></td>
                          </tr>
						  <tr>
						  	<td align="left">
						  	<table width="100%" height="26"  border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
                            <td >
								<table width="100%" cellpadding="2" cellspacing="0">
								  <tr>
									<td width="5%" rowspan="3"><img src="../../images/redcross.gif" align="absmiddle"></td>
									<td width="95%" class="star">No Received Cheques Found.</td>
								  </tr>
								  <tr>
									<td>&nbsp;</td>
								  </tr>
								</table>
							</td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <?
					  	}
					  ?>
					  <? if($rowCount <= 0) {  ?>
						<tr>
                            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="location.href='home.php';"  ><img src="../../images/back.gif" border="0"></a></td>
					    </tr>									
					  <? } ?>  			  
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

