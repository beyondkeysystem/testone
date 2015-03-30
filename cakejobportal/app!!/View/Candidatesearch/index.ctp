<script language="javascript" type="text/javascript">
function search_jobseekers()
{
    /*if(document.form1.vacancy.value == "")
    {
	alert("Please enter seeker type.");
	document.form1.vacancy.focus();
	return false;
    }    */
    document.form1.method = "post";
    document.form1.action = "<?php echo $this->webroot; ?>Candidatesearch/candidateSearchAction";
    document.form1.submit();
}
</script>
  
  <section class="profile_main">
          <div class="profile_content">
            <h2>Candidate Search</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
              <p class="come-join">The Possibilites are endless when you recruit the  <span class="yellow-txt">Right Candidate(s)</span></p>
              <div class="greyline"></div>
             
              <div id="pageWrap" class="pageWrap">
                <div class="pageContent">
                <h2 class="blue-heading">Find your ideal employee(s)</h2>
                  <div class="white-div">
		    <form name="form1" action="<?php echo $this->webroot; ?>Jobsearch/jobSearchAction" method="post">
                  	<div class="inpt_area">
                          <label for="key_word">Keywords or Candidate?s Username</label>
                          <input type="text" value="" name="keywords" id="key_word">
                    </div>
                    <div class="inpt_area">
                          <label for="location">Location</label>
                          <input type="text" value="" name="seeker_jobcity" id="location">
                    </div>
                    
                        <div class="advance_search">
                        	<div class="heading candi-left">Need Further Options?  Go to <a class="button-dropdown" href="javascript:void(0);"><span>Advanced Search</span><i class="fa fa-fw">?</i></a></div> 
			<div class="salary candi-right">
                              <input type="button" class="blue_btn" onclick="search_jobseekers();" value="Search"/>
                            </div>
			</div>
			    <div class="clearfix"></div>
                            <div class="ad-div">
                            	<h2>Advance search</h2>
                                <div class="inpt_area">
                                      <label for="key_word">Keywords or Candidates Username</label>
                                      <input type="text" value="" name="keywords2" id="key_word2">
                                </div>	
                      
                                <div class="inpt_area">
                                     <div class="list-row">
                                        <div class="salary">
                                         <label>Location</label>
                                         <input type="text" value="" name="seeker_jobcity2" />
    
                                        </div>
                                        <div class="salary pull-right">
                                         <label>With in</label>
                                          <select class="select" tabindex="1">
                                            <option value="">Select</option>
                                            <option value="1">20 miles</option>
                                            <option value="1">30 miles</option>
                                            <option value="1">40 miles</option>
                                            <option value="1">50 miles</option>
                                            <option value="1">60 miles</option>
                                          </select>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div>
                                </div>
                                <div class="inpt_area">
                                      <label for="job_type">Skill Set(s)</label>
                                      <input type="text" placeholder="Excel, Word, Customer Service" name="skill" id="job_type">
                                </div>
																																
																																<div class="inpt_area">
                                      <label for="job_type">Language(s)</label>
                                      <input type="text" placeholder="English, German" name="language" id="language">
                                </div>
																																
																																
																									<div class="inpt_area">
                          <label for="l_name">Sector</label>
                          <div class="list-row full-width">
                            <div class="date">
                             <p style="text-align: justify;">
	    <input type="checkbox" name="seeker_employer_position[]" value="Accounting"  <?php if(isset($department) AND trim($department)=="Accounting"){ echo "selected";} ?> >&nbsp; Accounting &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="seeker_employer_position[]" value="Automotive" <?php if(isset($department) AND trim($department)=="Automotive"){ echo "selected";} ?> >&nbsp; Automotive &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="TeleCommunications"  <?php if(isset($department) AND trim($department)=="TeleCommunications"){ echo "selected";} ?> >&nbsp; TeleCommunications &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="seeker_employer_position[]" value="Aviation" <?php if(isset($department) AND trim($department)=="Aviation"){ echo "selected";} ?> >&nbsp; Aviation &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Banking & Finance"  <?php if(isset($department) AND trim($department)=="Banking & Finance"){ echo "selected";} ?> >&nbsp; Banking & Finance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="seeker_employer_position[]" value="Charity & Voluntary Work" <?php if(isset($department) AND trim($department)=="Charity & Voluntary Work"){ echo "selected";} ?> >&nbsp; Charity & Voluntary Work &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Construction"  <?php if(isset($department) AND trim($department)=="Construction"){ echo "selected";} ?> >&nbsp; Construction &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="seeker_employer_position[]" value="Consultancy" <?php if(isset($department) AND trim($department)=="Consultancy"){ echo "selected";} ?> >&nbsp; Consultancy &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Insurance" <?php if(isset($department) AND trim($department)=="Insurance"){ echo "selected";} ?> >&nbsp; Insurance &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Marketing" <?php if(isset($department) AND trim($department)=="Marketing"){ echo "selected";} ?> >&nbsp; Marketing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Information Technology" <?php if(isset($department) AND trim($department)=="Information Technology"){ echo "selected";} ?> >&nbsp; Information Technology &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Human Resources" <?php if(isset($department) AND trim($department)=="Human Resources"){ echo "selected";} ?> >&nbsp; Human Resources &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Training" <?php if(isset($department) AND trim($department)=="Training"){ echo "selected";} ?> >&nbsp; Training &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Education" <?php if(isset($department) AND trim($department)=="Education"){ echo "selected";} ?> >&nbsp; Education &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Electronics" <?php if(isset($department) AND trim($department)=="Electronics"){ echo "selected";} ?> >&nbsp; Electronics &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Recruitment" <?php if(isset($department) AND trim($department)=="Recruitment"){ echo "selected";} ?> >&nbsp; Recruitment &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Retail" <?php if(isset($department) AND trim($department)=="Retail"){ echo "selected";} ?> >&nbsp; Retail &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Sales" <?php if(isset($department) AND trim($department)=="Sales"){ echo "selected";} ?> >&nbsp; Sales &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Public Sector" <?php if(isset($department) AND trim($department)=="Public Sector"){ echo "selected";} ?> >&nbsp; Public Sector &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Oil and Gas" <?php if(isset($department) AND trim($department)=="Oil and Gas"){ echo "selected";} ?> >&nbsp; Oil and Gas &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Military" <?php if(isset($department) AND trim($department)=="Military"){ echo "selected";} ?> >&nbsp; Military &nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="checkbox" name="seeker_employer_position[]" value="Media" <?php if(isset($department) AND trim($department)=="Media"){ echo "selected";} ?> >&nbsp; Media &nbsp;&nbsp;&nbsp;&nbsp;
	    </p>
                            </div>
                          </div>  
                        </div>
                                    <!--div class="inpt_area">
                                     <div class="list-row">
                                        <div class="salary">
                                         <label>Ignore / withhold</label>
                                         <input type="text" value="" name="hold" />
                                         <p class="skill">Skills/Job Title/ Location/Job description</p>
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
                          </div-->
			<div class="inpt_area">
                          <label for="l_name">Profile Update</label>
                          <div class="list-row full-width">
                            <div class="date">
                              <select class="select" tabindex="1" name="cv_posted">
                                <option value="7">in last 7 days</option>
				<option value="30">in month</option>                               
                              </select>
                            </div>
                          </div>  
                        </div>
			<div class="inpt_area">
                          <label for="l_name">Education</label>
                          <div class="list-row full-width">
                            <div class="date">
                             <input type="text" placeholder="BTech, MCA" name="seeker_education" id="job_type">
			     
                            </div>
                          </div>  
                        </div>
			        <div class="inpt_area">
                                <input type="button" value="Search" onclick="search_jobseekers();" name="" class="blue_btn pull-right">
                                </div>
                                <div class="clearfix"></div>
                            </div>
			    </form>
                        </div>
																								
																								<div class="clearfix"></div>
																								
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>