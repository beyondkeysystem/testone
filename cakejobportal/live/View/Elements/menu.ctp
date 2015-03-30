<nav role="navigation" class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php
            if(isset($auth_data)){
                  if($auth_data['type'] == 'employer'){
                        $etype=$this->webroot."".$auth_data['type']."/profile";
                        $ctype=$this->webroot;
                  }
                  elseif($auth_data['type'] == 'candidate'){
                        $ctype=$this->webroot."".$auth_data['type']."/candidate_profile";
                        $etype=$this->webroot;
                  }                  
            }
            else{
                  $etype=$this->webroot;
                  $ctype=$this->webroot;
            }
            $home_type=$this->webroot;
            ?>
            <li><a href="<?php echo $home_type; ?>">Home</a></li>
            
            <li><a href="#">Daily Deals</a></li>
            <li><a href="#">Help / Report Abuse</a></li>
            <li><a href="#">Knowledge Room</a></li>
            <li><a href="<?=$etype?>">Employer</a></li>
            <li><a href="<?=$ctype?>">Candidates</a></li>
            <li><!--<a href="#">Contact Us</a>-->
            <?php echo $this->Html->link(__('Contact Us'), array('controller' => 'contact', 'action' => 'index')); ?>
            </li>
          </ul>
          
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>