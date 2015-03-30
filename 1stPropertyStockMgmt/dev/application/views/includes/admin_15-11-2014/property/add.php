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
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new property created with success.';
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
      $options_property_type = array('' => "Select");
      foreach ($property_type as $row)
      {
        $options_property_type[$row['type']] = $row['type'];
      }
      //form validation
      echo validation_errors();
      
      echo form_open('admin/property/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Property name</label>
            <div class="controls">
              <input type="text" id="" name="property_name" value="<?php echo set_value('property_name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property location</label>
            <div class="controls">
              <input type="text" id="searchTextField" name="property_location" value="<?php echo set_value('property_location'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Property initial price</label>
            <div class="controls">
              <input type="text" class="property_initial_price" name="property_initial_price" value="<?php echo set_value('property_initial_price'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property current price</label>
            <div class="controls">
              <input type="text"  class="property_current_price" name="property_current_price" value="<?php echo set_value('property_current_price'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property Bedrooms</label>
            <div class="controls">
              <input type="text"  class="property_bedrooms" name="property_bedrooms" value="<?php echo set_value('property_bedrooms'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property Bathrooms</label>
            <div class="controls">
              <input type="text"  class="property_bathrooms" name="property_bathrooms" value="<?php echo set_value('property_bathrooms'); ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
         
          <div class="control-group">
            <label for="inputError" class="control-label">Property type</label>
            <div class="controls">
            <?php echo form_dropdown('property_type', $options_property_type, set_value('property_type'), 'class="span2"'); ?>
            </div>
          </div>
          <?php
          echo '<div class="control-group">';
            echo '<label for="manufacture_id" class="control-label">Property status</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('property_status', $options_property_status, set_value('property_status'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          echo '</br>';
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>

        </fieldset>

      <?php echo form_close(); ?>

    </div>
     