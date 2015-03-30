
<div class="map content">
    <div class="">
        <div class="">
		<div class="title">
			<h3>Withdraw Funds</h3>
		</div>
		<div id="withdraw_error_content" style="color: red; font-size: 16px;"></div>
                <?php echo validation_errors(); ?>
		
        	<?php
		$attributes = array( 'id' => 'withdraw_form');
		echo form_open('purchase_credit/withdraw', $attributes);?>
		
                <h3>Your Current Balance is <?php echo $balance; ?> MYR</h3>
		<?php echo $this->session->userdata('message'); ?>
            	<div class="form-row">
                    <input type="text" id="purchase_credit_amount" name="amount" placeholder="Please enter amount of funds to withdraw" />
		</div>
                <div class="search_btn"> <button id="purchase_credit_submit">Submit</button></div>
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

<script>
$(document).ready(function(){
  $("#purchase_credit_submit").click(function(){
   var balance=<?php echo $balance; ?>;
   var amount= $("#purchase_credit_amount").val();
   var main_balance=balance-amount;
   if(main_balance<0){
	      $('#withdraw_error_content').html('Please enter amount less than balance');
	    return false;
          
	     
   }else{
	   $("#withdraw_form").submit();  
   }
  });
});
</script>
