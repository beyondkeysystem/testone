<?php //pr($this->Session->read());?>
<div class="header border-none"  id="section-1">
    <div class="header-middle" id="fixed-header">
        <div class="container">
            <div class="row">
                <div class="logo">
                    <?php echo $this->Html->link($this->Html->image('../css/images/logo.png'), '/', array('escape' => false)); ?>
                </div>
                <div class="profile-pic">
                    <div class="dropdown">
                        <?php if(isset($customerdata['Customer']['profile_pic']) and $customerdata['Customer']['profile_pic'] !=''){?>
                                            <?php echo $this->Html->image('../profile_pic/'.$customerdata['Customer']['profile_pic'],array('width'=>'50'));?>
                                        <?php }else{?>
                                            <?php echo $this->Html->image('../css/images/pic19.jpg');?>
                                        <?php }?>
                        <a href="javascript:void(0)" class="show-detail" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php $harimau_id = $this->Session->read('Auth.User.harimau');
                                if(isset($customerdata['Customer']['fullname']) and $customerdata['Customer']['fullname'] !=''){
                                    echo $customerdata['Customer']['fullname'];
                                }else{
                                    echo $harimau_id;
                                }
                            ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li>
                                <?php echo $this->Html->link('My Profile','/users/personal',array());?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Account Setting','/users/account',array());?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Sign Out','/users/logout',array());?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>			
        </div>
    </div>				
</div>