<?  session_start();

	if(!isset($_SESSION["user_id"]))
	{
		header("location: ../index.php"); exit();
	}
	require_once("../../classes/db_class.php");
	require_once("../../classes/pagination.php");	
	require_once("../../includes/functions.php");	
	$id=$_GET["id"];
		//$id=8;
		
	$objDb=new db();

	$company_name = "";
	$company_desc = "";
	$vacancy = "Bursary application Position";
	$adFrom = "";
	$adTo = "";
	$bursary_name = "";
	$another_mail="";
	$bursary_year = "";
	$bursary_details_offer = "";
	$bursary_industry = "";
	$bursary_institution = "";
	$bursary_req_study = "";
	$bursary_qualification = "";
	$bursary_level = "";
	$bursary_study_1 = ""; 
	$bursary_study_2 = ""; 
	$bursary_offer = "";
	$bursary_inclusive = "";
	$bursary_inclusive_other = "";
	$bursary_estimated_annual_value = "";
	$bursary_entry_req = "";

	$br_1_1 = "";
	$br_1_2 = "";

	$br_2_1 = "";
	$br_2_2 = "";
	
	$br_3_1 = "";
	$br_3_2 = "";
	
	$br_4_1 = "";
	$br_4_2 = "";
	
	$br_5_1 = "";
	$br_5_2 = "";

	$br_6_1 = "";
	$br_6_2 = "";
	$br_6_3 = "Namibia";
	
	$br_7_1 = "";

	$br_8_1 = "";
	
	$bursary_con_granting = "";
	
	$bcg_1_1= "";
	$bcg_1_2= "";
	
	$bcg_2_1= "";
	
	
	
	$offered_package = "";
	$off_package1 = "";
	$off_package2 = "";
	$off_package3 = "";
	$off_package4 = "";
	$off_package5 = "";
	$off_package6 = "";
	$off_package7 = "";
	$off_package_benefits = "";
	$off_package_b1 = "";

	$qks_1_1 = "";
	$qks_1_2 = "";
	$qks_1_3 = "";
	$qks_1_4 = "";
	$qks_1_5 = "";
	$qks_1_6 = "";
	
	$qks_2_1 = "";
	$qks_2_2 = "";
	$qks_2_3 = "";
	$qks_2_4 = "";

	$qks_3_1 = "";
	$qks_3_2 = "";
	$qks_3_3 = "";
	
	$qks_4_1 = "";
	$qks_4_2 = "";
	$qks_4_3 = "";
	$qks_4_4 = "";
	$qks_4_5 = "";

	$qks_5_1 = "";
	$qks_5_2 = "";
	$qks_5_3 = "";
	$qks_5_4 = "";

	$qks_6_1 = "";
	$qks_6_2 = "";
	$qks_6_3 = "";
	$qks_6_4 = "";
	
	$qks_7_1 = "";
	$qks_7_2 = "";

	$qks_8_1 = "";
	$qks_8_2 = "";

	$qks_9_1 = "";
	$qks_9_2 = "";

	$qks_10_1 = "";
	$qks_10_2 = "";
	$qks_10_3 = "";

	$qks_11_1 = "";
	$qks_11_2 = "";

	$preference_emp_1_1 = "";
	//$preference_emp_1_2 = "";
	$preference_emp_1_3 = "Namibia";
	
	$preference_emp_2 = "";
	$preference_emp_3 = "";
	$confirm_mail="";
	
		$sqlJob = "select * from job_ad where ad_id=" . $_GET['ad_id'];
		$resultJob = $objDb->ExecuteQuery($sqlJob);
		$rsJob = mysql_fetch_object($resultJob);
		
		
		 $confirm_mail=$rsJob->send_mail_another;

		//new add ons
		$fieldofstudy=$rsJob->filter_fieldofstudy;
		$typeofqualification=$rsJob->filter_typeofqualification;
		$levelofqualification=$rsJob->filter_levelofqualification;
		$countryofstudy=$rsJob->filter_countryofstudy;
		$typeofbursary=$rsJob->filter_typeofbursary;
		$prefinstitution=$rsJob->filter_prefinstitution;
		$advancementlevel=$rsJob->filter_advancementlevel;
		$accepted=$rsJob->filter_accepted;
		$passrate=$rsJob->filter_passrate;
		$prefinstitution=$rsJob->filter_prefinstitution;
		$parentincome=$rsJob->filter_parentincome;
		$equity_status=$rsJob->filter_equity_status;
		$gender=$rsJob->filter_gender;
		$citizenship=$rsJob->filter_citizenship;
		$ter_qualification=$rsJob->filter_ter_qualification;
		$sec_qualification=$rsJob->filter_sec_qualification;
		
		
		$offered_package = $rsJob->offered_package;
		if($offered_package==0) {
			$off_package1 = $rsJob->off_package1;
			$off_package2 = $rsJob->off_package2;
			$off_package3 = $rsJob->off_package3;
		} else if($offered_package == 1) {
			$off_package4 = $rsJob->off_package4;
			$off_package5 = $rsJob->off_package5;
			$off_package6 = $rsJob->off_package6;
		}
		$offerInc = 0 ;
		$adFrom = $rsJob->adFrom;		
   		$adTo = $rsJob->adTo;		
		if($rsJob->off_package_benefits != "") {
			foreach(explode(",",$rsJob->off_package_benefits) as $key => $value) {
				$val1 = explode("-",$value);
				$off_package_benefits[$val1[0]]	= $val1[1];
			}
		}
		$off_package_b1 = $rsJob->off_package_b1;			
		
		$qks_1 = explode("-/!-",$rsJob->qks_1) ;
		$qks_1_1 = $qks_1[0];
		$qks_1_2 = $qks_1[1];
		$qks_1_3 = $qks_1[2];
		$qks_1_4 = $qks_1[3];
		$qks_1_5 = $qks_1[4];
		$qks_1_6 = $qks_1[5];

		$qks_2 = explode("-/!-",$rsJob->qks_2) ;
		$qks_2_1 = $qks_2[0];
		$qks_2_2 = $qks_2[1];
		$qks_2_3 = $qks_2[2];
		$qks_2_4 = $qks_2[3];

		$qks_3 = explode("-/!-",$rsJob->qks_3) ;
		$qks_3_1 = $qks_3[0];
		$qks_3_2 = $qks_3[1];
		$qks_3_3 = $qks_3[2];

		$qks_4 = explode("-/!-",$rsJob->qks_4) ;
		$qks_4_1 = $qks_4[0];
		$qks_4_2 = $qks_4[1];
		$qks_4_3 = $qks_4[2];
		$qks_4_4 = $qks_4[3];
		$qks_4_5 = $qks_4[4];

		$qks_5 = explode("-/!-",$rsJob->qks_5) ;
		$qks_5_1 = $qks_5[0];
		$qks_5_2 = $qks_5[1];
		$qks_5_3 = $qks_5[2];
		$qks_5_4 = $qks_5[3];

		$qks_6 = explode("-/!-",$rsJob->qks_6) ;
		$qks_6_1 = $qks_6[2];
		$qks_6_2 = $qks_6[2];
		$qks_6_3 = $qks_6[2];
		$qks_6_4 = $qks_6[3];

		$qks_7 = explode("-/!-",$rsJob->qks_7) ;
		$qks_7_1 = $qks_7[0];
		$qks_7_2 = $qks_7[1];

		$qks_8 = explode("-/!-",$rsJob->qks_8) ;
		$qks_8_1 = $qks_8[0];
		$qks_8_2 = $qks_8[1];

		$qks_9 = explode("-/!-",$rsJob->qks_9) ;
		$qks_9_1 = $qks_9[0];
		$qks_9_2 = $qks_9[1];

		$qks_10 = explode("-/!-",$rsJob->qks_10) ;
		$qks_10_1 = $qks_10[0];
		$qks_10_2 = $qks_10[1];
		$qks_10_3 = $qks_10[2];

		$qks_11 = explode("-/!-",$rsJob->qks_11) ;
		$qks_11_1 = $qks_11[0];
		$qks_11_2 = $qks_11[1];
		
		$preference_emp_1 =explode("-/!-",$rsJob->preference_emp_1) ;
		$preference_emp_1_1 = $preference_emp_1[0] ;
		//$preference_emp_1_2 = $preference_emp_1[1] ;
		$preference_emp_1_3 = $preference_emp_1[1] ;
		$preference_emp_2 = $rsJob->preference_emp_2 ;
		$preference_emp_3 = $rsJob->preference_emp_3 ;
		
		
		//end new add ons
		$company_name = $rsJob->company_name ;			
		$company_desc = $rsJob->company_desc ;			
		$vacancy = $rsJob->vacansy ;
		for($i=1; $i<=5; $i++)
		{
			$var = "ques" . intval($i);
			$$var = $rsJob->$var;				
		}
		$bursary_name = $rsJob->bursary_name ;$another_mail=$rsJob->another_email;
		$bursary_year = $rsJob->bursary_year ;
		$bursary_details_offer = $rsJob->bursary_details_offer ;
		$bursary_industry = $rsJob->bursary_industry ;
		$bursary_institution = $rsJob->bursary_institution ;
		$bursary_req_study = $rsJob->bursary_req_study ;
		$bursary_qualification = $rsJob->bursary_qualification ;
		$bursary_level = $rsJob->bursary_level ;
	
		if($rsJob->bursary_study != "") {
			$bursary_study = explode("-/!-",$rsJob->bursary_study); 
			$bursary_study_1 = $bursary_study[0] ;
			$bursary_study_2 = $bursary_study[1] ;
		}
		$bursary_offer = $rsJob->bursary_offer ;

		if($rsJob->bursary_inclusive != "") {
			$FlagincBur = 0;
			$bursary_inclusive =  explode("-/!-", $rsJob->bursary_inclusive);	
			foreach($bursary_inclusive as $key=>$value) {
				$bursary_inclusive1 = explode("/-/",$value);
				if($bursary_inclusive1[0] == 6) {
					$bur_inc = explode("/#/",$bursary_inclusive1[1]) ;
					$bursary_inclusive[$bursary_inclusive1[0]] = $bur_inc[0] ;
					$bursary_inclusive_other = $bur_inc[1] ;
				} else {
					$bursary_inclusive[$bursary_inclusive1[0]] = $bursary_inclusive1[1] ;
				}
				$FlagincBur++;								
			}
		} 
		
		$bursary_estimated_annual_value = $rsJob->bursary_estimated_annual_value ;


		if($rsJob->bursary_entry_req != "") {
			$FlagincBur = 0;
			$bursary_entry_req =  explode("-/!-", $rsJob->bursary_entry_req);	
			foreach($bursary_entry_req as $key=>$value) {
				$bursary_entry_req1= explode("/-/",$value);
				
				if($bursary_entry_req1[0] == 0) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_1" ;

					$br_1_1 = trim($bur_req[1]);
					$br_1_2 = trim($bur_req[3]);
				} else if($bursary_entry_req1[0] == 1) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_2" ;

					$br_2_1 = trim($bur_req[1]);
					$br_2_2 = trim($bur_req[3]);
				} else if($bursary_entry_req1[0] == 2) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_3" ;

					$br_3_1 = trim($bur_req[1]);
					$br_3_2 = trim($bur_req[3]);
				} else if($bursary_entry_req1[0] == 3) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_4" ;

					$br_4_1 = trim($bur_req[1]);
					$br_4_2 = trim($bur_req[3]);
				} else if($bursary_entry_req1[0] == 6) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_5" ;
					
					$br_5_1 = trim($bur_req[1]);
					$br_5_2 = trim($bur_req[3]);
				} else if($bursary_entry_req1[0] == 7) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_6" ;

					$br_6_1 = trim($bur_req[1]);
					$br_6_2 = trim($bur_req[2]);
					$br_6_3 = trim($bur_req[3]);
				} else if($bursary_entry_req1[0] == 8) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_7" ;

					$br_7_1 = trim($bur_req[1]);
				} else if($bursary_entry_req1[0] == 9) {
					$bur_req = explode("/#/",$bursary_entry_req1[1]) ;
					$bursary_entry_req[$bursary_entry_req1[0]] = "br_8" ;

					$br_8_1 = trim($bur_req[1]);
				} else {
					$bursary_entry_req[$bursary_entry_req1[0]] = $bursary_entry_req1[1] ;
				}	
			}
		} 
		
		if($rsJob->bursary_con_granting != "") {
			$FlagincBur = 0;
			$bursary_con_granting =  explode("-/!-", $rsJob->bursary_con_granting);	
			foreach($bursary_con_granting as $key=>$value) {
				$bursary_con_granting1 = explode("/-/",$value);
				if($bursary_con_granting1[0] == 7) {
					$bur_inc = explode("/#/",$bursary_con_granting1[1]) ;
					$bursary_con_granting[$bursary_con_granting1[0]] = "bcg_1" ;
					
					$bcg_1_1= $bur_inc[1] ;
					$bcg_1_2= $bur_inc[3] ;
				} else if($bursary_con_granting1[0] == 8) {
					$bur_inc = explode("/#/",$bursary_con_granting1[1]) ;
					$bursary_con_granting[$bursary_con_granting1[0]] = "bcg_2" ;
					
					$bcg_2_1= $bur_inc[1];
				} else {
					$bursary_con_granting[$bursary_con_granting1[0]] = $bursary_con_granting1[1] ;
				}
				$FlagincBur++;								
			}
		} 
		
		$len=4-strlen($rsJob->ad_id);
		$refno="";
		while($len>0)
		{
			$refno.=0;
			$len--;
		}
		$refno .=$rsJob->ad_id;
		$sqlComp="select * from job_recruiter where rec_id='".$rsJob->rec_id."'";
		$resultComp = $objDb->ExecuteQuery($sqlComp);
		$rsComp  = mysql_fetch_object($resultComp);
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
<script src="../../javascript/main.js" language="javascript"></script>
<script src="../../javascript/recruiter.js" language="javascript"></script>
<script language="javascript" type="text/javascript">
	function goBack(url)
	{
		if(url == "")
			history.back();
		else
		{
			//document.form1.action = url;
			//document.form1.submit();
			location.href = url;
		}
	}
</script>

<script language="javascript">
<!--
function search_seekers()
 {
	document.form1.submit();
 }

function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>
<script language="javascript" type="text/javascript">
<!--
function showLeftChars()
{
		document.getElementById("msg_chars").style.display = "";
}
function fillToDate(toDate)
{
	
	//alert(toDate);
	document.form1.adTo_date.disabled=true;
	document.form1.adTo_month.disabled=true;
	document.form1.adTo_year.disabled=true;
	document.form1.adTo_date.value="";
	document.form1.adTo_month.value="";
	document.form1.adTo_year.value="";
	var selectdate=new Array();
	selectdate=toDate.split("-");
	//alert(selectdate[0]);
	if(document.form1.adFrom_date.value!="" && document.form1.adFrom_month.value!="" && document.form1.adFrom_year.value!="")
	{
		var _dateTo  = document.form1.adFrom_date.value;
		var _monthTo = document.form1.adFrom_month.value;
		var _yearTo  =  document.form1.adFrom_year.value;
		var nextDate = new Date(_yearTo,_monthTo-1,_dateTo);
		var _endDate=new Date(nextDate.getTime() + 21*24*60*60*1000);
		
		myDate=new Date()
		var currentTime;
		var currentTime = new Date(myDate.getTime() + 21*24*60*60*1000)
		var month = currentTime.getMonth()
		var day = currentTime.getDate()
		var year = currentTime.getFullYear()
		var _day21 = new Date(year,month,day);//alert(nextDate+"---"+_day21)
		if(nextDate > _day21 || nextDate<myDate)
		{
			alert("Please enter from date of ad running time within 21 days from current date");
		}
		else
		{
		var arrmonth= new Array("January","February","March","April","May","June","July","August","September","October","November","December");
		
		document.form1.adTo_date.disabled=false;
		document.form1.adTo_month.disabled=false;
		document.form1.adTo_year.disabled=false;
		
		//alert(_endDate.getFullYear());
		_mm=_endDate.getMonth()+1;
		_dd=_endDate.getDate();
		_yy =_endDate.getFullYear();
		var j=document.form1.adFrom_date.value;
		val=parseInt(document.form1.adFrom_date.value)+21;
		for(i=document.form1.adFrom_date.value;i<=val;i++)
		{
			document.form1.adTo_date.options[i]= null;
		}
		document.form1.adTo_date.length = 0;
		for(i=document.form1.adFrom_date.value;i<=val;i++)
		{
			
			if(j==32) j=1;
			document.form1.adTo_date.options[document.form1.adTo_date.options.length] = new Option(j,j);
			if(selectdate[0]==j) {alert("hi");
			document.form1.adTo_date.options[document.form1.adTo_date.options.length].selected=true;}
			j++;
		}
		for(i=parseInt(document.form1.adFrom_month.value);i<=parseInt(_mm);i++)
		{
			document.form1.adTo_month.options[i]= null;
		}
		document.form1.adTo_month.length = 0;
		if(parseInt(document.form1.adFrom_month.value)==12 && parseInt(_mm)==1) { _mm=13; }
		for(i=parseInt(document.form1.adFrom_month.value);i<=parseInt(_mm);i++)
		{
			document.form1.adTo_month.options[document.form1.adTo_month.options.length] = new Option(arrmonth[i-1],i);
			//if(selectdate[1]==i) 
			//document.form1.adTo_month.options[document.form1.adTo_month.options.length].selected=true;
		}
		for(i=parseInt(document.form1.adFrom_year.value);i<=parseInt(_yy);i++)
		{
			document.form1.adTo_year.options[i]= null;
		}
		document.form1.adTo_year.length = 0;
		//alert(parseInt(document.form1.adFrom_year.value));
		//alert(parseInt(_yy));
		for(i=parseInt(document.form1.adFrom_year.value);i<=parseInt(_yy);i++)
		{
			document.form1.adTo_year.options[document.form1.adTo_year.options.length] = new Option(i,i);
			if(selectdate[0]==i) 
			document.form1.adTo_year.options[document.form1.adTo_year.options.length].selected=true;
		}
		}
	}
}

//-->
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
         <td class="whitebgcolor"><form name="form1" enctype="multipart/form-data" target="postProcess"   action="" method="post" >
           <input type="hidden" id="HiddVal" name="HiddVal" />
           <input type="hidden" name="ad_id" value="<?=$_GET['ad_id']?>">
		   <input type="hidden" name="rec_id" value="<?=$rsComp->rec_id?>">
		   <input type="hidden" name="hurl" value="job_edit_bursary.php">
		   <input type="hidden" name="url" value="ad_id=<?=$rsJob->ad_id?>&url=<?=$_GET['url']?>&urlPage=<?=$_GET['urlPage']?>">
           <input type="hidden" name="post_date" id="post_date" value="<?=$rsJob->ad_date?>">
           <!-- Page Body Start-->
           <table width="100%" border="0" cellspacing="0" cellpadding="4">
             <tr>
               <td width="772"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                   <tr>
				   <td><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
					 <tr>
					   <td width="91%" height="30" class="heading_black" >&nbsp;Job Edit </td>
					 </tr>
					 <tr>
					   <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
						   <tr>
							 <td width="5"></td>
							 <td   >You are viewing the job advert <span class="subhead_gray_small">ref.<? echo($refno); ?></span> entitled <span class="subhead_gray_small"><? echo($rsJob->bursary_name); ?></span> posted by <span class="subhead_gray_small"><? echo($rsComp->rec_name);?></span> </td>
						   </tr>
					   </table></td>
					 </tr>
				   </table></td>
				   <td valign="top">&nbsp;</td>
				 </tr>
                   <tr>
                     <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                         <tr>
                           <td width="1">&nbsp;</td>
                           <td colspan="2"> You can update   bursary advert here.</td>
                         </tr>
                         <tr>
                           <td colspan="3" height="30"></td>
                         </tr>
                         <tr>
                           <td height="30" colspan="4" class="sectionRecheading">Company Details </td>
                         </tr>
                         <tr>
                           <td colspan="4"><img src="../../images/line.gif"></td>
                         </tr>
                         <tr>
                           <td colspan="4" height="10"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td width="160">Company name </td>
                           <td width="554" colspan="2" class="comment"><input type="text" name="company_name" id="company_name" value="<?=$company_name?>" readonly>
                               <img src="../../images/star.gif"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td width="160" valign="top">Company Description </td>
                           <td colspan="2" class="comment"><textarea  name="company_desc" cols="50" rows="6"  onkeyup="showLeftChars();document.getElementById('chars_left').innerHTML=(120-this.value.length); if(this.value.length>120) {document.getElementById('chars_left').innerHTML='Fewer than 0'; this.value = this.value.substring(0,120);}" readonly><?=$company_desc?>
         </textarea>
                               <span id="msg_chars" style="display:none;">You have <u><span id="chars_left">120</span></u>characters left.</span> </td>
                         </tr>
                         <tr>
                           <td height="30" colspan="4" class="sectionRecheading">&nbsp;</td>
                         </tr>
                         <tr>
                           <td height="30" colspan="3" class="sectionRecheading">Job Ad Details </td>
                         </tr>
                         <tr>
                           <td colspan="3"><img src="../../images/line.gif"></td>
                         </tr>
                         <tr>
                           <td colspan="3" height="10"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Bursary name</td>
                           <td colspan="2" class="comment"><input name="bursary_name" type="text" id="bursary_name" value="<?=$bursary_name?>" size="30">
                               <img src="../../images/star.gif"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Ad Running time </td>
                           <td colspan="2" class="comment"><table width="100%" cellpadding="2" cellspacing="0">
                               <tr>
                                 <td width="23%" class="normal_black">From</td>
                                 <td width="77%" class="normal_black">To</td>
                               </tr>
                               <tr>
                                 <td><?=getDateValue($adFrom)?></td>
                                 <td><?=getDateValue($adTo)?>                                 </td>
                               </tr>
                           </table></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Required Institution</td>
                           <td colspan="2" class="comment"><?=fill_dropdown("bursary_institution","job_options","option_name","option_name",trim($bursary_institution),"Select","where category_id=387"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td width="160">Bursary offered for the following academic year</td>
                           <td colspan="2" class="comment"><select id="bursary_year" name="bursary_year">
                               <?
								$slected_y = "" ;
								
								for($i = date("Y")-5 ; $i <= date("Y")+5 ; $i++) { 
									$slected_y = "" ;
									if($bursary_year==$i) { $slected_y = " selected " ; } 
									echo "<option value='".$i."' ".$slected_y.">".$i."</option>";
								}	
							?>
                               <option value="etc.">etc.</option>
                           </select></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Type of Qualification</td>
                           <td colspan="2" class="comment"><?=fill_dropdown("bursary_details_offer","job_options","option_name","option_name",trim($bursary_details_offer),"Select","where category_id=386","option_id"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Industry</td>
                           <td colspan="2" class="comment"><?=fill_dropdown("bursary_industry",'job_options','option_name', "option_name",$bursary_industry,"Select","where category_id=6")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Country of study</td>
                           <td class="comment"><?=fill_dropdown("bursary_req_study","job_options","option_name","option_name",trim($bursary_req_study),"Select","where category_id=388"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td valign="top">Level of qualification</td>
                           <td colspan="2" valign="top" class="normal_black"><span class="comment">
                             <?=fill_dropdown("bursary_qualification","job_options","option_name","option_name",trim($bursary_qualification),"Select","where category_id=389"); ?>
                           </span></td>
                         </tr>
                         <tr valign="bottom">
                           <td>&nbsp;</td>
                           <td valign="top">Advancement level</td>
                           <td valign="top" class="normal_black"><span class="comment">
                             <?=fill_dropdown("bursary_level","job_options","option_name","option_name",trim($bursary_level),"Select","where category_id=390"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Required field of study</td>
                           <td><span class="comment">
                             <select name="bursary_study_1">
                               <option value="">Select</option>
                               <option value="Advance Diploma: Accounting and Auditing">Advance Diploma: Accounting and Auditing</option>
                               <option value="Advance Diploma: Business Administration">Advance Diploma: Business Administration</option>
                               <option value="Advance Diploma: Taxation and Management ">Advance Diploma: Taxation and Management </option>
                               <option value="Advanced University Diploma: Nursing (Health Prom) ">Advanced University Diploma: Nursing (Health Prom) </option>
                               <option value="Advanced University Diploma: Nursing Science (Critical Care)">Advanced University Diploma: Nursing Science (Critical Care)</option>
                               <option value="Advanced University Diploma: Nursing Science (Operating Room)">Advanced University Diploma: Nursing Science (Operating Room)</option>
                               <option value="B Tech: Animal Health ">B Tech: Animal Health </option>
                               <option value="B Tech: Nature Conservation">B Tech: Nature Conservation</option>
                               <option value="B.Tech. Accounting and Finance  ">B.Tech. Accounting and Finance </option>
                               <option value="Baccalaureus of Juris (B Juris)">Baccalaureus of Juris (B Juris)</option>
                               <option value="Bachelor of Accounting (B. Accounting)">Bachelor of Accounting (B. Accounting)</option>
                               <option value="Bachelor of Arts (BA)">Bachelor of Arts (BA)</option>
                               <option value="Bachelor of Arts: Environmental Management in Natural Sciences (Biochemistry and Microbiology Str">Bachelor of Arts: Environmental Management in Natural Sciences (Biochemistry and Microbiology Str</option>
                               <option value="Bachelor of Arts: Library Science">Bachelor of Arts: Library Science</option>
                               <option value="Bachelor of Arts: Media Studies">Bachelor of Arts: Media Studies</option>
                               <option value="Bachelor of Arts: Natural Sciences (Physiology and Zoology Stream) ">Bachelor of Arts: Natural Sciences (Physiology and Zoology Stream) </option>
                               <option value="Bachelor of Arts: Social Work">Bachelor of Arts: Social Work</option>
                               <option value="Bachelor of Arts: Tourism">Bachelor of Arts: Tourism</option>
                               <option value="Bachelor of Business Administration (B.B.A.)">Bachelor of Business Administration (B.B.A.)</option>
                               <option value="Bachelor of Consumer Science: Clothing Management ">Bachelor of Consumer Science: Clothing Management </option>
                               <option value="Bachelor of Economics (B.Econ.)">Bachelor of Economics (B.Econ.)</option>
                               <option value="Bachelor of Education: Adult Education">Bachelor of Education: Adult Education</option>
                               <option value="Bachelor of Human Ecology: Community Agriculture ">Bachelor of Human Ecology: Community Agriculture </option>
                               <option value="Bachelor of Human Ecology: Community Nutrition">Bachelor of Human Ecology: Community Nutrition</option>
                               <option value="Bachelor of Human Ecology: Social Development">Bachelor of Human Ecology: Social Development</option>
                               <option value="Bachelor of Laws (LL B)">Bachelor of Laws (LL B)</option>
                               <option value="Bachelor of Nursing Science (Advanced Practice)">Bachelor of Nursing Science (Advanced Practice)</option>
                               <option value="Bachelor of Office Management &amp; Technology">Bachelor of Office Management &amp; Technology</option>
                               <option value="Bachelor of Psychology">Bachelor of Psychology</option>
                               <option value="Bachelor of Public Administration (B.Admin)">Bachelor of Public Administration (B.Admin)</option>
                               <option value="Bachelor of Science: Agricultural Science ">Bachelor of Science: Agricultural Science </option>
                               <option value="Bachelor of Science: Agriculture (Agricultural Economics) ">Bachelor of Science: Agriculture (Agricultural Economics) </option>
                               <option value="Bachelor of Science: Agriculture (Animal Science) ">Bachelor of Science: Agriculture (Animal Science) </option>
                               <option value="Bachelor of Science: Agriculture (Crop science) ">Bachelor of Science: Agriculture (Crop science) </option>
                               <option value="Bachelor of Science: Agriculture (Food Science &amp; Technology) ">Bachelor of Science: Agriculture (Food Science &amp; Technology) </option>
                               <option value="Bachelor of Science: Biochemistry Major and Biology Minor ">Bachelor of Science: Biochemistry Major and Biology Minor </option>
                               <option value="Bachelor of Science: Biochemistry Major and Chemistry Minor">Bachelor of Science: Biochemistry Major and Chemistry Minor</option>
                               <option value="Bachelor of Science: Biomedical Engineering">Bachelor of Science: Biomedical Engineering</option>
                               <option value="Bachelor of Science: Chemical Engineering">Bachelor of Science: Chemical Engineering</option>
                               <option value="Bachelor of Science: Chemistry Major and Biology Minor">Bachelor of Science: Chemistry Major and Biology Minor</option>
                               <option value="Bachelor of Science: Chemistry Major and Geology Minor">Bachelor of Science: Chemistry Major and Geology Minor</option>
                               <option value="Bachelor of Science: Chemistry Major and Physics Minor">Bachelor of Science: Chemistry Major and Physics Minor</option>
                               <option value="Bachelor of Science: Civil Engineering">Bachelor of Science: Civil Engineering</option>
                               <option value="Bachelor of Science: Computer Engineering">Bachelor of Science: Computer Engineering</option>
                               <option value="Bachelor of Science: Computer Science Major and Information Technology Minor ">Bachelor of Science: Computer Science Major and Information Technology Minor </option>
                               <option value="Bachelor of Science: Computer Science Major and Mathematics Minor">Bachelor of Science: Computer Science Major and Mathematics Minor</option>
                               <option value="Bachelor of Science: Computer Science Major and Statistics Minor">Bachelor of Science: Computer Science Major and Statistics Minor</option>
                               <option value="Bachelor of Science: Electrical Engineering">Bachelor of Science: Electrical Engineering</option>
                               <option value="Bachelor of Science: Electrical Power Engineering">Bachelor of Science: Electrical Power Engineering</option>
                               <option value="Bachelor of Science: Electronics Engineering">Bachelor of Science: Electronics Engineering</option>
                               <option value="Bachelor of Science: Environmental Biology Major and Geography Minor ">Bachelor of Science: Environmental Biology Major and Geography Minor </option>
                               <option value="Bachelor of Science: Environmental Biology Major and Geology Minor ">Bachelor of Science: Environmental Biology Major and Geology Minor </option>
                               <option value="Bachelor of Science: Geology Single Major">Bachelor of Science: Geology Single Major</option>
                               <option value="Bachelor of Science: Industrial Engineering">Bachelor of Science: Industrial Engineering</option>
                               <option value="Bachelor of Science: Mathematics Major and Computer Science Minor">Bachelor of Science: Mathematics Major and Computer Science Minor</option>
                               <option value="Bachelor of Science: Mathematics Major and Physics Minor">Bachelor of Science: Mathematics Major and Physics Minor</option>
                               <option value="Bachelor of Science: Mathematics Major and Statistics Minor">Bachelor of Science: Mathematics Major and Statistics Minor</option>
                               <option value="Bachelor of Science: Mechanical Engineering">Bachelor of Science: Mechanical Engineering</option>
                               <option value="Bachelor of Science: Metallurgical Engineering">Bachelor of Science: Metallurgical Engineering</option>
                               <option value="Bachelor of Science: Micro Biology and Biochemistry Minor ">Bachelor of Science: Micro Biology and Biochemistry Minor </option>
                               <option value="Bachelor of Science: Micro Biology and Chemistry Minor">Bachelor of Science: Micro Biology and Chemistry Minor</option>
                               <option value="Bachelor of Science: Mining Engineering">Bachelor of Science: Mining Engineering</option>
                               <option value="Bachelor of Science: Molecular Biology Major and Biochemistry Minor">Bachelor of Science: Molecular Biology Major and Biochemistry Minor</option>
                               <option value="Bachelor of Science: Molecular Biology Major and Chemistry Minor ">Bachelor of Science: Molecular Biology Major and Chemistry Minor </option>
                               <option value="Bachelor of Science: Natural Resources (Fisheries &amp; Aquatic Sciences)    ">Bachelor of Science: Natural Resources (Fisheries &amp; Aquatic Sciences) </option>
                               <option value="Bachelor of Science: Natural Resources (Integrated Environmental Science)    ">Bachelor of Science: Natural Resources (Integrated Environmental Science) </option>
                               <option value="Bachelor of Science: Physics Major and  Computer Science Minor ">Bachelor of Science: Physics Major and Computer Science Minor </option>
                               <option value="Bachelor of Science: Physics Major and Chemistry  Minor ">Bachelor of Science: Physics Major and Chemistry Minor </option>
                               <option value="Bachelor of Science: Physics Major and Geology Minor">Bachelor of Science: Physics Major and Geology Minor</option>
                               <option value="Bachelor of Science: Physics Major and Mathematics Minor">Bachelor of Science: Physics Major and Mathematics Minor</option>
                               <option value="Bachelor of Science: Population Studies ">Bachelor of Science: Population Studies </option>
                               <option value="Bachelor of Science: Population Studies Major and Geography Minor">Bachelor of Science: Population Studies Major and Geography Minor</option>
                               <option value="Bachelor of Science: Population Studies Major and Sociology Minor ">Bachelor of Science: Population Studies Major and Sociology Minor </option>
                               <option value="Bachelor of Science: Population Studies Major and Statistics Minor ">Bachelor of Science: Population Studies Major and Statistics Minor </option>
                               <option value="Bachelor of Science: Pre- Medical Training">Bachelor of Science: Pre- Medical Training</option>
                               <option value="Bachelor of Science: Statistics Major and Computer Science Minor ">Bachelor of Science: Statistics Major and Computer Science Minor </option>
                               <option value="Bachelor of Science: Statistics Major and Economics Minor">Bachelor of Science: Statistics Major and Economics Minor</option>
                               <option value="Bachelor of Science: Statistics Major and Mathematics Minor">Bachelor of Science: Statistics Major and Mathematics Minor</option>
                               <option value="Bachelor of Science: Statistics Major and Population Studies Minor">Bachelor of Science: Statistics Major and Population Studies Minor</option>
                               <option value="Bachelor of Science: Telecommunication Engineering">Bachelor of Science: Telecommunication Engineering</option>
                               <option value="Bachelor of Technology: Public Management   (Public Management with Development Management Specialis">Bachelor of Technology: Public Management (Public Management with Development Management Specialis</option>
                               <option value="Bachelor of Technology: Public Management  (Public Management with Regional and Local Government Spe">Bachelor of Technology: Public Management (Public Management with Regional and Local Government Spe</option>
                               <option value="Bachelor-Honours Degree: Human Resources Management ">Bachelor-Honours Degree: Human Resources Management </option>
                               <option value="Certificate: Accounting and Taxation">Certificate: Accounting and Taxation</option>
                               <option value="Certificate: Advanced Nursing Skills">Certificate: Advanced Nursing Skills</option>
                               <option value="Certificate: Advanced University Diploma in Nursing (Health Prom) ">Certificate: Advanced University Diploma in Nursing (Health Prom) </option>
                               <option value="Certificate: Criminal Justice, Constitutionalism and Human Rights ">Certificate: Criminal Justice, Constitutionalism and Human Rights </option>
                               <option value="Certificate: Dispute Resolution (Mediation, Arbitration and Conciliation">Certificate: Dispute Resolution (Mediation, Arbitration and Conciliation</option>
                               <option value="Certificate: Pharmacotherapy">Certificate: Pharmacotherapy</option>
                               <option value="Certificate: Public Management ">Certificate: Public Management </option>
                               <option value="Certificate: Taxation and Management">Certificate: Taxation and Management</option>
                               <option value="Certificate: Theatre Technique ">Certificate: Theatre Technique </option>
                               <option value="Diploma: Accounting and Auditing">Diploma: Accounting and Auditing</option>
                               <option value="Diploma: Adult Education &amp; Community Development">Diploma: Adult Education &amp; Community Development</option>
                               <option value="Diploma: Agriculture ">Diploma: Agriculture </option>
                               <option value="Diploma: Comprehensive Nursing and Midwifery Science ">Diploma: Comprehensive Nursing and Midwifery Science </option>
                               <option value="Diploma: Forestry     ">Diploma: Forestry </option>
                               <option value="Diploma: Library Science">Diploma: Library Science</option>
                               <option value="Diploma: Local Government Studies">Diploma: Local Government Studies</option>
                               <option value="Diploma: Midwifery Science">Diploma: Midwifery Science</option>
                               <option value="Diploma: Natural Resource Management">Diploma: Natural Resource Management</option>
                               <option value="Diploma: Public Management">Diploma: Public Management</option>
                               <option value="Diploma: Public Relations">Diploma: Public Relations</option>
                               <option value="Diploma: Records and Archives Management ">Diploma: Records and Archives Management </option>
                               <option value="Diploma: Taxation and Management">Diploma: Taxation and Management</option>
                               <option value="Diploma: Visual Arts">Diploma: Visual Arts</option>
                               <option value="Honours: Bachelor of Arts in Geography ">Honours: Bachelor of Arts in Geography </option>
                               <option value="Honours: Bachelor of Science in Geography ">Honours: Bachelor of Science in Geography </option>
                               <option value="Master of Arts (MA)">Master of Arts (MA)</option>
                               <option value="Master of Arts: Clinical Psychology ">Master of Arts: Clinical Psychology </option>
                               <option value="Master of Arts: Industrial Psychology">Master of Arts: Industrial Psychology</option>
                               <option value="Master of Arts: Performing Arts">Master of Arts: Performing Arts</option>
                               <option value="Master of Arts: Political Studies">Master of Arts: Political Studies</option>
                               <option value="Master of Arts: Religion">Master of Arts: Religion</option>
                               <option value="Master of Arts: Security and Strategic Studies ">Master of Arts: Security and Strategic Studies </option>
                               <option value="Master of Business Administration">Master of Business Administration</option>
                               <option value="Master of Consumer Science">Master of Consumer Science</option>
                               <option value="Master of Education ">Master of Education </option>
                               <option value="Master of Education: Adult Education">Master of Education: Adult Education</option>
                               <option value="Master of Education: Literacy and Learning">Master of Education: Literacy and Learning</option>
                               <option value="Master of Law: Thesis only  (LL M) ">Master of Law: Thesis only (LL M) </option>
                               <option value="Master of Medical-Surgical">Master of Medical-Surgical</option>
                               <option value="Master of Nursing Science">Master of Nursing Science</option>
                               <option value="Master of Public Administration (M.Admin.)">Master of Public Administration (M.Admin.)</option>
                               <option value="Master of Public Health">Master of Public Health</option>
                               <option value="Master of Science:  Economics">Master of Science: Economics</option>
                               <option value="Master of Science: Accounting &amp; Finance">Master of Science: Accounting &amp; Finance</option>
                               <option value="Master of Science: Biodiversity Management &amp; Research">Master of Science: Biodiversity Management &amp; Research</option>
                               <option value="Master of Science: Chemistry">Master of Science: Chemistry</option>
                               <option value="Master of Science: Information Technology">Master of Science: Information Technology</option>
                               <option value="Master of Science: Thesis  only">Master of Science: Thesis only</option>
                               <option value="Master of Social Science: Rangeland Resources Management ">Master of Social Science: Rangeland Resources Management </option>
                               <option value="Master of Theology (MTh)">Master of Theology (MTh)</option>
                               <option value="National Certificate: Accounting and Finance">National Certificate: Accounting and Finance</option>
                               <option value="National Certificate: Business Studies">National Certificate: Business Studies</option>
                               <option value="National Certificate: Office Management &amp; Technology">National Certificate: Office Management &amp; Technology</option>
                               <option value="National Diploma: Accounting and Finance">National Diploma: Accounting and Finance</option>
                               <option value="National Diploma: Human Resource Management ">National Diploma: Human Resource Management </option>
                               <option value="National Diploma: Office Management &amp; Technology">National Diploma: Office Management &amp; Technology</option>
                               <option value="National Diploma: Radiography  (Diagnostic)">National Diploma: Radiography (Diagnostic)</option>
                               <option value="Ph.D.: Adult Education">Ph.D.: Adult Education</option>
                               <option value="Ph.D.: Curriculum Studies, Instruction and Assessment">Ph.D.: Curriculum Studies, Instruction and Assessment</option>
                               <option value="Ph.D.: Educational Foundation and Administration ">Ph.D.: Educational Foundation and Administration </option>
                               <option value="Ph.D.: Nursing Science">Ph.D.: Nursing Science</option>
                               <option value="Ph.D.: Philosophy ">Ph.D.: Philosophy </option>
                               <option value="Ph.D.: Philosophy (by Thesis only)">Ph.D.: Philosophy (by Thesis only)</option>
                               <option value="Ph.D.: Philosophy in Law  ">Ph.D.: Philosophy in Law </option>
                               <option value="Ph.D.: Political Studies">Ph.D.: Political Studies</option>
                               <option value="Ph.D.: Public Administration">Ph.D.: Public Administration</option>
                               <option value="Post Graduate Diploma: Education">Post Graduate Diploma: Education</option>
                               <option value="Postgraduate Diploma: Business Administration">Postgraduate Diploma: Business Administration</option>
                               <option value="Postgraduate Diploma: Internal Auditing">Postgraduate Diploma: Internal Auditing</option>
                               <option value="Postgraduate Diploma: Translation (PGDT)">Postgraduate Diploma: Translation (PGDT)</option>
                               <option value="Specialised Certificate: Customary Law ">Specialised Certificate: Customary Law </option>
                               <option value="Specialised Diploma: Dispute Resolution (Mediation, Arbitration and Conciliation)">Specialised Diploma: Dispute Resolution (Mediation, Arbitration and Conciliation)</option>
                               <option value="Specialised Diploma: Educational Management and Leadership">Specialised Diploma: Educational Management and Leadership</option>
                               <option value="Specialised Diploma: Gender &amp; Development Studies">Specialised Diploma: Gender &amp; Development Studies</option>
                               <option value="Specialised Postgraduate Diploma: Special Education">Specialised Postgraduate Diploma: Special Education</option>
                             </select>
                             </span> or<span class="comment">
                             <input name="bursary_study_2" type="text" id="bursary_study_2" value="<?=$bursary_study_2?>" size="20">
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td valign="top">Bursary offer</td>
                           <td><span class="comment">
                             <?=fill_dropdown("bursary_offer","job_options","option_name","option_name",trim($bursary_offer),"Select","where category_id=394"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Inclusive of</td>
                           <td><input name="bursary_inclusive[0]" type="checkbox" id="bursary_inclusive[0]" value="Tuition" <? if(isset($bursary_inclusive[0]) && trim($bursary_inclusive[0]) =="Tuition") echo "checked"; ?>>
                             &nbsp;Tuition</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td><input name="bursary_inclusive[1]" type="checkbox" id="bursary_inclusive[1]" value="Text book fees" <? if(isset($bursary_inclusive[1]) && trim($bursary_inclusive[1]) =="Text book fees") echo "checked"; ?>>
                             &nbsp;Text book fees</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td><input name="bursary_inclusive[2]" type="checkbox" id="bursary_inclusive[2]" value="Computer fees" <? if(isset($bursary_inclusive[2]) && trim($bursary_inclusive[2]) =="Computer fees") echo "checked"; ?>>
                             &nbsp;Computer fees</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td><input name="bursary_inclusive[3]" type="checkbox" id="bursary_inclusive[3]" value="Residence fees" <? if(isset($bursary_inclusive[3]) && trim($bursary_inclusive[3]) =="Residence fees") echo "checked"; ?>>
                             &nbsp;Residence fees<span class="comment">
                               <input name="bursary_inclusive_other" type="text" id="bursary_inclusive_other" value="<?=$bursary_inclusive_other?>" size="35">
                             </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td><input name="bursary_inclusive[4]" type="checkbox" id="bursary_inclusive[4]" value="Meal allowance" <? if(isset($bursary_inclusive[4]) && trim($bursary_inclusive[4]) =="Meal allowance") echo "checked"; ?>>
                             &nbsp;Meal allowance</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td><input name="bursary_inclusive[5]" type="checkbox" id="bursary_inclusive[5]" value="Laboratory fees" <? if(isset($bursary_inclusive[5]) && trim($bursary_inclusive[5]) =="Laboratory fees") echo "checked"; ?>>
                             &nbsp;Laboratory fees</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td><input name="bursary_inclusive[6]" type="checkbox" id="bursary_inclusive[6]" value="other &ndash; detail" <? if(isset($bursary_inclusive[6]) && trim($bursary_inclusive[6]) =="other &ndash; detail") echo "checked"; ?>>
                             &nbsp;other &ndash; detail <span class="comment"> </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Estimated annual value of bursary</td>
                           <td>N$ <span class="comment">
                             <input name="bursary_estimated_annual_value" type="text" id="bursary_estimated_annual_value" value="<?=$bursary_estimated_annual_value?>" size="35">
                           </span></td>
                         </tr>
                         <tr>
                           <td colspan="3">&nbsp;</td>
                         </tr>
                         <tr>
                           <td colspan="3" class="sectionRecheading">Entry requirements<img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('Please tick the options that are required from the bursary applicant. Only ticked items will be displayed in the advertisement, thereby providing a professional appearance to your ad.')"></td>
                         </tr>
                         <tr>
                           <td colspan="3"><img src="../../images/line.gif"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                               <tr>
                                 <td width="1%">&nbsp;</td>
                                 <td width="99%"><input name="bursary_entry_req[0]" type="checkbox" id="bursary_entry_req[0]" value="br_1" <? if(isset($bursary_entry_req[0]) && trim($bursary_entry_req[0]) =="br_1") echo "checked"; ?>>
                                   &nbsp;A minimum of&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_1_1","job_options","option_name","option_name",trim($br_1_1),"no_value","where category_id=395"); ?>
                                     </span>&nbsp;symbols for <span class="comment">
                                       <?=fill_dropdown("br_1_2","job_options","option_name","option_name",trim($br_1_2),"no_value","where category_id=396"); ?>
                                     </span>&nbsp;of HIGCSE</td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[1]" type="checkbox" id="bursary_entry_req[1]" value="br_2" <? if(isset($bursary_entry_req[1]) && trim($bursary_entry_req[1]) =="br_2") echo "checked"; ?>>
                                   &nbsp;A minimum of&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_2_1","job_options","option_name","option_name",trim($br_2_1),"no_value","where category_id=395"); ?>
                                     </span>&nbsp;symbols for <span class="comment">
                                       <?=fill_dropdown("br_2_2","job_options","option_name","option_name",trim($br_2_2),"mo_value","where category_id=396"); ?>
                                     </span>&nbsp;of HIGCSE</td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[2]" type="checkbox" id="bursary_entry_req[2]" value="br_3" <? if(isset($bursary_entry_req[2]) && trim($bursary_entry_req[2]) =="br_3") echo "checked"; ?>>
                                   &nbsp;A minimum of&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_3_1","job_options","option_name","option_name",trim($br_3_1),"no_value","where category_id=395"); ?>
                                     </span>&nbsp;symbols for <span class="comment">
                                       <?=fill_dropdown("br_3_2","job_options","option_name","option_name",trim($br_3_2),"no_value","where category_id=396"); ?>
                                     </span>&nbsp;of HIGCSE</td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[3]" type="checkbox" id="bursary_entry_req[3]" value="br_4" <? if(isset($bursary_entry_req[3]) && trim($bursary_entry_req[3]) =="br_4") echo "checked"; ?>>
                                   &nbsp;A minimum of&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_4_1","job_options","option_name","option_name",trim($br_4_1),"no_value","where category_id=395"); ?>
                                     </span>&nbsp;symbols for <span class="comment">
                                       <?=fill_dropdown("br_4_2","job_options","option_name","option_name",trim($br_4_2),"no_value","where category_id=396"); ?>
                                     </span>&nbsp;of HIGCSE</td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[4]" type="checkbox" id="bursary_entry_req[4]" value="Matriculates (currently in grade 12) will be evaluated on Grade 11 results" <? if(isset($bursary_entry_req[4]) && trim($bursary_entry_req[4]) =="Matriculates (currently in grade 12) will be evaluated on Grade 11 results") echo "checked"; ?>>
                                   Matriculates (currently in grade 12) will be evaluated on Grade 11 results</td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[5]" type="checkbox" id="bursary_entry_req[5]" value="Complete exemption from Higher Education South Africa (HESA)" <? if(isset($bursary_entry_req[5]) && trim($bursary_entry_req[5]) =="Complete exemption from Higher Education South Africa (HESA)") echo "checked"; ?>>
                                   Complete exemption from Higher Education South Africa (HESA)</td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[6]" type="checkbox" id="bursary_entry_req[6]" value="br_5" <? if(isset($bursary_entry_req[6]) && trim($bursary_entry_req[6]) =="br_5") echo "checked"; ?>>
                                   Pass mark in <span class="comment">
                                     <?=fill_dropdown("br_5_1","job_options","option_name","option_name",trim($br_5_1),"Select","where category_id=398"); ?>
                                     </span> subjects on HIGCSE level including the following subject(s)<span class="comment">
                                       <?=fill_dropdown_multiple("br_5_2[]","job_options","option_name","option_name",trim($br_5_2),"no_value","where category_id=396",$att,"","br_5_2"); ?>
                                     </span></td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[7]" type="checkbox" id="bursary_entry_req[7]" value="br_6" <? if(isset($bursary_entry_req[7]) && trim($bursary_entry_req[7]) =="br_6") echo "checked"; ?>>
                                   Preference will be given to&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_6_1","job_options","option_name","option_name",trim($br_6_1),"no_value","where category_id=383","","option_id"); ?>
                                     </span><span class="comment">
                                       <input name="br_6_2" type="text" style="display:none " id="br_6_1" value="<?=$br_6_2?>" size="15">
                                       </span>&nbsp;<span class="comment">
                                         <?=fill_dropdown("br_6_3","job_country","country_name","country_name",trim($br_6_3),"no_value"); ?>
                                       </span></td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[8]" type="checkbox" id="bursary_entry_req[8]" value="br_7" <? if(isset($bursary_entry_req[8]) && trim($bursary_entry_req[8]) =="br_7") echo "checked"; ?>>
                                   Preference will be given to&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_7_1","job_options","option_name","option_name",trim($br_7_1),"no_value","where category_id=384","","option_id"); ?>
                                   </span></td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[9]" type="checkbox" id="bursary_entry_req[9]" value="br_8" <? if(isset($bursary_entry_req[9]) && trim($bursary_entry_req[9]) =="br_8") echo "checked"; ?>>
                                   Preference will be given to&nbsp;<span class="comment">
                                     <?=fill_dropdown("br_8_1","job_options","option_name","option_name",trim($br_8_1),"no_value","where category_id=385","","option_id"); ?>
                                   </span></td>
                               </tr>
                               <tr>
                                 <td>&nbsp;</td>
                                 <td><input name="bursary_entry_req[10]" type="checkbox" id="bursary_entry_req[10]" value="preference will be given to financially disadvantaged candidates" <? if(isset($bursary_entry_req[10]) && trim($bursary_entry_req[10]) =="preference will be given to financially disadvantaged candidates") echo "checked"; ?>>
                                   preference will be given to financially disadvantaged candidates</td>
                               </tr>
                           </table></td>
                         </tr>
                         <tr>
                           <td colspan="3">&nbsp;</td>
                         </tr>
                     </table></td>
                   </tr>
               </table></td>
               <td width="218" valign="top">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="2"><table width="100%" cellpadding="5" cellspacing="0">
                   <tr>
                     <td colspan="4"><span class="sectionRecheading">Options</span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif" alt="separator" width="100%" height="1"></td>
                   </tr>
                   <tr>
                     <td colspan="4"><p>Upload an employer specific application form if required:<span class="sectionRecheading"><img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('This function will normally be used by employers whose recruitment policy requires application on a set form. The employer should ensure that its fax number or e-mail address is displayed on the form as the applicant will complete and submit such form directly to the employer.  Normal recruitment functionality will thus be complimented by the application form as the employer only has to peruse the application forms of candidates as shortlisted through the system.')"></span></p>
                         <div>
                           <input type="file" name="fileField" id="fileField">
                           (PDF or Word  document only)</div>
                       <br>
                       <br>
                         <div>If you have a printed ad, you can upload it in PDF or JPEG here: 
                           (Note: This will appear on your job ad as a link so<br>
                           jobseekers can view it online) <br>
                                            <input type="file" name="ad_print" id="ad_print">
                       </div></td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4"><span class="sectionRecheading">Display Information </span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif" alt="separator" width="100%" height="1"></td>
                   </tr>
                   <tr>
                     <td width="8">&nbsp;</td>
                     <td colspan="3"><input name="chkDisplay[]" type="checkbox" id="chkDisplay" value="1" <? if(strchr($display_info,"1")) echo "checked"; ?>>
                       For any enquiries regarding this advertisement, please contact <span class="subhead_gray_small_italic">
                         <?=$rsRecruiter->rec_name?>
                         </span> at telephone number <span class="subhead_gray_small">
                           <?=$rsRecruiter->rec_phone?>
                         </span>.</td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td colspan="3"><input name="chkDisplay[]" type="checkbox" id="chkDisplay" value="2" <? if(strchr($display_info,"2")) echo "checked"; ?>>
                         <span class="subhead_gray_small">
                         <?=$rsRecruiter->comp_name?>
                       </span> supports the principles of Affirmative Actions and Employment Equity. </td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td colspan="3"><input name="chkDisplay[]" type="checkbox" id="chkDisplay" value="3" <? if(strchr($display_info,"3")) echo "checked"; ?>>
                         <span class="subhead_gray_small">
                         <?=$rsRecruiter->comp_name?>
                       </span> supports the principles of Affirmative Action Act &amp; is committed to advancement of individuals belonging to designated groups. </td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4"><span class="sectionRecheading">Added Questions </span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif" alt="separator" width="100%" height="1"></td>
                   </tr>
                   <tr>
                     <td colspan="4"><table width="100%" cellpadding="3" cellspacing="0">
                         <tr>
                           <td>&nbsp;</td>
                           <td><?=fill_dropdown('ques[]','job_options', 'option_name', "option_name",$ques1,"Select Question","where category_id=16")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><?=fill_dropdown('ques[]','job_options', 'option_name', "option_name",$ques2,"Select Question","where category_id=16")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><?=fill_dropdown('ques[]','job_options', 'option_name', "option_name",$ques3,"Select Question","where category_id=16")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><?=fill_dropdown('ques[]','job_options', 'option_name', "option_name",$ques4,"Select Question","where category_id=16")?></td>
                         </tr>
                         <tr>
                           <td width="7">&nbsp;</td>
                           <td><?=fill_dropdown('ques[]','job_options', 'option_name', "option_name",$ques5,"Select Question","where category_id=16")?></td>
                         </tr>
                     </table></td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4"><span class="sectionRecheading">Filters<img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('Only filters ticked will be used in determining a match between the employer&rsquo;s requirements and the bursary seeker&rsquo;s status.')"></span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><table width="100%" cellpadding="2" cellspacing="0">
                         <tr>
                           <td width="11">&nbsp;</td>
                           <td height="30">Filter word demographic info </td>
                           <td>Requirement</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter2" value="dob" <? if($gender!="") echo "checked" ?>>
                             Date of birth (
                             
                             
                             earlier than
                             
                             ) </td>
                           <td><select name="day" id="day">
                               <option selected>1</option>
                               <option>2</option>
                               <option>3</option>
                               <option>4</option>
                               <option>5</option>
                               <option>6</option>
                               <option>7</option>
                               <option>8</option>
                               <option>9</option>
                               <option>10</option>
                               <option>11</option>
                               <option>12</option>
                               <option>13</option>
                               <option>14</option>
                               <option>15</option>
                               <option>16</option>
                               <option>17</option>
                               <option>18</option>
                               <option>19</option>
                               <option>20</option>
                               <option>21</option>
                               <option>22</option>
                               <option>23</option>
                               <option>24</option>
                               <option>25</option>
                               <option>26</option>
                               <option>27</option>
                               <option>28</option>
                               <option>29</option>
                               <option>30</option>
                               <option>31</option>
                             </select>
                               <select name="month" id="month">
                                 <option selected>January</option>
                                 <option>February</option>
                                 <option>March</option>
                                 <option>April</option>
                                 <option>May</option>
                                 <option>June</option>
                                 <option>July</option>
                                 <option>August</option>
                                 <option>September</option>
                                 <option>October</option>
                                 <option>November</option>
                                 <option>December</option>
                               </select>
                               <select name='seeker_year' id='seeker_year'>
                                 <option value='' selected>Year</option>
                                 <option value='1940' >1940</option>
                                 <option value='1941' >1941</option>
                                 <option value='1942' >1942</option>
                                 <option value='1943' >1943</option>
                                 <option value='1944' >1944</option>
                                 <option value='1945' >1945</option>
                                 <option value='1946' >1946</option>
                                 <option value='1947' >1947</option>
                                 <option value='1948' >1948</option>
                                 <option value='1949' >1949</option>
                                 <option value='1950' >1950</option>
                                 <option value='1951' >1951</option>
                                 <option value='1952' >1952</option>
                                 <option value='1953' >1953</option>
                                 <option value='1954' >1954</option>
                                 <option value='1955' >1955</option>
                                 <option value='1956' >1956</option>
                                 <option value='1957' >1957</option>
                                 <option value='1958' >1958</option>
                                 <option value='1959' >1959</option>
                                 <option value='1960' >1960</option>
                                 <option value='1961' >1961</option>
                                 <option value='1962' >1962</option>
                                 <option value='1963' >1963</option>
                                 <option value='1964' >1964</option>
                                 <option value='1965' >1965</option>
                                 <option value='1966' >1966</option>
                                 <option value='1967' >1967</option>
                                 <option value='1968' >1968</option>
                                 <option value='1969' >1969</option>
                                 <option value='1970' >1970</option>
                                 <option value='1971' >1971</option>
                                 <option value='1972' >1972</option>
                                 <option value='1973' >1973</option>
                                 <option value='1974' >1974</option>
                                 <option value='1975' >1975</option>
                                 <option value='1976' >1976</option>
                                 <option value='1977' >1977</option>
                                 <option value='1978' >1978</option>
                                 <option value='1979' >1979</option>
                                 <option value='1980' >1980</option>
                                 <option value='1981' >1981</option>
                                 <option value='1982' >1982</option>
                                 <option value='1983' >1983</option>
                                 <option value='1984' >1984</option>
                                 <option value='1985' >1985</option>
                                 <option value='1986' >1986</option>
                                 <option value='1987' >1987</option>
                                 <option value='1988' >1988</option>
                                 <option value='1989' >1989</option>
                                 <option value='1990' >1990</option>
                                 <option value='1991' >1991</option>
                                 <option value='1992' >1992</option>
                                 <option value='1993' >1993</option>
                                 <option value='1994' >1994</option>
                                 <option value='1995' >1995</option>
                                 <option value='1996' >1996</option>
                                 <option value='1997' >1997</option>
                                 <option value='1998' >1998</option>
                                 <option value='1999' >1999</option>
                                 <option value='2000' >2000</option>
                                 <option value='2001' >2001</option>
                                 <option value='2002' >2002</option>
                                 <option value='2003' >2003</option>
                                 <option value='2004' >2004</option>
                                 <option value='2005' >2005</option>
                                 <option value='2006' >2006</option>
                                 <option value='2007' >2007</option>
                                 <option value='2008' >2008</option>
                                 <option value='2009' >2009</option>
                             </select></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="citizenship" <? if($citizenship!="") echo "checked" ?>>
                             Citizenship</td>
                           <td><?=fill_dropdown('citizenship','job_country', 'country_name', "country_name", $citizenship,"Select"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td width="212"><input name="chkFilter[]" type="checkbox" id="chkFilter" value="gender" <? if($gender!="") echo "checked" ?>>
                             Gender</td>
                           <td width="733"><select name="gender">
                               <option value="" <? if($gender=="") echo "selected" ?>>Either</option>
                               <option value="Male" <? if($gender=="Male") echo "selected" ?>>Male</option>
                               <option value="Female" <? if($gender=="Female") echo "selected" ?>>Female</option>
                             </select>
                           </td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="equity_status" <? if($equity_status !="") echo "checked" ?>>
                             Equity Status </td>
                           <td><?=fill_dropdown('equity_status','job_options', 'option_name', "option_name",$equity_status,"Select","where category_id=9")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter3" value="fieldofstudy" <? if($equity_status !="") echo "checked" ?>>
                             Field of Study </td>
                           <td><span class="comment">
                             <select name="fieldofstudy">
                               <option value="">Select</option>
                               <option value="Advance Diploma: Accounting and Auditing">Advance Diploma: Accounting and Auditing</option>
                               <option value="Advance Diploma: Business Administration">Advance Diploma: Business Administration</option>
                               <option value="Advance Diploma: Taxation and Management ">Advance Diploma: Taxation and Management </option>
                               <option value="Advanced University Diploma: Nursing (Health Prom) ">Advanced University Diploma: Nursing (Health Prom) </option>
                               <option value="Advanced University Diploma: Nursing Science (Critical Care)">Advanced University Diploma: Nursing Science (Critical Care)</option>
                               <option value="Advanced University Diploma: Nursing Science (Operating Room)">Advanced University Diploma: Nursing Science (Operating Room)</option>
                               <option value="B Tech: Animal Health ">B Tech: Animal Health </option>
                               <option value="B Tech: Nature Conservation">B Tech: Nature Conservation</option>
                               <option value="B.Tech. Accounting and Finance  ">B.Tech. Accounting and Finance </option>
                               <option value="Baccalaureus of Juris (B Juris)">Baccalaureus of Juris (B Juris)</option>
                               <option value="Bachelor of Accounting (B. Accounting)">Bachelor of Accounting (B. Accounting)</option>
                               <option value="Bachelor of Arts (BA)">Bachelor of Arts (BA)</option>
                               <option value="Bachelor of Arts: Environmental Management in Natural Sciences (Biochemistry and Microbiology Str">Bachelor of Arts: Environmental Management in Natural Sciences (Biochemistry and Microbiology Str</option>
                               <option value="Bachelor of Arts: Library Science">Bachelor of Arts: Library Science</option>
                               <option value="Bachelor of Arts: Media Studies">Bachelor of Arts: Media Studies</option>
                               <option value="Bachelor of Arts: Natural Sciences (Physiology and Zoology Stream) ">Bachelor of Arts: Natural Sciences (Physiology and Zoology Stream) </option>
                               <option value="Bachelor of Arts: Social Work">Bachelor of Arts: Social Work</option>
                               <option value="Bachelor of Arts: Tourism">Bachelor of Arts: Tourism</option>
                               <option value="Bachelor of Business Administration (B.B.A.)">Bachelor of Business Administration (B.B.A.)</option>
                               <option value="Bachelor of Consumer Science: Clothing Management ">Bachelor of Consumer Science: Clothing Management </option>
                               <option value="Bachelor of Economics (B.Econ.)">Bachelor of Economics (B.Econ.)</option>
                               <option value="Bachelor of Education: Adult Education">Bachelor of Education: Adult Education</option>
                               <option value="Bachelor of Human Ecology: Community Agriculture ">Bachelor of Human Ecology: Community Agriculture </option>
                               <option value="Bachelor of Human Ecology: Community Nutrition">Bachelor of Human Ecology: Community Nutrition</option>
                               <option value="Bachelor of Human Ecology: Social Development">Bachelor of Human Ecology: Social Development</option>
                               <option value="Bachelor of Laws (LL B)">Bachelor of Laws (LL B)</option>
                               <option value="Bachelor of Nursing Science (Advanced Practice)">Bachelor of Nursing Science (Advanced Practice)</option>
                               <option value="Bachelor of Office Management &amp; Technology">Bachelor of Office Management &amp; Technology</option>
                               <option value="Bachelor of Psychology">Bachelor of Psychology</option>
                               <option value="Bachelor of Public Administration (B.Admin)">Bachelor of Public Administration (B.Admin)</option>
                               <option value="Bachelor of Science: Agricultural Science ">Bachelor of Science: Agricultural Science </option>
                               <option value="Bachelor of Science: Agriculture (Agricultural Economics) ">Bachelor of Science: Agriculture (Agricultural Economics) </option>
                               <option value="Bachelor of Science: Agriculture (Animal Science) ">Bachelor of Science: Agriculture (Animal Science) </option>
                               <option value="Bachelor of Science: Agriculture (Crop science) ">Bachelor of Science: Agriculture (Crop science) </option>
                               <option value="Bachelor of Science: Agriculture (Food Science &amp; Technology) ">Bachelor of Science: Agriculture (Food Science &amp; Technology) </option>
                               <option value="Bachelor of Science: Biochemistry Major and Biology Minor ">Bachelor of Science: Biochemistry Major and Biology Minor </option>
                               <option value="Bachelor of Science: Biochemistry Major and Chemistry Minor">Bachelor of Science: Biochemistry Major and Chemistry Minor</option>
                               <option value="Bachelor of Science: Biomedical Engineering">Bachelor of Science: Biomedical Engineering</option>
                               <option value="Bachelor of Science: Chemical Engineering">Bachelor of Science: Chemical Engineering</option>
                               <option value="Bachelor of Science: Chemistry Major and Biology Minor">Bachelor of Science: Chemistry Major and Biology Minor</option>
                               <option value="Bachelor of Science: Chemistry Major and Geology Minor">Bachelor of Science: Chemistry Major and Geology Minor</option>
                               <option value="Bachelor of Science: Chemistry Major and Physics Minor">Bachelor of Science: Chemistry Major and Physics Minor</option>
                               <option value="Bachelor of Science: Civil Engineering">Bachelor of Science: Civil Engineering</option>
                               <option value="Bachelor of Science: Computer Engineering">Bachelor of Science: Computer Engineering</option>
                               <option value="Bachelor of Science: Computer Science Major and Information Technology Minor ">Bachelor of Science: Computer Science Major and Information Technology Minor </option>
                               <option value="Bachelor of Science: Computer Science Major and Mathematics Minor">Bachelor of Science: Computer Science Major and Mathematics Minor</option>
                               <option value="Bachelor of Science: Computer Science Major and Statistics Minor">Bachelor of Science: Computer Science Major and Statistics Minor</option>
                               <option value="Bachelor of Science: Electrical Engineering">Bachelor of Science: Electrical Engineering</option>
                               <option value="Bachelor of Science: Electrical Power Engineering">Bachelor of Science: Electrical Power Engineering</option>
                               <option value="Bachelor of Science: Electronics Engineering">Bachelor of Science: Electronics Engineering</option>
                               <option value="Bachelor of Science: Environmental Biology Major and Geography Minor ">Bachelor of Science: Environmental Biology Major and Geography Minor </option>
                               <option value="Bachelor of Science: Environmental Biology Major and Geology Minor ">Bachelor of Science: Environmental Biology Major and Geology Minor </option>
                               <option value="Bachelor of Science: Geology Single Major">Bachelor of Science: Geology Single Major</option>
                               <option value="Bachelor of Science: Industrial Engineering">Bachelor of Science: Industrial Engineering</option>
                               <option value="Bachelor of Science: Mathematics Major and Computer Science Minor">Bachelor of Science: Mathematics Major and Computer Science Minor</option>
                               <option value="Bachelor of Science: Mathematics Major and Physics Minor">Bachelor of Science: Mathematics Major and Physics Minor</option>
                               <option value="Bachelor of Science: Mathematics Major and Statistics Minor">Bachelor of Science: Mathematics Major and Statistics Minor</option>
                               <option value="Bachelor of Science: Mechanical Engineering">Bachelor of Science: Mechanical Engineering</option>
                               <option value="Bachelor of Science: Metallurgical Engineering">Bachelor of Science: Metallurgical Engineering</option>
                               <option value="Bachelor of Science: Micro Biology and Biochemistry Minor ">Bachelor of Science: Micro Biology and Biochemistry Minor </option>
                               <option value="Bachelor of Science: Micro Biology and Chemistry Minor">Bachelor of Science: Micro Biology and Chemistry Minor</option>
                               <option value="Bachelor of Science: Mining Engineering">Bachelor of Science: Mining Engineering</option>
                               <option value="Bachelor of Science: Molecular Biology Major and Biochemistry Minor">Bachelor of Science: Molecular Biology Major and Biochemistry Minor</option>
                               <option value="Bachelor of Science: Molecular Biology Major and Chemistry Minor ">Bachelor of Science: Molecular Biology Major and Chemistry Minor </option>
                               <option value="Bachelor of Science: Natural Resources (Fisheries &amp; Aquatic Sciences)    ">Bachelor of Science: Natural Resources (Fisheries &amp; Aquatic Sciences) </option>
                               <option value="Bachelor of Science: Natural Resources (Integrated Environmental Science)    ">Bachelor of Science: Natural Resources (Integrated Environmental Science) </option>
                               <option value="Bachelor of Science: Physics Major and  Computer Science Minor ">Bachelor of Science: Physics Major and Computer Science Minor </option>
                               <option value="Bachelor of Science: Physics Major and Chemistry  Minor ">Bachelor of Science: Physics Major and Chemistry Minor </option>
                               <option value="Bachelor of Science: Physics Major and Geology Minor">Bachelor of Science: Physics Major and Geology Minor</option>
                               <option value="Bachelor of Science: Physics Major and Mathematics Minor">Bachelor of Science: Physics Major and Mathematics Minor</option>
                               <option value="Bachelor of Science: Population Studies ">Bachelor of Science: Population Studies </option>
                               <option value="Bachelor of Science: Population Studies Major and Geography Minor">Bachelor of Science: Population Studies Major and Geography Minor</option>
                               <option value="Bachelor of Science: Population Studies Major and Sociology Minor ">Bachelor of Science: Population Studies Major and Sociology Minor </option>
                               <option value="Bachelor of Science: Population Studies Major and Statistics Minor ">Bachelor of Science: Population Studies Major and Statistics Minor </option>
                               <option value="Bachelor of Science: Pre- Medical Training">Bachelor of Science: Pre- Medical Training</option>
                               <option value="Bachelor of Science: Statistics Major and Computer Science Minor ">Bachelor of Science: Statistics Major and Computer Science Minor </option>
                               <option value="Bachelor of Science: Statistics Major and Economics Minor">Bachelor of Science: Statistics Major and Economics Minor</option>
                               <option value="Bachelor of Science: Statistics Major and Mathematics Minor">Bachelor of Science: Statistics Major and Mathematics Minor</option>
                               <option value="Bachelor of Science: Statistics Major and Population Studies Minor">Bachelor of Science: Statistics Major and Population Studies Minor</option>
                               <option value="Bachelor of Science: Telecommunication Engineering">Bachelor of Science: Telecommunication Engineering</option>
                               <option value="Bachelor of Technology: Public Management   (Public Management with Development Management Specialis">Bachelor of Technology: Public Management (Public Management with Development Management Specialis</option>
                               <option value="Bachelor of Technology: Public Management  (Public Management with Regional and Local Government Spe">Bachelor of Technology: Public Management (Public Management with Regional and Local Government Spe</option>
                               <option value="Bachelor-Honours Degree: Human Resources Management ">Bachelor-Honours Degree: Human Resources Management </option>
                               <option value="Certificate: Accounting and Taxation">Certificate: Accounting and Taxation</option>
                               <option value="Certificate: Advanced Nursing Skills">Certificate: Advanced Nursing Skills</option>
                               <option value="Certificate: Advanced University Diploma in Nursing (Health Prom) ">Certificate: Advanced University Diploma in Nursing (Health Prom) </option>
                               <option value="Certificate: Criminal Justice, Constitutionalism and Human Rights ">Certificate: Criminal Justice, Constitutionalism and Human Rights </option>
                               <option value="Certificate: Dispute Resolution (Mediation, Arbitration and Conciliation">Certificate: Dispute Resolution (Mediation, Arbitration and Conciliation</option>
                               <option value="Certificate: Pharmacotherapy">Certificate: Pharmacotherapy</option>
                               <option value="Certificate: Public Management ">Certificate: Public Management </option>
                               <option value="Certificate: Taxation and Management">Certificate: Taxation and Management</option>
                               <option value="Certificate: Theatre Technique ">Certificate: Theatre Technique </option>
                               <option value="Diploma: Accounting and Auditing">Diploma: Accounting and Auditing</option>
                               <option value="Diploma: Adult Education &amp; Community Development">Diploma: Adult Education &amp; Community Development</option>
                               <option value="Diploma: Agriculture ">Diploma: Agriculture </option>
                               <option value="Diploma: Comprehensive Nursing and Midwifery Science ">Diploma: Comprehensive Nursing and Midwifery Science </option>
                               <option value="Diploma: Forestry     ">Diploma: Forestry </option>
                               <option value="Diploma: Library Science">Diploma: Library Science</option>
                               <option value="Diploma: Local Government Studies">Diploma: Local Government Studies</option>
                               <option value="Diploma: Midwifery Science">Diploma: Midwifery Science</option>
                               <option value="Diploma: Natural Resource Management">Diploma: Natural Resource Management</option>
                               <option value="Diploma: Public Management">Diploma: Public Management</option>
                               <option value="Diploma: Public Relations">Diploma: Public Relations</option>
                               <option value="Diploma: Records and Archives Management ">Diploma: Records and Archives Management </option>
                               <option value="Diploma: Taxation and Management">Diploma: Taxation and Management</option>
                               <option value="Diploma: Visual Arts">Diploma: Visual Arts</option>
                               <option value="Honours: Bachelor of Arts in Geography ">Honours: Bachelor of Arts in Geography </option>
                               <option value="Honours: Bachelor of Science in Geography ">Honours: Bachelor of Science in Geography </option>
                               <option value="Master of Arts (MA)">Master of Arts (MA)</option>
                               <option value="Master of Arts: Clinical Psychology ">Master of Arts: Clinical Psychology </option>
                               <option value="Master of Arts: Industrial Psychology">Master of Arts: Industrial Psychology</option>
                               <option value="Master of Arts: Performing Arts">Master of Arts: Performing Arts</option>
                               <option value="Master of Arts: Political Studies">Master of Arts: Political Studies</option>
                               <option value="Master of Arts: Religion">Master of Arts: Religion</option>
                               <option value="Master of Arts: Security and Strategic Studies ">Master of Arts: Security and Strategic Studies </option>
                               <option value="Master of Business Administration">Master of Business Administration</option>
                               <option value="Master of Consumer Science">Master of Consumer Science</option>
                               <option value="Master of Education ">Master of Education </option>
                               <option value="Master of Education: Adult Education">Master of Education: Adult Education</option>
                               <option value="Master of Education: Literacy and Learning">Master of Education: Literacy and Learning</option>
                               <option value="Master of Law: Thesis only  (LL M) ">Master of Law: Thesis only (LL M) </option>
                               <option value="Master of Medical-Surgical">Master of Medical-Surgical</option>
                               <option value="Master of Nursing Science">Master of Nursing Science</option>
                               <option value="Master of Public Administration (M.Admin.)">Master of Public Administration (M.Admin.)</option>
                               <option value="Master of Public Health">Master of Public Health</option>
                               <option value="Master of Science:  Economics">Master of Science: Economics</option>
                               <option value="Master of Science: Accounting &amp; Finance">Master of Science: Accounting &amp; Finance</option>
                               <option value="Master of Science: Biodiversity Management &amp; Research">Master of Science: Biodiversity Management &amp; Research</option>
                               <option value="Master of Science: Chemistry">Master of Science: Chemistry</option>
                               <option value="Master of Science: Information Technology">Master of Science: Information Technology</option>
                               <option value="Master of Science: Thesis  only">Master of Science: Thesis only</option>
                               <option value="Master of Social Science: Rangeland Resources Management ">Master of Social Science: Rangeland Resources Management </option>
                               <option value="Master of Theology (MTh)">Master of Theology (MTh)</option>
                               <option value="National Certificate: Accounting and Finance">National Certificate: Accounting and Finance</option>
                               <option value="National Certificate: Business Studies">National Certificate: Business Studies</option>
                               <option value="National Certificate: Office Management &amp; Technology">National Certificate: Office Management &amp; Technology</option>
                               <option value="National Diploma: Accounting and Finance">National Diploma: Accounting and Finance</option>
                               <option value="National Diploma: Human Resource Management ">National Diploma: Human Resource Management </option>
                               <option value="National Diploma: Office Management &amp; Technology">National Diploma: Office Management &amp; Technology</option>
                               <option value="National Diploma: Radiography  (Diagnostic)">National Diploma: Radiography (Diagnostic)</option>
                               <option value="Ph.D.: Adult Education">Ph.D.: Adult Education</option>
                               <option value="Ph.D.: Curriculum Studies, Instruction and Assessment">Ph.D.: Curriculum Studies, Instruction and Assessment</option>
                               <option value="Ph.D.: Educational Foundation and Administration ">Ph.D.: Educational Foundation and Administration </option>
                               <option value="Ph.D.: Nursing Science">Ph.D.: Nursing Science</option>
                               <option value="Ph.D.: Philosophy ">Ph.D.: Philosophy </option>
                               <option value="Ph.D.: Philosophy (by Thesis only)">Ph.D.: Philosophy (by Thesis only)</option>
                               <option value="Ph.D.: Philosophy in Law  ">Ph.D.: Philosophy in Law </option>
                               <option value="Ph.D.: Political Studies">Ph.D.: Political Studies</option>
                               <option value="Ph.D.: Public Administration">Ph.D.: Public Administration</option>
                               <option value="Post Graduate Diploma: Education">Post Graduate Diploma: Education</option>
                               <option value="Postgraduate Diploma: Business Administration">Postgraduate Diploma: Business Administration</option>
                               <option value="Postgraduate Diploma: Internal Auditing">Postgraduate Diploma: Internal Auditing</option>
                               <option value="Postgraduate Diploma: Translation (PGDT)">Postgraduate Diploma: Translation (PGDT)</option>
                               <option value="Specialised Certificate: Customary Law ">Specialised Certificate: Customary Law </option>
                               <option value="Specialised Diploma: Dispute Resolution (Mediation, Arbitration and Conciliation)">Specialised Diploma: Dispute Resolution (Mediation, Arbitration and Conciliation)</option>
                               <option value="Specialised Diploma: Educational Management and Leadership">Specialised Diploma: Educational Management and Leadership</option>
                               <option value="Specialised Diploma: Gender &amp; Development Studies">Specialised Diploma: Gender &amp; Development Studies</option>
                               <option value="Specialised Postgraduate Diploma: Special Education">Specialised Postgraduate Diploma: Special Education</option>
                             </select>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter4" value="typeofqualification" <? if($typeofqualification !="") echo "checked" ?>>
                             Type of Qualification</td>
                           <td><span class="comment">
                             <?=fill_dropdown("typeofqualification","job_options","option_name","option_name",$typeofqualification,"Select","where category_id=386","option_id"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter4" value="levelofqualification" <? if($levelofqualification !="") echo "checked" ?>>
                             Level of Qualification</td>
                           <td><span class="comment">
                             <?=fill_dropdown("levelofqualification","job_options","option_name","option_name",trim($levelofqualification),"Select","where category_id=389"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter4" value="typeofbursary" <? if($typeofbursary !="") echo "checked" ?>>
                             Type of Bursary</td>
                           <td><span class="comment">
                             <?=fill_dropdown("typeofbursary","job_options","option_name","option_name",trim($typeofbursary),"Select","where category_id=394"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter4" value="prefinstitution" <? if($prefinstitution !="") echo "checked" ?>>
                             Preferred institution of study</td>
                           <td><?=fill_dropdown("prefinstitution","job_options","option_name","option_name",trim($prefinstitution),"Select","where category_id=387"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter4" value="countryofstudy" <? if($countryofstudy !="") echo "checked" ?>>
                             Country of study</td>
                           <td><span class="comment">
                             <?=fill_dropdown("countryofstudy","job_options","option_name","option_name",trim($countryofstudy),"Select","where category_id=388"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter4" value="advancementlevel" <? if($advancementlevel !="") echo "checked" ?>>
                             Advancement level of qualification</td>
                           <td><span class="comment">
                             <?=fill_dropdown("bursary_level1","job_options","option_name","option_name",trim($advancementlevel),"Select","where category_id=390"); ?>
                           </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter5" value="accepted" <? if($accepted !="") echo "checked" ?>>
                             Accepted by relevant tertiary institution to start or continue with studies</td>
                           <td valign="top"><select name="accepted" id="accepted">
                               <option value="">Select</option>
                               <option <? if($accepted =="Yes") echo "selected" ?> value="Yes">Yes</option>
                           </select></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter6" value="passrate" <? if($passrate !="") echo "checked" ?>>
                             Pass rate in all subjects at most recent examination</td>
                           <td valign="top"><select name="passrate" id="passrate">
                               <option value="">Select</option>
                               <option <? if($passrate =="Yes") echo "selected" ?> value="Yes">Yes</option>
                           </select></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter7" value="parentincome" <? if($parentincome !="") echo "checked" ?>>
                             Your parents&rsquo; average and combined income equal to or lower than N$ 7000-00 per month</td>
                           <td valign="top"><select name="parentincome" id="parentincome">
                               <option value="">Select</option>
                               <option <? if($parentincome =="Yes") echo "selected" ?> value="Yes">Yes</option>
                           </select></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td height="30">&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td height="30" colspan="2">Filter for minimum education level </td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="ter_qualification" <? if($ter_qualification!="") echo "checked" ?>>
                             Tertiary qualification </td>
                           <td><?=fill_dropdown('ter_qualification','job_options', 'option_name', "option_name",$ter_qualification,"N/A","where category_id=2")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="sec_qualification" <? if($sec_qualification!="") echo "checked" ?>>
                             Secondary qualification </td>
                           <td><?=fill_dropdown('sec_qualification','job_options', 'option_name', "option_name",$sec_qualification,"N/A","where category_id=3")?></td>
                         </tr>
                     </table></td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="30" colspan="4" class="sectionRecheading">Send CV to another email address</td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif" alt="hr" width="100%" height="1"></td>
                   </tr>
                   <tr>
                     <td colspan="4" height="10"></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td colspan="3"><input name="send_mail_another" onChange="send_mail_to_another(this);" type="checkbox" id="send_mail_another" value="1" <? if($confirm_mail == "1") echo "checked" ?>>
                       Send CV's to another e-mail account instead of the my e-mail account.<span id="another_email" style="display:none">&nbsp;&nbsp;&nbsp;Enter email-address :&nbsp;&nbsp;&nbsp;
                         <input type="text" value="<?=$another_mail?>" name="another_email_id">
                       </span></td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td width="8">&nbsp;</td>
                     <td width="378">&nbsp;</td>
                     <td width="564" height="50" colspan="2" valign="middle">
					  <? $redirectUrl = 'job_search_details.php?id='.$_GET["ad_id"].'&url=job_search_result.php&urlPage='.$_GET["urlPage"]; ?>
					 <img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$redirectUrl?>');" style="cursor:pointer">
                       &nbsp;&nbsp;&nbsp; <img src="../../images/update.gif" width="60" height="22" border="0" onClick="edit_job_ad_bursary(document.form1);" style="cursor:pointer"> </td>
                   </tr>
               </table></td>
             </tr>
           </table>
           <script language="javascript" type="text/javascript">
			send_mail_to_another_load("<?=$confirm_mail?>");
		 </script>
           <!-- Page Body End-->
         </form></td>
     </tr>    
     <tr>
	 	<td>
			<? include("includes/bottom.php"); ?>
		</td>          
     </tr>
</table>
</body>
</html>

