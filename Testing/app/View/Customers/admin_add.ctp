  <!--<script src="Customers_files/bootstrap-datetimepicker.js" type="text/javascript"></script>
<link href="Customers_files/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet" media="screen">
<script type="text/javascript" src="Customers_files/summernote.js"></script>
-->
<?php echo $this->Html->script('Customers_files/less-1.js'); ?>
<?php echo $this->Html->script('Customers_files/summernote.js'); ?>
<?php echo $this->Html->script('Customers_files/moment.js'); ?>
<?php echo $this->Html->script('Customers_files/bootstrap-datetimepicker.js'); ?>
<style>
    .errorcls{display: none;color: red;}
</style>
  <div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
            <button class="btn btn-primary" title="" data-toggle="tooltip" form="form-customer" onclick="validationform()" type="button" data-original-title="Save"><i class="fa fa-save"></i></button>
            <a class="btn btn-default" title="" data-toggle="tooltip" href="" data-original-title="Cancel"><i class="fa fa-reply"></i></a>
        </div>
        <h1>Customers</h1>
        <ul class="breadcrumb">
            <li><a href="/admin/">Home</a></li>
            <li><a href="/admin/customers/">Customers</a></li>
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Customer</h3>
        </div>
        <div class="panel-body">
                <?php echo $this->Form->create('Customer',array('class'=>"form-horizontal", 'id'=>"form-customer"));?>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-general">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-general" class="tab-pane active">
                        <div class="row">
                            <div class="col-sm-2">
                                <ul id="address" class="nav nav-pills nav-stacked">
                                    <li class="active"><a data-toggle="tab" href="#tab-customer">General</a></li>
                                    <li id="address-add"><a onclick="addAddress();"><i class="fa fa-plus-circle"></i> Add Address</a></li>
                                    <!--<li class=""><a data-toggle="tab" href="#tab-address1"><i onclick="$('#address a:first').tab('show'); $('a[href=\'#tab-address1\']').parent().remove(); $('#tab-address1').remove();" class="fa fa-minus-circle"></i> Address 1</a></li><li class=""><a data-toggle="tab" href="#tab-address2"><i onclick="$('#address a:first').tab('show'); $('a[href=\'#tab-address2\']').parent().remove(); $('#tab-address2').remove();" class="fa fa-minus-circle"></i> Address 2</a></li><li class=""><a data-toggle="tab" href="#tab-address3"><i onclick="$('#address a:first').tab('show'); $('a[href=\'#tab-address3\']').parent().remove(); $('#tab-address3').remove();" class="fa fa-minus-circle"></i> Address 3</a></li><li class=""><a data-toggle="tab" href="#tab-address4"><i onclick="$('#address a:first').tab('show'); $('a[href=\'#tab-address4\']').parent().remove(); $('#tab-address4').remove();" class="fa fa-minus-circle"></i> Address 4</a></li><li class=""><a data-toggle="tab" href="#tab-address5"><i onclick="$('#address a:first').tab('show'); $('a[href=\'#tab-address5\']').parent().remove(); $('#tab-address5').remove();" class="fa fa-minus-circle"></i> Address 5</a></li><li id="address-add"><a onclick="addAddress();"><i class="fa fa-plus-circle"></i> Add Address</a></li>-->
                                </ul>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    <!--<div id="tab-address5" class="tab-pane">  
                                        <input type="hidden" value="" name="address[5][address_id]">  <div class="form-group required">    <label for="input-firstname5" class="col-sm-2 control-label">First Name</label>    <div class="col-sm-10"><input type="text" class="form-control" id="input-firstname5" placeholder="First Name" value="" name="address[5][firstname]"></div>  </div>  <div class="form-group required">    <label for="input-lastname5" class="col-sm-2 control-label">Last Name</label>    <div class="col-sm-10"><input type="text" class="form-control" id="input-lastname5" placeholder="Last Name" value="" name="address[5][lastname]"></div>  </div>
                                        <div class="form-group">    <label for="input-company5" class="col-sm-2 control-label">Company</label>    <div class="col-sm-10"><input type="text" class="form-control" id="input-company5" placeholder="Company" value="" name="address[5][company]"></div>  </div>  <div class="form-group required">    <label for="input-address-15" class="col-sm-2 control-label">Address 1</label>    <div class="col-sm-10"><input type="text" class="form-control" id="input-address-15" placeholder="Address 1" value="" name="address[5][address_1]"></div>  </div>  <div class="form-group">    <label for="input-address-25" class="col-sm-2 control-label">Address 2</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" id="input-address-25" placeholder="Address 2" value="" name="address[5][address_2]"></div>
                                        </div>
                                        <div class="form-group required">    <label for="input-city5" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" id="input-city5" placeholder="City" value="" name="address[5][city]"></div>  </div>  <div class="form-group required">    <label for="input-postcode5" class="col-sm-2 control-label">Postcode</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" id="input-postcode5" placeholder="Postcode" value="" name="address[5][postcode]"></div>  </div>
                                        <div class="form-group required">    <label for="input-country5" class="col-sm-2 control-label">Country</label>    
                                        <div class="col-sm-10"> 
                                          <?php
                                          echo $this->Form->select('Address.country_id',$Country,array('class'=>"form-control",'empty'=>false));
                                          //$country = $this->Form->input('Address.country_id', array('name'=>'data[Address][country_id][]','type'=>'select','options' => array($Country),'label' => false,'class' => 'form-control'));
                                          //$country = preg_replace( "/\r|\n/", "", $country);
                                          ?>
                                        </div>                                        
                                        </div>
                                        
                                        <div class="form-group required">    <label for="input-zone1" class="col-sm-2 control-label">Region / State</label>    <div class="col-sm-10"><select class="form-control" id="input-zone1" name="address[1][zone_id]"><option value=""> --- None --- </option></select></div>  </div>  <div class="form-group">    <label class="col-sm-2 control-label">Default Address</label>    <div class="col-sm-10"><label class="radio"><input type="radio" value="1" name="address[1][default]"></label></div>  </div></div>-->
                                        <div id="tab-customer" class="tab-pane active">
                                            <div class="form-group">
                                                <label for="input-customer-group" class="col-sm-2 control-label">Customer Group</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->select('customer_group_id',$CustomerGroup,array('class'=>"form-control",'empty'=>false));?>
                                                    <?php echo $this->Form->error('customer_group_id');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-firstname" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->text('firstname',array('class'=>"form-control",'placeholder'=>"First Name",'required'=>false));?>
                                                    <?php echo $this->Form->error('firstname');?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->text('lastname',array('class'=>"form-control",'placeholder'=>"Last Name",'required'=>false));?>
                                                    <?php echo $this->Form->error('lastname');?>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->text('email',array('class'=>"form-control",'placeholder'=>"Email",'required'=>false));?>
                                                    <?php echo $this->Form->error('email');?>
                                                    <div id="username" class="errorcls"></div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-telephone" class="col-sm-2 control-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->text('telephone',array('class'=>"form-control",'placeholder'=>"Telephone",'required'=>false));?>
                                                    <?php echo $this->Form->error('telephone');?>
                                                    <div id="telephone" class="errorcls"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-fax" class="col-sm-2 control-label">Fax</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->text('fax',array('class'=>"form-control",'placeholder'=>"Fax"));?>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-password" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->password('password',array('class'=>"form-control",'value'=>'','placeholder'=>"Password",'required'=>false));?>
                                                    <?php echo $this->Form->error('password');?>
                                                    <div id="cspassword" class="errorcls"></div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-confirm" class="col-sm-2 control-label">Confirm</label>
                                                <div class="col-sm-10">
                                                    <?php echo $this->Form->password('cpassword',array('class'=>"form-control",'value'=>'','placeholder'=>"Confirm",'required'=>false));?>
                                                    <?php echo $this->Form->error('cpassword');?>
                                                    <div id="recspassword" class="errorcls"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-newsletter" class="col-sm-2 control-label">Newsletter</label>
                                                <div class="col-sm-10">
                                                    <?php $this->request->data['Customer']['newsletter'] = 0;?>
                                                    <?php echo $this->Form->select('newsletter',array('1'=>'Enabled','0'=>'Disabled'),array('class'=>"form-control",'empty'=>false));?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-status" class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <?php $this->request->data['Customer']['status'] = 1;?>
                                                    <?php echo $this->Form->select('status',array('1'=>'Enabled','0'=>'Disabled'),array('class'=>"form-control",'empty'=>false));?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-safe" class="col-sm-2 control-label">Safe</label>
                                                <div class="col-sm-10">
                                                    <?php $this->request->data['Customer']['status'] = 1;?>
                                                    <?php echo $this->Form->select('status',array('1'=>'Enabled','0'=>'Disabled'),array('class'=>"form-control",'empty'=>false));?>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-ip" class="tab-pane">
                        <div id="ip"><div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-left">IP</td>
                                            <td class="text-right">Total Accounts</td>
                                            <td class="text-left">Date Added</td>
                                            <td class="text-right">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="text-center">No results!</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-left"></div>
                                <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
                            </div></div>
                    </div>
                </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
<?php
$country = $this->Form->input('Address.country_id', array('name'=>'data[Address][country_id][]','type'=>'select','options' => array($Country),'label' => false,'class' => 'form-control','onchange'=>"country(this, address_row, '0');"));
$country = preg_replace( "/\r|\n/", "", $country);
?>
<script type="text/javascript">
        /*    $('select[name=\'customer_group_id\']').on('change', function() {
    $.ajax({
    url: 'index.php?route=sale/customer/customfield&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_group_id=' + this.value,
            dataType: 'json',
            success: function(json) {
              $('.custom-field').hide();
                $('.custom-field').removeClass('required');
                for (i = 0; i < json.length; i++) {
                  custom_field = json[i];
                  $('.custom-field' + custom_field['custom_field_id']).show();
                if (custom_field['required']) {
                  $('.custom-field' + custom_field['custom_field_id']).addClass('required');
                }
              }
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
    });
            });
            $('select[name=\'customer_group_id\']').trigger('change');*/
</script> 
<script type="text/javascript">
            var address_row = 1;
            //var index = address_row;
            function addAddress() {              
            html = '<div class="tab-pane" id="tab-address' + address_row + '">';
                    html += '  <input type="hidden" name="Address[' + address_row + '][address_id]" value="" />';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-firstname' + address_row + '">First Name</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][firstname]" value="" placeholder="First Name" id="input-firstname' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-lastname' + address_row + '">Last Name</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][lastname]" value="" placeholder="Last Name" id="input-lastname' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-company' + address_row + '">Company</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][company]" value="" placeholder="Company" id="input-company' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-address-1' + address_row + '">Address 1</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][address_1]" value="" placeholder="Address 1" id="input-address-1' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-address-2' + address_row + '">Address 2</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][address_2]" value="" placeholder="Address 2" id="input-address-2' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-city' + address_row + '">City</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][city]" value="" placeholder="City" id="input-city' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-postcode' + address_row + '">Postcode</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][postcode]" value="" placeholder="Postcode" id="input-postcode' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-zone' + address_row + '">State</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][state]" value="" placeholder="State" id="input-state' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    
                   /* html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-zone' + address_row + '">Region / State</label>';
                    html += '    <div class="col-sm-10"><select name="Address[' + address_row + '][zone_id]" id="input-zone' + address_row + '" class="form-control"><option value=""> --- None --- </option></select></div>';
                    html += '  </div>';*/
                    // Custom Fields

                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label">Default Address</label>';
                    html += '    <div class="col-sm-10"><label class="radio"><input type="radio" name="Address[' + address_row + '][default]" value="1" /></label></div>';
                    html += '  </div>';
                    html += '</div>';
                    $('#tab-general .tab-content').prepend(html); 
                    //$('select[name=\'customer_group_id\']').trigger('change');
                    $('select[name=\'Address[' + address_row + '][country_id]\']').trigger('change');
                    $('#address-add').before('<li><a href="#tab-address' + address_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$(\'#address a:first\').tab(\'show\'); $(\'a[href=\\\'#tab-address' + address_row + '\\\']\').parent().remove(); $(\'#tab-address' + address_row + '\').remove();"></i> Address ' + address_row + '</a></li>');
                    $('#address a[href=\'#tab-address' + address_row + '\']').tab('show');
                    $('.date').datetimepicker({
            pickTime: false
            });
                    $('.datetime').datetimepicker({
                      pickDate: true,
                    pickTime: true
            });
                    $('.time').datetimepicker({
            pickDate: false
            });
                    address_row++;
                    }
</script> 
<script type="text/javascript">
            function country(element, indexw) {
              var index = parseInt(indexw) - 1;
              $('#input-zone'+ index).empty();
              $('#input-zone'+ index).append($('<option>').text(" --- None --- ").attr('value', ""));
              console.log(index);
              console.log(element);
            if (element.value != '') {
            $.ajax({
            url: 'country/' + element.value,
                    dataType: 'json',
                    beforeSend: function() {
                    $('select[name=\'address[' + index + '][country_id]\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
                    },
                    complete: function() {
                    $('.fa-spin').remove();
                    },
                    success: function(json) {
                        $.each(json, function(zone_id,zone){
                            $('#input-zone'+ index).append($('<option>').text(zone).attr('value',zone_id));
                        });
                    //if (json['postcode_required'] == '1') {
                    //$('input[name=\'address[' + index + '][postcode]\']').parent().addClass('required');
                    //} else {
                    //$('input[name=\'address[' + index + '][postcode]\']').parent().parent().removeClass('required');
                    //}
                    //
                    //html = '<option value=""> --- Please Select --- </option>';
                    //        if (json['zone']) {
                    //for (i = 0; i < json['zone'].length; i++) {
                    //html += '<option value="' + json['zone'][i]['zone_id'] + '"';
                    //        if (json['zone'][i]['zone_id'] == zone_id) {
                    //html += ' selected="selected"';
                    //}
                    //
                    //html += '>' + json['zone'][i]['name'] + '</option>';
                    //}
                    //} else {
                    //html += '<option value="0"> --- None --- </option>';
                    //}
                    //
                    //$('select[name=\'address[' + index + '][zone_id]\']').html(html);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
//                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                      console.log(xhr.statusText);
                    }
            });
            }
            }

    $('select[name$=\'[country_id]\']').trigger('change');

            $('#history').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();
            $('#history').load(this.href);
            });
            $('#history').load('index.php?route=sale/customer/history&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0');
            $('#button-history').on('click', function(e) {
    e.preventDefault();
            $.ajax({
            url: 'index.php?route=sale/customer/history&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0',
                    type: 'post',
                    dataType: 'html',
                    data: 'comment=' + encodeURIComponent($('#tab-history textarea[name=\'comment\']').val()),
                    beforeSend: function() {
                    $('#button-history').button('loading');
                    },
                    complete: function() {
                    $('#button-history').button('reset');
                    },
                    success: function(html) {
                    $('.alert').remove();
                            $('#history').html(html);
                            $('#tab-history textarea[name=\'comment\']').val('');
                    }
            });
            });

            $('#transaction').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();
            $('#transaction').load(this.href);
            });
            $('#transaction').load('index.php?route=sale/customer/transaction&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0');
            $('#button-transaction').on('click', function(e) {
    e.preventDefault();
            $.ajax({
            url: 'index.php?route=sale/customer/transaction&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0',
                    type: 'post',
                    dataType: 'html',
                    data: 'description=' + encodeURIComponent($('#tab-transaction input[name=\'description\']').val()) + '&amp;amount=' + encodeURIComponent($('#tab-transaction input[name=\'amount\']').val()),
                    beforeSend: function() {
                    $('#button-transaction').button('loading');
                    },
                    complete: function() {
                    $('#button-transaction').button('reset');
                    },
                    success: function(html) {
                    $('.alert').remove();
                            $('#transaction').html(html);
                            $('#tab-transaction input[name=\'amount\']').val('');
                            $('#tab-transaction input[name=\'description\']').val('');
                    }
            });
            });

            $('#reward').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();
            $('#reward').load(this.href);
            });
            $('#reward').load('index.php?route=sale/customer/reward&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0');
            $('#button-reward').on('click', function(e) {
    e.preventDefault();
            $.ajax({
            url: 'index.php?route=sale/customer/reward&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0',
                    type: 'post',
                    dataType: 'html',
                    data: 'description=' + encodeURIComponent($('#tab-reward input[name=\'description\']').val()) + '&amp;points=' + encodeURIComponent($('#tab-reward input[name=\'points\']').val()),
                    beforeSend: function() {
                    $('#button-reward').button('loading');
                    },
                    complete: function() {
                    $('#button-reward').button('reset');
                    },
                    success: function(html) {
                    $('.alert').remove();
                            $('#reward').html(html);
                            $('#tab-reward input[name=\'points\']').val('');
                            $('#tab-reward input[name=\'description\']').val('');
                    }
            });
            });
            $('#ip').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();
            $('#ip').load(this.href);
            });
            $('#ip').load('index.php?route=sale/customer/ip&amp;token=cb96b5e340ecae9892ab63fb531a943c&amp;customer_id=0');
            $('body').delegate('.button-ban-add', 'click', function() {
    var element = this;
            $.ajax({
            url: 'index.php?route=sale/customer/addbanip&amp;token=cb96b5e340ecae9892ab63fb531a943c',
                    type: 'post',
                    dataType: 'json',
                    data: 'ip=' + encodeURIComponent(this.value),
                    beforeSend: function() {
                    $(element).button('loading');
                    },
                    complete: function() {
                    $(element).button('reset');
                    },
                    success: function(json) {
                    $('.alert').remove();
                            if (json['error']) {
                    $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
                            $('.alert').fadeIn('slow');
                    }

                    if (json['success']) {
                    $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
                            $(element).replaceWith('<button type="button" value="' + element.value + '" class="btn btn-danger btn-xs button-ban-remove"><i class="fa fa-minus-circle"></i> Remove Ban IP</button>');
                    }
                    }
            });
            });
            $('body').delegate('.button-ban-remove', 'click', function() {
    var element = this;
            $.ajax({
            url: 'index.php?route=sale/customer/removebanip&amp;token=cb96b5e340ecae9892ab63fb531a943c',
                    type: 'post',
                    dataType: 'json',
                    data: 'ip=' + encodeURIComponent(this.value),
                    beforeSend: function() {
                    $(element).button('loading');
                    },
                    complete: function() {
                    $(element).button('reset');
                    },
                    success: function(json) {
                    $('.alert').remove();
                            if (json['error']) {
                    $('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
                    }

                    if (json['success']) {
                    $('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
                            $(element).replaceWith('<button type="button" value="' + element.value + '" class="btn btn-success btn-xs button-ban-add"><i class="fa fa-plus-circle"></i> Add Ban IP</button>');
                    }
                    }
            });
            });
            $('#content').delegate('button[id^=\'button-custom-field\'], button[id^=\'button-address\']', 'click', function() {
    var node = this;
            $('#form-upload').remove();
            $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');
            $('#form-upload input[name=\'file\']').trigger('click');
            $('#form-upload input[name=\'file\']').on('change', function() {
    $.ajax({
    url: 'index.php?route=tool/upload/upload&amp;token=cb96b5e340ecae9892ab63fb531a943c',
            type: 'post',
            dataType: 'json',
            data: new FormData($(this).parent()[0]),
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
            $(node).button('loading');
            },
            complete: function() {
            $(node).button('reset');
            },
            success: function(json) {
            $('.text-danger').remove();
                    if (json['error']) {
            $(node).parent().find('input[type=\'hidden\']').after('<div class="text-danger">' + json['error'] + '</div>');
            }

            if (json['success']) {
            alert(json['success']);
            }

            if (json['code']) {
            $(node).parent().find('input[type=\'hidden\']').attr('value', json['code']);
            }
            },
            error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
    });
    });
            });
            $('.date').datetimepicker({
    pickTime: false
            });
            $('.datetime').datetimepicker({
    pickDate: true,
            pickTime: true
            });
            $('.time').datetimepicker({
    pickDate: false
            });
            

    function validationform(){
        $.ajax({
            method: "POST",
            url: "/customers/ajaxvalidation",
            data: $('#form-customer').serialize()
        })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            console.log(msg);
            if(msg == '1'){
                $('#form-customer').submit();
            }else{
                var obj = jQuery.parseJSON(msg);
                if(obj.username == '1'){
                    $('#username').hide();
                }else{
                    $('#username').show();
                    $('#username').html(obj.username);
                }
                
                if(obj.phone == '1'){
                    $('#telephone').hide();
                }else{
                    $('#telephone').show();
                    $('#telephone').html(obj.phone);
                }
                
                if(obj.cspassword == '1'){
                    $('#cspassword').hide();
                }else{
                    $('#cspassword').show();
                    $('#cspassword').html(obj.cspassword);
                }
                
                if(obj.csrepassword == '1'){
                    $('#recspassword').hide();
                }else{
                    $('#recspassword').show();
                    $('#recspassword').html(obj.csrepassword);
                }
                
            }
            
            //alert(msg.username)
        });
    }

</script>