<?php  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: index.php"); exit();
	}
	require_once("../classes/db_class.php");
	require_once("../classes/pagination.php");	
	require_once("../includes/functions.php");	
	$objDb = new db();
	
	$rec_count = getCount("select * from job_recruiter");
	$unexpired_rec_count = getCount("select * from job_recruiter r, job_rec_invoices i, job_rec_payments p where i.invoice_id=p.invoice_id and r.rec_id=i.rec_id and i.invoice_id=(select max(li.invoice_id) from job_rec_invoices li where li.invoice_type=1 and li.rec_id=r.rec_id and (select count(*) from job_rec_payments where invoice_id=li.invoice_id)>0) and p.pay_id=(select min(pay_id) from job_rec_payments where pay_status=1 and invoice_id=i.invoice_id and day('" . date("Y-m-d") . "')-day(pay_date)<=30)");	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../styles/job.css">
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
<script src="../javascript/admin.js" language="javascript"></script>
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
		 <form name="form1" method="post" action="employers_list.php">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Home</td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">Summary of the total number of employers, jobseekers and posted jobs appears below. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
						  
                          <tr>
                            <td align="left"><table width="800" cellpadding="5" cellspacing="0">
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" class="subhead_gray_small">Jobseekers</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of jobseekers </td>
                                <td>:
								<? $total_seekers = getCount("select * from job_jobseeker"); ?>
								 <a href="seekers/seeker_list.php?seeker_status=1,0" class="text_link" title="Total number of jobseekers" <? if($total_seekers <= 0) echo "OnClick='alert(\"There are no seekers.\"); return false;'" ?>>
									<?=number_format($total_seekers)?></a>
							    </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of active jobseekers </td>
                                <td>:
								<? $active_seekers = getCount("select * from job_jobseeker where seeker_status=1"); ?>								
								 <a href="seekers/seeker_list.php?seeker_status=1" class="text_link" title="Total number of active jobseekers" <? if($active_seekers <= 0) echo "OnClick='alert(\"There are no active seekers.\"); return false;'" ?>>
                                  <?=number_format($active_seekers)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of in-active jobseekers </td>
                                <td>:
								<? $in_active_seekers = getCount("select * from job_jobseeker where seeker_status=0"); ?>
								 <a href="seekers/seeker_list.php?seeker_status=0" class="text_link" title="Total number of in-active jobseekers" <? if($in_active_seekers <= 0) echo "OnClick='alert(\"There are no in-active seekers.\"); return false;'" ?>>
                                  <?=number_format($in_active_seekers)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" class="subhead_gray_small">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" class="subhead_gray_small">Employers</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of employers </td>
                                <td>:
								 <a href="employer/employers_list.php?rec_status=1,0" class="text_link" title="Total number of employers" <? if($rec_count <= 0) echo "OnClick='alert(\"There are no employers.\"); return false;'" ?>>
                                  <?=number_format($rec_count)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of active employers </td>
                                <td>:
								<? $active_emp = getCount("select * from job_recruiter where rec_status=1"); ?>
								 <a href="employer/employers_list.php?rec_status=1" class="text_link" title="Total number of active employers" <? if($active_emp <= 0) echo "OnClick='alert(\"There are no active employers.\"); return false;'" ?>>
                                  <?=number_format($active_emp)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of in-active employers </td>
                                <td>: 
								<? $in_active_emp = getCount("select * from job_recruiter where rec_status=0"); ?>
								<a href="employer/employers_list.php?rec_status=0" class="text_link" title="Total number of in-active employers" <? if($in_active_emp <= 0) echo "OnClick='alert(\"There are no in-active employers.\"); return false;'" ?>>
                                  <?=number_format($in_active_emp)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of un-expired employers </td>
                                <td>: <a href="employer/employers_list.php?expire_status=0" class="text_link" title="Total number of un-expired employers" <? if($unexpired_rec_count <= 0) echo "OnClick='alert(\"There are no un-expired employers.\"); return false;'" ?>>
                                  <?=number_format($unexpired_rec_count)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of expired employers </td>
                                <td>:
								<? if($rec_count > $unexpired_rec_count) $expired_rec_count = $rec_count - $unexpired_rec_count; else $expired_rec_count = $unexpired_rec_count - $rec_count; ?>
								 <a href="employer/employers_list.php?expire_status=1" class="text_link" title="Total number of expired employers" <? if($expired_rec_count <= 0) echo "OnClick='alert(\"There are no expired employers.\"); return false;'" ?>>
                                   <?=number_format($expired_rec_count)?>
                                </a></td>
                              </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="2" class="subhead_gray_small">&nbsp;</td>
                                </tr>
                                <tr>
                                <td width="2">&nbsp;</td>
                                <td colspan="2" class="subhead_gray_small">Jobs</td>
                              </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of jobs  </td>
								  
                                  <td>: 
								  <? $total_jobs = getCount("select * from job_ad"); ?>
								  <a href="job/job_search_result.php?job_status=1,0" class="text_link" title="Total number of jobs" <? if($total_jobs <= 0) echo "OnClick='alert(\"There are no jobs.\"); return false;'" ?>>
                                  <?=number_format($total_jobs)?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of active jobs </td>
                                  <td>:
								  <? $active_jobs = getCount("select * from job_ad where job_status=1"); ?>
								   <a href="job/job_search_result.php?job_status=1" class="text_link" title="Total number of active jobs" <? if($active_jobs <= 0) echo "OnClick='alert(\"There are no active jobs.\"); return false;'" ?>>
                                    <?=number_format($active_jobs)?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of in-active jobs </td>
                                  <td>:
								  <? $in_active_jobs = getCount("select * from job_ad where job_status=0"); ?>
								   <a href="job/job_search_result.php?job_status=0" class="text_link" title="Total number of in-active jobs" <? if($in_active_jobs <= 0) echo "OnClick='alert(\"There are no in-active jobs.\"); return false;'" ?>>
                                    <?=number_format($in_active_jobs)?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of un-expired jobs </td>
                                  <td>:
								  <? $un_expired_jobs = getCount("select * from job_ad where adFrom<='" . date("Y-m-d") . "' and adTo>='" . date("Y-m-d") . "'"); ?>
								   <a href="job/job_search_result.php?expire_status=0" class="text_link" title="Total number of un-expired jobs" <? if($un_expired_jobs <= 0) echo "OnClick='alert(\"There are no un-expired jobs.\"); return false;'" ?>>
                                    <?=number_format($un_expired_jobs)?>
                                  </a></td>
                                </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td width="327">Total number of expired jobs </td>
                                <td width="439">:
								<? $expired_jobs = getCount("select * from job_ad where adFrom>='" . date("Y-m-d") . "' or adTo<='" . date("Y-m-d") . "'"); ?>
								 <a href="job/job_search_result.php?expire_status=1" class="text_link" title="Total number of expired jobs" <? if($expired_jobs <= 0) echo "OnClick='alert(\"There are no expired jobs.\"); return false;'" ?>>
                                  <?=number_format($expired_jobs)?>
                                </a></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="30"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
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

