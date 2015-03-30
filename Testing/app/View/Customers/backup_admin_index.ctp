  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
      <?php 
          echo $this->Html->link(
            '<i class="fa fa-plus"></i>',
            array('controller' => 'customers', 
                    'action' => 'add'),
            array('class' => 'btn btn-primary',
              'data-original-title' => 'Add New',
              'escape' => false)
          )."&nbsp;";
        ?>
      </div>
      <h1>Customers</h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="">Customers</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Customer List</h3>
      </div>
      <div class="panel-body">
          <?php echo $this->Form->create('Customer',array());?>
        <div class="well">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="input-name" class="control-label">Customer Name</label>
                <input type="text" class="form-control" id="input-name" placeholder="Customer Name" name="filter_name" autocomplete="off">
                <ul class="dropdown-menu"></ul>
                <ul class="dropdown-menu"></ul>
              </div>
              <div class="form-group">
                <label for="input-email" class="control-label">E-Mail</label>
                <input type="text" class="form-control" id="input-email" placeholder="E-Mail" name="filter_email" autocomplete="off">
                <ul class="dropdown-menu" style="display: none;"></ul>
                <ul class="dropdown-menu" style="display: none;"></ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="input-customer-group" class="control-label">Customer Group</label>
                <select class="form-control" id="input-customer-group" name="filter_customer_group_id">
                  <option value="*" selected="selected"></option>
                                                      <option value="1">Default</option>
                                                    </select>
              </div>
              <div class="form-group">
                <label for="input-status" class="control-label">Status</label>
                <select class="form-control" id="input-status" name="filter_status">
                  <option value="*" selected="selected"></option>
                                    <option value="1">Enabled</option>
                                                      <option value="0">Disabled</option>
                                  </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="input-approved" class="control-label">Approved</label>
                <select class="form-control" id="input-approved" name="filter_approved">
                  <option value="*" selected="selected"></option>
                                    <option value="1">Yes</option>
                                                      <option value="0">No</option>
                                  </select>
              </div>
              <div class="form-group">
                <label for="input-ip" class="control-label">IP</label>
                <input type="text" class="form-control" id="input-ip" placeholder="IP" name="filter_ip">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="input-date-added" class="control-label">Date Added</label>
                <div class="input-group date">
                  <input type="text" class="form-control" id="input-date-added" data-format="YYYY-MM-DD" placeholder="Date Added" name="filter_date_added">
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                  </span></div>
              </div>
              <button class="btn btn-primary pull-right" id="button-filter" type="submit"><i class="fa fa-search"></i> Filter</button>
            </div>
          </div>
        </div>
          <?php echo $this->Form->end();?>
        <!--<form id="form-customer" enctype="multipart/form-data" method="post" action="">-->
        <?php echo $this->Form->create(null,array('action' => 'delete'),array('class'=>'form-horizontal','name' => 'form-customer'));?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-center" style="width: 1px;"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
                 <td class="text-left">                    
                    <?php echo $this->Paginator->sort('firstname',__('Customer Name')); ?>
                  </td>
                  <td class="text-left">
                    <?php echo $this->Paginator->sort('email',__('Email')); ?>
                  </td>
                  <td class="text-left">
                  <?php echo $this->Paginator->sort('customer_group_id',__('Customer Group Name')); ?>
                  </td>
                  <td class="text-left">
                 <?php echo $this->Paginator->sort('status',__('Status')); ?>
                  </td>
                  <td class="text-left">
                 <?php echo $this->Paginator->sort('ip',__('IP')); ?>
                    </td>
                  <td class="text-left">
                  <?php echo $this->Paginator->sort('created',__('Date Added')); ?>
                    </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $i=0;
                    foreach($results as $customer){
                    $i++;
                  ?>
                    <tr>
                      <td class="text-center">
                        <input name="selected[]" value="<?=$customer['Customer']['id']?>" type="checkbox">
                      </td>
                      <td class="text-left"><?=$customer['Customer']['firstname']?> <?=$customer['Customer']['lastname']?></td>
                      <td class="text-left"><?=$customer['Customer']['email']?></td>
                      <td class="text-left"><?=$customer['CustomerGroup']['name']?></td>
                      <td class="text-left"><?php echo ($customer['Customer']['status'])?"Enabled":"Disabled";?></td>
                      <td class="text-left"><?=$customer['Customer']['ip']?></td>
                      <td class="text-left"><?=$customer['Customer']['created']?></td>
                      <td class="text-right">
                        <?php
                          echo $this->Html->link(
                              '<i class="fa fa-pencil"></i>',
                              array('controller' => 'customers', 
                                      'action' => 'edit/'.$customer['Customer']['id']),
                              array('class' => 'btn btn-primary',
                                'data-original-title' => 'Edit',
                                'escape' => false)
                          );
                        ?>
                        <!-- <a data-original-title="Edit" href="#" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a> -->
                      </td>
                    </tr>                    
                  <?php
                    }
                  ?>
                  </tbody>
            </table>
          </div>
        <?php echo $this->Form->end(); ?>
        
        <div class="row">
          <div class="col-sm-6 text-left"><ul class="pagination">
          <?php
          
          if($this->Paginator->counter('{:pages}') > 1) {
            $pageCount = $this->Paginator->counter('{:pages}');
            echo "<li><a href='/admin/customers'>|&lt;</a></li>";
            echo $this->Paginator->prev('<span>&lt;</span>', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array(
                'separator' => '',
                'currentClass' => 'active',
                'tag' => 'li',
                'currentTag'=>'span',                
            ));
            echo $this->Paginator->next('&gt;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false));
            echo "<li><a href='/admin/customers/index/page:".$pageCount."'>|&gt;</a></li>";
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
  </div>