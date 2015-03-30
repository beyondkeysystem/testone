<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../includes/functions.php");
	$objDb = new db();
	$rowCount=1;
	$rows="";
	$cols="";
	$option="";
	$resultcol="";
	$resulrow ="";
	
	$sql = "select field_value from job_grade_level";
	$sql1 = "select field_value from job_grade_level where field_row = 0";
	$sql2 = "select field_value from job_grade_level where field_column = 0";
	$res= $objDb->ExecuteQuery($sql);
	$rwcnt = mysql_num_rows($res);
	$res1= $objDb->ExecuteQuery($sql1);
	$cols = mysql_num_rows($res1);
	$res2 = $objDb->ExecuteQuery($sql2);
	$rows = mysql_num_rows($res2);
	
	
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
 
 
 
 function addGradeLevel()
 {
 	
	if(validateGradeLevel())
	{
		document.form1.method="post";
		document.form1.action="gradelevel_add_action.php";
		document.form1.submit();
	}
		/*document.form1.method="post";
		document.form1.action="gradelevel_add_action.php";
		document.form1.submit();*/
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
                                  <td height="30" class="heading_black" >&nbsp;Add Grade &amp; Level </td>
                                </tr>
								<tr>
                                  <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                      <tr>
                                        <td width="5"></td>
                                        <td width="98%">You can add the advert here. </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td valign="top"></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><table width="600" border="0" align="left" cellpadding="6" cellspacing="0" >
									   <tr >
									    <td colspan="3" height="10"  ></td>
									  </tr>
									  <tr style="display:none">
									    <td   >&nbsp;</td>
                                        <td   >Type </td>
                                        <td   >
										<select name="entry_type" id="entry_type">
											<option value="">--select type--</option>
											<option value="1"><?="level row"?></option>
											<option value="2"><?="grade column"?></option>
											<option value="3"><?="value"?></option>
										</select>
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td   >&nbsp;</td>
                                        <td   >Title</td>
                                        <td   >
                                          <input name="field_value" type="text" size="40">
                                          <img src="../../images/star.gif"> </td>
                                      </tr>
									  <tr>
									    <td >&nbsp;</td>
                                        <td  valign="top">Position</td>
                                        <td >row
                                        <input name="row" type="text" size="12" >                                        
                                        <img src="../../images/star.gif">
                                          &nbsp;column
                                          <input name="column" type="text" size="8">                                          <img src="../../images/star.gif"> </td>
									  </tr>
									  
										<tr>
										  <td width="2%" valign="top"   >&nbsp;</td>
											<td width="19%" valign="top"   >&nbsp;</td>
											<td width="79%" height="30" align="left" valign="top"    >												<img src="../../images/add.gif" border="0" style="cursor:pointer" onClick="return addGradeLevel()">&nbsp;&nbsp;&nbsp;<a href="home.php"><img src="../../images/cancel.gif" border="0"></a>
										  </td>
										</tr>
										<? if($rwcnt <= 0) {?>
										<tr>
									    <td >&nbsp;</td>
                                        <td >No value set</td>
                                        <td >&nbsp;</td>
                                     	</tr>
										<? } else {?>
										<span id="grade_table">
										<tr>
											<td colspan="3">
											 <table width="95%" cellpadding="6" cellspacing="0" class="table_black_border">
											  <? 
											  	$i=0;
												for($i=0;$i<=$rows;$i++){ ?>
											  <tr>
												<? if($i == 0){ ?>
												<td class="table_head">&nbsp;</td>
												<? } else{?>
												<td class="table_head"><?=showElement($i,0)?></td>
												<? }?>
												<? for($j=1;$j<$cols;$j++){
													if($i == 0){
													?>
												<td class="table_head"><?=showElement(0,$j)?></td>
												<? } else{?>
												<td><?=showElement($i,$j)?></td>
												<? } 
												} //if($i==0){?>
												<!--<td>add more..</td>-->
											  </tr>
											  <? //}
											  }
												?>												
											</table>
										</td>
									</tr>
									</span>
									<? } ?>
							  </table>
											</td>
										</tr>
									</table>
									</td>
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

