<?php $this->load->view('home/breadcrumb');
?>
<!--Main Body-->
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<h3><?=$this->lang->line('header_my_profile')?> </h3>
            <div class="reg-form">
            	<?php
		    //form data
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo validation_errors();
		if(isset($message)){
		echo $message;
			
		}
                 echo form_open_multipart('my_profile_update/'.$user_information[0]['id'], $attributes);
		
                 ?>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('first_name')?></label>
                        <input type="text" name="fname" value="<?php echo $user_information[0]['first_name']; ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('last_name')?></label>
                        <input type="text" name="lname"  value="<?php echo $user_information[0]['last_name']; ?>">
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                         <label><?=$this->lang->line('hp_number')?> (0123456789)</label>
                        <input type="text" name="phone" value="<?php echo $user_information[0]['telephone']; ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('address')?></label>
                        <textarea name="address"><?php echo $user_information[0]['address']; ?></textarea>
                    </div>
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('post_code')?></label>
                        <input type="text" name="postalcode" value="<?php echo $user_information[0]['postal_code']; ?>">
                    </div>
                    <div class="postcode-city">
                    <div class="row-col1">
                    	<label><?=$this->lang->line('city')?></label>
                        <input type="text" name="city" value="<?php echo $user_information[0]['city_suburb']; ?>">
                    </div>
                   
                    </div>
                </div>	
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('country')?></label>
                        <input type="text" name="country" value="<?php echo $user_information[0]['country']; ?>"> 
                    </div>
                    <div class="row-col1">
			
                    	<label><?=$this->lang->line('state')?></label>
                        <input type="text" name="state" value="<?php echo $user_information[0]['state']; ?>">
                    </div>
		    
                </div>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label><?=$this->lang->line('email')?></label>
                        <input type="text" name="email" value="<?php echo $user_information[0]['email_addres']; ?>">
                    </div>
                    <div class="row-col1">
                    	<label><?=$this->lang->line('new_password')?></label>
                        <input type="password" name="password" value="">
			<input type="hidden" name="old_password" value="<?php echo $user_information[0]['pass_word'];; ?>"/>
                    </div>
                </div>
		 <div class="reg-form-row">
	           <div class="row-col1">
                    	<label><?=$this->lang->line('occupation')?></label>
                        <input type="text" name="occupation" value="<?php echo $user_information[0]['occupational_status']; ?>">                      
                    </div>
		 </div>
		 
	       <div class="reg-form-row">
                	 <img height="100" width="100" src="<?php echo base_url(); ?><?php if(!empty($user_information[0]['img_path'])){ ?>uploads/<?php echo $user_information[0]['img_path']; }else{?>assets/front/images/noimage.jpeg<?php } ?>" alt="NO PROFILE IMAGE" />
                    	<h3><?=$this->lang->line('profile_image')?></h3>
                        <?php echo $this->lang->line('img_upload_msg');?>
                        <input type="file" name="userfile" size="20" />
                        <input type="hidden" name="old_image" value="<?php echo $user_information[0]['img_path'];; ?>"/>
                </div>

                <div class="search_btn"><input type="submit" value="<?=$this->lang->line('update')?>" name="update"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="reg-right">
        	
            <h4>Your Property Search Begins and Ends with Us</h4>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <ul>
            	<li><span><i class="fa fa-star"></i></span><div class="icotxt"><strong>Shortlist your Favourite Properties</strong><p>Save, view or compare your favourite properties anytime</p></div></li>
                <li><span><i class="fa fa-dollar"></i></span><div class="icotxt"><strong>Sell Your Property</strong><p>Post an ad listing and sell your property for a minimum fee</p></div></li>
                <li><span><i class="fa fa-bell"></i></span><div class="icotxt"><strong>Get Property Alerts </strong><p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p></div></li>
                <li><span><i class="fa fa-building"></i></span><div class="icotxt"><strong>Post Property Wanted Requests</strong><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit.</p></div></li>
            </ul>
           
            <!--<div class="building"><img src="images/building.png"></div>-->
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--/.Main Body-->
<?php $this->load->view('home/blue_bar'); ?>
