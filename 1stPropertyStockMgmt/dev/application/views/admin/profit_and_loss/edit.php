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
          <?php echo ucfirst($url_2); ?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Update</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Update Profit and Loss Allotment
        </h2>
      </div>

 
      <?php
      //flash messages
     
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
          echo '<a class="close" data-dismiss="alert">x</a>';
          echo '<strong>Well done!</strong> Profit and Loss allotment updated with success.';
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

      //form validation
      echo validation_errors(); 
      foreach($row as $row){
      echo form_open('admin/profit_and_loss_logs/update/'.$this->uri->segment(4).'', $attributes);
       
      ?>
        <fieldset>
          <!-- <div class="control-group">
            <label for="inputError" class="control-label">User Id</label>
            <div class="controls">
              <input type="text" readonly="true" value="<?=ucfirst($row['user_id'])?>">
              <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
            </div>
          </div> -->
          <div class="control-group">
            <label for="inputError" class="control-label">Property Id</label>
            <div class="controls">
              <input type="text" readonly="true" value="<?=ucfirst($property['property_name'])?>">
              <input type="hidden" name="property_id" value="<?=$row['property_id']?>">
            </div>
          </div>
          <div class="control-group">
              <label for="inputError" class="control-label">Profit/Loss</label>
              <div class="controls">
                <?php
                  if($row['debit']>0){
                    $amount = $row['debit'];
                    $profit_loss = 'Profit';
                  }else{
                    $amount = $row['credit'];              
                    $profit_loss = 'Loss';
                  }
                ?>
                <input type="text" readonly="true" value="<?=ucfirst($profit_loss)?>">
                <input type="hidden" name="profit_loss" value="<?=$profit_loss?>">
              </div>
            </div> 
           <div class="control-group">
            <label for="inputError" class="control-label">Details</label>
            <div class="controls">
              <input type="text" name="detail" value="<?=$row['detail']?>">
            </div>
          </div>
          <div class="control-group">
              <label for="inputError" class="control-label">Amount</label>
              <div class="controls">
                <input type="text" id="" name="amount" value="<?=$amount; ?>" >
              </div>
            </div>
            <!-- <div class="control-group">
            <label for="inputError" class="control-label">Debit</label>
            <div class="controls">
              <input type="text" name="debit" value="<?=$row['debit']?>">
            </div>
          </div>
             <div class="control-group">
            <label for="inputError" class="control-label">Credit</label>
            <div class="controls">
              <input type="text" name="credit" value="<?=$row['credit']?>">
            </div>
          </div> -->
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <a  class="btn" href="<?php echo base_url(); ?>admin/profit_and_loss_logs">Cancel</a>  <!--Mayank Pawar Date 27.11.14-->
          </div>
        </fieldset>

      <?php echo form_close();} ?>

    </div>
     