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
             <?php $url2=$this->uri->segment(2);
          $url2=str_replace("_"," ",$url2);
          ?>
            <?php echo ucfirst($url2);?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding  <?php $url2=$this->uri->segment(2);
          $url2=str_replace("_"," ",$url2);
          ?>
            <?php echo ucfirst($url2);?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new User created with success.';
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
      if(isset($error_message)){ 
        echo '<div style="color:red; font-size:18px; margin-bottom:20px; margin-left:200px;">'.$error_message.'</div>';
      }
      echo form_open('admin/user/add', $attributes);
      ?>
        <fieldset>
           <div class="control-group">
            <label for="inputError" class="control-label">First Name</label>
            <div class="controls">
              <input type="text" id="searchTextField" name="first_name" value="<?php echo set_value('first_name'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
            <div class="control-group">
            <label for="inputError" class="control-label">Last Name</label>
            <div class="controls">
              <input type="text" id="searchTextField" name="last_name" value="<?php echo set_value('last_name'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
             <div class="control-group">
            <label for="inputError" class="control-label">Email Addres</label>
            <div class="controls">
              <input type="text" id="searchTextField" name="email_addres" value="<?php echo set_value('email_addres'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
           
            <div class="control-group">
            <label for="inputError" class="control-label">User Name</label>
            <div class="controls">
              <input type="text" id="" name="user_name" value="<?php echo set_value('user_name'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
           
          <div class="control-group">
            <label for="inputError" class="control-label">Password</label>
            <div class="controls">
              <input type="password" id="" name="pass_word" value="<?php echo set_value('pass_word'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          
         <!--  <div class="control-group">
            <label for="inputError" class="control-label">Type</label>
            <div class="controls">
              <input type="text" id="" name="type" value="<?php echo set_value('type'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>
            </div>
          </div>-->
          
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/user">Cancel</a>
          </div>

        </fieldset>

      <?php echo form_close(); ?>

    </div>
     