<?php  session_start();
	error_reporting(0);
	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$objDb = new db();
	
	if(!isset($_POST['seeker_status'])){
		$_POST['seeker_status']="1,0";
	}
	
	if(isset($_GET['seeker_status']))
		$seek_st="seeker_status=".$_GET['seeker_status'];
	else
		$seek_st ="seeker_status=".$_POST['seeker_status'];
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
	
	
	
	if(isset($_GET['seeker_status']))
		$sqlSeek = "select * from job_jobseeker where seeker_status in (" . $_GET['seeker_status'] . ")";	
	else
		$sqlSeek = "select * from job_jobseeker where seeker_status in (" . $_POST['seeker_status'] . ")";
	
	if(isset($_POST['seeker_uid']) && $_POST['seeker_uid'] != '')
		$sqlSeek .= " and seeker_uid ='" . $_POST['seeker_uid'] . "'";
		
	if(isset($_POST['seeker_name']) && $_POST['seeker_name'] != '')
		$sqlSeek .= " and seeker_name like '" . $_POST['seeker_name'] . "%'";
		
			
		
	if(isset($_POST['seeker_city']) && $_POST['seeker_city'] != '')
		$sqlSeek .= " and seeker_city like '" . $_POST['seeker_city'] . "%'";			
		
	if(isset($_POST['reg_date_from_date']) && $_POST['reg_date_from_date'] != '')
	{
		$reg_date_from = $_POST['reg_date_from_year'] . "-" . $_POST['reg_date_from_month'] . "-" . $_POST['reg_date_from_date'];	
		$sqlSeek .= " and seeker_reg_date >='" . $reg_date_from . "'";													
	}
	
	if(isset($_POST['reg_date_to_date']) && $_POST['reg_date_to_date'] != '')
	{
		$reg_date_to = $_POST['reg_date_to_year'] . "-" . $_POST['reg_date_to_month'] . "-" . $_POST['reg_date_to_date'];	
		$sqlSeek .= " and seeker_reg_date <='" . $reg_date_to . "'";													
	}	
				
	$sqlSeek .= " order by seeker_reg_date desc";
	
	$cPage ="" ;$page45="";
	$resultSeek1 = $objDb->ExecuteQuery($sqlSeek);	
	$rowCount1 = mysql_num_rows($resultSeek1);
	
	$j = 0;$page45=1;
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
	
	$pagination= new gsdPagination($sqlSeek,$cPage,'20',$baseURL);	
	$sqlSeek = $pagination->rQuery;	
	$resultSeek = $objDb->ExecuteQuery($sqlSeek);	
	$rowCount = mysql_num_rows($resultSeek);
	//echo $sqlSeek;
	if($rowCount <= 0)
	{
		$reg_date_from = $_POST['reg_date_from_year'] . "-" . $_POST['reg_date_from_month'] . "-" . $_POST['reg_date_from_date'];
		$reg_date_to = $_POST['reg_date_to_year'] . "-" . $_POST['reg_date_to_month'] . "-" . $_POST['reg_date_to_date'];		
		echo "<html><body>";
?>
		<form name="frmHidden" method="post" action="search_seekers.php?msg=not_found">
			<input type="hidden" name="seeker_uid" value="<? if(isset($_POST['seeker_uid'])) echo $_POST['seeker_uid']; ?>"> 	
			<input type="hidden" name="seeker_name" value="<? if(isset($_POST['seeker_name'])) echo $_POST['seeker_name']; ?>">
			<input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 	
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="seeker_city" value="<? if(isset($_POST['seeker_city'])) echo $_POST['seeker_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="seeker_status" value="<? if(isset($_POST['seeker_status'])) echo $_POST['seeker_status']; ?>"> 							
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
		document.form1.action = location + "&url=seeker_list.php&urlPage=<?=$cPage?>";
		document.form1.submit();
	}
	function go_back(kk)
	{
		//alert("kk");
		window.location.href=kk;
	}
	
function paging(pageno)
 {
	 document.form1.method = "post";
	 document.form1.action = "seeker_list.php?cPage=" + pageno+"&seeker_status="+document.form1.seeker_status.value;
	 document.form1.submit();
 }
 
 function remove_single_seeker(val,id)
 {	
 	//alert(val+"  "+id);
	if(confirm("Are you sure you want to delete this seekers from list?"))
	{
		
		vv="id="+id+"&"+val;
		document.form1.method = "post";
		document.form1.action ="remove_seeker.php?"+vv;
		document.form1.submit();
	}
 }
 function remove_single_seeker1(val,id,pp)
 {	
 	//alert(val+"  "+id);
	if(confirm("Are you sure you want to delete this seekers from list?"))
	{
		
		vv="id="+id+"&"+val;
		document.form1.method = "post";
		document.form1.action ="remove_seeker.php?"+vv+pp;
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
		//alert(val);
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
			alert("Please select seeker which you want to delete");
			return false;
		}
		else
		{
			if(confirm("Are you sure to delete selected seekers from list?"))
			{
				document.form1.method = "post";
				document.form1.action = "remove_seeker.php?"+val;
				document.form1.submit();
			}
		}
	}
	function remove_from_list1(val,vv)
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
			alert("Please select seeker which you want to delete");
			return false;
		}
		else
		{
			if(confirm("Are you sure to delete selected seekers from list?"))
			{
				document.form1.method = "post";
				document.form1.action = "remove_seeker.php?"+val+kk;
				document.form1.submit();
			}
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
		 <form name="form1" method="post">		
			<input type="hidden" name="seeker_uid" value="<? if(isset($_POST['seeker_uid'])) echo $_POST['seeker_uid']; ?>"> 	
			<input type="hidden" name="seeker_name" value="<? if(isset($_POST['seeker_name'])) echo $_POST['seeker_name']; ?>">
			<input type="hidden" name="comp_name" value="<? if(isset($_POST['comp_name'])) echo $_POST['comp_name']; ?>"> 	
			<input type="hidden" name="comp_type" value="<? if(isset($_POST['comp_type'])) echo $_POST['comp_type']; ?>"> 	
			<input type="hidden" name="seeker_city" value="<? if(isset($_POST['seeker_city'])) echo $_POST['seeker_city']; ?>"> 	
			<input type="hidden" name="reg_date_from" value="<?=$reg_date_from?>"> 	
			<input type="hidden" name="reg_date_to" value="<?=$reg_date_to?>"> 				
			<input type="hidden" name="seeker_status" value="<? if(isset($_POST['seeker_status'])) echo $_POST['seeker_status']; else if(isset($_GET['seeker_status'])) echo $_GET['seeker_status']; ?>">		  
			<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;Job Seekers </td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">A list of the namrecruit job seekers. </td>
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
                                <td align="left"><a href="search_seekers.php" class="terms">Search</a>&nbsp;&nbsp;&nbsp;<a onClick="check_all();"  href="#" class="terms">Check All </a>&nbsp;&nbsp;&nbsp;<a onClick="uncheck_all();" href="#" class="terms">Uncheck All</a></td>
                              </tr>
                            </table></td>
                          </tr>
				  
                          <tr>
                            <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                <tr align="left">
                                  <td align="center" class="table_head">Delete</td>
                                  <td class="table_head">seeker ID</td>
                                  <td class="table_head">Regd. Date</td>
                                  <td class="table_head">Contact Name </td>
                                  <td class="table_head">Email</td>
                                  <td class="table_head">City</td>
                                  <td class="table_head">Status</td>
                                  <td class="table_head">Detail View </td>
								  <td class="table_head_end">Delete</td>
                                </tr>
                                <?
								$i = 1;
								while($rsSeek = mysql_fetch_object($resultSeek))
								{
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                <tr align="left">
                                  <td width="8%" align="center" class="<?=$td_class?>"><input type="checkbox" name="chk[]" id= "chk" value="<?=$rsSeek->seeker_id?>"></td>
                                  <td width="15%" class="<?=$td_class?>"><?=$rsSeek->seeker_uid ?></td>
                                  <td width="11%" class="<?=$td_class?>"><?=getDateValue($rsSeek->seeker_reg_date)?></td>
                                  <td width="15%" class="<?=$td_class?>"><?=$rsSeek->seeker_name?></td>
                                  <td width="21%" class="<?=$td_class?>"><a href="mailto:<?=$rsSeek->seeker_email?>" class="normal_black"><?=$rsSeek->seeker_email?></a></td>
                                  <td width="11%" class="<?=$td_class?>"><?=$rsSeek->seeker_postal_city?></td>
                                  <td width="8%" class="<?=$td_class?>"><?=showStatus('seeker','seeker_id',$rsSeek->seeker_id,'seeker_status',$rsSeek->seeker_status,'job_jobseeker'); ?></td>
                                  <td width="11%" class="<?=$td_class?>"><a href="#" onClick="viewDetails('view_profile.php?seeker_id=<?=$rsSeek->seeker_id?>&seeker_status=<?=$seek_st?>');" class="paging_text">Detail View </a></td>
								  <td width="11%" class="<?=$td_class?>_end">
								  <? if($_SERVER['QUERY_STRING']!="" && !isset($_GET["seeker_status"]) ){?>
								  <a href="#" onClick="remove_single_seeker1('<?=$_SERVER['QUERY_STRING']?>','<?=$rsSeek->seeker_id?>','<?=seek_st?>');" class="paging_text">Delete </a>
								  <? }else if($_SERVER['QUERY_STRING']!="" && isset($_GET["seeker_status"]) ){?>								 <a href="#" onClick="remove_single_seeker('<?=$_SERVER['QUERY_STRING']?>','<?=$rsSeek->seeker_id?>');" class="paging_text">Delete </a>
								  <? } else {?>
								   <a href="#" onClick="remove_single_seeker('<?=$seek_st?>','<?=$rsSeek->seeker_id?>');" class="paging_text">Delete </a><? }?>
								  </td>
                                </tr>
                                <?
									$i++;
								}
							  ?>
                            </table></td>
                          </tr>
                          <tr align="center">
                            <td valign="middle" height="10">
							<table width="90%" cellpadding="0" cellspacing="0" >
                                   <? if($_SERVER['QUERY_STRING']!="" && !isset($_GET["seeker_status"]) ){?>									
								    <tr>
                                      <td align="left" ><a href="#" onClick="return remove_from_list1('<?=$_SERVER['QUERY_STRING']?>','<?=$seek_st?>');" class="terms" >Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
									   <? }else if($_SERVER['QUERY_STRING']!="" && isset($_GET["seeker_status"]) ){?>
								    <tr>
                                      <td align="left" ><a href="#" onClick="return remove_from_list('<?=$_SERVER['QUERY_STRING']?>');" class="terms" >Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
									<? } else {?>
									  
								    <tr>
                                      <td align="left" ><a href="#" onClick="return remove_from_list('<?=$seek_st?>');" class="terms" >Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr><? }?>
                              </table>
							
							</td>
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
                            <td align="center"><img src="../../images/back.gif" border="0" onClick="location.href='<?=trim($uu)?>'" style="cursor:pointer"></td>
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

