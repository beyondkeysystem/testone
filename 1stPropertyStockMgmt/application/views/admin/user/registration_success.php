<?php
$this->load->view('home/breadcrumb');
?>
<!--Main Body-->
<div class="notif_overlay close_reg"><div class="usernotification usernotification_register"><p class="close_register">Close <i class="fa fa-remove close_reg"></i></p> 
    <br/><br/><h6><center><?php echo $message;?></center></h6><br/><br/></div></div>
<div class="wrapper">
	<div class="register register_success">
        <div class="reg-right">
        	
            <h4><?=$this->lang->line('registration_success_title')?></h4>
            <p><?=$this->lang->line('registration_success_para')?></p>
	    <?=$this->lang->line('registration_success_list')?>
          
           
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
