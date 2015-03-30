<!--Header-->
<?php $this->load->view('includes/front/header'); ?>

<?php $this->load->view('includes/front/navigation'); ?>
<?php $this->load->view('home/breadcrumb');  ?>
  <?php
    
  //    $balance = 0;
  //foreach($profit_and_loss_logs as $row){ 
  //$balance = $row['debit'] - $row['credit'];
  //}
  //
  //echo '<pre>';
  //    print_r($profit_and_loss_logs);
  //    die;
  ?>
 <style>
.scrollbar
{
    margin-left: 30px;
    float: left;
    height: 600px;
    background: #F5F5F5;
    overflow-y: scroll;
    margin-bottom: 25px;
    width: 96%;
}

.force-overflow
{
    min-height: 0px;
}

#wrapper
{
    text-align: center;
    width: 100%;
    margin: auto;
}

/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
</style>
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

<div id="admin_tabs" class="demo">
<div class="wrapper"> 

<!--Tabs-->
   	<div class="admin_tab">  
<ul>

<?php
$tab_sel1 = "#tabs-1";
$tab_sel2 = "#tabs-2";
$tab_sel3 = "#tabs-3";
if($tab){
    if($tab == 1){
        $tab_sel1 = "#tabs-1";
        $tab_sel2 = "#tabs-2";
        $tab_sel3 = "#tabs-3";
    }else if($tab == 2){
        $tab_sel2 = "#tabs-1";
        $tab_sel3 = "#tabs-2";
        $tab_sel1 = "#tabs-3";
    }else if($tab == 3){
        $tab_sel3 = "#tabs-1";
        $tab_sel1 = "#tabs-2";
        $tab_sel2 = "#tabs-3";
    }
?>
<script>
    $(".admin_tab").hide();
</script>
<?php
}
?>
<li><a href="<?=$tab_sel1?>"><?php if($this->lang->line('dashboard_all_news')){echo ($this->lang->line('dashboard_all_news'));} else{ echo $this->lang->line('news_center');} ?></a></li>
<li><a href="<?=$tab_sel2?>"><?php if($this->lang->line('dashboard_all_properties')){echo ($this->lang->line('dashboard_all_properties'));} else{ echo 'My Properties';} ?></a></li>
<li><a href="<?=$tab_sel3?>"><?php if($this->lang->line('credit_detail')){echo ($this->lang->line('credit_detail'));} else{ echo 'My Fund';} ?></a></li>
</ul>
</div>


<div class="clear"></div>
<?php 
    if(isset($message)){
        echo $message;
    }
?>

<?php
if($subtab && $tab){
    if($tab == 2 && $subtab== 1){
        $this->load->view("purchase_credit", $credit_price);
        echo "<br/>";
    }else if($tab == 2 && $subtab== 2){
        foreach($user_fund_log as $val){ 
            $balance = $val['debit'] - $val['credit'] + $balance;
        }
        $data['balance']= $balance;    
        $this->load->view("funds/withdraw_fund", $data);
        echo "<br/>";

    }else if($tab == 2 && $subtab== 3){
        echo "<br/>";
        $this->load->view('credit_detail'); 
        echo "<br/>";

    }

}else{

?>
<!--/.Tabs-->
<!--Tabs content-->
<div class="admin_content ac">
    <div id="tabs-1">
        <div id="tab1">
            <table width="100%">
                <tr>
                    <th><?=$this->lang->line('title')?></th>
                    <th><?=$this->lang->line('author')?></th>
                    <th><?=$this->lang->line('date')?></th>
                </tr>
                <?php if(!empty($news)){?>
                <?php foreach($news as $val){?>
                <tr>
                    <td width="70%"><b>
                            <a href="javascript:void(0);" data-reveal-id="myBuyModal<?php echo $val->id?>" data-animation="fade"><?php echo $val->title;?></a></b>
                        <div id="myBuyModal<?php echo $val->id?>" class="reveal-modal popup" style="opacity: 1; top: 10%; height:auto; padding-bottom: 50px;top: -90px;height: 430px;overflow: auto;">
                            <h3><?php echo $val->title;?></h3>
                            <div class="close"><a class="close-reveal-modal" href="#">close <i class="fa fa-close"></i></a></div>
                            <div class="clear"></div>
                           <?php echo $val->body;?>
                            Posted by <?php echo $val->username;?> <br /><?php echo $val->created;?>
                        </div>
                        </td>
                    </td>
                    <td><?php echo $val->username;?> </td>
                    <td><?php echo $val->created;?></td>
                </tr>
                <?php } }else{?>
                <tr>
                    <td colspan="5">No record found</td>
                </tr>
                <?php }?>
            </table>
        </div>
        
    </div>
<div id="tabs-2">
<table class="admin_table">
 
 <?php  $i=0;
 
 //echo '<pre>';
 //print_r($property_information);
 //die;
 //
 $j=0;
if(!empty($property_information)){
	foreach($property_information as $key => $property_information){ 

?>
 <tr>
 	<td>
    <table class="cel1">
    <tr>
    <td><a href="<?php echo base_url(); ?>property_details/<?php echo $property_information['id'];?>"><img  height="80" width="100" src="<?php echo base_url(); ?><?php if($property_information['property_image']){echo 'uploads/'.$property_information['property_image']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt=""></a></td>
    <td>
    
    	<div class="hash">
            <p class="us"><a href="<?php echo base_url(); ?>property_details/<?php echo $property_information['id'];?>"><?php echo $property_information['property_name']; ?></a></p>
            <span class="us"><?php echo $property_information['property_location']; ?></span>
	      <?php if($property_information['property_status']=='owned'){ ?>
            <div class="admin_prop_percent_block">
			    <div class="admin_prop_percent_range">
                	<span class="app_range1"><?=$this->lang->line('owned')?>: <?php echo $owned[$i]; ?>%</span>
                    <span class="app_range2"  style="display: block;float: right;width: 100px;"><?=$this->lang->line('available')?>: <?php echo $available[$i]; ?>%</span>
                </div>
            	<div class="admin_prop_percent">
            		<span style="width: <?php echo $owned[$i]; ?>%;"></span>
            	</div>
            </div>
	    	<?php } ?>
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
    <?php 
        // echo "<pre>";print_r($profit_and_loss_logs);

    ?>
   <?php if($property_information['property_status']=='owned'){ ?>
    <td>MYR <?php if($profit_and_loss_logs[$key][0]['profit_loss']>0){echo $profit_and_loss_logs[$key][0]['profit_loss']; }else{ echo  $profit_and_loss_logs[$key][0]['profit_loss'];}?></td>
    <?php }?>
    <td class="greencolor"><?php echo $property_information['property_share_in_per']+$property_information['sell_property_share']; ?>%</td>
  </tr>
  <tr>
     <?php if($property_information['property_status']=='owned'){ ?>
    <td><?php if($profit_and_loss_logs[$key][0]['profit_loss'] > 0){ if($this->lang->line('dashboard_my_profit')){echo ($this->lang->line('dashboard_my_profit'));} else{ echo 'My Profit';} }else{if($this->lang->line('dashboard_my_loss')){echo ($this->lang->line('dashboard_my_loss'));} else{ echo 'My Loss';}} ?></td>
      <?php }?>
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
 
 <?php $i++; $j++; }}else{ ?>
No Property Found
<?php }?>
  
</table>

</div>
<?php //For fund/credit details management ?>
  <div id="tabs-3">
	<!--p><?php //if($this->lang->line('dashboard_credit_detail')){echo ($this->lang->line('dashboard_credit_detail'));} else{ echo 'Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.';} ?></p-->
	<?php $this->load->view('credit_detail'); ?>
  </div>

</div>
<?php
    }
?>
<!--/.Tabs content-->
</div>
<?php 
} 
?>
<?php $this->load->view('includes/front/footer'); ?>

<style>
.adminview strong {
    margin-bottom: 5px;
}
.checkplan_btn {
    padding-top: 0px;
}
.app_range1 {
    width:28%;
}
</style>

<script>
  
$(document).ready(function () {
  
  var bal = <?=$balance?>;
  $("#bal").html("MYR "+ bal);
});
</script>





<?php
    
// echo "<pre>";print_r($this->session->all_userdata());

 if($this->session->userdata('success_amount') || $this->session->userdata('withdraw_amount')){
?>
<div class="notif_overlay close_reg">
    <div class="usernotification usernotification_register"><p class="close_register">Close <i class="fa fa-remove close_reg"></i></p> 
        <?php
            if($this->session->userdata('success_amount')){
        ?>
                <br/><br/><h6><center>Your Payment Successfully Deposit of Amount <?php echo $this->session->userdata('success_amount') ?> MYR. <br/> 
                Your deposit will be process by admin as soon as possible 
                <br/> upon we received your payment, Thank You.</center></h6></br><br/>
        <?php
            }else if($this->session->userdata('withdraw_amount')){
        ?>
                <br/><br/><h6><center>Your Payment Successfully Withdraw of Amount <?php echo $this->session->userdata('withdraw_amount') ?> MYR. 
                <br/> Your Withdraw will be process by admin as soon as possible 
                <br/> Thank You.</center></h6></br><br/>
        <?php
            }
        ?>
    </div>
</div>
        <script type="text/javascript">
               $(".close_reg").click(function(){
                    $(".notif_overlay").css("display","none");
                });
                
                $(document).keyup(function(e) {
                    if (e.keyCode == 27) { 
                        $(".notif_overlay").css("display","none");
                    }
                });
        </script>
<?php
        $this->session->unset_userdata('success_amount');
        $this->session->unset_userdata('withdraw_amount');
    }

?>  