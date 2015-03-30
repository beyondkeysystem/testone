<script type="text/javascript">
   function openNote(){
    document.getElementById("hidden_div").style.display="block";
    document.getElementById("notification").style.display="none";
	hidden_div.show();
    }
</script>
<?php
function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
?>
<header class="header">
    <section class="top-wrap">
    <section class="container">
    <div class="row">
    <aside class="col-md-7 pull-right clearfix">
    <ul class="top-buttons pull-right"  >
    <li><a href="#"><i class="fa fa-link"></i></a><?php echo $this->Html->link(__('Upgrade link'), array('controller' => 'employer', 'action' => 'upgrade_category')); ?></li>
    
 <!--   <li>
	<a href="#" onclick="openNote()" >
	    <i class="fa fa-info-circle"></i>
	    <span id="notification" class="notification blink"><?php echo $note_count; ?></span>
	    Notifications
	</a>
	<ul class="hidden_div" id="hidden_div">
	   <?php
	   $i =0;
	   foreach($note_data as $note_info) {
	    if($i < 5 )
	    {
	    ?>
	    <!--<li>
		<a href="<?php echo $note_info['notifications']['url']; ?>"><?php echo $note_info['notifications']['message']; ?></a>
	    </li>-->
	    <?php $i++; }
	    } ?>
	<!--</ul>
	
    </li>-->
<?php
if(!isset($page))
{
    $page = 'common';
}
if(isset($page) AND $page != 'signup') {  ?>
   <li>
	<div class="collapse navbar-collapse notification_div">
           
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a style="position: relative;" id="notifications" href="#" role="button" class="dropdown-toggle notymanager-opened" data-toggle="dropdown">
                        <i class="fa fa-info-circle"></i><span style="margin-left: -20px; top: 8px; opacity: 1;" class="noty-manager-bubble"> <?php if(isset($note_count) AND $note_count !='' ) { echo $note_count; } ?></span>
		    Notifications
		    </a>

                    <div id="notification-container" class="dropdown-menu" role="menu" aria-labelledby="drop3">

                        <section class="panel">
                            <header class="panel-heading">
                                <strong>Notifications</strong>
                            </header>
                            <div id="notification-list" class="list-group list-group-alt">
		<?php

		if(isset($note_data) AND $note_data !='')
		{
		    if(isset($note_data['alert']))
		    { ?>
			 <div style="">
                                    <div class="noty-manager-list-item noty-manager-list-item-information">
                                        <div class="activity-item">
                                            <i class="fa fa-shopping-cart text-success"></i>
                                            <div class="activity">
						<?php echo $this->Html->link(__($note_data['alert']), array('controller' => 'employer', 'action' => 'upgrade_category')); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
		   <?php }
		$i =0;
		foreach($note_data as $note_info) {
		if($i < 3 )
		{
		?>
		<?php
		        if(isset($note_info['notifications']['noti_time']))
			    { ?>
                                <div style="">
                                    <div class="noty-manager-list-item noty-manager-list-item-information">
                                        <div class="activity-item">
                                            <i class="fa fa-shopping-cart text-success"></i>
                                            <div class="activity">
                                                <a href="<?php if(isset($note_info['notifications']['url'])) echo $note_info['notifications']['url']; ?>">
						<?php if(isset($note_info['notifications']['message'])) echo $note_info['notifications']['message']; ?>
						<span>
						    <?php
						    if(isset($note_info['notifications']['noti_time']))
						    {
						    $noti_time = $note_info['notifications']['noti_time'];
						    $time = strtotime($noti_time);
						    echo 'event happened '.humanTiming($time).' ago';
						    }
						    ?>
						</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
		<?php
			    }
		  $i++; }
		}
		}
		?>
		
                               <!-- <div style="">
                                    <div class="noty-manager-list-item noty-manager-list-item-information">
                                        <div class="activity-item">
                                            <i class="fa fa-heart text-danger"></i>
                                            <div class="activity">
                                                Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a>
                                                <span>35 minutes ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="">
                                    <div class="noty-manager-list-item noty-manager-list-item-information">
                                        <div class="activity-item">
                                            <i class="fa fa-check text-success"></i>
                                            <div class="activity">
                                                Mail server was updated. See <a href="#">changelog</a> <span>About 2 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="">
                                    <div class="noty-manager-list-item noty-manager-list-item-information">
                                        <div class="activity-item">
                                            <i class="fa fa-tasks text-warning"></i>
                                            <div class="activity">
                                                There are <a href="#">6 new tasks</a> waiting for you. Don't forget! <span>About 3 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <footer class="panel-footer">
                                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                            </footer>
                        </section>

                    </div>
                </li>
		
            </ul>
        </div>
        <!--/.nav-collapse -->
	<script type="text/javascript">

    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
        // NotyManager initialization
      /*  window.NotyManager = new $.NotyManager($('#notifications'), {
            bubble   : { // bubble positioning settings
                top : 10,
                left: -2,
                showZero: true
            },
            max: 30, // max bubble count
            container: $('#notification-list'), // this this the notification container
            wrapper: '<div/>', // this is the wrapper of the a single notification
            emptyHTML: '<div class="no-notification">There is no notification in here</div>',
            callback: {
                onOpen: function() {
                    // NotyManager instance accessible with this variable in this scope
                    if (typeof console != 'undefined' && console.log)
                        console.log('opened', this);
                },
                onClose: function() {
                    // NotyManager instance accessible with this variable in this scope
                    if (typeof console != 'undefined' && console.log)
                        console.log('closed', this);
                }
            },
            // Below settings for the using open source Noty plugin
            useNoty: true, // if true notifications also appears on the screen
            noty: { // this settings used when if useNoty is `true`
                layout: 'bottomLeft',
                timeout: false,
               // closeWith: ['button']
            }
        });*/
    });

</script>


   </li>
<?php } ?>
    <li>
    
    <?php
  //  pr($user);
    if(!empty($user)) {
	if($user['type'] == 'candidate')
	{
	    echo '<a href="#"><i class="fa fa-lock"></i> </a>'.$this->Html->link(__('Edit Skills'), array('controller' => 'candidate', 'action' => 'update_skill'));
	}
	else
	{
	    echo '<a href="#"><i class="fa fa-lock"></i> </a>'.$this->Html->link(__('Edit Profile'), array('action' => 'profile_edit'));
	}
    }
    else{
    echo '<a href="#"><i class="fa fa-lock"></i>'.$this->Html->link(__('Sign Up'), array('controller' => 'users', 'action' => 'signup')).'</li>'; 
    }
   ?>
    <li>
    <?php echo !empty($user) ? '<a href="#"><i class="fa fa-power-off"></i> </a>'.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) : '<a href="'.$this->webroot.'users/login"><i class="fa fa-power-off"></i>Log in</a>'; ?>
    </li>
    </ul>
    </aside>
	</div>
    </section>
    
    </section>
    
    <section class="container">
    <div class="row search">
    <aside class="col-sm-6">
    <a class="brand" href="<?php echo $this->webroot; ?>"><img src="<?php echo $this->webroot; ?>css/images/logo.png" alt="" /></a>
    </aside>
    <aside class="col-sm-6">
    <div class="search-box"> 
    <form class="form-search">
    <input type="text" placeholder="What are you looking for?" />
    <button type="submit" class="btn"><i class="fa fa-search"></i>Search</button>
    </form>
    </div>
    </aside>
    </div>
    </section>
    
    <section  class="nav-wrap">
      <div class="container">
      <div class="row">
      <!-- Start: Navigation wrapper -->
      
      <?php  echo $this->element('menu'); ?>
      
      </div>
    </div>
    </section>
    </header>
