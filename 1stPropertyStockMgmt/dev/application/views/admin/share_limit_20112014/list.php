    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo "List of User Property Share and Profit/Loss Limit";?>
          </a> 
          <span class="divider"> >></span>
        </li>
        
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo "List of User Property Share Limit";?> 
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
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
                <th class="green">Username</th>
                <th class="yellow  headerSortDown">Property</th>
               <th class="green">Share Limit Allotment</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach($share_limit as $row)
              {
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['property_name'].'</td>';
                echo '<td>'.$row['share_limits'].'</td>';
                echo '<td>'.$row['profit'].'</td>';
                echo '<td>'.$row['loss'].'</td>';
                echo '<td>'.$row['detail'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/share_limit/log/'.$row['user_id'].'/'.$row['property_id'].'" class="btn btn-info">view profit and loss Log</a>
                  <a href="'.site_url("admin").'/share_limit/update/'.$row['id'].'" class="btn btn-info">view & edit</a>
                  <a href="'.site_url("admin").'/share_limit/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>