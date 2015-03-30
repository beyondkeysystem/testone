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
          <a href="#">Update</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Updating <?php echo ucfirst($url2);?>
        </h2>
      </div>

        <div class="row">
            <div class="span12 columns">
                <div class="well">
                    <?php echo $this->load->view('admin/elements/usermenu',$user[0]);?>
                </div>
            </div>
        </div>
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">x</a>';
            echo '<strong>Well done!</strong> user updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">x</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
     
      echo validation_errors();
     
      echo form_open('admin/user/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">First Name</label>
            <div class="controls">
              <input type="text" id="" name="first_name" value="<?php echo $user[0]['first_name']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Last Name</label>
            <div class="controls">
              <input type="text" id="" name="last_name" value="<?php echo $user[0]['last_name']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Email Address</label>
            <div class="controls">
              <input type="text" id="" name="email_addres" value="<?php echo $user[0]['email_addres'];?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">User Name</label>
            <div class="controls">
              <input type="text" name="user_name" value="<?php echo $user[0]['user_name']; ?>">
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
             <div class="control-group">
            <label for="inputError" class="control-label">New Password</label>
            <div class="controls">
              <input type="password" name="pass_word" >
              <!--<span class="help-inline">OOps</span>-->
            </div>
          </div>
              <input type="hidden" name="id" value="<?php echo $user[0]['id']; ?>">
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/user">Cancel</a>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     