 <div class="main_ctnr_middle main_left">
        <section class="profile_main">
          <div class="profile_content">
                <h2>Membership Upgrade</h2>
                <div class="orng_dvdr"></div>
            <div class="signup_sec">
              <p class="come-join">Come Join and choose our Membership Plan and be a part of Recruit Young?s Online Community, where we hope to <span class="yellow-txt">inspire, innovate, </span>and <span class="yellow-txt">Empower Youth.</span></p>
              <div class="greyline"></div>
              <div id="pageWrap" class="pageWrap">
                <div class="pageContent">
                  <ul class="accordion">
<!--Candidate Upgrade Section-->
<?php if($user_type == 'Candidate' OR $user_type == 'All') {  ?>
                <li> <a href="#a" class="acc_nm">Candidate Upgrade</a>
                      <div class="acc_content">
                      	<div class="row">
                        	<div class="col-lg-6">
                            	<ul class="upgrade-list">
                                	<li>Career Coaching</li>
                                    <li>Free/Discounts on Networking Events</li>
                                    <li>Mock Interview Workshops</li>
                                    <li>Personal CV help & Career Specific Profile</li>
                                    <li>Video Chat Messaging</li>
                                    <li>Access to non upgrade members too for video chatting</li>
                                    <li>Video Conference Access</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                            	<!--<div class="price-box br-last">
                                	<h3>12 Months</h3><h2><i class="fa fa-fw">&pound;</i>80</h2>
                                </div>
                                <div class="price-box">
                                	<h3>6 Months</h3><h2><i class="fa fa-fw">&pound;</i>50</h2>
                                </div>
                                <div class="price-box">
                                	<h3>3 Months</h3><h2><i class="fa fa-fw">&pound;</i>30</h2>
                                </div>-->
                                 <?php
                                 if($user_type == 'All')
                                 {
                                        $plan_data = $plan_data_can;
                                 }
                                 else
                                 {
                                        $plan_data = $plan_data;
                                 }
                                        if(isset($plan_data))
                                        {
                                        foreach($plan_data as $plan_val)
                                        {
                                        ?>
                                   <div class="price-box">
                                        <h3><?php echo $plan_val['plantable']['title']; ?></h3><h2><i class="fa fa-fw">&pound;</i><?php echo $plan_val['plantable']['show_amount']; ?></h2>
                                    </div>
                                   <?php }
                                        }
                                        ?>
                            </div>
                        </div>
                        <div class="row padt5">
                        	<div class="col-lg-9">
                            	<div class="inpt_area">
                                  <div class="list-row full-width">
                                    <div class="date">
                                    <!--  <select tabindex="1" class="select" sb="66470226" style="display: none;">
                                        <option value="" selected>Select an option</option>
                                        <option value="1">Lorem Ipsum</option>
                                        <option value="1">Lorem Ipsum</option>
                                      </select>-->
                                      <select name="plan_name" id="plan_can" tabindex="1" sb="66470226"  >
                                                <option value="">Select Time Duration</option>
                                                <?php if(isset($plan_data))
                                                {
                                                foreach($plan_data as $plan_amt)
                                                      {
                                                ?>
                                                <option value="<?php echo $plan_amt['plantable']['amount']; ?>"><?php echo $plan_amt['plantable']['title']; ?></option>
                                               <?php  }
                                                }
                                               ?>
                                        </select>
                                                <script type="text/javascript" >
                                                    $( "#plan_can" ).change(function () {
                                                    //alert('test');
                                                    var str = "";
                                                    $( "#plan_can option:selected" ).each(function() {
                                                    str += $( this ).val() + " ";
                                                    });
                                                    
                                                    $( ".amount" ).val( str );
                                                    })
                                                </script>
                                    </div>
                                  </div>  
                                </div>
                            </div>
                            <div class="col-lg-3">
                                         <?php
                                         if($user_type != 'All')
                                         {
$http = 'http';
?>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">

            <input type="hidden" name="notify_url" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>candidate/eRecurs">
            <input type="hidden" name="return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>candidate/thankyou_plan">
            <input type="hidden" name="cancel_return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>candidate/cancelPaypal">
            
            <!--<input type="hidden" id="item_name" name="item_name" value="">-->
            <input type="hidden" class="amount" name="amount" value="">
            <input type="hidden" name="currency_code" value="GBP">
            
            <input class="blue_btn" name="submit" type="submit" value="Pay now" />
            </form>
                        <?php } else {  ?>
           <a href="'.$this->webroot.'users/login"><input class="blue_btn" type="button" value="Pay now" /></a>
            <?php } ?>
                                
                            </div>
                        </div>
                      </div>
                    </li>
                <?php } ?>
        <!--END-->
        <!--Employers Upgrade Section-->
         <?php if($user_type == 'Employer' OR $user_type == 'All') { ?>
                    <li><a href="#a" class="acc_nm">Employers Upgrade</a>
                      <div class="acc_content">
                        <div class="row">
                        	<div class="col-lg-6">
                            	<ul class="upgrade-list">
                                	<li>Video Chat Messeaging - access to all members</li>
                                    <li>Video Conference Access</li>
                                    <li>One Week free Job Advert in month</li>
                                    <li>Free/Discounts on Networking Events</li>
                                    <li>Discount on Recruitment Placement for Temporary & Permanent Staff</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 ">
                           	  <!--<div class="price-box br-last">
                                	<h3>12 Months</h3><h2><i class="fa fa-fw">&pound;</i>270</h2>
                                </div>
                              <div class="price-box">
                                	<h3>6 Months</h3><h2><i class="fa fa-fw">&pound;</i>180</h2>
                                </div>
                              <div class="price-box">
                                	<h3>3 Months</h3><h2><i class="fa fa-fw">&pound;</i>100</h2>
                                </div>-->
                                 <?php
                                 if($user_type == 'All')
                                 {
                                        $plan_data = $plan_data_emp;
                                 }
                                 else
                                 {
                                        $plan_data = $plan_data;
                                 }
                                        if(isset($plan_data))
                                        {
                                        foreach($plan_data as $plan_val)
                                        {
                                        ?>
                                   <div class="price-box">
                                        <h3><?php echo $plan_val['plantable']['title']; ?></h3><h2><i class="fa fa-fw">&pound;</i><?php echo $plan_val['plantable']['show_amount']; ?></h2>
                                    </div>
                                   <?php }
                                        }
                                        ?>
                            </div>
                        </div>
                        <div class="row padt5">
                        	<div class="col-lg-9">
                            	<div class="inpt_area">
                                  <div class="list-row full-width">
                                    <div class="date">
                                        <select name="plan_name" id="plan_emp" tabindex="1"  sb="66470226"  >
                                                <option value="">Select Time Duration</option>
                                                <?php if(isset($plan_data))
                                                {
                                                foreach($plan_data as $plan_amt)
                                                      {
                                                ?>
                                                <option value="<?php echo $plan_amt['plantable']['amount']; ?>"><?php echo $plan_amt['plantable']['title']; ?></option>
                                               <?php  }
                                                }
                                               ?>
                                                <!--<option value="180">6 Month &pound; 180 </option>
                                                <option value="270">12 Month &pound; 270 </option>-->
                                        </select>
                                                <script type="text/javascript" >
                                                    $( "#plan_emp" ).change(function () {
                                                    //alert('test');
                                                    var str = "";
                                                    $( "#plan_emp option:selected" ).each(function() {
                                                    str += $( this ).val() + " ";
                                                    });
                                                    
                                                    $( ".amount" ).val( str );
                                                    })
                                                </script>
                                      
                                      
                                    </div>
                                  </div>  
                                </div>
                            </div>
                            <div class="col-lg-3">
                            <?php
                            if($user_type != 'All')
                                         {
$http = 'http';
?>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">

            <input type="hidden" name="notify_url" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/eRecurs">
            <input type="hidden" name="return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/thankyou_plan">
            <input type="hidden" name="cancel_return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/cancelPaypal">
            
            <!--<input type="hidden" id="item_name" name="item_name" value="">-->
            <input type="hidden" class="amount" name="amount" value="">
            <input type="hidden" name="currency_code" value="GBP">
            
            <input class="blue_btn" name="submit" type="submit" value="Pay now" />
            </form>
                        <?php } else {  ?>
           <a href="'.$this->webroot.'users/login"><input class="blue_btn" type="button" value="Pay now" /></a>
            <?php } ?>
                            
                                
                            
                            </div>
                        </div>
                      </div>  
                    </li>            
        <!--END-->
        <?php } ?>
        <?php if($user_type == 'Job_Adverting' OR $user_type == 'All') { ?>
        <!--Job Advertising Section-->
                <li><a href="#a" class="acc_nm">Job Advertising</a>
                      <div class="acc_content">
                          <div class="row">
                                <div class="col-lg-7">
                                    <p class="job_Ad">Do not Limit your Job Posting to your Company's Candidates with strategically Placed ads aimed at your targeted Candidates, ie By their location & Job Skills</p>
                                </div>
                                <div class="col-lg-5">
                                        <?php
                                 if($user_type == 'All')
                                 {
                                        $plan_data = $plan_data_job;
                                 }
                                 else
                                 {
                                        $plan_data = $plan_data;
                                 }
                                        if(isset($plan_data))
                                        {
                                        foreach($plan_data as $plan_val)
                                        {
                                        ?>
                                   <div class="price-box">
                                        <h3><?php echo $plan_val['plantable']['title']; ?></h3><h2><i class="fa fa-fw">&pound;</i><?php echo $plan_val['plantable']['show_amount']; ?></h2>
                                    </div>
                                   <?php }
                                        }
                                        ?>
                                    <!--<div class="price-box">
                                        <h3>1 Week</h3><h2><i class="fa fa-fw">&pound;</i>5.99</h2>
                                    </div>-->                                                              
                                </div>
                           </div>
                           <div class="row padt5">
                        	<div class="col-lg-9">
                            	<div class="inpt_area">
                                  <div class="list-row full-width">
                                    <div class="date">
                                        <select name="plan_name" id="plan_job" tabindex="1"  sb="66470226"  >
                                                <option value="">Select Time Duration</option>
                                                <?php if(isset($plan_data))
                                                {
                                                foreach($plan_data as $plan_amt)
                                                      {
                                                ?>
                                                <option value="<?php echo $plan_amt['plantable']['amount']; ?>"><?php echo $plan_amt['plantable']['title']; ?></option>
                                               <?php  }
                                                }
                                               ?>
                                                <!--<option value="180">6 Month &pound; 180 </option>
                                                <option value="270">12 Month &pound; 270 </option>-->
                                        </select>
                                                <script type="text/javascript" >
                                                    $( "#plan_job" ).change(function () {
                                                    //alert('test');
                                                    var str = "";
                                                    $( "#plan_job option:selected" ).each(function() {
                                                    str += $( this ).val() + " ";
                                                    });
                                                    
                                                    $( ".amount" ).val( str );
                                                    })
                                                </script>
                                    </div>
                                  </div>  
                                </div>
                            </div>
                            <div class="col-lg-3">
                                         <?php
                                         if($user_type != 'All')
                                         {
$http = 'http';
?>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">

            <input type="hidden" name="notify_url" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/eRecurs">
            <input type="hidden" name="return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/thankyou_plan">
            <input type="hidden" name="cancel_return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/cancelPaypal">
            
            <!--<input type="hidden" id="item_name" name="item_name" value="">-->
            <input type="hidden" class="amount" name="amount" value="">
            <input type="hidden" name="currency_code" value="GBP">
            
            <input class="blue_btn" name="submit" type="submit" value="Pay now" />
            </form>
            <?php } else {  ?>
           <a href="'.$this->webroot.'users/login"><input class="blue_btn" type="button" value="Pay now" /></a>
            <?php } ?>
                            </div>
                        </div>
                      </div>  
                    </li>
                <!--END-->
                <?php } ?>
                <!--Advertising (Strategic Marketing) Section-->
                <li id="advertise" class="nmrb"><a href="#a" class="acc_nm">Advertising (Strategic Marketing)</a>
                      <div class="acc_content">
                         <div class="row">
                                <div class="col-lg-5">
                                    <p class="job_Ad">Get the word out now about your products or services by placing an advertise on Recruit Young's Website</p>
                                </div>
                                <div class="col-lg-7">
                           	  <div class="price-box br-last">
                                	<h3>Multimedia Banner</h3><h2><i class="fa fa-fw">&pound;</i>270</h2>
                                </div>
                              <div class="price-box">
                                	<h3>Targeted Banner</h3><h2><i class="fa fa-fw">&pound;</i>9.99</h2>
                                </div>
                              <div class="price-box">
                                	<h3>Basic Ad per Week</h3><h2><i class="fa fa-fw">&pound;</i>5.99</h2>
                                </div>
                            </div>
                           </div>
                           <div class="row padt5">
                        	<div class="col-lg-9">
                            	<div class="inpt_area">
                                  <div class="list-row full-width">
                                    <div class="date">
                                      <select tabindex="1" class="select" sb="66470226" style="display: none;">
                                        <option value="" selected>Select an option</option>
                                        <option value="5.99">Basic Ad per Week</option>
                                        <option value="9.99">Targeted Banner</option>
					<option value="270">Multimedia Banner</option>
                                      </select>
                                    </div>
                                  </div>  
                                </div>
                            </div>
                            <div class="col-lg-3"><input class="blue_btn" type="button" value="Pay now" /></div>
                        </div>
                        <div class="sep"></div>
                        <div class="row">
                        	<div class="col-lg-2"><p  class="job_Ad">Pay per Click</p></div>
                            <div class="col-lg-10"><input class="blue_btn" type="button" value="\A3 0.10 a Click " /></div>
                        </div>
                        <div class="row">
                        	<div class="col-lg-12"><p  class="job_Ad">This will allow you to set your own Budget by only paying for those that click on your Ad</p></div>
                        </div>
                        <div class="row">
                        	<div class="col-lg-2"><p  class="job_Ad">Set Bugdet</p></div>
                            <div class="col-lg-4"><div class="inpt_area"><input type="text" id="" name="" value="0.00"></div></div>
                            <div class="col-lg-6"><input class="blue_btn" type="button" value="Pay now" /></div>
                        </div>
                      </div>  
                    </li>
                <!--END-->
                  </ul>
 <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
</div>
