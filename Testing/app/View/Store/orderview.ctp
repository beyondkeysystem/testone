<?php //pr($orders);?>
<div class="section">
    <div class="container">
        <div class="my-order clearfix">
            <div class="row clearfix">
                <?php echo $this->element('fe/account_left');?>
                <div class="col-md-9">
                    <h2><?php echo __('Order number'); ?>   : <?php  echo $orders[0]['OrderDetail']['order_no']?></h2>
                    <div class="my-promotional">
                        <ul class="open-order clearfix">
                            <li>
                                <div class="open-order1">
                                    <?php echo $this->Html->image('../css/images/circle.png');?>
                                    <p><?php echo __('Place order');?></p>
                                </div>
                                <span><?php  echo $orders[0]['OrderDetail']['created']?></span>
                            </li>

                            <li>
                                <div <?php if($orders[0]['OrderDetail']['is_paid']=='1'){?>class="open-order1"<?php }else{?>class="open-order2"<?php }?>>
                                    <?php 
                                        if($orders[0]['OrderDetail']['is_paid']=='1'){
                                            echo $this->Html->image('../css/images/circle.png');
                                        }else{
                                            echo $this->Html->image('../css/images/circle1.png');
                                        }
                                    ?>
                                    <?php ?>
                                    <p><?php echo __('Pay');?></p>
                                </div>
                                <span><?php  echo $orders[0]['OrderDetail']['payment_date']?></span>
                            </li>

                            <li>
                                <div <?php if($orders[0]['OrderDetail']['is_process']=='1'){?>class="open-order1"<?php }else{?>class="open-order2"<?php }?>>
                                    <?php 
                                        if($orders[0]['OrderDetail']['is_process']=='1'){
                                            echo $this->Html->image('../css/images/circle.png');
                                        }else{
                                            echo $this->Html->image('../css/images/circle1.png');
                                        }
                                    ?>
                                    <p><?php echo __('Processing Item');?></p>
                                </div>
                                <span><?php  echo $orders[0]['OrderDetail']['process_date']?></span>
                            </li>

                            <li>
                                <div <?php if($orders[0]['OrderDetail']['is_shipped']=='1'){?>class="open-order1"<?php }else{?>class="open-order2"<?php }?>>
                                    <?php 
                                        if($orders[0]['OrderDetail']['is_shipped']=='1'){
                                            echo $this->Html->image('../css/images/circle.png');
                                        }else{
                                            echo $this->Html->image('../css/images/circle1.png');
                                        }
                                    ?>
                                    <p><?php echo __('Shipped out of DC');?></p>
                                </div>
                                <span><?php  echo $orders[0]['OrderDetail']['shipped_date']?></span>
                            </li>

                            <li>
                                <?php if($orders[0]['OrderDetail']['is_return']=='1'){?>
                                    <div <?php if($orders[0]['OrderDetail']['is_return']=='1'){?>class="open-order1"<?php }else{?>class="open-order2"<?php }?>>
                                        <?php 
                                            if($orders[0]['OrderDetail']['is_return']=='1'){
                                                echo $this->Html->image('../css/images/circle.png');
                                            }else{
                                                echo $this->Html->image('../css/images/circle1.png');
                                            }
                                        ?>
                                        <?php if($orders[0]['OrderDetail']['is_return']=='1'){?>
                                            <p><?php echo __('Refund');?></p>
                                        <?php }else{?>
                                            <p><?php echo __('Delivered/Refund');?></p>
                                        <?php }?>

                                    </div>
                                    <span><?php  echo $orders[0]['OrderDetail']['return_date']?></span>
                                <?php }else{?>
                                    <div <?php if($orders[0]['OrderDetail']['is_delivered']=='1'){?>class="open-order1"<?php }else{?>class="open-order2"<?php }?>>
                                        <?php 
                                            if($orders[0]['OrderDetail']['is_delivered']=='1'){
                                                echo $this->Html->image('../css/images/circle.png');
                                            }else{
                                                echo $this->Html->image('../css/images/circle1.png');
                                            }
                                        ?>
                                        <?php if($orders[0]['OrderDetail']['is_delivered']=='1'){?>
                                            <p><?php echo __('Delivered');?></p>
                                        <?php }else{?>
                                            <p><?php echo __('Delivered/Refund');?></p>
                                        <?php }?>

                                    </div>
                                    <span><?php  echo $orders[0]['OrderDetail']['delivery_date']?></span>
                                <?php }?>
                                
                            </li>	
                        </ul>

                        <div class="delivery-address clearfix">
                            <h2><?php echo __('Delivery address'); ?></h2>
                            <table width="100%" border="0" class="order-table">
                                <tr>
                                    <td width="120" align="right"><?php echo __('Name'); ?> :</td>
                                    <td><?php  echo $orders[0]['OrderDetail']['name']?></td>
                                </tr>
                                <tr> 
                                    <td align="right"><?php echo __('Address'); ?>  :</td>
                                    <td><?php  echo $orders[0]['OrderDetail']['address']?></td>
                                </tr>
                                <tr>
                                    <td align="right"><?php echo __('Phone'); ?>  :</td>
                                    <td><?php  echo $orders[0]['OrderDetail']['phone']?></td>
                                </tr>
                            </table>
                        </div>


                        <div class="delivery-address clearfix">
                            <h2><?php echo __('Delivery time'); ?></h2>
                            <p><?php echo __('We deliver packages Monday to Friday 9:00 - 19:00 and Saturday  9:00 - 16:00. There is no delivery service on Sundays or public holidays.'); ?></p>
                        </div>


                        <div class="open-order-table clearfix">
                            <div class="reminder"><span><?php echo __('Reminder'); ?> :-</span><?php echo __('*Unpaid orders will be deleted automatically after 12 hours'); ?> </div>
                            <div class="reminder-table">
                                <table width="100%" border="0" class="table-main">
                                    <tr class="table-heading">
                                        <td colspan="6"><?php echo __('Order number'); ?>： <?php  echo $orders[0]['OrderDetail']['order_no']?> <span><?php echo __('Order placed on');?>：<?php  echo $orders[0]['OrderDetail']['created']?></span></td>
                                    </tr>
                                    <?php if(!empty($orders)){ $total1 =0;?>
                                    <?php $i=0;foreach($orders as $order){
                                        $total1 = $total1+$order['OrderDetail']['total_amount'];
                                    }
                                        ?>
                                    <?php 
                                    
                                    $total=0; $i=0;foreach($orders as $order){
                                        $total = $total+$order['OrderDetail']['product_amount'];
                                        if($i==0){
                                        ?>
                                    <tr>
                                        <td width="500">
                                            <img src="images/order1.jpg" alt=""> <span class="red-txt"> 
                                            <?php if(isset($order['Product']['image']) and $order['Product']['image'] !=''){
                                                echo $this->Html->image('../uploads/'.$order['Product']['image'],array('style'=>"width:75px;height:75px;"));    
                                            }else{
                                                //echo $this->Html->image('../uploads/'.$order['Product']['image'],array('style'=>"width:75px;height:75px;"));    
                                            }?>
                                            <?php  echo $order['Product']['name']?> </span> </td>
                                        <td align="center" width="138"> <b> RM <?php  echo $order['OrderDetail']['product_amount']?> </b> </td>
                                        <td width="80" align="center"><b> <?php  echo $order['OrderDetail']['quantity']?> </b></td>
                                        <td width="250"  rowspan="<?php echo count($orders)?>" valign="top"><span class="txt-small"> <?php echo __('Orignal price'); ?> RM <?php echo number_format($total1,2,'.','')?> <br ><?php if($min_order_price['Orderprices']['price']>=$total1){ echo __('Shipping HaRiM '); echo $ShippingPrice['ShippingPrice']['price']; echo __(' Amount'); $total1 =$total1+$ShippingPrice['ShippingPrice']['price'];  }else{echo __('Shipping HaRiM');echo ' 0 ';echo __('Amount'); }  ?> RM  <span class="red-txt"><?php echo number_format($total1,2,'.','');?></span></span> </td>
                                        <td valign="top" rowspan="<?php echo count($orders)?>"> 
                                            <span class="txt-small">
                                            <?php 
                                                if($orders[0]['OrderDetail']['is_paid'] == '1'){
                                                    echo __('Payment received');
                                                }else if($orders[0]['OrderDetail']['is_paid'] == '0'){
                                                    echo __('Waiting for Payment');
                                                }else if($orders[0]['OrderDetail']['is_paid'] == '2'){
                                                    echo __('Order cancelled');
                                                }
                                            ?> 
                                            </span>
                                        </td>
                                        <td rowspan="<?php echo count($orders)?>" align="center"  valign="top">
                                            <?php 
                                                    if($order['OrderDetail']['is_paid'] =='0')
                                                        echo $this->Html->link('Pay','/store/makepayment/'.$orders[0]['OrderDetail']['order_no'],array('class'=>"pay"));
                                            ?> 
                                            <?php 
                                                if($order['OrderDetail']['is_paid'] =='0')
                                                    echo $this->Html->link('Cancel','/store/cancelorder/'.$orders[0]['OrderDetail']['order_no'],array('class'=>"order-detail"));?>
                                        </td>
                                    </tr>
                                        <?php }else{?>
                                    <tr>
                                        <td width="500"><img src="images/order1.jpg" alt=""> <span class="red-txt"> <?php  echo $order['Product']['name']?> </span> </td>
                                        <td align="center" width="138"> <b> RM <?php  echo $order['OrderDetail']['product_amount']?> </b> </td>
                                        <td width="80" align="center"><b> <?php  echo $order['OrderDetail']['quantity']?> </b></td>
<!--                                        <td width="250"  rowspan="4" valign="top"><span class="txt-small"> Orignal price RM 252 Shipping HaRiM 0 Amount RM  <span class="red-txt">26.00</span></span> </td>
                                        <td valign="top" rowspan="4"> <span class="txt-small">Waiting for Payment </span></td>
                                        <td rowspan="4" align="center"  valign="top"><a class="pay" href="javascript:void(0">Pay</a> <a class="order-detail" href="javascript:void(0">Cancel</a></td>-->
                                    </tr>
                                        <?php }?>
                                    <?php $i++; }}?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>