<div class="header-middle" id="fixed-header">
<div class="container">
<div class="row">
<div class="logo">
<a href="/"> <img src="/css/images/logo.png" alt="logo"> </a>
</div>

<div class="header-middle-right">
	      <nav class="navbar navbar-default">
		  <div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						  <span class="sr-only"><?php echo __('Toggle navigation'); ?></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
				  </button>
		  </div>
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
						  <li><a href="/"><?php echo __('HaRiMau 1'); ?></a></li>
						  <li><a href="/news"><?php echo __('News'); ?></a></li>
						  <li><a href="/store"><?php echo __('Store'); ?></a></li>
						<?php if($this->Session->read("Auth.User")){ ?>
                                                  <li><a href="/tickets/openticket/3"><?php echo __('Tickets'); ?></a></li>
                                                  <?php }?>
						  <li><a href="/aboutus"><?php echo __('About Us'); ?></a></li>
						  <li><a href="/contactus"><?php echo __('Contact Us'); ?></a></li>
				  </ul>
		  </div>
	      </nav>
</div>
</div>			
</div>
</div>
