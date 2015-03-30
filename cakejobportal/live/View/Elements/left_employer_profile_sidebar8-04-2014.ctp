
<div class="Sidebar-Left">
    
    <div class="sb_box">
    	<h2 class="pro_user"><?php if(isset($emp_data['company_name'])) { echo $emp_data['company_name']; } else { echo 'Company Name'; } ?></h2>
        <div class="orng_dvdr"></div>
        <div class="sb_profile">
	    <?php if(isset($pro_data['company_logo'])) { ?>
        	<a class="pro_img" href="#"><img src="<?php echo $this->webroot.'uploads/'.$pro_data['company_logo']; ?>" alt="" /></a>
            <?php } ?>
	    <div class="pro_dtl">
		 <?php if(isset($pro_data['emp_company_name'])) { ?>
                <div class="pro_name">
                    <i class="fa fa-user orng"></i><span><?php echo $pro_data['emp_company_name']; ?></span>
                </div>
		<?php } ?>
		 <?php if(isset($pro_data['company_contact'])) { ?>
                <div class="pro_more">
                	<i class="fa  fa-phone"></i>
                    <span>Contact No:  <?php echo $pro_data['company_contact']; ?></span>
                </div>
		<?php } ?>
            </div>
            
        </div>
    </div>
    <?php
    if(isset($checklogin) AND $checklogin =='')
    {
    if($login_user['type'] == 'candidate' || $login_user['type'] == 'employer')
    {
    ?>
    <div class="sb_box">
	<div class="sb_profile">
	<div class="pro_dtl">
	    <div class="pro_more">
	        <span id="LoadingImage" style="display: none;"><img src="<?php echo $this->webroot; ?>css/images/loading.gif"></span>	 
		<span>
		    <?php if(isset($follow) AND $follow == 'follow') { ?>
		    <input type="button"  id="followed" class="blue_btn" value="Added in Business">
		    <?php } else { ?>
		<a href="javascript:void(0)" id="follow" onclick="follow_action(<?php echo $user_data['id']; ?>)" class="blue_btn">Follow</a>
		<input type="button" style="display: none;" id="followed" class="blue_btn" value="Added in Business">
		    <?php }?>
		</span>
	    </div>
	</div>
	</div>
    </div>
      <script type="text/javascript">
            //$('#addFriend').click(function(){
            function follow_action(emp_id) {
		  $('#follow').hide();
		    $('#LoadingImage').show();
		
		$.ajax
		({
		    url: '<?php echo $this->webroot; ?>candidate/follow_action?sender_id=<?php echo $login_user['id']; ?>&emp_id='+emp_id,
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
		 $('#followed').show();
	}
//});
        </script>
    <?php
    }
    }
    ?>
    <div class="sb_box">
    	<h2>Business Summary</h2>
        <div class="orng_dvdr"></div>
        <p><?php
	if(isset($pro_data['business_summary']))
	{
	 strlen($pro_data['business_summary']);
	echo substr($pro_data['business_summary'], 0 , 95).'...';
	}
	else { echo 'not found'; }
//	pr($_SERVER);
//echo	$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//	die;
	?>
	</p>
	

    <div id="toPopup">

        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
            <p><?php if(isset($pro_data['business_summary']))
	{ echo $pro_data['business_summary']; } ?></p>
          <!--  <p align="center"><a href="#" class="livebox">Click Here Trigger</a></p>-->
        </div> <!--your content end-->

    </div> <!--toPopup end-->

	<div class="loader"></div>
   	<div id="backgroundPopup"></div>

	<?php
	if(isset($pro_data['business_summary']))
	{
	if(strlen($pro_data['business_summary']) >= 100)
	{
	    echo '<a href="#" class="read_more topopup"><i class="fa fa-caret-right"></i>Read More</a>';
	}
	else
	{
	 
	    echo '<a href="#" class="read_more"><i class="fa fa-caret-right"></i>Read More</a>';    
	}
	}
	?> 
        
    </div>
    
    <div class="sb_box">
    	<h2>Company Network</h2>
        <div class="orng_dvdr"></div>
        <h4>Favourite Candidates</h4>
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
	    ?>
        	<li>
            	<a href="#"><img style="width: 54px;" src="<?php echo $this->webroot ?>uploads/photos/<?php echo $fav_val['b']['seeker_photo']; ?>" alt="<?php echo $fav_val['b']['seeker_photo']; ?>" /></a>
            </li>
		<?php
		    }
		}
	    }  ?>
           <!-- <li>
            	<a href="#"><img src="<?php echo $this->webroot ?>css/images/social_img_2.jpg" alt="" /></a>
            </li>
            <li>
            	<a href="#"><img src="<?php echo $this->webroot ?>css/images/social_img_3.jpg" alt="" /></a>
            </li>-->
        </ul>
        <div class="clearfix greyline"></div>
        <h4>Business Network</h4>
        <ul class="img_list">
        	 <?php
	    if(isset($business_network))
	    {
		$i = 1;
		foreach($business_network as $business_val)
		{
		    if($i < 3)
		    {
			if($current_page_id != $business_val['b']['emp_id'])
			{
	     ?>
	    
	    <li>
            	<a href="#"><img style="width: 54px;"  src="<?php echo $this->webroot ?>uploads/<?php echo $business_val['b']['company_logo']; ?>" alt="" /></a>
            </li>
	    <?php
			}
		    }
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
    	<a href="#"><img src="<?php echo $this->webroot ?>css/images/playway_offers_big.jpg" alt="" /></a>
    </div>
    
    </div>