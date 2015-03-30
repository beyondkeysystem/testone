<?php //Here we call partials and property listing features ?>
<?php $this->load->view('home/breadcrumb'); ?>
<?php $this->load->view('home/search_property'); ?>

<!--Property Listing Tab-->
<div class="wrapper">
	<div class="listing_tab">
		<div class="title">
			<h3>Property Listing</h3>
		</div>
        <!--Tab-->
      	<div id="container">
  <div id="">
    <div class="">
      <!---->
      <?php
       $i=0;
       foreach($property_information as $row)
       {
         $i++;
      ?>
      <div class="item samebox minislider">
        <div><img src="<?php echo base_url(); ?>assets/front/images/pr<?=$i?>.png" alt="Image">
       
          <div class="circle"><?php echo $row['property_status'];?></div>
        </div>
        <h4><?=$row['property_name']?></h4>
        <ul class="icons">
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon1.png"> Beds: <span><?=$row['property_bedrooms']?></span></li>
          <li><img src="<?php echo base_url(); ?>assets/front/images/icon2.png"> Bath: <span><?=$row['property_bathrooms']?></span></li>
          <!--li><img src="<?php echo base_url(); ?>assets/front/images/icon3.png"> City: <span><?=$row['property_type']?></span></li-->
        </ul>
        <p><strong>Location:</strong> <?=$row['property_location']?></p>
        <div class="rm_btn"> <span><i class="fa fa-arrow-up greencolor"></i> $<?=$row['property_current_price']?></span> <a href="<?php echo base_url(); ?>property_details/<?php echo $row['id'];?>">Read More</a> </div>
      </div>
      <?php } ?>
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
