
<?php //$this->load->view('home/breadcrumb');  ?>
<?php   if(!$this->session->userdata('is_logged_in')){
   ?>
<div class="resp-tabs-container">
	<div class="first_rtc">
        <div class="contact-form">
		
			<div class="alertuser"> Please login to see this page</div>
		
             
        </div>
        <div class="add_detail">
        <div class="title">
			<h3>Contact Us</h3>
		</div>
        <h2><span class="col-g">MyViko</span><span class="col-b">Home</span></h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia</p>
        <div class="add_icons">
        	<span><i class="fa fa-map-marker"></i></span>
            <div class="address">
            	<p>Ahmad Bin Gh azali</p>
				<p>75 Kg Sg Ramal Luar</p>   
				<p>43000 Kajang Malaysia</p>                        
				
            </div>
			<div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-phone"></i></span>
            <p>123 4567 8990</p>
            <div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-envelope"></i></span>
            <a href="mailto:info@myvikohome.com">info@myvikohome.com</a>
        </div>
       
        </div>
        <div class="clear"></div>
    </div>
</div>

           
      <?php  } else{?>
<div class="map content">
    <div class="">
        <div class="">
		<div class="title">
			<h3>Purchase Funds via Tokens</h3>
		</div>
                <?php echo validation_errors(); ?>
		
        	<?php echo form_open('purchase_credit/pay_credit');?>
		<h3>1 Token = MYR <?php echo $credit_price[0]['price']; ?></h3>
		</br>
		<?php echo $this->session->userdata('message'); ?>
            	<div class="form-row">
                    <input type="text" name="credit" placeholder="Please enter number of tokens to purchase">
                </div>
            <?php 
			 echo '<input type="hidden" name="cmd" value="_xclick" />';
			 echo '<input type="hidden" name="upload" value="1">';
			 echo '<input name="no_note" type="hidden" value="1" />';
			 echo ' <input name="lc" type="hidden" value="MYR" />';
			 echo ' <input name="currency_code" type="hidden" value="MYR" />';
			 echo ' <input name="bn" type="hidden" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />';
			 echo ' <input name="payer_email" type="hidden" value="nitin.s@cisinlabs.com" />';
			 echo '<input type="hidden" name="rm" value="2">';
			 echo '<input type="hidden" name="src" value="1">';
			 echo ' <input type="hidden" name="sra" value="1">';
			 echo ' <input type="hidden" name="on0" id="membership_type" value="">';
		    ?>
                <div class="search_btn"> <input type="submit" value="Submit"> </div>
                <div class="clear"></div>
             <?php echo form_close(); ?>
        </div>
       <!-- <div class="add_detail">
        <div class="title">
			<h3>Contact Us</h3>
		</div>
        <h2><span class="col-g">MyViko</span><span class="col-b">Home</span></h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia</p>
        <div class="add_icons">
        	<span><i class="fa fa-map-marker"></i></span>
            <div class="address">
            	<p>Ahmad Bin Gh azali</p>
				<p>75 Kg Sg Ramal Luar</p>   
				<p>43000 Kajang Malaysia</p>                        
				
            </div>
			<div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-phone"></i></span>
            <p>123 4567 8990</p>
            <div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-envelope"></i></span>
            <a href="mailto:info@myvikohome.com">info@myvikohome.com</a>
        </div>
       
        </div>-->
        <div class="clear"></div>
    </div>
</div>
<?php } ?>