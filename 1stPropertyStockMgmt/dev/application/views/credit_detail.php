<style>
.scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;
	width: 96%;
}

.force-overflow
{
	min-height: 0px;
}

#wrapper
{
	text-align: center;
	width: 100%;
	margin: auto;
}

/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}
</style>
<?php //$this->load->view('home/breadcrumb');
/*			[id] => 1
            [user_id] => 66
            [fund_type] => Deposit
            [date] => 2014-11-15 12:00:44
            [detail] => Completed Deposit
            [debit] => 50000
            [credit] => 0 */
?>
<?php   if(!$this->session->userdata('is_logged_in')){

   ?>


<div class="map content">
    <div class="wrapper">
        <div class="contact-form">
		<div class="title">
			<h3>Credit details</h3>
		</div>
	      <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
      
                <th class="green">User Name</th>
                <th class="yellow  headerSortDown">Credit</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($user_credit as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>
	       </br>
	       <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="">#</th>
                <th class="green">User Id</th>
                <th class="green">User Name</th>
                <th class="yellow  headerSortDown">Credit</th>
                <th class="yellow  headerSortDown">Transaction id</th>
                <th class="yellow  headerSortDown">Transaction status</th>
                <th class="yellow  headerSortDown">Amount</th>
                 <th class="yellow  headerSortDown">Edit by admin</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($user_credit_payment as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['user_id'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                echo '<td>'.$row['transaction_id'].'</td>';
                echo '<td>'.$row['transaction_status'].'</td>';
                echo '<td>'.$row['amount'].'</td>';
                 echo '<td>'.$row['edit_by_admin'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table> 
	       
        </div>
	
	
        <div class="add_detail">
        <div class="title">
			<h3>Contact Us</h3>
		</div>
        <h2><span class="col-g">MyViko</span><span class="col-b">Home</span></h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia</p>
        <div class="add_icons">
        	<span><i class="fa fa-map-marker"></i></span>
            <div class="address">
            	<p>Ahmad Bin Gh azali</p>
				<p>75 Kg Sg Ramal Luar</p>   
				<p>43000 Kajang Malaysia</p>                        
				
            </div>
			<div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-phone"></i></span>
            <p>123 4567 8990</p>
            <div class="clear"></div>
        </div>
        <div class="add_icons">
        	<span><i class="fa fa-envelope"></i></span>
            <a href="mailto:info@myvikohome.com">info@myvikohome.com</a>
        </div>
       
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php } ?>
<script>console.log('User Credit:');console.log('<?=$user_credit?>');console.log('User Credit Payment:');console.log('<?=$user_credit_payment?>');</script>
<?php //echo "Test";print_r($user_credit); print_r($user_credit_payment); exit;?>
<div class="tb_ctnt">
<?php //$this->load->view('home/breadcrumb');
/*			[id] => 1
            [user_id] => 66
            [fund_type] => Deposit
            [date] => 2014-11-15 12:00:44
            [detail] => Completed Deposit
            [debit] => 50000
            [credit] => 0 */
?>
	<h3><?=$this->lang->line('current_funds')?>: <span class="col-b" id="bal">MYR 0.00</span></h3>
    <!--<a class="btn1" href="#">Deposit</a>
    <a class="btn1" href="#">Withdraw</a>-->
    
    <div id="horizontalTab">
		<ul class="resp-tabs-list">
			<li><?=$this->lang->line('all_logs')?></li>
			<li><?=$this->lang->line('deposit')?></li>
			<li><?=$this->lang->line('withdraw')?></li>
			<!-- <li>Transactions Token</li> -->
		</ul>
		<div class="resp-tabs-container">
			<div class="first_rtc">
			<div id="wrapper">
			 <div class="scrollbar" id="style-1">
                           <div class="force-overflow">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" >
					<tr>
						<th align="left"><?=$this->lang->line('date')?></th>
						<th align="left"><?=$this->lang->line('action')?></th>
						<th align="left"><?=$this->lang->line('details')?></th>
						<th><span class="col-g">&plus;</span> <?=$this->lang->line('debit')?> <span class="col-gr">(MYR)</span></th>
						<th><span class="col-r">&minus;</span> <?=$this->lang->line('cred')?> <span class="col-gr">(MYR)</span></th>
					</tr>
					<?php
					
					foreach($user_fund_log as $val){ ?>
					  <tr>
						<td><?php echo date ("d/m/Y", strtotime($val['date'])); ?></td>
						<td><?php echo $val['fund_type']; ?></td>
						<td><?php echo $val['detail']; ?></td>
						<td><?php echo $val['debit']; ?></td>
						<td><?php echo $val['credit']; ?></td>
					  </tr>
					<?php
					  $balance = $val['debit'] - $val['credit'] + $balance;
					}
					?>  
					<tr>
						<td colspan="4" align="right"><?=$this->lang->line('total_balance')?></td>
						<td><span class="col-g"><?=$balance?></span></td>
					</tr>
				</table>
			           </div>
                              </div>
			    </div>
			</div>		
			
			<div>
			  <p><?php $this->load->view("purchase_credit", $credit_price);?></p>
			</div>
			
			
			<div>
			    <?php $data['balance']= $balance; ?>
			  <p><?php $this->load->view("funds/withdraw_fund", $data);?></p>
			</div>
			
			
			<div>
			 <table cellpadding="0" cellspacing="0" border="0" width="100%" >
					<tr>
						<th align="left">Date</th>
						<th align="left">Details</th>
						<th><span class="col-g">&plus;</span> Debit <span class="col-gr">Token</span></th>
						<th><span class="col-r">&minus;</span> Credit <span class="col-gr">Token</span></th>
					</tr>
					<?php
				
					$balanceTok = $balance/$credit_price[0]['price'];
				
					?>
					<?php foreach($user_fund_log as $val){ 
					$debit_token= number_format($val['debit']/$credit_price[0]['price'], 2);
					$credit_token= number_format($val['credit']/$credit_price[0]['price'], 2); ?>
					  <tr>
						<td><?php echo date ("d/m/Y", strtotime($val['date'])); ?></td>
						<td><?php echo $val['detail']; ?></td>
						<td><?php echo $debit_token; ?></td>
						<td><?php echo $credit_token; ?></td>
					  </tr>
				 <?php } ?>
					<tr>
						<td colspan="3" align="right">Total Tokens</td>
						<td><span class="col-g"><?=$balanceTok?></span></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</div>
<script>
  
$(document).ready(function () {
  
  var bal = <?=$balance?>;
  $("#bal").html("MYR "+ bal);
});
</script>