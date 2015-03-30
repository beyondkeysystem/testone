        <div class="container top">
         

          <ul class="breadcrumb">
            <li>
              <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1));?>
              </a> 
              <span class="divider">/</span>
            </li>
            <li class="active">
              <a href="<?=base_url()?>admin/user"><?php echo ucfirst($this->uri->segment(2));?></a>
            </li>
              <span class="divider">/</span>
            <li class="active">
              <?php echo ucfirst($this->uri->segment(2));?>  Info: <?=$user[0]['first_name']?>
            </li>
          </ul>

          <div class="page-header users-header">
            <h2>
              <?php echo ucfirst($this->uri->segment(2))." Info: ";?> <?=$user[0]['first_name']?>
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

                /* Mayank Pawar Date 22/12/2014 */

                  $user_id = $this->uri->segment(4);

                  ?>
                  <?php echo $this->load->view('admin/elements/usermenu',$user[0]);?>
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
                    <th style="width:150px;text-align:right;padding: 12px;">First Name </th>
                    <td style="padding: 12px;"><?=$user[0]['first_name']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Last Name </th>
                    <td style="padding: 12px;"><?=$user[0]['last_name']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Email Address </th>
                    <td style="padding: 12px;"><?=$user[0]['email_addres']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Telephone</th>
                    <td style="padding: 12px;"><?=$user[0]['telephone']?></td>
                  </tr>
                  <tr> 
                    
                    <th style="width:150px;text-align:right;padding: 12px;">Address </th>
                    <td style="padding: 12px;"><?=$user[0]['address']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Country </th>
                    <td style="padding: 12px;"><?=$user[0]['country']?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">total owned current share value </th>
                    <td style="padding: 12px;"><?=$owned_current_share?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Remaining Fund</th>
                    <td style="padding: 12px;"><?=$credit;?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Roles </th>
                    <td style="padding: 12px;"><?=$user[0]['role']?></td>
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