<link href="<?php echo base_url(); ?>css/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.simple-dtpicker.js"></script>
<script src="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />  
 
<div class="container top">

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
              $user_id = $this->uri->segment(4);

                $datetime= $this->session->userdata('search_datetime');
                $transaction_status= $this->session->userdata('search_transaction_status');
                
                $method = $this->uri->segment(2);
                if(isset($method) and $method =='pending_withdraw'){
                    echo 'Withdraw';
                }else{
                    echo 'Withdraw';
                }
            ?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
            <?php 
                $method = $this->uri->segment(2);
                if(isset($method) and $method =='pending_withdraw'){
                    echo 'Withdraw';
                }else{
                    echo 'Withdraw';
                }
            ?>
          <?php //echo ucfirst($this->uri->segment(2));?> 
          <!--<a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
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
                    
                    <form id="myform" class="form-inline reset-margin" accept-charset="utf-8" method="post" action="<?=base_url()?>admin/user/withdraw/<?=$user_id?>">              
                        <div class="row-fluid">
                            <div class="span3">
                                <label for="property_name">
                                    <b>Date</b>
                                </label>
                                <br>
                                <input type="text" placeholder="Search by Date" class="date9" value="<?php if(isset($datetime) and $datetime !='') echo $datetime?>" id="datetime" name="datetime">   
                                <script type="text/javascript">
                                $(function(){
                                        $('.date9').appendDtpicker({
                                                "closeOnSelected": true,
                                                "current": null,
                                                "dateOnly":true
                                        });
                                });
                                </script>
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Transaction Status</b>
                                </label><br>
                                <select name="transaction_status">
                                    <option value="">Select</option>
                                    <option <?php if(isset($transaction_status) and $transaction_status =='Pending'){?> selected <?php }?> value="Pending">Pending</option>
                                    <option <?php if(isset($transaction_status) and $transaction_status =='Approved By cheque'){?> selected <?php }?> value="Approved By cheque">Approved By Cheque</option>
                                    <option <?php if(isset($transaction_status) and $transaction_status =='Approved By Cash'){?> selected <?php }?> value="Approved By Cash">Approved By Cash</option>
                                    <option <?php if(isset($transaction_status) and $transaction_status =='Cancelled'){?> selected <?php }?> value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="span3" style="margin-top: 10px;">
                                <input type="submit" class="btn btn-info search" value="Search  " name="mysubmit">
                            </div>
                        </div>            
                    </form>
                </div>
            </div>

        </div>
      <div class="row">
        <div class="span12 columns">
         
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
               echo validation_errors();
          ?>
         <?php if($_GET['m']){echo '<span style=" font-size:18px; color: red; position: relative; bottom: 5px;">Please select checkbox first</span>';} ?>
         <?php echo form_open('transaction/update', $attributes);?>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">Sr No</th>
                <th class="header">User Name</th>
                <th class="header">Fund Amount</th>
                <!--th class="yellow  headerSortDown">No Of Token</th-->
                <th class="header  headerSortDown">Date</th>
                <th class="header  headerSortDown">Status</th>
              </tr>
            </thead>
            <tbody>
              	
              <?php
        //Code By Me Start
              $uri = $this->uri->segment(3);
              if(isset($uri) and $uri !=''){
                  $i=$uri+1;
              }else{
                  $i=1;
              }
	
              foreach($withdraw as $row)
              {
                 if(isset($row['status']) and $row['status'] =='Pending'){
                    $date = $row['date'];
                }else{
                    $date = $row['withdraw_date'];
                }
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['fund_amt'].'</td>';
                //echo '<td>'.$row['number_of_token'].'</td>';
                //echo '<td>'.$row['withdraw_date'].'</td>';
                echo '<td>'.$date.'</td>';
                echo '<td>'.$row['status'].'</td>';
                echo '</tr>';
		$i++;
              }
              //Code By Me End
              ?>      
            </tbody>
          </table>
            <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>
                       <?php /*
                            $method = $this->uri->segment(2);
                            if(isset($method) and $method =='pending_withdraw'){
                        ?>
                        <input type="submit" class="btn btn-info" name="approved_by_check" value="Approved By Cheque" />
                        <input type="submit" class="btn btn-info" name="approved_by_cash" value="Approved By Cash" />
                        <input type="submit" class="btn btn-danger" name="cancelled" value="Cancelled" />
                            <?php } */?>
                              <?php echo form_close(); ?>
      </div>
    </div>
        
        <script>
            function fnopenpopup(obj){
                if(document.getElementById(obj.id).checked == true){
                        $.fancybox({ 
                                'width'			: '50%',
                                'height'                    : '75%', 
                                'transitionIn':'elastic', 
                                'transitionOut':'elastic', 
                                'speedIn':350, 
                                'speedOut':350, 
                                'href':'/dev/transaction/payment_approve/'+obj.value,
                                'type'			: 'iframe'
                        });
                    }
                }
                
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