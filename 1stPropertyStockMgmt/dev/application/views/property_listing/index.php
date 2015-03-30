<?php //Here we call partials and property listing features ?>
<?php $this->load->view('home/breadcrumb'); ?>
<?php $this->load->view('home/search_property'); ?>

<!--Property Listing Tab-->
<div class="wrapper">
	<div class="listing_tab">
		<div class="title">
			<h3><?=$this->lang->line('menu_property');?></h3>
		</div>
        <!--Tab-->
      	<div id="container">
  <div id="">
    <div class="">
      <!---->
      <?php
       $j=0;
       $i=0;
       if(!empty($property_information)){
       foreach($property_information as $row)
       {
         $i++;
      ?>
      <div class="item samebox minislider">
        <?php $prop_image = !empty($row['property_image']) ? ''.base_url().'uploads/'.$row['property_image'].'' : ''.base_url().'assets/front/images/property-no-image.png';
          echo '<div><img src="'.$prop_image.'" alt="Owl Image" class="property_listing_image">';
       ?>
          <div class="circle"><?php 
            if($row['property_status'] == 'owned' && $row['property_enable_disable'] == 2){
              echo $this->lang->line("blocked");
            }else{
              echo $this->lang->line($row['property_status']);
            }
          ;?></div>
        </div>
        <h4><?=$row['property_name']?></h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> <?=$this->lang->line('beds')?>: <span><?=$row['property_bedrooms']?></span></li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> <?=$this->lang->line('bath')?>: <span><?=$row['property_bathrooms']?></span></li>
          <li> <?=$this->lang->line('share_available')?>: <span><?php if($available[$j] !=0){ echo number_format($available[$j],2);}else{ if($row['property_status']=='owned'){echo number_format($sold[$j],2);}else{echo 0;}}?> % </span></li>
          <!--li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: <span><?=$row['property_type']?></span></li-->
        </ul>
        <p class="location"><strong><?=$this->lang->line('search_location')?>: </strong> <?=$row['property_location']?></p>
        <?php
          //echo "<pre>";print_r($row);
          $property_initial_price = $row['property_initial_price'];
          $property_current_price = $row['property_current_price'];
          $arrow = '';
          if($property_current_price - $property_initial_price > 0){
            $arrow = '<i class="fa fa-arrow-up greencolor"></i>';  
          }else if($property_current_price - $property_initial_price < 0){
            $arrow = '<i class="fa fa-arrow-down redcolor"></i>';  
          }
        ?>
        <div class="rm_btn"> <span><?=$arrow?></i> MYR <?=$row['property_current_price']?></span> <a href="<?php echo base_url(); ?>property_details/<?php echo $row['id'];?>"><?=$this->lang->line('read_more')?></a> </div>
      </div>
      <?php $j++; } 
    }else{
      echo $this->lang->line('no_search_result');
    }
      ?>
      <!---->
     <div class="clear"></div>
     <?php echo '<div class="prp-pagination">'.$this->pagination->create_links().'<div class="clear"></div></div>'; ?>
    </div>
  </div>
</div>
    <!--/.Tab-->
	</div> 
</div>
<!--/.Property Listing Tab-->        


<?php $this->load->view('home/blue_bar'); ?>
<style>
.icons li:last-child{
  width: 100%;
}
</style>