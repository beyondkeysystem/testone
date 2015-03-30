<!-- Adding CK Editor JS File -->
<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
       
<?php
  echo $this->Html->script('ckeditor/ckeditor');
  echo $this->Html->script('jquery_upload/script');
  echo $this->Html->css('chosen/chosen');
?>


<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button data-original-title="Save" type="submit" form="form-product" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php
          echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'products', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>
      </div>
      <h1>Products</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Product</h3>
      </div>
      <div class="panel-body">
        <!-- <form action="http://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;token=e3b2c81726bb1b0dd7faa24ed2378064&amp;product_id=42" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal"> -->
        <?php
          echo $this->Form->create('Product',array('type' => 'file', 'class' => 'form-horizontal', 'id' => 'form-product'));
        ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            <li class=""><a href="#tab-data" data-toggle="tab">Data</a></li>
            <li class=""><a href="#tab-links" data-toggle="tab">Links</a></li>
            <li class=""><a href="#tab-attribute" data-toggle="tab">Attribute</a></li>
            <li class=""><a href="#tab-discount" data-toggle="tab">Discount</a></li>
            <li class=""><a href="#tab-special" data-toggle="tab">Special</a></li>
            <li class=""><a href="#tab-image" data-toggle="tab">Image</a></li>
            <li class=""><a href="#tab-reward" data-toggle="tab">Reward Points</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">Product Name / Title</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('Product.name',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'Product Name',
                            'class' => 'form-control',
                            'required' => 'request'
                          ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">Product Sub title</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('Product.sub_title',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'Product Sub title',
                            'class' => 'form-control',
                            'required' => 'request'
                          ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description1">Product Info</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('Product.product_info',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control ckeditor',
                          'placeholder' => 'Description'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description1">How to Buy</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('Product.how_to_buy',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control ckeditor',
                          'placeholder' => 'How to Buy'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description1">Service</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('Product.service',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control ckeditor',
                          'placeholder' => 'Service'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('Product.meta_title', array(
                          'type' => 'text',
                          'label' => false,
                          'placeholder'=>'Meta Tag Title',
                          'class'=>'form-control',
                          'required' => 'required'
                        ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-meta-description1">Meta Tag Description</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('Product.meta_description',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control',
                          'placeholder' => 'Meta Tag Description'
                          ));

                        echo $this->form->input('Product.id', array(
                          'type' => 'hidden',
                          'label' => false,
                          'value' => $this->data['Product']['id']
                          ));
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('Product.meta_keyword',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control',
                          'placeholder' => 'Meta Tag Keywords'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-tag1"><span data-original-title="comma separated" data-toggle="tooltip" title="">Product Tags</span></label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('Product.tag',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'Product Tags',
                            'class' => 'form-control',
                            'required' => 'request'
                          ));
                      ?>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          
          <!-- Data Tab -->

            <div class="tab-pane" id="tab-data">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Image</label>
                <div class="col-sm-10">
                  <span id="file">
                    <span id="image_area">
                      <?php
                        if($this->data['Product']['image']){
                          echo $this->Html->image('../uploads/thumbs/'.$this->data['Product']['image'],array('style'=>'width:120px','class'=>'img-thumbnail'));
                      ?>
                         &emsp; <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure do you want to delete this image?')){delete_image();}else{return false;}"><i class="fa fa-trash"></i></button>
                      <?php 
                        }else{
                          echo $this->Form->input('Product.image',array('type'=>'file',
                              'label' => false,
                              'class' => 'product_upload'
                            ));
                        }
                      ?>  
                    </span>
                  </span>
                </div>
              </div>            
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-model">Model</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.model', array(
                        'placeholder' => 'Model',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>                  
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sku"><span data-original-title="Stock Keeping Unit" data-toggle="tooltip" title="">SKU</span></label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.sku', array(
                        'placeholder' => 'SKU',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-isbn"><span data-original-title="International Standard Book Number" data-toggle="tooltip" title="">ISBN</span></label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.isbn', array(
                        'placeholder' => 'ISBN',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-mpn"><span data-original-title="Manufacturer Part Number" data-toggle="tooltip" title="">MPN</span></label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.mpn', array(
                        'placeholder' => 'MPN',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-location">Location</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.location', array(
                        'placeholder' => 'Location',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-price">Price</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.price', array(
                        'min' => '0',
                        'step' => '0.01',
                        'placeholder' => 'Price',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-tax-class">Tax Class</label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('Product.tax_class_id',array(
                      'options'=>array($tax),
                      'empty'=>'-- None --',
                      'label' => false,
                      'class' => 'form-control'
                      )) 
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.quantity', array(
                        'placeholder' => 'Quantity',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-minimum"><span data-original-title="Force a minimum ordered amount" data-toggle="tooltip" title="">Minimum Quantity</span></label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.minimum', array(
                        'placeholder' => 'Minimum Quantity',
                        'type' => 'number',
                        'step' => '0.01',
                        'min' => '0',
                        'label' => false,
                        'class' => 'form-control'
                      ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-subtract">Subtract Stock</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.subtract', array(
                        'options'=>array(1 => 'Yes', 0=> 'No'),
                        'label' => false,
                        'class' => 'form-control'
                      )); 
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-stock-status"><span data-original-title="Status shown when a product is out of stock" data-toggle="tooltip" title="">Out Of Stock Status</span></label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('Product.stock_status_id',array(
                      'options'=>array($stockstatus),
                      'label' => false,
                      'class' => 'form-control'
                    )); 
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Requires Shipping</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.shipping', array(
                        'options' => array('1'=>'Yes', '0'=>'No'),
                        'label' => false,
                        'class' => 'form-control'
                    ));

                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-date-available">Date Available</label>
                <div class="col-sm-3">
                  <div class="input-group date">
                  
                  
                    <?php
                      echo $this->Form->input('Product.date_available', array(
                          'placeholder' => 'Date Available',
                          'type' => 'text',
                          'label' => false,
                          'class' => 'form-control',
                          'id' => 'dp1'
                        ));
                    ?>
                  
                   


                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="$('#dp1').trigger('focus');"><i class="fa fa-calendar"></i></button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-length">Dimensions (L x W x H)</label>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-sm-4">
                       <?php
                        echo $this->Form->input('Product.length', array(
                          'placeholder' => 'Length',
                          'type' => 'number',
                          'step' => '0.01',
                          'min' => '0',
                          'label' => false,
                          'class' => 'form-control'
                        ));
                      ?>
                    </div>
                    <div class="col-sm-4">
                      <?php
                        echo $this->Form->input('Product.width', array(
                          'placeholder' => 'Width',
                          'type' => 'number',
                          'step' => '0.01',
                          'min' => '0',
                          'label' => false,
                          'class' => 'form-control'
                        ));
                      ?>
                    </div>
                    <div class="col-sm-4">
                      <?php
                        echo $this->Form->input('Product.height', array(
                          'placeholder' => 'Height',
                          'type' => 'number',
                          'step' => '0.01',
                          'min' => '0',
                          'class' => 'form-control'
                        ));
                      ?>
                   </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-length-class">Length Class</label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('Product.length_class_id',array(
                      'options'=>array($length_class_id),
                      'label' => false,
                      'class' => 'form-control'
                    )); 
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-weight">Weight</label>
                <div class="col-sm-10">
                  <?php
                    echo $this->Form->input('Product.weight', array(
                      'placeholder' => 'Weight',
                      'type' => 'number',
                      'step' => '0.01',
                      'min' => '0',
                      'label' => false,
                      'class' => 'form-control'
                    ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-weight-class">Weight Class</label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('Product.weight_class_id',array(
                      'options'=>array($weight_class_id),
                      'label' => false,
                      'class' => 'form-control'
                    )); 
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('Product.status',array(
                      'options'=>array('1' => 'Enable', '0' => 'Disable'),
                      'label' => false,
                      'class' => 'form-control'
                      )) 
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                <div class="col-sm-10">
                  <?php 
                    echo $this->Form->input('Product.sort_order', array(
                      'type' => 'number',
                      'min' => '0',
                      'value' => '0',
                      'label' => false,
                      'placeholder'=>'Sort Order',
                      'class'=>'form-control'
                      ));
                  ?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-links">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-category"><span data-original-title="(Autocomplete)" data-toggle="tooltip" title="">Categories</span></label>
                <div class="col-sm-10">
                  <select multiple class="chosen-select-width form-control" name="data[ProductCategory][0][category_id]">
                    <?php 
                      foreach($category as $cat_id => $cat){
                        if(!empty($this->data['ProductCategory'][0])){
                          foreach($this->data['ProductCategory'] as $productcategory){
                              if($productcategory['category_id'] == $cat_id){
                                echo '<option selected value="'.$cat_id.'">'.$cat.'</option>';
                              }else{
                                echo '<option  value="'.$cat_id.'">'.$cat.'</option>';      
                              }
                          }                          
                        }else{
                          echo '<option  value="'.$cat_id.'">'.$cat.'</option>';      
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-related"><span data-original-title="(Autocomplete)" data-toggle="tooltip" title="">Related Products</span></label>
                <div class="col-sm-10">
                  <?php //pr($products);die; ?>
                  <select multiple class="chosen-select-width form-control" name="data[ProductRelate][0][related_id]">
                    <?php 
                      foreach($products as $prod_id => $prod){
                        if(!empty($this->data['ProductRelate'][0])){
                          foreach($this->data['ProductRelate'] as $productrelate){
                              if($productrelate['related_id'] == $prod_id){
                                echo '<option selected value="'.$prod_id.'">'.$prod.'</option>';
                              }else{
                                echo '<option  value="'.$prod_id.'">'.$prod.'</option>';
                              }
                          }
                        }else{
                          echo '<option  value="'.$prod_id.'">'.$prod.'</option>';      
                        }
                      }
                    ?>
                  </select>
                  <?php 
                      /*echo $this->Form->input('ProductRelate.related_id',array(
                      'options'=>array($products),
                      'label' => false,
                      'multiple' => true,
                       'class' => 'chosen-select-width form-control'
                      ))*/ 
                    ?>

                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-attribute">
              <div class="table-responsive">
                <table id="attribute" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Attribute</td>
                      <td class="text-left">Text</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     
                      if(!empty($this->data['ProductAttribute'][0])){
                        foreach($this->data['ProductAttribute'] as $key => $productattribute){
                    ?>
                        <tr id="attribute-row<?=$key?>">
                          <td class="text-left"><?php 
                          echo $this->Form->input('ProductAttribute.attribute_name', array(
                            'label' => false,
                            'placeholder'=>'Attribute',
                            'class'=>'form-control',
                            'name' => 'data[ProductAttribute]['.$key.'][attribute_name]',
                            'value' => $this->data['ProductAttribute'][$key]['attribute_name']
                            ));

                          echo $this->form->input('ProductAttribute.id', array(
                            'type' => 'hidden',
                            'label' => false,
                            'name' => 'data[ProductAttribute]['.$key.'][id]',
                            'value' => $this->data['ProductAttribute'][$key]['id']
                            ));
                          ?>
                          </td>
                          <td class="text-left">
                            <div class="input-group"><span class="input-group-addon"></span><?php 
                              echo $this->Form->input('ProductAttribute.text',array(
                                'rows' => '5',
                                'label' => false,
                                'class' => 'form-control',
                                'placeholder' => 'Text',
                                'name' => 'data[ProductAttribute]['.$key.'][text]',
                                'value' => $this->data['ProductAttribute'][$key]['text']
                                )); 
                            ?></div>  
                          </td>
                          <td class="text-left"><button type="button" onclick="delete_row(<?=$this->data['ProductAttribute'][$key]['id']?>, 'ProductAttribute');$('#attribute-row<?=$key?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                      </tr>
                    <?php
                      }
                    }
                    ?>  
                  </tbody>
                  <tfoot>
                    
                    <tr>
                      <td colspan="2"></td>
                      <td class="text-left">
                          <button data-original-title="Add Attribute" type="button" onclick="addAttribute();" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                      </td>
                    </tr>
                  </tfoot>
                </table>

              </div>
            </div>
            
            
            <div class="tab-pane" id="tab-discount">
              <div class="table-responsive">

                <table id="discount" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Customer Group</td>
                      <td class="text-right">Quantity</td>
                      <td class="text-right">Price</td>
                      <td class="text-left">Date Start</td>
                      <td class="text-left">Date End</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(!empty($this->data['ProductDiscount'][0])){
                        foreach($this->data['ProductDiscount'] as $key => $productdiscount){
                    ?>    
                        <tr id="discount-row<?=$key?>">
                          <td class="text-left">
                            <select id="CustomerGroupCustomerGroupId" class="form-control" name="data[ProductDiscount][<?=$key?>][customer_group_id]">
                              <?php 
                                foreach($customer_group as $cust_group_id => $cg){
                                  if($productdiscount['customer_group_id'] == $cust_group_id){
                                    echo '<option selected="selected" value="'.$cust_group_id.'">'.$cg.'</option>';
                                  }else{
                                    echo '<option value="'.$cust_group_id.'">'.$cg.'</option>';
                                  }
                                }
                              ?>
                            </select>
                          </td>
                          <td class="text-right"><?php
                              echo $this->Form->input('ProductDiscount.quantity', array(
                                'name' => 'data[ProductDiscount]['.$key.'][quantity]',
                                'placeholder' => 'Quantity',
                                'type' => 'number',
                                'label' => false,
                                'min' => 0,
                                'class' => 'form-control',
                                'value' => $this->data['ProductDiscount'][$key]['quantity']
                              ));
                              
                              echo $this->form->input('ProductDiscount.id', array(
                                        'type' => 'hidden',
                                        'label' => false,
                                        'name' => 'data[ProductDiscount]['.$key.'][id]',
                                        'value' => $this->data['ProductDiscount'][$key]['id']
                              ));
                              
                            ?></td>
                            <td class="text-right"><?php
                              echo $this->Form->input('ProductDiscount.price', array(
                                'name' => 'data[ProductDiscount]['.$key.'][price]',
                                'placeholder' => 'Price',
                                'type' => 'number',
                                'step' => 'any',
                                'min' => '0.01',
                                'label' => false,
                                'class' => 'form-control',
                                'value' => $this->data['ProductDiscount'][$key]['price']
                              ));
                            ?></td>
                            <td class="text-left"><div class="input-group date"><input class="form-control datepicker_start" type="text"  placeholder="Date Start" name="data[ProductDiscount][<?=$key?>][date_start]" value="<?=date("Y-m-d", strtotime($this->data['ProductDiscount'][$key]['date_start']))?>"></td>
                            <td class="text-left"><input class="form-control datepicker_end " type="text"  placeholder="Date End" name="data[ProductDiscount][<?=$key?>][date_end]" value="<?=date("Y-m-d", strtotime($this->data['ProductDiscount'][$key]['date_end']))?>"></td>
                            <td class="text-left"><button type="button" onclick="delete_row(<?=$this->data['ProductDiscount'][$key]['id']?>, 'ProductDiscount');$('#discount-row<?=$key?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                        </tr>
                    <?php
                        }
                      }
                    ?>

                  </tbody>
                  <tfoot>

                    
                    <tr>
                      <td colspan="5"></td>
                      <td class="text-left"><button data-original-title="Add Discount" type="button" onclick="addDiscount();" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="tab-special">
              <div class="table-responsive">
                <table id="special" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Customer Group</td>
                      <td class="text-right">Quantity</td>
                      <td class="text-right">Price</td>
                      <td class="text-left">Date Start</td>
                      <td class="text-left">Date End</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php //pr($this->data);
                    if(!empty($this->data['ProductSpecial'][0])){
                      foreach($this->data['ProductSpecial'] as $key => $productspecial){
                    ?>
                        <tr id="special-row<?=$key?>">
                          <td class="text-left">
                            <select id="CustomerGroupCustomerGroupId" class="form-control" name="data[ProductSpecial][<?=$key?>][customer_group_id]">
                              <?php 
                                foreach($customer_group as $cust_group_id => $cg){
                                  if($productdiscount['customer_group_id'] == $cust_group_id){
                                    echo '<option selected="selected" value="'.$cust_group_id.'">'.$cg.'</option>';
                                  }else{
                                    echo '<option value="'.$cust_group_id.'">'.$cg.'</option>';
                                  }
                                }
                              ?>
                            </select>
                          </td>
                          <td class="text-right">
                            <?php
                              echo $this->Form->input('ProductSpecial.quantity', array(
                                'name' => 'data[ProductSpecial]['.$key.'][quantity]',
                                'placeholder' => 'Quantity',
                                'type' => 'number',
                                'label' => false,
                                'min' => 0,
                                'class' => 'form-control',
                                'value' => $this->data['ProductSpecial'][$key]['quantity']
                              ));
                              echo $this->form->input('ProductSpecial.id', array(
                                        'type' => 'hidden',
                                        'label' => false,
                                        'name' => 'data[ProductSpecial]['.$key.'][id]',
                                        'value' => $this->data['ProductSpecial'][$key]['id']
                              ));
                            ?>
                          </td>
                          <td class="text-right">
                            <?php
                              echo $this->Form->input('ProductSpecial.price', array(
                                'name' => 'data[ProductSpecial]['.$key.'][price]',
                                'placeholder' => 'Price',
                                'type' => 'number',
                                'step' => 'any',
                                'min' => '0.01',
                                'label' => false,
                                'class' => 'form-control',
                                'value' => $this->data['ProductSpecial'][$key]['price']
                              ));
                            ?>
                          </td>
                          <td class="text-left">
                            <input class="form-control datepicker_start" type="text" data-format="YYYY-MM-DD" placeholder="Date Start" name="data[ProductSpecial][<?=$key?>][date_start]" value="<?=date("Y-m-d", strtotime($this->data['ProductSpecial'][$key]['date_start']))?>">
                          </td>
                          <td class="text-left">
                            <input class="form-control datepicker_end" type="text" data-format="YYYY-MM-DD" placeholder="Date End" name="data[ProductSpecial][<?=$key?>][date_end]" value="<?=date("Y-m-d", strtotime($this->data['ProductSpecial'][$key]['date_end']))?>">
                          </td>
                          <td class="text-left">
                            <button type="button" onclick="delete_row(<?=$this->data['ProductSpecial'][$key]['id']?>, 'ProductSpecial');$('#special-row<?=$key?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                          </td>
                       </tr>
                <?php
                    }
                  }
                ?>
                  </tbody>
                  <tfoot>
                   
                    <tr>
                      <td colspan="5"></td>
                      <td class="text-left"><button data-original-title="Add Special" type="button" onclick="addSpecial();" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="tab-pane" id="tab-image">
              <div class="table-responsive">
                <table id="images" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Image</td>
                      <td class="text-right">Sort Order</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php //pr($this->data);
                    if(!empty($this->data['ProductImage'][0])){
                      foreach($this->data['ProductImage'] as $key => $productimage){
                    ?>
                        <tr id="image-row<?=$key?>">
                          <td class="text-left">
                            <span id="image_file"><span id="productimage_area">
                              <?php
                                if(!empty($productimage['image'])){
                                  echo $this->Html->image('../uploads/thumbs/'.$productimage['image'],array('style'=>'width:120px','class'=>'img-thumbnail'));
                              ?>
                              &emsp; <!-- <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure do you want to delete this image?')){delete_productimage(<?=$productimage['id']?>);}else{return false;}"><i class="fa fa-trash"></i></button> -->
                            </span></span>
                            <?php
                              }else{
                            ?>
                                <span id="file<?=$key?>"><input name="data[file][]" id="file" type="file"/><span>
                            <?php
                              }
                            ?>
                          </td>
                          <td class="text-right"><?php
                              echo $this->Form->input('ProductImage.sort_order', array(
                                'name' => 'data[ProductImage]['.$key.'][sort_order]',
                                'placeholder' => 'Sort Order',
                                'value' => 0,
                                'type' => 'number',
                                'min' => '0',
                                'label' => false,
                                'class' => 'form-control',
                                'value' => $productimage['sort_order']
                              ));
  
                            echo $this->form->input('ProductImage.id', array(
                              'type' => 'hidden',
                              'label' => false,
                              'name' => 'data[ProductImage]['.$key.'][id]',
                              'value' => $this->data['ProductImage'][$key]['id']
                            ));

                          ?></td>
                          <td class="text-left"><button type="button" onclick="delete_row(<?=$this->data['ProductImage'][$key]['id']?>, 'ProductImage');$('#image-row<?=$key?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2"></td>
                      <td class="text-left"><button data-original-title="Add Image" type="button" onclick="addImage();" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="tab-pane" id="tab-reward">
              <div class="form-group">
                <label class="col-lg-2 control-label" for="input-points"><span data-original-title="Number of points needed to buy this item. If you don't want this product to be purchased with points leave as 0." data-toggle="tooltip" title="">Points</span></label>
                <div class="col-lg-10">
                  <?php 
                    echo $this->Form->input('Product.point_needed',array(
                      'placeholder' => 'Reward Points Needs',
                      'label' => false,
                      'type' => 'number',
                      'min' => '0',
                      'class' => 'form-control'
                    )); 
                  ?>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Customer Group</td>
                      <td class="text-right">Reward Points</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-left">Default</td>
                      <td class="text-right">
                        <?php 
                          echo $this->Form->input('Product.reward_point',array(
                          'placeholder' => 'Reward Points',
                          'label' => false,
                          'type' => 'number',
                          'min' => '0',
                          'class' => 'form-control'
                          )); 
                        ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
        <?=$this->Form->end();?>
      </div>
    </div>
  </div>
<?php 
$customer_group_pd = "";
foreach($customer_group as $key=>$value){
  $customer_group_pd .= '<option value='.$key.'>'.$value.'</option>';
}

$customer_group_pd = preg_replace( "/\r|\n/", "", $customer_group_pd);

// $customer_group_ps = $this->Form->input('CustomerGroup.customer_group_id', array('name'=>'data[ProductSpecial][customer_group_id][]','type'=>'select','options' => array($customer_group),'label' => false,'class' => 'form-control'));
$customer_group_ps = $customer_group_pd;
?>

<!--Script Multi select chosen box -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script> -->
  <?php
    echo $this->Html->script('chosen/chosen.jquery');
  ?>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
 </script>


<script type="text/javascript">
   /*<!-- Add Attribute  Script-->*/

    function addAttribute() {
    var attribute_row = $('#attribute  tbody  tr').length;

         html  = '<tr id="attribute-row' + attribute_row + '">';
        html += '  <td class="text-left"><div class="input text"><input id="ProductAttributeAttributeName" class="form-control" type="text" maxlength="255" placeholder="Attribute" name="data[ProductAttribute]['+attribute_row+'][attribute_name]"></div></td>';
        html += '  <td class="text-left">';
        html += '<div class="input-group"><span class="input-group-addon"></span><div class="input textarea"><textarea id="ProductAttributeText" class="form-control" cols="30" placeholder="Text" rows="5" name="data[ProductAttribute]['+attribute_row+'][text]"></textarea></div></div>';
        html += '  </td>';
        html += '  <td class="text-left"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';
      
      $('#attribute tbody').append(html);
      attributeautocomplete(attribute_row);
    }


   
/* <!--  Add Discount Script --> */
  
// var discount_row = 0;

function addDiscount() {
  var discount_row = $('#discount tbody  tr').length;

  var customer_group_pd = '<?=$customer_group_pd?>';
    html  = '<tr id="discount-row' + discount_row + '">'; 
    html += '<td class="text-left"><select id="CustomerGroupCustomerGroupId" class="form-control" name="data[ProductDiscount]['+discount_row+'][customer_group_id]">'+ customer_group_pd +'</select></td>';
    html += '  <td class="text-right"><input id="ProductDiscountQuantity" class="form-control" type="number"  min="0" placeholder="Quantity" name="data[ProductDiscount]['+discount_row+'][quantity]"></td>';
    html += '  <td class="text-right"><input id="ProductDiscountPrice" class="form-control" type="number"  min="0.01" step="any" placeholder="Price" name="data[ProductDiscount]['+discount_row+'][price]"></td>';
    html += '  <td class="text-left"><div class="input-group date"><input class="form-control datepicker_start" type="text"  placeholder="Date Start" name="data[ProductDiscount]['+discount_row+'][date_start]"></td>';
    html += '  <td class="text-left"><input class="form-control datepicker_end " type="text"  placeholder="Date End" name="data[ProductDiscount]['+discount_row+'][date_end]"></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';  
 
  $('#discount tbody').append(html);  
  
}

$('body').on('focus',".datepicker_start", function(){
    $(this).datepicker({ dateFormat: 'yy-mm-dd' });
});

$('body').on('focus',".datepicker_end", function(){
    $(this).datepicker({ dateFormat: 'yy-mm-dd' });
});

function addSpecial() {
  var special_row = $('#special  tbody  tr').length;
  var customer_group_ps = '<?=$customer_group_ps?>';
    html  = '<tr id="special-row' + special_row + '">'; 
    html += '  <td class="text-left"><select id="CustomerGroupCustomerGroupId" class="form-control" name="data[ProductSpecial][0][customer_group_id]">'+ customer_group_ps +'</select></td>';   
    html += '  <td class="text-right"><div class="input number"><input id="ProductSpecialQuantity" class="form-control" type="number" min="0" placeholder="Quantity" name="data[ProductSpecial]['+special_row+'][quantity]"></div></td>';
    html += '  <td class="text-right"><div class="input number"><input id="ProductSpecialPrice" class="form-control" type="number" min="0.01" step="any" placeholder="Price" name="data[ProductSpecial]['+special_row+'][price]"></div></td>';
    html += '  <td class="text-left"><input class="form-control datepicker_start" type="text" data-format="YYYY-MM-DD" placeholder="Date Start" name="data[ProductSpecial]['+special_row+'][date_start]"></td>';
    html += '  <td class="text-left"><input class="form-control datepicker_end" type="text" data-format="YYYY-MM-DD" placeholder="Date End" name="data[ProductSpecial]['+special_row+'][date_end]"></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#special-row' + special_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
  
  $('#special tbody').append(html);

  $('.date').datetimepicker({
    pickTime: false
  });
    
}




function addImage() {
  
  var image_row = $('#images  tbody  tr').length;
  
  html  = '<tr id="image-row' + image_row + '">';
  html += '  <td class="text-left"><span id="file' + image_row + '"><input name="data[file][]" id="file" type="file"/><span></td>';
  html += '  <td class="text-right"><div class="input number"><input id="ProductImageSortOrder" class="form-control" type="number" min="0" value="0" placeholder="Sort Order" name="data[ProductImage]['+image_row+'][sort_order]"></div></td>';
  html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  html += '</tr>';
  
  $('#images tbody').append(html);
  
}


function attributeautocomplete(attribute_row) {
  $('input[name=\'product_attribute[' + attribute_row + '][name]\']').autocomplete({
    'source': function(request, response) {
      $.ajax({
        url: 'index.php?route=catalog/attribute/autocomplete&token=e3b2c81726bb1b0dd7faa24ed2378064&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',     
        success: function(json) {
          response($.map(json, function(item) {
            return {
              category: item.attribute_group,
              label: item.name,
              value: item.attribute_id
            }
          }));
        }
      });
    },
    'select': function(item) {
      $('input[name=\'product_attribute[' + attribute_row + '][name]\']').val(item['label']);
      $('input[name=\'product_attribute[' + attribute_row + '][attribute_id]\']').val(item['value']);
    }
  });
}

$('#attribute tbody tr').each(function(index, element) {
  attributeautocomplete(index);
});


    $(function() {
      $( "#dp1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });


function delete_image(){
  // alert("dee");
  $.post(
    "<?php echo Router::fullbaseUrl();?>/admin/products/delete_image",
    { product_id: <?=$this->data['Product']['id']?>},
    function(data){
      // alert('data');
        $('#image_area').remove();
        $('#file').append('<div class="input file"><input id="ProductImage" class="product_upload" type="file" name="data[Product][image]"></div>');
      
    }
  );
}

// function delete_productimage(id){
//   $.post(
//     "<?php echo Router::fullbaseUrl();?>/admin/products/delete_productimage",
//     { id: id},
//     function(data){
//       // alert('data');
//         // $('#productimage_area').remove();
//         // $('#image_file').append('<span id="file<?=$key?>"><input name="data[file][]" id="file" type="file"/><span>');
      
//     }
//   ); 
// }

// function remove_attribute(id){
//   $.post(
//     "<?php echo Router::fullbaseUrl();?>/admin/products/delete_attribute",
//     { id: id},
//     function(data){
      
//     }
//   ); 
// }

// function remove_discount(id){
//   $.post(
//     "<?php echo Router::fullbaseUrl();?>/admin/products/delete_discount",
//     { id: id},
//     function(data){
      
//     }
//   ); 
// }

function delete_row(id,table){
  $.post(
    "<?php echo Router::fullbaseUrl();?>/admin/products/delete_row",
    { id: id, table: table},
    function(data){
      
    }
  ); 
}

</script>