<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?		
		require_once("../../classes/db_class.php");
		$objDb = new db();
		$sqlactive = "select * from job_jobseeker where seeker_status=1";
		$resultactive = $objDb->ExecuteQuery($sqlactive);
		$noactive=mysql_num_rows($resultactive);
		$sqlinactive = "select * from job_jobseeker where seeker_status=0";
		$resultinactive = $objDb->ExecuteQuery($sqlinactive);
		$inactive=mysql_num_rows($resultinactive);
		$sqlall = "select * from job_jobseeker ";
		$resultall = $objDb->ExecuteQuery($sqlall);
		$noall=mysql_num_rows($resultall);

?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
</head>
<body onload="MM_preloadImages('../images/login1.gif','../images/job_search1.gif','../images/upload_cv1.gif','../images/employers1.gif','../images/features1.gif')">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("top.php"); ?></td>
     </tr>
     <tr>
          <td background="../images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="200px" align="center"><? //include("left.php"); ?></td>
						<td width="1px"><? include("left.php"); ?></td>
						<td width="769px" height="350">
							<table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0" >
								<tr bgcolor="#2e6e8a" class="home_white_name">
								  <td width="6%" height="30" align="center" class="home_white_name">#</td>
								  <td width="16%" height="30" align="left" class="home_white_name" >Id</td>
								  <td width="19%" align="left" class="home_white_name" >Seeker Name </td>
								  <td width="18%" height="30" align="left" class="home_white_name" >City</td>
								  <td width="17%" height="30" align="left" class="home_white_name" >Reg Date </td>
								  <td width="9%" align="left" valign="middle" class="home_white_name" >status</td>
								  <td width="7%" align="left" valign="middle" class="home_white_name">View</td>
							    </tr>
								<?
									$cPage ="" ;
									$cPage = ( isset($_REQUEST['cPage']) ) ? $_REQUEST['cPage'] : '1';
									$baseURL= $_SERVER['PHP_SELF'];
									
									$j = 0;
									if(isset($_REQUEST['cPage']))
									{
									$page = $_REQUEST['cPage'];
									$j=($page-1)*10 ;
									}
									
									$pagination= new gsdPagination($sqlboard,$cPage,'10',$baseURL);	
									$sqlboard = $pagination->rQuery;
									
									$resultboard = $obj_db->ExecuteQuery($sqlboard);	
									
												
									while($rsboard=mysql_fetch_object($resultboard))
									{
									$statusboard = $rsboard->board_status ;
									$sqlcat="select * from  surf_category where cat_id='".$rsboard->cat_id."'";
									$resultcat = $obj_db->ExecuteQuery($sqlcat);
									$rscat=mysql_fetch_object($resultcat);
									$j=$j+1;
								?>
								<tr bgcolor="#FFFFFF" class="user_list_subhead">
								  <td align="center" class="user_list_subhead"><?=$j?></td>
								  <td width="16%" align="left" class="user_list_subhead">&nbsp;</td>
								  <td width="19%" align="left" class="user_list_subhead">&nbsp;</td>
								  <td width="18%" align="left" class="user_list_subhead">&nbsp;</td>
								  <td width="17%" align="left" valign="middle" class="user_list_subhead">&nbsp;</td>
									<td align="left" class="adminsubhead1">&nbsp;&nbsp;&nbsp;<a href="../board_edit.php?id=<?=$rsboard->board_id?>&catid=<?=$rsboard->cat_id?>"></a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="delSelect('<? echo($rsboard->board_id)?>')"></a></td>
									<td align="left" class="adminsubhead1">&nbsp;&nbsp;</td>
							  </tr>
								<? } ?>
								<? if($rowCount > 0)
								{ ?>
									<tr>
								  <td colspan="7" align="left" bgcolor="#FFFFFF"></td>
								  </tr>
								<tr bgcolor="#FFFFFF">
								  <td colspan="7" align="left" bgcolor="#FFFFFF">&nbsp;<!--   <input name="AddToGroup" type="submit" class="button_style" onClick="return setGroup()" value="Add To Group">   --></td>
								  </tr>
								<tr bgcolor="#FFFFFF">
								  <td colspan="7" align="left" bgcolor="#FFFFFF"></td>
								</tr>
								<? } ?>		
								</table>
						
						</td>						
					</tr>
				</table>  
			<!-- Page Body End-->		
         </td>
     </tr>
     <tr>
          <td height="45" class="bottom_link_bg">&nbsp;</td>
     </tr>
     <tr>
          <td height="6"></td>
     </tr>
     <tr>
          <? include("bottom.php"); ?>
     </tr>
</table>
</body>
</html>

