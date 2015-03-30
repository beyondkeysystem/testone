<link href="<?php echo base_url(); ?>css/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.simple-dtpicker.js"></script>

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

           
      <?php  } else{

            if($this->input->get('error') == 'error'){
                $message = '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Please Insert valid Entry. Payee Name, Address, Payment Location Contains Alphabets, Number, Underscore and dash symbols only</strong></div>';
            }

        ?>

<div class="map content">
    <div class="">
        <div class="">
	
		<div class="title">
			<h3><?=$this->lang->line('purchase_funds')?></h3>
		</div>
                <?php echo validation_errors();
        if(isset($message)){
            echo $message;
        // echo '<span style="color:red; font-size:15px; position:relative; bottom:0px;">'.$message.'</span>';
       ?>
        <script> 
            $(".close").hide(); 
            $(".alert-error").css({"border":"1px solid #ccc","margin":"5px"});
            $(".alert-error:first").before('<div class="alert alert-error" style="border: 1px solid rgb(204, 204, 204);color:red; margin: 5px;"><strong>Validation Error.</strong></div>');
        </script>
        
        <?php   
        } ?>
             <div id="paypal" class="hidepayment">
        	<?php echo form_open('purchase_credit/pay_credit',array('onsubmit'=>'return fnvaidation()'));?>
		<!--h3>1 Token = MYR <?php echo $credit_price[0]['price']; ?></h3-->
		
		<?php echo $this->session->userdata('message'); ?>
                <div><?=$this->lang->line('deposit_amount')?> </div>
            	<div class="form-row">
                    <input type="text" id="credit_pay" name="credit" placeholder="<?=$this->lang->line('credit_pay_placeholder')?>">
                    <input type="hidden" name="payment_type" id="payment_type" value="Paypal"/>
                </div>
                <div><?=$this->lang->line('menu_payment')?></div>
                    <div class="form-row">
                        <select id="option_id" onchange="fnpaymothd(this)">
                            <option value="paypal">Paypal &emsp;</option>
                            <option value="Bank">Bank</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                        &emsp;
                        <a href="javascript:void(0);" class="big-link" data-reveal-id="banksModal" data-animation="fade"><?=$this->lang->line('available_banks_header')?></a>

                    </div>
                    
                    <div><?=$this->lang->line('payment_time')?> </div>
                    <div class="form-row">
                        <input type="text" name="datetime" id="datetime" readonly class="date9" placeholder="<?=$this->lang->line('payment_time')?>">
                        <script type="text/javascript">
                                $(function(){
                                        $('.date9').appendDtpicker({
                                                "closeOnSelected": true
                                        });
                                });
                        </script>
                    </div>
                    <!--<div>Ref. No. </div>
                    <div class="form-row">
                        <input type="text" name="ref_no" id="ref_no" placeholder="Ref. No. ">
                    </div>-->
                    
                    <div id="paypaldetails" class="hidedetails" style="display: none;">
                        <div><?=$this->lang->line('bank_name')?></div>
                        <div class="form-row">
                            <input type="text" name="bank_name" id="bank_name" placeholder="<?=$this->lang->line('bank_name')?>">
                        </div>
                    </div>
                    <div id="bankdetails" class="hidedetails" style="display: none;">
                        <div><?=$this->lang->line('bank_account_no')?></div>
                        <div class="form-row">
                            <input type="text" name="account_no" id="account_no" placeholder="<?=$this->lang->line('bank_account_no')?>">
                        </div>
                    </div>
                    
                    <div id="chequedetails" class="hidedetails" style="display: none;">
                        <div><?=$this->lang->line('cheque_no')?></div>
                        <div class="form-row">
                            <input type="text" name="cheque_no" id="cheque_no" placeholder="<?=$this->lang->line('cheque_no')?>">
                        </div>
                    </div>
                    <div><?=$this->lang->line('payee_name')?></div>
                    <div class="form-row">
                        <input type="text" name="payee_name" id="payee_name" placeholder="<?=$this->lang->line('payee_name')?>">
                    </div>
                    
                    <div><?=$this->lang->line('address')?></div>
                    <div class="form-row"><textarea style="border: 1px solid #dcdcdc;height: 110px;width: 100%;" name="address" id="address"></textarea></div>
                    
                    <div><?=$this->lang->line('payment_location')?></div>
                    <div class="form-row">
                        <input type="text" name="location" id="location" placeholder="<?=$this->lang->line('payment_location')?>">
                    </div>
                	
                       <div class="check">
                    <div class="form-row"><input type="checkbox" id="term" name="term" value="" > <?=$this->lang->line('i_agree')?> <a href="javascript:void(0);" class="big-link" data-reveal-id="termsModal" data-animation="fade"><?=$this->lang->line('term_header')?></a> <?=$this->lang->line('and')?> <a href="javascript:void(0);" class="big-link" data-reveal-id="privacyModal" data-animation="fade"><?=$this->lang->line('privacy_header')?></a> <?=$this->lang->line('of_myvikohome')?> </div>
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
                <div class="search_btn"> <input type="submit" value="<?=$this->lang->line('submit')?>"> </div>
                <div class="clear"></div>
             <?php echo form_close(); ?>
            </div>
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

<script>
    function fnpaymothd(obj){
        var val = obj.value;
        $('.hidedetails').hide();
        if(val == 'paypal'){
            $('#payment_type').val('Paypal');
            document.getElementById('cheque_no').value = '';
            document.getElementById('account_no').value = '';
            document.getElementById('bank_name').value = '';
        }else if(val == 'Bank'){
            //paypaldetails
            $('#paypaldetails').show();
            $('#bankdetails').show();
            $('#payment_type').val('Bank');
            document.getElementById('cheque_no').value = '';
        }else if(val == 'Cheque'){
            $('#paypaldetails').show();
            $('#chequedetails').show();
            $('#payment_type').val('Cheque');
            document.getElementById('account_no').value = '';
        }
    }
    
    function fnvaidation(){
        
        if(document.getElementById('credit_pay').value ==''){
            alert('Please enter credit value');
            document.getElementById('credit_pay').focus();
            return false;  
        }else if(isNaN(document.getElementById('credit_pay').value)){
            alert('Please amount should be numeric value');
            document.getElementById('credit_pay').focus();
            return false;
        }else if(document.getElementById('datetime').value ==''){
            alert('Please select datetime');
            document.getElementById('datetime').focus();
            return false;
        }else if(document.getElementById('payment_type').value !='Paypal' && document.getElementById('bank_name').value ==''){
            alert('Please enter bank name');
            document.getElementById('bank_name').focus();
            return false;
        }else if(document.getElementById('payment_type').value =='Cheque' && document.getElementById('cheque_no').value ==''){
            alert('Please enter cheque no');
            document.getElementById('cheque_no').focus();
            return false;
        }else if(document.getElementById('payment_type').value =='Bank' && document.getElementById('account_no').value ==''){
            alert('Please enter account no');
            document.getElementById('account_no').focus();
            return false;
        }else if(document.getElementById('payee_name').value ==''){
            alert('Please enter payee name');
            document.getElementById('payee_name').focus();
            return false;
        }else if(document.getElementById('address').value ==''){
            alert('Please enter address');
            document.getElementById('address').focus();
            return false;
        }else if(document.getElementById('location').value ==''){
            alert('Please enter location');
            document.getElementById('location').focus();
            return false;
        }else if(document.getElementById('term').checked ==false){
            alert('Please select term & condition');
            document.getElementById('term').focus();
            return false;
        }
        //return false;
    }
    function CheckDecimal(inputtxt) { 
        var re=  /^[-+]?[0-9]+\.[0-9]+$/;
        if(re.test(inputtxt)){
            return true;
        }else{
            return false;
        }
    }
</script>