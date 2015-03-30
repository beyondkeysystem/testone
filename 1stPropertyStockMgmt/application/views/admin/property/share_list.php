    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="<?=base_url()?>admin/property"><?php echo ucfirst($this->uri->segment(2));?></a>
        </li>
          <span class="divider">/</span>
        <li class="active">
          <?php echo str_replace("_", " ", ucfirst($this->uri->segment(3)));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
          <!-- <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a> -->
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
            if(isset($error)){ echo $error;}
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
            //save the columns names in a array that we will use as filter         
            $options_property = array();    
            foreach ($property as $array) {
              foreach ($array as $key => $value) {
                $options_property[$key] = $key;
              }
              break;
            }
            
            $property_id = $this->uri->segment(4);
            echo form_open('admin/property/share_list/'.$property_id, $attributes);
            /* Mayank Pawar Date 22/12/2014 */
              ?>
              <div class="row-fluid">
                <div class="span3">
                  <?php
                    echo form_input('name', $name,'placeholder="Search by Username" style="margin-top:7px"');
                  ?>
                </div>
                <div class="span3">
                  <?php
                    $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-info search', 'value' => 'Search  ');
                    echo form_submit($data_submit);
                  ?>
                </div>
              </div>
              </div>
            </div>
            <?php



            echo form_close();
        function array_search_inner ($array, $attr, $val, $strict = FALSE) {
          // Error is input array is not an array
          if (!is_array($array)) return FALSE;
          // Loop the array
          foreach ($array as $key => $inner) {
            //print_r($inner);
            // Error if inner item is not an array (you may want to remove this line)
            if (!is_array($inner)) return FALSE;
            // Skip entries where search key is not present
            if (!isset($inner[$attr])) continue;
            if ($strict) {
        // Strict typing
        if ($inner[$attr] === $val) return $key+1;
            } else {
        // Loose typing
        if ($inner[$attr] == $val) return $key+1;
            }
          }
          // We didn't find it
          return NULL;
        }
            ?>

          </div>
        <div class="div2">
           
           
          <table class="table table-striped table-bordered table-condensed">
            <?php  
              $count = count($shares);
              if($count>0){
            ?>
            <thead>
              <tr>
                <th class="header">Sr No.</th>
                <th class="yellow header headerSortDown">Name</th>
                <th class="green header">Share Holding</th>
                <th class="green header">Share for Sell</th>
                <th class="green header">Sold out Share</th>
                <th class="red header">Total Share Holding</th>
              </tr>
            </thead>
            <?php //echo "<pre>";print_r($shares); ?>
                    
            <tbody>
              <?php
             //print_r($pendings_ids);die;
              $return="";
              
                $arr =  $this->uri->segment(5);
                $page_number = $arr;
                if($page_number > 1 && $page_number != NULL){
                  $page_number = $page_number - 1;
                  $i= 5 * $page_number +1;
                }
                else{
                  $i = 1;
                }
                 foreach($shares as $row)
                {
                  $enable_disable = $row['property_enable_disable']==1 ? "<span style='color:blue'>Enable</span>" : "<span style='color:red'>Disable</span>";
                  // echo "<pre>";print_r($row);die;
                  echo '<tr>';
                  echo '<td>'.$i.'</td>';
                  echo '<td>'.ucfirst($row['first_name']).' '.ucfirst($row['last_name']).'</td>';
                  echo '<td>'.$row['property_share_in_per'].'</td>';
                  echo '<td>'.$row['sell_property_share'].'</td>';
                  echo '<td>'.$row['sold_property_share'].'</td>';
                  echo '<td>'.($row['property_share_in_per'] + $row['sell_property_share']).'</td>';// echo '<td>'.$row['property_bathrooms'].'</td>';
                  $i++;
                echo '</tr>';
              }
              ?>      
            </tbody>
            <?php
          }else{
              echo "<tr><td><center><b>No Entry for Property Share Holders</center></b></td></tr>";
          }
          ?>
          </table>
          </div>
          </div>
          </div>
       <!--  Code By Me End-->
          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>
      <style>
        .header {
            background-color: aqua;
            height: 40px;
        }
      </style>