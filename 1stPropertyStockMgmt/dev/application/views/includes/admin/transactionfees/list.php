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
                <th class="green">Member Type</th>
                <th class="yellow headerSortDown">Amount</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($transactionfees as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['member_type'].'</td>';
                echo '<td>'.$row['amount'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/transactionfees/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>