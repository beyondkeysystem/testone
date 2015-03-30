<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
	require_once("../../includes/functions.php");	
	$objDb = new db();
	$rowCount=0;
	$cat="";
	$cat1="";
	$option="";
	
	$sqlplan = "select * from  job_rec_payment_plans where type='emp' order by plan_name ";
	$resultplan = $objDb->ExecuteQuery($sqlplan);
	//$rsplan=mysql_fetch_object($resultplan);
	$rowCount = mysql_num_rows($resultplan);
	
	
	
	
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
<script src="../../javascript/job.js" language="javascript"></script>

<script language="javascript">
 
 function deletePlan(pid)
 {
 	if(confirm("Are you sure you want to delete this plan?"))
	{
		document.form1.method="post";
		document.form1.action="plan_delete.php?pid="+pid;
		document.form1.submit();
	} 
	
 }
 
 function getCategory()
 {
 	document.form1.method="post";
	document.form1.action="option_add.php?cat_id="+document.form1.category_id1.value+"&action="+document.form1.actionval.value;
	document.form1.submit();
 }
 
 
 function submitOption()
 {
	if(validateOption())
	{
		document.form1.method="post";
		document.form1.action="option_add_action.php?cat_id="+document.form1.category_id1.value+"&action=add";
		document.form1.submit();
 	}
 }
 function editOption(oid)
 {
	if(validateOption())
	{
		document.form1.method="post";
		document.form1.action="option_add_action.php?cat_id="+document.form1.category_id1.value+"&action=edit&oid="+oid;
		document.form1.submit();
 	}
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
		 <form name="form1" method="post" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                        
						  <tr>
						  	<td>
						  	<table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black"> Payment Plan List</span></td>
                                <td width="27%" align="right" class="normal_text" >&nbsp;</td>
                              </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of the namrecruit payment plan. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                        <?							
							if($rowCount > 0)
							{
							
						?>
                          <tr>
                            <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                              <tr>
                                <td><img src="../images/line.gif" width="772"></td>
                              </tr>
							  <tr>
								<td class="error"  align="center">
							  <? if(isset($_GET["msg"]) && $_GET["msg"]=="edit")
							  	 {
							 ?>
							 	Plan updated successfully!
                              <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="add") 
								{
							  ?>
							 	Plan added successfully!
                              <? } ?>
							  </td>
							</tr> 
							  
							  <tr>
                                <td align="center"><table width="100%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr>
                                      <td class="table_head">Plan  name </td>
                                      <td class="table_head">Subscription</td>
                                      <td class="table_head">Rate</td>
                                      <td class="table_head">Number of Jobs</td>
                                      <td class="table_head">Rate of additional job </td>
                                      <td class="table_head">Status</td>
                                      <td class="table_head_end">Action</td>
                                    </tr>
                                    <?
								$i = 1;
								while($rsplan = mysql_fetch_object($resultplan))
								{
									if($rsplan->rate==0)
									{
										$subscription="Free";
									}
									else
									{
										$subscription="Paid";
									}
									if($rsplan->number_job!=0) $pp=$rsplan->number_job; else $pp="unlimited";
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr>
                                      <td width="13%" class="<?=$td_class?>"><?=$rsplan->plan_name ?></td>
                                      <td width="12%" class="<?=$td_class?>"><?=$subscription?></td>
                                      <td width="11%" class="<?=$td_class?>">N$ <?=number_format($rsplan->rate,2,'.','')?></td>
                                      <td width="16%" class="<?=$td_class?>"><?=$pp?></td>
                                      <td width="20%" class="<?=$td_class?>">N$ <?=number_format($rsplan->rate_per_job,2,'.','')?></td>
                                      <td width="15%" class="<?=$td_class?>"><?=showStatus('plan','plan_id',$rsplan->plan_id,'plan_status',$rsplan->plan_status,'job_rec_payment_plans'); ?></td>
                                      <td width="13%" class="<?=$td_class?>_end"><a href="plan_edit.php?pid=<?=$rsplan->plan_id?>" class="paging_text">Edit</a> &nbsp;&nbsp;&nbsp;<a href="#" class="paging_text" onClick="return deletePlan(<?=$rsplan->plan_id?>)">Delete </a></td>
                                    </tr>
                                    <?
									$i++;
								}
							  ?>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
						   <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
						  <tr>
                            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  onClick="location.href='home.php';"><img src="../../images/back.gif" border="0"></a></td>
                          </tr>
                          <?
					  	}
						else
						{
					  ?>
                          <tr>
                            <td ></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <?
					  	}
					  ?>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
						  
						  
						  	</td>
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

