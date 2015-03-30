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
                      <?php $url2=$this->uri->segment(2);
          $url2=str_replace("_"," ",$url2);
          ?>
            <?php echo ucfirst($url2);?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
           <?php echo ucfirst($url2);?>
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            //save the columns names in a array that we will use as filter         
            $options_property_type = array();
            
            //print_r($property_type); die;
            foreach ($property_type as $array) {
              foreach ($array as $key => $value) {
                if($key != 'id'){
                $options_property_type[$key] = $key;
                }
                 
              }
             break;
            }

               echo form_open('admin/property_type', $attributes);
        
             echo '<div class="span3">';
              echo form_label('<b>Search</b>', 'search_string');
               echo form_input('search_string', $search_string_selected, 'placeholder="Search by type"');
             echo ' </div>';
             
             //echo '<div class="span3">';
             // echo form_label('<b>Order by<b>', 'order');
             // echo form_dropdown('order', $options_property_type, $order_selected, 'class="span2"');
             //
             //
             // //$options_order_type = array(' ' => ' ', 'Asc' => 'Asc', 'Desc' => 'Desc');
             // //echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');
             // echo ' </div>';
                 $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-info', 'value' => 'Go', 'style' =>'position:relative; top:3px; font-weight:bold; left:15px;');
              echo form_submit($data_submit);


            echo form_close();
            ?>

          </div>
            <?php
			 if (empty($property_type)){
				?>
					<table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
						
                        <th class="name">No Record Found</th>
			  </tr>
                               </thead>
						  </table>
				<?php
			 }else{ ?>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">Sr No</th>
                <th class="yellow header headerSortDown">Type</th>
                <th class="yellow header headerSortDown">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $uri = $this->uri->segment(3);
              if(isset($uri) and $uri !=''){
                  
                  $i = ($uri-1)*$per_page+1;
              }else{
                  $i=1;
              }
              foreach($property_type as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['type'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/property_type/update/'.$row['id'].'" class="btn btn-info">Edit</a>  
                  <a href="'.site_url("admin").'/property_type/delete/'.$row['id'].'" class="btn btn-danger"  onclick="return ConfirmDialog();" >Delete</a>
                </td>';
                echo '</tr>';
		$i++;
              }
              ?>      
            </tbody>
          </table>
        <?php } ?>
          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>