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
          Add Profit and Loss Allotment
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
          <!-- <div class="control-group">
            <label for="inputError" class="control-label">User Id</label>
            <div class="controls">
              <select name="user_id" id="user_id_log" >
              <?php foreach($userData as $row){ ?>
                <option value="<?=$row['id']?>"><?=$row['user_name']?></option>
                <?php }?>
              </select>
            </div>
          </div> -->
          
          <div class="control-group">
            <label for="inputError" class="control-label">Property Id</label>
            <div class="controls">
              <select name="property_id" id="property_id_log">
              <?php 
                foreach($propertyData as $row){ 
                  if($this->input->get('property_id') && $row['id'] ==  $this->input->get('property_id')){
                    $selected = "selected";
                  }else{
                    $selected = "";
                  }
                ?>
                <option value="<?=$row['id']?>" <?=$selected?> ><?=$row['property_name']?></option>
                <?php }?>
                
              </select>
            </div>
          </div>

            <div class="control-group">
              <label for="inputError" class="control-label">Profit/Loss</label>
              <div class="controls">
                <?php
                  $options = array(
                    'Profit'  => 'Profit',
                    'Loss'    => 'Loss'
                  );

                  echo form_dropdown('profit_loss', $options, set_value('profit_loss'));
                ?>
              </div>
            </div>           
            <div class="control-group">
              <label for="inputError" class="control-label">Details</label>
              <div class="controls">
                <input type="text" id="" name="detail" value="<?php echo set_value('detail'); ?>" >
              </div>
            </div>
            <div class="control-group">
              <label for="inputError" class="control-label">Amount</label>
              <div class="controls">
                <input type="text" id="" name="amount" value="<?php echo set_value('amount'); ?>" >
                <input type="hidden" name="url" value="<?=$_SERVER['HTTP_REFERER']?>">
              </div>
            </div>

           <!--  <div class="control-group">
              <label for="inputError" class="control-label">Debit</label>
              <div class="controls">
                <input type="text" id="" name="debit" value="<?php echo set_value('debit'); ?>" >
                <span class="help-inline">Woohoo!</span>
              </div>
            </div>
              <div class="control-group">
            <label for="inputError" class="control-label">Credit</label>
            <div class="controls">
              <input type="text" id="" name="credit" value="<?php echo set_value('credit'); ?>" >
              <span class="help-inline">Woohoo!</span>
            </div>
          </div> -->
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <?php
            // echo $_SERVER['HTTP_REFERER'];
              if(strpos($_SERVER['HTTP_REFERER'], 'admin/profit_and_loss_logs/listproperty?pid=') !== false){
            ?>
                <a  class="btn" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Cancel</a>  <!--Mayank Pawar Date 27.11.14-->
            <?php
              }else{
            ?>                
              <a  class="btn" href="<?php echo base_url(); ?>admin/profit_and_loss_logs">Cancel</a>  <!--Mayank Pawar Date 27.11.14-->
            <?php
              }
            ?>
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
     