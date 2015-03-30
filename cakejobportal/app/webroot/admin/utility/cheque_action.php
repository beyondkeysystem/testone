<? session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
	$objDb = new db();
	for($i=0;$i<count($_POST["chk"]);$i++)
	{

		$array=array();
		$status="st_".$_POST['chk'][$i];
		if($_POST[$status]!="")
		{
			$array["pay_status"] = $_POST[$status];
			if(isset($_GET["link"]) && $_GET["link"]=="new")
			{
				if($array["pay_status"]=="2")
				{
					$array["received_date"] = date("Y-m-d");
				}
				else if($array["pay_status"]=="4")
				{
					$array["bounce_date"] = date("Y-m-d");
				}
				$objDb->UpdateData("job_rec_payments",$array,"pay_id",$_POST['chk'][$i]);
			}
			else if(isset($_GET["link"]) && $_GET["link"]=="rec")
			{
				if($array["pay_status"]=="1")
				{	
					$objDb->UpdateData("job_rec_payments",$array,"pay_id",$_POST['chk'][$i]);
					$array["pay_date"] = date("Y-m-d");
					$sqlInvoice = "select * from job_rec_invoices i,job_rec_payments p where i.invoice_id=p.invoice_id and p.pay_id=".$_POST['chk'][$i];
					$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
					$rsInvoice = mysql_fetch_object($resultInvoice);
					
					//for recruiter
					$sqlRec = "select * from job_recruiter where rec_id=".$rsInvoice->rec_id;
					$resultRec = $objDb->ExecuteQuery($sqlRec);
					$rsRec = mysql_fetch_object($resultRec);
					//end of recruiter
					
					//for cheque
					$sqlCheque = "select * from job_rec_payments where pay_id=".$_POST['chk'][$i];
					$resultCheque = $objDb->ExecuteQuery($sqlCheque);
					$rsCheque = mysql_fetch_object($resultCheque);
					//end of cheque detail
					
					//for payment
					$cnt=mysql_num_rows($resultInvoice);
					$paid = 0;
					if($cnt>0)
					{
						$sqlTotalPay = "select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=" .$rsInvoice->invoice_id;
						$resultTotalPay = $objDb->ExecuteQuery($sqlTotalPay);
						if($rsTotalPay = mysql_fetch_object($resultTotalPay))
						{
							$paid = $rsTotalPay->pay_sum;
						}
					}
				 //for payment
				 
				 
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
				$msg.="Your cheque is cleared successfully.<br><br>";
				
				//for cheque
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
						
						$td_class = 'table_row';
					  $msg.="
					  <tr>
						<td width='11%' class=".$td_class.">".$rsCheque->cheque_number."</td>
						<td width='11%' class=".$td_class.">".getDateValue($rsCheque->cheque_date)."</td>
						<td width='11%' class=".$td_class.">".$rsCheque->bank."</td>
						<td width='11%' class=".$td_class.">".$rsCheque->branch."</td>
						<td width='11%' class=".$td_class."_end>N$".$rsCheque->pay_amount."</td>
					</tr>
					</table><br><br>";
					
					//end for cheque
				
				$msg.="Invoice details :<br><br>";
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
				}
				else if($array["pay_status"]=="3")
				{
					$array["bounce_date"] = date("Y-m-d");
					$objDb->UpdateData("job_rec_payments",$array,"pay_id",$_POST['chk'][$i]);
					$array["pay_date"] = date("Y-m-d");
					$sqlInvoice = "select * from job_rec_invoices i,job_rec_payments p where i.invoice_id=p.invoice_id and p.pay_id=".$_POST['chk'][$i];
					$resultInvoice = $objDb->ExecuteQuery($sqlInvoice);
					$rsInvoice = mysql_fetch_object($resultInvoice);
					
					//for recruiter
					$sqlRec = "select * from job_recruiter where rec_id=".$rsInvoice->rec_id;
					$resultRec = $objDb->ExecuteQuery($sqlRec);
					$rsRec = mysql_fetch_object($resultRec);
					//end of recruiter
					
					//for cheque
					$sqlCheque = "select * from job_rec_payments where pay_id=".$_POST['chk'][$i];
					$resultCheque = $objDb->ExecuteQuery($sqlCheque);
					$rsCheque = mysql_fetch_object($resultCheque);
					//end of cheque detail
					
					//for payment
					$cnt=mysql_num_rows($resultInvoice);
					$paid = 0;
					if($cnt>0)
					{
						$sqlTotalPay = "select sum(pay_amount) as pay_sum from job_rec_payments where pay_status=1 and invoice_id=" .$rsInvoice->invoice_id;
						$resultTotalPay = $objDb->ExecuteQuery($sqlTotalPay);
						if($rsTotalPay = mysql_fetch_object($resultTotalPay))
						{
							$paid = $rsTotalPay->pay_sum;
						}
					}
				 //for payment
				 
				 
				 $email="NamRecruit";
				$emailto=$rsRec->rec_email;
				
				$subject="Your cheque is bounced.";
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
				$msg.="Your cheque is bounced.<br><br>";
				
				//for cheque
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
						
						$td_class = 'table_row';
					  $msg.="
					  <tr>
						<td width='11%' class=".$td_class.">".$rsCheque->cheque_number."</td>
						<td width='11%' class=".$td_class.">".getDateValue($rsCheque->cheque_date)."</td>
						<td width='11%' class=".$td_class.">".$rsCheque->bank."</td>
						<td width='11%' class=".$td_class.">".$rsCheque->branch."</td>
						<td width='11%' class=".$td_class."_end>N$".$rsCheque->pay_amount."</td>
					</tr>
					</table><br>";
					
					//end for cheque
					$msg.="<br><b>Please send us another cheque as soon as possible.</b>";
					$msg.="<br><br>Regards, <br>NamRecruit";
					$from = "NamRecruit <info@namrecruit.com>";
					$headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
					
					@mail($emailto,$subject,$msg,$headers);
				
					
					
				}
			}
			
			
		}
	}
	if(isset($_GET["link"]) && $_GET["link"]=="new")
	{
		header("location:cheque_list.php?msg=edit");
	}
	else if(isset($_GET["link"]) && $_GET["link"]=="rec")
	{
		header("location:cheque_received.php?msg=edit");
	}
?>