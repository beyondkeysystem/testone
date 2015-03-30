<!--Wrapper--> 
<!--Slider-->
<!--/*Mayank Pawar
    ** Date : 27.11.14  
    */ -->
<style>
.icons li:last-child{
  width: 100%;
}
.owl-item span{
  border :none;
}
</style>
<?php
  //$servername = "localhost";
  //$username = "pdcisinl_myviko";
  //$password = "ReM=sKCrWe?[";
  //$dbname = "pdcisinl_myvikotest";
  //$con = mysqli_connect($servername,$username,$password,$dbname) or die("Failed to connect to MySQL: " . mysqli_connect_error());
  //$sql = "SELECT * FROM property WHERE property_status <> 'blocked' ORDER BY created DESC";
  //$result = $con->query($sql);
  
  
?>
<!--/*Mayank Pawar
    ** Date : 27.11.14  
    */ -->
<div class="wrapper">
  <div class="lpl_slider">
    <div class="title">
      <h3><?=$this->lang->line('latest_prop_listings')?></h3>
    </div>
    <div id="owl-demo" class="owl-carousel">
      <?php
      foreach ($user_property_image as $j => $row) {
        echo '<div class="item minislider">';
          $prop_image = !empty($row['property_image']) ? ''.base_url().'uploads/'.$row['property_image'].'' : ''.base_url().'assets/front/images/property-no-image.png';
          echo '<div><img src="'.$prop_image.'" alt="Owl Image" class="property_listing_image">';
            if($row['property_status'] == 'selling'){
              $status = $this->lang->line('sell');
            }else if($row['property_status'] == 'pending'){
              $status = $this->lang->line('pending');
            }else{
              $status = $this->lang->line('owned');
            }
            echo '<div class="circle">'.$status.'</div>';
            echo '</div>';
            echo '<h4>'.$row['property_name'].'</h4>';
            echo '<ul class="icons">
                      <li><img src="'.base_url().'assets/front/images/icon1.png"> '.$this->lang->line('beds').': '.$row['property_bedrooms'].'</li>
                      <li><img src="'.base_url().'assets/front/images/icon2.png"> '.$this->lang->line('bath').': '.$row['property_bathrooms'].'</li>';
                      ?>

                      <li> <?=$this->lang->line('share_available')?>: <span>
                      <?php
                        if($sold[$j] !=0){ 
                          echo round($sold[$row['id']],2);
                        }else{ 
                          if($row['property_status']=='owned'){
                            echo round($sold[$row['id']],2);
                          }else if($row['property_status']=='selling'){
                            echo round($available[$row['id']],2);
                          }else{
                            echo 0;                            
                          }
                        }                      
                      ?> % 
                      </span></li>
                      <!--<li><img src="'.base_url().'assets/front/images/icon3.png"> City: '.$row['property_location'].'</li>-->
                    </ul>
                    <?php
                      $arrow = '';
                      if($row['property_current_price'] - $row['property_initial_price'] > 0){
                        $arrow = '<i class="fa fa-arrow-up greencolor"></i>';
                      }else if($row['property_current_price'] - $row['property_initial_price'] < 0){
                        $arrow = '<i class="fa fa-arrow-down redcolor"></i>';
                      }
                    ?>
          <?php
          echo '<p><strong>'.$this->lang->line('search_location').': </strong>'.$row['property_location'].'</p>';
          echo '<div class="rm_btn"> <span>'.$arrow.'MYR '.$row['property_current_price'].'</span> 
                  <a href="'.base_url().'property_details/'.$row['id'].'">'.$this->lang->line('read_more').'</a> 
                </div>
          </div>';
        } //End while

      ?>      

      <!-- <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr1.png" alt="Owl Image">
          <div class="circle">Sale</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr2.png" alt="Owl Image">
          <div class="circle">Sale</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr3.png" alt="Owl Image">
          <div class="circle">Rent</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr4.png" alt="Owl Image">
          <div class="circle">Rent</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr2.png" alt="Owl Image">
          <div class="circle">Sale</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr4.png" alt="Owl Image">
          <div class="circle">Rent</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr1.png" alt="Owl Image">
          <div class="circle">Sale</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div>
      <div class="item minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr3.png" alt="Owl Image">
          <div class="circle">Rent</div>
        </div>
        <h4>Sed ut perspiciatis unde omnis</h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: 3</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: 1</li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: Jasper</li>
        </ul>
        <p><strong>Add:</strong> La-14, Silver Mall, 8, Rabindranath Tagore Marg, Rabindranath Tagore Marg
          Indore, Madhya Pradesh</p>
        <div class="rm_btn"> <span>$720,000.00</span> <a href="<?php echo base_url(); ?>/property_details">Read More</a> </div>
      </div> -->
    </div>
  </div>
  <!--/.Slider--> 