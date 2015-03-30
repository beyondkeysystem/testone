    <div class="container top">
      <?php
      $pendings_ids=array();
      foreach($pending_property as $pending_property){
           $pendings_ids[]= $pending_property['id'];
                }
      ?>

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
           <!-- Code By Me-->
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
                <th class="red header">Property First image</th>
                <th class="red header">Property Second image</th>
                <th class="red header">Property Third image</th>
                 <th class="red header">Property Fourth image</th>
                 <th class="red header">Property Fifth image</th>
                <th class="red header">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
             //print_r($pendings_ids);die;
              $return="";
              if(!empty($pending_property)){

        
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
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image2'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image3'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image4'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image5'].'" height="44" width="44"  alt="No image" /></td>';
               
                if(in_array($row['id'],$pendings_ids)){
                  echo '<td class="crud-actions">
                   <a href="'.site_url("admin").'/property/withdraw/'.$row['id'].'" class="btn btn-danger">Withdraw(this property is out of date)</a>
                  <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>'; 
                }else{
                  if($row['property_status']=="blocked"){
                echo '<td class="crud-actions">
                  <button class="btn btn-danger">This property is blocked</a>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                  }else{
                      echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">view & edidt</a>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                  }
                
                }
                echo '</tr>';
              }
              }else{
                
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
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image2'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image3'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image4'].'" height="44" width="44"  alt="No image" /></td>';
                echo '<td><img src="'.site_url().'uploads/'.$row['property_image5'].'" height="44" width="44"  alt="No image" /></td>';
                if($row['property_status']=="blocked"){
                echo '<td class="crud-actions">
                  <button class="btn btn-danger">This property is blocked</button>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                  }else{
                      echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                  }
 
                echo '</tr>';
              }}
              ?>      
            </tbody>
          </table>
       <!--  Code By Me End-->
          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>