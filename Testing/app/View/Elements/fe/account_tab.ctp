<!--<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Account Security</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Personal</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Services</a></li>
</ul>-->

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?php if($this->params->action =='account'){?> class="active"<?php }?> >
        <?php echo $this->Html->link('Account Security','/users/account',array('aria-controls'=>"home",'role'=>"tab"));?>
    </li>
    <li role="presentation" <?php if($this->params->action =='personal'){?> class="active"<?php }?>>
        <?php echo $this->Html->link('Personal','/users/personal',array('aria-controls'=>"home",'role'=>"tab"));?>    
    </li>
    <li role="presentation" <?php if($this->params->action =='services'){?> class="active"<?php }?>>
        <?php echo $this->Html->link('Services','/users/services',array('aria-controls'=>"home",'role'=>"tab"));?>    
    </li>
</ul>