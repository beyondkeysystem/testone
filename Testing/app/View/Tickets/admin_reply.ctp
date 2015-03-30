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
        <button data-original-title="Save" type="submit" form="form-ticket" data-toggle="tooltip" title="" class="btn btn-primary" name="save"><i class="fa fa-save"></i></button>
        <?php
          echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'tickets', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>
      </div>
      <h1>Tickets</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Reply Tickets</h3>
      </div>
      <div class="panel-body">

        <!-- <form action="http://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;token=e3b2c81726bb1b0dd7faa24ed2378064&amp;product_id=42" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal"> -->
        <?php
          echo $this->Form->create('Ticket',array('type' => 'file', 'class' => 'form-horizontal', 'id' => 'form-ticket'));
        ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  
                  <div class="badge badge-important ">
                      Ticket Info <?php //pr($this->data); ?>
                    </div>
                    <p></p>
                    
                    <table class="table table-bordered table-condensed table-striped">
                    <tbody>
                  <tr>
                    <td>Customer Name</td>
                    <td><?=$this->data['Customer']['name']?></td>
                  </tr>
                  <tr>
                    <td>Customer Email</td>
                    <td><?=$this->data['Customer']['email']?></td>
                  </tr>
                  <tr>
                    <td>Ticket Status</td>
                    <td><?=$this->data['TicketStatus']['status']?></td>
                  </tr>
                  <tr>
                    <td>Created On</td>
                    <td><?=$this->data['Ticket']['created']?></td>
                  </tr>
                  <tr>
                    <td>Department Assigned</td>
                    <td><?=$this->data['TicketDepartment']['dept_name']?></td>
                  </tr>
                  </tbody>
                  </table>  
                </div>
                <div class="well">
                      <div class="badge badge-important">Client - <?=$this->data['Customer']['email']?></div>
                      <div class="badge"><?=$this->data['Ticket']['created']?></div>
                      <br><br>
                      <pre>Subject: <?=$this->data['Ticket']['subject']?></pre>
                      <?=$this->data['Ticket']['body']?>
                    </div>
                <?php
                  // $ticket_Reply = array_reverse($this->data['TicketReply']);
                  // pr($ticket_Reply);
                  foreach($this->data['TicketReply'] as $ticket_reply){
                    if($ticket_reply['replier'] == 'client'){
                ?>
                    <div class="well">
                      <div class="badge badge-important">Client - <?=$this->data['Customer']['email']?></div>
                      <div class="badge"><?=$ticket_reply['created']?></div>
                      <br><br>
                      <?=$ticket_reply['body']?>
                    </div>
                <?php
                    }else{
                ?>
                      <div class="well" style="background-color:white;">
                        <div class="label label-success"><?=$this->data['TicketDepartment']['dept_name']?></div>
                        <div class="label label-success"><?=$ticket_reply['created']?></div>
                       <br><br>
                        <?=$ticket_reply['body']?> 
                      </div>

                <?php
                    }
                  }
                ?>


                  <!-- <div class="form-group"> -->
                    <!-- <label class="col-sm-2 control-label" for="input-description1">Reply</label> -->
                    <br/><p>Post a Reply </p>
                    <?php 
                        echo $this->Form->input('TicketReply.body',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control ckeditor',
                          'placeholder' => 'Post a Reply'
                          )); 
                        ?>
                    <br/>
                    <?php 
                        echo $this->Form->input('Ticket.ticket_status_id',array(
                          'options' => array($ticketstatus),
                          'label' => false,
                          'class' => 'form-control',
                          )); 

                        echo $this->Form->input('Ticket.customer_id',array(
                          'type' => 'hidden',
                          'label' => false,
                          'class' => 'form-control'
                          ));
                        echo $this->Form->input('Ticket.id',array(
                          'type' => 'hidden',
                          'label' => false,
                          'class' => 'form-control'
                          )); 
                    ?>

                    <br/><br/>

                   <!--  <div class="col-sm-10">
                      
                    </div>
                  </div> -->
                </div>
           
          </div>
        <?=$this->Form->end();?>
      </div>
    </div>
  </div>


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
    var attribute_row = $('#attribute  tbody  tr').length;
    function addAttribute() {
        html  = '<tr id="attribute-row' + attribute_row + '">';
        html += '  <td class="text-left"><?php 
                          echo $this->Form->input('ProductAttribute.attribute_name', array(
                            'label' => false,
                            'placeholder'=>'Attribute',
                            'class'=>'form-control',
                            'name' => 'data[ProductAttribute][][attribute_name]'
                            ));
                        ?></td>';
        html += '  <td class="text-left">';
        html += '<div class="input-group"><span class="input-group-addon"></span><?php 
                          echo $this->Form->input('ProductAttribute.text',array(
                            'rows' => '5',
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => 'Text',
                            'name' => 'data[ProductAttribute][text][]'
                            )); 
                        ?></div>';
        html += '  </td>';
        html += '  <td class="text-left"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';
      
      $('#attribute tbody').append(html);
      attributeautocomplete(attribute_row);
      attribute_row++;
    }


   
/* <!--  Add Discount Script --> */
  
var discount_row = 0;

function addDiscount() {
  var customer_group_pd = '<?=$customer_group_pd?>';
    html  = '<tr id="discount-row' + discount_row + '">'; 
    html += '<td class="text-left">'+ customer_group_pd +'</td>';
    html += '  <td class="text-right"><?php
                          echo $this->Form->input('ProductDiscount.quantity', array(
                            'name' => 'data[ProductDiscount][quantity][]',
                            'placeholder' => 'Quantity',
                            'type' => 'number',
                            'label' => false,
                            'min' => 0,
                            'class' => 'form-control'
                          ));
                        ?></td>';
    html += '  <td class="text-right"><?php
                          echo $this->Form->input('ProductDiscount.price', array(
                            'name' => 'data[ProductDiscount][price][]',
                            'placeholder' => 'Price',
                            'type' => 'number',
                            'step' => 'any',
                            'min' => '0.01',
                            'label' => false,
                            'class' => 'form-control'
                          ));
                        ?></td>';
    html += '  <td class="text-left"><div class="input-group date"><input class="form-control datepicker_start" type="text"  placeholder="Date Start" name="data[ProductDiscount][date_start][]"></td>';
    html += '  <td class="text-left"><input class="form-control datepicker_end " type="text"  placeholder="Date End" name="data[ProductDiscount][date_end][]"></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';  
 
  $('#discount tbody').append(html);  
  discount_row++;
}

$('body').on('focus',".datepicker_start", function(){
    $(this).datepicker({ dateFormat: 'yy-mm-dd' });
});

$('body').on('focus',".datepicker_end", function(){
    $(this).datepicker({ dateFormat: 'yy-mm-dd' });
});

var special_row = 0;
function addSpecial() {
  var customer_group_ps = '<?=$customer_group_ps?>';
    html  = '<tr id="special-row' + special_row + '">'; 
    html += '  <td class="text-left">'+ customer_group_ps +'</td>';   
    html += '  <td class="text-right"><?php
                          echo $this->Form->input('ProductSpecial.quantity', array(
                            'name' => 'data[ProductSpecial][quantity][]',
                            'placeholder' => 'Quantity',
                            'type' => 'number',
                            'label' => false,
                            'min' => 0,
                            'class' => 'form-control'
                          ));
                        ?></td>';
    html += '  <td class="text-right"><?php
                          echo $this->Form->input('ProductSpecial.price[]', array(
                            'name' => 'data[ProductSpecial][price][]',
                            'placeholder' => 'Price',
                            'type' => 'number',
                            'step' => 'any',
                            'min' => '0.01',
                            'label' => false,
                            'class' => 'form-control'
                          ));
                        ?></td>';
    html += '  <td class="text-left"><input class="form-control datepicker_start" type="text" data-format="YYYY-MM-DD" placeholder="Date Start" name="data[ProductSpecial][date_start][]"></td>';
    html += '  <td class="text-left"><input class="form-control datepicker_end" type="text" data-format="YYYY-MM-DD" placeholder="Date End" name="data[ProductSpecial][date_end][]"></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#special-row' + special_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';
  
  $('#special tbody').append(html);

  $('.date').datetimepicker({
    pickTime: false
  });
    
  special_row++;
}

var image_row = 0;

function addImage() {
  html  = '<tr id="image-row' + image_row + '">';
  html += '  <td class="text-left"><span id="file' + image_row + '"><input name="data[file][]" id="file" type="file"/><span></td>';
  html += '  <td class="text-right"><?php
                          echo $this->Form->input('ProductImage.sort_order', array(
                            'name' => 'data[ProductImage][sort_order][]',
                            'placeholder' => 'Sort Order',
                            'value' => 0,
                            'type' => 'number',
                            'min' => '0',
                            'label' => false,
                            'class' => 'form-control'
                          ));
                        ?></td>';
  html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  html += '</tr>';
  
  $('#images tbody').append(html);
  
  image_row++;
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
    </script>

<!-- -->
<script>
    $(function() {
      $( "#dp1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>