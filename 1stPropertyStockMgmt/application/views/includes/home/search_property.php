<style>
  .search_btns{
	background: none repeat scroll 0 0 #312783 !important;
    border: 1px solid #312783 !important;
    border-radius: 3px !important;
    color: #fff !important;
    display: inline-block !important;
    font-style: italic !important;
    font-weight: 600 !important;
	line-height: 39px !important;
	padding: 0 22px !important;
	text-transform: uppercase;
  }
</style>
<!--Search Property-->

<div class="search_property">
  <div class="wrapper">
    <div class="dropdowns">
<?php
      //form data
	  
      $attributes = array('class' => 'form-horizontal', 'id' => '');
       $options_property_status = array('' => "Select");
       $i=1;
      foreach ($property_status as $row)
      {
		if($row['property_status'] != '')
          $options_property_status[$row['property_status']] = $row['property_status'];
	$i++;
      }
      
        $options_property_id = array('' => "Select");
       $m=1;
	  foreach ($property as $row)
      {
		if($row['property_ref'] != '')
		  $options_property_id[$row['property_ref']] = $row['property_ref'];
	$m++;
      }
      $options_property_type = array('' => "Select");
       $j=1;
      foreach ($property_type as $row)
      {
		if($row['type'] != '')
          $options_property_type[$row['type']] = $row['type'];
	    $j++;
      }
      
      $options_property_baths = array('' => "Select");
     
      for ($k=1; $k<=10; $k++)
      {
        $options_property_baths[$k] = $k;
      }
    
     $options_property_beds = array('' => "Select");
       $l=1;
      for ($l=1; $l<=10; $l++)
      {
        $options_property_beds[$l] = $l;

      }
      
      //form validation
      echo validation_errors();
      
      echo form_open_multipart('property_listing', $attributes);

if(empty($filter_session_data) || $filter_session_data == 0){
  $filter_session_data = array();
  $filter_session_data['property_ref'] = '';  
  $filter_session_data['property_type'] = '';
  $filter_session_data['property_location'] = '';
  $filter_session_data['property_status'] = '';
}
?>
        <div class="dropdown_row1">
          <div class="dropdown_box">
            <label><?php echo ($this->lang->line('search_property_id')); ?></label>
            <div class="dropdown_arrows">
			<?php
			if($filter_session_data['property_ref'] != ''){
			 echo form_dropdown('property_ref', $options_property_id, $filter_session_data['property_ref'], 'class="custom-select"');
			}
			else{			  
			 echo form_dropdown('property_ref', $options_property_id, 'Select', 'class="custom-select"');
			}
			?>
            </div>
          </div>
          <div class="dropdown_box">
            <label><?php echo ($this->lang->line('search_location')); ?></label>
            <div class="dropdown_arrows">
 <input type="text" id="searchTextField" name="property_location" value="<?php echo $filter_session_data['property_location']; ?>">
            </div>
          </div>
          <div class="dropdown_box">
            <label><?php echo ($this->lang->line('search_type')); ?></label>
            <div class="dropdown_arrows">
 <?php
  if(!empty($filter_session_data['property_type']))
    echo form_dropdown('property_type', $options_property_type, $filter_session_data['property_type'], 'class="custom-select"');
  else
    echo form_dropdown('property_type', $options_property_type, 'Select', 'class="custom-select"');
 ?>
            </div>
          </div>
          <div class="dropdown_box m-r">
            <label><?php echo ($this->lang->line('search_status')); ?></label>
            <div class="dropdown_arrows">
	      <?php
		  if(!empty($filter_session_data['property_status']))
		    echo form_dropdown('property_status', $options_property_status, $filter_session_data['property_status'], 'class="custom-select"');
		  else
		    echo form_dropdown('property_status', $options_property_status, 'Select', 'class="custom-select"');
		  ?>
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <div class="dropdown_box">
          <label><?php echo ($this->lang->line('search_beds')); ?></label>
          <div class="dropdown_arrows">
<?php
 if(!empty($filter_session_data['property_bedrooms']))
 echo form_dropdown('property_bedrooms', $options_property_beds, $filter_session_data['property_bedrooms'], 'class="custom-select"');
 else
 echo form_dropdown('property_bedrooms', $options_property_beds, 'Select', 'class="custom-select"');
?>
          </div>
        </div>
        <div class="dropdown_box">
          <label><?php echo ($this->lang->line('search_baths')); ?></label>
          <div class="dropdown_arrows">
<?php
    if(!empty($filter_session_data['property_bedrooms']))
      echo form_dropdown('property_bathrooms', $options_property_baths, $filter_session_data['property_bathrooms'], 'class="custom-select"'); 
	else
	  echo form_dropdown('property_bathrooms', $options_property_baths, 'Select', 'class="custom-select"');
?>
          </div>
        </div>
        <div class="dropdown_box" id="minmax">
          <label><?php echo ($this->lang->line('search_price')); ?></label>
		  <div class="minmax">
          <!--img src="<?php echo base_url(); ?>assets/front/images/price-slider.png"-->
		  <div class="example">
			<div id="html5"></div>
			<div class="minmaxprice"><span>Min</span>: <div class="minprice">
			<input type="text" name="minprice" id="input-select" step="1" min="0"></div> - <span>Max</span>: <div class="maxprice">
			<input type="text" name="maxprice" id="input-number" required="false" step="1" min="0"></div></div>
			
		 
			
<script>
// Append the option elements
/*for ( var i = 0; i <= 400000; i++ ){
	$('#input-select').append(
		'<option value="'+i+'">$'+i+'</option>'
	);
}*/
</script>			
<script>
$('#html5').noUiSlider({
	start: [ 0, 90000 ],
	connect: true,
	range: {
		'min': 0,
		'max': 90000
	}
});
</script>			
<script>
// A select element can't show any decimals
$('#html5').Link('lower').to($('#input-select'), null/*, wNumb({
	decimals: 0
})*/);

$('#html5').Link('upper').to($('#input-number'),null);

</script>		</div>
          
		  
		  
          </div>	
        </div>
        <div class="search_btn"> <input type="submit" class="search_btns" name="search_property" value="<?php echo ($this->lang->line('search_search_property')); ?>"> </div>
        <div class="clear"></div>
        <?php echo form_close(); ?>
    </div>
  </div>
</div>

<!--/.Search Property--> 

