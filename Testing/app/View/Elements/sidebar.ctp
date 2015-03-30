<?php if($this->Session->read("Auth.User")){ ?>
<nav id="column-left">
   <div id="profile">
      <div><a class="dropdown-toggle" data-toggle="dropdown">
      <?php //echo $this->Html->image("no_image-45x45.png",array("class"=>"img-circle"));?> </a></div>
      <div>
        <h3>HaRiMau</h3>
      </div>
    </div>
        <ul id="menu">
          <li id="dashboard">
          <?php echo $this->html->link($this->html->tag("i","",array("class"=>'fa fa-dashboard fa-fw'))."<span>Dashboard</span>",array("controller"=>'users',"action"=>"index"),array('escape' => false)); ?>           
          </li>

          <li id="catalog"><a class="parent"><i class="fa fa-tags fa-fw"></i>
            <span>Catalog</span></a>
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
            <span>Sales</span></a>
            <ul  >
              <li><?php echo $this->Html->link('Orders','/admin/orders',array(''));?></li>
              <li><a class="parent"><span>Customers</span></a>
                  <ul class="collapse">
                     <li><a href="/admin/customers">Customers</a></li>
                     <li><a href="/admin/customergroups">Customer Groups</a></li>
                  </ul>
              </li>
              <li><?php echo $this->Html->link('Payment Record','/admin/payments',array(''));?></li>                 
            </ul>
          </li>   
          
          <li><a class="parent"><i class="fa fa-share-alt fa-fw"></i> <span>Marketing</span></a>
            <ul  >
<!--              <li><a href="">Discount items</a></li>-->
              <li><?php echo $this->html->link("Mail to All Users",array("controller"=>'mails',"action"=>"index"),array('escape' => false)); ?>
              </li>
<li><?php echo $this->Html->link('Fcode','/admin/fcodes',array(''));?></li>
            </ul>
          </li>    

          <li id="system"><a class="parent"><i class="fa fa-cog fa-fw"></i> <span>System</span></a>
            <ul  >
              <li>
                <?php echo $this->html->link("Mail Settings",array("controller"=>'Settings',"action"=>"edit"),array('escape' => false)); ?>  <!-- <a href="">General Settings</a> -->
              </li>
<!--              <li><a class="parent">Payment Gateway</a></li>
              <li><a class="parent">Backup/Restore</a></li> -->
              <li><a class="parent"><span>Shipping</span></a>
                  <ul class="collapse">
                     <li><?php echo $this->html->link("Shipping Charge",array("controller"=>'shippings',"action"=>"index"),array('escape' => false)); ?></li>
                     <li><?php echo $this->html->link("Min order price",array("controller"=>'orderprices',"action"=>"index"),array('escape' => false)); ?></li>
                  </ul>
              </li>              
            </ul>
          </li>

<!--          <li id="reports"><a class="parent"><i class="fa fa-bar-chart-o fa-fw"></i> <span>Reports</span></a>
            <ul  >
              <li><a href="">Sales Report</a></li>
              <li><a href="">Customer Report</a></li> 
              </ul>              
          </li>-->

          <li id="extension"><a class="parent"><i class="fa fa-puzzle-piece fa-fw"></i>
            <span>Ticket</span></a>
            <ul  >
              <li>
                <?php echo $this->html->link("Ticket Home",array("controller"=>'tickets',"action"=>"index"),array('escape' => false)); ?>
                <!-- <a href="">Ticket Home</a> -->
              </li>
<!--               <li><a href="">Ticket Setting</a></li> -->              
            </ul>
          </li>

        </ul>
        <div id="stats">
          <ul>
            <li>
              <div>Orders Completed <span class="pull-right">0%</span></div>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span> </div>
              </div>
            </li>
            <li>
              <div>Orders Processing <span class="pull-right">0%</span></div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span> </div>
              </div>
            </li>
            <li>
              <div>Other Statuses <span class="pull-right">100%</span></div>
              <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">100%</span> </div>
              </div>
            </li>
          </ul>
        </div>
</nav>
<?php }?>
