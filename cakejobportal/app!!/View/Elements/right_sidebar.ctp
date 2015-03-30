
    <div class="Sidebar-Right">
    <div class="box right-box">
    <div class="title-well">
	 <h2>Forums  </h2>	</div>
    <div class="discretion"> 
    <a href="<?php echo $this->webroot; ?>forum/"><img class="bdr-img" src="<?php echo $this->webroot; ?>css/images/pic-forum.jpg" alt="" /></a>
    <a href="<?php echo $this->webroot; ?>forum/"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.  </p></a>
    
    </div>
	</div>
    
<?php if(isset($check_page) AND $check_page == 'upgrade')  { ?>    
<div class="box right-box">
    <div class="title-well">
	 <h2>Job Alerts</h2></div>
    <div class="discretion"> 
    	<img class="bdr-img" src="<?php echo $this->webroot ?>css/images/job_alert.jpg" alt="" />
    	<h4>Job Alerts & News Feed</h4>
        <ul class="bullet_list bl1">
        	<li>
            	<i class="fa fa-caret-right"></i>
                <?php echo $this->Html->link(__('Upgrade'), array('controller' => 'upgrade', 'action' => 'index')); ?>
            </li>
            <li>
            	<i class="fa fa-caret-right"></i>
                <!--<a href="#">Advertise</a>-->
		<?php echo $this->Html->link(__('Advertise'), array('controller' => 'upgrade', 'action' => 'index#advertise')); ?>
            </li>
             <li>
            	<i class="fa fa-caret-right"></i>
		<?php echo $this->Html->link(__('Post a Job'), array('controller' => 'employer', 'action' => 'postadd')); ?>
            </li>
        </ul>
    </div>
</div>
    <?php } else {?>
    <div class="box right-box">
    <div class="title-well">
	 <h2> <a href="<?php echo $this->webroot; ?>chat/room/"> Chat Room </a></h2>	</div>
    <div class="discretion"> 
    <a href="<?php echo $this->webroot; ?>chat/room/"> <img class="bdr-img" src="<?php echo $this->webroot; ?>css/images/pic-chat.jpg" alt="" /> </a>
    <p> <a href="<?php echo $this->webroot; ?>chat/room/"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </a>  </p>
    
    </div>
     </div>
    <?php } ?>
    
    <div class="box right-box">
    <img src="<?php echo $this->webroot; ?>css/images/pic-ads1.jpg" alt="" />
	</div>
       
    <div class="box right-box">
    <img src="<?php echo $this->webroot; ?>css/images/pic-ads2.jpg" alt="" />    
	</div>
    
     </div>
