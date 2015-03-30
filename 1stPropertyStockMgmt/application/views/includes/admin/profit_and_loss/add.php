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
          Add User Property Share Limit
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
      
      echo form_open('admin/profit_and_loss_logs/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">User Id</label>
            <div class="controls">
              <select name="user_id" id="user_id_log" >
              <?php foreach($userData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['user_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <label for="inputError" class="control-label">Property Id</label>
            <div class="controls">
              <select name="property_id" id="property_id_log">
              <?php foreach($propertyData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['property_name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
           <div class="control-group">
            <label for="inputError" class="control-label">Detail</label>
            <div class="controls">
              <input type="text" id="" name="detail" value="<?php echo set_value('detail'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
            <div class="control-group">
            <label for="inputError" class="control-label">Debit</label>
            <div class="controls">
              <input type="text" id="" name="debit" value="<?php echo set_value('debit'); ?>" >
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
            <button class="btn" type="reset">Cancel</button>
          </div>

        </fieldset>

      <?php echo form_close(); ?>

    </div>
    <script>
      $( document ).ready(function() {
      $('#user_id_log').change(function() {
        var str = "";
         $( "#user_id_log option:selected" ).each(function() {
          str += $( this ).val();
       $.ajax({
                        type: "POST",
                        data : 'user_id='+str,
                        url: "<?php echo site_url('admin/share_limit/property'); ?>",
                        dataType : 'json',
                        success: function(response) 
                        {
                          $('#property_id_log').empty();    
                          $.each(response, function(i,value){
                              $('#property_id_log').append("<option value='"+value['id']+"'>"+value['property_name']+"</option>");    
                         });
                          
                        }

                    });
        });
        });
       });
    </script>
     