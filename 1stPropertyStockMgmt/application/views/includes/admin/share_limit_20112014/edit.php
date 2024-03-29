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
          Updating User Property Share Limit and Profit/Loss Limit
        </h2>
      </div>

 
      <?php
      //flash messages
     
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
          echo '<a class="close" data-dismiss="alert">�</a>';
          echo '<strong>Well done!</strong> Share limit allotment updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">�</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');

      //form validation
      echo validation_errors(); 

      echo form_open('admin/share_limit/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Username</label>
            <div class="controls">
              <input type="text" readonly="true" value="<?=ucfirst($row['user_name'])?>">
              <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Property</label>
            <div class="controls">
              <input type="text" readonly="true" value="<?=ucfirst($property['property_name'])?>">
              <input type="hidden" name="property_id" value="<?=$row['property_id']?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Share Limit</label>
            <div class="controls">
              <input type="text" name="share_limits" value="<?=$row['share_limits']?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Profit</label>
            <div class="controls">
              <input type="text" name="profit" value="<?=$row['profit']?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Loss</label>
            <div class="controls">
              <input type="text" name="loss" value="<?=$row['loss']?>">
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Details</label>
            <div class="controls">
              <input type="text" name="details" value="<?=$row['details']?>">
            </div>
          </div> 
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/credit_price">Cancel</a>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     