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
          Add User Property
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new share limit created with success.';
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
      
      echo form_open('admin/user_property/add', $attributes);
      ?>
        <fieldset>

  <div class="control-group">
            <label for="inputError" class="control-label">Username</label>
            <div class="controls">
              <select name="user_id" id="user_id" >
              <?php foreach($userData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['user_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Property</label>
            <div class="controls">
              <select name="property_id" id="property_id">
              <?php foreach($propertyData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['property_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Property share in per</label>
            <div class="controls">
              <input type="text" id="" name="property_share_in_per" value="<?php echo set_value('property_share_in_per'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
           <a  class="btn" href="<?php echo base_url(); ?>admin/share_limit">Cancel</a>
          </div>

        </fieldset>

      <?php echo form_close(); ?>

    </div>
    <!--<script>
      $( document ).ready(function() {
      $('#user_id').change(function() {
        var str = "";
         $( "#user_id option:selected" ).each(function() {
          str += $( this ).val();
       $.ajax({
                        type: "POST",
                        data : 'user_id='+str,
                        url: "<?php echo site_url('admin/share_limit/property'); ?>",
                        dataType : 'json',
                        success: function(response) 
                        {
                          $('#property_id').empty();    
                          $.each(response, function(i,value){
                              $('#property_id').append("<option value='"+value['id']+"'>"+value['property_name']+"</option>");    
                         });
                          
                        }

                    });
        });
        });
       });
    </script>-->
     
