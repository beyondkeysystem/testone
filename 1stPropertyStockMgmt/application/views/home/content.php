<?php //Here we call all partials ?>
<!--Text + Image-->
<div class="wrapper">
  <div class="text_pic">
    <div class="heading">
      <h2><?php echo ($this->lang->line('home_page_content_title')); ?></h2>
      <p><?php echo ($this->lang->line('home_page_content_description')); ?></p>
    </div>
    <div class="pic"> <img src="<?php echo base_url(); ?>assets/front/images/img1.png"> </div>
    <div class="text">
      <h3><?php echo ($this->lang->line('home_page_content_sub_tilte')); ?></h3>
      <p><?php echo ($this->lang->line('home_page_content_sub_para1')); ?></p>
      <p><?php echo ($this->lang->line('home_page_content_sub_para2')); ?> </p>
    </div>
    
    <div class="clear"></div>
  </div>
</div>
<!--/Text + Image--> 