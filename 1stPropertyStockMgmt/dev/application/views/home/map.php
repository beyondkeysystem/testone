<?php if($_GET['m']){echo '<span id="mail_success">Mail Sent Successfully will contact soon</span>';} ?>
<div class="map content">
	<div id="map"></div>
    <div class="wrapper">
	<a href="#message"></a>
        <div class="contact-form">
		<div class="title">
			<h3><?=$this->lang->line('request_a_quote')?></h3>
		</div>
                <?php echo validation_errors(); ?>
        	<?php echo form_open('contact');?>
            	<div class="form-row">
                    <input type="text" name="full_name" placeholder="<?=$this->lang->line('full_name')?>">
                </div>
                <div class="form-row">
                    <input type="text" name="email" placeholder="<?=$this->lang->line('email')?>">
                </div>
                <div class="form-row">
                    <input type="text"  name="company" placeholder="<?=$this->lang->line('company')?>">
                </div> 
                <div class="form-row">
                    <input type="text"  name="phone" placeholder="<?=$this->lang->line('phone_skype')?>">
                </div>
                <div class="form-row">
                    <input type="text"  name="country" placeholder="<?=$this->lang->line('country')?>">
                </div>
                <div class="form-row">
                    <input type="text"  name="address" placeholder="<?=$this->lang->line('address')?>">
                </div>
                <div class="form-row">
                    <textarea  name="message" placeholder="<?=$this->lang->line('message')?>"></textarea>
                </div>
                <div class="search_btn"> <input type="submit" value="<?=$this->lang->line('submit')?>"> </div>
                <div class="clear"></div>
             <?php echo form_close(); ?>
        </div>
        <div class="add_detail">
        <div class="title">
			<h3><?php if($this->lang->line('menu_contact')){echo ($this->lang->line('menu_contact'));} else{ echo 'Contact Us';} ?></h3>
		</div>
        <h2><span class="col-g"><?php if($this->lang->line('myviko_title')){echo ($this->lang->line('myviko_title'));} else{ echo 'MyViko';} ?></span><span class="col-b"><?php if($this->lang->line('home_title')){echo ($this->lang->line('home_title'));} else{ echo 'Home';} ?></span></h2>
        <p><?php if($this->lang->line('contact_message')){echo ($this->lang->line('contact_message'));} else{ echo 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia';} ?></p>
        <div class="add_icons">
        	<span><i class="fa fa-map-marker"></i></span>
            <div class="address">
            	<p><?php if($this->lang->line('contact_addressed_1')){echo ($this->lang->line('contact_addressed_1'));} else{ echo 'Ahmad Bin Gh azali';} ?></p>
		<p><?php if($this->lang->line('contact_addressed_2')){echo ($this->lang->line('contact_addressed_2'));} else{ echo '75 Kg Sg Ramal Luar';} ?></p>   
		<p><?php if($this->lang->line('contact_addressed_3')){echo ($this->lang->line('contact_addressed_3'));} else{ echo '43000 Kajang Malaysia';} ?></p>                        
				
            </div>
			<div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-phone"></i></span>
            <p><?php if($this->lang->line('contact_phone')){echo ($this->lang->line('contact_phone'));} else{ echo '123 4567 8990';} ?></p>
            <div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-envelope"></i></span>
            <a href="mailto:info@myvikohome.com"><?php if($this->lang->line('contact_email')){echo ($this->lang->line('contact_email'));} else{ echo 'info@myvikohome.com';} ?></a>
        </div>
       
        </div>
        <div class="clear"></div>
    </div>
</div>