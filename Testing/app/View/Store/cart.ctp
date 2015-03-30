<?php $cart_data = $this->Session->read('cart_data');?>
<div class="section">
    <div class="container">

        <ul class="mycart-top clearfix">
            <li class="choose-your"><?php echo __('My Cart'); ?></li>
            <li class="additional-your"><?php echo __('Free shipping on orders of RM '); echo $min_order_price['Orderprices']['price'];echo __(' or more'); ?></li>
            <li class="empaty-cart"><a href="javascript:void(0)" onclick="empty_cart();"> <i class="fa fa-trash"></i> <?=__('Empty cart');?> </a></li>
        </ul>
        <div class="my-cart-main">
            <table width="100%" border="0">
                <tr class="my-cart-table-heading">
                    <td colspan="2" ><?php echo __('Items'); ?></td>
                    <td align="center"><span class="left-border"><?php echo __('Price'); ?></span></td>
                    <td align="center"><span class="left-border"><?php echo __('Quantity'); ?></span></td>
                    <td align="center"><span class="left-border"><?php echo __('Subtotal'); ?></span></td>
                    <td>&nbsp;</td>
                </tr>
                <?php if(!empty($cart_products)){?>
                <?php 
                $total_price = 0;
                foreach($cart_products as $cart_product){
                    $current_date = strtotime(date('Y-M-d'));

                    $discount_price = false;

                    if (isset($cart_product['ProductDiscount'][0])) {

                        foreach ($cart_product['ProductDiscount'] as $product_discount) {
                            $start_date = strtotime($product_discount['date_start']);
                            $end_date = strtotime($product_discount['date_end']);
                            if ($current_date >= $start_date && $current_date <= $end_date) {
                                $discount_price = $product_discount['price'];
                                $discount_percentage = number_format((($cart_product['Product']['price'] - $product_discount['price']) * 100) / $cart_product['Product']['price']);
                                break;
                            } else {
                                $discount_price = $cart_product['Product']['price'];
                            }
                        }
                    } else {
                        $discount_price = $cart_product['Product']['price'];
                    }
                    ?>
                    <tr class="top-border more-padd" id="<?=md5($cart_product['Product']['id'])?>">
                        <td valign="top" class="image-pic">
                            <?php //echo $this->Html->image('../css/images/n2.jpg');?>
                            <?php if(isset($cart_product['Product']['image']) and $cart_product['Product']['image'] !=''){?>
                                <?php echo $this->Html->image('../uploads/thumbs/'.$cart_product['Product']['image'],array('style'=>'width:81px;height:74px;'));?>
                            <?php }else{?>
                                <?php echo $this->Html->image('../uploads/thumbs/no_product_image2.png',array('style'=>'width:81px;height:74px;'));?>
                            <?php }?>
                        </td>
                        <td valign="top">
                            <span class="txt1"><?php echo $cart_product['Product']['name']?></span>
                            <span class="txt2"><?php echo __('Item ID'); ?>：<?php echo $cart_product['Product']['id']?></span>
                            <?php echo $this->Html->link('Details','/store/details/'.$cart_product['Product']['id'],array('class'=>'detail-link'));?>
                        </td>
                        <td align="center"><span class="txt1">RM <?php echo $discount_price;?></span></td>
                        <td align="center">
                            <?php /*echo $this->Form->input('quantity',array(
                                'type' => 'number',
                                'label' => false,
                                'min' => 1,
                                'max' => $cart_product['Product']['quantity'],
                                'style' => 'width:100px',
                                'value' => $cart_data[$cart_product['Product']['id']],
                                'onchange' => 'calc_item_price('.$cart_product['Product']['id'].',this.value,'.$discount_price.','.$cart_product['Product']['quantity'].')',
                                'id' => 'quantity_'.$cart_product['Product']['id']
                            ));*/ ?>
                            
                             <small style="color:red" id="quantity_error_<?=$cart_product['Product']['id']?>"></small>    
                            <?php /*<!-- <select class="" name="quantity" onchange="calc_item_price(<?=$cart_product['Product']['id']?>,this.value,<?=$discount_price?>)">
                            <?php
                                for($i = 1; $i <= $cart_product['Product']['quantity']; $i++){
                                    if($cart_data[$cart_product['Product']['id']] == $i ){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }
                                    echo '<option '.$selected.'>'.$i.'</option>';
                                }
                            ?>
                            </select> -->*/ ?>
                            <?php if(isset($cart_product['Product']['quantity']) and $cart_product['Product']['quantity'] >=2){?>
                                <select class="selectpicker" name="quantity" onchange="calc_item_price('<?php echo $cart_product['Product']['id']?>',this.value,'<?php echo $discount_price?>','<?php echo $cart_product['Product']['quantity']?>')">
                                    <option <?php if($cart_data[$cart_product['Product']['id']] =='1') {?>selected<?php }?>>1</option>
                                    <option <?php if($cart_data[$cart_product['Product']['id']] =='2') {?>selected<?php }?>>2</option>
                                </select>
                            <?php }else{?>
                                <select class="selectpicker" name="quantity" onchange="calc_item_price('<?php echo $cart_product['Product']['id']?>',this.value,'<?php echo $discount_price?>','<?php echo $cart_product['Product']['quantity']?>')">
                                    <option <?php if($cart_data[$cart_product['Product']['id']] =='1') {?>selected<?php }?>>1</option>
                                </select>
                            <?php }?>
                              
                        </td>
                        <td align="center" id="<?=md5($cart_product['Product']['id'])?>"><span class="txt1">RM <span id="item_price<?=$cart_product['Product']['id']?>"><?php echo $discount_price*$cart_data[$cart_product['Product']['id']]; $total_price = $total_price+ $discount_price*$cart_data[$cart_product['Product']['id']];?></span></span></td>
                        <td align="center"><a class="close-icon" href="javascript:void(0)" onclick="delete_cart_product1(<?=$cart_product['Product']['id']?>,'<?=md5($cart_product['Product']['id'])?>');"> <i class="fa fa-close"></i> </a></td>
                    </tr>
                <?php }?>
                    <tr class="my-cart-table-heading border-bottom">
                        <td colspan="6"> <div class="total-amo"> <?php echo __('Total'); ?>: RM <?php echo $total_price;?> </div> </td>
                    </tr>
                <?php }else{?>
                <tr>
                    <td colspan="6">
                        <?php echo __('Cart is empty'); ?>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
        <ul class="pre-nxt"> 
            <li>
                <?php 
                    echo $this->Html->link('Back to Store','/store',array('escape'=>false));
                ?>
            </li>
            <li>
                <?php 
                    echo $this->Html->link('Checkout','/store/checkout',array('escape'=>false));
                ?>
            </li>
        </ul>
    </div>
</div>