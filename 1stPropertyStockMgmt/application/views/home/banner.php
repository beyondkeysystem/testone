<!--Banner-->
<?php
//echo '<pre>';
//print_r($property_image); die;
?>
<div class="banner">
  <div id="owl" class="owl-carousel">
  
    <?php foreach($user_property_image as $property_image){ ?>
    
    
    <div class="item"><img src="<?php echo base_url(); ?><?php if($property_image['property_image'] != NULL){echo 'uploads/'.$property_image['property_slider_image']; }else{ echo 'assets/front/images/noproperty.png';}?>" width="1600" height="551">
    	<div class="ban_content">
        	<h1><?php echo $property_image['property_name']; ?></h1>
            <p><?php echo $property_image['property_type']; ?></p>
            <div class="tag_plus_btn">
            	<a href="<?php echo base_url(); ?>property_details/<?php echo $property_image['id']; ?>" class="tag"><span><i class="fa fa-tag"></i></span> <?php echo "MYR ".number_format($property_image['property_current_price'],2); ?></a>
            	<a href="<?php echo base_url(); ?>property_details/<?php echo $property_image['id']; ?>" class="plus"><span><i class="fa fa-plus-circle"></i></span><?php echo ($this->lang->line('first_banner_more_details')); ?></a>
        	</div>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
<div class="clear"></div>
<!--/.Banner--> 
