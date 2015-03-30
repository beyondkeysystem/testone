<header class="header">
    <section class="top-wrap">
    <section class="container">
    <div class="row">
    <aside class="col-md-7 pull-right clearfix">
    <ul class="top-buttons">
    <li><a href="#"><i class="fa fa-link"></i>Upgrade link </a></li>
    <li><a href="#"><i class="fa fa-info-circle"></i>Notifications </a></li>
   
    <li>
    <?php echo!empty($user) ? '<a href="#"><i class="fa fa-lock"></i> </a>'.$this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['id'])) : '<a href="#"><i class="fa fa-lock"></i>Sign Up </a></li>'; ?>
    
   
    <li>
    <?php echo!empty($user) ? '<a href="#"><i class="fa fa-power-off"></i> </a>'.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) : '<a href="#"><i class="fa fa-power-off"></i>Log in/Register </a>'; ?>
    </li>
    </ul>
    </aside>
	</div>
    </section>
    
    </section>
    
    <section class="container">
    <div class="row search">
    <aside class="col-sm-6">
    <a class="brand"><img src="/css/images/logo.png" alt="" /></a>
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