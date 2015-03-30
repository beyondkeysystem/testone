<!-- Adding CK Editor JS File -->
<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
       
<?php
  echo $this->Html->script('ckeditor/ckeditor');
  echo $this->Html->script('jquery_upload/script');
  echo $this->Html->css('chosen/chosen');
?>


<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
       
        <?php
          echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'orders', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>
      </div>
      <h1>Order</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Order detais</h3>
      </div>
      <div class="panel-body">
        <!-- <form action="http://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;token=e3b2c81726bb1b0dd7faa24ed2378064&amp;product_id=42" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal"> -->
        <?php
          echo $this->Form->create('Product',array('type' => 'file', 'class' => 'form-horizontal', 'id' => 'form-product'));
        ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">Order Details</a></li>
            <li class=""><a href="#tab-data" data-toggle="tab">Payment Details</a></li>
            <li class=""><a href="#tab-links" data-toggle="tab">Shipping Details</a></li>
            <li class=""><a href="#tab-attribute" data-toggle="tab">Products</a></li>
            <li class=""><a href="#tab-discount" data-toggle="tab">History</a></li>
          </ul>
          <div class="tab-content">
              <div class="tab-pane active" id="tab-general">
                  <table class="table table-bordered">
                      <tbody><tr>
                              <td>Order ID:</td>
                              <td>#<?php echo $this->params->pass[0];?></td>
                          </tr>
<!--                          <tr>
                              <td>Invoice No.:</td>
                              <td>                  <button class="btn btn-success btn-xs" id="button-invoice"><i class="fa fa-cog"></i> Generate</button>
                              </td>
                          </tr>
                          <tr>
                              <td>Store Name:</td>
                              <td>Your Store</td>
                          </tr>
                          <tr>
                              <td>Store Url:</td>
                              <td><a target="_blank" href="http://demo.opencart.com/">http://demo.opencart.com/</a></td>
                          </tr>-->
                          <tr>
                              <td>Customer:</td>
                              <td><?php echo $orderdetails['User']['username']?></td>
                          </tr>
                          <tr>
                              <td>Customer Group:</td>
                              <td>Default</td>
                          </tr>
                          <tr>
                              <td>E-Mail:</td>
                              <td><?php echo $orderdetails['User']['username']?></td>
                          </tr>
                          <tr>
                              <td>Telephone:</td>
                              <td><?php echo $orderdetails['User']['phone']?></td>
                          </tr>
                          <tr>
                              <td>Total:</td>
                              <td><?php echo $orderdetails[0]['total_amount']?></td>
                          </tr>
                          
                          <tr>
                              <td>Order Status:</td>
                              <td id="order-status"><?php echo $orderdetails['OrderDetail']['status']?></td>
                          </tr>
                          <tr>
                              <td>Date Added:</td>
                              <td><?php echo $orderdetails['OrderDetail']['created']?></td>
                          </tr>
                          <tr>
                              <td>Date Modified:</td>
                              <td><?php echo $orderdetails['OrderDetail']['modified']?></td>
                          </tr>
                      </tbody></table>
              </div>
          
          <!-- Data Tab -->

          <div class="tab-pane" id="tab-data">
              <table class="table table-bordered">
                  <tbody>
                      <tr>
                          <td>Transaction ID</td>
                          <td><?php echo $payments['Payment']['transaction_id']?></td>
                      </tr>
                      <tr>
                          <td>Order No</td>
                          <td><?php echo $payments['Payment']['order_no']?></td>
                      </tr>
                      <tr>
                          <td>Amount</td>
                          <td>RM <?php echo $payments['Payment']['amount']?></td>
                      </tr>
                      <tr>
                          <td>Date</td>
                          <td><?php echo $payments['Payment']['created']?></td>
                      </tr>
                      <tr>
                          <td>Token</td>
                          <td><?php echo $payments['Payment']['token']?></td>
                      </tr>
                      <tr>
                          <td>Payer ID</td>
                          <td><?php echo $payments['Payment']['payer_id']?></td>
                      </tr>
                      <tr>
                          <td>Payment Status</td>
                          <td><?php echo $payments['Payment']['status']?></td>
                      </tr>
                      <tr>
                          <td>Payment Mathod</td>
                          <td>
                              <?php if(isset($payments['Payment']['method']) and $payments['Payment']['method'] =='0'){
                                  echo 'Paypal';
                               }else{
                                  echo 'Molpay';
                              }
?>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="tab-pane" id="tab-links">
              <table class="table table-bordered">
                  <tbody>
                      <tr>
                          <td>Name</td>
                          <td><?php echo $orderdetails['OrderDetail']['name']?></td>
                      </tr>
                      <tr>
                          <td>Phone</td>
                          <td><?php echo $orderdetails['OrderDetail']['phone']?></td>
                      </tr>
                      <tr>
                          <td>Address</td>
                          <td><?php echo $orderdetails['OrderDetail']['address']?></td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="tab-pane" id="tab-attribute">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <td class="text-left">Product</td>
                          <td class="text-left">Model</td>
                          <td class="text-right">Quantity</td>
                          <td class="text-right">Unit Price</td>
                          <td class="text-right">Total</td>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $total = 0; foreach($orders as $order){?>
                      <tr>
                          <td class="text-left">
                              <?php echo $this->Html->link($order['Product']['name'],'/store/details/'.$order['Product']['id'],array('target'=>'_blank'));?>
                              <br>
                              &nbsp;<small> - Delivery Date: <?php echo $order['OrderDetail']['delivery_date']?></small>
                          </td>
                          <td class="text-left"><?php echo $order['Product']['model']?></td>
                          <td class="text-right"><?php echo $order['OrderDetail']['quantity']?></td>
                          <td class="text-right">RM <?php echo $order['OrderDetail']['product_amount']; $total = $total+$order['OrderDetail']['total_amount']?></td>
                          <td class="text-right">RM <?php echo $order['OrderDetail']['total_amount']?></td>
                      </tr>
                      <?php }?>
                      <tr>
                          <td class="text-right" colspan="4">Sub-Total:</td>
                          <td class="text-right">RM <?php echo number_format($total,2,'.','');?></td>
                      </tr>
                      <tr>
                          <td class="text-right" colspan="4">Flat Shipping Rate:</td>
                          <td class="text-right">
                              <?php
                              if($min_order_price['Orderprices']['price']>=$total){
                                  echo 'RM '.$ShippingPrice['ShippingPrice']['price'];
                                  $total = $total+$ShippingPrice['ShippingPrice']['price'];
                              }else{
                                    echo 'RM 0.00';
                              }
                                //pr($min_order_price);
                                //pr($ShippingPrice);
                                ?>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-right" colspan="4">Total:</td>
                          <td class="text-right">RM <?php echo number_format($total,2,'.','');?></td>
                      </tr>

                  </tbody>
              </table>
          </div>
            <div class="tab-pane" id="tab-discount">
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <td class="text-left">Date Added</td>
                              <td class="text-left">Status</td>
                              <td class="text-left">Customer Notified</td>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="text-left"><?php echo date('Y-m-d',strtotime($orders[0]['OrderDetail']['created']));?></td>
                              <td class="text-left">Pending</td>
                              <td class="text-left">No</td>
                          </tr>
                          <?php if(isset($orders[0]['OrderDetail']['is_process']) and $orders[0]['OrderDetail']['is_process'] == '1'){?>
                            <tr>
                              <td class="text-left"><?php echo $orders[0]['OrderDetail']['process_date'];?></td>
                              <td class="text-left">Processed</td>
                              <td class="text-left">No</td>
                            </tr>
                          <?php }//pr($orders);?>
                          <?php if(isset($orders[0]['OrderDetail']['is_shipped']) and $orders[0]['OrderDetail']['is_shipped'] == '1'){?>
                            <tr>
                              <td class="text-left"><?php echo date('Y-m-d',strtotime($orders[0]['OrderDetail']['shipped_date']));?></td>
                              <td class="text-left">Shipped</td>
                              <td class="text-left">Yes and Delivery Tracking Number. <?php echo $orders[0]['OrderDetail']['docket_no']?></td>
                            </tr>
                          <?php }?>
                            <?php  if(isset($orders[0]['OrderDetail']['is_return']) and $orders[0]['OrderDetail']['is_return'] == '1'){?>
                            <tr>
                              <td class="text-left"><?php echo date('Y-m-d',strtotime($orders[0]['OrderDetail']['return_date']));?></td>
                              <td class="text-left">Refund</td>
                              <td class="text-left">No</td>
                            </tr>
                          <?php }else if(isset($orders[0]['OrderDetail']['is_delivered']) and $orders[0]['OrderDetail']['is_delivered'] == '1'){?>
                            <tr>
                              <td class="text-left"><?php echo date('Y-m-d',strtotime($orders[0]['OrderDetail']['delivery_date']));?></td>
                              <td class="text-left">Complete</td>
                              <td class="text-left">Yes</td>
                            </tr>
                          <?php }?>
                            
                      </tbody>
                  </table>
              </div>
                <fieldset>
                    <legend>Order History</legend>
                    <?php echo $this->Form->create('OrderDetail',array());?>
                        <div class="form-group">
                            <label for="input-order-status" class="col-sm-2 control-label">Order Status</label>
                            <div class="col-sm-5">
                                <?php 
                                    $options = array(
                                        'Pending'=>'Pending',
                                        'Processed'=>'Processed',
                                        'Shipped'=>'Shipped',
                                        'Complete'=>'Complete',
                                        'Refund'=>'Refund'
                                    );
                                    echo $this->Form->select('status',$options,array('class'=>"form-control",'onchange'=>'fndocketno(this);'));?>
                                
                            </div>
                        </div>
                        <div class="form-group" style="display: none" id="docket_no">
                            <label for="input-order-status" class="col-sm-2 control-label">Delivery Tracking Number</label>
                            <div class="col-sm-5">
                                <?php echo $this->Form->text('docket_no',array('class'=>"form-control"));?>
                                
                            </div>
                        </div>
                        <div class="form-group" style="display: none" id="delevery_date">
                            <label for="input-order-status" class="col-sm-2 control-label">Delivery Date</label>
                            <div class="col-sm-5">
                                <?php echo $this->Form->text('delevery_date',array('class'=>"form-control"));?>
                                
                            </div>
                        </div>
                    <div class="text-right col-sm-7">
                        <button class="btn btn-primary" onclick="fnvalidform();" type="button" data-loading-text="Loading..." id="button-history"><i class="fa fa-plus-circle"></i> Submit</button>
                    </div>
                    <?php echo $this->Form->end();?>
                    
                </fieldset>
            </div>
          </div>
        <?=$this->Form->end();?>
      </div>
    </div>
  </div>

    <script>
        function fndocketno(obj){
            if(obj.value=='Shipped'){
                $('#docket_no').show();
            }else{
                $('#docket_no').hide();
            }
            if(obj.value=='Complete'){
                $('#delevery_date').show();
            }else{
                $('#delevery_date').hide();
            }
        }
        
        function fnvalidform(){
            //alert(document.getElementById('OrderDetailStatus').value);return false;
            if(document.getElementById('OrderDetailStatus').value == 'Shipped'){
                if(document.getElementById('OrderDetailDocketNo').value==''){
                    alert('Please enter Delivery Tracking Number');
                    return false
                }
            }
            if(document.getElementById('OrderDetailStatus').value == 'Complete'){
                if(document.getElementById('OrderDetailDeleveryDate').value==''){
                    alert('Please enter Delivery date');
                    return false
                }
            }
            $('#form-product').submit();
        }
    </script>
    <script>
    $(function() {
      $( "#OrderDetailDeleveryDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>