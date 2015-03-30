<?php
    global $objDB;

    $links = array();
    $links["Home"] = "index.php";
    $links["About"] = "about.php";	
    //$links["Jobseeker"] = "recruiter/search_jobseekers.php";	
    $links["Employers"] = "jobseeker/seeker_emp.php";	
    $links["Register"] = "jobseeker/seeker_main_page.php";		
    $links["FAQs"] = "jobseeker/faq.php";			
    $links["Login"] = "jobseeker/seeker_login.php";			
    $links["FAQs"] = "jobseeker/faq.php";		
    $links["Job Search"] = "jobseeker/job_search.php";				
    $links["FAQs"] = "jobseeker/faq.php";		
    $links["Legal"] = "legal.php";		
    $links["Privacy"] = "privacy.php";		
    $links["Terms and Conditions"] = "terms.php";	
    $links["Code of Good Practice"] = "code-of-practice.php";	

    $sqlAdminProfile = "select * from job_user";
    $resultAdminProfile = $objDb->ExecuteQuery($sqlAdminProfile);
    $rsAdminProfile = mysql_fetch_object($resultAdminProfile);
   $cities = array("Windhoek","Arandis","Aranos","Bethanie","Gibeon","Gobabis","Henties bay","Kalkfeld","Kalkrand","Kamanjab","Karasburg");	
?>
  <div class="wrapper">
    <div id="footer-glow">
      <div>
        <div class="footer-links fleft">
          <h2>Namrecruit</h2>
          <ul>
		<?php foreach($links as $title=>$url) { ?>
		<li><a href="<?=$url?>"><?=ucwords($title)?></a></li>
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
          <h2>Jobseekers</h2>
          <ul>
            <li><a href="jobseeker/seeker_main_page.php">Register your CV</a></li>
            <li><a href="jobseeker/seeker_login.php">Login</a></li>
            <li><a href="#">Job Search</a></li>
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2>Employer</h2>
          <ul>
            <li><a href="#">How We Work</a></li>
            <li><a href="recruiter/new_recruiter.php">Register</a></li>
            <li><a href="recruiter/rec_login.php">Login</a></li>
            <li><a href="#">Advertise vacancies </a></li>
            <li><a href="#">Own Career page</a></li>
            <li><a href="#">Own Software</a></li>
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2>Search Jobs</h2>
          <ul>
            <li><a href="#">By Location</a></li>
            <li><a href="#">By Industry</a></li>
            <li><a href="#">By Type</a></li>
            <li><a href="#">By Company</a></li>
            <li><a href="#">By classification</a></li>
          </ul>
        </div>
        <div class="footer-links fleft">
          <h2>International</h2>
          <ul>
            <li><a href="jobseeker/job_search_result.php?country=192">Jobs in South Africa</a></li>
	     <li><a href="jobseeker/job_search_result.php?country=6">Jobs in Angola</a></li>
	    <?php for($i=0; $i<10; $i++) { ?>
	     <li><a href="<?=$cities[$i]?>">Jobs in <?=$cities[$i]?></a></li>
	    
	    <?php } ?>
         <!--   <li><a href="#">Jobs in Botswana</a></li>
            <li><a href="#">Jobs in Angola</a></li>
            <li><a href="#">Jobs in Mozambique</a></li>
            <li><a href="#">Jobs in Zimbabwe</a></li>
            <li><a href="#">Jobs in Kenya</a></li>
            <li><a href="#">Jobs in Algeria</a></li>
            <li><a href="#">Recruitment software</a></li>-->
	   
          </ul>
        </div>
		
	
		
        <div class="footer-links2 fright">
          <h2>Stay in Touch</h2>
          <ul>
            <li class="rss"><a href="#">Subscribe to Job Alerts</a></li>
            <li class="rss"><a href="#">Subscribe to our newsletter</a></li>
			

			
            <li class="facebook"><span  class='st_facebook' displayText='Facebook'></span></li>
            <li class="twitter"><span  class='st_twitter' displayText='Twitter'></span></li>
            <li class="linkedin"><span  class='st_linkedin' displayText='LinkedIn'></span></li>
            <li class="share"><span  class='st_sharethis' displayText='Share'></span>
				<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			</li>
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
	<p><?=$rsAdminProfile->user_copyright?>&nbsp;&nbsp;|&nbsp;&nbsp;
	Email <a class="white_small" href="mailto:<?=$rsAdminProfile->user_email?>"><?=$rsAdminProfile->user_email?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
		Tel <?=$rsAdminProfile->user_phone?>
      
	</p>
      </div>
      <div class="fright"> <a href="#"><img src="images/register_btn.png" width="137" height="33" /></a> </div>
      <div class="clear"></div>
    </div>
  </div>