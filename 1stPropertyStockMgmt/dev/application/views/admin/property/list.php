<link href="<?php echo base_url(); ?>css/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.simple-dtpicker.js"></script>
<script src="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />  

  <script>
    
    function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}

function ConfirmRevertDialog() {
  var x=confirm("Are you Sure!!! Do you really want to extend Property for 30 days?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
  </script>
  
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

            echo form_open('admin/property', $attributes);
            /* Mayank Pawar Date 22/12/2014 */
              ?>
              <div class="row-fluid">
                <div class="span3">
                  <?php
                  // print_r($search_string_selected);
                    echo form_label('<b>Property
                     Name</b>', 'property_name'). "<br/>";
                    echo form_input('property_name', $search_property_name,'placeholder="Search by property name"');
                  ?>
                </div>
                <div class="span3">
                  <?php
                    echo form_label('<b>Location</b>', 'location'). "<br/>";
                    echo form_input('location', $search_location, 'placeholder="Search by location"');
                  ?>
                </div>
                <div class="span3">
                  <?php
                    $options = array('0'=>'Search by type');
                    foreach ($dropdown_property_type as $value) {
                      $options[$value['property_type']] = $value['property_type'];
                    }
                    echo form_label('<b>Type</b>', 'type'). "<br/>";
                    echo form_dropdown('type', $options, $search_type);
                  ?>
                </div>
                <div class="span3">
                  <?php
                    $options = array('0'=>'Search by status');
                    foreach ($dropdown_property_status as $value) {
                      $options[$value['property_status']] = $value['property_status'];
                    }
                    echo form_label('<b>Status</b>', 'status'). "<br/>";
                    echo form_dropdown('status', $options, $search_status);
                  ?>
                </div>
              </div>
              <?php
                $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-info search', 'value' => 'Search  ');
                echo "<br/>".form_submit($data_submit);
              ?>
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
           <!-- Code By Me-->
         <!--   <div class="property_scroll">
           <div class="wrapper1">
                <div class="div1">
                </div>
           </div>
          <div class="wrapper2">
          -->  <div class="div2">
           
           
          <table class="table table-striped table-bordered table-condensed">
            <?php  
              $count = count($property);
              if($count>0){
            ?>
           <thead>
              <tr>
                <th class="header">Sr No.</th>
                <th class="yellow header headerSortDown">Property Name</th>
                <th class="green header">Area (Location)</th>
                <th class="green header">Property Type</th>
                <th class="green header">Available Share</th>
                <!-- <th class="green header">Property Bathrooms</th> -->
                <th class="red header">Status</th>
                <th class="red header">Enable / Disable</th>
                <th class="red header">Slider / Banner</th>
                <!--<th class="red header">Status</th>
                <th class="red header">Price last update</th>
                <th class="red header">Property share Available</th> -->
                <!--<th class="red header">Property First image</th>
                <th class="red header">Property Second image</th>
                <th class="red header">Property Third image</th>
                 <th class="red header">Property Fourth image</th>
                 <th class="red header">Property Fifth image</th>-->
                <th class="red header">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
             //print_r($pendings_ids);die;
              $return="";
              if(!empty($pending_property)){
                $arr =  array_pop($this->uri->segment_array());
                // print_r($arr); die;
                $page_number = $arr[0];
                    if($page_number > 1){
                      $page_number = $page_number - 1;
                      $i= 5 * $page_number +1;
                    }
                    else{$i = 1;}
                      foreach($property as $row)
                      {
                        if($row['property_status'] == 'owned'){
                          $share_available = $row['property_share_owned_sell'] ? $row['property_share_owned_sell']:"100";
                        }else{
                          $share_available = $row['share_available'] ? (100-$row['share_available']):"100";
                        }
                        
                        $block_button = "";
                        $style='style = "width:200px;"';
                        
                        if($row['property_enable_disable'] == 1 ){
                         $enable_disable =  "<span style='color:blue'>Enable</span>";
                        }else if($row['property_enable_disable'] == 2 ){
                          $enable_disable =  "<span style='color:red'>Blocked</span>";
                          $block_button = ' <a onclick="fnopenpopup('.$row['id'].')" class="btn btn-warning openpopup"> Finalize </a> ';
                          $block_button .= ' <a href="'.site_url("admin").'/property/revert/'.$row['id'].'" onclick="return ConfirmRevertDialog();" class="btn btn-danger"> Revert </a> ';
                          $style = 'style = "width:250px;"';
                          $enable_disable =  "<span style='color:red'>Disable</span>";
                        }else{
                          $enable_disable =  "<span style='color:red' title='Property Sold out Physically'>Blocked Finally</span>";
                        }
                        
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row['property_name'].'  <a href="'.base_url().'admin/property/view/'.$row['id'].'" style="float:right;text-decoration:none"><i class="icon-info-sign" ></i></a></td>';
                        echo '<td>'.$row['property_location'].'</td>';
                        echo '<td>'.$row['property_type'].'</td>';
                        echo '<td>'.round($share_available,2).' %</td>';
                        echo '<td>'.$row['property_status'].'</td>';
                        echo '<td>'.$enable_disable.'</td>';
                      

                      /* banner button */  
                        
                        if($row['banner'] == 0 ){
                          if($row['property_slider_image']==""){
                            $banner = '<span style="color:red">No</span>';
                          }else{
                            $banner = '<a onclick="update_banner('.$row['id'].',1)" style="color:red;font-weight:bold">No</a>';
                          }
                        }else if($row['banner'] == 1){
                          $banner = '<a onclick="update_banner('.$row['id'].',0)" style="font-weight:bold">Yes</a>'; 
                        }

                      /* banner button */  

                      
                        echo '<td>'.$banner.'</td>';

                //           if(array_search_inner($count_property_share, 'property_id', $row['id'])){
                //             $key = array_search_inner($count_property_share, 'property_id', $row['id']);
                //  $key =$key-1;
                // //echo $key; die;
                //             $row['property_share_in_per']=100-$count_property_share[$key]['total_property_share_in_per'];
                //             if($row['property_share_in_per']==0){
                //               $row['property_share_in_per']='All shares are buy, so please change the status of property to owned';
                //             }
                //           }
                 
                //   echo '<td>'.$row['property_share_in_per'].'</td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image2'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image3'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image4'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image5'].'" height="44" width="44"  alt="No image" /></td>';
               
                if(in_array($row['id'],$pendings_ids)){
                  echo '<td class="crud-actions" '.$style.'>
                    <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">Edit</a>
                    <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">Delete</a>
                    <!--<a href="'.site_url("admin").'/property/withdraw/'.$row['id'].'" class="btn btn-warning" title="This property is out of date">Withdraw</a>-->
                    ';
                    if($row['property_enable_disable'] != 3 ){
                      echo '<a onclick="fnopenpopup1('.$row['id'].')" class="btn btn-warning openpopup" title="This property is out of date">Withdraw</a>';
                    }
                  echo '</td>'; 
                }else{
                  if($row['property_status']=="blocked"){
                    echo '<td class="crud-actions" '.$style.'> 
                      <button class="btn btn-danger">This property is blocked</a>  
                      <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">Delete</a> '.$block_button.'
                    </td>';
                    }else{
                      echo '<td class="crud-actions" '.$style.'>
                        <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">Edit</a>  
                        <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">Delete</a> '.$block_button.'
                      </td>';
                    }
                }
                $i++;
                echo '</tr>';
              }
              }else{
                $arr =  array_pop($this->uri->segment_array());
                //print_r($arr); die;
                $page_number = $arr;
                if($page_number > 1 && $page_number != NULL){
                  $page_number = $page_number - 1;
                  $i= 5 * $page_number +1;
                }
                else{
                  $i = 1;
                }
                 foreach($property as $row)
                {
                  if($row['property_status'] == 'owned'){
                    $share_available = $row['property_share_owned_sell'] ? $row['property_share_owned_sell']:"100";
                  }else{
                    $share_available = $row['share_available'] ? (100-$row['share_available']):"100";
                  }
                  
                  $block_button = "";
                  $style="";
                  if($row['property_enable_disable'] == 1 ){
                   $enable_disable =  "<span style='color:blue'>Enable</span>";
                  }else if($row['property_enable_disable'] == 2 ){
                    $enable_disable =  "<span style='color:red'>Blocked</span>";
                    $block_button = ' <a onclick="fnopenpopup('.$row['id'].')" class="btn btn-warning openpopup"> Finalize </a> ';
                    $block_button .= ' <a href="'.site_url("admin").'/property/revert/'.$row['id'].'" onclick="return ConfirmRevertDialog();" class="btn btn-danger"> Revert </a> ';
                    $style = 'style = "width:250px;"';
                  } else if($row['property_enable_disable'] == 2){
                    $enable_disable =  "<span style='color:red'>Disable</span>";
                  }else{
                    $enable_disable =  "<span style='color:red' title='Property Sold out Physically'>Blocked Finally</span>";
                  }
                  echo '<tr>';
                  echo '<td>'.$i.'</td>';
                  echo '<td>'.$row['property_name'].'  <a href="'.base_url().'admin/property/view/'.$row['id'].'" style="float:right;text-decoration:none"><i class="icon-info-sign" ></i></a></td>';
                  echo '<td>'.$row['property_location'].'</td>';
                  echo '<td>'.$row['property_type'].'</td>';
                  echo '<td>'.$share_available.' %</td>';
                  echo '<td>'.$row['property_status'].'</td>';
                  echo '<td>'.$enable_disable.'</td>';
                  
                  /* banner button */  
                    
                    if($row['banner'] == 0 ){
                      if($row['property_slider_image']==""){
                        $banner = '<span style="color:red">No</span>';
                      }else{
                        $banner = '<a onclick="update_banner('.$row['id'].',1)" style="color:red;font-weight:bold">No</a>';
                      }
                    }else if($row['banner'] == 1){
                      $banner = '<a onclick="update_banner('.$row['id'].',0)" style="font-weight:bold">Yes</a>'; 
                    }

                  /* banner button */  

                      
                        echo '<td>'.$banner.'</td>';

                  // echo '<td>'.$row['property_bathrooms'].'</td>';
                  // echo '<td>'.$row['property_initial_price'].'</td>';
                  // echo '<td>'.$row['property_current_price'].'</td>';
                  // echo '<td>'.$row['property_status'].'</td>';
                  
                  
      //              if(array_search_inner($count_property_share, 'property_id', $row['id'])){
      //               $key = array_search_inner($count_property_share, 'property_id', $row['id']);
        // $key =$key-1;
        //  //echo '<b>'.$key.'</b></br>'; 
      //               $row['property_share_in_per']=100-$count_property_share[$key]['total_property_share_in_per'];
      //                if($row['property_share_in_per']==0){
      //                 $row['property_share_in_per']='All shares of this property is sold you can change the property status.';
      //               }
      //           }
                
                // echo '<td>'.$row['property_share_in_per'].'</td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image2'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image3'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image4'].'" height="44" width="44"  alt="No image" /></td>';
                //echo '<td><img src="'.site_url().'uploads/'.$row['property_image5'].'" height="44" width="44"  alt="No image" /></td>';
                if($row['property_status']=="blocked"){
                echo '<td class="crud-actions" '.$style.'>
                  <button class="btn btn-danger">This property is blocked</button>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger">Delete</a> '.$block_button.'
                </td>';
                  }else{
                      echo '<td class="crud-actions" '.$style.'>
                  <a href="'.site_url("admin").'/property/update/'.$row['id'].'" class="btn btn-info">Edit</a>  
                  <a href="'.site_url("admin").'/property/delete/'.$row['id'].'" class="btn btn-danger" onclick="return ConfirmDialog();" >Delete</a> '.$block_button.'
                  
                 
                </td>';
                  }
                $i++;
                echo '</tr>';
              }}
              ?>
            
            
            </tbody>
          <?php
            }else{
              echo "<tr><td><center><b>No Entry for Property</center></b></td></tr>";
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
    <?php /* for top scroll property page */ ?>
   <script>
        $(function(){
    $(".wrapper1").scroll(function(){
        $(".wrapper2")
            .scrollLeft($(".wrapper1").scrollLeft());
    });
    $(".wrapper2").scroll(function(){
        $(".wrapper1")
            .scrollLeft($(".wrapper2").scrollLeft());
    });
    });
      </script>

      <script>
            function fnopenpopup(obj){
                $.fancybox({ 
                        'width' : '55%',
                        'height': '85%', 
                        'transitionIn':'elastic', 
                        'transitionOut':'elastic', 
                        'speedIn':350, 
                        'speedOut':350, 
                        'href':'/admin_property/finalize/'+obj,
                        'type': 'iframe',
                        'onClosed' : function() {
                            location.reload();
                            return;
                        }
                });
            }
             
            function fnopenpopup1(obj){
                $.fancybox({ 
                        'width': '55%',
                        'height': '85%', 
                        'transitionIn':'elastic', 
                        'transitionOut':'elastic', 
                        'speedIn':350, 
                        'speedOut':350, 
                        'href':'/admin_property/withdraw_property/'+obj,
                        'type': 'iframe',
                        'onClosed' : function() {
                            location.reload();
                            return;
                        }
                });
            }

            function update_banner(property_id,val){
              // alert("clicked");
              $.post(
                  "/admin_property/update_banner",
                  {banner:val, property_id:property_id},
                  function(data){
                    location.reload();
                  }
                );
            }   
        </script>