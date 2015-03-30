<?php //echo $user_id = $this->session->userdata('id');exit;?>
<header>
    <div class="top-row">
      <div class="container">
        <div class="col-xs-1"><a href="/" class="top-home"><i class="fa fa-home"></i></a></div>
        <div class="col-xs-10 top-link">
          <ul>
             <?php
                $user_id = $this->session->userdata('id');
                if(isset($user_id) and $user_id !=''){ ?>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Welcome: <?php echo $this->session->userdata('username')?></a></a>
                        <ul class="dropdown-menu">
                          <li><a href="/magazines/mymaganize">My magazine</a></li>
                          <li><a href="/magazines/mydraft">My draft</a></li>
                          <li><a href="/magazines/favorites">My favorites</a></li>
                          <li><a href="javascript:;">Magazine Promotion</a></li>
                          <li><a href="/users/editprofile">Edit Profile</a></li>
                          <li><a href="/users/changepassword">Change Password</a></li>
                        </ul>
                    </li>
                    <li><a href="/users/logout"><i class="fa fa-lock"></i>Logout </a></li>
                <?php }else{ ?>
                    <li><a href="/users/register"><i class="fa fa-user"></i>Register</a></li> 
                    <li><a href="javascript:;" data-toggle="modal" data-target="#basicModal"><i class="fa fa-lock"></i>Login </a></li>
                <?php }?>
            
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-sm-4 logo-box"> <a href="/"><img src="/assets/front/images/logo.png" alt="logo"></a> </div>
      <div class="col-sm-8 top-clr">
        <div class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php $action = $this->uri->segment(2);?>
                <?php $controller = $this->uri->segment(1);
                    $REQUEST_URI = $_SERVER['REQUEST_URI'];
                ?>
              <li <?php if(isset($REQUEST_URI) and $REQUEST_URI =='/'){?> class="active" <?php }?>><a href="/">Home </a></li>
              <li <?php if(isset($controller) and $controller == 'magazines' and $action ==''){?> class="active"<?php }?>><a href="<?php echo base_url()?>magazines">Featured Magazines</a></li>
              <li <?php if(isset($controller) and $controller == 'magazines' and $action =='create'){?> class="active"<?php }?>><a href="<?php echo base_url()?>magazines/create">Create new Magazine </a></li>
            </ul>
          </div>
          <!--/.nav-collapse --> 
        </div>
      </div>
    </div>
  </header>