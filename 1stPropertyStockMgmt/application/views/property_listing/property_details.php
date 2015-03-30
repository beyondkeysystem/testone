<?php //echo '<pre>'; echo $check_user_property; die;
$pro_id= $this->uri->segment(2);
foreach($all_property_information as $all_property_information){
    if($all_property_information['id'] == $pro_id){

      if($all_property_information['property_enable_disable'] == 0 || $all_property_information['property_enable_disable'] == 3){
   redirect('home');
      }
    }
}

// echo $transaction_status;
// exit;
echo '<a href="javascript:void(0);" data-reveal-id="myIncompleteSellModal" data-animation="fade" class="incom_sell_prop_btn bs_btn" style="display:none"></a>';

echo '<a href="javascript:void(0);" data-reveal-id="myDecimalErrorSellModal" data-animation="fade" class="incom_sell_prop_btn1 bs_btn" style="display:none"></a>';

if($transaction_status == 'Transaction update'){   
  // die('chala');
  echo '<a href="javascript:void(0);" data-reveal-id="myIncompleteTranModal" data-animation="fade" class="incom_tran_prop_btn bs_btn" style="display:none"></a>';
  echo '<script>
    $(document).ready(function(){
      $(".incom_tran_prop_btn").trigger("click");
    });
  </script>';
}
?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<?php //print_r($chart_date);?>
<?php //print_r($chart_price);?>
<input type="hidden" value='<?php echo json_encode($chart_date);?>' id="chart_date" />
<input type="hidden" value='<?php echo json_encode($chart_price);?>' id="chart_price" />
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
  var data1=$('#chart_price').val();
  var data2=$('#chart_date').val();
  var date = new Array();
   var price = new Array();
  data1 = JSON.parse(data1);
  data2 = JSON.parse(data2);
  $.each(data1, function(key, values){
     price[key] = parseInt(values);
     console.log(values);
  });
  $.each(data2, function(key, values){
      console.log(values);
     date[key] = values;
  });
  
  console.log("price "+price);
//  alert(data1);
//  alert(data2);
//  alert(aray);
  $(function () {
    $('#container').highcharts({
        title: {
            text: '<?=$this->lang->line("monthly_average_price")?>',
            x: -20 //center
        },
        subtitle: {
            text: '<?=$this->lang->line("source")?>',
            x: -20
        },
        xAxis: {
            categories: date
        },
        yAxis: {
            title: {
                text: '<?=$this->lang->line("search_price")?> (MYR)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'MYR'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '<?php echo $property_detail[0]['property_name']?>',
            data: price
      //data:  [400, 400.30, 410, 500.85, 400, 400.30, 410, 500.85]
        }]
    });
});
</script>

<?php $this->load->view('home/breadcrumb'); ?>
<?php foreach($property_detail as $row){ $property_id = $row['id'];$property_status = $row['property_status']; $property_name_bc = $row['property_name']; ?>
<!--Main Body-->
<div class="wrapper"> 
  <!--Property Detail Section-->
 <div class="property_detail">
    <div class="pdetail_slider">
      <div class="main-image"> <img id="1" class="main"  src="<?php echo base_url(); ?><?php if($row['property_image'] != NULL){echo "uploads/".$row['property_image']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="Placeholder" class="custom">
      <img id="2" class="main"  src="<?php echo base_url(); ?><?php if($row['property_image2'] != NULL){echo 'uploads/'.$row['property_image2']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="Placeholder" class="custom">
      <img id="3" class="main"  src="<?php echo base_url(); ?><?php if($row['property_image3'] != NULL){echo 'uploads/'.$row['property_image3']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="Placeholder" class="custom">
      <img id="4" class="main"  src="<?php echo base_url(); ?><?php if($row['property_image4'] != NULL){echo 'uploads/'.$row['property_image4']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="Placeholder" class="custom">
      <img id="5" class="main"  src="<?php echo base_url(); ?><?php if($row['property_image5'] != NULL){echo 'uploads/'.$row['property_image5']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="Placeholder" class="custom">
      </div>
      <ul class="thumbnails">
        <li><a href="javascript:void(0)"><img id="1" class="thumb" src="<?php echo base_url(); ?><?php if($row['property_image'] != NULL){echo "uploads/".$row['property_image']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="No image" width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="2" class="thumb"  src="<?php echo base_url(); ?><?php if($row['property_image2'] != NULL){echo 'uploads/'.$row['property_image2']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="No image"  width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="3" class="thumb"  src="<?php echo base_url(); ?><?php if($row['property_image3'] != NULL){echo 'uploads/'.$row['property_image3']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="No image"  width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="4" class="thumb"  src="<?php echo base_url(); ?><?php if($row['property_image4'] != NULL){echo 'uploads/'.$row['property_image4']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="No image"  width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="5" class="thumb"  src="<?php echo base_url(); ?><?php if($row['property_image5'] != NULL){echo 'uploads/'.$row['property_image5']; }else{ echo 'assets/front/images/property-no-image.png';}?>" alt="No image"  width="88" height="88" ></a></li>
      </ul>
    </div>
    <div class="pdetail_text">
      <div class="pdetail_title">
        <h1> <?php echo $row['property_name']?></h1><h2></h2><span><?php echo $row['property_location']?></span></h2> 
        <!--a href="#"><img src="<?php echo base_url(); ?>assets/front/images/cube.jpg"></a-->
        <div class="clear"></div>
      </div>
  
      <div class="price_plan_sec">
        <?php
          $arrow = '';
          if($row['property_current_price'] - $row['property_initial_price'] > 0){
            $arrow = '<i class="fa fa-arrow-up greencolor"></i>';
          }else if($row['property_current_price'] - $row['property_initial_price'] < 0){
            $arrow = '<i class="fa fa-arrow-down redcolor"></i>';
          }
        ?>
        <div class="start_price"><?=$this->lang->line('price_starts_from')?>: <strong><?=$arrow?><?php echo ($row['property_current_price'])?"RM ".number_format($row['property_current_price']):"RM ".number_format($row['property_initial_price']); ?></strong></div>
        <!--<div class="checkplan_btn"> <a href="#" data-reveal-id="myModal2" data-animation="fade">Check floor plan</a> </div>-->
        <div class="clear"></div>
        
        <!-- Warning message  -->
        <?php
          $b_share = 100-$total_share_available[0]['property_share_in_per'];
          if($property_status == 'owned' && $min_owned_limit <= $b_share){
            if($row['property_enable_disable'] != 2 && $row['property_enable_disable'] != 3){
          ?>
       <?php   if($this->session->userdata('is_logged_in')){ ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <?=$this->lang->line('sell_pending_warning')?>
            </div>
      <?php } ?>
          <?php
            }else if($row['property_enable_disable'] != 3){
          ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <?=$this->lang->line('property_block_msg')?>
            </div>
          <?php
            }
          }
        ?>

      </div>
     
      <div class="profitloss">
          <?php   if($this->session->userdata('is_logged_in')){ ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="pltable">
  <tr>
<?php if($check_user_property > 0){ ?>
    <td id="pfbal"></td>
    <?php } ?>
      <?php
              
            /* Mayank Pawar
            ** Date: 22/12/2014
            */
            // echo "<pre>";print_r($total_share_available);die;
              foreach ($total_share_available as $total_share_available) {
                $tot_share_available =  $total_share_available['total_share_available'];
                $sell_property_share =  $total_share_available['sell_property_share'];
                $property_share_in_per =  $total_share_available['property_share_in_per'];
              }
            /* End Date: 22/12/2014 */

          foreach($property_information as $property_information){
            $share_sold=$property_information['sold_property_share'];
            $share_sell=$property_information['sell_property_share'];
     ?>

    <td class="greencolor"><?php $share_available = $property_information['property_share_in_per']+$property_information['sell_property_share']; echo $property_information['property_share_in_per']+$property_information['sell_property_share']; ?>%</td>
    <?php $price=0;
    if($row['property_current_price']) $price=$row['property_current_price'];
    else $price = $row['property_initial_price'];
    } ?>
  </tr>
  <tr>
   <?php if($check_user_property > 0){ ?>
    <td><span id="profit_loss_title"><?php echo "My Profit & Loss";//if($property_information['profit']!=0){ if($this->lang->line('dashboard_my_profit')){echo ($this->lang->line('dashboard_my_profit'));} else{ echo 'My Profit';} }else{if($this->lang->line('dashboard_my_loss')){echo ($this->lang->line('dashboard_my_loss'));} else{ echo 'My Loss';}} ?></span></td>
    <?php } ?>
  <?php   
    if($this->session->userdata('is_logged_in')){
  ?>
  <td><?php echo "My Shares";?></td>
  <?php 
    } 
  ?>
  </tr>
</table>
  <?php } ?>
  
  <?php // print_r($total_share_available); ?>
  <?php if($property_information['property_status']=='owned'){ ?>
  <div class="oa-percent"> 
      <div class="loader_percent"><span style="width:<?=$owned?>%;"></span></div>
        <div class="loader_text"><span class="loader_text1"><?=$this->lang->line('owned')?>: <?=number_format($owned,2)?>%</span><span class="loader_text2"><?=$this->lang->line('available')?>: <?php if(!empty($available)){echo number_format($available,2); }else{ echo 0; }?>%</span></div>
      <div class="clear"></div>
    </div>
  <?php } ?>
    <div class="clear"></div>
    <div class="buy_sell_btn">
       <?php
       // echo $tot_share_available."<br/>";echo $sell_property_share."<br/>"; echo $row['property_enable_disable'];
       if(!$this->session->userdata('is_logged_in') && $row['property_enable_disable'] != 2){ ?>
      <a href="javascript:void(0);" data-reveal-id="myModal" data-animation="fade" class="buyprop_btn bs_btn"><?=$this->lang->line('buy_property')?></a>
    <?php
    /* Mayank Pawar
    ** Date: 22/12/2014
    */
    }elseif($this->session->userdata('is_logged_in') && ($tot_share_available != 100 || $sell_property_share > 0) && $row['property_enable_disable'] != 2){ ?>
      <a href="javascript:void(0);" data-reveal-id="myBuyModal" data-animation="fade" class="buyprop_btn bs_btn"><?=$this->lang->line('buy_property')?></a>
        <?php /*}elseif($this->session->userdata('is_logged_in') && $user_credit[0]['credit'] > 0 && $share_limits > 0 && $share_limits <= $property_information['property_share_in_per']+$property_information['sell_property_share'] && ($property_status=='pending' || $property_status=='selling') || ($property_status=='owned' && $available > 0)){ ?>
    <a href="javascript:void(0);" data-reveal-id="myBuyExceedModal" data-animation="fade" class="buyprop_btn bs_btn">Buy Property</a>
    <?php */}
    ?>
    
        <?php if($this->session->userdata('is_logged_in') && $property_status=='owned' && $share_available > 0 && $row['property_enable_disable'] != 2){   ?>
      <a href="javascript:void(0);" data-reveal-id="mySellModal" data-animation="fade" class="sellprop_btn bs_btn"><?=$this->lang->line('sell_property')?></a>
        <?php } ?>
        <div class="clear"></div>

    </div> 
      </div>
      
      <div class="clear"></div>
      <div class="descp_table_title">
        <h2><?=$this->lang->line('property_description')?></h2>
        <h3><?=$this->lang->line('property_features')?></h3>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="descp_table">
          <tr>
            <td><strong><?=$this->lang->line('property_ref')?>:</strong></td>
            <td><?php echo $row['property_ref']?></td>
            <td><strong><?=$this->lang->line('listing_price')?>:</strong></td>
            <td><?=$this->lang->line('from')?> <span class="colorblue"><?php echo "RM ".number_format($row['property_initial_price']);?></span></td>
          </tr>
          <?php
            /* Code For minimum_owned_limit */
            if($property_information['property_status'] == 'owned'){
          ?>
              <tr>
                <td><strong><?=$this->lang->line('max_property_buy_limit')?>:</strong></td>
                <td><?php echo $min_owned_limit;?> %</td>
                <td><strong><?=$this->lang->line('min_property_buy_limit')?>:</strong></td>
                <td><?php echo $min_property_share_limit?> %</td>
              </tr>
          <?php
            }
          ?>
          <tr>
            <td><strong>Property Status:</strong></td>
            <td><?php 
              if($property_status == 'owned' && $row['property_enable_disable'] == 2){
                echo $this->lang->line('blocked');
              }else{
                echo $this->lang->line($row['property_status']);
              }
            ?></td>
      <?php if($this->session->userdata('is_logged_in') ){ ?>
            <!-- Mayank Pawar 22/12/2014-->
            <td><strong><?=$this->lang->line('available_shares')?>:</strong></td>
            <td><b><?php if(!empty($available)){echo number_format($available,2); }else{ echo 0; }?> % </b></td>
      <?php
      } 
       ?>
          </tr>
          <tr>
            <td><strong><?=$this->lang->line('property_type')?>:</strong></td>
            <td><?php echo $row['property_type']?></td>
            <td><strong><?=$this->lang->line('bathrooms')?>:</strong></td>
            <td><?php echo $row['property_bathrooms']?></td>
          </tr>
          <tr>
            <td><strong><?=$this->lang->line('built_up')?>:</strong></td>
            <td><?php $msgb = "Not Found"; echo ($row['built_up'])?number_format($row['built_up'])." sq.ft":$msgb;?></td>
            <td><strong><?=$this->lang->line('posted_date')?>:</strong></td>
            <td><?php echo $row['modified']?></td>
          </tr>
           <tr>
            <td><strong><?=$this->lang->line('current_price')?>:</strong></td>
            <td><?php echo "RM ". number_format($row['property_current_price']);?></td>
            <td><strong><?=$this->lang->line('bedrooms')?>:</strong></td>
            <td><?php echo $row['property_bedrooms']?></td>
          </tr>

	  <tr>
            <td><strong><?=$this->lang->line('tenure')?>:</strong></td>
            <td><?php $msgb = "Not Found"; echo ($row['tenure'])?$row['tenure']:$msgb;?></td>
            <td><strong><?=$this->lang->line('landarea')?>:</strong></td>
            <td><?php $msgb = "Not Found"; echo ($row['land_area'])?$row['land_area']:$msgb;?></td>
          </tr>          
        </table>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--/.Property Detail Section--> 
  <!--Market Overview Section-->
  <div class="mrkt_overview content">
    <div class="mrkt_content">
      <?=$this->lang->line('graph_left_content')?>
  
      <div class="mrkt_graph_detail">
        <p><strong>RM <?php echo ($row['property_current_price'])?number_format($row['property_current_price']):number_format($row['property_initial_price']); ?></strong> <span>(Last 5 changes)</span></p>
        <ul>
   <?php //foreach($chart_date as $row_date){ echo $row_date;}?>
   <?php //print_r($property_detail); ?>
<?php //foreach($chart_price as $row_date){ echo $row_price;}
$count_chart_date=count($chart_date);
for($i=0; $i<$count_chart_date; $i++){
?>

          <li><strong><?php echo $chart_date[$i]; ?></strong><span><?php $share=number_format((($chart_price[$i]-$property_detail[0]['property_initial_price'])/$property_detail[0]['property_initial_price'])*100, 2); if($share>0){?><i class="fa fa-arrow-up greencolor"></i><?php }else{ ?><i class="fa fa-arrow-down redcolor"></i><?php } echo $share; ?>%</span><span>MYR <?php echo number_format($chart_price[$i], 2); ?></span></li>
<!--            <li><strong>20 Aug 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>1.1%</span><span>MYR 230,000</span></li>
            <li><strong>15 Sept 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>1.1%</span><span>MYR 245,000</span></li>
            <li><strong>15 Oct 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>2.1%</span><span>MYR 180,000</span></li>
            <li><strong>15 Nov 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>5.1%</span><span>MYR 150,000</span></li>-->
        <?php } ?>
  </ul>
      </div>
    </div>
    <div class="mrkt_graph"> <div id="container" style="min-width: 100%; height: 385px; margin: 0 auto"></div> </div>
    <div class="clear"></div>
  </div>
  <!--/.Market Overview Section--> 
  <!--Tab-->
  <div id="container">
   <div id="tabs">
      <ul>
        <li><a href="#tab-1"><?=$this->lang->line('profit_loss')?></a></li>
        <li><a href="#tab-2"><?=$this->lang->line('property_shares')?></a></li>
        <li><a href="#tab-3"><?=$this->lang->line('property_details')?></a></li> <!--Mayank Pawar -->
      </ul>
      <div id="tab-1" class="clsdiv">
       <?php
           
            // $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform', 'style' => 'margin-left: 800px;');
            // //save the columns names in a array that we will use as filter         

            // echo form_open('property_details/'.$property_detail[0]['id'], $attributes);
     
            //   echo form_label('Search:', 'search_string');
            //   echo form_input('search_string', $search_string_selected, 'class="search_text" placeholder="Enter Username"');

            //   $data_submit = array('name' => 'mysubmit', 'class' => 'search_submit', 'value' => 'Go');


            //   echo form_submit($data_submit);

            // echo form_close();
            ?>
      <div id="table-wrapper">
  <div id="table-scroll">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="prop_loss_table">
  <thead>
  <tr>
    <th scope="col" class="col1">S.no</th>
    <!-- <th scope="col" class="col1">User ID</th> -->
    <th scope="col" class="col2"><?=$this->lang->line('fund_type')?></th>
    <th scope="col" class="col3"><?=$this->lang->line('date')?></th>
    <th scope="col" class="col4"><?=$this->lang->line('details')?></th>
    <th scope="col" class="col4"><?=$this->lang->line('debit')?></th>
    <th scope="col" class="col4"><?=$this->lang->line('cred')?></th>
  </tr>
  </thead>
  <?php
  $balance=0;
   if(empty($profit_and_loss_logs)){?>
    <tr>
    <td colspan="7"><?=$this->lang->line('no_result_found')?></td>
  </tr>
    <?php }else{
      $cnt = 1;
  foreach($profit_and_loss_logs as $row){ 
 ?>
  <tr>
    <td><?php echo $cnt; ?></td>
    <!--<td><?php echo $row['user_name']; ?></td>-->
    <td><?php echo $row['fund_type']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['detail']; ?></td>
    <td><?php echo $row['debit']; ?></td>
    <td><?php echo $row['credit']; ?></td>
  </tr>
  <?php $balance = $row['debit'] - $row['credit'] + $balance; $cnt++; }
  
  }
  ?>
 
<!-- <tr>
   <td colspan="6" align="right"><b>Total Balance</b>&nbsp;</td>
   <td><span class="col-g"><?=$balance?></span></td>
 </tr>-->
</table>
      </div>
</div>

      </div>
      <div id="tab-2" class="clsdiv">
      <div id="table-wrapper">
             <div id="table-scroll">
        <!-- <div class="tabcontent content"> <img src="<?php echo base_url(); ?>assets/front/images/tpic1.jpg" class="aright"> -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="prop_loss_table">
            <thead>
            <tr>
              <th scope="col" class="col1"><?=$this->lang->line('s_no')?></th>
              <th scope="col" class="col1"><?=$this->lang->line('login_attr_username')?></th>
              <th scope="col" class="col2"><?=$this->lang->line('property_share_owned')?></th>
              <th scope="col" class="col3"><?=$this->lang->line('share_for_sale')?></th>
              <th scope="col" class="col4"><?=$this->lang->line('share_sold_property')?></th>
             </tr>
            </thead>
            <?php
            $count=1;
            foreach($user_property as $row){ ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['user_name']; ?></td>
              <td><?php echo $row['property_share_in_per']; ?>%</td>
              <td><?php echo $row['sell_property_share']; ?>%</td>
              <td style><?php echo $row['sold_property_share']; ?>%</td>
            </tr>
            <?php $count++; } ?>
           
          </table>
       </div>
      </div>
          <!-- <p><strong>Modern Facilities to Pamper and Inspire</strong> Vestibulum tempor ligula congue enim pellentesque ultrices. Maecenas at mi magna. Vestibulum tristique ultricies risus vitae mollis. Aliquam lobortis venenatis purus, non commodo dui convallis non. Etiam vestibulum ante vitae mauris eleifend dapibus. Cras sit amet efficitur turpis. Sed suscipit fringilla nisi a condimentum. Nullam scelerisque euismod nisi ut pretium. In interdum facilisis rhoncus. Nam eu tincidunt ipsum, quis tristique odio. Donec in eleifend velit, eget egestas lectus. Proin luctus mi eget egestas placerat. Nullam aliquam ex risus, venenatis imperdiet quam volutpat id. Integer dignissim lorem est, non commodo leo posuere et.</p>
          <p>Morbi venenatis dolor ut tortor facilisis vestibulum. Mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl.</p> -->
          
          <div class="clear"></div>
        </div>
 
      <div id="tab-3" class="clsdiv">
        <!-- <div class="tabcontent content"> <img src="<?php echo base_url(); ?>assets/front/images/tpic1.jpg" class="aright">
          <p><strong>Modern Facilities to Pamper and Inspire</strong> Vestibulum tempor ligula congue enim pellentesque ultrices. Maecenas at mi magna. Vestibulum tristique ultricies risus vitae mollis. Aliquam lobortis venenatis purus, non commodo dui convallis non. Etiam vestibulum ante vitae mauris eleifend dapibus. Cras sit amet efficitur turpis. Sed suscipit fringilla nisi a condimentum. Nullam scelerisque euismod nisi ut pretium. In interdum facilisis rhoncus. Nam eu tincidunt ipsum, quis tristique odio. Donec in eleifend velit, eget egestas lectus. Proin luctus mi eget egestas placerat. Nullam aliquam ex risus, venenatis imperdiet quam volutpat id. Integer dignissim lorem est, non commodo leo posuere et.</p>
          <p>Morbi venenatis dolor ut tortor facilisis vestibulum. Mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl.</p>
          <div class="clear"></div>
        </div>
        <div class="tabcontent content"> <img src="<?php echo base_url(); ?>assets/front/images/tpic2.jpg" class="aleft">
          <p><strong>Modern Facilities to Pamper and Inspire</strong> Vestibulum tempor ligula congue enim pellentesque ultrices. Maecenas at mi magna. Vestibulum tristique ultricies risus vitae mollis. Aliquam lobortis venenatis purus, non commodo dui convallis non. Etiam vestibulum ante vitae mauris eleifend dapibus. Cras sit amet efficitur turpis. Sed suscipit fringilla nisi a condimentum. Nullam scelerisque euismod nisi ut pretium. In interdum facilisis rhoncus. Nam eu tincidunt ipsum, quis tristique odio. Donec in eleifend velit, eget egestas lectus. Proin luctus mi eget egestas placerat. Nullam aliquam ex risus, venenatis imperdiet quam volutpat id. Integer dignissim lorem est, non commodo leo posuere et.</p>
          <p>Morbi venenatis dolor ut tortor facilisis vestibulum. Mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl.</p>
          <div class="clear"></div>
        </div> -->

        <?php if($property_description != ""){
          echo $property_description;
        }else{
          echo $this->lang->line('no_prop_desc_msg')."<br/><br/>";
        }?>
        <div class="clear"></div>
      </div>
      </div>
  </div>
  <!--/.Tab--> 
   
</div>
<!--/.Main Body--> 
<?php }?>
<!--Blue Bar-->
<div class="blue">
  <div class="wrapper">
    <div class="blue1">
      <h3><i class="fa fa-phone"></i></h3>
      <p><?=$this->lang->line('call_us_now')?></p>
      <h2><?=$this->lang->line('call_number')?></h2>
    </div>
    <div class="blue2"><?=$this->lang->line('blue_bar_text')?></div>
    <div class="blue3"><img src="<?php echo base_url(); ?>assets/front/images/girl.png"></div>
    <div class="clear"></div>
  </div>
</div>
<!--/.Blue Bar--> 

<!--SellPopup-->
  <div id="mySellModal" class="reveal-modal popup" style="opacity: 1; top: 10%;">
    <h3><?=$this->lang->line('sell_popup_title')?></h3>
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);"><?=$this->lang->line('close')?> <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
  <?=$this->lang->line('sell_share_property_into')?> <b><span id="sell_available"><?=$property_information['property_share_in_per']?></span></b> <?=$this->lang->line('percentage')?>.
  <form accept-charset="utf-8" method="post" action="#">
    <div class="reg-form-row">
    <div class="row-col1">
      <label><?=$this->lang->line('sell_share_in_pre')?></label>
      
      <input type="number" step="0.1" min="0" max="<?=$property_information['property_share_in_per']?>" name="sell_share_percentage" id="sell_share_percent" placeholder="Numeric/Decimal Values (0.1 or 1...)" required />
      <input type="hidden" name="property_status" value="<?=md5($property_status)?>">
      <input type="hidden" name="property_id" value="<?=$property_id?>" id="property_id">
      <input type="hidden" name="share_available" value="<?=$share_available?>" id="share_available">
      <input type="hidden" name="share_limits" value="<?=$share_limits?>" id="<?=$share_limits?>">
      <input type="hidden" name="property_click" value="sell">
    </div>      
    </div>
    <div class="" id="sell_credit_div" style="display: none;">
    <div class="row-col1">
      <label><?=$this->lang->line('sell_share_msg1')?></label>
      <!--label>Credits Needed: <span id="sell_creditsneeded"></span> and Now you have remains <span id="sell_creditsavailable"><?=$user_credit[0]['credit']?></span> if you agreed to buy</label-->
    </div>
    </div>
    <div class="" id="sell_error_price_div" style="display: none;">
    <div class="row-col1">
      <label><?=$this->lang->line('sell_share_msg2')?></label>
    </div>
    </div>
   
   <div class="checkplan_btn" id="agree_btn">  </div>
    <!--div class="signup">Not A Member ?   <a href="http://myviko.pd.cisinlive.com/register"> Sign up Now!</a></div-->
  </form>
  </div>
<!--/.SellPopup-->

<!--BuyPopup--> <!-- Mayank Pawar 22/12/2014 -->
  <div id="myBuyModal" class="reveal-modal popup" style="opacity: 1; top: 10%; height:auto;">
  <?php $buyshare = 100 - $property_share_in_per; ?>
    <h3><?=$this->lang->line('buy_share_title')?></h3>
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);"><?=$this->lang->line('close')?> <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
      <?php
      // if($property_status == 'owned'){
      ?>
        <!-- <small><b>Minimum Share Limit: <span id="minimum_share"><?=$min_property_share_limit;?></span> %<br/> 
        Maximum Share Limit: <span id="available"><?php echo $buyshare >= $min_owned_limit ? $buyshare : $min_owned_limit?></span> %</b></small> <!-- Mayank Pawar-->
        <!-- Maximum Owned Limit: <span id="available"><?php echo $min_owned_limit?></span> %</b></small> <!-- Mayank Pawar --> 
      <?php
      // }else{
      ?>
        <?=$this->lang->line('you_can_buy')?> <b><span id="minimum_share"><?=$min_property_share_limit;?></span></b> to <b><span id="available"> <?php echo number_format($buyshare,2)?></span></b> <?=$this->lang->line('per_shares')?>. <!-- Mayank Pawar -->
      <?php
      // }
      ?>
      
    <form accept-charset="utf-8" method="post" action="">
    <div class="reg-form-row">
    <div class="row-col1">
      <?php
      if($property_status == 'owned'){
      ?>
        <label><?=$this->lang->line('buy_shares_heading')?></label>
    

    <!--
    ** By Mayank Pawar
    ** Date: 20.11.14
    -->


                <script type="text/javascript">
                      $(document).ready(function() {
      
                          $('#example-enableFiltering-includeSelectAllOption').multiselect({
         
                              includeSelectAllOption: true,
                              enableFiltering: true,
                              enableCaseInsensitiveFiltering: true,
                              maxHeight: 200,
                              onChange: function(element, checked) {
                                var selectedOptions = $('#example-enableFiltering-includeSelectAllOption option:selected');
                                //  console.log(JSON.stringify(selectedOptions));
                                if(checked === true){
                                  $("#share_table").css('display','block');
                                  var content = "";
                                  selectedOptions.each(function() {
                                    var name = $(this).text();                                    
                                    var percentage = $(this).attr("sell_property_share");
                                    var user_prop_id = $(this).attr("user_prop_id");
                                    var arr = name.split(" ");
            var user_id = $(this).attr("user_id");
                                    name = arr[0];
            console.log(name+" "+percentage+" "+user_id+" "+user_prop_id+" "+name);
                                    content += "<tr><td>"+name+"</td><td>"+percentage+"%</td><td><input type='number' step='0.1' class='share_req' name='share_req["+user_prop_id+"]' min='0.1' max='"+percentage+"' required/></td></tr>";
                                  });

                             
                                }else{
                                  var content = "";
                                  selectedOptions.each(function() {
                                    var name = $(this).text();                                    
                                    var percentage = $(this).attr("sell_property_share");
                                    var user_id = $(this).attr("user_id");
            var user_prop_id = $(this).attr("user_prop_id");
                                    var arr = name.split(" ");
                                    name = arr[0];
            console.log(name+" "+percentage+" "+user_id+" "+user_prop_id+" "+name);
               //alert(name);
                                    content += "<tr><td>"+name+"</td><td>"+percentage+"%</td><td><input type='number' step='0.1' class='share_req' name='share_req["+user_prop_id+"]' min='0.1' max='"+percentage+"' required/></td></tr>";
                                  });
                                  if (selectedOptions.length == 0) {
                                    $("#share_table").css('display','none');
                                  }
                                }
                                $("#share_table tbody").html(content);
                                
                                $('input.share_req').change(function() {
                                  var totalPoints = 0;
                                  $('input.share_req').each(function() {
                                      var inp = Number($(this).val());
                                      totalPoints += inp;
                                  });                                 
                                  // $("#total").html(totalPoints.toFixed(2)+"%");
                                  $("#share_percent").val(totalPoints.toFixed(2));
                                  
                                  if(totalPoints > $("#available").html() ){
                                    $("input.share_req:last").val("");
                                    if(!$("#err_share").html()){
                                      $("input.share_req:last").after("<p id='err_share' style='font-size:12px;color:red;'>You can buy total "+$("#available").html()+" % shares. </p>");
                                      $("#share_percent").val("0");
                                    }else{
                                      $("#share_percent").val("0");
                                    }
                                  }else{
                                    $("#err_share").remove();
                                    $("#share_percent").trigger('keyup');
                                  }  
                                  
                                });

                              }
                          });
                          
                      });


                  </script>
                  
                  <select id="example-enableFiltering-includeSelectAllOption" multiple="multiple">
                      <?php 
                        foreach($user_property_share_detail as $row){
        
                      ?>
          <?php /*$row['sell_property_share']*/ ?>
                        <option sell_property_share="<?php echo $row['sell_property_share']; ?>" value="<?=$row['id']?>" user_prop_id="<?=$row['id']?>"><?=$row['user_name']." ".$row['sell_property_share']."%"?></option>
                      <?php
                        } 
                      ?>
                  </select>
                  
                    <div class="table-responsive"> 
                      <table class="table table-hover" id="share_table" style="display:none;">
                        <thead>
                          <tr><th><?=$this->lang->line('share_holder_name')?></th><th><?=$this->lang->line('available_shares')?></th><th><?=$this->lang->line('quantity')?></th></tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr><td></td><td><?=$this->lang->line('buy_share_in_per')?></td><td>
                              <input type="number" step="0.1" min="<?=$min_property_share_limit?>" max="<?=$buyshare?>" name="share_percentage" id="share_percent" value="0" disabled="disabled" style="width:100px" required>
                              <input type="hidden" name="share_price" value="<?=$price?>" id="property_shares_price">
                          </td></tr>
                        </tfoot>
                      </table>
                    </div>
                  <input type="hidden" name="propertySaleForPhaseTwo" value="propertySaleForPhaseTwo" />
    <!-- End -->
    
<?php
      }else{
      ?>
      
      <label><?=$this->lang->line('buy_share_in_per')?></label>     
      <input type="number" name="share_percentage" id="share_percent" placeholder="Numeric/Decimal Values (0.1 or 1...)" step="0.1" min="<?=$min_property_share_limit?>" max="<?=$buyshare?>" required>
      <input type="hidden" name="share_price" value="<?=$price?>" id="property_shares_price">
      <?php }?>

      <input type="hidden" name="property_status" value="<?=md5($property_status)?>">
      <input type="hidden" name="property_click" value="buy">
      
      <input type="hidden" name="share_limits" id="share_limits" value="<?=$min_property_share_limit?>">
      <input type="hidden" name="exisitingShare" value="<?=$buyshare?>" id="exisitingShare">
      <?php $txnFees = str_replace("$","",$role['percentage']); ?>
      <input type="hidden" name="transactionfees" value="<?=$txnFees?>" id="transaction_fees">
      <?php $credit_prices = str_replace("$","",$credit_price[0]['price']); ?>
      <input type="hidden" name="credit_price" value="<?=$credit_prices?>" id="credit_price">
      <input type="hidden" name="user_credit" value="<?php echo $user_credit[0]['credit'];?>" id="user_credit">
      <input type="hidden" name="user_credit_agree" value="<?php echo $user_credit[0]['credit'];?>" id="user_credit_agree">
      <input type="hidden" name="min_owned_limit" value="<?php echo $min_owned_limit;?>" id="min_owned_limit">
    </div>      
    </div>
    <div class="" id="share_price_div" style="display: none;">
      <div class="row-col1">
        <label><?=$this->lang->line('share_price')?>: <span id="price"></span> </label>
      </div>
      <div class="row-col1" style="float:right;padding-right:20px">
        <label><?=$this->lang->line('current_funds')?>: <span id="current_fund"></span> </label>
      </div>
    </div>   
    
    <div class="" id="transaction_div" style="display: none;">
     <div class="row-col1">
      <label><?=$this->lang->line('transaction_fees')?> (<?=$txnFees?>%): <span id="transaction_charge"></span> </label>
     </div>
     <div class="row-col1" style="float:right;padding-right:20px">
      <label style="color:red"><?=$this->lang->line('fund_needed')?>: <span id="creditsneeded2"></span> </label>
     </div>
    </div>
    
    <div class="" id="credit_div" style="display: none;">
    <div class="row-col1">
      <input type="hidden" id="credit_price_value" value="<?php echo $credit_price[0]['price']; ?>" />
      <label><?=$this->lang->line('fund_needed')?>: <span id="creditsneeded"></span> <!-- <br/><?=$this->lang->line('now_you_have_remains')?> <span id="creditsavailable"><?php echo $user_credit[0]['credit']/$credit_price[0]['price']; ?></span> <?=$this->lang->line('fund_remaining_share')?> <span id="shareremaining"></span> <?=$this->lang->line('agreed_to_buy')?>--></label>
    </div>
      <div class="row-col1" style="float:right;padding-right:20px">
        <label style="color:green"><?=$this->lang->line('after_buy')?>: <span id="after_buy"></span> </label>
      </div>
    </div>
    <div class="" id="error_price_div" style="display: none;">
    <div class="row-col1">
      <label><?=$this->lang->line('buy_share_msg1')?></label>
      <div class="checkplan_btn"> <a id="SellSubmit" href="<?=base_url()?>dashboard/2/1"><?=$this->lang->line('deposit')?></a> </div>
    </div>
    

    </div>
    <div class="" id="share_error_price_div" style="display: none;">
    <div class="row-col1">
      <label><?=$this->lang->line('buy_share_msg2')?></label>
    </div>
    </div>
   
   <div class="search_btn reg-form-row1"><input type="submit" id="agree" value="<?=$this->lang->line('agree')?>" /></div>
    <!--div class="signup">Not A Member ?   <a href="http://myviko.pd.cisinlive.com/register"> Sign up Now!</a></div-->
  </form>
  </div>
<!--/.Popup-->

<!-- Transaction Incomplete Model -->

  <div id="myIncompleteTranModal" class="reveal-modal popup" style="opacity: 1; top: 10%; height:auto;">
    
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);"><?=$this->lang->line('close')?> <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
    <div style="height:200px;padding-top:50px;padding:80px;"><b><center>
      Price of this property just changed on your last submit, your last transaction are failed. 
      Please Try Again</center></b>
    </div>
    <br/><br/>
    
  </div>

<!-- Sell Decimal Error Model -->

  <div id="myDecimalErrorSellModal" class="reveal-modal popup" style="opacity: 1; top: 10%; height:auto;">
    
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);"><?=$this->lang->line('close')?> <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
    <div style="height:200px;padding-top:50px;padding:80px;"><b><center>
      Please enter valid values only single decimal is allowed. Your last Property Selling is failed.<br/>
      Please Try Again</center></b>
    </div>
    <br/><br/>
    
  </div>

<!-- Sell Incomplete Model -->

  <div id="myIncompleteSellModal" class="reveal-modal popup" style="opacity: 1; top: 10%; height:auto;">
    
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);"><?=$this->lang->line('close')?> <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
    <div style="height:200px;padding-top:50px;padding:80px;"><b><center>
      Sell Limit Exceed of this property on your last submit, your last sell request are failed. 
      Please Try Again</center></b>
    </div>
    <br/><br/>
    
  </div>

<!--BuyExceedPopup-->
  <div id="myBuyExceedModal" class="reveal-modal popup" style="opacity: 1; top: 10%;">
    <h3 style="top:35%;position:relative;text-align: center; font-size: 17px;">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <?=$this->lang->line('buy_share_msg3')?></h3>
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);"><?=$this->lang->line('close')?> <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div> 
  </div>
<!--/.BuyExceedPopup-->
<script type="application/javascript">
  
$(document).ready(function () {
  
  var bal = <?=$balance?>;
  $("#pfbal").html("MYR "+ bal);
  if(bal>0){
    $("#profit_loss_title").html("My Profit");
  }else if(bal < 0){
    $("#profit_loss_title").html("My Loss");
  }
  
  $("#agree").hide();
  $("#bc").html("<?=$property_name_bc?>");
});
</script>
<script>

  //For Sell
  $("#sell_share_percent").keyup(function(){
  var sell_share = $(this).val();
  var share_avail = $("#sell_available").text();
  var propId = $("#property_id").val();
  console.log('sell_share');
  console.log(sell_share);
  
  console.log('share_avail');
  console.log(share_avail);
  if (sell_share != '') {
    if (parseFloat(sell_share) <= parseFloat(share_avail) && parseFloat(sell_share) != 0) {
    $("#sell_credit_div").show();
    $("#sell_error_price_div").hide();
    $("#agree_btn").html("<a id='SellSubmit1' href='javascript:void(0);' onclick='sell_agree();'><?=$this->lang->line('agree')?></a>");    
    // Add sell share
    /*$.ajax({
      type: "POST",
      url: "<?php echo site_url();?>property_listing/sell_property",
      data: {sell_share: sell_share, share_avail: share_avail, property_id: propId},
          dataType: "text",  
          cache:false,
          success:function(data){
        window.location.href = "<?php echo site_url();?>property_details/"+propId;  //as a debugging message.
      }
          });// you have missed this bracket*/
    }
    else{
    $("#sell_error_price_div").show();
    $("#sell_credit_div").hide();
    $("#agree_btn").html("");
    }
  }
  else{
    $("#sell_credit_div").hide();
    $("#sell_error_price_div").hide();
    $("#agree_btn").html("");
  }
  });
  
  function sell_agree(){
    var sell_share = $("#sell_share_percent").val();
    
    var share_avail = $("#share_available").val();
    var propId = $("#property_id").val();
    console.log('sell_share');
    console.log(sell_share);
    
    console.log('share_avail');
    console.log(share_avail);
    if (sell_share != '') {
      // console.log('sell_share '+sell_share);

      if (parseFloat(sell_share) <= parseFloat(share_avail)) {
      $("#sell_credit_div").show();
      $("#sell_error_price_div").hide();
      
      // Add sell share
      $.ajax({
        type: "POST",
        url: "<?php echo site_url();?>property_listing/sell_property",
        data: {sell_share: sell_share, share_avail: share_avail, property_id: propId},
            dataType: "text",  
            cache:false,
            success:function(data){
              console.log(data);
              if(data == 'Sell Limit Exceed'){
                $(".close-reveal-modal").trigger("click");
                $(".incom_sell_prop_btn").trigger("click");
              }else if(data == 'Decimal error'){
                // console.log("mayank " +data);
                $(".close-reveal-modal").trigger("click");
                $(".incom_sell_prop_btn1").trigger("click");
              }else{
                window.location.href = "<?php echo site_url();?>property_details/"+propId;  //as a debugging message.
              }
        }
            });// you have missed this bracket
      }
      else{
      $("#sell_error_price_div").show();
      $("#sell_credit_div").hide();
      }
    }
    else{
      $("#sell_credit_div").hide();
      $("#sell_error_price_div").hide();
    }
  };

  $("#SellSubmit").click(function(){
    // alert('click');
  var sell_share = $("#sell_share_percent").val();
  var share_avail = $("#share_available").val();
  var propId = $("#property_id").val();
  console.log('sell_share');
  console.log(sell_share);
  
  console.log('share_avail');
  console.log(share_avail);
  if (sell_share != '') {
    if (parseFloat(sell_share) <= parseFloat(share_avail)) {
    $("#sell_credit_div").show();
    $("#sell_error_price_div").hide();
    
    // Add sell share
    $.ajax({
      type: "POST",
      url: "<?php echo site_url();?>property_listing/sell_property",
      data: {sell_share: sell_share, share_avail: share_avail, property_id: propId},
          dataType: "text",  
          cache:false,
          success:function(data){

            if(data == 'Sell Limit Exceed'){
              $(".close-reveal-modal").trigger("click");
              $(".incom_sell_prop_btn").trigger("click");
            }else{
              window.location.href = "<?php echo site_url();?>property_details/"+propId;  //as a debugging message.
            }

            
      }
          });// you have missed this bracket
    }
    else{
    $("#sell_error_price_div").show();
    $("#sell_credit_div").hide();
    }
  }
  else{
    $("#sell_credit_div").hide();
    $("#sell_error_price_div").hide();
  }
  });



  // For Buy
  $("#share_percent").keyup(function(){
  
  //console.log($(this).val());
  var share = parseFloat($(this).val());
  var share_limits = $("#share_limits").val();
  var exisitingShare = $("#exisitingShare").val();
  
  if(exisitingShare == ""){
    exisitingShare = 0;
  }
  var shareavail = parseFloat(exisitingShare);
  console.log(shareavail+" shareavail");
  var minimum_share = $("#minimum_share").text();
  console.log(minimum_share+ " minimum_share");
  console.log(share+ " share");
  if (share <= shareavail && share >= minimum_share) {
    var shareremaining = parseFloat(exisitingShare) - parseFloat(share);
   
    $("#shareremaining").html(parseFloat(shareremaining).toFixed(2));
    var property_shares_price = $("#property_shares_price").val();
    // if(property_shares_price == ""){
    //   property_shares_price = 0;
    // }
    
     
    var credit_price = $("#credit_price").val();
    var user_credit = $("#user_credit").val();

    console.log(property_shares_price + " property_shares_price");
    console.log(credit_price + " credit_price");
    console.log(user_credit + " user_credit");
    console.log(share + " share");
    var share_price = (parseFloat(property_shares_price) * parseFloat(share))/100;
    console.log(share_price + " share_price");
    

    var transaction_fees = $("#transaction_fees").val();
    console.log(transaction_fees + " transaction_fees");
   
    if (share_price != 0) {
      var transaction_fees_total= (parseFloat(share_price)*parseFloat(transaction_fees))/100;
    var totalprice = parseFloat(share_price) + transaction_fees_total;
    totalprice=totalprice.toFixed(2);
    console.log(totalprice + " totalprice");
    $("#price").html(parseFloat(share_price).toFixed(2));
    $("#transaction_charge").html(parseFloat(transaction_fees_total).toFixed(2));
    
    // User credit amount
    var totalcreditamt = parseFloat(user_credit) * parseFloat(credit_price);
    console.log(totalcreditamt + " totalcreditamt");
    $("#current_fund").html(parseFloat(totalcreditamt).toFixed(2));
    // alert(totalprice);
     //alert(totalcreditamt);
    if(parseFloat(totalprice) <= parseFloat(totalcreditamt)){
            var totalprice=totalprice/credit_price;
      var actualPrice = parseFloat(totalcreditamt) - parseFloat(totalprice);
      //Get credit value
      var creditneeded = parseFloat(totalprice) * parseFloat(credit_price);
      creditneeded= creditneeded.toFixed(2);
//      creditneeded = creditneeded.toFixed(10);
//                     creditneeded = creditneeded.substring(0, creditneeded.length-7);
//         alert(creditneeded);
      $("#creditsneeded").html(creditneeded);
      $("#creditsneeded2").html(creditneeded);
      
      var remainingcredit = (parseFloat(user_credit) * parseFloat(credit_price)) - parseFloat(creditneeded);
      var remainingcredit1 = remainingcredit/parseFloat(credit_price);

      console.log(remainingcredit+" remainingcredit");

      var credit_price_value=$('#credit_price_value').val();
      var token_remain=remainingcredit;
      token_remain= token_remain.toFixed(2);
      console.log(token_remain);
      console.log(remainingcredit + " remainingcredit");
      $("#user_credit_agree").val(remainingcredit1);
      $("#creditsavailable").html(parseFloat(token_remain));     
      $("#after_buy").html(parseFloat(token_remain));     
      
      console.log("Teste " + parseFloat(actualPrice) / parseFloat(credit_price));
      $("#credit_div").show();
      $("#transaction_div").show();
      $("#share_price_div").show(); 
      $("#error_price_div").hide();
      $("#share_error_price_div").hide();
      $("#agree").show();
    }
    else{
      $("#error_price_div").show();      
      $("#share_price_div").hide(); 
      $("#credit_div").hide();
      $("#transaction_div").hide();
      $("#share_error_price_div").hide();
      $("#agree").hide();
    }
        
    }
    else{
      $("#error_price_div").show();      
      $("#share_price_div").hide(); 
      $("#credit_div").hide();
      $("#transaction_div").hide();
      $("#share_error_price_div").hide();
      $("#agree").hide();
    }
  }
  else {
    $("#share_error_price_div").show();
    $("#share_price_div").hide(); 
    $("#credit_div").hide();
    $("#transaction_div").hide();
    $("#error_price_div").hide();
    $("#agree").hide();
  }
  });
</script>
<style>
.row-col1 input[type="number"]{
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
    display: block;
    height: 30px;
    padding: 5px;
    vertical-align: top;
    width: 274px;
}

.multiselect-search{
  height: 34px !important;
}
</style>
