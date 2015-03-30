<?  session_start();
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	

	$objDb = new db();
	
	$sqlInvoice = "select * from job_rec_invoices where invoice_id=" . $_GET['invoice_id'];
	$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
	$rsInvoice = mysql_fetch_object($resultInvoice);
	
	//for recruiter
	$sqlRec = "select * from job_recruiter where rec_id=".$rsInvoice->rec_id;
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec = mysql_fetch_object($resultRec);
	//end of recruiter
	
	//for payment
	$cnt=mysql_num_rows($resultInvoice);
	$paid = 0;
	if($cnt>0)
	{
		$sqlTotalPay = "select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=" . $_GET['invoice_id'];
		$resultTotalPay = $objDb->ExecuteQuery($sqlTotalPay);
		if($rsTotalPay = mysql_fetch_object($resultTotalPay))
		{
			$paid = $rsTotalPay->pay_sum+$_POST["pay_amount"];
		}
	}
	//for payment
	
	
	
	
	$arr = array();
	$arr['pay_date'] = date("Y-m-d");
	$arr['invoice_id'] = $_GET["invoice_id"];
	$arr['paid_by'] = $_POST['pay_by'];
	$arr['pay_amount'] = $_POST["pay_amount"];	
	$arr['bank'] = $_POST['bank'];		
	$arr['branch'] = $_POST['branch'];	
	
	if($_POST['pay_by'] == "Cheque")
	{
		$arr['cheque_number'] = $_POST['cheque_number'];		
		$arr['cheque_date'] = $_POST['cheque_date'];		
		$arr['bank'] = $_POST['bank'];		
		$arr['branch'] = $_POST['branch'];								
		$arr['pay_status'] = 0;	
	}
	else
	{
		$arr['pay_status'] = 0;	
		$arr['account_number'] = $_POST['account_number'];	
	
	
		
		//for mail
	
		$email="NamRecruit";
		$emailto=$rsRec->rec_email;
		$subject="Payment Successful with NamRecruit.";
		$msg="<html>
			<head>
		<style type='text/css'>
					.table_black_border
					{
						border: 1px solid #000000;
					}

					.table_head
					{
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						font-weight:bold;
						background-color:#DDDAD9;
						color: #333333;
						border:1px;
						border-style:none solid solid none; 
						text-decoration:none;
					}
					
					.table_head_end
					{
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						font-weight:bold;
						background-color:#DDDAD9;
						color: #333333;
						border:1px;
						border-style:none none solid none; 
						text-decoration:none;
					}
					
					.table_row
					{
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						color: #333333;
						border:1px;
						border-style:none solid none none; 
						text-decoration:none;
					}
					
					.table_row_end
					{
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						color: #333333;
						text-decoration:none;
					}
					
					.table_alternate_row
					{
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						background-color:#E6E6E6;
						color: #333333;
						border:1px;
						border-style:none solid none none; 
						text-decoration:none;
					}
					
					.table_alternate_row_end
					{
						font-family:Arial, Helvetica, sans-serif;
						font-size:12px;
						background-color:#E6E6E6;
						color: #333333;
						text-decoration:none;
					}
		</style>
	</head>";
		
		
		$msg.="Dear ".$rsRec->rec_name.",<br><br>";
		$msg.="Your transaction is made successfully by administrator.<br><br>";
		$msg.="Your paid ammount is  N$". $_POST["pay_amount"]."<br><br>";		
		$msg.="Your invoice details are shown below :<br><br>";
		$msg.="
		<table width='95%' cellpadding='6' cellspacing='0' class='table_black_border'>
		  <tr>
			<td class='table_head'>Invoice ID </td>
			<td class='table_head'>Invoice Date</td>
			<td class='table_head'>"; 
			if($rsInvoice->invoice_type==1)
			{ 
			   $msg.="Plan Name"; 
			} else if($rsInvoice->invoice_type==2) { $msg.="Shortlisted Jobseeker"; }
			$msg.="</td>
			<td width='16%' class='table_head' "; 
			
			if($rsInvoice->invoice_type==1){ $msg.="style='display:none;'"; } $msg.=">Rate Per Position</td>
			<td class='table_head'>Amount</td>
			<td class='table_head'>Paid</td>
			<td class='table_head_end'>Remaining</td>
		  </tr> ";
			$i = 1;
			$td_class = 'table_row';
		  $msg.="
		  <tr>
			<td width='11%' class=".$td_class.">".sprintf('%05d',$rsInvoice->invoice_id)."</td>
			<td width='11%' class=".$td_class.">".getDateValue($rsInvoice->invoice_date)."</td>
			<td width='21%' class=".$td_class.">";if($rsInvoice->invoice_type==1){ $msg.=$rsInvoice->plan_name;  } else if($rsInvoice->invoice_type==2) { $msg.=$rsInvoice->shortlisted_jobseekers; } $msg.="&nbsp;</td>
			
			<td class='".$td_class."' "; if($rsInvoice->invoice_type==1){ $msg.="style='display:none;'";} $msg.=">".$rsInvoice->shortlist_rate_per_position ."</td>
			<td width='12%' class='".$td_class."'>N$
				".number_format($rsInvoice->rate,2)."</td>
			<td width='14%' class='".$td_class."'>N$
				".number_format($paid,2)."</td>
			<td width='15%' class='".$td_class."_end'>N$
				".number_format(($rsInvoice->rate - $paid),2)."</td>
		  </tr>
		</table></html>";
		
		 
		$msg.="<br><br>Regards, <br>NamRecruit";
		$from = "NamRecruit <info@namrecruit.com>";
		$headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
		@mail($emailto,$subject,$msg,$headers);
	
	
	
	//end of mail
	}
	$objDb->InsertData("job_rec_payments",$arr);
	header("location:payment_success.php?invoice_id=".$_GET["invoice_id"]);
		
?>