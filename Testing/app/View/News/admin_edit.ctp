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
        <button data-original-title="Save" type="submit" form="form-new" data-toggle="tooltip" title="" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <?php
          echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'news', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );
        ?>
      </div>
      <h1>News</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Edit New</h3>
      </div>
      <div class="panel-body">
        <!-- <form action="http://demo.opencart.com/admin/index.php?route=catalog/new/edit&amp;token=e3b2c81726bb1b0dd7faa24ed2378064&amp;new_id=42" method="post" enctype="multipart/form-data" id="form-new" class="form-horizontal"> -->
        <?php
          echo $this->Form->create('New',array('type' => 'file', 'class' => 'form-horizontal', 'id' => 'form-new'));
        ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">Title</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('New.title',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'Title',
                            'class' => 'form-control',
                            'required' => 'request'
                          ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">Subtitle</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('New.subtitle',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'Subtitle',
                            'class' => 'form-control',
                            'required' => 'request'
                          ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description1">Description</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('New.desc',array(
                          'rows' => '5',
                          'label' => false,
                          'class' => 'form-control ckeditor',
                          'placeholder' => 'Description'
                          )); 
                        ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description1">Type</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('New.type',array(
                          'label' => false,
                          'class' => 'form-control',
                          'placeholder' => 'Type'
                          )); 
                        ?>
                    </div>
                  </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-status">Status</label>
                  <div class="col-sm-10">
                    <?php echo $this->Form->input('New.status',array(
                        'options'=>array('Enable' => 'Enable', 'Disable' => 'Disable'),
                        'label' => false,
                        'class' => 'form-control'
                        )) 
                    ?>
                  </div>
                </div>
                  
                  <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Image</label>
                <div class="col-sm-10">
                  <span id="file">
                    <span id="image_area">
                      <?php
                        if($this->data['New']['listing_image']){
                          echo $this->Html->image('../uploads/'.$this->data['New']['listing_image'],array('style'=>'width:120px','class'=>'img-thumbnail'));
                      ?>
                         &emsp; <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure do you want to delete this image?')){delete_image();}else{return false;}"><i class="fa fa-trash"></i></button>
                      <?php 
                        }else{
                          echo $this->Form->input('New.listing_image',array('type'=>'file',
                              'label' => false,
                              'class' => 'new_upload'
                            ));
                        }
                      ?>  
                    </span>
                  </span>
                </div>
              </div>   
                </div>
            </div>
          </div>
        <?=$this->Form->end();?>
      </div>
    </div>
  </div>
</div>


</div>

<script type="text/javascript">
/*<!-- Add Attribute  Script-->*/

function delete_image(){
  // alert("dee");
  $.post(
    "<?php echo Router::fullbaseUrl();?>/admin/news/delete_image",
    { new_id: <?=$this->data['New']['id']?>},
    function(data){
      // alert('data');
        $('#image_area').remove();
        $('#file').append('<div class="input file"><input id="NewImage" class="new_upload" type="file" name="data[New][listing_image]"></div>');      
    }
  );
}

function delete_row(id,table){
  $.post(
    "<?php echo Router::fullbaseUrl();?>/admin/news/delete_row",
    { id: id, table: table},
    function(data){
      
    }
  ); 
}
</script>