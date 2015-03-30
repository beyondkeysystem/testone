<?php   session_start();
	error_reporting(0);
	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	//echo $_SERVER['HTTP_REFERER'];
	if(!isset($_POST['rec_status'])){
		$_POST['rec_status']="1,0";
	}
	
	if(strstr($_SERVER['HTTP_REFERER'],"/"))
	{
		
		$st=explode("/",$_SERVER['HTTP_REFERER']);
		$uu=end($st);
		if(trim($uu)=="admin_home.php")
		{
			$uu="../".end($st);
		}
		else
		{
			$uu=end($st);
		}
	}
	else
	{
		$uu=$_SERVER['HTTP_REFERER'];
		
		if(trim($uu)=="admin_home.php")
		{
			$uu="../".$_SERVER['HTTP_REFERER'];
		}
		else
		{
			$uu=$_SERVER['HTTP_REFERER'];
		}
	}
	if(isset($_GET['rec_status']))
		$rr_st=$_GET['rec_status'];	
	else if(isset($_POST['rec_status']))
		$rr_st=$_POST['rec_status'];
	if(isset($_GET['rec_status']))
		$sqlRec = "select * from job_recruiter jr where jr.rec_status in (" . $_GET['rec_status'] . ") ";	
	else if(isset($_POST['rec_status']))
		$sqlRec = "select * from job_recruiter jr where jr.rec_status in (" . $_POST['rec_status'] . ") ";
	else
		$sqlRec = "select * from job_recruiter jr where jr.rec_status in (1,0) ";	
		
	if(isset($_GET["expire_status"]) && $_GET["expire_status"] == 0 && $_GET["expire_status"] != "")
		$sqlRec .= " and  (select count(r.rec_id) from job_recruiter r, job_rec_invoices i, job_rec_payments p where r.rec_id=jr.rec_id and i.invoice_id=p.invoice_id and r.rec_id=i.rec_id and i.invoice_id=(select max(li.invoice_id) from job_rec_invoices li where li.invoice_type=1 and li.rec_id=r.rec_id and (select count(*) from job_rec_payments where invoice_id=li.invoice_id) > 0) and p.pay_id=(select min(pay_id) from job_rec_payments where pay_status=1 and invoice_id=i.invoice_id and day('" . date("Y-m-d") . "')-day(pay_date)<=30)) > 0";
	else if(isset($_GET["expire_status"]) && $_GET["expire_status"] == 1 && $_GET["expire_status"] != "")
		$sqlRec .= " and  (select count(r.rec_id) from job_recruiter r, job_rec_invoices i, job_rec_payments p where r.rec_id=jr.rec_id and i.invoice_id=p.invoice_id and r.rec_id=i.rec_id and i.invoice_id=(select max(li.invoice_id) from job_rec_invoices li where li.invoice_type=1 and li.rec_id=r.rec_id and (select count(*) from job_rec_payments where invoice_id=li.invoice_id) > 0) and p.pay_id=(select min(pay_id) from job_rec_payments where pay_status=1 and invoice_id=i.invoice_id and day('" . date("Y-m-d") . "')-day(pay_date)<=30)) <= 0";		
	else if(isset($_POST["expire_status"]) && $_POST["expire_status"] == 0 && $_POST["expire_status"] != "")
		$sqlRec .= " and  (select count(r.rec_id) from job_recruiter r, job_rec_invoices i, job_rec_payments p where r.rec_id=jr.rec_id and i.invoice_id=p.invoice_id and r.rec_id=i.rec_id and i.invoice_id=(select max(li.invoice_id) from job_rec_invoices li where li.invoice_type=1 and li.rec_id=r.rec_id and (select count(*) from job_rec_payments where invoice_id=li.invoice_id) > 0) and p.pay_id=(select min(pay_id) from job_rec_payments where pay_status=1 and invoice_id=i.invoice_id and day('" . date("Y-m-d") . "')-day(pay_date)<=30)) > 0";
	else if(isset($_POST["expire_status"]) && $_POST["expire_status"] == 1 && $_POST["expire_status"] != "")
		$sqlRec .= " and  (select count(r.rec_id) from job_recruiter r, job_rec_invoices i, job_rec_payments p where r.rec_id=jr.rec_id and i.invoice_id=p.invoice_id and r.rec_id=i.rec_id and i.invoice_id=(select max(li.invoice_id) from job_rec_invoices li where li.invoice_type=1 and li.rec_id=r.rec_id and (select count(*) from job_rec_payments where invoice_id=li.invoice_id) > 0) and p.pay_id=(select min(pay_id) from job_rec_payments where pay_status=1 and invoice_id=i.invoice_id and day('" . date("Y-m-d") . "')-day(pay_date)<=30)) <= 0";		

	if(isset($_POST['rec_uid']) && $_POST['rec_uid'] != '' )
		$sqlRec .= " and jr.rec_uid ='" . $_POST['rec_uid'] . "'";
		
	if(isset($_POST['rec_name']) && $_POST['rec_name'] != '' )
		$sqlRec .= " and jr.rec_name like '" . $_POST['rec_name'] . "%'";
		
	if(isset($_POST['comp_name']) && $_POST['comp_name'] != '')
		$sqlRec .= " and jr.comp_name like '" . $_POST['comp_name'] . "%'";		
		
	if(isset($_POST['comp_type']) && $_POST['comp_type'] != '')
		$sqlRec .= " and jr.comp_type ='" . $_POST['comp_type'] . "'";			
		
	if(isset($_POST['rec_city']) && $_POST['rec_city'] != '')
		$sqlRec .= " and jr.rec_city like '" . $_POST['rec_city'] . "%'";			
		
	if(isset($_POST['reg_date_from_date']) && $_POST['reg_date_from_date'] != '')
	{
		$reg_date_from = $_POST['reg_date_from_year'] . "-" . $_POST['reg_date_from_month'] . "-" . $_POST['reg_date_from_date'];	
		$sqlRec .= " and jr.rec_reg_date >='" . $reg_date_from . "'";													
	}
	
	if(isset($_POST['reg_date_to_date']) && $_POST['reg_date_to_date'] != '')
	{
		$reg_date_to = $_POST['reg_date_to_year'] . "-" . $_POST['reg_date_to_month'] . "-" . $_POST['reg_date_to_date'];	
		$sqlRec .= " and jr.rec_reg_date <='" . $reg_date_to . "'";													
	}	
				
	$sqlRec .= " order by jr.rec_reg_date desc";
	
	$cPage ="" ;
	$resultRec1 = $objDb->ExecuteQuery($sqlRec);	
	$rowCount1 = mysql_num_rows($resultRec1);
	$page45=1;
	if(isset($_REQUEST['cPage']))
	{
		$page45 = $_REQUEST['cPage'];
		if($rowCount1>0)
		{
			if($rowCount1==($page45)*10)
			{
				$page45=$_REQUEST['cPage']-1 ;
			}
			else
			{
				$page45=$_REQUEST['cPage'] ;
			}
		}
		
		
	}
	
	$cPage = ( isset($_REQUEST['cPage']) ) ? $page45 : '1';
	
	$baseURL= $_SERVER['PHP_SELF'];
	
	$j = 0;
	if(isset($_REQUEST['cPage']))
	{
		$page = $_REQUEST['cPage'];
		if($rowCount1>0)
		{
			if($rowCount1==($page)*10)
			{
				$j=($page-2)*10 ;
			}
			else
			{
				$j=($page-1)*10 ;
			}
		}
	}
		
	$pagination= new gsdPagination($sqlRec,$cPage,'20',$baseURL);	
	$sqlRec = $pagination->rQuery;	
	$resultRec = $objDb->ExecuteQuery($sqlRec);	
	$rowCount = mysql_num_rows($resultRec);
	//echo $sqlRec;
	if($rowCount <= 0)
	{
		$reg_date_from = $_POST['reg_date_from_year'] . "-" . $_POST['reg_date_from_month'] . "-" . $_POST['reg_date_from_date'];
		$reg_date_to = $_POST['reg_date_to_year'] . "-" . $_POST['reg_date_to_month'] . "-" . $_POST['reg_date_to_date'];		
		echo "<html><body>";
?>
		<form name="frmHidden" method="post" action="search_employers.php?msg=not_found">
			<input type="hidden" name="rec_uid" value="<? if(isset($_POST['rec_uid'])) echo $_POST['rec_uid']; ?>"> 	
			<input type="hidden" name="rec_name" value="<? if(isset($_POST['rec_name'])) echo $_POST['rec_name']; ?>">
			<input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 	
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="rec_city" value="<? if(isset($_POST['rec_city'])) echo $_POST['rec_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="rec_status" value="<? if(isset($_POST['rec_status'])) echo $_POST['rec_status']; ?>"> 							
		</form>	
		
		<script language="javascript">document.frmHidden.submit();</script> 
<?	
		echo "</body></html>";
		exit();
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
<script src="../javascript/admin.js" language="javascript"></script>
<script language="javascript">
	function viewDetails(location)
	{
		document.form1.method="post";	
		document.form1.action = location + "&url=employers_list.php&urlPage=<?=$cPage?>";
		document.form1.submit();
	}
	
	function paging(pageno)
	{
	 document.form1.method = "post";
	 document.form1.action = "employers_list.php?rec_status="+document.form1.rec_status.value+"&cPage=" + pageno;
	 document.form1.submit();
	}
	 function remove_single_rec(val,id)
 {	
 	//alert(val+"  "+id);
	if(confirm("Are you sure you want to delete this employer/recruiter from list?"))
	{
		
		vv="id="+id+"&"+val;
		document.form1.method = "post";
		document.form1.action ="remove_rec.php?"+vv;
		document.form1.submit();
	}
 }
 function check_all()
 {
 	var len = document.form1.elements.length;	
		var total=0;
		for(var j = 0; j <=len-1; j++) 
		{
			if(document.form1.elements[j].type == "checkbox")
			{		
				document.form1.elements[j].checked=true;
			}
		}
  }
  function uncheck_all()
  {
		var len = document.form1.elements.length;	
			var total=0;
			for(var j = 0; j <=len-1; j++) 
			{
				if(document.form1.elements[j].type == "checkbox")
				{		
					document.form1.elements[j].checked=false;
				}
			}
  }
	
 function remove_from_list(val)
	{
		
		var len = document.form1.elements.length;	
		var total=0;
		for(var j = 0; j <=len-1; j++) 
		{
			if(document.form1.elements[j].type == "checkbox")
			{		
				if(document.form1.elements[j].checked==true)
				{
						total++;
				}
				
			}
		}
		if(total==0)
		{
			alert("Please select employer/recruiter which you want to delete");
			return false;
		}
		else
		{
			if(confirm("Are you sure to delete selected employer/recruiter from list?"))
			{
				document.form1.method = "post";
				document.form1.action = "remove_rec.php?"+val;
				document.form1.submit();
			}
		}
	}
	function go_back(kk)
	{
		//alert("kk");
		window.location.href=kk;
	}
 
</script>
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
		 <form name="form1" method="post">
			<input type="hidden" name="rec_uid" value="<? if(isset($_POST['rec_uid'])) echo $_POST['rec_uid']; ?>"> 	
			<input type="hidden" name="rec_name" value="<? if(isset($_POST['rec_name'])) echo $_POST['rec_name']; ?>">
			<input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 	
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="rec_city" value="<? if(isset($_POST['rec_city'])) echo $_POST['rec_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="rec_status" value="<? if(isset($_POST['rec_status'])) echo $_POST['rec_status']; else if(isset($_GET['rec_status'])) echo $_GET['rec_status']; else echo "1,0"; ?>"> 									 
			<input type="hidden" name="expire_status" value="<? if(isset($_POST['expire_status'])) echo $_POST['expire_status']; else if(isset($_GET['expire_status'])) echo $_GET['expire_status']; ?>"> 									 			
			<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Employers </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of the namrecruit employers. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../images/line.gif" width="772"></td>
                          </tr>
                          <tr>
                            <td><table width="95%" align="center" cellpadding="0" cellspacing="0" >
                              <tr>
                                <td align="left"  ><span class="text_red">Note :</span> Activating an Employer or Recruiter's account from this page will not activate a new account. </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><table width="95%" align="center" cellpadding="0" cellspacing="0" >
                              <tr>
                                <td align="left"><a href="search_employers.php" class="terms">Search</a>&nbsp;&nbsp;&nbsp;<a onClick="check_all();"  href="#" class="terms">Check All </a>&nbsp;&nbsp;&nbsp;<a onClick="uncheck_all();" href="#" class="terms">Uncheck All</a></td>
                              </tr>
                            </table></td>
                          </tr>
				  
                          <tr>
                            <td align="center"><table width="97%" cellpadding="6" cellspacing="0" class="table_black_border">
                                <tr align="left">
                                  <td width="5%" align="center" class="table_head">Delete</td>
                                  <td width="9%" class="table_head">Employer ID</td>
                                  <td class="table_head">Regd. Date</td>
                                  <td class="table_head">Company Name</td>
                                  <td class="table_head">Contact Name </td>
                                  <td class="table_head">Email</td>
                                  <td class="table_head">City</td>
                                  <td class="table_head">Expired</td>
                                  <td class="table_head">Edit</td>
                                  <td class="table_head">Status</td>
                                  <td class="table_head">Detail View </td>
								  <td class="table_head_end">Delete </td>
                                </tr>
                                <?
								$i = 1;
								while($rsRec = mysql_fetch_object($resultRec))
								{
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
																	
							  ?>
                                <tr align="left">
                                  <td align="center" class="<?=$td_class?>"><input type="checkbox" name="chk[]" id= "chk" value="<?=$rsRec->rec_id?>"></td>
                                  <td class="<?=$td_class?>"><?=$rsRec->rec_uid ?></td>
                                  <td width="8%" class="<?=$td_class?>"><?=getDateValue($rsRec->rec_reg_date)?></td>
                                  <td width="11%" class="<?=$td_class?>"><?=$rsRec->comp_name?>&nbsp;</td>
                                  <td width="10%" class="<?=$td_class?>"><?=$rsRec->rec_name?>&nbsp;</td>
                                  <td width="16%" class="<?=$td_class?>"><a href="mailto:<?=$rsRec->rec_email?>" class="normal_black"><?=$rsRec->rec_email?></a></td>
                                  <td width="7%" class="<?=$td_class?>"><?=$rsRec->rec_city?></td>
                                  <td width="6%" class="<?=$td_class?>"><? if(isAccountExpired($rsRec->rec_id)) echo "Yes"; else echo "No"; ?></td>
                                  <td width="4%" class="<?=$td_class?>"><a href="../utility/rec_profile.php?rec_id=<?=$rsRec->rec_id?>" class="paging_text" title="Edit Profile">Edit</a></td>
                                  <td width="5%" class="<?=$td_class?>"><?=showStatus('employer','rec_id',$rsRec->rec_id,'rec_status',$rsRec->rec_status,'job_recruiter'); ?></td>
                                  <td width="10%" class="<?=$td_class?>"><a href="#" onClick="viewDetails('view_profile.php?rec_id=<?=$rsRec->rec_id?>&rec_status=<?=$rr_st?>');" class="paging_text">Detail View </a></td>
								   <td width="9%" class="<?=$td_class?>_end"><a href="#" onClick="remove_single_rec('<?=$_SERVER['QUERY_STRING']?>','<?=$rsRec->rec_id?>');" class="paging_text">Delete </a></td>
                                </tr>
                                <?
									$i++;
								}
							  ?>
                            </table></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"><table width="92%" cellpadding="0" cellspacing="0" >
                              <tr>
                                <td align="left" ><a href="#" onClick="return remove_from_list('<?=$_SERVER['QUERY_STRING']?>');" class="terms" >Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle"><table width="50%" height="26"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr>
                                <td align="center" class="normal_black"><? if($rowCount>0) echo $pagination->buildNavigation('paging_text');?></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="seller_list_paging"></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="center"><img src="../images/back.gif" border="0" style="cursor:pointer" onClick="go_back('<?=$uu?>');"></td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
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

