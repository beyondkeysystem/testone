<?

	require_once("../../classes/db_class.php");
	require_once("../../includes/functions1.php");	
	$objDb = new db();
	$sqlRec="select * from job_rec_invoices i,job_recruiter r where i.invoice_id=".$_GET["Iid"]." and r.rec_id=i.rec_id";
	$resultRec = $objDb->ExecuteQuery($sqlRec);
	$rsRec=mysql_fetch_object($resultRec);
	

	if($rsRec->invoice_type==1)
	{
		require_once("includes/accnt_function.php");
	}
	else if($rsRec->invoice_type==5)
	{
		require_once("includes/accnt_upgraded.php");
	}
	
	
	$array["pay_status"]=1;
	$array["pay_date"] = date("Y-m-d");
	$objDb->UpdateData("job_rec_payments",$array,"pay_id",$_GET["pid"]);
	
	
	$array1["invoice_status"]=1;
	$objDb->UpdateData("job_rec_invoices",$array1,"invoice_id",$_GET["Iid"]);
	
	
	//echo $msg."--".$rsRec->rec_status;exit;
	//for  comp type
	$sqlComp="select * from job_rec_payment_plans p,job_rec_invoices i where i.plan_name=p.plan_name and i.invoice_id=".$_GET["Iid"];
	$resultComp = $objDb->ExecuteQuery($sqlComp);
	$rsComp=mysql_fetch_object($resultComp);
	if($rsRec->rec_status==0 && $rsComp->type=="rec")
	{
		$emailto=$rsRec->rec_email;
		$subject="Login information of namrecruit.com";
		$msg="Dear ".$rsRec->rec_name.",<br><br>";
		$msg.="Thank you for registering with NamRecruit. <br><br>";		
		$msg.="Use following information to login namrecruit.com.<br>";
		$msg.="Username : ".$rsRec->rec_email;
		$msg.="<br>Password : ".$rsRec->rec_password; 
		$msg.="<br><br>Regards, <br>NamRecruit.";
		$from = "NamRecruit <info@namrecruit.com>";
		$headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
		@mail($emailto,$subject,$msg,$headers);
	}
	
		$sqlPay = "select * from job_rec_payments where pay_id=" . $_GET["pid"];
		$resultPay = mysql_query($sqlPay);
		$rsPay = mysql_fetch_object($resultPay);
			
		$invoice_no = sprintf("%05d",$_GET["Iid"]);
		$pay_date = getDateValue($rsPay->pay_date);
		
		
		$msg = "";
		$emailto=$rsRec->rec_email;
		$subject="Payment Recieved (Invoice No. " . $invoice_no . ")";
		$msg="Dear ".$rsRec->rec_name.",<br><br>";
		$msg.="Your payment to namrecruit.com for invoice no <u>" . $invoice_no . "</u> was successful. Your account has been updated.<br><br><b>Payment Details : </b><br>";		
		$msg .= "Payment Date : " . $pay_date . "<br>";
		$msg .= "Paid Amount : N$ " . number_format($rsPay->pay_amount,2);		
		$msg.="<br><br>To view/print your invoice details, <a href='http://www.namrecruit.com/recruiter/view_invoice.php?paid_by=" . $rsPay->paid_by . "&vi=" . base64_encode($invoice_no) . "'>click here</a>.";				
		$msg.="<br><br>Regards, <br>NamRecruit.";
		$from = "NamRecruit <info@namrecruit.com>";
		$headers = "From: $from\nContent-Type: text/html; charset=iso-8859-1";
		@mail($emailto,$subject,$msg,$headers);	
	if($rsComp->type=="rec")
	{
		$array_comp["comp_type"]="2";
		
	}
	else
	{
		$array_comp["comp_type"]="1";
	}
	$array_comp["rec_status"] = 1;
	$objDb->UpdateData("job_recruiter",$array_comp,"rec_id",$rsComp->rec_id);
	//end comp type
	
	
	if(isset($_GET["type"]) && $_GET["type"]==1)
	{
		header("location:EFT_list.php");
	}
	else if(isset($_GET["type"]) && $_GET["type"]==2)
	{
		header("location:cheque_list.php");
	}
	
?>
	
	