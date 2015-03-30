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
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
         
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
          ?>

         

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="">#</th>
                <th class="green">User Id</th>
                <th class="green">User Name</th>
                <th class="yellow  headerSortDown">Credit</th>
                <th class="yellow  headerSortDown">Transaction id</th>
                <th class="yellow  headerSortDown">Transaction status</th>
                <th class="yellow  headerSortDown">Amount</th>
                 <th class="yellow  headerSortDown">Edit by admin</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($user_credit as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['user_id'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                echo '<td>'.$row['transaction_id'].'</td>';
                echo '<td>'.$row['transaction_status'].'</td>';
                echo '<td>'.$row['amount'].'</td>';
                 echo '<td>'.$row['edit_by_admin'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>