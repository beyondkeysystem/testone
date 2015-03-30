<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<?php echo $this->Html->script(array('shops_review.js'), array('inline' => false)); ?>

<style type="text/css">
	#ccbox {
		background: transparent url("/img/cards.png");
		margin: 0 0 10px 0;
		padding: 0 0 0 150px;
		width: 0;
		height: 23px;
		overflow: hidden;
	}
</style>

<h1>Order Review</h1>

<hr>

<div class="row">
<div class="span4">

First Name: <?php echo $shop['Order']['first_name'];?><br />
Last Name: <?php echo $shop['Order']['last_name'];?><br />
Email: <?php echo $shop['Order']['email'];?><br />
Phone: <?php echo $shop['Order']['phone'];?><br />

<br />

</div>
<div class="span4">

Billing Address: <?php echo $shop['Order']['billing_address'];?><br />
Billing Address 2: <?php echo $shop['Order']['billing_address2'];?><br />
Billing City: <?php echo $shop['Order']['billing_city'];?><br />
Billing State: <?php echo $shop['Order']['billing_state'];?><br />
Billing Zip: <?php echo $shop['Order']['billing_zip'];?><br />

<br />

</div>
<div class="span4">

Shipping Address: <?php echo $shop['Order']['shipping_address'];?><br />
Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?><br />
Shipping City: <?php echo $shop['Order']['shipping_city'];?><br />
Shipping State: <?php echo $shop['Order']['shipping_state'];?><br />
Shipping Zip: <?php echo $shop['Order']['shipping_zip'];?><br />

<br />

</div>
</div>

<hr>

<div class="row">
	<div class="span2">VENDOR</div>
	<div class="span1">IMAGE</div>
	<div class="span4">ITEM</div>
	<div class="span1">WEIGHT</div>
	<div class="span1">TOTAL WEIGHT</div>
	<div class="span1">PRICE</div>
	<div class="span1">QUANTITY</div>
	<div class="span1">SUBTOTAL</div>
</div>

<?php foreach ($shop['OrderItem'] as $item): ?>
	<div class="row">
		<div class="span2"><?php echo $item['User']['name']; ?><br /><?php echo $item['User']['state']; ?> <?php echo $item['User']['zip']; ?></div>
		<div class="span1"><?php echo $this->Html->image('products/image/' . $item['Product']['image'], array('class' => 'px60')); ?></div>
		<div class="span4"><strong><?php echo $item['name']; ?></strong></div>
		<div class="span1"><?php echo $item['weight']; ?></div>
		<div class="span1"><?php echo $item['weight_total']; ?></div>
		<div class="span1">$<?php echo $item['price']; ?></div>
		<div class="span1"><?php echo $item['quantity']; ?></div>
		<div class="span1">$<?php echo $item['subtotal']; ?></div>
	</div>
<?php endforeach; ?>


<hr>

<div class="row">
	<div class="span8"><strong>Totals</strong></div>
	<div class="span1"><strong><?php echo $shop['Order']['weight']; ?></strong></div>
	<div class="span1 offset1"><strong><?php echo $shop['Order']['quantity']; ?></strong></div>
	<div class="span1"><strong>$<?php echo $shop['Order']['total']; ?></strong></div>
</div>

<br />
<br />

<hr>

<?php foreach ($shop['Shipping'] as $key => $value): ?>

<strong><?php echo $shop['Users'][$key]['name']; ?></strong><br />
Zip Code: <?php echo $shop['Users'][$key]['zip']; ?><br />
Item Total Price: <?php echo $shop['Users'][$key]['totalprice']; ?><br />
Total Quantity: <?php echo $shop['Users'][$key]['totalquantity']; ?><br />
Weight: <?php echo $shop['Users'][$key]['totalweight']; ?> LBS<br />
<?php foreach ($value as $ship): ?>
<div class="row">
<div class="span1"><?php echo $ship['ServiceCode']; ?></div>
<div class="span3"><?php echo $ship['ServiceName']; ?></div>
<div class="span2">$<?php echo $ship['TotalCharges']; ?></div>
</div>
<?php endforeach; ?>
<hr>
<?php endforeach; ?>

<br />

<h4>Select Shipping Method</h4>
<br />

<script type="text/javascript">
$(document).ready(function(){
		$('input[type=radio]').click(function() {
		$(this).closest("form").submit();
	});
});
</script>

<br />
<?php echo $this->Form->create('Ship'); ?>

<?php foreach ($shop['Shipping'] as $key => $value): ?>
<strong><?php echo $shop['Users'][$key]['name']; ?></strong><br />
<?php $optionship = array(); ?>
<?php foreach ($value as $ship): ?>
<?php $optionship[$ship['ServiceCode']] = $ship['ServiceName']; ?>
<?php endforeach; ?>
<?php echo $this->Form->input('rating_' . $shop['Users'][$key]['id'], array('type' => 'radio', 'legend' => false, 'options' => $optionship));?>
<br />
<?php endforeach; ?>

<?php //echo $this->Form->button('Change Shipping Method', array('class' => 'btn', 'ecape' => false)); ?>
<?php echo $this->Form->end(); ?>

<strong>Items: <strong>$<?php echo $shop['Order']['total']; ?></strong>
<br />
<strong>Shipping: <?php echo $shop['Totalship']; ?><strong>
<br />
<strong>Order Total: <?php echo $shop['Order']['total'] + $shop['Totalship']; ?><strong>
<br />

<hr>

<h4>Payment Method</h4>
<br />
<br />

<?php echo $this->Form->create('Order'); ?>
<div id="ccbox">
	Credit Card Type.
</div>

<?php echo $this->Form->input('creditcard_number', array('class' => 'span2 ccinput', 'maxLength' => 16, 'autocomplete' => 'off')); ?>

<div class="row">
	<div class="span2">
		<?php echo $this->Form->input('creditcard_month', array(
			'label' => 'Expiration Month',
			'class' => 'span2',
			'options' => array(
				'01' => '01 - January',
				'02' => '02 - February',
				'03' => '03 - March',
				'04' => '04 - April',
				'05' => '05 - May',
				'06' => '06 - June',
				'07' => '07 - July',
				'08' => '08 - August',
				'09' => '09 - September',
				'10' => '10 - October',
				'11' => '11 - November',
				'12' => '12 - December'
			)
		)); ?>
	</div>
	<div class="span2">
		<?php echo $this->Form->input('creditcard_year', array(
			'label' => 'Expiration Year',
			'class' => 'span2',
			'options' => array(
				'13' => '2013',
				'14' => '2014',
				'15' => '2015',
				'16' => '2016',
				'17' => '2017',
				'18' => '2018',
				'19' => '2019',
				'20' => '2020',
				'21' => '2021',
				'22' => '2022',
			)
		));?>
	</div>
</div>

<?php echo $this->Form->input('creditcard_code', array('label' => 'Card Security Code', 'class' => 'span1', 'maxLength' => 4)); ?>

<br />
<br />

<?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Submit Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?>

<?php echo $this->Form->end(); ?>

<br />
<br />

