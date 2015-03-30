<h2>CUSTOMER COPY</h2>

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
Subtotal: $<?php echo $order['Order']['subtotal'];?>
<br />
Shipping: $<?php echo $order['Order']['shipping'];?>
<br />
Total: $<?php echo $order['Order']['total'];?>
<br />
<br />

<br />
<br />
<br />
<br />
<br />
<br />
<br />

