<?php
$data = $this->request->query;
$orderid = '';
$username = '';
$status = '';
$total_amount = '';
$method = '';
$modified = '';
if(isset($data['orderid']) and $data['orderid'] !=''){
    $orderid = $data['orderid'];
}
if(isset($data['customer']) and $data['customer'] !=''){
    $username = $data['customer'];
}
if(isset($data['method']) and $data['method'] !=''){
    $method = $data['method'];
}
if(isset($data['status']) and $data['status'] !=''){
    $status = $data['status'];
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
        
        
        </div>
        <h1>Payment</h1>
        <ul class="breadcrumb">
            <li><a href="/admin/users">Home</a></li>
            <li><a href="/admin/apyments">Payment</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Payment List</h3>
        </div>
        <div class="panel-body">
            <?php echo $this->Form->create('OrderDetail', array('class' => '','type'=>'get', 'name' => 'form-customer-search')); ?> 
            <div class="well">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input-order-id" class="control-label">ref no.</label>
                            <?php echo $this->Form->text('orderid', array('class' => "form-control", 'placeholder' => "ref no.",'value'=>$orderid)); ?>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input-order-status" class="control-label">Order Status</label>
                            <?php 
                               $options = array(
                                   'Pending'=>'Pending',
                                   'Completed'=>'Completed'
                               ); 
                            ?>
                            <?php echo $this->Form->select('status',$options,array('class'=>"form-control",'value'=>$status));?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="input-order-status" class="control-label">Method</label>
                            <?php 
                               $options = array(
                                   '0'=>'Paypal',
                                   '1'=>'Molpay'
                               );  
                            ?>
                            <?php echo $this->Form->select('method',$options,array('class'=>"form-control",'value'=>$method));?>
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
                  <td class="text-left"><?=$this->Paginator->sort('order_no',__('Order ID'));?></td>
                  <td class="text-left"><?=$this->Paginator->sort('method',__('Method'));?></td>
                  <td class="text-left"><?=$this->Paginator->sort('status',__('Status'));?></td>
                  <td class="text-left"><?=$this->Paginator->sort('transaction_id',__('ref no.'));?> </td>
                </tr>
              </thead>
              <tbody>
                  <?php if(!empty($payments)){?>
                  <?php foreach($payments as $payment){?>
                <tr>
                  <td class="text-left"><?php echo $payment['Payment']['order_no']?></td>
                  <td class="text-left"><?php if($payment['Payment']['method'] =='0') echo 'Paypal';else echo 'Molpay'?></td>
                  <td class="text-left"><?php echo $payment['Payment']['status']?></td>
                  <td class="text-left"><?php echo $payment['Payment']['transaction_id']?></td>
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