<?php
//pr($orderdetails);
$amount =0;
foreach($orderdetails as $orderdetail){
    $amount = $amount+($orderdetail['OrderDetail']['product_amount']*$orderdetail['OrderDetail']['quantity']);
}
?>
<div class="section">
    <div class="container">
        <div class="pay-table1">
            <table width="100%" border="0" class="pay-table1-main">
                <tr>
                    <td width="220"><?php echo __('Order number'); ?>：</td>
                    <td><?php echo $orderdetails[0]['OrderDetail']['order_no']?></td>
                </tr>
                <tr>
                    <td><?php echo __('Amount'); ?>：</td>
                    <td><span class="diff-txt">RM <?php echo number_format($amount,2,'.','');?></span></td>
                </tr>
                <tr>
                    <td><?php echo __('Name'); ?>：	</td>
                    <td><?php echo $orderdetails[0]['OrderDetail']['name']?></td>
                </tr>
                <tr>
                    <td><?php echo __('Phone'); ?>：</td>
                    <td><?php echo $orderdetails[0]['OrderDetail']['phone']?></td>
                </tr>
                <tr>
                    <td><?php echo __('Address'); ?>：</td>
                    <td><?php echo $orderdetails[0]['OrderDetail']['address']?></td>
                </tr>
            </table>
        </div>
        <ul class="buy-pay-txt clearfix">
            <li class="choose-your"><?php echo __('Choose your payment method'); ?></li>
            <li class="additional-your"><?php echo __('Additional bank charges may apply.'); ?></li>
        </ul>
        <?php echo $this->Form->create('OrderDetail',array('url'=>'/purchases/paypal_set_ec/'.$this->params['pass']['0']));?>
        <ul class="choose-method clearfix">
            <li>
                <div class="choose-method-left">
                    <h2><?php echo __('Pay online'); ?></h2>
                    <p><?php echo __('(Paypal)'); ?></p>
                </div>
                <div class="choose-method-right">
                    <label class="choose-label"> <input type="radio" checked="checked" value="paypal" name="payment_option">
                        <?php echo $this->Html->image('../css/images/paypal-pic.png');?>
                    </label>
                </div>
            </li>
            <li>
                <div class="choose-method-left">
                    <h2><?php echo __('Pay online'); ?></h2>
                    <p><?php echo __('(Molpay)'); ?></p>
                </div>
                <div class="choose-method-right">
                    <label class="choose-label"> <input type="radio" value="molpay" name="payment_option">
                        <?php echo $this->Html->image('../css/images/molpay.png');?>
                    </label>
                </div>
            </li>

            <li>
                <div class="choose-method-left">
                    &nbsp;
                </div>
                <div class="choose-method-right">
                    <input type="submit" value="<?php echo __('Pay');?>" class="pay-btn">
                </div>
            </li>
        </ul>
        <?php echo $this->Form->end();?>
    </div>
</div>