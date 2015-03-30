<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	//require_once("../../classes/db_class.php");
	require_once("../../classes/class_db.php");
	require_once("../../includes/functions.php");
	global $objDb ;
	$objDb->Connection() ;
	$action ="";
	$date = "";
	$month = "";
	$year = "";
	$vcodeArr = array();
	if( isset($_GET['action']) and $_GET['action']!="" ) {
		$action = $_GET['action'];
	}
	else {
		$action = "add";
	}
	
	if( isset($_GET['vid']) and $_GET['vid']!="" ) {
		$code_id = $_GET['vid'];
	}
	if (	( $action == "edit" ) && ( isset($_GET['vid'] ) && $_GET['vid'] !="" ) ){
		$sqlVCode = "select * from job_voucher_code where code_id = ". $code_id ;
		$resVCode = $objDb->ExecuteQuery($sqlVCode); 
		if( mysql_num_rows($resVCode) > 0 ) {
			$vcodeArr = mysql_fetch_array($resVCode) ;
		}
	}
	
	//print_r($vcodeArr);	
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
 
 function setCode( code ){
	this.document.forms[0].voucher_code.value = code;
 }
 
 function check_plan_checked( )
	{
		//alert(val);
		var len = this.document.forms[0].plan_id.length;	
		var total=0;
		for(var j = 0; j <=len-1; j++) 
		{
			if(this.document.forms[0].plan_id[j].type == "checkbox")
			{		
				if(this.document.forms[0].plan_id[j].checked==true)
				{
						total++;
				}
				
			}
		}
		if(total==0)
		{
			alert("Please select at-least one plan");
			return false;
		}
		return true;
	}
	
	function check_emp_checked( )
	{
		//alert("hi");
		var len = this.document.forms[0].rec_id.length;	
		var total=0;
		for(var j = 0; j <=len-1; j++) 
		{
			if(this.document.forms[0].rec_id[j].type == "checkbox")
			{		
				if(this.document.forms[0].rec_id[j].checked==true)
				{
						total++;
				}
				
			}
		}
		if(total==0)
		{
			alert("Please select at-least one client");
			return false;
		}
		return true;
	}
	
	function validate_vcode() {	
		if( ! checkBlank("Please enter voucher code or generate new ", this.document.forms[0].voucher_code ) ) { return false; }	
		if( ! checkDate("Please enter valid expiry date ","expiry",true) ) { return false; }
		if( ! validate_vcode.arguments[0] ) { 
			if( ! compareDateArrayToday("Expiry date should not be less than or equal to current date",this.document.forms[0].expiry_date, this.document.forms[0].expiry_month, this.document.forms[0].expiry_year) ) { return false; }
		}
		if( ! checkBlank("Please enter number of uses" , this.document.forms[0].no_of_uses ) ) { return false; }
		if (! checkNumber("Please enter numbers only in the 'number of uses' field.",this.document.forms[0].no_of_uses ) ) { return false; } 
		if ( this.document.forms[0].no_of_uses.value <= 0) { alert("Number of uses should be greater than zero"); return false; }		
		if( this.document.forms[0].planOpt[1].checked) {
			if( !check_plan_checked() ) { return false; }
		}
		if( this.document.forms[0].opt[1].checked) {
			if( !check_emp_checked() ) { return false; }
		}
				
		//this.document.forms[0].action = "code_add_action.php?action="+ $action ;
		this.document.forms[0].submit() ;
	}
	
	function showHidePlan(rid) {
		if( this.document.forms[0].opt[0].checked) {
			document.getElementById(rid).style.display = 'none';
		}
		else {
				if( this.document.forms[0].opt[1].checked) {
				document.getElementById(rid).style.display = '';
				}
		}		
		
	}
	function showHideClient(rid) {		
		if( this.document.forms[0].planOpt[0].checked) {
				document.getElementById(rid).style.display = 'none';
			}
			else {
				if( this.document.forms[0].planOpt[1].checked) {
				document.getElementById(rid).style.display = '';
				}
			}
		
	}
// code for ajax
	function showCode(){
	document.getElementById("content1").innerHTML  = '';	
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp==null) { alert ("Your browser does not support AJAX!");  return; } 
	var url = "generateRandKey.php";	
	xmlHttp.onreadystatechange = function(){		
		if (xmlHttp.readyState==4) {			
		if ( xmlHttp.responseText ) {
			setCode(xmlHttp.responseText) ;
			} else { alert("Sorry ! unable to perform this operation"); return false; }
		}
	};
	xmlHttp.open("GET", url, true);
	xmlHttp.send(null);
	
}

</script>
</head>
<body onLoad="MM_preloadImages('images/home1.gif','images/job_seekers1.gif','images/employers_admin1.gif','images/utility1.gif','images/signout1.gif');">
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><? include("includes/top.php"); ?></td>
  </tr>
  <tr>
    <td background="images/lnk_left.gif"></td>
  </tr>
  <tr>
    <td class="whitebgcolor"><form name="form1" method="post" action="code_add_action.php?action=<?=$action?>" >
        <!-- Page Body Start-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="700px" height="400" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                  <td width="772" valign="top"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                      <tr>
                        <td height="30" class="heading_black" >&nbsp;<? if( $action == "edit" ) { echo "Edit"; } else { echo "Add"; }?> Voucher Code</td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                              <td width="5"></td>
                              <td width="98%">You can generate and <? if( $action == "edit" ) { echo "edit"; } else { echo "add"; }?> Voucher Code here. </td>
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
                  <td align="left" valign="top"><table width="767" border="0" align="left" cellpadding="6" cellspacing="0" >
                      <tr >
                        <td colspan="3" height="10"  ></td>
                      </tr>
                      <? if( isset($_GET['msg']) and $_GET['msg'] =="add") {?>
                       <tr >
                        <td colspan="3" height="10"  class="error"  align="center" >Voucher code added sucessfully.</td>
                      </tr>
                      <? } ?>
                      <? if( isset($_GET['msg']) and $_GET['msg'] =="edit") {?>
                       <tr >
                        <td colspan="3" height="10"  class="error"  align="center" >Voucher code updated sucessfully.</td>
                      </tr>
                      <? } ?>
                      <? if( isset($_GET['msg']) and $_GET['msg'] =="Exist") {?>
                       <tr >
                        <td colspan="3" height="10"  class="error"  align="center" >Voucher code already exist.</td>
                      </tr>
                      <? } ?>
                      <tr>
                      <tr>
                        <td   >&nbsp;
                        <? //$vcode = randKeyGenerate (); ?></td>
                        <td   >Voucher code</td>
                        <td   valign="middle" ><div  id="content1" style="display:none">Content</div>
                          <input name="voucher_code" type="text" id="voucher_code"  size="30"  class="blue_title" <? if( $action == "edit" && $vcodeArr['voucher_code'] != "" ) { ?>value="<?=$vcodeArr['voucher_code']?>"<? } ?> >
                          <img src="../../images/star.gif">&nbsp;<a href="#0" onClick="return showCode();"><img src="../../images/generate_new_code.gif" width="112" height="22" border="0" align="absmiddle"></a></td>
                      </tr>
                      <tr>
                        <td   >&nbsp;<input type="hidden" name="code_id" id="code_id" value="<?=$code_id?>" ></td>
                        <td   >Expiry date</td>
                        <td   > <? if( $action == "edit" && $vcodeArr['expiry_date'] != "" ) {?><?=createDateVoucher('expiry',$vcodeArr['expiry_date'])?><? } else { ?><?=createDateVoucher('expiry')?><? } ?><img src="../../images/star.gif" alt="man2"> </td>
                      </tr>
                      <tr>
                        <td   >&nbsp;</td>
                        <td   >Number of use</td>
                        <td   ><input name="no_of_uses" type="text" id="no_of_uses" <? if( $action == "edit" && $vcodeArr['no_of_uses'] != "" ) { ?>value="<?=$vcodeArr['no_of_uses']?>"<? } ?>>
                          <img src="../../images/star.gif" alt="man4"> </td>
                      </tr>
                      <tr>
                        <td   >&nbsp;</td>
                        <td   >Plans</td>
                        <td   ><input type="radio" name="planOpt" value="0" id="planOpt"  onClick="showHideClient('planRow');" <? if( $action == "edit" && $vcodeArr['plan_id'] == "all" ) {?>checked<? } else echo "checked"; ?>>
                          &nbsp;All plans&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="planOpt" id="planOpt" value="1" onClick="showHideClient('planRow');" <? if( $action == "edit" && $vcodeArr['plan_id'] != "all" ) {?>checked<? } ?>>
                          Selected plans&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../images/star.gif" alt="man1"> </td>
                      </tr>
                      <tr id="planRow" <? if( $action == "add") {?>style="display:none"<? } else if( $action == "edit" && $vcodeArr['plan_id'] == "all" ) {?>style="display:none"<? } ?> >
                        <td   >&nbsp;</td>
                        <td   >&nbsp;</td>
                        <td   ><? $col = 0 ;?>
                          <table width="100%" border="0">
                            <tr><? 
							$arrPlanId = array();
							if( $action == "edit" && $vcodeArr['plan_id'] != "" ) {
								$arrPlanId = explode(",",$vcodeArr['plan_id']);
							 } //print_r($arrPlanId);?>
                              <? $sqlPlan = "select * from job_rec_payment_plans where plan_status=1 order by plan_id";
					
								$resultPlan = $objDb->ExecuteQuery($sqlPlan); 
								if( mysql_num_rows($resultPlan) > 0 ) {
								while( $p = mysql_fetch_object($resultPlan)) { 
									if($col%4 == 0) {
									echo "</tr><tr>" ;
									}
								?>
													  <td width="25%"><input type="checkbox" name="plan_id[]" id="plan_id" value="<?=$p->plan_id?>" <? if( is_array( $arrPlanId ) && !empty( $arrPlanId )) { if( in_array( $p->plan_id , $arrPlanId ) ) {?>checked<? } } ?>>
													  <?=$p->plan_name?></td>
													  <? $col++ ; } 
								}
								?>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td   >&nbsp;</td>
                        <td   >Applies to </td>
                        <td   ><input type="radio" name="opt" value="0"  onClick="showHidePlan('clRow');" <? if( $action == "edit" && $vcodeArr['rec_id'] == "all" ) {?>checked<? } else echo "checked"; ?>>
                          &nbsp;All clients&nbsp;&nbsp;
                          &nbsp;
                          <input type="radio" name="opt" id="opt" value="1" onClick="showHidePlan('clRow');" <? if( $action == "edit" && $vcodeArr['rec_id'] != "all" ) {?>checked<? } ?>>
                        Selected clients&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../images/star.gif" alt="man1"></td>
                      </tr>
                      <tr id="clRow" <? if( $action == "add") {?>style="display:none"<? } else if( $action == "edit" && $vcodeArr['rec_id'] == "all" ) {?>style="display:none"<? } ?> >
                        <td valign="top"   >&nbsp;</td>
                        <td valign="top"   >&nbsp;</td>
                        <td height="30" align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                          <tr>
                          <? 
							$arrRecId = array();
							if( $action == "edit" && $vcodeArr['rec_id'] != "" ) {
								$arrRecId = explode(",",$vcodeArr['rec_id']);
							 } ?>
                         <? $cols = 0;
						 	$sqlCleint = "select * from job_recruiter where rec_status = 1 order by rec_id";
							$resultClient = $objDb->ExecuteQuery($sqlCleint); 
							if( mysql_num_rows($resultClient) > 0 ) {
							while( $c = mysql_fetch_object($resultClient)) { 
								if($cols%4 == 0) {
								echo "</tr><tr>" ;
								}
							?>
												  <td width="25%"><input type="checkbox" name="rec_id[]" id="rec_id" value="<?=$c->rec_id?>" <? if( is_array( $arrRecId ) && !empty( $arrRecId )) { if( in_array( $c->rec_id , $arrRecId ) ) {?>checked<? } } ?>>
													<?=$c->rec_name." (".$c->rec_uid.")"?></td>
												  <? $cols++ ; } 
							}
							?>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      <tr>
                        <td width="2%" valign="top"   >&nbsp;</td>
                        <td width="19%" valign="top"   >&nbsp;</td>
                        <td width="79%" height="30" align="left" valign="top"  ><? if( $action == "edit" ) {?><img src="../../images/update_admin.gif" border="0" style="cursor:pointer" onClick="return validate_vcode('1')"><? } else { ?><img src="../../images/add.gif" border="0" style="cursor:pointer" onClick="return validate_vcode()"><? }?>&nbsp;&nbsp;&nbsp;<a href="home.php"><img src="../../images/cancel.gif" border="0"></a> </td>
                      </tr>
                    </table></td>
                </tr>
                <tr align="center">
                  <td valign="middle" height="10"></td>
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
