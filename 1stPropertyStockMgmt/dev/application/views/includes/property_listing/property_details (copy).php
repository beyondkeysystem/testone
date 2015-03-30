<?php $this->load->view('home/breadcrumb'); ?>
<?php foreach($property_detail as $row){ $property_id = $row['id'];$property_status = $row['property_status']; ?>
<!--Main Body-->
<div class="wrapper"> 
  <!--Property Detail Section-->
 <div class="property_detail">
    <div class="pdetail_slider">
      <div class="main-image"> <img id="1" class="main"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image']?>" alt="Placeholder" class="custom">
      <img id="2" class="main"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image2']?>" alt="Placeholder" class="custom">
      <img id="3" class="main"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image3']?>" alt="Placeholder" class="custom">
      <img id="4" class="main"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image4']?>" alt="Placeholder" class="custom">
      <img id="5" class="main"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image5']?>" alt="Placeholder" class="custom">
      </div>
      <ul class="thumbnails">
        <li><a href="javascript:void(0)"><img id="1" class="thumb" src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image']?>" alt="No image" width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="2" class="thumb"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image2']?>" alt="No image"  width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="3" class="thumb"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image3']?>" alt="No image"  width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="4" class="thumb"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image4']?>" alt="No image"  width="88" height="88" ></a></li>
        <li><a href="javascript:void(0)"><img id="5" class="thumb"  src="<?php echo base_url(); ?>uploads/<?php echo $row['property_image5']?>" alt="No image"  width="88" height="88" ></a></li>
      </ul>
    </div>
    <div class="pdetail_text">
      <div class="pdetail_title">
        <h2> <?php echo $row['property_name']?><span><?php echo $row['property_location']?></span> </h2>
        <a href="#"><img src="<?php echo base_url(); ?>assets/front/images/cube.jpg"></a>
        <div class="clear"></div>
      </div>
      <div class="price_plan_sec">
      	<div class="start_price">Price Starts from: <strong><i class="fa fa-arrow-up greencolor"></i><?php echo ($row['property_current_price'])?$row['property_current_price']:$row['property_initial_price']; ?></strong></div>
      	<!--<div class="checkplan_btn"> <a href="#" data-reveal-id="myModal2" data-animation="fade">Check floor plan</a> </div>-->
      	<div class="clear"></div>
      </div>
      <div class="profitloss">
        <?php   if($this->session->userdata('is_logged_in')){
				  foreach($property_information as $property_information){
					$share_sold=$property_information['sold_property_share'];
				    $share_sell=$property_information['sell_property_share'];
	   ?>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pltable">
  <tr>
    <td id="pfbal"></td>
    <td class="greencolor"><?php $share_available = $property_information['property_share_in_per']; echo $property_information['property_share_in_per']; ?>%</td>
  </tr>
  <tr>
    <td><?php echo "My Profit & Loss";//if($property_information['profit']!=0){ if($this->lang->line('dashboard_my_profit')){echo ($this->lang->line('dashboard_my_profit'));} else{ echo 'My Profit';} }else{if($this->lang->line('dashboard_my_loss')){echo ($this->lang->line('dashboard_my_loss'));} else{ echo 'My Loss';}} ?></td>
	<td><?php echo "My Shares";?></td>
  </tr>
</table>
    <?php
	  $price=0;
	  if($row['property_current_price']) $price=$row['property_current_price'];
	  else $price = $row['property_initial_price'];
	  } // end foreach
		}
	  
	?>
	
	<div class="oa-percent"> 
    	<div class="loader_percent"><span style="width:<?=$owned?>%;"></span></div>
       	<div class="loader_text"><span class="loader_text1">Owned: <?=$owned?>%</span><span class="loader_text2">Available: <?=$available?>%</span></div>
    	<div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="buy_sell_btn">
       <?php   if(!$this->session->userdata('is_logged_in')){ ?>
		  <a href="javascript:void(0);" data-reveal-id="myModal" data-animation="fade" class="buyprop_btn bs_btn">Buy Property</a>
		<?php
		}elseif($this->session->userdata('is_logged_in') && $share_limits > 0 && $share_limits > $property_information['property_share_in_per']){ ?>
    	<a href="javascript:void(0);" data-reveal-id="myBuyModal" data-animation="fade" class="buyprop_btn bs_btn">Buy Property</a>
        <?php }elseif($this->session->userdata('is_logged_in') && $share_limits > 0 && $share_limits <= $property_information['property_share_in_per'] && ($property_status=='pending' || $property_status=='selling') || ($property_status=='owned' && $available > 0)){ ?>
		<a href="javascript:void(0);" data-reveal-id="myBuyExceedModal" data-animation="fade" class="buyprop_btn bs_btn">Buy Property</a>
		<?php }
		?>
		
        <?php if($this->session->userdata('is_logged_in') && $property_status=='owned' && $share_available > 0){   ?>
    	<a href="javascript:void(0);" data-reveal-id="mySellModal" data-animation="fade" class="sellprop_btn bs_btn">Sell Property</a>
        <?php } ?>
        <div class="clear"></div>

    </div> 
      </div>
      <div class="clear"></div>
      <div class="descp_table_title">
        <h2>Property Description</h2>
        <h3>Property Features</h3>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="descp_table">
          <tr>
            <td><strong>Property Ref:</strong></td>
            <td><?php echo $row['property_ref']?></td>
            <td><strong>Listing Price:</strong></td>
            <td>From <span class="colorblue"><?php echo $row['property_initial_price']?></span></td>
          </tr>
          <tr>
            <td><strong>Property Status:</strong></td>
            <td><?php echo $row['property_status'];?></td>
			<?php if($this->session->userdata('is_logged_in') && $row['property_status']=='pending'){ ?>
            <td><strong>Remaining Shares:</strong></td>
            <td><?php echo $share_limits - $share_available . "%";?></td>
			<?php
			} 
			elseif($this->session->userdata('is_logged_in') && $row['property_status']=='owned'){ ?>
            <td><strong>Remaining Shares:</strong></td>
            <td><?php echo $share_limits - $share_available . "%";?></td>
			<?php } ?>
          </tr>
          <tr>
            <td><strong>Property Type:</strong></td>
            <td><?php echo $row['property_type']?></td>
            <td><strong>Bathrooms:</strong></td>
            <td><?php echo $row['property_bathrooms']?></td>
          </tr>
          <tr>
            <td><strong>Built Up:</strong></td>
            <td><?php echo $row['built_up']?></td>
            <td><strong>Posted Date:</strong></td>
            <td><?php echo $row['modified']?></td>
          </tr>
           <tr>
            <td><strong>Current Price:</strong></td>
            <td><?php echo $row['property_current_price']?></td>
            <td><strong>Bedrooms:</strong></td>
            <td><?php echo $row['property_bedrooms']?></td>
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
      <div class="title">
        <h3>Malaysian Market Overview</h3>
      </div>
      <div class="mrkt_para"> <strong>Morbi venenatis dolor ut tortor facilisis</strong> vestibulum mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl tincidunt ullamcorper. Donec dignissim sagittis volutpat. Sed at consectetur ante, ut tincidunt dolor. </div>
      <div class="mrkt_graph_detail">
        <p><strong>MYR 720,000.00</strong> <span>(Last 5 changes)</span></p>
        <ul>
        	<li><strong>15 July 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>3.1%</span><span>MYR 215,000</span></li>
            <li><strong>20 Aug 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>1.1%</span><span>MYR 230,000</span></li>
            <li><strong>15 Sept 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>1.1%</span><span>MYR 245,000</span></li>
            <li><strong>15 Oct 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>2.1%</span><span>MYR 180,000</span></li>
            <li><strong>15 Nov 2014</strong><span><i class="fa fa-arrow-up greencolor"></i>5.1%</span><span>MYR 150,000</span></li>
        </ul>
      </div>
    </div>
    <div class="mrkt_graph"> <img src="<?php echo base_url(); ?>assets/front/images/graph3.jpg"> </div>
    <div class="clear"></div>
  </div>
  <!--/.Market Overview Section--> 
  <!--Tab-->
  <div id="container">
   <div id="tabs">
      <ul>
        <li><a href="#tab-1">Profit/Loss</a></li>
        <li><a href="#tab-2">Property Shares</a></li>
        <!--<li><a href="#tab-3">Property Details</a></li>-->	
      </ul>
      <div id="tab-1" class="clsdiv">
	       <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform', 'style' => 'margin-left: 800px;');
            //save the columns names in a array that we will use as filter         

            echo form_open('property_details/'.$property_detail[0]['id'], $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'class="search_text" placeholder="Enter Username"');

              $data_submit = array('name' => 'mysubmit', 'class' => 'search_submit', 'value' => 'Go');


              echo form_submit($data_submit);

            echo form_close();
            ?>
	    <div id="table-wrapper">
  <div id="table-scroll">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="prop_loss_table">
  <thead>
  <tr>
    <th scope="col" class="col1">#</th>
    <th scope="col" class="col1">User ID</th>
    <th scope="col" class="col2">Fund Type</th>
    <th scope="col" class="col3">Date</th>
    <th scope="col" class="col4">Detail</th>
    <th scope="col" class="col4">Debit</th>
    <th scope="col" class="col4">Credit</th>
  </tr>
  </thead>
  <?php
  $balance=0;
   if(empty($profit_and_loss_logs)){?>
    <tr>
    <td colspan="7">No Result Found</td>
  </tr>
    <?php }else{
  foreach($profit_and_loss_logs as $row){ 
 ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['user_name']; ?></td>
    <td><?php echo $row['fund_type']; ?></td>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['detail']; ?></td>
    <td><?php echo $row['debit']; ?></td>
    <td><?php echo $row['credit']; ?></td>
  </tr>
  <?php $balance = number_format($row['debit'] - $row['credit'] + $balance, 2); }
  
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
        <!-- <div class="tabcontent content"> <img src="<?php echo base_url(); ?>assets/front/images/tpic1.jpg" class="aright"> -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="prop_loss_table">
            <thead>
            <tr>
              <th scope="col" class="col1">S.no</th>
              <th scope="col" class="col1">User Name</th>
              <th scope="col" class="col2">Property Share Owned (in %)</th>
              <th scope="col" class="col3">Share for Sale (in %)</th>
              <th scope="col" class="col4">Share Sold Property (in %)</th>
              <th scope="col" class="col4"><span class="col-g">+ </span>Debit <span class="col-gr"> (MYR)</span></th>
              <th scope="col" class="col4"><span class="col-r">- </span>Credit<span class="col-gr"> (MYR)</span></th>
            </tr>
            </thead>
            <?php
            $count=1;
            foreach($user_property as $row){ ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['user_name']; ?></td>
              <td><?php echo $row['property_share_in_per']; ?></td>
              <td><?php echo $row['sell_property_share']; ?></td>
              <td><?php echo $row['sold_property_share']; ?></td>
              <?php foreach($credit_debit as $res){
                if($res[0]['user_id'] == $row['user_id']){
              ?>
                  <td><?php echo $res[0]['totalcredit']; ?></td>
                  <td><?php echo $res[0]['totaldebit']; ?></td>    
                <?php
                }
              } ?>
              
            </tr>
            <?php $count++; } ?>
           
          </table>
          <!-- <p><strong>Modern Facilities to Pamper and Inspire</strong> Vestibulum tempor ligula congue enim pellentesque ultrices. Maecenas at mi magna. Vestibulum tristique ultricies risus vitae mollis. Aliquam lobortis venenatis purus, non commodo dui convallis non. Etiam vestibulum ante vitae mauris eleifend dapibus. Cras sit amet efficitur turpis. Sed suscipit fringilla nisi a condimentum. Nullam scelerisque euismod nisi ut pretium. In interdum facilisis rhoncus. Nam eu tincidunt ipsum, quis tristique odio. Donec in eleifend velit, eget egestas lectus. Proin luctus mi eget egestas placerat. Nullam aliquam ex risus, venenatis imperdiet quam volutpat id. Integer dignissim lorem est, non commodo leo posuere et.</p>
          <p>Morbi venenatis dolor ut tortor facilisis vestibulum. Mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl.</p> -->
          
          <div class="clear"></div>
        </div>
      </div>
      <!--<div id="tab-3" class="clsdiv">
        <div class="tabcontent content"> <img src="<?php echo base_url(); ?>assets/front/images/tpic1.jpg" class="aright">
          <p><strong>Modern Facilities to Pamper and Inspire</strong> Vestibulum tempor ligula congue enim pellentesque ultrices. Maecenas at mi magna. Vestibulum tristique ultricies risus vitae mollis. Aliquam lobortis venenatis purus, non commodo dui convallis non. Etiam vestibulum ante vitae mauris eleifend dapibus. Cras sit amet efficitur turpis. Sed suscipit fringilla nisi a condimentum. Nullam scelerisque euismod nisi ut pretium. In interdum facilisis rhoncus. Nam eu tincidunt ipsum, quis tristique odio. Donec in eleifend velit, eget egestas lectus. Proin luctus mi eget egestas placerat. Nullam aliquam ex risus, venenatis imperdiet quam volutpat id. Integer dignissim lorem est, non commodo leo posuere et.</p>
          <p>Morbi venenatis dolor ut tortor facilisis vestibulum. Mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl.</p>
          <div class="clear"></div>
        </div>
        <div class="tabcontent content"> <img src="<?php echo base_url(); ?>assets/front/images/tpic2.jpg" class="aleft">
          <p><strong>Modern Facilities to Pamper and Inspire</strong> Vestibulum tempor ligula congue enim pellentesque ultrices. Maecenas at mi magna. Vestibulum tristique ultricies risus vitae mollis. Aliquam lobortis venenatis purus, non commodo dui convallis non. Etiam vestibulum ante vitae mauris eleifend dapibus. Cras sit amet efficitur turpis. Sed suscipit fringilla nisi a condimentum. Nullam scelerisque euismod nisi ut pretium. In interdum facilisis rhoncus. Nam eu tincidunt ipsum, quis tristique odio. Donec in eleifend velit, eget egestas lectus. Proin luctus mi eget egestas placerat. Nullam aliquam ex risus, venenatis imperdiet quam volutpat id. Integer dignissim lorem est, non commodo leo posuere et.</p>
          <p>Morbi venenatis dolor ut tortor facilisis vestibulum. Mauris tincidunt tincidunt ultricies. In hac habitasse platea dictumst. Vivamus tincidunt placerat sem, in interdum massa finibus eu. Sed finibus blandit nisl vel tempor. Duis posuere imperdiet ultrices. Nunc tempor ligula aliquet nisl.</p>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
  </div> -->
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
      <p>Call us now & get a free quote</p>
      <h2>+00 9999 1245 256</h2>
    </div>
    <div class="blue2">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</div>
    <div class="blue3"><img src="<?php echo base_url(); ?>assets/front/images/girl.png"></div>
    <div class="clear"></div>
  </div>
</div>
<!--/.Blue Bar--> 

<!--SellPopup-->
  <div id="mySellModal" class="reveal-modal popup" style="opacity: 1; top: 10%;">
    <h3>If want to sell share for property to available shares</h3>
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);">close <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
	Sell Share For Property into <?=$share_available?> percentage.
	<form accept-charset="utf-8" method="post" action="#">
	  <div class="reg-form-row">
		<div class="row-col1">
		  <label>Sell Share (in %)</label>
		  
		  <input type="text" name="sell_share_percentage" id="sell_share_percent" placeholder=0.1>
		  <input type="hidden" name="property_status" value="<?=$property_status?>">
		  <input type="hidden" name="property_id" value="<?=$property_id?>" id="property_id">
		  <input type="hidden" name="share_available" value="<?=$share_available?>" id="share_available">
		  <input type="hidden" name="share_limits" value="<?=$share_limits?>" id="<?=$share_limits?>">
		  <input type="hidden" name="property_click" value="sell">
		</div>      
	  </div>
	  <div class="" id="sell_credit_div" style="display: none;">
		<div class="row-col1">
		  <label>If another member buy your shares then funds is updated and number of shares will be deducted from your account.</label>
		  <!--label>Credits Needed: <span id="sell_creditsneeded"></span> and Now you have remains <span id="sell_creditsavailable"><?=$user_credit[0]['credit']?></span> if you agreed to buy</label-->
		</div>
	  </div>
	  <div class="" id="sell_error_price_div" style="display: none;">
		<div class="row-col1">
		  <label>Total number of share is too much high than your shares values.</label>
		</div>
	  </div>
	 
	 <div class="checkplan_btn"> <a id="SellSubmit" href="javascript:void(0);">Agree</a> </div>
	  <!--div class="signup">Not A Member ?   <a href="http://myviko.pd.cisinlive.com/register"> Sign up Now!</a></div-->
	</form>
  </div>
<!--/.SellPopup-->

<!--BuyPopup-->
  <div id="myBuyModal" class="reveal-modal popup" style="opacity: 1; top: 10%;">
	<?php $buyshare = $share_limits - $share_available;?>
    <h3>Buy Share For Property To Available Fund</h3>
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);">close <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>
	<?php if($available <= $buyshare){ ?>
	You can buy <span id="available"><?=$buyshare?></span> % shares. <!-- Mayank Pawar -->
	<?php }else{ ?>
	You can buy <span id="available"><?=$buyshare?></span> % shares. <!-- Mayank Pawar -->
	<?php } ?>
	<form accept-charset="utf-8" method="post" action="">
	  <div class="reg-form-row">
		<div class="row-col1">
		  <?php
		  if($property_status == 'owned'){
			?>
<label>Buy Share to share holders(in %)</label>


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
                                  
                                if(checked === true){
                                  $("#share_table").css('display','block');
                                  var content = "";
                                  selectedOptions.each(function() {
                                    var name = $(this).text();                                    
                                    var percentage = $(this).val();
                                    var user_prop_id = $(this).attr("user_prop_id");
                                    var arr = name.split(" ");
                                    name = arr[0];
                                    content += "<tr><td>"+name+"</td><td>"+percentage+"%</td><td><input type='number' step='any' class='share_req' name='share_req["+user_prop_id+"]' min='0' max='"+percentage+"' /></td></tr>";
                                  });


                                }else{
                                  var content = "";
                                  selectedOptions.each(function() {
                                    var name = $(this).text();                                    
                                    var percentage = $(this).val();
                                    var user_id = $(this).attr("user_id");
                                    var arr = name.split(" ");
                                    name = arr[0];
                                    content += "<tr><td>"+name+"</td><td>"+percentage+"%</td><td><input type='number' step='any' class='share_req' name='share_req["+user_prop_id+"]' min='0' max='"+percentage+"' /></td></tr>";
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
                        <option value="<?=$row['sell_property_share']?>" user_prop_id="<?=$row['id']?>"><?=$row['user_name']." ".$row['sell_property_share']."%"?></option>
                      <?php
                        } 
                      ?>
                  </select>
                  
                    <div class="table-responsive"> 
                      <table class="table table-hover" id="share_table" style="display:none;">
                        <thead>
                          <tr><th>Share Holder Name</th><th>Available Share</th><th>Quantity</th></tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr><td></td><td>Buy Share (in %)</td><td>
                              <input type="text" name="share_percentage" id="share_percent" value="0" disabled="disabled" style="width:100px">
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
		  
		  <label>Buy Share (in %)</label>		  
		  <input type="text" name="share_percentage" id="share_percent" placeholder=0.1>
		  <input type="hidden" name="share_price" value="<?=$price?>" id="property_shares_price">
		  <?php }?>

		  <input type="hidden" name="property_status" value="<?=$property_status?>">
		   <input type="hidden" name="property_click" value="buy">
			
     		<input type="hidden" name="share_limits" id="share_limits" value="<?=$share_limits?>">
			<input type="hidden" name="exisitingShare" value="<?=$share_available?>" id="exisitingShare">
		  <?php $txnFees = str_replace("$","",$role['amount']); ?>
		  <input type="hidden" name="transactionfees" value="<?=$txnFees?>" id="transaction_fees">
		  <?php $credit_prices = str_replace("$","",$credit_price[0]['price']); ?>
		  <input type="hidden" name="credit_price" value="<?=$credit_prices?>" id="credit_price">
		  <input type="hidden" name="user_credit" value="<?php echo $user_credit[0]['credit'];?>" id="user_credit">
		</div>      
	  </div>
	  <div class="reg-form-row" id="share_price_div" style="display: none;">
		 <div class="row-col1">
		  <label>Share Price + Transaction Fees: <span id="price"></span> </label>
		</div>
	  </div>   
	  <div class="" id="credit_div" style="display: none;">
		<div class="row-col1">
		  <label>Funds Needed: <span id="creditsneeded"></span> and Now you have remains <span id="creditsavailable"><?=$user_credit[0]['credit']?></span> fund and your remaining share <span id="shareremaining"></span> if you agreed to buy</label>
		</div>
	  </div>
	  <div class="" id="error_price_div" style="display: none;">
		<div class="row-col1">
		  <label>Total price of buy share is too much high than your fund values.</label>
		</div>
	  </div>
	  <div class="" id="share_error_price_div" style="display: none;">
		<div class="row-col1">
		  <label>Total buy share value is too much high than your share limits which decide by admin contact with administrator or generate tickets for futher discussion.</label>
		</div>
	  </div>
	 
	 <div class="search_btn"><input type="submit" value="Agree" /></div>
	  <!--div class="signup">Not A Member ?   <a href="http://myviko.pd.cisinlive.com/register"> Sign up Now!</a></div-->
	</form>
  </div>
<!--/.Popup-->

<!--BuyExceedPopup-->
  <div id="myBuyExceedModal" class="reveal-modal popup" style="opacity: 1; top: 10%;">
    <h3 style="top:40%;position:relative">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      Your share percentage overflow for this Property</h3>
    <div class="close"><a class="close-reveal-modal" href="javascript:void(0);">close <i class="fa fa-close"></i></a></div>  
    <div class="clear"></div>	
  </div>
<!--/.BuyExceedPopup-->
<script>
  
$(document).ready(function () {
  
  var bal = <?=$balance?>;
  $("#pfbal").html("MYR "+ bal);
});
</script>
<script>
  
  
  //For Sell
  $("#sell_share_percent").keyup(function(){
	var sell_share = $(this).val();
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
	  }
	}
	else{
	  $("#sell_credit_div").hide();
	  $("#sell_error_price_div").hide();
	}
  });
  
  $("#SellSubmit").click(function(){
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
			  window.location.href = "<?php echo site_url();?>property_details/"+propId;  //as a debugging message.
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
	
	console.log($(this).val());
	var share = $(this).val();
	var share_limits = $("#share_limits").val();
	var exisitingShare = $("#exisitingShare").val();
	var shareavail = parseFloat(share_limits) - parseFloat(exisitingShare);
	if (share <= shareavail) {
	  var shareremaining = parseFloat(share_limits) - parseFloat(share) - parseFloat(exisitingShare);
	  $("#shareremaining").html(shareremaining);
	  var property_shares_price = $("#property_shares_price").val();
	  var credit_price = $("#credit_price").val();
	  var user_credit = $("#user_credit").val();
	  
	  console.log(property_shares_price + " property_shares_price");
	  console.log(credit_price + " credit_price");
	  console.log(user_credit + " user_credit");
	  var share_price = (parseFloat(property_shares_price) * parseFloat(share))/100;
	  console.log(share_price + " share_price");
	  
	  var transaction_fees = $("#transaction_fees").val();
	  console.log(transaction_fees + " transaction_fees");
	  
	  if (share_price != 0) {
		var totalprice = parseFloat(share_price) + parseFloat(transaction_fees);
		console.log(totalprice + " totalprice");
		$("#price").html(totalprice);
		
		// User credit amount
		var totalcreditamt = parseFloat(user_credit) * parseFloat(credit_price);
		console.log(totalcreditamt + " totalcreditamt");
		if(parseFloat(totalprice) <= parseFloat(totalcreditamt)){
		  var actualPrice = parseFloat(totalcreditamt) - parseFloat(totalprice);
		  //Get credit value
		  var creditneeded = parseFloat(totalprice) / parseFloat(credit_price);
		  $("#creditsneeded").html(creditneeded);
		  
		  var remainingcredit = parseFloat(user_credit) - parseFloat(creditneeded);
		  console.log(remainingcredit + " remainingcredit");
		  $("#user_credit").val(remainingcredit);
		  $("#creditsavailable").html(remainingcredit);		  
		  
		  console.log("Teste " + parseFloat(actualPrice) / parseFloat(credit_price));
		  $("#credit_div").show();
		  $("#share_price_div").show();		  
		}
		else{
		  $("#error_price_div").show();
		}		
	  }
	}
	else{
	  $("#share_error_price_div").show();
	}
  });
</script>