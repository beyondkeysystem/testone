<form action="completed.php" method="post">
  <b>Purchase Additional Credits</b> <label><br>1 Credit = $1 | 5 Credits Needed For 1 Lead </label> 
<input name="amount" id="amount" placeholder="Enter Quantity" type="text" /><br />
            <input type="hidden" name="cmd" value="_ext-enter" />
            <input type="hidden" name="redirect_cmd" value="_xclick" />
            <input type="hidden" name="business" value="burt@americanhomesonline.com" />
            <input type="hidden" name="item_name" value="AHO Credits - <?php echo $Email_1; ?> " />
            <input type="hidden" name="currency_code" value="USD" />
           <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="no_shipping" value="1" />
			<input type="hidden" name="custom" value="252" />
            <input type="hidden" name="return" value="http://americanhomesonline.com/admin/index.php?Page=credits" />
            <input type="hidden" name="cancel_return" value="http://americanhomesonline.com/admin/index.php?Page=cancel" />
            <input type="hidden" name="email" value="<?php echo $Email_1; ?>" />
         <input name="submit" type="submit" class='button binactive bsmall'  id="submit" value="MAKE PAYMENT VIA PAYPAL" style=" cursor:pointer;" />

 <input type="hidden" name="txn_id" value="123" />
 <input type="hidden" name="receiver_id" value="123" />
 <input type="hidden" name="payer_id" value="123" />
 <input type="hidden" name="payment_gross" value="1" />
   <input type="hidden" name="transaction_subject" value="y" />

            </label>
          </form>