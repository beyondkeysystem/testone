    <script>
    
    function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}

function ConfirmRevertDialog() {
  var x=confirm("Are you Sure!!! Do you really want to extend Property for 30 days?")
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
          <?php echo "List of Profit and Loss Allotment";?> 
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
                <!-- <th class="green">Userid</th> -->
                <th class="yellow  headerSortDown">Fund Type</th>
               <th class="green">Date</th>
                <th class="green">Detail</th>
                 <th class="green">Debit</th>
                <th class="green">Credit</th>
                 <th class="green">Property Name</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach($user_fund_log as $row)
              {
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                /*echo '<td>'.$row['user_name'].'</td>';*/
                echo '<td>'.$row['fund_type'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                 echo '<td>'.$row['detail'].'</td>';
                echo '<td>'.$row['debit'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                echo '<td>'.$row['property_name'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/profit_and_loss_logs/update/'.$row['id'].'" class="btn btn-info">Edit</a>
                  <a href="'.site_url("admin").'/profit_and_loss_logs/delete/'.$row['id'].'" class="btn btn-danger" onclick="return ConfirmDialog();" >Delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>
 <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
      </div>
    </div>
     <style>
        .header {
            background-color: aqua;
            height: 40px;
        }
    </style>
     
     