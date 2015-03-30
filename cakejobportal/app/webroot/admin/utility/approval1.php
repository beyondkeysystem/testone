<?  session_start();
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
?>

<?
	$objDb = new db();
	
	$sqlInvoice = "select * from job_rec_invoices where invoice_id=" . $_GET['invoice_id'];
	$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
	$rsInvoice = mysql_fetch_object($resultInvoice);
	
	//for recruiter
	$sqlRec = "select * from job_recruiter where rec_id=".$rsInvoice->rec_id;
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec = mysql_fetch_object($resultRec);
	//end of recruiter
	
	//for plan
	$sqlPlan = "select * from job_rec_payment_plans where plan_id=".$_GET["plan"];
	$resultPlan = $objDb->ExecuteQuery($sqlPlan);
	$rsPlan = mysql_fetch_object($resultPlan);
	
	//end ofor plan 
	
	
	//for previous plan
	$plan_name="";
		
	$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.rec_id='" . $rsRec->rec_id . "' and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
	$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
	$cntPlan=mysql_num_rows($resultLastInvoice);
	if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
	{
		$plan_name = $rsLastInvoice->plan_name;
	}
	else
	{
		$type_plan=" subscribed";
	}
	
	if($plan_name!="" &&  $plan_name==$rsPlan->plan_name)
	{
		$type_plan=" renew";
	}
	else
	{
		$type_plan=" changed";
	}

	//end of previous plan
	
	
	$arr = array();
	$arr['pay_date'] = date("Y-m-d");
	$arr['invoice_id'] = $_GET['invoice_id'];
	$arr['paid_by'] = $_POST['pay_by'];
	//$arr['pay_amount'] = $_POST["pay_amount"];
	
	if($rsInvoice->invoice_type == 2)
		$arr['pay_amount'] = $rsInvoice->shortlist_rate_per_position * $rsInvoice->shortlisted_jobseekers;
	else if($rsInvoice->invoice_type == 1)
		$arr['pay_amount'] = $rsInvoice->rate;	
	
	
	$email="NamRecruit";
	$emailto=$rsRec->rec_email;
	$subject="Plan Subscription Successful with NamRecruit.";
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
	$msg.="Your plan has been ". $type_plan." successfully by administrator.<br><br>";
	
	if($_POST['pay_by'] == "Cheque")
	{
		
		
		$arr['post_to'] = $_POST['post_to'];
		$arr['cheque_number'] = $_POST['cheque_number'];		
		$arr['cheque_date'] = $_POST['cheque_date'];		
		$arr['payable'] = $_POST['payable'];		
	
									
	
	$arr['ref'] = $_POST['ref'];		
	
	$arr['pay_amount'] = $_POST['pay_amount'];	
		$arr['cheque_number'] = $_POST['cheque_number'];		
		$arr['cheque_date'] = $_POST['cheque_date'];		
		$arr['bank'] = $_POST['bank'];		
		$arr['branch'] = $_POST['branch'];								
		$arr['pay_status'] = 0;	
		$msg.="Now your current plan is ".$rsPlan->plan_name.".<br><br>";
		$msg.="It will be affected after your cheque is cleared.<br><br>";
		$msg.="Your cheque details are shown below :<br><br>";
		$msg.="
			<table width='95%' cellpadding='6' cellspacing='0' class='table_black_border'>
			  <tr>
				<td class='table_head'>Cheque Number</td>
				<td class='table_head'>Cheque Date</td>
				<td class='table_head'>Bank Name</td>
				<td class='table_head'>Branch</td>
				<td class='table_head_end'>Cheque Amount</td>
				
			  </tr> ";
				$i = 1;
				$td_class = 'table_row';
			  $msg.="
			  <tr>
				<td width='11%' class=".$td_class.">".$_POST['cheque_number']."</td>
				<td width='11%' class=".$td_class.">".getDateValue($_POST['cheque_date'])."</td>
				<td width='11%' class=".$td_class.">".$_POST['bank']."</td>
				<td width='11%' class=".$td_class.">".$_POST['branch']."</td>
				<td width='11%' class=".$td_class."_end>N$".$_POST['pay_amount']."</td>
			</tr>
			</table>";
		
	}
	else
	{
		//$arr['pay_status'] = 0;	
		$arr['account_number'] = $_POST['account_number'];	
	}
	$arr['bank'] = $_POST['bank'];		
	$arr['branch'] = $_POST['branch'];	
	
	//for mail
		if($rsInvoice->rate==0)
		{
			$msg.="Now your current plan is ".$rsPlan->plan_name.".<br><br>";
		}
		else
		{
		
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
					".number_format($arr['pay_amount'],2)."</td>
				<td width='15%' class='".$td_class."_end'>N$
					".number_format(($rsInvoice->rate - $arr['pay_amount']),2)."</td>
			  </tr>
			</table>";
		 }
		 
		
	
	$msg.="</html>";
	$msg.="<br><br>Regards, <br>NamRecruit";
	$from = "NamRecruit <info@namrecruit.com>";
	$headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
	@mail($emailto,$subject,$msg,$headers);

	//end of mail
	$objDb->InsertData("job_rec_payments",$arr);
	if($_GET["plan"] != "")
		header("location:subscribe_success.php?plan=" . $_GET["plan"]);
		
?>