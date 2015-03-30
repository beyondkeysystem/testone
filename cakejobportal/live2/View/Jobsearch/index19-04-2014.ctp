
<!--<script src="../javascript/init.js" type="text/javascript" charset="utf-8"></script>-->
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
<!--<link rel="stylesheet" type="text/css" href="../styles/job.css">
<script src="../javascript/job.js" language="javascript"></script>-->
<script language="javascript" type="text/javascript">
 function submitform()
 {
 		if(document.form1.vacancy.value =="")
		{
			alert("Please enter Job type.");
			document.form1.vacancy.focus();
			return false;
		}
		//if(document.form1.seeker_salary_from.value !="")
		//{
		//	flag = checkNumber("Please enter numbers only in salary range.",document.form1.seeker_salary_from);
		//	if(flag == false) return false;
		//}
		//
		//if(document.form1.seeker_salary_to.value !="")
		//{
		//	flag = checkNumber("Please enter numbers only in salary range.",document.form1.seeker_salary_to);
		//	if(flag == false) return false;
		//}
		//if(document.form1.seeker_salary_from.value !="" &&  document.form1.seeker_salary_to.value !="")
		//{
		//		if(document.form1.seeker_salary_from.value > document.form1.seeker_salary_to.value )
		//		{
		//			alert("please enter salary to range greater than salary from range.");
		//			document.form1.seeker_salary_to.focus();
		//			return false;
		//		}
		//}		
		document.form1.method="post";
		document.form1.action="<?php echo $this->webroot; ?>Jobsearch/jobSearchAction";
		document.form1.submit();
		return true;
	
 }

function submitadvform()
 {
    
    document.advance.method="post";
    document.advance.action="<?php echo $this->webroot; ?>Jobsearch/jobSearchAction";
    document.advance.submit();
    return true;	
 } 
</script>

<section class="profile_main">
          <div class="profile_content">
            <h2>Job Search</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
              <p class="come-join">Come Join and be a part of Recruit Young?s Online Community, where we hope to <span class="yellow-txt">inspire, innovate, </span>and <span class="yellow-txt">Empower Youth.</span></p>
              <div class="greyline"></div>
             
              <div id="pageWrap" class="pageWrap">
                <div class="pageContent">
                <h2 class="blue-heading">Take the next steps right now to finding your dream job or career!</h2>
                  <div class="white-div">
		    <form name="form1" action="<?php echo $this->webroot; ?>Jobsearch/jobSearchAction" method="post" >
			<div class="inpt_area">
                          <label for="key_word">Keywords or References</label>
                          <input type="text" name="company_name" id="company_name" value="<?php if(isset($company_name)) echo $company_name;?>">
			</div>
			<div class="inpt_area">
			    <label for="location">Location</label>
			    <input type="text" value="" name="seeker_jobcity" id="locations">
			   <?php //echo $seeker_jobcity_drop; ?>
                        </div>
                     <div class="inpt_area">
                         <div class="list-row">
                            <div class="salary">
                             <label>Salary Range</label>
                              <select class="select" name="salary_range" id="salary_range" tabindex="1">
                                <option value="">Select</option>
                                <option value="15000-20000">15000-20000</option>
                                <option value="20000-25000">20000-25000</option>
                                <option value="25000-30000">25000-30000</option>
                              </select>
                            </div>
                            <div class="salary">
                             <label>Job Type</label>
                              <select class="select" name="vacancy" id="vacancy" tabindex="1">
				<option value="">Select</option>
				<option value="Permanent Position" <?php if(isset($vacancy) AND trim($vacancy)=="Permanent Position"){ echo "selected";} ?> ><?=Configure::read('PERMANENT_POSITION')?></option>
				<option value="Temporary Position" <?php if(isset($vacancy) AND trim($vacancy)=="Temporary Position"){ echo "selected";} ?> ><?=Configure::read('TEMPORARY_POSITION')?></option>
				<option value="Part-time Job Ad" <?php if(isset($vacancy) AND trim($vacancy)=="Part-time Job Ad"){ echo "selected";} ?> ><?=stripslashes(Configure::read('PARTTIME_JOB_AD'))?></option>
				<option value="Job attachment Position" <?php if(isset($vacancy) AND trim($vacancy)=="Job attachment Position"){ echo "selected";} ?> ><?=Configure::read('JOB_ATTACHMENT_POSITION'); ?></option>
                              </select>
                            </div>
                            <div class="salary">
				 <a href="#" onClick="submitform();" class="imgcss">
				  <input type="button" class="blue_btn"  value="Search"/>
				 </a>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
		     </form>
		      <div class="advance_search">
                        	<div class="heading">Need Further Options?  Go to <a class="button-dropdown" href="javascript:void(0);"><span>Advanced Search</span>
				<i class="fa fa-fw">?</i></a></div>
                            <div class="ad-div">
				<form name="advance" action="" id="advance">
                            	<h2>Advance search</h2>
				<div class="inpt_area">
                                      <label for="key_word">Keywords</label>
				      <input type="hidden" value="1" name="advance" id="key_word">
                                      <input type="text" value="" name="company_name" id="key_word">
                                </div>
                                <div class="inpt_area">
                                      <label for="location">Location</label>
                                      <input type="text" value="" name="seeker_jobcity" id="location">
                                </div>
                                <div class="inpt_area">
                                      <label for="job_type">Job Type</label>
                                      <select class="select" tabindex="1" name="vacancy">
					    <option value="">Select</option>
					    <option value="Permanent Position" <?php if(isset($vacancy) AND trim($vacancy)=="Permanent Position"){ echo "selected";} ?> ><?=Configure::read('PERMANENT_POSITION')?></option>
					    <option value="Temporary Position" <?php if(isset($vacancy) AND trim($vacancy)=="Temporary Position"){ echo "selected";} ?> ><?=Configure::read('TEMPORARY_POSITION')?></option>
					    <option value="Part-time Job Ad" <?php if(isset($vacancy) AND trim($vacancy)=="Part-time Job Ad"){ echo "selected";} ?> ><?=stripslashes(Configure::read('PARTTIME_JOB_AD'))?></option>
					    <option value="Job attachment Position" <?php if(isset($vacancy) AND trim($vacancy)=="Job attachment Position"){ echo "selected";} ?> ><?=Configure::read('JOB_ATTACHMENT_POSITION'); ?></option>
                                        </select>
                                </div>
                                <div class="inpt_area">
                                     <div class="list-row">
                                        <div class="salary">
                                         <label>Ignore / withhold</label>
                                         <input type="text" value="" name="hold" />
                                         <p>Skills/Job Title/ Location/Job description</p>
                                        </div>
                                        <div class="salary pull-right">
                                         <label>Job Title</label>
                                          <select class="select" tabindex="1" name="holdfield">
					    <option value="">Select</option>
					    <option value="town">Location</option>
					    <option value="company_name">Company</option>
					  </select>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>
                                </div>
                                <div class="inpt_area">
                                	  <label class="sal" for="salary">Salary</label>
                                	  <input type="radio" name="off_package4" value="Annual" id="radio1" class="css-checkbox" />
                                        <label for="radio1" class="css-label">Annual</label>
                                        <input type="radio" name="off_package4" value="Monthly" id="radio2" class="css-checkbox" />
                                        <label for="radio2" class="css-label">Monthly</label>
                                </div>
                                <div class="inpt_area">
                                     <div class="list-row">
                                        <div class="salary-range">
                                          <select class="select" tabindex="1" name="seeker_salary_from">
                                            <option value="">Minimum Salary</option>
                                            <option value="15000">15000</option>
                                            <option value="20000">20000</option>
                                            <option value="25000">25000</option>
                                            <option value="30000">30000</option>
                                            <option value="35000">35000</option>                                                                                        
                                          </select>
                                        </div>
                                        <div class="salary-range">
                                          <select class="select" tabindex="1" name="seeker_salary_to">
                                            <option value="">Maximum Salary</option>
                                            <option value="20000">20000</option>
                                            <option value="25000">25000</option>
                                            <option value="30000">30000</option>
                                            <option value="35000">35000</option>
                                            <option value="40000">40000</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>
                                  </div>
                                  <div class="inpt_area">
                                          <label>Sectors</label>
                                          <div class="list-row">
                                            <div class="">
					    <p style="text-align: justify;">
					    <input type="checkbox" name="department[]" value="Accounting"  <?php if(isset($department) AND trim($department)=="Accounting"){ echo "selected";} ?> >&nbsp; Accounting &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Automotive" <?php if(isset($department) AND trim($department)=="Automotive"){ echo "selected";} ?> >&nbsp; Automotive &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="TeleCommunications"  <?php if(isset($department) AND trim($department)=="TeleCommunications"){ echo "selected";} ?> >&nbsp; TeleCommunications &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Aviation" <?php if(isset($department) AND trim($department)=="Aviation"){ echo "selected";} ?> >&nbsp; Aviation &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Banking & Finance"  <?php if(isset($department) AND trim($department)=="Banking & Finance"){ echo "selected";} ?> >&nbsp; Banking & Finance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Charity & Voluntary Work" <?php if(isset($department) AND trim($department)=="Charity & Voluntary Work"){ echo "selected";} ?> >&nbsp; Charity & Voluntary Work &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Construction"  <?php if(isset($department) AND trim($department)=="Construction"){ echo "selected";} ?> >&nbsp; Construction &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="department[]" value="Consultancy" <?php if(isset($department) AND trim($department)=="Consultancy"){ echo "selected";} ?> >&nbsp; Consultancy &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Insurance" <?php if(isset($department) AND trim($department)=="Insurance"){ echo "selected";} ?> >&nbsp; Insurance &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Marketing" <?php if(isset($department) AND trim($department)=="Marketing"){ echo "selected";} ?> >&nbsp; Marketing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Information Technology" <?php if(isset($department) AND trim($department)=="Information Technology"){ echo "selected";} ?> >&nbsp; Information Technology &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Human Resources" <?php if(isset($department) AND trim($department)=="Human Resources"){ echo "selected";} ?> >&nbsp; Human Resources &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Training" <?php if(isset($department) AND trim($department)=="Training"){ echo "selected";} ?> >&nbsp; Training &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Education" <?php if(isset($department) AND trim($department)=="Education"){ echo "selected";} ?> >&nbsp; Education &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Electronics" <?php if(isset($department) AND trim($department)=="Electronics"){ echo "selected";} ?> >&nbsp; Electronics &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Recruitment" <?php if(isset($department) AND trim($department)=="Recruitment"){ echo "selected";} ?> >&nbsp; Recruitment &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Retail" <?php if(isset($department) AND trim($department)=="Retail"){ echo "selected";} ?> >&nbsp; Retail &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Sales" <?php if(isset($department) AND trim($department)=="Sales"){ echo "selected";} ?> >&nbsp; Sales &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Public Sector" <?php if(isset($department) AND trim($department)=="Public Sector"){ echo "selected";} ?> >&nbsp; Public Sector &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Oil and Gas" <?php if(isset($department) AND trim($department)=="Oil and Gas"){ echo "selected";} ?> >&nbsp; Oil and Gas &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Military" <?php if(isset($department) AND trim($department)=="Military"){ echo "selected";} ?> >&nbsp; Military &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="department[]" value="Media" <?php if(isset($department) AND trim($department)=="Media"){ echo "selected";} ?> >&nbsp; Media &nbsp;&nbsp;&nbsp;&nbsp;
	    </p>
					    </div>
                                            <div class="clearfix"></div>
                                          </div>
                                  </div>
                                  <!--div class="inpt_area">
                                      <label for="key_word">Date Posted</label>
                                      <input type="text" value="" name="" id="key_word">
                                </div-->
                                <div class="inpt_area">
                                      <label for="location">Vacancy Ad References</label>
                                      <input type="text" value="" name="preference" id="vacancy">
                                </div>
                                <div class="inpt_area">
				    <a href="#" onClick="submitadvform();" class="imgcss">
                                <input type="submit" value="Search" name="" class="blue_btn pull-right">
				    </a>
                                </div>
				</form>
				<div class="clearfix"></div>
                            </div>
                        </div>
		  </div>
		  <div class="clearfix"></div>
		  </div>
	    </div>
            </div>
          </div>
        </section>