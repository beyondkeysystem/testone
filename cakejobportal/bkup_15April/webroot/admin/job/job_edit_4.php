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

	$job_desc = "";
	$job_benefits = "";
	$job_skills = "";
	$experience = "";
	$salary_type = "";		
	
	$company_name = "";
	$company_desc = "";
	$vacancy = "";
	
	if(isset($_GET["vacancy"])) {
		$vacancy = $_GET["vacancy"];
	}
	
	$department = "";
	$another_mail="";
	$grade = "";
	$application_form = "";

	$date_of_taking = "";
	
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


	$position_name = "";
	$adFrom = "";
	$adTo = "";
	$level = "";
	$salary_from = "";
	$salary_to = "";	
	$based_in_town = "";
	$type = "";			
	$responsiblities1 = "";
	$responsiblities2 = "";
	$responsiblities3 = "";
	$responsiblities4 = "";
	$responsiblities5 = "";								
				
	$min_sec_qualification = "";			
	$min_ter_qualification = "";		
	$exp_required = "";		
	$preference = "";		
	$min_comp_literacy = "";		
	$special_comp_skill = "";
	$drivers_license = "";	
	$behaviour = "";	
	$registered_associations = "";	
	$display_info = "";	
	
	$ques1 = "";
	$ques2 = "";
	$ques3 = "";
	$ques4 = "";
	$ques5 = "";					
	$confirm_mail="";
	$gender = "";
	$equity_status = "";
	$citizenship = "";
	$town = "";		
	$drivers_license = "";
	$pa = "";
	$endorsement = "";
	$x_vehicle = "";
	$x_driver = "";
	$criminal_record = "";
	$ter_qualification = "";
	$sec_qualification = "";		
	$confirm = "";		
	
	$seeker_work_type = "";
	$seeker_vacation_type = "";
	$job_attach = "";
	$seeker_work_cat = "";
	$seeker_work_subcat = "";
	
	$available_month_to = "";
	$available_month_from = "";
	$type_of_part_time_work = "";	
	$available_days = "";
	
	$av_1_1 = "";
	$av_1_2 = "";

	$av_2_1 = "";
	$av_2_2 = "";

	$av_3_1 = "";
	$av_3_2 = "";
	
	$av_4_1 = "";
	$av_4_2 = "";
	
	$av_5_1 = "";
	$av_5_2 = "";
	
	$av_6_1 = "";
	$av_6_2 = "";

	$av_7_1 = "";
	$av_7_2 = "";

	$available_assume_duties = "";
	
		$sqlJob = "select * from job_ad where ad_id=" . $_GET['ad_id'];
		$resultJob = $objDb->ExecuteQuery($sqlJob);
		$rsJob = mysql_fetch_object($resultJob);
		
		
		$specialcomputerknowledge1=$rsJob->specialcomputerknowledge1;
		$specialcomputerknowledge2=$rsJob->specialcomputerknowledge2;
		$job_desc = $rsJob->job_desc;
		$job_benefits = $rsJob->job_benefits;
		$job_skills = $rsJob->job_skills;		
		$experience = $rsJob->experience;		
		$salary_type = $rsJob->salary_type;						
		
   		$adFrom = $rsJob->adFrom;		
   		$adTo = $rsJob->adTo;		
   		$level = $rsJob->level;	
		
		$company_name = $rsJob->company_name ;			
		$company_desc = $rsJob->company_desc ;			
		$vacancy = $rsJob->type_of_position ;
		$department = $rsJob->department ;
		$another_mail=$rsJob->another_email;
		$grade = $rsJob->grade ;
		$application_form = $rsJob->application_form  ;
		$date_of_taking = $rsJob->date_of_taking  ;

		$offered_package = $rsJob->offered_package;
		$confirm_mail=$rsJob->send_mail_another;
		//new Add ons
		$language1="";
		$language2="";
		$language3="";
		$computer1="";
		$computer2="";
		$computer3="";
		$computer4="";
		$functional1="";
		$functional2="";
		$functional3="";
		$behavioural1="";
		$behavioural2="";
		$behavioural3="";
		$filter_language="";
		$otherrequirements="";
		
		for($i=1;$i<=7;$i++)
		{
			$val="duty".$i;
			if(isset($_POST[$val]))
			{
				$$val=$_POST[$val];
			}
			else
			{
				$$val=$rsJob->$val;
			}
		}
		for($i=0;$i<=26;$i++)
		{
			$val="hide".$i;
			if(isset($_POST[$val]))
			{
				$$val=$_POST[$val];
			}
			else
			{
				$$val=$rsJob->$val;
			}
		}
		
		if(isset($_POST["language1"]))
		{
			$language1=$_POST["language1"];
		}
		else
		{
			$language1=$rsJob->language1;
		}
		if(isset($_POST["language2"]))
		{
			$language2=$_POST["language2"];
		}
		else
		{
			$language2=$rsJob->language2;
		}
		if(isset($_POST["language3"]))
		{
			$language3=$_POST["language3"];
		}
		else
		{
			$language3=$rsJob->language3;
		}
		if(isset($_POST["computer1"]))
		{
			$computer1=$_POST["computer1"];
		}
		else
		{
			$computer1=$rsJob->computer1;
		}
		if(isset($_POST["computer2"]))
		{
			$computer2=$_POST["computer2"];
		}
		else
		{
			$computer2=$rsJob->computer2;
		}
		if(isset($_POST["computer3"]))
		{
			$computer3=$_POST["computer3"];
		}
		else
		{
			$computer3=$rsJob->computer3;
		}
		if(isset($_POST["computer4"]))
		{
			$computer4=$_POST["computer4"];
		}
		else
		{
			$computer4=$rsJob->computer4;
		}
		if(isset($_POST["computer5"]))
		{
			$computer5=$_POST["computer5"];
		}
		else
		{
			$computer5=$rsJob->computer5;
		}
		if(isset($_POST["supervisoryexp"]))
		{
			$supervisoryexp=$_POST["supervisoryexp"];
		}
		else
		{
			$supervisoryexp=$rsJob->supervisoryexp;
		}
		if(isset($_POST["managmentexp"]))
		{
			$managmentexp=$_POST["managmentexp"];
		}
		else
		{
			$managmentexp=$rsJob->managmentexp;
		}
		if(isset($_POST["functional1"]))
		{
			$functional1=$_POST["functional1"];
		}
		else
		{
			$functional1=$rsJob->functional1;
		}
		if(isset($_POST["functional2"]))
		{
			$functional2=$_POST["functional2"];
		}
		else
		{
			$functional2=$rsJob->functional2;
		}
		if(isset($_POST["functional3"]))
		{
			$functional3=$_POST["functional3"];
		}
		else
		{
			$functional3=$rsJob->functional3;
		}
		if(isset($_POST["behavioural1"]))
		{
			$behavioural1=$_POST["behavioural1"];
		}
		else
		{
			$behavioural1=$rsJob->behavioural1;
		}
		if(isset($_POST["behavioural2"]))
		{
			$behavioural2=$_POST["behavioural2"];
		}
		else
		{
			$behavioural2=$rsJob->behavioural2;
		}
		if(isset($_POST["behavioural3"]))
		{
			$behavioural3=$_POST["behavioural3"];
		}
		else
		{
			$behavioural3=$rsJob->behavioural3;
		}
		if(isset($_POST["otherrequirements"]))
		{
			$otherrequirements=$_POST["otherrequirements"];
		}
		else
		{
			$otherrequirements=$rsJob->otherrequirements;
		}
		if(isset($_POST["filter_language"]))
		{
			$filter_language=$_POST["filter_language"];
		}
		else
		{
			$filter_language=$rsJob->filter_language;
		}
		//end of new add ons
		
		
		
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
		
   		$position_name = $rsJob->position_name;			
   		$salary_from = $rsJob->salary_from;		
   		$salary_to = $rsJob->salary_to;						
   		$based_in_town = $rsJob->town;						
		$type = $rsJob->type;			 
		
		for($i=1; $i<=5; $i++)
		{
			$var = "responsiblities" . intval($i);
			$$var  = $rsJob->$var;		
		}
					
		$min_sec_qualification = $rsJob->min_sec_qualification;			
		$min_ter_qualification = $rsJob->min_ter_qualification;		
		$exp_required = $rsJob->exp_required;		
		$preference = $rsJob->preference;		
		$min_comp_literacy = $rsJob->min_comp_literacy;		
		$special_comp_skill = $rsJob->special_comp_skill;
		$drivers_license = $rsJob->drivers_license;	
		$behaviour = $rsJob->behaviour;	
		$registered_associations = $rsJob->registered_associations;	

		$display_info = $rsJob->display_info;	

		for($i=1; $i<=5; $i++)
		{
			$var = "ques" . intval($i);
			$$var = $rsJob->$var;				
		}
		
		$gender = $rsJob->filter_gender;													
		$equity_status = $rsJob->filter_equity_status;													
		$citizenship = $rsJob->filter_citizenship;													
		$town = $rsJob->filter_town;													
		$drivers_license = $rsJob->filter_drivers_license;																					
		$pa = $rsJob->filter_pa;													
		$endorsement = $rsJob->filter_endorsement;													
		$x_vehicle = $rsJob->filter_x_vehicle;													
		$x_driver = $rsJob->filter_x_driver;													
		$criminal_record = $rsJob->filter_criminal_record;																					
		$ter_qualification = $rsJob->filter_ter_qualification;													
		$sec_qualification = $rsJob->filter_sec_qualification;		
		$industry_filter=$rsJob->filter_industry_filter;	
		$level_filter=$rsJob->filter_level_filter;	
		$language_filter=$rsJob->filter_language_filter;
		$industry=$rsJob->industry;
		
		
		$seeker_work_type = $rsJob->seeker_work_type;
		if($seeker_work_type == "Vacation Work") {
			$seeker_vacation_type = $rsJob->seeker_vacation_type;
		} else if($seeker_work_type == "Job Attachment") {
			$job_attach = $rsJob->job_attach;
		}
		$seeker_work_cat = $rsJob->seeker_work_cat;
		$seeker_work_subcat = $rsJob->seeker_work_subcat;
		$available_month_to =$rsJob->available_month_to;
		$available_month_from = $rsJob->available_month_from;
		$type_of_part_time_work = $rsJob->type_of_part_time_work;
		
		
		if($rsJob->available_days != "") {
			$available_days =  explode("-/!-", $rsJob->available_days);	
			foreach($available_days as $key=>$value) {
				$available_days1 = explode("/-/",$value);
				//print_r($available_days1);
				$bur_inc = explode("/#/",$available_days1[1]) ;
				
				if($available_days1[0] == 0 ) {
					$available_days[$available_days1[0]] = "av_1";
					$av_1_1 = $bur_inc[0] ;
					$av_1_2 = $bur_inc[1] ;
				} else if($available_days1[0] == 1) {
					$available_days[$available_days1[0]] = "av_2";
					$av_2_1 = $bur_inc[0] ;
					$av_2_2 = $bur_inc[1] ;
				} else if($available_days1[0] == 2) {
					$available_days[$available_days1[0]] = "av_3";
					$av_3_1 = $bur_inc[0] ;
					$av_3_2 = $bur_inc[1] ;
				} else if($available_days1[0] == 3) {
					$available_days[$available_days1[0]] = "av_4";
					$av_4_1 = $bur_inc[0] ;
					$av_4_2 = $bur_inc[1] ;
				} else if($available_days1[0] == 4) {
					$available_days[$available_days1[0]] = "av_5";
					$av_5_1 = $bur_inc[0] ;
					$av_5_2 = $bur_inc[1] ;
				} else if($available_days1[0] == 5) {
					$available_days[$available_days1[0]] = "av_6";
					$av_6_1 = $bur_inc[0] ;
					$av_6_2 = $bur_inc[1] ;
				} else if($available_days1[0] == 6) {
					$available_days[$available_days1[0]] = "av_7";
					$av_7_1 = $bur_inc[0] ;
					$av_7_2 = $bur_inc[1] ;
				}
			}
		} 
		
		$available_assume_duties = $rsJob->available_assume_duties;
		
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
         <td class="whitebgcolor"><form name="form1" action="job_edit_1.php?ad_id=<?=$_GET['ad_id']?>" method="post" enctype="multipart/form-data" target="postProcess"  >
           <input type="hidden" name="ad_id" value="<?=$_GET['ad_id']?>">
		   <input type="hidden" name="rec_id" value="<?=$rsComp->rec_id?>">
		    <input type="hidden" name="hurl" value="job_edit_4.php">
		   <input type="hidden" name="url" value="ad_id=<?=$rsJob->ad_id?>&url=<?=$_GET['url']?>&urlPage=<?=$_GET['urlPage']?>">
           <input type="hidden" name="post_date" id="post_date" value="<?=$rsJob->ad_date?>">
           <!-- Page Body Start-->
           <table width="100%" border="0" cellspacing="0" cellpadding="4">
             <tr>
               <td><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                 <tr>
                   <td width="91%" height="30" class="heading_black" >&nbsp;Job Edit </td>
                 </tr>
                 <tr>
                   <td colspan="2" valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                       <tr>
                         <td width="5"></td>
                         <td   >You are viewing the job advert <span class="subhead_gray_small">ref.<? echo($refno); ?></span> entitled <span class="subhead_gray_small"><? echo($rsSeeker->position_name); ?></span> posted by <span class="subhead_gray_small"><? echo($rsComp->rec_name);?></span> </td>
                       </tr>
                   </table></td>
                 </tr>
               </table></td>
               <td valign="top">&nbsp;</td>
             </tr>
             <tr>
               <td width="772"><table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
                   
                   <tr>
                     <td valign="top"><table width="100%" cellpadding="5" cellspacing="0">
                         <tr>
                           <td width="7">&nbsp;</td>
                           <td colspan="2"> You can update   job advert here.</td>
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
                           <td width="181">Company name </td>
                           <td width="564" colspan="2" class="comment"><input type="text" name="company_name" id="company_name" value="<?=$company_name?>">
                               <img src="../../images/star.gif"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td width="181" valign="top">Company Description </td>
                           <td colspan="2" class="comment"><textarea  name="company_desc" cols="30" rows="6"  onkeyup="showLeftChars();document.getElementById('chars_left').innerHTML=(120-this.value.length); if(this.value.length>120) {document.getElementById('chars_left').innerHTML='Fewer than 0'; this.value = this.value.substring(0,120);}" ><?=$company_desc?>
         </textarea>
                               <span id="msg_chars" style="display:none;">You have <u><span id="chars_left">120</span></u>characters left.</span> </td>
                         </tr>
                         <tr>
                           <td height="30" colspan="4" class="sectionRecheading">&nbsp;</td>
                         </tr>
                         <tr>
                           <td height="30" colspan="3" class="sectionRecheading">Vacancy Information</td>
                         </tr>
                         <tr>
                           <td colspan="3"><img src="../../images/line.gif"></td>
                         </tr>
                         <tr>
                           <td colspan="3" height="10"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td width="181">Position name </td>
                           <td colspan="2" class="comment"><!--<?=fill_dropdown("position_name","job_options","option_name","option_name",$position_name,"Select","where category_id=354"); ?>
                          <img src="../../images/star.gif">-->
                               <input name="position_name" type="text" id="position_name" value="<?=$position_name?>" size="50">
                             &nbsp;<img src="../../images/star.gif"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Type of position</td>
                           <td colspan="2" class="comment"><select name="vacancy" id="vacancy" >
                               <option value="" selected>Select</option>
                               <option value="Permanent Position" <? if(trim($vacancy)=="Permanent Position"){ echo "selected";} ?>>Permanent Position</option>
                               <option value="Temporary Position" <? if(trim($vacancy)=="Temporary Position"){ echo "selected";} ?>>Temporary Position</option>
                             </select>
                               <? //fill_dropdown("vacancy","job_options","option_name","option_name",trim($vacancy),"Select","where category_id=353","onChange='vacancy_type(this);'"); ?>
                               <img src="../../images/star.gif"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Department</td>
                           <td colspan="2" class="comment"><input name="department" type="text" id="department" value="<?=$department?>" size="50"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Grade</td>
                           <td colspan="2" class="comment"><input name="grade" type="text" id="grade" value="<?=$grade?>" size="50"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Industry</td>
                           <td colspan="2" class="comment"><?=fill_dropdown("industry",'job_options','option_name', "option_name",$industry,"Select","where category_id=6")?>                           </td>
                         </tr>
                         <tr valign="bottom">
                           <td>&nbsp;</td>
                           <td valign="top">Ad running time </td>
                           <td valign="top" class="normal_black"><table width="100%" cellpadding="2" cellspacing="0">
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
                           <td valign="top">Assumption of duties</td>
                           <td colspan="2" valign="top" class="normal_black"><? if ($date_of_taking == "" ) echo createDateAdd("date_of_taking"); else echo createDateAdd("date_of_taking",$date_of_taking);  ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Level</td>
                           <td><?=fill_dropdown("level","job_options","option_name","option_name",$level,"Select","where category_id=14"); ?>
                               <span class="comment"><img src="../../images/star.gif"></span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td valign="top">Available as follows</td>
                           <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                               <tr >
                                 <td width="6%" align="right" ><input type="checkbox" name="available_days[0]" id="available_days[0]" value="av_1" <? if($available_days[0]=="av_1") { echo "checked" ;}?>></td>
                                 <td width="26%" > Mondays: </td>
                                 <td width="68%" ><?=fill_dropdown("av_1_1",'job_options','option_name', "option_name",$av_1_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_1_2",'job_options','option_name', "option_name",$av_1_2,"Select","where category_id=347")?></td>
                               </tr>
                               <tr >
                                 <td align="right" ><input type="checkbox" name="available_days[1]" id="available_days[1]"  value="av_2" <? if($available_days[1]=="av_2") { echo "checked" ;}?>></td>
                                 <td >Tuesday:</td>
                                 <td ><?=fill_dropdown("av_2_1",'job_options','option_name', "option_name",$av_2_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_2_2",'job_options','option_name', "option_name",$av_2_2,"Select","where category_id=347")?></td>
                               </tr>
                               <tr >
                                 <td align="right" ><input type="checkbox" name="available_days[2]" id="available_days[2]"  value="av_3" <? if($available_days[2]=="av_3") { echo "checked" ;}?>></td>
                                 <td >Wednesdays :</td>
                                 <td ><?=fill_dropdown("av_3_1",'job_options','option_name', "option_name",$av_3_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_3_2",'job_options','option_name', "option_name",$av_3_2,"Select","where category_id=347")?></td>
                               </tr>
                               <tr >
                                 <td align="right" ><input type="checkbox" name="available_days[3]" id="available_days[3]"  value="av_4" <? if($available_days[3]=="av_4") { echo "checked" ;}?>></td>
                                 <td >Thursdays : </td>
                                 <td ><?=fill_dropdown("av_4_1",'job_options','option_name', "option_name",$av_4_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_4_2",'job_options','option_name', "option_name",$av_4_2,"Select","where category_id=347")?></td>
                               </tr>
                               <tr >
                                 <td align="right" ><input type="checkbox" name="available_days[4]" id="available_days[4]"  value="av_5" <? if($available_days[4]=="av_5") { echo "checked" ;}?>></td>
                                 <td >Fridays :</td>
                                 <td ><?=fill_dropdown("av_5_1",'job_options','option_name', "option_name",$av_5_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_5_2",'job_options','option_name', "option_name",$av_5_2,"Select","where category_id=347")?></td>
                               </tr>
                               <tr >
                                 <td align="right" ><input type="checkbox" name="available_days[5]" id="available_days[5]" value="av_6" <? if($available_days[5]=="av_6") { echo "checked" ;}?>></td>
                                 <td >Saturdays : </td>
                                 <td ><?=fill_dropdown("av_6_1",'job_options','option_name', "option_name",$av_6_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_6_2",'job_options','option_name', "option_name",$av_6_2,"Select","where category_id=347")?></td>
                               </tr>
                               <tr >
                                 <td align="right" ><input type="checkbox" name="available_days[6]" id="available_days[6]" value="av_7" <? if($available_days[6]=="av_7") { echo "checked" ;}?>></td>
                                 <td >Sundays :</td>
                                 <td ><?=fill_dropdown("av_7_1",'job_options','option_name', "option_name",$av_7_1,"Select","where category_id=347")?>
                                   &nbsp;&nbsp;to&nbsp;&nbsp;
                                   <?=fill_dropdown("av_7_2",'job_options','option_name', "option_name",$av_7_2,"Select","where category_id=347")?></td>
                               </tr>
                           </table></td>
                         </tr>
                         <? 
					$ad_country="";	
					$ad_country=$rsJob->ad_country;?>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Country of current permanent residence</td>
                           <td colspan="2"><?=fill_dropdown('ad_country','job_country', 'country_name', "country_id", $ad_country, "Country","","","order_id, country_id")?>
                               <span class="comment"><img src="../../images/star.gif"></span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Position based</td>
                           <td><?=fill_dropdown("based_in_town","job_city","city_name","city_name",$based_in_town,"select","where city_name<>'--- Other ---'"); ?>
                               <span class="comment"><img src="../../images/star.gif"></span> </td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>Offered package</td>
                           <td colspan="2"><input type="radio" name="offered_package" id="radio1" value="0" <? if($offered_package == 0 || $offered_package == "") echo "checked" ?>>
                             &nbsp;<span class="comment">
                               <?=fill_dropdown("off_package1","job_options","option_name","option_name",trim($off_package1),"no_value","where category_id=356","","option_id"); ?>
                               </span>&nbsp;<span class="comment">
                                 <?=fill_dropdown("off_package2","job_options","option_name","option_name",trim($off_package2),"no_value","where category_id=357","","option_id"); ?>
                                 </span>&nbsp;amounts to <span class="comment">
                                   <?=fill_dropdown("off_package3","job_options","option_name","option_name",trim($off_package3),"no_value","where category_id=358","","option_id"); ?>
                                 </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td colspan="2"><input type="radio" name="offered_package" id="radio2" value="1" <? if($offered_package == 1 || $offered_package == "") echo "checked" ?>>
                             &nbsp;<span class="comment">
                               <?=fill_dropdown("off_package4","job_options","option_name","option_name",trim($off_package4),"no_value","where category_id=360","","option_id"); ?>
                               </span>&nbsp;<span class="comment">
                                 <?=fill_dropdown("off_package5","job_options","option_name","option_name",trim($off_package5),"no_value","where category_id=361","","option_id"); ?>
                                 </span>&nbsp;amounts to<span class="comment">
                                   <?=fill_dropdown("off_package6","job_options","option_name","option_name",trim($off_package6),"no_value","where category_id=362","","option_id"); ?>
                                 </span></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td colspan="3"> Benefits: The above is<span class="comment">
                             <?=fill_dropdown("off_package_b1","job_options","option_name","option_name",trim($off_package_b1),"no_value","where category_id=363","","option_id"); ?>
                           </span>&nbsp;of the following benefits : </td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                               <tr>
                                 <td width="31%" align="left"><input name="off_package_benefits[0]2" type="checkbox" id="off_package_benefits[0]" value="Not applicable" <? if(isset($off_package_benefits[0]) && trim($off_package_benefits[0]) =="Not applicable") echo "checked"; ?>>
                                   &nbsp;Not applicable</td>
                                 <td width="34%" align="left"><input name="off_package_benefits[1]2" type="checkbox" id="off_package_benefits[1]" value="Pension Fund" <? if(isset($off_package_benefits[1]) && $off_package_benefits[1] =="Pension Fund") echo "checked"; ?>>
                                   &nbsp;Pension Fund</td>
                                 <td width="35%" align="left"><input name="off_package_benefits[2]2" type="checkbox" id="off_package_benefits[2]" value="Retirement Fund" <? if(isset($off_package_benefits[2]) && $off_package_benefits[2] =="Retirement Fund") echo "checked"; ?>>
                                   &nbsp;Retirement Fund</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[3]2" type="checkbox" id="off_package_benefits[3]" value="Preservation Fund" <? if(isset($off_package_benefits[3]) && $off_package_benefits[3] =="Preservation Fund") echo "checked"; ?>>
                                   &nbsp;Preservation Fund</td>
                                 <td align="left"><input name="off_package_benefits[4]2" type="checkbox" id="off_package_benefits[4]" value="Medical Aid subsidy" <? if(isset($off_package_benefits[4]) && $off_package_benefits[4] =="Medical Aid subsidy") echo "checked"; ?>>
                                   &nbsp;Medical Aid subsidy</td>
                                 <td align="left"><input name="off_package_benefits[5]2" type="checkbox" id="off_package_benefits[5]" value="Life Insurance" <? if(isset($off_package_benefits[5]) && $off_package_benefits[5] =="Life Insurance") echo "checked"; ?>>
                                   &nbsp;Life Insurance</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[6]2" type="checkbox" id="off_package_benefits[6]" value="Disability insurance" <? if(isset($off_package_benefits[6]) && $off_package_benefits[6] =="Disability insurance") echo "checked"; ?>>
                                   &nbsp;Disability insurance</td>
                                 <td align="left"><input name="off_package_benefits[7]2" type="checkbox" id="off_package_benefits[7]" value="Car allowance" <? if(isset($off_package_benefits[7]) && $off_package_benefits[7] =="Car allowance") echo "checked"; ?>>
                                   &nbsp;Car allowance</td>
                                 <td align="left"><input name="off_package_benefits[8]2" type="checkbox" id="off_package_benefits[8]" value="Company Car" <? if(isset($off_package_benefits[8]) && $off_package_benefits[8] =="Company Car") echo "checked"; ?>>
                                   &nbsp;Company Car</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[9]2" type="checkbox" id="off_package_benefits[9]" value="Cell phone allowance" <? if(isset($off_package_benefits[9]) && $off_package_benefits[9] =="Cell phone allowance") echo "checked"; ?>>
                                   &nbsp;Cell phone allowance</td>
                                 <td align="left"><input name="off_package_benefits[10]2" type="checkbox" id="off_package_benefits[10]" value="Computer allowance" <? if(isset($off_package_benefits[10]) && $off_package_benefits[10] =="Computer allowance") echo "checked"; ?>>
                                   &nbsp;Computer allowance</td>
                                 <td align="left"><input name="off_package_benefits[11]2" type="checkbox" id="off_package_benefits[11]" value="Entertainment allowance" <? if(isset($off_package_benefits[11]) && $off_package_benefits[11] =="Entertainment allowance") echo "checked"; ?>>
                                   &nbsp;Entertainment allowance</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[12]2" type="checkbox" id="off_package_benefits[12]" value="Petrol allowance" <? if(isset($off_package_benefits[12]) && $off_package_benefits[12] =="Petrol allowance") echo "checked"; ?>>
                                   &nbsp;Petrol allowance</td>
                                 <td align="left"><input name="off_package_benefits[13]2" type="checkbox" id="off_package_benefits[13]" value="Commission structure" <? if(isset($off_package_benefits[13]) && $off_package_benefits[13] =="Commission structure") echo "checked"; ?>>
                                   &nbsp;Commission structure</td>
                                 <td align="left"><input name="off_package_benefits[14]2" type="checkbox" id="off_package_benefits[14]" value="Incentive Structure" <? if(isset($off_package_benefits[14]) && $off_package_benefits[14] =="Incentive Structure") echo "checked"; ?>>
                                   &nbsp;Incentive Structure</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[15]2" type="checkbox" id="off_package_benefits[15]" value="Profit share structure" <? if(isset($off_package_benefits[15]) && $off_package_benefits[15] =="Profit share structure") echo "checked"; ?>>
                                   &nbsp;Profit share structure</td>
                                 <td align="left"><input name="off_package_benefits[16]2" type="checkbox" id="off_package_benefits[16]" value="Guaranteed 13th cheque" <? if(isset($off_package_benefits[16]) && $off_package_benefits[16] =="Guaranteed 13th cheque") echo "checked"; ?>>
                                   &nbsp;Guaranteed 13th cheque</td>
                                 <td align="left"><input name="off_package_benefits[17]2" type="checkbox" id="off_package_benefits[17]" value="Guaranteed 14th cheque" <? if(isset($off_package_benefits[17]) && $off_package_benefits[17] =="Guaranteed 14th cheque") echo "checked"; ?>>
                                   &nbsp;Guaranteed 14th cheque</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[18]2" type="checkbox" id="off_package_benefits[18]" value="Housing subsidy" <? if(isset($off_package_benefits[18]) && $off_package_benefits[18] =="Housing subsidy") echo "checked"; ?>>
                                   &nbsp;Housing subsidy</td>
                                 <td align="left"><input name="off_package_benefits[19]2" type="checkbox" id="off_package_benefits[19]" value="Free accommodation / Company housing" <? if(isset($off_package_benefits[19]) && $off_package_benefits[19] =="Free accommodation / Company housing") echo "checked"; ?>>
                                   &nbsp;Free accommodation / Company housing</td>
                                 <td align="left"><input name="off_package_benefits[20]2" type="checkbox" id="off_package_benefits[20]" value="Free meals" <? if(isset($off_package_benefits[20]) && $off_package_benefits[20] =="Free meals") echo "checked"; ?>>
                                   &nbsp;Free meals</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[21]2" type="checkbox" id="off_package_benefits[21]" value="Free transport" <? if(isset($off_package_benefits[21]) && $off_package_benefits[21] =="Free transport") echo "checked"; ?>>
                                   &nbsp;Free transport</td>
                                 <td align="left"><input name="off_package_benefits[22]2" type="checkbox" id="off_package_benefits[22]" value="Generous leave provision" <? if(isset($off_package_benefits[22]) && $off_package_benefits[22] =="Generous leave provision") echo "checked"; ?>>
                                   &nbsp;Generous leave provision</td>
                                 <td align="left"><input name="off_package_benefits[23]2" type="checkbox" id="off_package_benefits[23]" value="Free company products" <? if(isset($off_package_benefits[23]) && $off_package_benefits[23] =="Free company products") echo "checked"; ?>>
                                   &nbsp;Free company products</td>
                               </tr>
                               <tr>
                                 <td align="left"><input name="off_package_benefits[24]2" type="checkbox" id="off_package_benefits[24]" value="Discounted company products" <? if(isset($off_package_benefits[24]) && $off_package_benefits[24] =="Discounted company products") echo "checked"; ?>>
                                   &nbsp;Discounted company products</td>
                                 <td align="left"><input name="off_package_benefits[25]2" type="checkbox" id="off_package_benefits[25]" value="Generous job related allowances" <? if(isset($off_package_benefits[25]) && $off_package_benefits[25] =="Generous job related allowances") echo "checked"; ?>>
                                   &nbsp;Generous job related allowances</td>
                                 <td align="left"><input name="off_package_benefits[26]2" type="checkbox" id="off_package_benefits[26]" value="Other benefits" <? if(isset($off_package_benefits[26]) && $off_package_benefits[26] =="Other benefits") echo "checked"; ?>>
                                   &nbsp;Other benefits</td>
                               </tr>
                           </table></td>
                         </tr>
                         <?
						$seeker_display = "style='display:none'";
						$seeker_display1 = "style='display:none'";

					  	if($seeker_work_type == "Vacation Work") {
							$seeker_display = "style='display:'";
						} else if($seeker_work_type == "Job Attachment") {
							$seeker_display1 = "style='display:'";
						}
					  ?>
                         <tr>
                           <td colspan="3">&nbsp;</td>
                         </tr>
                         <tr>
                           <td colspan="3"><span class="sectionRecheading">Main Duties</span></td>
                         </tr>
                         <tr>
                           <td colspan="3"><img src="../../images/line.gif" alt="hr" width="100%" height="1"></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td valign="top">Main Duties<img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('Start every duty with a verb. E.G. manage staff, control debtors, supervise department, compile budgets, drive delivery vehicle, process invoices, type documents, operate grader, serve customers, make beds, water gardens, trim plants, clean rooms, sweep floors, consult clients, report on losses, collect debtors, pay creditors, call customers, write and submit monthly reports, etc.')"></td>
                           <td colspan="2"><p>
                               <input name="duty1" type="text" id="duty1"  value="<?=$duty1?>" size="50">
                             </p>
                               <p>
                                 <input name="duty2" type="text" id="duty2" value="<?=$duty2?>" size="50">
                               </p>
                             <p>
                                 <input name="duty3" type="text" id="duty3"  value="<?=$duty3?>" size="50">
                               </p>
                             <p>
                                 <input name="duty4" type="text" id="duty4" value="<?=$duty4?>" size="50">
                               </p>
                             <p>
                                 <input name="duty5" type="text" id="duty5" value="<?=$duty5?>" size="50">
                               </p>
                             <p>
                                 <input name="duty6" type="text" id="duty6" value="<?=$duty6?>" size="50">
                               </p>
                             <p>
                                 <input name="duty7" type="text" id="duty7" value="<?=$duty7?>" size="50">
                             </p></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td valign="top">Description<img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('Add a job description or profile for the position here.')"></td>
                           <td colspan="2"><textarea name="job_desc" rows="5" cols="55"><?=$job_desc?>
                      </textarea></td>
                         </tr>
                         <tr>
                           <td colspan="3">&nbsp;</td>
                         </tr>
                         <tr>
                           <td height="30" colspan="3" class="sectionRecheading">Requirements</td>
                         </tr>
                         <tr>
                           <td colspan="3"><img src="../../images/line.gif"></td>
                         </tr>
                         <tr>
                           <td></td>
                           <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                               <tr>
                                 <td><strong>Description</strong></td>
                                 <td><strong>Option</strong></td>
                                 <td><strong>Hide</strong></td>
                               </tr>
                               <tr>
                                 <td width="56%">Secondary qualification</td>
                                 <td width="38%"><?=fill_dropdown('min_sec_qualification','job_options', 'option_name', "option_name",$min_sec_qualification,"N/A","where category_id=3")?></td>
                                 <td width="6%"><input type="checkbox" name="hide1" <? if($hide1=="1"){ echo("checked");} ?> value="1" id="hide1"></td>
                               </tr>
                               <tr>
                                 <td>Tertiary qualification</td>
                                 <td><?=fill_dropdown('min_ter_qualification','job_options', 'option_name', "option_name",$min_ter_qualification,"N/A","where category_id=2")?></td>
                                 <td><input type="checkbox" name="hide2" id="hide2" <? if($hide2=="1"){ echo("checked");} ?> value="1"></td>
                               </tr>
                               <tr>
                                 <td>Industry experience</td>
                                 <td><?=fill_dropdown('exp_required','job_options', 'option_name', "option_name",$exp_required,"N/A","where category_id=21")?></td>
                                 <td><input type="checkbox" name="hide3" <? if($hide3=="1"){ echo("checked");} ?> value="1" id="hide3"></td>
                               </tr>
                               <tr>
                                 <td>Supervisory experience</td>
                                 <td><select name="supervisoryexp" id="supervisoryexp">
                                     <option value="0" >0</option>
                                     <option value="1" <? if($supervisoryexp=="1") echo("selected");?>>1</option>
                                     <option value="2" <? if($supervisoryexp=="2") echo("selected");?>>2</option>
                                     <option value="3" <? if($supervisoryexp=="3") echo("selected");?>>3</option>
                                     <option value="4" <? if($supervisoryexp=="4") echo("selected");?>>4</option>
                                     <option value="5" <? if($supervisoryexp=="5") echo("selected");?>>5</option>
                                     <option value="6" <? if($supervisoryexp=="6") echo("selected");?>>6</option>
                                     <option value="7" <? if($supervisoryexp=="7") echo("selected");?>>7</option>
                                     <option value="8" <? if($supervisoryexp=="8") echo("selected");?>>8</option>
                                     <option value="9" <? if($supervisoryexp=="9") echo("selected");?>>9</option>
                                     <option value="10" <? if($supervisoryexp=="10") echo("selected");?>>10</option>
                                 </select></td>
                                 <td><input type="checkbox" name="hide4" <? if($hide4=="1"){ echo("checked");} ?> value="1" id="hide4"></td>
                               </tr>
                               <tr>
                                 <td>Management experience</td>
                                 <td><select name="managmentexp" id="managmentexp">
                                     <option value="0" >0</option>
                                     <option value="1" <? if($managmentexp=="1") echo("selected");?>>1</option>
                                     <option value="2" <? if($managmentexp=="2") echo("selected");?>>2</option>
                                     <option value="3" <? if($managmentexp=="3") echo("selected");?>>3</option>
                                     <option value="4" <? if($managmentexp=="4") echo("selected");?>>4</option>
                                     <option value="5" <? if($managmentexp=="5") echo("selected");?>>5</option>
                                     <option value="6" <? if($managmentexp=="6") echo("selected");?>>6</option>
                                     <option value="7" <? if($managmentexp=="7") echo("selected");?>>7</option>
                                     <option value="8" <? if($managmentexp=="8") echo("selected");?>>8</option>
                                     <option value="9" <? if($managmentexp=="9") echo("selected");?>>9</option>
                                     <option value="10" <? if($managmentexp=="10") echo("selected");?>>10</option
                            >
                                 </select></td>
                                 <td><input type="checkbox" name="hide5" <? if($hide5=="1"){ echo("checked");} ?> value="1" id="hide5"></td>
                               </tr>
                               <tr>
                                 <td>Main language (read, write, speak fluently):</td>
                                 <td><?=fill_dropdown('language1','job_options', 'option_name', "option_name",$language1,"Select","where category_id=15")?>                                 </td>
                                 <td><input type="checkbox" <? if($hide6=="1"){ echo("checked");} ?> value="1" name="hide6" id="hide6"></td>
                               </tr>
                               <tr>
                                 <td>Second language (read, write, speak fluently):</td>
                                 <td><?=fill_dropdown('language2','job_options', 'option_name', "option_name",$language2,"Select","where category_id=15")?>                                 </td>
                                 <td><input type="checkbox" name="hide7" <? if($hide7=="1"){ echo("checked");} ?> value="1" id="hide7"></td>
                               </tr>
                               <tr>
                                 <td>Third language (read, write, speak fluently):</td>
                                 <td><?=fill_dropdown('language3','job_options', 'option_name', "option_name",$language3,"Select","where category_id=15")?>                                 </td>
                                 <td><input type="checkbox" <? if($hide8=="1"){ echo("checked");} ?> value="1" name="hide8" id="hide8"></td>
                               </tr>
                               <tr>
                                 <td>Computer knowledge: MS Word</td>
                                 <td><?=fill_dropdown('computer1','job_options', 'option_name', "option_name",$computer1,"Select","where category_id=404")?>                                 </td>
                                 <td><input type="checkbox" <? if($hide9=="1"){ echo("checked");} ?> value="1" name="hide9" id="hide9"></td>
                               </tr>
                               <tr>
                                 <td>Computer knowledge: MS Excel</td>
                                 <td><?=fill_dropdown('computer2','job_options', 'option_name', "option_name",$computer2,"Select","where category_id=404")?>                                 </td>
                                 <td><input type="checkbox" <? if($hide10=="1"){ echo("checked");} ?> value="1"name="hide10" id="hide10"></td>
                               </tr>
                               <tr>
                                 <td>Computer knowledge: MS PowerPoint</td>
                                 <td><?=fill_dropdown('computer3','job_options', 'option_name', "option_name",$computer3,"Select","where category_id=404")?>                                 </td>
                                 <td><input type="checkbox" name="hide11" <? if($hide11=="1"){ echo("checked");} ?> value="1" id="hide11"></td>
                               </tr>
                               <tr>
                                 <td>Computer knowledge: MS Publisher</td>
                                 <td><?=fill_dropdown('computer4','job_options', 'option_name', "option_name",$computer4,"Select","where category_id=404")?></td>
                                 <td><input type="checkbox" <? if($hide12=="1"){ echo("checked");} ?> value="1" name="hide12" id="hide12"></td>
                               </tr>
                               <tr>
                                 <td>Specialised Computer knowledge:</td>
                                 <td><input type="text" name="specialcomputerknowledge1" id="specialcomputerknowledge1" value=<?=$specialcomputerknowledge1?>></td>
                                 <td><input type="checkbox" <? if($hide13=="1"){ echo("checked");} ?> value="1" name="hide13" id="hide13"></td>
                               </tr>
                               <tr>
                                 <td>Specialised Computer knowledge:</td>
                                 <td><input type="text" name="specialcomputerknowledge2" id="specialcomputerknowledge2" value=<?=$specialcomputerknowledge2?>></td>
                                 <td><input type="checkbox" <? if($hide14=="1"){ echo("checked");} ?> value="1" name="hide14" id="hide14"></td>
                               </tr>
                               <tr>
                                 <td>Drivers license:</td>
                                 <td><?=fill_dropdown('drivers_license','job_options', 'option_name', "option_name",$drivers_license,"N/A","where category_id=11")?></td>
                                 <td><input type="checkbox" <? if($hide15=="1"){ echo("checked");} ?> value="1" name="hide15" id="hide15"></td>
                               </tr>
                               <tr>
                                 <td>Personal authority:</td>
                                 <td><?=fill_dropdown('computer5','job_options', 'option_name',"option_name",$computer5,"Select","where category_id=19")?></td>
                                 <td><input type="checkbox" name="hide16" <? if($hide16=="1"){ echo("checked");} ?> value="1" id="hide16"></td>
                               </tr>
                               <tr>
                                 <td>Citizenship:</td>
                                 <td><?=fill_dropdown('citizenship','job_country', 'country_name', "country_name", $citizenship,"Select"); ?></td>
                                 <td><input type="checkbox" <? if($hide17=="1"){ echo("checked");} ?> value="1" name="hide17" id="hide17"></td>
                               </tr>
                               <tr>
                                 <td>Functional competency 1:</td>
                                 <td><?=fill_dropdown('functional1','job_options', 'option_name', "option_name",$functional1,"Select","where category_id=405")?></td>
                                 <td><input type="checkbox" <? if($hide18=="1"){ echo("checked");} ?> value="1" name="hide18" id="hide18"></td>
                               </tr>
                               <tr>
                                 <td>Functional competency 2:</td>
                                 <td><?=fill_dropdown('functional2','job_options', 'option_name', "option_name",$functional2,"Select","where category_id=405")?>                                 </td>
                                 <td><input type="checkbox" name="hide19" <? if($hide19=="1"){ echo("checked");} ?> value="1" id="hide19"></td>
                               </tr>
                               <tr>
                                 <td>Functional competency 3:</td>
                                 <td><?=fill_dropdown('functional3','job_options', 'option_name', "option_name",$functional3,"Select","where category_id=405")?>                                 </td>
                                 <td><input type="checkbox" <? if($hide20=="1"){ echo("checked");} ?> value="1" name="hide20" id="hide20"></td>
                               </tr>
                               <tr>
                                 <td>Behavioural competency 1:</td>
                                 <td><?=fill_dropdown('behavioural1','job_options', 'option_name', "option_name",$behavioural1,"Select","where category_id=406")?>                                 </td>
                                 <td><input type="checkbox" name="hide21" <? if($hide21=="1"){ echo("checked");} ?> value="1" id="hide21"></td>
                               </tr>
                               <tr>
                                 <td>Behavioural competency 2:</td>
                                 <td><?=fill_dropdown('behavioural2','job_options', 'option_name', "option_name",$behavioural2,"Select","where category_id=406")?></td>
                                 <td><input type="checkbox" name="hide22" <? if($hide22=="1"){ echo("checked");} ?> value="1" id="hide22"></td>
                               </tr>
                               <tr>
                                 <td>Behavioural competency 3:</td>
                                 <td><?=fill_dropdown('behavioural3','job_options', 'option_name', "option_name",$behavioural3,"Select","where category_id=406")?></td>
                                 <td><input type="checkbox" name="hide23" <? if($hide23=="1"){ echo("checked");} ?> value="1" id="hide23"></td>
                               </tr>
                               <tr>
                                 <td>Other requirements:</td>
                                 <td><input type="text" name="otherrequirements" value="<?=$otherrequirements?>" id="otherrequirements"></td>
                                 <td>&nbsp;</td>
                               </tr>
                           </table></td>
                         </tr>
                     </table></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                   </tr>
               </table></td>
               <td width="218" valign="top">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="2"><table width="100%" cellpadding="5" cellspacing="0">
                   <tr>
                     <td colspan="4" class="sectionRecheading">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4" class="sectionRecheading">Preferences<img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('Tick the hide checkbox on the right of fields that are not used in your advertisement. Hidden fields will not appear on your job add, giving it a professional look. Choose via the drop down box your requirement for every field.')"></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif"></td>
                   </tr>
                   <tr>
                     <td></td>
                     <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                         <tr>
                           <td width="22%">Preference given to:</td>
                           <td><span class="comment">
                             <?=fill_dropdown("preference_emp_1_1","job_options","option_name","option_name",trim($preference_emp_1_1),"no_value","where category_id=383","","option_id"); ?>
                             <!--<input name="preference_emp_1_2" type="hidden" id="preference_emp_1_2" value="<?=$preference_emp_1_2?>" size="20">-->
                             <?=fill_dropdown("preference_emp_1_3","job_country","country_name","country_name",trim($preference_emp_1_3),"no_value"); ?>
                           </span></td>
                           <td width="21%"><input type="checkbox" <? if($hide24=="1"){ echo("checked");} ?> value="1" name="hide24" id="hide24"></td>
                         </tr>
                         <tr>
                           <td>Preference given to:</td>
                           <td><span class="comment">
                             <?=fill_dropdown("preference_emp_2","job_options","option_name","option_name",trim($preference_emp_2),"no_value","where category_id=384","","option_id"); ?>
                           </span></td>
                           <td><input type="checkbox"  <? if($hide25=="1"){ echo("checked");} ?> value="1" name="hide25" id="hide25"></td>
                         </tr>
                         <tr>
                           <td>Preference given to:</td>
                           <td><span class="comment">
                             <?=fill_dropdown("preference_emp_3","job_options","option_name","option_name",trim($preference_emp_3),"no_value","where category_id=385","","option_id"); ?>
                           </span></td>
                           <td><input type="checkbox" <? if($hide26=="1"){ echo("checked");} ?> value="1" name="hide26" id="hide26"></td>
                         </tr>
                     </table></td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td height="30" colspan="4" class="sectionRecheading">Filters</td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif"></td>
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
                           <td width="212"><input name="chkFilter[]" type="checkbox" id="chkFilter" value="gender" <? if($gender!="") echo "checked" ?>>
                             Gender </td>
                           <td width="733"><select name="gender">
                               <option value="" <? if($gender=="") echo "selected" ?>>Either</option>
                               <option value="Male" <? if($gender=="Male") echo "selected" ?>>Male</option>
                               <option value="Female" <? if($gender=="Female") echo "selected" ?>>Female</option>
                             </select>                           </td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="equity_status" <? if($equity_status !="") echo "checked" ?>>
                             Equity Status </td>
                           <td><?=fill_dropdown('equity_status','job_options', 'option_name', "option_name",$equity_status,"Select","where category_id=9")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="citizenship" <? if($citizenship!="") echo "checked" ?>>
                             Citizenship</td>
                           <td><?=fill_dropdown('citizenship','job_country', 'country_name', "country_name", $citizenship,"Select"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="town" <? if($town!="") echo "checked" ?>>
                             Town of perm residence</td>
                           <td><?=fill_dropdown('town','job_city', 'city_name', "city_name",$town,"Select")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="drivers_license" <? if($drivers_license!="") echo "checked" ?>>
                             Drivers license </td>
                           <td><?=fill_dropdown('drivers_license','job_options', 'option_name', "option_name",$drivers_license,"None","where category_id=11")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="pa" <? if($pa!="") echo "checked" ?>>
                             Professional authority</td>
                           <td><?=fill_dropdown('pa','job_options', 'option_name', "option_name",$pa,"None","where category_id=19")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="endorsement" <? if($endorsement!="") echo "checked" ?>>
                             Drivers license endorsement</td>
                           <td><?=fill_dropdown('endorsement','job_options', 'option_name', "option_name",$endorsement,"None","where category_id=18")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td><input name="chkFilter[]" type="checkbox" id="chkFilter" value="x_vehicle" <? if($x_vehicle!="") echo "checked" ?>>
                             Drivers license restrictions</td>
                           <td><?=fill_dropdown('x_vehicle','job_options', 'option_name', "option_name",$x_vehicle,"None","where category_id=17")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td height="30" valign="top"><input name="chkFilter[]" type="checkbox" id="chkFilter" value="language_filter" <? if($language_filter!="") echo "checked" ?>>
                             Language</td>
                           <td valign="top"><?=fill_dropdown('language_filter','job_options', 'option_name', "option_name",$language_filter,"Select","where category_id=15")?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td height="30"><input name="chkFilter[]" type="checkbox" id="chkFilter" value="level_filter" <? if($level_filter!="") echo "checked" ?>>
                             Level</td>
                           <td><?=fill_dropdown("level_filter","job_options","option_name","option_name",$level_filter,"Select","where category_id=14"); ?></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td height="30"><input name="chkFilter[]" type="checkbox" id="chkFilter" value="industry_filter" <? if($industry_filter!="") echo "checked" ?>>
                             Industry</td>
                           <td><?=fill_dropdown("industry_filter",'job_options','option_name', "option_name",$industry_filter,"Select","where category_id=6")?>                           </td>
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
                     <td colspan="4"><span class="sectionRecheading">Options<img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('You may select to only circulate the ad to your company staff members. All internal applications are directed to the employers e-mail address and are not included in the system short listing function. Please ensure that the relevant e-mail addresses of your staff are uploaded and correct before using this function. You can upload the relevant e-mail addresses by clicking on View my account and then opening the envelope entitled Intercompany E-mail addresses.')"></span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif"></td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td colspan="3" valign="top"><p>
                         <input name="option" type="radio" id="radio" value="1" <? if(isset($_POST["option"]) && $_POST["option"]=="1"){  echo("checked"); } else if($rsJob->option_radio=="1"){  echo("checked"); }?>>
                       Post to the website only, or <br>
                       <input type="radio" name="option" id="radio3" value="2"  <? if(isset($_POST["option"]) && $_POST["option_radio"]=="2"){  echo("checked"); } else if($rsJob->option_radio=="2"){  echo("checked"); }?>>
                       Email to internal staff members only (intercompany ad), or<br>
                       <input type="radio" name="option" id="radio4" value="3"  <? if(isset($_POST["option"]) && $_POST["option_radio"]=="3"){  echo("checked"); } else if($rsJob->option_radio=="3"){  echo("checked"); }?>>
                       Email to internal staff members and post to the website. </p>
                         <p>Upload an employer specific application form if required:<span class="sectionRecheading"><img src="../../images/tip.gif" alt="Tip" width="26" height="25" hspace="10" onClick="MM_popupMsg('This function will normally be used by employers whose recruitment policy requires application on a set form. The employer should ensure that its fax number or e-mail address is displayed on the form as the applicant will complete and submit such form directly to the employer.  Normal recruitment functionality will thus be complimented by the application form as the employer only has to peruse the application forms of candidates as shortlisted through the system.')"></span></p>
                       <div>
                           <input type="file" name="fileField" id="fileField">
                         (PDF or Word  document only)</div></td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4"><span class="sectionRecheading">Display Information </span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif"></td>
                   </tr>
                   <tr>
                     <td width="1">&nbsp;</td>
                     <td colspan="3"><input name="chkDisplay[]" type="checkbox" id="chkDisplay" value="1" <? if(strchr($display_info,"1")) echo "checked"; ?>>
                       For any enquiries regarding this advertisement, please contact <span class="subhead_gray_small_italic">
                         <?=$rsRec->rec_name?>
                         </span> at telephone number <span class="subhead_gray_small">
                           <?=$rsRec->rec_phone?>
                         </span>.</td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td colspan="3"><input name="chkDisplay[]" type="checkbox" id="chkDisplay" value="2" <? if(strchr($display_info,"2")) echo "checked"; ?>>
                         <span class="subhead_gray_small">
                         <?=$rsRec->comp_name?>
                       </span> supports the principles of Affirmative Action and Employment Equity. </td>
                   </tr>
                   <tr>
                     <td>&nbsp;</td>
                     <td colspan="3"><input name="chkDisplay[]" type="checkbox" id="chkDisplay" value="3" <? if(strchr($display_info,"3")) echo "checked"; ?>>
                         <span class="subhead_gray_small">
                         <?=$rsRec->comp_name?>
                       </span> supports the principles of the Affirmative Action Act and is committed to the advancement of individuals belonging to designated groups. </td>
                   </tr>
                   <tr>
                     <td colspan="4">&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="4"><span class="sectionRecheading">Added Questions </span></td>
                   </tr>
                   <tr>
                     <td colspan="4"><img src="../../images/line.gif"></td>
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
                     <td width="1">&nbsp;</td>
                     <td width="216">&nbsp;</td>
                     <td width="733" height="50" colspan="2" valign="middle">
					  <? $redirectUrl = 'job_search_details.php?id='.$_GET["ad_id"].'&url=job_search_result.php&urlPage='.$_GET["urlPage"]; ?>
					 <img src="../images/back.gif" width="53" height="20" border="0" onClick="goBack('<?=$redirectUrl?>');" style="cursor:pointer">
                       &nbsp;&nbsp;&nbsp; <img src="../../images/update.gif" width="60" height="22" border="0" onClick="edit_job_ad_4(document.form1);" style="cursor:pointer"> </td>
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

