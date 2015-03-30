<h2>STORE ADMIN COPY</h2>

<h2>Shop Order</h2>

Order Id: <?php echo $order['Order']['id'];?>
<br />
Created: <?php echo $order['Order']['created'];?>
<br />
<br />

<h2>Customer</h2>

First Name: <?php echo $order['Order']['first_name'];?>
<br />
Last Name: <?php echo $order['Order']['last_name'];?>
<br />
Email: <?php echo $order['Order']['email'];?>
<br />
Phone: <?php echo $order['Order']['phone'];?>
<br />
<br />
Billing Address: <?php echo $order['Order']['billing_address'];?>
<br />
Billing Address 2: <?php echo $order['Order']['billing_address2'];?>
<br />
Billing City: <?php echo $order['Order']['billing_city'];?>
<br />
Billing State: <?php echo $order['Order']['billing_state'];?>
<br />
Billing Zip: <?php echo $order['Order']['billing_zip'];?>
<br />
<br />
Shipping Address: <?php echo $order['Order']['shipping_address'];?>
<br />
Shipping Address 2: <?php echo $order['Order']['shipping_address2'];?>
<br />
Shipping City: <?php echo $order['Order']['shipping_city'];?>
<br />
Shipping State: <?php echo $order['Order']['shipping_state'];?>
<br />
Shipping Zip: <?php echo $order['Order']['shipping_zip'];?>
<br />
<br />
IP Address: <?php echo $order['Order']['ip_address'];?>
<br />
Remote Host: <?php echo $order['Order']['remotehost'];?>
<br />
<br />

<br />
<br />

<h2>Order Items</h2>

<table>
<tr>
<th>Vendor</th>
<th>Product</th>
<th>Weight</th>
<th>Weight Total</th>
<th>Product Price</th>
<th>Quantity</th>
<th>Product Subtotal</th>
</tr>
<?php foreach ($order['OrderItem'] as $orderitem): ?>
<tr>
<td><?php echo $orderitem['User']['name']; ?></td>
<td><?php echo $orderitem['name']; ?></td>
<td><?php echo $orderitem['weight']; ?></td>
<td><?php echo $orderitem['weight_total']; ?></td>
<td>$<?php echo $orderitem['price']; ?></td>
<td><?php echo $orderitem['quantity']; ?></td>
<td>$<?php echo $orderitem['subtotal']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<br />
<br />
Subtotal: $<?php echo $order['Order']['subtotal'];?>
<br />
Shipping: $<?php echo $order['Order']['shipping'];?>
<br />
<strong>Total: $<?php echo $order['Order']['total'];?></strong>
<br />
<br />

<h2>Order by Vendor</h2>

<table>
<tr>
<th>Vendor</th>
<th>Shipping Method</th>
<th>Weight</th>
<th>Quantity</th>
<th>Subtotal</th>
<th>Shipping</th>
<th>Total</th>
</tr>
<?php foreach ($order['OrderUser'] as $vendor): ?>
<tr>
<td><?php echo $vendor['User']['name']; ?></td>
<td><?php echo $vendor['shipping_method']; ?></td>
<td><?php echo $vendor['weight']; ?></td>
<td><?php echo $vendor['quantity']; ?></td>
<td>$<?php echo $vendor['subtotal']; ?></td>
<td><?php echo $vendor['shipping']; ?></td>
<td>$<?php echo $vendor['total']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<br />
<br />
<br />
<br />
<br />
<br />
<br />

////////////////////////////////////////////////////////////
<br />
<?php print_r($order); ?>
<br />
////////////////////////////////////////////////////////////
<br />
<?php //print_r($paypal); ?>
<br />
////////////////////////////////////////////////////////////
<br />
