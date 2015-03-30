        <div class="container top">
         

          <ul class="breadcrumb">
            <li>
              <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1));?>
              </a> 
            </li>
            <li class="active">
              <a href="<?=base_url()?>admin/users/manage"><?php echo ucfirst($this->uri->segment(2));?></a>
            </li>
              <span class="divider">/</span>
            <li class="active">
               <?php  foreach($results as $result){?>
              <?php echo ucfirst($this->uri->segment(2));?>  Info: <?=$result->firstname?>
              <?php } ?>
            </li>
          </ul>

          <div class="page-header users-header">
            <h2>
                 <?php  foreach($results as $result){?>
             <?php echo ucfirst($this->uri->segment(2));?>  Info: <?=$result->firstname?>
              <?php } ?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/create" class="btn btn-success">Add a new</a>
            </h2>
          </div>
          
          <div class="row">
            <div class="span12 columns">
              <div class="well">
                  <?php echo $this->load->view('admin/users/usermenu');?>
        
              </div>
               <!-- Code By Me-->
             <!--   <div class="property_scroll">
               <div class="wrapper1">
                    <div class="div1">
                    </div>
               </div>
              <div class="wrapper2">
              -->  <div class="div2">
 <?php  foreach($results as $result){?>
                <table class="table table-striped table-bordered table-condensed">
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">First Name </th>
                    <td style="padding: 12px;"><?=$result->firstname?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Last Name </th>
                    <td style="padding: 12px;"><?=$result->lastname ?></td>
                  </tr>
                  <tr>
                     <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">User Name </th>
                    <td style="padding: 12px;"><?=$result->username?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Email Address </th>
                    <td style="padding: 12px;"><?=$result->email ?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Gender</th>
                    <td style="padding: 12px;"><?=$result->gender ?></td>
                  </tr>
                  <tr>
                    <th style="width:150px;text-align:right;padding: 12px;">Mobile</th>
                    <td style="padding: 12px;"><?=$result->mobile ?></td>
                  </tr>
               
                  
                </table>
       <?php } ?>        
               
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