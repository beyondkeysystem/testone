
<?php //$this->load->view('home/breadcrumb');
/*			[id] => 1
            [user_id] => 66
            [fund_type] => Deposit
            [date] => 2014-11-15 12:00:44
            [detail] => Completed Deposit
            [debit] => 50000
            [credit] => 0 */
?>
<script>console.log('User Credit:');console.log('<?=$user_credit?>');console.log('User Credit Payment:');console.log('<?=$user_fund_log?>');</script>
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
	<h3>Current Funds: <span class="col-b">MYR 0.00</span></h3>
    <a class="btn1" href="#">Deposit</a>
    <a class="btn1" href="#">Withdraw</a>
    
    <div id="horizontalTab">
		<ul class="resp-tabs-list">
			<li>All Logs</li>
			<li>Deposit</li>
			<li>Withdraw</li>
			<li>Transactions</li>
		</ul>
		<div class="resp-tabs-container">
			<div class="first_rtc">
			
			<table cellpadding="0" cellspacing="0" border="0" width="100%" >
					<tr>
						<th align="left">Date</th>
						<th align="left">Details</th>
						<th><span class="col-g">&plus;</span> Debit <span class="col-gr">(MYR)</span></th>
						<th><span class="col-r">&minus;</span> Credit <span class="col-gr">(MYR)</span></th>
					</tr>
					<?php foreach($user_fund_log as $val){ ?>
					  <tr>
						<td><?php echo date ("d/m/Y", strtotime($val['date'])); ?></td>
						<td><?php echo $val['detail']; ?></td>
						<td><?php echo $val['debit']; ?></td>
						<td><?php echo $val['credit']; ?></td>
					  </tr>
					<?php
					  $balance = $val['debit'] - $val['credit'] + $balance;
					}
					?>  
					<tr>
						<td colspan="3" align="right">Total Balance</td>
						<td><span class="col-g"><?=$balance?></span></td>
					</tr>
				</table>				
			</div>		
			
			<div>
			  <p><?php $this->load->view("purchase_credit", $credit_price);?></p>
			</div>
			
			
			<div>
			  <p><?php $this->load->view("funds/withdraw_fund", $credit_price);?></p>
			</div>
			
			
			<div>
			  <p><?php $this->load->view("funds/transaction_fund", $credit_price);?></p>
			</div>
		</div>
	</div>

</div>