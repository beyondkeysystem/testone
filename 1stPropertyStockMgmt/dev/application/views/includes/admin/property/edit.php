    <?php if(($property[0]['id']==$this->uri->segment(4)) && ($property[0]['property_status']=='blocked')){
      redirect('admin/property');
      } ?>
    
    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Update</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Updating <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

 
      <?php
      //flash messages
         $options_property_type = array('' => "Select");
      foreach ($property_type as $row)
      {
        $options_property_type[$row['type']] = $row['type'];
      }
       $options_property_deals = array('' => "Select", 'Sale' => 'sale', 'Buy' => 'buy', 'Rent' => 'rent');
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> property updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
    $options_property_status = array('' => "Select", 'selling' => 'selling', 'pending' => 'pending', 'owned' => 'owned');

      //form validation
      echo validation_errors();

      echo form_open_multipart('admin/property/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Property name</label>
            <div class="controls">
              <input type="text" id="" name="property_name" value="<?php echo $property[0]['property_name']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property location</label>
            <div class="controls">
              <input type="text" id="searchTextField" name="property_location" value="<?php echo $property[0]['property_location']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Property initial price</label>
            <div class="controls">
              <input type="text" class="property_initial_price" name="property_initial_price" value="<?php echo $property[0]['property_initial_price'];?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property current price</label>
            <div class="controls">
              <input type="text"  class="property_current_price"  name="property_current_price" value="<?php echo $property[0]['property_current_price']; ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property Bedrooms</label>
            <div class="controls">
              <input type="text"  class="property_bedrooms"  name="property_bedrooms" value="<?php echo $property[0]['property_bedrooms']; ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property Bathrooms</label>
            <div class="controls">
              <input type="text"  class="property_bathrooms"  name="property_bathrooms" value="<?php echo $property[0]['property_bathrooms']; ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          
           <div class="control-group">
            <label for="inputError" class="control-label">Property Images (please select any image of max width=484px; max height=414px; otherwise not updated)</label>
            <div class="controls">
              <img src="<?php echo base_url(); ?>uploads/<?php echo $property[0]['property_image']; ?>" width="44" height="44"  alt="No image"  /><input type="file" name="userfile[]" /></br></br>
	      <img src="<?php echo base_url(); ?>uploads/<?php echo $property[0]['property_image2']; ?>" width="44" height="44"  alt="No image" /><input type="file" name="userfile[]" /></br></br>
	      <img src="<?php echo base_url(); ?>uploads/<?php echo $property[0]['property_image3']; ?>" width="44" height="44"  alt="No image"  /><input type="file" name="userfile[]" /></br></br>
              <img src="<?php echo base_url(); ?>uploads/<?php echo $property[0]['property_image4']; ?>" width="44" height="44"  alt="No image"  /><input type="file" name="userfile[]" /></br></br>
	      <img src="<?php echo base_url(); ?>uploads/<?php echo $property[0]['property_image5']; ?>" width="44" height="44"  alt="No image"  /><input type="file" name="userfile[]" /></br></br>
              <!--<span class="help-inline">OOps</span>-->
               <input type="hidden" name="old_image1" value="<?php echo $property[0]['property_image']; ?>"/>
              <input type="hidden" name="old_image2" value="<?php echo $property[0]['property_image2']; ?>"/>
              <input type="hidden" name="old_image3" value="<?php echo  $property[0]['property_image3']; ?>"/>
              <input type="hidden" name="old_image4" value="<?php echo $property[0]['property_image4']; ?>"/>
              <input type="hidden" name="old_image5" value="<?php echo $property[0]['property_image5']; ?>"/>
            </div>
          <?php
          echo '<div class="control-group">';
            echo '<label for="manufacture_id" class="control-label">Property type</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('property_type', $options_property_type, $property[0]['property_type'], 'class="span2"');

            echo '</div>';
          echo '</div>';
          echo '</br>';
          ?>
          <?php
          echo '<div class="control-group">';
            echo '<label for="manufacture_id" class="control-label">Property status</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('property_status', $options_property_status, $property[0]['property_status'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          echo '</br>';
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/property">Cancel</a>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     