<?php if($this->Session->read("Auth.User")){ ?>
<nav id="column-left">
   <div id="profile">
      <div><a class="dropdown-toggle" data-toggle="dropdown">
      <?php //echo $this->Html->image("no_image-45x45.png",array("class"=>"img-circle"));?> </a></div>
      <div>
        <h3><?php echo __('HaRiMau'); ?></h3>
      </div>
    </div>
        <ul id="menu">
          <li id="dashboard">
          <?php echo $this->html->link($this->html->tag("i","",array("class"=>'fa fa-dashboard fa-fw'))."<span>Dashboard</span>",array("controller"=>'users',"action"=>"index"),array('escape' => false)); ?>           
          </li>

          <li id="catalog"><a class="parent"><i class="fa fa-tags fa-fw"></i>
            <span><?php echo __('Catalog'); ?></span></a>
            <ul  >
              <li>
              <?php echo $this->html->link("Categories",array("controller"=>'categories',"action"=>"index"),array('escape' => false)); ?>
              </li>
              <li>
                <?php echo $this->html->link("Products",array("controller"=>'products',"action"=>"index"),array('escape' => false)); ?>
              </li>
             </ul>
          </li>

          <li id="sale"><a class="parent"><i class="fa fa-shopping-cart fa-fw"></i>
            <span><?php echo __('Sales'); ?></span></a>
            <ul  >
              <li><a href=""><?php echo __('Orders'); ?></a></li>
              <li><a class="parent"><span><?php echo __('Customers'); ?></span></a>
                  <ul class="collapse">
                     <li><a href="/admin/customers"><?php echo __('Customers'); ?></a></li>
                     <li><a href="/admin/customergroups"><?php echo __('Customer Groups'); ?></a></li>
                  </ul>
              </li>
              <li><a href=""><?php echo __('Payment Record'); ?></a></li>              
            </ul>
          </li>   
          
          <li><a class="parent"><i class="fa fa-share-alt fa-fw"></i> <span><?php echo __('Marketing'); ?></span></a>
            <ul  >
              <li><a href=""><?php echo __('Discount items'); ?></a></li>
              <li><a href=""><?php echo __('Mail to All Users'); ?></a></li>              
            </ul>
          </li>    

          <li id="system"><a class="parent"><i class="fa fa-cog fa-fw"></i> <span><?php echo __('System'); ?></span></a>
            <ul  >
              <li><a href=""><?php echo __('General Settings'); ?></a></li>
              <li><a class="parent"><?php echo __('Payment Gateway'); ?></a></li>
              <li><a class="parent"><?php echo __('Backup/Restore'); ?></a></li>              
            </ul>
          </li>

          <li id="reports"><a class="parent"><i class="fa fa-bar-chart-o fa-fw"></i> <span><?php echo __('Reports'); ?></span></a>
            <ul  >
              <li><a href=""><?php echo __('Sales Report'); ?></a></li>
              <li><a href=""><?php echo __('Customer Report'); ?></a></li> 
              </ul>              
          </li>

          <li id="extension"><a class="parent"><i class="fa fa-puzzle-piece fa-fw"></i>
            <span><?php echo __('Ticket'); ?></span></a>
            <ul  >
              <li><a href=""><?php echo __('Ticket Home'); ?></a></li>
              <li><a href=""><?php echo __('Ticket Setting'); ?></a></li>              
            </ul>
          </li>

        </ul>
        <div id="stats">
          <ul>
            <li>
              <div><?php echo __('Orders Completed'); ?> <span class="pull-right">0%</span></div>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span> </div>
              </div>
            </li>
            <li>
              <div><?php echo __('Orders Processing'); ?> <span class="pull-right">0%</span></div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span> </div>
              </div>
            </li>
            <li>
              <div><?php echo __('Other Statuses'); ?> <span class="pull-right">100%</span></div>
              <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">100%</span> </div>
              </div>
            </li>
          </ul>
        </div>
</nav>
<?php }?>