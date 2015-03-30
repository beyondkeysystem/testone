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

      //form validation
      echo validation_errors();

      echo form_open('admin/user_credit/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
         
          <div class="control-group">
            <label for="inputError" class="control-label">Credit</label>
            <div class="controls">
              <input type="text" id="" name="credit" value="<?php echo $user_credit[0]['credit']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <input type="hidden" id="" name="user_id" value="<?php echo $user_credit[0]['user_id']; ?>" >
          <input type="hidden" id="" name="username" value="<?php echo $user_credit[0]['username']; ?>" >
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/user_credit">Cancel</a>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     