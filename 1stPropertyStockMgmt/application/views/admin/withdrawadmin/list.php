    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
          <!--<a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
         
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
          ?>

         <?php
		echo form_open('admin/withdraw/update', $attributes);?>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="">Sr No</th>
                <th class="green">User Id</th>
                <th class="green">Fund Amount</th>
                <th class="yellow  headerSortDown">No Of Token</th>
                <th class="yellow  headerSortDown">Date</th>
                <th class="yellow  headerSortDown">Status</th>
		 <th class="yellow  headerSortDown">property_id</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($withdrawadmin as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['fund_amt'].'</td>';
                echo '<td>'.$row['number_of_token'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['status'].'</td>';
		echo '<td>'.$row['property_id'].'</td>';
                echo '<td class=""><input type="checkbox" name="ids[]" value="'.$row['id'].'">
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>
                       
                        <input type="submit" class="btn btn-info" name="approved_by_check" value="Approved By Cheque" />
                         <input type="submit" class="btn btn-info" name="approved_by_cash" value="Approved By Cash" />
                          <input type="submit" class="btn btn-danger" name="cancelled" value="Cancelled" />
                              <?php echo form_close(); ?>
      </div>
    </div>