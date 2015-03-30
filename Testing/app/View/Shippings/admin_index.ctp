  <div class="page-header">
    <div class="container-fluid">
      <h1>Shipping</h1>
      <ul class="breadcrumb">
                <li><a href="/admin/users">Home</a></li>
                <li><a href="/admin/shippings">Shipping</a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Customer List</h3>
      </div>
      <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-left">Shipping Price</td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $i=0;
                    foreach($ShippingPrice as $Shipping){
                    $i++;
                  ?>
                    <tr>
                      <td class="text-left"><?php echo $Shipping['ShippingPrice']['price']?></td>
                      <td class="text-right">
                        <?php
                          echo $this->Html->link(
                              '<i class="fa fa-pencil"></i>',
                              array('controller' => 'shippings', 
                                      'action' => 'edit/'.$Shipping['ShippingPrice']['id']),
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