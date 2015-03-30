
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
			alert("Please enter vacancy.");
			document.form1.vacancy.focus();
			return false;
		}
		if(document.form1.seeker_salary_from.value !="")
		{
			flag = checkNumber("Please enter numbers only in salary range.",document.form1.seeker_salary_from);
			if(flag == false) return false;
		}
		
		if(document.form1.seeker_salary_to.value !="")
		{
			flag = checkNumber("Please enter numbers only in salary range.",document.form1.seeker_salary_to);
			if(flag == false) return false;
		}
		if(document.form1.seeker_salary_from.value !="" &&  document.form1.seeker_salary_to.value !="")
		{
				if(document.form1.seeker_salary_from.value > document.form1.seeker_salary_to.value )
				{
					alert("please enter salary to range greater than salary from range.");
					document.form1.seeker_salary_to.focus();
					return false;
				}
		}		
		document.form1.method="post";
		document.form1.action="/cakejobportal/Jobsearch/jobSearchAction";
		document.form1.submit();
		return true;
	
 }
 
</script>

<div id="body-cntent">
  <div class="wrapper">
  <div class="job-search-box">

<div class="innercol-leftpan fleft">
     <p class="clear"></p>
	<div class="innercol-mid">
	    <div class="content-inner">
		<!--<h1><?//=JOBSEEKERS?></h1>-->
		<div class="inner-content">
                   
		 <table width="661" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
         <td class="">
<form name="form1" action="" method="post" >
		 	<!-- Page Body Start-->		
				<table width="100%" border="0" cellspacing="0" cellpadding="4">
					
					<tr>
						<td width="661">
							<table  align="left" cellpadding="0" cellspacing="0" border="0" width="98%" >
								
								
								<tr>
									<td colspan="2" class="headingRegister" ><?=Configure::read('JOB_SEARCH')?></td>
								</tr>	
								
								<tr>
								  <td colspan="2" valign="top" >							    <br>
								    <br>							      </td>
								</tr>
								<tr>
									<td class="sectionheading" ><?=Configure::read('SEARCH_INFORMATION')?></td>
								    <td class="comment_big" ><!--<a href="../index.php" class="link_green"><?=Configure::read('SEARCH_AGAIN')?> &gt; </a>--></td>
								</tr>
								<tr>
									<td colspan="2"><img src="<?php echo $this->webroot; ?>images/line.gif" width="630"></td>
								</tr>
								<tr>
								<td colspan="2"><br>
								<table width="100%" cellpadding="5" cellspacing="0">										  
								  <?php
									  if(isset($_GET['msg']) && $_GET['msg'] == "not_found")
									  {
								  ?>
								  <tr>
									<td colspan="4"><table width="100%" cellpadding="2" cellspacing="0">
									  <tr>
										<td width="5%" rowspan="3"><img src="<?php echo $this->webroot; ?>images/redcross.gif" align="absmiddle"></td>
										<td width="95%" class="star"><?=Configure::read('NO_JOBS_FOUND')?> </td>
									  </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table></td>
								  </tr>
								  <?php
									  }
								  ?>
							  </table>
								<table width="100%" cellpadding="5" cellspacing="0">										  
								  <?php
									  if(isset($not_found))
									  {
								  ?>
								  <tr>
									<td colspan="4"><table width="100%" cellpadding="2" cellspacing="0">
									  <tr>
										<td width="5%" rowspan="3"><img src="<?php echo $this->webroot; ?>images/redcross.gif" align="absmiddle"></td>
										<td width="95%" class="star"><?php echo $not_found; ?> </td>
									  </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table></td>
								  </tr>
								  <?php
									  }
								  ?>
							  </table>
								
								
								
								</td>
								</tr>
								
								<tr>
								  <td colspan="2" >
									<table cellpadding="5" cellspacing="0" border="0" width="95%" align="center">
											<tr>
												<td width="24%"  ><?=Configure::read('VACANCY')?></td>
										        <td colspan="2"  ><span class="comment">
                                                                                         <?php if(isset($_REQUEST['vacancy'])) {  $vacancy = $_REQUEST['vacancy']; } ?>
										          <select name="vacancy" id="vacancy" onChange='vacancy_type(this);'>
                                                                                           
                                                    <option value="" selected><?=Configure::read('SELECT')?></option>
                                                    <option value="Permanent Position" <?php if(isset($vacancy) AND trim($vacancy)=="Permanent Position"){ echo "selected";} ?> ><?=Configure::read('PERMANENT_POSITION')?></option>
                                                    <option value="Temporary Position" <?php if(isset($vacancy) AND trim($vacancy)=="Temporary Position"){ echo "selected";} ?> ><?=Configure::read('TEMPORARY_POSITION')?></option>
                                                    <option value="Part-time Job Ad" <?php if(isset($vacancy) AND trim($vacancy)=="Part-time Job Ad"){ echo "selected";} ?> ><?=stripslashes(Configure::read('PARTTIME_JOB_AD'))?></option>
			                              <option value="Job attachment Position" <?php if(isset($vacancy) AND trim($vacancy)=="Job attachment Position"){ echo "selected";} ?> ><?=Configure::read('JOB_ATTACHMENT_POSITION'); ?></option>
                        <!--<option	value ="Bursary application Position" <?php if(isset($vacancy) AND trim($vacancy)=="Bursary application Position"){ echo "selected";} ?> ><?=Configure::read('BURSARY_APPLICATION_POSITION')?></option>-->
                                                  </select>
                                                  <img src="<?php echo $this->webroot; ?>images/star.gif"> </span></td>
											</tr>
											<tr>
											  <td ><?=Configure::read('COMPANY_NAME')?> </td>
											  <td colspan="2"  ><span class="comment">
											    <input type="text" name="company_name" id="company_name" value="<?php if(isset($company_name)) echo $company_name;?>">
											  </span></td>
									  </tr>
											<tr>
											  <td ><?=Configure::read('CATEGORY')?></td>
										      <td colspan="2"  ><?php
                                                                                      /*fill_dropdown("seeker_category",'job_options','option_name', "option_name",$seeker_category,ALL,"where category_id=14");*/
                                                                                      echo $seeker_category_drop;
                                                                                      ?>
                                                                                      </td>
											</tr>
											<tr>
											  <td ><?=Configure::read('LOCATION')?></td>
										      <td colspan="2"  ><?php /*fill_dropdown("seeker_jobcity","job_city","city_name","city_name",$seeker_jobcity,SELECT);*/
                                                                                      echo $seeker_jobcity_drop;
                                                                                      ?></td>
											</tr>
												<tr>
												  <td   >&nbsp;</td>
												  <td width="23%"  ><?=Configure::read('FROM')?></td>
									              <td width="53%"  ><?=Configure::read('TO')?></td>
									  </tr>
												<tr>
												<td   ><?=Configure::read('SALARY_DESIRED')?> </td>
											    <td  ><input name="seeker_salary_from" type="text" id="seeker_salary_from" value="<?php if(isset($seeker_salary_from)) echo $seeker_salary_from; ?>" > </td>
											    <td  ><input name="seeker_salary_to" type="text" id="seeker_salary_to" value="<?php if(isset($seeker_salary_to)) echo $seeker_salary_to; ?>" >
											    &nbsp;&nbsp;<span class="comment"><?=Configure::read('PER_YEAR')?></span> </td>
											</tr>
											<tr>
												<td  >&nbsp;</td>
										      <td colspan="2"  >
											   <!--<a href="#" onClick="submitform();" class="imgcss">-->
											   <!--<img border="0" src="../images/search_for_job_now.gif">-->
											   <!--</a>-->
											   <div style="text-align:left;" class="job-buttons">
												  <a href="#" onClick="submitform();" class="imgcss"><input type="button" value="search" ></a>
											   </div>
										      </td>
											</tr>
								</table>								</td></tr>
								
								<tr>
								  <td colspan="2" valign="top">&nbsp;								  </td>
								</tr>
							</table>						
						</td>
						
					</tr>
					<tr>
					  <td colspan="2">&nbsp;				  	  </td>
				  </tr>
					<tr>
					  <td>&nbsp;				  	  </td>
					  <td></td>
				  </tr>
				</table>  
			<!-- Page Body End-->	
			</form>
                        
                          </td>
     </tr>
</table>
 
		</div>
	    </div>
	</div>
        </div>
	    </div>
	</div>
</div>
