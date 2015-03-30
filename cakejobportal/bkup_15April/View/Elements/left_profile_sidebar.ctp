<?php
//echo '<pre>';
//print_r($business_network);
//die;
?>
<script type="text/javascript" src="/js/design/script.js"></script>
<div class="Sidebar-Left">

    <div class="sb_box">
    	<h2 class="pro_user"><?php echo $user_data['name']; ?></h2>
        <div class="orng_dvdr"></div>
        <div class="sb_profile">
	    <?php if(isset($seeker_data_set[0]['job_jobseeker']['seeker_photo']) AND $seeker_data_set[0]['job_jobseeker']['seeker_photo'] != '' ) { ?>
	    <a class="pro_img" href="#"><img src="<?php echo $this->webroot ?>uploads/photos/<?php echo $seeker_data_set[0]['job_jobseeker']['seeker_photo']; ?>" alt="<?php echo $seeker_data_set[0]['job_jobseeker']['seeker_photo']; ?>" /></a>
	    
	    <?php echo $pro_data['seeker_photo']; } else { ?>
        	<a class="pro_img" href="#"><img src="<?php echo $this->webroot ?>css/images/no_photo.jpg" alt="" /></a>
		<?php } ?>
            <div class="pro_dtl">
                <div class="pro_name">
                    <i class="fa fa-user orng"></i><span><?php if(isset($pro_data['seeker_work_history_title'])) { echo $pro_data['seeker_work_history_title']; } ?><!--Product Manager--></span>
                </div>
                <div class="pro_more">
                	<i class="fa  fa-phone"></i>
                    <span>Contact No:  <?php if(isset($pro_data['seeker_mobile'])) { echo $pro_data['seeker_mobile']; } ?></span>
                </div>
            </div>
            <div class="pro_dtl">
                <div class="pro_name">
                    <i class="fa fa-search orng"></i><span>Job Search Details</span>
                </div>
                <div class="pro_more">
                	<ul>
                        <li>
                            <i class="fa fa-cog"></i>
                            <span>Temporary / Permanent</span>
                        </li>
                        <li>
                            <i class="fa fa-briefcase"></i>
                            <span>Type of Work:  <b>Admin</b></span>
                        </li>
                        <li>
                            <i class="fa  fa-map-marker"></i>
                            <span>Location:  <b>London</b></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($checklogin) AND $checklogin =='')
    {
    if($login_user['type'] == 'employer' || $login_user['type'] == 'candidate')
    {
	
    ?>
    <div class="sb_box">
	<div class="sb_profile">
	<div class="pro_dtl">
	    <div class="pro_more">
		
	    <span id="LoadingImage" style="display: none;"><img src="<?php echo $this->webroot; ?>css/images/loading.gif"></span>	        
		<span>
        	   <?php if(isset($favorite) AND $favorite == 'favorite') { ?>
		    <input type="button" id="favoriteAdded" class="blue_btn" value="Added as favorite">		    
		    <?php } else { ?>

		    <a href="javascript:void(0)" id="favorite" onclick="favorite_action(<?php echo $user_data['id']; ?>)" class="blue_btn">Favorite</a>
		    <input type="button" style="display: none;" id="favoriteAdded" class="blue_btn" value="Added as favorite">
		    <?php } ?>
		</span>
	    </div>
	</div>
	</div>
    </div>
        <script type="text/javascript">
            //$('#addFriend').click(function(){
            function favorite_action(can_id) {
		$('#favorite').hide();
		$('#LoadingImage').show();
		$.ajax
		({
		    url: '<?php echo $this->webroot; ?>employer/favorite_action?sender_id=<?php echo $login_user['id'] ?>&fav_id='+can_id,
		    type: 'post',
		    success: function(result)
		    {
			$('.modal-box').text(result).fadeIn(700, function() 
			{
			    setTimeout(function() 
			    {
				$('.modal-box').fadeOut();
			    }, 2000);
			});
		    }
		});
		$('#LoadingImage').hide();
		$('#favoriteAdded').show();
	}
//});
        </script>
    <?php }
    } ?>
    <div class="sb_box">
    	<h2>Career Summary</h2>
        <div class="orng_dvdr"></div>
        <p><?php if(!empty($candidate_summary[0]['candidate_profile']['career_summary'])) {
	    $subvalue=substr($candidate_summary[0]['candidate_profile']['career_summary'],0,100);
	    echo $subvalue . '<br>' . '<br>';
	    ?>
	</p>
	    <div id="toPopup">
	       <div class="close"></div>
	       <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		       <div id="popup_content"> <!--your content start-->
		  <p><?php if(!empty($candidate_summary[0]['candidate_profile']['career_summary']))
		       { echo $candidate_summary[0]['candidate_profile']['career_summary']; } ?>
		   </p>
	       </div> <!--your content end-->
	   </div> <!--toPopup end-->
	   <div class="loader"></div>
	    <div id="backgroundPopup"></div>
	    
	   <?php   if(strlen($candidate_summary[0]['candidate_profile']['career_summary']) >= 100)
	        {
	           echo '<a href="#" class="read_more topopup"><i class="fa fa-caret-right"></i>Read More</a>';
	        }
	      else
	       {
	          echo '<a href="#" class="read_more"><i class="fa fa-caret-right"></i>Read More</a>';    
	       }
	    } ?>

	
	
        <ul class="bullet_list">
        	<li>
            	<i class="fa fa-caret-right"></i>
                <a href="#">Download &amp; View CV Online</a>
            </li>
            <li>
            	<i class="fa fa-caret-right"></i>
                <a href="#">Download &amp; View CV Online</a>
            </li>
        </ul>
    </div>
    
    <div class="sb_box">
    	<h2>My Network</h2>
        <div class="orng_dvdr"></div>
        <h4>social</h4>
        <ul class="img_list">
        <?php
	    if(isset($fav_data)) {
		$i = 1;
		foreach($fav_data as $fav_val)
		{
		    //echo '<pre>';
		    //print_r($fav_val);
		    
		    if($i < 3)
		    {
			if($current_page_id != $fav_val['b']['seeker_id'])
			{
	    ?>
        	<li>
            	<a href="#">
		   <?php if(isset($fav_val['b']['seeker_photo']) AND $fav_val['b']['seeker_photo'] !='') { ?>
		    <img style="width: 54px;" src="<?php echo $this->webroot ?>uploads/photos/<?php echo $fav_val['b']['seeker_photo']; ?>" alt="<?php echo $fav_val['b']['seeker_name']; ?>" />
		<?php } else {  ?>
		<img style="width: 54px; height: 54px;" src="<?php echo $this->webroot ?>css/images/no_photo.jpg" alt="<?php echo $fav_val['b']['seeker_name']; ?>" />
		<?php } ?>
		</a>
            </li>
		<?php
			}
		    }
		}
	    }  ?>
        </ul>
        <div class="clearfix greyline"></div>
        <h4>business</h4>
        <ul class="img_list">
            <?php
	    if(isset($business_network))
	    {
		$i = 1;
		foreach($business_network as $business_val)
		{
		    if($i < 3)
		    {
	     ?>
	    
	    <li>
            	<a href="#"><img style="width: 54px;"  src="<?php echo $this->webroot ?>uploads/<?php echo $business_val['b']['company_logo']; ?>" alt="" /></a>
            </li>
	    <?php }
	    $i++;
		}
	    }
	    //die;
	    ?>
        </ul>
	
    </div>
    
    <div class="sb_box">
    	<a href="#"><img src="<?php echo $this->webroot ?>css/images/lgs_innovations.jpg" alt="" /></a>
    </div>
    
    <div class="sb_box">
    	<a href="#"><img src="<?php echo $this->webroot ?>css/images/playaway_offers.jpg" alt="" /></a>
    </div>
    
    </div>