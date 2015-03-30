<div class="section">
    <div class="container">
        <div class="my-order clearfix">
            <div class="row clearfix">
                <?php echo $this->element('fe/account_left');?>


                <div class="col-md-9">
                    <?php if(!empty($orderdetails)) {?>
<!--                    <div class="reminder"><span>Reminder :-</span>*Unpaid orders will be deleted automatically after 12 hours </div>-->
                    
                        <?php foreach($orderdetails as $orderdetail){?>
                        <div class="reminder-table">
                            <table width="100%" border="0" class="table-main">
                                <tr class="table-heading">
                                    <td colspan="5">Order number： <?php echo $orderdetail['OrderDetail']['order_no'];?> <span>Order placed on：<?php echo $orderdetail['OrderDetail']['created']?></span></td>
                                </tr>
                                <tr>
                                    <td width="310">
                                        <?php 
                                            $order = $this->requestAction('/users/getorders/'.$orderdetail['OrderDetail']['order_no']);
                                            //pr($order);exit;
                                            $total = 0;
                                            foreach($order as $val){
                                                $total = $total+$val['OrderDetail']['product_amount'];
                                                ?>
                                            <?php echo $this->Html->image('../uploads/thumbs/'.$val['Product']['image'],array('width'=>"75"));?>
                                        <?php }?>
                                    </td>
                                    <td align="center" width="138">
                                        <?php if($orderdetail['OrderDetail']['is_paid'] =='0'){ 
                                                   echo __('Waiting for payment');
                                               }else if($orderdetail['OrderDetail']['is_paid'] =='1'){ 
                                                   echo __('Payment received');
                                               }else if($orderdetail['OrderDetail']['is_paid'] =='2'){ 
                                                   echo __('Order closed');
                                               }
                                        ?> 
                                    </td>
                                    <td width="138"><?php echo $orderdetail['OrderDetail']['status']?></td>
                                    <td align="center" width="138">
                                        RM <?php echo number_format($total,2,'.','');?>
                                    </td>
                                    <td align="center" width="138">
                                        <?php //echo $this->Html->link('Pay','/store/makepayment/'.$key,array('class'=>"pay"));?>
                                        <?php echo $this->Html->link('Order Details','/store/orderview/'.$orderdetail['OrderDetail']['order_no'],array('class'=>"order-detail"));?>
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                        <?php }?>
                    <?php }else{
                        
                        echo __('Order does not found.');
                    }?>
                    <?php echo $this->element('fe/paging');?>
                </div>
            </div>
        </div>
    </div>
</div>