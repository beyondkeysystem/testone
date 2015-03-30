<?php
    global $objDB;

    $links = array();
    $links["FOOTER_HOME"] = "index.php";
    $links["FOOTER_ABOUT"] = "about.php";	
    //$links["Jobseeker"] = "recruiter/search_jobseekers.php";	
    $links["FOOTER_EMPLOYERS"] = "jobseeker/seeker_emp.php";	
    $links["FOOTER_REGISTER"] = "jobseeker/seeker_main_page.php";		
    $links["FOOTER_FAQS"] = "jobseeker/faq.php";			
    $links["FOOTER_LOGIN"] = "jobseeker/seeker_login.php";			
    $links["FOOTER_FAQS"] = "jobseeker/faq.php";		
    $links["FOOTER_JOB_SEARCH"] = "jobseeker/job_search.php";				
    $links["FOOTER_FAQS"] = "jobseeker/faq.php";		
    $links["FOOTER_LEGAL"] = "legal.php";		
    $links["FOOTER_PRIVACY"] = "privacy.php";		
    $links["FOOTER_TERMS_AND_CONDITIONS"] = "terms.php";	
    $links["FOOTER_CODE_OF_GOOD_PRACTICE"] = "code-of-practice.php";	

    $sqlAdminProfile = "select * from job_user";
    $resultAdminProfile = $objDb->ExecuteQuery($sqlAdminProfile);
    $rsAdminProfile = mysql_fetch_object($resultAdminProfile);
   $cities = array("Botswana","Zimbabwe","Mozambique","Kenya","Tanzania","Uganda","Australia","Africa");	
?>
  <div class="wrapper">
    <div id="footer-glow">
      <div>
        <div class="footer-links fleft">
          <h2><?=FOOTER_NAMRECRUIT?></h2>
          <ul>
		<?php foreach($links as $title=>$url) { ?>
		<li><a href="<?=$hrfe_Add.$url?>"><?=constant(create_lang_var_name($title))?></a></li>
            <!--<li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Legal</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Stats</a></li>
            <li><a href="#">Clients</a></li>
            <li><a href="#">Help</a></li>-->
	    <?php } ?>
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2><?=FOOTER_JOBSEEKERS?></h2>
          <ul>
	    <li><a href="#"><?=GET_MORE_INFORMATION?></a></li>
            <li><a href="jobseeker/seeker_main_page.php"><?=FOOTER_REGISTER_YOUR_CV?></a></li>
            <li><a href="jobseeker/seeker_login.php"><?=FOOTER_LOGIN?></a></li>
            <li><a href="#"><?=FOOTER_JOB_SEARCH?></a></li>
	    <li><a href="#"><?=FOOTER_START_YOUR_OWN_BUSINESS?></a></li>
	    <li><a href="#"><?=FOOTER_HELP?></a></li>
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2><?=FOOTER_EMPLOYERS?></h2>
          <ul>
            <li><a href="#"><?=FOOTER_HOW_WE_WORK?></a></li>
            <li><a href="recruiter/new_recruiter.php"><?=FOOTER_REGISTER?></a></li>
            <li><a href="recruiter/rec_login.php"><?=FOOTER_LOGIN?></a></li>
            <li><a href="#"><?=FOOTER_ADVERTISE_VACANCIES?></a></li>
            <li><a href="#"><?=OWN_CAREER_PAGE?></a></li>
            <li><a href="#"><?=FOOTER_OWN_SOFTWARE?></a></li>
	    <li><a href="#"><?=FOOTER_ADVERTISE_A_JOB?></a></li>
	    <li><a href="#"><?=FOOTER_ADVERTISE_YOUR_BUSINESS ?></a></li>
	    <li><a href="#"><?=FOOTER_HELP?></a></li>
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2><?=FOOTER_SEARCH_JOBS?></h2>
          <ul>
            <li><a href="#"><?=FOOTER_BY_LOCATION?></a></li>
	    <li><a href="#"><?=FOOTER_BY_AREA ?></a></li>
	    <li><a href="#"><?=FOOTER_BY_CLASSIFICATION?></a></li>
	    <li><a href="#"><?=FOOTER_BY_COMPANY?></a></li>
            <li><a href="#"><?=FOOTE_BY_KEYWORDS?></a></li>
            <li><a href="#"><?=FOOTER_ALL_JOBS_IN_NAMIBIA?></a></li>
	    <li><a href="#"><?=FOOTER_HELP?></a></li>
           
           
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2><?=FOOTER_INTERNATIONAL?></h2>
          <ul>
	  <li><a href="<?=$hrfe_Add?>jobseeker/job_search_result.php?country=146"><?=FOOTER_JOBS_IN_NAMIBIA?></a></li>
            <li><a href="<?=$hrfe_Add?>jobseeker/job_search_result.php?country=192"><?=FOOTER_JOBS_IN_SOUTH_AFRICA?></a></li>
	     <li><a href="<?=$hrfe_Add?>jobseeker/job_search_result.php?country=6"><?=FOOTER_JOBS_IN_ANGOLA?></a></li>
	    <?php for($i=0; $i<count($cities); $i++) { ?>
	     <li><a href="<?=$hrfe_Add."jobseeker/job_search_result.php?city=".$cities[$i]?>"><?=FOOTER_JOBS_IN?> <?=$cities[$i]?></a></li>
	    
	    <?php } ?>
	    <li><a href="#"><?=FOOTER_JOBS_AROUND_THE_GLOBE?></a></li>
	    <li><a href="#"><?=FOOTER_RECRUITMENT_SOFTWARE_FOR_YOU?></a></li>
         <!--   <li><a href="#">Jobs in Botswana</a></li>
            <li><a href="#">Jobs in Angola</a></li>
            <li><a href="#">Jobs in Mozambique</a></li>
            <li><a href="#">Jobs in Zimbabwe</a></li>
            <li><a href="#">Jobs in Kenya</a></li>
            <li><a href="#">Jobs in Algeria</a></li>
            <li><a href="#">Recruitment software</a></li>-->
	   
          </ul>
        </div>
<style>
.chicklets{color:white !important;}
</style>
        <div class="footer-links2 fright">
          <h2><?=FOOTER_STAY_IN_TOUCH?></h2>
          <ul>
            <li class="rss"><a href="#"><?=FOOTER_SUBSCRIBE_TO_JOB_ALERTS?></a></li>
            <li class="rss"><a href="<?=$hrfe_Add?>newsletter/newsletter_step1.php"><?=FOOTER_SUBSCRIBE_TO_OUR_NEWSLETTER?></a></li>
   	    
<li class="facebook"><span  class='st_facebook' style="color:#FFF;" displayText="<?=FOOTER_FACEBOOK?>"></span></li>
            <li class="twitter"><span  class='st_twitter' style="color:#FFF;" displayText="<?=FOOTER_TWITTER?>"></span></li>
            <li class="linkedin"><span  class='st_linkedin' style="color:#FFF;" displayText="<?=FOOTER_LINKEDIN?>"></span></li>
            <li class="share"><span  class='st_sharethis' style="color:#FFF;" displayText="<?=FOOTER_SHARE?>"></span>
        	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	    </li>
 <li><a href="#"><?=FOOTER_CONTACT_US ?></a></li>
            
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      <!--<div class="fright" id="footer-right">
            	
           	  <p><a href="#">E-mail:  info@cisin.com</a></p>
              <p>Call Sales: 9 AM - 9 PM (GMT+0)</p>
              <p>India phone:  91(731) 406-1154, 301-3279 . </p>
              <p>USA: +1 (408) 705-1160 </p>
                <div id="social-icon">
                	<a href="#"><img src="images/t-icon.png" alt="" /></a>
                    <a href="#"><img src="images/f-icon.png" alt="" /></a>
                    <a href="#"><img src="images/i-icon.png" alt="" /></a>
                    <a href="#"><img src="images/y-icon.png" alt="" /></a>
                    <a href="#"><img src="images/s-icon.png" alt="" /></a>
                </div>
          </div>-->
      <div class="clear"></div>
      <div class="copy-txt fleft">
        <!--<p>Copyright (c) 2011 Namrecruit, all rights reserved</p>-->
        <!--<p>Powered by Onzol.com</p>-->
	<p><?=utf8_encode($rsAdminProfile->user_copyright)?>&nbsp;&nbsp;|&nbsp;&nbsp;
	<?=FOOTER_EMAIL?> <a class="white_small" href="mailto:<?=$rsAdminProfile->user_email?>"><?=$rsAdminProfile->user_email?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
		<?=FOOTER_TEL?> <?=$rsAdminProfile->user_phone?>
      
	</p>
      </div>
      <!-- Register btn start-->
      <div class=" registerbtn fright"> 
      <div class="fleft"> <img src="images/leftregister.png" width="5" height="33" /></div> 
      <div class="fleft mid-register"><a href="#"><?=stripslashes(FOOTER_REGISTER_YOUR_CV)?></a></div>
      <div class="fleft"> <img src="images/rightregister.png" width="5" height="33" /></div>
      </div>
      <!-- Register btn end-->
      <div class="clear"></div>
    </div>
  </div>
<? $objDb->Closecon(); ?>	
