<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
		
	require_once("../../includes/functions.php");
	$action = "";
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
		$sql = "select field_value from job_grade_level";
		$res = $objDb->ExecuteQuery($sql1);
		//$rowCount = mysql_num_rows($res);
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
 
 function addGradeLevel(msgg)
 { 	
 	var msg =""+msgg;

 	if(msg=="addnew")
	 { 
		/*if(validateGradeLevel())
		{
			document.form1.method="post";
			document.form1.action="gradelevel_add_action.php?add=new";
			document.form1.submit();
		}*/
			document.form1.method="post";
			document.form1.action="gradelevel_add_action.php?add=new";
			document.form1.submit();
	}
	 else if(msg=="row" || msg=="col")
	 {
		document.form1.method="post";
		document.form1.action="gradelevel_add_action.php?add="+msg+"&rows=<?=$rows?>&columns=<?=$cols?>";
		document.form1.submit();
		}
		else
		{
		// alert(msg); return false;
		document.form1.method="post";
		document.form1.action="gradelevel_update_action.php?addrowcol";
		document.form1.submit();
		}
 }
 
function showEdit(id,obj_n){
	//alert(id);
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
	}else
	{
	obj.style.display = '';
	obj.select();
	}
	//document.getElementById(obj).style.display = '';
}
function showEntry_type(entry,row,col){

	if(entry==2){
		document.form1.rows.value=0;
		document.form1.column.value = parseInt(col)+1;
	}
	else if(entry==1){
		document.form1.rows.value=parseInt(row)+1;
		document.form1.column.value=0;
	}

}
function showInnerValue(row,col,cont){
	var contrl = ""+cont;
	var i = 1;
	if(contrl=='row'){ 
	for(i=1;i<=col;i++){
		document.getElementById("ele"+row+i).style.display='none';
		document.getElementById("elemen"+row+i).style.display='';
		}
	}
	else 
	{
			for(i=1;i<=row;i++){
			document.getElementById("ele"+i+col).style.display='none';
			document.getElementById("elemen"+i+col).style.display='';
			}
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

</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif');<? if(isset($_GET['addact']) and $_GET['addact']=="row"){?>showEdit('<?="ll_".$rows?>','level_<?=$rows?>');showInnerValue('<?=$rows?>','<?=$cols?>','row');<? } else if(isset($_GET['addact']) and $_GET['addact']=="col"){?>showEdit('<?="lg_0".$cols?>','grade0<?=$cols?>');showInnerValue('<?=$rows?>','<?=$cols?>','col');<? }?>">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include("includes/top.php"); ?></td>
  </tr>
  <tr>
    <td background="images/lnk_left.gif"></td>
  </tr>
  <tr>
    <td class="whitebgcolor"><form name="form1" method="post" >
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
                                    <td width="5">&nbsp;</td>
                                    <td width="98%">Table of grades and levels. </td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      <?							
							if($rowCount <= 0 )
							{ 
							$action = "addnew"; ?>
                      <tr>
                        <td><table  align="left" cellpadding="6" cellspacing="0" border="0" >
                            <tr>
                              <td><img src="../images/line.gif" width="772"></td>
                            </tr>
                            <tr>
                              <td colspan="2" >Type
                                <select name="entry_type" id="entry_type" onChange=" showEntry_type(this.value,'<?=$rows?>','<?=$cols?>');">
                                  <option value="">--select type--</option>
                                  <option value="1">
                                  <?="level row"?>
                                  </option>
                                  <option value="2">
                                  <?="grade column"?>
                                  </option>
                                </select>
                                <img src="../../images/star.gif"></td>
                            </tr>
                            <tr>
                              <td colspan="3"   >Title&nbsp;
                                <input name="field_value" type="text" size="40">
                                <img src="../../images/star.gif"> </td>
                            </tr>
                            <tr>
                              <td colspan="3" >Position &nbsp;row
                                <input name="rows" type="text" id="rows" size="12" readonly="readonly" >
                                <img src="../../images/star.gif"> &nbsp;column
                                <input name="column" type="text" size="8" readonly="readonly">
                                <img src="../../images/star.gif"> </td>
                            </tr>
                            <tr>
                              <td colspan="3" ><img src="../../images/add.gif" border="0" style="cursor:pointer" onClick="return addGradeLevel('<?=$action?>')">&nbsp;&nbsp;<img src="../../images/cancel.gif" border="0"></td>
                            </tr>
                            <?	}else{ $action = "add"
							
						?>
                            <tr>
                              <td align="left"><table align="left"  cellpadding="5" cellspacing="0" class="table_black_border">
                                  <tr align="left">
                                    <td width="100px" class="table_head">Level&nbsp;<a href="#" onClick="return addGradeLevel('row')" class="blue_title" title="add level row">(+)</a></td>
                                    <td colspan="<?=$cols+1?>" align="center" class="table_head">Grading system&nbsp;<a href="#" onClick="return addGradeLevel('col')"  class="blue_title" title="add grade column">(+)</a></td>
                                  </tr>
                                  <?	
								  	$i=0;
									for($i=0;$i<=$rows;$i++){ ?>
                                  <tr align="left" height="25px">
                                    <? if($i == 0){ ?>
                                    <td class="table_head" width="100px">&nbsp;</td>
                                    <? } else{?>
                                    <td width="100px" align="left" class="table_head"><a href="#" onClick="showEdit(this.id,'<?="level_".$i?>');" id="ll_<?=$i?>"  class="text_gray_bold">
                                      <?=wordwrap(showElement($i,0),25,"<br>")?>
                                      </a>
                                      <input name="level[<?=$i?>][0]" type="text" id="level_<?=$i?>" style="display:none;" onClick="showEdit('<?="ll_".$i?>',this.id);" value="<?=showElement($i,0)?>" size="10" >
                                    <a href="#" onClick="deleteThis('field_row','<?=$i?>');" class="blue_title" title="delete">(-)</a></td>
                                    <? }?>
                                    <? for($j=1;$j<=$cols;$j++){
										if($i%2 == 1)
											$td_class = "table_row";
										else
											$td_class = "table_alternate_row";
										if($i == 0){
										?>
                                    <td width="100px" align="left"  class="table_head"><a href="#" onClick="showEdit(this.id,'<?="grade".$i.$j?>');" id="lg_<?=$i?><?=$j?>" class="text_gray_bold">
                                      <?=wordwrap(showElement(0,$j),25,"<br>")?>
                                      </a>
                                      <input name="grade[<?=$i?>][<?=$j?>]" type="text" id="grade<?=$i?><?=$j?>" style="display:none;" onClick="showEdit('<?="lg_".$i.$j?>',this.id);" value="<?=wordwrap(showElement($i,$j),15,"<br>")?>" size="5">
                                    <a href="#" onClick="deleteThis('field_column','<?=$j?>');" class="blue_title" title="delete">(-)</a></td>
                                    <? } else{?>
                                    <td width="53px" class="<?=$td_class?>"><a href="#" id="ele<?=$i?><?=$j?>" onClick="showEdit(this.id,'<?="elemen".$i.$j?>');" class="text_gray">
                                      <?=wordwrap(showElement($i,$j),15,"<br>")?>
                                      </a>
                                      <input type="text" name="elemen[<?=$i?>][<?=$j?>]" value="<?=wordwrap(showElement($i,$j),15,"<br>")?>" style="display:none;" onClick="showEdit('<?="ele".$i.$j?>',this.id);" id="elemen<?=$i?><?=$j?>" size="5"></td>
                                    <? } }?>
                                  </tr>
                                  <? }
									?>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../images/add.gif" border="0" style="cursor:pointer" onClick="return addGradeLevel('<?=$action?>')">&nbsp;&nbsp;<img src="../../images/update_admin.gif" border="0" style="cursor:pointer" onClick="return addGradeLevel('<?=$action?>')">&nbsp;&nbsp;<a href="#"  onClick="location.href='home.php';"><img src="../../images/back.gif" border="0"></a></td>
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
