<?php   
function createDateCurrent($name,$value="",$array="")
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
	$str = "<select  name='" . $name . "_date" . $array . "' id='" . $name . "_date'   >
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
	
	$str .= "<select  name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
			<option value=''>Month</option>";
	
	while(list($key,$val) = each($arrMonth))
	{
		$selected = "";
		if($month == $key)	$selected = "selected";
			$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
	}
			
	$str .= "</select>&nbsp;";		
	
	//year		
	$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' onClick='neverYear()'>
			<option value=''>Year</option>";		

	for($i=2009; $i<=date("Y")+50; $i++)
	{
		$selected = "";
		if($i == $year)	$selected = "selected";
			$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
	}
	$str .= "</select>";		
	return $str;
}

function createDateMonthYear($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValue(this," . $name . "_date".")'>
				<option value='m'>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value='y'>Year</option>";		
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDateMonthYearTo($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValueTo(this," . $name . "_date".")'>
				<option value='m'>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value='y'>Year</option>";		
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDateImmediately($name,$value="",$array="")
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
		$str = "<select  name='" . $name . "_date" . $array . "' id='" . $name . "_date'   >
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
		
		$str .= "<select  name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' onClick='ImmediatelyYear()'>
				<option value=''>Year</option>";		

		for($i=2009; $i<=date("Y")+50; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
		if($year=="Immediately")	$selected = "selected";
		$str .= "	<option value='Immediately' " . $selected . ">Immediately</option>";
		$str .= "</select>";		
		return $str;
	}
	
	function createDateMonthYearCurrent($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValue(this," . $name . "_date".")'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=date("Y"); $i<=date("Y")+5; $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDateMonthYearCurrentTo($name,$value="",$array="")
	{
		$arrDate = explode("-",$value);
		$date = "";
		$month = "";
		$year = "";
		
		if(sizeof($arrDate) == 3)
		{
			if($arrDate[2]!=0)
			{
				$date =$arrDate[2];
			}
			$month = $arrDate[1];
			$year = $arrDate[0];
		}
		
		
		$str = "<input type='hidden' name='" . $name . "_date" . $array . "' id='" . $name . "_date' value='".$date."' >";		
		//month
		$arrMonth = array(1=>"January",2=>"February",3=>"March",4=>"April",5=>"May",6=>"June",7=>"July",8=>"August",9=>"September",10=>"October",11=>"November",12=>"December");
		
		$str .= "<select name='" . $name . "_month" . $array . "' id='" . $name . "_month' onChange='dateValueTo(this," . $name . "_date".")'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key){$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year'>
				<option value=''>Year</option>";		
		
		for($i=date("Y"); $i<=date("Y")+5; $i++)
		{
			$selected = "";
			if($i == $year)	{$selected = "selected"; $date=1;}
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";	
		//date
		
				
		return $str;
	}
	function createDate($name,$value="",$array="")
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
		
		for($i=1940; $i<=date("Y"); $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
				
		$str .= "</select>";		
		return $str;
	}
	function createDateLicence($name,$value="",$array="")
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
		$str = "<select  name='" . $name . "_date" . $array . "' id='" . $name . "_date'   >
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
		
		$str .= "<select  name='" . $name . "_month" . $array . "' id='" . $name . "_month'>
				<option value=''>Month</option>";
		
		while(list($key,$val) = each($arrMonth))
		{
			$selected = "";
			if($month == $key)	$selected = "selected";
				$str .= "	<option value='" . $key . "' " . $selected . ">" . $val. "</option>";
		}
				
		$str .= "</select>&nbsp;";		
		
		//year		
		$str .= "<select name='" . $name . "_year" . $array . "' id='" . $name . "_year' onClick='neverYear()'>
				<option value=''>Year</option>";		

		for($i=2009; $i<=date("Y")+50; $i++)
		{
			$selected = "";
			if($i == $year)	$selected = "selected";
				$str .= "	<option value='" . $i . "' " . $selected . ">" . $i. "</option>";
		}
		if($year=="Never")	$selected = "selected";
		$str .= "	<option value='Never' " . $selected . ">Never</option>";
		$str .= "</select>";		
		return $str;
	}

?>

<script>
function deleteMyApplication(aid)
{
	var d=confirm("Are you still want to continue.");
	if(d)
	{
		$.post("seeker_dashboard_action.php",
                    {deleteApplication:aid},
                            function(data)
                            { 
                                alert("Record deleted.");
				window.location.reload(); 
                                 
                             }
                	);
	}
	else
	{
		return false;
	}
}

function profileDelete()
{
	var d=confirm("Are you still want to continue.");
	if(d)
	{ 
		return true;
		/*document.form1.method = "post";
		document.form1.action = "seeker_dashboard_action.php";
		document.form1.submit();*/
		/*$.post("seeker_dashboard_action.php",
                    {deleteProfile:1},
                            function(data)
                            { 
                               window.location.reload();
			     
                                 
                             }
                	);*/
	}
	else
	{
		return false;
	}
	
}


jQuery(document).ready(function(){ 
    // binds form submission and fields to the validation engine
    $( ".datepicker" ).datepicker();
    jQuery("#formID").validationEngine();
});
            
            /**
             *
             * @param {jqObject} the field where the validation applies
             * @param {Array[String]} validation rules for this field
             * @param {int} rule index
             * @param {Map} form options
             * @return an error string if validation failed
             */
            //function checkHELLO(field, rules, i, options){ alert("hi");
            //    if (field.val() != "HELLO") {  
            //        // this allows to use i18 for the error msgs
            //        return options.allrules.validate2fields.alertText;
            //    }
            //}
</script>


<!--End date picker-->



<script type="text/javascript">
$(function(){
	//var warning = $(".message");
	
	$("#showIndustryList").multiselect({ 
		header: "Choose only FIVE items!",
		click: function(e){
		
			if( $(this).multiselect("widget").find("input:checked").length > 5 ){
				//warning.addClass("error").removeClass("success").html("You can only check two checkboxes!");
				return false;
			} /*else {
				//warning.addClass("success").removeClass("error").html("Check a few boxes.");
			}*/
			
		}
	});
});

$(function(){
	//var warning = $(".message");
	
	$("#showIndustryList1").multiselect({ 
		header: "Choose only FIVE items!",
		click: function(e){
		
			if( $(this).multiselect("widget").find("input:checked").length > 5 ){
				//warning.addClass("error").removeClass("success").html("You can only check two checkboxes!");
				return false;
			} /*else {
				//warning.addClass("success").removeClass("error").html("Check a few boxes.");
			}*/
			
		}
	});
});

$(function(){
	var warning = $(".message");
	//alert(warning);
	$("#profession").multiselect({ 
		header: "Choose only FIVE items!",
		click: function(e){
	
			if( $(this).multiselect("widget").find("input:checked").length > 5 ){
				//warning.addClass("error").removeClass("success").html("You can only check two checkboxes!");
				return false;
			} /*else {
				warning.addClass("success").removeClass("error").html("Check a few boxes.");
			}*/
			
		}
	});
});

$(function(){
	//var warning = $(".message");
	
	$("#profession1").multiselect({ 
		header: "Choose only FIVE items!",
		click: function(e){
		
			if( $(this).multiselect("widget").find("input:checked").length > 5 ){
				//warning.addClass("error").removeClass("success").html("You can only check two checkboxes!");
				return false;
			} /*else {
				warning.addClass("success").removeClass("error").html("Check a few boxes.");
			}*/
			
		}
	});
});



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

</script>
<script type="text/javascript">
function changeContent(FieldName)
{
	var FieldValue= $("#"+FieldName).val();
        $.post("<?php echo $this->webroot; ?>candidate/edit_action", {FieldName:FieldName,FieldValue:FieldValue},
                       function(data)
                       { 
                           alert("Record updated successfully");
                            
		       }
                );
}

function changeFutureEmp()
{
      
       $.post("seeker_dashboard_action.php",
               {seeker_future_emp_keyword:$("#seeker_future_emp_keyword").val(),
                seeker_future_emp_level:$("#seeker_future_emp_level").val(),
                seeker_future_emp_type:$("#seeker_future_emp_type").val(),
                seeker_proffession:$("#profession1").val(),
                seeker_emp_industry:$("#showIndustryList1").val(),
                seeker_required_salary:$("#seeker_required_salary").val()
               
               },
                       function(data)
                       { 
                           alert(data);
                            
		       }
                );
}

function changeWorkHistory()
{
       
       
       
       
       
        $.post("seeker_dashboard_action.php",
               {seeker_work_history_title:$("#seeker_work_history_title").val(),
                seeker_work_history_company:$("#seeker_work_history_company").val(),
                seeker_current_level:$("#seeker_current_level").val(),
                seeker_salary:$("#seeker_salary").val(),
                seeker_work_history_profession:$("#profession").val(),
                seeker_work_history_industry:$("#showIndustryList").val(),
                seeker_work_history_duration_from_month:$("#seeker_work_history_duration_from_month").val(),
                seeker_work_history_duration_from_year:$("#seeker_work_history_duration_from_year").val(),
                seeker_work_history_duration_to_month:$("#seeker_work_history_duration_to_month").val(),
                seeker_work_history_duration_to_year:$("#seeker_work_history_duration_to_year").val()
               },
                       function(data)
                       { 
                           alert(data);
                            
		       }
                );
    
}

function switchOnOff(FieldName,FieldValue)
{
    
    $.post("seeker_dashboard_action.php",
               {FieldName:FieldName,FieldValue:FieldValue
               },
                       function(data)
                       { 
                            window.location.reload(); 
		       }
                );
    
   //
}


function changeEmail()
{
   
   var emailID=$.trim($("#seeker_email").val());
   
   if(echeck(emailID)==false)
	    {
		alert("Not a valid E-mail")
	    }
	 
      else if(emailID==($("#hdn_seeker_email").val()))
            {
               return false;
            }
          
          else
	    {
		 $.post("seeker_dashboard_action.php",
                    {seeker_email:$.trim($("#seeker_email").val())
                    },
                            function(data)
                            { 
                                alert(data);
                                 
                            }
                     );
	    }	
 
    
}
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    return false
		 }

 		 return true					
	}
	
	


function Checkfiles(id)
{
	
	var fup = document.getElementById(id);
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	
	if(fileName!="")
	{
		if(id=="seeker_picture_upload")
		{
			if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG")
				{
					return true;
				} 
				else
				{
				   alert("Invalid file format. Please upload photo  Gif or Jpg images only.");
				   fup.focus();
				   return false;
				}
		}
		else if(id=="seeker_family_video")
		{
			if(ext=="flv" || ext=="mp4" || ext=="m4a" || ext=="mp4v" || ext=="mov" || ext=="3gp" || ext=="3g2")
				{
					return true;
				} 
				else
				{
				   alert("Invalid file format. Please upload video in FLV , MOV , MP4 , M4A , MP4V , 3GP, 3G2 format only.");
				   fup.focus();
				   return false;
				}
		}
		else if(id=="seeker_cv")
		{
			if(ext=="doc" || ext=="docx")
				{
					return true;
				} 
				else
				{
				   alert("Invalid file format.Please upload CV in word document format only.");
				   fup.focus();
				   return false;
				}
		}
		else 	
		return false;
	}
	else
	{
		alert("Please select file to upload.");
		fup.focus();
		return false;
	}
}
	
	
</script>

<!-- Header for toggling section Start -->	
<section class="profile_main">
        <div class="profile_content">
            <h2>My Account</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
                <p class="come-join" ><?php echo $this->Session->Flash();?> </p>
                <div id="pageWrap" class="pageWrap">
                    <div class="pageContent">

  <!-- innercol-leftpan start-->
<p class="come-join" ><?php echo $this->Session->Flash();?> </p>

	 <? if(isset($_GET["msg"]) && $_GET["msg"]=="extFailvideo")
					{
				?>	
      <p class="error">Invalid file format. Please upload video in FLV , MOV , MP4 , M4A , MP4V , 3GP, 3G2 format only.</p>
      <?php } ?>
      <? if(isset($_GET["msg"]) && $_GET["msg"]=="extFail")
		{
	?>					
		<p class="error">Invalid file format.Please upload CV in word document format only.</p>
	<? 	} ?>
    
  
   
<p class="come-join" >Personal Information:</p>
 <div class="greyline"></div>
<?php echo $this->Form->create('CandidateProfile', array('inputDefaults' => array('label' => false)
                                   , 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
				   
				   
<div class="inpt_area">
    <label>Name:</label>
    <input type="text" name="name" id="name" value="<?php if(isset($rsseeker->seeker_name)) { echo $rsseeker->seeker_name; } ?>" />
</div>
<div class="inpt_area">
    <label>Surname:</label>
    <input type="text" name="seeker_surname" id="seeker_surname" value="<?php if(isset($rsseeker->seeker_surname)) { echo $rsseeker->seeker_surname; } ?>">
</div>
<div class="inpt_area">
    <label>Maiden Name:</label>
    <input type="text" name="seeker_maiden" id="seeker_maiden" value="<?php if(isset($rsseeker->seeker_maiden)) { echo $rsseeker->seeker_maiden; } ?>">
</div>
<!--<div class="inpt_area">
    <label>Title:</label>
    <?=$seeker_title_drop?>
</div>-->
<div class="inpt_area">
    <label>Date of birth:</label>
    <?=createDate("seeker",$seeker_seldate); ?>
</div>
<div class="inpt_area">
    <label>Gender :</label>
    <select name="seeker_gender" id="seeker_gender" style="width:185px;" >
        <option   value="">Select</option>
        <option <?php if(isset($rsseeker->seeker_gender) && $rsseeker->seeker_gender=="Male" ) echo ("selected='selected'"); ?> value="Male">Male</option>
        <option <?php if(isset($rsseeker->seeker_gender) && $rsseeker->seeker_gender=="Female" ) echo ("selected='selected'"); ?> value="Female">Female</option>
        <option <?php if(isset($rsseeker->seeker_gender) && $rsseeker->seeker_gender=="No" ) echo ("selected='selected'"); ?> value="No"> I don't want to provide this information</option>
    </select>

</div>

<p>
	Registered business address:
</p>
<div class="inpt_area">
    <label>Street:</label>
    <input type="text" name="business_street" id="business_street" value="<? if (isset($_POST['business_street'])) echo stripslashes($_POST['business_street']); else  echo ($rsseeker->seeker_business_street);  ?>">
</div>
<div class="inpt_area">
    <label>Number:</label>
    <input type="text" name="business_street_num" id="business_street_num" value="<? if (isset($_POST['business_street_num'])) echo stripslashes($_POST['business_street_num']); else  echo ($rsseeker->seeker_business_street_num);   ?>">
</div>
<div class="inpt_area">
    <label>Suburb:</label>
    <input type="text" name="business_suburb" id="business_suburb" value="<? if (isset($_POST['business_suburb'])) echo stripslashes($_POST['business_suburb']); else  echo ($rsseeker->seeker_business_suburb);   ?>">
</div>
<div class="inpt_area">
    <label>City or town:</label>
    <?=$city_dropbox?>
</div>
<div class="inpt_area">
    <label>Country:</label>
    <?=$country_drop?>
</div>

<p>Postal Address:</p>
<div class="inpt_area">
    <label>P O Box number:</label>
    <input type="text" name="postal_po_box" id="postal_po_box" value="<? if (isset($_POST['postal_po_box'])) echo stripslashes($_POST['postal_po_box']); else  echo($rsseeker->seeker_postal_po_box);   ?>">
</div>
<!--<div class="inpt_area">
    <label>Private bag number:</label>
    <input type="text" name="postal_private_bag" id="postal_private_bag" value="<? //if (isset($_POST['postal_private_bag'])) echo stripslashes($_POST['postal_private_bag']); else  echo($rsseeker->seeker_postal_private_bag); ?>">
</div>-->
<div class="inpt_area">
    <label>Postal code:</label>
    <input type="text" name="postal_post_code" id="postal_post_code" value="<? if (isset($_POST['postal_post_code'])) echo stripslashes($_POST['postal_post_code']); else  echo($rsseeker->seeker_postal_post_code); ?>">
</div>
<div class="inpt_area">
    <label>City or town:</label>
    <?=$postal_city_dropbox?>
</div>
<div class="inpt_area">
    <label>Country:</label>
    <?=$postal_country_drop?>
</div>
<div class="inpt_area">
    <label>Candidate City or town:</label>
    <input type="text" name="seeker_city" value="<? if (isset($_POST['seeker_city'])) echo stripslashes($_POST['seeker_city']); else echo($rsseeker->seeker_city);?>">
</div>
<!--<div class="inpt_area">
    <label>Drivers license code:</label>
    <input type="text" name="seeker_city" value="<? //if (isset($_POST['seeker_city'])) echo stripslashes($_POST['seeker_city']); else echo($rsseeker->seeker_city);?>">
</div>
<div class="inpt_area">
    <label>Drivers license restrictions:</label>
    <?php //echo $seeker_license_restriction_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Drivers license Endorsements:</label>
   <?php //echo $seeker_license_endorsements_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Professional authority endorsements:</label>
    <?php echo $seeker_professional_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Drivers license no:</label>
    <input name="seeker_license_no" type="text" value="<? if (isset($_POST['seeker_license_no'])) echo stripslashes($_POST['seeker_license_no']); else echo($rsseeker->seeker_license_no);?>" maxlength="15">
</div>
<div class="inpt_area">
    <label>License expiry:</label>
    <?=createDateLicence("seeker_license",$seeker_sellicensedate); ?>
</div>
<div class="inpt_area">
    <label>date Identity Number:</label>
    <input name="seeker_indentity_no" type="text" value="<? if (isset($_POST['seeker_indentity_no'])) echo stripslashes($_POST['seeker_indentity_no']); else echo($rsseeker->seeker_indentity_no); ?>" maxlength="15">
</div>
<div class="inpt_area">
    <label>Criminal Record:</label>
	<select name="seeker_criminal">
		<option value="No" <? if(isset($_POST["seeker_criminal"]) && $_POST["seeker_criminal"]=="No") echo("selected"); else if($rsseeker->seeker_criminal=="No") echo("selected");?>>No</option>
		<option value="Yes" <? if(isset($_POST["seeker_criminal"]) && $_POST["seeker_criminal"]=="Yes") echo("selected"); else if($rsseeker->seeker_criminal=="Yes") echo("selected");?>>Yes</option>
		<option value="Not Provided" <? if(isset($_POST["seeker_criminal"]) && $_POST["seeker_criminal"]=="Not Provided") echo("selected"); else if($rsseeker->seeker_criminal=="Not Provided") echo("selected");?>>I do not want to provide this information</option>
	</select>
</div>-->
<p>Contact Information</p>
<div class="inpt_area">
    <label>Telephone Number </label>
    <input name="seeker_phone" type="text" id="seeker_telno" value="<? if (isset($_POST['seeker_phone'])) echo stripslashes($_POST['seeker_phone']); else echo($rsseeker->seeker_phone); ?>" maxlength="15">
</div>
<div class="inpt_area">
    <label>Cell phone number</label>
    <input name="seeker_mobile" type="text" value="<? if (isset($_POST['seeker_mobile'])) echo stripslashes($_POST['seeker_mobile']); else echo($rsseeker->seeker_mobile); ?>" maxlength="15">
</div>
<div class="inpt_area">
    <label>Email address</label>
    <input name="seeker_email" type="text" onblur="checkMail('email_exists');" value="<? if (isset($_POST['seeker_email'])) echo stripslashes($_POST['seeker_email']); else echo($rsseeker->seeker_email);?>" size="50">
</div>
<div class="inpt_area">
    <label>Web address </label>
    <input name="seeker_web" type="text" value="<? if (isset($_POST['seeker_web'])) echo stripslashes($_POST['seeker_web']); else echo($rsseeker->seeker_web); ?>" size="50">
</div>
<!--<p>Login Information </p>
<div class="inpt_area">
    <label>Old Password </label>
    <input name="seeker_oldpassword" type="password" id="seeker_oldpassword"  >
</div>
<div class="inpt_area">
    <label>New Password </label>
    <input name="seeker_password" type="password" id="seeker_password" >
    <br><input type="password" name="seeker_confirmpassword" >Confirm new password 
</div>-->

<!--<div class="inpt_area">
    <label>Description</label>
    <input type="text" name="seeker_summary" id="seeker_summary" value="<?php echo $rsseeker->seeker_summary; ?>">
</div>

<div class="inpt_area">
    <label>Highest Education level:</label>
    <?php //echo $ter_qualification_drop; ?>

</div>-->

<!--<div class="inpt_area">
    <label>Current / last position title:</label>
    <input type="text" name="seeker_work_history_title" id="seeker_work_history_title" value="<?php echo $rsseeker->seeker_work_history_title; ?>">

</div>

<div class="inpt_area">
    <label>Company:</label>
    <input type="text" name="seeker_work_history_company" id="seeker_work_history_company" value="<?php echo $rsseeker->seeker_work_history_company; ?>">
</div>

<div class="inpt_area">
    <label>Since:</label>
    <?=createDateMonthYear("seeker_work_history_duration_from",$rsseeker->seeker_work_history_duration_from); ?>&nbsp;<b>to</b><br>
        <?=createDateMonthYearTo("seeker_work_history_duration_to",$rsseeker->seeker_work_history_duration_to); ?>
</div>

<div class="inpt_area">
    <label>Level:</label>
    <input type="text" name="seeker_current_level" id="seeker_current_level" value="<?php echo $rsseeker->seeker_current_level; ?>">
</div>
<div class="inpt_area">
    <label>Occupation:</label>
    <?php echo $occupation_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Industry:</label>
    <?php echo $industry_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Annual salary:</label>
    <input type="text" name="seeker_salary" id="seeker_salary" value="<?php echo $rsseeker->seeker_salary; ?>">
</div>-->
<!--<div class="inpt_area">
    <p class="come-join" >Future position(s)</p>
</div>
<div class="inpt_area">
    <label>Keywords:</label>
  <input type="text" name="seeker_future_emp_keyword" id="seeker_future_emp_keyword" value="<?php echo $rsseeker->seeker_future_emp_keyword; ?>">
</div>
<div class="inpt_area">
    <label>Level:</label>
    <input type="text" name="seeker_future_emp_level" id="seeker_future_emp_level" value="<?php echo $rsseeker->seeker_future_emp_level; ?>">
</div>
<div class="inpt_area">
    <label>Occupation:</label>
    <?php echo $future_occupation_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Industry:</label>
    <?php echo $future_industry_dropbox; ?>
</div>
<div class="inpt_area">
    <label>Type(s):</label>
    <input type="text" name="seeker_future_emp_type" id="seeker_future_emp_type" value="<?php echo $rsseeker->seeker_future_emp_type; ?>">
</div>
<div class="inpt_area">
    <label>Required annual salary:</label>
    <input type="text" name="seeker_required_salary" id="seeker_required_salary" value="<?php echo $rsseeker->seeker_required_salary; ?>">
</div>-->


<!--  <p class="come-join" >Availability:</p>

<div class="inpt_area">
    <label>E-mail address: <input type="hidden" name="hdn_seeker_email" id="hdn_seeker_email" value="<?php echo $rsseeker->seeker_email; ?>"></label>
    <input type="text" name="seeker_email" id="seeker_email" value="<?php echo $rsseeker->seeker_email; ?>">

</div>

<div class="inpt_area">
    <label>Telephone:</label>
   <input type="text" name="seeker_mobile" id="seeker_mobile" value="<?php echo $rsseeker->seeker_mobile; ?>">

</div>

<div class="inpt_area">
    <label>Drivers licence code:</label>
    <input type="text" name="seeker_license_code" id="seeker_license_code" value="<?php echo $rsseeker->seeker_license_code; ?>">

</div>-->
    
<p class="come-join" >Company Banner Detail</p>
 <div class="greyline"></div>

<div class="inpt_area">
    <label>Upload video thumb Image (size 705*370)</label>
    <input type="file" name="can_video_thumb">
        <?php if(isset($profile->can_video_thumb)) { echo $profile->can_video_thumb; }?>
</div>
<div class="inpt_area">
    <label>Youtube Video url </label>
    <input type="text" name="can_video_url" value="<?php if(isset($profile->can_video_url)) { echo $profile->can_video_url; }?>">
</div>

<p class="come-join" >My uploads:</p>

<div class="inpt_area">
   <label>Picture:</label>
    <input type="file" name="seeker_picture_upload" id="seeker_picture_upload">
    <input type="hidden" name="up_photo" value="<?=$rsseeker->seeker_photo ?>">
    <input type="hidden" name="seeker_name" value="<?=$rsseeker->seeker_name ?>">
    </div>
<div class="inpt_area">
    <label>Video:</label>
    <input type="file" name="seeker_family_video" id="seeker_family_video">
    <input type="hidden" name="up_video" id="up_video" value="<?=$rsseeker->seeker_family_video ?>">
</div>
<!--<div class="inpt_area">
    <label>Curriculum Vitae:</label>
    <input type="file" name="seeker_cv" id="seeker_cv">
    <input type="hidden" name="up_cv" id="up_cv" value="<?=$rsseeker->seeker_cv ?>">
</div>
<div class="inpt_area">
    <label>Qualifications:</label>
    <input type="file" name="seeker_qualification_doc" id="seeker_qualification_doc">
    <input type="hidden" name="up_qualification" value="<?=$rsseeker->seeker_qualification_doc ?>">
   
</div>-->
<div class="inpt_area">
    <label>Portfolio:</label>
    <input type="file" name="seeker_service_doc" id="seeker_service_doc">
    <input type="hidden" name="up_service" value="<?=$rsseeker->seeker_service_doc ?>">
  
</div>
<div class="inpt_area">
    <label>Other:</label>
    <input type="file" name="seeker_other_doc1" id="seeker_other_doc1">
	<input type="hidden" name="up_other1" value="<?=$rsseeker->seeker_other_doc1 ?>">
  
</div>

<p class="come-join" >Summary</p>
 <div class="greyline"></div>
<div class="inpt_area">
    <label>Career Summary</label>
    <textarea rows="3" cols="4" name="career_summary">
        <?php if(isset($profile->career_summary)) { echo trim($profile->career_summary); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Video Summary</label>
    <textarea rows="3" cols="4" name="video_summary">
        <?php if(isset($profile->video_summary)) { echo trim($profile->video_summary); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Photo Summary</label>
    <textarea rows="3" cols="4" name="photo_summary">
        <?php if(isset($profile->photo_summary)) { echo trim($profile->photo_summary); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Forum Summary</label>
    <textarea rows="3" cols="4" name="forum_summary">
        <?php if(isset($profile->forum_summary)) { echo trim($profile->forum_summary); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Link/Articles Summary</label>
    <textarea rows="3" cols="4" name="link_summary">
        <?php if(isset($profile->link_summary)) { echo trim($profile->link_summary); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Message Summary</label>
    <textarea rows="3" cols="4" name="message_summary">
        <?php if(isset($profile->message_summary)) { echo trim($profile->message_summary); }?>
    </textarea>
</div>
<div class="inpt_area">
<input type="hidden" name="id" value="<?php if(isset($rsseeker->id)){ echo $rsseeker->id; } ?>" >
<input type="hidden" name="pro_id" value="<?php if(isset($profile->id)){ echo $profile->id; } ?>" >
   <input class="blue_btn pull-right" type="submit" name="submit" value="Submit" />
</div>
                        </form>
<div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
</section>
   
    
<script language="javascript">
	$('#clickme').click(function() {$('#acc_detail').show('slow');});
	$('#hideme').click(function() {$('#acc_detail').hide('slow');});
	
	$('#unreadView').click(function() {$('#unreadMsg').show('slow');});
	$('#unreadHide').click(function() {$('#unreadMsg').hide('slow');});
	
	$('#readView').click(function() {$('#readMsg').show('slow');});
	$('#readHide').click(function() {$('#readMsg').hide('slow');});
	
function showUnread(id)
        {
		$('#seeUnread'+id).show('slow');
		
		$.post("seeker_dashboard_action.php", {makeAsRead:1,msg_id:id},
                       function(data)
                       { 
                            //alert("Record updated successfully");
		       });
	}
function closeUnread(id)
        {
		$('#seeUnread'+id).hide('slow');
	}
	
function showRead(id)
        {
		$('#seeRead'+id).show('slow');
		
	}
function closeRead(id)
        {
		$('#seeRead'+id).hide('slow');
	}	
	
function followEmp(eid)
          {
		 if($('#'+eid).is(':checked')==true)
		 {
		    
		     var followEmp=$('#followEmp').html();
		     $('#followEmp').html(parseFloat(followEmp)+1);
		     
		     $.post("seeker_dashboard_action.php", {opertation:1,emp_id:eid},
                       function(data)
                       { 
                           //alert(data);
                            alert("Record updated successfully");
		       }
                );
		     
		     
		     
		 }
		 else
		 {
		     var followEmp=$('#followEmp').html();
		     $('#followEmp').html(parseFloat(followEmp)-1);
		     $.post("seeker_dashboard_action.php", {opertation:0,emp_id:eid},
                       function(data)
                       { 
                           //alert(data);
			   alert("Record updated successfully");
                            
		       }
		        );
		 }
	  }
</script>    

