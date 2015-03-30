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
	
	

	
	
	if(isset($_GET["cat_id"]) && $_GET["cat_id"]!="")
	{
		$sqlcat = "select * from  job_options where category_id=" . $_GET["cat_id"] . " order by option_name ";
		$resultcat = $objDb->ExecuteQuery($sqlcat);
		//$rscat=mysql_fetch_object($resultcat);
		$rowCount = mysql_num_rows($resultcat);
		
		$sqlcatname = "select * from   job_option_categories where category_id=" . $_GET["cat_id"] ;
		$resultcatname = $objDb->ExecuteQuery($sqlcatname);
		$rscatname=mysql_fetch_object($resultcatname);
		//$rowCount = mysql_num_rows($resultcatname);
		
		$cat1=$_GET["cat_id"];
	
		if(isset($_GET["oid"]) && $_GET["oid"]!="")
		{
			$sqloption = "select * from  job_options where option_id=" . $_GET["oid"] ;
			$resultoption = $objDb->ExecuteQuery($sqloption);
			$rsoption=mysql_fetch_object($resultoption);
			$cat=$rsoption->category_id;
			$option=$rsoption->option_name;
		}
		else
		{
			if(isset($_POST["category_id"]) && $_POST["category_id"]!="")
			{
				$cat=$_POST["category_id"];
			}
			if(isset($_POST["option_name"]) && $_POST["option_name"]!="")
			{
				$option=$_POST["option_name"];
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
<script src="../javascript/admin.js" language="javascript"></script>
<script src="../../javascript/job.js" language="javascript"></script>


<script language="javascript">
 
 function deleteOption(oid)
 {
 	if(confirm("Are you sure you want to delete this option"))
	{
		document.form1.method="post";
		document.form1.action="option_add_action.php?cat_id="+document.form1.category_id1.value+"&action=delete&oid="+oid;
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
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" >&nbsp;<? if(isset($_GET['action']) && $_GET['action'] == "edit") echo "Edit"; else echo "Add"; ?> Option</td>
                                </tr>
                                <tr>
                                  <td valign="top">
								  <table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can <? if(isset($_GET['action']) && $_GET['action'] == "edit") echo "edit"; else echo "add"; ?> the option here. </td>
                                      </tr>
                                  </table>
								  </td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          
						  
                          <tr>
                            <td align="left" valign="top">
							 <table width="800" cellpadding="5" cellspacing="0">
						   <? if(isset($_GET["msg"]))
							 {
							?>							 
							   <tr>
								<td colspan="5" class="error">
							   <? if(isset($_GET["msg"]) && $_GET["msg"]=="add")
								 {
								?>
									Option added successfully!
								<? } else if(isset($_GET["msg"]) && $_GET["msg"]=="fail")
								 { 
									$cat=$_GET["cid"];
									$option=$_GET["option"];
								 ?>
									This option is already present !
								 <? }  else if(isset($_GET["msg"]) && $_GET["msg"]=="edit")
								 { ?>
									Option updated successfully!
								 <? } else if(isset($_GET["msg"]) && $_GET["msg"]=="delete")
									{ 
								 ?> 								 
									Option deleted successfully!
								 <? } ?>
								 </td>
								</tr>
							<?
								}
							?>
								  <tr>
									<td width="1">&nbsp;</td>
									<td>Category Name : 
								    <?=fill_dropdown('category_id','job_option_categories', 'category_name',"category_id",$cat,"Select")?>									  <img src="../../images/star.gif"></td>
									<td>&nbsp;Option Name : 
									  <input name="option_name" type="text" id="option_name" value="<?=$option?>" > 
								      <img src="../../images/star.gif"></td>
									<td width="9">&nbsp;</td>
									<td width="136" height="50" valign="middle">
									<? if(isset($_GET["action"]) && $_GET["action"]=="add")
									{ ?>
										<a href="#" onClick="return submitOption();"><img src="../../images/add.gif" border="0"></a>
									<? }else if(isset($_GET["action"]) && $_GET["action"]=="edit") { ?>
										<a href="#" onClick="return editOption(<?=$_GET["oid"]?>);"><img src="../../images/update_admin.gif" border="0"></a>
									<?  } ?>
									&nbsp;<a href="home.php"><img src="../../images/cancel.gif" border="0"></a>
	
									</td>
								 </tr>
								 
								</table>
							</td>
                          </tr>
						 
						  
                          <tr align="center">
                            <td valign="middle" height="10"></td>
                          </tr>
						  <tr>
						  	<td>
						  	<table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                              <tr>
                                <td height="30" class="headingRegister" >&nbsp;<span class="heading_black">Options List </span></td>
                                <td align="right" class="normal_text" >&nbsp;</td>
                              </tr>
                                <tr>
                                  <td width="73%" height="30" ><input type="hidden" value="<?=$_GET['action']?>" name="actionval">
                                  &nbsp;&nbsp;&nbsp;Category name : <?=fill_dropdown('category_id1','job_option_categories', 'category_name',"category_id",$cat1,"Select","","onchange=getCategory()")?>
                                    </td>
                                  <td width="27%" align="right" class="heading_black" >&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%" ><? if(isset($_GET["cat_id"]) && $_GET["cat_id"]!=""){ if($rowCount > 0){?><br>A list of  all the options of  category - <? echo($rscatname->category_name);?><? } else {?>
										  <br><table width="100%" cellpadding="2" cellspacing="0">
											<tr>
											  <td width="4%" rowspan="3"><img src="../../images/redcross.gif" align="absmiddle"></td>
											  <td width="96%" class="star">No options found in category - <? echo($rscatname->category_name); ?> </td>
											</tr>
											<tr>
											  <td>&nbsp;</td>
											</tr>
										</table>
										<?  } } else { ?> <br>
										Select the category for options list. <? }?></td>
                                          
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
                                <td align="center"><table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
                                    <tr align="left">
                                      <td class="table_head">Category name </td>
                                      <td class="table_head">Option name </td>
                                      <td class="table_head_end">Action</td>
                                    </tr>
                                    <?
								$i = 1;
								while($rscat = mysql_fetch_object($resultcat))
								{
									if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
							  ?>
                                    <tr align="left">
                                      <td width="10%" class="<?=$td_class?>"><?=$rscatname->category_name ?></td>
                                      <td width="12%" class="<?=$td_class?>"><?=$rscat->option_name ?></td>
                                      <td width="10%" class="<?=$td_class?>_end"><a href="option_add.php?oid=<?=$rscat->option_id?>&cat_id=<?=$_GET["cat_id"]?>&action=edit" class="paging_text">&nbsp;</a> &nbsp;&nbsp;&nbsp;<a href="#" class="paging_text" onClick="return deleteOption(<?=$rscat->option_id?>)">Delete </a></td>
                                    </tr>
                                    <?
									$i++;
								}
							  ?>
                                </table></td>
                              </tr>
                            </table></td>
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

