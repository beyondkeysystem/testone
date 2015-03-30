 <div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <?php 
          // echo $this->Html->link(
          //   '<i class="fa fa-plus"></i>',
          //   array('controller' => 'tickets', 
          //           'action' => 'add'),
          //   array('class' => 'btn btn-primary',
          //     'data-original-title' => 'Add New',
          //     'data-toggle' => 'tooltip',
          //     'escape' => false)
          // );
        ?>
        <!-- <button data-original-title="Copy" type="submit" form="form-product" formaction="products/copy" data-toggle="tooltip" title="" class="btn btn-default"><i class="fa fa-copy"></i></button>
         -->
        <button data-original-title="Delete" type="submit" form="form-ticket" data-toggle="tooltip" title="" class="btn btn-danger" ><i class="fa fa-trash-o"></i></button>
        <?php
          echo $this->Html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'tickets', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>
      </div>
      <h1>Tickets</h1>
      
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Tickets List</h3>
      </div>
      
      <div class="panel-body">
      <!-- Search Area -->
      <?php
        if($list == 'all'){
      ?>
      <?php
        if(isset($this->data['Ticket']['id']) and $this->data['Ticket']['id'] !=''){
            $ticket_id = $this->data['Ticket']['id'];
        }else{
          $ticket_id = '';
        }
        if(isset($this->data['Customer']['name']) and $this->data['Customer']['name'] !=''){
            $name = $this->data['Customer']['name'];
        }else{
          $name = '';
        }
      ?>
       <?php echo $this->Form->create('Ticket',array('url'=>'/admin/tickets/list','class'=>'','name' => 'form-ticket-search'));?> 
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name">Ticket Id</label>
                <input autocomplete="off" name="data[Ticket][id]" value="<?php echo $ticket_id;?>" placeholder="Ticket id" type="number" min="0" id="input-ticket-id" class="form-control" type="text"><ul class="dropdown-menu"></ul> 
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name">Customer Name</label>
                <input autocomplete="off" name="data[Customer][name]" value="<?=$name?>" placeholder="Customer Name" id="input-name" class="form-control" type="text"><ul class="dropdown-menu"></ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <div class="form-group">
                      <label class="control-label" for="input-name">Ticket Status</label>
                  <?php 
                      echo $this->Form->input('TicketStatus.status',array(
                          'options'=>array($ticketstatus),
                          'empty'=>'Default',
                          'label' => false,
                          'class' => 'form-control'
                          ));
                    
                  ?>
                </div>
              </div>
              <button type="submit" id="button-filter" class="btn btn-primary pull-right" name="filter" value="filter"><i class="fa fa-search"></i> Filter</button>
            </div>
          </div>
        </div>
        <?=$this->Form->end();?>
      </div>
      <?php } ?>
      <!-- Search Area Ends -->
        <?php echo $this->Form->create('Ticket',array('class'=>'form-horizontal','name' => 'form-ticket', 'id' =>'form-ticket'));?>
        <!-- <form action="#" method="post" enctype="multipart/form-data" id="form-ticket"> -->
          <div class="table-responsive">
            
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                  <!-- <td class="text-center">
                    Image
                  </td> -->
                  <td class="text-right">
                    <a href="#"><?=$this->Paginator->sort('id',__('Ticket Id'));?></a>
                  </td>
                  <td class="text-left">
                    <a href="#"><?=$this->Paginator->sort('subject',__('Subject'));?></a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('Customer.firstname',__('Customer'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('TicketDepartment.dept_name',__('Department'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('priority',__('Priority'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('TicketStatus.status',__('Status'));?>
                    </a>
                  </td>
                  <td class="text-right">
                    Action
                  </td>
                </tr>
              </thead>
              <tbody>
              <?php
                // pr($products); die;
              if(!empty($tickets)){
                  foreach($tickets as $ticket){                     
                ?>
                  <tr>
                    <td class="text-center">
                      <input name="selected[]" value="<?=$ticket['Ticket']['id']?>" type="checkbox">
                    </td>
                    <td class="text-right"><?=$ticket['Ticket']['id']?></td>
                    <td class="text-left"><?=$ticket['Ticket']['subject']?></td>
                    <td class="text-left"><?=$ticket['Customer']['name']?></td>
                    <td class="text-left"><?=$ticket['TicketDepartment']['dept_name']?></td>
                    <td class="text-left"><?=$ticket['Ticket']['priority']?></td>
                    <td class="text-left"><?=$ticket['TicketStatus']['status']?></td>
              
                    <td class="text-right">
                     <?php
                        echo $this->Html->link(
                          '<i class="fa fa-reply"></i>',
                          array('action' => 'reply', $ticket['Ticket']['id']),
                          array(
                            'class' => 'btn btn-primary',
                            'data-original-title' => 'Reply',
                            'data-toggle' => 'tooltip',
                            'escape' => false
                          )
                        );
                      ?>
                     <!--  <a data-original-title="Edit" href="#" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-pencil"></i></a> -->
                    </td>
                  </tr>
                <?php 
                  } 
                ?>
                <?php }else{?>
                <tr>
                  <td colspan="8"><center>No results!</center></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        <?php $this->Form->end(); ?>
        <?php echo $this->element('paging'); ?>
      </div>
    </div>
  </div>