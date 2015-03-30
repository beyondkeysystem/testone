
<div class="map content">
    <div class="">
        <div class="">
		<div class="title">
			<h3><?=$this->lang->line('withdraw_funds')?></h3>
		</div>
		<div id="withdraw_error_content" style="color: red; font-size: 16px;"></div>
                <?php 

                if($this->input->get('error') == 'error'){
                    $message = '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Please Insert valid Amount. Withdraw amount should be numeric only</strong></div>';
                }
                echo validation_errors(); 
                echo $message;
                ?>
		
        	<?php
		$attributes = array( 'id' => 'withdraw_form');
		echo form_open('purchase_credit/withdraw', $attributes);
if($balance > 0){
?>
		
                <h3><?=$this->lang->line('your_current_balance_is')?> <?php echo $balance; ?> MYR</h3>
		<?php echo $this->session->userdata('message'); ?> 
            	<div class="form-row">
                    <input type="number" step="any" min="1" max="<?php echo $balance; ?>" required id="purchase_credit_amount" name="amount" placeholder="<?=$this->lang->line('withdraw_input_placeholder')?>" />
		</div>
                <div class="search_btn"> <input type="submit" id="purchase_credit_submit" value="<?=$this->lang->line('submit')?>" /></div>
                <div class="clear"></div>
             <?php echo form_close(); ?>
<?php }else{ ?>
<h3><?=$this->lang->line('no_balance_msg_withdraw')?></h3>
<?php }?>
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
//alert(main_balance + "  test");
if(document.getElementById('purchase_credit_amount').value ==''){
        alert('Please amount should be numeric value');
        document.getElementById('purchase_credit_amount').focus();
        return false;  
    }else if(isNaN(document.getElementById('purchase_credit_amount').value)){
        alert('Please amount should be numeric value');
        document.getElementById('purchase_credit_amount').focus();
        return false;
    }
   if(amount > balance){
	      $('#withdraw_error_content').html('Please enter amount less than balance');
	    return false;        
	     
   }else{
	   $("#withdraw_form").submit();  
   }
  });
});
</script>
