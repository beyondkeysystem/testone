<?  
	$cntShortlisted = 0;
	$remainingShortlist = 0;
	$positions = 0;
	
	require_once("../classes/db_class.php");
	$objDb = new db();
	$sqlSites = "select * from job_top_sites where status=1 limit 0,4";
	$resultSites = $objDb->ExecuteQuery($sqlSites);
	
	$title_class = array("top_brown","top_blue","top_violet","top_green");
	$img = array("brown.gif","blue.gif","violet.gif","green.gif");
	
	$rec_id = $_SESSION["rec_id"];
	$expired = 1;
	$activated_before = 0;
	
	//get last invoice details
	$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.rec_id=" . $rec_id . " and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
	$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
	if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
	{
		$plan_name = $rsLastInvoice->plan_name;
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
			
			$cntShortlisted = getCount("select * from job_shortlisted_jobseekers j, job_rec_invoices i, job_rec_payments p where p.invoice_id=i.invoice_id and i.invoice_id=j.invoice_id and i.invoice_date>=" . $first_pay_date . " and i.invoice_id>" . $rsLastInvoice->invoice_id . " and i.rec_id=" . $_SESSION["rec_id"]);													
						
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
		}
	}
	
?>
<script language="javascript" type="text/javascript">
var howOften = 1; //number often in seconds to rotate
var current = 0; //start the counter at 0
var ns6 = document.getElementById&&!document.all; //detect netscape 6
var items = new Array(); //place your images, text, etc in the array elements here
<?
$jj = 0;
$sr = "";
while($rs = mysql_fetch_object($res_prod)) {
	$sr = 'items['.$jj.']="<a href=\''. $rs->banner_url .'\' target=\'_blank\'><img src=\'upload_banner/'. $rs->banner_image .'\' alt=\''. $rs->banner_title .'\' title=\''. $rs->banner_title .'\' border=\'0\'  ></a>";';
	echo $sr ;
	$jj++;
}
?>
function rotater() {
    if(document.layers) {
        document.placeholderlayer.document.write(items[current]);
        document.placeholderlayer.document.close();
    }
    if(ns6)document.getElementById("placeholderdiv").innerHTML=items[current]
        if(document.all)
            placeholderdiv.innerHTML=items[current];

    current = (current==items.length-1) ? 0 : current + 1; //increment or reset
    setTimeout("rotater()",howOften*5000);
}
window.onload=rotater;
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
	function checkExpired(expired)
	{
		if(expired == 0)			
		{
			return true;
		}
		else if(expired == 1)
		{
			if (confirm("You have to sign up one of our payment plans in order to contact jobseekers who are registered with NamRecruit, or to post a job ad."))
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
<form name="frmLogin" method="post" action="../jobseeker/seeker_login_action.php">
     <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                    <td width="240" rowspan="2" class="whitebgcolor"><a href="../index.php"><img src="../images/logo.gif" alt="logo" width="215" height="121" border="0" /></a></td>
                    <td height="15" valign="top" bgcolor="#FFFFFF"><img src="../images/top_text.gif"></td>
                    <td width="20" rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td width="0" rowspan="2" valign="top" background="../images/line2.gif"></td>                  <td width="10" rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                 <td width="170" rowspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="11" rowspan="2"><img src="../images/top_right.gif" alt="top_right" width="11" height="121" /></td>
               </tr>
               <tr>
                 <td valign="top" bgcolor="#FFFFFF">
				 	<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
					  <?
							$i = 0;
							while($rsSites = mysql_fetch_object($resultSites))
							{
					   ?>
						 <td valign="top" class="whitebgcolor">
							<table cellpadding="0" cellspacing="0" background="../images/big_box.gif" style="background-repeat:no-repeat " width="130" height="75">
								<tr>
								  <td height="3" colspan="4" class="top_brown"></td>
							  </tr>
								<tr>
								  <td></td>
								  <td height="24" colspan="3" valign="top" class="top_brown"><a href="<?=$rsSites->url?>" target="_blank" class="<?=$title_class[$i]?>"><?=$rsSites->title?></a></td>
							  </tr>
								<tr>
								  <td width="7" rowspan="2" class="top_brown"></td>
									<td width="72" rowspan="2" valign="top"><a href="<?=$rsSites->url?>" target="_blank" class="text_gray"><?=$rsSites->desc1?></a></td>
									<td width="40" height="40" valign="middle" background="../images/<?=$img[$i]?>">&nbsp;<a href="<?=$rsSites->url?>" target="_blank" class="big_white"><?=strtolower(substr($rsSites->title,0,1))?></a></td>
									<td width="8" rowspan="2" valign="top">&nbsp;</td>
								</tr>
								<tr>
								  <td valign="top">&nbsp;</td>
							  </tr>
							</table>
						 </td>	
					   <?
							 $i++;
							}
					   ?>							
						</tr>
					</table>
				 </td>
               </tr>
          </table></td>
     </tr>
	 </form>
     <tr>
          <td>
		  	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td background="../images/lnk_right_bg.gif"><img src="../images/link_left.gif" alt="left" width="8" height="42" border="0" /><a href="rec_profile.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../images/my_profile1.gif',1)"><img src="../images/my_profile.gif" alt="My Profile" name="Image4" width="95" height="42" border="0" id="Image4" /></a><a href="search_jobseekers.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../images/jobseeker_search1.gif',1)"><img src="../images/jobseeker_search.gif" alt="Jobseeker Search" name="Image7" width="146" height="42" border="0" id="Image7" /></a><a href="job_add.php" onClick="return checkExpired(<?=$expired?>);" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../images/post_a_job1.gif',1)"><img src="../images/post_a_job.gif" alt="Post a Job" name="Image8" width="100" height="42" border="0" id="Image8" /></a><a href="view_my_account.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../images/view_my_account1.gif',1)"><img src="../images/view_my_account.gif" alt="View my Account" name="Image9" width="140" height="42" border="0" id="Image9" /></a><a href="rec_faq.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','../images/faq1.gif',0)"><img src="../images/faq.gif" alt="FAQs" name="Image5" width="68" height="42" border="0" id="Image5" /></a><a href="rec_logout.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image12','','../images/logout1.gif',1)"><img src="../images/logout.gif" alt="Logout" name="Image12" width="78" height="42" border="0"></a></td>
                      <td width="272" align="right" background="../images/lnk_right_bg.gif" class="text_white">Welcome 
                        <? if(isset($_SESSION["rec_name"])) echo $_SESSION["rec_name"] ?></td>
                      <td width="19" background="../images/lnk_right_bg.gif" align="right"><img src="../images/lnk_right1.gif" width="19" height="42"></td>
                    </tr>
                  </table>
		</td>
	</tr>
