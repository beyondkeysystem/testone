 <div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
       
      </div>
      <h1>Tickets</h1>
      
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Tickets List</h3>
      </div>
      
      <div class="panel-body" >
      
        <?php // echo $this->Form->create(null,array('action' => 'copy'),array('class'=>'form-horizontal','name' => 'form-product'));?>
        <form action="#" method="post" enctype="multipart/form-data" id="form-product">
          <div class="table-responsive col-lg-6">
            <p><b>Ticket Status</b></p>
            <table class="table table-bordered table-hover">
              <tbody>
              <?php
                 /* Code For Count Ticket Status Counter Starts */
                    foreach($tickets as $ticket){
                      $ticket_status_id[] = $ticket['TicketStatus']['id'];
                    }
                    $counts = array_count_values($ticket_status_id);
                    $total_tickets_sum = array_sum(array_count_values($ticket_status_id));
                 /* Code For Count Ticket Status Counter Ends */

              if(!empty($ticketstatus)){
                  foreach($ticketstatus as $key=>$ticketstatus){                     
                ?>
                  <tr>
                    
                    <td class=""><?= ucfirst($ticketstatus)?></td>
                    <td class="text-right"><?=isset($counts[$key])?$counts[$key]: 0 ?></td>
                    <td class="text-right">
                     <?php
                        echo $this->Html->link(
                          '<i class="fa fa-list"></i>',
                          array('action' => 'list', $key),
                          array(
                            'class' => 'btn btn-primary',
                            'data-original-title' => 'View',
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
                <?php } ?>
              </tbody>
              <thead>
                <tr>
                    <td class="">All Tickets</td>
                    <td class="text-right"><?=$total_tickets_sum?></td>
                    <td class="text-right">
                     <?php
                        echo $this->Html->link(
                          '<i class="fa fa-list"></i>',
                          array('action' => 'list', ''),
                          array(
                            'class' => 'btn btn-primary',
                            'data-original-title' => 'View',
                            'data-toggle' => 'tooltip',
                            'escape' => false
                          )
                        );
                      ?>
                    </td>
                  </tr>
              </thead>
            </table>
          </div>
        </form>
        <?php //echo $this->element('paging'); ?>
      </div>
    </div>
  </div>