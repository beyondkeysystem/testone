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
          Add User Property Share Limit
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">�</a>';
            echo '<strong>Well done!</strong> new share limit created with success.';
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
      
      echo form_open('admin/share_limit/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Username</label>
            <div class="controls">
              <select name="user_id" onchange="changePropertyVal(this);" >
              <?php foreach($userData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['user_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Property</label>
            <div class="controls">
              <select name="property_id" onchange="changePropertyVal(this);" >
              <?php foreach($propertyData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['property_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Share Limit</label>
            <div class="controls">
              <input type="text" id="" name="share_limit" value="<?php echo set_value('share_limits'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>

        </fieldset>

      <?php echo form_close(); ?>

    </div>
     