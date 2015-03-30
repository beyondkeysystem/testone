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
        <li class="active">
          <?php //echo ucfirst($this->uri->segment(2));?>
            <?php 
                $method = $this->uri->segment(2);
                if(isset($method) and $method =='pending_deposit'){
                    echo 'Pending Deposit';
                }else{
                    echo 'Success Deposit';
                }
            ?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
            <?php 
                //$method = $this->uri->segment(2);
                if(isset($method) and $method =='pending_deposit'){
                    echo 'Pending Deposit';
                    $action = base_url().'transaction/pending_deposit';
                }else{
                    echo 'Success Deposit';
                    $action = base_url().'transaction/success_deposit';
                }
            ?>
          <?php //echo ucfirst($this->uri->segment(2));?> 
<!--          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
        </h2>
      </div>
        <div class="row">
            <div class="span12 columns">
                <div class="well">
                    
                    <form id="myform" class="form-inline reset-margin" accept-charset="utf-8" method="post" action="<?php echo $action;?>">              
                        <div class="row-fluid">
                            <div class="span3">
                                <label for="property_name">
                                    <b>Date</b>
                                </label>
                                <br>
                                <input type="text" placeholder="Search by date" class="date9" value="<?php echo $this->session->userdata('search_datetime'); //if(isset($datetime) and $datetime !='') echo $datetime?>" id="datetime" name="datetime">   
                                <script type="text/javascript">
                                $(function(){
                                        $('.date9').appendDtpicker({
                                                "closeOnSelected": true,
                                                "current": null,
                                                "dateOnly": true
                                        });
                                });
                                </script>
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Username</b>
                                </label><br>
                                <input type="text" placeholder="Search by Username" value="<?php echo $this->session->userdata('search_username');// if(isset($username) and $username !='') echo $username?>" name="username" >                
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Transaction Id</b>
                                </label><br>
                                <input type="text" placeholder="Search by Transaction Id" value="<?php echo $this->session->userdata('search_transaction_id');//if(isset($transaction_id) and $transaction_id !='') echo $transaction_id?>" name="transaction_id">                
                            </div>
                        </div>
                        <br><input type="submit" class="btn btn-info search" value="Search  " name="mysubmit">              
                    </form>
                </div>
            </div>

        </div>
      <div class="row">
        <div class="span12 columns">
         
           
            
         <?php if(isset($_GET['n']) and $_GET['n']=='1'){?>
            <span style=" font-size:18px; color: red; position: relative; bottom: 5px;">Please select checkbox first</span>
         <?php }?>
            <?php echo form_open('transaction/pending_deposit_update', $attributes);?>
          <table class="table table-striped table-bordered table-condensed">
            <?php  
              $count = count($payments);
              if($count>0){
            ?>
           <thead>
              <tr>
                <th class="header">Transaction Id</th>
                <th class="header">Username</th>
                <th class="header">Email</th>
                <th class="header">Payment Method</th>
                <th class="header">Payee Name</th>
                <th class="header">Address</th>
                <th class="header">Bank Name</th>
                <th class="header">Account No./<br />Cheque No.</th>
                <th class="header">Time</th>
                
                <th class="header">Amount</th>
           
                   <?php 
                            //$method = $this->uri->segment(2);
                 if(isset($method) and $method =='pending_deposit'){ ?>
                <th class="header">Actions</th>
                     <?php } ?>
              </tr>
            </thead>
            <tbody>
                <?php if(!empty($payments)){?>
                <?php foreach($payments as $payment){?>
                <tr>
                  <td><?php echo $payment->ref_no?></td>
                  <td><?php echo $payment->user_name?></td>
                  <td><?php echo $payment->email_addres?></td>
                  <td><?php echo $payment->txn_type?></td>
                  <td><?php echo $payment->payee_name?></td>
                  <td><?php echo $payment->address?></td>
                  <td><?php echo $payment->bank_name?></td>
                  <td><?php if(isset($payment->account_no) and $payment->account_no !=''){
                      echo $payment->account_no;
                  }else{
                      echo $payment->cheque_no;
                  }
?></td>
                  <td><?php echo $payment->datetime?></td>
                  <td><?php echo $payment->amount?></td>
                  <?php 
                            //$method = $this->uri->segment(2);
                            if(isset($method) and $method =='pending_deposit'){ ?>
                  <td>
                      
                              <?php
                              echo '<input type="checkbox" name="ids[]" value="'.$payment->id.'">';
                         ?>
                  </td>
                  <?php
                     }
                        ?>
                <?php }?>
                <?php }?>
               </tr>
            </tbody>
        <?php
          }else{
              echo "<tr><td><center><b>No Entry for Transaction</center></b></td></tr>";
          }
        ?>
          </table>
            <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
            <?php 
                            //$method = $this->uri->segment(2);
                            if(isset($method) and $method =='pending_deposit'){
                        ?>
                        <input type="submit" class="btn btn-info" name="approved" value="Approved" />
                        <input type="submit" class="btn btn-danger" name="cancelled" value="Cancelled" />
                            <?php }?>
                              <?php echo form_close(); ?>

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