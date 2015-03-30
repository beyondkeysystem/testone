<?php echo $this->Html->script('/tiny_mce/tiny_mce.js'); ?>


<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		editor_deselector : "mceNoEditor",
		skin: "thebigreason",
		plugins : "inlinepopups",
		plugins : "paste",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,|,link,unlink,|,bullist,numlist,|,pastetext,pasteword,selectall,|,cleanup,removeformat,code",
		theme_advanced_resizing : true,
	});
</script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
	
	$( "#datepicker" ).datepicker({ changeYear: true });
	// getter
	var changeYear = $( ".selector" ).datepicker( "option", "changeYear" );
	// setter
	$( "#datepicker" ).datepicker( "option", "changeYear", true );
	
	
	
	$( "#datepicker" ).datepicker({ gotoCurrent: true });
	// getter
	var gotoCurrent = $( ".selector" ).datepicker( "option", "gotoCurrent" );
	// setter
	$( "#datepicker" ).datepicker( "option", "gotoCurrent", true );

	
  });
  </script>

<div id="wrapper">

	<div class="title">VENDOR PROFILE</div>
	
	<h4>Add Vendor</h4>
	
	<?php echo $this->Form->create('User'); ?>
	
	
	<div class="row">
		<div class="span12">
			<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?><br />
		</div>
	
		<div class="span16">
	
	
			<div class="span3">
				<?php echo $this->Form->input('level', array('label' => 'User Level' , 'options' => array( 'admin' => 'Admin','vendor' => 'Vendor'))); ?>
				<?php echo $this->Form->input('username'); ?>
				<?php echo $this->Form->input('name', array('label' => 'Shoppe Name')); ?>
				<?php echo $this->Form->input('slug', array('label' => 'Domain Prefix <br />do NOT use hyphens here - only one word, no spaces')); ?>
				<?php echo $this->Form->input('business_name', array('label' => 'Business Name')); ?>
				<?php echo $this->Form->input('business_name_dba', array('label' => 'DBA - List all' , 'rows'=> '3', 'cols' => '3', 'class' => 'mceNoEditor')); ?>
				
				<hr />
				
				<?php echo $this->Form->input('phone', array('label' => 'Phone - General')); ?>
				<?php echo $this->Form->input('fax', array('label' => 'Fax - General')); ?>
				<?php echo $this->Form->input('email', array('label' => 'email - General')); ?>
				<?php echo $this->Form->input('address', array('label' => 'Address - Line 1')); ?>
				<?php echo $this->Form->input('address2', array('label' => 'Address - Line 2')); ?>
				<?php echo $this->Form->input('city'); ?>
				<?php echo $this->Form->input('state'); ?>
				<?php echo $this->Form->input('zip', array('class' => 'span1')); ?>
				
				<hr />
				
				<?php echo $this->Form->input('website'); ?>
								
				<?php //echo $this->Form->input('contact_name'); ?>
				<?php //echo $this->Form->input('vendor_type'); ?>
								
				<?php //echo $this->Form->input('mycategories'); ?>
	
			</div>
			<div class="span5">
            
               
			<h3>SHIPPING</h3>
				
				<?php echo $this->Form->input('shipping_method', array('label' => 'Preferred Shipping Method','empty' => '--', 'options' => array('ups' => 'UPS', 'fedex' => 'FEDEX', 'usps' => 'US Postal Service'))); ?>
				<?php echo $this->Form->input('shipping_method_2', array('label' => 'Alternate Shipping Method' ,'empty' => '--', 'options' => array('ups' => 'UPS', 'fedex' => 'FEDEX', 'usps' => 'US Postal Service'))); ?>
				<?php echo $this->Form->input('shipping_method_3', array('label' => '2nd Alternate Shipping Method' ,'empty' => '--', 'options' => array('ups' => 'UPS', 'fedex' => 'FEDEX', 'usps' => 'US Postal Service'))); ?>
                
                <br />
                
               <div class="inline"> We ship in&nbsp;<?php echo $this->Form->input('ship_time', array('label' => false, 'class' => 'span1')); ?> days from receipt of order.</div>
              
               <br />
				<?php echo $this->Form->input('shipping_policy', array('rows' => 10, 'class' => '4span', 'label' => 'Shipping/ Return/ Customer Satisfaction Policies')); ?>
                <br />
                <hr />
                <h4>FLAT SHIPPING LEVELS</h4>
                <?php echo $this->Form->input('flat_shipping', array('type' => 'checkbox','label' =>'Check if flat rate shipping will be offered.')); ?>
               
                <?php echo $this->Form->input('ship_determinant', array('empty' => '--','label' => 'Shipping Determinant' , 'options' => array( 'containers' => 'Containers','dollars' => 'Dollars'))); ?>
               
                <div class="row">
                	<div class="span1 horiz-label">Level 1:</div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_1_low', array('class' => 'span1','label' => 'From:')); ?>
                    </div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_1_high', array('class' => 'span1','label' => 'To:')); ?>
                    </div>
                    <div class="span1 shipping">
                       <?php echo $this->Form->input('flat_ship_level_1_price', array('class' => 'span1','label' =>'Price')); ?>
                    </div>
				</div>

                <div class="row">
                	<div class="span1 horiz-label">Level 2:</div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_2_low', array('class' => 'span1','label' => 'From:')); ?>
                    </div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_2_high', array('class' => 'span1','label' => 'To:')); ?>
                    </div>
                    <div class="span1 shipping">
                       <?php echo $this->Form->input('flat_ship_level_2_price', array('class' => 'span1','label' =>'Price')); ?>
                    </div>
				</div>

                <div class="row">
                	<div class="span1 horiz-label">Level 3:</div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_3_low', array('class' => 'span1','label' => 'From:')); ?>
                    </div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_3_high', array('class' => 'span1','label' => 'To:')); ?>
                    </div>
                    <div class="span1 shipping">
                       <?php echo $this->Form->input('flat_ship_level_3_price', array('class' => 'span1','label' =>'Price')); ?>
                    </div>
				</div>

                <div class="row">
                	<div class="span1 horiz-label">Level 4:</div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_4_low', array('class' => 'span1','label' => 'From:')); ?>
                    </div>
                    <div class="span1 shipping">
                        <?php echo $this->Form->input('flat_ship_level_4_high', array('class' => 'span1','label' => 'To:')); ?>
                    </div>
                    <div class="span1 shipping">
                       <?php echo $this->Form->input('flat_ship_level_4_price', array('class' => 'span1','label' =>'Price')); ?>
                    </div>
				</div>

               
				
				<?php echo $this->Form->input('flat_shipping_weight_threshold', array('class' => 'span1')); ?>
                
                <hr />
                
                
                <div class="row">
                	
                    <div class="span2 shipping">
                        <?php echo $this->Form->input('free_shipping', array('type' => 'checkbox')); ?>
                    </div>
                    
                    <div class="span2 shipping">
                        <?php echo $this->Form->input('free_shipping_price_threshold', array('class' => 'span1','label' => 'Price')); ?>
                        
                    </div>
                  
				</div>
				
				

				<hr />
				<h3>CUSTOMER SERVICE</h3>
				<?php echo $this->Form->input('customer_service_contact', array('label' =>'Customer Service Name')); ?>
				<?php echo $this->Form->input('customer_service_phone'); ?>
				<?php echo $this->Form->input('customer_service_phone_ext'); ?>
				<?php echo $this->Form->input('customer_service_email'); ?>
				
				<hr />
				<h3>SHOPPE DESCRIPTION</h3>
				<?php echo $this->Form->input('shop_description', array('rows' => 20, 'class' => '4span')); ?><br />
				<?php echo $this->Form->input('shop_quote', array('class' => '4span')); ?>
				<?php echo $this->Form->input('shop_signature'); ?>
	
			</div>
            
            <div class="span6">
            <div style="background-color:#FFC;; border:#CCC thin dotted;padding:10px;">
                  <h3>VENDOR SITE APPROVAL</h3>
                      <?php echo $this->Form->input('Approval.id', array('type' => 'hidden')); ?>
                      <?php echo $this->Form->input('Approval.status', array('label' => 'Approval Status','empty' => '--', 'options' => array('1' => 'Approve as is', '2' => 'Approve with modifications', ))); ?>
                      
                      <?php echo $this->Form->input('Approval.comments', array('label' => 'Modifications')); ?>
               </div>       
            
            
            </div>
            
            
            
            
			<div class="span3">
				<?php echo $this->Form->input('business_ownership', array('empty' => '--','label' => 'Type of Business Ownership' , 'options' => array( 'family owned' => 'Family Owned','individual' => 'Individual', 'small corporation' => 'Small Corporation', 'large corporation' => 'Large Corporation', 'other' => 'Other'))); ?>
				<?php echo $this->Form->input('business_established', array('class' => 'span1','label' => 'Year the business was established')); ?>
				
				<hr />
				<h3>CONTACT INFO</h3>
				<?php echo $this->Form->input('contact_name'); ?>
				<?php echo $this->Form->input('contact_title'); ?>
				<?php echo $this->Form->input('contact_phone'); ?>
				<?php echo $this->Form->input('contact_email'); ?>
				
				<hr />
				<?php echo $this->Form->input('contact_alt_name', array('label' => 'Alternate Contact Name')); ?>
				<?php echo $this->Form->input('contact_alt_title', array('label' => 'Alternate Contact Title')); ?>
				<?php echo $this->Form->input('contact_alt_phone', array('label' => 'Alternate Contact Phone')); ?>
				<?php echo $this->Form->input('contact_alt_email', array('label' => 'Alternate Contact eMail')); ?>
	
			</div>
			<div class="span3">
				<h3>FINANCIAL INFO</h3>
				<?php echo $this->Form->input('fin_contact_name', array('label' => 'Financial Contact Name')); ?>
				<?php echo $this->Form->input('fin_contact_title', array('label' => 'Financial Contact Title')); ?>
				<?php echo $this->Form->input('fin_contact_phone', array('label' => 'Financial Contact Phone')); ?>
				<?php echo $this->Form->input('fin_contact_email', array('label' => 'Financial Contact eMail')); ?>
				<?php echo $this->Form->input('payment_biz_name', array('label' => 'Payment Business Name')); ?>
				<?php echo $this->Form->input('payment_street_address'); ?>
				<?php echo $this->Form->input('payment_city'); ?>
				<?php echo $this->Form->input('payment_state', array('options' => $states,'empty' => '--')); ?>
				<?php echo $this->Form->input('payment_zip'); ?>
				<?php echo $this->Form->input('email_orders', array('label' => 'email - Orders')); ?>

				<hr />
				<h3>INSURANCE</h3>
				<?php echo $this->Form->input('ins_carrier', array('label' => 'Insurance Company')); ?>
                <?php echo $this->Form->input('ins_agent_name', array('label' => 'Insurance Agent Name')); ?>
				<?php echo $this->Form->input('ins_agent_phone', array('label' => 'Insurance Agent Phone')); ?>
                <?php echo $this->Form->input('ins_agent_email', array('label' => 'Insurance Agent Email')); ?>
                <?php echo $this->Form->input('ins_company', array('label' => 'Insuring Company')); ?>
				<?php echo $this->Form->input('ins_policy_num', array('label' => 'Policy Number')); ?>
				<?php echo $this->Form->input('ins_policy_exp', array('id' => 'datepicker', 'label' => 'Policy Expiration Date','class' => 'mceNoEditor')); ?>
                <h4>Policy Coverage:</h4>
				<?php echo $this->Form->input('ins_coverage_each', array('label' => 'Each Occurence')); ?>
                <?php echo $this->Form->input('ins_coverage_aggr', array('label' => 'Aggregate Amount')); ?>
				
				<hr />
				<h3>COMPENSATION</h3>
				<?php echo $this->Form->input('wholesale', array('type' => 'checkbox','label' => 'Check if you will offer GB wholesale prices.')); ?>
				<?php echo $this->Form->input('commission_full', array('class' => 'span1','label' => ' % Commission for Retail Prices')); ?>
				<?php echo $this->Form->input('commission_discount', array('class' => 'span1','label' => '% Commission for Discount Prices')); ?>
				
				<hr />
				
				<h3>TAXES</h3>
				<?php //echo $this->Form->input('check', array('type' => 'checkbox','label' => 'Do you charge tax?')); ?>
				<h5>Please indicate tax as %</h5>
				<?php echo $this->Form->input('Tax.id', array('type' => 'hidden')); ?>
				<?php echo $this->Form->input('Tax.total_food_tax_in_state', array('class' => 'span1','label' => 'Food Tax Shipping In-State')); ?>
				<?php echo $this->Form->input('Tax.total_food_tax_out_state', array('class' => 'span1','label' => 'Food Tax Shipping Out of State')); ?>
				<?php echo $this->Form->input('Tax.total_non_food_tax_in_state',array('class' => 'span1','label' => 'Non Food Tax Shipping In-State')); ?>
				<?php echo $this->Form->input('Tax.total_non_food_tax_out_state',array('class' => 'span1','label' => 'Non Food Tax Shipping Out of State')); ?>

			</div>
			<!--<div class="span2">
	
			</div>-->
		</div>
	</div>
		<div class="span12">
	
			<div class="span4">
				<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
	
				<br />
				<br />
				<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
				<?php echo $this->Form->end(); ?>
	
				
			</div>
		</div>
	</div>
	
	<br />
	<br />
	
