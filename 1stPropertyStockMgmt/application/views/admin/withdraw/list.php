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
               echo validation_errors();
          ?>
<?php if($_GET['m']){echo '<span style=" font-size:18px; color: red; position: relative; bottom: 5px;">Please select checkbox first</span>';} ?>
         <?php
		echo form_open('admin/withdraw/update', $attributes);?>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr class="header">
                <th class="">Sr No</th>
                <th class="green">User Name</th>
                <th class="green">Fund Amount</th>
                <!--th class="yellow  headerSortDown">No Of Token</th-->
                <th class="yellow  headerSortDown">Date</th>
                <th class="yellow  headerSortDown">Status</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              	
              <?php
        //Code By Me Start
	$i=1;
              foreach($withdraw as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['fund_amt'].'</td>';
                //echo '<td>'.$row['number_of_token'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['status'].'</td>';
                echo '<td class=""><input type="checkbox" name="ids[]" value="'.$row['id'].'">
                </td>';
                echo '</tr>';
		$i++;
              }
              //Code By Me End
              ?>      
            </tbody>
          </table>
                       
                        <input type="submit" class="btn btn-info" name="approved_by_check" value="Approved By Cheque" />
                         <input type="submit" class="btn btn-info" name="approved_by_cash" value="Approved By Cash" />
                          <input type="submit" class="btn btn-danger" name="cancelled" value="Cancelled" />
                              <?php echo form_close(); ?>
      </div>
    </div>
