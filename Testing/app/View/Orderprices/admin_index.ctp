  <div class="page-header">
    <div class="container-fluid">
      <h1>Order Price</h1>
      <ul class="breadcrumb">
                <li><a href="/admin/users">Home</a></li>
                <li><a href="/admin/orderprices">Order Price</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Order price</h3>
      </div>
      <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-left">Order Price</td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $i=0;
                    //pr($Orderprices);
                    foreach($Orderprices as $Orderprice){
                    $i++;
                  ?>
                    <tr>
                      <td class="text-left"><?php echo $Orderprice['Orderprices']['price']?></td>
                      <td class="text-right">
                        <?php
                          echo $this->Html->link(
                              '<i class="fa fa-pencil"></i>',
                              array('controller' => 'orderprices', 
                                      'action' => 'edit/'.$Orderprice['Orderprices']['id']),
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
        
      </div>
    </div>
  </div>
  </div>