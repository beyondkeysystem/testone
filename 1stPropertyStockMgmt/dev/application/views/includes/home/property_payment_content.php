<!--Main Body-->
<div class="wrapper">
	<div class="payment content">
    	<div class="title">
			<h3><?php echo ($this->lang->line('payment_methods_title')); ?></h3>
		</div>
        <div class="payment_method">
        	<strong><?php echo ($this->lang->line('branch_counter_title')); ?></strong>
            <p><?php echo ($this->lang->line('branch_counter_paragraph1')); ?></p>			
            <strong><?php echo ($this->lang->line('mail_title')); ?></strong>
            <p><?php echo ($this->lang->line('mail_text')); ?></p>
            <p>
            <span><?php echo ($this->lang->line('address_line_1')); ?></span>
<span><?php echo ($this->lang->line('address_line_2')); ?></span>
<span><?php echo ($this->lang->line('address_line_3')); ?></span>
<span>><?php echo ($this->lang->line('address_line_4')); ?></span>
<span><?php echo ($this->lang->line('address_line_5')); ?></span>
            </p>
            <p><?php echo ($this->lang->line('mail_paragraph')); ?></p>
            <strong><?php echo ($this->lang->line('zurich_atm_title')); ?></strong>
            <p><?php echo ($this->lang->line('zurich_atm_text')); ?></p>
            <strong><?php echo ($this->lang->line('on_line_title')); ?></strong>
            <p><?php echo ($this->lang->line('on_line_text_1')); ?></p>
            <p><?php echo ($this->lang->line('on_line_text_2')); ?></p>
            <p>
				<?php echo ($this->lang->line('on_line_saving_link')); ?>
				
            </p>
            <p><?php echo ($this->lang->line('on_line_credit_title')); ?></p>
            <p>
            	<?php echo ($this->lang->line('on_line_credit_link')); ?>
            </p>
            <strong><?php echo ($this->lang->line('myvikohome_premium_payment_title')); ?></strong>
            <p><?php echo ($this->lang->line('myvikohome_premium_payment_text')); ?></p>
            <strong><?php echo ($this->lang->line('auto_debit_title')); ?></strong>
            <p><?php echo ($this->lang->line('auto_debit_text')); ?></p>
            <p>
            	<span><i class='fa fa-caret-right'></i><?php echo ($this->lang->line('auto_debit_menu_1')); ?></span>
   				<span><i class='fa fa-caret-right'></i> <?php echo ($this->lang->line('auto_debit_menu_2')); ?></span>
    			<span><i class='fa fa-caret-right'></i><?php echo ($this->lang->line('auto_debit_menu_3')); ?> </span>
    			<span><i class='fa fa-caret-right'></i><?php echo ($this->lang->line('auto_debit_menu_4')); ?> </span>
    			<span><i class='fa fa-caret-right'></i> <?php echo ($this->lang->line('auto_debit_menu_5')); ?></span>
   				<span><i class='fa fa-caret-right'></i><?php echo ($this->lang->line('auto_debit_menu_6')); ?> </span>
    			<span><i class='fa fa-caret-right'></i> <?php echo ($this->lang->line('auto_debit_menu_7')); ?></span>
            </p>
            <p><?php echo ($this->lang->line('auto_debit_text_2')); ?></p>
            <strong><?php echo ($this->lang->line('auto_phone_title')); ?></strong>
        	<p><?php echo ($this->lang->line('auto_phone_text')); ?></p>
            <strong><?php echo ($this->lang->line('banker_title')); ?></strong>
            <p><?php echo ($this->lang->line('banker_text')); ?></p>
        </div>
        <div class="support_bank">
        	<div class="title">
				<h3><?php echo ($this->lang->line('payment_methods_supported_banks_title')); ?></h3>
			</div>
        	<div id="owl-smcar" class="owl-carousel">
                <div>
                	<span><img src="<?php echo base_url(); ?>assets/front/images/pms1.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms2.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms3.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms4.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms5.jpg" alt="Image"></span>
                </div>
                <div>
                	<span><img src="<?php echo base_url(); ?>assets/front/images/pms1.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms2.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms3.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms4.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms5.jpg" alt="Image"></span>
                </div>
                <div>
                	<span><img src="<?php echo base_url(); ?>assets/front/images/pms1.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms2.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms3.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms4.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms5.jpg" alt="Image"></span>
                </div>
                <div>
                	<span><img src="<?php echo base_url(); ?>assets/front/images/pms1.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms2.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms3.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms4.jpg" alt="Image"></span>
                    <span><img src="<?php echo base_url(); ?>assets/front/images/pms5.jpg" alt="Image"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.Main Body--> 
<!--/.Bottom--> 
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/script.js"></script> 
<script src="<?php echo base_url(); ?>assets/front/js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
      $("#owl-smcar").owlCarousel({

      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
    </script>