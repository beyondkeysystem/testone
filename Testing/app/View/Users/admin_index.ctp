<div class="page-header">
    <div class="container-fluid">
        <h1>Dashboard</h1>     
    </div>
</div>

<div id="content">  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-6"><div class="tile">
                    <div class="tile-heading">Pending Orders <span class="pull-right"></span></div>
                    <div class="tile-body"><i class="fa fa-shopping-cart"></i>
                        <h2 class="pull-right"><?php echo $pading_order?></h2>
                    </div>  
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6"><div class="tile">
                    <div class="tile-heading">Open Ticket <span class="pull-right">
                            <i class="fa fa-caret-down"></i></span></div>
                    <div class="tile-body"><i class="fa fa-credit-card"></i>
                        <h2 class="pull-right"><?php echo $tickets;?></h2>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6"><div class="tile">
                    <div class="tile-heading">Total Customers <span class="pull-right">
                            <i class="fa fa-caret-up"></i>
                            </span></div>
                    <div class="tile-body"><i class="fa fa-user"></i>
                        <h2 class="pull-right"><?php echo $customer;?></h2>
                    </div>

                </div>
            </div>
<!--            <div class="col-lg-3 col-md-3 col-sm-6"><div class="tile">
                    <div class="tile-heading">People Online</div>
                    <div class="tile-body"><i class="fa fa-eye"></i>
                        <h2 class="pull-right">0</h2>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="row">   
            <div class="col-lg-8 col-md-12 col-sm-12 col-sx-12"> <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Latest Orders</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-right"><?= $this->Paginator->sort('order_no', __('Order ID')); ?></td>
                                    <td class="text-left"><?= $this->Paginator->sort('username', __('Customer')); ?>
                                    </td>
                                    <td class="text-left"><?= $this->Paginator->sort('OrderDetail.status', __('Status')); ?>
                                    </td>
                                    <td class="text-right"><?= $this->Paginator->sort('OrderDetail.created', __('Total Amount')); ?>
                                    </td>
                                    <td class="text-left"><?= $this->Paginator->sort('OrderDetail.created', __('Date Added')); ?>
                                    </td>
                                    <td class="text-left"><?= $this->Paginator->sort('OrderDetail.modified', __('Date Modified')); ?>
                                    </td>
                                    <td class="text-right">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($orders)) { ?>
                                    <?php foreach ($orders as $order) { ?>
                                        <tr>
                                            <td class="text-right"><?php echo $order['OrderDetail']['order_no'] ?></td>
                                            <td class="text-left"><?php echo $order['User']['username'] ?></td>
                                            <td class="text-left"><?php echo $order['OrderDetail']['status'] ?></td>
                                            <td class="text-right"><?php echo $order[0]['total_amount'] ?></td>
                                            <td class="text-left"><?php echo $order['OrderDetail']['created'] ?></td>
                                            <td class="text-left"><?php echo $order['OrderDetail']['modified'] ?></td>
                                            <td class="text-right">
                                                <?php echo $this->Html->link('<i class="fa fa-eye"></i>', '/admin/orders/vieworder/' . $order['OrderDetail']['order_no'], array('class' => "btn btn-info", 'title' => "", 'data-toggle' => "tooltip", 'escape' => false)); ?>
                                                <?php //echo $this->Html->link('<i class="fa fa-trash-o"></i>', '/admin/orders/delete/' . $order['OrderDetail']['order_no'], array('class' => "btn btn-danger", 'title' => "", 'data-toggle' => "tooltip", 'escape' => false)); ?>

                                            </td>
                                        </tr>          
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="8">
                                            No record found.
                                        </td>
                                    </tr>         
<?php } ?>
                            </tbody>
                        </table>
                    </div>
<?php echo $this->Form->end(); ?>

                    
                </div>
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
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
    </div>

