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
              <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo ucfirst($url_2);?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding    <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo ucfirst($url_2);?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new User Credits created with success.';
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
      //form validation
      echo validation_errors();
      
      echo form_open('admin/user_credit/add', $attributes);
      ?>
        <fieldset>
           <div class="control-group">
            <label for="inputError" class="control-label">User Id</label>
            <div class="controls">
              <input type="text" id="searchTextField" name="user_id" value="<?php echo set_value('user_id'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
           
            <div class="control-group">
            <label for="inputError" class="control-label">User Name</label>
            <div class="controls">
              <input type="text" id="" name="username" value="<?php echo set_value('username'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
           
          <div class="control-group">
            <label for="inputError" class="control-label">Credit</label>
            <div class="controls">
              <input type="text" id="" name="credit" value="<?php echo set_value('credit'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/user_credit">Cancel</a>
          </div>

        </fieldset>

      <?php echo form_close(); ?>

    </div>
     