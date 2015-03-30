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
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'"  .$att.">
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
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' ".$att.">
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
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' ".$att.">
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
		$str = "<select name='" . $name . "_date" . $array . "' id='" . $name . "_date'>
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
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
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
<script type="text/javascript">
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
</script>
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
select {
    border: 3px solid #E1E0E0;
    height: 30px;
    line-height: 28px;
    margin: 8px 0 12px 13px;
    padding: 0 0 0 5px;
    margin-right: 82px !important;
    width: 210px;
}
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


<form action="jobpreview" method="post" enctype="multipart/form-data" name="form1" target="postProcess"  >
	<input type="hidden" value="<?=$current_plan_id?>" name="current_plan_id">
	<input type="hidden" value="<?=$in_id?>" name="invoice_id">
	
<div id="body-cntent">
  <div class="wrapper">
  <div class="job-search-box">
  
  	<!-- innercol-pan start -->
   <div class="innercol-leftpan fleft" style="width:990px;">
	<h2>Job posting form </h2>
    <p class="clear"></p>

	
  	<div class="innercol-mid" style="width:988px;">
	    <div class="content-inner" style="padding-left:10px;">


        <!-- Page Body Start-->
        <div class="inner-content">
     <div class="span11">
     <p class="headingguide">
	<!--<a href="job_ad_temp_list.php"><u>Use a guidance template</u></a>  >>-->
	<?php 
	//  $sqlRec = "select * from job_ad";
	//	$resultRec = $objDb->ExecuteQuery($sqlRec);
	//	$rsRec = mysql_num_rows($resultRec);
		$jobAddRrfNoCount = $rsRec + 1;
	//	$jobAddRrfNo = count($jobAddRrfNoCount);
        $position_name = "Example: Sales Manager";

?>
	<span style="float:right;">Job Advertisement Reference Number: &nbsp;&nbsp; <input type="textbox" name="jobAddRefNo" id="jobAddRefNo" value="NR<?=$jobAddRrfNoCount?>" onClick="clearText2(this);" size="7"> &nbsp; <a href="javascript:void(0);" id="change_link" style="font-size:12px;hover{font-size:100px;}"; onClick="randomString();"><u>Change</u></a></span>
     </p>
     
     
     <div class="accounttab">
      <h3> Job Details:  &nbsp;<span style="color:gray; font-size:13px;">Define the vacant position in order for the system to ensure optimal exposure of your Job Advertisement.</span></h3>

       <div class="userdetails fleft">
       <div>
        <ul>
         <li class="titletxt" style="width: 165px;"><span style="color:red;">*</span>&nbsp;Position Title:</li>
         <li>
		 <input name="position_name" type="text" id="position1_name" class="inputfield width11" onClick="clearText1(this);" value="<?=$position_name?>" size="50">
		 </li>
         <li class="titletxt"><span style="color:red;">*</span>&nbsp;Type of Position:</li>
         <li>
         <select  style="height:30px;" class="inputfield width11" name="vacancy" id="vacancy">
            <option value="" selected>Select</option>
            <option value="Permanent Position"  <?php if(isset($vacancy) AND trim($vacancy)=="Permanent Position"){ echo "selected";} ?> >Permanent Position</option>
            <option value="Temporary Position" <?php if(isset($vacancy) AND trim($vacancy)=="Temporary Position"){ echo "selected";} ?> >Temporary Position</option>
         </select>  
         </li>
         </ul>
         <p class="clear"></p>
         </div>
         
         <div>
         <ul>
         <li class="titletxt" style="width: 165px;">&nbsp;&nbsp;Department:</li>
         <li> <input name="department" value="<?=$department?>" type="text" class="inputfield width11"/></li>
         <li class="titletxt"><span style="color:red;">*</span>&nbsp;Level:</li>
         <li>
		 <?php /*fill_dropdown("level","job_options","option_name","option_name",$level,"Select","where category_id=14");*/ ?>
   <?php
      echo $level_dropbox;
   ?>
         </li>
         
        </ul>
        <p class="clear"></p>
        </div>
        
        <div>
         <ul>
         <li class="titletxt" style="width: 165px;">&nbsp;&nbsp;Grade:</li>
         <li>
		 <input name="grade" type="text" id="grade" value="<?=$grade?>" size="50" class="inputfield width11" />
		  </li>
         <li class="titletxt"><span style="color:red;">*</span>&nbsp;Occupation:</li>
         <li>
		 <?php /*fill_dropdown("industry",'job_options','option_name', "option_name",$industry,"Select","where category_id=6")*/?>
   <?php echo $industry_dropbox; ?>
         </li>
         
        </ul>
        <p class="clear"></p>
        </div>
        
	 <div>
         <ul>
         <li class="titletxt" style="width: 165px;"><span style="color:red;">*</span>&nbsp;Ad running time:</li>
         <!--<li>From:
         
         
		<?php if ($adFrom == "" ) echo createDateRunningTime("adFrom","","","onChange=fillToDate()"); else echo createDateRunningTime("adFrom",$adFrom,"","onChange=fillToDate()");  ?>
		<br>
		To:
		<select name="adTo_date" id="adTo_date" disabled="true"><option value="">Date</option></select>
						  <select name="adTo_month" id="adTo_month" disabled="true"><option value="">Month</option></select>
						   <select name="adTo_year" id="adTo_year" disabled="true"><option value="">Year</option></select>
 
         </li>-->
	 <li><!--From:
		<input type="text" id="from" readonly="readonly" class="inputfield width11" name="from"/>
		To:
		<input type="text" id="to" readonly="readonly" class="inputfield width11" name="to"/>-->
		<!--------------------------------------------------------------- another date range picker----------------------------------------------->
				<div id="widget">
					<div id="widgetField">
						<span id="from_to"></span>
						<a href="#">Select date range</a>
					</div>
					<div id="widgetCalendar">
					</div>
				</div>
				<input type="hidden" name="hidden_from_to" id="hidden_from_to">
		<!--------------------------------------------------------------- another date range picker----------------------------------------------->
 
         </li>
	<li><div class="fright" style="padding:10px 10px 0 10px;"><a href='javascript:void();' onClick="return hs.htmlExpand(this, { headingText: 'Ad running time' })"  title="help">
	<img src="/images/helo_icon.png" width="24" height="20" class="quesmark" /></a> 
		<div class="highslide-maincontent" >Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor..</div></div></li>
     
        </ul>
        <p class="clear"></p>
        </div>
	
        <div>
         <ul>
         <li class="titletxt" style="width: 165px;">&nbsp;&nbsp;Assumption of duties:</li>
         <li>
		  <?php if ($date_of_taking == "" ) echo createDateAssumption("date_of_taking"); else echo createDateAssumption("date_of_taking",$date_of_taking);  ?>
		<input type="text" id="date_of_taking" class="inputfield width11" name="date_of_taking" readonly="readonly" style="margin-right:0 !important;"/>
		
		 
         </li>
		 <li class="titletxt" ><input type="checkbox" id="asap"  value="1" name="asapassumptionofduties" />ASAP</li>
     
        </ul>
        <p class="clear"></p>
        </div>
			  <div>
         <ul>
         <li class="titletxt" style="width: 165px;">&nbsp;&nbsp;Town:</li>
         <li>
		
		
		      <?php if($otherp_city == 0) echo $postal_city1; else echo $postal_city2; ?>
                                                <span id="span_postal_city" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;Other city or town :
                                                <input name="other_postal_city" id="other_postal_city" type="text" value="<?=$other_postal_city ?>" >
                                                </span> </li>
          </ul>
        <p class="clear"></p>
        </div>
		      
        
        <div>
         <ul>
         <li class="titletxt" style="width: 165px;"><span style="color:red;">*</span>&nbsp;Location / Country:</li>
	  
         <li>
		<?php /*fill_dropdown('ad_country','job_country', 'country_name', "country_id", $ad_country, "Country","","onchange=regionText(); ","order_id, country_id")*/?>
         <?php echo $postal_country; ?> 
         </li>
        <!-- <li class="titletxt">Citizenship:</li>
         <li>
		 <?php /*fill_dropdown('citizenship','job_country', 'country_name', "country_name", $citizenship,"Select");*/ ?>
   <?php echo $citizenship; ?>
         </li>-->
        </ul>
        <p class="clear"></p>
        </div>  
        
        <div>
         <ul>
		     <?php 
			$ad_country="";
                        if(isset($rsJob->ad_country))
                        {
                            $ad_country=$rsJob->ad_country;
                        }
                ?>
         <li class="titletxt" style="width: 165px;"><span style="color:red;">*</span>&nbsp;Area / Region:</li>
         <li id="region_li">
	 <select  style="height:30px; width:220px;" class="inputfield width11" name="ad_region" >
		<option value="select">Please select country first</option>
          </select>   
    
         </li>
         <li class="titletxt">&nbsp;&nbsp;Equity status:</li>
         <li>
		 <?php /*fill_dropdown('equity_status','job_options', 'option_name', "option_name",$equity_status,"All","where category_id=9")*/?>
<?php echo $equity_status_drop; ?>
         </li>
        </ul>
        <p class="clear"></p>
        </div>
        
        
        </div>
        <p class="clear"></p>
        </div>
        
        
        <div class="accounttab">
      <h3> <span style="color:red;font-size:15px;">*</span>Job Summary:  &nbsp;<span style="color:gray; font-size:13px;">Write a short summary of the position which will be displayed as the Job Advertisement summary.</span></h3>
      
       <div class="userdetails fleft">
       <div>
        <ul>
         <!--<li class="titletxt">Job Summary:</li>-->
         <li>
		<textarea name="job_desc" id="job_desc" class="ckeditor1" rows="4" cols="60"><?php if(isset($job_desc)) echo $job_desc?></textarea>
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

         </li>
         </ul>

         <p class="clear"></p>
         </div>  
        </div>
        <p class="clear"></p>
        </div>
           
      <div class="accounttab">
      <h3> Duties:  &nbsp;<span style="color:gray; font-size:13px;">Define the position duties in this section. Use numbers or bullets to distinguish between different duties. Keep it short and to the point.</span></h3>
       <div class="userdetails fleft">
       <div>
        <ul>
         <!--<li class="titletxt">Duties:</li>-->
         <li>
		<?php
		//$config['toolbar'] = array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' );
		?>
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
         </li>
         </ul>
         <p class="clear"></p>
         </div>  
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
      <h3> Requirements:  &nbsp;<span style="color:gray; font-size:13px;">Provide the requirements title and then your requirement with the use of bullets or numbers as per the example.</span></h3>
       <div class="userdetails fleft">
       <!--<div>
        
        <ul>
         <li class="titletxt">Qualifications:</li>
         <li>
		 <?php /*fill_dropdown('min_sec_qualification','job_options', 'option_name', "option_name",$min_sec_qualification,"N/A","where category_id=3")*/ ?>
   <?php echo $min_sec_qualification_drop; ?>
   </li>
 		<li class="titletxt">Experiences:</li>
         <li>
		<?php /*fill_dropdown('exp_required','job_options', 'option_name', "option_name",$exp_required,"N/A","where category_id=21")*/?>
  <?php echo $exp_required_drop; ?>
  </li>
		 </ul>
         <p class="clear"></p>
         </div>  -->
		 
		     <div>
         <ul>
         <!--<li class="titletxt" style="width:160px;">Computer Proficiency:</li>-->
         <li>
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
         </li>
          <!--<li class="titletxt">Languages:</li>
         <li> <?php /*fill_dropdown('language1','job_options', 'option_name', "option_name",$language1,"Select","where category_id=15")*/?></li>
        </ul>
        <p class="clear"></p>
        </div> 
		
		<div>
        <ul>
         <li class="titletxt">License:</li>
         <li>
		 <?php /*fill_dropdown('drivers_license','job_options', 'option_name', "option_name",$drivers_license,"N/A","where category_id=11")*/?>
	    </li>
 	     </ul>-->
         <p class="clear"></p>
         </div>
		
		 
        </div>
        <p class="clear"></p>
        </div>
					
        <div class="accounttab">
      <h3>Remuneration offered:  &nbsp;<span style="color:gray; font-size:13px;">Click either "Market related remuneration package" or complete remuneration content section in order to define the content of the offered remuneration package.</span></h3>
       <div class="userdetails fleft">
	 <input name="market_related_remuneration" id="market_related_remuneration" type="radio" checked="checked" value="0"/> <span style="color:#2787B9; font:bold 14px Arial,Helvetica,sans-serif;"><b>Market related remuneration package.</b></span>
       <span style="background-color:gray; border:solid dotted;">
        <div>
         <ul>
		<li class="titletxt" style="width:225px;"><input name="market_related_remuneration" id="remuneration_content" type="radio" value="1"/> Frequency:</li>
		<li class="titletxt" style="width:225px;"><center>Type:</center></li>
		<li class="titletxt" style="width:225px;"><center>Currency:</center></li>
		<li class="titletxt" style="width:225px;"><center>Figure:</center></li>
	 </ul>
	</div>
	<p class="clear"></p>
       <div>
	<ul>
		
		<li style="width:225px;">
		<?php /*fill_dropdown("off_package4","job_options","option_name","option_name",trim($off_package4),"no_value","where category_id=360","","option_id");*/
                echo $off_package4_drop;
                ?>
		</li>
		
		<li style="width:225px;">
	       <?php /*fill_dropdown("off_package5","job_options","option_name","option_name",trim($off_package5),"no_value","where category_id=361","","option_id");*/
               echo $off_package5_drop;
               ?>
		</li>
	      
		<li style="width:225px;">
	       <?php /*fill_dropdown("off_package6","job_options","option_name","option_name",trim($off_package6),"no_value","where category_id=362","","option_id");*/
               echo $off_package6_drop;
               ?>
		</li>
		       
	       <li style="width:225px;">
	       <!--<?php /*fill_dropdown("off_package_b1","job_options","option_name","option_name",trim($off_package_b1),"no_value","where category_id=363","","option_id");*/ ?>-->
	       <input type="text" name="off_package7" id="off_package7" class="inputfield width11">
		</li>
	</ul>
			</div>
					<br>
			<div><ul style="float:left">			
          <li class="titletxt">
		Following benefits:
		<br>
		<input name="off_package_b1" id="off_package_b1" type="radio" checked="checked" value="1"/> Included
		<br>
		<input name="off_package_b1" id="off_package_b1_1" type="radio" value="0"/> Excluded
		
	</li>
         <li> <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="31%" align="left"><input name="off_package_benefits[0]" type="checkbox" id="off_package_benefits[0]" value="Not applicable" <?php if(isset($off_package_benefits[0]) && trim($off_package_benefits[0]) =="Not applicable") echo "checked"; ?>>
                            &nbsp;Not applicable</td>
                          <td width="38%" align="left"><input name="off_package_benefits[1]" type="checkbox" id="off_package_benefits[1]" value="Pension Fund" <?php if(isset($off_package_benefits[1]) && $off_package_benefits[1] =="Pension Fund") echo "checked"; ?>>
                            &nbsp;Pension Fund</td>
                          <td width="31%" align="left"><input name="off_package_benefits[2]" type="checkbox" id="off_package_benefits[2]" value="Retirement Fund" <?php if(isset($off_package_benefits[2]) && $off_package_benefits[2] =="Retirement Fund") echo "checked"; ?>>
                            &nbsp;Retirement Fund</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[3]" type="checkbox" id="off_package_benefits[3]" value="Preservation Fund" <?php if(isset($off_package_benefits[3]) && $off_package_benefits[3] =="Preservation Fund") echo "checked"; ?>>
                            &nbsp;Preservation Fund</td>
                          <td align="left"><input name="off_package_benefits[4]" type="checkbox" id="off_package_benefits[4]" value="Medical Aid subsidy" <?php if(isset($off_package_benefits[4]) && $off_package_benefits[4] =="Medical Aid subsidy") echo "checked"; ?>>
                            &nbsp;Medical Aid subsidy</td>
                          <td align="left"><input name="off_package_benefits[5]" type="checkbox" id="off_package_benefits[5]" value="Life Insurance" <?php if(isset($off_package_benefits[5]) && $off_package_benefits[5] =="Life Insurance") echo "checked"; ?>>
                            &nbsp;Life Insurance</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[6]" type="checkbox" id="off_package_benefits[6]" value="Disability insurance" <?php if(isset($off_package_benefits[6]) && $off_package_benefits[6] =="Disability insurance") echo "checked"; ?>>
                            &nbsp;Disability insurance</td>
                          <td align="left"><input name="off_package_benefits[7]" type="checkbox" id="off_package_benefits[7]" value="Car allowance" <?php if(isset($off_package_benefits[7]) && $off_package_benefits[7] =="Car allowance") echo "checked"; ?>>
                            &nbsp;Car allowance</td>
                          <td align="left"><input name="off_package_benefits[8]" type="checkbox" id="off_package_benefits[8]" value="Company Car" <?php if(isset($off_package_benefits[8]) && $off_package_benefits[8] =="Company Car") echo "checked"; ?>>
                            &nbsp;Company Car</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[9]" type="checkbox" id="off_package_benefits[9]" value="Cell phone allowance" <?php if(isset($off_package_benefits[9]) && $off_package_benefits[9] =="Cell phone allowance") echo "checked"; ?>>
                            &nbsp;Cell phone allowance</td>
                          <td align="left"><input name="off_package_benefits[10]" type="checkbox" id="off_package_benefits[10]" value="Computer allowance" <?php if(isset($off_package_benefits[10]) && $off_package_benefits[10] =="Computer allowance") echo "checked"; ?>>
                            &nbsp;Computer allowance</td>
                          <td align="left"><input name="off_package_benefits[11]" type="checkbox" id="off_package_benefits[11]" value="Entertainment allowance" <?php if(isset($off_package_benefits[11]) && $off_package_benefits[11] =="Entertainment allowance") echo "checked"; ?>>
                            &nbsp;Entertainment allowance</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[12]" type="checkbox" id="off_package_benefits[12]" value="Petrol allowance" <?php if(isset($off_package_benefits[12]) && $off_package_benefits[12] =="Petrol allowance") echo "checked"; ?>>
                            &nbsp;Petrol allowance</td>
                          <td align="left"><input name="off_package_benefits[13]" type="checkbox" id="off_package_benefits[13]" value="Commission structure" <?php if(isset($off_package_benefits[13]) && $off_package_benefits[13] =="Commission structure") echo "checked"; ?>>
                            &nbsp;Commission structure</td>
                          <td align="left"><input name="off_package_benefits[14]" type="checkbox" id="off_package_benefits[14]" value="Incentive Structure" <?php if(isset($off_package_benefits[14]) && $off_package_benefits[14] =="Incentive Structure") echo "checked"; ?>>
                            &nbsp;Incentive Structure</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[15]" type="checkbox" id="off_package_benefits[15]" value="Profit share structure" <?php if(isset($off_package_benefits[15]) && $off_package_benefits[15] =="Profit share structure") echo "checked"; ?>>
                            &nbsp;Profit share structure</td>
                          <td align="left"><input name="off_package_benefits[16]" type="checkbox" id="off_package_benefits[16]" value="Guaranteed 13th cheque" <?php if(isset($off_package_benefits[16]) && $off_package_benefits[16] =="Guaranteed 13th cheque") echo "checked"; ?>>
                            &nbsp;Guaranteed 13th cheque</td>
                          <td align="left"><input name="off_package_benefits[17]" type="checkbox" id="off_package_benefits[17]" value="Guaranteed 14th cheque" <?php if(isset($off_package_benefits[17]) && $off_package_benefits[17] =="Guaranteed 14th cheque") echo "checked"; ?>>
                            &nbsp;Guaranteed 14th cheque</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[18]" type="checkbox" id="off_package_benefits[18]" value="Housing subsidy" <?php if(isset($off_package_benefits[18]) && $off_package_benefits[18] =="Housing subsidy") echo "checked"; ?>>
                            &nbsp;Housing subsidy</td>
                          <td align="left"><input name="off_package_benefits[19]" type="checkbox" id="off_package_benefits[19]" value="Free accommodation / Company housing" <? if(isset($off_package_benefits[19]) && $off_package_benefits[19] =="Free accommodation / Company housing") echo "checked"; ?>>
                            &nbsp;Free accommodation /  housing</td>
                          <td align="left"><input name="off_package_benefits[20]" type="checkbox" id="off_package_benefits[20]" value="Free meals" <?php if(isset($off_package_benefits[20]) && $off_package_benefits[20] =="Free meals") echo "checked"; ?>>
                            &nbsp;Free meals</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[21]" type="checkbox" id="off_package_benefits[21]" value="Free transport" <?php if(isset($off_package_benefits[21]) && $off_package_benefits[21] =="Free transport") echo "checked"; ?>>
                            &nbsp;Free transport</td>
                          <td align="left"><input name="off_package_benefits[22]" type="checkbox" id="off_package_benefits[22]" value="Generous leave provision" <?php if(isset($off_package_benefits[22]) && $off_package_benefits[22] =="Generous leave provision") echo "checked"; ?>>
                            &nbsp;Generous leave provision</td>
                          <td align="left"><input name="off_package_benefits[23]" type="checkbox" id="off_package_benefits[23]" value="Free company products" <?php if(isset($off_package_benefits[23]) && $off_package_benefits[23] =="Free company products") echo "checked"; ?>>
                            &nbsp;Free company products</td>
                          </tr>
                        <tr>
                          <td align="left"><input name="off_package_benefits[24]" type="checkbox" id="off_package_benefits[24]" value="Discounted company products" <?php if(isset($off_package_benefits[24]) && $off_package_benefits[24] =="Discounted company products") echo "checked"; ?>>
                            &nbsp;Discounted company products</td>
                          <td align="left"><input name="off_package_benefits[25]" type="checkbox" id="off_package_benefits[25]" value="Generous job related allowances" <?php if(isset($off_package_benefits[25]) && $off_package_benefits[25] =="Generous job related allowances") echo "checked"; ?>>
                            &nbsp;Generous job related allowances</td>
                          <td align="left"><input name="off_package_benefits[26]" type="checkbox" id="off_package_benefits[26]" value="Other benefits" <?php if(isset($off_package_benefits[26]) && $off_package_benefits[26] =="Other benefits") echo "checked"; ?>>
                            &nbsp;Other benefits</td>
                          </tr>
                      </table></li>
        </ul>
        <p class="clear"></p>
        </div> 
        </span>
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
      <h3>Filters:   &nbsp;<span style="color:gray; font-size:13px;">The System filters applicants against the settings below and gives you a compliance score per applicant (in your account) which saves valuable time when sorting through applications. Results from "screening questions" in the next section is added to the score.</span></h3>
       <div class="userdetails fleft">  
        <div>
         <ul>
         <li class="titletxt">Gender:</li>
         <li>
         <select  style="height:30px; width:220px;" class="inputfield width11" name="gender" >
              <option value="" <?php if($gender=="") echo "selected" ?>>All</option>
             <option value="Male" <?php if($gender=="Male") echo "selected" ?>>Male</option>
             <option value="Female" <?php if($gender=="Female") echo "selected" ?>>Female</option>
        </select>   
         </li>
         
         <li class="titletxt">Equity Status:</li>
         <li>

		  <?php /*fill_dropdown('equity_status','job_options', 'option_name', "option_name",$equity_status,"All","where category_id=9")*/
                  echo $equity_status_drop;
                  ?>
         </li>
        </ul>
        <p class="clear"></p>
        </div>
        
        <div>
         <ul>
         <li class="titletxt">Citizenship:</li>
         <li>
 		  <?php /*fill_dropdown('citizenship','job_country', 'country_name', "country_name", $citizenship,"All");*/
                  
                  echo $citizenship_drop;
                  ?>
         </li>
          <li class="titletxt">Language:</li>
         <li>
 		    <?php /*fill_dropdown('language_filter','job_options', 'option_name', "option_name",$language_filter,"All","where category_id=15")*/
                    echo $language_filter_drop;
                    ?>
         </li>      
        </ul>
        <p class="clear"></p>
        </div> 
        
	
	        <div>
         <ul>
         <li class="titletxt">Industry:</li>
         <li>
 
		  <span class="comment">
                 <?php /*fill_dropdown("industry_filter",'job_options','option_name', "option_name",$industry_filter,"All","where category_id=6")*/
                 echo $industry_filter;
                 ?>
          </span>
         </li>
          <li class="titletxt">Occupation:</li>
         <li>
        <?php /*fill_dropdown("occupation_filter",'job_options','option_name', "option_name",$profession_filter,"All","where category_id=408")*/
        echo $profession_filter_drop;
        ?>
         </li>
         
        </ul>
        <p class="clear"></p>
        </div>
	
	
        <div>
         <ul>
         <li class="titletxt">Level:</li>
         <li>
 		  <?php /*fill_dropdown("level_filter","job_options","option_name","option_name",$level_filter,"All","where category_id=14");*/
                  echo  $level_filter;
                  ?>
         </li>
          <!--<li class="titletxt" ><input name="higher_level" type="radio" value="1" class="inputfield"/> and higher</li>-->
        <li class="titletxt" ><input name="higher_level" type="radio" value="1" class="inputfield"/> and higher</li>
         
        </ul>
        <p class="clear"></p>
        </div>
        
        <div>
         <ul>
      
          <li class="titletxt">Highest Qualification:</li>
         <li>
		  <?php /*fill_dropdown('ter_qualification','job_options', 'option_name', "option_name",$ter_qualification,"All","where category_id=2")*/
                  echo $ter_qualification_drop;
                  ?>
		  
		  <!--<?php /*fill_dropdown('sec_qualification','job_options', 'option_name', "option_name",$sec_qualification,"N/A","where category_id=3")*/?>-->
         </li>
         <li class="titletxt"><input name="higher_qualification_chkbx" type="radio" value="1"/> and higher </li>
	<li><input name="higher_qualification" type="text" id="higher_qualification" class="inputfield width11" value="" size="50"></li>
        </ul>
        <p class="clear"></p>
        </div>
        
		   <div>
         <!--<ul>
      
		   <li class="titletxt">Industry:</li>
         <li>
 
		  <span class="comment">
                 <?php /*fill_dropdown("industry_filter",'job_options','option_name', "option_name",$industry_filter,"All","where category_id=6")*/?>
          </span>
         </li>
		   </ul>-->
        <p class="clear"></p>
        </div>
		
		
		
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
      <h3> Screening questions:  &nbsp;<span style="color:gray; font-size:13px;">Write up to 4 screening questions to which the Applicant will answer Yes or No. Yes is calculated as positive response and your question must be structured accordingly. <span style="color:red;"><u>Unlawfull questions are not permitted and will be removed.</u></span></span></h3>
       <div class="userdetails fleft">
       <div>
        <ul>
         <li class="titletxt">Question 1:</li>
         
	<li><input type="text" name="ques[]" id="ques1" style="width:500px;" class="inputfield" value="Example: Do you have a Code BE Drivers Lincence?" onFocus="clearText3(this);"></li>
	
	</ul>
		<p class="clear"></p>
         </div> 
         
         <div>
	<ul>
         <li class="titletxt">Question 2:</li>
         <li>
         
	<li><input type="text" name="ques[]" id="ques1" style="width:500px;" class="inputfield" value="Example: Do you have Accpacc experience?" onFocus="clearText4(this);"></li>
	 
	</ul>
	
         <p class="clear"></p>
         </div> 
         
         <div>
        <ul>
         <li class="titletxt">Question 3:</li>
         
	 <li><input type="text" name="ques[]" id="ques1" style="width:500px;" class="inputfield"></li>
	
		</ul>
		
		<p class="clear"></p>
         </div> 
         
         <div>
	<ul>
         <li class="titletxt">Question 4:</li>
        
	 <li><input type="text" name="ques[]" id="ques1" style="width:500px;" class="inputfield"></li>
	
         </ul>
         <p class="clear"></p>
         </div> 
         
     
         
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
      <h3> Display options:  &nbsp;<span style="color:gray; font-size:13px;">Tick any of the button to display relevant contact information on the Job Advertisement. Note that public display of your contact details may lead to direct applications or abuse of your contact information by third parties.</span></h3>
       <div class="userdetails fleft">
       <div>
        <ul>
	<li class="titletxt" style="width:50px;">
        	 <input name="rec_hide_email" type="checkbox" value="1"/>
         </li>
         <li class="titletxt" style="width:200px;">Display email address:</li>
		
         <li class="titletxt" style="color:black;width:200px;"><?php if(isset($rsRecruiter->rec_email)) $rsRecruiter->rec_email; ?></li>
	 <li class="titletxt" style="font-size:14px;width:260px;"> <a href="javascript:void(0);" onClick="showUploadTitle('anotherEmlAdd');"><u style="font-size:12px;">change for this job advertisement</u></a></li>
	<li style="width:150px;"><input type="text" name="anotherEmlAdd" id="anotherEmlAdd" style="display:none" class="inputfield width11"></li>         
</ul>
         <p class="clear"></p>
         </div> 
         
         <div>
        <ul>
	<li class="titletxt" style="width:50px;">
        	 <input name="rec_hide_phone" type="checkbox" value="1"/>
         </li>
         <li class="titletxt" style="width:200px;">Display telephone number:</li>
        
         <li class="titletxt" style="color:black;width:200px;"><?php if(isset($rsRecruiter->rec_phone)) $rsRecruiter->rec_phone?></li>
	<li class="titletxt" style="font-size:14px;width:260px;"> <a href="javascript:void(0);" onClick="showUploadTitle('anotherTelephoneNo');"><u style="font-size:12px;">change for this job advertisement</u></a></li>
	<li style="width:150px;"><input type="text" name="anotherTelephoneNo" id="anotherTelephoneNo" style="display:none" class="inputfield width11"></li>         
</ul>
         <p class="clear"></p>
         </div> 
         
     
         <div>
        <ul>
	<li class="titletxt" style="width:50px;">
        	 <input name="rec_hide_fax" type="checkbox" value="1"/>
         </li>
         <li class="titletxt" style="width:200px;">Display fax number:</li>
     	 <li class="titletxt" style="color:black;width:200px;"><?php if(isset($rsRecruiter->rec_fax)) $rsRecruiter->rec_fax; ?></li>
	<li class="titletxt" style="font-size:14px;width:260px;"> <a href="javascript:void(0);" onClick="showUploadTitle('anotherFaxNo');"><u style="font-size:12px;">change for this job advertisement</u></a></li>
	<li style="width:150px;"><input type="text" name="anotherFaxNo" id="anotherFaxNo" style="display:none" class="inputfield width11"></li>         
	</ul>
         <p class="clear"></p>
         </div>
         
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
      <h3> Uploads:    &nbsp;<span style="color:gray; font-size:13px;">Upload any document to compliment your online Job Advertisement.</span></h3>
       <div class="userdetails fleft">
       <div>
        <ul>
         <li class="titletxt" style="width:230px;">Upload a printed advertisement:</li>
         <li class="titletxt" style="width:230px;">
     <input type="file" name="ad_print" id="ad_print">
         </li>
         </ul>
         <p class="clear"></p>
         </div>  
		 
		 <div>
        <ul>
         <li class="titletxt" style="width:230px;">Upload another document:</li>
         <li class="titletxt" style="width:430px;">
      <input type="file" name="fileField" id="fileField">&nbsp;&nbsp; <a href="javascript:void(0);" onClick="showUploadTitle('uploadTitle');"><u style="font-size:12px;">give this upload a title</u></a>
         </li>
	<li style="width:140px;"><input type="text" name="uploadTitle" id="uploadTitle" style="display:none" class="inputfield width11"></li>
         </ul>
         <p class="clear"></p>
         </div>
		 
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
	<h3> Receive Applications:   &nbsp;<span style="color:gray; font-size:13px;">All application are store and managed in your account. The system will also send through the resumes of applicants via e-mail to you as applications occur. Manage relevant e-mail options in this section.</span></h3>
       <div class="userdetails fleft">
	
       <div>
        <ul>
          <li class="titletxt" style="width:602px;">
		<input name="send_me_resumes" type="checkbox" id="send_me_resumes" value="1" <?php if(isset($_POST["send_me_resumes"])){ if($_POST["send_me_resumes"]=="1") echo("checked"); }else{echo("checked");}?>>&nbsp;Send me the resumes of applicants via e-mail at the instant of their application:
        </li>
	</ul>
	<ul>
	<li style="width:520px;">
	<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Send Resume of Applicants to another e-mail address:
		<!--<p>Options:<br>
		 	 <input name="option" type="radio" id="radio" value="1" <?php if(isset($_POST["option"])){ if($_POST["option"]=="1") echo("checked"); }else{echo("checked");}?>>
                        Post to the website only, or <br>
                        <input type="radio" name="option" id="radio3" value="2" <? if(isset($_POST["option"]) && $_POST["option"]=="2"){  echo("checked"); }?>>
                        Email to internal staff members only (intercompany ad), or<br>
                        <input type="radio" name="option" id="radio4" value="3" <? if(isset($_POST["option"]) && $_POST["option"]=="3"){  echo("checked"); }?>>
                        Email to internal staff members and post to the website. </p>-->
		 
	</li>
        <li>
        <input type="text" name="another_email_id"  class="inputfield width11" style="width:202px;">
        </li>
        </ul>
         <p class="clear"></p>
         </div>  
        </div>
        <p class="clear"></p>
        </div>
        
        <div class="accounttab">
      <h3> Terms & Conditions:</h3>
       <div class="userdetails fleft">
       <div>
        <ul>
         <li class="subinnertxt"><span style="color:red;">*</span>&nbsp;<input name="chkConfirm" type="checkbox" id="chkDisplay" value="1" <?php if($confirm == "1") echo "checked" ?>>I have read, understand and now agree with the <span class="termtxt"><a href="#">terms and conditions</a></span> of this website </li>
      
         </ul>
         <p class="clear"></p>
         </div>  
        </div>
        <p class="clear"></p>
        </div>
         
	<div class="span11">
		<div class="orgbtn fleft">

		<div class="fleft midgetinfobtn"><a href="javascript:show_preview(this.form);">Preview Advertisement</a></div>

		</div>
		<!-- Job Ad-btn-->
		<div class="orgbtn fleft">

		<div class="fleft midgetinfobtn"><a  href="javascript:save_job_ad_1(document.form1);">Publish Job Advert Now </a></div>
	
		</div>
	        <!-- Job Ad end-->
	        <p class="clear"></p>
	</div>
        
        
        
        
        </div>
      <p class="clear"></p>
      </div>
        <!-- Page Body End-->
   
	
	      <p class="clear"></p>
      </div>
        
    </div>
	
	 
    </div>
    </div>
<div> <img src="/images/inner-bottomstrip-lg.jpg" width="990" height="8" /></div>
    </div>
 <!-- innercol-leftpan end-->
 
    <div class="clear"></div>
    </div>
   </form>