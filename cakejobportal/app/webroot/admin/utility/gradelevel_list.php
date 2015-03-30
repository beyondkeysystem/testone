<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
	require_once("../../includes/functions.php");	
	$objDb = new db();
	$rowCount="";
	$rows="";
	$cols="";
	$option="";
	$resultcol="";
	$resulrow ="";
	
		$sql1 = "select field_value from job_grade_level where field_row = 0";
		$sql2 = "select field_value from job_grade_level where field_column = 0";
		$sql = "select field_value from job_grade_level";
		$res = $objDb->ExecuteQuery($sql);
		$rowCount = mysql_num_rows($res);
		$res1 = $objDb->ExecuteQuery($sql1);
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
 
 function addGradeLevel(msg)
 {
 	if(msg=="addnew")
	 {
		if(validateGradeLevel())
		{
			document.form1.method="post";
			document.form1.action="gradelevel_add_action.php?add=new";
			document.form1.submit();
		}
	}
	 else if(msg=="row" || msg=="row")
	 {
		document.form1.method="post";
		document.form1.action="gradelevel_add_action.php?add="+msg+"&rows=<?=$rows?>&columns=<?=$cols?>";
		document.form1.submit();
		}
		else if(msg=="update")
		{
		 //alert(msg);
		document.form1.method="post";
		document.form1.action="gradelevel_update_action.php";
		document.form1.submit();
		}
 }
 
 function deleteThis(position,val)
 {	//alert(val);return false;
	var what = "";
	if(position=="field_row")
  	what = "level";
  	else
  	what = "grade";  
 	
	if(confirm("Are you sure you want to delete this "+ what +" ??"))
	{
		document.form1.method="post";
		document.form1.action="gradelevel_delete.php?position="+position+"&val="+val;
		document.form1.submit();
	} 
	
 }
function showEdit(id,obj_n){
	//alert(obj_n);
	var li = document.getElementById(id);
	var obj = document.getElementById(obj_n);
	if(li.style.display!='none'){
	li.style.display = 'none';
	}else
	{
	li.style.display = '';
	}
	
	if(obj.style.display!='none'){
	obj.style.display = 'none';
	//obj.value="";
	}else
	{
	obj.style.display = '';
	obj.select();
	}
	//document.getElementById(obj).style.display = '';
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
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
                      <tr>
                        <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                            <tr>
                              <td width="73%" height="30" class="headingRegister" >&nbsp;<span class="heading_black"> Grade / Level Table </span></td>
                              <td width="27%" align="right" class="normal_text" >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                                  <tr>
                                    <td width="5"></td>
                                    <td width="98%">Table of grades and levels. </td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      <?							
							if($rowCount <= 0)
							{ ?>
							 <tr>
                        		<td>
									<table  class="table_black_border" cellpadding="6" cellspacing="0" border="0"  width="100%">
									 <tr class="table_head">
                              			<td class="table_head">&nbsp;</td>
										<td align="center" class="table_head">Grading system </td>
                            		</tr>
									 <tr class="table_head">
                              			<td align="center" class="table_head">Level</td>
										<td class="table_head">&nbsp;</td>
                            		</tr>
                           			 <tr>
                              			<td colspan="2" align="center" class="alter">No Grade & Level Value Set.<a href="gradelevel_add.php">Click here </a>to add values</td>
									  </tr>
								  </table>
								</td>
							</tr>
							<? }
							else
							{
						?>
                      <tr>
                        <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                            <tr>
                              <td><img src="../images/line.gif" width="772"></td>
                            </tr>
                            <tr>
                              <td class="error"  align="center">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center">
							  <table width="100%" cellpadding="5" cellspacing="0" class="table_black_border">
							  <tr align="left" class="table_head" >
                                    <td width="139" class="table_head">Level</td>
                                    <td width="382"  colspan="<?=$cols+1?>" align="center" class="table_head">Grading system </td>
                                  </tr>
							  	  <?	$i=0;
									for($i=0;$i<=$rows;$i++){ ?>
                                  <tr align="left" height="25px">
                                    <? if($i == 0){ ?>
                                    <td class="table_head">&nbsp;</td>
                                    <? } else{?>
                                    <td class="table_head"><a href="#" onClick="showEdit(this.id,'<?="level_".$i?>');" id="ll_<?=$i?>"  class="text_gray_bold">
                                      <?=showElement($i,0)?>
                                   </a>
                                    <input name="level[<?=$i?>][<?=$j?>]" type="text" id="level_<?=$i?>" style="display:none;" onClick="showEdit('<?="ll_".$i?>',this.id);" value="<?=showElement($i,0)?>" size="12" ></td>
                                    <? }?>
                                    <? for($j=1;$j<=$cols;$j++){
										if($i%2 == 1)
										$td_class = "table_row";
									else
										$td_class = "table_alternate_row";
										if($i == 0){
										?>
                                    <td width="18" class="table_head"><a href="#" onClick="showEdit(this.id,'<?="grade".$i.$j?>');" id="lg_<?=$i?><?=$j?>" class="text_gray_bold"><?=showElement(0,$j)?></a><input name="grade[<?=$i?>][<?=$j?>]" type="text" id="grade<?=$i?><?=$j?>" style="display:none;" onClick="showEdit('<?="lg_".$i.$j?>',this.id);" value="<?=showElement($i,$j)?>" size="5"  ></td>
                                    <? } else{?>
                                    <td width="74" class="<?=$td_class?>"><a href="#" id="ele<?=$i?><?=$j?>" onClick="showEdit(this.id,'<?="elemen".$i.$j?>');" class="<?=$td_class?>"><?=showElement($i,$j)?></a><input name="elemen[<?=$i?>][<?=$j?>]" type="text" id="elemen<?=$i?><?=$j?>" style="display:none;" onClick="showEdit('<?="ele".$i.$j?>',this.id);" value="<?=showElement($i,$j)?>" size="5" >                                    </td>
                                    <? } ?>
									<? } if($i == 0){?>
									<td width="48" class="table_head">&nbsp;</td>
									<? } else {?>
									<td width="49" class="subhead_gray" align="right"><a href="#" onClick="deleteThis('field_row','<?=$i?>');">DELETE</a></td>
									<? } ?>
                                  </tr>
                                  <? } ?>
								  <tr class="table_head" align="left" height="25px">
								  	<? for($k=0;$k<=$cols;$k++){?>
									<? if($k==0){?>
									<td class="table_head">&nbsp;</td>	
									<? } else {?>
								  	<td ><a href="#" onClick="deleteThis('field_column','<?=$k?>');">DELETE</a></td>
									<? }  }?>
									</tr>
                                </table>
							  </td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  onClick="location.href='home.php';"><img src="../../images/back.gif" border="0"></a>&nbsp;&nbsp;&nbsp;<img  src="../../images/update_admin.gif" border="0" style="cursor:pointer" onClick="addGradeLevel('update');"></td>
                      </tr>
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
                    </table></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <!-- Page Body End-->
      </form></td>
  </tr>
  <tr>
    <td><? include("includes/bottom.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>

