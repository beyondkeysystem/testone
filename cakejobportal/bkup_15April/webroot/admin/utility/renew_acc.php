<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");	
	$cnt=-1;
	if(isset($_POST["rec_uid"]))
	{
		$rec_uid=$_POST["rec_uid"];
	}
	if(isset($_POST["rec_email"]))
	{
		$rec_email=$_POST["rec_email"];
	}
	$objDb = new db();

	if(isset($_GET["uid"]) || isset($_GET["remail"]))
	{
		$sqlRec = "select * from job_recruiter where  ";
		if(isset($_GET["uid"]) && $_GET["uid"]!="" )
		{
			$sqlRec .=" rec_uid='".$_GET["uid"]."'";
		}
		else if(isset($_GET["remail"]) && $_GET["remail"]!="" )
		{
			$sqlRec .=" rec_email='".$_GET["remail"]."'";
		}
		
		$resultRec  = $objDb->ExecuteQuery($sqlRec);
		$cnt=mysql_num_rows($resultRec);

		if($cnt>0)
		{
			$rsRec=mysql_fetch_object($resultRec);
			$sqlLastInvoice = "select * from job_rec_invoices i where i.invoice_type=1 and i.rec_id='" . $rsRec->rec_id . "' and (select count(*) from job_rec_payments where invoice_id=i.invoice_id)>0 order by i.invoice_id desc";
			$resultLastInvoice = $objDb->ExecuteQuery($sqlLastInvoice);
			if($rsLastInvoice = mysql_fetch_object($resultLastInvoice))
			{
				$plan_name = $rsLastInvoice->plan_name;
				
				//get first payment details for last invoice of plan purchased.
				$sqlFirstPay = "select * from job_rec_payments where invoice_id=" . $rsLastInvoice->invoice_id . " and pay_status=1 order by pay_id";
				$resultFirstPay = $objDb->ExecuteQuery($sqlFirstPay);
				if($rsFirstPay = mysql_fetch_object($resultFirstPay))
				{	
					$first_pay_date = $rsFirstPay->pay_date;
					
					$days = ((30 * 24) * 60) * 60;
					$expire_date = date("Y-m-d", strtotime($rsFirstPay->pay_date) + $days);
				}				
			}
		}
	}
		
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
<script src="../javascript/admin.js"  language="javascript"></script>
<script src="../../javascript/job.js" language="javascript"></script>		
<script src="../../javascript/recruiter.js" language="javascript"></script>
<script src="../../javascript/main.js" language="javascript"></script>
<script src="../../javascript/recruiter.js" language="javascript"></script>	
<script language="javascript">

function makeShowData(event)
	{
		var flag=true;
		if (event.keyCode == 13) {
			flag=showData();
			if(flag==false) { return false; } else { return true; }
		}
	}
function showData()
{
	rec_uid=document.form1.rec_uid.value;
	rec_email=document.form1.rec_email.value;
	if(rec_uid=="" && rec_email=="")
	{
		alert("please enter recruiter id or recruiter email address");
		document.form1.rec_uid.focus();
		return false;
	}
	else
	{
		if(rec_uid!=""){ rid="uid="+rec_uid; }else if(rec_email!="") { rid="remail="+rec_email; }
		document.form1.method="post";
		document.form1.action="renew_acc.php?" + rid;
		document.form1.submit()
	}
		
	
}


function displayTable()
{
	if(document.form1.invoice_id.value!="" )
	{
		document.getElementById("invoice_detail").style.display="";
	}
	else
	{
		document.getElementById("invoice_detail").style.display="none";
	}
}

function verifyChange(varRecId,varPlanId)
{
	if(confirm("If you change your plan now, this will expire your current plan. Do you want to continue?"))
	{			
		document.form1.action = "sign_up_now.php?rec_id=" + varRecId + "&plan=" + varPlanId;
		document.form1.submit();		
		return true;
	}
	else
	{
		return false;
	}
}

</script>		

</head>
<body onLoad="displayTable();if(document.form1.pay_by != null) checkPay(document.form1.pay_by.value);MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("includes/top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		<form name="form1" action="make_new_payment_action.php?invoice_id=<?=$rsInvoice->invoice_id?>" method="post" >		 
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;<span class="medium_black">Renew Account </span></td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="2"></td>
                                        <td width="771">Please enter  Recruiter ID or Email ID of the recruiter to renew account.
										<? //if($rsInvoice->rate > 0) echo "To make payment click on pay now."; else echo "To subscribe, click on subscribe now."; ?>
                                        <br>
                                        <br></td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top">
								  <table width="100%" cellpadding="5" cellspacing="0">
										  <tr>
										    <td width="1%" valign="bottom" class="medium_black">&nbsp;</td>
                                            <td height="30" valign="bottom">
											 Recruiter ID : 
											   <input name="rec_uid" type="text" id="rec_uid"  value="<?=$rec_uid?>"   onKeyPress="return makeShowData(event);"  >
                                             &nbsp;&nbsp;<span class="subhead_gray_small">OR</span>&nbsp;&nbsp;
											 Email ID : 
											 <input name="rec_email" type="text" id="rec_email"  value="<?=$rec_email?>"   onKeyUp="return makeShowData(event);"  >
                                            <a href="#" onClick="return showData();"><img src="../../images/search.gif"   border="0" align="absmiddle"></a>											</td>
                                          </tr>
										  <tr>
										    <td>&nbsp;</td>
                                            <td><img src="../images/line.gif" width="772"></td>
                                          </tr>										  
									  </table>
								  </td>
                                </tr>
								<tr>
								  <td><? if($cnt==0) {?>
										<table width="100%" cellpadding="2" cellspacing="0" >
											<tr>
												
											  <td width="4%" rowspan="2"><img src="../../images/redcross.gif" align="absmiddle"></td>
												<td width="96%" class="star">No Recruiter Is Found.</td>
											</tr>
											<tr>
											  <td>&nbsp;</td>
											</tr>								
										</table>
										<? }?></td>
							  </tr>
								<tr>
								  <td align="left">
										<? 
											 if($cnt>0) {
											
											if(isAccountExpired($rsRec->rec_id)==0) {?>
												<table width="100%" cellpadding="3" cellspacing="0">
												  <tr>
												    <td>&nbsp;</td>
												    <td height="25" colspan="2" class="subhead_gray_small">Account Details </td>
											      </tr>
												  <tr>
                                                    <td width="2%">&nbsp;</td>
                                                    <td width="16%"> Company Name  </td>
											        <td width="82%">: <?=$rsRec->comp_name?> </td>
												  </tr>
												  <tr>
                                                    <td>&nbsp;</td>
                                                    <td> Plan Name</td>
                                                    <td> : <?=$plan_name?> </td>
											      </tr>
												  <tr>
                                                    <td>&nbsp;</td>
                                                    <td> Amount </td>
                                                    <td> :
                                                        <?=$rsPlan->rate?>
                                                    </td>
											      </tr>
												  <tr>
                                                    <td>&nbsp;</td>
                                                    <td> Expire Date </td>
                                                    <td> :
                                                        <?=getDateValue($expire_date)?>
                                                    </td>
											      </tr>
													<tr>
													  <td colspan="3">&nbsp;</td>
												  </tr>
													<tr>
													  <td colspan="3">&nbsp;</td>
												  </tr>
													<tr>
                                                    <td colspan="3">&nbsp;  </td>
                                                    </tr>
											  </table>
									            <? 
											}
										}
									?>
</td>
								</tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
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

