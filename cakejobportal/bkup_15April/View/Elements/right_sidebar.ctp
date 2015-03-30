
    <div class="Sidebar-Right">
    <div class="box right-box">
    <div class="title-well">
	 <h2>Forums  </h2>	</div>
    <div class="discretion"> 
    <a href="<?php echo $this->webroot; ?>forum/"><img class="bdr-img" src="<?php echo $this->webroot; ?>css/images/pic-forum.jpg" alt="" /></a>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.  </p>
    
    </div>
	</div>
    
    <div class="box right-box">
    <div class="title-well">
	 <h2><?php echo!empty($user) ? $this->Html->link('Chat Room', array('controller' => 'im', 'action' => 'index?id=MTMzNQ==')) : 'Chat Room'; ?></h2>	</div>
    <div class="discretion"> 
    <img class="bdr-img" src="<?php echo $this->webroot; ?>css/images/pic-chat.jpg" alt="" />
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.  </p>
    
    </div>
	</div>
    
    <div class="box right-box">
    <img src="<?php echo $this->webroot; ?>css/images/pic-ads1.jpg" alt="" />
	</div>
       
    <div class="box right-box">
    <img src="<?php echo $this->webroot; ?>css/images/pic-ads2.jpg" alt="" />    
	</div>
    
     </div>
