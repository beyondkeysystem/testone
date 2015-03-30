  <!--<script src="Customers_files/bootstrap-datetimepicker.js" type="text/javascript"></script>
<link href="Customers_files/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet" media="screen">
<script type="text/javascript" src="Customers_files/summernote.js"></script>
-->
<?php echo $this->Html->script('Customers_files/less-1.js'); ?>
<?php echo $this->Html->script('Customers_files/summernote.js'); ?>
<?php echo $this->Html->script('Customers_files/moment.js'); ?>
<?php echo $this->Html->script('Customers_files/bootstrap-datetimepicker.js'); ?>

  <div class="page-header">
    <div class="container-fluid">
        <div class="pull-right">
            <button class="btn btn-primary" title="" data-toggle="tooltip" form="form-customer" type="submit" data-original-title="Save"><i class="fa fa-save"></i></button>
            <a class="btn btn-default" title="" data-toggle="tooltip" href="" data-original-title="Cancel"><i class="fa fa-reply"></i></a>
        </div>
        <h1>Customers</h1>
        <ul class="breadcrumb">
            <li><a href="/admin/users/">Home</a></li>
            <li><a href="/admin/customers/">Customers</a></li>
        </ul>
    </div>
</div>
      <div class="container-fluid">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Customer</h3>
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
                                <?php
                                $cntAddress = count($customer["Address"]);
                                for($i=1;$i<=$cntAddress;$i++){ ?>
                                <li class=""><a href="#tab-address<?=$i?>" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$('#address a:first').tab('show'); $('#address a[href=\'#tab-address<?=$i?>\']').parent().remove(); $('#tab-address<?=$i?>').remove();"></i> Address <?=$i?></a></li>
                                <?php }?>
                                <li id="address-add"><a onclick="addAddress();"><i class="fa fa-plus-circle"></i> Add Address</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-10">
                            <div class="tab-content">
                                    <div id="tab-customer" class="tab-pane active">
                                        <div class="form-group">
                                            <label for="input-customer-group" class="col-sm-2 control-label">Customer Group</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->select('customer_group_id',$CustomerGroup,array('class'=>"form-control",'empty'=>false));?>
                                                <?php echo $this->Form->error('customer_group_id');?>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-firstname" class="col-sm-2 control-label">First Name</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->text('firstname',array('class'=>"form-control",'placeholder'=>"First Name",'required'=>false));?>
                                                <?php echo $this->Form->error('firstname');?>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->text('lastname',array('class'=>"form-control",'placeholder'=>"Last Name",'required'=>false));?>
                                                <?php echo $this->Form->error('lastname');?>
                                            </div>
                                        </div>
                                        <!--div class="form-group required">
                                            <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->text('email',array('class'=>"form-control",'placeholder'=>"Email",'required'=>false));?>
                                                <?php echo $this->Form->error('email');?>
                                            </div>
                                        </div-->
                                        <div class="form-group required">
                                            <label for="input-telephone" class="col-sm-2 control-label">Telephone</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->text('telephone',array('class'=>"form-control",'placeholder'=>"Telephone",'required'=>false));?>
                                                <?php echo $this->Form->error('telephone');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-fax" class="col-sm-2 control-label">Fax</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->text('fax',array('class'=>"form-control",'placeholder'=>"Fax"));?>
                                            </div>
                                        </div>
                                        <!--div class="form-group required">
                                            <label for="input-password" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->password('password',array('class'=>"form-control",'value'=>'','placeholder'=>"Password",'required'=>false));?>
                                                <?php echo $this->Form->error('password');?>
                                            </div>
                                        </div-->
                                        <div class="form-group required">
                                            <label for="input-confirm" class="col-sm-2 control-label">Confirm</label>
                                            <div class="col-sm-10">
                                                <?php echo $this->Form->password('cpassword',array('class'=>"form-control",'value'=>'','placeholder'=>"Confirm",'required'=>false));?>
                                                <?php echo $this->Form->error('cpassword');?>
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
                            
                
                <?php $j=1; for($i=0;$i<$cntAddress;$i++){ ?>
                <div class="tab-pane" id="tab-address<?=$j?>">
                      <input name="Address[<?=$i?>][id]" value="<?=$customer['Address'][$i]['id']?>" type="hidden">
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname1">First Name</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][firstname]" value="<?=$customer['Address'][$i]['firstname']?>" placeholder="First Name" id="input-firstname<?=$j?>" class="form-control" type="text">
                                                  </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-lastname1">Last Name</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][lastname]" value="<?=$customer['Address'][$i]['lastname']?>" placeholder="Last Name" id="input-lastname<?=$j?>" class="form-control" type="text">
                                                  </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-company1">Company</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][company]" value="<?=$customer['Address'][$i]['company']?>" placeholder="Company" id="input-company<?=$j?>" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-11">Address 1</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][address_1]" value="<?=$customer['Address'][$i]['address_1']?>" placeholder="Address 1" id="input-address-<?=$j?>" class="form-control" type="text">
                                                  </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-address-21">Address 2</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][address_2]" value="<?=$customer['Address'][$i]['address_1']?>" placeholder="Address 2" id="input-address-<?=$j?>" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-city1">City</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][city]" value="<?=$customer['Address'][$i]['city']?>" placeholder="City" id="input-city<?=$j?>" class="form-control" type="text">
                                                  </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-postcode1">Postcode</label>
                        <div class="col-sm-10">
                          <input name="Address[<?=$i?>][postcode]" value="<?=$customer['Address'][$i]['postcode']?>" placeholder="Postcode" id="input-postcode<?=$j?>" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-country<?=$j?>">Country</label>
                        <div class="col-sm-10">
                          <select name="Address[<?=$i?>][country_id]" id="input-country<?=$j?>" onchange="country(this, '1', '3156');" class="form-control">
                            <option value=""> --- Please Select --- </option>
                            <?php for($k=1;$k<=count($Country);$k++){
                                    if(!empty($Country[$k])){
                                      if($k == $customer['Address'][$i]['country_id'])
                                        $selected = "selected=true";
                                      else
                                        $selected = "";
                            ?>
                                      <option <?=$selected?> value="<?=$k?>"><?=$Country[$k]?></option>
                            <?php
                                    }
                                  }
                            ?>
                          </select> 
                        </div>
                      </div>
                      <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-zone1">Region / State</label>
                        <div class="col-sm-10">
                          <select name="Address[<?=$i?>][zone_id]" id="input-zone<?=$j?>" class="form-control"><option value=""> --- Please Select --- </option><option value="3135">Chang-hua</option><option value="3154">Chi-lung</option><option value="3136">Chia-i</option><option value="3153">Chia-i city</option><option value="3137">Hsin-chu</option><option value="3155">Hsin-chu</option><option value="3138">Hua-lien</option><option value="3139">I-lan</option><option value="3158">Kao-hsiung city</option><option value="3140">Kao-hsiung county</option><option value="3141">Kin-men</option><option value="3142">Lien-chiang</option><option value="3143">Miao-li</option><option value="3144">Nan-t'ou</option><option value="3145">P'eng-hu</option><option value="3146">P'ing-tung</option><option value="3156" selected="selected">T'ai-chung</option><option value="3147">T'ai-chung</option><option value="3148">T'ai-nan</option><option value="3157">T'ai-nan</option><option value="3159">T'ai-pei city</option><option value="3149">T'ai-pei county</option><option value="3150">T'ai-tung</option><option value="3151">T'ao-yuan</option><option value="3152">Yun-lin</option></select>
                                                  </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Default Address</label>
                        <div class="col-sm-10">
                          <label class="radio">
                            <input name="Address[<?=$i?>][default]" type="radio">
                          </label>
                        </div>
                      </div>
                    </div>
                <?php $j++; }?>
                          </div>
                        </div> <!-- col-sm-10 line 47 -->
            </div> </div>
          </div>
        </div>
      </div>  
    </div>
  <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
<?php
$country = $this->Form->input('Address.country_id', array('name'=>'data[Address][country_id][]','type'=>'select','options' => array($Country),'label' => false,'class' => 'form-control','onchange'=>"country(this, address_row, '0');"));
$country = preg_replace( "/\r|\n/", "", $country);
$cntAddressPlusOne = $cntAddress + 1;
?>
<script type="text/javascript">
            var address_row = <?=$cntAddressPlusOne?>;
            //var index = address_row;
            function addAddress() {              
            html = '<div class="tab-pane" id="tab-address' + address_row + '">';
                    html += '  <input type="hidden" name="Address[' + address_row + '][address_id]" value="" />';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-firstname' + address_row + '">First Name</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][firstname]" value="" placeholder="First Name" id="input-firstname' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-lastname' + address_row + '">Last Name</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][lastname]" value="" placeholder="Last Name" id="input-lastname' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-company' + address_row + '">Company</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][company]" value="" placeholder="Company" id="input-company' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-address-1' + address_row + '">Address 1</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][address_1]" value="" placeholder="Address 1" id="input-address-1' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group">';
                    html += '    <label class="col-sm-2 control-label" for="input-address-2' + address_row + '">Address 2</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][address_2]" value="" placeholder="Address 2" id="input-address-2' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-city' + address_row + '">City</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][city]" value="" placeholder="City" id="input-city' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-postcode' + address_row + '">Postcode</label>';
                    html += '    <div class="col-sm-10"><input type="text" name="Address[' + address_row + '][postcode]" value="" placeholder="Postcode" id="input-postcode' + address_row + '" class="form-control" /></div>';
                    html += '  </div>';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-country' + address_row + '">Country</label>';
                    html += '    <div class="col-sm-10">';
                    html += '<?=$country?>';
                    html += '</div>';
                    html += '  </div>';
                    html += '  <div class="form-group required">';
                    html += '    <label class="col-sm-2 control-label" for="input-zone' + address_row + '">Region / State</label>';
                    html += '    <div class="col-sm-10"><select name="Address[' + address_row + '][zone_id]" id="input-zone' + address_row + '" class="form-control"><option value=""> --- None --- </option></select></div>';
                    html += '  </div>';
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

</script>