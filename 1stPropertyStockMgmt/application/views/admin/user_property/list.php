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
          <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo ucfirst($url_2);?>
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
                <!--<th class="green">User Id</th>-->
                <th class="green">User Name</th>
                <th class="green">Property Name</th>
                <th class="green">Property share in per</th>
                <th class="green">Sell Property in share</th>
                <th class="green">Sold property share</th>
                <th class="green">Profit</th>
                <th class="green">Loss</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach($user_property as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                //echo '<td>'.$row['user_id'].'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['property_name'].'</td>';
                echo '<td>'.$row['property_share_in_per'].'</td>';
                echo '<td>'.$row['sell_property_share'].'</td>';
                echo '<td>'.$row['sold_property_share'].'</td>';
                echo '<td>'.$row['profit'].'</td>';
                echo '<td>'.$row['loss'].'</td>';
               // if($row['user_id']==1){
                echo '<td class="">
                  <a href="'.site_url("admin").'/user_property/update/'.$row['user_id'].'/'.$row['property_id'].'" class="btn btn-info">view & edit</a>
                   <a href="'.site_url("admin").'/user_property/delete/'.$row['user_id'].'/'.$row['property_id'].'" class="btn btn-danger"  onclick="return ConfirmDialog();"  >delete</a>
                </td>';
                echo '</tr>';
                //}
                $i++;
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>
