<!--Header-->
<?php $this->load->view('includes/front/header'); ?>

<?php $this->load->view('includes/front/navigation'); ?>
<?php $this->load->view('home/breadcrumb');  ?>
<?php   if(!$this->session->userdata('is_logged_in')){
   ?>
  <div class="map content">
    <div class="wrapper">
        <div class="contact-form">
		  <div class="alertuser"> Please login to see this page</div>
        </div>
        <div class="add_detail">
        <div class="title">
			<h3>Contact Us</h3>
		</div>
        <h2><span class="col-g">MyViko</span><span class="col-b">Home</span></h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia</p>
        <div class="add_icons">
        	<span><i class="fa fa-map-marker"></i></span>
            <div class="address">
            	<p>Ahmad Bin Gh azali</p>
				<p>75 Kg Sg Ramal Luar</p>   
				<p>43000 Kajang Malaysia</p>                        
				
            </div>
			<div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-phone"></i></span>
            <p>123 4567 8990</p>
            <div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-envelope"></i></span>
            <a href="mailto:info@myvikohome.com">info@myvikohome.com</a>
        </div>
       
        </div>
        <div class="clear"></div>
    </div>
</div>

           
      <?php  } else{?>

<!--/.Header-->

<!--Main Content-->

	
<div id="admin_tabs">
<!--Tabs-->
<div class="admin_tab">  
<ul>
<li><a href="#tabs-1"><?php if($this->lang->line('dashboard_all_properties')){echo ($this->lang->line('dashboard_all_properties'));} else{ echo 'All Properties';} ?></a></li>
<li><a href="#tabs-2"><?php if($this->lang->line('credit_detail')){echo ($this->lang->line('credit_detail'));} else{ echo 'Funds Management';} ?></a></li>
</ul>
</div>
<div class="clear"></div>
<!--/.Tabs-->
<!--Tabs content-->
<div class="admin_content ac">
<div id="tabs-1">
<table class="admin_table">
 
 <?php  foreach($property_information as $property_information){?>
 <tr>
 	<td>
    <table class="cel1">
    <tr>
    <td><a href="#"><img  height="50" width=" 50" src="<?php echo base_url(); ?>assets/front/images/<?php echo $property_information['property_image'];?>" alt=""></a></td>
    <td>
    	<div class="hash">
            <p class="us"><a href="#"><?php echo $property_information['property_name']; ?></a></p>
            <span class="us"><?php echo $property_information['property_location']; ?></span>
            <div class="admin_prop_percent_block">
			    <div class="admin_prop_percent_range">
                	<span class="app_range1">Owned: 20%</span>
                    <span class="app_range2">Available: 80%</span>
                </div>
            	<div class="admin_prop_percent">
            		<span></span>
            	</div>
            </div>
        </div>
    </td>
    </tr>
    </table>
    </td>
    <td>
    <table class="cel2">
    <tr>
    <td>
    <table class="pltable">
  <tbody><tr>
    <td>MYR <?php if($property_information['profit']!=0){echo $property_information['profit']; }else{ echo $property_information['loss'];}?></td>
    <td class="greencolor"><?php echo $property_information['property_share_in_per']; ?>%</td>
  </tr>
  <tr>
    <td><?php if($property_information['profit']!=0){ if($this->lang->line('dashboard_my_profit')){echo ($this->lang->line('dashboard_my_profit'));} else{ echo 'My Profit';} }else{if($this->lang->line('dashboard_my_loss')){echo ($this->lang->line('dashboard_my_loss'));} else{ echo 'My Loss';}} ?></td>
    <td><?php if($this->lang->line('dashboard_my_shares')){echo ($this->lang->line('dashboard_my_shares'));} else{ echo 'My Shares';} ?></td>
  </tr>
</tbody></table>
	</td>
    
    <td>
    	<div class="adminview">
    		<strong><i class="fa fa-arrow-up greencolor"></i>  MYR <?php echo $property_information['property_current_price']; ?></strong>
    		<div class="checkplan_btn"> <a href="<?php echo base_url(); ?>property_details/<?php echo $property_information['id'];?>"><?php if($this->lang->line('dashboard_view_more')){echo ($this->lang->line('dashboard_view_more'));} else{ echo 'View More';} ?></a> </div>
            <div class="clear"></div>
    	</div>
    </td>
    </tr>
    </table>
    </td>
    <td class="cel3"><img src="<?php echo base_url(); ?>assets/front/images/adg.png" alt=""></td>
  </tr>
 
 <?php } ?>
  
</table>

</div>
<?php //For fund/credit details management ?>
  <div id="tabs-2">
	<!--p><?php //if($this->lang->line('dashboard_credit_detail')){echo ($this->lang->line('dashboard_credit_detail'));} else{ echo 'Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.';} ?></p-->
	<?php $this->load->view('credit_detail'); ?>
  </div>
</div>
<!--/.Tabs content-->
</div>
<?php } ?>
<?php $this->load->view('includes/front/footer'); ?>