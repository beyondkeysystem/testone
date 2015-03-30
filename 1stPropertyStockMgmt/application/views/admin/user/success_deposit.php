<link href="<?php echo base_url(); ?>css/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.simple-dtpicker.js"></script>    
<div class="container top">
      <?php
      $pendings_ids=array();
      foreach($pending_property as $pending_property){
           $pendings_ids[]= $pending_property['id'];
                }
      $datetime = $this->session->userdata('search_datetime');
      $transaction_id = $this->session->userdata('search_transaction_id');
      $transaction_status = $this->session->userdata('search_transaction_status');
      $user_id = $this->uri->segment(4);

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
                    echo 'Deposit';
                }else{
                    echo 'Deposit';
                }
            ?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
            <?php 
                //$method = $this->uri->segment(2);
                if(isset($method) and $method =='pending_deposit'){
                    echo 'Deposit';
                }else{
                    echo 'Deposit';
                }
            ?>
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
                    
                    <form id="myform" class="form-inline reset-margin" accept-charset="utf-8" method="post" action="<?=base_url()?>admin/user/deposit/<?=$user_id?>">              
                        <div class="row-fluid">
                            <div class="span3">
                                <label for="property_name">
                                    <b>Date </b>
                                </label>
                                <br>
                                <input type="text" placeholder="Search by Date" class="date9" value="<?php if(isset($datetime) and $datetime !='') echo $datetime?>" id="datetime" name="datetime">   
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
                                    <b>Transaction Id</b>
                                </label><br>
                                <input type="text" placeholder="Search by Transaction Id" value="<?php if(isset($transaction_id) and $transaction_id !='') echo $transaction_id?>" name="transaction_id">                
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Transaction Status</b>
                                </label><br>
                                <select name="transaction_status" >
                                    <option value="">Select</option>
                                    <option <?php if(isset($transaction_status) and $transaction_status =='Cancelled'){?> selected <?php }?> value="Cancelled">Cancelled</option>
                                    <option <?php if(isset($transaction_status) and $transaction_status =='Completed'){?> selected <?php }?> value="Completed">Completed</option>
                                </select>
                            </div>
                            <div class="span3" style="margin-top: 10px;">
                                <input type="submit" class="btn btn-primary" value="Search  " name="mysubmit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
      <div class="row">
        <div class="span12 columns">
         
           <?php //echo '<pre>';print_r($payments);exit;?>
            
         <?php if(isset($_GET['n']) and $_GET['n']=='1'){?>
            <span style=" font-size:18px; color: red; position: relative; bottom: 5px;">Please select checkbox first</span>
         <?php }?>
            <?php echo form_open('transaction/pending_deposit_update', $attributes);?>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">Transaction Id</th>
                <th class="header">Username</th>
                <th class="header">Email</th>
                <th class="header">Status</th>
                <th class="header">Payment Method</th>
                <th class="header">Payee Name</th>
                <th class="header">Address</th>
                <th class="header">Bank Name</th>
                <th class="header">Account No./<br />Cheque No.</th>
                <th class="header">Date Time</th>
                <th class="header">Amount</th>
              </tr>
            </thead>
            <tbody>
                <?php if(!empty($payments)){?>
                <?php foreach($payments as $payment){?>
                <tr>
                  <td><?php echo $payment->ref_no?></td>
                  <td><?php echo $payment->user_name?></td>
                  <td><?php echo $payment->email_addres?></td>
                  <td><?php echo $payment->transaction_status?></td>
                  <td>
                      <?php if(isset($payment->txn_type) and $payment->txn_type =='instant'){?>
                           Paypal
                      <?php }else{?>
                        <?php echo $payment->txn_type?>
                      <?php }?>
                   </td>
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
                <?php }?>
                <?php }else{?>
                <tr>
                    <td colspan="5">
                        No record found
                    </td>
                </tr>
                <?php }?>
               </tr>
            </tbody>
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