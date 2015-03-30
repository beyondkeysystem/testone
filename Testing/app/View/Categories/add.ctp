<!-- Adding CK Editor JS File -->
<?php
echo $this->Html->script('ckeditor/ckeditor');
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">

        <button data-original-title="Save" type="submit" form="category_form" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-save"></i></button>
        
        <?php
          echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'categories', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>

        </div>
      <h1>Categories</h1>
      <!-- <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Categories</a></li>
              </ul> -->
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Category</h3>
      </div>

<!-- General Tab Starts Here -->
      <div class="panel-body">
        <?php echo $this->Form->create('Category',array('type' => 'file','class'=>'form-horizontal','id' => 'category_form'));?>
        
          <ul class="nav nav-tabs">
            <li class="active"><?=$this->Html->link('General',array('action'=>'#tab-general'),array('data-toggle'=>'tab'));?><li>
            <li><?=$this->Html->link('Data',array('action'=>'#tab-data'),array('data-toggle'=>'tab'));?></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active in" id="tab-general">
              <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">Category Name</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('name', array(
                          'type' => 'text',
                          'label' => false,
                          'placeholder'=>'Category Name',
                          'id'=>'input-name1',
                          'class'=>'form-control',
                          'required' => 'required'
                        ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description1">Description</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('description',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control ckeditor',
                          'placeholder' => 'Description',
                          'id' => 'input-meta-description1'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('meta_title', array(
                          'type' => 'text',
                          'label' => false,
                          'placeholder'=>'Meta Tag Title',
                          'id'=>'input-meta-title1',
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
                        echo $this->Form->input('meta_description',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control',
                          'placeholder' => 'Meta Tag Description',
                          'id' => 'input-meta-description1'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('meta_keyword',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control',
                          'placeholder' => 'Meta Tag Keywords',
                          'id' => 'input-meta-keyword1'
                          )); 
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- General Tab Ends Here -->

<!-- Data Tab Starts Here -->
            <div class="tab-pane fade" id="tab-data">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-parent">Parent</label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('parent_id',array(
                      'options'=>array($category_dd),
                      'empty'=>'Select Parent',
                      'label' => false,
                      'class' => 'form-control'
                      ));

                      echo $this->Form->input('date_added',array(
                      'type' => 'hidden',
                      'label' => false,
                      'value' => date('Y-m-d H:i:s')
                      ))  
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                  <?php 
                        echo $this->Form->input('image',array(
                          'type' => 'file',
                          'label' => false
                          )); 
                        ?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                <div class="col-sm-10">
                  <?php 
                    echo $this->Form->input('sort_order', array(
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
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                  <?php echo $this->Form->input('status',array(
                      'options'=>array('1' => 'Enable', '0' => 'Disable'),
                      'label' => false,
                      'class' => 'form-control'
                      )) 
                  ?>
                  <!-- <select name="status" id="input-status" class="form-control">
                    <option value="1" selected="selected">Enabled</option>
                    <option value="0">Disabled</option>
                  </select> -->
                </div>
              </div>
            </div>
<!-- Data Tab Starts Here -->

            <!--<div class="tab-pane" id="tab-design">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Stores</td>
                      <td class="text-left">Layout Override</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-left">Default</td>
                      <td class="text-left"><select name="category_layout[0]" class="form-control">
                          <option selected="selected" value=""></option>
                                                                              <option value="6">Account</option>
                                                                                                        <option value="10">Affiliate</option>
                                                                                                        <option value="3">Category</option>
                                                                                                        <option value="7">Checkout</option>
                                                                                                        <option value="8">Contact</option>
                                                                                                        <option value="4">Default</option>
                                                                                                        <option value="1">Home</option>
                                                                                                        <option value="11">Information</option>
                                                                                                        <option value="5">Manufacturer</option>
                                                                                                        <option value="2">Product</option>
                                                                                                        <option value="9">Sitemap</option>
                                                                            </select></td>
                    </tr>
                                      </tbody>
                </table>
              </div> -->
            </div>
          </div>
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
  $('#input-description1').summernote({
  height: 300
});
//--></script> 
  <script type="text/javascript"><!--
$('input[name=\'path\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/category/autocomplete&token=2a8a3ca02d7886cfaf6a0b0e7dec4783&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        json.unshift({
          category_id: 0,
          name: ' --- None --- '
        });

        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['category_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'path\']').val(item['label']);
    $('input[name=\'parent_id\']').val(item['value']);
  }
});
//--></script> 
  <script type="text/javascript"><!--
$('input[name=\'filter\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/filter/autocomplete&token=2a8a3ca02d7886cfaf6a0b0e7dec4783&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['filter_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'filter\']').val('');

    $('#category-filter' + item['value']).remove();

    $('#category-filter').append('<div id="category-filter' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="category_filter[]" value="' + item['value'] + '" /></div>');
  }
});

$('#category-filter').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});
//--></script> 
  <script type="text/javascript"><!--
$('#language a:first').tab('show');
//--></script>