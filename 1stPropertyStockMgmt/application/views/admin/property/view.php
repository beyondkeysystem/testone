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
              <?php echo ucfirst($this->uri->segment(2));?>  Information 
            </li>
          </ul>

          <div class="page-header users-header">
            <h2>
              <?php echo ucfirst($this->uri->segment(2))." Information ";?> 
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

                /* Mayank Pawar Date 22/12/2014 */

                  $property_id = $this->uri->segment(4);
                  if($property[0]['property_enable_disable'] == 1 && $property[0]['property_enable_disable'] != 3){
                    $enable_disable = "<a href='".base_url()."admin/property/view/".$property_id."?prop_status=disable' class='btn btn-info btn-xs'>Disable Property</a>";
                  }else if($property[0]['property_enable_disable'] == 0 && $property[0]['property_enable_disable'] != 3){
                    $enable_disable = "<a href='".base_url()."admin/property/view/".$property_id."?prop_status=enable' class='btn btn-info btn-xs'>Enable Property</a>";
                  }
                  ?>
                  <center><a href="<?=base_url()?>admin/property/update/<?=$property_id?>" class="btn btn-info btn-xs">Update Property</a> 
                    <a href="<?=base_url()?>admin/profit_and_loss_logs/listproperty?pid=<?=$property_id?>" class="btn btn-info btn-xs">Update Profit/Loss</a> 
                    <?=$enable_disable?> 
                    <!-- <a href="#">Update Status</a> |  -->
                    <a href="<?=base_url()?>admin/property/share_list/<?=$property_id?>" class="btn btn-info btn-xs">Shares List</a>  
                    <!-- <a href="<?=base_url()?>admin/profit_and_loss_logs" class="btn btn-info btn-xs">Profit &amp; Loss Records</a> -->
                  </center>
                  <!-- <div class="row-fluid">
                    <div class="span3">
                      <?php
                      // print_r($search_string_selected);
                        echo form_label('Property
                         Name:', 'property_name'). "<br/>";
                        echo form_input('property_name', $search_property_name,'placeholder="Search by property name"');
                      ?>
                    </div>
                    <div class="span3">
                      <?php
                        echo form_label('Location:', 'location'). "<br/>";
                        echo form_input('location', $search_location, 'placeholder="Search by location"');
                      ?>
                    </div>
                    <div class="span3">
                      <?php
                        $options = array('0'=>'Search by type');
                        foreach ($dropdown_property_type as $value) {
                          $options[$value['property_type']] = $value['property_type'];
                        }
                        echo form_label('Type:', 'type'). "<br/>";
                        echo form_dropdown('type', $options, $search_type);
                      ?>
                    </div>
                    <div class="span3">
                      <?php
                        $options = array('0'=>'Search by status');
                        foreach ($dropdown_property_status as $value) {
                          $options[$value['property_status']] = $value['property_status'];
                        }
                        echo form_label('Status:', 'status'). "<br/>";
                        echo form_dropdown('status', $options, $search_status);
                      ?>
                    </div>
                  </div>
                  <?php
                    $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Search  ');
                    echo "<br/>".form_submit($data_submit);
                  ?>
                  </div>
                </div> -->
                <?php



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
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Property Name </th>
                    <td style="padding: 12px;"><?=$property[0]['property_name']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Property Reference </th>
                    <td style="padding: 12px;"><?=$property[0]['property_ref']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Property Type </th>
                    <td style="padding: 12px;"><?=$property[0]['property_type']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Area (Location) </th>
                    <td style="padding: 12px;"><?=$property[0]['property_location']?></td>
                  </tr>
                  <tr> 
                    <?php 
                      if($property[0]['property_status'] == 'owned'){
                        $available = $property[0]['property_share_owned_sell'] ? $property[0]['property_share_owned_sell']:"100";
                      }else{
                        $available = $property[0]['share_available'] ? (100-$property[0]['share_available']):"100";
                      }
                    ?>
                    <th style="width:150px;text-align:right;padding: 12px;">Available Share </th>
                    <td style="padding: 12px;"><?=number_format($available,2)?> %</td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Current Price </th>
                    <td style="padding: 12px;"><?=$property[0]['property_current_price']?> MYR</td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Current Min Limit </th>
                    <td style="padding: 12px;"><?=$property[0]['min_property_share_limit']?> %</td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Min Owned Limit </th>
                    <td style="padding: 12px;"><?=$property[0]['min_owned_limit']?> %</td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Status </th>
                    <td style="padding: 12px;"><?=$property[0]['property_status']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Bedroom </th>
                    <td style="padding: 12px;"><?=$property[0]['property_bedrooms']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Bathroom </th>
                    <td style="padding: 12px;"><?=$property[0]['property_bathrooms']?></td>
                  </tr>
                  
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
          <style>
            .header {
                background-color: aqua;
                height: 40px;
            }
            .btn-xs{
              padding-left: 20px;
            }
          </style>