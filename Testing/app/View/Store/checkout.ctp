<?php $cart_data = $this->Session->read('cart_data');?>
<div class="section">
    <div class="container">
        <div class="my-order clearfix">
            <div class="row clearfix">
                <div class="col-md-12">
                    <h2><?php echo __('Delivery Address'); ?></h2>
                    <div class="my-promotional">
                        <div class="my-ddress clearfix">
                            <div class="row">
                                <?php if(!empty($addresses)){?>
                                <?php foreach($addresses as $address){?>
                                <div class="col-md-4 check_uncheck" id="<?php echo $address['Address']['id']?>">
                                    <a href="javascript:void(0)" class="removecls" id="check-uncheck<?php echo $address['Address']['id']?>">
                                        <div class="my-ddress-main">
                                            <h3><?php echo $address['Address']['firstname'];?> <?php echo $address['Address']['lastname'];?> </h3>
                                            <p><?php echo $address['Address']['phone'];?></p>
                                            <p><?php echo $address['Address']['state'];?> <?php echo $address['Address']['city'];?> <?php echo $address['Address']['postcode'];?></p>
                                            <p><?php echo $address['Address']['address_1'];?></p>
                                            <p><?php echo $address['Address']['address_2'];?></p>
                                            <div class="delete-btn clearfix"> 
                                                <span href="javascript:void(0)" class="edit-delete" onclick="fnfilledit('<?php echo $address['Address']['id']?>')" ><?php echo __('Edit'); ?></span>  
                                            </div>
                                        </div>
                                    </a>
                                    <div id="appendtest_<?php echo $address['Address']['id']?>"></div>
                                </div>
                                <?php }?>
                                <?php }?>
                                <div class="col-md-4">
                                    <div class="display-main">
                                        <a href="javascript:void(0)" id="check-uncheck2">
                                            <div class="my-ddress-main-two">
                                                <span href="javascript:void(0)"  data-toggle="modal" data-target="#myModal">
                                                    <span><?php echo $this->Html->image('../css/images/plus-icon.png');?></span>
                                                    <?php echo __('Add New Address');?> </span>
                                            </div>
                                        </a>		
                                        <div class="display-show" id="blockdiv">
                                            <?php echo $this->Form->create('Address',array(''));?>
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('lastname',array('placeholder'=>'Surname','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('lastname');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('firstname',array('placeholder'=>'Given name','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('firstname');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-6"> 
                                                            <?php echo $this->Form->text('state',array('placeholder'=>'State','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('state');?>
                                                        </div>

                                                        <div class="col-md-6"> 
                                                            <?php echo $this->Form->text('city',array('placeholder'=>'Town','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('city');?>
                                                        </div>	
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12"> 
                                                            <?php echo $this->Form->text('postcode',array('placeholder'=>'Postal code','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('postcode');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12"> 
                                                            <?php echo __('Please make sure your address is accurate. It can not be changed once order is placed.'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('address_1',array('placeholder'=>'Address Line 1','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('address_1');?>
                                                        </div>
                                                    </div>
                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('address_2',array('placeholder'=>'Address Line 2','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('address_2');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('phone',array('placeholder'=>'Phone','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('phone');?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn-close btn btn-default" data-dismiss="modal"><?php echo __('Close'); ?></button>
                                                    <button type="submit" class="btn btn-red"><?php echo __('Confirm'); ?></button>
                                                </div>
                                            </div>
                                            <?php echo $this->Form->end();?>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <div class="new-heading clearfix"> <h2><?php echo __('Delivery time'); ?></h2> </div>
                    <p><?php echo __('We deliver packages Monday to Friday 9:00-19:00 and Saturday 9:00-16:00. There is no delivery service on Sundays or public holidays.'); ?></p>
                    <div class="new-heading clearfix"> <h2><?php echo __('Delivery information'); ?></h2> </div>
                    <p id="fillshipping"><?php echo __('Free Shipping'); ?></p>
                    <div class="my-cart-main">
                        <table width="100%" border="0">
                            <tr class="my-cart-table-heading">
                                <td><?php echo __('Items'); ?></td>
                                <td align="center"><span class="left-border"><?php echo __('Item ID'); ?></span></td>
                                <td align="center"><span class="left-border"><?php echo __('Price'); ?></span></td>
                                <td align="center"><span class="left-border"><?php echo __('Quantity'); ?></span></td>
                                <td align="center"><span class="left-border"><?php echo __('Subtotal'); ?> </span></td>
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
                            
                            <tr class="top-border">
                                <td valign="top"  class="image-pic"> <a href="javascript:void(0)" class="detail-link"> <?php echo $cart_product['Product']['name']?> </a> </td>
                                <td valign="top"  align="center"><?php echo $cart_product['Product']['id']?></td>
                                <td align="center" width="110"><span class="txt1">RM <?php echo $discount_price;?></span></td>
                                <td align="center"  width="110"><?php echo $cart_data[$cart_product['Product']['id']];?></td>
                                <td align="center"  width="110"><span class="txt1">RM <?php echo number_format($discount_price*$cart_data[$cart_product['Product']['id']],2,'.',''); $total_price = $total_price+ $discount_price*$cart_data[$cart_product['Product']['id']];?></span></td>
                            </tr>
                            <?php }?>
                            <tr class="my-cart-table-heading border-bottom">
                                <td colspan="6"> 
                                    <div class="total-amo">  
                                        <span class="total-main"><?php echo __('Subtotal'); ?>: RM <?php echo $total_price; $first_price = $total_price;?> </span>
                                        <span class="total-main">
                                            <?php if($total_price<=$min_order_price['Orderprices']['price']){
                                                    $total_price = $total_price+$ShippingPrice['ShippingPrice']['price'];
                                                ?>
                                                <?php echo __('Shipping'); ?>: RM<?php echo $ShippingPrice['ShippingPrice']['price']?> 
                                            <?php }else{?>
                                                <?php echo __('Free Shipping'); ?> 
                                            <?php }?>
                                        </span> 
                                        <?php echo __('Total'); ?>: RM <?php echo $total_price;?>
                                    </div> 
                                </td>
                            </tr>
                            <?php }else{?>
                            <tr>
                                <td colspan="6">
                                    <?php echo __('No record found'); ?>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                    <div class="checkout-main clearfix">
                        <input type="button" class="place-order" onclick="fnplaceorder();" id="place_order" value="Place order">
                        <p><?php echo __('Additional bank charges may apply.'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="address_id" id="address_id" />
<input type="hidden" name="amount" value="<?php echo $total_price;?>" id="amount" />
<?php if($first_price <=$min_order_price['Orderprices']['price']){?>
    <script>
    $(document).ready(function(){
       $('#fillshipping').html('<?php echo __('Shipping Fee ');?> <?php echo $ShippingPrice['ShippingPrice']['price']?>');
    });     
</script>
<?php }?>
<?php
if(!empty($this->request->data) and $this->params->pass[0] ==''){
    ?>
<script>
    $(document).ready(function(){
        $(".display-main").addClass("display-show-top");
        $(".section").addClass("show-over");
        $(".trans-fifty").show();
        
    });     
</script>
<?php }?>
<script>
    $(document).ready(function(){
         $('.check_uncheck').on('click', function () { 
             var id = $(this).attr("id");
             $(".removecls").removeClass("check-bg");
             $("#check-uncheck"+id).addClass("check-bg");
             $('#address_id').val(id);
             //alert(id);
             
         });
         
         
    });   
    function fnfilledit(id){
        //alert(id);
         $.ajax({
            type: "POST",
            url: "/store/edit",
            data: {code:id}
        })
        .done(function( msg ) {
            $('#appendtest_'+id).html(msg);
            document.getElementById('addressid_'+id).style.display = 'block';
            $(".section").addClass("show-over");
            $(".trans-fifty").show();
        });
        
    }
    
    function fnsubmitform(id){
        
        $.ajax({
            type: "POST",
            url: "/store/edit",
            data: $('#AddressEditForm').serialize()
        })
        .done(function( msg ) {
            if(msg=='1'){
                window.location.href = '/store/checkout';
            }
            $('#appendtest_'+id).html(msg);
            document.getElementById('addressid_'+id).style.display = 'block';
            $(".section").addClass("show-over");
            $(".trans-fifty").show();
        });
    }
    
    function fnconfirm(id){
        var r = confirm("Are you sure you want to delete?");
        if (r == true) {
            //return true
            window.location.href = '/store/delete/'+id;
        }
        return false;
    }
    
    function fnplaceorder(){
        var address_id = $('#address_id').val();
        var amount = $('#amount').val();
        if(address_id ==''){
            alert('Please select address');
            return false;
        }else{
            $('#place_order').hide();
            $.ajax({
            type: "POST",
            url: "/store/placeorder",
                data: {address_id:address_id,amount:amount}
            }).done(function( msg ) {
                if(msg=='1'){
                    alert('Admin has been change price for a product.');
                    window.location.href='/store/checkout';
                }else{
                    window.location.href='/store/makepayment/'+msg;
                }
            });
        }
    }
</script>