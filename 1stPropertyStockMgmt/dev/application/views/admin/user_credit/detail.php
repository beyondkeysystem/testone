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
          <?php echo "User Funds Movement Records";?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
         <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo "User Funds Movement Records";?>
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
                <th class="green">User Name</th>
                <th class="green">Fund Type</th>
                <th class="yellow  headerSortDown">Date</th>
                <th class="yellow  headerSortDown">Detail</th>
                <th class="yellow  headerSortDown">Debit</th>
                <th class="yellow  headerSortDown">Credit</th>
                 <th class="yellow  headerSortDown">Property Name</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $uri = $this->uri->segment(5);
              if(isset($uri) and $uri !=''){
                  
                  $count = ($uri-1)*$per_page+1;
              }else{
                  $count=1;
              }
              
              foreach($user_credit as $row)
              {
                echo '<tr>';
                echo '<td>'.$count.'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['fund_type'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['detail'].'</td>';
                echo '<td>'.$row['debit'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                 echo '<td>'.ucfirst($row['property_name']).'</td>';
                echo '</tr>';
                $count++;
              }
              ?>      
            </tbody>
          </table>
 <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
      </div>
    </div>
