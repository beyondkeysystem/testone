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
                <th class="green">Credit</th>
                <th class="yellow  headerSortDown">Price</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($credit_price as $row)
              {
                echo '<tr>';
                echo '<td>1</td>';
                echo '<td>1</td>';
                echo '<td>'.$row['price'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/credit_price/update/'.$row['id'].'" class="btn btn-info">view & edit</a>
                   <a href="'.site_url("admin").'/credit_price/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>