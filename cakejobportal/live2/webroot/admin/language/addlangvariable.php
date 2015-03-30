<?  session_start();
	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	
	require_once("../../classes/pagination.php");
	require_once("includes/functions.php");
	
	$languagedata = get_created_language_shortname();
	
	if(isset($_POST)) { 
		//add_language_variable($_POST);	
	}
	
	$objDb = new db();
	
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
	
	
	$sqlLang = "select * from language";
	
	if((isset($_POST['find_langvid'])) || ($_POST['find_langvid'] != '') || (isset($_POST['lang_page_name'])) || ($_POST['lang_page_name'] != '')){
	
	    $string = strtoupper(trim($_POST['find_langvid']));
	  if($_POST['find_langvid'] != "") {	
 	    $string = preg_replace("/\s+/","_",$string);
	    if(!strpos("+",$string))
	    {
			$pattern = array("/^[\s+]/","/[\s+]$/","/\s/");
			$replace = array("",""," ");
			$string = preg_replace($pattern,$replace,$string);
	    }
	  }
	  	
		$sqlLang .= " WHERE name LIKE '%" . $string . "%' and page_id = ".$_POST['lang_page_name']."";
	}else
	{
		//$sqlLang .= " WHERE page_id = 1";
		$sqlLang .= " WHERE page_id = ".((isset($_REQUEST['page_id']))?$_REQUEST['page_id']:1);	
	}
	
		
	$sqlLang .= " ORDER BY id DESC";
	
	$cPage ="" ;
	$page45="";
	$resultLang1 = $objDb->ExecuteQuery($sqlLang);
	$objDb->ExecuteQuery("SET NAMES utf8");
		
	$rowCount1 = mysql_num_rows($resultLang1);
	
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
	
	$pagination= new gsdPagination($sqlLang,$cPage,'20',$baseURL);	
	$sqlLang = $pagination->rQuery;	
	$resultLang = $objDb->ExecuteQuery($sqlLang);	
	$rowCount = mysql_num_rows($resultLang);
	
	
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Recruit Young</title>
<link rel="stylesheet" type="text/css" href="../styles/job_admin.css">
<script src="../javascript/menubar.js" language="javascript"></script>
<script src="../../javascript/jquery.min.js" language="javascript"></script>

<style>


body {
	margin: 10px auto;
	
	font: 75%/120% Verdana,Arial, Helvetica, sans-serif;
}
p {
	padding: 0 0 1em;
}
.msg_list {
	margin: 0px;
	padding: 0px;
	
}
.msg_head {
	padding: 5px 10px;
	cursor: pointer;
	position: relative;
	background-color:#FFCCCC;
	margin:1px;
}
.msg_body {
	padding: 5px 10px 15px;
	background-color:#F4F4F8;
}
</style>


<script type="text/javascript">

function paging(pageno)
 {
	 document.temp.method = "post";
	 document.form1.action = "addlangvariable.php?cPage=" + pageno;
	 document.form1.submit();
 }

function validate_langvarname()
  { 
        if($("#addnew_input_lanvar").val() != '') {
		
		    $.ajax({
						url: "validate_langvarname.php",
						async: false,
						data: {newlangvar_name:$("#addnew_input_lanvar").val(), selectedpageid:$("#add_lang_page_id").val()},
						datatype: "json",
						success: function (data) {
						
						var obj = jQuery.parseJSON(data);
                        
						    if(obj.result === "YES")
						    { 
							  $("#availablealert").html("<img src='../images/accept.png' style='height: 18px; vertical-align: middle;'>");
							  $("#nameavailable").val("Yes");  
						    }else
						    {
							  $("#availablealert").html("<span style='color:red; font-weight:bold; text-shadow:white -1px 0px 3px;'>Language variable not available!!</span>");
							  $("#nameavailable").val("No");
						    }
						
						}
                  });

       }else
	   {
	       $("#availablealert").html('');
		  $("#addnew_input_lanvar").val('');
	   }
}


$(document).ready(function(){
	//hide the all of the element with class msg_body
	$(".variable_values_div").hide();
	
	//toggle the componenet with class msg_body
	$(".variable_heading").click(function(){
        
		if($("#addNewVariableId").is(":visible") == true)
		{ 
		    $("#addNewVariableId").hide('slow');
		}
		
        if ($(".variable_values_div").is(":visible") == true && $(this).next(".variable_values_div").is(":visible") != true) {
                $(".variable_values_div").hide('slow');
        }
		 
		$(this).next(".variable_values_div").slideToggle('slow');
				
	});
	
	
	$(".addnew").click(function(){ 
	
	    if($(".variable_values_div").is(":visible") == true)
		    $(".variable_values_div").hide('slow');
		  
		$("#addNewVariableId").slideToggle('slow');
	});
	
	
	$("#AddNewVariableForm").submit(function(){
	
	    var form = this;
		var flag = false;
		
		if(form.elements['variable_name'].value == ""){
		  $("#availablealert").html("<span style='color:red; font-weight:bold; text-shadow:white -1px 0px 3px;'>Plesae add language variable name!!</span>");
		  $("#addnewtextareaerror").html(' ');
		  return false;
		}
		
		if(form.elements['nameavailable'].value == "No")
		{
		  $("#availablealert").html("<span style='color:red; font-weight:bold; text-shadow:white -1px 0px 3px;'>Variable name not available!!</span>");
		  $("#addnewtextareaerror").html(' ');
		  return false;
		}
		
        for (i = 0; i < form.elements.length; i++) {
          if(form.elements[i].type == "textarea" && form.elements[i].value != "" && form.elements[i].name == "EN"){
			   flag = true;
          }
        }
		
		if(flag == false){
		
		  for (i = 0; i < form.elements.length; i++) {
			   if(form.elements[i].type == "textarea"){
			       $("#addnewtextareaerror").html("<span style='color:red; font-weight:bold; text-shadow:white -1px 0px 3px;'>English language value is required!!</span>");
				   form.elements[i].focus();
				   break;
			   }
		  }
		   
		}
		
	   return flag;
	   
	});
});


function UpdateVariableForm(texterrorid,formobj) {	
	
	
	if(formobj.elements['translateall'].value == "Yes")   
	{
	   if(formobj.elements['EN'].value != "")
	   {  
	      $("#addnewtextareaerror"+texterrorid).html(' ');
	      return true;
	   }else
	   {
	     $("#addnewtextareaerror"+texterrorid).html("<span style='color:red; font-weight:bold; text-shadow:white -1px 0px 3px;text-align:center;'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;English language value is required if you want to use translate all!!</span>");
		 return false
	   }
	}else
	{
	  return false;
	}
}	



function remove_single_language_variable(varid, formobj)
   {	
 	
	 if(confirm("Are you sure you want to delete this language variable from list?"))
	 {
		vv = "id="+varid;
		vv = vv + "&page_id=" + formobj.elements['langpageid'].value;
		formobj.method = "post";
		<?php 
		  if(isset($_REQUEST['cPage']) && !empty($_REQUEST['cPage'])) {
		?>
		formobj.action ="remove_language_variable.php?cPage=<?=$_REQUEST['cPage']?>&"+vv;  
		<?php
		  }else{
		?>
		formobj.action ="remove_language_variable.php?"+vv;
		<?php } ?>
		formobj.submit();
	 }
}
  


</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif')">
<form name="temp" action="<?=$baseURL?>" method="post"></form>
<form name="form1" action="" method="post"></form>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
          <td><? include("top.php"); ?></td>
     </tr>
     <tr>
          <td background="images/lnk_left.gif"></td>
     </tr>
     <tr>
         <td class="whitebgcolor">
		 
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="700px" height="'slow'" valign="top">
                          <table width="100%" border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td width="772" valign="top" style="background-color:lightSteelBlue;">
                               <table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                                <tr>
                                  <td height="30" class="heading_black" align="center" >&nbsp;<br><span style="font-size:18px;"><b>Language Add Variable</b></span> <br><br></td>
                                </tr>
                                <tr>
                                  <td valign="top"><table width="80%" cellpadding="5" cellspacing="0" align="center">
                                      <tr align="center">
                                        <td width="18%"><a href="index.php"><b>Display Language</b></a></td>
                                        <td width="18%"><a href="addlanguage.php"><b>Add New Language</b></a></td>
                                        <td width="18%"><a href="editlanguage.php"><b>Edit Language</b></a></td>
                                        <td width="18%"><a href="addlanguagepage.php"><b>Add New Language Page</b></a></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                          </tr>
                          
                          <tr align="center">
                            <td><img src="../../images/line.gif" width="772"></td>
                          </tr>
                          
                          <tr>
                            <td height="10"></td>
                          </tr>
						  
                         <tr align="center">
                            <td>
                                <table width="100%">
                                   <tr>
                                     <td>       
                                <div class="main">
                                  <div style="width:910px; margin:0 auto;">   
                                    <div class="addnew" style="float: left; margin-bottom: 30px; margin-top: 45px"> <a href="javascript:void(0)">
                                        <img width="145" src="../images/addnew.png" alt="Add new language variable"></a>
                                    </div>
                                    
                                     <div class="searchvariable" style="float:right;border: 1px solid gray; float: right; padding: 16px 5px; text-align: center; width: 680px;">
                                      <form name="search_langvar" method="post" action="">
                                          <table>
                                            <tr>
                                             <td>
                                               <B>Select page:</B>
                                             </td>
                                              <td>
                                                <?php
												 $sqlLangPage = "select * from job_language_page";
	                                             $resultLangPage = $objDb->ExecuteQuery($sqlLangPage);
	                                             $rowPageCount = mysql_num_rows($resultLangPage);
												?> 
                                                <select name="lang_page_name" style="padding: 2px; min-width:215px;">
                                                
                                                <?php if($rowPageCount > 0)
												      { 
													    //$defaultpageselected = 1;
													    $defaultpageselected = ((isset($_REQUEST['page_id'])) ? $_REQUEST['page_id']:1);
														
														if(isset($_POST['lang_page_name']))
														    $defaultpageselected = $_POST['lang_page_name'];
														
													    while($rowPageData = mysql_fetch_object($resultLangPage))
														{
														   if($defaultpageselected == $rowPageData->id)
														       echo "<option value='".$rowPageData->id."' selected>".$rowPageData->name."</option>";
														   else
														       echo "<option value='".$rowPageData->id."'>".$rowPageData->name."</option>";
														}  
													  }
											    ?>
                                                </select>
                                              </td>
                                              <td>
                                                <input type="hidden" name="pageno" value="<?=$_REQUEST['cPage']?>">
                                                <B>Variable name:</B>
                                              </td> 
                                              <td>
                                                <input style="font-size:14px;padding:2px;" type="text" name="find_langvid" size="30" value="<?=$_POST['find_langvid']?>" >
                                              </td>
                                              <td>
                                                 <input type="image" src="../images/search_button.jpg" value="Find">
                                              </td>
                                            </tr>
                                          </table>
                                       </form>
                                     </div>
                                   </div>  
                                  <div style="clear:both;"></div>
                                  <br>     
                            <div id="addNewVariableId" style="display:none;">
							<form method="post" id="AddNewVariableForm" action="addlangvariable_action.php">
								<input type="hidden" name="pageno" value="<?=$_REQUEST['cPage']?>">
								<input type="hidden" name="controller" value="Variable"/>
								<input type="hidden" name="action" value="Add"/>
                                <input type="hidden" name="nameavailable" value="No" id="nameavailable">
                                <div class="addVarTextDiv" style=" background-color: Grey; padding: 6px; margin-bottom:5px;">
                                <label style="color: white; font-weight: bold;">Select page: </label>
                                 <?php
								 $sqlLangPage = "select * from job_language_page";
								 $resultLangPage = $objDb->ExecuteQuery($sqlLangPage);
								 $rowPageCount = mysql_num_rows($resultLangPage);
								?> 
								<select name="add_lang_page_id" style="padding: 1px; min-width:205px;" id="add_lang_page_id">
								
								<?php 
								     if($rowPageCount > 0)
									  { 
										$defaultpageselected = 1;
										
										if(isset($_POST['lang_page_name']))
											$defaultpageselected = $_POST['lang_page_name'];
										
										while($rowPageData = mysql_fetch_object($resultLangPage))
										{
										   if($defaultpageselected == $rowPageData->id)
											   echo "<option value='".$rowPageData->id."' selected>".$rowPageData->name."</option>";
										   else
											   echo "<option value='".$rowPageData->id."'>".$rowPageData->name."</option>";
										}  
									  }
								?>
								</select>
				
                                 <label style="color: white; font-weight: bold; padding-left:10px;">Enter Variable Name: </label>
								 <input type="text" size="33" style="font-size:13px; padding:1px;" id="addnew_input_lanvar" onKeyUp="validate_langvarname();" name="variable_name"/>
                                
                                <span id="availablealert" style="padding-left:10px;"></span>
							    </div>
							
							<div style="background-color: DimGrey;height: 230px;overflow: auto;padding-bottom: 5px;padding-top: 1px;width: 976px;">
								<table><tr>
								<?php foreach($languagedata as $lagRows){?>
									<td>
									<div class="language_textarea" style="float:left; padding-left:5px; padding-right:5px;">
										
										<div class="addVarTop" style="background-color: LightGoldenRodYellow; margin-bottom: 2px; padding: 2px; text-align: center;">
                                        <span style="font-weight:bold;"><?=$lagRows->language_name?></span>
									    <?php echo "<img height='20' style='vertical-align: middle;' width='30' src='../../langues/".$lagRows->language_name."/images/".$lagRows->language_icon."'/>"; ?>
										</div>
										<textarea name="<?php echo $lagRows->language_shortname; ?>" rows="10" cols="36"></textarea>
									</div>
                               </td>
								<?php } ?>
                                </tr>
                                </table>
								 <div style="clear:both"></div>
							</div>
							
                             <div class="addVarTextDivsubmit" style="background-color: Grey; margin-top: 4px; padding: 3px;">
                             
                                <span style="color:#FFFFFF; font-weight:bold;">
                                 <input type="checkbox" name="translateall" style="margin-left:30px; vertical-align:sub;" value="Yes" checked>
                                  Translate all language variable?
                                </span>
                                
                                <input type="submit" name="" style="font-weight: bold; margin-left: 40px; padding: 2px 15px;" value="Add" id="addVariableButton"/>
                                <span id="addnewtextareaerror" style="padding-left:10px;"></span>
							 </div>
                            
							</form>
							
						</div>
                                       
                                       </td>
                                       
                                     </tr>
                                     
                                     
                                    </table>
                                       
                   <div style="clear:both;"></div><br><br>
                    
                    <div class="msg_list">
                                     
                   <?php 

				   while($values = mysql_fetch_object($resultLang))
					   { 
				   ?>

<p class="variable_heading" style="background-color: lightGray; border-bottom: medium solid DimGrey;  text-align:left; color: blue; cursor: pointer; font-weight: bold; height: 15px; line-height: 29px; margin: 0; padding-left: 52px; text-align: left;"> <?=$values->name?> </p>

   
                          <div class="variable_values_div">
                           <div style="background-color: DimGrey; display: block; padding-bottom: 5px; padding-top: 1px; width:976px; height:230px; overflow:auto;">
                          <form name="updatelang_var" method="post" id="UpdateVariableForm<?=$values->id?>" action="update_langvariable.php">
                               <input type="hidden" name="controller" value="Variable"/>
								<input type="hidden" name="action" value="Update"/>
                                <input type="hidden" name="variableid" value="<?=$values->id?>"/>
                                <input type="hidden" name="langpageid" value="<?=$values->page_id?>">
                               <table><tr>
                               <?php foreach($languagedata as $values1) { ?>
                               <td>
                               <div class="language_textarea" style="float:left; padding-left:5px; padding-right:5px;">
                               
                               <div class="addVarTop" style="background-color: LightGoldenRodYellow; margin-bottom: 2px; padding: 2px; text-align: center;">
                                <span style="font-weight:bold;"><?=$values1->language_name?></span>
							 <?php echo "<img height='20' style='vertical-align: middle;' width='30' src='../../langues/".$values1->language_name."/images/".$values1->language_icon."'/>"; ?>
							   </div>
                               <?php
                                    $filedname = $values1->language_shortname;
								$fielddata = stripslashes(preg_replace('/\s\s+/', ' ', $values->$filedname));
							   ?>
 <textarea name="<?=$values1->language_shortname?>" rows="10" cols="36"><?=$fielddata?></textarea>
                               </div>
                              </td>
                               <?php } ?>
                               </tr>
                               </table>
                               
                               <div style="clear:both"></div>
                               </div>
                               
                               
                             <div class="addVarTextDivsubmit" style="background-color: Grey; margin-top: 4px; padding: 3px; text-align:left; margin-bottom:25px;">
                             
                                <span style="color:#FFFFFF; font-weight:bold;">
                                 <input type="checkbox" name="translateall" style="margin-left:30px; vertical-align:sub;" value="Yes">
                                  Translate all variable based on English?
                                </span>
                                
                                <input type="submit" name="" style="font-weight: bold; margin-left: 40px; padding: 2px 15px;" value="Update" onClick="return UpdateVariableForm('<?=$values->id?>',this.form)"/>
                                <input type="button" name="" style="font-weight: bold; margin-left: 40px; padding: 2px 15px;" value="Delete" onClick="remove_single_language_variable('<?=$values->id?>',this.form)"/><span id="addnewtextareaerror<?=$values->id?>" style="padding-left:15px;"></span>
							 </div>
                               
                              </form> 
                               
                            </div>
                            
                       <div style="clear:both;"></div> 
                   <?php	     
					   }
				   ?>
                   
                   <br>         
                   <div style="text-align:center"><? if($rowCount>0) echo $pagination->buildNavigation('paging_text');?></div>          
                                </div>                            
                     </div>
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
		   
         </td>
     </tr>    
     <tr>
	 	<td>
			<? include("bottom.php"); ?>
		</td>          
     </tr>
</table>
</body>
</html>
