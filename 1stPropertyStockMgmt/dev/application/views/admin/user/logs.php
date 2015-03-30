<link href="<?php echo base_url(); ?>css/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.simple-dtpicker.js"></script>    
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
        <li class="active">Fund Log 
          <?php //echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>
    
      <div class="page-header users-header">
        <h2>Fund Log 
          <?php //echo ucfirst($this->uri->segment(2));?> 
<!--          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
        </h2>
      </div>
    <div class="row">
            <div class="span12 columns">
                <div class="well">
                    <?php echo $this->load->view('admin/elements/usermenu',$user[0]);?>
                </div>
            </div>
        </div>
      <div class="row">
            <div class="span12 columns">
                <div class="well">
                    
                    <form id="myform" class="form-inline reset-margin" accept-charset="utf-8" method="post" action="">              
                        <div class="row-fluid">
                            <div class="span3">
                                <label for="property_name">
                                    <b>Datetime</b>
                                </label>
                                <br>
                                <input type="text" placeholder="Search by datetime" class="date9" value="<?php if(isset($datetime) and $datetime !='') echo $datetime?>" id="datetime" name="datetime">   
                                <script type="text/javascript">
                                $(function(){
                                        $('.date9').appendDtpicker({
                                                "closeOnSelected": true,
                                                "current": null
                                        });
                                });
                                </script>
                            </div>
                           <!-- <div class="span3">
                                <label for="location">
                                    <b>Username</b>
                                </label><br>
                                <input type="text" placeholder="Search by Username" value="<?php if(isset($username) and $username !='') echo $username?>" name="username" >                
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Email</b>
                                </label><br>
                                <input type="text" placeholder="Search by Email" value="<?php if(isset($email) and $email !='') echo $email?>" name="email">                
                            </div>-->
                            <div class="span3">
                                <label for="location">
                                    <b>Fund type</b>
                                </label><br>
                                <input type="text" placeholder="Search by Fund type" value="<?php if(isset($fund_type) and $fund_type !='') echo $fund_type?>" name="fund_type">                
                            </div>
                        </div>
                        <br><input type="submit" class="btn btn-info search" value="Search  " name="mysubmit">              
                    </form>
                </div>
            </div>

        </div>
      <div class="row">
        <div class="span12 columns">
         
           
            
         

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr class="header">
                <th class="green">Username</th>
                <th class="red">Email</th>
                <th class="red">Fund Type</th>
                <th class="red">Debit</th>
                <th class="red">Credit</th>
                <th class="red">Date</th>
                
              </tr>
            </thead>
            <tbody>
                <?php if(!empty($payments)){?>
                <?php foreach($payments as $payment){?>
                <tr>
                  <td><?php echo $payment->user_name?></td>
                  <td><?php echo $payment->email_addres?></td>
                  <td><?php echo $payment->fund_type?></td>
                  <td><?php echo $payment->debit?></td>
                  <td><?php echo $payment->credit?></td>
                  <td><?php echo $payment->date?></td>
                <?php }?>
                <?php }?>
               </tr>
            </tbody>
          </table>
            <div style="clear: both;"></div>
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
      <?php 
            if(isset($datetime) and $datetime!=''){ ?>
                <script>
                $( document ).ready(function() {
                    document.getElementById('datetime').value = '<?php echo $datetime;?>';
                });
                </script>
            <?php }else{ ?>
        <script>
                $( document ).ready(function() {
                    document.getElementById('datetime').value = '';
                });
        </script>
            <?php }?>