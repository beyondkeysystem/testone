<!--Main Body-->
<div class="wrapper">
	<div class="about content">
    	<div class="title">
			<h3><?php echo ($this->lang->line('about_title')); ?><span class="col-g"><?php echo ($this->lang->line('myviko_title')); ?></span><span class="col-b"><?php echo ($this->lang->line('home_title')); ?></span></h3>
		</div>
        <div class="vikohome">
        	<div class="viko_txt">
            	<h3><?php echo ($this->lang->line('about_page_first_section_first_heading')); ?></h3>
                <p><?php echo ($this->lang->line('about_page_first_section_first_paragraph')); ?></p>		<h3><?php echo ($this->lang->line('about_page_first_section_second_heading')); ?></h3>
                <ul>
                	<li><i class="fa fa-caret-right"></i><?php echo ($this->lang->line('about_page_first_section_second_paragraph_first_li')); ?></li>
					<li><i class="fa fa-caret-right"></i><?php echo ($this->lang->line('about_page_first_section_second_paragraph_second_li')); ?></li>
					<li><i class="fa fa-caret-right"></i><?php echo ($this->lang->line('about_page_first_section_second_paragraph_third_li')); ?></li>
					<li><i class="fa fa-caret-right"></i><?php echo ($this->lang->line('about_page_first_section_second_paragraph_fourth_li')); ?></li>
                </ul>
            </div>
       		<div class="viko_pic">
            	<img src="<?php echo base_url(); ?>assets/front/images/about.jpg">
            </div>
        	<div class="clear"></div>
        </div>  
        <!--Viko Vision--> 
        <div class="title">
			<h3><span class="col-g"><?php echo ($this->lang->line('myviko_title')); ?></span><span class="col-b"><?php echo ($this->lang->line('home_title')); ?></span> <?php echo ($this->lang->line('vision_title')); ?></h3>
		</div>
        <div class="viko_vision"><?php echo ($this->lang->line('about_page_second_section__paragraph')); ?></div>
        <!--/.Viko Vision-->  
        <!--Viko Mission--> 
        <div class="title">
			<h3><span class="col-g"><?php echo ($this->lang->line('myviko_title')); ?></span><span class="col-b"><?php echo ($this->lang->line('home_title')); ?></span><?php echo ($this->lang->line('mission_title')); ?></h3>
		</div>
        	<div class="vikohome mission">
        	<div class="viko_txt">
                <p><?php echo ($this->lang->line('about_page_third_section__paragraph')); ?></p>		
            </div>
       		<div class="viko_pic">
            	<img src="<?php echo base_url(); ?>assets/front/images/dart.jpg">
            </div>
        	<div class="clear"></div>
        </div>
        <!--/.Viko Mission--> 
    </div>
</div>