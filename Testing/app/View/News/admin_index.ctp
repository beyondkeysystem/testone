 <div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <?php 
          echo $this->Html->link(
            '<i class="fa fa-plus"></i>',
            array('controller' => 'news', 
                    'action' => 'add'),
            array('class' => 'btn btn-primary',
              'data-original-title' => 'Create',
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
        
        <button data-original-title="Delete" type="submit" form="form-product" formaction="news/delete" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Delete/Uninstall cannot be undone! Are you sure you want to do this?') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>News</h1>
      
    </div>
  </div>
  <div class="container-fluid">
            <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> News List</h3>
      </div>
      
      <div class="panel-body">
      <!-- Search Area -->
      <?php
        if(isset($this->data['New']['title']) and $this->data['New']['title'] !=''){
            $news_name = $this->data['New']['title'];
        }else{
          $news_name = '';
        }
        if(isset($this->data['New']['subtitle']) and $this->data['New']['subtitle'] !=''){
            $news_model = $this->data['New']['subtitle'];
        }else{
          $news_model = '';
        }
        if(isset($this->data['New']['desc']) and $this->data['New']['desc'] !=''){
            $price = $this->data['New']['desc'];
        }else{
          $price = '';
        }

        if(isset($this->data['New']['type']) and $this->data['New']['type'] !=''){
            $quantity = $this->data['New']['type'];
        }else{
          $quantity = '';
        }
        
      ?>
       <?php echo $this->Form->create(null,array('action' => 'index'),array('class'=>'form-horizontal','name' => 'form-news-search'));?> 
        <div class="well">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-name">Title</label>
                <input autocomplete="off" name="data[New][title]" placeholder="Title" id="input-name" class="form-control" type="text" value="<?=$news_name?>"><ul class="dropdown-menu"></ul>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label" for="input-model">Subtitle</label>
                <input autocomplete="off" name="data[New][subtitle]" placeholder="Subtitle" id="input-model" class="form-control" type="text" value="<?=$news_model?>"><ul class="dropdown-menu"></ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label class="control-label" for="input-quantity">Type</label>
                <input name="data[News][type]" placeholder="Type" id="input-type" class="form-control" type="text" value="<?=$quantity?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label class="control-label" for="input-status">Status</label>
                <?php echo $this->Form->input('News.status',array(
                      'options'=>array(''=>'Select', '1' => 'Enable', '0' => 'Disable'),
                      'label' => false,
                      'class' => 'form-control'
                      )) 
                ?>
              </div>
            </div>
             <div class="col-sm-2">
              <div class="form-group">
               <button style="margin-top:23px;margin-left:50px;" type="submit" id="button-filter" class="btn btn-primary" name="filter"><i class="fa fa-search"></i> Filter</button>
              </div>
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
                    Listing Image
                  </td>
                  <td class="text-left">
                    <a href="#"><?=$this->Paginator->sort('title',__('Title'));?></a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('subtitle',__('Subtitle'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('type',__('Type'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('status',__('Status'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('created',__('Created'));?>
                    </a>
                  </td>
                  <td class="text-left">
                    <a href="#">
                      <?=$this->Paginator->sort('modified',__('Modified'));?>
                    </a>
                  </td>
                  <td class="text-right">
                    Action
                  </td>
                </tr>
              </thead>
              <tbody>
              <?php
                // pr($news); die;
              if(!empty($news)){
                  foreach($news as $new){                     
                ?>
                  <tr>
                    <td class="text-center">
                      <input name="selected[]" value="<?=$new['New']['id']?>" type="checkbox">
                    </td>
                    <td class="text-center">
                      <?=$this->HTML->image('../uploads/thumbs/news/'.$new['New']['listing_image'],array(
                          'alt' => $new['New']['id'],'style'=>'width:70px;height:50px;','class' => 'img-thumbnail'
                      ));?>
                    </td>
                    <td class="text-left"><?=$new['New']['title']?></td>
                    <td class="text-left"><?=$new['New']['subtitle']?></td>
                    <td class="text-left"><?=$new['New']['type']?></td>
                    <td class="text-left"><?=$new['New']['status']?></td>
                    <td class="text-left"><?=date('F d, Y',strtotime($new['New']['created']))?></td>
                    <td class="text-left"><?=date('F d, Y',strtotime($new['New']['modified']))?></td>
                    <td class="text-right">
                      <?php
                        echo $this->Html->link(
                          '<i class="fa fa-pencil"></i>',
                          array('action' => 'edit', $new['New']['id']),
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