<?php
echo $this->Html->script('ckeditor/ckeditor');
echo $this->Html->script('jquery_upload/script');
echo $this->Html->css('chosen/chosen');
//pr($customer_data); exit;
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
            <button class="btn btn-primary" title="" data-toggle="tooltip" form="form-fcode" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
            <a class="btn btn-default" title="" data-toggle="tooltip" href="/admin/fcodes" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
        <h1>F-Code</h1>
        <ul class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li><a href="/admin/fcodes">Fcodes</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> Add F-Code</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" id="form-fcode" enctype="multipart/form-data" method="post" action="">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-general">General</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-general" class="tab-pane active">
                        <div class="form-group required">
                            <label for="input-name"  class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" id="input-name" placeholder="Details" value="" name="data[Fcode][details]">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label for="input-name" class="col-sm-2 control-label">Customer</label>
                            <div class="col-sm-10">
                                <!--<select required="required" class="form-control" id="input-status" name="data[Fcode][user_id]">
                                    <option selected="selected" value="">Select</option>
                                    <?php
                                    //foreach ($customer_data as $val) { $idnetitiy = ($val['User']['username'])?$val['User']['username']:$val['User']['phone'];
                                    //$sel = ($val['Customer']['fullname'])?$val['Customer']['fullname']:$idnetitiy;
                                    //    //if ($val['Customer']['firstname'] != '') {
                                    //        echo '<option value="' . $val['User']['id'] . '">' . $sel . '</option>';
                                    //    //}
                                    //}
                                    ?>
                                </select>-->
                                <input type="text" class="form-control" required="required" id="input-cstname" placeholder="If name is not available then try with account number" value="" name="data[Fcode][user_id2]">
                                <input type="hidden" class="form-control" required="required" id="input-cstname2" placeholder="Customer Name" value="" name="data[Fcode][user_id]">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label for="input-code" class="col-sm-2 control-label"><span title="" data-toggle="tooltip" data-original-title="The code the customer enters to get the guranteed selling.">Code</span></label>
                            <div class="col-sm-10">
                                <input type="text" required="required" class="form-control" id="input-code" placeholder="Code" value="" name="data[Fcode][code]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-product" class="col-sm-2 control-label"><span title="" data-toggle="tooltip" data-original-title="Choose specific products the fcode will apply to. Select number of products to apply code for entire cart.">Products</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-product" placeholder="Products" value="" name="data[Fcode][product]" autocomplete="off"><ul class="dropdown-menu" style="display: none;"></ul>
                                <div style="height: 150px; overflow: auto;" class="well well-sm" id="fcode-product">                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-total" class="col-sm-2 control-label"><span title="" data-toggle="tooltip" data-original-title="The total amount that must be reached before the fcode is valid.">Total Amount</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-total" readonly="true" placeholder="Total Amount" value="" name="data[Fcode][total]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-date-start" class="col-sm-2 control-label">Date Start</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <?php
                                    echo $this->Form->input('Fcode.date_start', array(
                                        'placeholder' => 'Date Start',
                                        'type' => 'text',
                                        'label' => false,
                                        'class' => 'form-control',
                                        'id' => 'input-date-start'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-date-end" class="col-sm-2 control-label">Date End</label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <?php
                                    echo $this->Form->input('Fcode.date_end', array(
                                        'placeholder' => 'Date End',
                                        'type' => 'text',
                                        'label' => false,
                                        'class' => 'form-control',
                                        'id' => 'input-date-end'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-description1">Additional Info</label>
                            <div class="col-sm-10">
                                <?php
                                echo $this->Form->input('Fcode.additional_info', array(
                                    'rows' => '5',
                                    'label' => false,
                                    'class' => 'form-control ckeditor',
                                    'placeholder' => 'Additional Information'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="input-status" name="data[Fcode][status]">
                                    <option selected="selected" value="4">Enabled</option>
                                    <option value="5">Disabled</option>                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
      $('input[name=\'data[Fcode][user_id2]\']').autocomplete({
        'source': function(request, response) {
            console.log(request.term);
            $.ajax({
                url: '/admin/fcodes/getcustomer/' + request.term,
                dataType: 'json',
                success: function(json) {
                    response($.map(json, function(item) {
                      $('input[name=\'data[Fcode][user_id]\']').val(item.Customer.user_id);
                        return {
                            labels: item.Customer.fullname,
                            label: item.Customer.fullname,
                            valu: item.Customer.user_id,

                        }
                    }));
                }
            });
        },
        'select': function(item, ui) {
          var name = ui.item.labels;
          var valu = ui.item.valu;
          $('input[name=\'data[Fcode][user_id]\']').val(valu);
        }
    });
</script>
<script type="text/javascript"><!--
var oldprices = 0;
    $('input[name=\'data[Fcode][product]\']').autocomplete({
        'source': function(request, response) {
            console.log(request.term);
            $.ajax({
                url: '/admin/fcodes/getproduct/' + request.term,
                dataType: 'json',
                success: function(json) {
                    //console.log(json);
		    var oldprices = 0;
                    response($.map(json, function(item) {
                        return {
                            labels: item.Product.name,
                            label: item.Product.name,
                            valu: item.Product.id,
                            price: item.Product.price
                        }
                    }));
                }
            });
        },
        'select': function(item, ui) {

            var prices = ui.item.price;
            oldprices = parseFloat(prices) + parseFloat(oldprices);

            $('input[name=\'data[Fcode][product]\']').val('');

            $('#input-total').val(parseFloat(oldprices));
//$('#input-product').val('');
            $('#fcode-product' + ui.item.valu).remove();

            $('#fcode-product').append('<div price="'+prices+'" id="fcode-product' + ui.item.valu + '"><i class="fa fa-minus-circle"></i> ' + ui.item.labels + '<input type="hidden" name="data[Fcode][fcode_product][]" value="' + ui.item.valu + '" /><input type="hidden" name="data[Fcode][fcode_product_names][]" value="' + ui.item.labels + '" /></div>');


        }
    });

    $('#fcode-product').delegate('.fa-minus-circle', 'click', function() {
//console.log('Start');
      //console.log($(this).parent('div').attr('price'));
      
      var totalPrice = $('#input-total').val();
      var price = $(this).parent('div').attr('price');
      var minprice = totalPrice - price;
      oldprices = 0;
      //console.log('End '+minprice);
      $('#input-total').val(minprice);
        $(this).parent().remove();
    });

// Category
//$('input[name=\'category\']').autocomplete({
//	'source': function(request, response) {
//		$.ajax({
//			url: 'index.php?route=catalog/category/autocomplete&amp;token=78de69110e85d806c529a070ea8a20bb&amp;filter_name=' +  encodeURIComponent(request),
//			dataType: 'json',
//			success: function(json) {
//				response($.map(json, function(item) {
//					return {
//						label: item['name'],
//						value: item['category_id']
//					}
//				}));
//			}
//		});
//	},
//	'select': function(item) {
//		$('input[name=\'category\']').val('');
//		
//		$('#coupon-category' + item['value']).remove();
//		
//		$('#coupon-category').append('<div id="coupon-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="coupon_category[]" value="' + item['value'] + '" /></div>');
//	}	
//});
//
//$('#coupon-category').delegate('.fa-minus-circle', 'click', function() {
//	$(this).parent().remove();
//});
//--></script>
<script type="text/javascript"><!--
  $('#input-date-start, #input-date-end').datepicker({
        pickTime: false,
        dateFormat: 'yy-mm-dd'
    });

//--></script>
