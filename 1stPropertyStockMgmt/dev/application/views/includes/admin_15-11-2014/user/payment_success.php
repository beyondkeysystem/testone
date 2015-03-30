<?php
$this->load->view('home/breadcrumb');
?>
<!--Main Body-->
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<div class="usernotification"><h3><?php echo $message; ?></h3></div>
           
        </div>
        <div class="reg-right">
        	
            <h4>Your Property Search Begins and Ends with Us</h4>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            <ul>
            	<li><span><i class="fa fa-star"></i></span><div class="icotxt"><strong>Shortlist your Favourite Properties</strong><p>Save, view or compare your favourite properties anytime</p></div></li>
                <li><span><i class="fa fa-dollar"></i></span><div class="icotxt"><strong>Sell Your Property</strong><p>Post an ad listing and sell your property for a minimum fee</p></div></li>
                <li><span><i class="fa fa-bell"></i></span><div class="icotxt"><strong>Get Property Alerts </strong><p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p></div></li>
                <li><span><i class="fa fa-building"></i></span><div class="icotxt"><strong>Post Property Wanted Requests</strong><p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit.</p></div></li>
            </ul>
           
            <!--<div class="building"><img src="images/building.png"></div>-->
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--/.Main Body-->
<?php $this->load->view('home/blue_bar'); ?>