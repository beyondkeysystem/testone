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
        <button data-original-title="Send" id="button-send" data-loading-text="Loading..." data-toggle="tooltip" title="" class="btn btn-primary" form="form-mail" type="submit"><i class="fa fa-envelope"></i></button>
        <?php
          echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'users', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>
      </div>
      <h1>Mail</h1>
      
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-envelope"></i> Mail</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" id="form-mail" method="post" acation="">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-store">From</label>
            <div class="col-sm-10">
              <select name="store_id" id="input-store" class="form-control">
                <option selected="selected" value="0">info@harimau.com</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-to">To</label>
            <div class="col-sm-10">
              <select name="to" id="input-to" class="form-control">
                <!-- <option value="customer_group">Customer Group</option> -->
                <option selected="selected" value="customer">Customers</option>
                <!-- <option value="affiliate_all">All Affiliates</option>
                <option value="affiliate">Affiliates</option>
                <option value="product">Products</option> -->
              </select>
            </div>
          </div>
          <div style="display: none;" class="form-group to" id="to-customer-group">
            <label class="col-sm-2 control-label" for="input-customer-group">Customer Group</label>
            <div class="col-sm-10">
              <select name="customer_group_id" id="input-customer-group" class="form-control">
                <option selected="selected" value="1">Default</option>
              </select>
            </div>
          </div>
          <div style="display: block;" class="form-group to" id="to-customer">
            <label class="col-sm-2 control-label" for="input-customer"><span data-original-title="Autocomplete" data-toggle="tooltip" title="">Customer</span></label>
            <div class="col-sm-10">

                    <select id="CustomerEmail" class="chosen-select-width form-control chosen-select" required="required" multiple="multiple" name="email[]" >
                      <?php
                        foreach($customer as $email => $name){
                      ?>
                          <option selected value="<?=$email?>"><?=$name?></option>        
                      <?php
                        }
                      ?>
                    </select>
                    
              <!-- <input type="checkbox" id="select_all" value="select" name="select_all"/> Select all -->
              
            </div>
          </div>
          <div style="display: none;" class="form-group to" id="to-affiliate">
            <label class="col-sm-2 control-label" for="input-affiliate"><span data-original-title="Autocomplete" data-toggle="tooltip" title="">Affiliate</span></label>
            <div class="col-sm-10">
              <input autocomplete="off" name="affiliates" placeholder="Affiliate" id="input-affiliate" class="form-control" type="text"><ul class="dropdown-menu"></ul>
              <div id="affiliate" class="well well-sm" style="height: 150px; overflow: auto;"></div>
            </div>
          </div>
          <div style="display: none;" class="form-group to" id="to-product">
            <label class="col-sm-2 control-label" for="input-product"><span data-original-title="Send only to customers who have ordered products in the list. (Autocomplete)" data-toggle="tooltip" title="">Products</span></label>
            <div class="col-sm-10">
              <input autocomplete="off" name="products" placeholder="Products" id="input-product" class="form-control" type="text"><ul class="dropdown-menu"></ul>
              <div id="product" class="well well-sm" style="height: 150px; overflow: auto;"></div>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-subject">Subject</label>
            <div class="col-sm-10">
              <input name="subject" placeholder="Subject" id="input-subject" class="form-control" type="text">
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-message">Message</label>
            <div class="col-sm-10">

              <?php 
                echo $this->Form->input('message',array(
                  'name' => 'message',
                  'rows' => '5',
                  'label' => false,
                  'class' => 'form-control ckeditor',
                  )); 
                ?>


              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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

  <script type="text/javascript"><!--
$('#input-message').summernote({
  height: 300
});
//--></script> 
  <script type="text/javascript"><!-- 
$('select[name=\'to\']').on('change', function() {
  $('.to').hide();
  
  $('#to-' + this.value.replace('_', '-')).show();
});

$('select[name=\'to\']').trigger('change');
//--></script> 
  <script type="text/javascript"><!--
// Customers
$('input[name=\'customers\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=sale/customer/autocomplete&token=80529d9685c0bd1831578a8cb19b9139&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',     
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['customer_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'customers\']').val('');
    
    $('#customer' + item['value']).remove();
    
    $('#customer').append('<div id="customer' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="customer[]" value="' + item['value'] + '" /></div>'); 
  } 
});

$('#customer').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});

// Affiliates
$('input[name=\'affiliates\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=sale/customer/autocomplete&token=80529d9685c0bd1831578a8cb19b9139&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',     
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['customer_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'affiliates\']').val('');
    
    $('#affiliate' + item['value']).remove();
    
    $('#affiliate').append('<div id="affiliate' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="affiliate[]" value="' + item['value'] + '" /></div>');  
  } 
});

$('#affiliate').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});

// Products
$('input[name=\'products\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/product/autocomplete&token=80529d9685c0bd1831578a8cb19b9139&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',     
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['product_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'products\']').val('');
    
    $('#product' + item['value']).remove();
    
    $('#product').append('<div id="product' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product[]" value="' + item['value'] + '" /></div>');  
  } 
});

$('#product').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});

function send(url) {
  $.ajax({
    url: url,
    type: 'post',
    data: $('#content select, #content input, #content textarea'),    
    dataType: 'json',
    beforeSend: function() {
      $('#button-send').button('loading');  
    },
    complete: function() {
      $('#button-send').button('reset');
    },        
    success: function(json) {
      $('.alert, .text-danger').remove();
      
      if (json['error']) {
        if (json['error']['warning']) {
          $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '</div>');
        }
        
        if (json['error']['subject']) {
          $('input[name=\'subject\']').after('<div class="text-danger">' + json['error']['subject'] + '</div>');
        } 
        
        if (json['error']['message']) {
          $('textarea[name=\'message\']').parent().append('<div class="text-danger">' + json['error']['message'] + '</div>');
        }                 
      }     
      
      if (json['next']) {
        if (json['success']) {
          $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  ' + json['success'] + '</div>');
          
          send(json['next']);
        }   
      } else {
        if (json['success']) {
          $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
        }         
      }       
    }
  });
}
//--></script>

</div>