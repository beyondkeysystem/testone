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
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
            //save the columns names in a array that we will use as filter         
            $options_property = array();    
            foreach ($property as $array) {
              foreach ($array as $key => $value) {
                $options_property[$key] = $key;
              }
              break;
            }

            echo form_open('admin/property', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');


              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Name</th>
                <th class="green header">Location</th>
                <th class="green header">Property Type</th>
                <th class="green header">Property Bedrooms</th>
                <th class="green header">Property Bathrooms</th>
                <th class="red header">Initial price</th>
                <th class="red header">Current price</th>
                <th class="red header">Status</th>
                 <th class="red header">Price last update</th>
                <th class="red header">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($property as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['property_name'].'</td>';
                echo '<td>'.$row['property_location'].'</td>';
                echo '<td>'.$row['property_type'].'</td>';
                echo '<td>'.$row['property_bedrooms'].'</td>';
                echo '<td>'.$row['property_bathrooms'].'</td>';
                echo '<td>'.$row['property_initial_price'].'</td>';
                echo '<td>'.$row['property_current_price'].'</td>';
                echo '<td>'.$row['property_status'].'</td>';
                echo '<td>'.$row['property_price_last_update'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>