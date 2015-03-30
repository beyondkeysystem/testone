<div class="page-header">
        <div class="container-fluid">
          <div class="pull-right">
            <?php
              echo $this->Html->link(
                '<i class="fa fa-plus"></i>',
                array('controller' => 'categories', 
                        'action' => 'add'),
                array('class' => 'btn btn-primary',
                  'data-original-title' => 'Add New',
                  'escape' => false)
              )."&nbsp;";

              echo $this->Html->link(
                '<i class="fa fa-refresh"></i>',
                array('controller' => 'categories', 
                        'action' => 'index'),
                array('class' => 'btn btn-default',
                  'data-original-title' => 'Rebuild',
                  'data-toggle' => 'tooltip',
                  'escape' => false)
              )."&nbsp;";

              /*echo $this->Html->link(
                '<i class="fa fa-trash-o"></i>',
                array('controller' => 'categories', 
                        'action' => 'delete'),
                array('class' => 'btn btn-danger',
                  'type' => 'submit',
                  'data-original-title' => 'Delete',
                  'data-toggle' => 'tooltip',
                  'confirm' => 'Delete/Uninstall cannot be undone! Are you sure you want to do this?',
                  'form' => 'CategoryDeleteForm',
                  'escape' => false)
              );*/

              echo $this->Form->button('<i class="fa fa-trash-o"></i>',array('escape' => false,
                                          'onclick' => "confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?')",
                                          'type'=>'submit',
                                          'form' => 'CategoryDeleteForm',
                                          'class' => 'btn btn-danger', 
                                          'data-toggle' => 'tooltip', 
                                          'data-original-title' => 'Delete',
                                          ));
            ?>            
          </div>
          <h1>Categories</h1>
          <?php echo $this->Session->flash(); ?>          
        </div>
    </div>

      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Category List</h3>
          </div>
          <div class="panel-body">
            <?php echo $this->Form->create(null,array('action' => 'delete'),array('class'=>'form-horizontal','name' => 'form-category'));?>
            <!-- <form action="" method="post" enctype="multipart/form-data" id="form-category"> -->
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                      <td class="text-left">                    
                        <?php
                          /* Code for order by Name */
                          $action = 'index/name-asc';
                          $class = '';

                          if(isset($order)){
                            if($order == 'name-asc'){
                              $action = 'index/name-desc';
                              $class = 'desc';
                            }else if($order == 'name-desc'){
                              $action = 'index/name-asc';
                              $class = 'asc'; 
                            }
                          }

                          echo $this->Html->link(
                              'Category Name',
                              array('controller' => 'categories', 
                                      'action' => $action),
                              array('class' => $class)
                          );
                        ?>

                      </td>
                      <td class="text-right">
                        <?php
                          /* Code for order by Sort_order */
                          $sort_action = 'index/sort_order-asc';
                          $sort_class = '';

                          if(isset($order)){
                            if($order == 'sort_order-asc'){
                              $sort_action = 'index/sort_order-desc';
                              $sort_class = 'desc';
                            }else if($order == 'sort_order-desc'){
                              $sort_action = 'index/sort_order-asc';
                              $sort_class = 'asc'; 
                            }
                          }

                          echo $this->Html->link(
                              'Sort Order',
                              array('controller' => 'categories', 
                                      'action' => $sort_action),
                              array('class' => $sort_class)
                          );
                        ?>
                       
                      </td>
                      <td class="text-right">
                        Action
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $i=0;
                      foreach($categories as $category){
                      $i++;
                    ?>

                    <tr>
                      <td class="text-center">
                        <input name="selected[]" value="<?=$category['Category']['id']?>" type="checkbox">
                      </td>
                      <td class="text-left"><?=$category['Category']['name']?></td>
                      <td class="text-right"><?=$category['Category']['sort_order']?></td>
                      <td class="text-right">
                        <?php
                          echo $this->Html->link(
                              '<i class="fa fa-pencil"></i>',
                              array('controller' => 'categories', 
                                      'action' => 'edit/'.$category['Category']['id']),
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
            <!-- </form> -->
            <?php echo $this->Form->end(); ?>
            <div class="row">
              <!-- <div class="col-sm-6 text-left"><ul class="pagination"><li class="active"><span>1</span></li><li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;page=2">2</a></li><li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;page=2">&gt;</a></li><li><a href="http://demo.opencart.com/admin/index.php?route=catalog/category&amp;token=4aee6945576334af87965d94978c0cd7&amp;page=2">&gt;|</a></li></ul></div>
              <div class="col-sm-6 text-right">Showing 1 to 20 of 38 (2 Pages)</div> -->
            </div>
          </div>
        </div>
      </div>