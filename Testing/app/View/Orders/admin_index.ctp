<?php
$data = $this->request->query;
$orderid = '';
$username = '';
$status = '';
$total_amount = '';
$created = '';
$modified = '';
if(isset($data['orderid']) and $data['orderid'] !=''){
    $orderid = $data['orderid'];
}
if(isset($data['customer']) and $data['customer'] !=''){
    $username = $data['customer'];
}
if(isset($data['status']) and $data['status'] !=''){
    $status = $data['status'];
}
if(isset($data['total']) and $data['total'] !=''){
    $total_amount = $data['total'];
}
if(isset($data['adddate']) and $data['adddate'] !=''){
    $created = $data['adddate'];
}
if(isset($data['modifieddate']) and $data['modifieddate'] !=''){
    $modified = $data['modifieddate'];
}
?>
<div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
        <button class="btn btn-info" title="" data-toggle="tooltip" formaction="http://demo.opencart.com/admin/index.php?route=sale/order/shipping&amp;token=b05d8b078d50efed1c955355fd6d96fa" form="form-order" id="button-shipping" type="submit" data-original-title="Print Shipping List"><i class="fa fa-truck"></i></button>
        <button class="btn btn-info" title="" data-toggle="tooltip" formaction="http://demo.opencart.com/admin/index.php?route=sale/order/invoice&amp;token=b05d8b078d50efed1c955355fd6d96fa" form="form-order" id="button-invoice" type="submit" data-original-title="Print Invoice"><i class="fa fa-print"></i></button>
        <a class="btn btn-primary" title="" data-toggle="tooltip" href="http://demo.opencart.com/admin/index.php?route=sale/order/add&amp;token=b05d8b078d50efed1c955355fd6d96fa" data-original-title="Add New"><i class="fa fa-plus"></i></a></div>
        <h1>Orders</h1>
        <ul class="breadcrumb">
            <li><a href="/admin/users">Home</a></li>
            <li><a href="/admin/orders">Orders</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Orders List</h3>
        </div>
        <div class="panel-body">
            <?php echo $this->Form->create('OrderDetail', array('class' => '','type'=>'get', 'name' => 'form-customer-search')); ?> 
            <div class="well">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input-order-id" class="control-label">Order ID</label>
                            <?php echo $this->Form->text('orderid', array('class' => "form-control", 'placeholder' => "Order ID",'value'=>$orderid)); ?>
                        </div>
                        <div class="form-group">
                            <label for="input-customer" class="control-label">Customer</label>
                            <?php echo $this->Form->text('customer', array('class' => "form-control", 'placeholder' => "Customer",'value'=>$username)); ?><ul class="dropdown-menu"></ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input-order-status" class="control-label">Order Status</label>
                            <?php 
                               $options = array(
                                   'Paid'=>'Paid',
                                   'Unpaid'=>'Unpaid',
                                   'Pending'=>'Pending',
                                   'Processed'=>'Processed',
                                   'Shipped'=>'Shipped',
                                   'Canceled'=>'Canceled',
                                   'Refund'=>'Refund'
                               ); 
                            ?>
                            <?php echo $this->Form->select('status',$options,array('class'=>"form-control",'value'=>$status));?>
<!--                            <select class="form-control" id="input-order-status" name="filter_order_status">
                                <option value="*"></option>
                                <option value="0">Missing Orders</option>
                                <option value="7">Canceled</option>
                                <option value="9">Canceled Reversal</option>
                                <option value="13">Chargeback</option>
                                <option value="5">Complete</option>
                                <option value="8">Denied</option>
                                <option value="14">Expired</option>
                                <option value="10">Failed</option>
                                <option value="1">Pending</option>
                                <option value="15">Processed</option>
                                <option value="2">Processing</option>
                                <option value="11">Refunded</option>
                                <option value="12">Reversed</option>
                                <option value="3">Shipped</option>
                                <option value="16">Voided</option>
                            </select>-->
                        </div>
                        <div class="form-group">
                            <label for="input-total" class="control-label">Total</label>
                            <?php echo $this->Form->text('total', array('class' => "form-control", 'placeholder' => "Total",'value'=>$total_amount)); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input-date-added" class="control-label">Date Added</label>
                            <div class="input-group date">
                                <?php echo $this->Form->text('adddate', array('class' => "form-control", 'placeholder' => "Date Added",'value'=>$created)); ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                </span></div>
                        </div>
                        <div class="form-group">
                            <label for="input-date-modified" class="control-label">Date Modified</label>
                            <div class="input-group date">
                                <?php echo $this->Form->text('modifieddate', array('class' => "form-control", 'placeholder' => "Date Modified",'value'=>$modified)); ?>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                </span></div>
                        </div>
                        <button class="btn btn-primary pull-right" id="button-filter" type="submit"><i class="fa fa-search"></i> Filter</button>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <!--<form id="form-customer" enctype="multipart/form-data" method="post" action="">-->
            <?php echo $this->Form->create("Customer", array('action' => 'delete'), array('class' => 'form-horizontal', 'name' => 'form-customer', 'id' => 'form-customer')); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-right"><?=$this->Paginator->sort('order_no',__('Order ID'));?></td>
                  <td class="text-left"><?=$this->Paginator->sort('username',__('Customer'));?>
                    </td>
                  <td class="text-left"><?=$this->Paginator->sort('OrderDetail.status',__('Status'));?>
                    </td>
                  <td class="text-right"><?=$this->Paginator->sort('OrderDetail.created',__('total_amount'));?>
                    </td>
                  <td class="text-left"><?=$this->Paginator->sort('OrderDetail.created',__('Date Added'));?>
                    </td>
                  <td class="text-left"><?=$this->Paginator->sort('OrderDetail.modified',__('Date Modified'));?>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                  <?php if(!empty($orders)){?>
                  <?php foreach($orders as $order){?>
                <tr>
                  <td class="text-right"><?php echo $order['OrderDetail']['order_no']?></td>
                  <td class="text-left"><?php echo $order['User']['username']?></td>
                  <td class="text-left">
                      <?php //echo $order['OrderDetail']['status'];
                        $paymentdetails  = $this->requestAction('/admin/orders/paymentstatus/'.$order['OrderDetail']['order_no']);
                            if(!empty($paymentdetails)){
                                if(isset($paymentdetails['Payment']['status']) and $paymentdetails['Payment']['status'] =='Pending'){
                                    if(isset($paymentdetails['Payment']['method']) and $paymentdetails['Payment']['method']=='1'){
                                        echo $this->Html->link($paymentdetails['Payment']['status'],'/admin/orders/refreshorder/'.$order['OrderDetail']['order_no']);
                                    }else{
                                        echo $order['OrderDetail']['status'];
                                    }
                                }else{
                                    echo $order['OrderDetail']['status'];
                                }
                            }else{
                                echo $order['OrderDetail']['status'];
                            }
                      ?>
                  </td>
                  <td class="text-right"><?php echo $order[0]['total_amount']?></td>
                  <td class="text-left"><?php echo $order['OrderDetail']['created']?></td>
                  <td class="text-left"><?php echo $order['OrderDetail']['modified']?></td>
                  <td class="text-right">
                      <?php echo $this->Html->link('<i class="fa fa-eye"></i>','/admin/orders/vieworder/'.$order['OrderDetail']['order_no'],array('class'=>"btn btn-info", 'title'=>"", 'data-toggle'=>"tooltip",'escape'=>false));?>
                      <?php echo $this->Html->link('<i class="fa fa-trash-o"></i>','/admin/orders/delete/'.$order['OrderDetail']['order_no'],array('class'=>"btn btn-danger", 'title'=>"", 'data-toggle'=>"tooltip",'escape'=>false));?>
                      
                  </td>
                </tr>          
                  <?php } }else{?>
                <tr>
                    <td colspan="8">
                        No record found.
                    </td>
                </tr>         
               <?php }?>
              </tbody>
            </table>
            </div>
                        <?php echo $this->Form->end(); ?>

            <div class="row">
                <div class="col-sm-6 text-left"><ul class="pagination">
            <?php
            if ($this->Paginator->counter('{:pages}') > 1) {
                $pageCount = $this->Paginator->counter('{:pages}');
                echo "<li><a href='/admin/customers'>|&lt;</a></li>";
                echo $this->Paginator->prev('<span>&lt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
                echo $this->Paginator->numbers(array(
                    'separator' => '',
                    'currentClass' => 'active',
                    'tag' => 'li',
                    'currentTag' => 'span',
                ));
                echo $this->Paginator->next('<span>&gt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
                echo "<li><a href='/admin/customers/index/page:" . $pageCount . "'>|&gt;</a></li>";
            }
            ?>
                    </ul></div>
            </div>

            <!--<div class="row">          
              <div class="col-sm-6 text-left"><ul class="pagination"><li><a href="">|&lt;</a></li><li><a href="">&lt;</a></li><li><a href="">5</a></li><li><a href="">6</a></li><li><a href="">7</a></li><li><a href="">8</a></li><li class="active"><span>9</span></li><li><a href="">10</a></li><li><a href="">11</a></li><li><a href="">12</a></li><li><a href="">13</a></li><li><a href="">&gt;</a></li><li><a href="">&gt;|</a></li></ul></div>
              <div class="col-sm-6 text-right">Showing 161 to 180 of 1485 (75 Pages)</div>
            </div>-->
        </div>
    </div>
</div>
<script>
    $(function() {
      $( "#OrderDetailAdddate" ).datepicker({ dateFormat: 'yy-mm-dd' });
      $( "#OrderDetailModifieddate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>