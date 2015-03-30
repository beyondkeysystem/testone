<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: index.php"); exit();
	}
	require_once("../classes/db_class.php");
	require_once("../classes/pagination.php");	
	require_once("../includes/functions.php");	
	$objDb = new db();
	
	$rec_count = getCount("select * from job_recruiter");
	$expired_rec_count = getCount("select * from job_recruiter r, job_rec_invoices i, job_rec_payments p where i.invoice_id=p.invoice_id and r.rec_id=i.rec_id and i.invoice_id=(select max(invoice_id) from job_rec_invoices where invoice_type=1 and rec_id=r.rec_id) and p.pay_id=(select min(pay_id) from job_rec_payments where pay_status=1 and invoice_id=i.invoice_id and day('" . date("Y-m-d") . "')-day(pay_date)<=30)");	

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
                                <td>: <a href="seekers/seeker_list.php?seeker_status=1,0" class="text_link" title="Total number of jobseekers"><?=number_format(getCount("select * from job_jobseeker"))?></a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of active jobseekers </td>
                                <td>: <a href="seekers/seeker_list.php?seeker_status=1" class="text_link" title="Total number of active jobseekers">
                                  <?=number_format(getCount("select * from job_jobseeker where seeker_status=1"))?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of in-active jobseekers </td>
                                <td>: <a href="seekers/seeker_list.php?seeker_status=0" class="text_link" title="Total number of in-active jobseekers">
                                  <?=number_format(getCount("select * from job_jobseeker where seeker_status=0"))?>
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
                                <td>: <a href="employer/employers_list.php?rec_status=1,0" class="text_link" title="Total number of employers">
                                  <?=number_format($rec_count)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of active employers </td>
                                <td>: <a href="employer/employers_list.php?rec_status=1" class="text_link" title="Total number of active employers">
                                  <?=number_format(getCount("select * from job_recruiter where rec_status=1"))?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of in-active employers </td>
                                <td>: <a href="employer/employers_list.php?rec_status=0" class="text_link" title="Total number of in-active employers">
                                  <?=number_format(getCount("select * from job_recruiter where rec_status=0"))?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of un-expired employers </td>
                                <td>: <a href="employer/employers_list.php?expire_status=0" class="text_link" title="Total number of un-expired employers">
                                  <?=number_format($expired_rec_count)?>
                                </a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>Total number of expired employers </td>
                                <td>: <a href="employer/employers_list.php?expire_status=1" class="text_link" title="Total number of expired employers">
                                  <? if($rec_count > $expired_rec_count) echo number_format($rec_count - $expired_rec_count); else echo number_format($expired_rec_count - $rec_count); ?>
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
                                  <td>: <a href="job/job_search_result.php?job_status=1,0" class="text_link" title="Total number of jobs">
                                  <?=number_format(getCount("select * from job_ad"))?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of active jobs </td>
                                  <td>: <a href="job/job_search_result.php?job_status=1" class="text_link" title="Total number of active jobs">
                                    <?=number_format(getCount("select * from job_ad where job_status=1"))?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of in-active jobs </td>
                                  <td>: <a href="job/job_search_result.php?job_status=0" class="text_link" title="Total number of in-active jobs">
                                    <?=number_format(getCount("select * from job_ad where job_status=0"))?>
                                  </a></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>Total number of un-expired jobs </td>
                                  <td>: <a href="job/job_search_result.php?expire_status=0" class="text_link" title="Total number of un-expired jobs">
                                    <?=number_format(getCount("select * from job_ad where adFrom<='" . date("Y-m-d") . "' and adTo>='" . date("Y-m-d") . "'"))?>
                                  </a></td>
                                </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td width="327">Total number of expired jobs </td>
                                <td width="439">: <a href="job/job_search_result.php?expire_status=1" class="text_link" title="Total number of expired jobs">
                                  <?=number_format(getCount("select * from job_ad where adFrom>='" . date("Y-m-d") . "' or adTo<='" . date("Y-m-d") . "'"))?>
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

