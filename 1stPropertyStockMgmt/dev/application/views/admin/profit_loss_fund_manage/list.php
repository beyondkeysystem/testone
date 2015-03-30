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
          <?php echo "List of Profit Loss Fund Management";?> 
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <?php
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
            echo form_open('admin/profit_and_loss_fund_manage/action', $attributes);
          ?>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr class="header">
                <th class="">Sr No</th>
                <th class="green">User Name</th>
                <th class="yellow  headerSortDown">Fund Type</th>
                <th class="green">Created Date</th>
                <th class="green">Modified Date</th>
                <th class="green">Detail</th>
                <th class="green">Debit</th>
                <th class="green">Credit</th>
                <th class="green">Property Name</th>
        <!--        <th class="red">Actions</th>-->
              </tr>
            </thead>
            <tbody>
              <?php
               $uri = $this->uri->segment(3);
              if(isset($uri) and $uri !=''){
                  
                  $i = ($uri-1)*$per_page+1;
              }else{
                  $i=1;
              }              foreach($profit_loss_fund_log as $row)
              {
                if($row['detail'] == 'pending'){
                  $button = '<input type="checkbox" name="profit_loss_id[]" value="'.$row['id'].'"/>';
                }else{
                  $button = "";
                }
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['fund_type'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['modified_date'].'</td>';
                echo '<td>'.$row['detail'].'</td>';
                echo '<td>'.$row['debit'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                echo '<td>'.$row['property_name'].'</td>';
                //echo '<td class="crud-actions">'.$button.'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>
         <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
   
       <!--   <input type="submit" class="btn btn-info" name="approved_by_check" value="Approved By  Cheque" />
          <input type="submit" class="btn btn-info" name="approved_by_cash" value="Approved By Cash" />
          <input type="submit" class="btn btn-danger" name="cancelled" value="Cancelled" />-->
          <?php echo form_close(); ?>
      </div>
    </div>
    <style>
        .header {
            background-color: aqua;
            height: 40px;
        }
    </style>