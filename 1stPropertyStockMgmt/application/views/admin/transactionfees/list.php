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
                <th class="green">Member Type</th>
               <!-- <th class="yellow headerSortDown">Amount</th>-->
		<th class="yellow headerSortDown">Percentage</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
               $i=1;
              foreach($transactionfees as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['member_type'].'</td>';
                //echo '<td>MYR '.$row['amount'].'</td>';
	        echo '<td>'.$row['percentage'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/transaction_fees/update/'.$row['id'].'" class="btn btn-info">Edit</a>  
                </td>';
                echo '</tr>';
		$i++;
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>