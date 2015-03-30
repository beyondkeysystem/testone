<? 
	
	
	
	$ss_rec="select * from job_rec_invoices where invoice_id=".$_GET["Iid"];
	$result_rec = $objDb->ExecuteQuery($ss_rec);
	$rs_rec=mysql_fetch_object($result_rec);
	
	
	
	$cntShortlisted = 0;
	$remainingShortlist = 0;
	$positions = 0;
	$postExpired=0;
	//require_once("../classes/db_class.php");
	$objDb = new db();
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
	
	
	$rec_id =$rs_rec->rec_id;
	$expired = 1;
	$activated_before = 0;
	$reg_type1 = getFieldValue("job_recruiter","comp_type","rec_id",$rs_rec->rec_id);
	$plan_name="";
	$current_plan_id="";
	/*if($reg_type1=="1")
	{ 
		$path="job_add_1.php";
	}
	else{
		$path="job_add.php";
	}*/
	
	
	//for new invoice
	$cntShortlisted1 = 0;
	$remainingShortlist1 = 0;
	$positions1 = 0;
	$expired1 = 1;
	$activated_before = 0;
	$plan_name_inactive="no";
	$last_posted_date="";
	$in_id="";
	///get last invoice details for inactive plan
	/*$sqlLastInvoice_inactive= "select * from job_rec_invoices i where i.invoice_type=1 and i.invoice_status=0 and i.rec_id=" . $rec_id . "  order by i.invoice_id desc";
	$resultLastInvoice_inactive = $objDb->ExecuteQuery($sqlLastInvoice_inactive);
	if($rsLastInvoice_inactive = mysql_fetch_object($resultLastInvoice_inactive))
	{
		$plan_name_inactive=$rsLastInvoice_inactive->plan_name;
	}*/
	//echo $plan_name_inactive;
	
	
	//get last invoice details
	$sqlLastInvoice1 = "select * from job_rec_invoices i where i.invoice_type=1 and i.invoice_status=1 and i.rec_id=" . $rec_id . " and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
	$resultLastInvoice1 = $objDb->ExecuteQuery($sqlLastInvoice1);
	if($rsLastInvoice1 = mysql_fetch_object($resultLastInvoice1))
	{
		
		$plan_name1 = $rsLastInvoice1->plan_name;
		$current_rate1=$rsLastInvoice1->rate;
		$shortlist_rate_per_position1 = $rsLastInvoice1->rate_per_position;	
		$positions1 = $rsLastInvoice1->positions;  //maximum shortlist positions of plan for shortlisting		
		$remainingShortlist1 = $positions1;		
			
		//get first payment details for last invoice of plan purchased.
		$sqlFirstPay1 = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice1->invoice_id . " and pay_status=1 order by pay_id";
		$resultFirstPay1 = $objDb->ExecuteQuery($sqlFirstPay1);
		if($rsFirstPay1 = mysql_fetch_object($resultFirstPay1))
		{	
			$first_pay_date1 = $rsFirstPay1->pay_date;
			
			//get the shortlisted jobseekers count
			
			$cntShortlisted1= getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date1 . " and i.invoice_id>" . $rsLastInvoice1->invoice_id . " and i.rec_id=".$rec_id);													
						
			//get the remaining shortlistings
			$remainingShortlist1 = $positions1 - $cntShortlisted1;
					
			//check account expired or not		
			$activated_before1 = 1;
			$date21 = date("Y-m-d");
			$date11 = $rsFirstPay1->pay_date;
			
			$difference1 = abs(strtotime($date21) - strtotime($date11));
			//calculate the number of days
			$days1 = round(((($difference1/60)/60)/24), 0);
			
			if($days1 <= 30)
			{
				$expired1 = 0; 	
			}
		}
		
		// get last payment details for last invoice
		$sqlLastPay1 = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.pay_status=1 and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice1->invoice_id . " order by p.pay_id desc";
		$resultLastPay1 = $objDb->ExecuteQuery($sqlLastPay1);
		if($rsLastPay1 = mysql_fetch_object($resultLastPay1))
		{				
			if($rsLastInvoice1->rate > 0)
				$subscription1 = "paid";				
			else
				$subscription1 = "free";									
		}
		else
		{
			// check for cheque payment
			$sqlLastPay1 = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.paid_by='Cheque' and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice1->invoice_id . " order by p.pay_id desc";
			$resultLastPay1 = $objDb->ExecuteQuery($sqlLastPay1);
			if($rsLastPay1 = mysql_fetch_object($resultLastPay1))
			{				
				if($rsLastPay1->pay_status == 0)
				{
					$expired1 = 2; //new cheque
				}
			}		
			// check for cheque payment
			$sqlLastPayEft1 = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.paid_by='EFT' and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice1->invoice_id . " order by p.pay_id desc";
			$resultLastPayEft1  = $objDb->ExecuteQuery($sqlLastPayEft1 );
			if($rsLastPayEft1  = mysql_fetch_object($resultLastPayEft1 ))
			{				
				if($rsLastPayEft1 ->pay_status == 0)
				{
					$expired1 = 3; //new cheque
				}
			}		
			
		}
	}
	if($expired1==2 || $expired1==3)
	{
		$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.invoice_status=1 and i.rec_id=" . $rec_id . " and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
		$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
		$rsLastInvoice = mysql_fetch_object($resultLastInvoice);
		if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
		{
			$in_id=$rsLastInvoice->invoice_id;
			$plan_name = $rsLastInvoice->plan_name;
			$current_rate=$rsLastInvoice->rate;
			$shortlist_rate_per_position = $rsLastInvoice->rate_per_position;	
			$positions = $rsLastInvoice->positions;  //maximum shortlist positions of plan for shortlisting		
			$remainingShortlist = $positions;		
				
			//get first payment details for last invoice of plan purchased.
			$sqlFirstPay = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice->invoice_id . " and pay_status=1 order by pay_id";
			$resultFirstPay = $objDb->ExecuteQuery($sqlFirstPay);
			if($rsFirstPay = mysql_fetch_object($resultFirstPay))
			{	
				$first_pay_date = $rsFirstPay->pay_date;
				
				//get the shortlisted jobseekers count
				
				$cntShortlisted = getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date . " and i.invoice_id>" . $rsLastInvoice->invoice_id . " and i.rec_id=" . $rec_id);													
							
				//get the remaining shortlistings
				$remainingShortlist = $positions - $cntShortlisted;
						
				//check account expired or not		
				$activated_before = 1;
				$date2 = date("Y-m-d");
				$date1 = $rsFirstPay->pay_date;
				
				$difference = abs(strtotime($date2) - strtotime($date1));
				//calculate the number of days
				$days = round(((($difference/60)/60)/24), 0);
				
				if($days <= 30)
				{
					$expired = 0; 	
				}
			}
			
			// get last payment details for last invoice
			$sqlLastPay = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.pay_status=1 and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
			$resultLastPay = $objDb->ExecuteQuery($sqlLastPay);
			if($rsLastPay = mysql_fetch_object($resultLastPay))
			{				
				if($rsLastInvoice->rate > 0)
					$subscription = "paid";				
				else
					$subscription = "free";									
			}
			else
			{
				// check for cheque payment
				$sqlLastPay = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.paid_by='Cheque' and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
				$resultLastPay = $objDb->ExecuteQuery($sqlLastPay);
				if($rsLastPay = mysql_fetch_object($resultLastPay))
				{				
					if($rsLastPay->pay_status == 0)
					{
						$expired = 2; //new cheque
					}
				}		
				// check for cheque payment
				$sqlLastPayEft = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.paid_by='EFT' and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
				$resultLastPayEft  = $objDb->ExecuteQuery($sqlLastPayEft );
				if($rsLastPayEft  = mysql_fetch_object($resultLastPayEft ))
				{				
					if($rsLastPayEft ->pay_status == 0)
					{
						$expired = 3; //new cheque
					}
				}		
				
			}
		}
	}
	else
	{
		$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.invoice_status=1 and  i.rec_id=" . $rec_id . " and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
		$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
		if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
		{
			$in_id=$rsLastInvoice->invoice_id;
			$plan_name = $rsLastInvoice->plan_name;
			$current_rate=$rsLastInvoice->rate;
			$shortlist_rate_per_position = $rsLastInvoice->rate_per_position;	
			$positions = $rsLastInvoice->positions;  //maximum shortlist positions of plan for shortlisting		
			$remainingShortlist = $positions;		
				
			//get first payment details for last invoice of plan purchased.
			$sqlFirstPay = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice->invoice_id . " and pay_status=1 order by pay_id";
			$resultFirstPay = $objDb->ExecuteQuery($sqlFirstPay);
			if($rsFirstPay = mysql_fetch_object($resultFirstPay))
			{	
				$first_pay_date = $rsFirstPay->pay_date;
				
				//get the shortlisted jobseekers count
				
				$cntShortlisted = getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date . " and i.invoice_id>" . $rsLastInvoice->invoice_id . " and i.rec_id=" . $rec_id);													
							
				//get the remaining shortlistings
				$remainingShortlist = $positions - $cntShortlisted;
						
				//check account expired or not		
				$activated_before = 1;
				$date2 = date("Y-m-d");
				$date1 = $rsFirstPay->pay_date;
				
				$difference = abs(strtotime($date2) - strtotime($date1));
				//calculate the number of days
				$days = round(((($difference/60)/60)/24), 0);
				
				if($days <= 30)
				{
					$expired = 0; 	
				}
			}
			
			// get last payment details for last invoice
			$sqlLastPay = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.pay_status=1 and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
			$resultLastPay = $objDb->ExecuteQuery($sqlLastPay);
			if($rsLastPay = mysql_fetch_object($resultLastPay))
			{				
				if($rsLastInvoice->rate > 0)
					$subscription = "paid";				
				else
					$subscription = "free";									
			}
			else
			{
				// check for cheque payment
				$sqlLastPay = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.paid_by='Cheque' and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
				$resultLastPay = $objDb->ExecuteQuery($sqlLastPay);
				if($rsLastPay = mysql_fetch_object($resultLastPay))
				{				
					if($rsLastPay->pay_status == 0)
					{
						$expired = 2; //new cheque
					}
				}		
				// check for cheque payment
				$sqlLastPayEft = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.paid_by='EFT' and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
				$resultLastPayEft  = $objDb->ExecuteQuery($sqlLastPayEft );
				if($rsLastPayEft  = mysql_fetch_object($resultLastPayEft ))
				{				
					if($rsLastPayEft ->pay_status == 0)
					{
						$expired = 3; //new cheque
					}
				}		
				
			}
		}
	
	}
	
	//for plan id
	
		$sqlplanid="select * from job_rec_payment_plans where plan_name='".$plan_name."'";
		$resultplanid  = $objDb->ExecuteQuery($sqlplanid);
		$rsplanid  = mysql_fetch_object($resultplanid);
		$current_plan_id=$rsplanid->plan_id;
	
		//echo $current_plan_id;
	//end plan id
	
	$dd_diffDate=date("Y-m-d",strtotime("$date1+30 day"));
	$sqlLastPostedDate="select * from job_ad where plan_id='".$current_plan_id."' and ad_date>='".$date1."' and ad_date<='".$dd_diffDate."'  and rec_id=".$rec_id." order by ad_id desc";
	$resultLastPostedDate  = $objDb->ExecuteQuery($sqlLastPostedDate);
	
	if($rsLastPostedDate = mysql_fetch_object($resultLastPostedDate))
	{
		$postExpired=1;
	}
	else
	{
		$postExpired=0;
	}
	$post_job=0;
	//echo $current_plan_id;
	//echo $in_id;
	if($current_plan_id!="")
	{
		
		//echo "ll";
		$sq="select * from job_rec_invoices where invoice_id=".$in_id;
		$resultsq  = $objDb->ExecuteQuery($sq);
		$rs_sq = mysql_fetch_object($resultsq);
		
		//for extra jobs
		$sql_extra="select * from job_rec_invoices where invoice_id=".$_GET["Iid"]; 
		$result_extra  = $objDb->ExecuteQuery($sql_extra);
		$rs_extra  = mysql_fetch_object($result_extra);
		$arr_remain["additional_job"]=$rs_sq->additional_job+$rs_extra->additional_job;
		$objDb->UpdateData("job_rec_invoices",$arr_remain,"invoice_id",$in_id);
		//print_r($arr_remain);exit;
		/*
		$resultplanid_next  = $objDb->ExecuteQuery($sqlplanid_next);
		$rsplanid_next  = mysql_fetch_object($resultplanid_next);
		$current_plan_id_next=$rsplanid_next->plan_id;
		
		//end of extra job
		
		
		//for next plan
		$sqlplanid_next="select * from job_rec_payment_plans p,job_rec_invoices i where p.plan_name=i.plan_name and invoice_id=".$_GET["Iid"]; 
		$resultplanid_next  = $objDb->ExecuteQuery($sqlplanid_next);
		$rsplanid_next  = mysql_fetch_object($resultplanid_next);
		$current_plan_id_next=$rsplanid_next->plan_id;
		
		
		//end of next plan
		if($rs_sq->number_job>0 && $rsplanid_next->number_job>0 )
		{
			//echo "ll";
			//echo $rs_sq->remaining_job;
			//if($rs_sq->rate<=$rsplanid_next->rate)
			//{
				
				$cntjob_post = getCount("select * from job_ad where invoice_id=".$in_id." and rec_id='".$rs_sq->rec_id."'");
				 $res_cnt_additional_job = $objDb->ExecuteQuery("select sum(additional_job) as add_job from job_rec_invoices where invoice_id>".$in_id." and rec_id='".$rs_sq->rec_id."' and invoice_type=5 and invoice_status=1");
				$rs_cnt=mysql_fetch_object($res_cnt_additional_job);
				$cnt_additional_job=$rs_cnt->add_job;
				if($rs_sq->additional_job>$rs_sq->number_job+$rs_sq->additional_job-$cntjob_post)
				{
					$arr_remain["additional_job"]=$rs_sq->additional_job;
					$objDb->UpdateData("job_rec_invoices",$arr_remain,"invoice_id",$_GET["Iid"]);
				}
				else
				{
					$arr_remain["additional_job"]=$rs_sq->number_job+$rs_sq->additional_job-$cntjob_post;
					$objDb->UpdateData("job_rec_invoices",$arr_remain,"invoice_id",$_GET["Iid"]);
				
				}
				
				
				
				
				/*$jj=$rs_sq->number_job+$rs_sq->remaining_job+$cnt_additional_job;//echo $jj;
				if($cntjob_post>=$jj){ $post_job=-1; } else { $post_job=$jj-$cntjob_post;}
				if($post_job==$jj)
				{
					//echo "kk";
					$arr_remain["remaining_job"]=$rs_sq->additional_job+$rs_sq->remaining_job+$cnt_additional_job;
					$objDb->UpdateData("job_rec_invoices",$arr_remain,"invoice_id",$_GET["Iid"]);
				}
				else if($post_job==($rs_sq->number_job-$rs_sq->additional_job))
				{
				
					$arr_remain["remaining_job"]=$rs_sq->additional_job+$rs_sq->remaining_job+$cnt_additional_job;
					$objDb->UpdateData("job_rec_invoices",$arr_remain,"invoice_id",$_GET["Iid"]);
				}
				else if($post_job>($rs_sq->number_job-$rs_sq->additional_job))
				{
						
					$arr_remain["remaining_job"]=$cntjob_post-($rs_sq->remaining_job+$cnt_additional_job+$rs_sq->additional_job);
					$objDb->UpdateData("job_rec_invoices",$arr_remain,"invoice_id",$_GET["Iid"]);
				}*/
				
				
			//}
		//}
	}
	else
	{
		$post_job=-1;
	}
	//echo $post_job;
	//exit;
	
?>