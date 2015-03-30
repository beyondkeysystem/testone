<?php

function createDateRunningTime($name,$value="",$array="",$att="",$totime="")
	{
		//echo $att;
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		//echo $att;
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		if($totime!="")
		{
			$date1=date("Y-m-d");
		}
		else
		{
			$date1=$totime;
		}
		$dateTo=explode("-",date("Y-m-d",strtotime("$date1+21 day")));
		//print_r($dateTo);
		//date
		$str = "<select class='select' name='" . $name . "_date" . $array . "' id='" . $name . "_date'"  .$att.">
				<option value=''>Date</option>";
		$j=date("d");
		for($i=date("d"); $i<=date("d")+21; $i++)
		{
			
			$selected = "";
			if($j==32) $j=1;
			if($j == $date)	$selected = "selected";
			$str .= "	<option value='" . $j . "' " . $selected . ">" . $j. "</option>";$j++;
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select class='select' name='" . $name . "_month" . $array . "' id='" . $name . "_month' ".$att.">
				<option value=''>Month</option>";
		$m=date("m");
		//echo date("m");
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($key==date("m") || $key==$dateTo[1]){
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";}
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select class='select' name='" . $name . "_year" . $array . "' id='" . $name . "_year' ".$att.">
				<option value=''>Year</option>";		
		$yearadd = date("Y");
		for($i=date("Y"); $i<=$dateTo[0]; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
        
        
        //for Add
	function createDateAssumption($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			$date = $arrDate[2];
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		//date
		$str = "<select class='select' name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
				<option value=''>Date</option>";

		for($i=1; $i<=31; $i++)
		{
			$selected = "";
			if($i == $date)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>&nbsp;";
		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select class='select' name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select class='select' name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		$yearadd = date("Y");
		for($i=date("Y"); $i<=$yearadd + 2; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	//end ADD
	
function genRandomString() {
    $length = 3;
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = "";    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    return $string;
}
?>

<script language="javascript" >
<!--
function search_jobseekers()
	{
		if(document.form1.vacancy.value == "")
		{
			alert("Please enter seeker type.");
			document.form1.vacancy.focus();
			return false;
		}
		if(trim(document.form1.keywords.value," ") == "")
		{
			alert("Please enter keywords (skills).");
			document.form1.keywords.focus();
			return false;
		}
		
		flag = checkNumber("Please enter numbers only in salary range.",document.form1.salary_from);
		if(flag == false) return false;
		
		flag = checkNumber("Please enter numbers only in salary range.",document.form1.salary_to);
		if(flag == false) return false;
				
		flag = checkNumber("Please enter numbers only in experience.",document.form1.seeker_experience);
		if(flag == false) return false;
		
		
		if(document.form1.seeker_language.value=="" &&  document.form1.speak_home.value!="" )
		{
			alert("Please enter  home language")
			document.form1.seeker_language.focus();
			return false;
		}
		if(document.form1.seeker_language.value!="" &&  document.form1.speak_home.value=="")
		{
			alert("Please enter  home language speak")
			document.form1.speak_home.focus();
			return false;
		}
		if(document.form1.seeker_language_second.value=="" &&  document.form1.speak_second.value!="" )
		{
			alert("Please enter  second language")
			document.form1.seeker_language_second.focus();
			return false;
		}
		if(document.form1.seeker_language_second.value!="" &&  document.form1.speak_second.value=="")
		{
			alert("Please enter  second language speak")
			document.form1.speak_second.focus();
			return false;
		}
		if(document.form1.seeker_language_third.value=="" &&  document.form1.speak_third.value!="" )
		{
			alert("Please enter third language")
			document.form1.seeker_language_third.focus();
			return false;
		}
		if(document.form1.seeker_language_third.value!="" &&  document.form1.speak_third.value=="")
		{
			alert("Please enter  third language speak")
			document.form1.speak_third.focus();
			return false;
		}
						
		document.form1.method = "post";
		document.form1.action = "search_jobseekers_result.php";
		document.form1.submit();
	}

function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>


<script type="text/javascript">

$(function() {
    var $mainNav = $('#main-nav'),
    navWidth = $mainNav.width();
    
    $mainNav.children('.main-nav-item').hover(function(ev) {
        var $this = $(this),
        $dd = $this.find('.main-nav-dd');
        
        // get the left position of this tab
        var leftPos = $this.find('.main-nav-tab').position().left;
        
        // get the width of the dropdown
        var ddWidth = $dd.width(),
        leftMax = navWidth - ddWidth;
        
        // position the dropdown
        $dd.css('left', Math.min(leftPos, leftMax) );
        
        // show the dropdown
        $this.addClass('main-nav-item-active');
    }, function(ev) {

        // hide the dropdown
        $(this).removeClass('main-nav-item-active');
    });
	
	
	// Expand Panel
	$("#open").click(function(){
		$("div#panel").slideDown("slow");
	
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});
});
var count11 = 1;

function clearText1(elem) {
	
if(count11 == 1) {
	elem.value='';
	elem.style.color="#000";
    count11 = count11 + 1;
    }
}

var count22 = 1;
function clearText2(elem)
{
   if(count22 == 1) {
	elem.value='';
	elem.style.color="#000";
    count22 = count22 + 1;
    }
}

var count33 = 1;
function clearText3(elem)
{
   if(count33 == 1) {
	elem.value='';
	elem.style.color="#000";
    count33 = count33 + 1;
    }
}

var count44 = 1;
function clearText4(elem)
{
   if(count44 == 1) {
	elem.value='';
	elem.style.color="#000";
    count44 = count44 + 1;
    }
}
function regionText()
{
	$("#region_li").html('<input name="ad_region" type="text" id="ad_region" class="inputfield width11"');
}
function showUploadTitle(id)
{
	if ($('#'+id).css('display') == "none")
	{
		$('#'+id).show();
	}
	else
	{
		$('#'+id).val("");
		$('#'+id).hide();
	}
}

function blankRefNo()
{
	$("#jobAddRefNo").val("<?=genRandomString().rand(0,9999)?>");
}
   
function randomString() {
var ref = $("#jobAddRefNo").val();
ref = parseInt(ref) + 1;

ref = "00" + String(ref);

//alert(ref);
document.getElementById('jobAddRefNo').value=''; 

/*
var chars = "ABCDEFGHIJKLMNOPQRSTUVWXTZ";
var string_length = 3;
var randomstring = '';
for (var i=0; i<string_length; i++) {

	var rnum = Math.floor(Math.random() * chars.length);

	randomstring += chars.substring(rnum,rnum+1);*/
	
}
/*var chars1 = "0123456789";
var string_length1 = 4;
for (var j=0; j<string_length1; j++) {

	var rnum = Math.floor(Math.random() * chars1.length);

	randomstring += chars1.substring(rnum,rnum+1);
}
$("#jobAddRefNo").val(randomstring);
}*/


</script>

<!--<script type="text/javascript" src="../jobseeker/ckeditor/ckeditor.js"></script>-->
<!--<script type="text/javascript">
function save_job_ad_1(form)
{
	
	
		
		//alert("test");
		var from_to="";
		from_to=document.getElementById('from_to').innerHTML;
		document.getElementById('hidden_from_to').value=from_to;
		form.target = '';
		form.action = "postAddAction?job_type=1";
		form.submit();		
	
}  
</script>-->
	<script>
	$(function() {
		var dates = $( "#from, #to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			dateFormat: 'dd/mm/yy',
			minDate: '-0d',
			maxDate: '+20d',
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
		$('#date_of_taking').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy'
		});
	});
	
	</script>
	
	
        <style>
/*select {
    border: 3px solid #E1E0E0;
    height: 30px;
    line-height: 28px;
    margin: 8px 0 12px 13px;
    padding: 0 0 0 5px;
    margin-right: 82px !important;increase uploading file sizer in php ioni file
    width: 210px;
}*/
#ui-datepicker-div select {
    width: 140px !important;
}
#date_of_taking_date{ margin:4px!important;margin-top: 3px!important;}
#date_of_taking_month{margin:4px!important;margin-top: 3px!important;}
#date_of_taking_year{margin:3px 18px 4px;}

#adFrom_date{margin:4px!important;margin-top: 3px!important;}
#adFrom_month{margin:4px!important;margin-top: 3px!important;}
#adFrom_year{margin:3px 18px 4px;}

#adTo_date{margin:3px 5px 4px 20px!important;}
#adTo_month{margin:4px!important;margin-top: 3px!important;}
#adTo_year{margin:3px 18px 4px;}



a:hover{text-decoration:underline;color:blue;}
#position1_name {color:gray;}
#ques1 {color:gray;}
#ques2 {color:gray;}
#ques3 {color:gray;}
#ques4 {color:gray;}
#jobAddRefNo {color:gray;border:3px solid #E1E0E0;};

</style>
        
<!--	<link href="../css/highslide.css" type="text/css" rel="stylesheet">
<script src="../javascript/highslide-with-html.js" type="text/javascript"></script>-->
<!--<script type="text/javascript" language="javascript">
	hs.graphicsDir = '../graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
	
	

</script>-->


        <section class="profile_main">
          <div class="profile_content">
		<h2>Job Add</h2>
            <div class="orng_dvdr"></div>
	      <div class="signup_sec">
              <p>Define the vacant position in order for the system to ensure optimal exposure of your Job Advertisement.</p>
              <div class="greyline"></div>
	   <script type="text/javascript">
function save_job_ad_1(form)
{		
		//alert("test");
		var from_to="";
		from_to=document.getElementById('from_to').innerHTML;
		document.getElementById('hidden_from_to').value=from_to;
		form.target = '';
		form.action = "<?php echo $this->webroot.'employer/postAddAction?job_type=1';  ?>";
		form.submit();		
	
}  
</script> 
<form action="" method="post" enctype="multipart/form-data" name="form1" target="postProcess"  >
	<input type="hidden" value="<?=$current_plan_id?>" name="current_plan_id">
	<input type="hidden" value="<?=$in_id?>" name="invoice_id">
	<input type="hidden" value="<?=$jobAdData['JobAd']['ad_id']?>" name="ad_id">
  	<!-- innercol-pan start -->
  	<div id="pageWrap" class="pageWrap">
                <div class="pageContent">


        <!-- Page Body Start-->
	<?php
	if(empty($jobAdData)){
		$jobAddRrfNoCount = $rsRec + 1;
		$position_name = "Example: Sales Manager";
		$currency='';
		$off_package7='';
		$higher_qualification='';
		$department='';
		$ques1='';
		$ques2='';
		$ques3='';
		$ques4='';		
	}
	else{
		$jobAddRrfNoCount = $jobAdData['JobAd']['preference'];
		$position_name = $jobAdData['JobAd']['position_name'];
		$vacancy = $jobAdData['JobAd']['vacansy'];
		$grade = $jobAdData['JobAd']['grade'];
		$salary_from = $jobAdData['JobAd']['salary_from'];
		$salary_to = $jobAdData['JobAd']['salary_to'];
		$job_desc = $jobAdData['JobAd']['job_desc'];
		$duty1 = $jobAdData['JobAd']['duty1'];
		$computer1 = $jobAdData['JobAd']['computer1'];
		$off_package4 = $jobAdData['JobAd']['off_package4'];
		$off_package5 = $jobAdData['JobAd']['off_package5'];
		$currency = $jobAdData['JobAd']['off_package6'];
		$off_package7 = $jobAdData['JobAd']['off_package7'];
		if($jobAdData['JobAd']['off_package_b1'] == 1){
			$checked_off_package_b2='';
			$checked_off_package_b1='checked="checked"';
		}
		else{
			$checked_off_package_b1='';
			$checked_off_package_b2='checked="checked"';
		}
		$gender = $jobAdData['JobAd']['filter_gender'];
		$higher_qualification = $jobAdData['JobAd']['min_sec_qualification'];
		$ter_qualification = $jobAdData['JobAd']['min_ter_qualification'];
		$confirm = $jobAdData['JobAd']['confirm'];
		if(!empty($jobAdData['JobAd']['department'])){
			$department=unserialize($jobAdData['JobAd']['department']);
		}
		else{
			$department='';
		}
		$off_package_benefitsStr=$jobAdData['JobAd']['off_package_benefits'];
		if(!empty($jobAdData['JobAd']['off_package_benefits'])){
			$off_package_benefitsStr=unserialize($jobAdData['JobAd']['off_package_benefits']);
		}
		else{
			$off_package_benefitsStr='';
		}
		$ques1 = $jobAdData['JobAd']['ques1'];
		$ques2 = $jobAdData['JobAd']['ques2'];
		$ques3 = $jobAdData['JobAd']['ques3'];
		$ques4 = $jobAdData['JobAd']['ques4'];
		//8085641879
		    //[off_package_benefits] => 6-Disability insurance,7-Car allowance		
	}
	?>

 <div class="inpt_area">
	<label for="f_name">Job Advertisement Reference Number:</label>
	<span>
		<input type="textbox" name="jobAddRefNo" id="jobAddRefNo" value="NR<?=$jobAddRrfNoCount?>" onClick="clearText2(this);" size="7">
		<a href="javascript:void(0);" id="change_link" style="font-size:12px;hover{font-size:100px;}"; onClick="randomString();">
		<u>Change</u></a>
	</span>
</div>
<div class="inpt_area">
	<label for="f_name"><span style="color:red;">*</span> Position Title:</label>
	<input name="position_name"  type="text" id="position1_name" class="inputfield width11" onClick="clearText1(this);" value="<?=$position_name?>" size="50">
</div>
<div class="inpt_area">
	<label for="f_name"><span style="color:red;">*</span> Type of Position:</label>
	<select   class='select' style="height:30px;" class="inputfield width11" name="vacancy" id="vacancy">
            <option value="" selected>Select</option>
            <option value="Permanent Position"  <?php if(isset($vacancy) AND trim($vacancy)=="Permanent Position"){ echo "selected";} ?> >Permanent Position</option>
            <option value="Temporary Position" <?php if(isset($vacancy) AND trim($vacancy)=="Temporary Position"){ echo "selected";} ?> >Temporary Position</option>
         </select> 
</div>

<div class="inpt_area">
	<label for="f_name">Sectors:</label>
	    <input type="checkbox" name="department[]" value="Accounting"  <?php if(is_array($department) AND in_array("Accounting",$department)){ echo "checked=true";} ?> >&nbsp; Accounting &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Automotive" <?php if(is_array($department) AND in_array("Automotive",$department)){ echo "checked=true";} ?> >&nbsp; Automotive &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="TeleCommunications"  <?php if(is_array($department) AND in_array("TeleCommunications",$department)){ echo "checked=true";} ?> >&nbsp; TeleCommunications &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Aviation" <?php if(is_array($department) AND in_array("Aviation",$department)){ echo "checked=true";} ?> >&nbsp; Aviation &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Banking & Finance"  <?php if(is_array($department) AND in_array("Banking & Finance",$department)){ echo "checked=true";} ?> >&nbsp; Banking & Finance &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Charity & Voluntary Work" <?php if(is_array($department) AND in_array("Charity & Voluntary Work",$department)){ echo "checked=true";} ?> >&nbsp; Charity & Voluntary Work &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Construction"  <?php if(is_array($department) AND in_array("Construction",$department)){ echo "checked=true";} ?> >&nbsp; Construction &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Consultancy" <?php if(is_array($department) AND in_array("Consultancy",$department)){ echo "checked=true";} ?> >&nbsp; Consultancy &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Insurance" <?php if(is_array($department) AND in_array("Insurance",$department)){ echo "checked=true";} ?> >&nbsp; Insurance &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Marketing" <?php if(is_array($department) AND in_array("Marketing",$department)){ echo "checked=true";} ?> >&nbsp; Marketing &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Information Technology" <?php if(is_array($department) AND in_array("Information Technology",$department)){ echo "checked=true";} ?> >&nbsp; Information Technology &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Human Resources" <?php if(is_array($department) AND in_array("Human Resources",$department)){ echo "checked=true";} ?> >&nbsp; Human Resources &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Training" <?php if(is_array($department) AND in_array("Training",$department)){ echo "checked=true";} ?> >&nbsp; Training &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Education" <?php if(is_array($department) AND in_array("Education",$department)){ echo "checked=true";} ?> >&nbsp; Education &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Electronics" <?php if(is_array($department) AND in_array("Electronics",$department)){ echo "checked=true";} ?> >&nbsp; Electronics &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Recruitment" <?php if(is_array($department) AND in_array("Recruitment",$department)){ echo "checked=true";} ?> >&nbsp; Recruitment &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Retail" <?php if(is_array($department) AND in_array("Retail",$department)){ echo "checked=true";} ?> >&nbsp; Retail &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Sales" <?php if(is_array($department) AND in_array("Sales",$department)){ echo "checked=true";} ?> >&nbsp; Sales &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Public Sector" <?php if(is_array($department) AND in_array("Public Sector",$department)){ echo "checked=true";} ?> >&nbsp; Public Sector &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Oil and Gas" <?php if(is_array($department) AND in_array("Oil and Gas",$department)){ echo "checked=true";} ?> >&nbsp; Oil and Gas &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Military" <?php if(is_array($department) AND in_array("Military",$department)){ echo "checked=true";} ?> >&nbsp; Military &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Media" <?php if(is_array($department) AND in_array("Media",$department)){ echo "checked=true";} ?> >&nbsp; Media &nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div class="inpt_area">
	<label for="f_name"><span style="color:red;">*</span> Level:</label>
	<?php
      echo $level_dropbox;
   ?>
</div>
<div class="inpt_area">
	<label for="f_name">Grade:</label>
	<input name="grade" type="text" id="grade" value="<?=$grade?>" size="50" class="inputfield width11" />
</div>
<div class="inpt_area">
	<label for="f_name">Salary From :</label>
	<input name="salary_from" type="text" id="salary_from" value="<?=$salary_from?>" class="inputfield width11" />
	<label for="f_name">Salary To :</label>
	<input name="salary_to" type="text" id="salary_to" value="<?=$salary_to?>"  class="inputfield width11" />
</div>
<div class="inpt_area">
	<label for="f_name"><span style="color:red;">*</span> Occupation:</label>
	 <?php echo $industry_dropbox; ?>
</div>
<div class="inpt_area">
	
	<label for="f_name"><span style="color:red;">*</span> Add running time:</label>
	<!--------------------------------------------------------------- another date range picker----------------------------------------------->
				<div id="widget">
					<div id="widgetField">
						<span id="from_to"></span>
						<!--<input type="text" id="from_to" name="from_to" value="">-->
						<a href="#">Select date range</a>
					</div>
					<div id="widgetCalendar">
					</div>
				</div>
				<input type="hidden" name="hidden_from_to" id="hidden_from_to">
	<!--------------------------------------------------------------- another date range picker----------------------------------------------->
	<br><br><br><br>
</div>
<div class="inpt_area">
	<label for="f_name"><span style="color:red;">*</span> Job Summary: <span style="font-size:13px;">Write a short summary of the position which will be displayed as the Job Advertisement summary.</span></label>
	<textarea  name="job_desc" id="job_desc" class="ckeditor1" rows="4" cols="60"><?php if(isset($job_desc)) echo $job_desc?></textarea>
		<script>
		/*CKEDITOR.config.toolbar_MA=[
			{ name: 'document',    items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
			{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
			{ name: 'forms',       items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
			'/',
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
			{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','PageBreak' ] },
			'/',
			{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
			{ name: 'tools',       items : [ 'Maximize', 'ShowBlocks','-','About' ] }
		];*/
		CKEDITOR.config.toolbar_MA=[
			{ name: 'document',    items : [ 'Source','-','Save','NewPage' ] },
			{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
			{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll'] },
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline'] },
			{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv'] },
			{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
			
		];

		CKEDITOR.replace( 'job_desc', {   toolbar:'MA',width: 800    });
			
			var count1 = 1;
			CKEDITOR.on('instanceReady', function(e)
			{
				e. editor.on('focus', function(event)
				{
					if(count1 == 1)
					{
						if(CKEDITOR.currentInstance.name=='job_desc')
						{
							CKEDITOR.instances.job_desc.setData('');
							CKEDITOR.instances.job_desc.focus();
							count1++;
						}
					}
					
				})
			});

		</script>
</div>
<div class="inpt_area">
	<label for="f_name">Duties: <span style="color:gray; font-size:13px;">Define the position duties in this section. Use numbers or bullets to distinguish between different duties. Keep it short and to the point.</span></label>
		<textarea name="duty1" id="duty1" class="ckeditor1" rows="4" cols="60"><?php if(isset($duty1)) echo $duty1; ?></textarea>
		<script>
		CKEDITOR.config.toolbar_MA=[
			{ name: 'document',    items : [ 'Source','-','Save','NewPage' ] },
			{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
			{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline'] },
			{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv'] },
			{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
			
		];
			CKEDITOR.replace( 'duty1' , {   toolbar:'MA',width: 800    });
			var count2 = 1;
			CKEDITOR.on('instanceReady', function(e)
			{
				e. editor.on('focus', function(event)
				{
					if(count2 == 1)
					{
						if(CKEDITOR.currentInstance.name=='duty1')
						{
							CKEDITOR.instances.duty1.setData('');
							CKEDITOR.instances.duty1.focus();
							count2++;
						}
					}
					
				})
			});
		</script>
</div>
<div class="inpt_area">
	<label for="f_name">Requirements:</label> <span style="color:gray; font-size:13px;">Provide the requirements title and then your requirement with the use of bullets or numbers as per the example.</span>
	<textarea name="computer1" id="computer1" class="ckeditor1" rows="4" cols="60"><?php if(isset($computer1)) echo $computer1?></textarea>
		<script>
		CKEDITOR.config.toolbar_MA=[
			{ name: 'document',    items : [ 'Source','-','Save','NewPage' ] },
			{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
			{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll'] },
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline'] },
			{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv'] },
			{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
			
		];
			CKEDITOR.replace( 'computer1' , {   toolbar:'MA',width: 800    });
			var count3 = 1;
			CKEDITOR.on('instanceReady', function(e)
			{
				e. editor.on('focus', function(event)
				{
					if(count3 == 1)
					{
						if(CKEDITOR.currentInstance.name=='computer1')
						{
							CKEDITOR.instances.computer1.setData('');
							CKEDITOR.instances.computer1.focus();
							count3++;
						}
					}
					
				})
			});
		</script>
</div>
<div class="inpt_area">
	<label for="f_name">Remuneration offered: <span style="color:gray; font-size:13px;">Click either "Market related remuneration package" or complete remuneration content section in order to define the content of the offered remuneration package.</span></label>
	<input name="market_related_remuneration" id="market_related_remuneration" type="radio" checked="checked" value="0"/>
	<span style="color:#2787B9; font:bold 14px Arial,Helvetica,sans-serif;"><b>Market related remuneration package.</b></span>
	 
</div>
<div class="inpt_area">
	<label for="f_name"><input name="market_related_remuneration" id="remuneration_content" type="radio" value="1"/> Frequency:</label>
	<?php echo $off_package4_drop; ?>
</div>
<div class="inpt_area">
	<label for="f_name">Type:</label>
	<?php echo $off_package5_drop; ?>
</div>
<div class="inpt_area">
	<label for="f_name">Currency:</label>
	<input name="currency" value="<?=$currency?>" type="text" class="inputfield width11"/>
</div>
<div class="inpt_area">
	<label for="f_name">Figure:</label>
	<input type="text" name="off_package7" id="off_package7" value="<?=$off_package7?>" class="inputfield width11">
</div>
<div class="inpt_area">
	<label for="f_name">Following benefits:</label>
	<ul>			
          <li class="titletxt">		
		<br>
		<input name="off_package_b1" id="off_package_b1" type="radio" <?=$checked_off_package_b1?> value="1"/> Included
		<br>
		<input name="off_package_b1" id="off_package_b1_1" type="radio" <?=$checked_off_package_b2?> value="0"/> Excluded		
	</li>
         <li> <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="31%" align="left"><input name="off_package_benefits[0]" type="checkbox" id="off_package_benefits[0]" value="Not applicable" <?php if(is_array($off_package_benefitsStr) AND in_array("Not applicable",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Not applicable</td>
                          <td width="38%" align="left"><input name="off_package_benefits[1]" type="checkbox" id="off_package_benefits[1]" value="Pension Fund" <?php if(is_array($off_package_benefitsStr) AND in_array("Pension Fund",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Pension Fund</td>
                          <td width="31%" align="left"><input name="off_package_benefits[2]" type="checkbox" id="off_package_benefits[2]" value="Retirement Fund" <?php if(is_array($off_package_benefitsStr) AND in_array("Retirement Fund",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Retirement Fund</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[3]" type="checkbox" id="off_package_benefits[3]" value="Preservation Fund" <?php if(is_array($off_package_benefitsStr) AND in_array("Preservation Fund",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Preservation Fund</td>
                          <td align="left"><input name="off_package_benefits[4]" type="checkbox" id="off_package_benefits[4]" value="Medical Aid subsidy" <?php if(is_array($off_package_benefitsStr) AND in_array("Medical Aid subsidy",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Medical Aid subsidy</td>
                          <td align="left"><input name="off_package_benefits[5]" type="checkbox" id="off_package_benefits[5]" value="Life Insurance" <?php if(is_array($off_package_benefitsStr) AND in_array("Life Insurance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Life Insurance</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[6]" type="checkbox" id="off_package_benefits[6]" value="Disability insurance" <?php if(is_array($off_package_benefitsStr) AND in_array("Disability insurance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Disability insurance</td>
                          <td align="left"><input name="off_package_benefits[7]" type="checkbox" id="off_package_benefits[7]" value="Car allowance" <?php if(is_array($off_package_benefitsStr) AND in_array("Car allowance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Car allowance</td>
                          <td align="left"><input name="off_package_benefits[8]" type="checkbox" id="off_package_benefits[8]" value="Company Car" <?php if(is_array($off_package_benefitsStr) AND in_array("Company Car",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Company Car</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[9]" type="checkbox" id="off_package_benefits[9]" value="Cell phone allowance" <?php if(is_array($off_package_benefitsStr) AND in_array("Cell phone allowance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Cell phone allowance</td>
                          <td align="left"><input name="off_package_benefits[10]" type="checkbox" id="off_package_benefits[10]" value="Computer allowance" <?php if(is_array($off_package_benefitsStr) AND in_array("Computer allowance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Computer allowance</td>
                          <td align="left"><input name="off_package_benefits[11]" type="checkbox" id="off_package_benefits[11]" value="Entertainment allowance" <?php if(is_array($off_package_benefitsStr) AND in_array("Entertainment allowance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Entertainment allowance</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[12]" type="checkbox" id="off_package_benefits[12]" value="Petrol allowance" <?php if(is_array($off_package_benefitsStr) AND in_array("Petrol allowance",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Petrol allowance</td>
                          <td align="left"><input name="off_package_benefits[13]" type="checkbox" id="off_package_benefits[13]" value="Commission structure" <?php if(is_array($off_package_benefitsStr) AND in_array("Commission structure",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Commission structure</td>
                          <td align="left"><input name="off_package_benefits[14]" type="checkbox" id="off_package_benefits[14]" value="Incentive Structure" <?php if(is_array($off_package_benefitsStr) AND in_array("Incentive Structure",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Incentive Structure</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[15]" type="checkbox" id="off_package_benefits[15]" value="Profit share structure" <?php if(is_array($off_package_benefitsStr) AND in_array("Profit share structure",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Profit share structure</td>
                          <td align="left"><input name="off_package_benefits[16]" type="checkbox" id="off_package_benefits[16]" value="Guaranteed 13th cheque" <?php if(is_array($off_package_benefitsStr) AND in_array("Guaranteed 13th cheque",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Guaranteed 13th cheque</td>
                          <td align="left"><input name="off_package_benefits[17]" type="checkbox" id="off_package_benefits[17]" value="Guaranteed 14th cheque" <?php if(is_array($off_package_benefitsStr) AND in_array("Guaranteed 14th cheque",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Guaranteed 14th cheque</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[18]" type="checkbox" id="off_package_benefits[18]" value="Housing subsidy" <?php if(is_array($off_package_benefitsStr) AND in_array("Housing subsidy",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Housing subsidy</td>
                          <td align="left"><input name="off_package_benefits[19]" type="checkbox" id="off_package_benefits[19]" value="Free accommodation / Company housing" <?php if(is_array($off_package_benefitsStr) AND in_array("Free accommodation / Company housing",$off_package_benefitsStr)){ echo "checked=true";} ?> >
                            &nbsp;Free accommodation /  housing</td>
                          <td align="left"><input name="off_package_benefits[20]" type="checkbox" id="off_package_benefits[20]" value="Free meals" <?php if(is_array($off_package_benefitsStr) AND in_array("Free meals",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Free meals</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[21]" type="checkbox" id="off_package_benefits[21]" value="Free transport" <?php if(is_array($off_package_benefitsStr) AND in_array("Free transport",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Free transport</td>
                          <td align="left"><input name="off_package_benefits[22]" type="checkbox" id="off_package_benefits[22]" value="Generous leave provision" <?php if(is_array($off_package_benefitsStr) AND in_array("Generous leave provision",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Generous leave provision</td>
                          <td align="left"><input name="off_package_benefits[23]" type="checkbox" id="off_package_benefits[23]" value="Free company products" <?php if(is_array($off_package_benefitsStr) AND in_array("Free company products",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Free company products</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[24]" type="checkbox" id="off_package_benefits[24]" value="Discounted company products" <?php if(is_array($off_package_benefitsStr) AND in_array("Discounted company products",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Discounted company products</td>
                          <td align="left"><input name="off_package_benefits[25]" type="checkbox" id="off_package_benefits[25]" value="Generous job related allowances" <?php if(is_array($off_package_benefitsStr) AND in_array("Generous job related allowances",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Generous job related allowances</td>
                          <td align="left"><input name="off_package_benefits[26]" type="checkbox" id="off_package_benefits[26]" value="Other benefits" <?php if(is_array($off_package_benefitsStr) AND in_array("Other benefits",$off_package_benefitsStr)){ echo "checked=true";} ?>>
                            &nbsp;Other benefits</td>
                          </tr>
                      </table></li>
        </ul>
</div>
<div class="inpt_area">
<h3>Filters:   &nbsp;<span style="color:gray; font-size:13px;">The System filters applicants against the settings below and gives
you a compliance score per applicant (in your account) which saves valuable time when sorting through applications. Results from
"screening questions" in the next section is added to the score.</span></h3>
</div>
<div class="inpt_area">
	<label for="f_name">Gender:</label>
	<select class='select' style="height:30px;" class="inputfield width11" name="gender" >
              <option value="" <?php if($gender=="") echo "selected" ?>>All</option>
             <option value="Male" <?php if($gender=="Male") echo "selected" ?>>Male</option>
             <option value="Female" <?php if($gender=="Female") echo "selected" ?>>Female</option>
        </select>  
</div>
<div class="inpt_area">
	<label for="f_name">Language:</label>
	<?php echo $language_filter_drop;  ?>  
</div>
<div class="inpt_area">
	<label for="f_name">Industry:</label>
	<?php echo $industry_dropbox_fil;  ?>  
</div>
<div class="inpt_area">
	<label for="f_name">Occupation:</label>
	<?php echo $profession_filter_drop;  ?>  
</div>
<div class="inpt_area">
	<label for="f_name">Level:</label>
	<?php echo $level_filter;  ?>
	<ul>
	<li class="titletxt" ><input name="higher_level" type="radio" value="1" class="inputfield"/> and higher</li>
	</ul>
</div>
<div class="inpt_area">
	<label for="f_name">Highest Qualification:</label>
	<?php echo $ter_qualification_drop;  ?>
	<ul>
		<li class="titletxt"><input name="higher_qualification_chkbx" type="radio" value="1"/> and higher </li>
		<li><input name="higher_qualification" value="<?=$higher_qualification?>" type="text" id="higher_qualification" class="inputfield width11" value="" size="50"></li>
	</ul>
</div>

<div class="inpt_area">
	<label for="f_name">Screening questions:</label><span style="color:gray; font-size:13px;">Write up to 4 screening questions to which the Applicant will answer Yes or No. Yes is calculated as positive response and your question must be structured accordingly. <span style="color:red;"><u>Unlawfull questions are not permitted and will be removed.</u></span></span>
</div>
<div class="inpt_area">
	<label for="f_name">Question 1:</label>
	<input type="text" name="ques[]" id="ques1"  class="inputfield" value="<?=$ques1?>" onFocus="clearText3(this);">
</div> 
<div class="inpt_area">
	<label for="f_name">Question 2:</label>
	<input type="text" name="ques[]" id="ques2"  class="inputfield" value="<?=$ques2?>" onFocus="clearText4(this);">
</div> 
<div class="inpt_area">
	<label for="f_name">Question 3:</label>
	<input type="text" name="ques[]" id="ques3" value="<?=$ques3?>" class="inputfield">
</div> 
<div class="inpt_area">
	<label for="f_name">Question 4:</label>
	<input type="text" name="ques[]" id="ques4" value="<?=$ques4?>" class="inputfield">
</div> 
<div class="inpt_area">
	<label for="f_name">Display options: &nbsp;<span style="color:gray; font-size:13px;">Tick any of the button to display relevant contact
	information on the Job Advertisement. Note that public display of your contact details may lead to direct applications or abuse of your
	contact information by third parties.</span>
	</label>
	
</div> 
<div class="inpt_area">
<ul>
	<li class="titletxt" style="width:50px;">
	<input name="rec_hide_email" type="checkbox" value="1"/>
	</li>
	<li class="titletxt" style="width:200px;"><label for="f_name">Display email address:</label></li>
	
	<li class="titletxt" style="color:black;width:200px;"><?php if(isset($rsRecruiter->rec_email)) $rsRecruiter->rec_email; ?></li>
	<li class="titletxt" style="font-size:14px;width:260px;"> <a href="javascript:void(0);" onClick="showUploadTitle('anotherEmlAdd');"><u style="font-size:12px;">change for this job advertisement</u></a></li>
	<li style="width:150px;"><input type="text" name="anotherEmlAdd" id="anotherEmlAdd" style="display:none" class="inputfield width11"></li>         
</ul>
</div>
<div class="inpt_area">
	<ul>
	<li class="titletxt" style="width:50px;">
        	<input name="rec_hide_phone" type="checkbox" value="1"/>
        </li>
        <li class="titletxt" style="width:200px;"><label for="f_name">Display telephone number:</label></li>
        <li class="titletxt" style="color:black;width:200px;"><?php if(isset($rsRecruiter->rec_phone)) $rsRecruiter->rec_phone?></li>
	<li class="titletxt" style="font-size:14px;width:260px;"> <a href="javascript:void(0);" onClick="showUploadTitle('anotherTelephoneNo');"><u style="font-size:12px;">change for this job advertisement</u></a></li>
	<li style="width:150px;"><input type="text" name="anotherTelephoneNo" id="anotherTelephoneNo" style="display:none" class="inputfield width11"></li>         
	</ul>
</div>
<div class="inpt_area">
        <ul>
	<li class="titletxt" style="width:50px;">
        	 <input name="rec_hide_fax" type="checkbox" value="1"/>
         </li>
         <li class="titletxt" style="width:200px;"><label for="f_name">Display fax number:</label></li>
     	 <li class="titletxt" style="color:black;width:200px;"><?php if(isset($rsRecruiter->rec_fax)) $rsRecruiter->rec_fax; ?></li>
	<li class="titletxt" style="font-size:14px;width:260px;"> <a href="javascript:void(0);" onClick="showUploadTitle('anotherFaxNo');"><u style="font-size:12px;">change for this job advertisement</u></a></li>
	<li style="width:150px;"><input type="text" name="anotherFaxNo" id="anotherFaxNo" style="display:none" class="inputfield width11"></li>         
	</ul>
         <p class="clear"></p>
</div>
<div class="inpt_area"> 
	<label for="f_name">Uploads: <span style="color:gray; font-size:13px;">Upload any document to compliment your online Job Advertisement.</span></label>
</div>
<div class="inpt_area"> 
	<label for="f_name">Upload a printed advertisement:</label>
	<input type="file" name="ad_print" id="ad_print">
</div>  
<div class="inpt_area"> 		 
<label for="f_name">Upload another document:</label>
<input type="file" name="fileField" id="fileField">&nbsp;&nbsp; <a href="javascript:void(0);" onClick="showUploadTitle('uploadTitle');"><u style="font-size:12px;">give this upload a title</u></a>
<input type="text" name="uploadTitle" id="uploadTitle" style="display:none" class="inputfield width11">
<p class="clear"></p>
</div>
<div class="inpt_area"> 
	<label for="f_name"> Receive Applications:   &nbsp;<span style="color:gray; font-size:13px;">All application are store and managed in your account. The system will also send through the resumes of applicants via e-mail to you as applications occur. Manage relevant e-mail options in this section.</span></label>
</div>
<div class="inpt_area">
<input name="send_me_resumes" type="checkbox" id="send_me_resumes" value="1" <?php if(isset($_POST["send_me_resumes"])){ if($_POST["send_me_resumes"]=="1") echo("checked"); }else{echo("checked");}?>>&nbsp;Send me the resumes of applicants via e-mail at the instant of their application:
</div>
<div class="inpt_area">
<label for="f_name">
Send Resume of Applicants to another e-mail address:
</label>
<input type="text" name="another_email_id"  class="inputfield width11" >
</div>
	<div class="accounttab">
	     <h3> Terms & Conditions:</h3>
 </div>
<div class="inpt_area">
	<input name="chkConfirm" required="required" type="checkbox" id="chkDisplay" value="1" <? if($confirm == "1") echo "checked" ?> >

		I have read, <a href="#"> understand and now agree with the
		<span class="termtxt">
			<a href="#"> terms and conditions</a>
		</span> of this website

</div>
       
<!--	<div class="span11">
		<div class="orgbtn fleft">

		<div class="fleft midgetinfobtn"><a href="javascript:show_preview(this.form);">Preview Advertisement</a></div>

		</div>

		<div class="orgbtn fleft">

		<div class="fleft midgetinfobtn"><a  href="javascript:save_job_ad_1(document.form1);">Publish Job Advert Now </a></div>
	
		</div>

	        <p class="clear"></p>
	</div>-->
        <!-- Page Body End-->

 <!-- innercol-leftpan end-->
<!-- <div class="fleft midgetinfobtn"><a  href="javascript:save_job_ad_1(document.form1);">Publish Job Advert Now </a></div>-->
<a  href="javascript:save_job_ad_1(document.form1);">
 <input class="blue_btn pull-right" type="button" name="btnSubmit" value="Submit" />
</a>
</div>
              </div>
   </form>
			
            </div>
          </div>
        </section>
	<?php echo $this->Html->script('/js/design/jquery.accordion.source.js'); ?>

<script type="text/javascript">
		$(document).ready(function () {
			$('ul').accordion();
		});
	</script>

<?php echo $this->Html->script('/js/design/jquery.screwdefaultbuttonsV2.js'); ?>
		<script type="text/javascript">
		$(function(){
		
			$('input:checkbox').screwDefaultButtons({
				image: 'url("<?php echo $this->webroot; ?>css/images/checkbox.png")',
				width: 18,
				height: 18
			});

			
		
		});
	</script>  
      