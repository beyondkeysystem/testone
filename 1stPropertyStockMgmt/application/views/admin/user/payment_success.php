<?php
$this->load->view('home/breadcrumb');
?>
<!--Main Body-->
<div class="notif_overlay close_reg"><div class="usernotification usernotification_register"><p class="close_register">Close <i class="fa fa-remove close_reg"></i></p> 
    <br/><br/><h6><center>Your Payment Successfully Deposit of Amount <?php echo $this->session->userdata('success_amount'); ?> MYR. <br/> Your deposit will be process by admin as soon as possible upon we received your payment, Thank You.</center></h6></br><br/></div></div>
<div class="wrapper">
    <div class="register register_success">
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
<script type="text/javascript">
$(document).ready(function(e) {
    $(".close_reg").click(function(){
    $(".notif_overlay").css("display","none");
    })
    
$(document).keyup(function(e) {
  if (e.keyCode == 27) { 
    $(".notif_overlay").css("display","none");
  }
});
});
</script>
<?php $this->load->view('home/blue_bar'); ?>


<?php
$this->load->view('home/breadcrumb');
?>
<!--Main Body-->
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<div class="usernotification"><h3>Your Payment Successfully Deposit of Amount <?php echo $this->session->userdata('success_amount'); ?> MYR. <br/> Your deposit will be process by admin as soon as possible upon we received your payment, Thank You.</h3></div>
           
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