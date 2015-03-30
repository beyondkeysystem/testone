    
      <script>
    
    function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
  </script>
    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo ucfirst($url_2);?>
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
              <tr class="header">
                <th class="">Sr No</th>
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
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/share_limit/update/'.$row['id'].'" class="btn btn-info">view & edit</a>
                  <a href="'.site_url("admin").'/share_limit/delete/'.$row['id'].'" class="btn btn-danger" onclick="return ConfirmDialog();" >delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>