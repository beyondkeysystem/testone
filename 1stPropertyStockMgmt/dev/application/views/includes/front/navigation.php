<!--Logo + Navigation-->
<div class="header_middle">
  <div class="wrapper">
    <div class="Left"> <a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/front/images/logo.png"></a> </div>
    <div class="Right my-menu"> <a class="toggleMenu" href="#"><span></span><span></span><span></span></a>
      <ul class="nav">
        <li  class="test"><a href="<?php echo base_url(); ?>home"><?php if($this->lang->line('menu_home')){echo ($this->lang->line('menu_home'));} else{ echo 'Home';} ?></a></li>
        <li><a href="<?php echo base_url(); ?>about"><?php if($this->lang->line('menu_about')){echo ($this->lang->line('menu_about'));} else{ echo 'About MyVikoHome';} ?></a></li>
        <li><a href="<?php echo base_url(); ?>property_listing"><?php if($this->lang->line('menu_property')){echo ($this->lang->line('menu_property'));} else{ echo 'Property Listing';} ?></a></li>
        <li><a href="<?php echo base_url(); ?>property_investment"><?php if($this->lang->line('menu_investment')){echo ($this->lang->line('menu_investment'));} else{ echo 'Investment Tips';} ?></a></li>
        <li><a href="<?php echo base_url(); ?>property_payment"><?php if($this->lang->line('menu_payment')){echo ($this->lang->line('menu_payment'));} else{ echo 'Payment Method';} ?></a></li>
        <li><a href="<?php echo base_url(); ?>contact"><?php if($this->lang->line('menu_contact')){echo ($this->lang->line('menu_contact'));} else{ echo 'Contact Us';} ?></a></li>
        <?php   if($this->session->userdata('is_logged_in')){ ?>  
		<li><a href="<?php echo base_url(); ?>index/openticket/3"><?php if($this->lang->line('menu_tickets')){echo ($this->lang->line('menu_tickets'));} else{ echo 'Tickets';} ?></a></li>
        <!-- <li><a href="<?php echo base_url(); ?>credit"><?php if($this->lang->line('detail')){echo ($this->lang->line('detail'));} else{ echo 'Credit';} ?></a></li> -->
        <!--<li><a href="<?php echo base_url(); ?>credit_detail"><?php if($this->lang->line('credit_detail')){echo ($this->lang->line('credit_detail'));} else{ echo 'Credit Detail';} ?></a></li>-->
        <?php }?> 
	  </ul>
    </div>
  </div>
</div>
<!--/.Logo + Navigation--> 