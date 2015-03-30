 <div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <?php 
          echo $this->Html->link(
            '<i class="fa fa-plus"></i>',
            array('controller' => 'products', 
                    'action' => 'add'),
            array('class' => 'btn btn-primary',
              'data-original-title' => 'Add New',
              'data-toggle' => 'tooltip',
              'escape' => false)
          );

          // echo $this->Html->link(
          //   '<i class="fa fa-copy"></i>',
          //   array('controller' => 'products', 
          //           'action' => 'copy'),
          //   array('type'=>'submit',
          //     'form' => 'form-product',
          //     'formaction' => 'copy',
          //     'class' => 'btn btn-default',
          //     'data-toggle' => 'tooltip',
          //     'data-original-title' => 'Copy',
          //     'escape' => false)
          // )."&nbsp;";

        ?>
        <!-- <a data-original-title="Add New" href="http://demo.opencart.com/admin/index.php?route=catalog/product/add&amp;token=e3b2c81726bb1b0dd7faa24ed2378064" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus"></i></a> -->
        <button data-original-title="Copy" type="submit" form="form-product" formaction="products/copy" data-toggle="tooltip" title="" class="btn btn-default"><i class="fa fa-copy"></i></button>
        
        <button data-original-title="Delete" type="submit" form="form-product" formaction="products/delete" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Products</h1>
      
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> Product List</h3>
      </div>
      
      <div class="panel-body">
      <!-- Search Area -->
      <?php
        if(isset($this->data['Product']['name']) and $this->data['Product']['name'] !=''){
            $product_name = $this->data['Product']['name'];
        }else{
          $product_name = '';
        }
        if(isset($this->data['Product']['model']) and $this->data['Product']['model'] !=''){
            $product_model = $this->data['Product']['model'];
        }else{
          $product_model = '';
        }
        if(isset($this->data['Product']['price']) and $this->data['Product']['price'] !=''){
            $price = $this->data['Product']['price'];
        }else{
          $price = '';
        }

        if(isset($this->data['Product']['quantity']) and $this->data['Product']['quantity'] !=''){
            $quantity = $this->data['Product']['quantity'];
        }else{
          $quantity = '';
        }
        
      ?>
       <?php echo $this->Form->create(null,array('action' => 'index'),array('class'=>'form-horizontal','name' => 'form-product-search'));?> 
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-name">Product Name</label>
                <input autocomplete="off" name="data[Product][name]" placeholder="Product Name" id="input-name" class="form-control" type="text" value="<?=$product_name?>"><ul class="dropdown-menu"></ul>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-model">Model</label>
                <input autocomplete="off" name="data[Product][model]" placeholder="Model" id="input-model" class="form-control" type="text" value="<?=$product_model?>"><ul class="dropdown-menu"></ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-price">Price</label>
                <input name="data[Product][price]" placeholder="Price" id="input-price" class="form-control" type="text" value="<?=$price?>">
              </div>
              <div class="form-group">
                <label class="control-label" for="input-quantity">Quantity</label>
                <input name="data[Product][quantity]" placeholder="Quantity" id="input-quantity" class="form-control" type="text" value="<?=$quantity?>">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-status">Status</label>
                <?php echo $this->Form->input('Product.status',array(
                      'options'=>array(''=>'Select', '1' => 'Enable', '0' => 'Disable'),
                      'label' => false,
                      'class' => 'form-control'
                      )) 
                ?>
              </div>
              <button type="submit" id="button-filter" class="btn btn-primary pull-right" name="filter"><i class="fa fa-search"></i> Filter</button>
            </div>
          </div>
        </div>
        <?=$this->Form->end();?>
      </div>
      <!-- Search Area Ends -->
        <?php // echo $this->Form->create(null,array('action' => 'copy'),array('class'=>'form-horizontal','name' => 'form-product'));?>
        <form action="#" method="post" enctype="multipart/form-data" id="form-product">
          <div class="table-responsive">
            
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox"></td>
                  <td class="text-center">
                    Image
                  </td>
                  <td class="text-left">
                    <a href="#"><?=$this->Paginator->sort('name',__('Product Name'));?></a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('model',__('Model'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('price',__('Price'));?>
                    </a>
                  </td>
                  <td class="text-right">
                    <a href="#">
                      <?=$this->Paginator->sort('quantity',__('Quantity'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('status',__('Status'));?>
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
              if(!empty($products)){
                  foreach($products as $product){                     
                ?>
                  <tr>
                    <td class="text-center">
                      <input name="selected[]" value="<?=$product['Product']['id']?>" type="checkbox">
                    </td>
                    <td class="text-center">
                      <?=$this->HTML->image('../uploads/thumbs/'.$product['Product']['image'],array(
                          'alt' => $product['Product']['name'],'style'=>'width:70px;height:auto;','class' => 'img-thumbnail'
                      ));?>
                    </td>
                    <td class="text-left"><?=$product['Product']['name']?></td>
                    <td class="text-left"><?=$product['Product']['model']?></td>
                    <td class="text-left">
                    <?php
                      if(!empty($product['ProductSpecial'])){
                    ?>
                        <span style="text-decoration: line-through;"><?=$product['Product']['price']?></span><br>
                          <div class="text-danger">
                            <?php
                              $current_date = strtotime(date('Y-M-d'));
                              foreach($product['ProductSpecial'] as $product_special){
                                $start_date = strtotime($product_special['date_start']);
                                $end_date = strtotime($product_special['date_end']);                    
                                if($current_date >= $start_date && $current_date <= $end_date){
                                  echo $product_special['price'];
                                  break;
                                }
                              }
                              
                            ?>
                          </div>
                    <?php
                      }else{
                        echo '<span>'.$product['Product']['price'].'</span>';
                      }
                    ?>                    
                      
                      </td>
                    <td class="text-right">                    
                      
                        <?php 
                          if($product['Product']['quantity'] > 100){
                            echo '<span class="label label-success">'.$product['Product']['quantity'].'</span>';
                          }else if($product['Product']['quantity'] == 0){
                            echo '<span class="label label-danger">Out of Stock<span>';
                          }else{
                            echo '<span class="label label-warning">'.$product['Product']['quantity'].'</span>';
                          }
                        ?>
                      
                    </td>
                    <td class="text-left"><?=$product['Product']['status'] == 1 ? '<span class="label label-info">Enable</span>' : '<span class="label label-danger">Disable</span>' ?></td>
                    <td class="text-right">
                      <?php
                        echo $this->Html->link(
                          '<i class="fa fa-pencil"></i>',
                          array('action' => 'edit', $product['Product']['id']),
                          array(
                            'class' => 'btn btn-primary',
                            'data-original-title' => 'Edit',
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
        </form>
        <?php echo $this->element('paging'); ?>
      </div>
    </div>
  </div>