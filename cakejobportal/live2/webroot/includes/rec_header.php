<?php 	$cntShortlisted = 0;
	$remainingShortlist = 0;
	$positions = 0;
	$postExpired=0;
	
	global $objDb;
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
	
	 $sql_prod = "SELECT * FROM job_banner WHERE banner_status=1 ORDER BY banner_id ASC";
        $res_prod = $objDb->ExecuteQuery($sql_prod);
        $numrs = mysql_num_rows($res_prod);
	
	$rec_id = $_SESSION["ses_rec_id"];
	$expired = 1;
	$activated_before = 0;
	$reg_type1 = getFieldValue("job_recruiter","comp_type","rec_id",$_SESSION["ses_rec_id"]);
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
	$current_rate=0;
	$current_rate1=0;
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
			
			$cntShortlisted1= getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date1 . " and i.invoice_id>" . $rsLastInvoice1->invoice_id . " and i.rec_id=" . $_SESSION["ses_rec_id"]);													
						
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
				
				$cntShortlisted = getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date . " and i.invoice_id>" . $rsLastInvoice->invoice_id . " and i.rec_id=" . $_SESSION["ses_rec_id"]);													
							
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
				
				
				$cntShortlisted = getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date . " and i.invoice_id>" . $rsLastInvoice->invoice_id . " and i.rec_id=" . $_SESSION["ses_rec_id"]);													
							
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
					//Add by me start
					$accstatus = 'Active';
				}
				else
				{//Add by me start
					$accstatus = 'Inactive';
				}
			}
			
			// get last payment details for last invoice
			$sqlLastPay = "select * from job_rec_payments p, job_rec_invoices i where i.invoice_id=p.invoice_id and p.pay_status=1 and i.rec_id=" . $rec_id . " and i.invoice_id=" . $rsLastInvoice->invoice_id . " order by p.pay_id desc";
			$resultLastPay = $objDb->ExecuteQuery($sqlLastPay);
			if($rsLastPay = mysql_fetch_object($resultLastPay))
			{					
				//Add by me start
				$lastActivation =date("d M y", strtotime($rsLastPay->pay_date));
				$expDate =	date("d M y",strtotime('+1 month', strtotime($lastActivation)));
				
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
	$sqlLastPostedDate="select * from job_ad where plan_id='".$current_plan_id."' and ad_date>='".$date1."' and ad_date<='".$dd_diffDate."'  and rec_id=".$_SESSION["ses_rec_id"]." order by ad_id desc";
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
	//echo "I_ID=".$in_id."<br>";
	if($current_plan_id!="")
	{
		$sq="select * from job_rec_invoices where invoice_id=".$in_id;
		$resultsq  = $objDb->ExecuteQuery($sq);
		$rs_sq = mysql_fetch_object($resultsq);
		
		
		
		//echo $cnt_additional_job;
		//echo $in_id;
		//echo $rs_sq->number_job;
		if($rs_sq->number_job>0 )
		{
			//echo "ll";
			$cntjob_post = getCount("select * from job_ad where invoice_id=".$in_id." and rec_id='".$_SESSION["ses_rec_id"]."'");
			 $res_cnt_additional_job = $objDb->ExecuteQuery("select sum(additional_job) as add_job from job_rec_invoices where invoice_id>".$in_id." and rec_id='".$_SESSION["ses_rec_id"]."' and invoice_type=5 and invoice_status=1");
			$rs_cnt=mysql_fetch_object($res_cnt_additional_job);
			 $cnt_additional_job=$rs_cnt->add_job;
			  //$jj=$rs_sq->number_job+$rs_sq->remaining_job+$cnt_additional_job;//echo $jj;
			$jj=$rs_sq->number_job+$rs_sq->additional_job;//echo $jj;
			if($cntjob_post>=$jj){ $post_job=-1; } else { $post_job=$jj-$cntjob_post;}
		}
	}
	else
	{
		$post_job=-1;
	}
	if($expired == 1 || $activated_before == 0 )
	{
		$_SESSION["plan_status"]="";
	}
	else if($post_job<0)
	{
		$_SESSION["plan_status"]="";
	}else
	{
		$_SESSION["plan_status"]="1";
	}
		

	//echo "<br>pp=".$post_job;
	$hrfe_Add = "http://".$_SERVER['HTTP_HOST']."/";
?>
<script language="JavaScript" type="text/JavaScript">
<!--
	function checkExpired(expired,rate,postexpire)
	{
		
		//alert(document.getElementById("kk").value);
		
		if(expired == 0 && rate>0 )			
		{
			return true;
		}
		
		else if(expired == 1)
		{
			if (confirm("You have to sign up to one of our payment plans in order to contact jobseekers who are registered with NamRecruit, or to post a job ad."))
			{
				location.href = "pay_plans.php?rec_id=<?=$rec_id?>";
			}
			return false;			
		}
		else if(expired == 2)		
		{
			alert("You can contact jobseekers who are registered with NamRecruit, or post a job ad after the confirmation of your cheque payment.");
			return false;
		}
		else if(expired == 3)		
		{
			alert("You can contact jobseekers who are registered with NamRecruit, or post a job ad after the confirmation of your EFT payment.");
			return false;
		}
		else if(rate==0 && postexpire==1)		
		{
			alert("You have already posted 1 job this month.Now you can post another job in next month.");
			return false;
		}
		
	}
	
	function checkExpired1(expired,rate,postexpire)
	{
		
		//alert(document.getElementById("kk").value);
		if(expired == 0  && document.getElementById("kk").value<0)			
		{
			if(confirm("Sorry, you have already posted all job ads available in your subscription. If you would like to post addiitonal jobs you can purchase additional job ad credits or upgrade your subscription. To purchase additional job ad credits, click OK now. Or to upgrade your subscription, click cancel and then go to Change Plan in View My Account."))
			{
				location.href ="number_jobs.php";
			}
			return false;
		}
		else if(expired == 0  &&  document.getElementById("kk").value>=0)			
		{
			return true;
		}
		
		else if(expired == 1)
		{
			if (confirm("You have to sign up to one of our payment plans in order to contact jobseekers who are registered with NamRecruit, or to post a job ad."))
			{
				location.href = "pay_plans.php?rec_id=<?=$rec_id?>";
			}
			return false;			
		}
		else if(expired == 2)		
		{
			alert("You can contact jobseekers who are registered with NamRecruit, or post a job ad after the confirmation of your cheque payment.");
			return false;
		}
		else if(expired == 3)		
		{
			alert("You can contact jobseekers who are registered with NamRecruit, or post a job ad after the confirmation of your EFT payment.");
			return false;
		}
		else if(rate==0 && postexpire==1)		
		{
			alert("You have already posted 1 job this month.Now you can post another job in next month.");
			return false;
		}
		
	}
	
	function checkLogin(event)
	{
		if (event.keyCode == 13) {
			document.frmLogin.submit();
			
		}
		return;
	}
//-->
</script>

<div id="header">
    <div class="fleft" id="logo"> <a href="#Logo"><img alt="" src="../images/logonew.png"></a> <?php //include("get_lang_icons.php");?></div>
	<div class="clear"></div>
	
    <div id="main-navigation" style="padding-top:5px;">
      <ul id="main-nav">
        <!--<li class="main-nav-item"><a class="main-nav-tab" href="#">Home</a></li>-->
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?=$hrfe_Add?>recruiter/new_rec_profile.php"><?=HEADER_MY_PROFILE?></a>
          <!--<div class="main-nav-dd" style="left: 288px;">
            <div class="main-nav-dd-column">
              <h3> Partners </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Partners 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Partners 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Partners 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?=$hrfe_Add?>recruiter/search_jobseekers.php"><?=HEADER_JOBSEEKER_SEARCH?></a>
          <!--<div class="main-nav-dd" style="left: 288px;">
            <div class="main-nav-dd-column">
              <h3> FAQs </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> FAQs 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> FAQs 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> FAQs 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"> <a class="main-nav-tab" href="<?=$hrfe_Add?>recruiter/job_add_main.php"><?=POST_A_JOB?></a>
          <!--<div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"><a class="main-nav-tab" href="<?=$hrfe_Add?>recruiter/view_my_account.php"><?=HEADER_VIEW_MY_ACCOUNT?></a>
          <!--<div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <li class="main-nav-item"><a href="<?=$hrfe_Add?>recruiter/rec_faq.php" class="main-nav-tab"><?=HEADER_MENU_FAQS?></a>
          <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>
        </li>
    	 <li class="main-nav-item"> <a class="main-nav-tab" href="<?=$hrfe_Add?>recruiter/employer_dashboard.php">Dashboard</a></li>
          <!--<div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>-->
        </li>
        <!--<li class="main-nav-item"><a href="#" class="main-nav-tab">Partners</a>
          <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li class="main-nav-item"><a href="#" class="main-nav-tab">View My Account</a>
          <div class="main-nav-dd">
            <div class="main-nav-dd-column">
              <h3> Contact Us </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
              <hr>
              <h3> Contact Us 2 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 3 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
                <li><a href="#">Link 5</a></li>
                <li><a href="#">Link 6</a></li>
              </ul>
            </div>
            <div class="main-nav-dd-column">
              <h3> Contact Us 4 </h3>
              <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
              </ul>
            </div>
          </div>
        </li>-->
			<li style="padding-left:780px; padding-top:7px;"><?php include("get_lang_icons.php");?></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
